<!DOCTYPE html>
<title>Team Update</title>
<html lang="en" dir="ltr">

<head>


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
                                    <h2>Team Update</h2>

                                </div>
                                <div class="card-body">
                                    <div class="card-body col-lg-8">
                                        <form action="{{ url('update_team', $teams->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ $teams->name }}" placeholder="Enter name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="{{ $teams->email }}" placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label for="designation">Designation</label>
                                                <input type="text" class="form-control" id="designation"
                                                    name="designation" value="{{ $teams->designation }}"
                                                    placeholder="Enter designation">
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Gender</label>
                                                <select class="form-control" id="gender" name="gender">
                                                    <option value="male"
                                                        {{ $teams->gender == 'male' ? 'selected' : '' }}>Male</option>
                                                    <option value="female"
                                                        {{ $teams->gender == 'female' ? 'selected' : '' }}>Female
                                                    </option>
                                                    <option value="other"
                                                        {{ $teams->gender == 'other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                    value="{{ $teams->phone }}" placeholder="Enter phone number">
                                            </div>
                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <input type="file" class="form-control-file" id="image"
                                                    name="image">
                                                @if ($teams->image)
                                                    <img src="{{ asset('team/' . $teams->image) }}" alt="Image"
                                                        style="width: 50px; height:50px; margin-top: 10px;">
                                                @else
                                                    No Image
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="social_media">Linkedin</label>
                                                <input type="text" class="form-control" id="social_media"
                                                    name="social_media" value="{{ $teams->social_media }}"
                                                    placeholder="Enter social media">
                                            </div>
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
