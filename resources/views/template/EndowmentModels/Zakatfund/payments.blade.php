<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment</title>
    @include('template.layouts.head')
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

            <!-- Success & Error Messages -->
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

            <!-- Payment Form Section -->
            <div class="container">
                <div class="row align-items-center">
                    <!-- Form Column -->
                    <div class="col-md-6">
                        <form method="POST" action="{{ route('endowment.zakat.payment') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="payment_type" class="form-control" value="paynow" hidden>

                            <div class="row mb-3">
                                <div class="col-10">
                                    <label for="donor_name" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Your Name" id="donor_name" name="donor_name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-10">
                                    <label for="donor_email" class="form-label">Your Email</label>
                                    <input type="email" class="form-control" placeholder="Enter Your Valid Email" id="donor_email" name="donor_email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-10">
                                    <label for="phone_number" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Your Phone Number" id="phone_number" name="phone">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="duration" class="form-label">Duration</label>
                                    <select class="form-control" id="duration" name="duration">
                                        <option value="ene_year">For One Year</option>
                                        <option value="entire_degree">Entire Degree</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="text" class="form-control" placeholder="Enter Amount" id="amount" name="amount">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="prove" class="form-label">Payment Proof</label>
                                    <input type="file" class="form-control" id="prove" name="prove">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>

                    <!-- Image Column -->
                    <div class="col-md-6 d-flex justify-content-center">
                        <img src="{{ asset('templates/images/charity2.gif') }}" 
                             alt="Image 1" 
                             class="img-fluid rounded" 
                             style="max-width: 100%; height:400px;">
                    </div>
                </div>

                <!-- Bank Details (Moved Below Form) -->
                <div class="row mt-5">
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-header" style="background-color: #095590">
                                <h2 class="text-light text-center">Bank Details</h2>
                            </div>
                            <div class="card-body">
                                <div class="row mt-4 text-center">
                                    <div class="col-md-4 p-3" style="background-color: #095590">
                                        <h3 class="text-light">Non-Zakat Donation</h3>
                                        <p class="text-light mb-1">Account Number: 2292-79173812-01</p>
                                        <p class="text-light">IBAN: PK80HABB0022927917381201</p>
                                    </div>
                                    <div class="col-md-4 p-3" style="background-color: #095590">
                                        <h3 class="text-light">Zakat Donation</h3>
                                        <p class="text-light mb-1">Account Number: 2292-79173861-03</p>
                                        <p class="text-light">IBAN: PK34HABB0022927917386103</p>
                                    </div>
                                    <div class="col-md-4 p-3" style="background-color: #095590">
                                        <h3 class="text-light">Endowment Fund Donations</h3>
                                        <p class="text-light mb-1">Account Number: 2292-79173811-01</p>
                                        <p class="text-light">IBAN: PK64HABB0022927917381101</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="alert alert-info text-center" role="alert">
                                    Further correspondence will be carried out on your provided valid email address.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- /.container -->
        </div>
    </div>

    <!-- Footer -->
    @include('template.layouts.footer')

</div>

</body>
</html>

<!-- Amount Autofill Script -->
<script>
    $(document).ready(function() {
        $('#duration').change(function() {
            var duration = $(this).val();
            var amount = 0;

            if (duration === 'ene_year') {
                amount = 200000;
            } else if (duration === 'entire_degree') {
                amount = 400000;
            }

            $('#amount').val(amount);
        });
    });
</script>
