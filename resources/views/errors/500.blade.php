<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Server Error</title>

    <!-- Bootstrap 5 CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .error-card {
            margin-top: 80px;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm border-0 error-card">
                    <div class="card-body text-center py-5">

                        <h1 class="display-3 text-danger fw-bold">500</h1>

                        <h4 class="fw-semibold mt-3">Server Error</h4>

                        <p class="text-muted mt-2">
                            Something went wrong on our end. Please try again later.
                        </p>

                        <a href="{{ url('/') }}" class="btn btn-primary mt-3">
                            Go Home
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>