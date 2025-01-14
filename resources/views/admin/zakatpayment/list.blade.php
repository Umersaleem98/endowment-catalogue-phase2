<!DOCTYPE html>


<html lang="en" dir="ltr">

<head>
    <title></title>
    <title>Zakat List</title>
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

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="productsTable" class="table table-hover table-product" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Payment Type</th>
                                                    <th>Donor Name</th>
                                                    <th>Donor Email</th>
                                                    <th>Phone</th>
                                                    <th>Duration</th>
                                                    <th>Amount</th>
                                                    <th>Prove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($zakatpayment as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->payment_type }}</td>
                                                        <td>{{ $item->donor_name }}</td>
                                                        <td>{{ $item->donor_email }}</td>
                                                        <td>{{ $item->phone }}</td>
                                                        <td>{{ $item->duration }}</td>
                                                        <td>{{ $item->amount }}</td>
                                                        <td>
                                                            @if ($item->prove && file_exists(public_path('uploads\zakatpayments-proof/' . $item->prove)))
                                                                <img src="{{ asset('uploads\zakatpayments-proof/' . $item->prove) }}" 
                                                                     alt="Proof" 
                                                                     style="width: 50px; height: 50px; object-fit: cover;">
                                                            @else
                                                                No Proof
                                                            @endif
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
