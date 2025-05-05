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

    select{
        border-radius: 17;
        width: 100%;
    }

    button{
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        background: #213448;
        color: white;
        border-radius: 13px;
        border: none;
    }

    button:hover{
        background: #34495e ;
    }

    .conversion-container{
        background-color: #547792;
        color: white;
        border-radius: 17px;
        width: 100%;
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
    <div class="main-content my-2 mr-3 ml-0 d-flex flex-column">
        <div class="information d-flex flex-row justify-content-between mb-5">
            <div class="information-container px-4 py-2 mr-4 d-flex flex-column justify-content-around">
                <h5>Lead information</h5>
                <div class="d-flex flex-row justify-content-start my-auto">
                    <div class="mr-5">
                        <p>
                            <strong>Name</strong>
                        </p>
                        <p>
                            <strong>Email</strong>
                        </p>
                        <p>
                            <strong>Phone Number</strong>
                        </p>
                        <p>
                            <strong>Address</strong>
                        </p>
                    </div>
                    <div class="ml-5">
                            <p>{{ $lead->nama_lead }}</p>
                            <p>{{ $lead->email_lead }}</p>
                            <p>{{ $lead->telepon_lead }}</p>
                            <p>{{ $lead->alamat_lead }}</p>
                    </div>
                </div>
            </div>
            <div class="approval-container px-4 py-2 d-flex flex-column justify-content-between">
                <h5>Lead Details</h5>
                <form action="{{ route('leads.update', $lead->lead_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="d-flex flex-row justify-content-evenly my-auto">
                            <div class="mr-5">
                                <p><strong>Product Interested</strong></p>
                                <p><strong>Status</strong></p>
                            </div>
                            <div class="ml-5">
                                <!-- Dropdown for product interested (enum) -->
                                <select name="produk_tertarik" class="form-control mb-2" required>
                                    <option value="Home Plan" {{ $lead->produk_tertarik == 'Home Plan' ? 'selected' : '' }}>Home Plan</option>
                                    <option value="Business Plan" {{ $lead->produk_tertarik == 'Business Plan' ? 'selected' : '' }}>Business Plan</option>
                                    <option value="TV Cable" {{ $lead->produk_tertarik == 'TV Cable' ? 'selected' : '' }}>TV Cable</option>
                                </select>
                
                                <!-- Dropdown for status (enum) -->
                                <select name="status_lead" class="form-control mb-2" required>
                                    <option value="Closed" {{ $lead->status_lead == 'Closed' ? 'selected' : '' }}>Closed</option>
                                    <option value="Pending" {{ $lead->status_lead == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Follow Up" {{ $lead->status_lead == 'Follow Up' ? 'selected' : '' }}>Follow Up</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="px-5 py-1">
                                <strong>Submit</strong>
                            </button>
                        </div>
                </form>
            </div>
        </div>
        <div class="conversion-container p-4 d-flex flex-column">
            <h5>Lead Conversion</h5>
            <div class="w-100 d-flex flex-row align-items-center justify-content-between">
                <div class="w-50">
                    <h5>Manager Message</h5>
                    <p>
                        Terima kasih, <strong>{{ $lead->nama_lead }}!</strong>  Subscription layanan internet Anda telah disetujui dan siap digunakan. Anda dapat segera menikmati layanan kami dengan paket <strong>{{ $lead->produk_tertarik }}</strong>.

                        Jika ada pertanyaan, tim kami siap membantu. Selamat menikmati koneksi internet terbaik!
                    </p>
                </div>
                <button type="submit" id="submit" class="px-5 py-1">
                    <strong>Convert To Customer</strong>
                </button>
            </div>
        </div>
    </div>


    <script></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
