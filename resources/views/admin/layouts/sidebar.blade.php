<!-- Page Sidebar -->
<div class="page-sidebar">

    <!-- Site header  -->
    <header class="site-header">
        <div class="site-logo">
            <a href="{{route('admin.home')}}">
{{--                <img src="{{asset('assets/admin/images/logo.png')}}" width="180" alt="Adaption Tracker" title="Adaption Tracker">--}}
            </a>
        </div>
        <div class="sidebar-collapse hidden-xs"><a class="sidebar-collapse-icon" href="#"><i class="icon-menu"></i></a></div>
        <div class="sidebar-mobile-menu visible-xs"><a data-target="#side-nav" data-toggle="collapse" class="mobile-menu-icon" href="#"><i class="icon-menu"></i></a></div>
    </header>
    <!-- /site header -->

    <!-- Main navigation -->
    <ul id="side-nav" class="main-menu navbar-collapse collapse">

        <li class="{{Route::is('admin.home') ? 'active' : ''}}">
            <a href="{{route('admin.home')}}">
                <i class="icon-gauge"></i><span class="title">Dashboard</span>
            </a>
        </li>
        <li class="has-sub {{Route::is('admin.clients.*') ? 'active' : ''}}">
            <a href=""><i class="icon-layout"></i><span class="title">Users</span></a>
            <ul class="nav collapse">
                <li class="{{Route::is('admin.clients.create') ? 'active' : ''}}"><a href="{{route('admin.clients.create')}}"><span class="title">Add New</span></a></li>
                <li class="{{Route::is('admin.clients.index') ? 'active' : ''}}"><a href="{{route('admin.clients.index')}}"><span class="title">Show All</span></a></li>
                <li class="{{Route::is('admin.clients.destroyAll') ? 'active' : ''}}"><a href="{{route('admin.clients.destroyAll')}}"><span class="title">Delete All Data</span></a></li>
                <li class="{{Route::is('admin.clients.destroyRegistered') ? 'active' : ''}}"><a href="{{route('admin.clients.destroyRegistered')}}"><span class="title">Delete Registers</span></a></li>
            </ul>
        </li>
    </ul>
    <!-- /main navigation -->
</div>
<!-- /page sidebar -->
