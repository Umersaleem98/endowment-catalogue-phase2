<style>
    a {
        color: white;
        text-decoration: none;
    }
    a:hover {
        color: #ccc;
    }
</style>

<footer class="footer bg-dark text-light pt-5">
    <div class="container">
        <div class="footer_content">
            <div class="row gy-4">

                <!-- About -->
                <div class="col-lg-3 text-center">
                    <div class="logo_container mb-3">
                        <img src="{{ asset('templates/images/logo.png') }}" alt="Logo" class="img-fluid"
                             style="max-width: 120px;">
                    </div>
                    <p class="small mb-0">Inspiring Minds, Crafting Futures</p>
                </div>

                <!-- Menu -->
                <div class="col-lg-3">
                    <h5 class="mb-3">Menu</h5>
                    <ul class="list-unstyled">
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
                <div class="col-lg-3">
                    <h5 class="mb-3">Useful Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="https://nust.edu.pk/about-us" target="_blank">NUST</a></li>
                        <li><a href="https://www.linkedin.com/company/uaonust/" target="_blank">LinkedIn</a></li>
                        <li><a href="https://www.facebook.com/uao.nust" target="_blank">Facebook</a></li>
                        <li><a href="https://www.instagram.com/uao.nust" target="_blank">Instagram</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="col-lg-3">
                    <h5 class="mb-3">Contact</h5>
                    <ul class="list-unstyled">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-3gJwYp4B5BzKqKPEJfFBLdKnsA9BLbnpo9mYq3cAJ7EZoDJbb+AzI/fyQbJ0FfQ4LLrdWuqZsmAQ2rO9i9N+DQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Bootstrap 5.3.8 Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

<!-- GSAP (v3.12.5) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"
        integrity="sha512-vmNhVd+7XnVNv1uUzqzS8yGZzWQDXDyPSn4gSV2zkQWiG9bODi5FZtF0FtGfR96qTTC6qC3uD8L4Yy0K61XYaA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- ScrollMagic (v2.0.8) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/ScrollMagic.min.js"
        integrity="sha512-Mq6aFlV+4XQkY6ngYIMPEg+Qq/2vG4KwN9tMAnb6jKH6dKxwCN7lNRJ7a3I5bCwKzqMF6N2v5p6G5cmI3HVgDg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Owl Carousel 2.3.4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-pvQhJHmcTHRrAjRQ11vL4sYlPZC/XgxHBPu3F8FxmCQ6jny0fI3Y40r8lC+Y/hEyzH40MRwC+zHgV7ipm2U5ow=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- jQuery ScrollTo (v2.1.3) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.3/jquery.scrollTo.min.js"
        integrity="sha512-SRPnyx2dh/1oKZWZBg8eBRrfxpGJmLQlNPlYf8mZfWbdh6dxQWBrM4vTVwP4Zmz27zQ0LaVi/TTJtR9ePBYR2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- jQuery Easing (v1.4.1) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"
        integrity="sha512-0L3zP9duFneDTXW3k7r9uoq5nOAt9osQzD3Amq1VdYv5Q2gY2fIocgW8VZ9VjfbfVwPaE6A7OBP1E1qzZzUztw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- AOS (v2.3.4) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
        integrity="sha512-GY4rDqF6VfIIsAsi6MBtQ6f6FgVfhsz6qI9OsmN9kg8RGNFXhNZybNpiFlJv42H67bJcH+6MS5MwMyvZ4eLL8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    AOS.init();
</script>

<!-- ✅ Custom JS -->
<script src="{{ asset('templates/js/custom.js') }}"></script>
