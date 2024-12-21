<div class="container my-4 p-4 border rounded shadow-lg header-section"
style="background-image: url('{{asset("storage")}}/{{ $resturantInfo->cover_url}}'); background-position:center; background-repeat:no-repeat;background-size:cover;"
>
    <div class="row align-items-center cafe-info">
        <!-- Image Section -->
        <div class="col-md-3 text-center">
            <img src="{{asset("storage")}}/{{ $resturantInfo->logo_url}}" alt="Cafe Logo" class="rounded-circle img-fluid cafe-logo">
        </div>

        <!-- Text Section -->
        <div class="col-md-9">
            <h2 class="cafe-name text-light">{{$resturantInfo->name}}</h2>
            <p class="cafe-description text-light">{{$resturantInfo->description}}</p>
            <div class="cafe-details text-light">
                <p class="text-light"><i class="bi bi-geo-alt-fill "></i> {{$resturantInfo->address}}</p>
                <p class="text-light"><i class="bi bi-telephone-fill"></i> {{$resturantInfo->phone_number}}</p>
            </div>
        </div>
    </div>
</div>

