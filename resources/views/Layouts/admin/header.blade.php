<nav class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
    id="layout-navbar">

    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
            <i class="icon-base ri ri-menu-line icon-md"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">



        <ul class="navbar-nav flex-row align-items-center ms-md-auto">

            <!-- Notification Dropdown -->
            <li class="nav-item dropdown-notifications dropdown me-3">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="icon-base ri ri-notification-line fs-4"></i>
                    <span class="badge bg-danger rounded-pill badge-notifications">3</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end py-0">
                    <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center justify-content-between p-3">
                            <h6 class="mb-0">Notifications</h6>
                            <a href="#" class="small">Mark all as read</a>
                        </div>
                    </li>
                    <li class="dropdown-notifications-list scrollable-container"
                        style="max-height: 250px; overflow-y: auto;">
                        <a href="#" class="dropdown-item d-flex align-items-start">
                            <div class="notification-icon bg-primary text-white me-3 rounded-circle p-2">
                                <i class="ri ri-mail-line"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">New message received</h6>
                                <small class="text-muted">5 minutes ago</small>
                            </div>
                        </a>

                    </li>
                    <li class="dropdown-menu-footer border-top text-center p-2">
                        <a href="#" class="btn btn-primary btn-sm w-100">View All</a>
                    </li>
                </ul>
            </li>
            <!-- /Notification Dropdown -->

            <!-- User Dropdown -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0)" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ asset('admins/assets/img/avatars/1.png') }}" alt="User"
                            class="rounded-circle" />
                    </div>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">

                    <!-- User Info -->
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('admins/assets/img/avatars/1.png') }}" alt="User"
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                    <small class="text-body-secondary">{{ Auth::user()->email }}</small>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li>
                        <div class="dropdown-divider my-1"></div>
                    </li>

                    <!-- Profile -->
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="icon-base ri ri-user-line icon-md me-3"></i>
                            <span>My Profile</span>
                        </a>
                    </li>

                    <!-- Settings -->
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="icon-base ri ri-settings-4-line icon-md me-3"></i>
                            <span>Settings</span>
                        </a>
                    </li>

                    <li>
                        <div class="dropdown-divider my-1"></div>
                    </li>

                    <!-- Logout -->
                    <li>
                        <div class="d-grid px-4 pt-2 pb-1">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-danger d-flex w-100" type="submit">
                                    <small class="align-middle">Logout</small>
                                    <i class="ri ri-logout-box-r-line ms-2 ri-xs"></i>
                                </button>
                            </form>
                        </div>
                    </li>

                </ul>
            </li>
            <!--/ User Dropdown -->

        </ul>
    </div>

</nav>
