<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{ Manga, Category };
use GuzzleHttp\Psr7;

class ShowManga extends Component
{
    public string $search = '';
    public $mangas;

    protected $queryString = [
      'search' => ['except' => '']
    ];

    public function mount()
    {
      // fetch("https://private-anon-5cfa329aee-jikan.apiary-proxy.com/v3/top/manga/10/manga", {
      //   "method": "GET",
      //   "headers": {
      //     "x-rapidapi-key": "66d94958b5msh623fd265b765373p131597jsn9739ef9be180",
      //     "x-rapidapi-host": "jikan1.p.rapidapi.com"
      //   }
      // })

      // .then(res => res.json())
      // .then(
      //   (result) => {
      //     $this->mangas = result.top;
      //   },
      //   (error) => {
      //     alert(error);
      //   }
      // );
    }

    public function render()
    {
        // return view('livewire.show-manga');
    }
}
