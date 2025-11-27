<!DOCTYPE html>
<html lang="en">

<head>
    <title>Students Stories</title>
    @include('Layouts.templates.head')

    <style>
        .card-img-top {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }

        /* Blur only real images */
        .blur-img {
            filter: blur(7px);
        }

        /* Card Hover Effect */
        .story-card {
            transition: all 0.3s ease;
            border-radius: 10px;
            overflow: hidden;
        }

        .story-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Add some spacing around filter container */
        .filter-container {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 40px;
        }

        /* Active select styling */
        .form-select option:checked {
            background-color: #FFB606 !important;
            color: #000 !important;
        }

        /* For select itself to show active color */
        .form-select.active-filter {
            background-color: #FFB606 !important;
            color: #085590 !important;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="super_container">

        @include('Layouts.templates.navbar')
        @include('Layouts.templates.home')

        <!-- FILTER FORM -->
        <br><br>
        <br><br>
        <div class="container filter-container">
            <form method="GET" action="{{ route('student.stories') }}" id="filterForm">
                <div class="row g-3 align-items-center">

                    <!-- Gender Filter -->
                    <div class="col-md-2">
                        <select name="gender" class="form-select {{ request('gender') ? 'active-filter' : '' }}"
                            aria-label="Select Gender">
                            <option value="">All Genders</option>
                            @foreach ($genders as $gender)
                                <option value="{{ $gender }}"
                                    {{ request('gender') == $gender ? 'selected' : '' }}>
                                    {{ ucfirst($gender) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Institution Filter -->
                    <div class="col-md-2">
                        <select name="institution"
                            class="form-select {{ request('institution') ? 'active-filter' : '' }}"
                            aria-label="Select Institution">
                            <option value="">All Institutions</option>
                            @foreach ($institutions as $institution)
                                <option value="{{ $institution }}"
                                    {{ request('institution') == $institution ? 'selected' : '' }}>
                                    {{ $institution }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Province Filter -->
                    <div class="col-md-2">
                        <select name="province" class="form-select {{ request('province') ? 'active-filter' : '' }}"
                            aria-label="Select Province">
                            <option value="">All Provinces</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province }}"
                                    {{ request('province') == $province ? 'selected' : '' }}>
                                    {{ $province }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Domicile Filter -->
                    <div class="col-md-2">
                        <select name="domicile" class="form-select {{ request('domicile') ? 'active-filter' : '' }}"
                            aria-label="Select Domicile">
                            <option value="">All Domiciles</option>
                            @foreach ($domiciles as $domicile)
                                <option value="{{ $domicile }}"
                                    {{ request('domicile') == $domicile ? 'selected' : '' }}>
                                    {{ $domicile }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Program Filter -->
                    <div class="col-md-2">
                        <select name="program" class="form-select {{ request('program') ? 'active-filter' : '' }}"
                            aria-label="Select Program">
                            <option value="">All Programs</option>
                            @foreach ($programs as $program)
                                <option value="{{ $program }}"
                                    {{ request('program') == $program ? 'selected' : '' }}>
                                    {{ $program }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filter & Reset Buttons -->
                    <div class="col-md-2 d-flex gap-2">
                        <button type="submit" class="btn btn-warning">Filter</button>
                        <a href="{{ route('student.stories') }}" class="btn btn-secondary">Reset</a>
                    </div>

                </div>


                <!-- Per Page Selector (Separate row for clarity) -->
                <div class="row mt-3">
                    <div class="col-md-2">
                        <label for="perpage" class="form-label fw-bold">Results Per Page</label>
                        <select name="perpage" id="perpage" class="form-select" onchange="this.form.submit()">
                            @php
                                $perpageOptions = [50, 100, 150, 200, 250, 300];
                                $currentPerPage = request('perpage') ?? 50;
                            @endphp
                            @foreach ($perpageOptions as $option)
                                <option value="{{ $option }}"
                                    {{ $currentPerPage == $option ? 'selected' : '' }}>
                                    {{ $option }}
                                </option>
                            @endforeach
                            <option value="all" {{ $currentPerPage == 'all' ? 'selected' : '' }}>All</option>
                        </select>
                    </div>
                </div>

            </form>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <!-- STUDENT CARDS -->
        <div class="container mt-3 mb-5">
            <div class="row g-4 p-4">

                @foreach ($students as $student)
                    @php
                        // Skip if locked
                        if (
                            $student->make_pledge == 1 ||
                            $student->payment_approved == 1 ||
                            $student->hostel_status == 1
                        ) {
                            continue;
                        }
                    @endphp

                    @php
                        $actualImagePath = public_path('uploads/students/' . $student->images);

                        if (!empty($student->images) && file_exists($actualImagePath)) {
                            $finalImage = asset('uploads/students/' . $student->images);
                            $imageClass = 'blur-img';
                        } else {
                            $finalImage =
                                strtolower($student->gender) == 'female'
                                    ? asset('uploads/students/dummy/girl.jpg')
                                    : asset('uploads/students/dummy/boy.png');
                            $imageClass = '';
                        }
                    @endphp

                    <div class="col-md-3 col-sm-6">

                        <a href="{{ route('student.stories.individual', $student->id) }}"
                            class="text-decoration-none text-dark">

                            <div class="card shadow h-100 story-card">

                                <img src="{{ $finalImage }}" class="card-img-top {{ $imageClass }}"
                                    alt="Student Image">

                                <div class="card-body">
                                    <ul class="list-unstyled mb-0 mt-3">
                                        <li><strong>Gender:</strong> {{ $student->gender }}</li>
                                        <li><strong>Program:</strong> {{ $student->program }}</li>
                                        <li><strong>Province:</strong> {{ $student->province }}</li>
                                    </ul>
                                </div>

                            </div>

                        </a>

                    </div>
                @endforeach

            </div>

            <!-- PAGINATION -->
            <div class="mt-4 d-flex justify-content-center">
                {{ $students->links() }}
            </div>

        </div>

    </div>

    @include('Layouts.templates.footer')
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());

        document.addEventListener('dragstart', event => event.preventDefault());

        document.addEventListener('selectstart', event => event.preventDefault());
    </script>

</body>

</html>
