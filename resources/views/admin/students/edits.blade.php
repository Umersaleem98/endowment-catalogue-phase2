<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Edit Student Information</title>

    <!-- Include Required CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    @include('admin.layouts.head')

    <style>
        label {
            font-weight: 600;
        }

        .img-preview {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            margin-top: 8px;
        }
    </style>
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
            @include('admin.layouts.header')

            <div class="content-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h2>Edit Student Information</h2>
                                </div>

                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                <div class="card-body">
                                    <form action="{{ url('students/update', $student->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row g-3">

                                            <!-- Row 1 -->
                                            <div class="col-md-4">
                                                <label class="form-label">Qalam ID</label>
                                                <input type="text" name="qalam_id" class="form-control"
                                                    value="{{ $student->qalam_id }}">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Student Name</label>
                                                <input type="text" name="student_name" class="form-control"
                                                    value="{{ $student->student_name }}">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Father Name</label>
                                                <input type="text" name="father_name" class="form-control"
                                                    value="{{ $student->father_name }}">
                                            </div>

                                            <!-- Row 2 -->
                                            <div class="col-md-4">
                                                <label class="form-label">Institution</label>
                                                <input type="text" name="institutions" class="form-control"
                                                    value="{{ $student->institutions }}">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Discipline</label>
                                                <input type="text" name="discipline" class="form-control"
                                                    value="{{ $student->discipline }}">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Contact No</label>
                                                <input type="text" name="contact_no" class="form-control"
                                                    value="{{ $student->contact_no }}">
                                            </div>

                                            <!-- Row 3 -->
                                            <div class="col-md-4">
                                                <label class="form-label">Home Address</label>
                                                <input type="text" name="home_address" class="form-control"
                                                    value="{{ $student->home_address }}">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Scholarship Name</label>
                                                <input type="text" name="scholarship_name" class="form-control"
                                                    value="{{ $student->scholarship_name }}">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">NUST Trust Fund Donor Name</label>
                                                <input type="text" name="nust_trust_fund_donor_name"
                                                    class="form-control"
                                                    value="{{ $student->nust_trust_fund_donor_name }}">
                                            </div>

                                            <!-- Row 4 -->
                                            <div class="col-md-4">
                                                <label class="form-label">Province</label>
                                                <select name="province" class="form-select">
                                                    <option value="">Select Province</option>
                                                    @foreach (['Punjab', 'Sindh', 'Balochistan', 'KPK', 'AJK', 'Gilgit Baltistan', 'Capital'] as $province)
                                                        <option value="{{ $province }}"
                                                            {{ $student->province == $province ? 'selected' : '' }}>
                                                            {{ $province }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Domicile</label>
                                                <input type="text" name="domicile" class="form-control"
                                                    value="{{ $student->domicile }}">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Gender</label>
                                                <select name="gender" class="form-select">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male"
                                                        {{ $student->gender == 'Male' ? 'selected' : '' }}>Male
                                                    </option>
                                                    <option value="Female"
                                                        {{ $student->gender == 'Female' ? 'selected' : '' }}>Female
                                                    </option>
                                                    <option value="Other"
                                                        {{ $student->gender == 'Other' ? 'selected' : '' }}>Other
                                                    </option>
                                                </select>
                                            </div>

                                            <!-- Row 5 -->
                                            <div class="col-md-4">
                                                <label class="form-label">Program</label>
                                                <input type="text" name="program" class="form-control"
                                                    value="{{ $student->program }}">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Degree</label>
                                                <input type="text" name="degree" class="form-control"
                                                    value="{{ $student->degree }}">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Year of Admission</label>
                                                <select name="year_of_admission" class="form-select">
                                                    <option value="">Select Year</option>
                                                    @for ($year = 2015; $year <= 2025; $year++)
                                                        <option value="{{ $year }}"
                                                            {{ $student->year_of_admission == $year ? 'selected' : '' }}>
                                                            {{ $year }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>

                                            <!-- Row 6 -->
                                            <div class="col-md-4">
                                                <label class="form-label">Father Status</label>
                                                <input type="text" name="father_status" class="form-control"
                                                    value="{{ $student->father_status }}">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Father Profession</label>
                                                <input type="text" name="father_profession" class="form-control"
                                                    value="{{ $student->father_profession }}">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Monthly Income</label>
                                                <input type="text" name="monthly_income" class="form-control"
                                                    value="{{ $student->monthly_income }}">
                                            </div>

                                            <!-- Row 7 (Pledge + Payment + Hostel) -->
                                            <div class="col-md-4">
                                                <label class="form-label">Make Pledge</label>
                                                <select name="make_pledge" class="form-select">
                                                    <option value="">Select Option</option>
                                                    <option value="1"
                                                        {{ $student->make_pledge == 1 ? 'selected' : '' }}>Yes</option>
                                                    <option value="0"
                                                        {{ $student->make_pledge == 0 ? 'selected' : '' }}>No</option>
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Payment Approved</label>
                                                <select name="payment_approved" class="form-select">
                                                    <option value="">Select Option</option>
                                                    <option value="1"
                                                        {{ $student->payment_approved == 1 ? 'selected' : '' }}>Yes
                                                    </option>
                                                    <option value="0"
                                                        {{ $student->payment_approved == 0 ? 'selected' : '' }}>No
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="form-label">Hostel Status</label>
                                                <select name="hostel_status" class="form-select">
                                                    <option value="">Select Option</option>
                                                    <option value="1"
                                                        {{ $student->hostel_status == 1 ? 'selected' : '' }}>Yes
                                                    </option>
                                                    <option value="0"
                                                        {{ $student->hostel_status == 0 ? 'selected' : '' }}>No
                                                    </option>
                                                </select>
                                            </div>

                                            <!-- Row 8 (Image + Preview) -->
                                            <div class="col-md-4">
                                                <label class="form-label">Upload Image</label>
                                                <input type="file" name="images" class="form-control"
                                                    accept="image/*" onchange="previewImage(event)">
                                                @if ($student->images)
                                                    <img src="{{ asset('templates/students_images/' . $student->images) }}"
                                                        alt="Student Image" class="img-preview" id="currentImage">
                                                @endif
                                                <img id="newImagePreview" class="img-preview d-none" />
                                            </div>

                                            <!-- Row 9 (Textareas) -->
                                            <div class="col-md-6">
                                                <label class="form-label">Statement of Purpose</label>
                                                <textarea name="statement_of_purpose" class="form-control" rows="3">{{ $student->statement_of_purpose }}</textarea>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Remarks</label>
                                                <textarea name="remarks" class="form-control" rows="3">{{ $student->remarks }}</textarea>
                                            </div>
                                        </div>

                                        <div class="mt-4 text-end">
                                            <button type="submit" class="btn btn-success px-5">Update</button>
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

    <script>
        function previewImage(event) {
            const newImage = document.getElementById('newImagePreview');
            newImage.src = URL.createObjectURL(event.target.files[0]);
            newImage.classList.remove('d-none');
            document.getElementById('currentImage')?.classList.add('d-none');
        }
    </script>
</body>

</html>
