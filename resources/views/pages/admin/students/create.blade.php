<title>Create Student</title>
@include('Layouts.admin.head')

<style>
    /* Hide number input arrows */
    /* Chrome, Safari, Edge, Opera */
    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('Layouts.admin.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('Layouts.admin.header')
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <h4 class="fw-bold py-3 mb-4">Create Student</h4>

                        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Row 1: Qalam ID, Student Name, Father Name -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="qalam_id" class="form-label">Qalam ID</label>
                                    <input type="number" name="qalam_id" id="qalam_id"
                                        class="form-control form-control-sm" placeholder="Auto-generated Qalam ID">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="student_name" class="form-label">Student Name</label>
                                    <input type="text" name="student_name" id="student_name"
                                        class="form-control form-control-sm" placeholder="Enter Student Name" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="father_name" class="form-label">Father Name</label>
                                    <input type="text" name="father_name" id="father_name"
                                        class="form-control form-control-sm" placeholder="Enter Father Name" required>
                                </div>
                            </div>

                            <!-- Row 2: Institution, Discipline, Contact No -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="institutions" class="form-label">Institution</label>
                                    <input type="text" name="institutions" id="institutions"
                                        class="form-control form-control-sm" placeholder="Enter Institution" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="discipline" class="form-label">Discipline</label>
                                    <input type="text" name="discipline" id="discipline"
                                        class="form-control form-control-sm" placeholder="Enter Discipline" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="contact_no" class="form-label">Contact No</label>
                                    <input type="number" name="contact_no" id="contact_no"
                                        class="form-control form-control-sm" placeholder="Enter Contact Number"
                                        required>
                                </div>
                            </div>

                            <!-- Row 3: Home Address (textarea), Scholarship Name, Monthly Income -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="home_address" class="form-label">Home Address</label>
                                    <textarea name="home_address" id="home_address" class="form-control form-control-sm" rows="2"
                                        placeholder="Enter Home Address" required></textarea>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="scholarship_name" class="form-label">Scholarship Name</label>
                                    <input type="text" name="scholarship_name" id="scholarship_name"
                                        class="form-control form-control-sm" placeholder="Scholarship Name"
                                        value="NTF - NUST Trust Fund" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="monthly_income" class="form-label">Monthly Income</label>
                                    <input type="number" name="monthly_income" id="monthly_income"
                                        class="form-control form-control-sm" placeholder="Enter Monthly Income"
                                        required>
                                </div>
                            </div>

                            <!-- Row 4: Remarks, NUST Trust Fund Donor Name, Province -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="remarks" class="form-label">Remarks</label>
                                    <input name="remarks" id="remarks" class="form-control form-control-sm"
                                        placeholder="Remarks" value="Required Financial Support">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="nust_trust_fund_donor_name" class="form-label">Nust Trust Fund Donor
                                        Name</label>
                                    <input type="text" name="nust_trust_fund_donor_name"
                                        id="nust_trust_fund_donor_name" class="form-control form-control-sm"
                                        placeholder="Donor Name" value="Open Fund Scholarship- AF786">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="province" class="form-label">Province</label>
                                    <input type="text" name="province" id="province"
                                        class="form-control form-control-sm" placeholder="Enter Province">
                                </div>
                            </div>

                            <!-- Row 5: Domicile, Gender, Program -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="domicile" class="form-label">Domicile</label>
                                    <input type="text" name="domicile" id="domicile"
                                        class="form-control form-control-sm" placeholder="Enter Domicile">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <select name="gender" id="gender" class="form-select form-select-sm"
                                        required>
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="program" class="form-label">Program</label>
                                    <input type="text" name="program" id="program"
                                        class="form-control form-control-sm" placeholder="Enter Program">
                                </div>
                            </div>

                            <!-- Row 6: Degree, Year of Admission, Father Status -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="degree" class="form-label">Degree</label>
                                    <select name="degree" id="degree" class="form-select form-select-sm"
                                        required>
                                        <option value="" disabled selected>Select Degree</option>
                                        <option value="UG">UG</option>
                                        <option value="PG">PG</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="year_of_admission" class="form-label">Year of Admission</label>
                                    <input type="number" name="year_of_admission" id="year_of_admission"
                                        class="form-control form-control-sm" placeholder="Enter Year of Admission">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="father_status" class="form-label">Father Status</label>
                                    <select name="father_status" id="father_status"
                                        class="form-select form-select-sm" required>
                                        <option value="" disabled selected>Select Father Status</option>
                                        <option value="Alive">Alive</option>
                                        <option value="Deceased">Deceased</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Row 7: Father Profession, Statement of Purpose (textarea), Student Image (file input) -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="father_profession" class="form-label">Father Profession</label>
                                    <input type="text" name="father_profession" id="father_profession"
                                        class="form-control form-control-sm" placeholder="Enter Father Profession">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="statement_of_purpose" class="form-label">Statement of Purpose</label>
                                    <textarea name="statement_of_purpose" id="statement_of_purpose" class="form-control form-control-sm" rows="3"
                                        placeholder="Enter Statement of Purpose"></textarea>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="images" class="form-label">Student Image (jpg, jpeg, png
                                        only)</label>
                                    <input type="file" name="images" id="images"
                                        class="form-control form-control-sm" accept=".jpg,.jpeg,.png">
                                </div>
                            </div>

                            <!-- Row 8: Make Pledge, Payment Approved, Hostel Status (select inputs) -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="make_pledge" class="form-label">Make Pledge</label>
                                    <select name="make_pledge" id="make_pledge" class="form-select form-select-sm"
                                        required>
                                        <option value="1" selected>Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="payment_approved" class="form-label">Payment Approved</label>
                                    <select name="payment_approved" id="payment_approved"
                                        class="form-select form-select-sm" required>
                                        <option value="1" selected>Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="hostel_status" class="form-label">Hostel Status</label>
                                    <select name="hostel_status" id="hostel_status"
                                        class="form-select form-select-sm" required>
                                        <option value="1" selected>Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Create Student</button>
                            </div>
                        </form>

                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    @include('Layouts.admin.script')
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
