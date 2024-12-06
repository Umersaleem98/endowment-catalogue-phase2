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
            <div class="col-md-6" style="background-color: #004476 ">
                <h2 class="text-center text-warning p-4" style="height:70px">
                    Why Invest in Girl’s Hostel?
                </h2>
                <hr>
                <p class="text-light">
                    The construction of a girls' hostel at our university is a pivotal step toward fostering an inclusive, safe, and supportive educational environment. By providing secure and affordable accommodation, we ensure that female students from diverse backgrounds can pursue their academic goals without the added stress of finding suitable housing. This initiative not only promotes gender equity but also enhances the overall academic performance and well-being of our students. Investing in this project means investing in the future leaders, innovators, and professionals who will drive our society forward. We invite you to join us in this transformative endeavor, creating lasting impact and empowering the next generation of women scholars.
                </p>
            </div>
            <div class="col-md-6 border" style="background-color: #004476 ">
                <h2 class="text-center p-4 text-warning" style="height:70px">
                    Why Invest in a Mosque?
                </h2>
                <hr>
                <p class="text-light">
                    Investing in the construction of a mosque at NUST offers a unique opportunity to foster spiritual growth and community cohesion among our diverse student body. Supporting this project means contributing to the holistic development of our students, promoting values of peace, understanding, and unity. By building a mosque, you are investing in the moral and ethical foundation of future leaders, ensuring they have the spiritual support needed to thrive in their academic and personal lives. Your generosity will leave a legacy, enriching the lives of countless students by keeping them connected to their core values as Muslims and ensure a harmonious campus environment.
                </p>
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
            <div class="container mt-5">
                <div class="row">
                    @foreach ($project_categories as $item)
                    <div class="col-md-3 mb-5">
                        <div class="card">
                            <img src="{{ asset('templates/project_category/' . $item->project_image) }}" class="card-img-top rounded" alt="{{ $item->project_name }} image">
                            <div class="card-body text-center">
                                <h2 class="card-title text-dark text-center">{{ $item->project_name }}</h2>
                                {{-- <p class="card-text text-dark">{{ $item->description }}</p> --}}
                                <a href="{{ url('fund_project', ['id' => $item->id]) }}" class="btn btn-primary text-center">Visit</a>
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
