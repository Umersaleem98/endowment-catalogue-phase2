<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Student story Pledge List</title>

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
                                    <h2>Students Pledge list</h2>
                                </div>
                                <div class="card-body">
                                    <table id="productsTable" class="table table-hover table-product" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Student Name</th>
                                                <th>Donor Name</th>
                                                <th>Donor Email</th>
                                                <th>Phone</th>
                                                <th>Donation Percent</th>
                                                <th>Amount</th>
                                                <th>Donation For</th>
                                                <th>Pledge Approved</th>
                                                {{-- <th>Edit</th>
                                                <th>Delete</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pledge as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->student_name }}</td>
                                                    <td>{{ $item->donor_name }}</td>
                                                    <td>{{ $item->donor_email }}</td>
                                                    <td>{{ $item->phone }}</td>
                                                    <td>{{ $item->donation_percent }}</td>
                                                    <td>{{ $item->amount }}</td>
                                                    <td>{{ $item->donation_for }}</td>
                                                    <td>{{ $item->pledge_approved ? 'Yes' : 'No' }}</td>
                                                    {{-- <td>
                                                        <a href="{{ url('event_edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('event_delete', $item->id) }}" class="btn btn-danger">Delete</a>
                                                    </td> --}}
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

    @include('admin.layouts.script')
</body>

</html>
