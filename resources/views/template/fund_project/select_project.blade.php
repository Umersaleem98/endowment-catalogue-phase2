<!DOCTYPE html>
<html lang="en">

<head>
    <title>Select Projects</title>
    @include('template.layouts.head')

    <!-- AOS CSS (Animation Library) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>

    <div class="super_container">

        <!-- Header -->
        @include('template.layouts.navbar')

        @include('template.layouts.home')
        <br>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="container mt-5 mb-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="section_title text-center" data-aos="fade-down" data-aos-duration="1000">
                        <h1 class="">Build a Lasting Legacy</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hostel & Mosque Section -->
        <div class="container">
            <div class="row g-4">
                <!-- Girls Hostel -->
                <div class="col-md-6 d-flex" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="bg-section d-flex flex-column justify-content-center align-items-center text-center text-white"
                        style="background: url('{{ asset('templates/images/girl-hostel.JPG') }}') no-repeat center center/cover; min-height: 300px; border-radius: 10px; position: relative; overflow: hidden;">

                        <!-- Overlay -->
                        <div
                            style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); border-radius:10px;">
                        </div>

                        <!-- Content -->
                        <div style="position:relative; z-index:2; padding:20px;">
                            <h2 class="fw-bold">Why Invest in Girls Hostel?</h2>
                            <p>The construction of a girls' hostel at our university is a pivotal step toward fostering
                                an inclusive, safe, and supportive educational envi-ronment. By providing secure and
                                affordable accommodation, we ensure that female students from diverse backgrounds can
                                pursue their academic goals without the added stress of finding suitable housing. This
                                initiative not only promotes gender equity but also enhances the overall academic
                                performance and well-being of our students. Investing in this project means investing in
                                the future lead-ers, innovators, and professionals who will drive our society forward.
                                We invite you to join us in this transformative endeavor, creating last-ing impact and
                                empowering the next generation of women scholars.</p>
                        </div>
                    </div>
                </div>

                <!-- Mosque -->
                <div class="col-md-6 d-flex" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="200">
                    <div class="bg-section d-flex flex-column justify-content-center align-items-center text-center text-white"
                        style="background: url('{{ asset('templates/images/nust-mosque.jpg') }}') no-repeat center center/cover; min-height: 300px; border-radius: 10px; position: relative; overflow: hidden;">

                        <!-- Overlay -->
                        <div
                            style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); border-radius:10px;">
                        </div>

                        <!-- Content -->
                        <div style="position:relative; z-index:2; padding:20px;">
                            <h2 class="fw-bold">Why Invest in a Mosque?</h2>
                            <p>Investing in the construction of a mosque at NUST offers a unique opportunity to foster
                                spiritual growth and community cohesion among our diverse student body. Supporting this
                                project means contributing to the holistic development of our students, promoting values
                                of peace, understanding, and unity. By building a mosque, you are invest-ing in the
                                moral and ethical foundation of future leaders, ensuring they have the spiritual support
                                needed to thrive in their academic and personal lives. Your generosity will leave a
                                legacy, enriching the lives of countless students by keeping them connected to their
                                core values as Muslims and ensure a harmonious campus environment.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Projects Section -->
        <div class="container mt-5">
            <div class="row">
                <div class="col" data-aos="fade-up" data-aos-duration="1000">
                    <div class="section_title text-center">
                        <h1 class="">Select Project for Funds</h1>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container mt-3">
                <div class="row g-4">
                    @foreach ($project_categories as $item)
                        <div class="col-md-6 mb-4" data-aos="flip-left" data-aos-duration="1200">
                            <div class="card h-100 shadow-lg border-0 rounded-3">
                                <img src="{{ asset('templates/project_category/' . $item->project_image) }}"
                                    class="card-img-top rounded-top" alt="{{ $item->project_name }} image"
                                    style="height: 250px; object-fit: cover;">
                                <div class="card-body text-center d-flex flex-column justify-content-between">
                                    <h2 class="card-title text-dark">{{ $item->project_name }}</h2>
                                    <a href="{{ url($item->links, ['id' => $item->id]) }}" class="btn btn-primary mt-3"
                                        data-aos="fade-up" data-aos-delay="200">Invest</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12 mb-3 p-4" style="background-color: #004476 " data-aos="fade-right"
                    data-aos-duration="1200">
                    <h2 class="text-center mt-4 text-warning">Partnerships Paving Way for a
                        Transformative Pakistan</h2>
                    <hr>
                    <p class="text-light">On January 1, 2020, the Pakistan Navy Engineering College NUST (PNEC NUST) in
                        Karachi proudly
                        inaugurated the new Begum Yusuf H. Shirazi Girls Hostel. This project was made possible through
                        the generous philanthropic support of the Atlas Foundation. The newly completed block, designed
                        to accommodate 72 female students, spans three floors, each featuring eight rooms.
                    </p>
                    <p class="text-light">
                        Additionally, the Atlas Foundation funded the renovation and uplift of the old hostel building
                        at a cost of approximately PKR 5.4 million. This comprehensive upgrade included the expansion of
                        the dining hall, the construction of a new kitchen, and roof treatment.
                    </p>
                    <p class="text-light"> This initiative stands as a testament to the significant impact that
                        philanthropic contributions can make in enhancing educational facilities. We invite other donors
                        to join us in creating similar opportunities and fostering an environment that supports and
                        empowers our students.
                    </p>
                </div>
                <div class="col-md-6 mb-4" data-aos="fade-up-right" data-aos-duration="1000">
                    <img src="{{ asset('templates/images/partnership1.jpeg') }}"
                        class="img-fluid rounded shadow custom-image" alt="Mission Image">
                </div>
                <div class="col-md-6 mb-4" data-aos="fade-up-left" data-aos-duration="1000">
                    <img src="{{ asset('templates/images/partnership2.jpeg') }}"
                        class="img-fluid rounded shadow custom-image" alt="Mission Image">
                </div>
            </div>
        </div>

        <br><br>
        <!-- Footer -->
        @include('template.layouts.footer')

    </div>

    <!-- jQuery + Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
