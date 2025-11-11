<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item">
        <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-th-large"></i>
            <p>
                Dashboard
            </p>
        </a>
    </li>
        @include('layout_lte.sidebar.admin')
    <li class="nav-header">SETTINGS</li>
    <li class="nav-item">
        <a href="{{ route('password.edit') }}" class="nav-link {{ request()->is('password*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users-cog"></i>
            <p>
                Profile
            </p>
        </a>
    </li>
</ul>
