<title>Edit Student</title>
@include('Layouts.admin.head')

<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }
</style>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            @include('Layouts.admin.sidebar')

            <div class="layout-page">

                @include('Layouts.admin.header')

                <div class="content-wrapper">

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <h4 class="fw-bold py-3 mb-4">Edit Student</h4>

                        {{-- Success Message --}}
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        {{-- Validation Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="m-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('students.update', $student->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Row 1 -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Qalam ID</label>
                                    <input type="number" name="qalam_id" class="form-control form-control-sm"
                                        value="{{ $student->qalam_id }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Student Name</label>
                                    <input type="text" name="student_name" class="form-control form-control-sm"
                                        value="{{ $student->student_name }}" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Father Name</label>
                                    <input type="text" name="father_name" class="form-control form-control-sm"
                                        value="{{ $student->father_name }}" required>
                                </div>
                            </div>

                            <!-- Row 2 -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Institution</label>
                                    <input type="text" name="institutions" class="form-control form-control-sm"
                                        value="{{ $student->institutions }}" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Discipline</label>
                                    <input type="text" name="discipline" class="form-control form-control-sm"
                                        value="{{ $student->discipline }}" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Contact No</label>
                                    <input type="number" name="contact_no" class="form-control form-control-sm"
                                        value="{{ $student->contact_no }}" required>
                                </div>
                            </div>

                            <!-- Row 3 -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Home Address</label>
                                    <textarea name="home_address" class="form-control form-control-sm" rows="2" required>{{ $student->home_address }}</textarea>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Scholarship Name</label>
                                    <input type="text" name="scholarship_name" class="form-control form-control-sm"
                                        value="{{ $student->scholarship_name }}" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Monthly Income</label>
                                    <input type="number" name="monthly_income" class="form-control form-control-sm"
                                        value="{{ $student->monthly_income }}" required>
                                </div>
                            </div>

                            <!-- Row 4 -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Remarks</label>
                                    <input type="text" name="remarks" class="form-control form-control-sm"
                                        value="{{ $student->remarks }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">NTF Donor Name</label>
                                    <input type="text" name="nust_trust_fund_donor_name"
                                        class="form-control form-control-sm"
                                        value="{{ $student->nust_trust_fund_donor_name }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Province</label>
                                    <input type="text" name="province" class="form-control form-control-sm"
                                        value="{{ $student->province }}">
                                </div>
                            </div>

                            <!-- Row 5 -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Domicile</label>
                                    <input type="text" name="domicile" class="form-control form-control-sm"
                                        value="{{ $student->domicile }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Gender</label>
                                    <select name="gender" class="form-select form-select-sm" required>
                                        <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Program</label>
                                    <input type="text" name="program" class="form-control form-control-sm"
                                        value="{{ $student->program }}">
                                </div>
                            </div>

                            <!-- Row 6 -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Degree</label>
                                    <select name="degree" class="form-select form-select-sm" required>
                                        <option value="UG" {{ $student->degree == 'UG' ? 'selected' : '' }}>UG</option>
                                        <option value="PG" {{ $student->degree == 'PG' ? 'selected' : '' }}>PG</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Year of Admission</label>
                                    <input type="number" name="year_of_admission"
                                        class="form-control form-control-sm"
                                        value="{{ $student->year_of_admission }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Father Status</label>
                                    <select name="father_status" class="form-select form-select-sm" required>
                                        <option value="Alive" {{ $student->father_status == 'Alive' ? 'selected' : '' }}>
                                            Alive</option>
                                        <option value="Deceased"
                                            {{ $student->father_status == 'Deceased' ? 'selected' : '' }}>Deceased</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Row 7 -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Father Profession</label>
                                    <input type="text" name="father_profession"
                                        class="form-control form-control-sm"
                                        value="{{ $student->father_profession }}">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Statement of Purpose</label>
                                    <textarea name="statement_of_purpose" class="form-control form-control-sm" rows="3">{{ $student->statement_of_purpose }}</textarea>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Student Image (2MB max)</label>
                                    <input type="file" name="images" class="form-control form-control-sm"
                                        accept=".jpg,.jpeg,.png">

                                    @if ($student->images)
                                        <small class="text-success">Current Image: {{ $student->images }}</small>
                                    @endif
                                </div>
                            </div>

                            <!-- Row 8 -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Make Pledge</label>
                                    <select name="make_pledge" class="form-select form-select-sm">
                                        <option value="1" {{ $student->make_pledge == 1 ? 'selected' : '' }}>Yes
                                        </option>
                                        <option value="0" {{ $student->make_pledge == 0 ? 'selected' : '' }}>No
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Payment Approved</label>
                                    <select name="payment_approved" class="form-select form-select-sm">
                                        <option value="1"
                                            {{ $student->payment_approved == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="0"
                                            {{ $student->payment_approved == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Hostel Status</label>
                                    <select name="hostel_status" class="form-select form-select-sm">
                                        <option value="1" {{ $student->hostel_status == 1 ? 'selected' : '' }}>
                                            Yes</option>
                                        <option value="0" {{ $student->hostel_status == 0 ? 'selected' : '' }}>No
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Update Student</button>
                            </div>

                        </form>
                    </div>

                    <div class="content-backdrop fade"></div>
                </div>

            </div>

        </div>
    </div>

    @include('Layouts.admin.script')
</body>

</html>
