<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fund a project payments</title>
    @include('template.layouts.head')
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


        <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .card-container {
            width: 50%;
            max-width: 600px;
            margin: auto;
        }

        .pagination li.active a {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }

        .pagination li a:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            color: white;
        }

        .step {
            display: none;
        }

        .step.active {
            display: block;
        }
    </style>
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
                            <h1 class="">Payment Now</h1>
                        </div>
                    </div>
                </div>
                <hr>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Payment Form -->
                <div class="row">
                    <div class="card-container">
                        <h2 class="text-center mb-4">Hostel Payment</h2>
                        <div class="card">
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                {{-- <form method="POST" action="{{ url('payments', $students->id) }}" enctype="multipart/form-data"> --}}
                                <form id="multiStepForm" method="post" action="{{ url('hostel-payments', $students->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <!-- Step 1 -->
                                    <div class="step active">
                                        <h4 class="text-dark">Step 1: Personal Information</h4>
                                        <div class="mb-3">
                                            <label class="form-label text-dark">Student Name</label>
                                            <input type="text" class="form-control" name="student_name" value="{{ $students->student_name }}" required readonly>
                                        </div>
                                        <button type="button" class="btn btn-primary next">Next</button>
                                    </div>
                                    
                                    <!-- Step 2 -->
                                    <div class="step">
                                        <h4 class="text-dark">Step 2: Contact Information</h4>
                                        <div class="mb-3">
                                            <label class="form-label text-dark">Donor Name</label>
                                            <input type="text" class="form-control" name="donor_name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-dark">Email</label>
                                            <input type="email" class="form-control" name="donor_email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-dark">Phone</label>
                                            <input type="text" class="form-control" name="phone" required>
                                        </div>
                                        <button type="button" class="btn btn-secondary prev">Previous</button>
                                        <button type="button" class="btn btn-primary next">Next</button>
                                    </div>
                                    
                                    <!-- Step 3 -->
                                    <div class="step">
                                        <h4 class="text-dark">Step 3: Support Duration</h4>
                                        <div class="mb-3">
                                            <label class="form-label text-dark">Duration for Support</label>
                                            <select class="form-control" id="durationSelect" name="duration" required>
                                                <option value="">Select Duration</option>
                                                <option value="1">One Month</option>
                                                <option value="6">One Semester</option>
                                                <option value="12">One Year</option>
                                                <option value="24">Two Years</option>
                                                <option value="48">Four Years</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-dark">Amount</label>
                                            <input type="text" class="form-control" id="amountField" name="amount" readonly>
                                        </div>
                                        <button type="button" class="btn btn-secondary prev">Previous</button>
                                        <button type="button" class="btn btn-primary next">Next</button>
                                    </div>
                                    
                                    <!-- Step 4 -->
                                    <div class="step">
                                        <h4 class="text-dark">Step 4: Payment Type</h4>
                                        <div class="mb-3">
                                            <label class="form-label text-dark">Payment Type</label><br>
                                            <input type="radio" name="payment_type" value="payment" id="payment" required> Payment
                                            <input type="radio" name="payment_type" value="pledge" id="pledge"> Pledge
                                        </div>
                                        <div class="mb-3" id="paymentProof" style="display: none;">
                                            <label class="form-label text-dark">Upload Payment Proof</label>
                                            <input type="file" class="form-control" name="payment_proof">
                                        </div>
                                        <button type="button" class="btn btn-secondary prev">Previous</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->

    @include('template.layouts.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let currentStep = 0;
            const steps = $(".step");

            function showStep(index) {
                steps.removeClass("active");
                steps.eq(index).addClass("active");
            }

            $(".next").click(function() {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                }
            });

            $(".prev").click(function() {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });

            $("input[name='payment_type']").change(function() {
                if ($("#payment").is(":checked")) {
                    $("#paymentProof").show();
                } else {
                    $("#paymentProof").hide();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            let monthlyAmount = 22500;
            $("#durationSelect").change(function() {
                let multiplier = $(this).val();
                if (multiplier) {
                    let totalAmount = monthlyAmount * multiplier;
                    $("#amountField").val(totalAmount);
                } else {
                    $("#amountField").val("");
                }
            });
        });
    </script>

</body>

</html>
