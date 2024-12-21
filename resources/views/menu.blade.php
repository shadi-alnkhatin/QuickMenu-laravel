@extends('layouts.base')
@section('head')

<meta charset="UTF-8">
<link rel="stylesheet" href="{{asset('assets')}}/vendors/simplebar/css/simplebar.css">
<!-- Main styles for this application-->
<link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
<!-- We use those styles to show code examples, you should remove them in your application.-->
<link href="{{asset('assets')}}/css/examples.css" rel="stylesheet">
<script src="{{asset('assets')}}/js/config.js"></script>
<script src="{{asset('assets')}}/js/color-modes.js"></script>
<link href="{{asset('assets')}}/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menu List</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

@endsection

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="d-flex align-items-center text-dark">
        <i class="fas fa-store-alt me-2"></i> Menus
      </h2>
      <a href="{{route('menu.create')}}" class="btn btn-primary text-light">
        <i class="fas fa-plus"></i> Add Menu
      </a>
    </div>
        @if($menus->isNotEmpty())

            @foreach ($menus as $menu)
            <div class="card mb-3 shadow-sm">
                <div class="card-body d-flex align-items-center">
                  <img src="{{asset("storage")}}/{{$menu->logo_url}}" alt="Restaurant Logo" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                  <div class="flex-grow-1">
                    <h5 class="card-title mb-1">{{$menu->name}}</h5>
                    <p class="card-text text-muted mb-2">
                      <i class="fas fa-wave-square me-1"></i> Scans: 3
                      <span class="mx-2">|</span>
                      <i class="fas fa-calendar-alt me-1"></i> Created: {{$menu->created_at->format('Y-m-d')}}
                    </p>
                  </div>
                  <div class="btn-group">
                    <a href="{{route('menu.details',['id'=>$menu->id])}}" class="btn btn-outline-primary"><i class="fas fa-file-alt"></i></a href="">
                        <a href="{{ route('qr.form', ['url' =>  $menu->id]) }}" class="btn btn-outline-secondary">
                            <i class="fas fa-qrcode"></i>
                        </a>
                    <a href="{{route('customer_menu',['menuId' =>  $menu->id])}}" target="blank" class="btn btn-outline-secondary"><i class="fas fa-eye"></i></a href="">
                    <a href="{{route('edit_menu.index',['id' =>  $menu->id])}}" class="btn btn-outline-secondary"><i class="fas fa-pen"></i></a href="">
                    <a href="" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></a href="">
                  </div>
                </div>
              </div>
            @endforeach
            @else
            <div><h2>There is no menu add to see your menu</h2></div>
            @endif
  </div>

@endsection
