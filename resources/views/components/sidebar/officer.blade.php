<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar" {{ $attributes }}>
    <a class="sidebar-brand d-flex align-items-center justify-content-center" role="button" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <img class="rounded-circle" src="{{ asset('img/avatar.jpg') }}" height="48" alt="IEBC Logo">
        </div>
        <div class="sidebar-brand-text mx-3">Officer</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('officer.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Resources</div>

    <!-- Officers -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#officers-dropdown"
            aria-expanded="true" aria-controls="officers-dropdown">
            <i class="fas fa-fw fa-users-cog"></i>
            <span>Station Officers</span>
        </a>
        <div id="officers-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="#">Browse Officers</a>
                <a class="collapse-item" href="#">Add Officer</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <!-- Observers -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#observers-dropdown"
            aria-expanded="true" aria-controls="observers-dropdown">
            <i class="fas fa-fw fa-users"></i>
            <span>Cases Observers</span>
        </a>
        <div id="observers-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="{{ route('officer.observers.index') }}">Browse Observers</a>
                <a class="collapse-item" href="{{ route('officer.observers.create') }}">Add Observer</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Cases</div>

    <!-- Station Cases -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#cases-dropdown" aria-expanded="true"
            aria-controls="cases-dropdown">
            <i class="fa fa-fw fa-folder"></i>
            <span>Our Cases</span>
        </a>
        <div id="cases-dropdown" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Quick Actions</h6>
                <a class="collapse-item" href="{{ route('officer.reports.index') }}">Browse Cases</a>
                <a class="collapse-item" href="{{ route('officer.reports.create') }}">Add Case</a>
            </div>
        </div>
    </li>

</ul>