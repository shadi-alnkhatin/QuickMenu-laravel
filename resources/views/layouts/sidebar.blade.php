<div class="sidebar sidebar-fixed sidebar-dark bg-dark-gradient border-end" id="sidebar">

    <div class="sidebar-header border-bottom">
      <div class="sidebar-brand">
            <h1>          Quick Menu
            </h1>
      </div>
      <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
      <button class="btn-close d-lg-none" type="button" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
      <li class="nav-item"><a class="nav-link" href="index.html">
          <svg class="nav-icon">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
          </svg><span data-coreui-i18n="dashboard">Dashboard</span></a></li>

      <li class="nav-divider"></li>
      <li class="nav-title" data-coreui-i18n="plugins">
        Plugins</li>
      <li class="nav-item"><a class="nav-link" href="calendar.html">
          <svg class="nav-icon">
            <use xlink:href="{{asset('assets')}}/vendors/@coreui/icons/svg/free.svg#cil-calendar"></use>
          </svg><span data-coreui-i18n="calendar">Calendar</span><span class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
      <li class="nav-item"><a class="nav-link" href="charts.html">
          <svg class="nav-icon">
            <use xlink:href="{{asset('assets')}}/vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
          </svg><span data-coreui-i18n="charts">Charts</span></a></li>
      <li class="nav-item"><a class="nav-link" href="datatables.html">
          <svg class="nav-icon">
            <use xlink:href="{{asset('assets')}}/vendors/@coreui/icons/svg/free.svg#cil-spreadsheet"></use>
          </svg> DataTables<span class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
      <li class="nav-item"><a class="nav-link" href="google-maps.html">
          <svg class="nav-icon">
            <use xlink:href="{{asset('assets')}}/vendors/@coreui/icons/svg/free.svg#cil-map"></use>
          </svg> Google Maps<span class="badge bg-danger-gradient ms-auto">PRO</span></a></li>



    </ul>
  </div>

<div class="sidebar sidebar-fixed sidebar-dark bg-dark-gradient border-end" id="sidebar">
    <div class="sidebar-header border-bottom">
      <div class="sidebar-brand">
        <h2>Quick Menu</h2>
      </div>
      <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
      <button class="btn-close d-lg-none" type="button" data-coreui-theme="dark" aria-label="Close" onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
    </div>

    @if (auth()->check()&&(auth()->user()->isUser()))
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="{{route('dashboard')}}">
            Dashboard</a></li>

      <li class="nav-title" >
        Manage Your Menu</li>
      <li class="nav-item"><a class="nav-link" href="{{route('menu.index')}}">
          <svg class="nav-icon">
            <use xlink:href="{{asset('assets')}}/vendors/@coreui/icons/svg/free.svg#cil-calendar"></use>
          </svg><span >Your Menus</span></a></li>
      <li class="nav-item"><a class="nav-link" href="{{route('orders.index')}}">
          <svg class="nav-icon">
            <use xlink:href="{{asset('assets')}}/vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
          </svg><span >Orders</span></a></li>
          <li class="nav-title" >
            Account</li>
      <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">
        <svg class="nav-icon">
            <use xlink:href="{{asset('assets')}}/vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
          </svg> Contact With Admin</a></li>
      <li class="nav-item"><a class="nav-link" href="{{route('profile')}}">
          <svg class="nav-icon">
            <use xlink:href="{{asset('assets')}}/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
          </svg> Profile</a></li>
          <li class="nav-item">  @livewire('logout-button')</li>

    </ul>
    @elseif (  auth()->check()&&(auth()->user()->isAdmin()))

    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item"><a class="nav-link" href="{{route('dashboard')}}">
             Dashboard</a></li>

        <li class="nav-title" >
          Manage Tables</li>
          <li class="nav-item"><a class="nav-link" href="{{route('users.index')}}">
            <svg class="nav-icon">
              <use xlink:href="{{asset('assets')}}/vendors/@coreui/icons/svg/free.svg#cil-people"></use>
            </svg> Users</a></li>
         <li class="nav-item"><a class="nav-link" href="{{route('subscribers.index')}}">
            <svg class="nav-icon">
              <use xlink:href="{{asset('assets')}}/vendors/@coreui/icons/svg/free.svg#cil-money"></use>
            </svg> Subscription</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('contact-admin')}}">
                <svg class="nav-icon">
                  <use xlink:href="{{asset('assets')}}/vendors/@coreui/icons/svg/free.svg#cil-money"></use>
                </svg> Messages</a></li>
            <li class="nav-title">
              Account</li>

        <li class="nav-item"><a class="nav-link" href="{{route('profile')}}">
            <svg class="nav-icon">
              <use xlink:href="{{asset('assets')}}/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
            </svg> Profile</a></li>
            <li class="nav-item">
                @livewire('logout-button')

               </li>
     </ul>
    @endif
  </div>
