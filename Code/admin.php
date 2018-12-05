<?php
  session_start();
  include_once 'dbconnect.php';
  if($_SESSION['usr_name'] != "Admin"){
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Admin Panel</title>
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
  body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
 
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
      <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span>SourceBay</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-left">
        <li><a href="explore.php">Explore</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right" style="font-size:12px; letter-spacing: 0px;">
        <li><a href="#">About Us</a></li>
        <li><form class="form-inline" role="form" action="search.php" method="POST">
    <div class="input-group" style="padding-top: 6px;">
      
      <input type="text" class="form-control" placeholder="Search SB" name="search" required>
      <span class="input-group-btn">
        <button type="submit" class="btn btn-info" ><span class="glyphicon glyphicon-search"></span> 
        </button>

      </span>

    </div>
    </form></li>
     <li><a href="admin.php">Admin Panel</a></li>
     <li><form class="form-inline" role="form">
     <div class="btn-group" style="padding-top: 6px;">

    <a href="logout.php"><button type="button" class="btn btn-default btn-success"><span class="glyphicon glyphicon-log-out"></span> Log Out</button></a>
    </div>
    </form></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Second Container -->
<div class="container-fluid bg-5" style="padding-top: 70px;
      padding-bottom: 70px;color:black;">
  <div class="container">
   
  <strong>Write your query here: </strong>
  <form role="form" action="" method="POST">
    <div class="form-group" >
      <textarea class="form-control" rows="5" name="sql"></textarea><br>
      <button type="submit" class="btn btn-primary">Execute</button>
      <input class="btn btn-default" value="Reset" type="reset">
    </div>
    
  </form>
  <p>
    <?php 
      if(!empty($_POST['sql'])){
        $s = $_POST['sql'];
        $re = mysql_query($s);
        while($row = mysql_fetch_row($re)){
          foreach ($row as $v) {
            echo $v." \t";
            
          }
          echo "<br>";
        }
      }

      
    ?>
  </p>
  </div>
</div>
</div>
<hr>
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