<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fund a Project – Payments</title>
    @include('Layouts.templates.head')

    <style>
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        table,
        td {
            color: #000;
        }

        ::placeholder {
            color: #000 !important;
        }
    </style>
</head>

<body>
    <div class="super_container">

        @include('Layouts.templates.navbar')
        @include('Layouts.templates.home')

        <section class="events page_section">
            <div class="container">

                <!-- Page Title -->
                <div class="row mb-4">
                    <div class="col text-center">
                        <h1>Payment Now</h1>
                        <hr>
                    </div>
                </div>

                <!-- Bank Details -->
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        <h2 class="text-dark mb-0">Bank Details</h2>
                    </div>

                    <div class="card-body">
                        <div class="row text-dark">

                            <div class="col-md-4 mb-4">
                                <h4>Non-Zakat Donation</h4>
                                <p>Account Number: <strong>2292-79173812-01</strong></p>
                                <p>IBAN: <strong>PK80HABB0022927917381201</strong></p>
                            </div>

                            <div class="col-md-4 mb-4">
                                <h4>Zakat Donation</h4>
                                <p>Account Number: <strong>2292-79173861-03</strong></p>
                                <p>IBAN: <strong>PK34HABB0022927917386103</strong></p>
                            </div>

                            <div class="col-md-4 mb-4">
                                <h4>Endowment Donations</h4>
                                <p>Account Number: <strong>2292-79173811-01</strong></p>
                                <p>IBAN: <strong>PK64HABB0022927917381101</strong></p>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Success message -->
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif


                <!-- Payment Form -->
                <div class="card p-4 mb-5">
                    <h2 class="text-center text-dark mb-4">Rough Cost Estimate (Civil Works)</h2>

                    <form action="{{ route('girls.hostel.store') }}" method="POST" id="costEstimateForm"
                        enctype="multipart/form-data">
                        @csrf

                        <table class="table table-bordered">
                            <thead class="table-light">
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

                                    <td>
                                        <input type="text" class="form-control" name="description"
                                            value="Girls Hostel (10 Floors)" readonly>
                                    </td>

                                    <td>
                                        <input type="number" class="form-control" id="area_sft" name="area_sft"
                                            value="150435.00" readonly>
                                    </td>

                                    <td>
                                        <input type="number" class="form-control" id="quantity" name="quantity"
                                            value="1" required>
                                    </td>

                                    <td>
                                        <input type="number" class="form-control" id="total_area_sft"
                                            name="total_area_sft" value="150435.00" readonly>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4">Construction Cost @ 10,500 / Sft (All Services Included)</td>
                                    <td>
                                        <input type="number" class="form-control" id="construction_cost"
                                            name="construction_cost" value="1579567500.00" readonly>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4">Total Project Cost</td>
                                    <td>
                                        <input type="number" class="form-control" id="total_project_cost"
                                            name="total_project_cost" value="1579567500.00" readonly>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4">Total in Million (PKR)</td>
                                    <td>
                                        <input type="number" class="form-control" id="total_in_million"
                                            name="total_in_million" value="1579.57" readonly>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <!-- Donor Information -->
                        <div class="row">

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Project Name</label>
                                <input type="text" class="form-control" name="project_name"
                                    value="Girls-Hostel-Project" readonly>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Donor Name</label>
                                <input type="text" class="form-control" name="donor_name" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Donor Email</label>
                                <input type="email" class="form-control" name="donor_email" required>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Donor Phone</label>
                                <input type="text" class="form-control" name="donor_phone" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Payment Proof</label>
                                <input type="file" class="form-control" name="prove">
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary px-5" type="submit">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        </section>

        @include('Layouts.templates.footer')
    </div>


    <!-- Auto Calculations -->
    <script>
        document.getElementById('costEstimateForm').addEventListener('input', function() {

            const areaSft = parseFloat(document.getElementById('area_sft').value) || 0;
            const qty = parseFloat(document.getElementById('quantity').value) || 0;

            const totalArea = areaSft * qty;
            document.getElementById('total_area_sft').value = totalArea.toFixed(2);

            const costPerSft = 10500;
            const construction = totalArea * costPerSft;
            document.getElementById('construction_cost').value = construction.toFixed(2);

            document.getElementById('total_project_cost').value = construction.toFixed(2);

            document.getElementById('total_in_million').value = (construction / 1_000_000).toFixed(2);
        });
    </script>

</body>

</html>
