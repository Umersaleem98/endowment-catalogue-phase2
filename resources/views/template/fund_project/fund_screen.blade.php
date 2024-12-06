<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.layouts.head')
    <style>
        .custom-img-fluid {
            width: 100%;
            height: auto;
            max-height: 600px; /* Increase max-height as needed */
            object-fit: cover; /* Ensure image covers the area */
        }
        .text-section {
            margin-top: 20px;
        }
        h2, h3 {
            margin: 0;
            padding: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            color: #000;
        }

        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }

        thead th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<div class="super_container">

    <!-- Header -->
    @include('template.layouts.navbar')

    @include('template.layouts.home')

    <div class="events page_section">
        <div class="container">

            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1 class="">Funds for {{$project_categories->project_name}}</h1>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container mt-5">
                <!-- First Section -->
                <div class="row mb-4">
                    @if($project_categories->project_name == 'Boys Hostel')
                    <div class="col-md-12">
                        <h2 class="text-center text-dark">ROUGH COST ESTIMATE (CIVIL WORKS)</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Ser</th>
                                    <th>Description</th>
                                    <th>Area (Sft)</th>
                                    <th>Qty</th>
                                    <th>Total Area (Sft)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>BOYS HOSTEL (10 FLOORS)</td>
                                    <td>150,435.00</td>
                                    <td>1</td>
                                    <td>150,435.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Total Covered Area</td>
                                    <td>150,435.000</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Construction Cost @ 10,500.00/Sft Incl. all services = Rs.</td>
                                    <td>1,579,567,500.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Total Project Cost = Rs.</td>
                                    <td>1,579,567,500.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Rs in Million:</td>
                                    <td>1,579.57</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @elseif($project_categories->project_name == 'Girls Hostel')
                    <div class="col-md-12">
                        <h2 class="text-center text-dark">ROUGH COST ESTIMATE (CIVIL WORKS)</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Ser</th>
                                    <th>Description</th>
                                    <th>Area (Sft)</th>
                                    <th>Qty</th>
                                    <th>Total Area (Sft)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>GIRLS HOSTEL (10 FLOORS)</td>
                                    <td>150,435.00</td>
                                    <td>1</td>
                                    <td>150,435.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Total Covered Area</td>
                                    <td>150,435.000</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Construction Cost @ 10,500.00/Sft Incl. all services = Rs.</td>
                                    <td>1,579,567,500.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Total Project Cost = Rs.</td>
                                    <td>1,579,567,500.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Rs in Million:</td>
                                    <td>1,579.57</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @elseif($project_categories->project_name == 'Business Center')
                    <div class="col-md-12">
                        <h2 class="text-center text-dark">ROUGH COST ESTIMATE (CIVIL WORKS)</h2>
                        <table>
                            <tr>
                                <th>Ser</th>
                                <th>Description</th>
                                <th>Area (Sft)</th>
                                <th>Qty</th>
                                <th>Total Area (Sft)</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>BUSINESS COMPLEX</td>
                                <td>45,550.00</td>
                                <td>1</td>
                                <td>45,550.00</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: right;">Total Covered Area</td>
                                <td>45,550.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td colspan="3" style="text-align: left;">Construction Cost @ 10,500.00/Sft Incl. all services</td>
                                <td>478,275,000.00</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: right;">Total Project Cost = Rs.</td>
                                <td>478,275,000.00</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: right;">Rs in Million</td>
                                <td>478.28</td>
                            </tr>
                        </table>
                    </div>
                    @elseif($project_categories->project_name == 'Mosque')
                    <div class="col-md-12">
                        <h2 class="text-center text-dark">ROUGH COST ESTIMATE (CIVIL WORKS)</h2>
                        <table>
                            <tr>
                                <th>Ser</th>
                                <th>Description</th>
                                <th>Area (Sft)</th>
                                <th>Qty</th>
                                <th>Total Area (Sft)</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>MASJID<br>Hall 470 + Court Yard 180 = 650</td>
                                <td>10,683.00</td>
                                <td>1</td>
                                <td>10,683.00</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: right;">Total Covered Area</td>
                                <td>10,683.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td colspan="3" style="text-align: left;">Construction Cost @ 10,500.00/Sft Incl. all services</td>
                                <td>112,171,500.00</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: right;">Total Project Cost = Rs.</td>
                                <td>112,171,500.00</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align: right;">Rs in Million</td>
                                <td>112.17</td>
                            </tr>
                        </table>
                    </div>
                    @endif

                    <div class="col-md-12 text-section">
                        <h1 class="text-center text-dark">{{$project_categories->project_name}}</h1>
                        <p class="text-center text-dark">{{$project_categories->description}}</p>
                        <div class="text-center">
                            <a href="{{ url('payments_project', ['id' => $project_categories->id]) }}" class="btn btn-primary">Donate for {{$project_categories->project_name}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('template.layouts.footer')

</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
