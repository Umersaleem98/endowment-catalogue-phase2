<!DOCTYPE html>
<html lang="en">
<head>
    <title>Zakat</title>
    @include('template.layouts.head')
    <style>
        /* Your CSS styles here */
        .btn-container {
            display: flex;
            justify-content: center;
            gap: 10px; /* Adjust the gap as needed */
        }

        .h3-box {
    background-color: #f8f9fa; /* Light gray background */
    border-radius: 5px; /* Rounded corners */
}

.btn-large {
        padding: 15px 30px;
        font-size: 1.25rem;
    }
    .modal-body img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 100%; /* Ensures the image takes up 100% of the modal's width */
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
            <div class="row mb-5">
                <div class="col">
                    <div class="section_title text-center">
                        <h1 class="text-dark">Zakat</h1>
                    </div>
                </div>
            </div>

            <!-- Breakdown Heading -->
            <div class="row mt-5">
                <div class="col-12">
                    <h1 class="text-center text-dark mb-3">Breakdown</h1>
                </div>
            </div>

            <!-- Undergraduate Students Section -->
            <div class="row mt-2">
                <div class="col-12">
                    <ul class="list-group list-group-flush text-dark btn-container">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                {{-- <img src="{{ asset('templates/endowment_model/images1.jpg') }}" alt="" class="heading-image"> --}}
                                {{-- <h3>Undergraduate Students </h3> --}}
                            </div>
                        </li>

                        <div class="text-center mt-3">
                            <h2>Invest Your Zakat in Deserving Students with Verified Financial Needs</h2>
                        </div>

                        <div class="card card-body">
                            <div class="container">
                                <div class="row g-3"> <!-- Use g-3 for a gap of 1rem between columns -->
                                    <div class="col-md-4 p-3 text-center bg-info">
                                        <h3 class="text-light p-2">Zero Operational Overheads</h3>
                                    </div>
                                    <div class="col-md-4 p-3 text-center bg-primary">
                                        <h3 class="text-light p-2">Impact Oriented Giving</h3>
                                    </div>
                                    <div class="col-md-4 p-3 text-center bg-success">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" style="width: 100%">
                                            Shariah Compliant
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <ul class="list-group list-group-flush text-dark">
                                <!-- Use Bootstrap utility classes to center the buttons and add a gap -->


                                <li class="btn-container d-flex justify-content-center gap-2 mt-5">
                                    {{-- <a href="{{url('zakat_Make_a_Pledge')}}" class="btn btn-success">Make a Pledge</a> --}}
                                    <a href="{{route('endowment.zakat.payment.index')}}" class="btn btn-primary btn-large">Pay Now</a>
                                </li>

                            </ul>
                        </div>

                    </ul>
                </div>
            </div>

            <!-- End of Undergraduate Students Section -->
        </div>
    </div>


    <div class="container mt-5">

        <!-- The Modal -->

            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Shariah Approval Document</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <img src="{{ asset('templates/zakat_certificate/zakat_certificate.png') }}" alt="Shariah Approval Document" class="img-fluid">
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <!-- Footer -->
    @include('template.layouts.footer')
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript for calculating total amount -->

</body>
</html>
