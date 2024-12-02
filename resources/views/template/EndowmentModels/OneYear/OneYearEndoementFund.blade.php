<!DOCTYPE html>
<html lang="en">

<head>
    <title>One Year</title>
    @include('template.layouts.head')
    <link rel="stylesheet" type="text/css" href="{{ asset('templates/styles/oneyearcss.css') }}">


</head>

<body>

    <div class="super_container">
        <!-- Header -->
        @include('template.layouts.navbar')
        @include('template.layouts.home')

        <div class="events page_section">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col">
                        <div class="section_title text-center">
                            <h1 class="text-dark">Sponsor One Year Education</h1>
                        </div>
                    </div>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

            </div>

            <!-- Center Tabs Navigation -->
            <div class="d-flex justify-content-center">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link custom-tab active" id="undergraduate-tab" data-bs-toggle="tab"
                            data-bs-target="#undergraduate" type="button" role="tab" aria-controls="undergraduate"
                            aria-selected="true" style="background-color: #004476; color:white">Undergraduate</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link custom-tab" id="postgraduate-tab" data-bs-toggle="tab"
                            data-bs-target="#postgraduate" type="button" role="tab" aria-controls="postgraduate"
                            aria-selected="false" style="background-color: #004476; color:white">Postgraduate</button>
                    </li>
                </ul>
            </div>

            <!-- Tabs Content -->
            <div class="tab-content" id="myTabContent">
                <!-- Undergraduate Tab -->
                <div class="tab-pane fade show active" id="undergraduate" role="tabpanel"
                    aria-labelledby="undergraduate-tab">
                    <div class="row mt-5">

                        @include('template.EndowmentModels.OneYear.forms.defultpackageforengineeringUG')

                        @include('template.EndowmentModels.OneYear.forms.defultpackageforNonengineeringUG')
                       
                    </div>
                </div>
                <!-- Postgraduate Tab -->


                <div class="tab-pane fade" id="postgraduate" role="tabpanel" aria-labelledby="postgraduate-tab">
                    <div class="row mt-5">

                        @include('template.EndowmentModels.OneYear.forms.defultpackageforengineeringPG')
                        @include('template.EndowmentModels.OneYear.forms.defultpackageforNonengineeringPG')
                    </div>
                </div>
                <br>
                <div id="bankDetails" class="container" style="display: none;">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="alert alert-secondary" role="alert">
                                <h2 class="text-dark text-center">Bank Details</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 ">
                        <div class="col-md-4 mb-1">
                            <div class="alert alert-info" role="alert">
                                <h2>Non-Zakat Donation</h2>
                                <p>Account Number: 2292-79173812-01</p>
                                <p>IBAN Number: PK80HABB0022927917381201</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <div class="alert alert-info" role="alert">
                                <h2>Zakat Donation</h2>
                                <p>Account Number: 2292-79173861-03</p>
                                <p>IBAN Number: PK34HABB0022927917386103</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-1">
                            <div class="alert alert-info" role="alert">
                                <h2>Endowment Fund Donations</h2>
                                <p>Account Number: 2292-79173811-01</p>
                                <p>IBAN Number: PK64HABB0022927917381101</p>
                            </div>
                        </div>
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


    <script src="{{ asset('templates/js/temp/oneyear.js') }}"></script>

</body>

</html>

