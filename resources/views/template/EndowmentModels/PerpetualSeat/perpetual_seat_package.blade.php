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
                                style="background-color: #004476; color:white">Single Endowment</button>
                        </li>
                        <li class="nav-item mb-2" role="presentation">
                            <button class="nav-link custom-tab" id="circular-endowment-ug-tab" data-bs-toggle="tab"
                                data-bs-target="#circular-endowment-ug" type="button" role="tab"
                                aria-controls="circular-endowment-ug" aria-selected="false"
                                style="background-color: #004476; color:white">Circular Endowment</button>
                        </li>
                        {{-- <li class="nav-item mb-2" role="presentation">
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
                        </li> --}}

                    </ul>
                </div>

                <!-- Tabs Content -->
                <div class="tab-content" id="myTabContent">
                    <!-- Single Endowment UG Tab Content -->
                    <div class="tab-pane fade show active" id="single-endowment-ug" role="tabpanel"
                        aria-labelledby="single-endowment-ug-tab">
                        <h3 class="text-center text-dark mt-4">Singular Endowment: Establish one Seat in perpetuity
                        </h3>
                        <div class="row mt-5 justify-content-center">
                            <div class="col-md-5 mb-2">
                                <h3 class="text-light text-center p-3" style="background-color: #004476;">Engineering
                                    Students</h3>
                                <form action="{{ route('default.perpetual.seat') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group" hidden>
                                        <input type="text" name="program_type" value="Single Endowment Engineering"
                                            class="form-control">
                                        <label for="degree">Degree:</label>
                                        <input type="text" name="degree" value="Engineering" class="form-control">
                                        {{-- <input type="text" name="seats" value="1" class="form-control"> --}}

                                    </div>
                                    <div class="row p-2 mt-4">
                                        <div class="form-group ml-3">
                                            {{-- <input type="checkbox" value="275000" name="hostelandmessing" class=""
                                                value="4000000">
                                            <label for="single-endowment-ug-eng-AdditionalExpenses">Include mess and
                                                hostel expenses (4,000,000
                                                PKR)</label> --}}
                                        </div>
                                        <div class="form-group ml-3">
                                            <label for="single-endowment-ug-eng-TotalAmount">Total Amount:</label>
                                            <input type="text" class="total_amount form-control" name="totalAmount"
                                                value="6500000 " readonly>
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

                                        let baseAmount = 6500000;
                                        let hostelAmount = 0;

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

                            <div class="col-md-5 mb-2">
                                <h3 class="text-light text-center p-3" style="background-color: #004476;">Non
                                    Engineering
                                    Students</h3>

                                <form id="single-endowment-ug-non-eng-form"
                                    action="{{ route('default.perpetual.seat') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group" hidden>
                                        <input type="text" name="program_type" value="Single Endowment Non Engineering"
                                            class="form-control">
                                        <label for="degree">Degree:</label>
                                        <input type="text" name="degree" value="Non Engineering"
                                            class="form-control">
                                    </div>

                                    <div class="row p-2 mt-4">
                                        <div class="form-group ml-3">
                                            {{-- <input type="checkbox" value="4000000" name="hostelandmessing"
                                                id="single-endowment-ug-non-eng-hostel">
                                            <label for="single-endowment-ug-non-eng-hostel">Include mess and hostel
                                                expenses (480,000
                                                PKR)</label> --}}
                                        </div>
                                        <div class="form-group ml-3">
                                            <label for="single-endowment-ug-non-eng-totalAmount">Total Amount:</label>
                                            <input type="text"
                                                class="form-control single-endowment-ug-non-eng-totalAmount"
                                                name="totalAmount" value="6500000" readonly>

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

                                        const baseAmount = 6500000; // ✅ matches HTML input value
                                        const hostelAmount = 0;

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
                        </div>
                    </div>

                    <!-- Circular Endowment UG Tab Content -->
                    <div class="tab-pane fade" id="circular-endowment-ug" role="tabpanel"
                        aria-labelledby="circular-endowment-ug-tab">
                        <h3 class="text-center text-dark mt-4">Circular Endowment: 4 seats in perpetuity - student
                            after student</h3>
                        <div class="row mt-5 justify-content-center">
                            <div class="col-md-5 mb-2">
                                <h3 class="text-light text-center p-3" style="background-color: #004476;">Engineering
                                    Students</h3>
                                <form id="circular-endowment-eng-form" action="{{ route('default.perpetual.seat') }}"
                                    method="post" enctype="multipart/form-data">

                                    @csrf
                                    <div class="form-group" hidden>
                                        <input type="text" name="program_type" value="Circular Endowment Engineering"
                                            class="form-control">
                                        <label for="degree">Degree:</label>
                                        <input type="text" name="degree" value="Engineering"
                                            class="form-control">
                                        {{-- <input type="text" name="seats" value="1" class="form-control"> --}}

                                    </div>
                                    <div class="row p-2 mt-4">
                                        <div class="form-group ml-3">
                                            {{-- <input type="checkbox" value="275000" name="hostelandmessing"
                                                class="" value="4000000">
                                            <label for="circular-endowment-eng-AdditionalExpenses">Include mess and
                                                hostel expenses
                                                (4,000,000
                                                PKR)</label> --}}
                                        </div>
                                        <div class="form-group ml-3">
                                            <label for="circular-endowment-eng-TotalAmount">Total Amount:</label>
                                            <input type="text" class="total_amount form-control"
                                                name="totalAmount" value="26000000" readonly>
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

                                        const baseAmount = 26000000;
                                        const hostelAmount = 0;

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

                            <div class="col-md-5 mb-2">
                                <h3 class="text-light text-center p-3" style="background-color: #004476;">
                                    Non Engineering Students
                                </h3>

                                <form id="circular-endowment-ug-non-eng-form"
                                    action="{{ route('default.perpetual.seat') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group" hidden>
                                        <input type="text" name="program_type" value="Circular Endowment Non Engineering"
                                            class="form-control">
                                        <label for="degree">Degree:</label>
                                        <input type="text" name="degree" value="Non Engineering"
                                            class="form-control">
                                    </div>

                                    <div class="row p-2 mt-4">
                                        {{-- <div class="form-group ml-3">
                                            <input type="checkbox" value="480000" name="hostelandmessing"
                                                id="circular-endowment-ug-non-eng-hostel">
                                            <label for="circular-endowment-ug-non-eng-hostel">
                                                Include mess and hostel expenses (480,000 PKR)
                                            </label>
                                        </div> --}}
                                        <div class="form-group ml-3">
                                            <label for="circular-endowment-ug-non-eng-totalAmount">Total
                                                Amount:</label>
                                            <input type="text"
                                                class="form-control circular-endowment-ug-non-eng-totalAmount"
                                                name="totalAmount" value="26000000" readonly>
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
                                        const baseAmount = 26000000;
                                        const hostelAmount = 0;

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
