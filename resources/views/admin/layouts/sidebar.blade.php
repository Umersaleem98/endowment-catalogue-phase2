<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Application Brand -->
        <div class="app-brand">
            <a href="{{ url('dashboard') }}">
                <img src="{{ asset('admin/images/logo.png') }}" alt="Mono" style="widows: 200px; height: 50px;">
                <span class="brand-name">Catalogue</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-left" data-simplebar style="height: 100%;">
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <!-- Existing Dropdowns -->

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#email"
                        aria-expanded="false" aria-controls="email">
                        <i class="mdi mdi-email"></i>
                        <span class="nav-text">Students</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="email" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('add_new_student') }}">
                                    <span class="nav-text">Add New Student</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('student_list') }}">
                                    <span class="nav-text">Student List</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#adoptedStudents" aria-expanded="false" aria-controls="adoptedStudents">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">Adopted Students</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="adoptedStudents" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('adopted_students_list') }}">
                                    <span class="nav-text">Adopted Students List</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#hostel"
                        aria-expanded="false" aria-controls="hostel">
                        <i class="mdi mdi-home"></i>
                        <span class="nav-text">Hostel</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="hostel" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('hostel_list') }}">
                                    <span class="nav-text">Hostel List</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>


                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#student-stories" aria-expanded="false" aria-controls="student-stories">
                        <i class="mdi mdi-book"></i>
                        <span class="nav-text">Student Stories Payments</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="student-stories" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('student_story_payment') }}">
                                    <span class="nav-text">Student Profile Payment</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('student_story_pledge_payment') }}">
                                    <span class="nav-text">Student Profile Pledge Payment</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>


                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#endowment" aria-expanded="false" aria-controls="endowment">
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
                                <a class="sidenav-item-link" href="{{ url('fouryear_endowment_list') }}">
                                    <span class="nav-text">FoutYear</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('perpetualseat_endowment_list') }}">
                                    <span class="nav-text">Perpetual Seat</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>


                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#custom-package" aria-expanded="false" aria-controls="custom-package">
                        <i class="mdi mdi-package-variant-closed"></i>
                        <span class="nav-text">Custom Package</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="custom-package" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('custom_oneyear_endowment_list') }}">
                                    <span class="nav-text">Custom One Year</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('custom_fouryear_endowment_list') }}">
                                    <span class="nav-text">Custom Four Year</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('custom_perpetualseat_endowment_list') }}">
                                    <span class="nav-text">Custom Perpetual</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#fund-project" aria-expanded="false" aria-controls="fund-project">
                        <i class="mdi mdi-lightbulb-outline"></i>
                        <span class="nav-text">Fund a Project</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="fund-project" data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            <li>
                                <a class="sidenav-item-link" href="{{ url('boys_hostel_project_list') }}">
                                    <span class="nav-text">Boys Hostel</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('girls_hostel_project_list') }}">
                                    <span class="nav-text">Girls Hostel</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('mosque_project_list') }}">
                                    <span class="nav-text">Mosque</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('business_center_project_list') }}">
                                    <span class="nav-text">Business Center</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <!-- New Zakat Dropdown Tab -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#zakat" aria-expanded="false" aria-controls="zakat">
                        <i class="mdi mdi-charity"></i>
                        <span class="nav-text">Zakat</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="zakat" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('zakat_payments_list') }}">
                                    <span class="nav-text">Zakat Payments</span>
                                </a>
                            </li>

                        </div>
                    </ul>
                </li>
                <!-- End Zakat Dropdown Tab -->

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#teams" aria-expanded="false" aria-controls="teams">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">Teams</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="teams" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('team_list') }}">
                                    <span class="nav-text">Team List</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('add_team') }}">
                                    <span class="nav-text">Add Team Member</span>
                                </a>
                            </li>

                        </div>
                    </ul>
                </li>

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#events" aria-expanded="false" aria-controls="events">
                        <i class="mdi mdi-calendar-check"></i> <!-- You can use a relevant icon for Events -->
                        <span class="nav-text">Events</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="events" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('event_list') }}">
                                    <span class="nav-text">Event List</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('event_create') }}">
                                    <span class="nav-text">Add Event</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>


                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#users" aria-expanded="false" aria-controls="users">
                        <i class="mdi mdi-account-multiple"></i> <!-- Icon for Users -->
                        <span class="nav-text">Users</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="users" data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            <li>
                                <a class="sidenav-item-link" href="{{ url('user_create') }}">
                                    <span class="nav-text">Add User</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ url('user_list') }}">
                                    <span class="nav-text">User List</span>
                                </a>
                            </li>

                        </div>
                    </ul>
                </li>

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#customData" aria-expanded="false" aria-controls="customData">
                        <i class="mdi mdi-database"></i> <!-- Icon for Custom Data -->
                        <span class="nav-text">Country Data Management</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="customData" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('country_data_list') }}">
                                    <span class="nav-text">Country</span>
                                </a>
                            </li>

                            <li>
                                <a class="sidenav-item-link" href="{{ url('country_data_index') }}">
                                    <span class="nav-text">Create Country</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>

                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#ugCourse" aria-expanded="false" aria-controls="ugCourse">
                        <i class="mdi mdi-school"></i> <!-- Icon for UG Course -->
                        <span class="nav-text">UG Course Management</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="ugCourse" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('ug_course_list') }}">
                                    <span class="nav-text">UG Course List</span>
                                </a>
                            </li>

                            <li>
                                <a class="sidenav-item-link" href="{{ url('ug_course_create') }}">
                                    <span class="nav-text">Create UG Course</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>


                <!-- PG Course Management -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#pgCourse" aria-expanded="false" aria-controls="pgCourse">
                        <i class="mdi mdi-school"></i> <!-- Icon for PG Course -->
                        <span class="nav-text">PG Course Management</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="pgCourse" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ url('pg_course_list') }}">
                                    <span class="nav-text">PG Course List</span>
                                </a>
                            </li>

                            <li>
                                <a class="sidenav-item-link" href="{{ url('pg_course_create') }}">
                                    <span class="nav-text">Create PG Course</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</aside>
