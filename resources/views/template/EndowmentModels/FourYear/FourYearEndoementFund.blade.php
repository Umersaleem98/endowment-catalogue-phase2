<!DOCTYPE html>
<html lang="en">

<head>
    <title>Four Year</title>
    @include('template.layouts.head')
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/styles/fouryearcss.css') }}">
</head>

<body>

    <div class="super_container">
        <!-- Header -->
        @include('template.layouts.navbar')
        @include('template.layouts.home')

        <div class="events page_section">
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row mb-2">

                    <div class="col">
                        <div class="section_title text-center">
                            <h1 class="text-dark">Adopt a Scholar</h1>
                        </div>
                    </div>
                </div>

                <!-- Center Tabs Navigation -->
                <div class="d-flex justify-content-center">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item mb-2" role="presentation">
                            <button class="nav-link custom-tab active" id="undergraduate-tab" data-bs-toggle="tab"
                                data-bs-target="#undergraduate" type="button" role="tab"
                                aria-controls="undergraduate" aria-selected="true"
                                style="background-color: #004476 ; color:white">Undergraduate</button>
                        </li>
                        <li class="nav-item mb-2" role="presentation">
                            <button class="nav-link custom-tab" id="postgraduate-tab" data-bs-toggle="tab"
                                data-bs-target="#postgraduate" type="button" role="tab"
                                aria-controls="postgraduate" aria-selected="false"
                                style="background-color: #004476; color:white">Postgraduate</button>
                        </li>
                    </ul>
                </div>

                <!-- Tabs Content -->
                <div class="tab-content" id="myTabContent">
                    <!-- Undergraduate Tab -->
                    <div class="tab-pane fade show active " id="undergraduate" role="tabpanel"
                        aria-labelledby="undergraduate-tab">
                        <div class="row ">
                            <div class="col-12">
                                <!-- Add your undergraduate content here -->
                                <!-- Example form structure -->

                                <div class="tab-pane fade show active" id="undergraduate" role="tabpanel"
                                    aria-labelledby="undergraduate-tab">
                                    <div class="row mt-5">
                                        <div class="col-md-4 mb-2">
                                            <h3 class="text-light text-center p-3" style="background-color: #004476;">
                                                Engineering Students</h3>
                                            <form action="{{ url('default_package_full_degree') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group" hidden>
                                                    <label for="pgDegree">Degree:</label>
                                                    <input type="text" name="program_type"
                                                        value="Single_endowment_UG" class="form-control">
                                                    <input type="text" name="degree" value="Engineering"
                                                        class="form-control">
                                                </div>
                                                <div class="row p-2 mt-4">
                                                    <div class="form-group ml-3">
                                                        <input type="checkbox" class="mess_checkbox" value="1100000">
                                                        <label for="pgAdditionalExpenses">Include mess and hostel
                                                            expenses (1,100,000 PKR)</label>
                                                    </div>
                                                    <div class="form-group ml-3">
                                                        <label for="pgTotalAmount">Total Amount:</label>
                                                        <input type="text" class="total_amount form-control"
                                                            name="totalAmount" value="1500000" readonly>
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
                                                                    class="form-control " required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="donor_email">Email:</label>
                                                                <input type="email" id="donor_email"
                                                                    name="donor_email" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="phone">Phone:</label>
                                                                <input type="number" id="phone" name="phone"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="container-fluid">
                                                                <div class="row ml-3">
                                                                    <span class="ml-4 text-dark mb-2">Are You Alumni or
                                                                        Industrial Partner</span>
                                                                    <div class="col-md-10 mb-3">
                                                                        <select class="form-control"
                                                                            name="about_partner" id="alumni_select">
                                                                            <option value="" disabled selected>
                                                                                Select an option</option>
                                                                            <option value="Alumni">Alumni</option>
                                                                            <option value="Industrial-Partner">
                                                                                Industrial Partner</option>
                                                                            <option value="Philanthropist"
                                                                                id="Philanthropist_oneyear_eng_ug">
                                                                                Philanthropist</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row ml-4 d-none"
                                                                    id="philanthropist_oneyear_eng_ug_div">
                                                                    <div class="col-md-10">
                                                                        <label for="">How do you know
                                                                            us?</label>
                                                                        <textarea name="philanthropist_text" id="knowledge" cols="40" rows="5" class="form-control"></textarea>
                                                                    </div>
                                                                </div>

                                                                <script>
                                                                    document.getElementById('alumni_select').addEventListener('change', function() {
                                                                        var selectedValue = this.value;
                                                                        var philanthropistDiv = document.getElementById('philanthropist_oneyear_eng_ug_div');

                                                                        // Show the div if "Industrial Partner" or "Philanthropist" is selected
                                                                        if (selectedValue === 'Industrial-Partner' || selectedValue === 'Philanthropist') {
                                                                            philanthropistDiv.classList.remove('d-none');
                                                                        } else {
                                                                            philanthropistDiv.classList.add('d-none');
                                                                        }
                                                                    });
                                                                </script>



                                                                <div class="row d-none ml-3" id="alumni">
                                                                    <div class="col-md-10">
                                                                        <label for="school_select">Select
                                                                            School</label>
                                                                        <select name="school" id="school_select"
                                                                            class="form-control">
                                                                            <option value="" selected>Select
                                                                                School</option>
                                                                            @foreach ($schools as $item)
                                                                                <option
                                                                                    value="{{ $item->schoolname }}">
                                                                                    {{ $item->schoolname }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <label for="country_select">Select
                                                                            Country</label>
                                                                        <select name="country" id="country_select"
                                                                            class="form-control">
                                                                            @foreach ($countries as $item)
                                                                                <option
                                                                                    value="{{ $item->countryname }}">
                                                                                    {{ $item->countryname }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <label for="year"
                                                                            class="form-label">Select Year of
                                                                            Graduation</label>
                                                                        <select id="year" name="year"
                                                                            class="form-control">
                                                                            <option value="" selected>Select Year
                                                                                of Graduation
                                                                            </option>
                                                                            @for ($i = 1990; $i <= date('Y'); $i++)
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
                                                            <input class="form-check-input ml-3 paynow-radio"
                                                                name="payments_status" type="radio"
                                                                id="showBankDetailsNonEng" value="Paynow">
                                                            <label class="form-check-label ml-4"
                                                                for="showBankDetailsNonEng">Paynow</label>
                                                            <input class="form-check-input ml-3 pledge-radio"
                                                                name="payments_status" type="radio"
                                                                id="pledgeNonEng" value="make_a_pledge">
                                                            <label class="form-check-label ml-4"
                                                                for="pledgeNonEng">Make a Pledge</label>
                                                        </div>
                                                        <span class="text-dark mb-2 ml-4">Attach Screenshots/ Receipt
                                                            of Fund Transfer</span>

                                                        <div class="form-group ml-3">
                                                            <label for="prove">Proof:</label>
                                                            <input type="file" id="prove" name="prove"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="submit" name="submit" id=""
                                                    class="btn btn-primary">
                                            </form>


                                        </div>

                                        <div class="col-md-4 mb-2">
                                            <h3 class="text-light text-center p-3" style="background-color: #004476;">
                                                Non Engineering Students</h3>
                                            <form action="{{ url('default_package_full_degree') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group" hidden>
                                                    <label for="pgDegree">Degree:</label>
                                                    <input type="text" name="program_type"
                                                        value="Single_endowment_UG" class="form-control">
                                                    <input type="text" name="degree" value="Non Engineering"
                                                        class="form-control">
                                                </div>
                                                <div class="row p-2 mt-4">
                                                    <div class="form-group ml-3">
                                                        <input type="checkbox" class="mess_checkbox" value="1100000">
                                                        <label for="pgAdditionalExpenses">Include mess and hostel
                                                            expenses (1,100,000 PKR)</label>
                                                    </div>
                                                    <div class="form-group ml-3">
                                                        <label for="pgTotalAmount">Total Amount:</label>
                                                        <input type="text" class="total_amount form-control"
                                                            name="totalAmount" value="2000000" readonly>
                                                    </div>
                                                </div>

                                                {{-- Donor info --}}
                                                <div id="donorInfo">
                                                    <h4 class="text-dark mt-4">Donor Information:</h4>

                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="donor_name">Name:</label>
                                                                <input type="text" id="donor_name"
                                                                    name="donor_name" class="form-control " required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="donor_email">Email:</label>
                                                                <input type="email" id="donor_email"
                                                                    name="donor_email" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="phone">Phone:</label>
                                                                <input type="number" id="phone" name="phone"
                                                                    class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="container-fluid">
                                                                <div class="row ml-3">
                                                                    <span class="ml-4 text-dark mb-2">Are You Alumni or
                                                                        Industrial Partner</span>
                                                                    <div class="col-md-10 mb-3">
                                                                        <select class="form-control"
                                                                            id="alumni_select_neng">
                                                                            <option value="" disabled selected>
                                                                                Select an option</option>
                                                                            <option value="Alumni" id="Alumni">
                                                                                Alumni</option>
                                                                            <option value="Industrial-Partner"
                                                                                id="ip_oneyear_noneng_ug">Industrial
                                                                                Partner</option>
                                                                            <option value="Philanthropist"
                                                                                id="Philanthropist_oneyear_noneng_ug">
                                                                                Philanthropist</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row ml-4 d-none"
                                                                    id="philanthropist_oneyear_noneng_ug_div">
                                                                    <div class="col-md-10">
                                                                        <label for="">How do you know
                                                                            us?</label>
                                                                        <textarea name="philanthropist_text" id="knowledge" cols="40" rows="5" class="form-control"></textarea>
                                                                    </div>
                                                                </div>

                                                                <script>
                                                                    document.getElementById('alumni_select_neng').addEventListener('change', function() {
                                                                        var selectedValue = this.value;
                                                                        var philanthropistDiv = document.getElementById('philanthropist_oneyear_noneng_ug_div');

                                                                        // Show the div if "Industrial Partner" or "Philanthropist" is selected
                                                                        if (selectedValue === 'Industrial-Partner' || selectedValue === 'Philanthropist') {
                                                                            philanthropistDiv.classList.remove('d-none');
                                                                        } else {
                                                                            philanthropistDiv.classList.add('d-none');
                                                                        }
                                                                    });
                                                                </script>
                                                                <div class="row d-none ml-3" id="alumni-neng">
                                                                    <div class="col-md-10">
                                                                        <label for="school_select">Select
                                                                            School</label>
                                                                        <select name="school" id="school_select"
                                                                            class="form-control">
                                                                            <option value="" selected>Select
                                                                                School</option>
                                                                            @foreach ($schools as $item)
                                                                                <option
                                                                                    value="{{ $item->schoolname }}">
                                                                                    {{ $item->schoolname }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <label for="country_select">Select
                                                                            Country</label>
                                                                        <select name="country" id="country_select"
                                                                            class="form-control">
                                                                            @foreach ($countries as $item)
                                                                                <option
                                                                                    value="{{ $item->countryname }}">
                                                                                    {{ $item->countryname }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <label for="year"
                                                                            class="form-label">Select Year of
                                                                            Graduation</label>
                                                                        <select id="year" name="year"
                                                                            class="form-control">
                                                                            <option value="" selected>Select Year
                                                                                of Graduation
                                                                            </option>
                                                                            @for ($i = 1990; $i <= date('Y'); $i++)
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
                                                            <input class="form-check-input ml-3 paynow-radio"
                                                                name="payments_status" type="radio"
                                                                id="showBankDetailsNonEng" value="Paynow">
                                                            <label class="form-check-label ml-4"
                                                                for="showBankDetailsNonEng">Paynow</label>
                                                            <input class="form-check-input ml-3 pledge-radio"
                                                                name="payments_status" type="radio"
                                                                id="pledgeNonEng" value="make_a_pledge">
                                                            <label class="form-check-label ml-4"
                                                                for="pledgeNonEng">Make a Pledge</label>
                                                        </div>
                                                        <span class="text-dark mb-2 ml-4">Attach Screenshots/ Receipt
                                                            of Fund Transfer</span>

                                                        <div class="form-group ml-3">
                                                            <label for="prove">Proof:</label>
                                                            <input type="file" id="prove" name="prove"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="submit" name="submit" id=""
                                                    class="btn btn-primary">
                                            </form>

                                        </div>

                                        <div class="col-md-4 mb-2">
                                            <h3 class="text-light text-center p-3" style="background-color: #004476;">
                                                Customize Your Package</h3>
                                            <form action="{{ url('endowmentsupportentireyear') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf


                                                <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="text" name="program_type" id=""
                                                            value="UG_Four_year" hidden>
                                                        <div class="form-group">
                                                            <label for="ugDegree">Select Degree:</label>
                                                            <select id="ugDegree" name="degree"
                                                                class="form-control">
                                                                <option value="">Select Degree</option>
                                                                @foreach ($undergraduate as $degree)
                                                                <option value="{{ $degree->fee }}"
                                                                    data-degree-name="{{ $degree->degree }}">
                                                                    {{ $degree->degree }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="ugQuantity">No of seats:</label>
                                                            <input type="number" id="ugQuantity" name="seats"
                                                                class="form-control" value="1" min="1">
                                                        </div>
                                                    </div>
                                                    <div class="form-group ml-3">
                                                        <input type="checkbox" id="ugAdditionalExpenses"
                                                            value="275000">
                                                        <label for="ugAdditionalExpenses">Include mess and hostel
                                                            expenses (275,000 PKR)</label>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12 additional-field"
                                                        id="ugAdditionalFieldContainer">
                                                        <div class="form-group">
                                                            <label for="ugSelectedDegree">Selected Degree:</label>
                                                            <input type="text" id="ugSelectedDegree"
                                                                name="degree" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="ugTotalAmount">Total Amount (UG):</label>
                                                        <input type="text" id="ugTotalAmount" name="totalAmount"
                                                            class="form-control" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 ">

                                                    <a href="{{ url('student_stories') }}"
                                                        class="btn btn-info btn-sm"
                                                        style="background-color: #FFA500; color:black">Nurture a Dream
                                                        <br>
                                                        Read student stories and select a story of your choice.
                                                    </a>
                                                    <br>
                                                </div>

                                                <div id="donorInfo">
                                                    <h4 class="text-dark mt-4">Donor Information:</h4>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="donor_name">Name:</label>
                                                            <input type="text" id="donor_name" name="donor_name"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="donor_email">Email:</label>
                                                            <input type="email" id="donor_email" name="donor_email"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="phone">Phone:</label>
                                                            <input type="number" id="phone" name="phone"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="container-fluid">
                                                            <div class="row ml-3">
                                                                <span class="ml-4 text-dark mb-2">Are You Alumni or
                                                                    Industrial Partner</span>
                                                                <div class="col-md-10 mb-3">
                                                                    <select class="form-control" name="about_partner"
                                                                        id="alumni_select_cpackage">
                                                                        <option value="" disabled selected>Select
                                                                            an option</option>
                                                                        <option value="Alumni" id="Alumni">Alumni
                                                                        </option>
                                                                        <option value="Industrial-Partner"
                                                                            id="ip_oneyear_custom_ug">Industrial
                                                                            Partner</option>
                                                                        <option value="Philanthropist"
                                                                            id="Philanthropist_oneyear_custom_ug">
                                                                            Philanthropist</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row ml-4 d-none"
                                                                id="philanthropist_oneyear_custom_ug_div">
                                                                <div class="col-md-10">
                                                                    <label for="">How do you know us?</label>
                                                                    <textarea name="philanthropist_text" id="knowledge" cols="40" rows="5" class="form-control"></textarea>
                                                                </div>
                                                            </div>

                                                            <script>
                                                                document.getElementById('alumni_select_cpackage').addEventListener('change', function() {
                                                                    var selectedValue = this.value;
                                                                    var philanthropistDiv = document.getElementById('philanthropist_oneyear_custom_ug_div');

                                                                    // Show the div if "Industrial Partner" or "Philanthropist" is selected
                                                                    if (selectedValue === 'Industrial-Partner' || selectedValue === 'Philanthropist') {
                                                                        philanthropistDiv.classList.remove('d-none');
                                                                    } else {
                                                                        philanthropistDiv.classList.add('d-none');
                                                                    }
                                                                });
                                                            </script>



                                                            <div class="row d-none ml-3" id="alumni-cpackage">
                                                                <div class="col-md-10">
                                                                    <label for="school_select">Select School</label>
                                                                    <select name="school" id="school_select"
                                                                        class="form-control">
                                                                        <option value="" selected>Select School
                                                                        </option>
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
                                                                    <label for="year" class="form-label">Select
                                                                        Year of
                                                                        Graduation</label>
                                                                    <select id="year" name="year"
                                                                        class="form-control">
                                                                        <option value="" selected>Select Year of
                                                                            Graduation
                                                                        </option>
                                                                        @for ($i = 1990; $i <= date('Y'); $i++)
                                                                            <option value="{{ $i }}">
                                                                                {{ $i }}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>




                                                    <div class="form-check mb-3 mt-2">
                                                        <input class="form-check-input ml-3 paynow-radio"
                                                            name="payments_status" type="radio"
                                                            id="showBankDetailsNonEng" value="Paynow">
                                                        <label class="form-check-label ml-4"
                                                            for="showBankDetailsNonEng">Paynow</label>
                                                        <input class="form-check-input ml-3 pledge-radio"
                                                            name="payments_status" type="radio" id="pledgeNonEng"
                                                            value="make_a_pledge">
                                                        <label class="form-check-label ml-4" for="pledgeNonEng">Make a
                                                            Pledge</label>
                                                    </div>
                                                    <div class="col-md-12 prove-field">
                                                        <span class="text-dark mb-2">Attach Screenshots/ Receipt of
                                                            Fund Transfer</span>

                                                        <div class="form-group">
                                                            <label for="prove">Proof:</label>
                                                            <input type="file" id="prove" name="prove"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="submit" name="submit" class="btn btn-primary">
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <!-- Postgraduate Tab -->
                    <div class="tab-pane fade" id="postgraduate" role="tabpanel" aria-labelledby="postgraduate-tab">
                        <div class="row mt-5">
                            <div class="col-md-4 mb-2">
                                <h3 class="text-light text-center p-3" style="background-color: #004476;">Post
                                    Graduate Students</h3>
                                <form action="{{ url('default_package_full_degree') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group" hidden>
                                        <label for="pgDegree">Degree:</label>
                                        <input type="text" name="program_type" value="Single_endowment_PG"
                                            class="form-control">
                                        <input type="text" name="degree" value="Post Graduate engineering"
                                            class="form-control">
                                    </div>
                                    <div class="row p-2 mt-4">
                                        <div class="form-group ml-3">
                                            <input type="checkbox" class="mess_checkbox" value="1100000">
                                            <label for="pgAdditionalExpenses">Include mess and hostel expenses
                                                (1,100,000 PKR)</label>
                                        </div>
                                        <div class="form-group ml-3">
                                            <label for="pgTotalAmount">Total Amount:</label>
                                            <input type="text" class="total_amount form-control"
                                                name="totalAmount" value="725000" readonly>
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
                                                        class="form-control " required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_email">Email:</label>
                                                    <input type="email" id="donor_email" name="donor_email"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone:</label>
                                                    <input type="number" id="phone" name="phone"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="container-fluid">
                                                    <div class="row ml-3">
                                                        <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial
                                                            Partner</span>
                                                        <div class="col-md-10 mb-3">
                                                            <select class="form-control" name="about_partner"
                                                                id="alumni_select_pg-neng">
                                                                <option value="" disabled selected>Select an
                                                                    option</option>
                                                                <option value="Alumni">Alumni</option>
                                                                <option value="Industrial-Partner"
                                                                    id="ip_oneyear_eng_pg">Industrial Partner</option>
                                                                <option value="Philanthropist"
                                                                    id="Philanthropist_oneyear_eng_pg">Philanthropist
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row ml-4 d-none"
                                                        id="philanthropist_oneyear_eng_pg_div">
                                                        <div class="col-md-10">
                                                            <label for="">How do you know us?</label>
                                                            <textarea name="philanthropist_text" id="knowledge" cols="40" rows="5" class="form-control"></textarea>
                                                        </div>
                                                    </div>

                                                    <script>
                                                        document.getElementById('alumni_select_pg-neng').addEventListener('change', function() {
                                                            var selectedValue = this.value;
                                                            var philanthropistDiv = document.getElementById('philanthropist_oneyear_eng_pg_div');

                                                            // Show the div if "Industrial Partner" or "Philanthropist" is selected
                                                            if (selectedValue === 'Industrial-Partner' || selectedValue === 'Philanthropist') {
                                                                philanthropistDiv.classList.remove('d-none');
                                                            } else {
                                                                philanthropistDiv.classList.add('d-none');
                                                            }
                                                        });
                                                    </script>


                                                    <div class="row d-none ml-3" id="alumni_pg-neng">
                                                        <div class="col-md-10">
                                                            <label for="school_select">Select
                                                                School</label>
                                                            <select name="school" id="school_select"
                                                                class="form-control">
                                                                <option value="" selected>Select
                                                                    School</option>
                                                                @foreach ($schools as $item)
                                                                    <option
                                                                        value="{{ $item->schoolname }}">
                                                                        {{ $item->schoolname }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="country_select">Select
                                                                Country</label>
                                                            <select name="country" id="country_select"
                                                                class="form-control">
                                                                @foreach ($countries as $item)
                                                                    <option
                                                                        value="{{ $item->countryname }}">
                                                                        {{ $item->countryname }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="year"
                                                                class="form-label">Select Year of
                                                                Graduation</label>
                                                            <select id="year" name="year"
                                                                class="form-control">
                                                                <option value="" selected>Select Year
                                                                    of Graduation
                                                                </option>
                                                                @for ($i = 1990; $i <= date('Y'); $i++)
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
                                                <input class="form-check-input ml-3 paynow-radio"
                                                    name="payments_status" type="radio" id="showBankDetailsNonEng"
                                                    value="Paynow">
                                                <label class="form-check-label ml-4"
                                                    for="showBankDetailsNonEng">Paynow</label>
                                                <input class="form-check-input ml-3 pledge-radio"
                                                    name="payments_status" type="radio" id="pledgeNonEng"
                                                    value="make_a_pledge">
                                                <label class="form-check-label ml-4" for="pledgeNonEng">Make a
                                                    Pledge</label>
                                            </div>
                                            <span class="text-dark mb-2 ml-4">Attach Screenshots/ Receipt of Fund
                                                Transfer</span>

                                            <div class="form-group ml-3">
                                                <label for="prove">Proof:</label>
                                                <input type="file" id="prove" name="prove"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" name="submit" id="" class="btn btn-primary">
                                </form>

                            </div>

                            <div class="col-md-4 mb-2">
                                <h3 class="text-light text-center p-3" style="background-color: #004476;">Postgraduate
                                    Non-Engineering Students</h3>
                                <form action="{{ url('default_package_full_degree') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group" hidden>
                                        <label for="pgDegree">Degree:</label>
                                        <input type="text" name="program_type" value="Single_endowment_PG"
                                            class="form-control">
                                        <input type="text" name="degree" value="Postgraduate Non-Engineering"
                                            class="form-control">
                                    </div>
                                    <div class="row p-2 mt-4">
                                        <div class="form-group ml-3">
                                            <input type="checkbox" class="mess_checkbox" value="1100000">
                                            <label for="pgAdditionalExpenses">Include mess and hostel expenses
                                                (1,100,000 PKR)</label>
                                        </div>
                                        <div class="form-group ml-3">
                                            <label for="pgTotalAmount">Total Amount:</label>
                                            <input type="text" class="total_amount form-control"
                                                name="totalAmount" value="1000000" readonly>
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
                                                        class="form-control " required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_email">Email:</label>
                                                    <input type="email" id="donor_email" name="donor_email"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone:</label>
                                                    <input type="number" id="phone" name="phone"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="container-fluid">
                                                    <div class="row ml-3">
                                                        <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial
                                                            Partner</span>
                                                        <div class="col-md-10 mb-3">
                                                            <select class="form-control" name="about_partner"
                                                                id="alumni_select_eng_pg">
                                                                <option value="" disabled selected>Select an
                                                                    option</option>
                                                                <option value="Alumni" id="Alumni">Alumni</option>
                                                                <option value="Industrial-Partner"
                                                                    id="ip_oneyear_noneng_pg">Industrial Partner
                                                                </option>
                                                                <option value="Philanthropist"
                                                                    id="Philanthropist_oneyear_noneng_pg">
                                                                    Philanthropist</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row ml-4 d-none"
                                                        id="philanthropist_oneyear_noneng_pg_div">
                                                        <div class="col-md-10">
                                                            <label for="knowledge">How do you know us?</label>
                                                            <textarea name="philanthropist_text" id="knowledge" cols="40" rows="5" class="form-control"></textarea>
                                                        </div>
                                                    </div>

                                                    <script>
                                                        document.getElementById('alumni_select_eng_pg').addEventListener('change', function() {
                                                            var selectedValue = this.value;
                                                            var philanthropistDiv = document.getElementById('philanthropist_oneyear_noneng_pg_div');

                                                            // Show the div if "Industrial Partner" or "Philanthropist" is selected
                                                            if (selectedValue === 'Industrial-Partner' || selectedValue === 'Philanthropist') {
                                                                philanthropistDiv.classList.remove('d-none');
                                                            } else {
                                                                philanthropistDiv.classList.add('d-none');
                                                            }
                                                        });
                                                    </script>


                                                    <div class="row d-none ml-3" id="alumni-eng_pg">
                                                        <div class="col-md-10">
                                                            <label for="school_select">Select
                                                                School</label>
                                                            <select name="school" id="school_select"
                                                                class="form-control">
                                                                <option value="" selected>Select
                                                                    School</option>
                                                                @foreach ($schools as $item)
                                                                    <option
                                                                        value="{{ $item->schoolname }}">
                                                                        {{ $item->schoolname }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="country_select">Select
                                                                Country</label>
                                                            <select name="country" id="country_select"
                                                                class="form-control">
                                                                @foreach ($countries as $item)
                                                                    <option
                                                                        value="{{ $item->countryname }}">
                                                                        {{ $item->countryname }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="year"
                                                                class="form-label">Select Year of
                                                                Graduation</label>
                                                            <select id="year" name="year"
                                                                class="form-control">
                                                                <option value="" selected>Select Year
                                                                    of Graduation
                                                                </option>
                                                                @for ($i = 1990; $i <= date('Y'); $i++)
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
                                                <input class="form-check-input ml-3 paynow-radio"
                                                    name="payments_status" type="radio" id="showBankDetailsNonEng"
                                                    value="Paynow">
                                                <label class="form-check-label ml-4"
                                                    for="showBankDetailsNonEng">Paynow</label>
                                                <input class="form-check-input ml-3 pledge-radio"
                                                    name="payments_status" type="radio" id="pledgeNonEng"
                                                    value="make_a_pledge">
                                                <label class="form-check-label ml-4" for="pledgeNonEng">Make a
                                                    Pledge</label>
                                            </div>
                                            <span class="text-dark mb-2 ml-4">Attach Screenshots/ Receipt of Fund
                                                Transfer</span>

                                            <div class="form-group ml-3">
                                                <label for="prove">Proof:</label>
                                                <input type="file" id="prove" name="prove"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" name="submit" id="" class="btn btn-primary">
                                </form>


                            </div>

                            <div class="col-md-4 mb-2">

                                <form action="{{ url('endowmentsupportentireyear') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <h3 class="text-light text-center p-3" style="background-color: #004476;">
                                        Customize Your Package</h3>

                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="program_type" id="" value="PG_Four_year"
                                                hidden>
                                            <div class="form-group">
                                                <label for="pgDegree">Select Degree:</label>
                                                <select id="pgDegree" name="degree" class="form-control">
                                                    <option value="">Select Degree</option>
                                                    @foreach ($postgraduate as $degree)
                                                    <option value="{{ $degree->fee }}"
                                                        data-degree-name="{{ $degree->degree }}">
                                                        {{ $degree->degree }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="pgQuantity">No of seats:</label>
                                                <input type="number" id="pgQuantity" name="seats"
                                                    class="form-control" value="1" min="1">
                                            </div>
                                        </div>
                                        <div class="form-group ml-3">
                                            <input type="checkbox" id="pgAdditionalExpenses" value="275000">
                                            <label for="pgAdditionalExpenses">Include mess and hostel expenses (275,000
                                                PKR)</label>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12 additional-field" id="pgAdditionalFieldContainer">
                                            <div class="form-group">
                                                <label for="pgSelectedDegree">Selected Degree:</label>
                                                <input type="text" id="pgSelectedDegree" name="degree"
                                                    class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="pgTotalAmount">Total Amount (PG):</label>
                                            <input type="text" id="pgTotalAmount" name="totalAmount"
                                                class="form-control" readonly>
                                        </div>
                                    </div>


                                    <div class="col-md-12 ">

                                        <a href="{{ url('student_stories') }}" class="btn btn-info btn-sm"
                                            style="background-color: #FFA500;">Nurture a Dream
                                            <br>
                                            Read student stories and select a story of your choice.
                                        </a>
                                        <br>
                                    </div>


                                    <div id="donorInfo">
                                        <h4 class="text-dark mt-4">Donor Information:</h4>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="donor_name">Name:</label>
                                                <input type="text" id="donor_name" name="donor_name"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="donor_email">Email:</label>
                                                <input type="email" id="donor_email" name="donor_email"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="phone">Phone:</label>
                                                <input type="number" id="phone" name="phone"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="container-fluid">
                                                <div class="row ml-3">
                                                    <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial
                                                        Partner</span>
                                                    <div class="col-md-10 mb-3">
                                                        <select class="form-control" name="about_partner"
                                                            id="alumni_select_cpackage_pg">
                                                            <option value="" disabled selected>Select an option
                                                            </option>
                                                            <option value="Alumni" id="Alumni">Alumni</option>
                                                            <option value="Industrial-Partner"
                                                                id="ip_oneyear_custom_pg">Industrial Partner</option>
                                                            <option value="Philanthropist"
                                                                id="Philanthropist_oneyear_custom_pg">Philanthropist
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row ml-4 d-none"
                                                    id="philanthropist_oneyear_custom_pg_div">
                                                    <div class="col-md-10">
                                                        <label for="knowledge">How do you know us?</label>
                                                        <textarea name="philanthropist_text" id="knowledge" cols="40" rows="5" class="form-control"></textarea>
                                                    </div>
                                                </div>

                                                <script>
                                                    document.getElementById('alumni_select_cpackage_pg').addEventListener('change', function() {
                                                        var selectedValue = this.value;
                                                        var philanthropistDiv = document.getElementById('philanthropist_oneyear_custom_pg_div');

                                                        // Show the div if "Industrial Partner" or "Philanthropist" is selected
                                                        if (selectedValue === 'Industrial-Partner' || selectedValue === 'Philanthropist') {
                                                            philanthropistDiv.classList.remove('d-none');
                                                        } else {
                                                            philanthropistDiv.classList.add('d-none');
                                                        }
                                                    });
                                                </script>


                                                <div class="row d-none ml-3" id="alumni-cpackage_pg">
                                                    <div class="col-md-10">
                                                        <label for="school_select">Select
                                                            School</label>
                                                        <select name="school" id="school_select"
                                                            class="form-control">
                                                            <option value="" selected>Select
                                                                School</option>
                                                            @foreach ($schools as $item)
                                                                <option
                                                                    value="{{ $item->schoolname }}">
                                                                    {{ $item->schoolname }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <label for="country_select">Select
                                                            Country</label>
                                                        <select name="country" id="country_select"
                                                            class="form-control">
                                                            @foreach ($countries as $item)
                                                                <option
                                                                    value="{{ $item->countryname }}">
                                                                    {{ $item->countryname }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <label for="year"
                                                            class="form-label">Select Year of
                                                            Graduation</label>
                                                        <select id="year" name="year"
                                                            class="form-control">
                                                            <option value="" selected>Select Year
                                                                of Graduation
                                                            </option>
                                                            @for ($i = 1990; $i <= date('Y'); $i++)
                                                                <option value="{{ $i }}">
                                                                    {{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="form-check mb-3 mt-2">
                                            <input class="form-check-input ml-3 paynow-radio" name="payments_status"
                                                type="radio" id="showBankDetailsNonEng" value="Paynow">
                                            <label class="form-check-label ml-4"
                                                for="showBankDetailsNonEng">Paynow</label>
                                            <input class="form-check-input ml-3 pledge-radio" name="payments_status"
                                                type="radio" id="pledgeNonEng" value="make_a_pledge">
                                            <label class="form-check-label ml-4" for="pledgeNonEng">Make a
                                                Pledge</label>
                                        </div>
                                        <div class="col-md-12 prove-field">
                                            <span class="text-dark mb-2">Attach Screenshots/ Receipt of Fund
                                                Transfer</span>

                                            <div class="form-group">
                                                <label for="prove">Proof:</label>
                                                <input type="file" id="prove" name="prove"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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


        <!-- Footer -->
        @include('template.layouts.footer')
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('templates/js/temp/foutyear.js') }}"></script>

</body>

</html>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const degreeSelect = document.getElementById('ugDegree');
        const quantityInput = document.getElementById('ugQuantity');
        const additionalExpensesCheckbox = document.getElementById('ugAdditionalExpenses');
        const totalAmountInput = document.getElementById('ugTotalAmount');
        const selectedDegreeInput = document.getElementById('ugSelectedDegree');

        function calculateTotal() {
            const selectedOption = degreeSelect.options[degreeSelect.selectedIndex];
            const fee = parseFloat(selectedOption.value) || 0;
            const seats = parseInt(quantityInput.value, 10) || 1;
            const additionalExpenses = additionalExpensesCheckbox.checked ? parseFloat(
                additionalExpensesCheckbox.value) : 0;

            const totalFee = (fee * seats) * 4;
            const totalAmount = totalFee + additionalExpenses;

            totalAmountInput.value = totalAmount.toFixed(2);
            selectedDegreeInput.value = selectedOption.getAttribute('data-degree-name') || '';
        }

        // Event listeners
        degreeSelect.addEventListener('change', calculateTotal);
        quantityInput.addEventListener('input', calculateTotal);
        additionalExpensesCheckbox.addEventListener('change', calculateTotal);

        // Initial calculation
        calculateTotal();
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const degreeSelect = document.getElementById('pgDegree');
        const quantityInput = document.getElementById('pgQuantity');
        const additionalExpensesCheckbox = document.getElementById('pgAdditionalExpenses');
        const totalAmountInput = document.getElementById('pgTotalAmount');
        const selectedDegreeInput = document.getElementById('pgSelectedDegree');

        function calculateTotal() {
            const selectedOption = degreeSelect.options[degreeSelect.selectedIndex];
            const fee = parseFloat(selectedOption.value) || 0;
            const seats = parseInt(quantityInput.value, 10) || 1;
            const additionalExpenses = additionalExpensesCheckbox.checked ? parseFloat(
                additionalExpensesCheckbox.value) : 0;

            // Change the multiplier from 4 to 2
            const totalFee = (fee * seats) * 2;
            const totalAmount = totalFee + additionalExpenses;

            totalAmountInput.value = totalAmount.toFixed(2);
            selectedDegreeInput.value = selectedOption.getAttribute('data-degree-name') || '';
        }

        // Event listeners
        degreeSelect.addEventListener('change', calculateTotal);
        quantityInput.addEventListener('input', calculateTotal);
        additionalExpensesCheckbox.addEventListener('change', calculateTotal);

        // Initial calculation
        calculateTotal();
    });
</script>
