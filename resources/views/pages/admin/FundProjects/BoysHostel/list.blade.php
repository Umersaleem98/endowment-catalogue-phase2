<title>Boys Hostel Payment List</title>
@include('Layouts.admin.head')

<style>
    .table-responsive table tbody tr td {
        white-space: nowrap;
        max-width: 150px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Image thumbnail style */
    .payment-prove-img {
        max-width: 100px;
        max-height: 60px;
        object-fit: cover;
        border-radius: 4px;
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
                                            Boys Hostel Cost Estimate List
                                            <span class="badge bg-primary ms-2">{{ $boys_hostel->total() }}</span>
                                        </h5>

                                        <form method="GET" action="{{ route('fundproject.boysHostel') }}"
                                            class="d-flex ms-auto me-3 align-items-center">
                                            <input type="text" name="search" class="form-control form-control-sm"
                                                placeholder="Search..." value="{{ request('search') }}">

                                            <label for="perPage" class="mb-0 ms-3 me-1">Per page:</label>
                                            <select name="perPage" id="perPage" class="form-select form-select-sm"
                                                style="width: auto;" onchange="this.form.submit()">
                                                @foreach ([10, 25, 50, 100] as $option)
                                                    <option value="{{ $option }}"
                                                        {{ request('perPage', 10) == $option ? 'selected' : '' }}>
                                                        {{ $option }}</option>
                                                @endforeach
                                            </select>

                                            <button class="btn btn-primary btn-sm ms-2" type="submit">Search</button>
                                            <a href="{{ route('fundproject.boysHostel') }}"
                                                class="btn btn-info btn-sm ms-2">Reset</a>
                                        </form>
                                    </div>

                                    <div class="card-body table-responsive">
                                        <table class="table table-striped table-hover table-sm align-middle">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Description</th>
                                                    <th>Area (Sft)</th>
                                                    <th>Quantity</th>
                                                    <th>Total Area (Sft)</th>
                                                    <th>Construction Cost</th>
                                                    <th>Total Project Cost</th>
                                                    <th>Rs in Million</th>
                                                    <th>Project Name</th>
                                                    <th>Donor Name</th>
                                                    <th>Donor Email</th>
                                                    <th>Donor Phone</th>
                                                    <th>Payment Prove</th>
                                                    <th>Created At</th> {{-- NEW --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($boys_hostel as $index => $item)
                                                    <tr>
                                                        <td>{{ $boys_hostel->firstItem() + $index }}</td>
                                                        <td>{{ $item->description }}</td>
                                                        <td>{{ number_format($item->area_sft, 2) }}</td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>{{ number_format($item->total_area_sft, 2) }}</td>
                                                        <td>{{ number_format($item->construction_cost, 2) }}</td>
                                                        <td>{{ number_format($item->total_project_cost, 2) }}</td>
                                                        <td>{{ number_format($item->total_in_million, 2) }}</td>
                                                        <td>{{ $item->project_name }}</td>
                                                        <td>{{ $item->donor_name }}</td>
                                                        <td>{{ $item->donor_email }}</td>
                                                        <td>{{ $item->donor_phone }}</td>
                                                        <td>
                                                            @if ($item->prove)
                                                                <img src="{{ asset('uploads/fund-Project/Boys-Hostel/' . $item->prove) }}"
                                                                    alt="Payment Prove" class="payment-prove-img">
                                                            @else
                                                                N/A
                                                            @endif
                                                        </td>

                                                        <td>{{ $item->created_at ? $item->created_at->format('d-M-Y h:i A') : 'N/A' }}
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="13" class="text-center">No records found.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>

                                        <div class="d-flex justify-content-end">
                                            {{ $boys_hostel->links() }}
                                        </div>
                                    </div>
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
</body>

</html>
