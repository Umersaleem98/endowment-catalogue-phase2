
<style>
    .widget-title {
        font-weight: 300;
    }

    .event {
        background-color: #ffffff;
        margin-bottom: 1rem;
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .date {
        background-color: #085590;
        text-align: center;
        color: #fff;
        padding: 0.8rem;
        border-radius: 10px;
        width: 90px;
    }

    .date .day {
        font-size: 2rem;
        font-weight: bold;
    }

    .date .month {
        font-size: 1.2rem;
        font-weight: 700;
    }

    .date .year {
        font-size: 1rem;
        font-weight: 400;
    }

    .info {
        flex: 1;
        padding-left: 1.5rem;
    }

    .title {
        font-size: 1.5rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }

    .desc {
        font-weight: 300;
        color: #555;
    }

    .event-image img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 10px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .event {
            flex-direction: column;
            text-align: center;
        }

        .info {
            padding-left: 0;
            margin-top: 1rem;
        }

        .event-image img {
            width: 100%;
            max-width: 200px;
        }
    }
</style>

<div class="events page_section" style="margin-top: -100px">
    <div class="container">

        <!-- Alert -->
        <div class="alert alert-info text-center" role="alert">
            Check out our upcoming events below and stay updated with the latest news!
        </div>

        <!-- Marquee -->
        <div class="marquee-container mb-4">
            <marquee behavior="scroll" direction="left">
                Don't miss our special event on June 15th! | Register now for the annual fundraiser on July 20th! | Join
                our Zakat Campaign to support students in need!
            </marquee>
        </div>

        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>Upcoming Events</h1>
                </div>
            </div>
        </div>

        <div class="event_items">

            <!-- Event Item -->
            @foreach ($events as $item)
            <div class="row event_item ">
                <div class="col">
                    <div class="row d-flex flex-row align-items-end boardered" >

                        <div class="col-lg-2 order-lg-1 order-2">
                            <div class="event_date d-flex flex-column align-items-center justify-content-center">
                                <h2 class="event-date text-dark">{{$item->date}}</h2>
                            </div>
                        </div>

                        <div class="col-lg-6 order-lg-2 order-3">
                            <div class="event_content">
                                <div class="event_name"><a class="trans_200" href="#">{{$item->event_title}}</a></div>
                                <div class="event_location">{{$item->subtitle}}</div>
                                <p>{{$item->description }}</p>
                            </div>
                        </div>

                        <div class="col-lg-4 order-lg-3 order-1">
                            <div class="event_image">
                                <img src="{{ asset('events/' . $item->images) }}" class="img-fluid mb-3" alt="{{ $item->images }} Image" style="max-height: 220px; width:100%">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach

            @foreach ($events as $item)
                <div class="container py-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="event">

                                <!-- Date (Left Side) -->
                                <div class="date">
                                    <span class="day">{{ $item->formatted_day }}</span>
                                    <span class="month">{{ $item->formatted_month }}</span>
                                    <span class="year">{{ $item->formatted_year }}</span>
                                </div>

                                <!-- Event Info (Center) -->
                                <div class="info">
                                    <h2 class="title text-dark">{{ $item->event_title }}</h2>
                                    <h3 class="text-dark">{{ $item->subtitle }}</h3>

                                    <!-- Truncated Description -->
                                    <p class="desc text-dark short-desc">
                                        {{ Str::words($item->description, 40, '...') }}
                                    </p>

                                    <!-- Full Description (Hidden Initially) -->
                                    <p class="desc text-dark full-desc d-none">
                                        {{ $item->description }}
                                    </p>

                                    <!-- Read More Button -->
                                    <button class="btn btn-link read-more-btn">Read More</button>
                                </div>

                                <!-- Event Image (Right Side) -->
                                <div class="event-image">
                                    <img src="{{ asset('events/' . $item->images) }}" alt="Event Image"
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            <div class="d-flex justify-content-center mt-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-lg">
                        @if ($events->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $events->previousPageUrl() }}"
                                    aria-label="Previous">Previous</a>
                            </li>
                        @endif

                        <!-- Loop through pages -->
                        @for ($i = 1; $i <= $events->lastPage(); $i++)
                            <li class="page-item {{ $i == $events->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $events->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        @if ($events->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $events->nextPageUrl() }}" aria-label="Next">Next</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">Next</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>


        </div>

    </div>
</div>
\=======
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.event').forEach(event => {
            let shortDesc = event.querySelector('.short-desc');
            let fullDesc = event.querySelector('.full-desc');
            let readMoreBtn = event.querySelector('.read-more-btn');

            // Count words in the short description
            let wordCount = shortDesc.textContent.trim().split(/\s+/).length;

            // Hide Read More button if word count is less than 40
            if (wordCount < 40) {
                readMoreBtn.style.display = 'none';
            }

            // Toggle descriptions on button click
            readMoreBtn?.addEventListener('click', function() {
                if (fullDesc.classList.contains('d-none')) {
                    fullDesc.classList.remove('d-none');
                    shortDesc.classList.add('d-none');
                    this.textContent = "Read Less";
                } else {
                    fullDesc.classList.add('d-none');
                    shortDesc.classList.remove('d-none');
                    this.textContent = "Read More";
                }
            });
        });
    });
</script>
>>>>>>> parent of f1a3993 (phase 3)
