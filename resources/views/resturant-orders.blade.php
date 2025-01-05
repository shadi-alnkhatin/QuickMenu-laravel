@extends('layouts.base')

 @section('head')

 <base href="./">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Orders</title>
    @livewireStyles
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/simplebar/css/simplebar.css">
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">

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
table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;

}

table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
  }

  table caption {
    font-size: 1.3em;
  }

  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }

  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }

  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: 1em;

  }
  .status ,.ordered-at{
    text-align: center;
  }

  table td::before {

    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }

  table td:last-child {
    border-bottom: 0;
  }
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
<script>
    if (Notification.permission !== 'granted') {
        Notification.requestPermission().then(function(permission) {
            if (permission === 'granted') {
                console.log('Notification permission granted!');
            }
        });
    }
</script>


    <script>
      const header = document.querySelector('header.header');

      document.addEventListener('scroll', () => {
        if (header) {
          header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
        }
      });
    </script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    @livewireScripts()


@endsection





