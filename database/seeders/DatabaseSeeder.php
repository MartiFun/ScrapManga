<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{ Manga };
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

      $string = file_get_contents("./storage/app/public/manga.json");
      $json_file = json_decode($string);

      for ($i=0; $i < 500; $i++) {

        $goutte = new Client();
        $crawler = $goutte->request('GET', $json_file[$i]->url);

        $nom = $crawler->filter('.widget-title')->text();


        $querry = $crawler->filter('.dl-horizontal *');
        for ($y=0; $y < count($querry) ; $y++) {
          if ($crawler->filter('.dl-horizontal *')->eq($y)->text() == 'Auteur(s)') {
            $auteur = $crawler->filter('.dl-horizontal *')->eq($y)->nextAll()->eq(0)->text();
          }
          else {
            $categorie = 'null';
          }
        }

        if (!empty($crawler->filter('.well p'))) {
          $desc = $crawler->filter('.well p')->text();
        }else {
          $desc = 'null';
        }


        for ($y=0; $y < count($querry) ; $y++) {
          if ($crawler->filter('.dl-horizontal *')->eq($y)->text() == 'Catégories') {
            $categorie = $crawler->filter('.dl-horizontal *')->eq($y)->nextAll()->eq(0)->text();
          }
          else {
            $categorie = 'null';
          }
        }

        if (!empty($crawler->filter('.img-responsive'))) {
          $image = $crawler->filter('.img-responsive')->attr('src');
        }else {
          $image = 'null';
        }


        $plat = Manga::create([
          'nom' => $nom,
          'desc' => $desc,
          'img' => $image,
          'auteur' => $auteur,
          'categorie' => $categorie,
        ]);
      }
    }
}
