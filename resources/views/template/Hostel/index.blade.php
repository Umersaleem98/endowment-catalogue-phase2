<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hostel Stories</title>
    @include('template.layouts.head')
    <style>
        .pagination li.active a {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }

        .pagination li a:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            color: white;
        }

        /* Style for input text color */
        input.form-control {
            color: black;
        }

        /* Style for placeholder text color */
        input.form-control::placeholder {
            color: black;
            opacity: 1; /* Override default opacity */
        }

        select.form-control {
            color: black;
        }

        /* Style for select option text color */
        select.form-control option {
            color: black;
        }

        /* Custom class for filter col-md-2 */
        .filter-col {
            width: 16.666667%; /* 1/6th of the container width */
        }

        /* New style for active filter */
        .filter-active {
            background-color: #FFB606 !important; /* Green background */
            color: white !important; /* White text */
        }

        @media (max-width: 767.98px) {
    .filter-col {
        width: 100%;
        margin-bottom: 10px;
    }

    .filter-label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }
}
    </style>
</head>
<body>

<div class="super_container">

    <!-- Header -->
    @include('template.layouts.navbar')

    <!-- Home -->
    @include('template.layouts.home')

    <!-- Teachers -->
    <div class="teachers page_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                        {{ $students->id}}
                        {{ $students->student_name}}
                </div>
            </div>
        </div>
    </div>

    <!-- Milestones -->
   

</div>

@include('template.layouts.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>
</html>
