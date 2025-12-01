@include('Layouts.admin.head')

<body>
    <!-- Content -->

    <div class="position-relative">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-6 mx-4">

                <!-- CENTERED ROW -->
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-6">

                        <!-- Login Card -->
                        <div class="card p-sm-7 p-2">
                            <!-- /Logo -->

                            <div class="card-body mt-1">
                                <h4 class="mb-1">Welcome to Endowment Catalogue! 👋🏻</h4>
                                <p class="mb-5">Please sign in to your account</p>

                                <form action="{{ route('login.submit') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autofocus placeholder="Enter email">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required placeholder="Enter password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="remember" name="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">Remember me</label>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100">Sign in</button>
                                </form>

                                <div class="mt-3 text-center">
                                    {{-- <p>Don't have an account? --}}
                                        {{-- <a href="{{ route('register') }}">Register here</a> --}}
                                    </p>
                                </div>
                            </div>

                        </div>
                        <!-- /Login Card -->

                    </div>
                </div>

                <img src="admins/assets/img/illustrations/tree-3.png" alt="auth-tree"
                    class="authentication-image-object-left d-none d-lg-block" />
                <img src="admins/assets/img/illustrations/auth-basic-mask-light.png"
                    class="authentication-image d-none d-lg-block scaleX-n1-rtl" height="172" alt="triangle-bg" />


            </div>
        </div>
    </div>

    @include('Layouts.admin.script')

</body>

</html>
