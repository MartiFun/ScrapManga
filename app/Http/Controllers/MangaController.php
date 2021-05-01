<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use App\Models\{ Manga, Category };

class MangaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $categories = Category::all();
      // $mangas = Manga::paginate(50);
      return view('mangas.index');
    }

    public function search(Request $request)
    {
      $mangas = Manga::where('nom', 'like', '%'.$request->nom.'%')->oldest('nom')->paginate(50);
      return view('mangas.index', compact('mangas'));
    }

    public function searchByCat($slug = null)
    {
      // $categories = Category::all();
      // $query = $slug ? Category::whereSlug($slug)->firstOrFail()->mangas() : Manga::query();
      // $mangas = $query->oldest('nom')->paginate(50);
      // return view('mangas.index', compact('mangas', 'categories', 'slug'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
