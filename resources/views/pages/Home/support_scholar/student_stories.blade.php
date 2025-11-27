<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Profile</title>
    @include('Layouts.templates.head')

    <style>
        .profile-container {
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.10);
        }

        .profile-img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 12px;
        }

        .blur-img {
            filter: blur(10px);
        }

        .info-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .info-value {
            font-size: 16px;
            color: #555;
        }

        .hero_box {
            border-radius: 10px;
            transition: 0.3s;
        }

        .hero_box:hover {
            transform: translateY(-5px);
            background: #f1f1f1;
        }

        .disabled-link {
            pointer-events: none;
            cursor: not-allowed !important;
            opacity: 0.5;
        }
    </style>
</head>

<body>

    <div class="super_container">

        @include('Layouts.templates.navbar')
        @include('Layouts.templates.home')

        @php
            // Disable Make a Pledge and Pay Now buttons if any one is 1
            $isLocked = $students->make_pledge == 1 || $students->payment_approved == 1;
        @endphp

        <div class="services page_section">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h1 class="text-dark fw-bold">Student Profile</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Section -->
        <div class="container mb-5">
            <div class="profile-container">

                <div class="row">

                    <!-- LEFT: Student Image -->
                    <div class="col-md-4 mb-4">
                        @php
                            $actualImagePath = public_path('uploads/students/' . $students->images);

                            if (!empty($students->images) && file_exists($actualImagePath)) {
                                // Real Image → blur
                                $finalImage = asset('uploads/students/' . $students->images);
                                $imageClass = 'blur-img';
                            } else {
                                // Dummy image → no blur
                                if (strtolower($students->gender) == 'female') {
                                    $finalImage = asset('uploads/students/dummy/girl.jpg');
                                } else {
                                    $finalImage = asset('uploads/students/dummy/boy.png');
                                }
                                $imageClass = '';
                            }
                        @endphp

                        <img src="{{ $finalImage }}" class="profile-img {{ $imageClass }}">
                    </div>

                    <!-- RIGHT: Student Info -->
                    <div class="col-md-8">

                        {{-- <h2 class="fw-bold mb-3">{{ $students->student_name }}</h2> --}}

                        <div class="row mb-2">
                            <div class="col-md-5 info-title">Gender:</div>
                            <div class="col-md-7 info-value">{{ $students->gender }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-5 info-title">Program:</div>
                            <div class="col-md-7 info-value">{{ $students->program }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-5 info-title">Degree:</div>
                            <div class="col-md-7 info-value">{{ $students->degree ?? 'N/A' }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-5 info-title">Year of Admission:</div>
                            <div class="col-md-7 info-value">{{ $students->year_of_admission ?? 'N/A' }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-5 info-title">Father Name:</div>
                            <div class="col-md-7 info-value">{{ $students->father_name ?? 'N/A' }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-5 info-title">Province:</div>
                            <div class="col-md-7 info-value">{{ $students->province ?? 'N/A' }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-5 info-title">Domicile:</div>
                            <div class="col-md-7 info-value">{{ $students->domicile ?? 'N/A' }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-5 info-title">Monthly Income:</div>
                            <div class="col-md-7 info-value">{{ $students->monthly_income ?? 'N/A' }}</div>
                        </div>

                        <hr>

                        <h2 class="fw-bold mt-3 text-secondary">Student Story</h2>
                        <p class="info-value">
                            {{ $students->statement_of_purpose ?? 'No story added yet.' }}
                        </p>

                    </div>

                </div>

            </div>
        </div>

        <!-- Action Buttons -->
        <div class="container">
            <div class="row justify-content-center">

                <!-- Make a Pledge -->
                <div class="col-12 col-sm-6 col-md-4 mb-3">
                    <div
                        class="hero_box d-flex flex-row align-items-center justify-content-start p-3 
                        {{ $isLocked ? 'disabled-link' : '' }}">

                        <a href="{{ $isLocked ? '#' : route('Make.a.Pledge', ['id' => $students->id]) }}"
                            class="d-flex align-items-center {{ $isLocked ? 'disabled-link' : '' }}"
                            {{ $isLocked ? 'aria-disabled=true' : '' }}>

                            <img src="{{ asset('templates/images/forward-svgrepo-com.svg') }}" class="svg"
                                alt="">
                            <div class="hero_box_content">
                                <h2 class="hero_box_title">Make a Pledge</h2>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Pay Now -->
                <div class="col-12 col-sm-6 col-md-4 mb-3">
                    <div
                        class="hero_box d-flex flex-row align-items-center justify-content-start p-3 
                        {{ $isLocked ? 'disabled-link' : '' }}">

                        <a href="{{ $isLocked ? '#' : route('payment.stories.index', ['id' => $students->id]) }}"
                            class="d-flex align-items-center {{ $isLocked ? 'disabled-link' : '' }}"
                            {{ $isLocked ? 'aria-disabled=true' : '' }}>

                            <img src="{{ asset('templates/images/bank-svgrepo-com.svg') }}" class="svg"
                                alt="">
                            <div class="hero_box_content">
                                <h2 class="hero_box_title">Pay Now</h2>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Hostel Support -->
                <div class="col-12 col-sm-6 col-md-4 mb-3">
                    <div
                        class="hero_box d-flex flex-row align-items-center justify-content-start p-3 
                        {{ $students->hostel_status == 1 ? 'disabled-link' : '' }}">

                        <a href="{{ $students->hostel_status == 1 ? '#' : url('hostel.support', ['id' => $students->id]) }}"
                            class="d-flex align-items-center {{ $students->hostel_status == 1 ? 'disabled-link' : '' }}"
                            {{ $students->hostel_status == 1 ? 'aria-disabled=true' : '' }}>

                            <img src="{{ asset('templates/images/home-svgrepo-com.svg') }}" class="svg"
                                alt="">
                            <div class="hero_box_content">
                                <h2 class="hero_box_title">Hostel Support</h2>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <hr class="mt-5">
        @include('Layouts.templates.footer')

    </div>

</body>

</html>
