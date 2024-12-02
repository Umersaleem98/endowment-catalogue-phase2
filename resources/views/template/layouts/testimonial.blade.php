<style>
    body {
        background-color: #eee;
    }

    .profile {
        width: 100%;
        height: auto;
    }

    .percentage {
        font-size: 2.5vw; /* Responsive font size */
    }

    .testimonials {
        padding: 20px;
    }

    p {
        font-size: 2vw; /* Responsive font size */
    }

    /* Responsive layout */
    @media (max-width: 768px) {
        .profile {
            width: 100%;
            height: auto;
        }

        .testimonials {
            padding: 20px;
            text-align: center;
        }

        .row.no-gutters {
            flex-direction: column;
            align-items: center;
        }

        .percentage {
            font-size: 4vw; /* Increase font size on smaller screens */
        }

        p {
            font-size: 3.5vw; /* Increase font size on smaller screens */
        }
    }
    @media (max-width: 576px) {
        .responsive-text {
            font-size: 1rem;
        }
    }
    @media (min-width: 577px) and (max-width: 768px) {
        .responsive-text {
            font-size: 1.1rem;
        }
    }
    @media (min-width: 769px) and (max-width: 992px) {
        .responsive-text {
            font-size: 1rem;
        }
    }
    @media (min-width: 993px) {
        .responsive-text {
            font-size: 18px;

        }
    }
</style>

<div class="container-fluid">
    <div class="row mb-5">
        <div class="col">
            <div class="section_title text-center">
                <h1 class="text-dark">Student Testimonials</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="border rounded">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img class="img-fluid profile" src="{{ asset('templates/images/male.png') }}" alt="Profile Image">
                    </div>
                    <div class="col-md-7">
                        <div class="bg-white testimonials">
                            <p class="justify-content-center text-dark responsive-text" style="text-align: justify;">
                                Our father, a taxi driver, faced numerous hardships and managed to support our family of five on a modest salary of PKR 25,000. To ease the financial strain, our elder brother stepped up, working daily wages to provide essential water services to the community. It was in 2019, that we both got enrolled in our dream university, in engineering disciplines – and that was the happiest day of our lives.
                            </p>
                            <p class="justify-content-center text-dark responsive-text" style="text-align: justify;">
                                But the dreams hung in despair due to the fee challan. Desperate to keep our hopes alive, we started offering tuition on the NUST campus. Then, just when it felt like the weight of our dreams might crush us, we discovered a scholarship program. To our immense relief and joy, we were awarded the scholarship. In parallel, we launched a funded AI startup named Vyro at the National Science and Technology Park. Thanks to mentorship and support, our business grew significantly, now employing 130 people, serving 10 million active users, and valued at $200 million.
                            </p>
                            <div class="d-flex flex-column align-items-center">
                                <span class="font-weight-bold percentage" style="color: #00558E;">Zain & Abdullah</span>
                                <span class="font-weight-bold" style="color: #00558E;">Batch 2019</span>
                                {{-- <span class="text-dark"></span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add more testimonial sections here if needed -->

        </div>
    </div>
</div>
