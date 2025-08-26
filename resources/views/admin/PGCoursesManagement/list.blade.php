hello
<!DOCTYPE html>


<html lang="en" dir="ltr">

<head>

    <title>PG Course List</title>
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
                                    <h2>PG Course List</h2>
                                    <span>
                                        <a href="{{ route('pg.course.index') }}" class="btn btn-info">Add UG Course</a>
                                    </span>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="productsTable" class="table table-hover table-product"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Program</th>
                                                    <th>Degree</th>
                                                    <th>Fee</th>
                                                    {{-- <th>Edit</th> --}}
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pgcourses as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->program }}</td>
                                                        <td>{{ $item->degree }}</td>
                                                        <td>{{ $item->fee }}</td>
                                                        {{-- <td>
                                                        <a href="{{ url('countryedit/' . $item->id) }}" class="btn btn-success btn-sm">
                                                            Edit
                                                        </a>
                                                    </td> --}}
                                                        <td>
                                                            <form action="{{ route('course.pg.destroy', $item->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Are you sure you want to delete this country?');">
                                                                @csrf
                                                            
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    Delete
                                                                </button>
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


            <!-- Footer -->


        </div>
    </div>

    @include('admin.layouts.script')

    <!--  -->


</body>

</html>
