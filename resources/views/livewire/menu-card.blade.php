<div class="card mb-3 w-100">
    <div class="row g-0">
        <div class="col-md-4 col-sm-12">
            <img class="menu-card-img" src="{{asset("storage")}}/{{ $dish['image_url'] }}"  alt="{{ $dish['name'] }}">
        </div>
        <div class="col-md-8">
            <div class="card-body d-flex flex-column justify-content-between">
                <div>
                    <h5 class="card-title">{{ $dish['name'] }}</h5>
                    <p class="card-text">{{ $dish['description'] }}</p>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <span class="h5">${{ $dish['price'] }}</span>

                    <button class="btn btn-custom" wire:click="$dispatch('setDish', { dishId: {{$dish->id}} })" >Add</button>


                </div>
            </div>
        </div>
    </div>

</div>

