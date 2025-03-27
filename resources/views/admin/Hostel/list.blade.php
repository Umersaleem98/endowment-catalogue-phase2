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
                                                <th>Student Name</th>
                                                <th>Donor Name</th>
                                                <th>Donor Email</th>
                                                <th>Phone</th>
                                                <th>Duration</th>
                                                <th>Amount</th>
                                                <th>Payment Type</th>
                                                <th>Payment Proof</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($hostelpayments as $key => $payment)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $payment->student_name }}</td>
                                                    <td>{{ $payment->donor_name }}</td>
                                                    <td>{{ $payment->donor_email }}</td>
                                                    <td>{{ $payment->phone }}</td>
                                                    <td>{{ $payment->duration }}</td>
                                                    <td>${{ number_format($payment->amount, 2) }}</td>
                                                    <td>{{ $payment->payment_type }}</td>
                                                    <td>
                                                        @if ($payment->payment_proof)
                                                            <a href="{{ asset('uploads/Hostel-proof/' . $payment->payment_proof) }}"
                                                                target="_blank">
                                                                View Proof
                                                            </a>
                                                        @else
                                                            No Proof
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('payments_edit', $payment->id) }}"
                                                            class="btn btn-sm btn-danger">Delete</a>
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
