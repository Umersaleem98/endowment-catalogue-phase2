@include('Layouts.admin.head')

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            @include('Layouts.admin.sidebar')

            <div class="layout-page">

                @include('Layouts.admin.header')

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">

                        <div class="row g-4 mb-4">
                            <!-- Total Students Card -->
                            <div class="col-md-3">
                                <div class="card text-white bg-primary">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Total Students</h5>
                                        <h2 class="card-text">{{ $totalStudents }}</h2>
                                    </div>
                                </div>
                            </div>

                            <!-- UG Students Card -->
                            <div class="col-md-3">
                                <div class="card text-white bg-success">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">UG Students</h5>
                                        <h2 class="card-text">{{ $ugStudents }}</h2>
                                    </div>
                                </div>
                            </div>

                            <!-- PG Students Card -->
                            <div class="col-md-3">
                                <div class="card text-white bg-info">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">PG Students</h5>
                                        <h2 class="card-text">{{ $pgStudents }}</h2>
                                    </div>
                                </div>
                            </div>

                            <!-- Adopted Students Card -->
                            <div class="col-md-3">
                                <div class="card text-white bg-warning">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">Adopted Students</h5>
                                        <h2 class="card-text">{{ $adopedStudents }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Students by Year Chart Card -->
                        <div class="row gy-6 mb-4">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-1">Students by Year of Admission</h5>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="studentsByYearChart" height="150"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <h5 class="mb-0">Students Summary</h5>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Total Students:</strong> {{ $totalStudents }}</p>
                                        <p><strong>UG Students:</strong> {{ $ugStudents }}</p>
                                        <p><strong>PG Students:</strong> {{ $pgStudents }}</p>
                                        <p><strong>Adopted Students:</strong> {{ $adopedStudents }}</p>
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

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('studentsByYearChart').getContext('2d');

            const labels = {!! json_encode($allYears) !!};
            const ugStudentsByYear = {!! json_encode($ugStudentsByYear, JSON_NUMERIC_CHECK) !!};
            const pgStudentsByYear = {!! json_encode($pgStudentsByYear, JSON_NUMERIC_CHECK) !!};

            function getCount(data, year) {
                return data[year] ?? 0;
            }

            const data = {
                labels: labels,
                datasets: [{
                        label: 'UG Students',
                        data: labels.map(year => getCount(ugStudentsByYear, year)),
                        backgroundColor: 'rgba(40, 167, 69, 0.7)',
                        borderColor: 'rgba(40, 167, 69, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'PG Students',
                        data: labels.map(year => getCount(pgStudentsByYear, year)),
                        backgroundColor: 'rgba(23, 162, 184, 0.7)',
                        borderColor: 'rgba(23, 162, 184, 1)',
                        borderWidth: 1
                    }
                ]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            stacked: false,
                            title: {
                                display: true,
                                text: 'Year of Admission'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Number of Students'
                            },
                            ticks: {
                                precision: 0
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
            };

            new Chart(ctx, config);
        });
    </script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
