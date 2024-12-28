@extends('layouts.base')
@section('head')
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CoreUI Bootstrap Admin Template</title>

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
    <link href="{{asset('assets')}}/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
@endsection
@section('content')
    {{-- Sidebar here --}}

     {{-- NAV hERE --}}
      <div class="body flex-grow-1">
        <div class="container-lg px-4">
          <div class="fs-2 fw-semibold" >Dashboard</div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="/" data-coreui-i18n="home">Home</a>
              </li>
              <li class="breadcrumb-item active"><span data-coreui-i18n="dashboard">Dashboard</span>
              </li>
            </ol>
          </nav>
          <div class="row">
            <div class="col-xl-4">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card overflow-hidden mb-4">
                    <div class="card-body p-4">
                      <div class="row">
                        <div class="col">
                          <div class="card-title fs-4 fw-semibold" data-coreui-i18n="sale">Sale</div>
                        </div>
                        <div class="col text-end text-primary fs-4 fw-semibold">{{$totalProfits}}$</div>
                      </div>

                    </div>
                    <div class="chart-wrapper mt-3" style="height:150px;">
                      <canvas class="chart" id="card-chart-new1" height="75"></canvas>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="card-body">
                      <div class="d-flex flex-nowrap justify-content-between">
                        <h6 class="card-title text-body-secondary text-truncate" >Last Week Sales!</h6>
                        <div class="bg-primary bg-opacity-25 text-primary p-2 rounded ms-2">
                          <svg class="icon icon-xl">
                            <use xlink:href="{{asset('assets')}}/vendors/@coreui/icons/svg/free.svg#cil-cart"></use>
                          </svg>
                        </div>
                      </div>
                      <div class="fs-4 fw-semibold pb-3">{{$lastWeekSales}}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-8">
              <div class="card mb-4">
                <div class="card-body p-4">
                  <div class="card-title fs-4 fw-semibold" data-coreui-i18n="traffic">Traffic</div>
                  <div class="card-subtitle text-body-secondary"><span data-coreui-i18n-date="date, { 'date': '2024, 1, 1'}" data-coreui-i18n-date-format="{ 'year': 'numeric', 'month': 'long', 'day': 'numeric' }">Dec,01, 2024</span>&nbsp;-&nbsp;<span data-coreui-i18n-date="date, { 'date': '2022, 12, 31'}" data-coreui-i18n-date-format="{ 'year': 'numeric', 'month': 'long', 'day': 'numeric' }">Dec 31, 2024</span></div>
                  <div class="chart-wrapper" style="height:300px;margin-top:40px;">
                    <canvas class="chart" id="main-bar-chart" height="300"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>

            <div class="col-xl-12">
              <div class="row">
                <div class="col-md-4 col-xl-4">
                  <div class="card mb-4 text-white bg-primary-gradient">
                    <div class="card-body p-4 pb-0 d-flex flex-row justify-content-between ">
                        <div>
                        <div class="fs-4 fw-semibold">33
                            {{-- <span class="fs-6 fw-normal">(-12.4%
                            <svg class="icon">
                              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                            </svg>)</span> --}}

                        </div>
                        <div > Menu Scans</div>
                      </div>
                      <div class="dropdown">
                        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg class="icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                          </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#" data-coreui-i18n="action">Action</a><a class="dropdown-item" href="#" data-coreui-i18n="anotherAction">Another action</a><a class="dropdown-item" href="#" data-coreui-i18n="somethingElseHere">Something else here</a></div>
                      </div>
                    </div>
                    <div class="chart-wrapper mt-3 mx-3" style="height:80px;">
                      <canvas class="chart" id="card-chart1" height="70"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-xl-4">
                  <div class="card mb-4 text-white bg-warning-gradient">
                    <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start">
                      <div>
                        <div class="fs-4 fw-semibold">{{$totalOrders}}
                            {{-- <span class="fs-6 fw-normal">(84.7%
                            <svg class="icon">
                              <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                            </svg>)</span> --}}
                        </div>
                        <div>Total Orders</div>
                      </div>
                      <div class="dropdown">
                        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg class="icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                          </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#" data-coreui-i18n="action">Action</a><a class="dropdown-item" href="#" data-coreui-i18n="anotherAction">Another action</a><a class="dropdown-item" href="#" data-coreui-i18n="somethingElseHere">Something else here</a></div>
                      </div>
                    </div>
                    <div class="chart-wrapper mt-3" style="height:80px;">
                      <canvas class="chart" id="card-chart3" height="70"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-xl-4">
                  <div class="card mb-4 text-white bg-danger-gradient">
                    <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start">
                      <div>
                        <div class="fs-4 fw-semibold">
                           {{$totalMenus}}
                        </div>
                        <div >Total Menu</div>
                      </div>
                      <div class="dropdown">
                        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg class="icon">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                          </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#" data-coreui-i18n="action">Action</a><a class="dropdown-item" href="#" data-coreui-i18n="anotherAction">Another action</a><a class="dropdown-item" href="#" data-coreui-i18n="somethingElseHere">Something else here</a></div>
                      </div>
                    </div>
                    <div class="chart-wrapper mt-3 mx-3" style="height:80px;">
                      <canvas class="chart" id="card-chart4" height="70"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- /.row-->
        </div>
      </div>

@endsection
