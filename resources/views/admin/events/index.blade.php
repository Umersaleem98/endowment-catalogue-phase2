<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Create Event</title>


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
                                    <h2>Add Events</h2>

                                </div>
                                <div class="card-body">
                                    <div class="card-body col-lg-8">
                                        <form action="{{ route('event.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <!-- Event Title -->
                                            <div class="mb-3">
                                                <label for="event_title" class="form-label">Event Title</label>
                                                <input type="text" class="form-control" id="event_title"
                                                    name="event_title" required>
                                            </div>

                                            <!-- Subtitle -->
                                            <div class="mb-3">
                                                <label for="subtitle" class="form-label">Subtitle</label>
                                                <input type="text" class="form-control" id="subtitle"
                                                    name="subtitle" required>
                                            </div>

                                            <!-- Description -->
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                            </div>

                                            <!-- Date -->
                                            <div class="mb-3">
                                                <label for="date" class="form-label">Date</label>
                                                <input type="date" class="form-control" id="date" name="date"
                                                    required>
                                            </div>

                                            <!-- Images -->
                                            <div class="mb-3">
                                                <label for="images" class="form-label">Images</label>
                                                <input type="file" class="form-control" id="images" name="images"
                                                    multiple>
                                            </div>

                                            <!-- Submit Button -->
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
