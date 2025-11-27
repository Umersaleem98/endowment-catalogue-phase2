<title>Four Year Endowment List</title>
@include('Layouts.admin.head')
<style>
    .table-responsive table tbody tr td {
        white-space: nowrap;
        max-width: 150px;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            @include('Layouts.admin.sidebar')

            <div class="layout-page">

                @include('Layouts.admin.header')

                <div class="content-wrapper">

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row gy-6">

                            @include('Layouts.success')

                            <div class="col-12">
                                <div class="card">

                                    <div class="card-header d-flex justify-content-between align-items-center">

                                        <h5 class="card-title mb-0">
                                            Four Year Endowment List
                                            <span class="badge bg-primary ms-2">{{ $totalItems ?? 0 }}</span>
                                        </h5>

                                        <!-- Search Form -->
                                        <form method="GET" action=""
                                            class="d-flex ms-auto me-3 align-items-center">

                                            <label for="perPage" class="me-2 mb-0" style="color:#000;">Per
                                                page:</label>
                                            <select name="perPage" id="perPage" class="form-select form-select-sm"
                                                style="width: auto;" onchange="this.form.submit()">
                                                @php
                                                    $perPageOptions = [10, 25, 50, 100, 150, 200];
                                                    $currentPerPage = request('perPage', 10);
                                                @endphp
                                                @foreach ($perPageOptions as $option)
                                                    <option value="{{ $option }}"
                                                        {{ $currentPerPage == $option ? 'selected' : '' }}>
                                                        {{ $option }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <input type="text" name="search"
                                                class="form-control form-control-sm ms-3" placeholder="Search..."
                                                value="{{ request('search') }}">
                                            <button class="btn btn-primary btn-sm ms-2" type="submit">Search</button>
                                            <a href="{{ route('endowment.fulldegree.defult') }}"
                                                class="btn btn-info btn-sm ms-2">Reset</a>
                                        </form>
                                    </div>

                                    <!-- Bulk delete form -->
                                    <form action="{{ route('fouryear.bulk.delete') }}" method="POST"
                                        id="bulkDeleteForm">
                                        @csrf
                                        @method('DELETE')

                                        <div class="card-body">

                                            <button type="submit" class="btn btn-danger mb-3 btn-sm"
                                                onclick="return confirm('Are you sure you want to delete selected records?')">
                                                Delete Selected
                                            </button>

                                            <div class="table-responsive text-nowrap">
                                                <table
                                                    class="table table-sm table-striped table-hover align-middle small">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <input type="checkbox" id="selectAll">
                                                            </th>
                                                            <th>#</th>
                                                            {{-- <th>Hostel & Messing</th> --}}
                                                            <th>Program Type</th>
                                                            <th>Degree</th>
                                                            <th>Seats</th>
                                                            <th>Total Amount</th>
                                                            <th>Donor Name</th>
                                                            <th>Donor Email</th>
                                                            <th>Phone</th>
                                                            <th>About Partner</th>
                                                            <th>Philanthropist Text</th>
                                                            <th>School</th>
                                                            <th>Country</th>
                                                            <th>Year</th>
                                                            <th>Payments Status</th>
                                                            <th>Prove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($fouryear as $index => $item)
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox" name="ids[]"
                                                                        value="{{ $item->id }}"
                                                                        class="itemCheckbox">
                                                                </td>
                                                                <td>{{ $fouryear->firstItem() + $index }}</td>
                                                                {{-- <td>{{ $item->hostelandmessing }}</td> --}}
                                                                <td>{{ $item->program_type }}</td>
                                                                <td>{{ $item->degree }}</td>
                                                                <td>{{ $item->seats }}</td>
                                                                <td>{{ number_format($item->totalAmount, 2) }}</td>
                                                                <td>{{ $item->donor_name }}</td>
                                                                <td>{{ $item->donor_email }}</td>
                                                                <td>{{ $item->phone }}</td>
                                                                <td>{{ \Illuminate\Support\Str::limit($item->about_partner, 50) }}
                                                                </td>
                                                                <td>{{ \Illuminate\Support\Str::limit($item->philanthropist_text, 50) }}
                                                                </td>
                                                                <td>{{ $item->school }}</td>
                                                                <td>{{ $item->country }}</td>
                                                                <td>{{ $item->year }}</td>
                                                                <td>
                                                                    @if ($item->payments_status)
                                                                        <span class="badge bg-success">Paid</span>
                                                                    @else
                                                                        <span
                                                                            class="badge bg-warning text-dark">Pending</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($item->prove)
                                                                        <a href="{{ asset('storage/' . $item->prove) }}"
                                                                            target="_blank"
                                                                            class="btn btn-sm btn-primary">
                                                                            View
                                                                        </a>
                                                                    @else
                                                                        <span class="text-muted">N/A</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="17" class="text-center">No records found.
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="d-flex justify-content-center mt-4">
                                                {{ $fouryear->links() }}
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="content-backdrop fade"></div>
                </div>

            </div>

        </div>

        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    @include('Layouts.admin.script')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Select all toggle
            document.getElementById('selectAll').addEventListener('change', function() {
                let checkboxes = document.querySelectorAll('.itemCheckbox');
                checkboxes.forEach(cb => cb.checked = this.checked);
            });
        });
    </script>

</body>

</html>
