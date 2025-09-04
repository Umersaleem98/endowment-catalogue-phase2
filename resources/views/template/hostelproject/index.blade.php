<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fund a Project - Hostel Support</title>
    @include('template.layouts.head')

    <!-- Animate.css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

    <style>
        /* Smooth appearance */
        .animate__animated {
            --animate-duration: 1s;
        }
        .hero-title {
            font-size: 2.5rem;
        }
        .donate-btn {
            transition: transform 0.3s ease;
        }
        .donate-btn:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="super_container">

        <!-- Header -->
        @include('template.layouts.navbar')
        @include('template.layouts.home')

        <!-- Hostel Project Section -->
        <div class="container py-5">
            <div class="row justify-content-center text-center mb-5">
                @if (session('success'))
                    <div class="alert alert-success animate__animated animate__fadeInDown">
                        {{ session('success') }}
                    </div>
                @endif
                <h1 class="fw-bold display-5 text-dark hero-title animate__animated animate__fadeInDown">
                    Support Hostel Construction
                </h1>
                {{-- <p class="text-muteddarkmate__animated animate__fadeIn animate__delay-1s">
                    Together we can build a brighter future for Pakistan’s young women.
                </p> --}}
            </div>

            <div class="row align-items-center">
                <!-- Image -->
                <div class="col-md-5 text-center mb-4 mb-md-0">
                    <img src="{{ asset('templates/project_category/hostel_project.jpg') }}" 
                         alt="Hostel Project"
                         class="img-fluid rounded-4 shadow-lg animate__animated animate__zoomIn">
                </div>

                <!-- Content -->
                <div class="col-md-7">
                    <h2 class="fw-bold text-dark mb-3 animate__animated animate__fadeInUp animate__delay-1s">
                        Help Us Build a Home for Future Leaders
                    </h2>

                    <p class="fs-5 text-dark mb-3 animate__animated animate__fadeInUp animate__delay-2s">
                        At NUST, we believe that access to quality education goes hand in hand with access to safe and supportive accommodation. Each year, hundreds of bright young women from across Pakistan earn their place at NUST. Yet, many are unable to pursue their dreams simply because of limited hostel capacity.
                    </p>

                    <p class="fs-5 text-dark animate__animated animate__fadeInUp animate__delay-3s">
                        Currently, over 700 female students remain on the waiting list annually, and nearly 30–40% of admitted students cannot enroll due to the lack of residential facilities. For many of them, commuting is impossible — and a hostel seat is their only chance to study at NUST.
                    </p>

                    <p class="fs-5 text-dark animate__animated animate__fadeInUp animate__delay-4s">
                        To address this challenge, we are developing a state-of-the-art Girls Hostel Complex at our Islamabad campus. The facility will provide secure, well-equipped accommodation for 150 female students, including common rooms, dining facilities, laundry areas, and accessibility support.
                    </p>

                    <p class="fs-5 text-dark animate__animated animate__fadeInUp animate__delay-5s">
                        By contributing, you open the doors of education to deserving young women, empowering them to chase their dreams and shape Pakistan’s future.
                    </p>

                    <!-- Donate Button -->
                    <a href="{{ route('hostel.project.payments') }}"
                       class="btn btn-primary btn-lg rounded-pill px-4 shadow-sm mt-4 donate-btn animate__animated animate__fadeInUp animate__delay-6s">
                        Donate Now
                    </a>
                </div>
            </div>
        </div>

        @include('template.layouts.footer')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
