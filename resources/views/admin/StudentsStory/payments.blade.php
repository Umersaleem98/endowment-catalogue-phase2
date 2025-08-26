<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Students Payments List</title>

    @include('admin.layouts.head')

    <style>
        body,
        table,
        th,
        td {
            color: #000;
            /* Black color */
        }

        /* Add this style to make the table horizontally scrollable */
        .table-container {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch; /* For smoother scrolling on mobile */
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
                                    <h2>Students Payments List</h2>
                                </div>
                                <div class="card-body">
                                    <!-- Wrap the table in a container with horizontal scroll -->
                                    <div class="table-container">
                                        <table id="paymentsTable" class="table table-hover table-product" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Student Name</th>
                                                    <th>Donor Name</th>
                                                    <th>Donor Email</th>
                                                    <th>Phone</th>
                                                    <th>Duration</th>
                                                    <th>Duration Sum</th>
                                                    <th>Messing</th>
                                                    <th>Amount</th>
                                                    <th>Prove</th>
                                                    <th>Payment Approved</th>
                                                    {{-- <th>Actions</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Payments as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->student_name }}</td>
                                                        <td>{{ $item->donor_name }}</td>
                                                        <td>{{ $item->donor_email }}</td>
                                                        <td>{{ $item->phone }}</td>
                                                        <td>{{ $item->duration }}</td>
                                                        <td>{{ $item->duration_sum }}</td>
                                                        <td>{{ $item->messing }}</td>
                                                        <td>{{ $item->amount }}</td>
                                                        <td>{{ $item->prove }}</td>
                                                        <td>{{ $item->payment_approved ? 'Yes' : 'No' }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End of table container -->

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
