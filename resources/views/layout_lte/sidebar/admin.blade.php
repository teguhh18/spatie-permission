@can('user-read')
    <li class="nav-header">USER MANAGEMENT</li>
    <li class="nav-item">
        <a href="{{ route('admin.users.index') }}"
            class="nav-link {{ request()->is('admin/user-management*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
                Manage Users
            </p>
        </a>
    </li>
@endcan

@can('role-read')
    <li class="nav-item">
        <a href="{{ route('admin.roles.index') }}" class="nav-link {{ request()->is('admin/roles*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-tag"></i>
            <p>
                Manage Roles
            </p>
        </a>
    </li>
@endcan

@can('permission-read')
    <li class="nav-item">
        <a href="{{ route('admin.permissions.index') }}"
            class="nav-link {{ request()->is('admin/permissions*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-shield-alt"></i>
            <p>
                Manage Permissions
            </p>
        </a>
    </li>
@endcan