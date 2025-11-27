<!DOCTYPE html>
<html lang="en">
<head>
    <title>Meet Our Team</title>
    @include('template.layouts.head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        .hover-card:hover {
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3); /* Example box shadow for hover effect */
            transform: translateY(-5px); /* Example translateY for hover effect */
            transition: all 0.3s ease; /* Example transition for smooth effect */
        }
        .social-icon {
            margin-right: 10px; /* Add right margin for spacing between icons */
            margin-bottom: 10px; /* Add bottom margin for vertical spacing */
        }
        .card-image {
            width: 200px; /* Set the width of the image */
            height: 200px; /* Set the height of the image */
            object-fit: cover; /* Ensure the image covers the entire container */
            border-radius: 10px; /* Add rounded corners */
            border: 2px solid #ccc; /* Add a border for framing */
        }
        /* Custom CSS to reduce line height for h2 tags within .card-body */
    </style>
</head>
<body>
    @include('template.layouts.home')

    <div class="super_container">
        @include('template.layouts.navbar')

        <div class="row mt-4">
            <div class="col">
                <div class="section_title text-center">
                    <h1>MEET OUR TEAM</h1>
                </div>
            </div>
        </div>

        <!-- Header -->
        <div class="container-fluid vh-100 d-flex flex-column justify-content-center align-items-center mt-5">
            <div class="text-center mb-4">
                <img src="{{ asset('team/' . $teams->image) }}" alt="Image 1" class="card-image">
            </div>


            <div class="text-center pl-5 pr-5">
                <h2 class="text-dark">{{$teams->name}}&nbsp; ({{$teams->designation}})</h2>
            </div>
            <div class="col-md-8">
                <p class="text-dark text-justify">{{$teams->introduction}}</p>
            </div>

            <div class="col-md-8">
                <h1 class="text-dark">Contact Info</h1>
                <h3 class="text-dark">{{$teams->email}}</h3>
                <h3 class="text-dark">{{$teams->phone}}</h3>
            </div>
        </div>

        <!-- Other card elements -->

        <br><br>



        @include('template.layouts.event')
        @include('template.layouts.footer')
    </div>
</body>
</html>
