<!DOCTYPE html>
<html lang="en">

<head>
    <title>Perpetual Seat</title>
    @include('Layouts.templates.head')
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/styles/perpetual_seatcss.css') }}">
</head>

<body>

    <div class="super_container">
        <!-- Header -->
        @include('Layouts.templates.navbar')
        @include('Layouts.templates.home')

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
                            <div class="col-md-5 mb-3">
                                <h3 class="text-light text-center py-3" style="background-color: #004476;">
                                    Engineering Students
                                </h3>

                                <form action="{{ route('default.perpetual.seat.store') }}" method="post"
                                    enctype="multipart/form-data" class="p-3 border rounded shadow-sm bg-white">
                                    @csrf

                                    <!-- Hidden Inputs -->
                                    <div class="d-none">
                                        <input type="text" name="program_type" value="Single Endowment Engineering"
                                            class="form-control">
                                        <label for="degree" class="form-label">Degree:</label>
                                        <input type="text" name="degree" value="Engineering" class="form-control">
                                    </div>

                                    <!-- Total Amount Section -->
                                    <div class="row px-2 mt-4">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="single-endowment-ug-eng-TotalAmount"
                                                    class="form-label">Total Amount:</label>
                                                <input type="text" class="form-control total_amount"
                                                    name="totalAmount" value="6500000" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Donor Info -->
                                    <div id="donorInfo">
                                        <h4 class="text-dark mt-4">Donor Information:</h4>

                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <label for="donor_name" class="form-label">Name:</label>
                                                <input type="text" id="donor_name" name="donor_name"
                                                    placeholder="Enter Your Full Name" class="form-control" required>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="donor_email" class="form-label">Email:</label>
                                                <input type="email" id="donor_email" name="donor_email"
                                                    placeholder="Enter your Valid Email" class="form-control" required>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="phone" class="form-label">Phone:</label>
                                                <input type="number" id="phone" name="phone"
                                                    placeholder="Enter Your Phone# (+92)" class="form-control" required>
                                            </div>
                                        </div>

                                        <!-- Alumni / Partner Section -->
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <span class="text-dark d-block mb-2">Are You Alumni or Industrial
                                                    Partner</span>
                                                <select class="form-control" name="about_partner" id="alumni_select">
                                                    <option value="" disabled selected>Select an option</option>
                                                    <option value="Alumni">Alumni</option>
                                                    <option value="Industrial-Partner">Industrial Partner</option>
                                                    <option value="Philanthropist">Philanthropist</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Philanthropist Section -->
                                        <div class="row d-none" id="single-endowment-ug-eng-div-philanthropist">
                                            <div class="col-12 mb-3">
                                                <label class="form-label">How do you know us?</label>
                                                <textarea name="philanthropist_text" class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>

                                        <!-- Alumni Section -->
                                        <div class="row d-none" id="single-endowment-ug-eng-alumni">
                                            <div class="col-12 mb-3">
                                                <label for="school_select" class="form-label">Select School</label>
                                                <select name="school" id="school_select" class="form-control">
                                                    <option value="" selected>Select School</option>
                                                    @foreach ($schools as $item)
                                                        <option value="{{ $item->schoolname }}">{{ $item->schoolname }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="country_select" class="form-label">Select Country</label>
                                                <select name="country" id="country_select" class="form-control">
                                                    @foreach ($countries as $item)
                                                        <option value="{{ $item->countryname }}">
                                                            {{ $item->countryname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label for="year" class="form-label">Select Year of
                                                    Graduation</label>
                                                <select id="year" name="year" class="form-control">
                                                    <option value="" selected>Select Year of Graduation</option>
                                                    @for ($i = date('Y'); $i >= 1990; $i--)
                                                        <option value="{{ $i }}">{{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Payment Options -->
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <div class="form-check form-check-inline">
                                                    <input
                                                        class="form-check-input single-endowment-ug-eng-paynow-radio"
                                                        name="payments_status" type="radio"
                                                        id="single-endowment-ug-eng-showBankDetails" value="Paynow">
                                                    <label class="form-check-label"
                                                        for="single-endowment-ug-eng-showBankDetails">Paynow</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input pledge-radio"
                                                        name="payments_status" type="radio"
                                                        id="single-endowment-ug-eng-pledge" value="make_a_pledge">
                                                    <label class="form-check-label"
                                                        for="single-endowment-ug-eng-pledge">Make a Pledge</label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Proof Upload -->
                                        <div class="row">
                                            <div class="col-12">
                                                <span id="single-endowment-ug-eng-paynow"
                                                    class="text-dark d-none mb-2 d-block">Attach Screenshot / Receipt
                                                    of Fund Transfer</span>
                                            </div>

                                            <div class="col-12 d-none" id="single-endowment-ug-eng-paynowProof">
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

                                <!-- JavaScript -->
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const alumniSelect = document.getElementById('alumni_select');
                                        const alumniFields = document.getElementById('single-endowment-ug-eng-alumni');
                                        const philanthropistFields = document.getElementById('single-endowment-ug-eng-div-philanthropist');
                                        const payNowRadio = document.getElementById('single-endowment-ug-eng-showBankDetails');
                                        const pledgeRadio = document.getElementById('single-endowment-ug-eng-pledge');
                                        const payNowText = document.getElementById('single-endowment-ug-eng-paynow');
                                        const payNowProof = document.getElementById('single-endowment-ug-eng-paynowProof');
                                        const bankDetails = document.getElementById('bankDetails');

                                        // Alumni & Philanthropist Section Toggle
                                        alumniSelect.addEventListener("change", function() {
                                            alumniFields.classList.add("d-none");
                                            philanthropistFields.classList.add("d-none");

                                            if (this.value === "Alumni") {
                                                alumniFields.classList.remove("d-none");
                                            } else if (this.value === "Philanthropist" || this.value === "Industrial-Partner") {
                                                philanthropistFields.classList.remove("d-none");
                                            }
                                        });

                                        // Toggle PayNow / Pledge Sections
                                        function togglePayNow(show) {
                                            payNowText.classList.toggle("d-none", !show);
                                            payNowProof.classList.toggle("d-none", !show);
                                            if (bankDetails) bankDetails.style.display = show ? "block" : "none";
                                        }

                                        payNowRadio.addEventListener("change", () => togglePayNow(true));
                                        pledgeRadio.addEventListener("change", () => togglePayNow(false));
                                    });
                                </script>
                            </div>

                            <div class="col-md-5 mb-4">
                                <h3 class="text-light text-center py-3 rounded-top"
                                    style="background-color: #004476;">
                                    Non Engineering Students
                                </h3>

                                <form id="single-endowment-ug-non-eng-form"
                                    action="{{ route('default.perpetual.seat.store') }}" method="post"
                                    enctype="multipart/form-data" class="p-3 border rounded shadow-sm bg-white">
                                    @csrf

                                    <!-- Hidden Fields -->
                                    <div class="d-none">
                                        <input type="text" name="program_type"
                                            value="Single Endowment Non Engineering" class="form-control">
                                        <label for="degree">Degree:</label>
                                        <input type="text" name="degree" value="Non Engineering"
                                            class="form-control">
                                    </div>

                                    <!-- Total Amount -->
                                    <div class="mb-4">
                                        <label for="single-endowment-ug-non-eng-totalAmount"
                                            class="form-label fw-semibold">Total Amount:</label>
                                        <input type="text"
                                            class="form-control single-endowment-ug-non-eng-totalAmount"
                                            name="totalAmount" value="6500000" readonly>
                                    </div>

                                    <!-- Donor Information -->
                                    <h5 class="fw-bold text-dark mb-3">Donor Information:</h5>
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="donor_name" class="form-label">Name:</label>
                                            <input type="text" id="donor_name" name="donor_name"
                                                placeholder="Enter your full name" class="form-control" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="donor_email" class="form-label">Email:</label>
                                            <input type="email" id="donor_email" name="donor_email"
                                                placeholder="Enter your valid email" class="form-control" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="phone" class="form-label">Phone:</label>
                                            <input type="number" id="phone" name="phone"
                                                placeholder="Enter your phone number (+92)" class="form-control"
                                                required>
                                        </div>
                                    </div>

                                    <!-- Partner Type -->
                                    <div class="mt-4">
                                        <label for="single-endowment-ug-non-eng-alumni_select"
                                            class="form-label fw-semibold">
                                            Are you Alumni or Industrial Partner?
                                        </label>
                                        <select class="form-select" name="about_partner"
                                            id="single-endowment-ug-non-eng-alumni_select">
                                            <option value="" disabled selected>Select an option</option>
                                            <option value="Alumni">Alumni</option>
                                            <option value="Industrial-Partner">Industrial Partner</option>
                                            <option value="Philanthropist">Philanthropist</option>
                                        </select>
                                    </div>

                                    <!-- Philanthropist Section -->
                                    <div class="mt-3 d-none" id="single-endowment-ug-non-eng-div-philanthropist">
                                        <label for="philanthropist_text" class="form-label">How do you know
                                            us?</label>
                                        <textarea name="philanthropist_text" id="philanthropist_text" class="form-control" rows="4"></textarea>
                                    </div>

                                    <!-- Alumni Section -->
                                    <div class="mt-3 d-none" id="single-endowment-ug-non-eng-alumni">
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
                                        <label class="form-label fw-semibold">Payment Option:</label>
                                        <div class="d-flex align-items-center flex-wrap gap-4">
                                            <div class="form-check">
                                                <input class="form-check-input" name="payments_status" type="radio"
                                                    id="single-endowment-ug-non-eng-showBankDetails" value="Paynow">
                                                <label class="form-check-label"
                                                    for="single-endowment-ug-non-eng-showBankDetails">Pay Now</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" name="payments_status" type="radio"
                                                    id="single-endowment-ug-non-eng-pledge" value="make_a_pledge">
                                                <label class="form-check-label"
                                                    for="single-endowment-ug-non-eng-pledge">Make a Pledge</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Proof Upload -->
                                    <div id="single-endowment-ug-non-eng-paynowProof"
                                        class="d-none border rounded p-3 bg-light mt-3">
                                        <p class="text-dark fw-semibold mb-2">Attach Screenshot / Receipt of Fund
                                            Transfer</p>
                                        <div class="mb-3">
                                            <label for="prove" class="form-label">Proof:</label>
                                            <input type="file" id="prove" name="prove"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="mt-4 mb-3 mx-3">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </form>

                                <!-- Script -->
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const form = document.querySelector('#single-endowment-ug-non-eng-form');
                                        const alumniSelect = form.querySelector('#single-endowment-ug-non-eng-alumni_select');
                                        const alumniFields = form.querySelector('#single-endowment-ug-non-eng-alumni');
                                        const philanthropistFields = form.querySelector('#single-endowment-ug-non-eng-div-philanthropist');
                                        const payNowRadio = form.querySelector('#single-endowment-ug-non-eng-showBankDetails');
                                        const pledgeRadio = form.querySelector('#single-endowment-ug-non-eng-pledge');
                                        const payNowProof = form.querySelector('#single-endowment-ug-non-eng-paynowProof');

                                        // Toggle Alumni & Philanthropist fields
                                        alumniSelect.addEventListener("change", function() {
                                            alumniFields.classList.add("d-none");
                                            philanthropistFields.classList.add("d-none");

                                            if (this.value === "Alumni") {
                                                alumniFields.classList.remove("d-none");
                                            } else if (this.value === "Philanthropist" || this.value === "Industrial-Partner") {
                                                philanthropistFields.classList.remove("d-none");
                                            }
                                        });

                                        // Toggle PayNow proof section
                                        payNowRadio.addEventListener("change", () => {
                                            payNowProof.classList.remove("d-none");
                                        });

                                        pledgeRadio.addEventListener("change", () => {
                                            payNowProof.classList.add("d-none");
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
                            after student</h3>
                        <div class="row mt-5 justify-content-center">
                            <div class="col-md-5 mb-4">
                                <h3 class="text-light text-center py-3 rounded-top"
                                    style="background-color: #004476;">
                                    Engineering Students
                                </h3>

                                <form id="circular-endowment-eng-form"
                                    action="{{ route('default.perpetual.seat.store') }}" method="post"
                                    enctype="multipart/form-data" class="p-3 border rounded shadow-sm bg-white">
                                    @csrf

                                    <!-- Hidden Inputs -->
                                    <div class="d-none">
                                        <input type="text" name="program_type"
                                            value="Circular Endowment Engineering" class="form-control">
                                        <label for="degree">Degree:</label>
                                        <input type="text" name="degree" value="Engineering"
                                            class="form-control">
                                    </div>

                                    <!-- Total Amount -->
                                    <div class="mb-4">
                                        <label for="circular-endowment-eng-TotalAmount"
                                            class="form-label fw-semibold">Total Amount:</label>
                                        <input type="text" class="form-control total_amount" name="totalAmount"
                                            value="26000000" readonly>
                                    </div>

                                    <!-- Donor Information -->
                                    <h5 class="fw-bold text-dark mb-3">Donor Information:</h5>

                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="donor_name" class="form-label">Name:</label>
                                            <input type="text" id="donor_name" name="donor_name"
                                                placeholder="Enter your full name" class="form-control" required>
                                        </div>

                                        <div class="col-12">
                                            <label for="donor_email" class="form-label">Email:</label>
                                            <input type="email" id="donor_email" name="donor_email"
                                                placeholder="Enter your valid email" class="form-control" required>
                                        </div>

                                        <div class="col-12">
                                            <label for="phone" class="form-label">Phone:</label>
                                            <input type="number" id="phone" name="phone"
                                                placeholder="Enter your phone number (+92)" class="form-control"
                                                required>
                                        </div>
                                    </div>

                                    <!-- Partner Type -->
                                    <div class="mt-4">
                                        <label for="circular-endowment-eng-alumni_select"
                                            class="form-label fw-semibold">
                                            Are you Alumni or Industrial Partner?
                                        </label>
                                        <select class="form-select" name="about_partner"
                                            id="circular-endowment-eng-alumni_select">
                                            <option value="" disabled selected>Select an option</option>
                                            <option value="Alumni">Alumni</option>
                                            <option value="Industrial-Partner">Industrial Partner</option>
                                            <option value="Philanthropist">Philanthropist</option>
                                        </select>
                                    </div>

                                    <!-- Philanthropist Section -->
                                    <div class="mt-3 d-none" id="circular-endowment-eng-div-philanthropist">
                                        <label for="philanthropist_text" class="form-label">How do you know
                                            us?</label>
                                        <textarea name="philanthropist_text" id="philanthropist_text" class="form-control" rows="4"></textarea>
                                    </div>

                                    <!-- Alumni Section -->
                                    <div class="mt-3 d-none" id="circular-endowment-eng-alumni">
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
                                        <label class="form-label fw-semibold">Payment Option:</label>
                                        <div class="d-flex align-items-center flex-wrap gap-4">
                                            <div class="form-check">
                                                <input class="form-check-input" name="payments_status" type="radio"
                                                    id="circular-endowment-eng-showBankDetails" value="Paynow">
                                                <label class="form-check-label"
                                                    for="circular-endowment-eng-showBankDetails">Pay Now</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" name="payments_status" type="radio"
                                                    id="circular-endowment-eng-pledge" value="make_a_pledge">
                                                <label class="form-check-label"
                                                    for="circular-endowment-eng-pledge">Make a Pledge</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Proof Upload -->
                                    <div id="circular-endowment-eng-paynowProof"
                                        class="d-none border rounded p-3 bg-light mt-3">
                                        <p class="text-dark fw-semibold mb-2">Attach Screenshot / Receipt of Fund
                                            Transfer</p>
                                        <div class="mb-3">
                                            <label for="prove" class="form-label">Proof:</label>
                                            <input type="file" id="prove" name="prove"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="mt-4 mb-3 mx-3">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </form>

                                <!-- Script -->
                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const form = document.querySelector('#circular-endowment-eng-form');
                                        if (!form) return;

                                        const alumniSelect = form.querySelector('#circular-endowment-eng-alumni_select');
                                        const alumniFields = form.querySelector('#circular-endowment-eng-alumni');
                                        const philanthropistFields = form.querySelector('#circular-endowment-eng-div-philanthropist');
                                        const payNowRadio = form.querySelector('#circular-endowment-eng-showBankDetails');
                                        const pledgeRadio = form.querySelector('#circular-endowment-eng-pledge');
                                        const payNowProof = form.querySelector('#circular-endowment-eng-paynowProof');

                                        // Toggle Alumni / Partner Fields
                                        alumniSelect.addEventListener("change", function() {
                                            alumniFields.classList.add("d-none");
                                            philanthropistFields.classList.add("d-none");

                                            if (this.value === "Alumni") {
                                                alumniFields.classList.remove("d-none");
                                            } else if (this.value === "Philanthropist" || this.value === "Industrial-Partner") {
                                                philanthropistFields.classList.remove("d-none");
                                            }
                                        });

                                        // Toggle PayNow Proof Section
                                        payNowRadio.addEventListener("change", () => {
                                            payNowProof.classList.remove("d-none");
                                        });

                                        pledgeRadio.addEventListener("change", () => {
                                            payNowProof.classList.add("d-none");
                                        });
                                    });
                                </script>
                            </div>


                            <div class="col-md-5 mb-4">
                                <h3 class="text-light text-center py-3" style="background-color: #004476;">
                                    Non Engineering Students
                                </h3>

                                <form id="circular-endowment-ug-non-eng-form"
                                    action="{{ route('default.perpetual.seat.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <!-- Hidden Inputs -->
                                    <div class="d-none">
                                        <input type="text" name="program_type"
                                            value="Circular Endowment Non Engineering" class="form-control">
                                        <label for="degree">Degree:</label>
                                        <input type="text" name="degree" value="Non Engineering"
                                            class="form-control">
                                    </div>

                                    <!-- Total Amount -->
                                    <div class="row px-3 mt-4">
                                        <div class="col-12 mb-3">
                                            <label for="circular-endowment-ug-non-eng-totalAmount"
                                                class="form-label fw-semibold">
                                                Total Amount:
                                            </label>
                                            <input type="text"
                                                class="form-control circular-endowment-ug-non-eng-totalAmount"
                                                name="totalAmount" value="26000000" readonly>
                                        </div>
                                    </div>

                                    <!-- Donor Information -->
                                    <div id="donorInfo">
                                        <h4 class="text-dark mt-4 mb-3 fw-bold">Donor Information</h4>

                                        <div class="mb-3">
                                            <label for="donor_name" class="form-label">Name:</label>
                                            <input type="text" id="donor_name" name="donor_name"
                                                placeholder="Enter Your Full Name" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="donor_email" class="form-label">Email:</label>
                                            <input type="email" id="donor_email" name="donor_email"
                                                placeholder="Enter your Valid Email" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone:</label>
                                            <input type="number" id="phone" name="phone"
                                                placeholder="Enter Your Phone# (+92)" class="form-control" required>
                                        </div>

                                        <!-- Alumni / Partner Section -->
                                        <div class="mt-4">
                                            <label for="circular-endowment-ug-non-eng-alumni_select"
                                                class="form-label">
                                                Are You Alumni or Industrial Partner
                                            </label>
                                            <select class="form-control" name="about_partner"
                                                id="circular-endowment-ug-non-eng-alumni_select">
                                                <option value="" disabled selected>Select an option</option>
                                                <option value="Alumni">Alumni</option>
                                                <option value="Industrial-Partner">Industrial Partner</option>
                                                <option value="Philanthropist">Philanthropist</option>
                                            </select>
                                        </div>

                                        <!-- Philanthropist -->
                                        <div class="row d-none mt-3"
                                            id="circular-endowment-ug-non-eng-div-philanthropist">
                                            <div class="col-md-12">
                                                <label for="philanthropist_text" class="form-label">How do you know
                                                    us?</label>
                                                <textarea name="philanthropist_text" id="philanthropist_text" class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>

                                        <!-- Alumni Fields -->
                                        <div class="row d-none mt-3" id="circular-endowment-ug-non-eng-alumni">
                                            <div class="col-md-12 mb-3">
                                                <label for="school_select" class="form-label">Select School</label>
                                                <select name="school" id="school_select" class="form-control">
                                                    <option value="" selected>Select School</option>
                                                    @foreach ($schools as $item)
                                                        <option value="{{ $item->schoolname }}">
                                                            {{ $item->schoolname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="country_select" class="form-label">Select Country</label>
                                                <select name="country" id="country_select" class="form-control">
                                                    @foreach ($countries as $item)
                                                        <option value="{{ $item->countryname }}">
                                                            {{ $item->countryname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label for="year" class="form-label">Select Year of
                                                    Graduation</label>
                                                <select id="year" name="year" class="form-control">
                                                    <option value="" selected>Select Year of Graduation</option>
                                                    @for ($i = date('Y'); $i >= 1990; $i--)
                                                        <option value="{{ $i }}">{{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Payment Options -->
                                        <div class="mt-4">
                                            <label class="form-label fw-semibold">Payment Options:</label>
                                            <div class="d-flex align-items-center flex-wrap gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="payments_status"
                                                        id="circular-endowment-ug-non-eng-showBankDetails"
                                                        value="Paynow">
                                                    <label class="form-check-label"
                                                        for="circular-endowment-ug-non-eng-showBankDetails">
                                                        Paynow
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="payments_status"
                                                        id="circular-endowment-ug-non-eng-pledge"
                                                        value="make_a_pledge">
                                                    <label class="form-check-label"
                                                        for="circular-endowment-ug-non-eng-pledge">
                                                        Make a Pledge
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Paynow Proof Upload -->
                                            <div id="circular-endowment-ug-non-eng-paynow-section"
                                                class="d-none mt-3">
                                                <p class="text-dark mb-2">Attach Screenshot / Receipt of Fund Transfer
                                                </p>
                                                <div class="mb-3">
                                                    <label for="prove" class="form-label">Proof:</label>
                                                    <input type="file" id="prove" name="prove"
                                                        class="form-control">
                                                </div>
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

                            <!-- ✅ JavaScript -->
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const form = document.querySelector('#circular-endowment-ug-non-eng-form');

                                    const alumniSelect = form.querySelector('#circular-endowment-ug-non-eng-alumni_select');
                                    const alumniFields = form.querySelector('#circular-endowment-ug-non-eng-alumni');
                                    const philanthropistFields = form.querySelector('#circular-endowment-ug-non-eng-div-philanthropist');

                                    const payNowRadio = form.querySelector('#circular-endowment-ug-non-eng-showBankDetails');
                                    const pledgeRadio = form.querySelector('#circular-endowment-ug-non-eng-pledge');
                                    const payNowSection = form.querySelector('#circular-endowment-ug-non-eng-paynow-section');

                                    // ✅ Alumni/Philanthropist Toggle
                                    alumniSelect.addEventListener("change", function() {
                                        alumniFields.classList.add("d-none");
                                        philanthropistFields.classList.add("d-none");

                                        if (this.value === "Alumni") {
                                            alumniFields.classList.remove("d-none");
                                        } else if (this.value === "Philanthropist" || this.value === "Industrial-Partner") {
                                            philanthropistFields.classList.remove("d-none");
                                        }
                                    });

                                    // ✅ Paynow/Pledge Toggle
                                    payNowRadio.addEventListener("change", () => payNowSection.classList.remove("d-none"));
                                    pledgeRadio.addEventListener("change", () => payNowSection.classList.add("d-none"));
                                });
                            </script>

                        </div>
                        <!-- Add more content as needed -->
                    </div>

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
    <script src="{{ asset('templates/js/temp/perpetual_seat_your_name.js') }}"></script>

</body>

</html>
