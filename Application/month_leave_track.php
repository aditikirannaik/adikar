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
  background-image: url('images/wallpaper.jpg');
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
    <h2>LEAVE TYPE</h2>
    <div class="container">
  <div class="list-group"  style="width: 500px;">
    <a href="column.php" class="list-group-item" align="centre" ><strong>SICK LEAVE</strong></a>
    <a href="column2.php" class="list-group-item"><strong>WORK OFF</strong></a>
    <a href="column3.php" class="list-group-item"><strong>CASUAL_LEAVE</strong></a>
    <a href="column4.php" class="list-group-item"><strong>MATERNITY LEAVE</strong></a>
    <a href="column5.php" class="list-group-item"><strong>BREAVEMENT LEAVE</strong></a>
    <a href="column6.php" class="list-group-item"><strong>PRIVILEGE LEAVE</strong></a>
  </div>
</div>






