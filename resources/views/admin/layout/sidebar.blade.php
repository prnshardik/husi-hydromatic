<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img style="-webkit-border-radius: 50%" src="{{ asset('backend/assets/img/admin-avatar.png') }}" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">{{ auth()->user()->name }}</div>
                <small>
                    @if(auth()->user()->is_admin == 'y')
                        Administrator 
                    @else
                        User
                    @endif
                </small>
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li class="{{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                <a class="{{ Request::is('admin/dashboard*') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/categories*') ? 'active' : '' }}">
                <a class="{{ Request::is('admin/categories*') ? 'active' : '' }}" href="{{ route('admin.categories') }}"><i class="sidebar-item-icon fa fa-bars"></i>
                    <span class="nav-label">Categories</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/products*') ? 'active' : '' }}">
                <a class="{{ Request::is('admin/products*') ? 'active' : '' }}" href="{{ route('admin.products') }}"><i class="sidebar-item-icon fa fa-tasks"></i>
                    <span class="nav-label">Products</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/contactus*') ? 'active' : '' }}">
                <a class="{{ Request::is('admin/contactus*') ? 'active' : '' }}" href="{{ route('admin.contactus') }}"><i class="sidebar-item-icon fa fa-envelope"></i>
                    <span class="nav-label">Contact US</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/settings*') ? 'active' : '' }}">
                <a class="{{ Request::is('admin/settings*') ? 'active' : '' }}" href="{{ route('admin.settings') }}"><i class="sidebar-item-icon fa fa-cogs"></i>
                    <span class="nav-label">Settings</span>
                </a>
            </li>
        </ul>
    </div>
</nav>