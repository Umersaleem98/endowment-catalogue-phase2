hello
<!DOCTYPE html>


<html lang="en" dir="ltr">

<head>

    <title>PG Course Create</title>
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
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <!-- Top Statistics -->
                    <!-- Table Product -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h2>Alumni Country List</h2>
                                    <span>
                                        <a href="{{ route('pg.course.list') }}" class="btn btn-warning">PG Course
                                            List</a>
                                    </span>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="col-md-6">
                                            <form action="{{ route('pg.course.update', $pgcourses->id) }}"
                                                method="POST">
                                                @csrf
                                               

                                                <label for="program" class="form-label">Program</label>
                                                <input type="text" name="program" class="form-control"
                                                    value="{{ old('program', $pgcourses->program) }}"
                                                    placeholder="Enter New Course" required>

                                                <label for="degree" class="form-label">Degree</label>
                                                <input type="text" name="degree" class="form-control"
                                                    value="{{ old('degree', $pgcourses->degree) }}"
                                                    placeholder="Enter New Degree" required>

                                                <label for="fee" class="form-label">Fee</label>
                                                <input type="number" name="fee" class="form-control"
                                                    value="{{ old('fee', $pgcourses->fee) }}"
                                                    placeholder="Enter New Fee" required>

                                                <input type="submit" value="Update" class="btn btn-primary mt-3">
                                            </form>

                                        </div>
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
