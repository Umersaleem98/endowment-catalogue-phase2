<title>Select Endowment Model</title>
@include('template.layouts.head')

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    @media (max-width: 767px) {
        .ml-sm-5 {
            margin-left: 0 !important;
        }
    }

    .icon-container {
        font-size: 2rem;
    }

    .card-title {
        color: orange;
    }

    .card-link {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: black;
    }

    .card-link i {
        margin-right: 10px;
    }
</style>
</head>

<body>

    <div class="super_container">

        <!-- Header -->
        @include('template.layouts.navbar')
        @include('template.layouts.home')

        <div class="events page_section">
            <div class="container">

                <div class="col-md-8">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                </div>


                <div class="row mb-5">
                    <div class="col">
                        <div class="section_title text-center">
                            <h1 class="">Scholarship Giving Avenues</h1>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Card 1 -->
                    <div class="col-md-6 mb-2" data-aos="fade-up" data-aos-delay="100">
                        <div class="card" style="background-color: #004476; max-height: 180px;">
                            <div class="card-body">
                                <a href="{{ route('index.support.for.entire.year') }}" class="card-link">
                                    <div class="icon-container mr-3"><br>
                                        <i class="fas fa-book text-light"></i>
                                    </div>
                                    <div>
                                        <h2 class="card-title text-warning">Adopt a Scholar for Complete Degree</h2>
                                        <h3 class="card-text text-light">Sponsor a scholar’s entire undergraduate
                                            journey, ensuring four years of education at NUST.</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-6 mb-2" data-aos="fade-up" data-aos-delay="200">
                        <div class="card" style="background-color: #004476; min-height: 175px;">
                            <div class="card-body">
                                <a href="{{ route('index.perpetual.seat') }}" class="card-link">
                                    <div class="icon-container mr-3"><br>
                                        <i class="fas fa-chair text-light"></i>
                                    </div>
                                    <div>
                                        <h2 class="card-title text-warning">Endowment: Create a Legacy</h2>
                                        <h3 class="card-text text-light">Invest in Education by Creating Seats for
                                            Deserving Scholar</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-6 mb-2" data-aos="fade-up" data-aos-delay="300">
                        <div class="card" style="background-color: #004476; min-height: 175px;">
                            <div class="card-body">
                                <a href="{{ route('index.support.for.one.year') }}" class="card-link">
                                    <div class="icon-container mr-3"><br>
                                        <i class="fas fa-graduation-cap text-light"></i>
                                    </div>
                                    <div>
                                        <h2 class="card-title text-warning">Sponsor One Year of Education</h2>
                                        <h3 class="card-text text-light">Empower a scholar with stress-free studies for
                                            an entire year at NUST.</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="col-md-6 mb-2" data-aos="fade-up" data-aos-delay="400">
                        <div class="card" style="background-color: #004476; min-height: 165px;">
                            <div class="card-body">
                                <a href="{{ route('endowment.zakat.funds') }}" class="card-link">
                                    <div class="icon-container mr-3"><br>
                                        <i class="fas fa-hands-helping text-light"></i>
                                    </div>
                                    <div>
                                        <h2 class="card-title text-warning">Zakat</h2>
                                        <h3 class="card-text text-light">Entrust your zakat in our Shariah-compliant
                                            NEED Initiative & support needy scholars in their pursuit of higher
                                            education.</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Add more cards if needed, just increase delay (500, 600...) -->
                </div>
            </div>
        </div>

        <!-- Footer -->
        @include('template.layouts.footer')

    </div>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, // animation duration in ms
            once: true // whether animation should happen only once
        });
    </script>
