<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Adopted Edit Student</title>

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
                                    <h2>Edit Student Information</h2>
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
                                    <form action="{{ url('adopted/student/update', $students->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label>Qalam ID</label>
                                                <input type="text" name="qalam_id" class="form-control"
                                                    value="{{ $students->qalam_id }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Student Name</label>
                                                <input type="text" name="student_name" class="form-control"
                                                    value="{{ $students->student_name }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label>Father Name</label>
                                                <input type="text" name="father_name" class="form-control"
                                                    value="{{ $students->father_name }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Institution</label>
                                                <input type="text" name="institutions" class="form-control"
                                                    value="{{ $students->institutions }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label>Discipline</label>
                                                <input type="text" name="discipline" class="form-control"
                                                    value="{{ $students->discipline }}">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label>Contact No</label>
                                                <input type="text" name="contact_no" class="form-control"
                                                    value="{{ $students->contact_no }}">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label>Home Address</label>
                                            <textarea name="home_address" class="form-control">{{ $students->home_address }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label>Scholarship Name</label>
                                            <input type="text" name="scholarship_name" class="form-control"
                                                value="{{ $students->scholarship_name }}">
                                        </div>

                                        <div class="mb-3">
                                            <label>Nust Trust Fund Donor Name</label>
                                            <input type="text" name="nust_trust_fund_donor_name" class="form-control"
                                                value="{{ $students->nust_trust_fund_donor_name }}">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="province" class="form-label">Province</label>
                                                <select name="province" id="province" class="form-control">
                                                    <option value="Punjab"
                                                        {{ $students->province == 'Punjab' ? 'selected' : '' }}>Punjab
                                                    </option>
                                                    <option value="Sindh"
                                                        {{ $students->province == 'Sindh' ? 'selected' : '' }}>Sindh
                                                    </option>
                                                    <option value="Khyber Pakhtunkhwa"
                                                        {{ $students->province == 'Khyber Pakhtunkhwa' ? 'selected' : '' }}>
                                                        Khyber Pakhtunkhwa</option>
                                                    <option value="Balochistan"
                                                        {{ $students->province == 'Balochistan' ? 'selected' : '' }}>
                                                        Balochistan</option>
                                                    <option value="Gilgit-Baltistan"
                                                        {{ $students->province == 'Gilgit-Baltistan' ? 'selected' : '' }}>
                                                        Gilgit-Baltistan</option>
                                                    <option value="Azad Jammu and Kashmir"
                                                        {{ $students->province == 'Azad Jammu and Kashmir' ? 'selected' : '' }}>
                                                        Azad Jammu and Kashmir</option>
                                                    <option value="Islamabad Capital Territory"
                                                        {{ $students->province == 'Islamabad Capital Territory' ? 'selected' : '' }}>
                                                        Islamabad Capital Territory</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label>Domicile</label>
                                                <input type="text" name="domicile" class="form-control"
                                                    value="{{ $students->domicile }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="gender" class="form-label">Gender</label>
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="Male"
                                                        {{ $students->gender == 'Male' ? 'selected' : '' }}>Male
                                                    </option>
                                                    <option value="Female"
                                                        {{ $students->gender == 'Female' ? 'selected' : '' }}>Female
                                                    </option>
                                                    <option value="Other"
                                                        {{ $students->gender == 'Other' ? 'selected' : '' }}>Other
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label>Program</label>
                                                <input type="text" name="program" class="form-control"
                                                    value="{{ $students->program }}">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="degree" class="form-label">Degree</label>
                                            <select name="degree" id="degree" class="form-control">
                                                <option value="UG"
                                                    {{ $students->degree == 'UG' ? 'selected' : '' }}>UG</option>
                                                <option value="PG"
                                                    {{ $students->degree == 'PG' ? 'selected' : '' }}>PG</option>
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <label>Year of Admission</label>
                                            <input type="number" name="year_of_admission" class="form-control"
                                                value="{{ $students->year_of_admission }}">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="father_status" class="form-label">Father Status</label>
                                                <select name="father_status" id="father_status" class="form-control">
                                                    <option value="Alive"
                                                        {{ $students->father_status == 'Alive' ? 'selected' : '' }}>
                                                        Alive</option>
                                                    <option value="Deceased"
                                                        {{ $students->father_status == 'Deceased' ? 'selected' : '' }}>
                                                        Deceased</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label>Father Profession</label>
                                                <input type="text" name="father_profession" class="form-control"
                                                    value="{{ $students->father_profession }}">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label>Monthly Income</label>
                                            <input type="number" name="monthly_income" class="form-control"
                                                value="{{ $students->monthly_income }}">
                                        </div>

                                        <div class="mb-3">
                                            <label>Statement of Purpose</label>
                                            <textarea name="statement_of_purpose" class="form-control">{{ $students->statement_of_purpose }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label>Remarks</label>
                                            <textarea name="remarks" class="form-control">{{ $students->remarks }}</textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label>Make Pledge</label>
                                                <select name="make_pledge" class="form-select">
                                                    <option value="1"
                                                        {{ $students->make_pledge ? 'selected' : '' }}>Yes</option>
                                                    <option value="0"
                                                        {{ !$students->make_pledge ? 'selected' : '' }}>No</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label>Payment Approved</label>
                                                <select name="payment_approved" class="form-select">
                                                    <option value="1"
                                                        {{ $students->payment_approved ? 'selected' : '' }}>Yes
                                                    </option>
                                                    <option value="0"
                                                        {{ !$students->payment_approved ? 'selected' : '' }}>No
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label>Hostel Status</label>
                                                <select name="hostel_status" class="form-select">
                                                    <option value="1"
                                                        {{ $students->hostel_status ? 'selected' : '' }}>Yes</option>
                                                    <option value="0"
                                                        {{ !$students->hostel_status ? 'selected' : '' }}>No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label>Student Image</label>
                                            <input type="file" name="images" class="form-control">
                                            @if ($students->images)
                                                <img src="{{ asset('templates/students_images/' . $students->images) }}"
                                                    width="100" height="100" class="mt-2">
                                            @endif
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update Student</button>
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
