<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PT Smart</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
    
h2,  .login-button {
    font-weight: bold;
}

body {
    background-color: #213448;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.container{
    color: white;
    background: #547792;
    border-radius: 11px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 900px;
}

.login-container {
    max-width: 400px;
    margin: 40px 20px 40px 40px;
}

.login-button {
    background-color: #ECEFCA;
    color: black;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.25);
    font-weight: 700;
    border: none;
}

.login-button:hover {
    background-color: #8f917d;
}

.display-container{
    background: #213448;
    color: white;
    padding: 30px;
    margin: 20px 20px 20px 0;
    border-radius: 0 8px 8px 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

.display-container img{
    height: 50%;
    width: 50%;
}
</style>

<body>
    <div class="container d-flex row justify-content-around">
        <div class="login-container">
            <form action="{{ url('/login') }}" method="POST">
                <h2 class="text-center mb-2"><strong>Welcome Back!</strong></h2>
                <p class="text-center mb-4">Enter your Email and Password to access your account.</p>
                    @csrf  <!-- CSRF Token untuk melindungi aplikasi dari serangan CSRF -->
                    <h2 class="text-center mb-2"><strong>Welcome Back!</strong></h2>
                    <p class="text-center mb-4">Enter your Email and Password to access your account.</p>
                
                    <div class="form-group">
                        <label for="email"><strong>Email</strong></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                
                    <div class="form-group">
                        <label for="password"><strong>Password</strong></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <div>
                            <a href="verify-email.html" class="text-light">Forgot password?</a>
                        </div>
                    </div>
                
                    <button type="submit" class="login-button btn btn-primary btn-block mt-3"><strong>Log in</strong></button>
                </form>                
        </div>
        <div class="display-container d-flex flex-column align-items-center"> 
            <h4 >Let's Create the Best Experience for Our Customers!</h4>
            <p>Access your account and manage the customer's need.</p>
            <img src="{{ asset('resource/login-graph.png') }}" class="img-fluid" alt="login-graph">
        </div>
    </div>
        
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
