<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Boys Hostel Payments</title>
    @include('admin.layouts.head')

    <style>
        body,
        table,
        th,
        td {
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
            min-width: 1000px;
        }

        th,
        td {
            text-align: center;
            vertical-align: middle !important;
            white-space: nowrap;
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
                    <div class="row">
                        <div class="col-12">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="card card-default">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2>Boys Hostel Payments</h2>
                                    <!-- ✅ Bulk Delete Button -->
                                    <form id="bulkDeleteForm" method="POST"
                                        action="{{ url('boys/hostel/bulk-delete') }}">
                                        @csrf
                                        <input type="hidden" name="ids" id="delete_ids">
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="deleteSelected()">Delete Selected</button>
                                    </form>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="productsTable" class="table table-hover table-bordered align-middle">
                                            <thead>
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
                                                    <th>Prove</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($boysHostel as $item)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="record-checkbox"
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
                                                            @if ($item->prove && file_exists(public_path('uploads/fundaprojects_payments_boys-proof/' . $item->prove)))
                                                                <a href="{{ asset('uploads/fundaprojects_payments_boys-proof/' . $item->prove) }}"
                                                                    target="_blank">
                                                                    <img src="{{ asset('uploads/fundaprojects_payments_boys-proof/' . $item->prove) }}"
                                                                        alt="Proof"
                                                                        style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                                                                </a>
                                                            @else
                                                                <span class="text-danger fw-semibold">No Proof</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-danger btn-sm"
                                                                href="{{ url('boys/hostel/project/delete', $item->id) }}"
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

    <!-- ✅ JavaScript for Select/Delete -->
    <script>
        // Select All Checkbox
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.record-checkbox');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });

        // Delete Selected
        function deleteSelected() {
            const selected = Array.from(document.querySelectorAll('.record-checkbox:checked')).map(cb => cb.value);
            if (selected.length === 0) {
                alert('Please select at least one record to delete.');
                return;
            }

            if (confirm('Are you sure you want to delete the selected records?')) {
                document.getElementById('delete_ids').value = selected.join(',');
                document.getElementById('bulkDeleteForm').submit();
            }
        }
    </script>
</body>

</html>
