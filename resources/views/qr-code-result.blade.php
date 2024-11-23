@extends('layouts.base')
@section('head')


  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Menu - Lukka Cafe</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="{{asset('assets')}}/vendors/simplebar/css/simplebar.css">
  <!-- Main styles for this application-->
  <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
  <!-- We use those styles to show code examples, you should remove them in your application.-->
  <link href="{{asset('assets')}}/css/examples.css" rel="stylesheet">
  <script src="{{asset('assets')}}/js/config.js"></script>
  <script src="{{asset('assets')}}/js/color-modes.js"></script>
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
<div class="container text-center">
    <h1>Your Custom QR Code</h1>
    <div class="qr-code">
        {!! $qrCode !!}
    </div>
    @if($request->text)
        <p>{{ $request->text }}</p>
    @endif
    <a href="{{ route('qr.form') }}" class="btn btn-secondary mt-3">Generate Another QR Code</a>
</div>
@endsection
