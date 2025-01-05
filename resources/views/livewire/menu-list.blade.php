


    <div class="container mt-4 my-4">
        <h2 class="text-dark my-3">{{$category_name}}</h2>
        @if($dishes->count() == 0)
            <p class="text-center h4">No dishes found in this category.</p>
        @endif

        @foreach($dishes as $dish)
            @livewire('menu-card', ['dish' => $dish], key($dish->id))
        @endforeach
    </div>




