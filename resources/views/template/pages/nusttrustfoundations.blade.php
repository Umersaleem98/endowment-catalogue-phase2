<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nust Trust Foundation</title>
    @include('template.layouts.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .img {
            border-radius: 50%;
        }

        .justified-content {
            text-align: justify;
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
                    <h1>Nust Trust Foundation</h1>
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
                            <img src="{{ asset('templates/images/tahaqureshi.jpg') }}" alt="Image 1" class="img-fluid"
                                style="border-radius: 5%; width: 100%; height:340px;">
                        </div>
                    </div>
                    <!-- Right Section for Content -->
                    <div class="col-lg-8 col-md-8 col-sm-12 p-3">
                        <div class="content-container">
                            <h2>NUST OPENS FIRST NTF ACCOUNT IN THE UK</h2>
                            <p class="justified-content" id="para1">
                                In June 2012, National University of Sciences & Technology (NUST) established the NUST
                                Trust Fund (NTF) at the university’s main campus. NTF is an independent Trust,
                                constituted under a Trust Deed dated June 1, 2012, and is a registered Trust (number
                                1289), under the Trust Act 1882.
                            </p>
                            <p class="justified-content" id="para2">
                                Toaha Qureshi MBE, the Chairman and Trustee of NUST Trust Fund UK, has been a part of
                                the genesis of the Trust in 2018 and has been integral in its journey to becoming a
                                charity registered in the UK. The charity focuses on relieving poverty by raising funds
                                for disadvantaged students in Pakistan who need support in completing higher education
                                and achieving their dreams. Toaha Qureshi MBE has a long history of supporting
                                Pakistanis back home and abroad, both in education and poverty relief, having provided
                                scholarships, disaster relief funds, and more.
                            </p>
                            <div id="moreContent" style="display: none;">
                                <p class="justified-content">
                                    The NUST Trust Fund UK was formally launched in 2022 by Toaha Qureshi MBE at a
                                    ceremony in London - attended by Lt. Gen. (R) Javed Mahmood Bukhari, Rector NUST,
                                    and Dr Rizwan Riaz, Pro-Rector NUST. Several fundraising events were held, and
                                    partnerships with British universities were pursued. The NTF UK will be working with
                                    alumni and leaders from the business, community, and charitable sectors to achieve
                                    its aims.
                                </p>
                                <p class="justified-content">
                                    The establishment of this office promises a hassle-free gift point and a time-saving
                                    payment process for the prospective donors. It will also enable tax exemption to the
                                    donors, and bridge the gap between communities, thus ensuring maximum contribution
                                    to not only student endowment but also other nation-building projects by NUST.
                                </p>
                            </div>
                            <button id="toggleButton" class="btn btn-primary mt-3">Read More</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script>
            document.getElementById('toggleButton').addEventListener('click', function() {
    const moreContent = document.getElementById('moreContent');
    const toggleButton = document.getElementById('toggleButton');

    if (moreContent.style.display === 'none' || moreContent.style.display === '') {
        moreContent.style.display = 'block';
        toggleButton.textContent = 'Read Less';
    } else {
        moreContent.style.display = 'none';
        toggleButton.textContent = 'Read More';
    }
});

        </script>
    </div>

    <section class="py-5 bg-light">
        <div class="container">
          <div class="row g-4">
            <!-- Card Header -->
            <div class="col-12 mb-3">
              <div class="card-header" style="background-color: #6dc1f1;">
                <h2 class="text-dark text-center">Bank Details</h2>
                <h3 class="text-center text-dark">Account Title: NUST Trust Foundation, UK</h3>
              </div>
            </div>
      
            <!-- Card 1 -->
            <div class="col-md-4">
              <div class="card h-100" style="background-color: #3fb9ff;">
                <div class="card-body d-flex flex-column">
                  <h3 class="card-title mb-3 text-dark">Account Number GBP: 70027591</h3>
                  <p class="card-text text-dark">IBAN GBP: GB07 HABB 6095 1170 0275 91</p>
                </div>
              </div>
            </div>
      
            <!-- Card 2 -->
            <div class="col-md-4">
              <div class="card h-100" style="background-color: #3fb9ff;">
                <div class="card-body d-flex flex-column">
                  <h3 class="card-title mb-3 text-dark">Account Number USD: 70027594</h3>
                  <p class="card-text text-dark">IBAN Number USD: GB 23 HABB 6095 1170 0275 94</p>
                </div>
              </div>
            </div>
      
            <!-- Card 3 -->
            <div class="col-md-4">
              <div class="card h-100" style="background-color: #3fb9ff;">
                <div class="card-body d-flex flex-column">
                  <h3 class="card-title mb-3 text-dark">Account Type: Savings Account</h3>
                  <p class="card-text text-dark">Branch: HBL Bank UK, 2 Swan Street, Manchester M4 5JN</p>
                  <p class="card-text text-dark">SWIFT/BIC: HABBGB2L</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
    @include('template.layouts.footer')


</body>

</html>
