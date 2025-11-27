<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fund a Project Payments</title>
    @include('Layouts.templates.head')

    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        tr,
        td {
            color: black;
        }

        ::placeholder {
            color: black !important;
        }
    </style>
</head>

<body>

    <div class="super_container">

        @include('Layouts.templates.navbar')
        @include('Layouts.templates.home')

        <div class="events page_section">
            <div class="container">

                <!-- Page Title -->
                <div class="row mb-3">
                    <div class="col text-center">
                        <h1>Payment Now</h1>
                    </div>
                </div>
                <hr>

                <!-- Alerts -->
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Bank Details -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h2 class="text-dark">Bank Details</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-4">
                                <h4>Non-Zakat Donation</h4>
                                <p>Account Number: 2292-79173812-01</p>
                                <p>IBAN: PK80HABB0022927917381201</p>
                            </div>

                            <div class="col-md-4">
                                <h4>Zakat Donation</h4>
                                <p>Account Number: 2292-79173861-03</p>
                                <p>IBAN: PK34HABB0022927917386103</p>
                            </div>

                            <div class="col-md-4">
                                <h4>Endowment Fund</h4>
                                <p>Account Number: 2292-79173811-01</p>
                                <p>IBAN: PK64HABB0022927917381101</p>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Cost Estimate Form -->
                <div class="row mb-5">
                    <div class="col-md-12">

                        <h2 class="text-center text-dark">ROUGH COST ESTIMATE (CIVIL WORKS)</h2>

                        <form action="{{ route('boys.hostel.store') }}" method="POST" id="costEstimateForm"
                            enctype="multipart/form-data">
                            @csrf

                            <table class="table table-bordered mt-3">
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

                                    <!-- Row 1 -->
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <input type="text" name="description" class="form-control"
                                                value="BOYS HOSTEL (10 FLOORS)" readonly>
                                        </td>
                                        <td>
                                            <input type="number" id="area_sft" name="area_sft" class="form-control"
                                                value="150435.00" step="0.01" readonly>
                                        </td>
                                        <td>
                                            <input type="number" id="quantity" name="quantity" class="form-control"
                                                value="1" required>
                                        </td>
                                        <td>
                                            <input type="number" id="total_area_sft" name="total_area_sft"
                                                class="form-control" value="150435.00" readonly>
                                        </td>
                                    </tr>

                                    <!-- Construction Cost -->
                                    <tr>
                                        <td colspan="4">Construction Cost @ 10,500/Sft</td>
                                        <td>
                                            <input type="number" id="construction_cost" name="construction_cost"
                                                class="form-control" value="1579567500.00" readonly>
                                        </td>
                                    </tr>

                                    <!-- Total Project Cost -->
                                    <tr>
                                        <td colspan="4">Total Project Cost</td>
                                        <td>
                                            <input type="number" id="total_project_cost" name="total_project_cost"
                                                class="form-control" value="1579567500.00" readonly>
                                        </td>
                                    </tr>

                                    <!-- Million -->
                                    <tr>
                                        <td colspan="4">Rs in Million</td>
                                        <td>
                                            <input type="number" id="total_in_million" name="total_in_million"
                                                class="form-control" value="1579.57" readonly>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                            <!-- Donor Info -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Project Name</label>
                                    <input type="text" class="form-control" name="project_name"
                                        value="Boys-Hostel-Projects" readonly>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Donor Name</label>
                                    <input type="text" class="form-control" name="donor_name" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label>Donor Email</label>
                                    <input type="email" class="form-control" name="donor_email" required>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label>Donor Phone</label>
                                    <input type="text" class="form-control" name="donor_phone" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Payment Proof (Optional)</label>
                                    <input type="file" class="form-control" name="prove">
                                </div>

                            </div>

                            <div class="text-center mt-3">
                                <button class="btn btn-primary">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

        @include('Layouts.templates.footer')

    </div>

</body>

</html>

<script>
    document.getElementById('costEstimateForm').addEventListener('input', function() {

        const area = parseFloat(document.getElementById('area_sft').value) || 0;
        const qty = parseFloat(document.getElementById('quantity').value) || 0;

        const totalArea = area * qty;
        const costPerSft = 10500;

        const constructionCost = totalArea * costPerSft;
        const totalInMillion = constructionCost / 1_000_000;

        document.getElementById('total_area_sft').value = totalArea.toFixed(2);
        document.getElementById('construction_cost').value = constructionCost.toFixed(2);
        document.getElementById('total_project_cost').value = constructionCost.toFixed(2);
        document.getElementById('total_in_million').value = totalInMillion.toFixed(2);
    });
</script>
