<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="AuthTemplate/fonts/icomoon/style.css">
    <link rel="stylesheet" href="AuthTemplate/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="AuthTemplate/css/bootstrap.min.css">
    <link rel="stylesheet" href="AuthTemplate/css/style.css">

    <title>Login</title>
  </head>
  <body>  

  <div class="content">
    <div class="container">
      <div class="row">
        <!-- Left Image Section -->
        <div class="col-md-6">
          <img src="AuthTemplate/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>

        <!-- Form Section -->
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                <h3>Sign In</h3>
                <p class="mb-4">Welcome back! Please login to your account.</p>
              </div>
              
              <!-- Form -->
              <form action="{{ url('login') }}" method="post">
                <!-- Username Input -->
                @csrf

                <!-- Email Input -->
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                </div>

                <!-- Phone Input -->
               
                <!-- Password Input -->
                <div class="form-group last mb-4">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                
                <!-- Remember Me & Forgot Password -->
                

                <!-- Submit Button -->
                <input type="submit" value="Log In" class="btn btn-block btn-primary">

                <!-- Social Login -->
                <span class="d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>
                <div class="social-login">
                  <a href="#" class="facebook">
                    <span class="icon-facebook mr-3"></span> 
                  </a>
                  <a href="#" class="twitter">
                    <span class="icon-twitter mr-3"></span> 
                  </a>
                  <a href="#" class="google">
                    <span class="icon-google mr-3"></span> 
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="AuthTemplate/js/jquery-3.3.1.min.js"></script>
  <script src="AuthTemplate/js/popper.min.js"></script>
  <script src="AuthTemplate/js/bootstrap.min.js"></script>
  <script src="AuthTemplate/js/main.js"></script>
  </body>
</html>
