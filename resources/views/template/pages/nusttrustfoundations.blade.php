<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nust Trust Foundation</title>
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
                    <h1>Nust Trust Foundation</h1>
                </div>
            </div>
        </div>

        <!-- Image Left, Text Right Section with Animation -->
        <div class="about-section">
            <div class="container">
                <div class="row">
                    <!-- Left Side - Image -->
                    <div class="col-lg-4 col-md-4 mb-md-0 p-5" data-aos="fade-right" data-aos-duration="1000">
                        <div class="ratio ratio-4x3 rounded shadow overflow-hidden">
                            <img src="{{ asset('templates/images/tahaqureshi.jpg') }}" alt="About Image"
                                class="w-100 h-100 object-fit-cover">
                        </div>
                    </div>

                    <!-- Right Side - Text -->
                    <div class="col-lg-8 col-md-8 p-5" data-aos="fade-left" data-aos-duration="1000">
                        <h2 class="text-center text-dark">NUST OPENS FIRST NTF ACCOUNT IN THE UK</h2>

                        <p class="text-dark">
                            In June 2012, National University of Sciences & Technology (NUST) established the NUST
                            Trust Fund (NTF) at the university’s main campus. NTF is an independent Trust,
                            constituted under a Trust Deed dated June 1, 2012, and is a registered Trust (number
                            1289), under the Trust Act 1882.
                        </p>
                        <p class="text-dark">
                            Toaha Qureshi MBE, the Chairman and Trustee of NUST Trust Fund UK, has been a part of
                            the genesis of the Trust in 2018 and has been integral in its journey to becoming a
                            charity registered in the UK. The charity focuses on relieving poverty by raising funds
                            for disadvantaged students in Pakistan who need support in completing higher education
                            and achieving their dreams. Toaha Qureshi MBE has a long history of supporting
                            Pakistanis back home and abroad, both in education and poverty relief, having provided
                            scholarships, disaster relief funds, and more.
                        </p>



                        <div id="moreText" style="display: none;">
                            <p class="text-dark">
                                The NUST Trust Fund UK was formally launched in 2022 by Toaha Qureshi MBE at a
                                ceremony in London - attended by Lt. Gen. (R) Javed Mahmood Bukhari, Rector NUST,
                                and Dr Rizwan Riaz, Pro-Rector NUST. Several fundraising events were held, and
                                partnerships with British universities were pursued. The NTF UK will be working with
                                alumni and leaders from the business, community, and charitable sectors to achieve
                                its aims.
                            <p class="text-dark">
                                The establishment of this office promises a hassle-free gift point and a time-saving
                                payment process for the prospective donors. It will also enable tax exemption to the
                                donors, and bridge the gap between communities, thus ensuring maximum contribution
                                to not only student endowment but also other nation-building projects by NUST.
                            </p>

                        </div>

                        <button id="toggleBtn" class="btn btn-primary mt-3">Read More</button>
                    </div>

                </div>
            </div>
        </div>


        <div id="bankDetails" class="container mb-5">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="fw-bold text-dark mb-3">Bank Details</h2>
                        <p class="text-muted">Donate securely through our official accounts</p>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- GBP Account -->
                <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="card shadow border-0 rounded-4 text-center p-4 w-100 h-100">
                        <div class="mb-3">
                            <i class="fas fa-pound-sign fa-3x text-primary"></i>
                        </div>
                        <h5 class="fw-bold text-dark">GBP Account</h5>
                        <div class="card-body">
                            <p class="mb-2 text-dark"><strong>Account Number:</strong> 70027591</p>
                            <p class="mb-0 text-dark"><strong>IBAN:</strong> GB07 HABB 6095 1170 0275 91</p>
                        </div>
                    </div>
                </div>

                <!-- USD Account -->
                <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="card shadow border-0 rounded-4 text-center p-4 w-100 h-100">
                        <div class="mb-3">
                            <i class="fas fa-dollar-sign fa-3x text-success"></i>
                        </div>
                        <h5 class="fw-bold text-dark">USD Account</h5>
                        <div class="card-body">
                            <p class="mb-2 text-dark"><strong>Account Number:</strong> 70027594</p>
                            <p class="mb-0 text-dark"><strong>IBAN:</strong> GB23 HABB 6095 1170 0275 94</p>
                        </div>
                    </div>
                </div>

                <!-- Bank Info -->
                <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="card shadow border-0 rounded-4 text-center p-4 w-100 h-100">
                        <div class="mb-3">
                            <i class="fas fa-university fa-3x text-warning"></i>
                        </div>
                        <h5 class="fw-bold text-dark">Bank Information</h5>
                        <div class="card-body">
                            <p class="mb-2 text-dark"><strong>Type:</strong> Savings Account</p>
                            <p class="mb-2 text-dark"><strong>Branch:</strong> HBL Bank UK, 2 Swan Street, Manchester M4
                                5JN</p>
                            <p class="mb-0 text-dark"><strong>SWIFT/BIC:</strong> HABBGB2L</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- FontAwesome -->
        <script src="https://kit.fontawesome.com/yourkitid.js" crossorigin="anonymous"></script>






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
