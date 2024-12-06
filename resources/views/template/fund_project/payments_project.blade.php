<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.head')
    <style>
         h2,p{
            color: black;
        }
    </style>
</head>
<body>

<div class="super_container">

	<!-- Header -->

@include('template.navbar')

@include('template.home')


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
                    {{-- <p>Bank Name: XYZ Bank</p> --}}
                    <p>Account Number: 2292-79173812-01</p>
                    <p>IBAN Number: PK80HABB0022927917381201</p>
                </div>
                <div class="col-md-4">
                    <h2>Zakat Donation</h2>
                    <p>Account Number: 2292-79173861-03</p>
                    <p>IBAN Number: PK34HABB0022927917386103</p>                                    </div>
                <div class="col-md-4">
                    <h2>Endowment Fund Donations</h2>
                    {{-- <p>Bank Name: ABC Bank</p> --}}
                    <p>Account Number: 2292-79173811-01</p>
                    <p>IBAN Number: PK64HABB0022927917381101</p>                                    </div>
            </div>
        </div>
    </div>
</div>


    <!-- Payment Form -->
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form>
                <div class="form-group">
                    <label for="roomCount">Select Number of Rooms:</label>
                    <select class="form-control" id="roomCount" name="roomCount" onchange="calculateTotal()">
                        <option value="10">10 Rooms</option>
                        <option value="20">20 Rooms</option>
                        <option value="30">30 Rooms</option>
                        <option value="40">40 Rooms</option>
                        <option value="50">50 Rooms</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="totalCost">Total Cost:</label>
                    <input type="text" class="form-control" id="totalCost" name="totalCost" readonly>
                </div>
                <button type="submit" class="btn btn-info btn-block">Pay the Fund</button>
            </form>
        </div>
    </div>
</div>

    </div>
</div>

	<!-- Footer -->

    @include('template.footer')

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
