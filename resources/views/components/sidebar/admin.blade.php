<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" {{ $attributes }}>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" role="button" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <img class="rounded-circle" src="{{ asset('img/avatar.jpg') }}" height="48" alt="IEBC Logo">
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Resources</div>

    <!-- Stations -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#stations-dropdown"
            aria-expanded="true" aria-controls="stations-dropdown">
            <i class="fas fa-fw fa-store-alt"></i>
            <span>Police Stations</span>
        </a>
        <div id="stations-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="{{ route('admin.stations.index') }}">Browse Stations</a>
                <a class="collapse-item" href="{{ route('admin.stations.create') }}">Add Station</a>
            </div>
        </div>
    </li>

    <!-- Items -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#items-dropdown" aria-expanded="true"
            aria-controls="items-dropdown">
            <i class="fas fa-fw fa-list"></i>
            <span>Items</span>
        </a>
        <div id="items-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="{{ route('admin.items.index') }}">Browse items</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Locations</div>

    <!-- Locations -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#counties-dropdown"
            aria-expanded="true" aria-controls="counties-dropdown">
            <i class="fa fa-fw fa-flag"></i>
            <span>Locations</span>
        </a>
        <div id="counties-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="{{ route('admin.locations.index') }}">Browse Locations</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item {{ request()->routeIs('admin.reports.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.reports.index') }}">
            <i class="fa fa-fw fa-folder"></i>
            <span>All Cases</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">User Management</div>

    <!-- Roles -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#roles-dropdown" aria-expanded="true"
            aria-controls="roles-dropdown">
            <i class="fa fa-fw fa-users-cog"></i>
            <span>Roles</span>
        </a>
        <div id="roles-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="{{ route('admin.roles.index') }}">Browse Roles</a>
                <a class="collapse-item" href="{{ route('admin.roles.create') }}">Add Role</a>
            </div>
        </div>
    </li>

    <!-- Permissions -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#permissions-dropdown"
            aria-expanded="true" aria-controls="permissions-dropdown">
            <i class="fa fa-fw fa-users-cog"></i>
            <span>Permissions</span>
        </a>
        <div id="permissions-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="{{ route('admin.permissions.index') }}">Browse Permissions</a>
            </div>
        </div>
    </li>

    <!-- Officers -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#officers-dropdown"
            aria-expanded="true" aria-controls="officers-dropdown">
            <i class="fa fa-fw fa-users"></i>
            <span>Officers</span>
        </a>
        <div id="officers-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="{{ route('admin.officers.index') }}">Browse Officers</a>
                <a class="collapse-item" href="{{ route('admin.officers.create') }}">Add Officer</a>
            </div>
        </div>
    </li>




    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>