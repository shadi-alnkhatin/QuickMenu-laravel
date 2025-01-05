<!DOCTYPE html>
<html lang="en">
    <head>
        @yield('head')
        <link rel="icon" type="image/png" href="{{asset('assets/icon.png')}}"> 

        <style>
            .spinner {
                border: 4px solid rgba(0, 0, 0, 0.1);
                border-left-color: rgba(91,104,235,1);
                border-radius: 50%;
                width: 70px;
                height: 70px;
                animation: spin 1s linear infinite;
            }

            @keyframes spin {
                to {
                    transform: rotate(360deg);
                }
            }
        </style>
    </head>
  <body>
        <!-- Loading Animation -->
        <div id="loading" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: white; display: flex; justify-content: center; align-items: center; z-index: 9999;">
            <div class="spinner"></div> <!-- Add your spinner or animation here -->
        </div>

    @include('layouts.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100">

        @include('layouts.nav')
        @yield('content')



    </div>

      <script src="{{asset('assets')}}/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
      <script src="{{asset('assets')}}/vendors/simplebar/js/simplebar.min.js"></script>
      <script src="{{asset('assets')}}/vendors/i18next/js/i18next.min.js"></script>
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
        window.addEventListener('load', function() {
            document.getElementById('loading').style.display = 'none';
            document.getElementById('app').style.display = 'block';
        });
    </script>

    </body>
  </html>
