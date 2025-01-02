@extends('layouts.base')
@section('head')
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Menu</title>
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/simplebar/css/simplebar.css">
<!-- Main styles for this application-->
<link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
<!-- We use those styles to show code examples, you should remove them in your application.-->
<link href="{{asset('assets')}}/css/examples.css" rel="stylesheet">
<script src="{{asset('assets')}}/js/config.js"></script>
<script src="{{asset('assets')}}/js/color-modes.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menu List</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="js/config.js"></script>
    <script src="js/color-modes.js"></script>
    <link href="vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
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
    <h1>Add Menu</h1>
    <br>
    <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Name input -->
        <div data-mdb-input-init class="form-outline mb-4">
          <input type="text" id="form6Example3" class="form-control" name="name" value="{{old('name')}}"/>
          <label class="form-label" for="form6Example3">Name</label>
          @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        </div>

        <!-- Address input -->
        <div data-mdb-input-init class="form-outline mb-4">
          <input type="text" id="form6Example4" class="form-control" name="address" value="{{old('address')}}" />
          <label class="form-label" for="form6Example4">Address</label>
          @error('address')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        </div>

        <!-- Phone input -->
        <div data-mdb-input-init class="form-outline mb-4">
          <input type="number" id="form6Example6" class="form-control" name="phone_number" value="{{old('phone_number')}}"/>
          <label class="form-label" for="form6Example6">Phone</label>
          @error('phone_number')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        </div>

        <!-- Description input -->
        <div data-mdb-input-init class="form-outline mb-4">
          <textarea class="form-control" id="form6Example7" rows="4" name="description">{{old('description')}}</textarea>
          <label class="form-label" for="form6Example7">Description</label>
            @error('description')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Color Picker for Theme Color -->
        <div class="form-outline mb-4">
          <label for="themeColor" class="form-label">Choose Theme Color</label>
          <input type="color" id="themeColor" name="primary_color" class="form-control form-control-color" />
          @error('primary_color')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <!-- File upload for Logo -->
        <div class="form-outline mb-4">
          <label for="logoUpload" class="form-label">Upload Logo</label>
          <input name="logo" type="file" id="logoUpload" class="form-control" accept="image/*" />
          @error('logo')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        </div>


        <!-- File upload for Cover Image -->
        <div class="form-outline mb-4">
          <label for="coverUpload" class="form-label">Upload Cover Image</label>
        <input name="cover" type="file" id="coverUpload" class="form-control" accept="image/*" />
        @error('cover')
        <small class="text-danger">{{ $message }}</small>
        @enderror
        </div>


        <!-- Submit button -->
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">ADD MENU</button>
    </form>
</div>

<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.umd.min.js"></script>
@endsection
