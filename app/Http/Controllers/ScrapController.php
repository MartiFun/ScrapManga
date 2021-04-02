<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\Facades\Storage;

class ScrapController extends Controller
{
  public static function scrap()
  {
    $goutte = new Client();
    $crawler = $goutte->request('GET', env('MANGA_URL'));
    $index = 0;
    $thumbs = [];
    $li = $crawler->filter('.alpha-link');

    for ($i=0; $i < 2526; $i++) {
      array_push($thumbs, ScrapController::GetManga($i, $crawler, $thumbs));
      ini_set('max_execution_time', 180); //3 minutes
    }

    Storage::disk('public')->put('data6.json', json_encode($thumbs));
    Artisan::call('db:seed');
  }

  static function GetManga($index, $crawler, $thumbs)
  {
    $li = $crawler->filter('.alpha-link');
    $thumb = $crawler->filter('.alpha-link')->eq($index)->attr('href');
    return $thumb;
  }
}
