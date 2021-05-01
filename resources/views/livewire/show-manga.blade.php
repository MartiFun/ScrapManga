<div>
    <section class="mangalist">
        <div class="searchManga">
            <form class="research" action="{{ route('mangas.nom') }}" method="GET">
                @csrf
                <input class="form-control" type="text" name="nom" placeholder="rechercher un manga" wire:model.debounce.500ms="search">
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
</div>
