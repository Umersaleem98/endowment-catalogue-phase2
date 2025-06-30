<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpetual Seat</title>
    @include('template.layouts.head')
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/styles/perpetual_seatcss.css') }}">
</head>

<body>

    <div class="super_container">
        <!-- Header -->
        @include('template.layouts.navbar')
        @include('template.layouts.home')

        <div class="events page_section">
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col">
                        <div class="section_title text-center">
                            <h1 class="text-dark">Endowment: Create a Legacy</h1>
                        </div>
                    </div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Center Tabs Navigation -->
                <div class="d-flex justify-content-center">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item mb-2" role="presentation">
                            <button class="nav-link custom-tab active" id="single-endowment-ug-tab" data-bs-toggle="tab"
                                data-bs-target="#single-endowment-ug" type="button" role="tab"
                                aria-controls="single-endowment-ug" aria-selected="true"
                                style="background-color: #004476; color:white">Single Endowment (UG)</button>
                        </li>
                        <li class="nav-item mb-2" role="presentation">
                            <button class="nav-link custom-tab" id="circular-endowment-ug-tab" data-bs-toggle="tab"
                                data-bs-target="#circular-endowment-ug" type="button" role="tab"
                                aria-controls="circular-endowment-ug" aria-selected="false"
                                style="background-color: #004476; color:white">Circular Endowment (UG)</button>
                        </li>
                        <li class="nav-item mb-2" role="presentation">
                            <button class="nav-link custom-tab" id="single-endowment-pg-tab" data-bs-toggle="tab"
                                data-bs-target="#single-endowment-pg" type="button" role="tab"
                                aria-controls="single-endowment-pg" aria-selected="false"
                                style="background-color: #004476; color:white">Single Endowment (PG)</button>
                        </li>
                        <li class="nav-item mb-2" role="presentation">
                            <button class="nav-link custom-tab" id="circular-endowment-pg-tab" data-bs-toggle="tab"
                                data-bs-target="#circular-endowment-pg" type="button" role="tab"
                                aria-controls="circular-endowment-pg" aria-selected="false"
                                style="background-color: #004476; color:white">Circular Endowment (PG)</button>
                        </li>

                    </ul>
                </div>

                <!-- Tabs Content -->
                <div class="tab-content" id="myTabContent">
                    <!-- Single Endowment UG Tab Content -->
                    <div class="tab-pane fade show active" id="single-endowment-ug" role="tabpanel"
                        aria-labelledby="single-endowment-ug-tab">
                        <h3 class="text-center text-dark mt-4">Singular Endowment: Establish one Seat in perpetuity (UG)
                        </h3>
                        <div class="row mt-5">
                            <div class="col-md-4 mb-2">
                                <h3 class="text-light text-center p-3" style="background-color: #004476;">Engineering
                                    Students</h3>
                                <form action="{{ url('default_one_year_degree') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group" hidden>
                                        <input type="text" name="program_type" value="One Year Undergraduate"
                                            class="form-control">
                                        <label for="degree">Degree:</label>
                                        <input type="text" name="degree" value="Engineering" class="form-control">
                                        {{-- <input type="text" name="seats" value="1" class="form-control"> --}}

                                    </div>
                                    <div class="row p-2 mt-4">
                                        <div class="form-group ml-3">
                                            <input type="checkbox" value="275000" name="hostelandmessing" class=""
                                                value="4000000">
                                            <label for="single-endowment-ug-eng-AdditionalExpenses">Include mess and
                                                hostel expenses (4,000,000
                                                PKR)</label>
                                        </div>
                                        <div class="form-group ml-3">
                                            <label for="single-endowment-ug-eng-TotalAmount">Total Amount:</label>
                                            <input type="text" class="total_amount form-control" name="totalAmount"
                                                value="5000000 " readonly>
                                        </div>
                                    </div>



                                    {{-- Donor info --}}
                                    <div id="donorInfo">
                                        <h4 class="text-dark mt-4">Donor Information:</h4>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_name">Name:</label>
                                                    <input type="text" id="donor_name" name="donor_name"
                                                        placeholder="Enter Your Full Name" class="form-control "
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_email">Email:</label>
                                                    <input type="email" id="donor_email" name="donor_email"
                                                        placeholder="Enter your Valid Email" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone:</label>
                                                    <input type="number" id="phone" name="phone"
                                                        placeholder="Enter Your Phone# (+92)" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="container-fluid">
                                                    <div class="row ml-3">
                                                        <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial
                                                            Partner</span>
                                                        <div class="col-md-10 mb-3">
                                                            <select class="form-control" name="about_partner"
                                                                id="alumni_select">
                                                                <option value="" disabled selected>Select an
                                                                    option
                                                                </option>
                                                                <option value="Alumni"
                                                                    id="single-endowment-ug-eng-Alumni">Alumni</option>
                                                                <option value="Industrial-Partner"
                                                                    id="single-endowment-ug-eng-Industrial-Partner">
                                                                    Industrial Partner</option>
                                                                <option value="Philanthropist"
                                                                    id="single-endowment-ug-eng-Philanthropist">
                                                                    Philanthropist</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row ml-4 d-none"
                                                        id="single-endowment-ug-eng-div-philanthropist">
                                                        <div class="col-md-10">
                                                            <label for="">How do you know us?</label>
                                                            <textarea name="philanthropist_text" id="" cols="40" rows="5"></textarea>
                                                        </div>
                                                    </div>




                                                    <div class="row d-none ml-3" id="single-endowment-ug-eng-alumni">
                                                        <div class="col-md-10">
                                                            <label for="school_select">Select School</label>
                                                            <select name="school" id="school_select"
                                                                class="form-control">
                                                                <option value="" selected>Select School</option>
                                                                @foreach ($schools as $item)
                                                                    <option value="{{ $item->schoolname }}">
                                                                        {{ $item->schoolname }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="country_select">Select Country</label>
                                                            <select name="country" id="country_select"
                                                                class="form-control">
                                                                @foreach ($countries as $item)
                                                                    <option value="{{ $item->countryname }}">
                                                                        {{ $item->countryname }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="year" class="form-label">Select Year of
                                                                Graduation</label>
                                                            <select id="year" name="year"
                                                                class="form-control">
                                                                <option value="" selected>Select Year of
                                                                    Graduation
                                                                </option>
                                                                @for ($i = date('Y'); $i >= 1990; $i--)
                                                                    <option value="{{ $i }}">
                                                                        {{ $i }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-check mb-3 mt-2 ml-3">
                                                <input
                                                    class="form-check-input ml-3  single-endowment-ug-eng-paynow-radio"
                                                    name="payments_status" type="radio"
                                                    id="single-endowment-ug-eng-showBankDetails" value="Paynow">
                                                <label class="form-check-label ml-4"
                                                    for="showBankDetailsNonEng">Paynow</label>

                                                <input class="form-check-input ml-3 pledge-radio"
                                                    name="payments_status" type="radio"
                                                    id="single-endowment-ug-eng-pledge" value="make_a_pledge">
                                                <label class="form-check-label ml-4"
                                                    for="single-endowment-ug-eng-pledge">Make a
                                                    Pledge</label>
                                            </div>

                                            <!-- Elements to show/hide -->
                                            <span id="single-endowment-ug-eng-paynow"
                                                class="text-dark d-none mb-2 ml-4">
                                                Attach Screenshots/ Receipt of Fund Transfer
                                            </span>

                                            <div id="single-endowment-ug-eng-paynowProof"
                                                class="form-group d-none ml-3">
                                                <label for="prove">Proof:</label>
                                                <input type="file" id="prove" name="prove"
                                                    class="form-control">
                                            </div>
                                        </div>



                                    </div>

                                    <input type="submit" name="submit" id=""
                                        class="btn btn-primary ml-3">
                                </form>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        // Elements
                                        const hostelCheckbox = document.querySelector('input[name="hostelandmessing"]');
                                        const totalAmountInput = document.querySelector('.total_amount');
                                        const alumniSelect = document.getElementById('alumni_select');
                                        const alumniFields = document.getElementById('single-endowment-ug-eng-alumni');
                                        const philanthropistFields = document.getElementById('single-endowment-ug-eng-div-philanthropist');

                                        const payNowRadio = document.getElementById('single-endowment-ug-eng-showBankDetails');
                                        const pledgeRadio = document.getElementById('single-endowment-ug-eng-pledge'); // ✅ Corrected ID
                                        const payNowText = document.getElementById('single-endowment-ug-eng-paynow');
                                        const payNowProof = document.getElementById('single-endowment-ug-eng-paynowProof');
                                        const bankDetails = document.getElementById('bankDetails');

                                        let baseAmount = 5000000;
                                        let hostelAmount = 4000000;

                                        // ✅ Update Total Amount
                                        hostelCheckbox.addEventListener("change", function() {
                                            totalAmountInput.value = this.checked ? baseAmount + hostelAmount : baseAmount;
                                        });

                                        // ✅ Alumni/Philanthropist/Industrial-Partner Toggle
                                        alumniSelect.addEventListener("change", function() {
                                            const selected = this.value;

                                            alumniFields.classList.add("d-none");
                                            philanthropistFields.classList.add("d-none");

                                            if (selected === "Alumni") {
                                                alumniFields.classList.remove("d-none");
                                            }

                                            if (selected === "Philanthropist" || selected === "Industrial-Partner") {
                                                philanthropistFields.classList.remove("d-none");
                                            }
                                        });

                                        // ✅ PayNow & Pledge Toggle
                                        function togglePayNowElements(show) {
                                            if (show) {
                                                payNowText.classList.remove("d-none");
                                                payNowProof.classList.remove("d-none");
                                                if (bankDetails) bankDetails.style.display = "block";
                                            } else {
                                                payNowText.classList.add("d-none");
                                                payNowProof.classList.add("d-none");
                                                if (bankDetails) bankDetails.style.display = "none";
                                            }
                                        }

                                        payNowRadio.addEventListener("change", function() {
                                            if (this.checked) togglePayNowElements(true);
                                        });

                                        pledgeRadio.addEventListener("change", function() {
                                            if (this.checked) togglePayNowElements(false); // ✅ Hides proof on pledge
                                        });
                                    });
                                </script>
                            </div>



                            <div class="col-md-4 mb-2">
                                <h3 class="text-light text-center p-3" style="background-color: #004476;">Non
                                    Engineering
                                    Students</h3>

                                <form id="single-endowment-ug-non-eng-form"
                                    action="{{ url('default_one_year_degree') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group" hidden>
                                        <input type="text" name="program_type" value="One Year Undergraduate"
                                            class="form-control">
                                        <label for="degree">Degree:</label>
                                        <input type="text" name="degree" value="Non Engineering"
                                            class="form-control">
                                    </div>

                                    <div class="row p-2 mt-4">
                                        <div class="form-group ml-3">
                                            <input type="checkbox" value="4000000" name="hostelandmessing"
                                                id="single-endowment-ug-non-eng-hostel">
                                            <label for="single-endowment-ug-non-eng-hostel">Include mess and hostel
                                                expenses (4,000,000
                                                PKR)</label>
                                        </div>
                                        <div class="form-group ml-3">
                                            <label for="single-endowment-ug-non-eng-totalAmount">Total Amount:</label>
                                            <input type="text"
                                                class="form-control single-endowment-ug-non-eng-totalAmount"
                                                name="totalAmount" value="5000000" readonly>
                                        </div>
                                    </div>

                                    {{-- Donor Info --}}
                                    <div id="donorInfo">
                                        <h4 class="text-dark mt-4">Donor Information:</h4>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label for="donor_name">Name:</label>
                                                <input type="text" id="donor_name" name="donor_name"
                                                    placeholder="Enter Your Full Name" class="form-control" required>
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <label for="donor_email">Email:</label>
                                                <input type="email" id="donor_email" name="donor_email"
                                                    placeholder="Enter your Valid Email" class="form-control"
                                                    required>
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <label for="phone">Phone:</label>
                                                <input type="number" id="phone" name="phone"
                                                    placeholder="Enter Your Phone# (+92)" class="form-control"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="container-fluid">
                                            <div class="row ml-3">
                                                <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial
                                                    Partner</span>
                                                <div class="col-md-10 mb-3">
                                                    <select class="form-control" name="about_partner"
                                                        id="single-endowment-ug-non-eng-alumni_select">
                                                        <option value="" disabled selected>Select an option
                                                        </option>
                                                        <option value="Alumni">Alumni</option>
                                                        <option value="Industrial-Partner">Industrial Partner</option>
                                                        <option value="Philanthropist">Philanthropist</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row ml-4 d-none"
                                                id="single-endowment-ug-non-eng-div-philanthropist">
                                                <div class="col-md-10">
                                                    <label for="">How do you know us?</label>
                                                    <textarea name="philanthropist_text" cols="40" rows="5"></textarea>
                                                </div>
                                            </div>

                                            <div class="row d-none ml-3" id="single-endowment-ug-non-eng-alumni">
                                                <div class="col-md-10">
                                                    <label for="school_select">Select School</label>
                                                    <select name="school" id="school_select" class="form-control">
                                                        <option value="" selected>Select School</option>
                                                        @foreach ($schools as $item)
                                                            <option value="{{ $item->schoolname }}">
                                                                {{ $item->schoolname }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-10">
                                                    <label for="country_select">Select Country</label>
                                                    <select name="country" id="country_select" class="form-control">
                                                        @foreach ($countries as $item)
                                                            <option value="{{ $item->countryname }}">
                                                                {{ $item->countryname }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-10">
                                                    <label for="year">Select Year of Graduation</label>
                                                    <select id="year" name="year" class="form-control">
                                                        <option value="" selected>Select Year of Graduation
                                                        </option>
                                                        @for ($i = date('Y'); $i >= 1990; $i--)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-check mb-3 mt-2 ml-3">
                                                <input class="form-check-input ml-3" name="payments_status"
                                                    type="radio" id="single-endowment-ug-non-eng-showBankDetails"
                                                    value="Paynow">
                                                <label class="form-check-label ml-4"
                                                    for="single-endowment-ug-non-eng-showBankDetails">Paynow</label>

                                                <input class="form-check-input ml-3" name="payments_status"
                                                    type="radio" id="single-endowment-ug-non-eng-pledge"
                                                    value="make_a_pledge">
                                                <label class="form-check-label ml-4"
                                                    for="single-endowment-ug-non-eng-pledge">Make a
                                                    Pledge</label>
                                            </div>

                                            <span id="single-endowment-ug-non-eng-paynow"
                                                class="text-dark d-none mb-2 ml-4">
                                                Attach Screenshots/ Receipt of Fund Transfer
                                            </span>

                                            <div id="single-endowment-ug-non-eng-paynowProof"
                                                class="form-group d-none ml-3">
                                                <label for="prove">Proof:</label>
                                                <input type="file" id="prove" name="prove"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" name="submit" class="btn btn-primary ml-3">
                                </form>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const form = document.querySelector('#single-endowment-ug-non-eng-form');
                                        const hostelCheckbox = form.querySelector('#single-endowment-ug-non-eng-hostel');
                                        const totalAmountInput = form.querySelector('.single-endowment-ug-non-eng-totalAmount');

                                        const alumniSelect = form.querySelector('#single-endowment-ug-non-eng-alumni_select');
                                        const alumniFields = form.querySelector('#single-endowment-ug-non-eng-alumni');
                                        const philanthropistFields = form.querySelector('#single-endowment-ug-non-eng-div-philanthropist');

                                        const payNowRadio = form.querySelector('#single-endowment-ug-non-eng-showBankDetails');
                                        const pledgeRadio = form.querySelector('#single-endowment-ug-non-eng-pledge');
                                        const payNowText = form.querySelector('#single-endowment-ug-non-eng-paynow');
                                        const payNowProof = form.querySelector('#single-endowment-ug-non-eng-paynowProof');

                                        const bankDetails = document.getElementById('bankDetails'); // Optional if present elsewhere

                                        const baseAmount = 5000000; // ✅ matches HTML input value
                                        const hostelAmount = 4000000;

                                        // Update Total Amount
                                        if (hostelCheckbox && totalAmountInput) {
                                            hostelCheckbox.addEventListener("change", function() {
                                                totalAmountInput.value = this.checked ? baseAmount + hostelAmount : baseAmount;
                                            });
                                        }

                                        // Alumni/Philanthropist toggle
                                        if (alumniSelect) {
                                            alumniSelect.addEventListener("change", function() {
                                                const value = this.value;

                                                alumniFields.classList.add("d-none");
                                                philanthropistFields.classList.add("d-none");

                                                if (value === "Alumni") {
                                                    alumniFields.classList.remove("d-none");
                                                } else if (value === "Philanthropist" || value === "Industrial-Partner") {
                                                    philanthropistFields.classList.remove("d-none");
                                                }
                                            });
                                        }

                                        // Paynow / Pledge toggle
                                        function togglePayNowElements(show) {
                                            payNowText.classList.toggle("d-none", !show);
                                            payNowProof.classList.toggle("d-none", !show);
                                            if (bankDetails) bankDetails.style.display = show ? "block" : "none";
                                        }

                                        if (payNowRadio) {
                                            payNowRadio.addEventListener("change", () => togglePayNowElements(true));
                                        }

                                        if (pledgeRadio) {
                                            pledgeRadio.addEventListener("change", () => togglePayNowElements(false));
                                        }
                                    });
                                </script>
                            </div>


                            <div class="col-md-4 mb-2">
                                <form id="single-endowment-ug-custom-form"
                                    action="{{ url('endowmentsupportoneyear') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <h3 class="text-light text-center p-3" style="background-color: #004476;">
                                        Customize
                                        Your Package</h3>

                                    <input type="text" name="program_type" value="UG One Year" hidden>

                                    {{-- Degree & Seat --}}
                                    <div class="form-group">
                                        <label for="single-endowment-ug-custom-degree">Select Degree:</label>
                                        <select id="single-endowment-ug-custom-degree" class="form-control">
                                            <option value="">Select Degree</option>
                                            @foreach ($undergraduate as $degree)
                                                <option value="{{ $degree->fee }}"
                                                    data-degree-name="{{ $degree->degree }}">{{ $degree->degree }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="single-endowment-ug-custom-no_of_seat">No of Seats:</label>
                                        <input type="number" id="single-endowment-ug-custom-no_of_seat"
                                            name="seats" value="1" class="form-control" min="1">
                                    </div>

                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input"
                                            id="single-endowment-ug-custom-hostel" value="275000">
                                        <label class="form-check-label" for="single-endowment-ug-custom-hostel">
                                            Include mess and hostel expenses (275,000 PKR)
                                        </label>
                                    </div>

                                    <div class="form-group d-none">
                                        <label for="single-endowment-ug-custom-selectedDegree">Selected Degree:</label>
                                        <input type="text" id="single-endowment-ug-custom-selectedDegree"
                                            name="degree" class="form-control" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="single-endowment-ug-custom-totalAmount">Total Amount:</label>
                                        <input type="text" id="single-endowment-ug-custom-totalAmount"
                                            name="totalAmount" class="form-control" readonly>
                                    </div>

                                    {{-- Donor Information --}}
                                    <h4 class="text-dark mt-4">Donor Information:</h4>
                                    <div class="form-group">
                                        <label for="donor_name">Name:</label>
                                        <input type="text" id="donor_name" name="donor_name"
                                            placeholder="Enter Your Full Name" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="donor_email">Email:</label>
                                        <input type="email" id="donor_email" name="donor_email"
                                            placeholder="Enter your Valid Email" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="number" id="phone" name="phone"
                                            placeholder="Enter Your Phone# (+92)" class="form-control" required>
                                    </div>

                                    {{-- Alumni/Philanthropist --}}
                                    <div class="form-group">
                                        <label for="single-endowment-ug-custom-alumniSelect">Are You Alumni or
                                            Industrial Partner</label>
                                        <select class="form-control" name="about_partner"
                                            id="single-endowment-ug-custom-alumniSelect">
                                            <option value="" disabled selected>Select an option</option>
                                            <option value="Alumni">Alumni</option>
                                            <option value="Industrial-Partner">Industrial Partner</option>
                                            <option value="Philanthropist">Philanthropist</option>
                                        </select>
                                    </div>

                                    <div class="form-group d-none" id="single-endowment-ug-custom-philanthropist-div">
                                        <label>How do you know us?</label>
                                        <textarea name="philanthropist_text" rows="4" class="form-control"></textarea>
                                    </div>

                                    <div class="row d-none" id="single-endowment-ug-custom-alumniFields">
                                        <div class="col-md-12">
                                            <label>Select School</label>
                                            <select name="school" class="form-control">
                                                <option value="">Select School</option>
                                                @foreach ($schools as $item)
                                                    <option value="{{ $item->schoolname }}">{{ $item->schoolname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <label>Select Country</label>
                                            <select name="country" class="form-control">
                                                @foreach ($countries as $item)
                                                    <option value="{{ $item->countryname }}">{{ $item->countryname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <label>Select Year of Graduation</label>
                                            <select name="year" class="form-control">
                                                <option value="">Select Year</option>
                                                @for ($i = 1990; $i <= date('Y'); $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Payment Options --}}
                                    <div class="form-check mt-3">
                                        <input class="form-check-input ml-2" name="payments_status" type="radio"
                                            id="single-endowment-ug-custom-paynow" value="Paynow">
                                        <label class="form-check-label ml-2"
                                            for="single-endowment-ug-custom-paynow">Paynow</label>

                                        <input class="form-check-input ml-2" name="payments_status" type="radio"
                                            id="single-endowment-ug-custom-pledge" value="make_a_pledge">
                                        <label class="form-check-label ml-2"
                                            for="single-endowment-ug-custom-pledge">Make a Pledge</label>
                                    </div>

                                    <div class="form-group d-none mt-2" id="single-endowment-ug-custom-proofDiv">
                                        <label for="prove">Attach Screenshot / Receipt:</label>
                                        <input type="file" id="prove" name="prove" class="form-control">
                                    </div>

                                    {{-- Link --}}
                                    <div class="mt-3 mb-2">
                                        <a href="{{ url('student_stories') }}" class="btn btn-info btn-sm"
                                            style="background-color: #FFA500;">
                                            Nurture a Dream<br>Read student stories and select a story of your choice.
                                        </a>
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </form>

                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const degreeSelect = document.getElementById("single-endowment-ug-custom-degree");
                                        const seatInput = document.getElementById("single-endowment-ug-custom-no_of_seat");
                                        const hostelCheckbox = document.getElementById("single-endowment-ug-custom-hostel");
                                        const selectedDegreeInput = document.getElementById("single-endowment-ug-custom-selectedDegree");
                                        const totalAmountInput = document.getElementById("single-endowment-ug-custom-totalAmount");

                                        const alumniSelect = document.getElementById("single-endowment-ug-custom-alumniSelect");
                                        const philanthropistDiv = document.getElementById("single-endowment-ug-custom-philanthropist-div");
                                        const alumniFields = document.getElementById("single-endowment-ug-custom-alumniFields");

                                        const paynowRadio = document.getElementById("single-endowment-ug-custom-paynow");
                                        const pledgeRadio = document.getElementById("single-endowment-ug-custom-pledge");
                                        const proofDiv = document.getElementById("single-endowment-ug-custom-proofDiv");

                                        let degreeFee = 0;

                                        function calculateTotal() {
                                            const seatCount = parseInt(seatInput.value) || 1;
                                            const hostelFee = hostelCheckbox.checked ? 275000 * seatCount : 0;
                                            const total = (degreeFee * 4 * seatCount) + hostelFee;
                                            totalAmountInput.value = total;
                                        }

                                        degreeSelect.addEventListener("change", function() {
                                            const selectedOption = this.options[this.selectedIndex];
                                            degreeFee = parseInt(this.value) || 0;
                                            selectedDegreeInput.value = selectedOption.dataset.degreeName || '';
                                            calculateTotal();
                                        });

                                        seatInput.addEventListener("input", calculateTotal);
                                        hostelCheckbox.addEventListener("change", calculateTotal);

                                        alumniSelect.addEventListener("change", function() {
                                            const value = this.value;
                                            philanthropistDiv.classList.toggle("d-none", value !== "Philanthropist" && value !==
                                                "Industrial-Partner");
                                            alumniFields.classList.toggle("d-none", value !== "Alumni");
                                        });

                                        paynowRadio.addEventListener("change", function() {
                                            proofDiv.classList.remove("d-none");
                                        });

                                        pledgeRadio.addEventListener("change", function() {
                                            proofDiv.classList.add("d-none");
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>





                    <!-- Circular Endowment UG Tab Content -->
                    <div class="tab-pane fade" id="circular-endowment-ug" role="tabpanel"
                        aria-labelledby="circular-endowment-ug-tab">
                        <h3 class="text-center text-dark mt-4">Circular Endowment: 4 seats in perpetuity - student
                            after student (UG)</h3>
                        <div class="row mt-5">
                            <div class="col-md-4 mb-2">
                                <h3 class="text-light text-center p-3" style="background-color: #004476;">Engineering
                                    Students</h3>
                                <form id="circular-endowment-eng-form" action="{{ url('default_one_year_degree') }}"
                                    method="post" enctype="multipart/form-data">

                                    @csrf
                                    <div class="form-group" hidden>
                                        <input type="text" name="program_type" value="One Year Undergraduate"
                                            class="form-control">
                                        <label for="degree">Degree:</label>
                                        <input type="text" name="degree" value="Engineering"
                                            class="form-control">
                                        {{-- <input type="text" name="seats" value="1" class="form-control"> --}}

                                    </div>
                                    <div class="row p-2 mt-4">
                                        <div class="form-group ml-3">
                                            <input type="checkbox" value="275000" name="hostelandmessing"
                                                class="" value="4000000">
                                            <label for="circular-endowment-eng-AdditionalExpenses">Include mess and
                                                hostel expenses
                                                (4,000,000
                                                PKR)</label>
                                        </div>
                                        <div class="form-group ml-3">
                                            <label for="circular-endowment-eng-TotalAmount">Total Amount:</label>
                                            <input type="text" class="total_amount form-control"
                                                name="totalAmount" value="20000000" readonly>
                                        </div>
                                    </div>



                                    {{-- Donor info --}}
                                    <div id="donorInfo">
                                        <h4 class="text-dark mt-4">Donor Information:</h4>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_name">Name:</label>
                                                    <input type="text" id="donor_name" name="donor_name"
                                                        placeholder="Enter Your Full Name" class="form-control "
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_email">Email:</label>
                                                    <input type="email" id="donor_email" name="donor_email"
                                                        placeholder="Enter your Valid Email" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone:</label>
                                                    <input type="number" id="phone" name="phone"
                                                        placeholder="Enter Your Phone# (+92)" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="container-fluid">
                                                    <div class="row ml-3">
                                                        <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial
                                                            Partner</span>
                                                        <div class="col-md-10 mb-3">
                                                            <select class="form-control" name="about_partner"
                                                                id="circular-endowment-eng-alumni_select">
                                                                <option value="" disabled selected>Select an
                                                                    option
                                                                </option>
                                                                <option value="Alumni"
                                                                    id="circular-endowment-eng-Alumni">Alumni
                                                                </option>
                                                                <option value="Industrial-Partner"
                                                                    id="circular-endowment-eng-Industrial-Partner">
                                                                    Industrial Partner</option>
                                                                <option value="Philanthropist"
                                                                    id="circular-endowment-eng-Philanthropist">
                                                                    Philanthropist</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row ml-4 d-none"
                                                        id="circular-endowment-eng-div-philanthropist">
                                                        <div class="col-md-10">
                                                            <label for="">How do you know us?</label>
                                                            <textarea name="philanthropist_text" id="" cols="40" rows="5"></textarea>
                                                        </div>
                                                    </div>




                                                    <div class="row d-none ml-3" id="circular-endowment-eng-alumni">
                                                        <div class="col-md-10">
                                                            <label for="school_select">Select School</label>
                                                            <select name="school" id="school_select"
                                                                class="form-control">
                                                                <option value="" selected>Select School</option>
                                                                @foreach ($schools as $item)
                                                                    <option value="{{ $item->schoolname }}">
                                                                        {{ $item->schoolname }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="country_select">Select Country</label>
                                                            <select name="country" id="country_select"
                                                                class="form-control">
                                                                @foreach ($countries as $item)
                                                                    <option value="{{ $item->countryname }}">
                                                                        {{ $item->countryname }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="year" class="form-label">Select Year of
                                                                Graduation</label>
                                                            <select id="year" name="year"
                                                                class="form-control">
                                                                <option value="" selected>Select Year of
                                                                    Graduation
                                                                </option>
                                                                @for ($i = date('Y'); $i >= 1990; $i--)
                                                                    <option value="{{ $i }}">
                                                                        {{ $i }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-check mb-3 mt-2 ml-3">
                                                <input
                                                    class="form-check-input ml-3  circular-endowment-eng-paynow-radio"
                                                    name="payments_status" type="radio"
                                                    id="circular-endowment-eng-showBankDetails" value="Paynow">
                                                <label class="form-check-label ml-4"
                                                    for="showBankDetailsNonEng">Paynow</label>

                                                <input class="form-check-input ml-3 pledge-radio"
                                                    name="payments_status" type="radio"
                                                    id="circular-endowment-eng-pledge" value="make_a_pledge">
                                                <label class="form-check-label ml-4"
                                                    for="circular-endowment-eng-pledge">Make a
                                                    Pledge</label>
                                            </div>

                                            <!-- Elements to show/hide -->
                                            <span id="circular-endowment-eng-paynow"
                                                class="text-dark d-none mb-2 ml-4">
                                                Attach Screenshots/ Receipt of Fund Transfer
                                            </span>

                                            <div id="circular-endowment-eng-paynowProof"
                                                class="form-group d-none ml-3">
                                                <label for="prove">Proof:</label>
                                                <input type="file" id="prove" name="prove"
                                                    class="form-control">
                                            </div>
                                        </div>



                                    </div>

                                    <input type="submit" name="submit" id=""
                                        class="btn btn-primary ml-3">
                                </form>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        // Scope to circular-endowment-eng form only
                                        const form = document.querySelector('#circular-endowment-eng-form'); // Add this ID to your form tag!

                                        if (!form) return;

                                        // Elements inside circular-endowment-eng form
                                        const hostelCheckbox = form.querySelector('input[name="hostelandmessing"]');
                                        const totalAmountInput = form.querySelector('.total_amount');

                                        const alumniSelect = form.querySelector('#circular-endowment-eng-alumni_select');
                                        const alumniFields = form.querySelector('#circular-endowment-eng-alumni');
                                        const philanthropistFields = form.querySelector('#circular-endowment-eng-div-philanthropist');

                                        const payNowRadio = form.querySelector('#circular-endowment-eng-showBankDetails');
                                        const pledgeRadio = form.querySelector('#circular-endowment-eng-pledge');
                                        const payNowText = form.querySelector('#circular-endowment-eng-paynow');
                                        const payNowProof = form.querySelector('#circular-endowment-eng-paynowProof');

                                        const bankDetails = document.getElementById('bankDetails'); // This may exist globally

                                        const baseAmount = 20000000;
                                        const hostelAmount = 4000000;

                                        // ✅ Update Total Amount based on checkbox
                                        if (hostelCheckbox && totalAmountInput) {
                                            hostelCheckbox.addEventListener("change", function() {
                                                totalAmountInput.value = this.checked ?
                                                    baseAmount + hostelAmount :
                                                    baseAmount;
                                            });
                                        }

                                        // ✅ Toggle fields based on Alumni / Partner selection
                                        if (alumniSelect) {
                                            alumniSelect.addEventListener("change", function() {
                                                const selected = this.value;

                                                if (alumniFields) alumniFields.classList.add("d-none");
                                                if (philanthropistFields) philanthropistFields.classList.add("d-none");

                                                if (selected === "Alumni" && alumniFields) {
                                                    alumniFields.classList.remove("d-none");
                                                }

                                                if ((selected === "Philanthropist" || selected === "Industrial-Partner") &&
                                                    philanthropistFields) {
                                                    philanthropistFields.classList.remove("d-none");
                                                }
                                            });
                                        }

                                        // ✅ Show/hide proof upload field
                                        function togglePayNowElements(show) {
                                            if (payNowText) payNowText.classList.toggle("d-none", !show);
                                            if (payNowProof) payNowProof.classList.toggle("d-none", !show);
                                            if (bankDetails) bankDetails.style.display = show ? "block" : "none";
                                        }

                                        if (payNowRadio) {
                                            payNowRadio.addEventListener("change", function() {
                                                if (this.checked) togglePayNowElements(true);
                                            });
                                        }

                                        if (pledgeRadio) {
                                            pledgeRadio.addEventListener("change", function() {
                                                if (this.checked) togglePayNowElements(false);
                                            });
                                        }
                                    });
                                </script>

                            </div>

                            <div class="col-md-4 mb-2">
                                <h3 class="text-light text-center p-3" style="background-color: #004476;">
                                    Non Engineering Students
                                </h3>

                                <form id="circular-endowment-ug-non-eng-form"
                                    action="{{ url('default_one_year_degree') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group" hidden>
                                        <input type="text" name="program_type" value="One Year Undergraduate"
                                            class="form-control">
                                        <label for="degree">Degree:</label>
                                        <input type="text" name="degree" value="Non Engineering"
                                            class="form-control">
                                    </div>

                                    <div class="row p-2 mt-4">
                                        <div class="form-group ml-3">
                                            <input type="checkbox" value="4000000" name="hostelandmessing"
                                                id="circular-endowment-ug-non-eng-hostel">
                                            <label for="circular-endowment-ug-non-eng-hostel">
                                                Include mess and hostel expenses (4,000,000 PKR)
                                            </label>
                                        </div>
                                        <div class="form-group ml-3">
                                            <label for="circular-endowment-ug-non-eng-totalAmount">Total
                                                Amount:</label>
                                            <input type="text"
                                                class="form-control circular-endowment-ug-non-eng-totalAmount"
                                                name="totalAmount" value="30000000" readonly>
                                        </div>
                                    </div>

                                    {{-- Donor Info --}}
                                    <div id="donorInfo">
                                        <h4 class="text-dark mt-4">Donor Information:</h4>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label for="donor_name">Name:</label>
                                                <input type="text" id="donor_name" name="donor_name"
                                                    placeholder="Enter Your Full Name" class="form-control" required>
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <label for="donor_email">Email:</label>
                                                <input type="email" id="donor_email" name="donor_email"
                                                    placeholder="Enter your Valid Email" class="form-control"
                                                    required>
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <label for="phone">Phone:</label>
                                                <input type="number" id="phone" name="phone"
                                                    placeholder="Enter Your Phone# (+92)" class="form-control"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="container-fluid">
                                            <div class="row ml-3">
                                                <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial
                                                    Partner</span>
                                                <div class="col-md-10 mb-3">
                                                    <select class="form-control" name="about_partner"
                                                        id="circular-endowment-ug-non-eng-alumni_select">
                                                        <option value="" disabled selected>Select an option
                                                        </option>
                                                        <option value="Alumni">Alumni</option>
                                                        <option value="Industrial-Partner">Industrial Partner</option>
                                                        <option value="Philanthropist">Philanthropist</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row ml-4 d-none"
                                                id="circular-endowment-ug-non-eng-div-philanthropist">
                                                <div class="col-md-10">
                                                    <label for="">How do you know us?</label>
                                                    <textarea name="philanthropist_text" cols="40" rows="5"></textarea>
                                                </div>
                                            </div>

                                            <div class="row d-none ml-3" id="circular-endowment-ug-non-eng-alumni">
                                                <div class="col-md-10">
                                                    <label for="school_select">Select School</label>
                                                    <select name="school" id="school_select" class="form-control">
                                                        <option value="" selected>Select School</option>
                                                        @foreach ($schools as $item)
                                                            <option value="{{ $item->schoolname }}">
                                                                {{ $item->schoolname }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-10">
                                                    <label for="country_select">Select Country</label>
                                                    <select name="country" id="country_select" class="form-control">
                                                        @foreach ($countries as $item)
                                                            <option value="{{ $item->countryname }}">
                                                                {{ $item->countryname }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-10">
                                                    <label for="year">Select Year of Graduation</label>
                                                    <select id="year" name="year" class="form-control">
                                                        <option value="" selected>Select Year of Graduation
                                                        </option>
                                                        @for ($i = date('Y'); $i >= 1990; $i--)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-check mb-3 mt-2 ml-3">
                                                <input class="form-check-input ml-3" name="payments_status"
                                                    type="radio" id="circular-endowment-ug-non-eng-showBankDetails"
                                                    value="Paynow">
                                                <label class="form-check-label ml-4"
                                                    for="circular-endowment-ug-non-eng-showBankDetails">Paynow</label>

                                                <input class="form-check-input ml-3" name="payments_status"
                                                    type="radio" id="circular-endowment-ug-non-eng-pledge"
                                                    value="make_a_pledge">
                                                <label class="form-check-label ml-4"
                                                    for="circular-endowment-ug-non-eng-pledge">Make a Pledge</label>
                                            </div>

                                            <span id="circular-endowment-ug-non-eng-paynow"
                                                class="text-dark d-none mb-2 ml-4">
                                                Attach Screenshots/ Receipt of Fund Transfer
                                            </span>

                                            <div id="circular-endowment-ug-non-eng-paynowProof"
                                                class="form-group d-none ml-3">
                                                <label for="prove">Proof:</label>
                                                <input type="file" id="prove" name="prove"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" name="submit" class="btn btn-primary ml-3">
                                </form>

                                <!-- ✅ JavaScript -->
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const form = document.querySelector('#circular-endowment-ug-non-eng-form');
                                        const hostelCheckbox = form.querySelector('#circular-endowment-ug-non-eng-hostel');
                                        const totalAmountInput = form.querySelector('.circular-endowment-ug-non-eng-totalAmount');

                                        const alumniSelect = form.querySelector('#circular-endowment-ug-non-eng-alumni_select');
                                        const alumniFields = form.querySelector('#circular-endowment-ug-non-eng-alumni');
                                        const philanthropistFields = form.querySelector('#circular-endowment-ug-non-eng-div-philanthropist');

                                        const payNowRadio = form.querySelector('#circular-endowment-ug-non-eng-showBankDetails');
                                        const pledgeRadio = form.querySelector('#circular-endowment-ug-non-eng-pledge');
                                        const payNowText = form.querySelector('#circular-endowment-ug-non-eng-paynow');
                                        const payNowProof = form.querySelector('#circular-endowment-ug-non-eng-paynowProof');

                                        const bankDetails = document.getElementById('bankDetails'); // Optional if exists

                                        // ✅ Corrected values
                                        const baseAmount = 30000000;
                                        const hostelAmount = 4000000;

                                        if (hostelCheckbox && totalAmountInput) {
                                            hostelCheckbox.addEventListener("change", function() {
                                                totalAmountInput.value = this.checked ? baseAmount + hostelAmount : baseAmount;
                                            });
                                        }

                                        // Alumni/Philanthropist toggle
                                        if (alumniSelect) {
                                            alumniSelect.addEventListener("change", function() {
                                                const value = this.value;
                                                alumniFields.classList.add("d-none");
                                                philanthropistFields.classList.add("d-none");

                                                if (value === "Alumni") {
                                                    alumniFields.classList.remove("d-none");
                                                } else if (value === "Philanthropist" || value === "Industrial-Partner") {
                                                    philanthropistFields.classList.remove("d-none");
                                                }
                                            });
                                        }

                                        // Paynow / Pledge toggle
                                        function togglePayNowElements(show) {
                                            payNowText.classList.toggle("d-none", !show);
                                            payNowProof.classList.toggle("d-none", !show);
                                            if (bankDetails) bankDetails.style.display = show ? "block" : "none";
                                        }

                                        if (payNowRadio) {
                                            payNowRadio.addEventListener("change", () => togglePayNowElements(true));
                                        }

                                        if (pledgeRadio) {
                                            pledgeRadio.addEventListener("change", () => togglePayNowElements(false));
                                        }
                                    });
                                </script>
                            </div>


                            <div class="col-md-4 mb-2">
                                <form id="circular-endowment-ug-custom-form"
                                    action="{{ url('endowmentsupportoneyear') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <h3 class="text-light text-center p-3" style="background-color: #004476;">
                                        Customize
                                        Your Package</h3>

                                    <input type="text" name="program_type" value="UG One Year" hidden>

                                    {{-- Degree & Seat --}}
                                    <div class="form-group">
                                        <label for="circular-endowment-ug-custom-degree">Select Degree:</label>
                                        <select id="circular-endowment-ug-custom-degree" class="form-control">
                                            <option value="">Select Degree</option>
                                            @foreach ($undergraduate as $degree)
                                                <option value="{{ $degree->fee }}"
                                                    data-degree-name="{{ $degree->degree }}">{{ $degree->degree }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="circular-endowment-ug-custom-no_of_seat">No of Seats:</label>
                                        <input type="number" id="circular-endowment-ug-custom-no_of_seat"
                                            name="seats" value="1" class="form-control" min="1">
                                    </div>

                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input"
                                            id="circular-endowment-ug-custom-hostel" value="275000">
                                        <label class="form-check-label" for="circular-endowment-ug-custom-hostel">
                                            Include mess and hostel expenses (275,000 PKR)
                                        </label>
                                    </div>

                                    <div class="form-group d-none">
                                        <label for="circular-endowment-ug-custom-selectedDegree">Selected
                                            Degree:</label>
                                        <input type="text" id="circular-endowment-ug-custom-selectedDegree"
                                            name="degree" class="form-control" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="circular-endowment-ug-custom-totalAmount">Total Amount:</label>
                                        <input type="text" id="circular-endowment-ug-custom-totalAmount"
                                            name="totalAmount" class="form-control" readonly>
                                    </div>

                                    {{-- Donor Information --}}
                                    <h4 class="text-dark mt-4">Donor Information:</h4>
                                    <div class="form-group">
                                        <label for="donor_name">Name:</label>
                                        <input type="text" id="donor_name" name="donor_name"
                                            placeholder="Enter Your Full Name" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="donor_email">Email:</label>
                                        <input type="email" id="donor_email" name="donor_email"
                                            placeholder="Enter your Valid Email" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="number" id="phone" name="phone"
                                            placeholder="Enter Your Phone# (+92)" class="form-control" required>
                                    </div>

                                    {{-- Alumni/Philanthropist --}}
                                    <div class="form-group">
                                        <label for="circular-endowment-ug-custom-alumniSelect">Are You Alumni or
                                            Industrial Partner</label>
                                        <select class="form-control" name="about_partner"
                                            id="circular-endowment-ug-custom-alumniSelect">
                                            <option value="" disabled selected>Select an option</option>
                                            <option value="Alumni">Alumni</option>
                                            <option value="Industrial-Partner">Industrial Partner</option>
                                            <option value="Philanthropist">Philanthropist</option>
                                        </select>
                                    </div>

                                    <div class="form-group d-none"
                                        id="circular-endowment-ug-custom-philanthropist-div">
                                        <label>How do you know us?</label>
                                        <textarea name="philanthropist_text" rows="4" class="form-control"></textarea>
                                    </div>

                                    <div class="row d-none" id="circular-endowment-ug-custom-alumniFields">
                                        <div class="col-md-12">
                                            <label>Select School</label>
                                            <select name="school" class="form-control">
                                                <option value="">Select School</option>
                                                @foreach ($schools as $item)
                                                    <option value="{{ $item->schoolname }}">{{ $item->schoolname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <label>Select Country</label>
                                            <select name="country" class="form-control">
                                                @foreach ($countries as $item)
                                                    <option value="{{ $item->countryname }}">{{ $item->countryname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <label>Select Year of Graduation</label>
                                            <select name="year" class="form-control">
                                                <option value="">Select Year</option>
                                                @for ($i = 1990; $i <= date('Y'); $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Payment Options --}}
                                    <div class="form-check mt-3">
                                        <input class="form-check-input ml-2" name="payments_status" type="radio"
                                            id="circular-endowment-ug-custom-paynow" value="Paynow">
                                        <label class="form-check-label ml-2"
                                            for="circular-endowment-ug-custom-paynow">Paynow</label>

                                        <input class="form-check-input ml-2" name="payments_status" type="radio"
                                            id="circular-endowment-ug-custom-pledge" value="make_a_pledge">
                                        <label class="form-check-label ml-2"
                                            for="circular-endowment-ug-custom-pledge">Make a Pledge</label>
                                    </div>

                                    <div class="form-group d-none mt-2" id="circular-endowment-ug-custom-proofDiv">
                                        <label for="prove">Attach Screenshot / Receipt:</label>
                                        <input type="file" id="prove" name="prove" class="form-control">
                                    </div>

                                    {{-- Link --}}
                                    <div class="mt-3 mb-2">
                                        <a href="{{ url('student_stories') }}" class="btn btn-info btn-sm"
                                            style="background-color: #FFA500;">
                                            Nurture a Dream<br>Read student stories and select a story of your choice.
                                        </a>
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </form>

                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const degreeSelect = document.getElementById("circular-endowment-ug-custom-degree");
                                        const seatInput = document.getElementById("circular-endowment-ug-custom-no_of_seat");
                                        const hostelCheckbox = document.getElementById("circular-endowment-ug-custom-hostel");
                                        const selectedDegreeInput = document.getElementById("circular-endowment-ug-custom-selectedDegree");
                                        const totalAmountInput = document.getElementById("circular-endowment-ug-custom-totalAmount");

                                        const alumniSelect = document.getElementById("circular-endowment-ug-custom-alumniSelect");
                                        const philanthropistDiv = document.getElementById("circular-endowment-ug-custom-philanthropist-div");
                                        const alumniFields = document.getElementById("circular-endowment-ug-custom-alumniFields");

                                        const paynowRadio = document.getElementById("circular-endowment-ug-custom-paynow");
                                        const pledgeRadio = document.getElementById("circular-endowment-ug-custom-pledge");
                                        const proofDiv = document.getElementById("circular-endowment-ug-custom-proofDiv");

                                        let degreeFee = 0;

                                        function calculateTotal() {
                                            const seatCount = parseInt(seatInput.value) || 1;
                                            const hostelFee = hostelCheckbox.checked ? 275000 * seatCount : 0;
                                            const total = (degreeFee * 4 * seatCount) + hostelFee;
                                            totalAmountInput.value = total;
                                        }

                                        degreeSelect.addEventListener("change", function() {
                                            const selectedOption = this.options[this.selectedIndex];
                                            degreeFee = parseInt(this.value) || 0;
                                            selectedDegreeInput.value = selectedOption.dataset.degreeName || '';
                                            calculateTotal();
                                        });

                                        seatInput.addEventListener("input", calculateTotal);
                                        hostelCheckbox.addEventListener("change", calculateTotal);

                                        alumniSelect.addEventListener("change", function() {
                                            const value = this.value;
                                            philanthropistDiv.classList.toggle("d-none", value !== "Philanthropist" && value !==
                                                "Industrial-Partner");
                                            alumniFields.classList.toggle("d-none", value !== "Alumni");
                                        });

                                        paynowRadio.addEventListener("change", function() {
                                            proofDiv.classList.remove("d-none");
                                        });

                                        pledgeRadio.addEventListener("change", function() {
                                            proofDiv.classList.add("d-none");
                                        });
                                    });
                                </script>
                            </div>

                        </div>
                        <!-- Add more content as needed -->
                    </div>

                    <!-- Single Endowment PG Tab Content -->
                    <div class="tab-pane fade" id="single-endowment-pg" role="tabpanel"
                        aria-labelledby="single-endowment-pg-tab">
                        <h3 class="text-center text-dark mt-4">Singular Endowment: Establish one Seat in perpetuity
                            (PG)</h3>
                        <div class="row mt-5">

                            <div class="col-md-4 mb-2">
                                <h3 class="text-light text-center p-3" style="background-color: #004476;">Engineering
                                    Students</h3>
                                <form id="singular-endowment-pg-eng-form"
                                    action="{{ url('default_one_year_degree') }}" method="post"
                                    enctype="multipart/form-data">

                                    @csrf
                                    <div class="form-group" hidden>
                                        <input type="text" name="program_type" value="One Year Undergraduate"
                                            class="form-control">
                                        <label for="degree">Degree:</label>
                                        <input type="text" name="degree" value="Engineering"
                                            class="form-control">
                                        {{-- <input type="text" name="seats" value="1" class="form-control"> --}}

                                    </div>
                                    <div class="row p-2 mt-4">
                                        <div class="form-group ml-3">
                                            <input type="checkbox" value="4000000" name="hostelandmessing"
                                                class="" >
                                            <label for="singular-endowment-pg-eng-AdditionalExpenses">Include mess and
                                                hostel expenses
                                                (4,000,000 
                                                PKR)</label>
                                        </div>
                                        <div class="form-group ml-3">
                                            <label for="singular-endowment-pg-eng-TotalAmount">Total Amount:</label>
                                            <input type="text" class="total_amount form-control"
                                                name="totalAmount" value="5000000" readonly>
                                        </div>
                                    </div>



                                    {{-- Donor info --}}
                                    <div id="donorInfo">
                                        <h4 class="text-dark mt-4">Donor Information:</h4>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_name">Name:</label>
                                                    <input type="text" id="donor_name" name="donor_name"
                                                        placeholder="Enter Your Full Name" class="form-control "
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_email">Email:</label>
                                                    <input type="email" id="donor_email" name="donor_email"
                                                        placeholder="Enter your Valid Email" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone:</label>
                                                    <input type="number" id="phone" name="phone"
                                                        placeholder="Enter Your Phone# (+92)" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="container-fluid">
                                                    <div class="row ml-3">
                                                        <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial
                                                            Partner</span>
                                                        <div class="col-md-10 mb-3">
                                                            <select class="form-control" name="about_partner"
                                                                id="singular-endowment-pg-eng-alumni_select">
                                                                <option value="" disabled selected>Select an
                                                                    option
                                                                </option>
                                                                <option value="Alumni"
                                                                    id="singular-endowment-pg-eng-Alumni">Alumni
                                                                </option>
                                                                <option value="Industrial-Partner"
                                                                    id="singular-endowment-pg-eng-Industrial-Partner">
                                                                    Industrial Partner</option>
                                                                <option value="Philanthropist"
                                                                    id="singular-endowment-pg-eng-Philanthropist">
                                                                    Philanthropist</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row ml-4 d-none"
                                                        id="singular-endowment-pg-eng-div-philanthropist">
                                                        <div class="col-md-10">
                                                            <label for="">How do you know us?</label>
                                                            <textarea name="philanthropist_text" id="" cols="40" rows="5"></textarea>
                                                        </div>
                                                    </div>




                                                    <div class="row d-none ml-3"
                                                        id="singular-endowment-pg-eng-alumni">
                                                        <div class="col-md-10">
                                                            <label for="school_select">Select School</label>
                                                            <select name="school" id="school_select"
                                                                class="form-control">
                                                                <option value="" selected>Select School</option>
                                                                @foreach ($schools as $item)
                                                                    <option value="{{ $item->schoolname }}">
                                                                        {{ $item->schoolname }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="country_select">Select Country</label>
                                                            <select name="country" id="country_select"
                                                                class="form-control">
                                                                @foreach ($countries as $item)
                                                                    <option value="{{ $item->countryname }}">
                                                                        {{ $item->countryname }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="year" class="form-label">Select Year of
                                                                Graduation</label>
                                                            <select id="year" name="year"
                                                                class="form-control">
                                                                <option value="" selected>Select Year of
                                                                    Graduation
                                                                </option>
                                                                @for ($i = date('Y'); $i >= 1990; $i--)
                                                                    <option value="{{ $i }}">
                                                                        {{ $i }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-check mb-3 mt-2 ml-3">
                                                <input
                                                    class="form-check-input ml-3  singular-endowment-pg-eng-paynow-radio"
                                                    name="payments_status" type="radio"
                                                    id="singular-endowment-pg-eng-showBankDetails" value="Paynow">
                                                <label class="form-check-label ml-4"
                                                    for="showBankDetailsNonEng">Paynow</label>

                                                <input class="form-check-input ml-3 pledge-radio"
                                                    name="payments_status" type="radio"
                                                    id="singular-endowment-pg-eng-pledge" value="make_a_pledge">
                                                <label class="form-check-label ml-4"
                                                    for="singular-endowment-pg-eng-pledge">Make a
                                                    Pledge</label>
                                            </div>

                                            <!-- Elements to show/hide -->
                                            <span id="singular-endowment-pg-eng-paynow"
                                                class="text-dark d-none mb-2 ml-4">
                                                Attach Screenshots/ Receipt of Fund Transfer
                                            </span>

                                            <div id="singular-endowment-pg-eng-paynowProof"
                                                class="form-group d-none ml-3">
                                                <label for="prove">Proof:</label>
                                                <input type="file" id="prove" name="prove"
                                                    class="form-control">
                                            </div>
                                        </div>



                                    </div>

                                    <input type="submit" name="submit" id=""
                                        class="btn btn-primary ml-3">
                                </form>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        // Scope to singular-endowment-pg-eng form only
                                        const form = document.querySelector('#singular-endowment-pg-eng-form'); // Add this ID to your form tag!

                                        if (!form) return;

                                        // Elements inside singular-endowment-pg-eng form
                                        const hostelCheckbox = form.querySelector('input[name="hostelandmessing"]');
                                        const totalAmountInput = form.querySelector('.total_amount');

                                        const alumniSelect = form.querySelector('#singular-endowment-pg-eng-alumni_select');
                                        const alumniFields = form.querySelector('#singular-endowment-pg-eng-alumni');
                                        const philanthropistFields = form.querySelector('#singular-endowment-pg-eng-div-philanthropist');

                                        const payNowRadio = form.querySelector('#singular-endowment-pg-eng-showBankDetails');
                                        const pledgeRadio = form.querySelector('#singular-endowment-pg-eng-pledge');
                                        const payNowText = form.querySelector('#singular-endowment-pg-eng-paynow');
                                        const payNowProof = form.querySelector('#singular-endowment-pg-eng-paynowProof');

                                        const bankDetails = document.getElementById('bankDetails'); // This may exist globally

                                        const baseAmount = 5000000;
                                        const hostelAmount = 4000000;

                                        // ✅ Update Total Amount based on checkbox
                                        if (hostelCheckbox && totalAmountInput) {
                                            hostelCheckbox.addEventListener("change", function() {
                                                totalAmountInput.value = this.checked ?
                                                    baseAmount + hostelAmount :
                                                    baseAmount;
                                            });
                                        }

                                        // ✅ Toggle fields based on Alumni / Partner selection
                                        if (alumniSelect) {
                                            alumniSelect.addEventListener("change", function() {
                                                const selected = this.value;

                                                if (alumniFields) alumniFields.classList.add("d-none");
                                                if (philanthropistFields) philanthropistFields.classList.add("d-none");

                                                if (selected === "Alumni" && alumniFields) {
                                                    alumniFields.classList.remove("d-none");
                                                }

                                                if ((selected === "Philanthropist" || selected === "Industrial-Partner") &&
                                                    philanthropistFields) {
                                                    philanthropistFields.classList.remove("d-none");
                                                }
                                            });
                                        }

                                        // ✅ Show/hide proof upload field
                                        function togglePayNowElements(show) {
                                            if (payNowText) payNowText.classList.toggle("d-none", !show);
                                            if (payNowProof) payNowProof.classList.toggle("d-none", !show);
                                            if (bankDetails) bankDetails.style.display = show ? "block" : "none";
                                        }

                                        if (payNowRadio) {
                                            payNowRadio.addEventListener("change", function() {
                                                if (this.checked) togglePayNowElements(true);
                                            });
                                        }

                                        if (pledgeRadio) {
                                            pledgeRadio.addEventListener("change", function() {
                                                if (this.checked) togglePayNowElements(false);
                                            });
                                        }
                                    });
                                </script>

                            </div>

                            <div class="col-md-4 mb-2">
                                <h3 class="text-light text-center p-3" style="background-color: #004476;">Non
                                    Engineering
                                    Students</h3>

                                <form id="sircular-endowment-pg-non-eng-form"
                                    action="{{ url('default_one_year_degree') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group" hidden>
                                        <input type="text" name="program_type" value="One Year Undergraduate"
                                            class="form-control">
                                        <label for="degree">Degree:</label>
                                        <input type="text" name="degree" value="Non Engineering"
                                            class="form-control">
                                    </div>

                                    <div class="row p-2 mt-4">
                                        <div class="form-group ml-3">
                                            <input type="checkbox" value="4000000" name="hostelandmessing"
                                                id="sircular-endowment-pg-non-eng-hostel">
                                            <label for="sircular-endowment-pg-non-eng-hostel">Include mess and hostel
                                                expenses (4,000,000 
                                                PKR)</label>
                                        </div>
                                        <div class="form-group ml-3">
                                            <label for="sircular-endowment-pg-non-eng-totalAmount">Total
                                                Amount:</label>
                                            <input type="text"
                                                class="form-control sircular-endowment-pg-non-eng-totalAmount"
                                                name="totalAmount" value="5000000" readonly>
                                        </div>
                                    </div>

                                    {{-- Donor Info --}}
                                    <div id="donorInfo">
                                        <h4 class="text-dark mt-4">Donor Information:</h4>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label for="donor_name">Name:</label>
                                                <input type="text" id="donor_name" name="donor_name"
                                                    placeholder="Enter Your Full Name" class="form-control"
                                                    required>
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <label for="donor_email">Email:</label>
                                                <input type="email" id="donor_email" name="donor_email"
                                                    placeholder="Enter your Valid Email" class="form-control"
                                                    required>
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <label for="phone">Phone:</label>
                                                <input type="number" id="phone" name="phone"
                                                    placeholder="Enter Your Phone# (+92)" class="form-control"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="container-fluid">
                                            <div class="row ml-3">
                                                <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial
                                                    Partner</span>
                                                <div class="col-md-10 mb-3">
                                                    <select class="form-control" name="about_partner"
                                                        id="sircular-endowment-pg-non-eng-alumni_select">
                                                        <option value="" disabled selected>Select an option
                                                        </option>
                                                        <option value="Alumni">Alumni</option>
                                                        <option value="Industrial-Partner">Industrial Partner</option>
                                                        <option value="Philanthropist">Philanthropist</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row ml-4 d-none"
                                                id="sircular-endowment-pg-non-eng-div-philanthropist">
                                                <div class="col-md-10">
                                                    <label for="">How do you know us?</label>
                                                    <textarea name="philanthropist_text" cols="40" rows="5"></textarea>
                                                </div>
                                            </div>

                                            <div class="row d-none ml-3" id="sircular-endowment-pg-non-eng-alumni">
                                                <div class="col-md-10">
                                                    <label for="school_select">Select School</label>
                                                    <select name="school" id="school_select"
                                                        class="form-control">
                                                        <option value="" selected>Select School</option>
                                                        @foreach ($schools as $item)
                                                            <option value="{{ $item->schoolname }}">
                                                                {{ $item->schoolname }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-10">
                                                    <label for="country_select">Select Country</label>
                                                    <select name="country" id="country_select"
                                                        class="form-control">
                                                        @foreach ($countries as $item)
                                                            <option value="{{ $item->countryname }}">
                                                                {{ $item->countryname }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-10">
                                                    <label for="year">Select Year of Graduation</label>
                                                    <select id="year" name="year" class="form-control">
                                                        <option value="" selected>Select Year of Graduation
                                                        </option>
                                                        @for ($i = date('Y'); $i >= 1990; $i--)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-check mb-3 mt-2 ml-3">
                                                <input class="form-check-input ml-3" name="payments_status"
                                                    type="radio"
                                                    id="sircular-endowment-pg-non-eng-showBankDetails"
                                                    value="Paynow">
                                                <label class="form-check-label ml-4"
                                                    for="sircular-endowment-pg-non-eng-showBankDetails">Paynow</label>

                                                <input class="form-check-input ml-3" name="payments_status"
                                                    type="radio" id="sircular-endowment-pg-non-eng-pledge"
                                                    value="make_a_pledge">
                                                <label class="form-check-label ml-4"
                                                    for="sircular-endowment-pg-non-eng-pledge">Make a
                                                    Pledge</label>
                                            </div>

                                            <span id="sircular-endowment-pg-non-eng-paynow"
                                                class="text-dark d-none mb-2 ml-4">
                                                Attach Screenshots/ Receipt of Fund Transfer
                                            </span>

                                            <div id="sircular-endowment-pg-non-eng-paynowProof"
                                                class="form-group d-none ml-3">
                                                <label for="prove">Proof:</label>
                                                <input type="file" id="prove" name="prove"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" name="submit" class="btn btn-primary ml-3">
                                </form>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const form = document.querySelector('#sircular-endowment-pg-non-eng-form');
                                        const hostelCheckbox = form.querySelector('#sircular-endowment-pg-non-eng-hostel');
                                        const totalAmountInput = form.querySelector('.sircular-endowment-pg-non-eng-totalAmount');

                                        const alumniSelect = form.querySelector('#sircular-endowment-pg-non-eng-alumni_select');
                                        const alumniFields = form.querySelector('#sircular-endowment-pg-non-eng-alumni');
                                        const philanthropistFields = form.querySelector('#sircular-endowment-pg-non-eng-div-philanthropist');

                                        const payNowRadio = form.querySelector('#sircular-endowment-pg-non-eng-showBankDetails');
                                        const pledgeRadio = form.querySelector('#sircular-endowment-pg-non-eng-pledge');
                                        const payNowText = form.querySelector('#sircular-endowment-pg-non-eng-paynow');
                                        const payNowProof = form.querySelector('#sircular-endowment-pg-non-eng-paynowProof');

                                        const bankDetails = document.getElementById('bankDetails'); // Optional if present elsewhere

                                        const baseAmount = 5000000; // ✅ matches HTML input value
                                        const hostelAmount = 4000000;

                                        // Update Total Amount
                                        if (hostelCheckbox && totalAmountInput) {
                                            hostelCheckbox.addEventListener("change", function() {
                                                totalAmountInput.value = this.checked ? baseAmount + hostelAmount : baseAmount;
                                            });
                                        }

                                        // Alumni/Philanthropist toggle
                                        if (alumniSelect) {
                                            alumniSelect.addEventListener("change", function() {
                                                const value = this.value;

                                                alumniFields.classList.add("d-none");
                                                philanthropistFields.classList.add("d-none");

                                                if (value === "Alumni") {
                                                    alumniFields.classList.remove("d-none");
                                                } else if (value === "Philanthropist" || value === "Industrial-Partner") {
                                                    philanthropistFields.classList.remove("d-none");
                                                }
                                            });
                                        }

                                        // Paynow / Pledge toggle
                                        function togglePayNowElements(show) {
                                            payNowText.classList.toggle("d-none", !show);
                                            payNowProof.classList.toggle("d-none", !show);
                                            if (bankDetails) bankDetails.style.display = show ? "block" : "none";
                                        }

                                        if (payNowRadio) {
                                            payNowRadio.addEventListener("change", () => togglePayNowElements(true));
                                        }

                                        if (pledgeRadio) {
                                            pledgeRadio.addEventListener("change", () => togglePayNowElements(false));
                                        }
                                    });
                                </script>
                            </div>


                            <div class="col-md-4 mb-2">
                                <form id="singluar-endowment-pg-custom-form"
                                    action="{{ url('endowmentsupportoneyear') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <h3 class="text-light text-center p-3" style="background-color: #004476;">
                                        Customize
                                        Your Package</h3>

                                    <input type="text" name="program_type" value="UG One Year" hidden>

                                    {{-- Degree & Seat --}}
                                    <div class="form-group">
                                        <label for="singluar-endowment-pg-custom-degree">Select Degree:</label>
                                        <select id="singluar-endowment-pg-custom-degree" class="form-control">
                                            <option value="">Select Degree</option>
                                            @foreach ($undergraduate as $degree)
                                                <option value="{{ $degree->fee }}"
                                                    data-degree-name="{{ $degree->degree }}">{{ $degree->degree }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="singluar-endowment-pg-custom-no_of_seat">No of Seats:</label>
                                        <input type="number" id="singluar-endowment-pg-custom-no_of_seat"
                                            name="seats" value="1" class="form-control" min="1">
                                    </div>

                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input"
                                            id="singluar-endowment-pg-custom-hostel" value="275000">
                                        <label class="form-check-label" for="singluar-endowment-pg-custom-hostel">
                                            Include mess and hostel expenses (275,000 PKR)
                                        </label>
                                    </div>

                                    <div class="form-group d-none">
                                        <label for="singluar-endowment-pg-custom-selectedDegree">Selected
                                            Degree:</label>
                                        <input type="text" id="singluar-endowment-pg-custom-selectedDegree"
                                            name="degree" class="form-control" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="singluar-endowment-pg-custom-totalAmount">Total Amount:</label>
                                        <input type="text" id="singluar-endowment-pg-custom-totalAmount"
                                            name="totalAmount" class="form-control" readonly>
                                    </div>

                                    {{-- Donor Information --}}
                                    <h4 class="text-dark mt-4">Donor Information:</h4>
                                    <div class="form-group">
                                        <label for="donor_name">Name:</label>
                                        <input type="text" id="donor_name" name="donor_name"
                                            placeholder="Enter Your Full Name" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="donor_email">Email:</label>
                                        <input type="email" id="donor_email" name="donor_email"
                                            placeholder="Enter your Valid Email" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="number" id="phone" name="phone"
                                            placeholder="Enter Your Phone# (+92)" class="form-control" required>
                                    </div>

                                    {{-- Alumni/Philanthropist --}}
                                    <div class="form-group">
                                        <label for="singluar-endowment-pg-custom-alumniSelect">Are You Alumni or
                                            Industrial Partner</label>
                                        <select class="form-control" name="about_partner"
                                            id="singluar-endowment-pg-custom-alumniSelect">
                                            <option value="" disabled selected>Select an option</option>
                                            <option value="Alumni">Alumni</option>
                                            <option value="Industrial-Partner">Industrial Partner</option>
                                            <option value="Philanthropist">Philanthropist</option>
                                        </select>
                                    </div>

                                    <div class="form-group d-none"
                                        id="singluar-endowment-pg-custom-philanthropist-div">
                                        <label>How do you know us?</label>
                                        <textarea name="philanthropist_text" rows="4" class="form-control"></textarea>
                                    </div>

                                    <div class="row d-none" id="singluar-endowment-pg-custom-alumniFields">
                                        <div class="col-md-12">
                                            <label>Select School</label>
                                            <select name="school" class="form-control">
                                                <option value="">Select School</option>
                                                @foreach ($schools as $item)
                                                    <option value="{{ $item->schoolname }}">{{ $item->schoolname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <label>Select Country</label>
                                            <select name="country" class="form-control">
                                                @foreach ($countries as $item)
                                                    <option value="{{ $item->countryname }}">
                                                        {{ $item->countryname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <label>Select Year of Graduation</label>
                                            <select name="year" class="form-control">
                                                <option value="">Select Year</option>
                                                @for ($i = 1990; $i <= date('Y'); $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Payment Options --}}
                                    <div class="form-check mt-3">
                                        <input class="form-check-input ml-2" name="payments_status" type="radio"
                                            id="singluar-endowment-pg-custom-paynow" value="Paynow">
                                        <label class="form-check-label ml-2"
                                            for="singluar-endowment-pg-custom-paynow">Paynow</label>

                                        <input class="form-check-input ml-2" name="payments_status" type="radio"
                                            id="singluar-endowment-pg-custom-pledge" value="make_a_pledge">
                                        <label class="form-check-label ml-2"
                                            for="singluar-endowment-pg-custom-pledge">Make a Pledge</label>
                                    </div>

                                    <div class="form-group d-none mt-2" id="singluar-endowment-pg-custom-proofDiv">
                                        <label for="prove">Attach Screenshot / Receipt:</label>
                                        <input type="file" id="prove" name="prove"
                                            class="form-control">
                                    </div>

                                    {{-- Link --}}
                                    <div class="mt-3 mb-2">
                                        <a href="{{ url('student_stories') }}" class="btn btn-info btn-sm"
                                            style="background-color: #FFA500;">
                                            Nurture a Dream<br>Read student stories and select a story of your choice.
                                        </a>
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </form>

                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const degreeSelect = document.getElementById("singluar-endowment-pg-custom-degree");
                                        const seatInput = document.getElementById("singluar-endowment-pg-custom-no_of_seat");
                                        const hostelCheckbox = document.getElementById("singluar-endowment-pg-custom-hostel");
                                        const selectedDegreeInput = document.getElementById("singluar-endowment-pg-custom-selectedDegree");
                                        const totalAmountInput = document.getElementById("singluar-endowment-pg-custom-totalAmount");

                                        const alumniSelect = document.getElementById("singluar-endowment-pg-custom-alumniSelect");
                                        const philanthropistDiv = document.getElementById("singluar-endowment-pg-custom-philanthropist-div");
                                        const alumniFields = document.getElementById("singluar-endowment-pg-custom-alumniFields");

                                        const paynowRadio = document.getElementById("singluar-endowment-pg-custom-paynow");
                                        const pledgeRadio = document.getElementById("singluar-endowment-pg-custom-pledge");
                                        const proofDiv = document.getElementById("singluar-endowment-pg-custom-proofDiv");

                                        let degreeFee = 0;

                                        function calculateTotal() {
                                            const seatCount = parseInt(seatInput.value) || 1;
                                            const hostelFee = hostelCheckbox.checked ? 275000 * seatCount : 0;
                                            const total = (degreeFee * 4 * seatCount) + hostelFee;
                                            totalAmountInput.value = total;
                                        }

                                        degreeSelect.addEventListener("change", function() {
                                            const selectedOption = this.options[this.selectedIndex];
                                            degreeFee = parseInt(this.value) || 0;
                                            selectedDegreeInput.value = selectedOption.dataset.degreeName || '';
                                            calculateTotal();
                                        });

                                        seatInput.addEventListener("input", calculateTotal);
                                        hostelCheckbox.addEventListener("change", calculateTotal);

                                        alumniSelect.addEventListener("change", function() {
                                            const value = this.value;
                                            philanthropistDiv.classList.toggle("d-none", value !== "Philanthropist" && value !==
                                                "Industrial-Partner");
                                            alumniFields.classList.toggle("d-none", value !== "Alumni");
                                        });

                                        paynowRadio.addEventListener("change", function() {
                                            proofDiv.classList.remove("d-none");
                                        });

                                        pledgeRadio.addEventListener("change", function() {
                                            proofDiv.classList.add("d-none");
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                        <!-- Add more content as needed -->
                    </div>

                    <!-- Circular Endowment PG Tab Content -->
                    <div class="tab-pane fade" id="circular-endowment-pg" role="tabpanel"
                        aria-labelledby="circular-endowment-pg-tab">
                        <h3 class="text-center text-dark mt-4">Circular Endowment: 4 seats in perpetuity - student
                            after student (PG)</h3>
                        <div class="row mt-5">

                            <div class="col-md-4 mb-2">
                                <h3 class="text-light text-center p-3" style="background-color: #004476;">
                                    Engineering
                                    Students</h3>
                                <form id="circular-endowment-pg-eng-form"
                                    action="{{ url('default_one_year_degree') }}" method="post"
                                    enctype="multipart/form-data">

                                    @csrf
                                    <div class="form-group" hidden>
                                        <input type="text" name="program_type" value="One Year Undergraduate"
                                            class="form-control">
                                        <label for="degree">Degree:</label>
                                        <input type="text" name="degree" value="Engineering"
                                            class="form-control">
                                        {{-- <input type="text" name="seats" value="1" class="form-control"> --}}

                                    </div>
                                    <div class="row p-2 mt-4">
                                        <div class="form-group ml-3">
                                            <input type="checkbox" name="hostelandmessing"
                                                class="" value="4000000">
                                            <label for="circular-endowment-pg-eng-AdditionalExpenses">Include mess and
                                                hostel expenses
                                                (40,000,00
                                                PKR)</label>
                                        </div>
                                        <div class="form-group ml-3">
                                            <label for="circular-endowment-pg-eng-TotalAmount">Total Amount:</label>
                                            <input type="text" class="total_amount form-control"
                                                name="totalAmount" value="20000000" readonly>
                                        </div>
                                    </div>



                                    {{-- Donor info --}}
                                    <div id="donorInfo">
                                        <h4 class="text-dark mt-4">Donor Information:</h4>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_name">Name:</label>
                                                    <input type="text" id="donor_name" name="donor_name"
                                                        placeholder="Enter Your Full Name" class="form-control "
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_email">Email:</label>
                                                    <input type="email" id="donor_email" name="donor_email"
                                                        placeholder="Enter your Valid Email" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone:</label>
                                                    <input type="number" id="phone" name="phone"
                                                        placeholder="Enter Your Phone# (+92)" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="container-fluid">
                                                    <div class="row ml-3">
                                                        <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial
                                                            Partner</span>
                                                        <div class="col-md-10 mb-3">
                                                            <select class="form-control" name="about_partner"
                                                                id="circular-endowment-pg-eng-alumni_select">
                                                                <option value="" disabled selected>Select an
                                                                    option
                                                                </option>
                                                                <option value="Alumni"
                                                                    id="circular-endowment-pg-eng-Alumni">Alumni
                                                                </option>
                                                                <option value="Industrial-Partner"
                                                                    id="circular-endowment-pg-eng-Industrial-Partner">
                                                                    Industrial Partner</option>
                                                                <option value="Philanthropist"
                                                                    id="circular-endowment-pg-eng-Philanthropist">
                                                                    Philanthropist</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row ml-4 d-none"
                                                        id="circular-endowment-pg-eng-div-philanthropist">
                                                        <div class="col-md-10">
                                                            <label for="">How do you know us?</label>
                                                            <textarea name="philanthropist_text" id="" cols="40" rows="5"></textarea>
                                                        </div>
                                                    </div>




                                                    <div class="row d-none ml-3"
                                                        id="circular-endowment-pg-eng-alumni">
                                                        <div class="col-md-10">
                                                            <label for="school_select">Select School</label>
                                                            <select name="school" id="school_select"
                                                                class="form-control">
                                                                <option value="" selected>Select School</option>
                                                                @foreach ($schools as $item)
                                                                    <option value="{{ $item->schoolname }}">
                                                                        {{ $item->schoolname }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="country_select">Select Country</label>
                                                            <select name="country" id="country_select"
                                                                class="form-control">
                                                                @foreach ($countries as $item)
                                                                    <option value="{{ $item->countryname }}">
                                                                        {{ $item->countryname }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="year" class="form-label">Select Year of
                                                                Graduation</label>
                                                            <select id="year" name="year"
                                                                class="form-control">
                                                                <option value="" selected>Select Year of
                                                                    Graduation
                                                                </option>
                                                                @for ($i = date('Y'); $i >= 1990; $i--)
                                                                    <option value="{{ $i }}">
                                                                        {{ $i }}
                                                                    </option>
                                                                @endfor
                                                            </select>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-check mb-3 mt-2 ml-3">
                                                <input
                                                    class="form-check-input ml-3  circular-endowment-pg-eng-paynow-radio"
                                                    name="payments_status" type="radio"
                                                    id="circular-endowment-pg-eng-showBankDetails" value="Paynow">
                                                <label class="form-check-label ml-4"
                                                    for="showBankDetailsNonEng">Paynow</label>

                                                <input class="form-check-input ml-3 pledge-radio"
                                                    name="payments_status" type="radio"
                                                    id="circular-endowment-pg-eng-pledge" value="make_a_pledge">
                                                <label class="form-check-label ml-4"
                                                    for="circular-endowment-pg-eng-pledge">Make a
                                                    Pledge</label>
                                            </div>

                                            <!-- Elements to show/hide -->
                                            <span id="circular-endowment-pg-eng-paynow"
                                                class="text-dark d-none mb-2 ml-4">
                                                Attach Screenshots/ Receipt of Fund Transfer
                                            </span>

                                            <div id="circular-endowment-pg-eng-paynowProof"
                                                class="form-group d-none ml-3">
                                                <label for="prove">Proof:</label>
                                                <input type="file" id="prove" name="prove"
                                                    class="form-control">
                                            </div>
                                        </div>



                                    </div>

                                    <input type="submit" name="submit" id=""
                                        class="btn btn-primary ml-3">
                                </form>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        // Scope to circular-endowment-pg-eng form only
                                        const form = document.querySelector('#circular-endowment-pg-eng-form'); // Add this ID to your form tag!

                                        if (!form) return;

                                        // Elements inside circular-endowment-pg-eng form
                                        const hostelCheckbox = form.querySelector('input[name="hostelandmessing"]');
                                        const totalAmountInput = form.querySelector('.total_amount');

                                        const alumniSelect = form.querySelector('#circular-endowment-pg-eng-alumni_select');
                                        const alumniFields = form.querySelector('#circular-endowment-pg-eng-alumni');
                                        const philanthropistFields = form.querySelector('#circular-endowment-pg-eng-div-philanthropist');

                                        const payNowRadio = form.querySelector('#circular-endowment-pg-eng-showBankDetails');
                                        const pledgeRadio = form.querySelector('#circular-endowment-pg-eng-pledge');
                                        const payNowText = form.querySelector('#circular-endowment-pg-eng-paynow');
                                        const payNowProof = form.querySelector('#circular-endowment-pg-eng-paynowProof');

                                        const bankDetails = document.getElementById('bankDetails'); // This may exist globally

                                        const baseAmount = 20000000;
                                        const hostelAmount = 4000000;

                                        // ✅ Update Total Amount based on checkbox
                                        if (hostelCheckbox && totalAmountInput) {
                                            hostelCheckbox.addEventListener("change", function() {
                                                totalAmountInput.value = this.checked ?
                                                    baseAmount + hostelAmount :
                                                    baseAmount;
                                            });
                                        }

                                        // ✅ Toggle fields based on Alumni / Partner selection
                                        if (alumniSelect) {
                                            alumniSelect.addEventListener("change", function() {
                                                const selected = this.value;

                                                if (alumniFields) alumniFields.classList.add("d-none");
                                                if (philanthropistFields) philanthropistFields.classList.add("d-none");

                                                if (selected === "Alumni" && alumniFields) {
                                                    alumniFields.classList.remove("d-none");
                                                }

                                                if ((selected === "Philanthropist" || selected === "Industrial-Partner") &&
                                                    philanthropistFields) {
                                                    philanthropistFields.classList.remove("d-none");
                                                }
                                            });
                                        }

                                        // ✅ Show/hide proof upload field
                                        function togglePayNowElements(show) {
                                            if (payNowText) payNowText.classList.toggle("d-none", !show);
                                            if (payNowProof) payNowProof.classList.toggle("d-none", !show);
                                            if (bankDetails) bankDetails.style.display = show ? "block" : "none";
                                        }

                                        if (payNowRadio) {
                                            payNowRadio.addEventListener("change", function() {
                                                if (this.checked) togglePayNowElements(true);
                                            });
                                        }

                                        if (pledgeRadio) {
                                            pledgeRadio.addEventListener("change", function() {
                                                if (this.checked) togglePayNowElements(false);
                                            });
                                        }
                                    });
                                </script>

                            </div>


                            <div class="col-md-4 mb-2">
                                <h3 class="text-light text-center p-3" style="background-color: #004476;">Non
                                    Engineering
                                    Students</h3>

                                <form id="circular-endowment-pg-non-eng-form"
                                    action="{{ url('default_one_year_degree') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group" hidden>
                                        <input type="text" name="program_type" value="One Year Undergraduate"
                                            class="form-control">
                                        <label for="degree">Degree:</label>
                                        <input type="text" name="degree" value="Non Engineering"
                                            class="form-control">
                                    </div>

                                    <div class="row p-2 mt-4">
                                        <div class="form-group ml-3">
                                            <input type="checkbox" value="4000000" name="hostelandmessing"
                                                id="circular-endowment-pg-non-eng-hostel">
                                            <label for="circular-endowment-pg-non-eng-hostel">Include mess and hostel
                                                expenses (4,000,000 
                                                PKR)</label>
                                        </div>
                                        <div class="form-group ml-3">
                                            <label for="circular-endowment-pg-non-eng-totalAmount">Total
                                                Amount:</label>
                                            <input type="text"
                                                class="form-control circular-endowment-pg-non-eng-totalAmount"
                                                name="totalAmount" value="30000000" readonly>
                                        </div>
                                    </div>

                                    {{-- Donor Info --}}
                                    <div id="donorInfo">
                                        <h4 class="text-dark mt-4">Donor Information:</h4>
                                        <div class="row">
                                            <div class="col-sm-12 form-group">
                                                <label for="donor_name">Name:</label>
                                                <input type="text" id="donor_name" name="donor_name"
                                                    placeholder="Enter Your Full Name" class="form-control"
                                                    required>
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <label for="donor_email">Email:</label>
                                                <input type="email" id="donor_email" name="donor_email"
                                                    placeholder="Enter your Valid Email" class="form-control"
                                                    required>
                                            </div>
                                            <div class="col-sm-12 form-group">
                                                <label for="phone">Phone:</label>
                                                <input type="number" id="phone" name="phone"
                                                    placeholder="Enter Your Phone# (+92)" class="form-control"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="container-fluid">
                                            <div class="row ml-3">
                                                <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial
                                                    Partner</span>
                                                <div class="col-md-10 mb-3">
                                                    <select class="form-control" name="about_partner"
                                                        id="circular-endowment-pg-non-eng-alumni_select">
                                                        <option value="" disabled selected>Select an option
                                                        </option>
                                                        <option value="Alumni">Alumni</option>
                                                        <option value="Industrial-Partner">Industrial Partner</option>
                                                        <option value="Philanthropist">Philanthropist</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row ml-4 d-none"
                                                id="circular-endowment-pg-non-eng-div-philanthropist">
                                                <div class="col-md-10">
                                                    <label for="">How do you know us?</label>
                                                    <textarea name="philanthropist_text" cols="40" rows="5"></textarea>
                                                </div>
                                            </div>

                                            <div class="row d-none ml-3" id="circular-endowment-pg-non-eng-alumni">
                                                <div class="col-md-10">
                                                    <label for="school_select">Select School</label>
                                                    <select name="school" id="school_select"
                                                        class="form-control">
                                                        <option value="" selected>Select School</option>
                                                        @foreach ($schools as $item)
                                                            <option value="{{ $item->schoolname }}">
                                                                {{ $item->schoolname }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-10">
                                                    <label for="country_select">Select Country</label>
                                                    <select name="country" id="country_select"
                                                        class="form-control">
                                                        @foreach ($countries as $item)
                                                            <option value="{{ $item->countryname }}">
                                                                {{ $item->countryname }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-10">
                                                    <label for="year">Select Year of Graduation</label>
                                                    <select id="year" name="year" class="form-control">
                                                        <option value="" selected>Select Year of Graduation
                                                        </option>
                                                        @for ($i = date('Y'); $i >= 1990; $i--)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-check mb-3 mt-2 ml-3">
                                                <input class="form-check-input ml-3" name="payments_status"
                                                    type="radio"
                                                    id="circular-endowment-pg-non-eng-showBankDetails"
                                                    value="Paynow">
                                                <label class="form-check-label ml-4"
                                                    for="circular-endowment-pg-non-eng-showBankDetails">Paynow</label>

                                                <input class="form-check-input ml-3" name="payments_status"
                                                    type="radio" id="circular-endowment-pg-non-eng-pledge"
                                                    value="make_a_pledge">
                                                <label class="form-check-label ml-4"
                                                    for="circular-endowment-pg-non-eng-pledge">Make a
                                                    Pledge</label>
                                            </div>

                                            <span id="circular-endowment-pg-non-eng-paynow"
                                                class="text-dark d-none mb-2 ml-4">
                                                Attach Screenshots/ Receipt of Fund Transfer
                                            </span>

                                            <div id="circular-endowment-pg-non-eng-paynowProof"
                                                class="form-group d-none ml-3">
                                                <label for="prove">Proof:</label>
                                                <input type="file" id="prove" name="prove"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" name="submit" class="btn btn-primary ml-3">
                                </form>
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const form = document.querySelector('#circular-endowment-pg-non-eng-form');
                                        const hostelCheckbox = form.querySelector('#circular-endowment-pg-non-eng-hostel');
                                        const totalAmountInput = form.querySelector('.circular-endowment-pg-non-eng-totalAmount');

                                        const alumniSelect = form.querySelector('#circular-endowment-pg-non-eng-alumni_select');
                                        const alumniFields = form.querySelector('#circular-endowment-pg-non-eng-alumni');
                                        const philanthropistFields = form.querySelector('#circular-endowment-pg-non-eng-div-philanthropist');

                                        const payNowRadio = form.querySelector('#circular-endowment-pg-non-eng-showBankDetails');
                                        const pledgeRadio = form.querySelector('#circular-endowment-pg-non-eng-pledge');
                                        const payNowText = form.querySelector('#circular-endowment-pg-non-eng-paynow');
                                        const payNowProof = form.querySelector('#circular-endowment-pg-non-eng-paynowProof');

                                        const bankDetails = document.getElementById('bankDetails'); // Optional if present elsewhere

                                        const baseAmount = 30000000; // ✅ matches HTML input value
                                        const hostelAmount = 4000000;

                                        // Update Total Amount
                                        if (hostelCheckbox && totalAmountInput) {
                                            hostelCheckbox.addEventListener("change", function() {
                                                totalAmountInput.value = this.checked ? baseAmount + hostelAmount : baseAmount;
                                            });
                                        }

                                        // Alumni/Philanthropist toggle
                                        if (alumniSelect) {
                                            alumniSelect.addEventListener("change", function() {
                                                const value = this.value;

                                                alumniFields.classList.add("d-none");
                                                philanthropistFields.classList.add("d-none");

                                                if (value === "Alumni") {
                                                    alumniFields.classList.remove("d-none");
                                                } else if (value === "Philanthropist" || value === "Industrial-Partner") {
                                                    philanthropistFields.classList.remove("d-none");
                                                }
                                            });
                                        }

                                        // Paynow / Pledge toggle
                                        function togglePayNowElements(show) {
                                            payNowText.classList.toggle("d-none", !show);
                                            payNowProof.classList.toggle("d-none", !show);
                                            if (bankDetails) bankDetails.style.display = show ? "block" : "none";
                                        }

                                        if (payNowRadio) {
                                            payNowRadio.addEventListener("change", () => togglePayNowElements(true));
                                        }

                                        if (pledgeRadio) {
                                            pledgeRadio.addEventListener("change", () => togglePayNowElements(false));
                                        }
                                    });
                                </script>
                            </div>


                            <div class="col-md-4 mb-2">
                                <form id="circular-endowment-pg-custom-form"
                                    action="{{ url('endowmentsupportoneyear') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <h3 class="text-light text-center p-3" style="background-color: #004476;">
                                        Customize
                                        Your Package</h3>

                                    <input type="text" name="program_type" value="UG One Year" hidden>

                                    <div class="form-group">
                                        <label for="circular-endowment-pg-custom-degree">Select Degree:</label>
                                        <select id="circular-endowment-pg-custom-degree" class="form-control">
                                            <option value="">Select Degree</option>
                                            @foreach ($undergraduate as $degree)
                                                <option value="{{ $degree->fee }}"
                                                    data-degree-name="{{ $degree->degree }}">{{ $degree->degree }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="circular-endowment-pg-custom-no_of_seat">No of Seats:</label>
                                        <input type="number" id="circular-endowment-pg-custom-no_of_seat"
                                            name="seats" value="1" class="form-control" min="1">
                                    </div>

                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input"
                                            id="circular-endowment-pg-custom-hostel" value="275000">
                                        <label class="form-check-label" for="circular-endowment-pg-custom-hostel">
                                            Include mess and hostel expenses (275,000 PKR)
                                        </label>
                                    </div>

                                    <div class="form-group d-none">
                                        <label for="circular-endowment-pg-custom-selectedDegree">Selected
                                            Degree:</label>
                                        <input type="text" id="circular-endowment-pg-custom-selectedDegree"
                                            name="degree" class="form-control" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="circular-endowment-pg-custom-totalAmount">Total Amount:</label>
                                        <input type="text" id="circular-endowment-pg-custom-totalAmount"
                                            name="totalAmount" class="form-control" readonly>
                                    </div>

                                    {{-- Donor Information --}}
                                    <h4 class="text-dark mt-4">Donor Information:</h4>
                                    <div class="form-group">
                                        <label for="donor_name">Name:</label>
                                        <input type="text" id="donor_name" name="donor_name"
                                            placeholder="Enter Your Full Name" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="donor_email">Email:</label>
                                        <input type="email" id="donor_email" name="donor_email"
                                            placeholder="Enter your Valid Email" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="number" id="phone" name="phone"
                                            placeholder="Enter Your Phone# (+92)" class="form-control" required>
                                    </div>

                                    {{-- Alumni/Philanthropist --}}
                                    <div class="form-group">
                                        <label for="circular-endowment-pg-custom-alumniSelect">Are You Alumni or
                                            Industrial Partner</label>
                                        <select class="form-control" name="about_partner"
                                            id="circular-endowment-pg-custom-alumniSelect">
                                            <option value="" disabled selected>Select an option</option>
                                            <option value="Alumni">Alumni</option>
                                            <option value="Industrial-Partner">Industrial Partner</option>
                                            <option value="Philanthropist">Philanthropist</option>
                                        </select>
                                    </div>

                                    <div class="form-group d-none"
                                        id="circular-endowment-pg-custom-philanthropist-div">
                                        <label>How do you know us?</label>
                                        <textarea name="philanthropist_text" rows="4" class="form-control"></textarea>
                                    </div>

                                    <div class="row d-none" id="circular-endowment-pg-custom-alumniFields">
                                        <div class="col-md-12">
                                            <label>Select School</label>
                                            <select name="school" class="form-control">
                                                <option value="">Select School</option>
                                                @foreach ($schools as $item)
                                                    <option value="{{ $item->schoolname }}">{{ $item->schoolname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <label>Select Country</label>
                                            <select name="country" class="form-control">
                                                @foreach ($countries as $item)
                                                    <option value="{{ $item->countryname }}">
                                                        {{ $item->countryname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <label>Select Year of Graduation</label>
                                            <select name="year" class="form-control">
                                                <option value="">Select Year</option>
                                                @for ($i = 1990; $i <= date('Y'); $i++)
                                                    <option value="{{ $i }}">{{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Payment Options --}}
                                    <div class="form-check mt-3">
                                        <input class="form-check-input ml-2" name="payments_status" type="radio"
                                            id="circular-endowment-pg-custom-paynow" value="Paynow">
                                        <label class="form-check-label ml-2"
                                            for="circular-endowment-pg-custom-paynow">Paynow</label>

                                        <input class="form-check-input ml-2" name="payments_status" type="radio"
                                            id="circular-endowment-pg-custom-pledge" value="make_a_pledge">
                                        <label class="form-check-label ml-2"
                                            for="circular-endowment-pg-custom-pledge">Make a Pledge</label>
                                    </div>

                                    <div class="form-group d-none mt-2" id="circular-endowment-pg-custom-proofDiv">
                                        <label for="prove">Attach Screenshot / Receipt:</label>
                                        <input type="file" id="prove" name="prove"
                                            class="form-control">
                                    </div>

                                    {{-- Link --}}
                                    <div class="mt-3 mb-2">
                                        <a href="{{ url('student_stories') }}" class="btn btn-info btn-sm"
                                            style="background-color: #FFA500;">
                                            Nurture a Dream<br>Read student stories and select a story of your choice.
                                        </a>
                                    </div>

                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </form>

                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const degreeSelect = document.getElementById("circular-endowment-pg-custom-degree");
                                        const seatInput = document.getElementById("circular-endowment-pg-custom-no_of_seat");
                                        const hostelCheckbox = document.getElementById("circular-endowment-pg-custom-hostel");
                                        const selectedDegreeInput = document.getElementById("circular-endowment-pg-custom-selectedDegree");
                                        const totalAmountInput = document.getElementById("circular-endowment-pg-custom-totalAmount");

                                        const alumniSelect = document.getElementById("circular-endowment-pg-custom-alumniSelect");
                                        const philanthropistDiv = document.getElementById("circular-endowment-pg-custom-philanthropist-div");
                                        const alumniFields = document.getElementById("circular-endowment-pg-custom-alumniFields");

                                        const paynowRadio = document.getElementById("circular-endowment-pg-custom-paynow");
                                        const pledgeRadio = document.getElementById("circular-endowment-pg-custom-pledge");
                                        const proofDiv = document.getElementById("circular-endowment-pg-custom-proofDiv");

                                        let degreeFee = 0;

                                        function calculateTotal() {
                                            const seatCount = parseInt(seatInput.value) || 1;
                                            const hostelFee = hostelCheckbox.checked ? 275000 * seatCount : 0;
                                            const total = (degreeFee * 4 * seatCount) + hostelFee;
                                            totalAmountInput.value = total;
                                        }

                                        degreeSelect.addEventListener("change", function() {
                                            const selectedOption = this.options[this.selectedIndex];
                                            degreeFee = parseInt(this.value) || 0;
                                            selectedDegreeInput.value = selectedOption.dataset.degreeName || '';
                                            calculateTotal();
                                        });

                                        seatInput.addEventListener("input", calculateTotal);
                                        hostelCheckbox.addEventListener("change", calculateTotal);

                                        alumniSelect.addEventListener("change", function() {
                                            const value = this.value;
                                            philanthropistDiv.classList.toggle("d-none", value !== "Philanthropist" && value !==
                                                "Industrial-Partner");
                                            alumniFields.classList.toggle("d-none", value !== "Alumni");
                                        });

                                        paynowRadio.addEventListener("change", function() {
                                            proofDiv.classList.remove("d-none");
                                        });

                                        pledgeRadio.addEventListener("change", function() {
                                            proofDiv.classList.add("d-none");
                                        });
                                    });
                                </script>
                            </div>

                        </div>
                        <!-- Add more content as needed -->
                    </div>


                    <div id="bankDetails" class="container mt-3" style="display: none;">
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="alert alert-secondary" role="alert">
                                    <h2 class="text-dark text-center">Bank Details</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 ">
                            <div class="col-md-4 mb-1">
                                <div class="alert alert-info" role="alert">
                                    <h2>Non-Zakat Donation</h2>
                                    <p>Account Number: 2292-79173812-01</p>
                                    <p>IBAN Number: PK80HABB0022927917381201</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-1">
                                <div class="alert alert-info" role="alert">
                                    <h2>Zakat Donation</h2>
                                    <p>Account Number: 2292-79173861-03</p>
                                    <p>IBAN Number: PK34HABB0022927917386103</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-1">
                                <div class="alert alert-info" role="alert">
                                    <h2>Endowment Fund Donations</h2>
                                    <p>Account Number: 2292-79173811-01</p>
                                    <p>IBAN Number: PK64HABB0022927917381101</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('template.layouts.footer')
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('templates/js/temp/perpetual_seat_your_name.js') }}"></script>

</body>

</html>
