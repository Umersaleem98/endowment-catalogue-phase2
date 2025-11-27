<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fund a Project – Business Center</title>
    @include('Layouts.templates.head')

    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        td,
        tr {
            color: #000;
        }

        ::placeholder {
            color: #000 !important;
        }

        .section_title h1 {
            font-weight: 700;
        }

        .card-header h2 {
            margin: 0;
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
                        <hr>
                    </div>
                </div>

                <!-- Bank Details -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h2 class="text-dark">Bank Details</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-4">
                                <h5>Non-Zakat Donation</h5>
                                <p>Account #: 2292-79173812-01</p>
                                <p>IBAN #: PK80HABB0022927917381201</p>
                            </div>

                            <div class="col-md-4">
                                <h5>Zakat Donation</h5>
                                <p>Account #: 2292-79173861-03</p>
                                <p>IBAN #: PK34HABB0022927917386103</p>
                            </div>

                            <div class="col-md-4">
                                <h5>Endowment Fund</h5>
                                <p>Account #: 2292-79173811-01</p>
                                <p>IBAN #: PK64HABB0022927917381101</p>
                            </div>

                        </div>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Cost Estimate + Form -->
                <div class="card">
                    <div class="card-body">

                        <h2 class="text-center text-dark mb-4">Rough Cost Estimate (Civil Works)</h2>

                        <form action="{{ route('business.center.store') }}" method="POST" id="costEstimateForm"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Cost Table -->
                            <table class="table table-bordered">
                                <thead class="bg-light">
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
                                                value="Business Center" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" id="area_sft" name="area_sft"
                                                value="45550.00" step="0.01" readonly>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" id="quantity" name="quantity"
                                                value="1">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" id="total_area_sft"
                                                name="total_area_sft" value="45550.00" readonly>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4">Construction Cost @ 12,500/Sft (Incl. all services)</td>
                                        <td>
                                            <input type="number" class="form-control" id="construction_cost"
                                                name="construction_cost" readonly>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4">Total Project Cost</td>
                                        <td>
                                            <input type="number" class="form-control" id="total_project_cost"
                                                name="total_project_cost" readonly>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4">Total in Million</td>
                                        <td>
                                            <input type="number" class="form-control" id="total_in_million"
                                                name="total_in_million" readonly>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Donor Fields -->
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label>Project Name</label>
                                    <input type="text" class="form-control" value="Business-Center"
                                        name="project_name" readonly>
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
                                    <label>Payment Proof (optional)</label>
                                    <input type="file" class="form-control" name="prove">
                                </div>
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary px-4">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

        @include('Layouts.templates.footer')
    </div>

    <script>
        document.getElementById('costEstimateForm').addEventListener('input', function() {
            const area = parseFloat(document.getElementById('area_sft').value) || 0;
            const qty = parseInt(document.getElementById('quantity').value) || 0;

            const totalArea = area * qty;
            document.getElementById('total_area_sft').value = totalArea.toFixed(2);

            const costPerSft = 12500;
            const constructionCost = totalArea * costPerSft;

            document.getElementById('construction_cost').value = constructionCost.toFixed(2);
            document.getElementById('total_project_cost').value = constructionCost.toFixed(2);
            document.getElementById('total_in_million').value = (constructionCost / 1_000_000).toFixed(2);
        });
    </script>

</body>

</html>
