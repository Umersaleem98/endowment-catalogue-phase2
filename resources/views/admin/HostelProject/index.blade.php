<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Hostel Payment List</title>


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
                                    <h2>Hostel Payment List</h2>

                                </div>
                                <div class="card-body">
                                    <table id="productsTable" class="table table-hover table-product"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Donor Name</th>
                                                <th>Donor Email</th>
                                                <th>Country Code</th>
                                                <th>Phone</th>
                                                <th>Amount</th>
                                                <th>Created At</th> <!-- 👈 New column -->
                                                <th>Payment Proof</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($paymentslist as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->donor_name }}</td>
                                                    <td>{{ $item->donor_email }}</td>
                                                    <td>{{ $item->country_code }}</td>
                                                    <td>{{ $item->phone }}</td>
                                                    <td>{{ $item->total_cost }}</td>
                                                    <td>{{ $item->created_at->format('d M Y h:i A') }}</td>
                                                    <!-- 👈 Created Date -->
                                                    <td>
                                                        @if ($item->prove && file_exists(public_path('uploads/projecthostel/' . $item->prove)))
                                                            <a href="{{ asset('uploads/projecthostel/' . $item->prove) }}"
                                                                target="_blank">View Proof</a>
                                                        @else
                                                            <span onclick="alert('No proof exists')"
                                                                style="cursor: pointer; color: red;">No Proof
                                                                Exists</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <a class="btn btn-danger btn-sm"
                                                            href="{{ route('hostel.project.payment.delete', $item->id) }}"
                                                            onclick="return confirm('Are you sure you want to delete this payment?');">
                                                            Delete
                                                        </a>
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
