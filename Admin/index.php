<?php
session_start();
if(!isset($_SESSION['user'])){
  header("location:./LI_LO/Login.php");
}
$link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard ADMIN</title>

    <script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
  google.charts.load('current', {packages: ['corechart']});
  google.charts.setOnLoadCallback(drawChart);

</script>
    

    <!-- Bootstrap core CSS -->
<link href="../CSS/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    
<script  src='../Scripts/jQuery.js'></script>
    <script  src='../Scripts/Bootstrap.js'></script>
    <!-- Custom styles for this template -->
    <link href="../CSS/dashboard.css" rel="stylesheet">
  </head>
  <body id="Container">
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">MY GYM</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" id="searchBar" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="./LI_LO/logout.php">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="orders.php">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="customers.php">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="messages.php">
              <span data-feather="bar-chart-2"></span>
              Messages
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="classes.php">
              <span data-feather="bar-chart-2"></span>
              Classes
            </a>
          </li>
        </ul>


      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>

      </div>
<div class="d-flex" style="margin-left: 20%;">
<!-----order count----->
<?php
$oq="SELECT * FROM `orders`";
$or=mysqli_query($link,$oq);
$oc=mysqli_num_rows($or);
?>
<div class="card-header" style="margin-right: 20px;">
<div class="card-body">
Total items ordered:
</div>
<h4 style="color:blue;">&nbsp&nbsp <?php echo $oc;  ?></h4>
</div>
<!-----unread msgs----->
<?php
$mq="SELECT * FROM `contact-us` WHERE `our-reply`='' ";
$mr=mysqli_query($link,$mq);
$mc=mysqli_num_rows($mr);
?>
<div class="card-header" style="margin-right: 20px;">
<div class="card-body">
Untreated Messages:
</div>
<h4 style="color:blue;">&nbsp&nbsp <?php echo $mc;  ?></h4>
</div>
<!---customersNB---->
<?php
$uq="SELECT * FROM `users` ";
$ur=mysqli_query($link,$uq);
$uc=mysqli_num_rows($ur);
?>
<div class="card-header">
<div class="card-body">
Total Users & Members:
</div>
<h4 style="color:blue;">&nbsp&nbsp  <?php echo $uc;  ?></h4>
</div>


</div>

<br>
<br>
<br>
<br>
<!-----chart1----->

<div id="donutchart" style="width: 500px; height: 300px;float:left;"></div>

<!-----chart2----->

<div id="curve_chart" style="width: 500px; height: 300px;float:right;"></div>
</div>


   
      </div>
    </main>
  </div>
</div>
<?php
$sql="SELECT * FROM `orders` WHERE `type`='whey'"; $res=mysqli_query($link,$sql);
$sql1="SELECT * FROM `orders` WHERE `type`='pre-workout'"; $res1=mysqli_query($link,$sql1);
$sql2="SELECT * FROM `orders` WHERE `type`='mass-gainer'"; $res2=mysqli_query($link,$sql2);

$wc=mysqli_num_rows($res);
$pwc=mysqli_num_rows($res1);
$mgc=mysqli_num_rows($res2);
?>
<input type="hidden" id="wc" value="<?php echo $wc; ?>"> 
<input type="hidden" id="pwc" value="<?php echo $pwc; ?>">
<input type="hidden" id="mgc" value="<?php echo $mgc; ?>">
  </body>
</html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Products', 'Number Sold'],
          ['Whey',        <?php echo $wc; ?>],
          ['Pre-workout',      <?php echo $pwc; ?>],
          ['Mass-gainer',  <?php echo $mgc; ?>],

        ]);

        var options = {
          title: 'Most sold type of supplement.',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      
      
      }
    </script>
  <?php 
  $qry="SELECT price FROM orders";
  $resl=mysqli_query($link,$qry); 
  $total=array();
  while($row=mysqli_fetch_assoc($resl)){ 
    $total[]=$row; }
for($i=0;$i<count($total);$i++){

$T[]= $total[$i]["price"];
$YT = array_sum($T);
}
  ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales'],
          ['2018',  220],
          ['2019',  280],
          ['2020',  150],
          ['2021',  <?php echo $YT; ?>]
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>
<script>
$(document).ready(function(){
  $("#searchBar").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#Container").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
