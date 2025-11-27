<!DOCTYPE html>
<html lang="en">

<head>
    <title>Select Projects</title>
    @include('Layouts.templates.head')

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        .project-bg {
            min-height: 320px;
            border-radius: 12px;
            position: relative;
            overflow: hidden;
            color: white;
            display: flex;
            align-items: center;
            text-align: center;
            padding: 30px;
            background-size: cover;
            background-position: center;
        }

        .project-bg:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0.55);
            z-index: 1;
        }

        .project-bg-content {
            position: relative;
            z-index: 2;
        }

        .card-img-top {
            height: 250px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="super_container">

        @include('Layouts.templates.navbar')
        @include('Layouts.templates.home')


        <br><br> <br><br><br>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <!-- Title -->
        <div class="container mt-5">
            <h1 class="text-center text-dark" data-aos="fade-down">Build a Lasting Legacy</h1>
        </div>

        <!-- Intro Sections (Girls Hostel + Mosque) -->
        <div class="container mt-4">
            <div class="row g-4">

                <!-- Girls Hostel -->
                <div class="col-md-6" data-aos="zoom-in">
                    <div class="project-bg"
                        style="background-image: url('{{ asset('templates/images/girl-hostel.JPG') }}');">
                        <div class="project-bg-content">
                            <h2>Why Invest in Girls Hostel?</h2>
                            <p>A safe & supportive space for female students. Your contribution promotes gender equity
                                and empowers future women leaders.</p>
                        </div>
                    </div>
                </div>

                <!-- Mosque -->
                <div class="col-md-6" data-aos="zoom-in" data-aos-delay="150">
                    <div class="project-bg"
                        style="background-image: url('{{ asset('templates/images/nust-mosque.jpg') }}');">
                        <div class="project-bg-content">
                            <h2>Why Invest in Mosque?</h2>
                            <p>Support a peaceful spiritual hub for students to grow morally and spiritually.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Project Selection -->
        <div class="container-fluid mt-5">
            <h1 class="text-center text-dark" data-aos="fade-up">Select Project for Funds</h1>
            <hr>

            <div class="row g-4 mt-3 justify-content-center">

                <!-- Boys Hostel -->
                <div class="col-md-3" data-aos="flip-left">
                    <div class="card shadow-lg border-0 rounded-3 h-100">
                        <img src="{{ asset('templates/project_category/boys-hostel.jpg') }}" class="card-img-top">
                        <div class="card-body text-center">
                            <h2 class="card-title">Boys Hostel</h2>
                            <a href="{{ route('boys.hostel.index') }}" class="btn btn-primary mt-3">Invest</a>
                        </div>
                    </div>
                </div>

                <!-- Girls Hostel -->
                <div class="col-md-3" data-aos="flip-left">
                    <div class="card shadow-lg border-0 rounded-3 h-100">
                        <img src="{{ asset('templates/project_category/girls-hostel.jpg') }}" class="card-img-top">
                        <div class="card-body text-center">
                            <h2 class="card-title">Girls Hostel</h2>
                            <a href="{{ route('girls.hostel.index') }}" class="btn btn-primary mt-3">Invest</a>
                        </div>
                    </div>
                </div>

                <!-- Mosque -->
                <div class="col-md-3" data-aos="flip-left">
                    <div class="card shadow-lg border-0 rounded-3 h-100">
                        <img src="{{ asset('templates/project_category/mosque.jpg') }}" class="card-img-top">
                        <div class="card-body text-center">
                            <h2 class="card-title">Mosque</h2>
                            <a href="{{ route('mosque.project.index') }}" class="btn btn-primary mt-3">Invest</a>
                        </div>
                    </div>
                </div>

                <!-- Business Center -->
                <div class="col-md-3" data-aos="flip-left">
                    <div class="card shadow-lg border-0 rounded-3 h-100">
                        <img src="{{ asset('templates/project_category/business-center.jpg') }}" class="card-img-top">
                        <div class="card-body text-center">
                            <h2 class="card-title">Business Center</h2>
                            <a href="{{ route('business.center.index') }}" class="btn btn-primary mt-3">Invest</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Partnership Section -->
        <div class="container mt-5 mb-5">
            <div class="row">

                <div class="col-md-12 p-4 mb-3 bg-primary text-light rounded" data-aos="fade-right">
                    <h2 class="text-warning text-center">Partnerships Paving Way for a Transformative Pakistan</h2>
                    <hr>
                    <p class="text-light">
                        The new Girls Hostel at PNEC NUST was generously funded by the Atlas Foundation,
                        benefiting 72 students and uplifting residential facilities.
                    </p>
                </div>

                <div class="col-md-6" data-aos="fade-up-right">
                    <img src="{{ asset('templates/images/partnership1.jpeg') }}"
                        class="img-fluid rounded shadow w-100">
                </div>

                <div class="col-md-6" data-aos="fade-up-left">
                    <img src="{{ asset('templates/images/partnership2.jpeg') }}"
                        class="img-fluid rounded shadow w-100">
                </div>

            </div>
        </div>

        @include('Layouts.templates.footer')

    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>

</html>
