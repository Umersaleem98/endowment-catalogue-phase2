<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Team Index</title>

    @include('admin.layouts.head')

    <style>
        body,
        table,
        th,
        td {
            color: #000;
            /* Black color */
        }
    </style>
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
            @include('admin.layouts.header')

            <div class="content-wrapper">
                <div class="content">
                    <!-- Top Statistics -->
                    <!-- Table Product -->
                    <div class="row">
                        <div class="col-12">

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="card card-default">
                                <div class="card-header">
                                    <h2>Add Team Member</h2>

                                </div>
                                <div class="card-body">
                                    <div class="card-body col-lg-12">
                                        <form action="{{ url('add_team_member') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <!-- Name & Email in one row -->
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" id="name"
                                                        name="name" placeholder="Enter name">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                        name="email" placeholder="Enter email">
                                                </div>
                                            </div>

                                            <!-- Designation & Gender in one row -->
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="designation">Designation</label>
                                                    <input type="text" class="form-control" id="designation"
                                                        name="designation" placeholder="Enter designation">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="gender">Gender</label>
                                                    <select class="form-control" id="gender" name="gender">
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Phone & Image in one row -->
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" class="form-control" id="phone"
                                                        name="phone" placeholder="Enter phone number">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="image">Image</label>
                                                    <input type="file" class="form-control" id="image"
                                                        name="image">
                                                </div>
                                            </div>

                                            <!-- Social Media & Introduction in one row -->
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="social_media">LinkedIn</label>
                                                    <input type="text" class="form-control" id="social_media"
                                                        name="social_media" placeholder="LinkedIn profile link">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="introduction">Introduction</label>
                                                    <textarea class="form-control" id="introduction" name="introduction" rows="3"></textarea>
                                                </div>
                                            </div>

                                            <!-- Submit -->
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>

    <!-- Card Offcanvas -->


    @include('admin.layouts.script')
</body>

</html>
