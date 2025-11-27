<!DOCTYPE html>
<html lang="en">

<head>
    @include('Layouts.templates.head')

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
            animation: fadeIn 2.5s forwards;
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

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        /* Responsive preloader */
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

        /* ===== Overlay Background ===== */
        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 99998;
        }

        /* ===== Popup Banner ===== */
        #popupBanner {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: transparent;
            /* fully transparent */
            border: none;
            padding: 0;
            text-align: center;
            width: 700px;
            max-width: 95%;
            z-index: 99999;
            animation: popupFadeIn 0.8s ease-out;
        }

        /* Fade-in animation */
        @keyframes popupFadeIn {
            from {
                opacity: 0;
                transform: translate(-50%, -60%);
            }

            to {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
        }

        /* Close button */
        #popupBanner button {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            border: none;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            font-size: 20px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
            z-index: 1000;
        }

        #popupBanner button:hover {
            background: #e60000;
            transform: scale(1.1);
        }

        /* Full Image */
        #popupBanner img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            display: block;
        }

        /* Donate Button under image */
        #popupBanner a.btn {
            margin-top: 15px;
            background: linear-gradient(45deg, #007bff, #00c6ff);
            border: none;
            padding: 12px 25px;
            border-radius: 30px;
            font-size: 16px;
            color: #fff;
            transition: 0.3s ease-in-out;
            display: inline-block;
        }

        #popupBanner a.btn:hover {
            background: linear-gradient(45deg, #0056b3, #0088cc);
            transform: scale(1.05);
        }

        /* Mobile */
        @media (max-width: 768px) {
            #popupBanner {
                width: 90%;
            }
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
        @include('Layouts.templates.navbar')
        @include('Layouts.templates.slider')
        @include('Layouts.templates.video')
        @include('Layouts.templates.testimonial')
        @include('Layouts.templates.note_of_gratitude')
        @include('Layouts.templates.footer')
        @include('Layouts.templates.cookies')
    </div>

    <!-- Floating WhatsApp Button -->
    <a href="#" onclick="redirectToWhatsApp()" class="float">
        <i class="fa fa-whatsapp my-float"></i>
    </a>

    <!-- Dark Overlay -->
    <div id="overlay"></div>

    <!-- Popup Banner -->
    <div id="popupBanner">
        <button onclick="closePopup()">&times;</button>
        <img src="{{ asset('templates/project_category/hostel_project.jpg') }}" alt="Ad Banner"
            class="img-fluid rounded mb-3">
        <br>
        <a href="{{ route('hostel.project.index') }}" class="btn btn-primary">Donate Now</a>
    </div>

    <!-- JavaScript -->
    <script>
        window.addEventListener("load", function() {
            setTimeout(() => {
                document.getElementById("preloader").style.display = "none";
                document.getElementById("content").style.display = "block";

                // Show popup banner after 1 second
                setTimeout(() => {
                    document.getElementById("overlay").style.display = "block";
                    document.getElementById("popupBanner").style.display = "block";
                }, 1000);
            }, 500);
        });

        function closePopup() {
            document.getElementById("popupBanner").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }
    </script>

    <script src="{{ asset('templates/js/script.js') }}"></script>
</body>

</html>
