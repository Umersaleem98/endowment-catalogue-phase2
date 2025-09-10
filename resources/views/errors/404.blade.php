<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 Page Not Found</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #6f42c1, #6610f2);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    .error-container {
      text-align: center;
      max-width: 600px;
      padding: 40px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    .error-code {
      font-size: 8rem;
      font-weight: 700;
      letter-spacing: 10px;
      color: #ffd700;
      animation: pulse 1.5s infinite;
    }
    .error-text {
      font-size: 1.5rem;
      margin-bottom: 20px;
    }
    .btn-custom {
      background-color: #ffd700;
      color: #000;
      font-weight: 600;
      border-radius: 30px;
      padding: 10px 25px;
      transition: 0.3s;
    }
    .btn-custom:hover {
      background-color: #fff;
      color: #6f42c1;
      transform: scale(1.05);
    }
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.1); }
      100% { transform: scale(1); }
    }
  </style>
</head>
<body>

  <div class="error-container">
    <div class="error-code">404</div>
    <h2 class="fw-bold">Oops! Page Not Found</h2>
    <p class="error-text">The page you’re looking for doesn’t exist or has been moved.</p>
    <a href="{{route('dashboard')}}" class="btn btn-custom">Go Back Home</a>
  </div>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
