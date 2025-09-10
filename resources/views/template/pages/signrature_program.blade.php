<!DOCTYPE html>
<html lang="en">

<head>
    <title>Signature Programs</title>
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
                    <h1>Signature Programs</h1>
                </div>
            </div>
        </div>

        <!-- Image Left, Text Right Section with Animation -->
        <div class="about-section">
            <div class="container">
                <div class="row">
                    <!-- Left Side - Image -->
                    <div class="col-lg-4 col-md-4 mb-4 mb-md-0" data-aos="fade-right" data-aos-duration="1000">
                        <img src="{{ asset('templates/signature_program/abc.jpg') }}" alt="About Image"
                            class="img-fluid rounded shadow">
                    </div>

                    <!-- Right Side - Text -->
                    <div class="col-lg-8 col-md-8" data-aos="fade-left" data-aos-duration="1400">
                        <h2 class="text-center text-dark">NUST Advisory Council for Resource Mobilization</h2>

                        <p class="text-dark">
                            A pioneering initiative designed to foster meaningful connections with friends and alumni of NUST. The primary objective of this innovative office is to harness the collective potential of NUST's extensive network to secure vital resources and funding. Since its inception, the Resource Mobilization Office has successfully assembled a team of five dedicated Resource Mobilization Officers (RMOs), who have played a pivotal role in expanding our outreach and establishing a strong presence in their respective regions. Through their tireless efforts, we have been able to broaden our donor base, cultivate strategic partnerships, and secure essential support for our academic and research initiatives. We would like to acknowledge our RMOs on our catalog :
                        </p>

                        {{-- <button id="toggleBtn" class="btn btn-primary mt-3">Read More</button> --}}
                    </div>

                </div>
            </div>
        </div>

        <!-- Text Left, Image Right Section with Responsive Reverse -->
        <div class="about-section bg-light">
            <div class="container">
                <div class="row align-items-center flex-column-reverse flex-md-row">
                    <!-- Left Side - Text -->
                    <div class="col-lg-8 col-md-7 mb-4 mb-md-0" data-aos="fade-right" data-aos-duration="1800">
                        <h2 class="text-dark mb-4 text-center text-md-start">Haami Club: Cultivating Empathy and Philanthropy</h2>
                        <p class="text-dark">
                            The Haami Club is NUST's groundbreaking student-led fundraising initiative. With a rapidly growing membership of over 150 dedicated students, this trailblazing club aims to foster a more empathetic generation by deeply instilling the values of philanthropy and mutual aid. Our exceptional team of 'Haamis' has already showcased their unwavering commitment By raising over 4 million pkr for student scholarships through multiple campaign, Al-Musaid. This initiative aligns with NUST's greater goal of producing a generation equipped with leadership skills, ready to lead with compassion and integrity. Join us in empowering these bright minds to make a lasting difference and shape a more compassionate future.
                        </p>
                     
                    </div>

                    <!-- Right Side - Image -->
                    <div class="col-lg-4 col-md-5 mb-4 mb-md-0" data-aos="fade-left" data-aos-duration="1000">
                        <img src="{{ asset('templates/rmo/haami.jpg') }}" alt="Empower Image"
                            class="img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </div>


          <!-- Image Left, Text Right Section with Animation -->
          <div class="about-section ">
            <div class="container">
                <div class="row">
                    <!-- Left Side - Image -->
                    <div class="col-lg-4 col-md-4 mb-4 mb-md-0" data-aos="fade-right" data-aos-duration="2200">
                        <img src="{{ asset('templates/rmo/Alumni.jpg') }}" alt="About Image"
                            class="img-fluid rounded shadow">
                    </div>

                    <!-- Right Side - Text -->
                    <div class="col-lg-8 col-md-8" data-aos="fade-left" data-aos-duration="1000">
                        <h2 class="text-center text-dark">The Power of Our Alumni Network</h2>

                        <p class="text-dark">
                            NUST takes immense pride in its vast body of alumni, spread across more than 70 countries. Our alumni play a crucial role in supporting the university, particularly in terms of fundraising. Alumni are vital to a university's success, as they not only provide financial support but also serve as mentors, industry connectors, and advocates for the institution. One of the most significant contributors is NUSTian USA, our largest alumni organization. Their unwavering support and generosity help ensure that NUST continues to provide exceptional education and opportunities to our students. Join us in harnessing the power of our alumni network to empower the leaders of tomorrow.
                        </p>

                        {{-- <button id="toggleBtn" class="btn btn-primary mt-3">Read More</button> --}}
                    </div>

                </div>
            </div>
        </div>



       
        <!-- Text Left, Image Right Section with Responsive Reverse -->
        <div class="about-section bg-light">
            <div class="container">
                <div class="row align-items-center flex-column-reverse flex-md-row">
                    <!-- Left Side - Text -->
                    <div class="col-lg-8 col-md-7 mb-4 mb-md-0" data-aos="fade-right" data-aos-duration="1000">
                        <h2 class="text-dark mb-4 text-center text-md-start">Dast-e-Karam 2025: Global Zakat Campaign</h2>
                        <p class="text-dark">
                            In Ramadan 2025, the University Advancement Office (UAO) launched “Dast-e-Karam”, our Global Zakat Campaign dedicated to supporting financially challenged yet talented students at NUST. The campaign drew generous support from well-wishers across the globe and reaffirmed UAO’s commitment to making higher education accessible for the nation’s brightest minds.
                        </p>
                        <p class="text-dark">
                           Through Dast-e-Karam 2025, vital funds were raised to ensure that financial barriers do not stand in the way of academic excellence, enabling deserving students to continue their journey of learning and growth.
                        </p>
                     
                    </div>

                    <!-- Right Side - Image -->
                    <div class="col-lg-4 col-md-5 mb-4 mb-md-0" data-aos="fade-left" data-aos-duration="1400">
                        <img src="{{ asset('templates/rmo/musaid.jpg') }}" alt="Empower Image"
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


</body>

</html>
