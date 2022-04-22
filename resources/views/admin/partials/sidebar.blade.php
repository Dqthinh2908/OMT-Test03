<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePosts"
           aria-expanded="true" aria-controls="collapsePosts">
           <i class="fa-solid fa-newspaper"></i>
            <span>Tin tức</span>
        </a>
        <div id="collapsePosts" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Danh mục tin tức:</h6>
                <a class="collapse-item" href="{{route('admin.dashboard')}}">Tin tức</a>
                @can('post_add')
                <a class="collapse-item" href="{{route('admin.showAddNews')}}">Thêm tin tức</a>
                @endcan
                @can('post_trash')
                <a class="collapse-item" href="{{route('admin.showTrash')}}">Tin tức đã xóa</a>
                @endcan
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories"
           aria-expanded="true" aria-controls="collapseCategories">
           <i class="fa-solid fa-bars"></i>
            <span>Thể loại tin tức</span>
        </a>
        <div id="collapseCategories" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Thể loại</h6>
                <a class="collapse-item" href="{{route('admin.showCategories')}}">Các thể loại</a>
                <a class="collapse-item" href="{{route('admin.showAddCategory')}}">Thêm mới thể loại</a>
                <a class="collapse-item" href="{{route('admin.showCategories')}}">Thể loại đã xóa</a>

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAccount"
           aria-expanded="true" aria-controls="collapseAccount">
           <i class="fa-solid fa-user"></i>
            <span>Tài khoản</span>
        </a>
        <div id="collapseAccount" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tài khoản tòa soạn:</h6>
                <a class="collapse-item" href="{{route('admin.showUser')}}">Tài khoản </a>
                <a class="collapse-item" href="{{route('admin.showAddUser')}}">Thêm tài khoản</a>
                <a class="collapse-item" href="forgot-password.html">Tài khoản đã xóa</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Tài khoản người dùng:</h6>
                <a class="collapse-item" href="{{ route('admin.showCustomer') }}">Tài khoản</a>
                <a class="collapse-item" href="register.html">Thêm tài khoản</a>
                <a class="collapse-item" href="forgot-password.html">Tài khoản đã xóa</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComment"
           aria-expanded="true" aria-controls="collapseAccount">
           <i class="fa-solid fa-comment"></i>
            <span>Bình Luận</span>
        </a>
        <div id="collapseComment" class="collapse" aria-labelledby="headingPages" data-parent="#collapseComment">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Danh mục bình luận:</h6>
                <a class="collapse-item" href="{{ route('admin.showComment') }}">Bình luận</a>
                <a class="collapse-item" href="{{route('admin.showCommentTrash')}}">Các bình luận đã xóa</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRole"
           aria-expanded="true" aria-controls="collapseAccount">
           <i class="fa-brands fa-laravel"></i>
            <span>Vai trò</span>
        </a>
        <div id="collapseRole" class="collapse" aria-labelledby="headingPages" data-parent="#collapseRole">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Danh mục vai trò:</h6>
                <a class="collapse-item" href="{{ route('admin.showRoles') }}">Vai Trò</a>
                <a class="collapse-item" href="{{route('admin.showAddRoles')}}">Thêm vai trò</a>
                <a class="collapse-item" href="{{route('admin.showPermissionRole')}}">Thêm phân quyền vai trò</a>
                <a class="collapse-item" href="{{route('admin.showCommentTrash')}}">Các vai trò đã xóa</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#"  data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Cấu hình hệ thống</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
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
                <a class="collapse-item" href="{{route('client.home')}}">Home Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
{{--        <img class="sidebar-card-illustration mb-2" src="{{asset('admin/public/admin/img/undraw_rocket.svg')}}" alt="...">--}}
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div>

</ul>
