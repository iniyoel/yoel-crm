<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PT Smart</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    body {
      background-color: #213448;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .forgot-password-container {
      background: #547792;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      color: white;
    }

    .btn-send {
      background-color: #ECEFCA;
      color: black;
      box-shadow: 0 0 4px rgba(0, 0, 0, 0.25);
      font-weight: 700;
    }

    .btn-send:hover {
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

  <div class="forgot-password-container col align-items-evenly">
    <h4 class="text-left mb-4">Verify your Email to change the Password.</h4>
    <form>
      <div class="form-group mb-5">
        <label for="email">Verify your Email</label>
        <input type="email" class="form-control" id="email" required>
      </div>
      <button type="submit" class="btn btn-send btn-block mt-3">Send verification Link</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
