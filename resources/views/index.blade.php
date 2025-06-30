<!DOCTYPE html>
<html lang="en">

<head>

    @include('template.layouts.head')

    <style>
        body {
            background: #FFFFFF;
        }

        /* Preloader styles */
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
            animation: fadeIn 2.5s forwards; /* Reduced from 5s to 2.5s */
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
            width: 50vw;
            animation: slowBlink 1.5s infinite;
        }

        @keyframes slowBlink {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        /* Media queries for responsiveness */
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

        /* Floating WhatsApp button */
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
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader">
            <img src="{{ asset('templates/videos/preloader.gif') }}" alt="" class="img-fluid blinking-animation">
        </div>
    </div>

    <!-- Main Content -->
    <div id="content" class="super_container">
        @include('template.layouts.navbar')
        @include('template.layouts.slider')

        @include('template.layouts.video')
        {{-- @include('template.layouts.stories') --}}
        @include('template.layouts.testimonial')
        @include('template.pages.note_of_gratitude')
        {{-- @include('template.layouts.event') --}}
        @include('template.layouts.footer')
    </div>

    <!-- Floating WhatsApp Button -->
    <a href="#" onclick="redirectToWhatsApp()" class="float">
        <i class="fa fa-whatsapp my-float"></i>
    </a>

    <!-- JavaScript -->
    <script>
        window.addEventListener("load", function () {
            setTimeout(() => {
                document.getElementById("preloader").style.display = "none";
                document.getElementById("content").style.display = "block";
            }, 500); // Reduced delay time for faster loading
        });
    </script>

    <script src="{{ asset('templates/js/script.js') }}"></script>

</body>

</html>
