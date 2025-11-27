<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo me-1">
                <span class="text-primary">
                    <svg width="30" height="24" viewBox="0 0 250 196" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                    </svg>
                </span>
            </span>
            <span class="app-brand-text demo menu-text fw-semibold ms-2">Materio</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="menu-toggle-icon d-xl-inline-block align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    @php
        $isDashboardActive = request()->routeIs('dashboard');
        $isStudentsActive = request()->routeIs('students.*');
        $isStudentStoriesActive = request()->routeIs('student.stories.*');
        $isTeamActive = request()->routeIs('team.*');
        $isSupportHostelActive = request()->routeIs('supporthostel.*'); // NEW
    @endphp

    <ul class="menu-inner py-1">

        <!-- Dashboard -->
        <li class="menu-item {{ $isDashboardActive ? 'active open' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link {{ $isDashboardActive ? 'active' : '' }}">
                <i class="menu-icon icon-base ri ri-home-smile-line"></i>
                <div data-i18n="Dashboards">Dashboards</div>
                <div class="badge text-bg-danger rounded-pill ms-auto">5</div>
            </a>
        </li>

        <!-- Students -->
        <li class="menu-item {{ $isStudentsActive ? 'active open' : '' }}">
            <a href="#studentsMenu" class="menu-link menu-toggle {{ $isStudentsActive ? 'active' : '' }}"
                data-bs-toggle="collapse" role="button" aria-expanded="{{ $isStudentsActive ? 'true' : 'false' }}"
                aria-controls="studentsMenu">

                <i class="menu-icon icon-base ri ri-graduation-cap-line"></i>
                <div data-i18n="Students">Students</div>
            </a>

            <ul id="studentsMenu" class="menu-sub collapse {{ $isStudentsActive ? 'show' : '' }}">
                <li class="menu-item {{ request()->routeIs('students.index') ? 'active' : '' }}">
                    <a href="{{ route('students.index') }}" class="menu-link">
                        <div data-i18n="List Students">List Students</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('students.create') ? 'active' : '' }}">
                    <a href="{{ route('students.create') }}" class="menu-link">
                        <div data-i18n="Create Student">Create Student</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Adopted Students -->
        <li class="menu-item {{ request()->routeIs('adopted-students.*') ? 'active open' : '' }}">
            <a href="#adoptedStudentsMenu"
                class="menu-link menu-toggle {{ request()->routeIs('adopted-students.*') ? 'active' : '' }}"
                data-bs-toggle="collapse" role="button"
                aria-expanded="{{ request()->routeIs('adopted-students.*') ? 'true' : 'false' }}"
                aria-controls="adoptedStudentsMenu">

                <i class="menu-icon icon-base ri ri-user-heart-line"></i>
                <div data-i18n="Adopted Students">Adopted Students</div>
            </a>

            <ul id="adoptedStudentsMenu"
                class="menu-sub collapse {{ request()->routeIs('adopted-students.*') ? 'show' : '' }}">
                <li class="menu-item {{ request()->routeIs('adopted-students.index') ? 'active' : '' }}">
                    <a href="{{ route('adopted-students.index') }}" class="menu-link">
                        <div data-i18n="List Adopted Students">List Adopted Students</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Hostel Adopted Students -->
        <li class="menu-item {{ request()->routeIs('hostel-adopted-students.*') ? 'active open' : '' }}">
            <a href="#hostelAdoptedStudentsMenu"
                class="menu-link menu-toggle {{ request()->routeIs('hostel-adopted-students.*') ? 'active' : '' }}"
                data-bs-toggle="collapse" role="button"
                aria-expanded="{{ request()->routeIs('hostel-adopted-students.*') ? 'true' : 'false' }}"
                aria-controls="hostelAdoptedStudentsMenu">

                <i class="menu-icon icon-base ri ri-building-4-line"></i>
                <div data-i18n="Hostel Adopted Students">Hostel Adopted Students</div>
            </a>

            <ul id="hostelAdoptedStudentsMenu"
                class="menu-sub collapse {{ request()->routeIs('hostel-adopted-students.*') ? 'show' : '' }}">
                <li class="menu-item {{ request()->routeIs('hostel.adopted-students.index') ? 'active' : '' }}">
                    <a href="{{ route('hostel.adopted-students.index') }}" class="menu-link">
                        <div data-i18n="List Hostel Adopted Students">List Hostel Adopted Students</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Endowment Models -->
        <li class="menu-item {{ request()->routeIs('endowment.*') ? 'active open' : '' }}">
            <a href="#endowmentMenu"
                class="menu-link menu-toggle {{ request()->routeIs('endowment.*') ? 'active' : '' }}"
                data-bs-toggle="collapse" role="button"
                aria-expanded="{{ request()->routeIs('endowment.*') ? 'true' : 'false' }}"
                aria-controls="endowmentMenu">

                <i class="menu-icon icon-base ri ri-hand-heart-line"></i>
                <div data-i18n="Endowment Models">Endowment Models</div>
            </a>

            <ul id="endowmentMenu" class="menu-sub collapse {{ request()->routeIs('endowment.*') ? 'show' : '' }}">
                <li class="menu-item {{ request()->routeIs('endowment.annual.defult') ? 'active' : '' }}">
                    <a href="{{ route('endowment.annual.defult') }}" class="menu-link">
                        <div data-i18n="Annual">Annual Defult</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->routeIs('endowment.annual.custom') ? 'active' : '' }}">
                    <a href="{{ route('endowment.annual.custom') }}" class="menu-link">
                        <div data-i18n="Annual">Annual Custom</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->routeIs('endowment.fulldegree.defult') ? 'active' : '' }}">
                    <a href="{{ route('endowment.fulldegree.defult') }}" class="menu-link">
                        <div data-i18n="Annual">Four Year Defult</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->routeIs('endowment.fulldegree.custom') ? 'active' : '' }}">
                    <a href="{{ route('endowment.fulldegree.custom') }}" class="menu-link">
                        <div data-i18n="Annual">Four Year Custom</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->routeIs('endowment.perpetual_seat.defult') ? 'active' : '' }}">
                    <a href="{{ route('endowment.perpetual_seat.defult') }}" class="menu-link">
                        <div data-i18n="Annual">Perpetual Seat List</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('endowment.zakat.fund') ? 'active' : '' }}">
                    <a href="{{ route('endowment.zakat.fund') }}" class="menu-link">
                        <div data-i18n="Annual">Zakat Fund</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Student Stories -->
        <li class="menu-item {{ $isStudentStoriesActive ? 'active open' : '' }}">
            <a href="#studentStoriesMenu" class="menu-link menu-toggle {{ $isStudentStoriesActive ? 'active' : '' }}"
                data-bs-toggle="collapse" role="button"
                aria-expanded="{{ $isStudentStoriesActive ? 'true' : 'false' }}" aria-controls="studentStoriesMenu">

                <i class="menu-icon icon-base ri ri-book-line"></i>
                <div data-i18n="Student Stories">Student Stories</div>
            </a>

            <ul id="studentStoriesMenu" class="menu-sub collapse {{ $isStudentStoriesActive ? 'show' : '' }}">
                <li class="menu-item {{ request()->routeIs('student.stories.paynow.index') ? 'active' : '' }}">
                    <a href="{{ route('student.stories.paynow.index') }}" class="menu-link">
                        <div data-i18n="List Stories">List Stories Payment</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('student.stories.pledge.index') ? 'active' : '' }}">
                    <a href="{{ route('student.stories.pledge.index') }}" class="menu-link">
                        <div data-i18n="Add Payment">List Stories Pledge</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Fund a Project -->
        <li class="menu-item {{ request()->routeIs('fundproject.*') ? 'active open' : '' }}">
            <a href="#fundProjectMenu"
                class="menu-link menu-toggle {{ request()->routeIs('fundproject.*') ? 'active' : '' }}"
                data-bs-toggle="collapse" role="button"
                aria-expanded="{{ request()->routeIs('fundproject.*') ? 'true' : 'false' }}"
                aria-controls="fundProjectMenu">

                <i class="menu-icon icon-base ri ri-hand-coin-line"></i>
                <div data-i18n="Fund a Project">Fund a Project</div>
            </a>

            <ul id="fundProjectMenu"
                class="menu-sub collapse {{ request()->routeIs('fundproject.*') ? 'show' : '' }}">

                <li class="menu-item {{ request()->routeIs('fundproject.boysHostel') ? 'active' : '' }}">
                    <a href="{{ route('fundproject.boysHostel') }}" class="menu-link">
                        <div data-i18n="Boys Hostel">Boys Hostel</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->routeIs('fundproject.girlsHostel') ? 'active' : '' }}">
                    <a href="{{ route('fundproject.girlsHostel') }}" class="menu-link">
                        <div data-i18n="Girls Hostel">Girls Hostel</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->routeIs('fundproject.mosque') ? 'active' : '' }}">
                    <a href="{{ route('fundproject.mosque') }}" class="menu-link">
                        <div data-i18n="Mosque">Mosque</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->routeIs('fundproject.businessCenter') ? 'active' : '' }}">
                    <a href="{{ route('fundproject.businessCenter') }}" class="menu-link">
                        <div data-i18n="Business Center">Business Center</div>
                    </a>
                </li>

            </ul>
        </li>

        <!-- NEW Support Hostel Project -->
        <li class="menu-item {{ $isSupportHostelActive ? 'active open' : '' }}">
            <a href="#supportHostelMenu" class="menu-link menu-toggle {{ $isSupportHostelActive ? 'active' : '' }}"
                data-bs-toggle="collapse" role="button"
                aria-expanded="{{ $isSupportHostelActive ? 'true' : 'false' }}" aria-controls="supportHostelMenu">

                <i class="menu-icon icon-base ri ri-building-line"></i>
                <div data-i18n="Support Hostel Project">Support Hostel Project</div>
            </a>

            <ul id="supportHostelMenu" class="menu-sub collapse {{ $isSupportHostelActive ? 'show' : '' }}">

                <li class="menu-item {{ request()->routeIs('support.hostel.index') ? 'active' : '' }}">
                    <a href="{{ route('support.hostel.index') }}" class="menu-link">
                        <div data-i18n="List Support Hostel">List Support Hostel</div>
                    </a>
                </li>


            </ul>
        </li>

        <!-- Team -->
        <li class="menu-item {{ $isTeamActive ? 'active open' : '' }}">
            <a href="#teamMenu" class="menu-link menu-toggle {{ $isTeamActive ? 'active' : '' }}"
                data-bs-toggle="collapse" role="button" aria-expanded="{{ $isTeamActive ? 'true' : 'false' }}"
                aria-controls="teamMenu">

                <i class="menu-icon icon-base ri ri-group-line"></i>
                <div data-i18n="Team">Team</div>
            </a>

            <ul id="teamMenu" class="menu-sub collapse {{ $isTeamActive ? 'show' : '' }}">
                <li class="menu-item {{ request()->routeIs('team.index') ? 'active' : '' }}">
                    <a href="{{ route('team.index') }}" class="menu-link">
                        <div data-i18n="List Team">List Team</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('team.create') ? 'active' : '' }}">
                    <a href="{{ route('team.create') }}" class="menu-link">
                        <div data-i18n="Create Team">Create Team</div>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</aside>
