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
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <!-- Center Tabs Navigation -->
            <div class="d-flex justify-content-center">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item mb-2" role="presentation">
                        <button class="nav-link custom-tab active" id="single-endowment-ug-tab" data-bs-toggle="tab" data-bs-target="#single-endowment-ug" type="button" role="tab" aria-controls="single-endowment-ug" aria-selected="true" style="background-color: #004476; color:white">Single Endowment (UG)</button>
                    </li>
                    <li class="nav-item mb-2" role="presentation">
                        <button class="nav-link custom-tab" id="circular-endowment-ug-tab" data-bs-toggle="tab" data-bs-target="#circular-endowment-ug" type="button" role="tab" aria-controls="circular-endowment-ug" aria-selected="false" style="background-color: #004476; color:white">Circular Endowment (UG)</button>
                    </li>
                    <li class="nav-item mb-2" role="presentation">
                        <button class="nav-link custom-tab" id="single-endowment-pg-tab" data-bs-toggle="tab" data-bs-target="#single-endowment-pg" type="button" role="tab" aria-controls="single-endowment-pg" aria-selected="false" style="background-color: #004476; color:white">Single Endowment (PG)</button>
                    </li>
                    <li class="nav-item mb-2" role="presentation">
                        <button class="nav-link custom-tab" id="circular-endowment-pg-tab" data-bs-toggle="tab" data-bs-target="#circular-endowment-pg" type="button" role="tab" aria-controls="circular-endowment-pg" aria-selected="false" style="background-color: #004476; color:white">Circular Endowment (PG)</button>
                    </li>

                </ul>
            </div>

            <!-- Tabs Content -->
            <div class="tab-content" id="myTabContent">
                <!-- Single Endowment UG Tab Content -->
                <div class="tab-pane fade show active" id="single-endowment-ug" role="tabpanel" aria-labelledby="single-endowment-ug-tab">
                    <h3 class="text-center text-dark mt-4">Singular Endowment: Establish one Seat in perpetuity (UG)</h3>
                    <div class="row mt-5">

                        <div class="col-md-4 mb-2">
                            <h3 class="text-light text-center p-3" style="background-color: #004476;">Engineering Students</h3>
                            <form action="{{url('default_perpetual_seat')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group" hidden>
                                    <label for="pgDegree">Degree:</label>
                                    <input type="text" name="program_type" value="Single_endowment_UG_engineering_stud" class="form-control">
                                    <input type="text" name="degree" value="Engineering" class="form-control">
                                    <input type="text" name="seats" value="1" class="form-control">

                                </div>
                                <div class="row p-2 mt-4">
                                    <div class="form-group ml-3">
                                        <input type="checkbox" class="mess_checkbox" value="4000000">
                                        <label for="pgAdditionalExpenses">Include mess and hostel expenses (4,000,000 PKR)</label>
                                    </div>
                                    <div class="form-group ml-3">
                                        <label for="pgTotalAmount">Total Amount:</label>
                                        <input type="text" class="total_amount form-control" name="totalAmount" class="form-control" value="4500000" readonly>
                                    </div>
                                </div>

                                {{-- Donor info --}}
                                <div id="donorInfo">
                                    <h4 class="text-dark mt-4">Donor Information:</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="donor_name">Name:</label>
                                                <input type="text" id="donor_name" name="donor_name" class="form-control " required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="donor_email">Email:</label>
                                                <input type="email" id="donor_email" name="donor_email" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="phone">Phone:</label>
                                                <input type="number" id="phone" name="phone" class="form-control" required>
                                            </div>
                                        </div>
                                     <div class="row">
                                            <div class="container-fluid">
                                                <div class="row ml-3">
                                                    <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial Partner</span>
                                                    <div class="col-md-10 mb-3">
                                                        <select class="form-control" name="about_partner" id="alumni_select">
                                                            <option value="" disabled selected>Select an option</option>
                                                            <option value="Alumni">Alumni</option>
                                                            <option value="Industrial-Partner" id="ip_se_eng_ug">Industrial Partner</option>
                                                            <option value="Philanthropist" id="Philanthropist_se_eng_ug">Philanthropist</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="row ml-4 d-none" id="philanthropist_se-eng_ug_div">
                                                    <div class="col-md-10">
                                                        <label for="">How do you know us?</label>
                                                        <textarea name="philanthropist_text" id="" cols="40" rows="5" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                
                                                <script>
                                                    document.getElementById('alumni_select').addEventListener('change', function() {
                                                        var selectedOption = this.value;
                                                        var philanthropistDiv = document.getElementById('philanthropist_se-eng_ug_div');
                                                        
                                                        if (selectedOption === 'Philanthropist' || selectedOption === 'Industrial-Partner') {
                                                            philanthropistDiv.classList.remove('d-none');  // Show the div if "Philanthropist" or "Industrial Partner" is selected
                                                        } else {
                                                            philanthropistDiv.classList.add('d-none');  // Hide the div if another option is selected
                                                        }
                                                    });
                                                </script>
                                                
                                                
                                                <div class="row d-none ml-3" id="alumni">
                                                    <div class="col-md-10">
                                                        <label for="school_select">Select School</label>
                                                        <select name="school" id="school_select" class="form-control">
                                                            <option value="" selected>Select School</option>
                                                            <option value="SCHOOL OF CIVIL & ENVIRONMENTAL ENGINEERING">SCEE</option>
                                                            <option value="SCHOOL OF CHEMICAL & MATERIALS ENGINEERING">SCME</option>
                                                            <option value="SCHOOL OF ELECTRICAL ENGINEERING & COMPUTER SCIENCE">SEECS</option>
                                                            <option value="SCHOOL OF MECHANICAL & MANUFACTURING ENGINEERING">SMME</option>
                                                            <option value="US-PAKISTAN CENTER FOR ADVANCED STUDIES IN ENERGY">US-PCASE</option>
                                                            <option value="NUST BALOCHISTAN CAMPUS, QUETTA">NUST BALOCHISTAN CAMPUS, QUETTA</option>
                                                            <option value="COLLEGE OF AERONAUTICAL ENGINEERING">COLLEGE OF AERONAUTICAL ENGINEERING</option>
                                                            <option value="COLLEGE OF ELECTRICAL & MECHANICAL ENGINEERING">COLLEGE OF EME</option>
                                                            <option value="MILITARY COLLEGE OF ENGINEERING">MCE</option>
                                                            <option value="MILITARY COLLEGE OF SIGNALS">MCS</option>
                                                            <option value="PAKISTAN NAVY ENGINEERING COLLEGE">PAKISTAN NAVY ENGINEERING COLLEGE</option>
                                                            <option value="NATIONAL INSTITUTE OF TRANSPORTATION">NATIONAL INSTITUTE OF TRANSPORTATION</option>
                                                            <option value="INSTITUTE OF ENVIRONMENTAL SCIENCES & ENGINEERING">IESE</option>
                                                            <option value="NUST INSTITUTE OF CIVIL ENGINEERING">NUST ICE</option>
                                                            <option value="INSTITUTE OF GEOGRAPHICAL INFORMATION SYSTEMS">IGIS</option>
                                                            <option value="NUST BUSINESS SCHOOL">NBS</option>
                                                            <option value="SCHOOL OF ART, DESIGN & ARCHITECTURE">SADA</option>
                                                            <option value="CENTRE FOR INTERNATIONAL PEACE & STABILITY">CIPS</option>
                                                            <option value="NUST INSTITUTE OF PEACE & CONFLICT STUDIES">NUST IPCS</option>
                                                            <option value="SCHOOL OF SOCIAL SCIENCES & HUMANITIES">SSSH</option>
                                                            <option value="ATTA-UR-RAHMAN SCHOOL OF APPLIED BIO SCIENCES">ASABS</option>
                                                            <option value="SCHOOL OF NATURAL SCIENCES">SNS</option>
                                                            <option value="NUST SCHOOL OF HEALTH SCIENCES">NUST SHS</option>
                                                            <option value="SCHOOL OF INTERDISCIPLINARY ENGINEERING & SCIENCES">SIES</option>
                                                            <!-- Add your school options here -->
                                                        </select>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <label for="country_select">Select Country</label>
                                                        <select name="country" id="country_select" class="form-control">
                                                            <option value="" selected>Select Country</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Australia">Australia</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="China">China</option>
                                                            <option value="Germany">Germany</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Qatar">Qatar</option>
                                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                                            <option value="Turkey">Turkey</option>
                                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                                            <option value="United Kingdom">United Kingdom</option>
                                                            <option value="United States">United States</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <label for="year" class="form-label">Select Year of Graduation</label>
                                                        <select id="year" name="year" class="form-control">
                                                            <option value="" selected>Select Year of Graduation</option>
                                                            <option value="1990">1990</option>
                                                            <option value="1991">1991</option>
                                                            <option value="1992">1992</option>
                                                            <option value="1993">1993</option>
                                                            <option value="1994">1994</option>
                                                            <option value="1995">1995</option>
                                                            <option value="1996">1996</option>
                                                            <option value="1997">1997</option>
                                                            <option value="1998">1998</option>
                                                            <option value="1999">1999</option>
                                                            <option value="2000">2000</option>
                                                            <option value="2001">2001</option>
                                                            <option value="2002">2002</option>
                                                            <option value="2003">2003</option>
                                                            <option value="2004">2004</option>
                                                            <option value="2005">2005</option>
                                                            <option value="2006">2006</option>
                                                            <option value="2007">2007</option>
                                                            <option value="2008">2008</option>
                                                            <option value="2009">2009</option>
                                                            <option value="2010">2010</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                        </select>
                                                    </div>
                                                </div>

                                               </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="form-check mb-3 mt-2 ml-3">
                                            <input class="form-check-input ml-3 paynow-radio" name="payments_status" type="radio" id="showBankDetailsNonEng" value="Paynow">
                                            <label class="form-check-label ml-4" for="showBankDetailsNonEng">Paynow</label>
                                            <input class="form-check-input ml-3 pledge-radio" name="payments_status" type="radio" id="pledgeNonEng" value="make_a_pledge">
                                            <label class="form-check-label ml-4" for="pledgeNonEng">Make a Pledge</label>
                                        </div>
                                        <span class="text-dark mb-2 ml-4">Attach Screenshots/ Receipt of Fund Transfer</span>

                                        <div class="form-group ml-3">
                                            <label for="prove">Proof:</label>
                                            <input type="file" id="prove" name="prove" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" name="submit" id="" class="btn btn-primary">
                            </form>

                        </div>
                            {{-- non engineering students  --}}

                            <div class="col-md-4 mb-2">
                                <h3 class="text-light text-center p-3" style="background-color: #004476;">Non-Engineering Students</h3>
                                <form action="{{url('default_perpetual_seat')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group" hidden>
                                        <input type="text" name="program_type" value="Single_endowment_UG_non_engineering_stud" class="form-control">
                                        <label for="pgDegree">Select Degree:</label>
                                        <input type="text" name="degree" value="Non-Engineering" class="form-control">
                                        <input type="text" name="seats" value="1" class="form-control">
                                    </div>
                                    <div class="row p-2 mt-4">
                                        <div class="form-group ml-3">
                                            <input type="checkbox" class="mess_checkbox" value="4000000">
                                            <label for="pgAdditionalExpenses">Include mess and hostel expenses (4,000,000 PKR)</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="pgTotalAmount">Total Amount:</label>
                                            <input type="text" class="total_amount form-control" name="totalAmount" class="form-control" value="7500000" readonly>
                                        </div>
                                    </div>

                                    {{-- Donor info --}}
                                    <div id="donorInfo">
                                        <h4 class="text-dark mt-4">Donor Information:</h4>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_name">Name:</label>
                                                    <input type="text" id="donor_name" name="donor_name" class="form-control " required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_email">Email:</label>
                                                    <input type="email" id="donor_email" name="donor_email" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone:</label>
                                                    <input type="number" id="phone" name="phone" class="form-control" required>
                                                </div>
                                            </div>
                                         <div class="row">
                                                <div class="container-fluid">
                                                    <div class="row ml-3">
                                                        <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial Partner</span>
                                                        <div class="col-md-10 mb-3">
                                                            <select class="form-control" name="about_partner" id="select-single-endwment-ug-eng">
                                                                <option value="" disabled selected>Select an option</option>
                                                                <option value="Alumni">Alumni</option>
                                                                <option value="Industrial-Partner" id="ipt_se_noneng_ug">Industrial Partner</option>
                                                                <option value="Philanthropist" id="Philanthropist_se_noneng_ug">Philanthropist</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row ml-4 d-none" id="philanthropist_se-noneng_ug_div">
                                                        <div class="col-md-10">
                                                            <label for="">How do you know us?</label>
                                                            <textarea name="philanthropist_text" id="" cols="40" rows="5" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        document.getElementById('select-single-endwment-ug-eng').addEventListener('change', function() {
                                                            var selectedOption = this.value;
                                                            var philanthropistDiv = document.getElementById('philanthropist_se-noneng_ug_div');
                                                    
                                                            if (selectedOption === 'Philanthropist' || selectedOption === 'Industrial-Partner') {
                                                                philanthropistDiv.classList.remove('d-none');  // Show the div if "Philanthropist" or "Industrial Partner" is selected
                                                            } else {
                                                                philanthropistDiv.classList.add('d-none');  // Hide the div if another option is selected
                                                            }
                                                        });
                                                    </script>
                                                                                                        <div class="row d-none ml-3" id="single-endwment-ug-eng">
                                                        <div class="col-md-10">
                                                            <label for="school_select">Select School</label>
                                                            <select name="school" id="school_select" class="form-control">
                                                                <option value="" selected>Select School</option>
                                                                <option value="SCHOOL OF CIVIL & ENVIRONMENTAL ENGINEERING">SCEE</option>
                                                                <option value="SCHOOL OF CHEMICAL & MATERIALS ENGINEERING">SCME</option>
                                                                <option value="SCHOOL OF ELECTRICAL ENGINEERING & COMPUTER SCIENCE">SEECS</option>
                                                                <option value="SCHOOL OF MECHANICAL & MANUFACTURING ENGINEERING">SMME</option>
                                                                <option value="US-PAKISTAN CENTER FOR ADVANCED STUDIES IN ENERGY">US-PCASE</option>
                                                                <option value="NUST BALOCHISTAN CAMPUS, QUETTA">NUST BALOCHISTAN CAMPUS, QUETTA</option>
                                                                <option value="COLLEGE OF AERONAUTICAL ENGINEERING">COLLEGE OF AERONAUTICAL ENGINEERING</option>
                                                                <option value="COLLEGE OF ELECTRICAL & MECHANICAL ENGINEERING">COLLEGE OF EME</option>
                                                                <option value="MILITARY COLLEGE OF ENGINEERING">MCE</option>
                                                                <option value="MILITARY COLLEGE OF SIGNALS">MCS</option>
                                                                <option value="PAKISTAN NAVY ENGINEERING COLLEGE">PAKISTAN NAVY ENGINEERING COLLEGE</option>
                                                                <option value="NATIONAL INSTITUTE OF TRANSPORTATION">NATIONAL INSTITUTE OF TRANSPORTATION</option>
                                                                <option value="INSTITUTE OF ENVIRONMENTAL SCIENCES & ENGINEERING">IESE</option>
                                                                <option value="NUST INSTITUTE OF CIVIL ENGINEERING">NUST ICE</option>
                                                                <option value="INSTITUTE OF GEOGRAPHICAL INFORMATION SYSTEMS">IGIS</option>
                                                                <option value="NUST BUSINESS SCHOOL">NBS</option>
                                                                <option value="SCHOOL OF ART, DESIGN & ARCHITECTURE">SADA</option>
                                                                <option value="CENTRE FOR INTERNATIONAL PEACE & STABILITY">CIPS</option>
                                                                <option value="NUST INSTITUTE OF PEACE & CONFLICT STUDIES">NUST IPCS</option>
                                                                <option value="SCHOOL OF SOCIAL SCIENCES & HUMANITIES">SSSH</option>
                                                                <option value="ATTA-UR-RAHMAN SCHOOL OF APPLIED BIO SCIENCES">ASABS</option>
                                                                <option value="SCHOOL OF NATURAL SCIENCES">SNS</option>
                                                                <option value="NUST SCHOOL OF HEALTH SCIENCES">NUST SHS</option>
                                                                <option value="SCHOOL OF INTERDISCIPLINARY ENGINEERING & SCIENCES">SIES</option>
                                                                <!-- Add your school options here -->
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="country_select">Select Country</label>
                                                            <select name="country" id="country_select" class="form-control">
                                                                <option value="" selected>Select Country</option>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Australia">Australia</option>
                                                                <option value="Canada">Canada</option>
                                                                <option value="China">China</option>
                                                                <option value="Germany">Germany</option>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Qatar">Qatar</option>
                                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                                <option value="Turkey">Turkey</option>
                                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                                <option value="United Kingdom">United Kingdom</option>
                                                                <option value="United States">United States</option>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="year" class="form-label">Select Year of Graduation</label>
                                                            <select id="year" name="year" class="form-control">
                                                                <option value="" selected>Select Year of Graduation</option>
                                                                <option value="1990">1990</option>
                                                                <option value="1991">1991</option>
                                                                <option value="1992">1992</option>
                                                                <option value="1993">1993</option>
                                                                <option value="1994">1994</option>
                                                                <option value="1995">1995</option>
                                                                <option value="1996">1996</option>
                                                                <option value="1997">1997</option>
                                                                <option value="1998">1998</option>
                                                                <option value="1999">1999</option>
                                                                <option value="2000">2000</option>
                                                                <option value="2001">2001</option>
                                                                <option value="2002">2002</option>
                                                                <option value="2003">2003</option>
                                                                <option value="2004">2004</option>
                                                                <option value="2005">2005</option>
                                                                <option value="2006">2006</option>
                                                                <option value="2007">2007</option>
                                                                <option value="2008">2008</option>
                                                                <option value="2009">2009</option>
                                                                <option value="2010">2010</option>
                                                                <option value="2011">2011</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2013">2013</option>
                                                                <option value="2014">2014</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2016">2016</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2020">2020</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                   </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="form-check mb-3 mt-2 ml-3">
                                                <input class="form-check-input ml-3 paynow-radio" name="payments_status" type="radio" id="showBankDetailsNonEng" value="Paynow">
                                                <label class="form-check-label ml-4" for="showBankDetailsNonEng">Paynow</label>
                                                <input class="form-check-input ml-3 pledge-radio" name="payments_status" type="radio" id="pledgeNonEng" value="make_a_pledge">
                                                <label class="form-check-label ml-4" for="pledgeNonEng">Make a Pledge</label>
                                            </div>
                                            <span class="text-dark mb-2 ml-4">Attach Screenshots/ Receipt of Fund Transfer</span>

                                            <div class="form-group ml-3">
                                                <label for="prove">Proof:</label>
                                                <input type="file" id="prove" name="prove" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" name="submit" id="" class="btn btn-primary">
                                </form>
                            </div>

                        <div class="col-md-4 mb-2 ">
                            <form action="{{url('perpetualseatyourname')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h3  class="text-light text-center p-3" style="background-color: #004476;" >Customize Your Package</h3>
                                {{-- <h3 class="text-dark text-center mb-4">Single Endowment for UG:</h3> --}}


                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="program" value="UG" hidden>
                                        <input type="text" name="endowment_type" value="Single_endowment" hidden>
                                        <div class="form-group">
                                            <label for="degree">Select Options:</label>
                                            <select id="degree" name="degree" class="form-control form-control-sm">
                                                <option value="">Select Degree</option>
                                                @foreach ($undergraduate as $degree)
                                                    <option value="{{ $degree->fee }}" data-degree-name="{{ $degree->degree }}">{{ $degree->degree }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="hidden" id="degree_name" name="degree_name">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="no_of_seat">No of seats:</label>
                                            <input type="number" id="no_of_seat" name="seats" class="form-control form-control-sm" value="1" min="1">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check mb-3">
                                            <input type="checkbox" id="additionalExpenses" value="275000" class="form-check-input">
                                            <label for="additionalExpenses" class="form-check-label">Include mess and hostel expenses (275,000 PKR)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="totalAmount">Total Amount (UG):</label>
                                            <input type="text" id="totalAmount" name="totalAmount" class="form-control form-control-sm" readonly >
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">

                                        <a href="{{url('student_stories')}}" class="btn btn-info btn-sm" style="background-color: #FFA500;">Nurture a Dream
                                            <br>
                                            Read student stories and select a story of your choice.
                                        </a>
                                        <br>
                                        <span></span>
                                </div>

                                <div id="donorInfo">
                                    <h4 class="text-dark mt-4">Donor Information:</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="donor_name">Name:</label>
                                                <input type="text" id="donor_name" name="donor_name" class="form-control " required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="donor_email">Email:</label>
                                                <input type="email" id="donor_email" name="donor_email" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="phone">Phone:</label>
                                                <input type="number" id="phone" name="phone" class="form-control" required>
                                            </div>
                                        </div>
                                     <div class="row">
                                            <div class="container-fluid">
                                                <div class="row ml-3">
                                                    <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial Partner</span>
                                                    <div class="col-md-10 mb-3">
                                                        <select class="form-control" name="about_partner" id="select-custom-endwment-ug-eng">
                                                            <option value="" disabled selected>Select an option</option>
                                                            <option value="Alumni">Alumni</option>
                                                            <option value="Industrial-Partner" id="ip_se_custom_ug">Industrial Partner</option>
                                                            <option value="Philanthropist" id="Philanthropist_se_custom_ug">Philanthropist</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="row ml-4 d-none" id="philanthropist_se-custom_ug_div">
                                                    <div class="col-md-10">
                                                        <label for="">How do you know us?</label>
                                                        <textarea name="philanthropist_text" id="" cols="40" rows="5" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                
                                                <script>
                                                    document.getElementById('select-custom-endwment-ug-eng').addEventListener('change', function() {
                                                        var selectedOption = this.value;
                                                        var philanthropistDiv = document.getElementById('philanthropist_se-custom_ug_div');
                                                
                                                        if (selectedOption === 'Philanthropist' || selectedOption === 'Industrial-Partner') {
                                                            philanthropistDiv.classList.remove('d-none');  // Show the div if "Philanthropist" or "Industrial Partner" is selected
                                                        } else {
                                                            philanthropistDiv.classList.add('d-none');  // Hide the div if another option is selected
                                                        }
                                                    });
                                                </script>
                                                
                                                
                                                <div class="row d-none ml-3" id="custom-endwment-ug-eng">
                                                    <div class="col-md-10">
                                                        <label for="school_select">Select School</label>
                                                        <select name="school" id="school_select" class="form-control">
                                                            <option value="" selected>Select School</option>
                                                            <option value="SCHOOL OF CIVIL & ENVIRONMENTAL ENGINEERING">SCEE</option>
                                                            <option value="SCHOOL OF CHEMICAL & MATERIALS ENGINEERING">SCME</option>
                                                            <option value="SCHOOL OF ELECTRICAL ENGINEERING & COMPUTER SCIENCE">SEECS</option>
                                                            <option value="SCHOOL OF MECHANICAL & MANUFACTURING ENGINEERING">SMME</option>
                                                            <option value="US-PAKISTAN CENTER FOR ADVANCED STUDIES IN ENERGY">US-PCASE</option>
                                                            <option value="NUST BALOCHISTAN CAMPUS, QUETTA">NUST BALOCHISTAN CAMPUS, QUETTA</option>
                                                            <option value="COLLEGE OF AERONAUTICAL ENGINEERING">COLLEGE OF AERONAUTICAL ENGINEERING</option>
                                                            <option value="COLLEGE OF ELECTRICAL & MECHANICAL ENGINEERING">COLLEGE OF EME</option>
                                                            <option value="MILITARY COLLEGE OF ENGINEERING">MCE</option>
                                                            <option value="MILITARY COLLEGE OF SIGNALS">MCS</option>
                                                            <option value="PAKISTAN NAVY ENGINEERING COLLEGE">PAKISTAN NAVY ENGINEERING COLLEGE</option>
                                                            <option value="NATIONAL INSTITUTE OF TRANSPORTATION">NATIONAL INSTITUTE OF TRANSPORTATION</option>
                                                            <option value="INSTITUTE OF ENVIRONMENTAL SCIENCES & ENGINEERING">IESE</option>
                                                            <option value="NUST INSTITUTE OF CIVIL ENGINEERING">NUST ICE</option>
                                                            <option value="INSTITUTE OF GEOGRAPHICAL INFORMATION SYSTEMS">IGIS</option>
                                                            <option value="NUST BUSINESS SCHOOL">NBS</option>
                                                            <option value="SCHOOL OF ART, DESIGN & ARCHITECTURE">SADA</option>
                                                            <option value="CENTRE FOR INTERNATIONAL PEACE & STABILITY">CIPS</option>
                                                            <option value="NUST INSTITUTE OF PEACE & CONFLICT STUDIES">NUST IPCS</option>
                                                            <option value="SCHOOL OF SOCIAL SCIENCES & HUMANITIES">SSSH</option>
                                                            <option value="ATTA-UR-RAHMAN SCHOOL OF APPLIED BIO SCIENCES">ASABS</option>
                                                            <option value="SCHOOL OF NATURAL SCIENCES">SNS</option>
                                                            <option value="NUST SCHOOL OF HEALTH SCIENCES">NUST SHS</option>
                                                            <option value="SCHOOL OF INTERDISCIPLINARY ENGINEERING & SCIENCES">SIES</option>
                                                            <!-- Add your school options here -->
                                                        </select>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <label for="country_select">Select Country</label>
                                                        <select name="country" id="country_select" class="form-control">
                                                            <option value="" selected>Select Country</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Australia">Australia</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="China">China</option>
                                                            <option value="Germany">Germany</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Qatar">Qatar</option>
                                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                                            <option value="Turkey">Turkey</option>
                                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                                            <option value="United Kingdom">United Kingdom</option>
                                                            <option value="United States">United States</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <label for="year" class="form-label">Select Year of Graduation</label>
                                                        <select id="year" name="year" class="form-control">
                                                            <option value="" selected>Select Year of Graduation</option>
                                                            <option value="1990">1990</option>
                                                            <option value="1991">1991</option>
                                                            <option value="1992">1992</option>
                                                            <option value="1993">1993</option>
                                                            <option value="1994">1994</option>
                                                            <option value="1995">1995</option>
                                                            <option value="1996">1996</option>
                                                            <option value="1997">1997</option>
                                                            <option value="1998">1998</option>
                                                            <option value="1999">1999</option>
                                                            <option value="2000">2000</option>
                                                            <option value="2001">2001</option>
                                                            <option value="2002">2002</option>
                                                            <option value="2003">2003</option>
                                                            <option value="2004">2004</option>
                                                            <option value="2005">2005</option>
                                                            <option value="2006">2006</option>
                                                            <option value="2007">2007</option>
                                                            <option value="2008">2008</option>
                                                            <option value="2009">2009</option>
                                                            <option value="2010">2010</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                        </select>
                                                    </div>
                                                </div>

                                               </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="form-check mb-3 mt-2 ml-3">
                                            <input class="form-check-input ml-3 paynow-radio" name="payments_status" type="radio" id="showBankDetailsNonEng" value="Paynow">
                                            <label class="form-check-label ml-4" for="showBankDetailsNonEng">Paynow</label>
                                            <input class="form-check-input ml-3 pledge-radio" name="payments_status" type="radio" id="pledgeNonEng" value="make_a_pledge">
                                            <label class="form-check-label ml-4" for="pledgeNonEng">Make a Pledge</label>
                                        </div>
                                        <span class="text-dark mb-2 ml-4">Attach Screenshots/ Receipt of Fund Transfer</span>

                                        <div class="form-group ml-3">
                                            <label for="prove">Proof:</label>
                                            <input type="file" id="prove" name="prove" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <input type="submit" name="submit" class="btn btn-primary mt-3">
                            </form>

                        </div>
                    </div>
                </div>


                <script>
                    function updateDegreeName() {
                        var degreeSelect = document.getElementById('degree');
                        var selectedOption = degreeSelect.options[degreeSelect.selectedIndex];
                        var degreeName = selectedOption.getAttribute('data-degree-name');
                        document.getElementById('degree_name').value = degreeName;
                    }
                </script>


                <!-- Circular Endowment UG Tab Content -->
                <div class="tab-pane fade" id="circular-endowment-ug" role="tabpanel" aria-labelledby="circular-endowment-ug-tab">
                            <h3 class="text-center text-dark mt-4">Circular Endowment: 4 seats in perpetuity - student after student (UG)</h3>
                        <div class="row mt-5">
                            <div class="col-md-4 mb-2">
                                <h3 class="text-light text-center p-3" style="background-color: #004476;">Engineering Students</h3>
                                <form action="{{url('default_perpetual_seat')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group" hidden>
                                        <label for="ugDegree">Degree:</label>
                                        <input type="text" name="program_type" value="Circular_endowment_UG_engineering_stud" class="form-control">
                                        <input type="text" name="degree" value="Engineering" class="form-control">
                                        <input type="text" name="seats" value="1" class="form-control">
                                    </div>
                                    <div class="row p-2 mt-4">
                                        <div class="form-group ml-3">
                                            <input type="checkbox" class="mess_checkbox" value="16000000">
                                            <label for="ugAdditionalExpenses">Include mess and hostel expenses (16,000,000 PKR)</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="ugTotalAmount">Total Amount:</label>
                                            <input type="text" class="total_amount form-control" name="totalAmount" class="form-control" value="18000000" readonly>
                                        </div>
                                    </div>

                                    {{-- Donor info --}}
                                    <div id="donorInfo">
                                        <h4 class="text-dark mt-4">Donor Information:</h4>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_name">Name:</label>
                                                    <input type="text" id="donor_name" name="donor_name" class="form-control " required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_email">Email:</label>
                                                    <input type="email" id="donor_email" name="donor_email" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone:</label>
                                                    <input type="number" id="phone" name="phone" class="form-control" required>
                                                </div>
                                            </div>
                                         <div class="row">
                                                <div class="container-fluid">
                                                    <div class="row ml-3">
                                                        <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial Partner</span>
                                                        <div class="col-md-10 mb-3">
                                                            <select class="form-control" name="about_partner" id="select-circular-endwment-ug-eng">
                                                                <option value="" disabled selected>Select an option</option>
                                                                <option value="Alumni">Alumni</option>
                                                                <option value="Industrial-Partner" id="ip_st_ce_eng_ug">Industrial Partner</option>
                                                                <option value="Philanthropist" id="Philanthropist_ce_eng_ug">Philanthropist</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row ml-4 d-none" id="philanthropist_ce-eng_ug_div">
                                                        <div class="col-md-10">
                                                            <label for="">How do you know us?</label>
                                                            <textarea name="philanthropist_text" id="" cols="40" rows="5" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        document.getElementById('select-circular-endwment-ug-eng').addEventListener('change', function() {
                                                            var selectedOption = this.value;
                                                            var philanthropistDiv = document.getElementById('philanthropist_ce-eng_ug_div');
                                                    
                                                            if (selectedOption === 'Philanthropist' || selectedOption === 'Industrial-Partner') {
                                                                philanthropistDiv.classList.remove('d-none');  // Show the div if "Philanthropist" or "Industrial Partner" is selected
                                                            } else {
                                                                philanthropistDiv.classList.add('d-none');  // Hide the div if another option is selected
                                                            }
                                                        });
                                                    </script>
                                                    
                                                    

                                                    <div class="row d-none ml-3" id="circular-endwment-ug-eng">
                                                        <div class="col-md-10">
                                                            <label for="school_select">Select School</label>
                                                            <select name="school" id="school_select" class="form-control">
                                                                <option value="" selected>Select School</option>
                                                                <option value="SCHOOL OF CIVIL & ENVIRONMENTAL ENGINEERING">SCEE</option>
                                                                <option value="SCHOOL OF CHEMICAL & MATERIALS ENGINEERING">SCME</option>
                                                                <option value="SCHOOL OF ELECTRICAL ENGINEERING & COMPUTER SCIENCE">SEECS</option>
                                                                <option value="SCHOOL OF MECHANICAL & MANUFACTURING ENGINEERING">SMME</option>
                                                                <option value="US-PAKISTAN CENTER FOR ADVANCED STUDIES IN ENERGY">US-PCASE</option>
                                                                <option value="NUST BALOCHISTAN CAMPUS, QUETTA">NUST BALOCHISTAN CAMPUS, QUETTA</option>
                                                                <option value="COLLEGE OF AERONAUTICAL ENGINEERING">COLLEGE OF AERONAUTICAL ENGINEERING</option>
                                                                <option value="COLLEGE OF ELECTRICAL & MECHANICAL ENGINEERING">COLLEGE OF EME</option>
                                                                <option value="MILITARY COLLEGE OF ENGINEERING">MCE</option>
                                                                <option value="MILITARY COLLEGE OF SIGNALS">MCS</option>
                                                                <option value="PAKISTAN NAVY ENGINEERING COLLEGE">PAKISTAN NAVY ENGINEERING COLLEGE</option>
                                                                <option value="NATIONAL INSTITUTE OF TRANSPORTATION">NATIONAL INSTITUTE OF TRANSPORTATION</option>
                                                                <option value="INSTITUTE OF ENVIRONMENTAL SCIENCES & ENGINEERING">IESE</option>
                                                                <option value="NUST INSTITUTE OF CIVIL ENGINEERING">NUST ICE</option>
                                                                <option value="INSTITUTE OF GEOGRAPHICAL INFORMATION SYSTEMS">IGIS</option>
                                                                <option value="NUST BUSINESS SCHOOL">NBS</option>
                                                                <option value="SCHOOL OF ART, DESIGN & ARCHITECTURE">SADA</option>
                                                                <option value="CENTRE FOR INTERNATIONAL PEACE & STABILITY">CIPS</option>
                                                                <option value="NUST INSTITUTE OF PEACE & CONFLICT STUDIES">NUST IPCS</option>
                                                                <option value="SCHOOL OF SOCIAL SCIENCES & HUMANITIES">SSSH</option>
                                                                <option value="ATTA-UR-RAHMAN SCHOOL OF APPLIED BIO SCIENCES">ASABS</option>
                                                                <option value="SCHOOL OF NATURAL SCIENCES">SNS</option>
                                                                <option value="NUST SCHOOL OF HEALTH SCIENCES">NUST SHS</option>
                                                                <option value="SCHOOL OF INTERDISCIPLINARY ENGINEERING & SCIENCES">SIES</option>
                                                                <!-- Add your school options here -->
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="country_select">Select Country</label>
                                                            <select name="country" id="country_select" class="form-control">
                                                                <option value="" selected>Select Country</option>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Australia">Australia</option>
                                                                <option value="Canada">Canada</option>
                                                                <option value="China">China</option>
                                                                <option value="Germany">Germany</option>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Qatar">Qatar</option>
                                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                                <option value="Turkey">Turkey</option>
                                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                                <option value="United Kingdom">United Kingdom</option>
                                                                <option value="United States">United States</option>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="year" class="form-label">Select Year of Graduation</label>
                                                            <select id="year" name="year" class="form-control">
                                                                <option value="" selected>Select Year of Graduation</option>
                                                                <option value="1990">1990</option>
                                                                <option value="1991">1991</option>
                                                                <option value="1992">1992</option>
                                                                <option value="1993">1993</option>
                                                                <option value="1994">1994</option>
                                                                <option value="1995">1995</option>
                                                                <option value="1996">1996</option>
                                                                <option value="1997">1997</option>
                                                                <option value="1998">1998</option>
                                                                <option value="1999">1999</option>
                                                                <option value="2000">2000</option>
                                                                <option value="2001">2001</option>
                                                                <option value="2002">2002</option>
                                                                <option value="2003">2003</option>
                                                                <option value="2004">2004</option>
                                                                <option value="2005">2005</option>
                                                                <option value="2006">2006</option>
                                                                <option value="2007">2007</option>
                                                                <option value="2008">2008</option>
                                                                <option value="2009">2009</option>
                                                                <option value="2010">2010</option>
                                                                <option value="2011">2011</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2013">2013</option>
                                                                <option value="2014">2014</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2016">2016</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2020">2020</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                   </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="form-check mb-3 mt-2 ml-3">
                                                <input class="form-check-input ml-3 paynow-radio" name="payments_status" type="radio" id="showBankDetailsNonEng" value="Paynow">
                                                <label class="form-check-label ml-4" for="showBankDetailsNonEng">Paynow</label>
                                                <input class="form-check-input ml-3 pledge-radio" name="payments_status" type="radio" id="pledgeNonEng" value="make_a_pledge">
                                                <label class="form-check-label ml-4" for="pledgeNonEng">Make a Pledge</label>
                                            </div>
                                            <span class="text-dark mb-2 ml-4">Attach Screenshots/ Receipt of Fund Transfer</span>

                                            <div class="form-group ml-3">
                                                <label for="prove">Proof:</label>
                                                <input type="file" id="prove" name="prove" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" name="submit" id="" class="btn btn-primary">
                                </form>

                            </div>


                            <div class="col-md-4 mb-2">
                                <h3 class="text-light text-center p-3" style="background-color: #004476;">Non-Engineering Students</h3>
                                <form action="{{url('default_perpetual_seat')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group" hidden>
                                        <label for="ugDegree">Select Degree:</label>
                                        <input type="text" name="program_type" value="Circular_endowment_UG_non_engineering_stud" class="form-control">

                                        <input type="text" name="degree" value="Non-Engineering" class="form-control">
                                        <input type="text" name="seats" value="1" class="form-control">
                                    </div>
                                    <div class="row p-2 mt-4">
                                        <div class="form-group ml-3">
                                            <input type="checkbox" class="mess_checkbox" value="16000000">
                                            <label for="ugAdditionalExpenses">Include mess and hostel expenses (16,000,000 PKR)</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="ugTotalAmount">Total Amount:</label>
                                            <input type="text" class="total_amount form-control" name="totalAmount" class="form-control" value="30000000" readonly>
                                        </div>
                                    </div>

                                    {{-- Donor info --}}
                                    <div id="donorInfo">
                                        <h4 class="text-dark mt-4">Donor Information:</h4>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_name">Name:</label>
                                                    <input type="text" id="donor_name" name="donor_name" class="form-control " required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_email">Email:</label>
                                                    <input type="email" id="donor_email" name="donor_email" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone:</label>
                                                    <input type="number" id="phone" name="phone" class="form-control" required>
                                                </div>
                                            </div>
                                         <div class="row">
                                                <div class="container-fluid">
                                                    <div class="row ml-3">
                                                        <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial Partner</span>
                                                        <div class="col-md-10 mb-3">
                                                            <select class="form-control" name="about_partner" id="select-circular-endwment-ug-neng">
                                                                <option value="" disabled selected>Select an option</option>
                                                                <option value="Alumni">Alumni</option>
                                                                <option value="Industrial-Partner" id="ip_ce_noneng_ug">Industrial Partner</option>
                                                                <option value="Philanthropist" id="Philanthropist_ce_noneng_ug">Philanthropist</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row ml-4 d-none" id="philanthropist_ce-noneng_ug_div">
                                                        <div class="col-md-10">
                                                            <label for="">How do you know us?</label>
                                                            <textarea name="philanthropist_text" id="" cols="40" rows="5" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        document.getElementById('select-circular-endwment-ug-neng').addEventListener('change', function() {
                                                            var selectedOption = this.value;
                                                            var philanthropistDiv = document.getElementById('philanthropist_ce-noneng_ug_div');
                                                    
                                                            if (selectedOption === 'Philanthropist' || selectedOption === 'Industrial-Partner') {
                                                                philanthropistDiv.classList.remove('d-none');  // Show the div if "Philanthropist" or "Industrial Partner" is selected
                                                            } else {
                                                                philanthropistDiv.classList.add('d-none');  // Hide the div if another option is selected
                                                            }
                                                        });
                                                    </script>
                                                    
                                                    

                                                    <div class="row d-none ml-3" id="circular-endwment-ug-neng">
                                                        <div class="col-md-10">
                                                            <label for="school_select">Select School</label>
                                                            <select name="school" id="school_select" class="form-control">
                                                                <option value="" selected>Select School</option>
                                                                <option value="SCHOOL OF CIVIL & ENVIRONMENTAL ENGINEERING">SCEE</option>
                                                                <option value="SCHOOL OF CHEMICAL & MATERIALS ENGINEERING">SCME</option>
                                                                <option value="SCHOOL OF ELECTRICAL ENGINEERING & COMPUTER SCIENCE">SEECS</option>
                                                                <option value="SCHOOL OF MECHANICAL & MANUFACTURING ENGINEERING">SMME</option>
                                                                <option value="US-PAKISTAN CENTER FOR ADVANCED STUDIES IN ENERGY">US-PCASE</option>
                                                                <option value="NUST BALOCHISTAN CAMPUS, QUETTA">NUST BALOCHISTAN CAMPUS, QUETTA</option>
                                                                <option value="COLLEGE OF AERONAUTICAL ENGINEERING">COLLEGE OF AERONAUTICAL ENGINEERING</option>
                                                                <option value="COLLEGE OF ELECTRICAL & MECHANICAL ENGINEERING">COLLEGE OF EME</option>
                                                                <option value="MILITARY COLLEGE OF ENGINEERING">MCE</option>
                                                                <option value="MILITARY COLLEGE OF SIGNALS">MCS</option>
                                                                <option value="PAKISTAN NAVY ENGINEERING COLLEGE">PAKISTAN NAVY ENGINEERING COLLEGE</option>
                                                                <option value="NATIONAL INSTITUTE OF TRANSPORTATION">NATIONAL INSTITUTE OF TRANSPORTATION</option>
                                                                <option value="INSTITUTE OF ENVIRONMENTAL SCIENCES & ENGINEERING">IESE</option>
                                                                <option value="NUST INSTITUTE OF CIVIL ENGINEERING">NUST ICE</option>
                                                                <option value="INSTITUTE OF GEOGRAPHICAL INFORMATION SYSTEMS">IGIS</option>
                                                                <option value="NUST BUSINESS SCHOOL">NBS</option>
                                                                <option value="SCHOOL OF ART, DESIGN & ARCHITECTURE">SADA</option>
                                                                <option value="CENTRE FOR INTERNATIONAL PEACE & STABILITY">CIPS</option>
                                                                <option value="NUST INSTITUTE OF PEACE & CONFLICT STUDIES">NUST IPCS</option>
                                                                <option value="SCHOOL OF SOCIAL SCIENCES & HUMANITIES">SSSH</option>
                                                                <option value="ATTA-UR-RAHMAN SCHOOL OF APPLIED BIO SCIENCES">ASABS</option>
                                                                <option value="SCHOOL OF NATURAL SCIENCES">SNS</option>
                                                                <option value="NUST SCHOOL OF HEALTH SCIENCES">NUST SHS</option>
                                                                <option value="SCHOOL OF INTERDISCIPLINARY ENGINEERING & SCIENCES">SIES</option>
                                                                <!-- Add your school options here -->
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="country_select">Select Country</label>
                                                            <select name="country" id="country_select" class="form-control">
                                                                <option value="" selected>Select Country</option>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Australia">Australia</option>
                                                                <option value="Canada">Canada</option>
                                                                <option value="China">China</option>
                                                                <option value="Germany">Germany</option>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Qatar">Qatar</option>
                                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                                <option value="Turkey">Turkey</option>
                                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                                <option value="United Kingdom">United Kingdom</option>
                                                                <option value="United States">United States</option>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="year" class="form-label">Select Year of Graduation</label>
                                                            <select id="year" name="year" class="form-control">
                                                                <option value="" selected>Select Year of Graduation</option>
                                                                <option value="1990">1990</option>
                                                                <option value="1991">1991</option>
                                                                <option value="1992">1992</option>
                                                                <option value="1993">1993</option>
                                                                <option value="1994">1994</option>
                                                                <option value="1995">1995</option>
                                                                <option value="1996">1996</option>
                                                                <option value="1997">1997</option>
                                                                <option value="1998">1998</option>
                                                                <option value="1999">1999</option>
                                                                <option value="2000">2000</option>
                                                                <option value="2001">2001</option>
                                                                <option value="2002">2002</option>
                                                                <option value="2003">2003</option>
                                                                <option value="2004">2004</option>
                                                                <option value="2005">2005</option>
                                                                <option value="2006">2006</option>
                                                                <option value="2007">2007</option>
                                                                <option value="2008">2008</option>
                                                                <option value="2009">2009</option>
                                                                <option value="2010">2010</option>
                                                                <option value="2011">2011</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2013">2013</option>
                                                                <option value="2014">2014</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2016">2016</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2020">2020</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                   </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="form-check mb-3 mt-2 ml-3">
                                                <input class="form-check-input ml-3 paynow-radio" name="payments_status" type="radio" id="showBankDetailsNonEng" value="Paynow">
                                                <label class="form-check-label ml-4" for="showBankDetailsNonEng">Paynow</label>
                                                <input class="form-check-input ml-3 pledge-radio" name="payments_status" type="radio" id="pledgeNonEng" value="make_a_pledge">
                                                <label class="form-check-label ml-4" for="pledgeNonEng">Make a Pledge</label>
                                            </div>
                                            <span class="text-dark mb-2 ml-4">Attach Screenshots/ Receipt of Fund Transfer</span>

                                            <div class="form-group ml-3">
                                                <label for="prove">Proof:</label>
                                                <input type="file" id="prove" name="prove" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" id="" class="btn btn-primary">
                                </form>

                            </div>

                            <div class="col-md-4 mb-2 ">
                                <form action="{{url('perpetualseatyourname')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <h3  class="text-light text-center p-3" style="background-color: #004476;" >Customize Your Package</h3>
                                    {{-- <h3 class="text-dark text-center mb-4">Circular Endowment for UG:</h3> --}}

                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="program" value="UG" hidden>
                                            <input type="text" name="endowment_type" value="Circular_endowment" hidden>
                                            <div class="form-group">
                                                <label for="circular_ugDegree">Select Options:</label>
                                                <select id="circular_ugDegree" name="degree" class="form-control form-control-sm">
                                                    <option value="">Select Degree</option>
                                                    @foreach ($undergraduate as $degree)
                                                        <option value="{{ $degree->fee }}" data-degree-name="{{ $degree->degree }}">{{ $degree->degree }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="hidden" id="circular_ugDegreeName" name="degree_name">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="circular_ugNoOfSeat">No of seats:</label>
                                                <input type="number" id="circular_ugNoOfSeat" name="seats" class="form-control form-control-sm" value="1" min="1">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check mb-3">
                                                <input type="checkbox" id="circular_ugAdditionalExpenses" value="275000" class="form-check-input">
                                                <label for="circular_ugAdditionalExpenses" class="form-check-label">Include mess and hostel expenses (275,000 PKR)</label>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="circular_ugTotalAmount">Total Amount (UG):</label>
                                                <input type="text" id="circular_ugTotalAmount" name="totalAmount" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-12 ">

                                            <a href="{{url('student_stories')}}" class="btn btn-info btn-sm" style="background-color: #FFA500;">Nurture a Dream
                                                <br>
                                                Read student stories and select a story of your choice.
                                            </a>
                                            <br>
                                            <span></span>
                                    </div>

                                    <div id="donorInfo">
                                        <h4 class="text-dark mt-4">Donor Information:</h4>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_name">Name:</label>
                                                    <input type="text" id="donor_name" name="donor_name" class="form-control " required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_email">Email:</label>
                                                    <input type="email" id="donor_email" name="donor_email" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone:</label>
                                                    <input type="number" id="phone" name="phone" class="form-control" required>
                                                </div>
                                            </div>
                                         <div class="row">
                                                <div class="container-fluid">
                                                    <div class="row ml-3">
                                                        <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial Partner</span>
                                                        <div class="col-md-10 mb-3">
                                                            <select class="form-control" name="about_partner" id="select-custom-circular-endwment-ug-eng">
                                                                <option value="" disabled selected>Select an option</option>
                                                                <option value="Alumni">Alumni</option>
                                                                <option value="Industrial-Partner" id="ip_ce_custom_ug">Industrial Partner</option>
                                                                <option value="Philanthropist" id="Philanthropist_ce_custom_ug">Philanthropist</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row ml-4 d-none" id="philanthropist_ce_custom_ug_div">
                                                        <div class="col-md-10">
                                                            <label for="">How do you know us?</label>
                                                            <textarea name="philanthropist_text" id="" cols="40" rows="5" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        document.getElementById('select-custom-circular-endwment-ug-eng').addEventListener('change', function() {
                                                            var selectedOption = this.value;
                                                            var philanthropistDiv = document.getElementById('philanthropist_ce_custom_ug_div');
                                                    
                                                            if (selectedOption === 'Philanthropist' || selectedOption === 'Industrial-Partner') {
                                                                philanthropistDiv.classList.remove('d-none');  // Show the div if "Philanthropist" or "Industrial Partner" is selected
                                                            } else {
                                                                philanthropistDiv.classList.add('d-none');  // Hide the div if another option is selected
                                                            }
                                                        });
                                                    </script>
                                                    
                                                    
                                                    <div class="row d-none ml-3" id="custom-circular-endwment-ug-eng">
                                                        <div class="col-md-10">
                                                            <label for="school_select">Select School</label>
                                                            <select name="school" id="school_select" class="form-control">
                                                                <option value="" selected>Select School</option>
                                                                <option value="SCHOOL OF CIVIL & ENVIRONMENTAL ENGINEERING">SCEE</option>
                                                                <option value="SCHOOL OF CHEMICAL & MATERIALS ENGINEERING">SCME</option>
                                                                <option value="SCHOOL OF ELECTRICAL ENGINEERING & COMPUTER SCIENCE">SEECS</option>
                                                                <option value="SCHOOL OF MECHANICAL & MANUFACTURING ENGINEERING">SMME</option>
                                                                <option value="US-PAKISTAN CENTER FOR ADVANCED STUDIES IN ENERGY">US-PCASE</option>
                                                                <option value="NUST BALOCHISTAN CAMPUS, QUETTA">NUST BALOCHISTAN CAMPUS, QUETTA</option>
                                                                <option value="COLLEGE OF AERONAUTICAL ENGINEERING">COLLEGE OF AERONAUTICAL ENGINEERING</option>
                                                                <option value="COLLEGE OF ELECTRICAL & MECHANICAL ENGINEERING">COLLEGE OF EME</option>
                                                                <option value="MILITARY COLLEGE OF ENGINEERING">MCE</option>
                                                                <option value="MILITARY COLLEGE OF SIGNALS">MCS</option>
                                                                <option value="PAKISTAN NAVY ENGINEERING COLLEGE">PAKISTAN NAVY ENGINEERING COLLEGE</option>
                                                                <option value="NATIONAL INSTITUTE OF TRANSPORTATION">NATIONAL INSTITUTE OF TRANSPORTATION</option>
                                                                <option value="INSTITUTE OF ENVIRONMENTAL SCIENCES & ENGINEERING">IESE</option>
                                                                <option value="NUST INSTITUTE OF CIVIL ENGINEERING">NUST ICE</option>
                                                                <option value="INSTITUTE OF GEOGRAPHICAL INFORMATION SYSTEMS">IGIS</option>
                                                                <option value="NUST BUSINESS SCHOOL">NBS</option>
                                                                <option value="SCHOOL OF ART, DESIGN & ARCHITECTURE">SADA</option>
                                                                <option value="CENTRE FOR INTERNATIONAL PEACE & STABILITY">CIPS</option>
                                                                <option value="NUST INSTITUTE OF PEACE & CONFLICT STUDIES">NUST IPCS</option>
                                                                <option value="SCHOOL OF SOCIAL SCIENCES & HUMANITIES">SSSH</option>
                                                                <option value="ATTA-UR-RAHMAN SCHOOL OF APPLIED BIO SCIENCES">ASABS</option>
                                                                <option value="SCHOOL OF NATURAL SCIENCES">SNS</option>
                                                                <option value="NUST SCHOOL OF HEALTH SCIENCES">NUST SHS</option>
                                                                <option value="SCHOOL OF INTERDISCIPLINARY ENGINEERING & SCIENCES">SIES</option>
                                                                <!-- Add your school options here -->
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="country_select">Select Country</label>
                                                            <select name="country" id="country_select" class="form-control">
                                                                <option value="" selected>Select Country</option>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Australia">Australia</option>
                                                                <option value="Canada">Canada</option>
                                                                <option value="China">China</option>
                                                                <option value="Germany">Germany</option>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Qatar">Qatar</option>
                                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                                <option value="Turkey">Turkey</option>
                                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                                <option value="United Kingdom">United Kingdom</option>
                                                                <option value="United States">United States</option>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="year" class="form-label">Select Year of Graduation</label>
                                                            <select id="year" name="year" class="form-control">
                                                                <option value="" selected>Select Year of Graduation</option>
                                                                <option value="1990">1990</option>
                                                                <option value="1991">1991</option>
                                                                <option value="1992">1992</option>
                                                                <option value="1993">1993</option>
                                                                <option value="1994">1994</option>
                                                                <option value="1995">1995</option>
                                                                <option value="1996">1996</option>
                                                                <option value="1997">1997</option>
                                                                <option value="1998">1998</option>
                                                                <option value="1999">1999</option>
                                                                <option value="2000">2000</option>
                                                                <option value="2001">2001</option>
                                                                <option value="2002">2002</option>
                                                                <option value="2003">2003</option>
                                                                <option value="2004">2004</option>
                                                                <option value="2005">2005</option>
                                                                <option value="2006">2006</option>
                                                                <option value="2007">2007</option>
                                                                <option value="2008">2008</option>
                                                                <option value="2009">2009</option>
                                                                <option value="2010">2010</option>
                                                                <option value="2011">2011</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2013">2013</option>
                                                                <option value="2014">2014</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2016">2016</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2020">2020</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                   </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="form-check mb-3 mt-2 ml-3">
                                                <input class="form-check-input ml-3 paynow-radio" name="payments_status" type="radio" id="showBankDetailsNonEng" value="Paynow">
                                                <label class="form-check-label ml-4" for="showBankDetailsNonEng">Paynow</label>
                                                <input class="form-check-input ml-3 pledge-radio" name="payments_status" type="radio" id="pledgeNonEng" value="make_a_pledge">
                                                <label class="form-check-label ml-4" for="pledgeNonEng">Make a Pledge</label>
                                            </div>
                                            <span class="text-dark mb-2 ml-4">Attach Screenshots/ Receipt of Fund Transfer</span>

                                            <div class="form-group ml-3">
                                                <label for="prove">Proof:</label>
                                                <input type="file" id="prove" name="prove" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    </div>
                                    <input type="submit" name="submit" class="btn btn-primary mt-3">
                                </form>

                            </div>
                        </div>
                    <!-- Add more content as needed -->
                </div>

                <!-- Single Endowment PG Tab Content -->
                <div class="tab-pane fade" id="single-endowment-pg" role="tabpanel" aria-labelledby="single-endowment-pg-tab">
                    <h3 class="text-center text-dark mt-4">Singular Endowment: Establish one Seat in perpetuity (PG)</h3>
                        <div class="row mt-5">

                            <div class="col-md-4 mb-2">
                                <h3 class="text-light text-center p-3" style="background-color: #004476;">Postgraduate Engineering Students</h3>
                                <form action="{{url('default_perpetual_seat')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group" hidden>
                                        <label for="pgDegree">Degree:</label>
                                        <input type="text" name="program_type" value="Single_endowment_PG_engineering_stud" class="form-control">

                                        <input type="text" name="degree" value="Postgraduate Engineering" class="form-control">
                                        <input type="text" name="seats" value="1" class="form-control">
                                    </div>
                                    <div class="row p-2 mt-4">
                                        <div class="form-group ml-3">
                                            <input type="checkbox" class="mess_checkbox" value="4000000">
                                            <label for="pgAdditionalExpenses">Include mess and hostel expenses (4,000,000 PKR)</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="pgTotalAmount">Total Amount:</label>
                                            <input type="text" class="total_amount form-control" name="totalAmount" class="form-control" value="4500000" readonly>
                                        </div>
                                    </div>

                                    {{-- Donor info --}}
                                    <div id="donorInfo">
                                        <h4 class="text-dark mt-4">Donor Information:</h4>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_name">Name:</label>
                                                    <input type="text" id="donor_name" name="donor_name" class="form-control " required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_email">Email:</label>
                                                    <input type="email" id="donor_email" name="donor_email" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone:</label>
                                                    <input type="number" id="phone" name="phone" class="form-control" required>
                                                </div>
                                            </div>
                                         <div class="row">
                                                <div class="container-fluid">
                                                    <div class="row ml-3">
                                                        <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial Partner</span>
                                                        <div class="col-md-10 mb-3">
                                                            <select class="form-control" name="about_partner" id="select-single-endwment-pg-eng">
                                                                <option value="" disabled selected>Select an option</option>
                                                                <option value="Alumni">Alumni</option>
                                                                <option value="Industrial-Partner" id="ip_se_eng_pg">Industrial Partner</option>
                                                                <option value="Philanthropist" id="Philanthropist_se_eng_pg">Philanthropist</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row ml-4 d-none" id="philanthropist_se_eng_pg_div">
                                                        <div class="col-md-10">
                                                            <label for="">How do you know us?</label>
                                                            <textarea name="philanthropist_text" id="" cols="40" rows="5" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        document.getElementById('select-single-endwment-pg-eng').addEventListener('change', function() {
                                                            var selectedOption = this.value;
                                                            var philanthropistDiv = document.getElementById('philanthropist_se_eng_pg_div');
                                                    
                                                            // Check if the selected option is either 'Industrial-Partner' or 'Philanthropist'
                                                            if (selectedOption === 'Industrial-Partner' || selectedOption === 'Philanthropist') {
                                                                philanthropistDiv.classList.remove('d-none');  // Show the div if either is selected
                                                            } else {
                                                                philanthropistDiv.classList.add('d-none');  // Hide the div for any other selection
                                                            }
                                                        });
                                                    </script>
                                                    
                                                    
                                                    

                                                    <div class="row d-none ml-3" id="single-endwment-pg-eng">
                                                        <div class="col-md-10">
                                                            <label for="school_select">Select School</label>
                                                            <select name="school" id="school_select" class="form-control">
                                                                <option value="" selected>Select School</option>
                                                                <option value="SCHOOL OF CIVIL & ENVIRONMENTAL ENGINEERING">SCEE</option>
                                                                <option value="SCHOOL OF CHEMICAL & MATERIALS ENGINEERING">SCME</option>
                                                                <option value="SCHOOL OF ELECTRICAL ENGINEERING & COMPUTER SCIENCE">SEECS</option>
                                                                <option value="SCHOOL OF MECHANICAL & MANUFACTURING ENGINEERING">SMME</option>
                                                                <option value="US-PAKISTAN CENTER FOR ADVANCED STUDIES IN ENERGY">US-PCASE</option>
                                                                <option value="NUST BALOCHISTAN CAMPUS, QUETTA">NUST BALOCHISTAN CAMPUS, QUETTA</option>
                                                                <option value="COLLEGE OF AERONAUTICAL ENGINEERING">COLLEGE OF AERONAUTICAL ENGINEERING</option>
                                                                <option value="COLLEGE OF ELECTRICAL & MECHANICAL ENGINEERING">COLLEGE OF EME</option>
                                                                <option value="MILITARY COLLEGE OF ENGINEERING">MCE</option>
                                                                <option value="MILITARY COLLEGE OF SIGNALS">MCS</option>
                                                                <option value="PAKISTAN NAVY ENGINEERING COLLEGE">PAKISTAN NAVY ENGINEERING COLLEGE</option>
                                                                <option value="NATIONAL INSTITUTE OF TRANSPORTATION">NATIONAL INSTITUTE OF TRANSPORTATION</option>
                                                                <option value="INSTITUTE OF ENVIRONMENTAL SCIENCES & ENGINEERING">IESE</option>
                                                                <option value="NUST INSTITUTE OF CIVIL ENGINEERING">NUST ICE</option>
                                                                <option value="INSTITUTE OF GEOGRAPHICAL INFORMATION SYSTEMS">IGIS</option>
                                                                <option value="NUST BUSINESS SCHOOL">NBS</option>
                                                                <option value="SCHOOL OF ART, DESIGN & ARCHITECTURE">SADA</option>
                                                                <option value="CENTRE FOR INTERNATIONAL PEACE & STABILITY">CIPS</option>
                                                                <option value="NUST INSTITUTE OF PEACE & CONFLICT STUDIES">NUST IPCS</option>
                                                                <option value="SCHOOL OF SOCIAL SCIENCES & HUMANITIES">SSSH</option>
                                                                <option value="ATTA-UR-RAHMAN SCHOOL OF APPLIED BIO SCIENCES">ASABS</option>
                                                                <option value="SCHOOL OF NATURAL SCIENCES">SNS</option>
                                                                <option value="NUST SCHOOL OF HEALTH SCIENCES">NUST SHS</option>
                                                                <option value="SCHOOL OF INTERDISCIPLINARY ENGINEERING & SCIENCES">SIES</option>
                                                                <!-- Add your school options here -->
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="country_select">Select Country</label>
                                                            <select name="country" id="country_select" class="form-control">
                                                                <option value="" selected>Select Country</option>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Australia">Australia</option>
                                                                <option value="Canada">Canada</option>
                                                                <option value="China">China</option>
                                                                <option value="Germany">Germany</option>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Qatar">Qatar</option>
                                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                                <option value="Turkey">Turkey</option>
                                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                                <option value="United Kingdom">United Kingdom</option>
                                                                <option value="United States">United States</option>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="year" class="form-label">Select Year of Graduation</label>
                                                            <select id="year" name="year" class="form-control">
                                                                <option value="" selected>Select Year of Graduation</option>
                                                                <option value="1990">1990</option>
                                                                <option value="1991">1991</option>
                                                                <option value="1992">1992</option>
                                                                <option value="1993">1993</option>
                                                                <option value="1994">1994</option>
                                                                <option value="1995">1995</option>
                                                                <option value="1996">1996</option>
                                                                <option value="1997">1997</option>
                                                                <option value="1998">1998</option>
                                                                <option value="1999">1999</option>
                                                                <option value="2000">2000</option>
                                                                <option value="2001">2001</option>
                                                                <option value="2002">2002</option>
                                                                <option value="2003">2003</option>
                                                                <option value="2004">2004</option>
                                                                <option value="2005">2005</option>
                                                                <option value="2006">2006</option>
                                                                <option value="2007">2007</option>
                                                                <option value="2008">2008</option>
                                                                <option value="2009">2009</option>
                                                                <option value="2010">2010</option>
                                                                <option value="2011">2011</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2013">2013</option>
                                                                <option value="2014">2014</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2016">2016</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2020">2020</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                   </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="form-check mb-3 mt-2 ml-3">
                                                <input class="form-check-input ml-3 paynow-radio" name="payments_status" type="radio" id="showBankDetailsNonEng" value="Paynow">
                                                <label class="form-check-label ml-4" for="showBankDetailsNonEng">Paynow</label>
                                                <input class="form-check-input ml-3 pledge-radio" name="payments_status" type="radio" id="pledgeNonEng" value="make_a_pledge">
                                                <label class="form-check-label ml-4" for="pledgeNonEng">Make a Pledge</label>
                                            </div>
                                            <span class="text-dark mb-2 ml-4">Attach Screenshots/ Receipt of Fund Transfer</span>

                                            <div class="form-group ml-3">
                                                <label for="prove">Proof:</label>
                                                <input type="file" id="prove" name="prove" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" name="submit" id="" class="btn btn-primary">
                                </form>
                            </div>

                            <div class="col-md-4 mb-2">
                                <h3 class="text-light text-center p-3" style="background-color: #004476;">Postgraduate Non-Engineering Students</h3>
                                <form action="{{url('default_perpetual_seat')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group" hidden>
                                        <label for="pgDegree">Select Degree:</label>
                                        <input type="text" name="program_type" value="Single_endowment_PG_non_engineering_stud" class="form-control">
                                        <input type="text" name="degree" value="Postgraduate Non-Engineering" class="form-control">
                                        <input type="text" name="seats" value="1" class="form-control">
                                    </div>
                                    <div class="row p-2 mt-4">
                                        <div class="form-group ml-3">
                                            <input type="checkbox" class="mess_checkbox" value="4000000">
                                            <label for="pgAdditionalExpenses">Include mess and hostel expenses (4,000,000 PKR)</label>
                                        </div>
                                        <div class="form-group">
                                            <label for="pgTotalAmount">Total Amount:</label>
                                            <input type="number" class="total_amount form-control" name="totalAmount" class="form-control" value="7500000" readonly>
                                        </div>
                                    </div>

                                    {{-- Donor info --}}
                                    <div id="donorInfo">
                                        <h4 class="text-dark mt-4">Donor Information:</h4>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_name">Name:</label>
                                                    <input type="text" id="donor_name" name="donor_name" class="form-control " required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_email">Email:</label>
                                                    <input type="email" id="donor_email" name="donor_email" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone:</label>
                                                    <input type="number" id="phone" name="phone" class="form-control" required>
                                                </div>
                                            </div>
                                         <div class="row">
                                                <div class="container-fluid">
                                                    <div class="row ml-3">
                                                        <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial Partner</span>
                                                        <div class="col-md-10 mb-3">
                                                            <select class="form-control" name="about_partner" id="select-single-endwment-pg-neng">
                                                                <option value="" disabled selected>Select an option</option>
                                                                <option value="Alumni">Alumni</option>
                                                                <option value="Industrial-Partner" id="ip_se_noneng_pg">Industrial Partner</option>
                                                                <option value="Philanthropist" id="Philanthropist_se_noneng_pg">Philanthropist</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row ml-4 d-none" id="philanthropist_se_noneng_ug_div">
                                                        <div class="col-md-10">
                                                            <label for="">How do you know us?</label>
                                                            <textarea name="philanthropist_text" id="" cols="40" rows="5" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        document.getElementById('select-single-endwment-pg-neng').addEventListener('change', function() {
                                                            var selectedOption = this.value;
                                                            var philanthropistDiv = document.getElementById('philanthropist_se_noneng_ug_div');
                                                    
                                                            // Check if the selected option is either 'Industrial-Partner' or 'Philanthropist'
                                                            if (selectedOption === 'Industrial-Partner' || selectedOption === 'Philanthropist') {
                                                                philanthropistDiv.classList.remove('d-none');  // Show the div if either is selected
                                                            } else {
                                                                philanthropistDiv.classList.add('d-none');  // Hide the div for any other selection
                                                            }
                                                        });
                                                    </script>
                                                                                                        
                                                    

                                                    <div class="row d-none ml-3" id="single-endwment-pg-neng">
                                                        <div class="col-md-10">
                                                            <label for="school_select">Select School</label>
                                                            <select name="school" id="school_select" class="form-control">
                                                                <option value="" selected>Select School</option>
                                                                <option value="SCHOOL OF CIVIL & ENVIRONMENTAL ENGINEERING">SCEE</option>
                                                                <option value="SCHOOL OF CHEMICAL & MATERIALS ENGINEERING">SCME</option>
                                                                <option value="SCHOOL OF ELECTRICAL ENGINEERING & COMPUTER SCIENCE">SEECS</option>
                                                                <option value="SCHOOL OF MECHANICAL & MANUFACTURING ENGINEERING">SMME</option>
                                                                <option value="US-PAKISTAN CENTER FOR ADVANCED STUDIES IN ENERGY">US-PCASE</option>
                                                                <option value="NUST BALOCHISTAN CAMPUS, QUETTA">NUST BALOCHISTAN CAMPUS, QUETTA</option>
                                                                <option value="COLLEGE OF AERONAUTICAL ENGINEERING">COLLEGE OF AERONAUTICAL ENGINEERING</option>
                                                                <option value="COLLEGE OF ELECTRICAL & MECHANICAL ENGINEERING">COLLEGE OF EME</option>
                                                                <option value="MILITARY COLLEGE OF ENGINEERING">MCE</option>
                                                                <option value="MILITARY COLLEGE OF SIGNALS">MCS</option>
                                                                <option value="PAKISTAN NAVY ENGINEERING COLLEGE">PAKISTAN NAVY ENGINEERING COLLEGE</option>
                                                                <option value="NATIONAL INSTITUTE OF TRANSPORTATION">NATIONAL INSTITUTE OF TRANSPORTATION</option>
                                                                <option value="INSTITUTE OF ENVIRONMENTAL SCIENCES & ENGINEERING">IESE</option>
                                                                <option value="NUST INSTITUTE OF CIVIL ENGINEERING">NUST ICE</option>
                                                                <option value="INSTITUTE OF GEOGRAPHICAL INFORMATION SYSTEMS">IGIS</option>
                                                                <option value="NUST BUSINESS SCHOOL">NBS</option>
                                                                <option value="SCHOOL OF ART, DESIGN & ARCHITECTURE">SADA</option>
                                                                <option value="CENTRE FOR INTERNATIONAL PEACE & STABILITY">CIPS</option>
                                                                <option value="NUST INSTITUTE OF PEACE & CONFLICT STUDIES">NUST IPCS</option>
                                                                <option value="SCHOOL OF SOCIAL SCIENCES & HUMANITIES">SSSH</option>
                                                                <option value="ATTA-UR-RAHMAN SCHOOL OF APPLIED BIO SCIENCES">ASABS</option>
                                                                <option value="SCHOOL OF NATURAL SCIENCES">SNS</option>
                                                                <option value="NUST SCHOOL OF HEALTH SCIENCES">NUST SHS</option>
                                                                <option value="SCHOOL OF INTERDISCIPLINARY ENGINEERING & SCIENCES">SIES</option>
                                                                <!-- Add your school options here -->
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="country_select">Select Country</label>
                                                            <select name="country" id="country_select" class="form-control">
                                                                <option value="" selected>Select Country</option>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Australia">Australia</option>
                                                                <option value="Canada">Canada</option>
                                                                <option value="China">China</option>
                                                                <option value="Germany">Germany</option>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Qatar">Qatar</option>
                                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                                <option value="Turkey">Turkey</option>
                                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                                <option value="United Kingdom">United Kingdom</option>
                                                                <option value="United States">United States</option>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="year" class="form-label">Select Year of Graduation</label>
                                                            <select id="year" name="year" class="form-control">
                                                                <option value="" selected>Select Year of Graduation</option>
                                                                <option value="1990">1990</option>
                                                                <option value="1991">1991</option>
                                                                <option value="1992">1992</option>
                                                                <option value="1993">1993</option>
                                                                <option value="1994">1994</option>
                                                                <option value="1995">1995</option>
                                                                <option value="1996">1996</option>
                                                                <option value="1997">1997</option>
                                                                <option value="1998">1998</option>
                                                                <option value="1999">1999</option>
                                                                <option value="2000">2000</option>
                                                                <option value="2001">2001</option>
                                                                <option value="2002">2002</option>
                                                                <option value="2003">2003</option>
                                                                <option value="2004">2004</option>
                                                                <option value="2005">2005</option>
                                                                <option value="2006">2006</option>
                                                                <option value="2007">2007</option>
                                                                <option value="2008">2008</option>
                                                                <option value="2009">2009</option>
                                                                <option value="2010">2010</option>
                                                                <option value="2011">2011</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2013">2013</option>
                                                                <option value="2014">2014</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2016">2016</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2020">2020</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                   </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="form-check mb-3 mt-2 ml-3">
                                                <input class="form-check-input ml-3 paynow-radio" name="payments_status" type="radio" id="showBankDetailsNonEng" value="Paynow">
                                                <label class="form-check-label ml-4" for="showBankDetailsNonEng">Paynow</label>
                                                <input class="form-check-input ml-3 pledge-radio" name="payments_status" type="radio" id="pledgeNonEng" value="make_a_pledge">
                                                <label class="form-check-label ml-4" for="pledgeNonEng">Make a Pledge</label>
                                            </div>
                                            <span class="text-dark mb-2 ml-4">Attach Screenshots/ Receipt of Fund Transfer</span>

                                            <div class="form-group ml-3">
                                                <label for="prove">Proof:</label>
                                                <input type="file" id="prove" name="prove" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" name="submit" id="" class="btn btn-primary">
                                </form>

                            </div>

                                <div class="col-md-4 mb-2">

                                    <form action="{{url('perpetualseatyourname')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <h3  class="text-light text-center p-3" style="background-color: #004476;" >Customize Your Package</h3>
                                        {{-- <h3 class="text-dark text-center mb-4">Single Endowment for PG:</h3> --}}

                                        <br>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" name="program" value="PG" hidden>
                                                <input type="text" name="endowment_type" value="Single_endowment" hidden>
                                                <div class="form-group">
                                                    <label for="single_pgDegree">Select Options:</label>
                                                    <select id="single_pgDegree" name="degree" class="form-control form-control-sm">
                                                        <option value="">Select Degree</option>
                                                        @foreach ($postgraduate as $pgDegree)
                                                            <option value="{{ $pgDegree->fee }}" data-degree-name="{{ $pgDegree->degree }}">{{ $pgDegree->degree }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <input type="hidden" id="single_pgDegreeName" name="degree_name">
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="single_pgNoOfSeat">No of seats:</label>
                                                    <input type="number" id="single_pgNoOfSeat" name="seats" class="form-control form-control-sm" value="1" min="1">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check mb-3">
                                                    <input type="checkbox" id="single_pgAdditionalExpenses" value="275000" class="form-check-input">
                                                    <label for="single_pgAdditionalExpenses" class="form-check-label">Include mess and hostel expenses (275,000 PKR)</label>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="single_pgTotalAmount">Total Amount (PG):</label>
                                                    <input type="text" id="single_pgTotalAmount" name="totalAmount" class="form-control form-control-sm" readonly >
                                                </div>
                                            </div>
                                            <div class="col-md-12 ">

                                                <a href="{{url('student_stories')}}" class="btn btn-info btn-sm" style="background-color: #FFA500;">Nurture a Dream
                                                    <br>
                                                    Read student stories and select a story of your choice.
                                                </a>
                                                <br>
                                                <span></span>
                                        </div>

                                        <div id="donorInfo">
                                            <h4 class="text-dark mt-4">Donor Information:</h4>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="donor_name">Name:</label>
                                                        <input type="text" id="donor_name" name="donor_name" class="form-control " required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="donor_email">Email:</label>
                                                        <input type="email" id="donor_email" name="donor_email" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="phone">Phone:</label>
                                                        <input type="number" id="phone" name="phone" class="form-control" required>
                                                    </div>
                                                </div>
                                             <div class="row">
                                                    <div class="container-fluid">
                                                        <div class="row ml-3">
                                                            <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial Partner</span>
                                                            <div class="col-md-10 mb-3">
                                                                <select class="form-control" name="about_partner" id="select-single-custom-endwment-pg">
                                                                    <option value="" disabled selected>Select an option</option>
                                                                    <option value="Alumni">Alumni</option>
                                                                    <option value="Industrial-Partner" id="ip_se_custom_pg">Industrial Partner</option>
                                                                    <option value="Philanthropist" id="Philanthropist_se_custom_pg">Philanthropist</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row ml-4 d-none" id="philanthropist_se_custom_ug_div">
                                                            <div class="col-md-10">
                                                                <label for="">How do you know us?</label>
                                                                <textarea name="philanthropist_text" id="" cols="40" rows="5" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        
                                                        <script>
                                                            document.getElementById('select-single-custom-endwment-pg').addEventListener('change', function() {
                                                                var selectedOption = this.value;
                                                                var philanthropistDiv = document.getElementById('philanthropist_se_custom_ug_div');
                                                        
                                                                // Check if the selected option is either 'Industrial-Partner' or 'Philanthropist'
                                                                if (selectedOption === 'Industrial-Partner' || selectedOption === 'Philanthropist') {
                                                                    philanthropistDiv.classList.remove('d-none');  // Show the div if either is selected
                                                                } else {
                                                                    philanthropistDiv.classList.add('d-none');  // Hide the div for any other selection
                                                                }
                                                            });
                                                        </script>
                                                        
                                                        

                                                        <div class="row d-none ml-3" id="single-custom-endwment-pg">
                                                            <div class="col-md-10">
                                                                <label for="school_select">Select School</label>
                                                                <select name="school" id="school_select" class="form-control">
                                                                    <option value="" selected>Select School</option>
                                                                    <option value="SCHOOL OF CIVIL & ENVIRONMENTAL ENGINEERING">SCEE</option>
                                                                    <option value="SCHOOL OF CHEMICAL & MATERIALS ENGINEERING">SCME</option>
                                                                    <option value="SCHOOL OF ELECTRICAL ENGINEERING & COMPUTER SCIENCE">SEECS</option>
                                                                    <option value="SCHOOL OF MECHANICAL & MANUFACTURING ENGINEERING">SMME</option>
                                                                    <option value="US-PAKISTAN CENTER FOR ADVANCED STUDIES IN ENERGY">US-PCASE</option>
                                                                    <option value="NUST BALOCHISTAN CAMPUS, QUETTA">NUST BALOCHISTAN CAMPUS, QUETTA</option>
                                                                    <option value="COLLEGE OF AERONAUTICAL ENGINEERING">COLLEGE OF AERONAUTICAL ENGINEERING</option>
                                                                    <option value="COLLEGE OF ELECTRICAL & MECHANICAL ENGINEERING">COLLEGE OF EME</option>
                                                                    <option value="MILITARY COLLEGE OF ENGINEERING">MCE</option>
                                                                    <option value="MILITARY COLLEGE OF SIGNALS">MCS</option>
                                                                    <option value="PAKISTAN NAVY ENGINEERING COLLEGE">PAKISTAN NAVY ENGINEERING COLLEGE</option>
                                                                    <option value="NATIONAL INSTITUTE OF TRANSPORTATION">NATIONAL INSTITUTE OF TRANSPORTATION</option>
                                                                    <option value="INSTITUTE OF ENVIRONMENTAL SCIENCES & ENGINEERING">IESE</option>
                                                                    <option value="NUST INSTITUTE OF CIVIL ENGINEERING">NUST ICE</option>
                                                                    <option value="INSTITUTE OF GEOGRAPHICAL INFORMATION SYSTEMS">IGIS</option>
                                                                    <option value="NUST BUSINESS SCHOOL">NBS</option>
                                                                    <option value="SCHOOL OF ART, DESIGN & ARCHITECTURE">SADA</option>
                                                                    <option value="CENTRE FOR INTERNATIONAL PEACE & STABILITY">CIPS</option>
                                                                    <option value="NUST INSTITUTE OF PEACE & CONFLICT STUDIES">NUST IPCS</option>
                                                                    <option value="SCHOOL OF SOCIAL SCIENCES & HUMANITIES">SSSH</option>
                                                                    <option value="ATTA-UR-RAHMAN SCHOOL OF APPLIED BIO SCIENCES">ASABS</option>
                                                                    <option value="SCHOOL OF NATURAL SCIENCES">SNS</option>
                                                                    <option value="NUST SCHOOL OF HEALTH SCIENCES">NUST SHS</option>
                                                                    <option value="SCHOOL OF INTERDISCIPLINARY ENGINEERING & SCIENCES">SIES</option>
                                                                    <!-- Add your school options here -->
                                                                </select>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <label for="country_select">Select Country</label>
                                                                <select name="country" id="country_select" class="form-control">
                                                                    <option value="" selected>Select Country</option>
                                                                    <option value="Pakistan">Pakistan</option>
                                                                    <option value="Australia">Australia</option>
                                                                    <option value="Canada">Canada</option>
                                                                    <option value="China">China</option>
                                                                    <option value="Germany">Germany</option>
                                                                    <option value="Pakistan">Pakistan</option>
                                                                    <option value="Qatar">Qatar</option>
                                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                                    <option value="Turkey">Turkey</option>
                                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                                    <option value="United Kingdom">United Kingdom</option>
                                                                    <option value="United States">United States</option>

                                                                </select>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <label for="year" class="form-label">Select Year of Graduation</label>
                                                                <select id="year" name="year" class="form-control">
                                                                    <option value="" selected>Select Year of Graduation</option>
                                                                    <option value="1990">1990</option>
                                                                    <option value="1991">1991</option>
                                                                    <option value="1992">1992</option>
                                                                    <option value="1993">1993</option>
                                                                    <option value="1994">1994</option>
                                                                    <option value="1995">1995</option>
                                                                    <option value="1996">1996</option>
                                                                    <option value="1997">1997</option>
                                                                    <option value="1998">1998</option>
                                                                    <option value="1999">1999</option>
                                                                    <option value="2000">2000</option>
                                                                    <option value="2001">2001</option>
                                                                    <option value="2002">2002</option>
                                                                    <option value="2003">2003</option>
                                                                    <option value="2004">2004</option>
                                                                    <option value="2005">2005</option>
                                                                    <option value="2006">2006</option>
                                                                    <option value="2007">2007</option>
                                                                    <option value="2008">2008</option>
                                                                    <option value="2009">2009</option>
                                                                    <option value="2010">2010</option>
                                                                    <option value="2011">2011</option>
                                                                    <option value="2012">2012</option>
                                                                    <option value="2013">2013</option>
                                                                    <option value="2014">2014</option>
                                                                    <option value="2015">2015</option>
                                                                    <option value="2016">2016</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2022">2022</option>
                                                                    <option value="2023">2023</option>
                                                                    <option value="2024">2024</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                       </div>
                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="form-check mb-3 mt-2 ml-3">
                                                    <input class="form-check-input ml-3 paynow-radio" name="payments_status" type="radio" id="showBankDetailsNonEng" value="Paynow">
                                                    <label class="form-check-label ml-4" for="showBankDetailsNonEng">Paynow</label>
                                                    <input class="form-check-input ml-3 pledge-radio" name="payments_status" type="radio" id="pledgeNonEng" value="make_a_pledge">
                                                    <label class="form-check-label ml-4" for="pledgeNonEng">Make a Pledge</label>
                                                </div>
                                                <span class="text-dark mb-2 ml-4">Attach Screenshots/ Receipt of Fund Transfer</span>

                                                <div class="form-group ml-3">
                                                    <label for="prove">Proof:</label>
                                                    <input type="file" id="prove" name="prove" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        </div>
                                        <input type="submit" name="submit" class="btn btn-primary mt-3">
                                    </form>
                                </div>
                        </div>
                    <!-- Add more content as needed -->
                </div>

                <!-- Circular Endowment PG Tab Content -->
                <div class="tab-pane fade" id="circular-endowment-pg" role="tabpanel" aria-labelledby="circular-endowment-pg-tab">
                            <h3 class="text-center text-dark mt-4">Circular Endowment: 4 seats in perpetuity - student after student (PG)</h3>
                    <div class="row mt-5">
                        <div class="col-md-4 mb-2">
                            <h3 class="text-light text-center p-3" style="background-color: #004476;">Postgraduate Engineering Students</h3>
                            <form action="{{url('default_perpetual_seat')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group" hidden>
                                    <label for="pgDegree">Degree:</label>
                                    <input type="text" name="program_type" value="Circular_endowment_PG_engineering_stud" class="form-control">
                                    <input type="text" name="degree" value="Postgraduate Engineering" class="form-control">
                                    <input type="text" name="seats" value="1" class="form-control">
                                </div>
                                <div class="row p-2 mt-4">
                                    <div class="form-group ml-3">
                                        <input type="checkbox" class="mess_checkbox" value="16000000">
                                        <label for="pgAdditionalExpenses">Include mess and hostel expenses (16,000,000 PKR)</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="pgTotalAmount">Total Amount:</label>
                                        <input type="text" class="total_amount form-control" name="totalAmount" class="form-control" value="18000000" readonly>
                                    </div>
                                </div>

                                {{-- Donor info --}}
                                <div id="donorInfo">
                                    <h4 class="text-dark mt-4">Donor Information:</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="donor_name">Name:</label>
                                                <input type="text" id="donor_name" name="donor_name" class="form-control " required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="donor_email">Email:</label>
                                                <input type="email" id="donor_email" name="donor_email" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="phone">Phone:</label>
                                                <input type="number" id="phone" name="phone" class="form-control" required>
                                            </div>
                                        </div>
                                     <div class="row">
                                            <div class="container-fluid">
                                                <div class="row ml-3">
                                                    <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial Partner</span>
                                                    <div class="col-md-10 mb-3">
                                                        <select class="form-control" name="about_partner" id="select-circular-endwment-pg-eng">
                                                            <option value="" disabled selected>Select an option</option>
                                                            <option value="Alumni">Alumni</option>
                                                            <option value="Industrial-Partner" id="ip_ce_eng_pg">Industrial Partner</option>
                                                            <option value="Philanthropist" id="Philanthropist_ce_eng_pg">Philanthropist</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="row ml-4 d-none" id="philanthropist_ce_eng_ug_div">
                                                    <div class="col-md-10">
                                                        <label for="">How do you know us?</label>
                                                        <textarea name="philanthropist_text" id="" cols="40" rows="5" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                
                                                <script>
                                                    document.getElementById('select-circular-endwment-pg-eng').addEventListener('change', function() {
                                                        var selectedOption = this.value;
                                                        var philanthropistDiv = document.getElementById('philanthropist_ce_eng_ug_div');
                                                
                                                        // Check if the selected option is either 'Industrial-Partner' or 'Philanthropist'
                                                        if (selectedOption === 'Industrial-Partner' || selectedOption === 'Philanthropist') {
                                                            philanthropistDiv.classList.remove('d-none');  // Show the div if either is selected
                                                        } else {
                                                            philanthropistDiv.classList.add('d-none');  // Hide the div for any other selection
                                                        }
                                                    });
                                                </script>
                                                
                                                
                                                <div class="row d-none ml-3" id="circular-endwment-pg-eng">
                                                    <div class="col-md-10">
                                                        <label for="school_select">Select School</label>
                                                        <select name="school" id="school_select" class="form-control">
                                                            <option value="" selected>Select School</option>
                                                            <option value="SCHOOL OF CIVIL & ENVIRONMENTAL ENGINEERING">SCEE</option>
                                                            <option value="SCHOOL OF CHEMICAL & MATERIALS ENGINEERING">SCME</option>
                                                            <option value="SCHOOL OF ELECTRICAL ENGINEERING & COMPUTER SCIENCE">SEECS</option>
                                                            <option value="SCHOOL OF MECHANICAL & MANUFACTURING ENGINEERING">SMME</option>
                                                            <option value="US-PAKISTAN CENTER FOR ADVANCED STUDIES IN ENERGY">US-PCASE</option>
                                                            <option value="NUST BALOCHISTAN CAMPUS, QUETTA">NUST BALOCHISTAN CAMPUS, QUETTA</option>
                                                            <option value="COLLEGE OF AERONAUTICAL ENGINEERING">COLLEGE OF AERONAUTICAL ENGINEERING</option>
                                                            <option value="COLLEGE OF ELECTRICAL & MECHANICAL ENGINEERING">COLLEGE OF EME</option>
                                                            <option value="MILITARY COLLEGE OF ENGINEERING">MCE</option>
                                                            <option value="MILITARY COLLEGE OF SIGNALS">MCS</option>
                                                            <option value="PAKISTAN NAVY ENGINEERING COLLEGE">PAKISTAN NAVY ENGINEERING COLLEGE</option>
                                                            <option value="NATIONAL INSTITUTE OF TRANSPORTATION">NATIONAL INSTITUTE OF TRANSPORTATION</option>
                                                            <option value="INSTITUTE OF ENVIRONMENTAL SCIENCES & ENGINEERING">IESE</option>
                                                            <option value="NUST INSTITUTE OF CIVIL ENGINEERING">NUST ICE</option>
                                                            <option value="INSTITUTE OF GEOGRAPHICAL INFORMATION SYSTEMS">IGIS</option>
                                                            <option value="NUST BUSINESS SCHOOL">NBS</option>
                                                            <option value="SCHOOL OF ART, DESIGN & ARCHITECTURE">SADA</option>
                                                            <option value="CENTRE FOR INTERNATIONAL PEACE & STABILITY">CIPS</option>
                                                            <option value="NUST INSTITUTE OF PEACE & CONFLICT STUDIES">NUST IPCS</option>
                                                            <option value="SCHOOL OF SOCIAL SCIENCES & HUMANITIES">SSSH</option>
                                                            <option value="ATTA-UR-RAHMAN SCHOOL OF APPLIED BIO SCIENCES">ASABS</option>
                                                            <option value="SCHOOL OF NATURAL SCIENCES">SNS</option>
                                                            <option value="NUST SCHOOL OF HEALTH SCIENCES">NUST SHS</option>
                                                            <option value="SCHOOL OF INTERDISCIPLINARY ENGINEERING & SCIENCES">SIES</option>
                                                            <!-- Add your school options here -->
                                                        </select>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <label for="country_select">Select Country</label>
                                                        <select name="country" id="country_select" class="form-control">
                                                            <option value="" selected>Select Country</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Australia">Australia</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="China">China</option>
                                                            <option value="Germany">Germany</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Qatar">Qatar</option>
                                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                                            <option value="Turkey">Turkey</option>
                                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                                            <option value="United Kingdom">United Kingdom</option>
                                                            <option value="United States">United States</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <label for="year" class="form-label">Select Year of Graduation</label>
                                                        <select id="year" name="year" class="form-control">
                                                            <option value="" selected>Select Year of Graduation</option>
                                                            <option value="1990">1990</option>
                                                            <option value="1991">1991</option>
                                                            <option value="1992">1992</option>
                                                            <option value="1993">1993</option>
                                                            <option value="1994">1994</option>
                                                            <option value="1995">1995</option>
                                                            <option value="1996">1996</option>
                                                            <option value="1997">1997</option>
                                                            <option value="1998">1998</option>
                                                            <option value="1999">1999</option>
                                                            <option value="2000">2000</option>
                                                            <option value="2001">2001</option>
                                                            <option value="2002">2002</option>
                                                            <option value="2003">2003</option>
                                                            <option value="2004">2004</option>
                                                            <option value="2005">2005</option>
                                                            <option value="2006">2006</option>
                                                            <option value="2007">2007</option>
                                                            <option value="2008">2008</option>
                                                            <option value="2009">2009</option>
                                                            <option value="2010">2010</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                        </select>
                                                    </div>
                                                </div>

                                               </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="form-check mb-3 mt-2 ml-3">
                                            <input class="form-check-input ml-3 paynow-radio" name="payments_status" type="radio" id="showBankDetailsNonEng" value="Paynow">
                                            <label class="form-check-label ml-4" for="showBankDetailsNonEng">Paynow</label>
                                            <input class="form-check-input ml-3 pledge-radio" name="payments_status" type="radio" id="pledgeNonEng" value="make_a_pledge">
                                            <label class="form-check-label ml-4" for="pledgeNonEng">Make a Pledge</label>
                                        </div>
                                        <span class="text-dark mb-2 ml-4">Attach Screenshots/ Receipt of Fund Transfer</span>

                                        <div class="form-group ml-3">
                                            <label for="prove">Proof:</label>
                                            <input type="file" id="prove" name="prove" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" name="submit" id="" class="btn btn-primary">
                            </form>

                        </div>

                        <div class="col-md-4 mb-2">
                            <h3 class="text-light text-center p-3" style="background-color: #004476;; color: black">Postgraduate Non-Engineering Students</h3>
                            <form action="{{url('default_perpetual_seat')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group" hidden>
                                    <label for="pgDegree">Select Degree:</label>
                                    <input type="text" name="program_type" value="Circular_endowment_PG_non_engineering_stud" class="form-control">
                                    <input type="text" name="degree" value="Postgraduate Non-Engineering" class="form-control">
                                    <input type="text" name="seats" value="1" class="form-control">
                                </div>
                                <div class="row p-2 mt-4">
                                    <div class="form-group ml-3">
                                        <input type="checkbox" class="mess_checkbox" value="16000000">
                                        <label for="pgAdditionalExpenses">Include mess and hostel expenses (16,000,000 PKR)</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="pgTotalAmount">Total Amount:</label>
                                        <input type="number" class="total_amount form-control" name="totalAmount" class="form-control" value="30000000" readonly>
                                    </div>
                                </div>

                                {{-- Donor info --}}
                                <div id="donorInfo">
                                    <h4 class="text-dark mt-4">Donor Information:</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="donor_name">Name:</label>
                                                <input type="text" id="donor_name" name="donor_name" class="form-control " required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="donor_email">Email:</label>
                                                <input type="email" id="donor_email" name="donor_email" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="phone">Phone:</label>
                                                <input type="number" id="phone" name="phone" class="form-control" required>
                                            </div>
                                        </div>
                                     <div class="row">
                                            <div class="container-fluid">
                                                <div class="row ml-3">
                                                    <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial Partner</span>
                                                    <div class="col-md-10 mb-3">
                                                        <select class="form-control" name="about_partner" id="select-circular-endwment-pg-neng">
                                                            <option value="" disabled selected>Select an option</option>
                                                            <option value="Alumni">Alumni</option>
                                                            <option value="Industrial-Partner" id="ip_ce_noneng_pg">Industrial Partner</option>
                                                            <option value="Philanthropist" id="Philanthropist_ce_noneng_pg">Philanthropist</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="row ml-4 d-none" id="philanthropist_ce_noneng_pg_div">
                                                    <div class="col-md-10">
                                                        <label for="">How do you know us?</label>
                                                        <textarea name="philanthropist_text" id="" cols="40" rows="5" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                
                                                <script>
                                                    document.getElementById('select-circular-endwment-pg-neng').addEventListener('change', function() {
                                                        var selectedOption = this.value;
                                                        var philanthropistDiv = document.getElementById('philanthropist_ce_noneng_pg_div');
                                                
                                                        // Check if the selected option is either 'Industrial-Partner' or 'Philanthropist'
                                                        if (selectedOption === 'Industrial-Partner' || selectedOption === 'Philanthropist') {
                                                            philanthropistDiv.classList.remove('d-none');  // Show the div if either is selected
                                                        } else {
                                                            philanthropistDiv.classList.add('d-none');  // Hide the div for any other selection
                                                        }
                                                    });
                                                </script>
                                                
                                                

                                                <div class="row d-none ml-3" id="circular-endwment-pg-neng">
                                                    <div class="col-md-10">
                                                        <label for="school_select">Select School</label>
                                                        <select name="school" id="school_select" class="form-control">
                                                            <option value="" selected>Select School</option>
                                                            <option value="SCHOOL OF CIVIL & ENVIRONMENTAL ENGINEERING">SCEE</option>
                                                            <option value="SCHOOL OF CHEMICAL & MATERIALS ENGINEERING">SCME</option>
                                                            <option value="SCHOOL OF ELECTRICAL ENGINEERING & COMPUTER SCIENCE">SEECS</option>
                                                            <option value="SCHOOL OF MECHANICAL & MANUFACTURING ENGINEERING">SMME</option>
                                                            <option value="US-PAKISTAN CENTER FOR ADVANCED STUDIES IN ENERGY">US-PCASE</option>
                                                            <option value="NUST BALOCHISTAN CAMPUS, QUETTA">NUST BALOCHISTAN CAMPUS, QUETTA</option>
                                                            <option value="COLLEGE OF AERONAUTICAL ENGINEERING">COLLEGE OF AERONAUTICAL ENGINEERING</option>
                                                            <option value="COLLEGE OF ELECTRICAL & MECHANICAL ENGINEERING">COLLEGE OF EME</option>
                                                            <option value="MILITARY COLLEGE OF ENGINEERING">MCE</option>
                                                            <option value="MILITARY COLLEGE OF SIGNALS">MCS</option>
                                                            <option value="PAKISTAN NAVY ENGINEERING COLLEGE">PAKISTAN NAVY ENGINEERING COLLEGE</option>
                                                            <option value="NATIONAL INSTITUTE OF TRANSPORTATION">NATIONAL INSTITUTE OF TRANSPORTATION</option>
                                                            <option value="INSTITUTE OF ENVIRONMENTAL SCIENCES & ENGINEERING">IESE</option>
                                                            <option value="NUST INSTITUTE OF CIVIL ENGINEERING">NUST ICE</option>
                                                            <option value="INSTITUTE OF GEOGRAPHICAL INFORMATION SYSTEMS">IGIS</option>
                                                            <option value="NUST BUSINESS SCHOOL">NBS</option>
                                                            <option value="SCHOOL OF ART, DESIGN & ARCHITECTURE">SADA</option>
                                                            <option value="CENTRE FOR INTERNATIONAL PEACE & STABILITY">CIPS</option>
                                                            <option value="NUST INSTITUTE OF PEACE & CONFLICT STUDIES">NUST IPCS</option>
                                                            <option value="SCHOOL OF SOCIAL SCIENCES & HUMANITIES">SSSH</option>
                                                            <option value="ATTA-UR-RAHMAN SCHOOL OF APPLIED BIO SCIENCES">ASABS</option>
                                                            <option value="SCHOOL OF NATURAL SCIENCES">SNS</option>
                                                            <option value="NUST SCHOOL OF HEALTH SCIENCES">NUST SHS</option>
                                                            <option value="SCHOOL OF INTERDISCIPLINARY ENGINEERING & SCIENCES">SIES</option>
                                                            <!-- Add your school options here -->
                                                        </select>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <label for="country_select">Select Country</label>
                                                        <select name="country" id="country_select" class="form-control">
                                                            <option value="" selected>Select Country</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Australia">Australia</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="China">China</option>
                                                            <option value="Germany">Germany</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Qatar">Qatar</option>
                                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                                            <option value="Turkey">Turkey</option>
                                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                                            <option value="United Kingdom">United Kingdom</option>
                                                            <option value="United States">United States</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <label for="year" class="form-label">Select Year of Graduation</label>
                                                        <select id="year" name="year" class="form-control">
                                                            <option value="" selected>Select Year of Graduation</option>
                                                            <option value="1990">1990</option>
                                                            <option value="1991">1991</option>
                                                            <option value="1992">1992</option>
                                                            <option value="1993">1993</option>
                                                            <option value="1994">1994</option>
                                                            <option value="1995">1995</option>
                                                            <option value="1996">1996</option>
                                                            <option value="1997">1997</option>
                                                            <option value="1998">1998</option>
                                                            <option value="1999">1999</option>
                                                            <option value="2000">2000</option>
                                                            <option value="2001">2001</option>
                                                            <option value="2002">2002</option>
                                                            <option value="2003">2003</option>
                                                            <option value="2004">2004</option>
                                                            <option value="2005">2005</option>
                                                            <option value="2006">2006</option>
                                                            <option value="2007">2007</option>
                                                            <option value="2008">2008</option>
                                                            <option value="2009">2009</option>
                                                            <option value="2010">2010</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                        </select>
                                                    </div>
                                                </div>

                                               </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="form-check mb-3 mt-2 ml-3">
                                            <input class="form-check-input ml-3 paynow-radio" name="payments_status" type="radio" id="showBankDetailsNonEng" value="Paynow">
                                            <label class="form-check-label ml-4" for="showBankDetailsNonEng">Paynow</label>
                                            <input class="form-check-input ml-3 pledge-radio" name="payments_status" type="radio" id="pledgeNonEng" value="make_a_pledge">
                                            <label class="form-check-label ml-4" for="pledgeNonEng">Make a Pledge</label>
                                        </div>
                                        <span class="text-dark mb-2 ml-4">Attach Screenshots/ Receipt of Fund Transfer</span>

                                        <div class="form-group ml-3">
                                            <label for="prove">Proof:</label>
                                            <input type="file" id="prove" name="prove" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" name="submit" id="" class="btn btn-primary">
                            </form>

                        </div>

                            <div class="col-md-4 mb-2">

                                <form action="{{url('perpetualseatyourname')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <h3  class="text-light text-center p-3" style="background-color: #004476;" >Customize Your Package</h3>

                                    {{-- <h3 class="text-dark text-center mb-4">Circular Endowment for PG:</h3> --}}

                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="program" value="PG" hidden>
                                            <input type="text" name="endowment_type" value="Circular_endowment" hidden>
                                            <div class="form-group">
                                                <label for="circular_pgDegree">Select Options:</label>
                                                <select id="circular_pgDegree" name="degree" class="form-control form-control-sm">
                                                    <option value="">Select Degree</option>
                                                    @foreach ($postgraduate as $pgDegree)
                                                        <option value="{{ $pgDegree->fee }}" data-degree-name="{{ $pgDegree->degree }}">{{ $pgDegree->degree }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="hidden" id="circular_pgDegreeName" name="degree_name">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="circular_pgNoOfSeat">No of seats:</label>
                                                <input type="number" id="circular_pgNoOfSeat" name="seats" class="form-control form-control-sm" value="1" min="1">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check mb-3">
                                                <input type="checkbox" id="circular_pgAdditionalExpenses" value="16000000" class="form-check-input">
                                                <label for="circular_pgAdditionalExpenses" class="form-check-label">Include mess and hostel expenses (16,000,000 PKR)</label>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="circular_pgTotalAmount">Total Amount (PG):</label>
                                                <input type="text" id="circular_pgTotalAmount" name="totalAmount" class="form-control form-control-sm" readonly >
                                            </div>
                                        </div>

                                        <div class="col-md-12 ">

                                            <a href="{{url('student_stories')}}" class="btn btn-info btn-sm" style="background-color: #FFA500;">Nurture a Dream
                                                <br>
                                                Read student stories and select a story of your choice.
                                            </a>
                                            <br>
                                            <span></span>
                                    </div>

                                    <div id="donorInfo">
                                        <h4 class="text-dark mt-4">Donor Information:</h4>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_name">Name:</label>
                                                    <input type="text" id="donor_name" name="donor_name" class="form-control " required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="donor_email">Email:</label>
                                                    <input type="email" id="donor_email" name="donor_email" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone:</label>
                                                    <input type="number" id="phone" name="phone" class="form-control" required>
                                                </div>
                                            </div>
                                         <div class="row">
                                                <div class="container-fluid">
                                                    <div class="row ml-3">
                                                        <span class="ml-4 text-dark mb-2">Are You Alumni or Industrial Partner</span>
                                                        <div class="col-md-10 mb-3">
                                                            <select class="form-control" name="about_partner" id="select-circular-custom-endwment-pg">
                                                                <option value="" disabled selected>Select an option</option>
                                                                <option value="Alumni">Alumni</option>
                                                                <option value="Industrial-Partner" id="ip_ce_custom_pg">Industrial Partner</option>
                                                                <option value="Philanthropist" id="Philanthropist_ce_custom_pg">Philanthropist</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row ml-4 d-none" id="philanthropist_ce_custom_pg_div">
                                                        <div class="col-md-10">
                                                            <label for="">How do you know us?</label>
                                                            <textarea name="philanthropist_text" id="knowledge" cols="40" rows="5" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    <script>
                                                        document.getElementById('select-circular-custom-endwment-pg').addEventListener('change', function() {
                                                            var selectedOption = this.value;
                                                            var philanthropistDiv = document.getElementById('philanthropist_ce_custom_pg_div');
                                                    
                                                            // Show the div if either 'Industrial-Partner' or 'Philanthropist' is selected
                                                            if (selectedOption === 'Industrial-Partner' || selectedOption === 'Philanthropist') {
                                                                philanthropistDiv.classList.remove('d-none');  // Show the div
                                                            } else {
                                                                philanthropistDiv.classList.add('d-none');  // Hide the div for any other selection
                                                            }
                                                        });
                                                    </script>
                                                    
                                                    
                                                    <div class="row d-none ml-3" id="circular-custom-endwment-pg">
                                                        <div class="col-md-10">
                                                            <label for="school_select">Select School</label>
                                                            <select name="school" id="school_select" class="form-control">
                                                                <option value="" selected>Select School</option>
                                                                <option value="SCHOOL OF CIVIL & ENVIRONMENTAL ENGINEERING">SCEE</option>
                                                                <option value="SCHOOL OF CHEMICAL & MATERIALS ENGINEERING">SCME</option>
                                                                <option value="SCHOOL OF ELECTRICAL ENGINEERING & COMPUTER SCIENCE">SEECS</option>
                                                                <option value="SCHOOL OF MECHANICAL & MANUFACTURING ENGINEERING">SMME</option>
                                                                <option value="US-PAKISTAN CENTER FOR ADVANCED STUDIES IN ENERGY">US-PCASE</option>
                                                                <option value="NUST BALOCHISTAN CAMPUS, QUETTA">NUST BALOCHISTAN CAMPUS, QUETTA</option>
                                                                <option value="COLLEGE OF AERONAUTICAL ENGINEERING">COLLEGE OF AERONAUTICAL ENGINEERING</option>
                                                                <option value="COLLEGE OF ELECTRICAL & MECHANICAL ENGINEERING">COLLEGE OF EME</option>
                                                                <option value="MILITARY COLLEGE OF ENGINEERING">MCE</option>
                                                                <option value="MILITARY COLLEGE OF SIGNALS">MCS</option>
                                                                <option value="PAKISTAN NAVY ENGINEERING COLLEGE">PAKISTAN NAVY ENGINEERING COLLEGE</option>
                                                                <option value="NATIONAL INSTITUTE OF TRANSPORTATION">NATIONAL INSTITUTE OF TRANSPORTATION</option>
                                                                <option value="INSTITUTE OF ENVIRONMENTAL SCIENCES & ENGINEERING">IESE</option>
                                                                <option value="NUST INSTITUTE OF CIVIL ENGINEERING">NUST ICE</option>
                                                                <option value="INSTITUTE OF GEOGRAPHICAL INFORMATION SYSTEMS">IGIS</option>
                                                                <option value="NUST BUSINESS SCHOOL">NBS</option>
                                                                <option value="SCHOOL OF ART, DESIGN & ARCHITECTURE">SADA</option>
                                                                <option value="CENTRE FOR INTERNATIONAL PEACE & STABILITY">CIPS</option>
                                                                <option value="NUST INSTITUTE OF PEACE & CONFLICT STUDIES">NUST IPCS</option>
                                                                <option value="SCHOOL OF SOCIAL SCIENCES & HUMANITIES">SSSH</option>
                                                                <option value="ATTA-UR-RAHMAN SCHOOL OF APPLIED BIO SCIENCES">ASABS</option>
                                                                <option value="SCHOOL OF NATURAL SCIENCES">SNS</option>
                                                                <option value="NUST SCHOOL OF HEALTH SCIENCES">NUST SHS</option>
                                                                <option value="SCHOOL OF INTERDISCIPLINARY ENGINEERING & SCIENCES">SIES</option>
                                                                <!-- Add your school options here -->
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="country_select">Select Country</label>
                                                            <select name="country" id="country_select" class="form-control">
                                                                <option value="" selected>Select Country</option>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Australia">Australia</option>
                                                                <option value="Canada">Canada</option>
                                                                <option value="China">China</option>
                                                                <option value="Germany">Germany</option>
                                                                <option value="Pakistan">Pakistan</option>
                                                                <option value="Qatar">Qatar</option>
                                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                                <option value="Turkey">Turkey</option>
                                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                                <option value="United Kingdom">United Kingdom</option>
                                                                <option value="United States">United States</option>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <label for="year" class="form-label">Select Year of Graduation</label>
                                                            <select id="year" name="year" class="form-control">
                                                                <option value="" selected>Select Year of Graduation</option>
                                                                <option value="1990">1990</option>
                                                                <option value="1991">1991</option>
                                                                <option value="1992">1992</option>
                                                                <option value="1993">1993</option>
                                                                <option value="1994">1994</option>
                                                                <option value="1995">1995</option>
                                                                <option value="1996">1996</option>
                                                                <option value="1997">1997</option>
                                                                <option value="1998">1998</option>
                                                                <option value="1999">1999</option>
                                                                <option value="2000">2000</option>
                                                                <option value="2001">2001</option>
                                                                <option value="2002">2002</option>
                                                                <option value="2003">2003</option>
                                                                <option value="2004">2004</option>
                                                                <option value="2005">2005</option>
                                                                <option value="2006">2006</option>
                                                                <option value="2007">2007</option>
                                                                <option value="2008">2008</option>
                                                                <option value="2009">2009</option>
                                                                <option value="2010">2010</option>
                                                                <option value="2011">2011</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2013">2013</option>
                                                                <option value="2014">2014</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2016">2016</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2020">2020</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2023">2023</option>
                                                                <option value="2024">2024</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                   </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="form-check mb-3 mt-2 ml-3">
                                                <input class="form-check-input ml-3 paynow-radio" name="payments_status" type="radio" id="showBankDetailsNonEng" value="Paynow">
                                                <label class="form-check-label ml-4" for="showBankDetailsNonEng">Paynow</label>
                                                <input class="form-check-input ml-3 pledge-radio" name="payments_status" type="radio" id="pledgeNonEng" value="make_a_pledge">
                                                <label class="form-check-label ml-4" for="pledgeNonEng">Make a Pledge</label>
                                            </div>
                                            <span class="text-dark mb-2 ml-4">Attach Screenshots/ Receipt of Fund Transfer</span>

                                            <div class="form-group ml-3">
                                                <label for="prove">Proof:</label>
                                                <input type="file" id="prove" name="prove" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    </div>
                                    <input type="submit" name="submit" class="btn btn-primary mt-3">
                                </form>


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
