<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{ Manga, Category };
use Goutte\Client;
use Illuminate\Support\Str;
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
      $categories = [];

      for ($i=0; $i < count($json_file); $i++) {
        ini_set('max_execution_time', 180); //3 minutes
        $goutte = new Client();
        $crawler = $goutte->request('GET', $json_file[$i]);
        $pourcent = ($i/count($json_file))*100;
        echo round($pourcent, 4).'%';
        echo "\n";
        $category = null;
        $nom = $crawler->filter('.widget-title')->text();
        $categorie = 'null';
        $auteur = 'null';
        $catstopush = [];

        $querry = $crawler->filter('.dl-horizontal *');
        for ($y=0; $y < count($querry) ; $y++) {
          if ($crawler->filter('.dl-horizontal *')->eq($y)->text() == 'Auteur(s)') {
            $auteur = $crawler->filter('.dl-horizontal *')->eq($y)->nextAll()->eq(0)->text();
          }
        }


        for ($y=0; $y < count($querry) ; $y++) {
          if ($crawler->filter('.dl-horizontal *')->eq($y)->text() == 'Catégories') {
            $categorie = $crawler->filter('.dl-horizontal *')->eq($y)->nextAll()->eq(0)->text();
            if (strpos($categorie, ",") !== false) {
              $cats = explode(" ", htmlentities($categorie));
              $sliceoflife = false;
              $shounenai = false;
              foreach ($cats as $cat) {
                switch ($cat) {
                  case ',&nbsp;':
                    break;
                  case 'One':
                    break;
                  case 'Shot':
                    if (array_search('One Shot', $categories) === false) {
                      array_push($categories, 'One Shot');
                      $categorys = Category::create(['nom' => 'One Shot', 'slug' => Str::slug('One Shot')]);
                      array_push($catstopush, $categorys);
                    }else {
                      $categorys = Category::where('nom', 'like', '%One Shot%')->get();;
                      array_push($catstopush, $categorys);
                    }
                    break;
                  case 'Gender':
                    break;
                  case 'Bender':
                    if (array_search('Gender Bender', $categories) === false) {
                      array_push($categories, 'Gender Bender');
                      $categorys = Category::create(['nom' => 'Gender Bender', 'slug' => Str::slug('Gender Bender')]);
                      array_push($catstopush, $categorys);
                    }else {
                      $categorys = Category::where('nom', 'like', '%Gender Bender%')->get();;
                      array_push($catstopush, $categorys);
                    }
                    break;
                  case 'Martial':
                    break;
                  case 'Arts':
                    if (array_search('Martial Arts', $categories) === false) {
                      array_push($categories, 'Martial Arts');
                      $categorys = Category::create(['nom' => 'Martial Arts', 'slug' => Str::slug('Martial Arts')]);
                      array_push($catstopush, $categorys);
                    }else {
                      $categorys = Category::where('nom', 'like', '%Martial Arts%')->get();;
                      array_push($catstopush, $categorys);
                    }
                    break;
                  case 'Slice':
                    break;
                  case 'of':
                    $sliceoflife = true;
                    break;
                  case 'School':
                    break;
                  case 'Life':
                    if ($sliceoflife === true) {
                      $sliceoflife = false;
                      if (array_search('Slice of Life', $categories) === false) {
                        array_push($categories, 'Slice of Life');
                        $categorys = Category::create(['nom' => 'Slice of Life', 'slug' => Str::slug('Slice of Life')]);
                        array_push($catstopush, $categorys);
                      }else {
                        $categorys = Category::where('nom', 'like', '%Slice of Life%')->get();;
                        array_push($catstopush, $categorys);
                      }
                    }else {
                      if (array_search('School Life', $categories) === false) {
                        array_push($categories, 'School Life');
                        $categorys = Category::create(['nom' => 'School Life', 'slug' => Str::slug('School Life')]);
                        array_push($catstopush, $categorys);
                      }else {
                        $categorys = Category::where('nom', 'like', '%School Life%')->get();;
                        array_push($catstopush, $categorys);
                      }
                    }

                    break;
                  case 'Shounen':
                    $shounenai = true;
                    if (array_search($cat, $categories) === false) {
                      array_push($categories, $cat);
                      $categorys = Category::create(['nom' => $cat, 'slug' => Str::slug($cat)]);
                      array_push($catstopush, $categorys);
                    }else {
                      $categorys = Category::where('nom', 'like', '%'.$cat.'%')->get();;
                      array_push($catstopush, $categorys);
                    }
                    break;
                  case 'Ai':
                    if ($shounenai === true) {
                      $shounenai = false;
                      if (array_search('Shounen Ai', $categories) === false) {
                        array_push($categories, 'Shounen Ai');
                        $categorys = Category::create(['nom' => 'Shounen Ai', 'slug' => Str::slug('Shounen Ai')]);
                        array_push($catstopush, $categorys);
                      }else {
                        $categorys = Category::where('nom', 'like', '%Shounen Ai%')->get();;
                        array_push($catstopush, $categorys);
                      }
                    }else {
                      if (array_search('Shoujo Ai', $categories) === false) {
                        array_push($categories, 'Shoujo Ai');
                        $categorys = Category::create(['nom' => 'Shoujo Ai', 'slug' => Str::slug('Shoujo Ai')]);
                        array_push($catstopush, $categorys);
                      }else {
                        $categorys = Category::where('nom', 'like', '%Shoujo Ai%')->get();;
                        array_push($catstopush, $categorys);
                      }
                    }

                    break;
                  default:
                    if (array_search($cat, $categories) === false) {
                      array_push($categories, $cat);
                      $categorys = Category::create(['nom' => $cat, 'slug' => Str::slug($cat)]);
                      array_push($catstopush, $categorys);
                    }else {
                      $categorys = Category::where('nom', 'like', '%'.$cat.'%')->get();;
                      array_push($catstopush, $categorys);
                    }
                    break;
                }
              }
            }else {
              if (array_search($categorie, $categories) === false) {
                array_push($categories, $categorie);
                $category = Category::create(['nom' => $categorie, 'slug' => Str::slug($categorie)]);
              }else {
                $category = Category::where('nom', 'like', '%'.$categorie.'%')->get();;
              }
            }
          }
        }

        if (!empty($crawler->filter('.img-responsive'))) {
          $image = $crawler->filter('.img-responsive')->attr('src');
        }else {
          $image = 'null';
        }


        $manga = Manga::create([
          'nom' => $nom,
          'img' => $image,
          'auteur' => $auteur,
        ]);

        if ($category !== null) {
          $manga->categories()->attach($category);
        }elseif (count($catstopush) >= 1) {
          foreach ($catstopush as $category) {
            $manga->categories()->attach($category);
          }
        }
      }
    }
}
