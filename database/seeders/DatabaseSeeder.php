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

      $string = file_get_contents("./storage/app/public/data6.json");
      $json_file = json_decode($string);

      for ($i=0; $i < count($json_file); $i++) {
        ini_set('max_execution_time', 180); //3 minutes
        $goutte = new Client();
        $crawler = $goutte->request('GET', $json_file[$i]);

        $nom = $crawler->filter('.widget-title')->text();
        $categorie = 'null';
        $auteur = 'null';

        $querry = $crawler->filter('.dl-horizontal *');
        for ($y=0; $y < count($querry) ; $y++) {
          if ($crawler->filter('.dl-horizontal *')->eq($y)->text() == 'Auteur(s)') {
            $auteur = $crawler->filter('.dl-horizontal *')->eq($y)->nextAll()->eq(0)->text();
          }
        }


        for ($y=0; $y < count($querry) ; $y++) {
          if ($crawler->filter('.dl-horizontal *')->eq($y)->text() == 'Catégories') {
            $categorie = $crawler->filter('.dl-horizontal *')->eq($y)->nextAll()->eq(0)->text();
          }
        }

        if (!empty($crawler->filter('.img-responsive'))) {
          $image = $crawler->filter('.img-responsive')->attr('src');
        }else {
          $image = 'null';
        }


        $plat = Manga::create([
          'nom' => $nom,
          'img' => $image,
          'auteur' => $auteur,
          'categorie' => $categorie,
        ]);
      }
    }
}
