<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.layouts.head')
    <style>
         h2, p {
            color: black;
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
                        <h1 class="">Payment Form</h1>
                    </div>
                </div>
            </div>
            <hr>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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

            <!-- Payment Form -->
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form method="post" action="{{ url('fund_a_project') }}" enctype="multipart/form-data" onsubmit="calculateTotal()">
                        @csrf
                        <div class="form-group">
                            <label for="project_name">Project Name</label>
                            <input type="text" name="project_name" value="{{$project_categories->project_name}}" class="form-control" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="donor_name">Donor Name</label>
                            <input type="text" name="donor_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="donor_email">Donor Email</label>
                            <input type="email" name="donor_email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="roomCount">Select Number of Rooms:</label>
                            <select class="form-control" id="roomCount" name="amount_for" onchange="calculateTotal()" required>
                                <option value="10">10 Rooms</option>
                                <option value="20">20 Rooms</option>
                                <option value="30">30 Rooms</option>
                                <option value="40">40 Rooms</option>
                                <option value="50">50 Rooms</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="totalCost">Total Cost: (PKR) </label>
                            <input type="text" class="form-control" id="totalCost" name="amount" readonly>
                        </div>
                        <div class="form-group">
                            <label for="prove">Prove </label>
                            <input type="file" class="form-control" id="prove" name="prove" >
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-block">Proceed to Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('template.layouts.footer')

    <script>
        function calculateTotal() {
            var roomCount = document.getElementById("roomCount").value;
            var costPerRoom = 20000; // Cost per room
            var totalCost = roomCount * costPerRoom;
            document.getElementById("totalCost").value = totalCost;
        }
    </script>
</body>
</html>
