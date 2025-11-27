<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pay Now</title>
    @include('Layouts.templates.head')
</head>

<body>
    @include('Layouts.templates.navbar')
    @include('Layouts.templates.home')
    <br><br><br>
    <div class="container my-5">

        <div class="text-center mb-4">
            <h1 class="fw-bold text-dark">Pay Now</h1>
        </div>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row align-items-center">
            {{-- FORM --}}
            <div class="col-md-6">
                <form method="POST" action="{{ route('endowment.zakat.payment') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="payment_type" value="paynow">

                    <div class="mb-3">
                        <label class="form-label">Your Name</label>
                        <input type="text" name="donor_name" class="form-control" placeholder="Enter Your Name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Your Email</label>
                        <input type="email" name="donor_email" class="form-control"
                            placeholder="Enter Your Valid Email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone Number">
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Duration</label>
                            <select name="duration" class="form-control" id="duration">
                                <option value="one_year">For One Year</option>
                                <option value="entire_degree">Entire Degree</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Amount</label>
                            <input type="text" name="amount" class="form-control" id="amount"
                                placeholder="Enter Amount">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Payment Proof</label>
                        <input type="file" name="prove" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </form>
            </div>

            {{-- IMAGE --}}
            <div class="col-md-6 text-center">
                <img src="{{ asset('templates/images/charity2.gif') }}" class="img-fluid rounded shadow"
                    style="max-height: 350px;">
            </div>
        </div>

        {{-- BANK DETAILS --}}
        <div class="card my-5">
            <div class="card-header text-dark text-center">
                <h1>Bank Details</h1>
            </div>

            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-4 p-3 text-dark">
                        <h3>Non-Zakat Donation</h3>
                        <p class="text-dark">Account: 2292-79173812-01</p>
                        <p class="text-dark">IBAN: PK80HABB0022927917381201</p>
                    </div>

                    <div class="col-md-4 p-3 text-dark">
                        <h3>Zakat Donation</h3>
                        <p class="text-dark">Account: 2292-79173861-03</p>
                        <p class="text-dark">IBAN: PK34HABB0022927917386103</p>
                    </div>

                    <div class="col-md-4 p-3 text-dark">
                        <h3>Endowment Fund</h3>
                        <p class="text-dark">Account: 2292-79173811-01</p>
                        <p class="text-dark">IBAN: PK64HABB0022927917381101</p>
                    </div>
                </div>
            </div>

            <div class="card-footer text-center alert alert-info mb-0">
                Further correspondence will be done on your provided valid email address.
            </div>
        </div>

    </div>

    {{-- AUTOFILL SCRIPT --}}
    <script>
        document.getElementById('duration').addEventListener('change', function() {
            let amount = (this.value === 'one_year') ? 200000 : 400000;
            document.getElementById('amount').value = amount;
        });
    </script>

</body>

</html>
