<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (Request::is('admin/dashboard')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item {{ (Request::is('admin/category*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('category.index') }}">
            <i class="fa fa-book"></i>
            <span>Category</span></a>
    </li>
    <li class="nav-item {{ (Request::is('admin/post*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('post.index') }}">
            <i class="fa fa-file"></i>
            <span>Post</span></a>
    </li>
    <li class="nav-item {{ (Request::is('admin/tag*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('tag.index') }}">
            <i class="fa fa-tag"></i>
            <span>Tag</span></a>
    </li>
    <li class="nav-item {{ (Request::is('admin/slider*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('slider.index') }}">
            <i class="fa fa-play"></i>
            <span>Slider</span></a>
    </li>
    <li class="nav-item {{ (Request::is('admin/subscriber*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('subscriber.index') }}">
            <i class="fa fa-folder"></i>
            <span>Subcribers</span></a>
    </li>
    <li class="nav-item {{ (Request::is('admin/comment*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('comment.index') }}">
            <i class="fa fa-comments"></i>
            <span>Comment</span></a>
    </li>
    <li class="nav-item {{ (Request::is('admin/menu*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('menu.index') }}">
            <i class="fa fa-th-list"></i>
            <span>Menu</span></a>
    </li>
    <li class="nav-item {{ (Request::is('admin/contact*')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('contact.index') }}">
            <i class="fa fa-envelope"></i>
            <span>Contact Center</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
