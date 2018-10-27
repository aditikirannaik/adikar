<?php
session_start();
?>

<html lang="en">
<head>
<title>HOME |  DIGISOL</title>
</head>

<link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">

  <link rel="stylesheet" type = "text/css" href ="css/index.css">
  <link rel="stylesheet" type = "text/css" href ="css/scrap.css">

</style>
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
          <a class="navbar-brand" href="adi.php">Smartlink Systems Ltd</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="#about">ABOUT</a></li>
            <li><a href="#piechart">ATTENDANCE CHART</a></li>
          <li><a href="#services">CONTACT HODS</a></li>
          </ul>

<?php
if(isset($_SESSION['login_user1'])){

?>


          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
            <li><a href="myrestaurant.php">Admin HR CONTROL PANEL</a></li>
            <li><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>

  <?php        
}
else {

  ?>

<ul class="nav navbar-nav navbar-right">
            <li><a href="adminsignup.php"><span class="glyphicon glyphicon-user"></span> Sign Up  </a> </li>

            <li><a href="adminlogin.php"><span class="glyphicon glyphicon-log-in"></span> Login </a> </li>
          </ul>
<?php
}
?>

 </div>
      </div>
    </nav>

    <div class="jumbotron text-center">
  <h1>Smartlink Systems Ltd</h1>
  <h2>Leave Analyzer</h2> 
</div>

<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>Smartlink Systems Limited</h2><br>
      <h4><p>Smartlink Holdings Ltd. , earlier known as Smartlink Network Systems Ltd. ,  is one of India's leading networking company. It was established in the year 1993 to prop the Indian market in the field of Network Infrastructure.</p> 
      <p>Pioneer in the field of Active networking, Smartlink has a rich history  of making many product brands reach the desired heights in the Indian and international markets.</p> <p>Smartlink now is an NBFC company , with it's operations split into 3 wholly owned subsidiaries to have focused business approach.</p>
      
    </div>
    <div class="col-sm-4">
      <img src="W2rp7Alv_400x400.jpg" alt="digisol" width="500" height="333">
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo"></span>
    </div>
    <div class="col-sm-8">
  
      <h4><strong>The Smartlink subsidiaries are :- </strong> <p>DIGISOL SYSTEMS LTD. :  DIGISOL Systems Ltd is a brand product company which looks after the sale s, marketing , service and support of DIGISOL brand of active and passive (Structured cabling) products and solutions. The company is headquartered in Mumbai , India.</p>
 
<p>SYNEGRA EMS LTD. : Synegra is an EMS ODM company which is into manufacturing of Active networking range of products. The company has a huge , state of the art manufacturing set up in Goa, India.</p>
 
<p>TELESMART SCS LTD. : Telesmart is an EMS ODM company which looks into manufacturing of Passive (Structured Cabling) range of products  in it's technologically advanced manufacturing factory set up in Goa , India.</p>
 </h4><br>
    </div>
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

?>

<div id="piechart" class="container-fluid text-center">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
 // Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  <?php
      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "['".$row['leave_type']."', ".$row['count']."],";
          }
      }
      ?>
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'ATTENDANCE STATISTICS FROM JANUARY 2018 TO JUNE 2018', 'width':1000, 'height':750 };

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
</div>
</div>

<div class="col-xs-12 line"><hr></div>
<!-- Contact department head  -->
<div id="services" class="container-fluid text-center">
  <h2>Contact Department Heads</h2>
  <br>
   <div class="wide2">
        <div class="col-xs-4 box">
          <img src="depthead.gif" height="200px">
        </div>
        <div class="col-xs-4 box">
          <img src="depthead.gif" height="200px">
        </div>
        <div class="col-xs-4 box">
          <img src="depthead.gif" height="200px">
        </div>

        <div class="col-xs-4 box">
          <h2><strong>DIGISOL SYSTEMS LTD<br> Contact Details <br> </strong><hr> </h2>
          <h4><a href="https://mail.google.com/mail/#inbox?compose=new">E-mail:xyz@gmail.com</a><br></h4>
            <h4>Contact Details:123456789<br></h4><h4>Fax:0832456987<br></h4>
        </div>
        <br>
         <div class="col-xs-4 box">
          <h2><strong>TELESMART SCS LTD<br> Contact Details <br></strong><hr> </h2>
          <h4><a href="https://mail.google.com/mail/#inbox?compose=new">E-mail:xyz@gmail.com</a><br></h4>
            <h4>Contact Details:123456789<br></h4><h4>Fax:0832456987<br></h4>
        </div>
        <br>
         <div class="col-xs-4 box">
          <h2><strong>SYNEGRA EMS LTD<br> Contact Details <br> </strong><hr> </h2>
          <h4><a href="https://mail.google.com/mail/#inbox?compose=new">E-mail:xyz@gmail.com</a><br></h4>
            <h4>Contact Details:123456789<br></h4><h4>Fax:0832456987<br></h4>
        </div>
        <br>
        
    </div>
</div>


<footer class="container-fluid bg-4 text-center">
  
  <br>
  <p> SMARTLINK SYSTEMS LIMITED | Smartlink Holdings</p>
  <br>

  </footer>
  

  </html>