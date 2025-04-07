<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
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
                    <!-- Top Statistics -->
                    <div class="row">
                        <!-- Students Overview -->
                        <div class="col-md-3">
                            <div class="card mb-3 text-center" style="background-color:rgb(137, 174, 184)" >
                                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                    <h5 class="card-title text-dark"><i class="fas fa-users"></i> Students Overview</h5>
                                    <h4 class="card-text text-dark">{{ $totalStudents }}</h4>
                                    <p class="card-text text-dark">Remaining: {{ $totalStudents - $Adopedstudents }}</p>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Adopted Students -->
                        <div class="col-md-3">
                            <div class="card mb-3 text-center" style="background-color:rgb(169, 238, 174)">
                                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                    <h5 class="card-title text-dark"><i class="fas fa-user-check"></i> Adopted Students</h5>
                                    <h4 class="card-text text-dark">{{ $Adopedstudents }}</h4>
                                    <p class="card-text text-dark">({{ round(($Adopedstudents / $totalStudents) * 100, 2) }}%) Adopted</p>
                                </div>
                            </div>
                        </div>
                    
                        <!-- UG Students -->
                        <div class="col-md-3">
                            <div class="card mb-3 text-center" style="background-color:rgb(221, 233, 112)">
                                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                    <h5 class="card-title text-dark"><i class="fas fa-graduation-cap"></i> UG Students</h5>
                                    <h4 class="card-text text-dark">{{ $ugStudents }}</h4>
                                    <p class="card-text text-dark">Undergraduates</p>
                                </div>
                            </div>
                        </div>
                    
                        <!-- PG Students -->
                        <div class="col-md-3">
                            <div class="card mb-3 text-center" style="background-color:rgb(214, 161, 228)">
                                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                    <h5 class="card-title text-dark"><i class="fas fa-chalkboard-teacher"></i> PG Students</h5>
                                    <h4 class="card-text text-dark">{{ $pgStudents }}</h4>
                                    <p class="card-text text-dark">Postgraduates</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Hostel Payments -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card mb-3 text-center" style="background-color:rgb(158, 220, 228)">
                                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                    <h5 class="card-title text-dark"><i class="fas fa-building"></i> Hostel Payments</h5>
                                    <h4 class="card-text text-dark">Rs. {{ number_format($totalHostelPayments, 2) }}</h4>
                                    <p class="card-text text-dark">Total Hostel Fees Paid</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    

                    <!-- Students by Year of Admission Chart -->
                    <div class="row mt-4 bor">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-light">
                                        {{-- <i class="fas fa-chart-bar"></i> UG & PG Students by Year of Admission (2018 Onward) --}}
                                    </h5>
                                    <canvas id="studentsByYearChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h5 class="card-title text-dark"><i class="fas fa-award"></i> Scholarship
                                        Distribution</h5>
                                    <div style="max-height: 300px; overflow-y: auto;"> <!-- Added scrollable div -->
                                        <ul class="list-group border">
                                            @foreach ($scholarshipCounts as $scholarship)
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center border">
                                                    {{ $scholarship->scholarship_name ?? 'No Scholarship' }}
                                                    <span
                                                        class="badge bg-primary rounded-pill">{{ $scholarship->count }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.layouts.script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const allYears = @json($allYears);
            const ugStudentsByYear = @json($ugStudentsByYear->toArray());
            const pgStudentsByYear = @json($pgStudentsByYear->toArray());

            // Filter the years to include only 2018 onward
            const filteredYears = allYears.filter(year => year >= 2018);
            const ugData = filteredYears.map(year => ugStudentsByYear[year] || 0);
            const pgData = filteredYears.map(year => pgStudentsByYear[year] || 0);

            const ctx = document.getElementById('studentsByYearChart').getContext('2d');

            const data = {
                labels: filteredYears,
                datasets: [{
                        label: 'UG Students',
                        data: ugData,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                    },
                    {
                        label: 'PG Students',
                        data: pgData,
                        backgroundColor: 'rgba(255, 99, 132, 0.6)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                    },
                ],
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'UG and PG Students by Year of Admission (2018 Onward)',
                        },
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            };

            new Chart(ctx, config);
        });
    </script>
</body>

</html>
