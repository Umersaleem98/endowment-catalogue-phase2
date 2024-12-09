<header class="main-header" id="header">
  <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
    <!-- Sidebar toggle button -->
    <button id="sidebar-toggler" class="sidebar-toggle">
      <span class="sr-only">Toggle navigation</span>
    </button>

    <span class="page-title">Dashboard</span>

    <div class="navbar-right">

      <ul class="nav navbar-nav">
        <!-- Offcanvas -->
       
        <!-- User Account -->
        <li class="dropdown user-menu">
          <button class="dropdown-toggle nav-link" data-toggle="dropdown">
            <img src="{{ asset('admin/images/user/user-xs-01.jpg') }}" class="user-image rounded-circle" alt="User Image" />
            <span class="d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
            <li class="dropdown-footer">
              <a class="dropdown-link-item" href="{{ url('logout') }}"> <i class="mdi mdi-logout"></i> Log Out </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
