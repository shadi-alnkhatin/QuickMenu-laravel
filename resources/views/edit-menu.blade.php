@extends('layouts.base')
@section('head')
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/simplebar/css/simplebar.css">
<!-- Main styles for this application-->
<link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
<title>Menu List</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
    <br>
    <h1>Edit Menu</h1>
    <br>
    {{-- Form for Editing Existing menu  --}}
    <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div data-mdb-input-init class="form-outline mb-4">
            <input type="text" id="form6Example3" class="form-control" name="name" value="{{ old('name', $menu->name) }}"/>
            <label class="form-label" for="form6Example3">Name</label>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <div data-mdb-input-init class="form-outline mb-4">
            <input type="text" id="form6Example4" class="form-control" name="address" value="{{ old('address', $menu->address) }}" />
            <label class="form-label" for="form6Example4">Address</label>
            @error('address')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <div data-mdb-input-init class="form-outline mb-4">
            <input type="tel" id="form6Example6" class="form-control" name="phone_number" value="{{ old('phone_number', $menu->phone_number) }}"/>
            <label class="form-label" for="form6Example6">Phone</label>
            @error('phone_number')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <div data-mdb-input-init class="form-outline mb-4">
            <textarea class="form-control" id="form6Example7" rows="4" name="description">{{ old('description', $menu->description) }}</textarea>
            <label class="form-label" for="form6Example7">Description</label>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-outline mb-4">
            <label for="themeColor" class="form-label">Choose Theme Color</label>
            <input type="color" id="themeColor" name="primary_color" class="form-control form-control-color"
                   value="{{ old('primary_color', $menu->primary_color ?? '#ffffff') }}" />
            @error('primary_color')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <div class="form-outline mb-4">

            <div class=" ">
                @if ($menu->logo_url)
                    <p class="mb-1">Current Logo:</p>
                    <img src="{{ asset('storage') }}/{{ $menu->logo_url }}" alt="Current Logo"
                        class="img-fluid rounded border"
                        style="height: 80px; width: auto;">
                @else
                    <p class="text-muted">No logo uploaded yet</p>
                @endif
            </div>
            <input name="logo" type="file" id="logoUpload" class="form-control" accept="image/*" />
            @error('logo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-outline mb-4">

            <div class="">
                @if ($menu->cover_url)
                    <p class="mb-1">Current Cover:</p>
                    <img src="{{ asset('storage') }}/{{ $menu->cover_url }}" alt="Current Cover"
                        class="img-fluid rounded border"
                        style="height: 150px; width: auto;">
                @else
                    <p class="text-muted">No cover image uploaded yet</p>
                @endif
            </div>
            <input name="cover" type="file" id="coverUpload" class="form-control" accept="image/*" />
            @error('cover')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>



        <!-- Submit button -->
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Update Menu</button>
    </form>
</div>

<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.umd.min.js"></script>
@endsection
