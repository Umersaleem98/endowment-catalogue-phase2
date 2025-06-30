<!DOCTYPE html>
<html lang="en">
<head>
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
        input.form-control, select.form-control {
            color: black;
        }
        input.form-control::placeholder {
            color: black;
            opacity: 1;
        }
        select.form-control option {
            color: black;
        }
        .filter-col {
            width: 16.666667%;
        }
        .filter-active {
            background-color: #FFB606 !important;
            color: white !important;
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
    @include('template.layouts.navbar')
    @include('template.layouts.home')

    <div class="teachers page_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form id="filterForm">
                        <div class="row">
                            <div class="col-md-2 mb-3 filter-col">
                                <select name="gender" id="genderFilter" class="form-control filter-select">
                                    <option value="all" selected>All Genders</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3 filter-col">
                                <select name="province" id="provinceFilter" class="form-control filter-select">
                                    <option value="all" selected>All Province</option>
                                    @foreach ($provinces as $item)
                                        <option value="{{ $item->provinces }}">{{ $item->provinces }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 mb-3 filter-col">
                                <select name="discipline" id="disciplineFilter" class="form-control filter-select">
                                    <option value="all" selected>All Disciplines</option>
                                    @foreach ($disciplines as $item)
                                        <option value="{{ $item->discipline }}">{{ $item->discipline }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 mb-3 filter-col">
                                <select name="degree" id="degreeFilter" class="form-control filter-select">
                                    <option value="all" selected>All Degrees</option>
                                    <option value="UG">Undergraduate (UG)</option>
                                    <option value="PG">Postgraduate (PG)</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-3 filter-col">
                                <select name="domicile" id="cityFilter" class="form-control filter-select">
                                    <option value="all" selected>All Cities</option>
                                    @foreach ($domiciles as $item)
                                        <option value="{{ $item->domicile }}">{{ $item->domicile }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 mb-3 filter-col">
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

    <div class="milestones">
        <div class="milestones_background" style="background-image:url('{{ asset('images/milestones_background.jpg') }}')"></div>
        <div class="container">
            <div class="row">
                <!-- milestone content -->
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
                $(this).toggleClass('filter-active', value && value !== 'all');
            });
        }

        $('#filterForm').on('submit', function(event) {
            event.preventDefault();
            fetchStudents();
            highlightActiveFilters();
        });

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            const page = $(this).attr('href').split('page=')[1];
            fetchStudents(page);
        });

        highlightActiveFilters();
    });
</script>
</body>
</html>
