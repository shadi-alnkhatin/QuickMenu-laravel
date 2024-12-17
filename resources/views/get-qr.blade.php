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
<div class="container w-75">
    <h1> QR Code</h1>
        <div class="mb-3">
            <label for="color">QR Code Color:</label>
            <input type="color" name="color" id="color" class="form-control  w-50">
        </div>
        <div id="preview" class="mx-4">
            @if ($qrCode)
                {{$qrCode}}
            @endif
        </div>
        <button id="download" type="button" class="btn btn-primary mt-3 w-50">DownLoad</button>


</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/save-svg-as-png"></script>

<script src="{{asset('assets')}}/js/save-as-png.js"></script>
<script>
   const preview = document.getElementById('preview');

document.getElementById('color').addEventListener('change', updatePreview);

function updatePreview() {
    const color = document.getElementById('color').value;


        axios.post('{{ route('qr.generate',["url"=> $menuid ]) }}', {
         color: color,
    })
    .then(response => {
        if (response) {
            preview.innerHTML = response.data; // Render the SVG
            console.log(response);

        } else {
            preview.innerHTML = '<p>QR Code generation failed.</p>'; // Handle errors gracefully
        }
    })
    .catch(error => {
        console.error('Error generating QR code:', error);
    });


}

</script>
@endsection
