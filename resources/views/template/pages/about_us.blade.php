<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Us</title>
    @include('template.layouts.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .img {
            border-radius: 50%;
        }
        .justified-content {
            text-align: justify;
        }
        .more-content {
            display: none; /* Initially hidden */
        }
        .content-container:hover .more-content {
            display: block; /* Show on hover */
        }
    </style>
</head>
<body>
<div class="super_container">
    <!-- Header -->
    @include('template.layouts.navbar')
    <!-- Home -->
    @include('template.layouts.home')
    <div class="row mt-5">
        <div class="col-12">
            <div class="section_title text-center">
                <h1>About Us</h1>
            </div>
        </div>
    </div>
    <!-- About Section -->
    <div class="about-section mt-4">
        <div class="container">
            <div class="row">
                <!-- Left Section for Images -->
                <div class="col-lg-4 col-md-4 col-sm-12 mb-4 mb-lg-0">
                    <div class="image-container">
                        <img src="{{ asset('templates/images/slider_background3.jpg') }}" alt="Image 1" class="img-fluid" style="border-radius: 5%; height:240px;">
                    </div>
                </div>
                <!-- Right Section for Content -->
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="content-container">
                        <h2>NUST: The Legacy of Change in a Nutshell</h2>
                        <p class="justified-content">
                            For more than 30 years NUST has been deploying scientific and technological innovation to meet the greater challenges of our age by translating world-leading academic research into commercial, scalable innovations that can respond to complex societal problems. To do that, NUST skims the cream of the brilliance Pakistan produces and trains those brilliant minds to produce top-class innovation and research. Unfortunately, the economic landscape of Pakistan does not allow for many of those bright minds to afford higher education.  Our aim is to not only become the driving force of Pakistan’s knowledge economy but at the heart of our objective lies the very dream of turning NUST into a need-blind university. 
                        </p>
                        <div class="more-content">
                            <p class="justified-content text-dark">
                                To rise to the challenge, NUST strategically initiated the NUST Trust Fund (NTF) in 2012. Since its inception, NTF has dedicated itself to providing essential financial support for the university's mission—advancing cutting-edge research, supporting teaching and learning, developing world-class infrastructure, and financing scholarships for deserving students. 
                                <br>
                                <br>
                                In tandem, the University Advancement Office serves as a dynamic resource mobilization hub, fostering partnerships and collaborations to propel the university's developmental projects. At its core, the office champions equity, diversity, and inclusion (EDI), ensuring that every aspiring mind, irrespective of background, can script their unique journey within our diverse university community.
                            </p>
                        </div>
                        {{-- <span onclick="toggleContent()" id="toggleButton" style="font-size: 20px; color:black; cursor: pointer;">
                            read more &nbsp;&nbsp;<i class="fa-solid fa-plus" id="icon1" style="font-size: 20px;"></i>
                            <i class="fa-solid fa-minus" id="icon1-minus" style="display:none;"></i>
                        </span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about-section">
        <div class="container">
            <div class="row">
                <!-- Left Section for Content -->
                <div class="col-md-12">
                    <div class="content-container">
                        <h2 class="text-center text-dark">What is the University Advancement Office?</h2>
                        <p class="text-dark">
                            For 8 years the University Advancement Office (UAO) has helped open collaborative avenues to make an impact. The word impact, though, has never meant as much – or as many different things – as it does now. With inflation having hit the country hard and 40% of the population below the poverty line, we feel duty-bound to fight harder than ever against all odds to bring in more funds, so the financial struggles of the deserving students do not keep them from NUST.
                            <br>
                            Through our various programs and initiatives, we strive to create an inclusive and supportive community that values diversity and empowers individuals to reach their full potential. Join us in our journey to make a difference in the world through education and innovation.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team -->
    <div class="about-section">
        <div class="container">
            <div class="row">
                <!-- Left Section for Images -->
                <div class="col-lg-7 col-md-7 col-sm-12 mb-4 mb-lg-0">
                    <div class="image-container">
                        <img src="{{ asset('templates/images/advancement-office1.jpg') }}" alt="Image 2" class="img-fluid">
                    </div>
                </div>
                <!-- Right Section for Content -->
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <div class="content-container">
                        <h2 class="text-dark text-center">How we Operate?</h2>
                        <p class="text-dark">
                            <b>Our office employs a rigorous selection process to award scholarships to deserving students.</b>
                            Applicants submit comprehensive documentation, including income and property proof, CNICs, and household photos.
                            <b>A committee evaluates these documents and conducts thorough interviews to select recipients.</b>
                            Provisional scholarships are granted for the first two semesters, followed by a donor-funded package if criteria are met. Physical verification and special case considerations
                            <b>ensure accurate assessments and support for students facing financial hardships, including unexpected changes in their financial situation.</b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

<br>

@include('template.layouts.footer')

<script>
    function toggleContent() {
        var moreContent = document.querySelector('.more-content');
        var iconPlus = document.getElementById('icon1');
        var iconMinus = document.getElementById('icon1-minus');

        if (moreContent.style.display === "none" || moreContent.style.display === "") {
            moreContent.style.display = "block";
            iconPlus.style.display = "none";
            iconMinus.style.display = "inline";
        } else {
            moreContent.style.display = "none";
            iconPlus.style.display = "inline";
            iconMinus.style.display = "none";
        }
    }
</script>
</body>
</html>
