<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PT Smart</title>
  
  <!-- Link ke CSS Bootstrap (menggunakan CDN) -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Optional: Menambahkan sedikit styling tambahan -->
  <style>
    body {
      background-color: #213448;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .change-password-container {
      background: #547792;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      color: white;
    }

    .btn-change {
      background-color: #ECEFCA;
      color: black;
      box-shadow: 0 0 4px rgba(0, 0, 0, 0.25);
      font-weight: 700;
    }

    .btn-change:hover {
      background-color: #8f917d;
    }

    h2 {
      font-weight: bold;
    }

    label {
      font-weight: bold;
    }
  </style>
</head>
<body>

  <div class="change-password-container">
    <h2 class="text-left mb-4">Input New Password</h2>
    <p class="text-left mb-4">Enter your new password and verify it to change your current password.</p>
    
    <!-- Form Change Password -->
    <form>
      <!-- New Password -->
      <div class="form-group mb-2">
        <label for="newPassword">New Password</label>
        <input type="password" class="form-control" id="newPassword" required>
      </div>
      
      <!-- Verify New Password -->
      <div class="form-group mb-5">
        <label for="verifyPassword">Verify New Password</label>
        <input type="password" class="form-control" id="verifyPassword" required>
      </div>
      
      <!-- Change Password Button -->
      <button type="submit" class="btn btn-change btn-block mt-3">Change Password</button>
    </form>
  </div>

  <!-- Link ke JS Bootstrap (menggunakan CDN) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
