@extends('layouts.app')

@section('content')
  <section class="mangalist">
      <h1>Add a manga to your list</h1>
      <div class="mangas">
        <?php foreach ($mangas as $manga): ?>
          <div class="manga">
            <img src="{{$manga->img}}" alt="">
            <div class="info">
              <h5>{{$manga->nom}}</h5>
              <p>{{$manga->auteur}}</p>
              <ul>
                @foreach($manga->categories as $categorie)
                  <li>{{$categorie->nom}}</li>
                @endforeach
              </ul>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      {{ $mangas->links() }}
  </section>
@endsection
