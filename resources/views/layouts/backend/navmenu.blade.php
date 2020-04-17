<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('membership.index')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">KDP Market</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->

    @if($role=="admin")
    <li class="nav-item active">
        <a class="nav-link" href="{{route('membership.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Member List</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">




    <!-- Nav Item - Utilities Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link" href="{{route('membership.create')}}">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Registration</span>
        </a>
    </li>
    @endif
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span>My Information</span>
        </a>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('changeInfo')}}">Change Information</a>
                <a class="collapse-item" href="{{route('memberchangepassword')}}">Change Password</a>
            </div>
        </div>

    </li>

    {{-- <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCompany" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span>Center Info</span>
        </a>

        <div id="collapseCompany" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('companies.index')}}">List Centers</a>
                <a class="collapse-item" href="{{route('companies.create')}}">Add New Center</a>
            </div>
        </div>

    </li> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    @if($role=="admin")
    <li class="nav-item">
        <a class="nav-link" href="{{route('sponsorchart')}}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Sponsor Chart</span>
        </a>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
