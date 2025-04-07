<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fund a project payments</title>
    @include('template.layouts.head')
    <style>
       
        .card-container {
            width: 100%;
            max-width: 750px;
            margin: auto;
            padding: 20px;
        }
    
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            padding: 30px;
        }
    
        .form-label {
            font-weight: 600;
            color: #343a40;
        }
    
        .form-control {
            height: 50px;
            font-size: 1rem;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            border: 1px solid #ced4da;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
        }
    
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
    
        .btn {
            padding: 12px 24px;
            font-size: 1rem;
            border-radius: 12px;
            min-width: 120px;
        }
    
        .btn + .btn {
            margin-left: 10px;
        }
    
        .step {
            display: none;
            animation: fadeIn 0.3s ease-in-out;
        }
    
        .step.active {
            display: block;
        }
    
        .step h4 {
            margin-bottom: 25px;
            color: #343a40;
            font-weight: 600;
        }
    
        .alert {
            border-radius: 12px;
            padding: 10px 15px;
        }
    
        .section_title h1 {
            font-weight: 700;
            font-size: 2.5rem;
            color: #343a40;
        }
    
        #paymentProof {
            margin-top: 15px;
        }
    
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
    
            to {
                opacity: 1;
                transform: translateY(0);
            }
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
