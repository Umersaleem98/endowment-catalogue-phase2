<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Students List</title>
    @include('admin.layouts.head')

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
        NProgress.configure({ showSpinner: false });
        NProgress.start();
    </script>

    <div id="toaster"></div>
    <div class="wrapper">
        @include('admin.layouts.sidebar')

        <div class="page-wrapper">
            @include('admin.layouts.header')

            <div class="content-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h2>Students List</h2>
                                </div>

                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                <div class="card-body">

                                    <!-- Combined Filter and Import Row -->
                                    <div class="d-flex flex-wrap align-items-end mb-3">
                                        <form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-wrap align-items-end">
                                            @csrf
                                            <div class="mr-2 mb-2">
                                                <label class="form-label">Choose File</label>
                                                <input type="file" name="file" class="form-control" accept=".xlsx, .csv">
                                            </div>
                                            <div class="mr-2 mb-2">
                                                <button type="submit" class="btn btn-dark btn-sm">Import</button>
                                            </div>
                                            <div class="mr-2 mb-2">
                                                <a href="{{ url('export') }}" class="btn btn-success btn-sm">Export</a>
                                            </div>
                                            <div class="mr-2 mb-2">
                                                <a href="{{ url('add_new_student') }}" class="btn btn-info btn-sm">Add New Student</a>
                                            </div>
                                        </form>

                                        <div class="ml-auto mb-2">
                                            <label for="filterYear" class="form-label">Filter by Year</label>
                                            <select id="filterYear" class="form-control" style="width: 200px;">
                                                <option value="">All Years</option>
                                                @foreach ($students->pluck('year_of_admission')->unique() as $year)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Bulk Delete Form -->
                                    <form id="bulkDeleteForm" action="{{ url('students.bulkDelete') }}" method="POST">
                                        @csrf
                                        <div class="table-responsive">
                                            <table id="productsTable" class="table table-hover table-product" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" id="select-all"></th>
                                                        <th>Qalam ID</th>
                                                        <th>Student Name</th>
                                                        <th>Father Name</th>
                                                        <th>Institution</th>
                                                        <th>Discipline</th>
                                                        <th>Contact No</th>
                                                        <th>Scholarship Name</th>
                                                        <th>Year</th>
                                                        <th>Monthly Income</th>
                                                        <th>Remarks</th>
                                                        <th>Images</th>
                                                        <th>Edit/Delete</th>
                                                        <th>Adopted</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-dark">
                                                    @foreach ($students as $student)
                                                        <tr>
                                                            <td><input type="checkbox" name="ids[]" value="{{ $student->id }}"></td>
                                                            <td>{{ $student->qalam_id }}</td>
                                                            <td>{{ $student->student_name }}</td>
                                                            <td>{{ $student->father_name }}</td>
                                                            <td>{{ $student->institutions }}</td>
                                                            <td>{{ $student->discipline }}</td>
                                                            <td>{{ $student->contact_no }}</td>
                                                            <td>{{ $student->scholarship_name }}</td>
                                                            <td>{{ $student->year_of_admission }}</td>
                                                            <td>{{ $student->monthly_income }}</td>
                                                            <td>{{ $student->remarks }}</td>
                                                            <td>
                                                                <img src="{{ asset('templates/students_images/' . $student->images) }}"
                                                                    alt="Student Photo" class="img-thumbnail"
                                                                    style="width:40px; height:40px; object-fit:cover; border-radius:50%;"
                                                                    onerror="this.onerror=null;this.src='{{ asset('templates/students_images/dummy.png') }}';">
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('students_edit', $student->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                                <a href="{{ url('students_delete', $student->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('students_adopted', $student->id) }}" class="btn btn-sm btn-info">Adopted</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <button type="submit" class="btn btn-danger btn-sm mt-2"
                                            onclick="return confirm('Are you sure you want to delete selected students?')">
                                            Delete Selected
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.layouts.script')

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- JavaScript -->
    <script>
        // Select all checkboxes
        document.getElementById('select-all').addEventListener('change', function() {
            let checkboxes = document.querySelectorAll('input[name="ids[]"]');
            checkboxes.forEach(cb => cb.checked = this.checked);
        });

        // Initialize DataTable
        $(document).ready(function() {
            let table = $('#productsTable').DataTable({
                lengthMenu: [5, 10, 20, 50, 100]
            });

            // Filter by year using DataTables API
            $('#filterYear').on('change', function() {
                let selectedYear = $(this).val();
                table.column(8).search(selectedYear).draw(); // 8 = "Year" column index
            });
        });
    </script>

</body>

</html>
