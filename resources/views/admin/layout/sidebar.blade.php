<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{ asset('backend/assets/img/admin-avatar.png') }}" width="45px" />
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
        </ul>
    </div>
</nav>