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
  background-image: url('wallpaper.jpg');
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
  background-image:url('headerimg1.jpg');
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
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $login_session; ?> </a></li>
            <li class="active"> <a href="admilogin.php">ADMIN ANALYSIS PANEL</a></li>
            <li><a href="logout_a.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
        </div>

      </div>
    </nav>




<div class="container">
    <div class="jumbotron">
     <h1>Hello Admin! </h1>
     <p>Manage all your reports from here</p>
        
    </div>
    </div>
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

$sql = "SELECT leave_type, count FROM final";
$result = $conn->query($sql);


$conn->close();
?>
<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'xyz'],
  <?php
      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "['".$row['leave_type']."', ".$row['count']."],";
          }
      }
      ?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'LEAVE STATISTICS FROM JANUARY 2018 TO JUNE2018', 'width':750, 'height':600};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

<div class="wide2">
        <div class="col-xs-4 box">
          <img src="calendar.jpg" height="200px">
        </div>
        <div class="col-xs-8 box">
          <img src="BlogPostPhoto2.jpg" height="200px">
        </div>
       

        <div class="col-xs-4 box">
          <h2><strong>MONTHLY LEAVE<br> TRACKING <br> </strong><hr> </h2>
          <a class="btn btn-success btn-lg" href="month_leave_track.php" role="button" > Check Now</a>
        </div>
        <div class="col-xs-4 box">
          <h2><strong>TYPE-WISE<br> ANALYSIS <br> </strong><hr> </h2>
           <a class="btn btn-success btn-lg" href="type_leave_track.php" role="button" > Check Now</a>
        </div>
       
    </div>
<div class="col-xs-12 line"><hr></div>
<!-- Contact department head  -->
  <h2>Contact Department Heads</h2>
  <br>
   <div class="wide2">
        <div class="col-xs-2 box">
          <img src="depthead.gif"  height="200px">
        </div>
        <div class="col-xs-2 box">
          <img src="depthead.gif" height="200px">
        </div> 
       
        <div class="col-xs-8 box">
          <img src="depthead.gif" height="200px">
        </div>

         <div class="col-xs-2 box">
          <h2><strong>SYNEGRA EMS LTD<br> Contact Details <br> </strong><hr> </h2>
          <h4><a href="https://mail.google.com/mail/#inbox?compose=new">E-mail:xyz@gmail.com</a><br></h4>
            <h4>Contact Details:123456789<br></h4><h4>Fax:0832456987<br></h4>
        </div>
        <br>
       
    

        <div class="col-xs-2 box" height="200px">
          <h2><strong>DIGISOL SYSTEMS LTD<br> Contact Details <br><strong><hr> </h2>
          <h4><a href="https://mail.google.com/mail/#inbox?compose=new">E-mail:xyz@gmail.com</a><br></h4>
            <h4>Contact Details:123456789<br></h4><h4>Fax:0832456987<br></h4>
        </div>
        <br>
         <div class="col-xs-2 box" height="200px">
          <h2><strong>TELESMART SCS LTD<br> Contact Details <br></strong><hr> </h2>
          <h4><a href="https://mail.google.com/mail/#inbox?compose=new">E-mail:xyz@gmail.com</a><br></h4>
            <h4>Contact Details:123456789<br></h4><h4>Fax:0832456987<br></h4>
        </div>
      </div>
        <br>
      

  </body>

  <footer class="container-fluid bg-4 text-center">
  <br>
  <p> DIGISOL SYSTEMS LIMITED | GOA  </p>
  <br>
  </footer>
</html>