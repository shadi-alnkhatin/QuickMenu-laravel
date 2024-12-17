@extends('layouts.base')


 @section('head')

 <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,SCSS,HTML,RWD,Dashboard">
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
 @endsection
@section('content')

      <div class="body flex-grow-1">
        <div class="container-lg px-4">
          <div class="fs-2 fw-semibold">Messages</div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="#" data-coreui-i18n="home">Home</a>
              </li>

              <li class="breadcrumb-item active"><span>Messages</span>
              </li>
            </ol>
          </nav>
          <div class="card mb-4">
            <div class="card-header"> Messages</div>
            <div class="card-body">


                <div class="tab-content rounded-bottom">
                  <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                    <table class="table table-striped border datatable">
                      <thead>
                        <tr>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Message</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="align-middle">
                            <td>Shadi</td>
                            <td>shadisaad222@gmail.com</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis perferendis culpa eos illum incidunt. Facilis optio molestiae voluptate? Aperiam, nulla!</td>

                            <td>
                                <button type="button" class="btn btn-info me-2 edit-user-btn">
                                 <svg class="icon text-light">
                                     <use xlink:href="{{ asset('assets/vendors/@coreui/icons/svg/free.svg#cil-pen') }}"></use>
                                 </svg>
                                </button>
                                <button class="btn btn-danger delete-user-btn"
                                     type="button" >
                                <svg class="icon text-light">
                                  <use xlink:href="{{asset('assets')}}/vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                                </svg></button></td>
                          </tr>
                      </tbody>
                    </table>
                  </div>
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

    <!-- Plugins and scripts required by this view-->
    <script src="{{asset('assets')}}/vendors/jquery/js/jquery.min.js"></script>
    <script src="{{asset('assets')}}/vendors/datatables.net/js/dataTables.min.js"></script>
    <script src="{{asset('assets')}}/vendors/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{asset('assets')}}/js/datatables.js"></script>
    <script>
    </script>
@endsection





