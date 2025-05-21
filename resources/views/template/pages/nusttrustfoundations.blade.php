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
                    <div class="col-lg-4 col-md-4 mb-4 mb-md-0" data-aos="fade-right" data-aos-duration="1000">
                        <img src="{{ asset('templates/images/tahaqureshi.jpg') }}" alt="About Image"
                            class="img-fluid rounded shadow">
                    </div>

                    <!-- Right Side - Text -->
                    <div class="col-lg-8 col-md-8" data-aos="fade-left" data-aos-duration="1000">
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

        <section class="py-5 bg-light">
          <div class="container">
            <div class="row">
              <!-- Card Header -->
              <div class="col-12 mb-3">
                <div class="card-header" style="background-color: #095590;">
                  <h2 class="text-light text-center">Bank Details</h2>
                  <h3 class="text-center text-light">Account Title: NUST Trust Foundation, UK</h3>
                </div>
              </div>
        
              <!-- Card 1 -->
              <div class="col-md-4">
                <div class="card h-100" style="background-color: #095590;">
                  <div class="card-body d-flex flex-column">
                    <h3 class="card-title mb-3 text-light">Account Number GBP: 70027591</h3>
                    <p class="card-text text-light">IBAN GBP: GB07 HABB 6095 1170 0275 91</p>
                  </div>
                </div>
              </div>
        
              <!-- Card 2 -->
              <div class="col-md-4">
                <div class="card h-100" style="background-color: #095590;">
                  <div class="card-body d-flex flex-column">
                    <h3 class="card-title mb-3 text-light">Account Number USD: 70027594</h3>
                    <p class="card-text text-light">IBAN Number USD: GB 23 HABB 6095 1170 0275 94</p>
                  </div>
                </div>
              </div>
        
              <!-- Card 3 -->
              <div class="col-md-4">
                <div class="card h-100" style="background-color: #095590;">
                  <div class="card-body d-flex flex-column">
                    <h3 class="card-title mb-3 text-light">Account Type: Savings Account</h3>
                    <p class="card-text text-light">Branch: HBL Bank UK, 2 Swan Street, Manchester M4 5JN</p>
                    <p class="card-text text-light">SWIFT/BIC: HABBGB2L</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        
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
