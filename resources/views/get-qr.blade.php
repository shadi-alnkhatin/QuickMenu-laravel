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
<div class="container mt-5">
    <div class="row">
        <!-- QR Code Section -->
        <div class="col-lg-5 col-md-12 text-center ">
            <h1 class="mb-4"> Your Menu QR Code</h1>
            <div class="mb-3">
                <label for="color" class="form-label fw-bold">QR Code Color:</label>
                <input type="color" name="color" id="color" class="form-control w-50 mx-auto">
            </div>
            <div id="preview" class="mt-4">
                @if ($qrCode)
                    <div class="">
                        {{$qrCode}}
                    </div>
                @endif
            </div>
            <button id="download" type="button" class="btn btn-primary mt-4 mb-3 px-4 py-2">Download QR Code</button>
        </div>

        <!-- Steps Section -->
        <div class="col-lg-6 col-md-12 " style="margin-left: 60px; margin-top:200px">
            <h3 class=" mb-4">Steps to Use Your QR Code</h3>
            <div class="steps-container">
                <details class="mb-3">
                    <summary class="fw-bold text-primary" style="cursor: pointer; font-size: 18px;">
                        Step 1: Download the QR Code
                    </summary>
                    <p class="ms-3 mt-2 text-secondary">Click the "Download QR Code" button to save the code to your device. Ensure you save it somewhere accessible.</p>
                </details>
                <details class="mb-3">
                    <summary class="fw-bold text-primary" style="cursor: pointer; font-size: 18px;">
                        Step 2: Design a Poster with Your Brand
                    </summary>
                    <p class="ms-3 mt-2 text-secondary">Use a tool like Canva to design a poster with your QR code, incorporating your restaurant's logo and colors.</p>
                </details>
                <details class="mb-3">
                    <summary class="fw-bold text-primary" style="cursor: pointer; font-size: 18px;">
                        Step 3: Print and Display
                    </summary>
                    <p class="ms-3 mt-2 text-secondary">Print the design and place it in visible areas of your restaurant, such as on tables or the counter.</p>
                </details>
                <details class="mb-3">
                    <summary class="fw-bold text-primary" style="cursor: pointer; font-size: 18px;">
                        Step 4: Encourage Customer Use
                    </summary>
                    <p class="ms-3 mt-2 text-secondary">Invite your customers to scan the QR code to view the menu or place orders conveniently.</p>
                </details>
            </div>
        </div>
    </div>
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
