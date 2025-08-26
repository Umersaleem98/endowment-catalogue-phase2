<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Edit Student</title>

    <!-- Include Required CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    @include('admin.layouts.head')
</head>

<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <div id="toaster"></div>
    <div class="wrapper">
        @include('admin.layouts.sidebar')

        <div class="page-wrapper">
            <!-- Header -->
            @include('admin.layouts.header')

            <div class="content-wrapper">
                <div class="content">
                    <!-- Table -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h2>Add New Student Information</h2>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="card-body">
                                    <form action="{{ route('store.new.student') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf


                                        <!-- Qalam ID and Student Name in One Row -->
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="qalam_id" class="form-label">Qalam ID</label>
                                                <input type="text" name="qalam_id" id="qalam_id"
                                                    class="form-control" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="student_name" class="form-label">Student Name</label>
                                                <input type="text" name="student_name" id="student_name"
                                                    class="form-control" required>
                                            </div>
                                        </div>

                                        <!-- Father Name and Institution in One Row -->
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="father_name" class="form-label">Father Name</label>
                                                <input type="text" name="father_name" id="father_name"
                                                    class="form-control" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="institutions" class="form-label">Institution</label>
                                                <input type="text" name="institutions" id="institutions"
                                                    class="form-control" required>
                                            </div>
                                        </div>

                                        <!-- Discipline and Contact No in One Row -->
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="discipline" class="form-label">Discipline</label>
                                                <input type="text" name="discipline" id="discipline"
                                                    class="form-control" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="contact_no" class="form-label">Contact No</label>
                                                <input type="text" name="contact_no" id="contact_no"
                                                    class="form-control"  required>
                                            </div>
                                        </div>

                                        <!-- Home Address and Scholarship Name in One Row -->
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="home_address" class="form-label">Home Address</label>
                                                <textarea name="home_address" id="home_address" class="form-control" rows="2" required></textarea>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="scholarship_name" class="form-label">Scholarship
                                                    Name</label>
                                                <input type="text" name="scholarship_name" id="scholarship_name"
                                                    class="form-control" value="NTF - NUST Trust Fund"
                                                    required>
                                            </div>
                                        </div>

                                        <!-- Monthly Income and Remarks in One Row -->
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="monthly_income" class="form-label">Monthly Income</label>
                                                <input type="number" name="monthly_income" id="monthly_income"
                                                    class="form-control" 
                                                    required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="remarks" class="form-label">Remarks</label>
                                                <input name="remarks" id="remarks" class="form-control" value="Required Financial Support">
                                            </div>
                                        </div>

                                        <!-- Image -->
                                        <div class="mb-3">
                                            <label for="images" class="form-label">Student Image</label>
                                            <input type="file" name="images" id="images"
                                                class="form-control">
                                         
                                                <img src="{{ asset('templates/students_images/') }}"
                                                    alt="Student Photo" class="img-thumbnail mt-2"
                                                    style="width:100px; height:100px; object-fit:cover;">
                                         
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="nust_trust_fund_donor_name" class="form-label">Nust Trust Fund Donor Name</label>
                                                <input type="text" name="nust_trust_fund_donor_name" id="nust_trust_fund_donor_name" class="form-control" value="Open Fund Scholarship- AF786">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="province" class="form-label">Province</label>
                                                <input type="text" name="province" id="province" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="domicile" class="form-label">Domicile</label>
                                                <input type="text" name="domicile" id="domicile" class="form-control" >
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="gender" class="form-label">Gender</label>
                                                <input type="text" name="gender" id="gender" class="form-control" >
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="program" class="form-label">Program</label>
                                                <input type="text" name="program" id="program" class="form-control" >
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="degree" class="form-label">Degree</label>
                                                <input type="text" name="degree" id="degree" class="form-control" >
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="year_of_admission" class="form-label">Year of Admission</label>
                                                <input type="number" name="year_of_admission" id="year_of_admission" class="form-control" >
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="father_status" class="form-label">Father Status</label>
                                                <input type="text" name="father_status" id="father_status" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="father_profession" class="form-label">Father Profession</label>
                                                <input type="text" name="father_profession" id="father_profession" class="form-control" >
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="statement_of_purpose" class="form-label">Statement of Purpose</label>
                                                <textarea name="statement_of_purpose" id="statement_of_purpose" class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="make_pledge" class="form-label">Make Pledge</label>
                                                <input type="number" name="make_pledge" id="make_pledge" class="form-control" value="1">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="payment_approved" class="form-label">Payment Approved</label>
                                                <input type="number" name="payment_approved" id="payment_approved" class="form-control" value="1">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="hostel_status" class="form-label">Hostel Status</label>
                                                <input type="number" name="hostel_status" id="hostel_status" class="form-control" value="1">
                                            </div>
                                        </div>
                                        
                                       
                                    
                                        <!-- Submit Button -->
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Update Student</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.layouts.script')

</body>

</html>
