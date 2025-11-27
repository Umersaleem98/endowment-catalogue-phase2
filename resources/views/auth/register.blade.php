@include('Layouts.admin.head')

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0" style="min-height: 100vh; align-items: center; justify-content: center;">
        
        <!-- Spinner (optional) -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center" style="display:none;">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <!-- Register Form Start -->
        <div class="bg-light rounded p-4 shadow" style="width: 100%; max-width: 480px;">
            <h3 class="mb-4 text-center">Register</h3>

            <form action="{{ route('register.submit') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input 
                        type="text" 
                        class="form-control @error('name') is-invalid @enderror" 
                        id="name" 
                        name="name" 
                        value="{{ old('name') }}" 
                        placeholder="Enter your full name" 
                        required 
                        autofocus>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input 
                        type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        placeholder="Enter email" 
                        required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input 
                        type="text" 
                        class="form-control @error('phone') is-invalid @enderror" 
                        id="phone" 
                        name="phone" 
                        value="{{ old('phone') }}" 
                        placeholder="Enter phone number" 
                        required>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="usertype" class="form-label">User Type</label>
                    <select class="form-select @error('usertype') is-invalid @enderror" id="usertype" name="usertype" required>
                        <option value="" disabled selected>Select user type</option>
                        <option value="admin" {{ old('usertype') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ old('usertype') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="moderator" {{ old('usertype') == 'moderator' ? 'selected' : '' }}>Moderator</option>
                    </select>
                    @error('usertype')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input 
                        type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        id="password" 
                        name="password" 
                        placeholder="Enter password" 
                        required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        placeholder="Confirm password" 
                        required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>

            <div class="mt-3 text-center">
                <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
            </div>
        </div>
        <!-- Register Form End -->

    </div>

    @include('Layouts.admin.script')
</body>

</html>
