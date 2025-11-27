<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fund a Project - Hostel Support</title>
    @include('Layouts.templates.head')

    <!-- Bootstrap icons (optional but adds beauty) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* Page background */
        body {
            background: #f8fafc;
        }

        /* Card enhancements */
        .donation-card {
            border-radius: 20px;
            background: #ffffff;
            padding: 40px;
            border: none;
            transition: 0.3s ease-in-out;
        }

        .donation-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.12);
        }

        /* Title */
        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1a1a1a;
        }

        /* Label style */
        .form-label {
            font-weight: 600;
        }

        /* Input styling */
        .form-control,
        select {
            border-radius: 10px;
            padding: 10px 14px;
        }

        /* Submit button */
        .submit-btn {
            padding: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 12px;
        }

        .submit-btn:hover {
            box-shadow: 0 10px 20px rgba(0, 123, 255, 0.25);
            transform: translateY(-2px);
        }

        /* Icon Additions */
        .input-group-text {
            border-radius: 10px 0 0 10px;
            background: #f1f3f5;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="super_container">

        @include('Layouts.templates.navbar')
        @include('Layouts.templates.home')
        <br><br>
        <!-- Hostel Project Section -->
        <div class="page_section py-5">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-7">

                        <div class="donation-card shadow-lg">

                            <h3 class="page-title text-center mb-4">
                                <i class="bi bi-building-check me-2"></i>
                                Fund a Project – Hostel Support
                            </h3>

                            <p class="text-muted text-center mb-4">
                                Support the construction of a modern hostel for female students at NUST.
                            </p>

                            <form action="{{ route('hostel.project.payments.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <!-- Donor Name & Email -->
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label class="form-label">Donor Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                            <input type="text" name="donor_name" class="form-control"
                                                placeholder="Enter your full name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                            <input type="email" name="donor_email" class="form-control"
                                                placeholder="Enter your email" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Country Code & Phone -->
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label class="form-label">Phone</label>
                                        <div class="input-group">
                                            <select name="country_code" class="form-select" style="max-width: 110px;"
                                                required>
                                                <option value="+1">+1</option>
                                                <option value="+44">+44</option>
                                                <option value="+91">+91</option>
                                                <option value="+92" selected>+92</option>
                                                <option value="+971">+971</option>
                                                <option value="+61">+61</option>
                                                <option value="+81">+81</option>
                                                <option value="+86">+86</option>
                                                <option value="+49">+49</option>
                                                <option value="+33">+33</option>
                                                <option value="+39">+39</option>
                                                <option value="+7">+7</option>
                                                <option value="+234">+234</option>
                                                <option value="+27">+27</option>
                                                <option value="+880">+880</option>
                                                <option value="+94">+94</option>
                                                <option value="+60">+60</option>
                                                <option value="+62">+62</option>
                                                <option value="+966">+966</option>
                                            </select>

                                            <input type="text" name="phone" class="form-control"
                                                placeholder="Phone number" required>
                                        </div>
                                    </div>

                                    <!-- Total Cost -->
                                    <div class="col-md-6">
                                        <label class="form-label">Total Cost</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-cash-coin"></i></span>
                                            <input type="number" name="total_cost" value="315000000"
                                                class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>

                                <!-- Proof Upload -->
                                <div class="mb-4">
                                    <label class="form-label">Upload Proof (Optional)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-upload"></i></span>
                                        <input type="file" name="prove" class="form-control">
                                    </div>
                                    <small class="text-muted">Accepted formats: JPG, PNG, PDF</small>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary w-100 submit-btn">
                                    <i class="bi bi-check-circle me-2"></i>Submit Your Support
                                </button>

                            </form>

                        </div>

                    </div>
                </div>

            </div>
        </div>

        @include('Layouts.templates.footer')

    </div>

</body>

</html>
