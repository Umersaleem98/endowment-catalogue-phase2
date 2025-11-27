<!DOCTYPE html>
<html lang="en">

<head>
    <title>Payment</title>
    @include('Layouts.templates.head')

    <style>
        /* Custom CSS for responsiveness */
        @media (max-width: 767px) {
            .ml-sm-5 {
                margin-left: 0 !important;
            }
        }

        h2,
        p {
            color: black;
        }

        input.form-control,
        select.form-control {
            color: black;
        }

        input.form-control::placeholder {
            color: black;
            opacity: 1;
        }

        select.form-control option {
            color: black;
        }
    </style>
</head>

<body>
    <div class="super_container">

        <!-- Header -->
        @include('Layouts.templates.navbar')
        @include('Layouts.templates.home')

        <div class="events page_section">
            <div class="container">

                <div class="row mb-5">
                    <div class="col">
                        <div class="section_title text-center">
                            <h1 class="text-dark">Pay Now</h1>
                        </div>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="container">
                    <div class="row">

                        <!-- LEFT FORM -->
                        <div class="col-md-8">
                            <form method="POST" action="{{ route('stories.payments.store', $students->id) }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row g-3">

                                    <!-- Student Name -->
                                    <div class="col-md-6">
                                        <label for="student_name" class="form-label">Student Name</label>
                                        <input type="text" class="form-control" id="student_name" name="student_name"
                                            value="{{ $students->student_name }}" readonly>
                                    </div>

                                    <!-- Donor Name -->
                                    <div class="col-md-6">
                                        <label for="donor_name" class="form-label">Your Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Your Name"
                                            id="donor_name" name="donor_name" required>
                                    </div>

                                    <!-- Donor Email -->
                                    <div class="col-md-6">
                                        <label for="donor_email" class="form-label">Your Email</label>
                                        <input type="email" class="form-control" placeholder="Enter Your Valid Email"
                                            id="donor_email" name="donor_email" required>
                                    </div>

                                    <!-- Phone Number -->
                                    <div class="col-md-6">
                                        <label for="phone_number" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" placeholder="Enter Your Phone Number"
                                            id="phone_number" name="phone" required>
                                    </div>

                                    <!-- Duration -->
                                    <div class="col-md-6">
                                        <label for="duration" class="form-label">Duration</label>
                                        <select class="form-control" id="duration" name="duration" required>
                                            <option value="175000">6 Months</option>
                                            <option value="350000">1 Year</option>
                                            <option value="700000">2 Years</option>
                                            <option value="1400000">4 Years</option>
                                        </select>
                                    </div>

                                    <!-- Duration Sum -->
                                    <div class="col-md-6">
                                        <label for="duration_sum" class="form-label">Total Duration (Years)</label>
                                        <input type="text" class="form-control" id="duration_sum" name="duration_sum"
                                            readonly>
                                    </div>

                                    <!-- Messing -->
                                    <div class="col-md-6">
                                        <label for="messing" class="form-label">Messing (PKR)</label>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" value="90000"
                                                id="messing" name="messing">
                                            <label class="form-check-label" for="messing">Add Messing</label>
                                        </div>
                                    </div>

                                    <!-- Amount -->
                                    <div class="col-md-6">
                                        <label for="amount" class="form-label">Amount (PKR)</label>
                                        <input type="text" class="form-control" id="amount" name="amount"
                                            readonly>
                                    </div>

                                    <!-- Prove -->
                                    <div class="col-md-12">
                                        <label for="prove" class="form-label">Payment Proof</label>
                                        <input type="file" class="form-control" name="prove"
                                            accept=".png,.jpg,.jpeg,.pdf">
                                        <span class="text-success small">
                                            If you have already made the payment, kindly attach proof/screenshot.
                                        </span>
                                    </div>
                                </div>

                                <input type="hidden" name="payment_approved" value="0">

                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>

                        <!-- RIGHT IMAGE -->
                        <div class="col-md-4 d-flex justify-content-center">
                            <img src="{{ asset('templates/images/charity2.gif') }}" alt="Image 1"
                                class="img-fluid rounded" style="max-width: 100%; height: 400px;">
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        @include('Layouts.templates.footer')

        <!-- SCRIPT -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const messingCheckbox = document.getElementById('messing');
                const durationSelect = document.getElementById('duration');
                const amountInput = document.getElementById('amount');
                const durationSumInput = document.getElementById('duration_sum');

                function calculateAmount() {
                    let totalAmount = parseFloat(durationSelect.value) || 0;

                    if (messingCheckbox.checked) {
                        totalAmount += parseFloat(messingCheckbox.value);
                    }

                    amountInput.value = totalAmount;

                    const durationYears = {
                        '175000': 0.5,
                        '350000': 1,
                        '700000': 2,
                        '1400000': 4
                    };

                    durationSumInput.value = durationYears[durationSelect.value] || 0;
                }

                messingCheckbox.addEventListener('change', calculateAmount);
                durationSelect.addEventListener('change', calculateAmount);

                calculateAmount();
            });
        </script>

    </div>
</body>

</html>
