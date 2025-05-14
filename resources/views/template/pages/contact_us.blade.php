<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact us</title>
    @include('template.layouts.head')

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        h2 i {
            margin-right: 8px;
        }
    </style>
</head>
<body>

<div class="super_container">

    <!-- Header -->
    @include('template.layouts.navbar')

    <!-- Home -->
    @include('template.layouts.home')

    <main>
        <section id="contact-form" class="container mt-1">
            <div class="row mt-5">
                <div class="col">
                    <div class="section_title text-center animate__animated animate__fadeInDown">
                        <h1>Contact Us</h1>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 animate__animated animate__fadeInUp animate__delay-1s">
                        <div class="alert alert-info" role="alert">
                            <b>
                                If you're interested in learning more about impactful work and how you and your friends can contribute to this nation-building endeavor, please feel free to send a message, and our Gift Officers will get back to you!
                            </b>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-4 mb-3 mr-1 p-4 text-light animate__animated animate__fadeInLeft animate__delay-2s" style="background-color: #085590;">
                        <h2 class="text-center"><i class="fas fa-map-marker-alt"></i>Address</h2>
                        <h3 class="text-center mt-3">RIC Secretariat NUST H-12 Islamabad</h3>
                    </div>
                    <div class="col-md-3 mb-3 mr-1 p-4 text-light animate__animated animate__fadeInUp animate__delay-2s" style="background-color: #085590;">
                        <h2 class="text-center"><i class="far fa-envelope"></i>Email</h2>
                        <a href="mailto:advancement@nust.edu.pk" class="text-light text-decoration-none">
                            <h3 class="text-center mt-3">advancement@nust.edu.pk</h3>
                        </a>
                    </div>
                    <div class="col-md-4 mb-3 p-4 text-light animate__animated animate__fadeInRight animate__delay-2s" style="background-color: #085590;">
                        <h2 class="text-center"><i class="fas fa-phone"></i> Phone</h2>
                        <h3 class="text-center mt-3">+92 336 5317822</h3>
                    </div>
                </div>
            </div>
        </section>
        <br>
    </main>

    @include('template.layouts.footer')

</body>
</html>
