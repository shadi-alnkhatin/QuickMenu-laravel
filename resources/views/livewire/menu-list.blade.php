    <div>

        <div class="container mt-4">
            <h2 class="text-dark my-3">{{$category_name}}</h2>
            @foreach($dishes as $dish)
            @livewire('menu-card', ['dish' => $dish], key($dish->id))
          @endforeach

    </div>
</div>


