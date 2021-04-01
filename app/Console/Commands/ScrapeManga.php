<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Goutte\Client;

class ScrapeManga extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
     protected $signature = 'scrape:manga';

    /**
     * The console command description.
     *
     * @var string
     */
     protected $description = 'Manga Scraper';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
      $this->scrape();
    }

      /**
   * For scraping data for the specified collection.
   *
   * @param  string $collection
   * @return boolean
   */
  public static function scrape()
  {
    $goutte = new Client();
    $crawler = $goutte->request('GET', env('MANGA_URL'));


    // $crawler->filter('li')->each(function ($node) {
    //   $title = trim($node->filter('.alpha-link')->text());
    //   print_r($title);
    // });

    $thumbs = [];
    $li = $crawler->filter('.thumbnail');
    // dd(count($li));
    for ($i=0; $i < count($li); $i++) {
      $thumbs = $crawler->filter('.thumbnail')->eq($i);    
      print_r($thumbs);
    }

    // return $li;
  }

}
