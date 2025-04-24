<style>
    #slider-header {
        text-align: center;
        margin: 6% auto;
        font-size: 1.8rem;
        font-weight: 800;
        color: #444;
    }

    #slider-container {
        display: flex;
        overflow: hidden;
        position: relative;
    }

    #slider {
        display: flex;
        transition: transform 0.5s ease-in-out;
        gap: 20px; /* Gap between cards */
    }

    #slide {
        position: relative;
        flex-shrink: 0;
        width: 250px;
        height: 300px; /* Increased card height */
    }

    #slide img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        border-radius: 15px;
        cursor: pointer;
        transition: 0.25s ease-in-out;
    }

    #slide img.zoomed {
        width: 500px;
        height: 600px;
        position: fixed;
        left: 25%;
        top: 0%;
        z-index: 1000;
        transform: scale(1) translateY(0) !important;
    }

    #overlay {
        position: absolute;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, 0.45);
        top: 0;
        display: none;
        z-index: 999;
    }

    #overlay.active {
        display: block;
    }

    @media only screen and (max-width: 420px) {
        #slider-container {
            padding: 0;
        }

        #slide {
            padding: 16px 10px;
            width: 90%;
            height: auto;
        }

        #slide img {
            margin: 0;
        }

        #control-prev-btn,
        #control-next-btn {
            top: 37%;
        }
    }
</style>

<div class="popular page_section">
    <div class="container">
        <div class="section_title text-center mb-5">
            <h1>Student Stories</h1>
        </div>

        <div id="slider-container" class="mt-3">
            <div id="slider">
                @foreach ($students as $item)
                    @if ($item->images !== 'dummy.jpg')
                        <div id="slide">
                            <a href="{{ url('student_stories') }}">
                                <img src="{{ asset('templates/students_images/' . $item->images) }}" alt="" style="filter: blur(5px);">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div id="overlay"></div>
    </div>
</div>

<script>
    let slider = document.getElementById("slider");
    let slides = document.querySelectorAll("#slide");
    let slideCount = slides.length;
    let currentSlide = 0;

    // Update slider position with new gap (250 + 20 = 270px per slide)
    function updateSliderPosition() {
        slider.style.transform = `translateX(-${currentSlide * 270}px)`;
    }

    // Auto scroll every 5 seconds
    setInterval(() => {
        currentSlide = (currentSlide + 1) % slideCount;
        updateSliderPosition();
    }, 5000);

    // Zoom image on click
    slides.forEach(slide => {
        const img = slide.querySelector("img");
        img.addEventListener("click", () => {
            img.classList.toggle('zoomed');
            document.querySelector("#overlay").classList.toggle('active');
        });
    });
</script>
