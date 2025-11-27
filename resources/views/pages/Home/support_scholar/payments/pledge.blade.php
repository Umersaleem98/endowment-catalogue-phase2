<!DOCTYPE html>
<html lang="en">

<head>
    <title>Make a Pledge</title>
    @include('Layouts.templates.head')

    <style>
        body {
            color: black !important;
        }

        label {
            font-weight: 600;
            color: #333;
        }

        input.form-control,
        select.form-control {
            color: black !important;
            background-color: #fff !important;
            border: 1px solid #ced4da;
        }

        input.form-control::placeholder {
            color: #555 !important;
        }

        .pledge-card {
            border-radius: 10px;
            padding: 25px;
            background: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.08);
        }

        @media (max-width: 768px) {
            .pledge-card {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

    <div class="super_container">

        @include('Layouts.templates.navbar')
        @include('Layouts.templates.home')

        <div class="events page_section">
            <div class="container">

                <!-- PAGE TITLE -->
                <div class="row mb-5">
                    <div class="col text-center">
                        <h1 class="fw-bold">Make a Pledge</h1>
                    </div>
                </div>

                <!-- SUCCESS / ERROR MESSAGES -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- INFO BANNER -->
                <div class="alert alert-info text-center fw-semibold">
                    Further correspondence will be sent to your provided valid email address.
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-7">

                        <div class="pledge-card">

                            <form method="POST" action="{{ route('pledge.payment.store', $students->id) }}">
                                @csrf

                                <!-- Student Name (Readonly) -->
                                <div class="mb-3">
                                    <label class="form-label">Student Name</label>
                                    <input type="text" class="form-control" name="student_name"
                                        value="{{ $students->student_name }}" readonly>
                                </div>

                                <!-- DONOR NAME -->
                                <div class="mb-3">
                                    <label class="form-label">Your Name</label>
                                    <input type="text" class="form-control" name="donor_name"
                                        placeholder="Enter your name" value="{{ old('donor_name') }}">
                                </div>

                                <!-- DONOR EMAIL -->
                                <div class="mb-3">
                                    <label class="form-label">Your Valid Email</label>
                                    <input type="email" class="form-control" name="donor_email"
                                        placeholder="Enter your valid email" value="{{ old('donor_email') }}">
                                </div>

                                <!-- PHONE -->
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" name="phone"
                                        placeholder="Enter your phone number" value="{{ old('phone') }}">
                                </div>

                                <!-- DONATION PERCENT / AMOUNT -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Donation Percentage</label>
                                        <select name="donation_percent" id="donation_percent" class="form-control"
                                            onchange="setDonationAmount()">
                                            <option value="50"
                                                {{ old('donation_percent') == '50' ? 'selected' : '' }}>
                                                50%
                                            </option>
                                            <option value="100"
                                                {{ old('donation_percent') == '100' ? 'selected' : '' }}>
                                                100%
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Donation Amount (PKR)</label>
                                        <input type="number" class="form-control" name="amount" readonly
                                            id="donation_amount" value="{{ old('amount') }}">
                                    </div>
                                </div>

                                <!-- FOR (Tution/Accommodation/Messing) -->
                                <div class="mb-3">
                                    <label class="form-label">Donation For</label>
                                    <select name="donation_for" id="donation_for" class="form-control"
                                        onchange="setAdditionalAmount()">
                                        <option value="tution_fee"
                                            {{ old('donation_for') == 'tution_fee' ? 'selected' : '' }}>
                                            Tuition Fee
                                        </option>

                                        <option value="accommodation"
                                            {{ old('donation_for') == 'accommodation' ? 'selected' : '' }}>
                                            Accommodation
                                        </option>

                                        <option value="messing"
                                            {{ old('donation_for') == 'messing' ? 'selected' : '' }}>
                                            Messing
                                        </option>
                                    </select>
                                </div>

                                <!-- SUBMIT BUTTON -->
                                <div class="text-center mt-4">
                                    <button class="btn btn-primary px-5 py-2 fw-semibold">
                                        Submit Pledge
                                    </button>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>

            </div>
        </div>

        @include('Layouts.templates.footer')
    </div>

</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setDonationAmount();
        setAdditionalAmount();
    });

    function setDonationAmount() {
        let percentage = document.getElementById('donation_percent').value;
        let maxAmount = 300000;
        document.getElementById('donation_amount').value = (percentage == 100) ? maxAmount : maxAmount / 2;
    }

    function setAdditionalAmount() {
        let donationFor = document.getElementById('donation_for').value;
        let amountInput = document.getElementById('donation_amount');
        let amount = parseInt(amountInput.value);

        if (donationFor === 'accommodation') {
            amountInput.value = amount + 259000;
        }
    }
</script>

</html>
