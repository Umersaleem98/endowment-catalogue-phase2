<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
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
                                    <h2>Endowment Zakat List</h2>

                                    <!-- Bulk Delete Form -->
                                    <form id="bulkDeleteForm" action="{{ url('zakat-payments/bulk-delete') }}"
                                        method="POST">
                                        @csrf
                                        <input type="hidden" name="ids" id="bulkDeleteIds">
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete selected records?');">
                                            Delete Selected
                                        </button>
                                    </form>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="productsTable" class="table table-hover table-product"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <input type="checkbox" id="selectAll">
                                                    </th>
                                                    <th>ID</th>
                                                    <th>Payment Type</th>
                                                    <th>Donor Name</th>
                                                    <th>Donor Email</th>
                                                    <th>Phone</th>
                                                    <th>Duration</th>
                                                    <th>Amount</th>
                                                    <th>Prove</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($zakatpayment as $item)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="record-checkbox"
                                                                value="{{ $item->id }}">
                                                        </td>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->payment_type }}</td>
                                                        <td>{{ $item->donor_name }}</td>
                                                        <td>{{ $item->donor_email }}</td>
                                                        <td>{{ $item->phone }}</td>
                                                        <td>{{ $item->duration }}</td>
                                                        <td>{{ $item->amount }}</td>
                                                        <td>
                                                            @if ($item->prove && file_exists(public_path('uploads/zakatpayments-proof/' . $item->prove)))
                                                                <img src="{{ asset('uploads/zakatpayments-proof/' . $item->prove) }}"
                                                                    alt="Proof"
                                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                                            @else
                                                                No Proof
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('zakat.payments.delete', $item->id) }}"
                                                                class="btn btn-danger btn-sm"
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

    <script>
        // Select all checkboxes
        document.getElementById('selectAll').addEventListener('click', function() {
            const checkboxes = document.querySelectorAll('.record-checkbox');
            checkboxes.forEach(cb => cb.checked = this.checked);
        });

        // Collect selected IDs and submit the form
        document.getElementById('bulkDeleteForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const selected = Array.from(document.querySelectorAll('.record-checkbox:checked')).map(cb => cb.value);

            if (selected.length === 0) {
                alert('Please select at least one record.');
                return;
            }

            document.getElementById('bulkDeleteIds').value = selected.join(',');
            this.submit();
        });
    </script>
</body>

</html>
