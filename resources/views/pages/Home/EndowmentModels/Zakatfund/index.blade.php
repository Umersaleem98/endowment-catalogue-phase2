<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zakat</title>
    @include('Layouts.templates.head')

    <style>
        .btn-container {
            display: flex;
            justify-content: center;
            gap: 15px;
        }
    </style>
</head>

<body>

    <div class="super_container">

        @include('Layouts.templates.navbar')
        @include('Layouts.templates.home')

        <div class="events page_section">
            <div class="container">

                <div class="row mb-5">
                    <div class="col text-center">
                        <h1 class="text-dark">Zakat</h1>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col text-center">
                        <h2>Breakdown</h2>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="text-center mb-3">
                            <h3>Invest Your Zakat in Deserving Students</h3>
                        </div>

                        <div class="card card-body">

                            <div class="row g-3">
                                <div class="col-md-4 text-center p-3 bg-info text-light">
                                    <h4>Zero Operational Overheads</h4>
                                </div>

                                <div class="col-md-4 text-center p-3 bg-primary text-light">
                                    <h4>Impact Oriented Giving</h4>
                                </div>

                                <div class="col-md-4 text-center p-3 bg-success">
                                    <button type="button" class="btn btn-success w-100" data-bs-toggle="modal"
                                        data-bs-target="#shariahModal">
                                        Shariah Compliant
                                    </button>
                                </div>
                            </div>

                            <div class="btn-container mt-4">
                                <a href="{{ route('endowment.zakat.payment.index') }}" class="btn btn-primary btn-lg">
                                    Pay Now
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="shariahModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Shariah Approval Document</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <img src="{{ asset('templates/zakat_certificate/zakat_certificate.png') }}" class="img-fluid"
                            alt="Shariah Approval Document">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>

                </div>
            </div>
        </div>

        @include('Layouts.templates.footer')

    </div>

    <!-- Bootstrap 5 Bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>

</html>
