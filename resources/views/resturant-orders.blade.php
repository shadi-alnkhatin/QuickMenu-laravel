@extends('layouts.base')

 @section('head')

 <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,SCSS,HTML,RWD,Dashboard">
    <title>Orders</title>
    @livewireStyles

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/simplebar/css/simplebar.css">
    <!-- Main styles for this application-->
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="{{asset('assets')}}/css/examples.css" rel="stylesheet">
    <script src="{{asset('assets')}}/js/config.js"></script>
    <script src="{{asset('assets')}}/js/color-modes.js"></script>
    <link href="{{asset('assets')}}/vendors/datatables.net-bs5/css/dataTables.bootstrap5.css" rel="stylesheet">
    <style>
        /* Modal Style */
.order-details.modal {
    display: block; /* Make sure it's visible */
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5); /* Transparent background */
    z-index: 9999; /* Ensure the modal is on top */
    padding: 10px;
    overflow: auto;
}

.modal-content {
    background-color: #fff;
    margin: 10% auto;
    padding: 20px;
    border-radius: 8px;
    max-width: 500px;
    width: 100%;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-header h4 {
    margin: 0;
    font-size: 18px;
}

.close-btn {
    font-size: 24px;
    cursor: pointer;
    border: none;
    background: none;
    color: #aaa;
}

.close-btn:hover {
    color: #000;
}

.modal-body {
    padding: 10px 0;
}

.modal-body ul {
    list-style-type: none;
    padding-left: 0;
}

.modal-body ul li {
    margin-bottom: 8px;
}

.modal-body p {
    margin: 5px 0;
}

    </style>
 @endsection
@section('content')

<div class="body flex-grow-1">

    <div class="container-lg px-4">
        <div class="fs-2 fw-semibold">Orders</div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Orders</li>
            </ol>
        </nav>

        <livewire:restaurant-orders :menus="$menus" />

    </div>
</div>
   {{-- @include('user-crud-modals') --}}

   <script>
    if (Notification.permission !== 'granted') {
        Notification.requestPermission().then(function(permission) {
            if (permission === 'granted') {
                console.log('Notification permission granted!');
            }
        });
    }
</script>

    <!-- CoreUI and necessary plugins-->
    <script src="{{asset('assets')}}/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
    <script src="{{asset('assets')}}/vendors/simplebar/js/simplebar.min.js"></script>
    <script src="{{asset('assets')}}/vendors/i18next/js/i18next.min.js"></script>
    <script src="{{asset('assets')}}/vendors/i18next-http-backend/js/i18nextHttpBackend.js"></script>
    <script src="{{asset('assets')}}/vendors/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.js"></script>
    <script src="{{asset('assets')}}/js/i18next.js"></script>
    <script>
      const header = document.querySelector('header.header');

      document.addEventListener('scroll', () => {
        if (header) {
          header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
        }
      });
    </script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Plugins and scripts required by this view-->
    <script src="{{asset('assets')}}/vendors/jquery/js/jquery.min.js"></script>
<script src="{{asset('assets')}}/vendors/datatables.net/js/dataTables.min.js"></script>
<script src="{{asset('assets')}}/vendors/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="{{asset('assets')}}/js/datatables.js"></script>

    @livewireScripts()


@endsection





