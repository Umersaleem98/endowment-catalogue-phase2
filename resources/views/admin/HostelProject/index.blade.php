<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Hostel Payment List</title>
    @include('admin.layouts.head')

    <style>
        body, table, th, td {
            color: #000;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px; /* ✅ Forces proper horizontal scroll */
        }

        th, td {
            text-align: center;
            vertical-align: middle !important;
            white-space: nowrap; /* ✅ Prevent text wrapping */
            padding: 10px 12px !important;
        }

        th {
            background-color: #f8f9fa;
            text-transform: uppercase;
            font-size: 13px;
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
        }

        tbody tr:hover {
            background-color: #f3f6ff;
        }

        .btn-sm {
            font-size: 12px;
            padding: 4px 10px;
        }

        .card-header h2 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 0;
        }

        .card {
            border: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>

<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
        NProgress.configure({ showSpinner: false });
        NProgress.start();
    </script>

    <div id="toaster"></div>
    <div class="wrapper">
        @include('admin.layouts.sidebar')

        <div class="page-wrapper">
            @include('admin.layouts.header')

            <div class="content-wrapper">
                <div class="content">
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
                                    <div class="table-responsive">
                                        <table id="productsTable" class="table table-bordered table-hover align-middle">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Donor Name</th>
                                                    <th>Donor Email</th>
                                                    <th>Country Code</th>
                                                    <th>Phone</th>
                                                    <th>Amount</th>
                                                    <th>Created At</th>
                                                    <th>Payment Proof</th>
                                                    <th>Action</th>
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
                                                        <td>
                                                            @if ($item->prove && file_exists(public_path('uploads/projecthostel/' . $item->prove)))
                                                                <a href="{{ asset('uploads/projecthostel/' . $item->prove) }}" 
                                                                   target="_blank" class="text-primary fw-semibold">
                                                                   View Proof
                                                                </a>
                                                            @else
                                                                <span class="text-danger fw-semibold">No Proof Exists</span>
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
    </div>

    @include('admin.layouts.script')
</body>
</html>
