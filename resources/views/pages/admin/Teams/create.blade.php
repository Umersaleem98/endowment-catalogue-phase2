<title>Create Team</title>
@include('Layouts.admin.head')

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            @include('Layouts.admin.sidebar')
            <div class="layout-page">

                @include('Layouts.admin.header')

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <h4 class="fw-bold py-3 mb-4">Create Team Member</h4>

                        @include('Layouts.success')

                        <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- Name -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <!-- Email -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <!-- Phone -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Designation -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Designation</label>
                                    <input type="text" name="designation" class="form-control" required>
                                </div>

                                <!-- Gender -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Gender</label>
                                    <select name="gender" class="form-select" required>
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>

                                <!-- Status -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Social Media -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Social Media Link</label>
                                    <input type="text" name="social_media" class="form-control">
                                </div>

                                <!-- Image -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Profile Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>

                            <!-- Introduction -->
                            <div class="mb-3">
                                <label class="form-label">Introduction</label>
                                <textarea name="introduction" class="form-control" rows="4"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Save Team Member</button>
                            <a href="{{ route('team.index') }}" class="btn btn-secondary">Back</a>

                        </form>

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
