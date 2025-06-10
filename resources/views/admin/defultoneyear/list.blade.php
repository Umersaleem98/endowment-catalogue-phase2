<!DOCTYPE html>


<html lang="en" dir="ltr">

<head>
    <title>Defult One Year Package</title>
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
                    <!-- Top Statistics -->
                    <!-- Table Product -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h2>One Year Education list</h2>
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif


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
                                                    <th>Seats</th>
                                                    <th>Total Amount</th>
                                                    <th>Donor Name</th>
                                                    <th>Donor Email</th>
                                                    <th>Phone</th>
                                                    <th>About Partner</th>
                                                    <th>School</th>
                                                    <th>Country</th>
                                                    <th>Year</th>
                                                    <th>Status</th>
                                                    <th>Prove</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($oneyears as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->program_type }}</td>
                                                        <td>{{ $item->degree }}</td>
                                                        <td>{{ $item->seats }}</td>
                                                        <td>{{ $item->totalAmount }}</td>
                                                        <td>{{ $item->donor_name }}</td>
                                                        <td>{{ $item->donor_email }}</td>
                                                        <td>{{ $item->phone }}</td>
                                                        <td>{{ $item->about_partner }}</td>
                                                        <td>{{ $item->school }}</td>
                                                        <td>{{ $item->country }}</td>
                                                        <td>{{ $item->year }}</td>
                                                        <td>{{ $item->payments_status }}</td>
                                                        <td>
                                                            @if ($item->prove && file_exists(public_path('uploads/Oneyear-proof/' . $item->prove)))
                                                                <img src="{{ asset('uploads/Oneyear-proof/' . $item->prove) }}"
                                                                    alt="Proof"
                                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                                            @else
                                                                No Proof
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('defult.oneyear.destroy', $item->id) }}"
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


            <!-- Footer -->


        </div>
    </div>

    @include('admin.layouts.script')

    <!--  -->


</body>

</html>
