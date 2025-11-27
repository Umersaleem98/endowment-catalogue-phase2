<title>Teams List</title>
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
                                            UAO Teams List
                                            <span class="badge bg-primary ms-2">{{ $teams->total() }}</span>
                                        </h5>

                                        <form method="GET" action="{{ route('team.index') }}"
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
                                            <a href="{{ route('team.index') }}"
                                                class="btn btn-info btn-sm ms-2">Reset</a>
                                        </form>
                                    </div>

                                    <div class="card-body table-responsive">
                                        <table class="table table-striped table-hover table-sm align-middle">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Designation</th>
                                                    <th>Gender</th>
                                                    <th>Phone</th>
                                                    <th>Status</th>
                                                    <th>Image</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                    <th>Created At</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @forelse($teams as $index => $team)
                                                    <tr>
                                                        <td>{{ $teams->firstItem() + $index }}</td>

                                                        <td>{{ $team->name }}</td>
                                                        <td>{{ $team->email }}</td>
                                                        <td>{{ $team->designation }}</td>
                                                        <td>{{ ucfirst($team->gender) }}</td>
                                                        <td>{{ $team->phone }}</td>

                                                        <td>
                                                            @if ($team->status)
                                                                <span class="badge bg-success">Active</span>
                                                            @else
                                                                <span class="badge bg-danger">Inactive</span>
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if ($team->image)
                                                                <img src="{{ asset('uploads/team/' . $team->image) }}"
                                                                    class="payment-prove-img" alt="Team Image">
                                                            @else
                                                                N/A
                                                            @endif
                                                        </td>

                                                        <td>
                                                            <a href="{{ route('team.edit', $team->id) }}"
                                                                class="btn btn-warning btn-sm">
                                                                Edit
                                                            </a>


                                                        </td>
                                                        <td>
                                                            <form action="{{ route('team.delete', $team->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Are you sure you want to delete this team member?');">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </td>

                                                        <td>{{ $team->created_at ? $team->created_at->format('d-M-Y h:i A') : 'N/A' }}
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="11" class="text-center">No records found.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>

                                        <div class="d-flex justify-content-end">
                                            {{ $teams->links() }}
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
