<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Default One Year Package</title>

    <!-- Include Required CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    @include('admin.layouts.head')
</head>

<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <div id="toaster"></div>
    <div class="wrapper">
        @include('admin.layouts.sidebar')

        <div class="page-wrapper">
            <!-- Header -->
            @include('admin.layouts.header')

            <div class="content-wrapper">
                <div class="content">
                    <!-- Table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h2>One Year Education List</h2>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="studentsTable" class="table table-hover table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Qalam ID</th>
                                                    <th>Student Name</th>
                                                    <th>Father Name</th>
                                                    <th>Institution</th>
                                                    <th>Discipline</th>
                                                    <th>Contact No</th>
                                                    <th>Home Address</th>
                                                    <th>Scholarship Name</th>
                                                    <th>Monthly Income</th>
                                                    <th>Remarks</th>
                                                    <th>Images</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($students as $student)
                                                <tr>
                                                    <td>{{ $student->qalam_id }}</td>
                                                    <td>{{ $student->student_name }}</td>
                                                    <td>{{ $student->father_name }}</td>
                                                    <td>{{ $student->institutions }}</td>
                                                    <td>{{ $student->discipline }}</td>
                                                    <td>{{ $student->contact_no }}</td>
                                                    <td>{{ $student->home_address }}</td>
                                                    <td>{{ $student->scholarship_name }}</td>
                                                    <td>{{ $student->monthly_income }}</td>
                                                    <td>{{ $student->remarks }}</td>
                                                    <td>
                                                        <img src="{{ asset('templates/students_images/'.$student->images) }}" 
                                                             alt="Student Photo" 
                                                             class="img-thumbnail"
                                                             style="width:50px; height:50px; object-fit:cover; border-radius:50%; cursor:pointer;"
                                                             data-bs-toggle="modal" 
                                                             data-src="{{ asset('templates/students_images/'.$student->images) }}" 
                                                             data-bs-target="#imageModal">
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('students_edit', $student->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ url('students.destroy', $student->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Student Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="Student Photo" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    @include('admin.layouts.script')

    <!-- Include Required JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function () {
            $('#studentsTable').DataTable({
                dom: 'Bfrtip', // Add buttons, search, and table functionality
                buttons: [
                    'print' // Add a print button
                ],
                language: {
                    search: "_INPUT_", // Customizes the search input field
                    searchPlaceholder: "Search students..."
                },
                pageLength: 10, // Default rows per page
                responsive: true // Makes the table responsive
            });

            // Handle image click to show in modal
            $('#studentsTable').on('click', 'img[data-bs-toggle="modal"]', function () {
                const imageUrl = $(this).data('src');
                $('#modalImage').attr('src', imageUrl);
            });
        });
    </script>
</body>

</html>
