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
    
    h5{
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

    .form-container{
        background-color: #547792;
        width: 100%;
        color: white;
        border-radius: 21px;
    }

    .form-layout{
        width: 100%;
    }

    .form-left{
        width: 100%;
    }

    .form-right{
        width: 100%;
    }

    input{
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    }

    select{
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    }

    button{
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        background: #213448;
        color: white;
        border-radius: 13px;
        border: none;
    }

    button:hover{
        background: #152637;
        border: none;
    }

    .container{
        width: 100%;
        background: #213448;
        color: white;
        border-radius: 17px;
    }

    .tables-container {
      width: 100%;
      overflow-y: auto;
    }

    table {
      background-color: #2c3e50;
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
    <div class="main-content my-2 mr-3 ml-0 d-flex flex-column justify-content-between align-items-center">
        <div class="container mt-3 px-4 py-2 d-flex flex-column">
            <div class="row py-2 w-100">
                <div class="d-flex flex-row justify-content-between align-items-center px-4 w-100">
                    <h5 class="">Customers List</h5>
                </div>
            </div>
            <div class="row">
                <div class="tables-container">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Billing Due</th>
                          <th>Subscription Plan</th>
                          <th>Payment Ammount</th>
                          <th>Phone</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($customers as $customer)
                        <tr onclick="window.location='/customer-detail/{{ $customer->customer_id }}';">
                          <td>#{{$customer->customer_id}}</td>
                          <td>{{$customer->name}}</td>
                          <td>{{$customer->next_billing_date}}</td>
                          <td>{{$customer->subscription_plan}}</td>
                          <td>Rp {{$customer->payment_amount}}</td>
                          <td>+{{$customer->phone}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
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
