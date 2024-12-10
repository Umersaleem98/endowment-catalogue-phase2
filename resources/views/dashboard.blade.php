<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
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
                    <div class="row">
                        <!-- Total Students Card -->
                        <div class="col-md-4">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Total Students</h5>
                                    <p class="card-text">{{ $totalStudents }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Admitted Students Card -->
                        <div class="col-md-4">
                            <div class="card text-white bg-success mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Admitted Students</h5>
                                    <p class="card-text">{{ $admittedStudents }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Other Metric Card (Example) -->
                        <div class="col-md-4">
                            <div class="card text-white bg-info mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Pending Applications</h5>
                                    <p class="card-text">{{ $pendingApplications }}</p>
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

</body>

</html>
