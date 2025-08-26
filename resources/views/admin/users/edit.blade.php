<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Edit User</title>

    @include('admin.layouts.head')

    <style>
        body,
        table,
        th,
        td {
            color: #000;
        }
    </style>
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
            @include('admin.layouts.header')

            <div class="content-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-12">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="card card-default">
                                <div class="card-header">
                                    <h2>Edit User</h2>
                                </div>
                                <div class="card-body">
                                    <div class="card-body col-lg-8">
                                        <form action="{{ route('users.update', $users->id) }}" method="POST">
                                            @csrf
                                        

                                            <!-- Name & Email -->
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="name"
                                                        name="name" placeholder="Enter your name"
                                                        value="{{ old('name', $users->name) }}" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                        name="email" placeholder="Enter your email"
                                                        value="{{ old('email', $users->email) }}" required>
                                                </div>
                                            </div>

                                            <!-- Phone & New Password -->
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="phone" class="form-label">Phone</label>
                                                    <input type="text" class="form-control" id="phone"
                                                        name="phone" placeholder="Enter your phone number"
                                                        value="{{ old('phone', $users->phone) }}" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="password" class="form-label">New Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password"
                                                        placeholder="Enter a new password (leave blank to keep current)">
                                                </div>
                                            </div>

                                            <!-- User Type -->
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="usertype" class="form-label">User Type</label>
                                                    <select class="form-select" id="usertype" name="usertype" required>
                                                        <option value="admin"
                                                            {{ $users->usertype == 'admin' ? 'selected' : '' }}>Admin
                                                        </option>
                                                        <option value="user"
                                                            {{ $users->usertype == 'user' ? 'selected' : '' }}>User
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Submit -->
                                            <div class="text-center mt-3">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.layouts.script')


</body>

</html>
