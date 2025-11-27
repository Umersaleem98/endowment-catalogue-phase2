<title>Adopted Student List</title>
@include('Layouts.admin.head')
<style>
    .table-responsive table tbody tr td {
        white-space: nowrap;
        max-width: 150px;
        overflow: hidden;
        text-overflow: ellipsis;
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
                        <div class="row gy-6">

                            @include('Layouts.success')

                            <div class="col-12">
                                <div class="card">

                                    <div class="card-header d-flex justify-content-between align-items-center">

                                        <h5 class="card-title mb-0">
                                            Student List
                                            <span class="badge bg-primary ms-2">{{ $totalStudents ?? 0 }}</span>
                                        </h5>

                                        <!-- Search Form -->
                                        <form method="GET" action=""
                                            class="d-flex ms-auto me-3 align-items-center">

                                            <label for="perPage" class="me-2 mb-0" style="color:#000;"> per
                                                page:</label>
                                            <select name="perPage" id="perPage" class="form-select form-select-sm"
                                                style="width: auto;" onchange="this.form.submit()">
                                                @php
                                                    $perPageOptions = [50, 100, 150, 200, 250, 300];
                                                    $currentPerPage = request('perPage', 10);
                                                @endphp
                                                @foreach ($perPageOptions as $option)
                                                    <option value="{{ $option }}"
                                                        {{ $currentPerPage == $option ? 'selected' : '' }}>
                                                        {{ $option }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <input type="text" name="search"
                                                class="form-control form-control-sm ms-3"
                                                placeholder="Search student..." value="{{ request('search') }}">
                                            <button class="btn btn-primary btn-sm ms-2" type="submit">Search</button>
                                            <a href="{{ route('adopted-students.index') }}"
                                                class="btn btn-info btn-sm ms-2">Reset</a>
                                        </form>
                                    </div>

                                    <div class="card-body">


                                        {{-- Bulk Delete Form --}}


                                        <div class="table-responsive text-nowrap">
                                            <table class="table table-sm table-striped table-hover align-middle small">
                                                <thead>
                                                    <tr>

                                                        {{-- <th>#</th> --}}
                                                        <th>Action</th>
                                                        <th>Qalam ID</th>
                                                        <th>Student Name</th>
                                                        <th>Father Name</th>
                                                        {{-- <th>Institutions</th>
                                                            <th>Discipline</th> --}}
                                                        <th>Contact No</th>
                                                        <th>Province</th>
                                                        <th>Domicile</th>
                                                        <th>Gender</th>
                                                        <th>Degree</th>
                                                        <th>Year of Admission</th>
                                                        {{-- <th>Father Status</th>
                                                            <th>Father Profession</th> --}}
                                                        <th>Image</th>
                                                        <th>Unadopted Edit</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @forelse ($students as $index => $student)
                                                        <tr>

                                                            {{-- <td>{{ $students->firstItem() + $index }}</td> --}}

                                                            <td>
                                                                <button type="button"
                                                                    class="btn btn-primary btn-sm view-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#studentModal"
                                                                    data-student='@json($student)'>
                                                                    View
                                                                </button>
                                                            </td>

                                                            <td>{{ $student->qalam_id }}</td>
                                                            <td>{{ $student->student_name }}</td>
                                                            <td>{{ $student->father_name }}</td>
                                                            {{-- <td>{{ $student->institutions }}</td>
                                                                <td>{{ $student->discipline }}</td> --}}
                                                            <td>{{ $student->contact_no }}</td>
                                                            <td>{{ $student->province }}</td>
                                                            <td>{{ $student->domicile }}</td>
                                                            <td>{{ $student->gender }}</td>
                                                            <td>{{ $student->degree }}</td>
                                                            <td>{{ $student->year_of_admission }}</td>
                                                            {{-- <td>{{ $student->father_status }}</td>
                                                                <td>{{ $student->father_profession }}</td> --}}

                                                            <td>
                                                                @if ($student->images)
                                                                    <img src="{{ asset('uploads/students/' . $student->images) }}"
                                                                        alt="Student Image"
                                                                        style="width: 60px; height: 60px; object-fit: cover;">
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>

                                                            <td>
                                                                <a href="{{ route('students.unadopted.status', $student->id) }}"
                                                                    class="btn btn-info btn-sm">
                                                                    Unadopted
                                                                </a>
                                                            </td>


                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="19" class="text-center">No students
                                                                found.</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="d-flex justify-content-center mt-4">
                                            {{ $students->links() }}
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="content-backdrop fade"></div>
                </div>

            </div>

        </div>

        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    @include('Layouts.admin.script')
    <script src="{{ asset('js/std_scriptjsjs') }}"></script>



    {{-- Modal Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const studentModal = document.getElementById('studentModal');
            const uploadsUrl = "{{ asset('uploads/students') }}";

            studentModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const studentData = JSON.parse(button.getAttribute('data-student'));

                document.getElementById('modalImage').src =
                    studentData.images ? `${uploadsUrl}/${studentData.images}` :
                    'https://via.placeholder.com/200?text=No+Image';

                const setText = (id, value) =>
                    document.getElementById(id).textContent = value ?? '';

                setText('modalQalamId', studentData.qalam_id);
                setText('modalStudentName', studentData.student_name);
                setText('modalGender', studentData.gender);
                setText('modalContactNo', studentData.contact_no);
                setText('modalHomeAddress', studentData.home_address);
                setText('modalProvince', studentData.province);
                setText('modalDomicile', studentData.domicile);

                setText('modalFatherName', studentData.father_name);
                setText('modalFatherStatus', studentData.father_status);
                setText('modalFatherProfession', studentData.father_profession);
                setText('modalMonthlyIncome', studentData.monthly_income);

                setText('modalInstitutions', studentData.institutions);
                setText('modalDiscipline', studentData.discipline);
                setText('modalProgram', studentData.program);
                setText('modalDegree', studentData.degree);
                setText('modalYearOfAdmission', studentData.year_of_admission);

                setText('modalScholarshipName', studentData.scholarship_name);
                setText('modalDonorName', studentData.nust_trust_fund_donor_name);

                setText('modalStatementOfPurpose', studentData.statement_of_purpose);
                setText('modalRemarks', studentData.remarks);

                setText('modalMakePledge', studentData.make_pledge ? 'Yes' : 'No');
                setText('modalPaymentApproved', studentData.payment_approved ? 'Yes' : 'No');
                setText('modalHostelStatus', studentData.hostel_status ? 'Yes' : 'No');
            });
        });
    </script>

    <!-- Modal HTML -->
    <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Student Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-4 text-center mb-3">
                            <img id="modalImage" src="" class="img-fluid rounded"
                                style="max-height: 200px; object-fit: cover;">
                        </div>

                        <div class="col-md-8">

                            <!-- Personal Info -->
                            <h5>Personal Information</h5>
                            <table class="table table-bordered mb-4">
                                <tbody>
                                    <tr>
                                        <th>Qalam ID</th>
                                        <td id="modalQalamId"></td>
                                    </tr>
                                    <tr>
                                        <th>Student Name</th>
                                        <td id="modalStudentName"></td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td id="modalGender"></td>
                                    </tr>
                                    <tr>
                                        <th>Contact No</th>
                                        <td id="modalContactNo"></td>
                                    </tr>
                                    <tr>
                                        <th>Home Address</th>
                                        <td id="modalHomeAddress"></td>
                                    </tr>
                                    <tr>
                                        <th>Province</th>
                                        <td id="modalProvince"></td>
                                    </tr>
                                    <tr>
                                        <th>Domicile</th>
                                        <td id="modalDomicile"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Family Info -->
                            <h5>Family Information</h5>
                            <table class="table table-bordered mb-4">
                                <tbody>
                                    <tr>
                                        <th>Father Name</th>
                                        <td id="modalFatherName"></td>
                                    </tr>
                                    <tr>
                                        <th>Father Status</th>
                                        <td id="modalFatherStatus"></td>
                                    </tr>
                                    <tr>
                                        <th>Father Profession</th>
                                        <td id="modalFatherProfession"></td>
                                    </tr>
                                    <tr>
                                        <th>Monthly Income</th>
                                        <td id="modalMonthlyIncome"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Academic Info -->
                            <h5>Academic Information</h5>
                            <table class="table table-bordered mb-4">
                                <tbody>
                                    <tr>
                                        <th>Institutions</th>
                                        <td id="modalInstitutions"></td>
                                    </tr>
                                    <tr>
                                        <th>Discipline</th>
                                        <td id="modalDiscipline"></td>
                                    </tr>
                                    <tr>
                                        <th>Program</th>
                                        <td id="modalProgram"></td>
                                    </tr>
                                    <tr>
                                        <th>Degree</th>
                                        <td id="modalDegree"></td>
                                    </tr>
                                    <tr>
                                        <th>Year of Admission</th>
                                        <td id="modalYearOfAdmission"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Scholarship Info -->
                            <h5>Scholarship Information</h5>
                            <table class="table table-bordered mb-4">
                                <tbody>
                                    <tr>
                                        <th>Scholarship Name</th>
                                        <td id="modalScholarshipName"></td>
                                    </tr>
                                    <tr>
                                        <th>Donor Name</th>
                                        <td id="modalDonorName"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Purpose & Remarks -->
                            <h5>Purpose & Remarks</h5>
                            <table class="table table-bordered mb-4">
                                <tbody>
                                    <tr>
                                        <th>Statement of Purpose</th>
                                        <td id="modalStatementOfPurpose"></td>
                                    </tr>
                                    <tr>
                                        <th>Remarks</th>
                                        <td id="modalRemarks"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Payment -->
                            <h5>Payment & Pledge</h5>
                            <table class="table table-bordered mb-4">
                                <tbody>
                                    <tr>
                                        <th>Make Pledge</th>
                                        <td id="modalMakePledge"></td>
                                    </tr>
                                    <tr>
                                        <th>Payment Approved</th>
                                        <td id="modalPaymentApproved"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Hostel -->
                            <h5>Hostel Information</h5>
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <th>Hostel Status</th>
                                        <td id="modalHostelStatus"></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
