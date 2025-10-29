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
                                    <form id="bulkDeleteForm" action="{{ url('defult-one-year/bulk-delete') }}"
                                        method="POST">
                                        @csrf

                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-danger btn-sm" id="deleteSelectedBtn"
                                                disabled>
                                                Delete Selected
                                            </button>
                                        </div>

                                        <div class="table-responsive">
                                            <table id="productsTable" class="table table-hover table-product"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <input type="checkbox" id="selectAll">
                                                        </th>
                                                        <th>Id</th>
                                                        <th>Hostel/exp</th>
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
                                                            <td>
                                                                <input type="checkbox" name="selected_ids[]"
                                                                    value="{{ $item->id }}" class="selectItem">
                                                            </td>
                                                            <td>{{ $item->id }}</td>
                                                            <td>{{ $item->hostelandmessing }}</td>
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
                                                                <a href="{{ route('defult.oneyear.destroy', $item->id) }}"
                                                                    class="btn btn-sm btn-danger">Delete</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
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

    <script>
        // Select/Deselect all checkboxes
        document.getElementById('selectAll').addEventListener('click', function() {
            const checkboxes = document.querySelectorAll('.selectItem');
            checkboxes.forEach(cb => cb.checked = this.checked);
            toggleDeleteButton();
        });

        // Enable/Disable Delete button
        document.querySelectorAll('.selectItem').forEach(cb => {
            cb.addEventListener('change', toggleDeleteButton);
        });

        function toggleDeleteButton() {
            const selected = document.querySelectorAll('.selectItem:checked').length;
            document.getElementById('deleteSelectedBtn').disabled = selected === 0;
        }

        // Confirm before bulk delete
        document.getElementById('bulkDeleteForm').addEventListener('submit', function(e) {
            if (!confirm('Are you sure you want to delete the selected records?')) {
                e.preventDefault();
            }
        });
    </script>

</body>

</html>
