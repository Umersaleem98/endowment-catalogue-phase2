<div class="col-md-4 mb-2">
    <h3 class="text-light text-center p-3" style="background-color: #004476;">Non Engineering
        Students</h3>
    <form action="{{ url('default_one_year_degree') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="form-group" hidden>
            <label for="pgDegree">Degree:</label>
            <input type="text" name="program_type" value="one_year_UG"
                class="form-control">
            <input type="text" name="degree" value="Non Engineering"
                class="form-control">
            <input type="text" name="seats" value="1" class="form-control">
        </div>
        <div class="row p-2 mt-4">
            <div class="form-group ml-3">
                <input type="checkbox" class="mess_checkbox" value="275000">
                <label for="pgAdditionalExpenses">Include mess and hostel expenses (275,000
                    PKR)</label>
            </div>
            <div class="form-group ml-3">
                <label for="pgTotalAmount">Total Amount:</label>
                <input type="text" class="total_amount form-control" name="totalAmount"
                    value="400000" readonly>
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
                            <span class="ml-4 text-dark mb-2 ">Are You Alumni or Industrial Partner</span>
                            <div class="col-md-10 mb-3">
                                <select class="form-control" name="about_partner" id="select-single-noneng-ug">
                                    <option value="" disabled selected>Select an option</option>
                                    <option value="Alumni">Alumni</option>
                                    <option value="Industrial-Partner" id="ip_one_year_noneng_ug">Industrial Partner</option>
                                    <option value="Philanthropist" id="Philanthropist_one_year_noneng_ug">Philanthropist</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row ml-4 " id="philanthropist_oneyear_noneng_ug_div">
                            <div class="col-md-10">
                                <label for="">How do you know us?</label>
                                <textarea name="philanthropist_text" id="" cols="40" rows="5"></textarea>
                            </div>
                        </div>
        
                        <div class="row  ml-3" id="single-noneng-ug">
                            <div class="col-md-10">
                                <label for="school_select">Select School</label>
                                <select name="school" id="school_select"
                                    class="form-control">
                                    <option value="" selected>Select School</option>
                                    <option
                                        value="SCHOOL OF CIVIL & ENVIRONMENTAL ENGINEERING">
                                        SCEE</option>
                                    <option value="SCHOOL OF CHEMICAL & MATERIALS ENGINEERING">
                                        SCME</option>
                                    <option
                                        value="SCHOOL OF ELECTRICAL ENGINEERING & COMPUTER SCIENCE">
                                        SEECS</option>
                                    <option
                                        value="SCHOOL OF MECHANICAL & MANUFACTURING ENGINEERING">
                                        SMME</option>
                                    <option
                                        value="US-PAKISTAN CENTER FOR ADVANCED STUDIES IN ENERGY">
                                        US-PCASE</option>
                                    <option value="NUST BALOCHISTAN CAMPUS, QUETTA">NUST
                                        BALOCHISTAN CAMPUS, QUETTA</option>
                                    <option value="COLLEGE OF AERONAUTICAL ENGINEERING">COLLEGE
                                        OF AERONAUTICAL ENGINEERING</option>
                                    <option
                                        value="COLLEGE OF ELECTRICAL & MECHANICAL ENGINEERING">
                                        COLLEGE OF EME</option>
                                    <option value="MILITARY COLLEGE OF ENGINEERING">MCE
                                    </option>
                                    <option value="MILITARY COLLEGE OF SIGNALS">MCS</option>
                                    <option value="PAKISTAN NAVY ENGINEERING COLLEGE">PAKISTAN
                                        NAVY ENGINEERING COLLEGE</option>
                                    <option value="NATIONAL INSTITUTE OF TRANSPORTATION">
                                        NATIONAL INSTITUTE OF TRANSPORTATION</option>
                                    <option
                                        value="INSTITUTE OF ENVIRONMENTAL SCIENCES & ENGINEERING">
                                        IESE</option>
                                    <option value="NUST INSTITUTE OF CIVIL ENGINEERING">NUST
                                        ICE</option>
                                    <option
                                        value="INSTITUTE OF GEOGRAPHICAL INFORMATION SYSTEMS">
                                        IGIS</option>
                                    <option value="NUST BUSINESS SCHOOL">NBS</option>
                                    <option value="SCHOOL OF ART, DESIGN & ARCHITECTURE">SADA
                                    </option>
                                    <option value="CENTRE FOR INTERNATIONAL PEACE & STABILITY">
                                        CIPS</option>
                                    <option value="NUST INSTITUTE OF PEACE & CONFLICT STUDIES">
                                        NUST IPCS</option>
                                    <option value="SCHOOL OF SOCIAL SCIENCES & HUMANITIES">SSSH
                                    </option>
                                    <option
                                        value="ATTA-UR-RAHMAN SCHOOL OF APPLIED BIO SCIENCES">
                                        ASABS</option>
                                    <option value="SCHOOL OF NATURAL SCIENCES">SNS</option>
                                    <option value="NUST SCHOOL OF HEALTH SCIENCES">NUST SHS
                                    </option>
                                    <option
                                        value="SCHOOL OF INTERDISCIPLINARY ENGINEERING & SCIENCES">
                                        SIES</option>
                                    <!-- Add your school options here -->
                                </select>
                            </div>
                            <div class="col-md-10">
                                <label for="country_select">Select Country</label>
                                <select name="country" id="country_select"
                                    class="form-control">
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
                                    <option value="United Arab Emirates">United Arab Emirates
                                    </option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>

                                </select>
                            </div>
                            <div class="col-md-10">
                                <label for="year" class="form-label">Select Year of
                                    Graduation</label>
                                <select id="year" name="year" class="form-control">
                                    <option value="" selected>Select Year of Graduation
                                    </option>
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
                    <input class="form-check-input ml-3 paynow-radio" name="payments_status"
                        type="radio" id="showBankDetailsNonEng" value="Paynow">
                    <label class="form-check-label ml-4"
                        for="showBankDetailsNonEng">Paynow</label>
                    <input class="form-check-input ml-3 pledge-radio" name="payments_status"
                        type="radio" id="pledgeNonEng" value="make_a_pledge">
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
