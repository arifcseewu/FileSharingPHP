<?php
  session_start();
  include_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Edit Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  .navbar {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
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
      <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span>   SourceBay</a>
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
        <li><a href="#">About Us</a></li>
        
        <?php 
          if (isset($_SESSION['usr_name'])) {
            $u = $_SESSION['usr_name'];
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
    
  <?php 
    $sql = "select picname from profile where username = '$u'";
    $ra = mysql_query($sql);
  ?>



	<div class="container">
  <h1 style="padding-left:20px;">Edit Profile</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="text-center">
        
        <form id="form1" enctype="multipart/form-data" action='chimg.php' method='post'>
        <?php
          if($ra1 = mysql_fetch_array($ra)){

          if(is_null($ra1['picname'])){
            echo '<img src="uploads/guest.png" class="avatar img-circle img-thumbnail" alt="avatar" height="150" width="180">';
          }
          else{
            $b = $ra1['picname'];
            $p = "uploads/".$b;
            echo "<img src=\"$p\" class=\"avatar img-circle img-thumbnail\" alt=\"avatar\" height=\"150\" width=\"180\">";
          }


        }
        ?>
          <h6>Upload a different photo...</h6>
          <input type="file" name="fileToUpload" id="fileToUpload" class="text-center center-block well well-sm">
          <input type="submit" value="Change Image" name="submit">
        </form>
      
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
     <!-- <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-coffee"></i>
        This is an <strong>.alert</strong>. Use this to show important messages to the user.
      </div> -->
      <h3>Personal info</h3>
      <form class="form-horizontal" role="form" method="POST" action="ed_profile.php" id="form2">
        <div class="form-group">
          <label class="col-lg-3 control-label">Fullname:</label>
          <div class="col-lg-8">
            <input class="form-control" name="fname" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" name="email" type="email">
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">New Password:</label>
          <div class="col-lg-8">
            <input class="form-control" name="pass" type="password">
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Confirm Password:</label>
          <div class="col-lg-8">
            <input class="form-control" name="cpass" type="password">
          </div>
        </div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Location:</label>
          <div class="col-lg-8">
            <input class="form-control" name="loc" type="text">
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-lg-3 control-label">About:</label>
          <div class="col-lg-8">
            <textarea class="form-control" rows="4" name="about"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Save Changes" type="submit">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<footer class="lastfooter" style="padding-top:110px;">
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
