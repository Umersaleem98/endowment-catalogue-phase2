<!DOCTYPE html>
<html lang="en">

<head>
    <title>One Year</title>
    @include('template.layouts.head')
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/styles/oneyearcss.css') }}">
</head>

<body>

    <div class="super_container">
        <!-- Header -->
        @include('template.layouts.navbar')
        @include('template.layouts.home')

        <div class="events page_section">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col">
                        <div class="section_title text-center">
                            <h1 class="text-dark">Sponsor One Year Education</h1>
                        </div>
                    </div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

            </div>

            <!-- Center Tabs Navigation -->
            <div class="d-flex justify-content-center">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link custom-tab active" id="undergraduate-tab" data-bs-toggle="tab"
                            data-bs-target="#undergraduate" type="button" role="tab" aria-controls="undergraduate"
                            aria-selected="true" style="background-color: #004476; color:white">Undergraduate</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link custom-tab" id="postgraduate-tab" data-bs-toggle="tab"
                            data-bs-target="#postgraduate" type="button" role="tab" aria-controls="postgraduate"
                            aria-selected="false" style="background-color: #004476; color:white">Postgraduate</button>
                    </li>
                </ul>
            </div>

            <!-- Tabs Content -->
            <div class="tab-content" id="myTabContent">
                <!-- Undergraduate Tab -->
                <div class="tab-pane fade show active" id="undergraduate" role="tabpanel"
                    aria-labelledby="undergraduate-tab">
                    <div class="row mt-5">

                        <div class="col-md-4 mb-2">
                            <h3 class="text-light text-center p-3" style="background-color: #004476;">Engineering
                                Students</h3>
                            <form action="{{ route('support.for.one.year') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group" hidden>
                                    <input type="text" name="program_type" value="Defult UG Oneyear"
                                        class="form-control">
                                    <label for="degree">Degree:</label>
                                    <input type="text" name="degree" value="Engineering" class="form-control">
                                    {{-- <input type="text" name="seats" value="1" class="form-control"> --}}

                                </div>
                                <div class="row p-2 mt-4">
                                    <div class="form-group ml-3">
                                        <input type="checkbox" value="275000" name="hostelandmessing" class=""
                                            value="275000">
                                        <label for="ug-eng-AdditionalExpenses">Include mess and hostel expenses (275,000
                                            PKR)</label>
                                    </div>
                                    <div class="form-group ml-3">
                                        <label for="ug-eng-TotalAmount">Total Amount:</label>
                                        <input type="text" class="total_amount form-control" name="totalAmount"
                                            value="350000" readonly>
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
                                                    placeholder="Enter Your Full Name" class="form-control " required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="donor_email">Email:</label>
                                                <input type="email" id="donor_email" name="donor_email"
                                                    placeholder="Enter your Valid Email" class="form-control" required>
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
                                                            <option value="" disabled selected>Select an option
                                                            </option>
                                                            <option value="Alumni" id="ug-eng-Alumni">Alumni</option>
                                                            <option value="Industrial-Partner"
                                                                id="ug-eng-Industrial-Partner">
                                                                Industrial Partner</option>
                                                            <option value="Philanthropist" id="ug-eng-Philanthropist">
                                                                Philanthropist</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row ml-4 d-none" id="ug-eng-div-philanthropist">
                                                    <div class="col-md-10">
                                                        <label for="">How do you know us?</label>
                                                        <textarea name="philanthropist_text" id="" cols="40" rows="5"></textarea>
                                                    </div>
                                                </div>




                                                <div class="row d-none ml-3" id="ug-eng-alumni">
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
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-check mb-3 mt-2 ml-3">
                                            <input class="form-check-input ml-3  ug-eng-paynow-radio"
                                                name="payments_status" type="radio" id="ug-eng-showBankDetails"
                                                value="Paynow">
                                            <label class="form-check-label ml-4"
                                                for="showBankDetailsNonEng">Paynow</label>

                                            <input class="form-check-input ml-3 pledge-radio" name="payments_status"
                                                type="radio" id="ug-eng-pledge" value="make_a_pledge">
                                            <label class="form-check-label ml-4" for="ug-eng-pledge">Make a
                                                Pledge</label>
                                        </div>

                                        <!-- Elements to show/hide -->
                                        <span id="ug-eng-paynow" class="text-dark d-none mb-2 ml-4">
                                            Attach Screenshots/ Receipt of Fund Transfer
                                        </span>

                                        <div id="ug-eng-paynowProof" class="form-group d-none ml-3">
                                            <label for="prove">Proof:</label>
                                            <input type="file" id="prove" name="prove"
                                                class="form-control">
                                        </div>
                                    </div>



                                </div>

                                <input type="submit" name="submit" id="" class="btn btn-primary ml-3">
                            </form>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    // Elements
                                    const hostelCheckbox = document.querySelector('input[name="hostelandmessing"]');
                                    const totalAmountInput = document.querySelector('.total_amount');
                                    const alumniSelect = document.getElementById('alumni_select');
                                    const alumniFields = document.getElementById('ug-eng-alumni');
                                    const philanthropistFields = document.getElementById('ug-eng-div-philanthropist');

                                    const payNowRadio = document.getElementById('ug-eng-showBankDetails');
                                    const pledgeRadio = document.getElementById('ug-eng-pledge'); // ✅ Corrected ID
                                    const payNowText = document.getElementById('ug-eng-paynow');
                                    const payNowProof = document.getElementById('ug-eng-paynowProof');
                                    const bankDetails = document.getElementById('bankDetails');

                                    let baseAmount = 300000;
                                    let hostelAmount = 275000;

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
                        {{-- non engineering  --}}

                        <div class="col-md-4 mb-2">
                            <h3 class="text-light text-center p-3" style="background-color: #004476;">Non Engineering
                                Students</h3>

                            <form id="ug-non-eng-form" action="{{ route('support.for.one.year') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group" hidden>
                                    <input type="text" name="program_type" value="Defult UG Oneyear"
                                        class="form-control">
                                    <label for="degree">Degree:</label>
                                    <input type="text" name="degree" value="Non Engineering"
                                        class="form-control">
                                </div>

                                <div class="row p-2 mt-4">
                                    <div class="form-group ml-3">
                                        <input type="checkbox" value="275000" name="hostelandmessing"
                                            id="ug-non-eng-hostel">
                                        <label for="ug-non-eng-hostel">Include mess and hostel expenses (275,000
                                            PKR)</label>
                                    </div>
                                    <div class="form-group ml-3">
                                        <label for="ug-non-eng-totalAmount">Total Amount:</label>
                                        <input type="text" class="form-control ug-non-eng-totalAmount"
                                            name="totalAmount" value="500000" readonly>
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
                                                placeholder="Enter your Valid Email" class="form-control" required>
                                        </div>
                                        <div class="col-sm-12 form-group">
                                            <label for="phone">Phone:</label>
                                            <input type="number" id="phone" name="phone"
                                                placeholder="Enter Your Phone# (+92)" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="container-fluid">
                                        <div class="row ml-3">
                                            <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial
                                                Partner</span>
                                            <div class="col-md-10 mb-3">
                                                <select class="form-control" name="about_partner"
                                                    id="ug-non-eng-alumni_select">
                                                    <option value="" disabled selected>Select an option</option>
                                                    <option value="Alumni">Alumni</option>
                                                    <option value="Industrial-Partner">Industrial Partner</option>
                                                    <option value="Philanthropist">Philanthropist</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row ml-4 d-none" id="ug-non-eng-div-philanthropist">
                                            <div class="col-md-10">
                                                <label for="">How do you know us?</label>
                                                <textarea name="philanthropist_text" cols="40" rows="5"></textarea>
                                            </div>
                                        </div>

                                        <div class="row d-none ml-3" id="ug-non-eng-alumni">
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
                                                    <option value="" selected>Select Year of Graduation</option>
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
                                                type="radio" id="ug-non-eng-showBankDetails" value="Paynow">
                                            <label class="form-check-label ml-4"
                                                for="ug-non-eng-showBankDetails">Paynow</label>

                                            <input class="form-check-input ml-3" name="payments_status"
                                                type="radio" id="ug-non-eng-pledge" value="make_a_pledge">
                                            <label class="form-check-label ml-4" for="ug-non-eng-pledge">Make a
                                                Pledge</label>
                                        </div>

                                        <span id="ug-non-eng-paynow" class="text-dark d-none mb-2 ml-4">
                                            Attach Screenshots/ Receipt of Fund Transfer
                                        </span>

                                        <div id="ug-non-eng-paynowProof" class="form-group d-none ml-3">
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
                                    const form = document.querySelector('#ug-non-eng-form');
                                    const hostelCheckbox = form.querySelector('#ug-non-eng-hostel');
                                    const totalAmountInput = form.querySelector('.ug-non-eng-totalAmount');

                                    const alumniSelect = form.querySelector('#ug-non-eng-alumni_select');
                                    const alumniFields = form.querySelector('#ug-non-eng-alumni');
                                    const philanthropistFields = form.querySelector('#ug-non-eng-div-philanthropist');

                                    const payNowRadio = form.querySelector('#ug-non-eng-showBankDetails');
                                    const pledgeRadio = form.querySelector('#ug-non-eng-pledge');
                                    const payNowText = form.querySelector('#ug-non-eng-paynow');
                                    const payNowProof = form.querySelector('#ug-non-eng-paynowProof');

                                    const bankDetails = document.getElementById('bankDetails'); // Optional if present elsewhere

                                    const baseAmount = 500000; // ✅ matches HTML input value
                                    const hostelAmount = 275000;

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
                            <form id="ug-custom-form" action="{{ route('custom.endowment.supportone.year') }}"
                                method="post" enctype="multipart/form-data">
                                @csrf

                                <h3 class="text-light text-center p-3" style="background-color: #004476;">Customize
                                    Your Package</h3>

                                <input type="text" name="program_type" value="Custom package UG Oneyear" hidden>

                                {{-- Degree & Seat --}}
                                <div class="form-group">
                                    <label for="ug-custom-degree">Select Degree:</label>
                                    <select id="ug-custom-degree" class="form-control">
                                        <option value="">Select Degree</option>
                                        @foreach ($undergraduate as $degree)
                                            <option value="{{ $degree->fee }}"
                                                data-degree-name="{{ $degree->degree }}">{{ $degree->degree }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="ug-custom-no_of_seat">No of Seats:</label>
                                    <input type="number" id="ug-custom-no_of_seat" name="seats" value="1"
                                        class="form-control" min="1">
                                </div>

                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="ug-custom-hostel"
                                        value="275000">
                                    <label class="form-check-label" for="ug-custom-hostel">
                                        Include mess and hostel expenses (275,000 PKR)
                                    </label>
                                </div>

                                <div class="form-group d-none">
                                    <label for="ug-custom-selectedDegree">Selected Degree:</label>
                                    <input type="text" id="ug-custom-selectedDegree" name="degree"
                                        class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="ug-custom-totalAmount">Total Amount:</label>
                                    <input type="text" id="ug-custom-totalAmount" name="totalAmount"
                                        class="form-control" readonly>
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
                                    <label for="ug-custom-alumniSelect">Are You Alumni or Industrial Partner</label>
                                    <select class="form-control" name="about_partner" id="ug-custom-alumniSelect">
                                        <option value="" disabled selected>Select an option</option>
                                        <option value="Alumni">Alumni</option>
                                        <option value="Industrial-Partner">Industrial Partner</option>
                                        <option value="Philanthropist">Philanthropist</option>
                                    </select>
                                </div>

                                <div class="form-group d-none" id="ug-custom-philanthropist-div">
                                    <label>How do you know us?</label>
                                    <textarea name="philanthropist_text" rows="4" class="form-control"></textarea>
                                </div>

                                <div class="row d-none" id="ug-custom-alumniFields">
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
                                            @for ($i = date('Y'); $i >= 1990; $i--)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                </div>

                                {{-- Payment Options --}}
                                <div class="form-check mt-3">
                                    <input class="form-check-input ml-2" name="payments_status" type="radio"
                                        id="ug-custom-paynow" value="Paynow">
                                    <label class="form-check-label ml-2" for="ug-custom-paynow">Paynow</label>

                                    <input class="form-check-input ml-2" name="payments_status" type="radio"
                                        id="ug-custom-pledge" value="make_a_pledge">
                                    <label class="form-check-label ml-2" for="ug-custom-pledge">Make a Pledge</label>
                                </div>

                                <div class="form-group d-none mt-2" id="ug-custom-proofDiv">
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
                                    const degreeSelect = document.getElementById("ug-custom-degree");
                                    const seatInput = document.getElementById("ug-custom-no_of_seat");
                                    const hostelCheckbox = document.getElementById("ug-custom-hostel");
                                    const selectedDegreeInput = document.getElementById("ug-custom-selectedDegree");
                                    const totalAmountInput = document.getElementById("ug-custom-totalAmount");

                                    const alumniSelect = document.getElementById("ug-custom-alumniSelect");
                                    const philanthropistDiv = document.getElementById("ug-custom-philanthropist-div");
                                    const alumniFields = document.getElementById("ug-custom-alumniFields");

                                    const paynowRadio = document.getElementById("ug-custom-paynow");
                                    const pledgeRadio = document.getElementById("ug-custom-pledge");
                                    const proofDiv = document.getElementById("ug-custom-proofDiv");

                                    let degreeFee = 0;

                                    function calculateTotal() {
                                        const seatCount = parseInt(seatInput.value) || 1;
                                        const hostelFee = hostelCheckbox.checked ? 275000 * seatCount : 0;
                                        const total = (degreeFee * 2 * seatCount) + hostelFee;
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
                <!-- Postgraduate Tab -->

                <div class="tab-pane fade" id="postgraduate" role="tabpanel" aria-labelledby="postgraduate-tab">
                    <div class="row mt-5">

                        {{-- engineering PG --}}
                        <div class="col-md-4 mb-2">
                            <h3 class="text-light text-center p-3" style="background-color: #004476;">Engineering
                                Students</h3>
                            <form id="pg-eng-form" action="{{ route('support.for.one.year') }}" method="post"
                                enctype="multipart/form-data">

                                @csrf
                                <div class="form-group" hidden>
                                    <input type="text" name="program_type" value="Defult PG Oneyear"
                                        class="form-control">
                                    <label for="degree">Degree:</label>
                                    <input type="text" name="degree" value="Engineering" class="form-control">
                                    {{-- <input type="text" name="seats" value="1" class="form-control"> --}}

                                </div>
                                <div class="row p-2 mt-4">
                                    <div class="form-group ml-3">
                                        <input type="checkbox" value="275000" name="hostelandmessing" class=""
                                            value="275000">
                                        <label for="pg-eng-AdditionalExpenses">Include mess and hostel expenses
                                            (275,000
                                            PKR)</label>
                                    </div>
                                    <div class="form-group ml-3">
                                        <label for="pg-eng-TotalAmount">Total Amount:</label>
                                        <input type="text" class="total_amount form-control" name="totalAmount"
                                            value="370000" readonly>
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
                                                    placeholder="Enter Your Full Name" class="form-control " required>
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
                                                            id="pg-eng-alumni_select">
                                                            <option value="" disabled selected>Select an option
                                                            </option>
                                                            <option value="Alumni" id="pg-eng-Alumni">Alumni
                                                            </option>
                                                            <option value="Industrial-Partner"
                                                                id="pg-eng-Industrial-Partner">
                                                                Industrial Partner</option>
                                                            <option value="Philanthropist" id="pg-eng-Philanthropist">
                                                                Philanthropist</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row ml-4 d-none" id="pg-eng-div-philanthropist">
                                                    <div class="col-md-10">
                                                        <label for="">How do you know us?</label>
                                                        <textarea name="philanthropist_text" id="" cols="40" rows="5"></textarea>
                                                    </div>
                                                </div>




                                                <div class="row d-none ml-3" id="pg-eng-alumni">
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
                                                        <select id="year" name="year" class="form-control">
                                                            <option value="" selected>Select Year of Graduation
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
                                            <input class="form-check-input ml-3  pg-eng-paynow-radio"
                                                name="payments_status" type="radio" id="pg-eng-showBankDetails"
                                                value="Paynow">
                                            <label class="form-check-label ml-4"
                                                for="showBankDetailsNonEng">Paynow</label>

                                            <input class="form-check-input ml-3 pledge-radio" name="payments_status"
                                                type="radio" id="pg-eng-pledge" value="make_a_pledge">
                                            <label class="form-check-label ml-4" for="pg-eng-pledge">Make a
                                                Pledge</label>
                                        </div>

                                        <!-- Elements to show/hide -->
                                        <span id="pg-eng-paynow" class="text-dark d-none mb-2 ml-4">
                                            Attach Screenshots/ Receipt of Fund Transfer
                                        </span>

                                        <div id="pg-eng-paynowProof" class="form-group d-none ml-3">
                                            <label for="prove">Proof:</label>
                                            <input type="file" id="prove" name="prove"
                                                class="form-control">
                                        </div>
                                    </div>



                                </div>

                                <input type="submit" name="submit" id="" class="btn btn-primary ml-3">
                            </form>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    // Scope to pg-eng form only
                                    const form = document.querySelector('#pg-eng-form'); // Add this ID to your form tag!

                                    if (!form) return;

                                    // Elements inside pg-eng form
                                    const hostelCheckbox = form.querySelector('input[name="hostelandmessing"]');
                                    const totalAmountInput = form.querySelector('.total_amount');

                                    const alumniSelect = form.querySelector('#pg-eng-alumni_select');
                                    const alumniFields = form.querySelector('#pg-eng-alumni');
                                    const philanthropistFields = form.querySelector('#pg-eng-div-philanthropist');

                                    const payNowRadio = form.querySelector('#pg-eng-showBankDetails');
                                    const pledgeRadio = form.querySelector('#pg-eng-pledge');
                                    const payNowText = form.querySelector('#pg-eng-paynow');
                                    const payNowProof = form.querySelector('#pg-eng-paynowProof');

                                    const bankDetails = document.getElementById('bankDetails'); // This may exist globally

                                    const baseAmount = 300000;
                                    const hostelAmount = 275000;

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
                        {{-- non enginering pg --}}

                        <div class="col-md-4 mb-2">
                            <h3 class="text-light text-center p-3" style="background-color: #004476;">Non Engineering
                                Students</h3>
                            <form id="pg-non-eng-form" action="{{ route('support.for.one.year') }}" method="post"
                                enctype="multipart/form-data">

                                @csrf
                                <div class="form-group" hidden>
                                    <input type="text" name="program_type" value="Defult PG Oneyear"
                                        class="form-control">
                                    <label for="degree">Degree:</label>
                                    <input type="text" name="degree" value="Non Engineering" class="form-control">
                                </div>

                                <div class="row p-2 mt-4">
                                    <div class="form-group ml-3">
                                        <input type="checkbox" value="275000" name="hostelandmessing"
                                            class="">
                                        <label for="pg-non-eng-AdditionalExpenses">Include mess and hostel expenses
                                            (275,000 PKR)</label>
                                    </div>
                                    <div class="form-group ml-3">
                                        <label for="pg-non-eng-TotalAmount">Total Amount:</label>
                                        <input type="text" class="total_amount form-control" name="totalAmount"
                                            value="500000" readonly>
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
                                                    placeholder="Enter Your Full Name" class="form-control" required>
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
                                                            id="pg-non-eng-alumni_select">
                                                            <option value="" disabled selected>Select an option
                                                            </option>
                                                            <option value="Alumni" id="pg-non-eng-Alumni">Alumni
                                                            </option>
                                                            <option value="Industrial-Partner"
                                                                id="pg-non-eng-Industrial-Partner">Industrial Partner
                                                            </option>
                                                            <option value="Philanthropist"
                                                                id="pg-non-eng-Philanthropist">Philanthropist</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row ml-4 d-none" id="pg-non-eng-div-philanthropist">
                                                    <div class="col-md-10">
                                                        <label for="">How do you know us?</label>
                                                        <textarea name="philanthropist_text" id="" cols="40" rows="5"></textarea>
                                                    </div>
                                                </div>

                                                <div class="row d-none ml-3" id="pg-non-eng-alumni">
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
                                                        <select id="year" name="year" class="form-control">
                                                            <option value="" selected>Select Year of Graduation
                                                            </option>
                                                            @for ($i = date('Y'); $i >= 1990; $i--)
                                                                <option value="{{ $i }}">
                                                                    {{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-check mb-3 mt-2 ml-3">
                                            <input class="form-check-input ml-3 pg-non-eng-paynow-radio"
                                                name="payments_status" type="radio" id="pg-non-eng-showBankDetails"
                                                value="Paynow">
                                            <label class="form-check-label ml-4"
                                                for="pg-non-eng-showBankDetails">Paynow</label>

                                            <input class="form-check-input ml-3 pledge-radio" name="payments_status"
                                                type="radio" id="pg-non-eng-pledge" value="make_a_pledge">
                                            <label class="form-check-label ml-4" for="pg-non-eng-pledge">Make a
                                                Pledge</label>
                                        </div>

                                        <span id="pg-non-eng-paynow" class="text-dark d-none mb-2 ml-4">Attach
                                            Screenshots/ Receipt of Fund Transfer</span>

                                        <div id="pg-non-eng-paynowProof" class="form-group d-none ml-3">
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
                                    const form = document.querySelector('#pg-non-eng-form');
                                    if (!form) return;

                                    const hostelCheckbox = form.querySelector('input[name="hostelandmessing"]');
                                    const totalAmountInput = form.querySelector('.total_amount');
                                    const alumniSelect = form.querySelector('#pg-non-eng-alumni_select');
                                    const alumniFields = form.querySelector('#pg-non-eng-alumni');
                                    const philanthropistFields = form.querySelector('#pg-non-eng-div-philanthropist');
                                    const payNowRadio = form.querySelector('#pg-non-eng-showBankDetails');
                                    const pledgeRadio = form.querySelector('#pg-non-eng-pledge');
                                    const payNowText = form.querySelector('#pg-non-eng-paynow');
                                    const payNowProof = form.querySelector('#pg-non-eng-paynowProof');
                                    const bankDetails = document.getElementById('bankDetails'); // optional, global use

                                    const baseAmount = 300000;
                                    const hostelAmount = 275000;

                                    if (hostelCheckbox && totalAmountInput) {
                                        hostelCheckbox.addEventListener("change", function() {
                                            totalAmountInput.value = this.checked ? baseAmount + hostelAmount : baseAmount;
                                        });
                                    }

                                    if (alumniSelect) {
                                        alumniSelect.addEventListener("change", function() {
                                            const selected = this.value;
                                            if (alumniFields) alumniFields.classList.add("d-none");
                                            if (philanthropistFields) philanthropistFields.classList.add("d-none");

                                            if (selected === "Alumni" && alumniFields) alumniFields.classList.remove("d-none");
                                            if ((selected === "Philanthropist" || selected === "Industrial-Partner") &&
                                                philanthropistFields) {
                                                philanthropistFields.classList.remove("d-none");
                                            }
                                        });
                                    }

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
                            <form id="pg-custom-form" action="{{ route('custom.endowment.supportone.year') }}"
                                method="post" enctype="multipart/form-data">
                                @csrf

                                <h3 class="text-light text-center p-3" style="background-color: #004476;">Customize
                                    Your PG Package</h3>

                                <input type="text" name="program_type" value="PG One Year" hidden>

                                {{-- Degree & Seat --}}
                                <div class="form-group">
                                    <label for="pg-custom-degree">Select Degree:</label>
                                    <select id="pg-custom-degree" class="form-control">
                                        <option value="">Select Degree</option>
                                        @foreach ($postgraduate as $degree)
                                            <option value="{{ $degree->fee }}"
                                                data-degree-name="{{ $degree->degree }}">
                                                {{ $degree->degree }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="pg-custom-no_of_seat">No of Seats:</label>
                                    <input type="number" id="pg-custom-no_of_seat" name="seats" value="1"
                                        class="form-control" min="1">
                                </div>

                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input ml-2" id="pg-custom-hostel"
                                        value="275000">
                                    <label class="form-check-label ml-2" for="pg-custom-hostel">
                                        Include mess and hostel expenses (275,000 PKR)
                                    </label>
                                </div>
                                <div class="form-group d-none">
                                    <label for="pg-custom-selectedDegree">Selected Degree:</label>
                                    <input type="text" id="pg-custom-selectedDegree" name="degree"
                                        class="form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="pg-custom-totalAmount">Total Amount:</label>
                                    <input type="text" id="pg-custom-totalAmount" name="totalAmount"
                                        class="form-control" readonly>
                                </div>

                                {{-- Donor Info --}}
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

                                <div class="form-group">
                                    <label for="pg-custom-alumniSelect">Are You Alumni or Industrial Partner</label>
                                    <select class="form-control" name="about_partner" id="pg-custom-alumniSelect">
                                        <option value="" disabled selected>Select an option</option>
                                        <option value="Alumni">Alumni</option>
                                        <option value="Industrial-Partner">Industrial Partner</option>
                                        <option value="Philanthropist">Philanthropist</option>
                                    </select>
                                </div>

                                <div class="form-group d-none" id="pg-custom-philanthropist-div">
                                    <label>How do you know us?</label>
                                    <textarea name="philanthropist_text" rows="4" class="form-control"></textarea>
                                </div>

                                <div class="row d-none" id="pg-custom-alumniFields">
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
                                        id="pg-custom-paynow" value="Paynow">
                                    <label class="form-check-label ml-2" for="pg-custom-paynow">Paynow</label>

                                    <input class="form-check-input ml-2" name="payments_status" type="radio"
                                        id="pg-custom-pledge" value="make_a_pledge">
                                    <label class="form-check-label ml-2" for="pg-custom-pledge">Make a Pledge</label>
                                </div>

                                <div class="form-group d-none mt-2" id="pg-custom-proofDiv">
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

                            {{-- Script --}}
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const degreeSelect = document.getElementById("pg-custom-degree");
                                    const seatInput = document.getElementById("pg-custom-no_of_seat");
                                    const hostelCheckbox = document.getElementById("pg-custom-hostel");
                                    const selectedDegreeInput = document.getElementById("pg-custom-selectedDegree");
                                    const totalAmountInput = document.getElementById("pg-custom-totalAmount");

                                    const alumniSelect = document.getElementById("pg-custom-alumniSelect");
                                    const philanthropistDiv = document.getElementById("pg-custom-philanthropist-div");
                                    const alumniFields = document.getElementById("pg-custom-alumniFields");

                                    const paynowRadio = document.getElementById("pg-custom-paynow");
                                    const pledgeRadio = document.getElementById("pg-custom-pledge");
                                    const proofDiv = document.getElementById("pg-custom-proofDiv");

                                    let degreeFee = 0;

                                    function calculateTotal() {
                                        const seatCount = parseInt(seatInput.value) || 1;
                                        const hostelFee = hostelCheckbox.checked ? 275000 * seatCount : 0;
                                        const total = (degreeFee * 2 * seatCount) + hostelFee;
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

                <br>
                <div id="bankDetails" class="container" style="display: none;">
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

    {{-- 
    <script src="{{ asset('templates/js/temp/oneyear.js') }}"></script> --}}

</body>

</html>
