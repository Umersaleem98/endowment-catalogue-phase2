<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Business Center Payments</title>
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
            @include('admin.layouts.header')

            <div class="content-wrapper">
                <div class="content">
                    <!-- Table Section -->
                    <div class="row">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="col-12">
                            <div class="card card-default">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2>Business Center Payments</h2>

                                    <!-- Bulk Delete Button -->

                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <form id="businessCenterForm" action="{{ url('business-center/bulk-delete') }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete selected records?');">
                                            @csrf
                                            <table id="productsTable" class="table table-hover table-product"
                                                style="width:100%">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>
                                                            <input type="checkbox" id="selectAll">
                                                        </th>
                                                        <th>ID</th>
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
                                                        <th>Proof</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($businesscenter as $item)
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" name="ids[]"
                                                                    value="{{ $item->id }}">
                                                            </td>
                                                            <td>{{ $item->id }}</td>
                                                            <td>{{ $item->description }}</td>
                                                            <td>{{ $item->area_sft }}</td>
                                                            <td>{{ $item->quantity }}</td>
                                                            <td>{{ $item->total_area_sft }}</td>
                                                            <td>{{ $item->construction_cost }}</td>
                                                            <td>{{ $item->total_project_cost }}</td>
                                                            <td>{{ $item->total_in_million }}</td>
                                                            <td>{{ $item->project_name }}</td>
                                                            <td>{{ $item->donor_name }}</td>
                                                            <td>{{ $item->donor_email }}</td>
                                                            <td>{{ $item->donor_phone }}</td>
                                                            <td>
                                                                @if (
                                                                    $item->prove &&
                                                                        file_exists(public_path('uploads/fundaprojects_paymentsbusiness_center_store-proof/' . $item->prove)))
                                                                    <a href="{{ asset('uploads/fundaprojects_paymentsbusiness_center_store-proof/' . $item->prove) }}"
                                                                        target="_blank">
                                                                        <img src="{{ asset('uploads/fundaprojects_paymentsbusiness_center_store-proof/' . $item->prove) }}"
                                                                            alt="Proof"
                                                                            style="width: 50px; height:50px; object-fit:cover;">
                                                                    </a>
                                                                @else
                                                                    <span class="text-danger">No Proof</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-danger btn-sm"
                                                                    href="{{ url('business/center/project/delete', $item->id) }}"
                                                                    onclick="return confirm('Are you sure you want to delete this payment?');">
                                                                    Delete
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <button type="submit" class="btn btn-danger btn-sm mt-2">
                                                Delete Selected
                                            </button>
                                        </form>
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

    <script>
        // ✅ Select All Checkboxes
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('input[name="ids[]"]');
            checkboxes.forEach(cb => cb.checked = this.checked);
        });
    </script>
</body>

</html>
