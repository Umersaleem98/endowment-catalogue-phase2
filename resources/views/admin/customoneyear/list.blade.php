<!DOCTYPE html>


<html lang="en" dir="ltr">

<head>
    <title>Custom One Year Package</title>
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
                                    <h2>Custom One Year Endowment list</h2>
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <button id="deleteSelectedBtn" class="btn btn-danger btn-sm" disabled>Delete
                                            Selected</button>
                                    </div>

                                    <div class="table-responsive">
                                        <form id="bulkDeleteForm" action="{{ url('custom-oneyear/bulk-delete') }}"
                                            method="POST">
                                            @csrf
                                            <table id="productsTable" class="table table-hover table-product"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" id="selectAll"></th>
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
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($oneyears as $item)
                                                        <tr>
                                                            <td><input type="checkbox" name="ids[]"
                                                                    value="{{ $item->id }}" class="selectItem"></td>
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
                                                                <a href="{{ route('custom.oneyear.endowment.delete', $item->id) }}"
                                                                    class="btn btn-danger btn-sm">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>

                                <script>
                                    // Handle select all
                                    document.getElementById('selectAll').addEventListener('click', function() {
                                        const checkboxes = document.querySelectorAll('.selectItem');
                                        checkboxes.forEach(cb => cb.checked = this.checked);
                                        toggleDeleteButton();
                                    });

                                    // Handle individual checkbox selection
                                    document.querySelectorAll('.selectItem').forEach(cb => {
                                        cb.addEventListener('change', toggleDeleteButton);
                                    });

                                    // Enable/Disable delete button
                                    function toggleDeleteButton() {
                                        const anyChecked = document.querySelectorAll('.selectItem:checked').length > 0;
                                        document.getElementById('deleteSelectedBtn').disabled = !anyChecked;
                                    }

                                    // Handle bulk delete
                                    document.getElementById('deleteSelectedBtn').addEventListener('click', function(e) {
                                        e.preventDefault();
                                        if (confirm('Are you sure you want to delete the selected records?')) {
                                            document.getElementById('bulkDeleteForm').submit();
                                        }
                                    });
                                </script>

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
