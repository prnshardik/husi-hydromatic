<header class="header">
    <div class="page-brand">
        <a class="link" href="{{ route('admin.dashboard') }}">
            <span class="brand">{{ _site_title() }}</span>
            <span class="brand-mini">{{ _site_title_sf() }}</span>
        </a>
    </div>
    <div class="flexbox flex-1">
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
            </li>
        </ul>
        <ul class="nav navbar-toolbar">
            <li class="dropdown dropdown-user">
                <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                    <img src="{{ asset('backend/assets/img/admin-avatar.png') }}" />
                    <span></span>{{ auth()->user()->name }}<i class="fa fa-angle-down m-l-5"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fa fa-power-off"></i>Logout</a>
                </ul>
            </li>
        </ul>
    </div>
</header>