
    <title>Students Stories</title>
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
                    <form id="filterForm">
                        <div class="row">
                            <div class="col-md-2 mb-3 filter-col">
                                <select name="gender" id="genderFilter" class="form-control filter-select" aria-label="Select Gender">
                                    <option value="all" selected>All Genders</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-lg-2  mb-3 filter-col">
                                <select name="province" id="provinceFilter" class="form-control filter-select" aria-label="Select Province">
                                    <option value="all" selected>All Province</option>
                                    @foreach ($provinces as $item)
                                    <option value="{{ $item->provinces}}">{{ $item->provinces }}</option>
                                    @endforeach
                                    <!-- Add more options for provinces -->
                                </select>
                            </div>
                            
                            <div class="col-lg-2  mb-3 filter-col">
                                <select name="discipline" id="disciplineFilter" class="form-control filter-select" aria-label="Select Discipline">
                                    <option value="all" selected>All Disciplines</option>
                                    @foreach ($disciplines as $item)
                                    <option value="{{ $item->discipline }}">{{ $item->discipline }}</option>
                                    @endforeach
                                    <!-- Add more options for disciplines -->
                                </select>
                            </div>
                            <div class="col-lg-2  mb-3 filter-col">
                                <select name="degree" id="degreeFilter" class="form-control filter-select" aria-label="Select degree">
                                    <option value="all" selected>All Degrees</option>
                                    <option value="UG">Undergraduate (UG)</option>
                                    <option value="MS">Postgraduate (PG)</option>
                                    <!-- Add more options for degrees -->
                                </select>
                            </div>
                            <div class="col-lg-2  mb-3 filter-col">
                                <select name="domicile" id="cityFilter" class="form-control filter-select" aria-label="Select City">
                                    <option value="all" selected>All Cities</option>
                                    @foreach ($domiciles as $item)
                                    <option value="{{ $item->domicile }}">{{ $item->domicile }}</option>
                                    @endforeach
                                    <!-- Add more options for cities -->
                                </select>
                            </div>
                            <div class="col-lg-2  mb-3 filter-col">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mt-3" id="studentsContainer">
                @include('template.support_scholar.partials.students', ['students' => $students])
            </div>

            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm justify-content-center" id="pagination">
                    @include('template.support_scholar.partials.pagination', ['students' => $students])
                </ul>
            </nav>
        </div>
    </div>

    <!-- Milestones -->
    <div class="milestones">
        <div class="milestones_background" style="background-image:url('{{ asset('images/milestones_background.jpg') }}')">
            <!-- Milestones Background Content -->
        </div>

        <div class="container">
            <div class="row">
                <!-- Milestone Content -->
            </div>
        </div>
    </div>

</div>

@include('template.layouts.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function fetchStudents(page = 1) {
            const formData = $('#filterForm').serialize();

            $.ajax({
                url: "{{ url('student_stories') }}?page=" + page,
                type: 'GET',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    $('#studentsContainer').html(response.studentsHtml);
                    $('#pagination').html(response.paginationHtml);
                    highlightActiveFilters();
                }
            });
        }

        function highlightActiveFilters() {
            $('.filter-select').each(function() {
                const value = $(this).val();
                if (value && value !== 'all') {
                    $(this).addClass('filter-active');
                } else {
                    $(this).removeClass('filter-active');
                }
            });
        }

        $('#filterForm').on('submit', function(event) {
            event.preventDefault();
            fetchStudents();
            highlightActiveFilters(); // Ensure filters are highlighted immediately after form submission
        });

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            const page = $(this).attr('href').split('page=')[1];
            fetchStudents(page);
        });

        highlightActiveFilters(); // Initial call to highlight any pre-selected filters
    });
</script>

</body>
</html>
