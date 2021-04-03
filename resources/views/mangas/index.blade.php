@extends('layouts.app')

@section('content')
  <section class="mangalist">
      <h1>Add a manga to your list</h1>
      <div class="searchManga">
        <form class="research" action="{{ route('mangas.nom') }}" method="GET">
            @csrf
            <input class="form-control @error('email') is-invalid @enderror" type="text" name="nom" value="{{ old('nom') }}" placeholder="rechercher un manga">
            @error('nom')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
            <button type="submit" class="btn">
                <strong>chercher</strong>
            </button>
        </form>
      </div>
      <div class="mangas">
        <?php foreach ($mangas as $manga): ?>
          <div class="manga">
            <img src="{{$manga->img}}" alt="">
            <div class="info">
              <h5>{{$manga->nom}}</h5>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      {{ $mangas->links() }}
      <div class="image3">
      </div>
  </section>
@endsection
