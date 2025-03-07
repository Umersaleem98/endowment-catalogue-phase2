<!DOCTYPE html>
<html lang="en">

<head>

    @include('template.layouts.head')
    <style>
        body {
            background: #FFFFFF;
        }

        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            animation: fadeIn 5s forwards;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        /* Hide content initially */
        #content {
            display: none;
        }

        /* Increase preloader image size */
        .loader img {
            height: 50vw;
            /* Adjust height as needed */
            width: 50vw;
            /* Adjust width as needed */
            animation: slowBlink 1.5s infinite;
            /* Add animation for slow blinking */
        }

        @keyframes slowBlink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        /* Media queries for different screen sizes */
        @media (max-width: 768px) {
            .loader img {
                height: 60vw;
                width: 60vw;
            }
        }

        @media (max-width: 576px) {
            .loader img {
                height: 70vw;
                width: 70vw;
            }
        }

        /* float button  */
        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .my-float {
            margin-top: 16px;
        }
    </style>
</head>

<body style="background-color: #FFFFFF;">
    <div id="preloader">
        <div class="loader">
            <img src="{{ asset('templates/videos/preloader.gif') }}" alt="" class="img-fluid blinking-animation">
        </div>
    </div>

    <div id="content" class="super_container">
        <!-- Header -->
        @include('template.layouts.navbar')
        @include('template.layouts.slider')
       
        {{-- @include('template.statistics') --}}
        <!-- Home -->

        <!-- Popular -->
        @include('template.layouts.stories')

        @include('template.layouts.testimonial')

        @include('template.pages.note_of_gratitude')

        <!-- Events -->
        @include('template.layouts.event')

        <!-- Footer -->
        @include('template.layouts.footer')

        {{-- @include('template.layouts.popup') --}}
    </div>

  
<a href="#" onclick="redirectToWhatsApp()" class="float">
    <i class="fa fa-whatsapp my-float"></i>
</a>


<script src="{{ asset('templates\js\script.js') }}">

</script>
</body>

</html>
