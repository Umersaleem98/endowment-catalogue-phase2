<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment</title>
    @include('template.layouts.head')
    <style>
        /* Custom CSS for responsiveness */
        @media (max-width: 767px) {
            .ml-sm-5 {
                margin-left: 0 !important;
            }
        }
        h2, p {
            color: black;
        }

        input.form-control {
            color: black;
        }

        input.form-control::placeholder {
            color: black;
            opacity: 1;
        }

        select.form-control {
            color: black;
        }

        select.form-control option {
            color: black;
        }
    </style>
</head>
<body>
<div class="super_container">

    <!-- Header -->
    @include('template.layouts.navbar')
    @include('template.layouts.home')

    <div class="events page_section">
        <div class="container">
            <div class="row mb-5">
                <div class="col">
                    <div class="section_title text-center">
                        <h1 class="text-dark">Pay Now</h1>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <form method="POST" action="{{ route('stories.payments.store', $students->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="student_name" class="form-label">Student Name</label>
                                    <input type="text" class="form-control" id="student_name" name="student_name" value="{{ $students->student_name }}" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label for="donor_name" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Your Name" id="donor_name" name="donor_name">
                                </div>

                                <div class="col-md-6">
                                    <label for="donor_email" class="form-label">Your Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Your Valid Email" id="donor_email" name="donor_email">
                                </div>

                                <div class="col-md-6">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Your Phone Number" id="phone_number" name="phone_number">
                                </div>

                                <div class="col-md-6">
                                    <label for="duration" class="form-label">Duration</label>
                                    <select class="form-control" id="duration" name="duration">
                                        <option value="175000">6 Months</option>
                                        <option value="350000">1 Year</option>
                                        <option value="700000">2 Years</option>
                                        <option value="1400000">4 Years</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="duration_sum" class="form-label">Total Duration (Years)</label>
                                    <input type="text" class="form-control" id="duration_sum" name="duration_sum" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label for="messing" class="form-label">Messing (PKR)</label>
                                    <input type="checkbox" class="form-control" value="90000" id="messing" name="messing">
                                </div>

                                <div class="col-md-6">
                                    <label for="amount" class="form-label">Amount (PKR)</label>
                                    <input type="text" class="form-control" id="amount" name="amount" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label for="prove" class="form-label">Prove</label>
                                    <input type="file" class="form-control" name="prove">
                                    <span class="text-success">"If you have already made the payment, kindly attach payment proof/screenshot of the payment"</span>
                                </div>
                            </div>

                            <input type="hidden" name="payment_approved" value="0">
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>

                    <div class="col-md-4 d-flex justify-content-center">
                        <img src="{{ asset('templates/images/charity2.gif') }}" alt="Image 1" class="img-fluid rounded" style="max-width: 100%; height:400px">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('template.layouts.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
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

                // Calculate duration in years
                const durationYears = {
                    '175000': 0.5, // 6 months
                    '350000': 1,   // 1 year
                    '700000': 2,   // 2 years
                    '1400000': 4   // 4 years
                };
                durationSumInput.value = durationYears[durationSelect.value] || 0;
            }

            messingCheckbox.addEventListener('change', calculateAmount);
            durationSelect.addEventListener('change', calculateAmount);

            // Initial calculation
            calculateAmount();
        });
    </script>
</div>
</body>
</html>
