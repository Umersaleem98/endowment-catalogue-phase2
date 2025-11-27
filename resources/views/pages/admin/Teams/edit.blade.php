<title>Create Student</title>
@include('Layouts.admin.head')

<style>
    /* Hide number input arrows */
    /* Chrome, Safari, Edge, Opera */
    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('Layouts.admin.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('Layouts.admin.header')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <h4 class="fw-bold py-3 mb-4">Edit Team</h4>
                        <form action="{{ route('team.update', $teams->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control"
                                        value="{{ old('name', $teams->name) }}" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ old('email', $teams->email) }}" required>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Designation</label>
                                    <input type="text" name="designation" class="form-control"
                                        value="{{ old('designation', $teams->designation) }}">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">Gender</label>
                                    <select name="gender" class="form-select">
                                        <option value="male" {{ $teams->gender == 'male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="female" {{ $teams->gender == 'female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ old('phone', $teams->phone) }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1" {{ $teams->status ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ !$teams->status ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label">Social Media Link</label>
                                    <input type="text" name="social_media" class="form-control"
                                        value="{{ old('social_media', $teams->social_media) }}">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Profile Image</label>
                                    <input type="file" name="image" class="form-control">

                                    @if ($teams->image)
                                        <img src="{{ asset('uploads/team/' . $teams->image) }}"
                                            class="img-thumbnail mt-1" width="100" height="80"
                                            style="object-fit: cover;">
                                    @endif
                                </div>
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Introduction</label>
                                <textarea name="introduction" class="form-control" rows="4">{{ old('introduction', $teams->introduction) }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Team Member</button>
                            <a href="{{ route('team.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>

                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    @include('Layouts.admin.script')
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
