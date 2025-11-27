<title>Student Stories Payment List</title>
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
                                            Student Stories Payment List
                                            <span class="badge bg-primary ms-2">{{ $stories_payment->total() }}</span>
                                        </h5>

                                        <!-- Search & Per Page Form -->
                                        <form method="GET" action=""
                                            class="d-flex ms-auto me-3 align-items-center">

                                            <input type="text" name="search" class="form-control form-control-sm"
                                                placeholder="Search payments..." value="{{ request('search') }}">

                                            <label for="perPage" class="mb-0 ms-3 me-1" style="color:#000;">Per
                                                page:</label>
                                            <select name="perPage" id="perPage" class="form-select form-select-sm"
                                                style="width: auto;" onchange="this.form.submit()">
                                                @php
                                                    $perPageOptions = [10, 25, 50, 100];
                                                    $currentPerPage = request('perPage', 10);
                                                @endphp
                                                @foreach ($perPageOptions as $option)
                                                    <option value="{{ $option }}"
                                                        {{ $currentPerPage == $option ? 'selected' : '' }}>
                                                        {{ $option }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <button class="btn btn-primary btn-sm ms-2" type="submit">Search</button>
                                            <a href="{{ route('student.stories.paynow.index') }}"
                                                class="btn btn-info btn-sm ms-2">Reset</a>
                                        </form>
                                    </div>

                                    <div class="card-body table-responsive">
                                        <table class="table table-sm table-striped table-hover align-middle small">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Student Name</th>
                                                    <th>Donor Name</th>
                                                    <th>Donor Email</th>
                                                    <th>Phone</th>
                                                    <th>Duration</th>
                                                    <th>Duration Sum</th>
                                                    <th>Messing</th>
                                                    <th>Amount</th>
                                                    <th>Payment Approved</th>
                                                    <th>Prove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($stories_payment as $index => $payment)
                                                    <tr>
                                                        <td>{{ $stories_payment->firstItem() + $index }}</td>
                                                        <td>{{ $payment->student_name }}</td>
                                                        <td>{{ $payment->donor_name }}</td>
                                                        <td>{{ $payment->donor_email }}</td>
                                                        <td>{{ $payment->phone }}</td>
                                                        <td>{{ $payment->duration }}</td>
                                                        <td>{{ $payment->duration_sum }}</td>
                                                        <td>{{ $payment->messing }}</td>
                                                        <td>{{ number_format($payment->amount, 2) }}</td>
                                                        <td>
                                                            @if ($payment->payment_approved)
                                                                <span class="badge bg-success">Approved</span>
                                                            @else
                                                                <span class="badge bg-warning text-dark">Pending</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($payment->prove)
                                                                <img src="{{ asset('uploads/prove/' . $payment->prove) }}"
                                                                    alt="Prove" class="payment-prove-img">
                                                            @else
                                                                <span class="text-muted">No file</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="11" class="text-center">No payments found.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>

                                        <div class="d-flex justify-content-end">
                                            {{ $stories_payment->withQueryString()->links() }}
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
