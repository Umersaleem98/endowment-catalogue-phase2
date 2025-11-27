<style>
    h1, h2, h3, h4, h5, h6 {}

    section {
        padding: 60px 0;
        min-height: 100vh;
    }

    a,
    a:hover,
    a:focus,
    a:active {
        text-decoration: none;
        outline: none;
    }

    ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .main-footer {
        position: relative;
        background: #1e2129;
        color: #9ea0a9;
    }

    .footer-content {
        position: relative;
        padding: 85px 0px 60px 0px;
    }

    .footer-content:before {
        position: absolute;
        content: '';
        background: url(https://i.ibb.co/jyRLrBZ/world-map.png);
        width: 744px;
        height: 365px;
        top: 50px;
        right: 0px;
        background-size: cover;
        background-repeat: no-repeat;
        opacity: 0.08;
        animation: float-bob 30s linear infinite;
    }

    @keyframes float-bob {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .footer-widget {
        margin-bottom: 30px;
    }

    .footer-title {
        font-size: 22px;
        color: #fff;
        font-weight: 700;
        margin-bottom: 25px;
    }

    .footer-widget ul li {
        margin-bottom: 10px;
    }

    .footer-widget ul li a {
        color: #9ea0a9;
        transition: 0.3s;
    }

    .footer-widget ul li a:hover {
        color: #ff5e14;
    }

    .footer-social li {
        display: inline-block;
        margin-right: 8px;
    }

    .footer-social li a {
        width: 40px;
        height: 40px;
        line-height: 40px;
        background: #2e3138;
        color: #9ea0a9;
        text-align: center;
        border-radius: 50%;
        transition: 0.3s;
        display: inline-block;
    }

    .footer-social li a:hover {
        color: #fff;
        background: #ff5e14;
    }

    .logo-box img {
        max-width: 120px;
    }

    .footer-bottom {
        background: #13151a;
        padding: 20px 0;
        text-align: center;
    }

    .footer-bottom p {
        margin: 0;
        color: #9ea0a9;
        font-size: 14px;
    }

    /* Responsive Adjustments */
    @media (max-width: 991px) {
        .footer-content {
            padding: 60px 0;
        }
        .footer-widget {
            text-align: center;
        }
        .footer-content .contact-widget {
            margin-left: 0 !important;
        }
    }
</style>

<footer class="main-footer">
    <div class="container">
        <div class="footer-content">
            <div class="row">
                <!-- Logo Section -->
                <div class="col-lg-3 col-md-6 footer-widget">
                    <div class="logo-widget">
                        <figure class="logo-box mb-3">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('templates/images/logo.png') }}" alt="Logo" class="img-fluid">
                            </a>
                        </figure>
                        <p>Inspiring Minds, Crafting Futures</p>
                        <ul class="footer-social mt-3">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>

                <!-- Menu -->
                <div class="col-lg-3 col-md-6 footer-widget">
                    <h4 class="footer-title">Menu</h4>
                    <ul>
                        <li><a href="{{ url('/') }}" target="_blank">Home</a></li>
                        <li><a href="{{ url('about_us') }}" target="_blank">About Us</a></li>
                        <li><a href="{{ url('/signrature_program') }}" target="_blank">Signature Programs</a></li>
                        <li><a href="{{ url('/nust_trust_foundation') }}" target="_blank">Nust Trust Fund</a></li>
                        <li><a href="{{ url('r_m_o') }}" target="_blank">Resource Mobilization Officer</a></li>
                        <li><a href="{{ url('/our_team') }}" target="_blank">Our Team</a></li>
                        <li><a href="{{ url('/contact_us') }}" target="_blank">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Useful Links -->
                <div class="col-lg-3 col-md-6 footer-widget">
                    <h4 class="footer-title">Useful Links</h4>
                    <ul>
                        <li><a href="https://nust.edu.pk/about-us" target="_blank">NUST</a></li>
                        <li><a href="https://www.linkedin.com/company/uaonust/" target="_blank">LinkedIn</a></li>
                        <li><a href="https://www.facebook.com/uao.nust" target="_blank">Facebook</a></li>
                        <li><a href="https://www.instagram.com/uao.nust" target="_blank">Instagram</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="col-lg-3 col-md-6 footer-widget contact-widget">
                    <h4 class="footer-title">Contact</h4>
                    <ul>
                        <li><i class="fa-solid fa-location-dot me-2"></i> RIC Secretariat NUST H-12, Islamabad</li>
                        <li><i class="fa-solid fa-phone me-2"></i> +92 336 5317822</li>
                        <li><i class="fa-solid fa-envelope me-2"></i> Advancement@nust.edu.pk</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</footer>



<!-- ✅ Latest JS Libraries (2025) -->

<!-- jQuery (v3.7.1) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Bootstrap 5.3.8 Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<!-- GSAP (v3.12.5) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

<!-- ScrollMagic (v2.0.8) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js"></script>

<!-- Owl Carousel 2.3.4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- jQuery ScrollTo (v2.1.3) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.3/jquery.scrollTo.min.js"></script>

<!-- jQuery Easing (v1.4.1) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<!-- AOS (v2.3.4) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init();
</script>

<!-- ✅ Custom JS -->
<script src="{{ asset('templates/js/custom.js') }}"></script>
