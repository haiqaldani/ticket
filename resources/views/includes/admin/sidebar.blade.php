<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-text mx-3">
            Ticket Admin
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
   
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Interface
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('banner.index') }}">
            <i class="fas fa-fw fa-image"></i>
            <span>Banner</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('event.index') }}">
            <i class="fas fa-fw fa-image"></i>
            <span>Event</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('ticket.index') }}">
            <i class="fas fa-fw fa-image"></i>
            <span>Ticket</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('transaction.index') }}">
            <i class="fas fa-fw fa-image"></i>
            <span>Transaction</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('fund.index') }}">
            <i class="fas fa-fw fa-image"></i>
            <span>Fund</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-image"></i>
            <span>User</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
