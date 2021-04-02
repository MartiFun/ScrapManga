@extends('layouts.app')

@section('content')
      <div class="mangas">
        <?php foreach ($mangas as $manga): ?>
          <div class="manga">
            <img src="{{$manga->img}}" alt="">
          </div>
        <?php endforeach; ?>
      </div>
      {{ $mangas->links() }}
@endsection
