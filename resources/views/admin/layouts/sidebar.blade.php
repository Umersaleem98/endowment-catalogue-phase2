<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Application Brand -->
        <div class="app-brand">
            <a href="/index.html">
                <img src="admin/images/logo.png" alt="Mono" style="widows: 200px; height: 50px;">
                <span class="brand-name">Catalogue</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-left" data-simplebar style="height: 100%;">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#email"
                        aria-expanded="false" aria-controls="email">
                        <i class="mdi mdi-email"></i>
                        <span class="nav-text">Students</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="email" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                           
                            <li>
                                <a class="sidenav-item-link" href="{{ url('student_list') }}">
                                    <span class="nav-text">Student List</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>

                <!-- New Dropdown Tab -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#endowment"
                        aria-expanded="false" aria-controls="endowment">
                        <i class="mdi mdi-cash"></i>
                        <span class="nav-text">Default Endowment Fund</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="endowment" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('oneyear_endowment_list') }}">
                                    <span class="nav-text">OneYear</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('create-endowment') }}">
                                    <span class="nav-text">Create Fund</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <!-- End New Dropdown Tab -->

                <li class="section-title">
                    UI Elements
                </li>
            </ul>
        </div>
    </div>
</aside>
