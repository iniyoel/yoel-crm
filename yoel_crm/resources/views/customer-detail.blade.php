<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PT Smart</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      background-color: #213448;
      display: flex;
      flex-direction: row;
      justify-content: center;
      min-height: 100vh;
    }
    
    h5, h4{
      font-weight: bold;
    }

    .side-menu{
        max-width: 20%;
        width: 100%;
        padding: 30px 50px;
    }

    .side-menu img{
        width: 50%;
    }

    .side-menu a{
        color: white;
        text-decoration: none;
    }

    .side-menu a:hover{
        background-color: #547792;
    }

    .menu img{
        width: fit-content;
    }

    .main-content{
        max-width: 80%;
        background: white;
        border-radius: 21px;
        width: 100%;
        color: black;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .information{
        width: 100%;
    }

    .information-container{
        width: 100%;
        background-color: #547792;
        border-radius: 17px;
        color: white;
    }

    .approval-container{
        width: 100%;
        background-color: #547792;
        border-radius: 17px;
        color: white;
    }

    button{
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        background: #213448;
        color: white;
        border-radius: 13px;
        border: none;
    }

    button:hover{
        background: #34495e;
    }

    .conversion-container{
        background-color: #547792;
        color: white;
        border-radius: 17px;
        width: 100%;
    }

    .container{
        width: 100%;
        height: 100%;
        background: #213448;
        color: white;
        border-radius: 17px;
    }

    .tables-container {
      height: 50vh;
      width: 100%;
      overflow-y: auto;
    }

    table {
      background-color: #2c3e50;
      max-height: 50%;
    }
    
    th, td {
      text-align: left;
      color: #ecf0f1;
    }
    
    th {
      background-color: #34495e;
    }

    tr:hover{
      background-color: #34495e;
      cursor: pointer;
    }

    tr:hover td {
      background-color: #34495e;
      cursor: pointer;
    }

    .search-container {
      display: flex;
      align-items: center;
    }

    .search-container input {
      border: none;
      padding: 5px 20px;
      width: 100%;
      border-radius: 10px;
      font-size: 1rem;
      outline: none;
      box-shadow: 0 4px 9px rgba(0, 0, 0, 0.5);
    }

    .search-container button {
      cursor: pointer;
      width: auto;
      background-color: #34495e;
    }

    .search-container button:hover {
      background-color: #547792;
    }

  </style>
</head>
<body>
    <!-- side menu -->
    <div class="side-menu d-flex flex-column justify-content-between">
      <div class="row d-flex flex-column align-items-start">
          <img src="{{asset('resource/logo.png')}}" class="img-fluid mb-4" alt="logo">  
          <a href="{{url('/dashboard')}}" class="menu col mb-2 py-2">
              <img src="{{asset('resource/overviews.png')}}" class="mr-3" alt="">Overview
          </a>
          <a href="{{url('/leads')}}" class="menu col my-2 py-2">
              <img src="{{asset('resource/users.png')}}" alt="" class="mr-3">Leads</a>
          <a href="{{url('/customers')}}" class="menu col my-2 py-2">
              <img src="{{asset('resource/customers.png')}}" class="mr-3" alt="">Customers</a>
          <a href="{{url('/products')}}" class="menu col my-2 py-2">
              <img src="{{asset('resource/product.png')}}" alt="" class="mr-3">Products</a>
      </div>
      <div class="row d-flex flex-column align-items-start"> 
          <a href="{{url('/login')}}" class="menu col my-2 py-2">
              <img src="{{asset('resource/log-out.png')}}" class="mr-3" alt="">Log Out</a>    
    </div>
  </div>

    <!-- main content -->
    <div class="main-content my-2 mr-3 ml-0 d-flex flex-column justify-content-start">
        <h4>Edit Customer</h4>
        <div class="information d-flex flex-row justify-content-between">
            <div class="information-container px-4 py-2 mr-4 d-flex flex-column justify-content-around">
                <h5>Customer information</h5>
                <div class="d-flex flex-row justify-content-start mt-2">
                    <div class="mr-5">
                        <p>
                            <strong>Name</strong>
                        </p>
                        <p>
                            <strong>Phone Number</strong>
                        </p>
                        <p>
                          <strong>Status</strong>
                      </p>
                        <p>
                            <strong>Payment Amount</strong>
                        </p>
                    </div>
                    <div class="ml-5">
                        <p>{{$customer->name}}</p>
                        <p>+{{$customer->phone}}</p>
                        <p>{{$customer->status}}</p>
                        <p>Rp {{$customer->payment_amount}}</p>
                    </div>
                </div>
            </div>
            <div class="information-container px-4 py-2 ml-4 d-flex flex-column justify-content-between">
                <h5>Customer Subscription Detail</h5>
                <div class="d-flex flex-row justify-content-start my-auto">
                    <div class="mr-5">
                      <p>
                          <strong>Payment Date Due</strong>
                      </p>
                        <p>
                            <strong>Subscription Plan</strong>
                        </p>
                    </div>
                    <div class="ml-5">
                        <p>{{$customer->next_billing_date}}</p>
                        <form action="{{ route('customers.update', $customer->customer_id) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <select name="subscription_plan" class="form-control mb-2" required>
                            <option value="Home Plan" {{ $customer->subscription_plan == 'Home Plan' ? 'selected' : '' }}>Home Plan</option>
                            <option value="Business Plan" {{ $customer->subscription_plan == 'Business Plan' ? 'selected' : '' }}>Business Plan</option>
                            <option value="TV Cable" {{ $customer->subscription_plan == 'TV Cable' ? 'selected' : '' }}>TV Cable</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                  <button type="submit" id="" class="px-5 py-1">
                      <strong>Update</strong>
                  </button>
                </div>
              </form>
            </div>
        </div>
        <div class="conversion-container p-4 d-flex flex-column mt-5">
          <div class="w-100 d-flex flex-row align-items-center justify-content-between">
              <div class="w-50">
                  <h5>Manager Message</h5>
                  <p>
                      Terima kasih, <strong>{{ $customer->name }}!</strong>  Subscription layanan internet Anda telah disetujui dan siap digunakan. Anda dapat segera menikmati layanan kami dengan paket <strong>{{ $customer->subscription_plan }}</strong>.

                      Jika ada pertanyaan, tim kami siap membantu. Selamat menikmati koneksi internet terbaik!
                  </p>
              </div>
          </div>
      </div>
    </div>


    <script></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
