@extends('layouts.base')


 @section('head')

 <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,SCSS,HTML,RWD,Dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Users</title>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" />
    <style>
          .toast {
         opacity: 1 !important;
         z-index: 9999; /* Ensure it appears above other elements */
         }
         .toast-success {
             background-color: #1d9f3c !important; /* Light green */
             color: #dfe0df !important; /* Dark green text */
         }
    </style>
 @endsection
@section('content')

    <div class="body flex-grow-1">
        <div class="container-lg px-4">
          <div class="fs-2 fw-semibold">Subscriptions</div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="#" data-coreui-i18n="home">Home</a>
              </li>

              <li class="breadcrumb-item active"><span>Subscriptions</span>
              </li>
            </ol>
          </nav>

          <div class="card mb-4">
            <div class="card-header"> Subscriptions</div>
            <div class="card-body">


                <div class="tab-content rounded-bottom">
                  <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                    <table class="table table-striped border datatable">
                      <thead>
                        <tr>
                          <th>Username</th>
                          <th>Email</th>

                          <th>Status</th>
                          <th>Price</th>
                          <th>End At</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($subscriptions as $subscription)
                        <tr class="align-middle">
                            <td>{{ $subscription->user->name }}</td>
                            <td>{{ $subscription->user->email }}</td>
                            <td>
                                <select class="form-select change-status" data-id="{{ $subscription->id }}">
                                    <option value="active" {{ $subscription->stripe_status === 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="disabled" {{ $subscription->stripe_status === 'disabled' ? 'selected' : '' }}>Disabled</option>
                                </select>
                            </td>
                            <td>{{ $subscription->stripe_price }}$</td>
                            <td>{{ $subscription->ends_at->format('Y-m-d') }}</td>
                            <td>
                                <button class="btn btn-danger delete-user-btn" type="button">
                                    <svg class="icon text-light">
                                        <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-trash') }}"></use>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                    </table>
                  </div>
                </div>

            </div>
          </div>
        </div>
      </div>



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
    <script src="{{asset('assets')}}/vendors/jquery/js/jquery.min.js"></script>
    <script src="{{asset('assets')}}/vendors/datatables.net/js/dataTables.min.js"></script>
    <script src="{{asset('assets')}}/vendors/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{asset('assets')}}/js/datatables.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const statusDropdowns = document.querySelectorAll('.change-status');

    statusDropdowns.forEach(dropdown => {
        dropdown.addEventListener('change', function () {
            const subscriptionId = this.dataset.id;
            const newStatus = this.value;
            console.log("status changed");
            fetch(`/admin/subscriptions/${subscriptionId}/update-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')

                },
                body: JSON.stringify({ status: newStatus })
            })
            .then(response => {
                if (response.ok) {
                    toastr.success('Subscription status updated successfully!');
                } else {
                    toastr.error('Failed to update status. Please try again.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });

});

    </script>
@endsection





