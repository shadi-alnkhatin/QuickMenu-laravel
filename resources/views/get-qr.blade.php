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
<div class="container">
    <h1>Generate Custom QR Code</h1>
    <form action="{{ route('qr.generate') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="url">URL:</label>
            <input type="url" name="url" id="url" class="form-control" placeholder="Enter URL" required>
        </div>
        <div class="form-group">
            <label for="color">QR Code Color:</label>
            <input type="color" name="color" id="color" class="form-control">
        </div>
        <div class="form-group">
            <label for="text">Custom Text:</label>
            <input type="text" name="text" id="text" class="form-control" placeholder="Enter custom text">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Generate QR Code</button>
    </form>
</div>
<div id="preview" class="mt-3"></div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
   const preview = document.getElementById('preview');
document.getElementById('url').addEventListener('input', updatePreview);
document.getElementById('color').addEventListener('input', updatePreview);

function updatePreview() {
    const url = document.getElementById('url').value;
    const color = document.getElementById('color').value;

    if (url) {
        axios.post('{{ route('qr.generate') }}', {
            url: url,
            color: color,
        })
        .then(response => {
            if (response.data.qrCode) {
                // Render the QR Code
                preview.innerHTML = response.data.qrCode;
            }
        })
        .catch(error => {
            console.error('Error generating QR code:', error);
        });
    } else {
        preview.innerHTML = ''; // Clear the preview if URL is empty
    }
}

</script>
@endsection
