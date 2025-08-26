<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Team List</title>


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
                                    <h2>Team List</h2>

                                </div>
                                <div class="card-body">
                                    <table id="productsTable" class="table table-hover table-product"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Designation</th>
                                                <th>Gender</th>
                                                <th>Phone</th>
                                                <th>Image</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($teams as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->designation }}</td>
                                                    <td>{{ $item->gender }}</td>
                                                    <td>{{ $item->phone }}</td>
                                                    <td>
                                                        @if ($item->image)
                                                            {{-- <img src="{{ asset('images/'.$item->image) }}" alt="Image" style="width: 50px; height:50px;"> --}}
                                                            <img src="{{ asset('team/' . $item->image) }}"
                                                                alt="Image" style="width: 50px; height:50px;">
                                                        @else
                                                            No Image
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('team.edit', $item->id) }}"
                                                            class="btn btn-primary">Edit</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('team.delete', $item->id) }}"
                                                            class="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
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

    <!-- Card Offcanvas -->


    @include('admin.layouts.script')
</body>

</html>
