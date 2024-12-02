<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact us</title>
    @include('template.layouts.head')
    <style>

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
                <div class="section_title text-center">
                    <h1 class="">Contact Us</h1>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
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
                <div class="col-md-4 mb-3 mr-1 p-4 text-light" style="background-color: #085590;">
                    <i></i>
                    <h2 class="text-center"><i class="fas mr-3 fa-map-marker-alt"></i>Address</h2>
                    <h3 class="text-center mt-3">RIC Secretariat NUST H-12 Islamabad</h3>
                </div>
                <div class="col-md-3 mb-3 mr-1 p-4 text-light" style="background-color: #085590;">
                    <h2 class="text-center"><i class="far mr-3 fa-envelope"></i>Email</h2>
                    <a href="mailto:advancement@nust.edu.pk" class="text-light text-decoration-none">
                        <h3 class="text-center text-light mt-3">advancement@nust.edu.pk</h3>
                    </a>
                </div>
                <div class="col-md-4 mb-3 p-4 text-light" style="background-color: #085590;">
                    <h2 class="text-center"><i class="fas mr-3 fa-phone"></i> Phone</h2>
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
