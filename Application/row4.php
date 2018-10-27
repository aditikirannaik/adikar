<?php
include('session_a.php');

if(!isset($login_session)){
header('Location: adminlogin.php'); // Redirecting To Home Page
}

?>
<!DOCTYPE html>
<html>

  <head>
    <title> Admin Login | DIGISOL </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/myrestaurant.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
<style>
  body,html {
  height: 100%;
 }

body {
  padding-top: 50px;
  background-image: url('images/white.jpg');
  background-repeat: repeat;
  background-size: 100%;

}

#myBtn{
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 10px;
}
#myBtn:hover {
  background-color: red;
  color: white;
}

.bg-4{
  background-color: #2f2f2f;
  color: #ffffff;

}
.wide {
  width:100%;
  height:100%;
  height:calc(100% - 1px);
  background-image:url('images/headerimg1.jpg');
  background-size:cover;
}

.wide img {
  width:100%;
  border-radius: 10px;

}
.wide2{
  width:100%;
  height: 100%;
  height:calc(100% - 1px);
}
footer{
  display: block;
}

.form-area {
  background-color: #FAFAFA;
  padding: 10px 40px 60px;
  margin: 10px 0px 60px;
  border: 1px solid GREY;
  opacity:0.9;
}
</style>>
  <body>

  <!--Back to top button..................................................................................-->
    <button onclick="topFunction()" id="myBtn" title="Go to top">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </button>
  <!--Javacript for back to top button....................................................................-->
    <script type="text/javascript">
      window.onscroll = function()
      {
        scrollFunction()
      };

      function scrollFunction(){
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("myBtn").style.display = "block";
        } else {
          document.getElementById("myBtn").style.display = "none";
        }
      }

      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>

    <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="adi.php">DIGISOL</a>
          <a class="navbar-brand" href="type_leave_track.php">BACK</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $login_session; ?> </a></li>
            <li class="active"> <a href="adminlogin.php">ADMIN ANALYSIS PANEL</a></li>
            <li><a href="logout_a.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
        </div>

      </div>
    </nav>
 <h2>MONTHS</h2>
  <div class="col-xs-4 box">   
    <div class="container">
  <div class="list-group" style="width: 200px;">
    <a href="row.php" class="list-group-item">JANUARY</a>
    <a href="row2.php" class="list-group-item">FEBRUARY</a>
    <a href="row3.php" class="list-group-item">MARCH</a>
    <a href="row4.php" class="list-group-item">APRIL</a>
    <a href="row5.php" class="list-group-item">MAY</a>
    <a href="row6.php" class="list-group-item">JUNE</a>
  </div>
</div>
</div>
<div class="col-xs-8 box">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql1="SELECT leave_type, april FROM row_data";
$result = $conn->query($sql1);


$conn->close();
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'no_of leaves in april'],
<?php
 if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "['".$row['leave_type']."', ".$row['april']."],";
          }
      }

?>
        ]);

        var options = {
          chart: {
            title: 'Company Performance'
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
  </body>
</html>