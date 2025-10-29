<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>Adopted Students List</title>
    @include('admin.layouts.head')

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
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
                        <div class="card mb-3 p-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="mb-0">Filters</h6>
                                <button class="btn btn-primary btn-sm ml-3" type="button" data-toggle="collapse"
                                    data-target="#filterSection" aria-expanded="false" aria-controls="filterSection">
                                    <i class="fa fa-filter"></i> Filter
                                </button>
                            </div>

                            <div class="collapse" id="filterSection">
                                <form method="GET" action="{{ url('adopted.students.list') }}" class="row g-2">
                                    <div class="col-md-2">
                                        <input type="text" name="qalam_id" class="form-control form-control-sm mb-2"
                                            placeholder="Qalam ID" value="{{ request('qalam_id') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="student_name"
                                            class="form-control form-control-sm mb-2" placeholder="Student Name"
                                            value="{{ request('student_name') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="father_name"
                                            class="form-control form-control-sm mb-2" placeholder="Father Name"
                                            value="{{ request('father_name') }}">
                                    </div>
                                    <div class="col-md-2">
                                        <select name="institutions" class="form-control form-control-sm mb-2">
                                            <option value="">All Institutions</option>
                                            @foreach ($institutions as $inst)
                                                <option value="{{ $inst }}"
                                                    {{ request('institutions') == $inst ? 'selected' : '' }}>
                                                    {{ $inst }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="discipline" class="form-control form-control-sm mb-2">
                                            <option value="">All Disciplines</option>
                                            @foreach ($disciplines as $disc)
                                                <option value="{{ $disc }}"
                                                    {{ request('discipline') == $disc ? 'selected' : '' }}>
                                                    {{ $disc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="scholarship_name" class="form-control form-control-sm mb-2">
                                            <option value="">All Scholarships</option>
                                            @foreach ($scholarships as $sch)
                                                <option value="{{ $sch }}"
                                                    {{ request('scholarship_name') == $sch ? 'selected' : '' }}>
                                                    {{ $sch }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="province" class="form-control form-control-sm mb-2">
                                            <option value="">All Provinces</option>
                                            @foreach ($provinces as $prov)
                                                <option value="{{ $prov }}"
                                                    {{ request('province') == $prov ? 'selected' : '' }}>
                                                    {{ $prov }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="domicile" class="form-control form-control-sm mb-2">
                                            <option value="">All Domiciles</option>
                                            @foreach ($domiciles as $dom)
                                                <option value="{{ $dom }}"
                                                    {{ request('domicile') == $dom ? 'selected' : '' }}>
                                                    {{ $dom }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="gender" class="form-control form-control-sm mb-2">
                                            <option value="">All Genders</option>
                                            @foreach ($genders as $gender)
                                                <option value="{{ $gender }}"
                                                    {{ request('gender') == $gender ? 'selected' : '' }}>
                                                    {{ $gender }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="program" class="form-control form-control-sm mb-2">
                                            <option value="">All Programs</option>
                                            @foreach ($programs as $prog)
                                                <option value="{{ $prog }}"
                                                    {{ request('program') == $prog ? 'selected' : '' }}>
                                                    {{ $prog }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select name="degree" class="form-control form-control-sm mb-2">
                                            <option value="">All Degrees</option>
                                            @foreach ($degrees as $deg)
                                                <option value="{{ $deg }}"
                                                    {{ request('degree') == $deg ? 'selected' : '' }}>
                                                    {{ $deg }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="year_of_admission"
                                            class="form-control form-control-sm mb-2" placeholder="Year of Admission"
                                            value="{{ request('year_of_admission') }}">
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ url('adopted.students.list') }}"
                                            class="btn btn-secondary btn-sm">Reset</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12">
                            <!-- Actions: Import / Export / Delete -->

                            <div class="card card-default">
                                {{-- <div class="card-header">
                                    <h2>Students List</h2>
                                </div> --}}

                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                <div class="card p-3 mb-3">
                                    <div class="d-flex flex-wrap gap-2">

                                        <!-- Export -->
                                        <form method="POST" action="{{ route('students.export') }}"
                                            id="exportForm">
                                            @csrf
                                            <div id="export-selected-container"></div>
                                            <button type="submit" class="btn btn-success btn-sm ml-3">Export
                                                Selected</button>
                                        </form>

                                        <!-- Delete -->
                                        <form method="POST" action="{{ route('students.bulkDelete') }}"
                                            id="deleteForm">
                                            @csrf
                                            <input type="hidden" name="selected_students" id="delete-selected">
                                            <button type="submit" class="btn btn-danger btn-sm ml-3"
                                                onclick="return confirm('Delete selected students?')">Delete
                                                Selected</button>
                                        </form>

                                    </div>

                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5>Adopted Students List</h5>

                                        <!-- Show entries -->
                                        <form method="GET" action="{{ url('adopted.students.list') }}"
                                            id="perPageForm" class="form-inline">
                                            <label for="perPage" class="mr-2 mb-0">Show</label>
                                            <select name="per_page" id="perPage"
                                                class="form-control form-control-sm"
                                                onchange="document.getElementById('perPageForm').submit();">
                                                @foreach ([50, 100, 150, 200, 300, 350, 400, 450, 500, 550, 600, 650, 1000, 1500, 2000] as $size)
                                                    <option value="{{ $size }}"
                                                        {{ request('per_page', 50) == $size ? 'selected' : '' }}>
                                                        {{ $size }}</option>
                                                @endforeach
                                            </select>
                                            <span class="ml-2">entries</span>
                                            <!-- Keep other filters -->
                                            @foreach (request()->except('per_page') as $key => $value)
                                                <input type="hidden" name="{{ $key }}"
                                                    value="{{ $value }}">
                                            @endforeach
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body">


                                    <!-- Bulk Delete Form -->
                                    <form id="bulkDeleteForm" action="{{ route('students.bulkDelete') }}"
                                        method="POST">
                                        @csrf
                                        <div class="table-responsive">
                                            <table id="productsTable" class="table table-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" id="select-all">
                                                        </th>
                                                        <th>View</th>
                                                        <th>Qalam ID</th>
                                                        <th>Student Name</th>
                                                        <th>Father Name</th>
                                                        <th>Institutions</th>
                                                        <th>Discipline</th>
                                                        <th>Scholarship Name</th>
                                                        <th>Province</th>
                                                        <th>Domicile</th>
                                                        <th>Gender</th>
                                                        <th>Program</th>
                                                        <th>Degree</th>
                                                        <th>Year of Admission</th>
                                                        <th>Images</th>
                                                        {{-- <th>Edit</th>
                                                        <th>Delete</th> --}}
                                                        <th>Adopt</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-dark">

                                                    @forelse ($students as $student)
                                                        <tr>
                                                            <td><input type="checkbox" class="student-checkbox"
                                                                    value="{{ $student->id }}"></td>
                                                            <td>
                                                                <a class=" view-profile-btn" data-toggle="modal"
                                                                    data-target="#profileModal"
                                                                    data-student="{{ $student }}">
                                                                    View
                                                                </a>
                                                            </td>
                                                            <td>{{ $student->qalam_id }}</td>
                                                            <td>{{ $student->student_name }}</td>
                                                            <td>{{ $student->father_name }}</td>
                                                            <td>{{ $student->institutions }}</td>
                                                            <td>{{ $student->discipline }}</td>
                                                            <td>{{ $student->scholarship_name }}</td>
                                                            <td>{{ $student->province }}</td>
                                                            <td>{{ $student->domicile }}</td>
                                                            <td>{{ $student->gender }}</td>
                                                            <td>{{ $student->program }}</td>
                                                            <td>{{ $student->degree }}</td>
                                                            <td>{{ $student->year_of_admission }}</td>
                                                            <td>
                                                                @if ($student->images)
                                                                    <img src="{{ asset('templates\students_images/' . $student->images) }}"
                                                                        alt="Student Image"
                                                                        style="width:50px;height:50px;object-fit:cover;">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ url('adopted/student/edit', ['id' => $student->id]) }}"
                                                                    class="btn btn-info btn-sm py-0 px-2">Edit</a>
                                                            </td>
                                                            {{-- <td>
                                                                <a href="{{ route('students.delete', ['id' => $student->id]) }}"
                                                                    class="btn btn-danger btn-sm py-0 px-2">Delete</a>
                                                            </td> --}}
                                                            <td>
                                                                <a href="{{ route('students.unadopted', ['id' => $student->id]) }}"
                                                                    class="btn btn-warning btn-sm py-0 px-2">Unadopted</a>
                                                            </td>


                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="14" class="text-center text-muted">No
                                                                records found</td>
                                                        </tr>
                                                    @endforelse

                                                </tbody>
                                            </table>
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

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    <!-- Profile Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Student Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Profile Photo -->
                    <div class="text-center mb-3">
                        <img id="profilePhoto" src="" alt="Profile Photo" class="rounded-circle"
                            style="width:120px;height:120px;object-fit:cover;">
                    </div>

                    <!-- Personal Information -->
                    <h6>Personal Information</h6>
                    <table class="table table-sm table-borderless">
                        <tr>
                            <th>Student Name:</th>
                            <td id="profileName"></td>
                        </tr>
                        <tr>
                            <th>Father Name:</th>
                            <td id="profileFather"></td>
                        </tr>
                        <tr>
                            <th>Qalam ID:</th>
                            <td id="profileQalam"></td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td id="profileGender"></td>
                        </tr>
                        <tr>
                            <th>Domicile:</th>
                            <td id="profileDomicile"></td>
                        </tr>
                    </table>

                    <!-- Academic Information -->
                    <h6>Academic Information</h6>
                    <table class="table table-sm table-borderless">
                        <tr>
                            <th>Institutions:</th>
                            <td id="profileInstitution"></td>
                        </tr>
                        <tr>
                            <th>Discipline:</th>
                            <td id="profileDiscipline"></td>
                        </tr>
                        <tr>
                            <th>Program:</th>
                            <td id="profileProgram"></td>
                        </tr>
                        <tr>
                            <th>Degree:</th>
                            <td id="profileDegree"></td>
                        </tr>
                        <tr>
                            <th>Year of Admission:</th>
                            <td id="profileYear"></td>
                        </tr>
                        <tr>
                            <th>Scholarship Name:</th>
                            <td id="profileScholarship"></td>
                        </tr>
                    </table>

                    <!-- Contact Information -->
                    <h6>Contact Information</h6>
                    <table class="table table-sm table-borderless">
                        <tr>
                            <th>Contact No:</th>
                            <td id="profileContact"></td>
                        </tr>
                        <tr>
                            <th>Province:</th>
                            <td id="profileProvince"></td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td id="profileAddress"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.querySelectorAll('.view-profile-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                let student = JSON.parse(this.dataset.student.replace(/&quot;/g, '"')); // decode JSON

                // ✅ Correct image path
                let photoroute = student.images ? "{{ asset('templates/students_images') }}/" + student
                    .images :
                    "{{ asset('default-avatar.png') }}";
                document.getElementById('profilePhoto').src = photoroute;

                document.getElementById('profilePhoto').src = photoroute;

                // Personal Info
                document.getElementById('profileName').innerText = student.student_name ?? '';
                document.getElementById('profileFather').innerText = student.father_name ?? '';
                document.getElementById('profileQalam').innerText = student.qalam_id ?? '';
                document.getElementById('profileGender').innerText = student.gender ?? '';
                document.getElementById('profileDomicile').innerText = student.domicile ?? '';

                // Academic Info
                document.getElementById('profileInstitution').innerText = student.institutions ?? '';
                document.getElementById('profileDiscipline').innerText = student.discipline ?? '';
                document.getElementById('profileProgram').innerText = student.program ?? '';
                document.getElementById('profileDegree').innerText = student.degree ?? '';
                document.getElementById('profileYear').innerText = student.year_of_admission ?? '';
                document.getElementById('profileScholarship').innerText = student.scholarship_name ?? '';

                // Contact Info
                document.getElementById('profileContact').innerText = student.contact_no ?? '';
                document.getElementById('profileProvince').innerText = student.province ?? '';
                document.getElementById('profileAddress').innerText = student.home_address ?? '';
            });
        });
    </script>



    <script>
        // Select/Deselect all
        document.getElementById('select-all').addEventListener('change', function() {
            document.querySelectorAll('.student-checkbox').forEach(cb => cb.checked = this.checked);
        });

        function setSelectedInputs(formContainerId) {
            let container = document.getElementById(formContainerId);
            container.innerHTML = ''; // clear old
            let selected = Array.from(document.querySelectorAll('.student-checkbox:checked')).map(cb => cb.value);
            selected.forEach(id => {
                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'selected_students[]';
                input.value = id;
                container.appendChild(input);
            });
        }

        document.getElementById('exportForm').addEventListener('submit', function() {
            setSelectedInputs('export-selected-container');
        });
    </script>




    <script>
        // Select/Deselect all
        document.getElementById('select-all').addEventListener('change', function() {
            document.querySelectorAll('.student-checkbox').forEach(cb => cb.checked = this.checked);
        });

        // Update hidden inputs before form submission
        document.getElementById('deleteForm').addEventListener('submit', function(e) {
            let selected = Array.from(document.querySelectorAll('.student-checkbox:checked'))
                .map(cb => cb.value);
            if (selected.length === 0) {
                alert('Please select at least one student!');
                e.preventDefault();
                return;
            }

            // Clear previous inputs
            const container = document.getElementById('delete-selected');
            container.remove();

            // Create new hidden inputs for each selected student
            const form = this;
            selected.forEach(id => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'selected_students[]';
                input.value = id;
                form.appendChild(input);
            });
        });
    </script>






</body>

</html>
