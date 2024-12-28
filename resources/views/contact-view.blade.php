@extends('layouts.base')
@section('head')
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="theme-color" content="#ffffff">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" />
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/simplebar/css/simplebar.css">
    <!-- Main styles for this application-->
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="{{asset('assets')}}/css/examples.css" rel="stylesheet">
    <script src="{{asset('assets')}}/js/config.js"></script>
    <script src="{{asset('assets')}}/js/color-modes.js"></script>
    <link href="{{asset('assets')}}/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
    <style>
        body {
            background: rgb(249, 247, 247);
            font-family: Arial, sans-serif;
        }

        .contact-form {
            width: 70%;
            margin: 20px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .contact-form h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .btn-custom {
            background-color: #6c63ff;
            color: white;
        }

        .btn-custom:hover {
            background-color: #574bff;
            color: #fff;
        }
        .toast {
            opacity: 1 !important;
            z-index: 9999;
      }
      .toast-success {
          background-color: #1d9f3c !important; /* Light green */
          color: #dfe0df !important; /* Dark green text */
      }
    </style>
@endsection
@section('content')
<div class="contact-form">
    <h1>Contact With Admin</h1>
    <form action="{{route('contact.store')}}" method="POST">
        @csrf
        <!-- Name input -->
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" value="{{$user->name}}" class="form-control" readonly id="name" name="name" placeholder="Enter your full name" required>
        </div>

        <!-- Email input -->
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" value="{{$user->email}}" class="form-control" readonly id="email" name="email" placeholder="Enter your email" required>
        </div>

        <!-- Subject input -->
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject">
        </div>

        <!-- Message input -->
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter your message here" required></textarea>
        </div>

        <!-- Submit button -->
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary text-light">Send Message</button>
        </div>
    </form>
</div>
@if(session('success'))
<script>
    toastr.success("{{ session('success') }}");
</script>
@endif
@endsection
