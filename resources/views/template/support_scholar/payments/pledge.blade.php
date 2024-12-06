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

        /* Style for input text color */
        input.form-control {
            color: black;
        }

        /* Style for placeholder text color */
        input.form-control::placeholder {
            color: black;
            opacity: 1; /* Override default opacity */
        }

        select.form-control {
            color: black;
        }

        /* Style for select option text color */
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
                        <h1 class="">Make a Pledge</h1>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="container">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="alert alert-info mt-3 text-center" role="alert">
                                Further correspondence will be carried out on your provided valid email address.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form method="POST" action="{{ url('payments') }}">
                            @csrf
                            <input type="text" name="student_name" class="form-control" value="{{ $students->student_name }}">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="donor_name" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="donor_name" name="donor_name" placeholder="Enter Your Name" value="{{ old('donor_name') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="donor_email" class="form-label">Your Valid Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Your Valid Email" id="donor_email" name="donor_email" value="{{ old('donor_email') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Your Phone Number" id="phone" name="phone" value="{{ old('phone') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="donation_percent" class="form-label">Donation Percentage</label>
                                    <select name="donation_percent" id="donation_percent" class="form-control" onchange="setDonationAmount()">
                                        <option value="50" {{ old('donation_percent') == '50' ? 'selected' : '' }}>50%</option>
                                        <option value="100" {{ old('donation_percent') == '100' ? 'selected' : '' }}>100%</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="donation_amount" class="form-label">Donation Amount (PKR)</label>
                                    <input type="number" class="form-control" placeholder="Donation Amount" id="donation_amount" name="amount" readonly value="{{ old('donation_amount') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="donation_for" class="form-label">For</label>
                                    <select name="donation_for" id="donation_for" class="form-control" onchange="setAdditionalAmount()">
                                        <option value="tution_fee" {{ old('donation_for') == 'tution_fee' ? 'selected' : '' }}>Tuition Fee</option>
                                        <option value="accommodation" {{ old('donation_for') == 'accommodation' ? 'selected' : '' }}>Accommodation</option>
                                        <option value="messing" {{ old('donation_for') == 'messing' ? 'selected' : '' }}>Messing</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('template.layouts.footer')
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        setDonationAmount();
        setAdditionalAmount();
    });

    function setDonationAmount() {
        var percentage = document.getElementById('donation_percent').value;
        var amountInput = document.getElementById('donation_amount');
        var maxAmount = 300000; // Maximum amount

        if (percentage == 100) {
            amountInput.value = maxAmount;
        } else {
            amountInput.value = maxAmount / 2;
        }
    }

    function setAdditionalAmount() {
        var donationFor = document.getElementById('donation_for').value;
        var amountInput = document.getElementById('donation_amount');
        var currentAmount = parseInt(amountInput.value);

        if (donationFor == 'accommodation') {
            amountInput.value = currentAmount + 259000;
        }
    }
</script>
</html>
