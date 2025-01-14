<title>Resource Mobilization Officer</title>
@include('template.layouts.head')

<div class="super_container">

    <!-- Header -->
    @include('template.layouts..navbar')

    @include('template.layouts..home')

    <div class="events page_section">
        <div class="container">

            <div class="row mb-5">
                <div class="col">
                    <div class="section_title text-center">
                        <h1 class="">Resource Mobilization Officers</h1>
                    </div>
                </div>
            </div>
            <section class="py-2 bg-light mb-5">
                <div class="container">
                    
                    <div class="row">
                        <!-- First Column Centered -->
                        <div class="col-md-12 mx-auto">
                            {{-- <h3 class="text-primary">Our Mission</h3> --}}
                            <p class="text-dark">
                                <b>The NUST Advisory Council of Resource Mobilization includes dedicated</b> Resource Mobilization Officers who play a crucial role in executing strategies to secure support from corporate entities, businesses, and philanthropists. Their industrial insights and connections are instrumental in:
                            </p>
                            <p class="text-dark">
                                <b>Developing NUST as an Inclusive Education Institution:</b> Leveraging their expertise and networks to promote inclusivity and diversity within the university, ensuring that education is accessible to all, regardless of financial barriers.
                            </p>
                            <p class="text-dark">
                                <b>Strengthening Academic and Research Capabilities:</b> Facilitating partnerships and securing funding that enhance NUST's academic programs and research initiatives.
                            </p>
                        </div>
                    </div>
                    
                </div>
            </section>
            
            <div class="row mb-3">
                <!-- First Card -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('templates/rmo/Danish_Aman.jpeg') }}" alt="Image 1" class="card-img-top custom-img-fluid preview-image">
                    </div>
                </div>
                <!-- Second Card -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('templates/rmo/Zafar_Sultan.jpg') }}" alt="Image 2" class="card-img-top custom-img-fluid preview-image">
                    </div>
                </div>
                <!-- Third Card -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('templates/rmo/sidra.jpg') }}" alt="Image 3" class="card-img-top custom-img-fluid preview-image">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <!-- Fourth Card -->
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('templates/rmo/sadia_sadat.jpg') }}" alt="Image 4" class="card-img-top custom-img-fluid preview-image">
                    </div>
                </div>
                <!-- Fifth Card -->
                <div class="col-md-4">
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
                    <!-- Default Bootstrap close button -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="previewImage" src="" class="img-fluid" alt="Preview Image">
                </div>
                <div class="modal-footer">
                    <!-- Additional close button -->
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Footer -->
    @include('template.layouts..footer')

</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JavaScript -->
<script>
    // Add event listeners to all images with the class "preview-image"
    document.querySelectorAll('.preview-image').forEach(image => {
        image.addEventListener('click', function () {
            const modalImage = document.getElementById('previewImage');
            modalImage.src = this.src; // Set the source of the modal image
            const modal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
            modal.show(); // Show the modal
        });
    });
</script>
