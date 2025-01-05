@extends('layouts.base')
@section('head')

<meta charset="UTF-8">
<link rel="stylesheet" href="{{asset('assets')}}/vendors/simplebar/css/simplebar.css">
<!-- Main styles for this application-->
<link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" />
<!-- We use those styles to show code examples, you should remove them in your application.-->
<link href="{{asset('assets')}}/css/examples.css" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menus List</title>
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
                <div class="card-body d-flex flex-column flex-sm-row align-items-center">
                    <!-- Logo -->
                    <img src="{{ asset('storage') }}/{{ $menu->logo_url }}" alt="Restaurant Logo"
                         class="rounded-circle me-0 me-sm-3 mb-3 mb-sm-0"
                         style="width: 50px; height: 50px; object-fit: cover;">

                    <!-- Details -->
                    <div class="flex-grow-1 text-center text-sm-start">
                        <h5 class="card-title mb-1">{{ $menu->name }}</h5>
                        <p class="card-text text-muted mb-2">
                            <i class="fas fa-wave-square me-1"></i> Scans: {{ $menu->visit_count }}
                            <span class="mx-2 d-none d-sm-inline">|</span> <!-- Hide separator on small screens -->
                            <br class="d-sm-none"> <!-- Line break for small screens -->
                            <i class="fas fa-calendar-alt me-1"></i> Created: {{ $menu->created_at->format('Y-m-d') }}
                        </p>
                    </div>

                    <!-- Actions -->
                    <div class="btn-group">
                        <a href="{{ route('menu.details', ['id' => $menu->id]) }}" class="btn btn-outline-primary">
                            <i class="fas fa-file-alt"></i>
                        </a>
                        <a href="{{ route('qr.form', ['url' => $menu->id]) }}" class="btn btn-outline-secondary">
                            <i class="fas fa-qrcode"></i>
                        </a>
                        <a href="{{ route('customer_menu', ['menuId' => $menu->id]) }}" target="blank" class="btn btn-outline-secondary">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('edit_menu.index', ['id' => $menu->id]) }}" class="btn btn-outline-secondary">
                            <i class="fas fa-pen"></i>
                        </a>
                        <button class="btn btn-outline-danger delete-menu-btn" data-id="{{ $menu->id }}" type="button"
                                data-coreui-toggle="modal" data-coreui-target="#deleteMenuModal">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            </div>

            @endforeach
            @else
            <div><h2>There is no menu add to see your menu</h2></div>
            @endif

            <x-custom_modal id="deleteMenuModal" title="Delete Menu">
                <form method="POST" enctype="multipart/form-data">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body text-center">
                        <h3 class="mb-3">Are you sure you want to delete this Menu?</h3>
                        <p class="text-muted">This action is inreversible. Once deleted, the menu cannot be restored.</p>

                        <div class="d-flex justify-content-center gap-2 mt-4">
                            <button type="submit" class="btn btn-danger text-light">Yes, Delete</button>
                            <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Cancel</button>
                        </div>
                    </div>

                    @slot('footer')

                    @endslot
                </form>
            </x-custom_modal>
</div>

@if(session('success'))
  <script>
      toastr.success("{{ session('success') }}");
  </script>
@endif
<script>
         const deleteButtons = document.querySelectorAll('.delete-menu-btn');
         const formDelete = document.querySelector('#deleteMenuModal form');
         deleteButtons.forEach(button => {
             button.addEventListener('click', function () {
                 const Deleteid = this.getAttribute('data-id');
                 // Change form action to update route
                 const routeUrl = "{{ route('menu.delete', ':id') }}".replace(':id', Deleteid);
                 formDelete.action = routeUrl;
             });
         });

</script>


@endsection
