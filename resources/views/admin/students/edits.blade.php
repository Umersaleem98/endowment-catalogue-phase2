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
                                    <h2>Edit Student Information</h2>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('students_update', $students->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                     
                        
                                        <!-- Qalam ID and Student Name in One Row -->
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="qalam_id" class="form-label">Qalam ID</label>
                                                <input type="text" name="qalam_id" id="qalam_id" class="form-control" value="{{ $students->qalam_id }}" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="student_name" class="form-label">Student Name</label>
                                                <input type="text" name="student_name" id="student_name" class="form-control" value="{{ $students->student_name }}" required>
                                            </div>
                                        </div>

                                        <!-- Father Name and Institution in One Row -->
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="father_name" class="form-label">Father Name</label>
                                                <input type="text" name="father_name" id="father_name" class="form-control" value="{{ $students->father_name }}" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="institutions" class="form-label">Institution</label>
                                                <input type="text" name="institutions" id="institutions" class="form-control" value="{{ $students->institutions }}" required>
                                            </div>
                                        </div>

                                        <!-- Discipline and Contact No in One Row -->
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="discipline" class="form-label">Discipline</label>
                                                <input type="text" name="discipline" id="discipline" class="form-control" value="{{ $students->discipline }}" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="contact_no" class="form-label">Contact No</label>
                                                <input type="text" name="contact_no" id="contact_no" class="form-control" value="{{ $students->contact_no }}" required>
                                            </div>
                                        </div>

                                        <!-- Home Address and Scholarship Name in One Row -->
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="home_address" class="form-label">Home Address</label>
                                                <textarea name="home_address" id="home_address" class="form-control" rows="2" required>{{ $students->home_address }}</textarea>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="scholarship_name" class="form-label">Scholarship Name</label>
                                                <input type="text" name="scholarship_name" id="scholarship_name" class="form-control" value="{{ $students->scholarship_name }}" required>
                                            </div>
                                        </div>

                                        <!-- Monthly Income and Remarks in One Row -->
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="monthly_income" class="form-label">Monthly Income</label>
                                                <input type="number" name="monthly_income" id="monthly_income" class="form-control" value="{{ $students->monthly_income }}" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="remarks" class="form-label">Remarks</label>
                                                <textarea name="remarks" id="remarks" class="form-control" rows="3">{{ $students->remarks }}</textarea>
                                            </div>
                                        </div>

                                        <!-- Image -->
                                        <div class="mb-3">
                                            <label for="images" class="form-label">Student Image</label>
                                            <input type="file" name="images" id="images" class="form-control">
                                            @if ($students->images)
                                            <img src="{{ asset('templates/students_images/' . $students->images) }}" alt="Student Photo" class="img-thumbnail mt-2" style="width:100px; height:100px; object-fit:cover;">
                                            @endif
                                        </div>

                                        <!-- Other Fields -->
                                        <div class="row">
                                            @foreach ([
                                                'nust_trust_fund_donor_name', 'province', 'domicile', 'gender', 
                                                'program', 'degree', 'year_of_admission', 'father_status', 
                                                'father_profession', 'statement_of_purpose', 'make_pledge', 'payment_approved'
                                            ] as $field)
                                            <div class="col-md-6 mb-3">
                                                <label for="{{ $field }}" class="form-label">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                                                <input type="text" name="{{ $field }}" id="{{ $field }}" class="form-control" value="{{ $students->$field }}">
                                            </div>
                                            @endforeach
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
