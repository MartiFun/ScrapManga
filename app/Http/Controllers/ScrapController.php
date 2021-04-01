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
    // $li = $crawler->filter('.alpha-link');
    // for ($i=0; $i < count($li)/100; $i++) {
    //   $thumb = $crawler->filter('.alpha-link')->eq($i)->attr('href');
    //   array_push($thumbs, $thumb);
    // }
    $li = $crawler->filter('.alpha-link');
    // dd(count($li));
    for ($i=2500; $i < 2526; $i++) {
      array_push($thumbs, ScrapController::GetManga($i, $crawler, $thumbs));
    }

    Storage::disk('public')->put('data6.json', json_encode($thumbs));
  }

  static function GetManga($index, $crawler, $thumbs)
  {
    $li = $crawler->filter('.alpha-link');
    $thumb = $crawler->filter('.alpha-link')->eq($index)->attr('href');
    return $thumb;
  }
}
