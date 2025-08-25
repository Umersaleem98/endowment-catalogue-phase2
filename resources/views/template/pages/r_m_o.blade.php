<title>Resource Mobilization Officer</title>
@include('template.layouts.head')

<div class="super_container">

    <!-- Header -->
    @include('template.layouts..navbar')

    @include('template.layouts..home')

    <div class="events page_section">
        <div class="container">

            <!-- Section Title -->
            <div class="row mb-5" data-aos="fade-down" data-aos-duration="1000">
                <div class="col">
                    <div class="section_title text-center">
                        <h1 class="">Resource Mobilization Officers</h1>
                    </div>
                </div>
            </div>

            <!-- Mission Section -->
            <section class="py-2 bg-light mb-5" data-aos="fade-up" data-aos-duration="1000">
                <div class="container">
                    <div class="row p-3">
                        <h2 class="text-primary text-center mb-4 fw-bold">Our Mission</h2>

                        <p class="text-dark fs-5 mb-4 text-justify" data-aos="fade-right" data-aos-delay="100">
                            <strong>The NUST Advisory Council of Resource Mobilization includes dedicated</strong>
                            Resource Mobilization Officers who play a crucial role in executing strategies to secure support
                            from corporate entities, businesses, and philanthropists. Their industrial insights and
                            connections are instrumental in:
                        </p>

                        <p class="text-dark fs-5 mb-4 text-justify" data-aos="fade-right" data-aos-delay="200">
                            <strong>Developing NUST as an Inclusive Education Institution:</strong> Leveraging their
                            expertise and networks to promote inclusivity and diversity within the university, ensuring that
                            education is accessible to all, regardless of financial barriers.
                        </p>

                        <p class="text-dark fs-5 text-justify" data-aos="fade-right" data-aos-delay="300">
                            <strong>Strengthening Academic and Research Capabilities:</strong> Facilitating partnerships and
                            securing funding that enhance NUST's academic programs and research initiatives.
                        </p>
                    </div>
                </div>
            </section>

            <!-- First Row of Cards -->
            <div class="row mb-3" data-aos="fade-up" data-aos-duration="1000">
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="card">
                        <img src="{{ asset('templates/rmo/Danish_Aman.jpeg') }}" alt="Image 1" class="card-img-top custom-img-fluid preview-image">
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="card">
                        <img src="{{ asset('templates/rmo/Zafar_Sultan.jpg') }}" alt="Image 2" class="card-img-top custom-img-fluid preview-image">
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="card">
                        <img src="{{ asset('templates/rmo/sidra.jpg') }}" alt="Image 3" class="card-img-top custom-img-fluid preview-image">
                    </div>
                </div>
            </div>

            <!-- Second Row of Cards -->
            <div class="row mb-3" data-aos="fade-up" data-aos-duration="1000">
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="card">
                        <img src="{{ asset('templates/rmo/sadia_sadat.jpg') }}" alt="Image 4" class="card-img-top custom-img-fluid preview-image">
                    </div>
                </div>
                <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="card">
                        <img src="{{ asset('templates/rmo/abc.jpg') }}" alt="Image 5" class="card-img-top custom-img-fluid preview-image">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imagePreviewLabel">Image Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="previewImage" src="" class="img-fluid" alt="Preview Image">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('template.layouts..footer')

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS Animation JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true
    });
</script>

<!-- Custom JS for Image Modal -->
<script>
    document.querySelectorAll('.preview-image').forEach(image => {
        image.addEventListener('click', function () {
            const modalImage = document.getElementById('previewImage');
            modalImage.src = this.src;
            const modal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
            modal.show();
        });
    });
</script>

<!-- Optional Custom CSS for Hover Effect -->
<style>
    .card {
        transition: transform 0.3s ease;
        cursor: pointer;
    }
    .card:hover {
        transform: scale(1.05);
    }
</style>
