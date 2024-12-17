<!DOCTYPE html>
<html lang="en">
    <head>
        @yield('head')
    </head>
  <body>
    @include('layouts.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100">

        @include('layouts.nav')
        @yield('content')



    </div>
    {{-- <footer class="footer px-5">
        <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io/product/bootstrap-dashboard-template/">Bootstrap Admin Template</a> © 2023 creativeLabs.</div>
        <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI PRO UI Components</a></div>
      </footer> --}}
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
      <script src="{{asset('assets')}}/vendors/chart.js/js/chart.umd.js"></script>
      <script src="{{asset('assets')}}/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
      <script src="{{asset('assets')}}/vendors/@coreui/utils/js/index.js"></script>
      <script src="{{asset('assets')}}/js/main.js"></script>
      <script>
      </script>

    </body>
  </html>
