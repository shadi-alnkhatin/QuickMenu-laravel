@extends('layouts.base')


 @section('head')

 <base href="./">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact Messages</title>
    <link rel="stylesheet" href="{{asset('assets')}}/vendors/simplebar/css/simplebar.css">
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
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
                    <div class="table-responsive">
                    <table class="table table-striped border datatable">
                      <thead>
                        <tr>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Subject</th>
                          <th>Message</th>

                        </tr>
                      </thead>
                      <tbody>
                       @foreach ($contacts as $contact )
                            <tr class="align-middle">
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->subject}}</td>
                                <td>{{$contact->message}}</td>
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





