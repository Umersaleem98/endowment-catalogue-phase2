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

                                    <form action="{{ route('students.update', $student->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="qalam_id" class="form-label">Qalam ID</label>
                                            <input type="text" name="qalam_id" class="form-control"
                                                value="{{ $student->qalam_id }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Student Name</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $student->name }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="father_name" class="form-label">Father Name</label>
                                            <input type="text" name="father_name" class="form-control"
                                                value="{{ $student->father_name }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="institutions" class="form-label">Institution</label>
                                            <input type="text" name="institutions" class="form-control"
                                                value="{{ $student->institutions }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="discipline" class="form-label">Discipline</label>
                                            <input type="text" name="discipline" class="form-control"
                                                value="{{ $student->discipline }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="contact_no" class="form-label">Contact No</label>
                                            <input type="text" name="contact_no" class="form-control"
                                                value="{{ $student->contact_no }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="home_address" class="form-label">Home Address</label>
                                            <input type="text" name="home_address" class="form-control"
                                                value="{{ $student->home_address }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="scholarship_name" class="form-label">Scholarship Name</label>
                                            <input type="text" name="scholarship_name" class="form-control"
                                                value="{{ $student->scholarship_name }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="donor_name" class="form-label">Donor Name</label>
                                            <input type="text" name="donor_name" class="form-control"
                                                value="{{ $student->donor_name }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="province" class="form-label">Province</label>
                                            <input type="text" name="province" class="form-control"
                                                value="{{ $student->province }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="domicile" class="form-label">Domicile</label>
                                            <input type="text" name="domicile" class="form-control"
                                                value="{{ $student->domicile }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Gender</label>
                                            <input type="text" name="gender" class="form-control"
                                                value="{{ $student->gender }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="program" class="form-label">Program</label>
                                            <input type="text" name="program" class="form-control"
                                                value="{{ $student->program }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="degree" class="form-label">Degree</label>
                                            <input type="text" name="degree" class="form-control"
                                                value="{{ $student->degree }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="year_of_admission" class="form-label">Year of
                                                Admission</label>
                                            <input type="text" name="year_of_admission" class="form-control"
                                                value="{{ $student->year_of_admission }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="father_status" class="form-label">Father Status</label>
                                            <input type="text" name="father_status" class="form-control"
                                                value="{{ $student->father_status }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="father_profession" class="form-label">Father
                                                Profession</label>
                                            <input type="text" name="father_profession" class="form-control"
                                                value="{{ $student->father_profession }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="father_profession_category" class="form-label">Father
                                                Profession Category</label>
                                            <input type="text" name="father_profession_category"
                                                class="form-control"
                                                value="{{ $student->father_profession_category }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="organization" class="form-label">Organization</label>
                                            <input type="text" name="organization" class="form-control"
                                                value="{{ $student->organization }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="category" class="form-label">Category</label>
                                            <input type="text" name="category" class="form-control"
                                                value="{{ $student->category }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="monthly_income" class="form-label">Monthly Income</label>
                                            <input type="text" name="monthly_income" class="form-control"
                                                value="{{ $student->monthly_income }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="statement_of_purpose" class="form-label">Statement of
                                                Purpose</label>
                                            <textarea name="statement_of_purpose" class="form-control">{{ $student->statement_of_purpose }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="remarks" class="form-label">Remarks</label>
                                            <textarea name="remarks" class="form-control">{{ $student->remarks }}</textarea>
                                        </div>

                                        <button type="submit" class="btn btn-success">Update</button>
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
