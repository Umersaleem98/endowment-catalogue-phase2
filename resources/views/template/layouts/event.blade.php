
<style>
    .event {
        background-color: #fff;
        margin-bottom: 1rem;
        padding: 1rem;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .date {
    background-color: #085590;
    text-align: center;
    color: #fff;
    padding: 0.8rem;
    border-radius: 10px;
    width: 90px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.date span {
    font-size: 1.2rem;
    font-weight: 500;
    line-height: 1.2;
}

    .date .day { font-size: 1.5rem; font-weight: bold; }
    .date .month { font-size: 1rem; font-weight: 700; }
    .date .year { font-size: 0.9rem; }

    .info {
        flex: 1;
        padding-left: 1rem;
    }

    .title { font-size: 1.2rem; font-weight: 500; margin-bottom: 0.3rem; }
    .desc { font-size: 0.9rem; font-weight: 300; color: #555; }

    .event-image img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 10px;
    }

    @media (max-width: 768px) {
        .event { flex-direction: column; text-align: center; }
        .info { padding-left: 0; margin-top: 1rem; }
        .event-image img { max-width: 200px; width: 100%; }
    }
</style>

<div class="events page_section" style="margin-top: -100px">
    <div class="container">

        <!-- Alert -->
        <div class="alert alert-info text-center">
            Check out our upcoming events below and stay updated with the latest news!
        </div>

        <!-- Marquee -->
        <div class="marquee-container mb-4">
            <marquee behavior="scroll" direction="left">
                Don't miss our special event on June 15th! | Register now for the annual fundraiser on July 20th! |
                Join our Zakat Campaign to support students in need!
            </marquee>
        </div>

        <div class="row">
            <div class="col text-center">
                <h1 class="text-dark">Upcoming Events</h1>
            </div>
        </div>

        <div id="event-list">
            @foreach ($events as $item)
                <div class="container py-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="event">
        
                                <!-- Date -->
                                <div class="date">
                                    <span class="day">{{ $item->formatted_day }}</span>
                                    <span class="month">{{ $item->formatted_month }}</span>
                                    <span class="year">{{ $item->formatted_year }}</span>
                                </div>
        
                                <!-- Info -->
                                <div class="info">
                                    <h2 class="title text-dark">{{ $item->event_title }}</h2>
                                    <h3 class="text-dark">{{ $item->subtitle }}</h3>
                                    <p class="desc text-dark short-desc">
                                        {{ Str::words($item->description, 40, '...') }}
                                    </p>
                                    <p class="desc text-dark full-desc d-none">
                                        {{ $item->description }}
                                    </p>
                                    <button class="btn btn-link read-more-btn">Read More</button>
                                </div>
        
                                <!-- Image -->
                                <div class="event-image">
                                    <img src="{{ asset('events/' . $item->images) }}" alt="Event Image" class="img-fluid">
                                </div>
        
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {!! $events->links('pagination::bootstrap-4') !!}
            </div>
        </div>
        
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- AJAX + Read More -->
<script>
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        let url = $(this).attr('href');
        fetchEvents(url);
    });

    function fetchEvents(url) {
        $.ajax({
            url: url,
            type: "GET",
            success: function(data) {
                $('#event-list').html($(data).find('#event-list').html());
                bindReadMoreButtons();
                window.history.pushState(null, null, url);
            },
            error: function() {
                alert('Could not load events. Please try again.');
            }
        });
    }

    function bindReadMoreButtons() {
        $('.read-more-btn').off('click').on('click', function() {
            const card = $(this).closest('.event');
            card.find('.short-desc').toggleClass('d-none');
            card.find('.full-desc').toggleClass('d-none');
            $(this).text($(this).text() === "Read More" ? "Read Less" : "Read More");
        });
    }

    $(document).ready(function() {
        bindReadMoreButtons();
    });
</script>
