<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>User List</title>

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
                                    <h2>User list</h2>

                                </div>
                                <div class="card-body">
                                    <table id="usersTable" class="table table-hover table-product" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>User Type</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td> <!-- Id -->
                                                    <td>{{ $item->name }}</td> <!-- Name -->
                                                    <td>{{ $item->email }}</td> <!-- Email -->
                                                    <td>{{ $item->usertype }}</td> <!-- User Type -->
                                                    <td>
                                                        <a href="{{ url('user_edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a> <!-- Edit Button -->
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('user_delete', $item->id) }}" class="btn btn-danger btn-sm">Delete</a> <!-- Delete Button -->
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

    <!-- Card Offcanvas -->


    @include('admin.layouts.script')
</body>

</html>
