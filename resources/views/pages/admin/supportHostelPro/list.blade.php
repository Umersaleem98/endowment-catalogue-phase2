<title>support Hostel List</title>
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
                                            support Hostel List
                                            <span class="badge bg-primary ms-2">{{ $totalStudents ?? 0 }}</span>
                                        </h5>

                                        <!-- Search Form -->
                                        <form method="GET" action=""
                                            class="d-flex ms-auto me-3 align-items-center">

                                            <label for="perPage" class="me-2 mb-0" style="color:#000;"> per
                                                page:</label>
                                            <select name="perPage" id="perPage" class="form-select form-select-sm"
                                                style="width: auto;" onchange="this.form.submit()">
                                                @php
                                                    $perPageOptions = [50, 100, 150, 200, 250, 300];
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
                                                class="form-control form-control-sm ms-3"
                                                placeholder="Search student..." value="{{ request('search') }}">
                                            <button class="btn btn-primary btn-sm ms-2" type="submit">Search</button>
                                            <a href="{{ route('support.hostel.index') }}"
                                                class="btn btn-info btn-sm ms-2">Reset</a>
                                        </form>
                                    </div>

                                    <div class="card-body">


                                        {{-- Bulk Delete Form --}}


                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-sm table-striped table-hover align-middle small">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Donor Name</th>
                                                        <th>Donor Email</th>
                                                        <th>Country Code</th>
                                                        <th>Phone</th>
                                                        <th>Total Cost</th>
                                                        <th>Prove</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($hostels as $index => $item)
                                                        <tr>
                                                            <td>{{ $hostels->firstItem() + $index }}</td>
                                                            <td>{{ $item->donor_name }}</td>
                                                            <td>{{ $item->donor_email }}</td>
                                                            <td>{{ $item->country_code }}</td>
                                                            <td>{{ $item->phone }}</td>
                                                            <td>{{ $item->total_cost }}</td>

                                                            <!-- Prove File -->
                                                            <td>
                                                                @if ($item->prove)
                                                                    <a href="{{ asset('uploads/hostel_proofs/' . $item->prove) }}"
                                                                        target="_blank" class="btn btn-sm btn-primary">
                                                                        View File
                                                                    </a>
                                                                @else
                                                                    <span class="badge bg-warning">No File</span>
                                                                @endif
                                                            </td>

                                                            <!-- Action -->
                                                            {{-- <td>
                                                                <a href="{{ url('support.hostel.edit', $item->id) }}"
                                                                    class="btn btn-sm btn-info">Edit</a>

                                                                <form
                                                                    action="{{ url('support.hostel.destroy', $item->id) }}"
                                                                    method="POST" style="display:inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-sm btn-danger"
                                                                        onclick="return confirm('Are you sure?')">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            </td> --}}
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="8" class="text-center">No Records Found</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>

                                            </table>
                                        </div>

                                        <div class="d-flex justify-content-center mt-4">
                                            {{ $hostels->links() }}
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
    <script src="{{ asset('js/std_scriptjsjs') }}"></script>

</body>

</html>
