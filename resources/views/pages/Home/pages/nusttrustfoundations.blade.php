<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nust Trust Foundation</title>
    @include('Layouts.templates.head')

</head>

<body>
    <div class="super_container">
        <!-- Header -->
        @include('Layouts.templates.navbar')
        <!-- Home -->
        @include('Layouts.templates.home')

        <br><br><br>
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

                        <button id="toggleBtn" class="btn btn-warning mt-3">Read More</button>
                    </div>

                </div>
            </div>
        </div>


        <div id="bankDetails" class="container my-5">

            <!-- Heading -->
            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark">Bank Details</h2>
                <p class="text-secondary">Donate securely through our official accounts</p>
            </div>

            <div class="row g-4">

                <!-- GBP Account -->
                <div class="col-md-4 d-flex">
                    <div class="card shadow-sm border-0 text-center p-4 w-100">
                        <div class="mb-3">
                            <span
                                class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center p-3">
                                <i class="fas fa-pound-sign fa-2x text-primary"></i>
                            </span>
                        </div>
                        <h2 class="fw-bold">GBP Account</h2>
                        <div class="card-body">
                            <p class="mb-1"><strong>Account Number:</strong> 70027591</p>
                            <p class="mb-0"><strong>IBAN:</strong> GB07 HABB 6095 1170 0275 91</p>
                        </div>
                    </div>
                </div>

                <!-- USD Account -->
                <div class="col-md-4 d-flex">
                    <div class="card shadow-sm border-0 text-center p-4 w-100">
                        <div class="mb-3">
                            <span
                                class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center p-3">
                                <i class="fas fa-dollar-sign fa-2x text-success"></i>
                            </span>
                        </div>
                        <h2 class="fw-bold">USD Account</h2>
                        <div class="card-body">
                            <p class="mb-1"><strong>Account Number:</strong> 70027594</p>
                            <p class="mb-0"><strong>IBAN:</strong> GB23 HABB 6095 1170 0275 94</p>
                        </div>
                    </div>
                </div>

                <!-- Bank Info -->
                <div class="col-md-4 d-flex">
                    <div class="card shadow-sm border-0 text-center p-4 w-100">
                        <div class="mb-3">
                            <span
                                class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center p-3">
                                <i class="fas fa-university fa-2x text-warning"></i>
                            </span>
                        </div>
                        <h2 class="fw-bold">Bank Information</h2>
                        <div class="card-body">
                            <p class="mb-1"><strong>Type:</strong> Savings Account</p>
                            <p class="mb-1"><strong>Branch:</strong> HBL Bank UK, 2 Swan Street, Manchester M4 5JN</p>
                            <p class="mb-0"><strong>SWIFT/BIC:</strong> HABBGB2L</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- FontAwesome -->
        <script src="https://kit.fontawesome.com/yourkitid.js" crossorigin="anonymous"></script>






    </div>


    @include('Layouts.templates.footer')

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
