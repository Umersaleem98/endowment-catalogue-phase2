<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fund a Project Payments</title>
    @include('template.layouts.head')
    <style>
        h1, h2, h3, h4, h5, h6, p, tr, td {
            color: black;
        }
        ::placeholder {
            color: black !important;
        }
    </style>
</head>
<body>

<div class="super_container">
    @include('template.layouts.navbar')
    @include('template.layouts.home')

    <div class="events page_section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title text-center">
                        <h1 class="">Payment Now</h1>
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-dark">Bank Details</h2>
                    </div>
                    <div class="card-body mt-3">
                        <div class="row">
                            <div class="col-md-4">
                                <h2>Non-Zakat Donation</h2>
                                <p>Account Number: 2292-79173812-01</p>
                                <p>IBAN Number: PK80HABB0022927917381201</p>
                            </div>
                            <div class="col-md-4">
                                <h2>Zakat Donation</h2>
                                <p>Account Number: 2292-79173861-03</p>
                                <p>IBAN Number: PK34HABB0022927917386103</p>
                            </div>
                            <div class="col-md-4">
                                <h2>Endowment Fund Donations</h2>
                                <p>Account Number: 2292-79173811-01</p>
                                <p>IBAN Number: PK64HABB0022927917381101</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="container">
                    <h2 class="text-center text-dark">ROUGH COST ESTIMATE (CIVIL WORKS)</h2>
                    <form action="{{ route('business.center.store') }}" method="POST" id="costEstimateForm" enctype="multipart/form-data">
                        @csrf
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
                                        <input type="text" class="form-control" name="description" value="Business Center" required readonly>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" id="area_sft" name="area_sft" value="45550.00" step="0.01" required readonly>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" id="quantity" name="quantity" value="1" required>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" id="total_area_sft" name="total_area_sft" value="45550.00" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Construction Cost @ 12,500.00/Sft Incl. all services = Rs.</td>
                                    <td>
                                        <input type="number" class="form-control" id="construction_cost" name="construction_cost" value="1579567500.00" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Total Project Cost = Rs.</td>
                                    <td>
                                        <input type="number" class="form-control" id="total_project_cost" name="total_project_cost" value="1579567500.00" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Rs in Million:</td>
                                    <td>
                                        <input type="number" class="form-control" id="total_in_million" name="total_in_million" value="1579.57" readonly>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="project_name" class="form-label">Project Name</label>
                                <input type="text" class="form-control" value="{{ $projectcategory->project_name }}" id="project_name" name="project_name" required readonly>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="donor_name" class="form-label">Donor Name</label>
                                <input type="text" class="form-control" id="donor_name" name="donor_name" required>
                            </div>

                             <div class="col-md-4 mb-3">
                                <label for="donor_email" class="form-label">Donor Email</label>
                                <input type="email" class="form-control" id="donor_email" name="donor_email" required>
                            </div>
                        </div>

                        <div class="row">
                           

                            <div class="col-md-6 mb-3">
                                <label for="donor_phone" class="form-label">Donor Phone</label>
                                <input type="text" class="form-control" id="donor_phone" name="donor_phone" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="prove" class="form-label">Payment Prove</label>
                                <input type="file" class="form-control" id="prove" name="prove" placeholder="Provide payment prove">
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('template.layouts.footer')
</div>

<script>
    document.getElementById('costEstimateForm').addEventListener('input', function () {
        const areaSft = parseFloat(document.getElementById('area_sft').value) || 0;
        const quantity = parseInt(document.getElementById('quantity').value) || 0;

        // Calculate total area
        const totalArea = areaSft * quantity;
        document.getElementById('total_area_sft').value = totalArea.toFixed(2);

        // Construction cost per Sft
        const costPerSft = 12500.00;
        const constructionCost = totalArea * costPerSft;
        document.getElementById('construction_cost').value = constructionCost.toFixed(2);

        // Total project cost (same as construction cost here)
        document.getElementById('total_project_cost').value = constructionCost.toFixed(2);

        // Total in million
        const totalInMillion = constructionCost / 1000000;
        document.getElementById('total_in_million').value = totalInMillion.toFixed(2);
    });
</script>

</body>
</html>
