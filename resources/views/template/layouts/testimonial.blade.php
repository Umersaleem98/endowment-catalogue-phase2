<!-- Animate.css CDN (if not already added in your layout) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<!-- Testimonial Section -->
<div class="container testimonial-section py-5">
    <!-- Section Title -->
    <div class="row mb-4">
        <div class="col text-center animate__animated animate__fadeInDown animate__slow">
            <h1 class="text-dark">Student Testimonials</h1>
        </div>
    </div>

    <!-- Testimonial Block -->
    <div class="row align-items-center">
        <!-- Image on the left -->
        <div class="col-md-4 text-center mb-3 mb-md-0 animate__animated animate__fadeInLeft animate__delay-1s">
            <img src="{{ asset('templates/images/male.png') }}" 
                 class="img-fluid rounded shadow" 
                 alt="Student Photo" 
                 style="max-height: 350px;">
        </div>

        <!-- Text on the right -->
        <div class="col-md-8 animate__animated animate__fadeInRight animate__delay-2s">
            <h4 class="text-primary">Zain & Abdullah</h4>
            <p class="text-muted"><em>Batch 2019</em></p>
            <p class="text-dark" style="text-align: justify;">
                Our father, a taxi driver, faced numerous hardships and managed to support our family of five on a modest salary of PKR 25,000. To ease the financial strain, our elder brother stepped up, working daily wages to provide essential water services to the community. It was in 2019, that we both got enrolled in our dream university, in engineering disciplines – and that was the happiest day of our lives.
            </p>
            <p class="text-dark" style="text-align: justify;">
                But the dreams hung in despair due to the fee challan. Desperate to keep our hopes alive, we started offering tuition on the NUST campus. Then, just when it felt like the weight of our dreams might crush us, we discovered a scholarship program. To our immense relief and joy, we were awarded the scholarship. In parallel, we launched a funded AI startup named Vyro at the National Science and Technology Park. Thanks to mentorship and support, our business grew significantly, now employing 130 people, serving 10 million active users, and valued at $200 million.
            </p>
        </div>
    </div>
</div>
