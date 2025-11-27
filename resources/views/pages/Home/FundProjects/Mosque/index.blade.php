<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mosque Project Payment</title>
    @include('Layouts.templates.head')

    <style>
        body {
            color: #000;
        }

        .section-title {
            font-weight: 700;
        }

        ::placeholder {
            color: #555 !important;
        }

        .form-section-title {
            font-weight: 600;
            margin-bottom: 20px;
        }

        .bank-box h5 {
            font-weight: 600;
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
                <div class="text-center mb-4">
                    <h1 class="section-title">Payment Now</h1>
                </div>

                <!-- Bank Details -->
                <div class="card mb-5 shadow-sm">
                    <div class="card-header bg-light">
                        <h3 class="text-dark mb-0">Bank Details</h3>
                    </div>

                    <div class="card-body">
                        <div class="row text-dark">

                            <div class="col-md-4 bank-box">
                                <h5>Non-Zakat Donation</h5>
                                <p><strong>Account:</strong> 2292-79173812-01</p>
                                <p><strong>IBAN:</strong> PK80HABB0022927917381201</p>
                            </div>

                            <div class="col-md-4 bank-box">
                                <h5>Zakat Donation</h5>
                                <p><strong>Account:</strong> 2292-79173861-03</p>
                                <p><strong>IBAN:</strong> PK34HABB0022927917386103</p>
                            </div>

                            <div class="col-md-4 bank-box">
                                <h5>Endowment Fund</h5>
                                <p><strong>Account:</strong> 2292-79173811-01</p>
                                <p><strong>IBAN:</strong> PK64HABB0022927917381101</p>
                            </div>

                        </div>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Main Form -->
                <div class="card shadow-sm mb-5">
                    <div class="card-body">
                        <h3 class="form-section-title text-center">Rough Cost Estimate (Civil Works)</h3>

                        <form action="{{ route('mosque.store') }}" method="POST" id="costEstimateForm"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Table -->
                            <table class="table table-bordered">
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

                                        <td>
                                            <input type="text" class="form-control" name="description"
                                                value="Mosque Building" required readonly>
                                        </td>

                                        <td>
                                            <input type="number" class="form-control" id="area_sft" name="area_sft"
                                                value="15000" step="0.01" readonly>
                                        </td>

                                        <td>
                                            <input type="number" class="form-control" id="quantity" name="quantity"
                                                value="1" required>
                                        </td>

                                        <td>
                                            <input type="number" class="form-control" id="total_area_sft"
                                                name="total_area_sft" value="15000" readonly>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4">Construction Cost @ 10,500/Sft = Rs.</td>
                                        <td>
                                            <input type="number" class="form-control" id="construction_cost"
                                                name="construction_cost" readonly>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4">Total Project Cost = Rs.</td>
                                        <td>
                                            <input type="number" class="form-control" id="total_project_cost"
                                                name="total_project_cost" readonly>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4">Rs in Million:</td>
                                        <td>
                                            <input type="number" class="form-control" id="total_in_million"
                                                name="total_in_million" readonly>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Donor Details -->
                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Project Name</label>
                                    <input type="text" class="form-control" name="project_name"
                                        value="Mosque Project" readonly>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Donor Name</label>
                                    <input type="text" class="form-control" name="donor_name"
                                        placeholder="Enter donor name" required>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Donor Email</label>
                                    <input type="email" class="form-control" name="donor_email"
                                        placeholder="Enter donor email" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Donor Phone</label>
                                    <input type="text" class="form-control" name="donor_phone"
                                        placeholder="Enter donor phone" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Payment Proof</label>
                                    <input type="file" class="form-control" name="prove">
                                </div>

                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-4">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>

    @include('Layouts.templates.footer')

    <script>
        document.getElementById('costEstimateForm').addEventListener('input', function() {

            const area = parseFloat(document.getElementById('area_sft').value) || 0;
            const qty = parseInt(document.getElementById('quantity').value) || 0;

            const totalArea = area * qty;
            const costPerSft = 10500;

            const constructionCost = totalArea * costPerSft;

            document.getElementById('total_area_sft').value = totalArea.toFixed(2);
            document.getElementById('construction_cost').value = constructionCost.toFixed(2);
            document.getElementById('total_project_cost').value = constructionCost.toFixed(2);
            document.getElementById('total_in_million').value = (constructionCost / 1_000_000).toFixed(2);
        });

        // Trigger initial calculation
        document.getElementById('costEstimateForm').dispatchEvent(new Event('input'));
    </script>

</body>

</html>
