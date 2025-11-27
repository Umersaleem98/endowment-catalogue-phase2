<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fund a Project - Hostel Support</title>
    @include('Layouts.templates.head')

    <!-- Animate.css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

    <style>
        /* Smooth appearance */
        .animate__animated {
            --animate-duration: 0.9s;
        }

        .hero-title {
            font-size: 2.8rem;
            font-weight: 800;
        }

        /* Gradient background for hero */
        .hero-section {
            background: linear-gradient(135deg, #f0f4ff, #e6eeff);
            border-radius: 20px;
        }

        /* Enhanced donate button */
        .donate-btn {
            padding: 12px 40px;
            font-size: 1.25rem;
            border-radius: 50px;
            font-weight: 600;
            transition: 0.3s ease-in-out;
        }

        .donate-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        /* Improve paragraph readability */
        .info-text {
            line-height: 1.8;
            font-size: 1.1rem;
        }

        /* Image styling */
        .project-image {
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>

<body>
    <div class="super_container">

        @include('Layouts.templates.navbar')
        @include('Layouts.templates.home')
        <br><br><br>
        <!-- Main Section -->
        <div class="container py-5">

            <!-- TITLE + ALERT -->
            <div class="row justify-content-center text-center mb-5">
                @if (session('success'))
                    <div class="alert alert-success animate__animated animate__fadeInDown w-75 mx-auto">
                        {{ session('success') }}
                    </div>
                @endif

                <h1 class="hero-title text-dark animate__animated animate__fadeInDown">
                    Support Hostel Construction
                </h1>

                <p class="text-muted mt-2 animate__animated animate__fadeIn animate__delay-1s">
                    Help us provide a safe and supportive home for Pakistan’s brightest young women.
                </p>
            </div>

            <!-- CONTENT ROW -->
            <div class="row align-items-center hero-section p-4 p-md-5 shadow-sm">

                <!-- IMAGE -->
                <div class="col-lg-5 text-center mb-4 mb-lg-0">
                    <img src="{{ asset('templates/project_category/hostel_project.jpg') }}" alt="Hostel Project"
                        class="img-fluid project-image animate__animated animate__zoomIn">
                </div>

                <!-- TEXT CONTENT -->
                <div class="col-lg-7">

                    <h2 class="fw-bold text-dark mb-3 animate__animated animate__fadeInUp animate__delay-1s">
                        Help Us Build a Home for Future Leaders
                    </h2>

                    <p class="info-text text-dark animate__animated animate__fadeInUp animate__delay-2s">
                        At NUST, access to world-class education must be matched with access to safe residential
                        facilities. Every year, hundreds of deserving young women secure admission but struggle to
                        continue due to limited hostel capacity.
                    </p>

                    <p class="info-text text-dark animate__animated animate__fadeInUp animate__delay-3s">
                        Over <strong>700 female students</strong> remain on the waiting list each year, and
                        <strong>30–40%</strong> cannot enroll because they have nowhere to stay.
                    </p>

                    <p class="info-text text-dark animate__animated animate__fadeInUp animate__delay-4s">
                        To address this need, NUST is constructing a modern Girls Hostel Complex with accommodation for
                        <strong>150 female students</strong>, including dining, common rooms, laundry, and accessibility
                        support.
                    </p>

                    <p class="info-text text-dark animate__animated animate__fadeInUp animate__delay-5s">
                        Your contribution can open doors for deserving women who dream of shaping Pakistan’s future.
                    </p>

                    <!-- DONATE BUTTON -->
                    <a href="{{ route('hostel.project.payments') }}"
                        class="btn btn-primary donate-btn shadow animate__animated animate__fadeInUp animate__delay-6s">
                        Donate Now
                    </a>

                </div>
            </div>

        </div>

        @include('Layouts.templates.footer')

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
