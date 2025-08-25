<!DOCTYPE html>
<html lang="en">

<head>
    <title>About Us</title>
    @include('template.layouts.head')

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

        <!-- Image Left, Text Right Section with Animation -->
        <div class="about-section">
            <div class="container">
                <div class="row">
                    <!-- Left Side - Image -->
                    <div class="col-lg-4 col-md-4 mb-4 mb-md-0" data-aos="fade-right" data-aos-duration="1000">
                        <img src="{{ asset('templates/images/slider_background3.jpg') }}" alt="About Image"
                            class="img-fluid rounded shadow">
                    </div>

                    <!-- Right Side - Text -->
                    <div class="col-lg-8 col-md-8" data-aos="fade-left" data-aos-duration="1000">
                        <h2 class="text-center text-dark">NUST: The Legacy of Change in a Nutshell</h2>

                        <p class="text-dark">
                            For more than 30 years NUST has been deploying scientific and technological innovation to
                            meet the greater challenges of our age by translating world-leading academic research into
                            commercial, scalable innovations that can respond to complex societal problems.
                        </p>
                        <p class="text-dark">
                                To do that, NUST skims the cream of the brilliance Pakistan produces and trains those
                                brilliant minds to produce top-class innovation and research. Unfortunately, the
                                economic landscape of Pakistan does not allow for many of those bright minds to afford
                                higher education. Our aim is to not only become the driving force of Pakistan’s
                                knowledge economy but at the heart of our objective lies the very dream of turning NUST
                                into a need-blind university.
                            </p>

                        <div id="moreText" style="display: none;">
                            {{-- <p class="text-dark">
                                To do that, NUST skims the cream of the brilliance Pakistan produces and trains those
                                brilliant minds to produce top-class innovation and research. Unfortunately, the
                                economic landscape of Pakistan does not allow for many of those bright minds to afford
                                higher education. Our aim is to not only become the driving force of Pakistan’s
                                knowledge economy but at the heart of our objective lies the very dream of turning NUST
                                into a need-blind university.
                            </p> --}}
                            <p class="text-dark">
                                To rise to the challenge, NUST strategically initiated the NUST Trust Fund (NTF) in
                                2012. Since its inception, NTF has dedicated itself to providing essential financial
                                support for the university's mission—advancing cutting-edge research, supporting
                                teaching and learning, developing world-class infrastructure, and financing scholarships
                                for deserving students.
                            </p>
                            <p class="text-dark">
                                In tandem, the University Advancement Office serves as a dynamic resource mobilization
                                hub, fostering partnerships and collaborations to propel the university's developmental
                                projects. At its core, the office champions equity, diversity, and inclusion (EDI),
                                ensuring that every aspiring mind, irrespective of background, can script their unique
                                journey within our diverse university community.
                            </p>
                        </div>

                        <button id="toggleBtn" class="btn btn-primary mt-3">Read More</button>
                    </div>

                </div>
            </div>
        </div>


        <!-- Text-Only Section with Two Paragraphs -->
        <div class="about-section py-5 bg-light">
            <div class="container">
                <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1000">
                    <div class="col-lg-10">
                        <h2 class="text-dark text-center mb-4">What is the University Advancement Office?</h2>
                        <p class="text-dark">
                            For 8 years the University Advancement Office (UAO) has helped open collaborative avenues to
                            make an impact. The word impact, though, has never meant as much – or as many different
                            things – as it does now. With inflation having hit the country hard and 40% of the
                            population below the poverty line, we feel duty-bound to fight harder than ever against all
                            odds to bring in more funds, so the financial struggles of the deserving students do not
                            keep them from NUST.
                        </p>
                        <p class="text-dark">
                            Through our various programs and initiatives, we strive to create an inclusive and
                            supportive community that values diversity and empowers individuals to reach their full
                            potential. Join us in our journey to make a difference in the world through education and
                            innovation.
                        </p>
                    </div>
                </div>
            </div>
        </div>



        <!-- Text Left, Image Right Section with Responsive Reverse -->
        <div class="about-section py-5">
            <div class="container">
                <div class="row align-items-center flex-column-reverse flex-md-row">
                    <!-- Left Side - Text -->
                    <div class="col-lg-8 col-md-7 mb-4 mb-md-0" data-aos="fade-right" data-aos-duration="1000">
                        <h2 class="text-dark mb-4 text-center text-md-start">How We Operate?</h2>
                        <p class="text-dark">
                            Our office employs a rigorous selection process to award scholarships to deserving students.
                            Applicants submit comprehensive documentation, including income and property proof, CNICs,
                            and household photos.
                            <strong>A committee evaluates these documents and conducts thorough interviews to select
                                recipients.</strong>
                        </p>
                        <p class="text-dark">
                            Provisional scholarships are granted for the first two semesters, followed by a donor-funded
                            package if criteria are met.
                            <strong>Physical verification and special case considerations ensure accurate assessments
                                and support for students facing financial hardships</strong>,
                            including unexpected changes in their financial situation.
                        </p>
                    </div>

                    <!-- Right Side - Image -->
                    <div class="col-lg-4 col-md-5 mb-4 mb-md-0" data-aos="fade-left" data-aos-duration="1000">
                        <img src="{{ asset('templates/images/advancement-office1.jpg') }}" alt="Empower Image"
                            class="img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </div>


    </div>


    @include('template.layouts.footer')

    <!-- AOS Animation JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        document.getElementById("toggleBtn").addEventListener("click", function() {
            const moreText = document.getElementById("moreText");
            const btn = document.getElementById("toggleBtn");

            if (moreText.style.display === "none") {
                moreText.style.display = "block";
                btn.textContent = "Read Less";
            } else {
                moreText.style.display = "none";
                btn.textContent = "Read More";
            }
        });
    </script>

</body>

</html>
