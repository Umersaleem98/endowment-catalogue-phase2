<!DOCTYPE html>
<html lang="en">

<head>
    <title>One Year Endowment Model</title>
    @include('Layouts.templates.head')
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/styles/oneyearcss.css') }}">
</head>

<body>

    <div class="super_container">
        <!-- Header -->
        @include('Layouts.templates.navbar')
        @include('Layouts.templates.home')

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
                        <div class="col-md-4 mb-4">
                            <h3 class="text-light text-center py-3" style="background-color: #004476;">
                                Engineering Students
                            </h3>

                            <form action="{{ route('defult.annual.support.store') }}" method="post"
                                enctype="multipart/form-data" class="px-3 border rounded shadow-sm bg-white">
                                @csrf

                                <!-- Hidden Inputs -->
                                <div class="d-none">
                                    <input type="text" name="program_type" value="Default UG One Year"
                                        class="form-control">
                                    <input type="text" name="degree" value="Engineering" class="form-control">
                                </div>

                                <!-- Total Amount -->
                                <div class="mt-3">
                                    <label for="ug-eng-TotalAmount" class="form-label fw-semibold">Total Amount:</label>
                                    <input type="text" class="form-control total_amount" name="totalAmount"
                                        value="395000" readonly>
                                </div>

                                <!-- Donor Information -->
                                <h4 class="text-dark mt-4">Donor Information:</h4>

                                <div class="mb-3">
                                    <label for="donor_name" class="form-label">Name:</label>
                                    <input type="text" id="donor_name" name="donor_name"
                                        placeholder="Enter your full name" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="donor_email" class="form-label">Email:</label>
                                    <input type="email" id="donor_email" name="donor_email"
                                        placeholder="Enter your valid email" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone:</label>
                                    <input type="number" id="phone" name="phone"
                                        placeholder="Enter your phone number (+92)" class="form-control" required>
                                </div>

                                <!-- Alumni / Partner Selection -->
                                <div class="mb-3">
                                    <label for="alumni_select" class="form-label fw-semibold">Are You Alumni or
                                        Industrial Partner?</label>
                                    <select class="form-select" name="about_partner" id="alumni_select">
                                        <option value="" disabled selected>Select an option</option>
                                        <option value="Alumni">Alumni</option>
                                        <option value="Industrial-Partner">Industrial Partner</option>
                                        <option value="Philanthropist">Philanthropist</option>
                                    </select>
                                </div>

                                <!-- Philanthropist Section -->
                                <div id="ug-eng-div-philanthropist" class="d-none mb-3">
                                    <label for="philanthropist_text" class="form-label">How do you know us?</label>
                                    <textarea name="philanthropist_text" id="philanthropist_text" rows="4" class="form-control"></textarea>
                                </div>

                                <!-- Alumni Section -->
                                <div id="ug-eng-alumni" class="d-none mb-3">
                                    <div class="mb-3">
                                        <label for="school_select" class="form-label">Select School:</label>
                                        <select name="school" id="school_select" class="form-select">
                                            <option value="" selected>Select School</option>
                                            @foreach ($schools as $item)
                                                <option value="{{ $item->schoolname }}">{{ $item->schoolname }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="country_select" class="form-label">Select Country:</label>
                                        <select name="country" id="country_select" class="form-select">
                                            @foreach ($countries as $item)
                                                <option value="{{ $item->countryname }}">{{ $item->countryname }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="year" class="form-label">Select Year of Graduation:</label>
                                        <select id="year" name="year" class="form-select">
                                            <option value="" selected>Select Year</option>
                                            @for ($i = date('Y'); $i >= 1990; $i--)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <!-- Payment Options -->
                                <div class="mt-4">
                                    <label class="form-label fw-semibold text-dark">Payment Option:</label>
                                    <div class="d-flex align-items-center flex-wrap gap-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payments_status"
                                                id="ug-eng-showBankDetails" value="Paynow">
                                            <label class="form-check-label" for="ug-eng-showBankDetails">
                                                Pay Now
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payments_status"
                                                id="ug-eng-pledge" value="make_a_pledge">
                                            <label class="form-check-label" for="ug-eng-pledge">
                                                Make a Pledge
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pay Now Section -->
                                <div id="ug-eng-paynow-section" class="d-none border rounded p-3 bg-light mt-3">
                                    <p class="text-dark fw-semibold mb-2">
                                        Attach Screenshot / Receipt of Fund Transfer
                                    </p>
                                    <div class="mb-3">
                                        <label for="prove" class="form-label">Proof:</label>
                                        <input type="file" id="prove" name="prove" class="form-control"
                                            accept=".png,.jpg,.jpeg,.pdf">
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="mt-4 mb-3 mx-3">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- ✅ Script -->
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const alumniSelect = document.getElementById('alumni_select');
                                const alumniFields = document.getElementById('ug-eng-alumni');
                                const philanthropistFields = document.getElementById('ug-eng-div-philanthropist');

                                const payNowRadio = document.getElementById('ug-eng-showBankDetails');
                                const pledgeRadio = document.getElementById('ug-eng-pledge');
                                const payNowSection = document.getElementById('ug-eng-paynow-section');

                                // ✅ Alumni / Partner / Philanthropist Toggle
                                if (alumniSelect) {
                                    alumniSelect.addEventListener("change", function() {
                                        const selected = this.value;
                                        alumniFields.classList.add("d-none");
                                        philanthropistFields.classList.add("d-none");

                                        if (selected === "Alumni") alumniFields.classList.remove("d-none");
                                        if (selected === "Philanthropist" || selected === "Industrial-Partner")
                                            philanthropistFields.classList.remove("d-none");
                                    });
                                }

                                // ✅ Pay Now / Pledge Toggle
                                function togglePayNow(show) {
                                    payNowSection.classList.toggle("d-none", !show);
                                }

                                if (payNowRadio) {
                                    payNowRadio.addEventListener("change", () => togglePayNow(true));
                                }

                                if (pledgeRadio) {
                                    pledgeRadio.addEventListener("change", () => togglePayNow(false));
                                }
                            });
                        </script>

                        {{-- non engineering  --}}

                        <div class="col-md-4 mb-4">
                            <h3 class="text-light text-center py-3" style="background-color: #004476;">
                                Non-Engineering Students
                            </h3>

                            <form id="ug-non-eng-form" action="{{ route('defult.annual.support.store') }}"
                                method="post" enctype="multipart/form-data"
                                class="px-3 border rounded shadow-sm bg-white">
                                @csrf

                                <!-- Hidden Inputs -->
                                <div class="d-none">
                                    <input type="text" name="program_type" value="Defult UG Oneyear"
                                        class="form-control">
                                    <label for="degree">Degree:</label>
                                    <input type="text" name="degree" value="Non Engineering"
                                        class="form-control">
                                </div>

                                <!-- Total Amount -->
                                <div class="mt-4">
                                    <label for="ug-non-eng-totalAmount" class="form-label fw-semibold">Total Amount
                                        (PKR):</label>
                                    <input type="text" id="ug-non-eng-totalAmount"
                                        class="form-control ug-non-eng-totalAmount" name="totalAmount" value="551000"
                                        readonly>
                                </div>

                                <!-- Donor Info -->
                                <div id="donorInfo" class="mt-4">
                                    <h5 class="text-dark mb-3">Donor Information:</h5>

                                    <div class="mb-3">
                                        <label for="donor_name" class="form-label">Full Name:</label>
                                        <input type="text" id="donor_name" name="donor_name"
                                            placeholder="Enter Your Full Name" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="donor_email" class="form-label">Email:</label>
                                        <input type="email" id="donor_email" name="donor_email"
                                            placeholder="Enter Your Valid Email" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone:</label>
                                        <input type="number" id="phone" name="phone"
                                            placeholder="Enter Your Phone# (+92)" class="form-control" required>
                                    </div>

                                    <!-- Alumni / Industrial Partner Selection -->
                                    <div class="mt-3">
                                        <label class="form-label fw-semibold text-dark">Are You Alumni or Industrial
                                            Partner?</label>
                                        <select class="form-select" name="about_partner"
                                            id="ug-non-eng-alumni_select">
                                            <option value="" disabled selected>Select an option</option>
                                            <option value="Alumni">Alumni</option>
                                            <option value="Industrial-Partner">Industrial Partner</option>
                                            <option value="Philanthropist">Philanthropist</option>
                                        </select>
                                    </div>

                                    <!-- Philanthropist Text -->
                                    <div class="mt-3 d-none" id="ug-non-eng-div-philanthropist">
                                        <label for="philanthropist_text" class="form-label">How do you know
                                            us?</label>
                                        <textarea name="philanthropist_text" id="philanthropist_text" class="form-control" rows="4"></textarea>
                                    </div>

                                    <!-- Alumni Extra Fields -->
                                    <div class="mt-3 d-none" id="ug-non-eng-alumni">
                                        <div class="mb-3">
                                            <label for="school_select" class="form-label">Select School:</label>
                                            <select name="school" id="school_select" class="form-select">
                                                <option value="" selected>Select School</option>
                                                @foreach ($schools as $item)
                                                    <option value="{{ $item->schoolname }}">{{ $item->schoolname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="country_select" class="form-label">Select Country:</label>
                                            <select name="country" id="country_select" class="form-select">
                                                @foreach ($countries as $item)
                                                    <option value="{{ $item->countryname }}">{{ $item->countryname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="year" class="form-label">Select Year of
                                                Graduation:</label>
                                            <select id="year" name="year" class="form-select">
                                                <option value="" selected>Select Year</option>
                                                @for ($i = date('Y'); $i >= 1990; $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Payment Options -->
                                    <div class="mt-4">
                                        <label class="form-label fw-semibold text-dark">Payment Option:</label>
                                        <div class="d-flex align-items-center flex-wrap gap-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payments_status"
                                                    id="ug-non-eng-showBankDetails" value="Paynow">
                                                <label class="form-check-label" for="ug-non-eng-showBankDetails">
                                                    Pay Now
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payments_status"
                                                    id="ug-non-eng-pledge" value="make_a_pledge">
                                                <label class="form-check-label" for="ug-non-eng-pledge">
                                                    Make a Pledge
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Paynow Proof -->
                                    <div id="ug-non-eng-paynow-section"
                                        class="d-none border rounded bg-light p-3 mt-3">
                                        <p class="text-dark fw-semibold mb-2">
                                            Attach Screenshot / Receipt of Fund Transfer
                                        </p>
                                        <label for="prove" class="form-label">Proof:</label>
                                        <input type="file" id="prove" name="prove" class="form-control"
                                            accept=".png,.jpg,.jpeg,.pdf">
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="mt-4 mb-3 mx-3">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </form>

                            <!-- ✅ JavaScript -->
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const form = document.querySelector('#ug-non-eng-form');

                                    const alumniSelect = form.querySelector('#ug-non-eng-alumni_select');
                                    const alumniFields = form.querySelector('#ug-non-eng-alumni');
                                    const philanthropistFields = form.querySelector('#ug-non-eng-div-philanthropist');

                                    const payNowRadio = form.querySelector('#ug-non-eng-showBankDetails');
                                    const pledgeRadio = form.querySelector('#ug-non-eng-pledge');
                                    const payNowSection = form.querySelector('#ug-non-eng-paynow-section');

                                    // Toggle Alumni / Philanthropist Fields
                                    alumniSelect.addEventListener("change", function() {
                                        alumniFields.classList.add("d-none");
                                        philanthropistFields.classList.add("d-none");

                                        if (this.value === "Alumni") {
                                            alumniFields.classList.remove("d-none");
                                        } else if (this.value === "Philanthropist" || this.value === "Industrial-Partner") {
                                            philanthropistFields.classList.remove("d-none");
                                        }
                                    });

                                    // Toggle Paynow / Pledge Proof Section
                                    function togglePayNow(show) {
                                        payNowSection.classList.toggle("d-none", !show);
                                    }

                                    payNowRadio.addEventListener("change", () => togglePayNow(true));
                                    pledgeRadio.addEventListener("change", () => togglePayNow(false));
                                });
                            </script>
                        </div>


                        <div class="col-md-4 mb-2">
                            <form id="ug-custom-form" action="{{ route('custom.annual.support.store') }}"
                                method="post" enctype="multipart/form-data"
                                class="border rounded shadow-sm bg-white">
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
                                <div class="mt-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input ms-2" type="radio" name="payments_status"
                                            id="ug-custom-paynow" value="Paynow">
                                        <label class="form-check-label ms-1 mb-0"
                                            for="ug-custom-paynow">Paynow</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input ms-2" type="radio" name="payments_status"
                                            id="ug-custom-pledge" value="make_a_pledge">
                                        <label class="form-check-label ms-1 mb-0" for="ug-custom-pledge">Make a
                                            Pledge</label>
                                    </div>
                                </div>

                                <div class="mt-3 d-none" id="ug-custom-proofDiv">
                                    <label for="prove" class="form-label fw-semibold">Attach Screenshot /
                                        Receipt:</label>
                                    <input type="file" id="prove" name="prove" class="form-control"
                                        accept=".png,.jpg,.jpeg,.pdf">
                                </div>

                                {{-- Link --}}


                                <div class="mt-4 mb-3 mx-3">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
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
                        <div class="col-md-4 mb-4">
                            <h3 class="text-light text-center py-3" style="background-color: #004476;">
                                Engineering Students
                            </h3>

                            <form id="pg-eng-form" action="{{ route('defult.annual.support.store') }}"
                                method="post" enctype="multipart/form-data"
                                class="p-3 border rounded shadow-sm bg-white">
                                @csrf

                                <!-- Hidden Inputs -->
                                <div class="d-none">
                                    <input type="text" name="program_type" value="Defult PG Oneyear"
                                        class="form-control">
                                    <input type="text" name="degree" value="Engineering" class="form-control">
                                </div>

                                <!-- Total Amount -->
                                <div class="mb-4">
                                    <label for="pg-eng-TotalAmount" class="form-label fw-semibold">Total
                                        Amount:</label>
                                    <input type="text" id="pg-eng-TotalAmount" class="form-control total_amount"
                                        name="totalAmount" value="259000" readonly>
                                </div>

                                <!-- Donor Info -->
                                <div id="donorInfo">
                                    <h4 class="text-dark mb-3">Donor Information:</h4>

                                    <div class="mb-3">
                                        <label for="donor_name" class="form-label">Name:</label>
                                        <input type="text" id="donor_name" name="donor_name" class="form-control"
                                            placeholder="Enter Your Full Name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="donor_email" class="form-label">Email:</label>
                                        <input type="email" id="donor_email" name="donor_email"
                                            class="form-control" placeholder="Enter your Valid Email" required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="phone" class="form-label">Phone:</label>
                                        <input type="number" id="phone" name="phone" class="form-control"
                                            placeholder="Enter Your Phone# (+92)" required>
                                    </div>

                                    <!-- Alumni / Partner -->
                                    <div class="mb-3">
                                        <label for="pg-eng-alumni_select" class="form-label fw-semibold">
                                            Are You Alumni or Industrial Partner?
                                        </label>
                                        <select class="form-select" name="about_partner" id="pg-eng-alumni_select">
                                            <option value="" disabled selected>Select an option</option>
                                            <option value="Alumni">Alumni</option>
                                            <option value="Industrial-Partner">Industrial Partner</option>
                                            <option value="Philanthropist">Philanthropist</option>
                                        </select>
                                    </div>

                                    <!-- Philanthropist -->
                                    <div class="mb-3 d-none" id="pg-eng-div-philanthropist">
                                        <label for="philanthropist_text" class="form-label">How do you know
                                            us?</label>
                                        <textarea name="philanthropist_text" id="philanthropist_text" class="form-control" rows="4"></textarea>
                                    </div>

                                    <!-- Alumni Info -->
                                    <div class="d-none" id="pg-eng-alumni">
                                        <div class="mb-3">
                                            <label for="school_select" class="form-label">Select School</label>
                                            <select name="school" id="school_select" class="form-select">
                                                <option value="" selected>Select School</option>
                                                @foreach ($schools as $item)
                                                    <option value="{{ $item->schoolname }}">{{ $item->schoolname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="country_select" class="form-label">Select Country</label>
                                            <select name="country" id="country_select" class="form-select">
                                                @foreach ($countries as $item)
                                                    <option value="{{ $item->countryname }}">{{ $item->countryname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="year" class="form-label">Select Year of Graduation</label>
                                            <select id="year" name="year" class="form-select">
                                                <option value="" selected>Select Year of Graduation</option>
                                                @for ($i = date('Y'); $i >= 1990; $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Payment Options -->
                                    <div class="mt-4 mb-3">
                                        <label class="form-label fw-semibold">Payment Option:</label>
                                        <div class="d-flex flex-wrap align-items-center gap-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payments_status"
                                                    id="pg-eng-showBankDetails" value="Paynow">
                                                <label class="form-check-label" for="pg-eng-showBankDetails">Pay
                                                    Now</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payments_status"
                                                    id="pg-eng-pledge" value="make_a_pledge">
                                                <label class="form-check-label" for="pg-eng-pledge">Make a
                                                    Pledge</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pay Now Proof -->
                                    <div id="pg-eng-paynow-section" class="d-none border rounded p-3 bg-light">
                                        <p class="text-dark fw-semibold mb-2">
                                            Attach Screenshot / Receipt of Fund Transfer
                                        </p>

                                        <div class="mb-3">
                                            <label for="prove" class="form-label">Proof:</label>
                                            <input type="file" id="prove" name="prove"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-3 mx-3">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>

                            </form>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const form = document.querySelector('#pg-eng-form');
                                if (!form) return;

                                const alumniSelect = form.querySelector('#pg-eng-alumni_select');
                                const alumniFields = form.querySelector('#pg-eng-alumni');
                                const philanthropistFields = form.querySelector('#pg-eng-div-philanthropist');
                                const payNowRadio = form.querySelector('#pg-eng-showBankDetails');
                                const pledgeRadio = form.querySelector('#pg-eng-pledge');
                                const payNowSection = form.querySelector('#pg-eng-paynow-section');

                                // Toggle Alumni/Philanthropist Sections
                                alumniSelect.addEventListener("change", function() {
                                    alumniFields.classList.add("d-none");
                                    philanthropistFields.classList.add("d-none");

                                    if (this.value === "Alumni") alumniFields.classList.remove("d-none");
                                    if (this.value === "Philanthropist" || this.value === "Industrial-Partner")
                                        philanthropistFields.classList.remove("d-none");
                                });

                                // Show/Hide Pay Now Proof Section
                                function togglePayNow(show) {
                                    payNowSection.classList.toggle("d-none", !show);
                                }

                                payNowRadio.addEventListener("change", () => togglePayNow(true));
                                pledgeRadio.addEventListener("change", () => togglePayNow(false));
                            });
                        </script>

                        {{-- non enginering pg --}}
                        <div class="col-md-4 mb-4">
                            <h3 class="text-light text-center py-3" style="background-color:#004476;">
                                Non-Engineering Students
                            </h3>

                            <form id="pg-non-eng-form" action="{{ route('defult.annual.support.store') }}"
                                method="post" enctype="multipart/form-data"
                                class="p-3 border rounded shadow-sm bg-white">
                                @csrf

                                <!-- Hidden Inputs -->
                                <div class="d-none">
                                    <input type="text" name="program_type" value="Defult PG Oneyear"
                                        class="form-control">
                                    <input type="text" name="degree" value="Non Engineering"
                                        class="form-control">
                                </div>

                                <!-- Total Amount -->
                                <div class="mb-4">
                                    <label for="pg-non-eng-TotalAmount" class="form-label fw-semibold">Total
                                        Amount:</label>
                                    <input type="text" id="pg-non-eng-TotalAmount"
                                        class="form-control total_amount" name="totalAmount" value="305000" readonly>
                                    <small class="text-success">Only for Social Sciences</small>
                                </div>

                                <!-- Donor Information -->
                                <h4 class="text-dark mb-3">Donor Information:</h4>

                                <div class="mb-3">
                                    <label for="donor_name" class="form-label">Name:</label>
                                    <input type="text" id="donor_name" name="donor_name" class="form-control"
                                        placeholder="Enter Your Full Name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="donor_email" class="form-label">Email:</label>
                                    <input type="email" id="donor_email" name="donor_email" class="form-control"
                                        placeholder="Enter your Valid Email" required>
                                </div>

                                <div class="mb-4">
                                    <label for="phone" class="form-label">Phone:</label>
                                    <input type="number" id="phone" name="phone" class="form-control"
                                        placeholder="Enter Your Phone# (+92)" required>
                                </div>

                                <!-- Alumni / Partner Selection -->
                                <div class="mb-3">
                                    <label for="pg-non-eng-alumni_select" class="form-label fw-semibold">
                                        Are You Alumni or Industrial Partner?
                                    </label>
                                    <select class="form-select" name="about_partner" id="pg-non-eng-alumni_select">
                                        <option value="" disabled selected>Select an option</option>
                                        <option value="Alumni">Alumni</option>
                                        <option value="Industrial-Partner">Industrial Partner</option>
                                        <option value="Philanthropist">Philanthropist</option>
                                    </select>
                                </div>

                                <!-- Philanthropist -->
                                <div class="mb-3 d-none" id="pg-non-eng-div-philanthropist">
                                    <label for="philanthropist_text" class="form-label">How do you know us?</label>
                                    <textarea name="philanthropist_text" id="philanthropist_text" class="form-control" rows="4"></textarea>
                                </div>

                                <!-- Alumni Info -->
                                <div class="d-none" id="pg-non-eng-alumni">
                                    <div class="mb-3">
                                        <label for="school_select" class="form-label">Select School</label>
                                        <select name="school" id="school_select" class="form-select">
                                            <option value="" selected>Select School</option>
                                            @foreach ($schools as $item)
                                                <option value="{{ $item->schoolname }}">{{ $item->schoolname }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="country_select" class="form-label">Select Country</label>
                                        <select name="country" id="country_select" class="form-select">
                                            @foreach ($countries as $item)
                                                <option value="{{ $item->countryname }}">{{ $item->countryname }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="year" class="form-label">Select Year of Graduation</label>
                                        <select id="year" name="year" class="form-select">
                                            <option value="" selected>Select Year of Graduation</option>
                                            @for ($i = date('Y'); $i >= 1990; $i--)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>

                                <!-- Payment Options -->
                                <div class="mt-4 mb-3">
                                    <label class="form-label fw-semibold">Payment Option:</label>
                                    <div class="d-flex flex-wrap align-items-center gap-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payments_status"
                                                id="pg-non-eng-showBankDetails" value="Paynow">
                                            <label class="form-check-label" for="pg-non-eng-showBankDetails">Pay
                                                Now</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payments_status"
                                                id="pg-non-eng-pledge" value="make_a_pledge">
                                            <label class="form-check-label" for="pg-non-eng-pledge">Make a
                                                Pledge</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pay Now Proof -->
                                <div id="pg-non-eng-paynow-section" class="d-none border rounded p-3 bg-light">
                                    <p class="text-dark fw-semibold mb-2">
                                        Attach Screenshot / Receipt of Fund Transfer
                                    </p>
                                    <div class="mb-3">
                                        <label for="prove" class="form-label">Proof:</label>
                                        <input type="file" id="prove" name="prove" class="form-control"
                                            accept=".png,.jpg,.jpeg,.pdf">
                                    </div>
                                </div>

                                <div class="mt-4 mb-3 mx-3">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>

                            </form>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const form = document.querySelector('#pg-non-eng-form');
                                if (!form) return;

                                const alumniSelect = form.querySelector('#pg-non-eng-alumni_select');
                                const alumniFields = form.querySelector('#pg-non-eng-alumni');
                                const philanthropistFields = form.querySelector('#pg-non-eng-div-philanthropist');
                                const payNowRadio = form.querySelector('#pg-non-eng-showBankDetails');
                                const pledgeRadio = form.querySelector('#pg-non-eng-pledge');
                                const payNowSection = form.querySelector('#pg-non-eng-paynow-section');

                                // Toggle Alumni/Philanthropist visibility
                                alumniSelect.addEventListener("change", function() {
                                    alumniFields.classList.add("d-none");
                                    philanthropistFields.classList.add("d-none");

                                    if (this.value === "Alumni") alumniFields.classList.remove("d-none");
                                    if (this.value === "Philanthropist" || this.value === "Industrial-Partner")
                                        philanthropistFields.classList.remove("d-none");
                                });

                                // Show/Hide proof upload section
                                function togglePayNow(show) {
                                    payNowSection.classList.toggle("d-none", !show);
                                }

                                payNowRadio.addEventListener("change", () => togglePayNow(true));
                                pledgeRadio.addEventListener("change", () => togglePayNow(false));
                            });
                        </script>


                        <div class="col-md-4 mb-2">
                            <form id="pg-custom-form" action="{{ route('custom.annual.support.store') }}"
                                method="post" enctype="multipart/form-data"
                                class="border rounded shadow-sm bg-white">
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
                                    <label class="form-check-label ml-4 mb-3" for="pg-custom-hostel">
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
                                <div class="mt-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input ms-2" type="radio" name="payments_status"
                                            id="pg-custom-paynow" value="Paynow">
                                        <label class="form-check-label ms-1 mb-0"
                                            for="pg-custom-paynow">Paynow</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input ms-2" type="radio" name="payments_status"
                                            id="pg-custom-pledge" value="make_a_pledge">
                                        <label class="form-check-label ms-1 mb-0" for="pg-custom-pledge">Make a
                                            Pledge</label>
                                    </div>
                                </div>

                                <div class="mt-3 d-none" id="pg-custom-proofDiv">
                                    <label for="prove" class="form-label fw-semibold">Attach Screenshot /
                                        Receipt:</label>
                                    <input type="file" id="prove" name="prove" class="form-control"
                                        accept=".png,.jpg,.jpeg,.pdf">
                                </div>


                                {{-- Link --}}


                                <div class="mt-4 mb-3 mx-3">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
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
                @include('pages.Home.EndowmentModels.bankdetail')
            </div>


        </div>
    </div>

    <!-- Footer -->
    @include('Layouts.templates.footer')
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    {{-- 
    <script src="{{ asset('templates/js/temp/oneyear.js') }}"></script> --}}

</body>

</html>
