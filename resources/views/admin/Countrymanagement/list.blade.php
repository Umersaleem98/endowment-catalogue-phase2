hello<!DOCTYPE html>


<html lang="en" dir="ltr">

<head>

  <title>Country List</title>
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
                @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
                  <!-- Top Statistics -->
                  <!-- Table Product -->
                  <div class="row">
                    <div class="col-12">
                        <div class="card card-default">
                            <div class="card-header">
                                <h2>Alumni Country List</h2>
                                <span>
                                    <a href="{{ url('country_data_index') }}" class="btn btn-info">Add Country</a>
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="productsTable" class="table table-hover table-product" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Country</th>
                                                {{-- <th>Edit</th> --}}
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($countries as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->countryname }}</td>
                                                    {{-- <td>
                                                        <a href="{{ url('countryedit/' . $item->id) }}" class="btn btn-success btn-sm">
                                                            Edit
                                                        </a>
                                                    </td> --}}
                                                    <td>
                                                        <a href="{{ url('countrydelete/' . $item->id) }}" class="btn btn-danger btn-sm">
                                                            Edit
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


            <!-- Footer -->


        </div>
    </div>

    @include('admin.layouts.script')

    <!--  -->


</body>

</html>
