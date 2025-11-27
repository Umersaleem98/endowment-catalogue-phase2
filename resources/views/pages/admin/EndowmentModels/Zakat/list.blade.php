<title>Zakat Endowment List</title>
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
                                            Zakat Endowment List
                                            <span class="badge bg-primary ms-2">{{ $zakat->total() }}</span>
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
                                            <a href="{{ route('endowment.zakat.fund') }}"
                                                class="btn btn-info btn-sm ms-2">Reset</a>
                                        </form>
                                    </div>

                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-sm table-striped table-hover align-middle small">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
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
                                                @forelse ($zakat as $index => $item)
                                                    <tr>
                                                        <td>{{ $zakat->firstItem() + $index }}</td>
                                                        <td>{{ $item->payment_type }}</td>
                                                        <td>{{ $item->donor_name }}</td>
                                                        <td>{{ $item->donor_email }}</td>
                                                        <td>{{ $item->phone }}</td>
                                                        <td>{{ $item->duration }}</td>
                                                        <td>{{ number_format($item->amount, 2) }}</td>
                                                        <td>
                                                            @if ($item->prove)
                                                                <a href="{{ asset('uploads/zakat-payments/' . $item->prove) }}"
                                                                    target="_blank" class="btn btn-sm btn-primary">
                                                                    View
                                                                </a>
                                                            @else
                                                                <span class="text-muted">N/A</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="8" class="text-center">No records found.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="d-flex justify-content-center mt-4">
                                        {{ $zakat->links() }}
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
