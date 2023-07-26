<ul style="background: #000D21" class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
    id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-0">

            <i class='fas fa-couch' style='font-size:24px'></i>

        </div>
        <div class="sidebar-brand-text mx-2">Furni.<sup></sup></div>
    </a>



    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if ($page == 'Dashboard') active @endif">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Main Section
    </div>

    <!-- Nav Item - Category -->
    <li class="nav-item @if ($page == 'Categories') active @endif">
        <a class="nav-link" href="{{ route('category.index') }}">
            <i class="fas fa-fw fa-list-alt "></i>
            <span>Categories</span></a>
    </li>



    <!-- Nav Item - Sub Category -->
    <li class="nav-item @if ($page == 'Sub Categories') active @endif">
        <a class="nav-link" href="{{ route('sub-category.index') }}">
            <i class="fas fa-fw fa-list-alt "></i>
            <span>Sub Categories</span></a>
    </li>

    <!-- Nav Item - Brand -->
    <li class="nav-item @if ($page == 'Brands') active @endif">
        <a class="nav-link" href="{{ route('brand.index') }}">
            <i class="fas fa-fw fa-list-alt "></i>
            <span>Brands</span></a>
    </li>

    <!-- Nav Item - Sizes -->
    <li class="nav-item @if ($page == 'Sizes') active @endif">
        <a class="nav-link" href="{{ route('size.index') }}">
            <i class="fas fa-fw fa-list-alt "></i>
            <span>Sizes</span></a>
    </li>

    <!-- Nav Item - Colors -->
    <li class="nav-item @if ($page == 'Colors') active @endif">
        <a class="nav-link" href="{{ route('color.index') }}">
            <i class="fas fa-fw fa-list-alt "></i>
            <span>Colors</span></a>
    </li>



    <!-- Nav Item - Products -->
    <li class="nav-item @if ($page == 'Products') active @endif">
        <a class="nav-link" href="">
            <i class="fa fa-table" aria-hidden="true"></i>
            <span>Products</span></a>
    </li>

    <!-- Nav Item - Orders -->
    <li class="nav-item @if ($page == 'Orders') active @endif">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Orders</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manage Users
    </div>

    <!-- Nav Item - Manage Users -->
    <li class="nav-item @if ($page == 'Manage Users') active @endif">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
    </li>







    <!-- Nav Item - Pages Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> --}}

    <!-- Nav Item - Charts -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li> --}}

    <!-- Nav Item - Tables -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>




    <!-- Sidebar Message -->
    {{-- <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="{{ asset('assets/backend/') }}/img/undraw_rocket.svg"
            alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!
        </p>
        <a class="btn btn-success btn-sm"
            href="{{ asset('assets/backend/') }}/https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div>  --}}

</ul>
