<!DOCTYPE html>
<html lang="en">
<head>
    <title>Select Projects</title>
    @include('template.layouts.head')
    <style>

        .custom-image {
            height: 200px; /* Set your desired height here */
            width: 100%;
            object-fit: cover; /* This ensures the image covers the area without distortion */
            margin-bottom: 20px; /* Add vertical gap between images */
        }
    </style>
</head>
<body>

<div class="super_container">

    <!-- Header -->
    @include('template.layouts.navbar')

    @include('template.layouts.home')
<br>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1 class="">Build a Lasting Legacy</h1>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 mb-2">
                <img src="{{ asset('templates/images/girls hostel 01-01.jpg') }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-6">
                <img src="{{ asset('templates/images/mosque 02-01.jpg') }}" alt="" class="img-fluid">
            </div>
        </div>
        
    </div>

    <div class="events page_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1 class="">Select Project for Funds</h1>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container mt-3">
                <div class="row">
                    @foreach ($project_categories as $item)
                    <div class="col-md-3 mb-5">
                        <div class="card">
                            <img src="{{ asset('templates/project_category/' . $item->project_image) }}" class="card-img-top rounded" alt="{{ $item->project_name }} image">
                            <div class="card-body text-center">
                                <h2 class="card-title text-dark text-center">{{ $item->project_name }}</h2>
                                {{-- <p class="card-text text-dark">{{ $item->description }}</p> --}}
                                <a href="{{ url($item->links, ['id' => $item->id]) }}" class="btn btn-primary text-center">Visit</a>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- New Bottom Section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="background-color: #004476 ">
                <h3 class="text-center text-warning p-4" style="height:70px">Partnerships Paving Way for a Transformative Pakistan</h3>
                <hr>
                <p class="text-light">
                    On January 1, 2020, the Pakistan Navy Engineering College NUST (PNEC NUST) in Karachi proudly inaugurated the new Begum Yusuf H. Shirazi Girls Hostel. This project was made possible through the generous philanthropic support of the Atlas Foundation. The newly completed block, designed to accommodate 72 female students, spans three floors, each featuring eight rooms.
                </p>
                <p class="text-light">
                    Additionally, the Atlas Foundation funded the renovation and uplift of the old hostel building at a cost of approximately PKR 5.4 million. This comprehensive upgrade included the expansion of the dining hall, the construction of a new kitchen, and roof treatment.
                </p>
                <p class="text-light"> This initiative stands as a testament to the significant impact that philanthropic contributions can make in enhancing educational facilities. We invite other donors to join us in creating similar opportunities and fostering an environment that supports and empowers our students.
                </p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('templates/images/partnership1.jpeg') }}" class="img-fluid rounded shadow custom-image" alt="Mission Image">
                <img src="{{ asset('templates/images/partnership2.jpeg') }}" class="img-fluid rounded shadow custom-image" alt="Mission Image">
            </div>
        </div>
    </div>

    <br><br>
    <!-- Footer -->
    @include('template.layouts.footer')

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
