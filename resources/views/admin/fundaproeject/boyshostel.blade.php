<!DOCTYPE html>


<html lang="en" dir="ltr">

<head>
  <title>Boys Hostel Payments</title>
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
                                  <h2>Boys Hostel</h2>

                              </div>
                              <div class="card-body">
                                 <div class="table-responsive">
                                  <table id="productsTable" class="table table-hover table-product"
                                  style="width:100%">
                                  <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Description</th>
                                        <th>Area (Sq. Ft)</th>
                                        <th>Quantity</th>
                                        <th>Total Area (Sq. Ft)</th>
                                        <th>Construction Cost</th>
                                        <th>Total Project Cost</th>
                                        <th>Total in Million</th>
                                        <th>Project Name</th>
                                        <th>Donor Name</th>
                                        <th>Donor Email</th>
                                        <th>Donor Phone</th>
                                        <th>Prove</th>
                                    </tr>
                                </thead>
                                  <tbody>
                                    @foreach ($boysHostel as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->area_sft }}</td>
                                        <td>{{ $item->seats }}</td>
                                        <td>{{ $item->total_area_sft }}</td>
                                        <td>{{ $item->construction_cost }}</td>
                                        <td>{{ $item->total_project_cost }}</td>
                                        <td>{{ $item->total_in_million }}</td>
                                        <td>{{ $item->project_name }}</td>
                                        <td>{{ $item->donor_name }}</td>
                                        <td>{{ $item->donor_email }}</td>
                                        <td>{{ $item->donor_phone }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/fundaprojects_payments_boys-proof/' . $item->prove) }}"
                                            alt="Proof Image" style="width: 50px; height:50px;">
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
