<?php
session_start();
include_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Contact</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  *{
    margin:0;
    padding:0;
    border:0;

  }
  .navbar {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
    }
     .bg-1 {
    width:100%;
    height:421px;
      background:url("Sc.jpg");
      background-size: 100% ; 
      color: #ffffff;
  }
.container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
  }
  .navbar {
      padding-top: 15px;
      padding-bottom: 15px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 14px;
      letter-spacing: 2px;
  }
  .navbar-nav  li a:hover {
      color: #1abc9c !important;
  }
  .nav-tabs li a {
      color: #777;
  }
  footer {
      background-color: white;
      color: black;
      width:100%;

    }
     </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button> 
      <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span>  SourceBay</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-left">
         
      <?php
            if (isset($_SESSION['usr_name']))
                echo '<li><a href="explore.php">Explore</a></li>';
            else
                 echo '<li><a href="#">Explore</a></li>';
      ?>

        

        
      </ul>
      <ul class="nav navbar-nav navbar-right" style="font-size:12px; letter-spacing: 0px;">
        <li><a href="about.php">About Us</a></li>
        
        <?php 
          if (isset($_SESSION['usr_name'])) {
            echo '<li><form class="form-inline" role="form" action="search.php" method="POST">
    <div class="input-group" style="padding-top: 6px;">';
            echo '<input type="text" class="form-control" placeholder="Search SB" name="search" required>';
            echo '<span class="input-group-btn">';
            echo '<button type="submit" class="btn btn-info" ><span class="glyphicon glyphicon-search"></span>';
            echo '</button> </span></div></form></li>';
        ?>
 
        
     <li>
       <?php 
        
          $cname = $_SESSION['usr_name']; 
          if($cname=='Admin')
            echo "<a href='admin.php'>".$cname."</a>";
          else
            echo "<a href='profile.php'>".$cname."</a>";


     ?>
     </li>
     <li><form class="form-inline" role="form">
     <div class="btn-group" style="padding-top: 6px;">
     <?php
        echo '<a href="logout.php"><button type="button" class="btn btn-default btn-success"><span class="glyphicon glyphicon-log-out"></span> Log Out</button></a>';

        }

        else { 
          //echo '<li><a href="login.php">Login</a></li>';
          //echo '<li><a href="register.php">Sign Up</a></li>';

     ?>

     <a href="login.php" ><button type="button" class="btn btn-default btn-success"><span class="glyphicon glyphicon-log-in"></span> Log In</button></a> 
    
    <button type="button" class="btn btn-default btn-success"><a href="register.php" style="text-decoration:none;color:white;"><span class="glyphicon glyphicon-user"></span> Sign Up</a></button>
    </div>
    
    <?php }?>

    </form></li>
      </ul>
    </div>
  </div>
</nav>
  <div id="contact" class="container-fluid bg-grey" style="background:gray;padding-top:5px;">
  <h2 class="text-center">CONTACT</h2>
  <center><hr style="width:20%;padding-top: 0;margin-top: 0;"></center><br>
  <div class="row">
    <div class="col-sm-5 text-right">
      <p> <br><br>Contact us and we'll get back to you within 24 hours.</p>
      
    </div>
    <div class="col-sm-7 slideanim text-center">
      <p><span class="glyphicon glyphicon-map-marker"></span> Dhaka,Bangladesh</p>
      <p><span class="glyphicon glyphicon-phone"></span> 01616058666/01811266324</p>
      <p><span class="glyphicon glyphicon-envelope"></span> nabil.shawkat023@gmail.com/tanzimrizwan@gmail.com</p>
    </div>
  </div>
</div>
<hr style="padding-top: 0;margin-top: 0;border-top: 0;">
<div id="googleMap" style="height:400px;width:100%;"></div>

<!-- Add Google Maps -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
var myCenter = new google.maps.LatLng(23.768634, 90.425731);

function initialize() {
var mapProp = {
  center:myCenter,
  zoom:17,
  scrollwheel:false,
  draggable:true,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
<hr>

<!-- Footer -->
    <footer class="lastfooter">
    <div class="container-fluid">
      <div style="text-align:center; font-size:14px; font-family: Arial;">
          <ul class="list-unstyled list-inline">
            <li><a href="contact.php" class="customcolor">Contact Us</a></li>
            <li><a href="privacy.php" class="customcolor">Privacy Policy</a></li>
          </ul>
          <p class="customcolor" style="font-size:12px; margin-top:20px;">&copy; 2016 SourceBay. All rights reserved.<br> No use for commercial purposes may be made of such trademarks. Use of SourceBay signifies your agreement to the Terms and Conditions and <a href="privacy.php" class="customcolor">Privacy Policy & Cookies.</a></p>
          
        </div>
      </div>
      
    </footer>

</body>
</html>

