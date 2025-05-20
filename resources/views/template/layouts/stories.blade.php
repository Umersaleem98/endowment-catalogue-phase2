<div class="popular page_section" style="margin-top: -40px;">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>Transformative Tales</h1>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-4 g-4 mt-5">
            @foreach ($students->take(8) as $item)
                @if ($item->images !== 'dummy.jpg')
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <a href="{{ url('student_stories') }}">
                                <img src="{{ asset('templates/students_images/' . $item->images) }}"
                                    class="card-img-top" alt="Student Story Image"
                                    style="filter: blur(5px); height: 250px; object-fit: cover;">
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- View More Button -->
        <div class="row mt-4">
            <div class="col text-center">
                <a href="{{ url('student_stories') }}" class="btn btn-primary px-4 py-2">View More</a>
            </div>
        </div>
    </div>
</div>
