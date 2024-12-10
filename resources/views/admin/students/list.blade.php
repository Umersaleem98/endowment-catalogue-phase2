a<!DOCTYPE html>


<html lang="en" dir="ltr">

<head>
    <title></title>
    <title>Defult One Year Package</title>
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
                    <!-- Top Statistics -->
                    <!-- Table Product -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h2>Students list</h2>

                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="productsTable" class="table table-hover table-product"
                                            style="width:100%">
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
                                                            <img src="{{ asset('templates/students_images/' . $student->images) }}"
                                                                alt="Student Photo" class="img-thumbnail"
                                                                style="width:50px; height:50px; object-fit:cover; border-radius:50%; cursor:pointer;"
                                                                data-bs-toggle="modal"
                                                                data-src="{{ asset('templates/students_images/' . $student->images) }}"
                                                                data-bs-target="#imageModal">
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('students_edit', $student->id) }}"
                                                                class="btn btn-sm btn-primary">Edit</a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('students_delete', $student->id) }}"
                                                                class="btn btn-sm btn-danger">Delete</a>
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


            <!-- Footer -->


        </div>
    </div>

    @include('admin.layouts.script')

    <!--  -->


</body>

</html>
