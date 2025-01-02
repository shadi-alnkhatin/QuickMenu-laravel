<header class="header header-sticky p-0 w-100 mb-4">
    <div class="container-fluid px-4">
        <div style="width: 100%; display: flex; justify-content: space-between; align-items: center; padding: 10px; background-color: #f8f9fa; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <!-- Sidebar Toggler -->
            <button class="header-toggler d-lg-none" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
                <svg class="icon icon-lg">
                    <use xlink:href="{{asset('assets')}}/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                </svg>
            </button>

            <div style="display: flex; align-items: center; margin-left: auto; gap: 10px;">
                <span class="welcome-text" style="font-size: 1.2rem; font-weight: 500; color: #4a4a4a;">Welcome, {{auth()->user()->name}}!</span>
                <img src="https://img.freepik.com/free-vector/user-blue-gradient_78370-4692.jpg?semt=ais_hybrid" alt="User Avatar" style="width: 50px; height: 50px; border-radius: 50%; border: 2px solid #007bff;">
            </div>
        </div>
    </div>
</header>
