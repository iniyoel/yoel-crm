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

    .graph{
        width: 100%;
        height: 45%;
    }

    .graph-donut{
        background: #ECEFCA;
        border-radius: 15px;
        width: 30%;
    }

    .graph-line{
        background: #ECEFCA;
        border-radius: 15px;
        width: 60%;
    }

    canvas{
        max-height: 30vh;
    }

    .container{
        width: 100%;
        height: 75%;
        background: #213448;
        color: white;
        border-radius: 17px;
    }

    .tables-container {
      max-height: 35vh;
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
    <div class="main-content my-2 mr-3 ml-0 d-flex flex-column justify-content-between">
        <div class="graph d-flex flex-row justify-content-around">
            <div class="graph-donut p-4 d-flex flex-column align-items-center justify-content-around">
                <h5>Income Distribution</h5>
                <canvas id="myDonutChart"></canvas>
            </div>
            <div class="graph-line p-4 d-flex flex-column align-items-center justify-content-around">
                <h5>Active Customer Growth</h5>
                <canvas id="myLineChart"></canvas>
            </div>
        </div>
        <div class="container mt-3 px-4 py-2 d-flex flex-column">
            <div class="row px-4 py-2">
                <h5>Recent Leads</h5>
            </div>
            <div class="row">
                <div class="tables-container">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Lead ID</th>
                          <th>Lead Name</th>
                          <th>Status</th>
                          <th>Join Date</th>
                          <th>Product Interested</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($leads as $lead)
                        <tr>
                          <td>{{ $lead->lead_id }}</td>
                          <td>{{ $lead->nama_lead }}</td>
                          <td>{{ $lead->status_lead }}</td>
                          <td>{{ $lead->tanggal_masuk }}</td>
                          <td>{{ $lead->produk_tertarik }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>


    <script>
      // Grafik Donut - Perbandingan produk
      var ctx = document.getElementById('myDonutChart').getContext('2d');
      var myDonutChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
              labels: ['Home Plan', 'Business Plan', 'TV Cable'],
              datasets: [{
                  label: 'Income Distribution',
                  data: [
                      @foreach($productCounts as $product)
                          {{ $product->count }},
                      @endforeach
                  ],  
                  backgroundColor: ['#1F7D53', '#255F38', '#27391C'],
                  borderColor: ['#fff', '#fff', '#fff'],
                  borderWidth: 2
              }]
          },
          options: {
              responsive: true,
              plugins: {
                  legend: {
                      display: false,
                  },
                  tooltip: {
                      callbacks: {
                          label: function(tooltipItem) {
                              return tooltipItem.label + ': ' + tooltipItem.raw + '%';  
                          }
                      }
                  }
              }
          }
      });
  
      // Grafik Garis - Jumlah customer per bulan
      var ctx2 = document.getElementById('myLineChart').getContext('2d');
      var myLineChart = new Chart(ctx2, {
          type: 'line',
          data: {
              labels: [
                  @foreach($monthlyCustomers as $month)
                      '{{ \Carbon\Carbon::create()->month($month->month)->format("F") }}',
                  @endforeach
              ],
              datasets: [{
                  label: 'Customer Growth',
                  data: [
                      @foreach($monthlyCustomers as $month)
                          {{ $month->count }},
                      @endforeach
                  ],
                  borderColor: '#18230F',
                  borderWidth: 3,
              }]
          },
          options: {
              responsive: true,
              plugins: {
                  legend: {
                      display: false,
                  },
                  tooltip: {
                      callbacks: {
                          label: function(tooltipItem) {
                              return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                          }
                      }
                  }
              },
              scales: {
                  x: {
                      title: {
                          display: true,
                          text: 'Months'
                      }
                  },
                  y: {
                      title: {
                          display: true,
                          text: 'Customer Count'
                      },
                      beginAtZero: true
                  }
              }
          }
      });
  </script>
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
