<style>
    .carousel-item {
        height: 80vh; /* Adjust the height as needed */
        min-height: 300px;
        background: no-repeat center center scroll;
        background-size: cover;
    }
    .carousel-caption {
        bottom: 50%;
        transform: translateY(50%);
    }
    .carousel-caption h1 {
        font-size: 2rem;
        font-weight: bold;
        color: #FFB606;
    }
    .carousel-caption .btn {
        margin-top: 1rem;
        font-size: 1rem;
        font-weight: 700;
        color: #000;
        background-color: #FFB606;
        border-color: #FFB606;
        height: 60px; /* Set height */
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    @media (min-width: 768px) {
        .carousel-caption h1 {
            font-size: 3rem;
        }
        .carousel-caption .btn {
            font-size: 1.5rem;
            height: 80px; /* Set height */
        }
    }
    .carousel-item img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    @media (max-width: 576px) {
        .responsive-text {
            font-size: 1rem;
        }
    }
    @media (min-width: 577px) and (max-width: 768px) {
        .responsive-text {
            font-size: 1.1rem;
        }
    }
    @media (min-width: 769px) and (max-width: 992px) {
        .responsive-text {
            font-size: 1rem;
        }
    }
    @media (min-width: 993px) {
        .responsive-text {
            font-size: 18px;

        }
    }
</style>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-inner">
        <!-- First Slide -->
        <div class="carousel-item active">
            <img src="{{ asset('templates/images/mno.jpg') }}" alt="Slide 1">
            <div class="carousel-caption text-center">
                <h1>The support you lend today will remodel their tomorrow</h1>
                <a href="{{ url('select_endowment_model') }}" class="btn btn-outline-light btn-lg">Invest in Scholarship</a>
                <a href="{{ url('select_project') }}" class="btn btn-outline-light btn-lg">Fund a Project</a>
            </div>
        </div>
        <!-- Second Slide -->
        <div class="carousel-item">
            <img src="{{ asset('templates/images/def.jpg') }}" alt="Slide 2">
            <div class="carousel-caption text-center">
                <h1>Your gift will be passed down to generations</h1>
                <a href="{{ url('select_endowment_model') }}" class="btn btn-outline-light btn-lg">Invest in Scholarship</a>
                <a href="{{ url('select_project') }}" class="btn btn-outline-light btn-lg">Fund a Project</a>
            </div>
        </div>
        <!-- Third Slide -->
        <div class="carousel-item">
            <img src="{{ asset('templates/images/pqr.jpg') }}" alt="Slide 3">
            <div class="carousel-caption text-center">
                <h1>Build a legacy of lasting change</h1>
                <a href="{{ url('select_endowment_model') }}" class="btn btn-outline-light btn-lg">Invest in Scholarship</a>
                <a href="{{ url('select_project') }}" class="btn btn-outline-light btn-lg">Fund a Project</a>
            </div>
        </div>
    </div>

    <!-- Carousel Indicators -->
    <ol class="carousel-indicators">
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
    </ol>
</div>
<div class="container-fluid mt-4" style="background-color: #E3E3E3; ">
    <div class="row ">
        <div class="col-md-4 text-light p-3" style=" font-weight: 700; background-color: #085590">
            <h2 class="text-center text-md-left" style="font-size: 50px;">WHY</h2>
            <h2 class="text-center text-md-left " style="font-size: 40px;">CHOOSE NUST ?</h2>
            <div class="row">
                <div class="col-12">
                    <!-- Responsive image -->
                    <img src="{{ asset('templates/stats/abc.jpg') }}" class="img-fluid mt-2" alt="Responsive image" style="max-height: 400px; width: 100%">
                </div>

            </div>
            <div class="row d-flex align-items-center justify-content-center p-3">
                <h1 class="ml-3">
                    <span style="font-size: 45px;">353<sup>rd</sup></span>
                    <span style="font-size: 35px; margin-left: 5px;">According to QS World Rankings 2023-24</span>
                </h1>
            </div>


        </div>
        <div class="col-md-8">
            <div class="p-3 p-md-5 mt-5">

                <p class="text-dark responsive-text" style="text-align: justify;">
                    As <b>National University of Sciences and Technology (NUST)</b> enters its fourth decade of excellence, our commitment to quality education is reflected in our impressive ascent in the QS World University Rankings 2023-2024. We have consistently upheld our reputation as a beacon of excellence in higher education in Pakistan while being at par with contemporaries in the elite league of the top universities of the world for the past decade. Our steadfast commitment to fostering knowledge has benefited not only our students but also paved the way for sustainable solutions that can shape tomorrow.

               </p>
                    <p class="text-dark responsive-text" style="text-align: justify ">

                        <b>
                        In these transformative times, one of the measures of a world-class university by virtue of its strategic importance is building student support  scholarships. The establishment of such initiatives at NUST will help us ensure that no student quits education owing to financial constraints.
                    </b>

                    </p>
            </div>
        </div>

    </div>
</div>

<!-- Link Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0-beta2/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript for automatic sliding -->
<script>
    var carousel = document.getElementById('carouselExampleIndicators');
    var carouselInstance = new bootstrap.Carousel(carousel, {
        interval: 5000,
        wrap: true,
        keyboard: false,
        pause: 'hover',
        ride: 'carousel'
    });
</script>
