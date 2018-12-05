<?php
session_start();
include_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Privacy Policy</title>
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
<div id="contact" class="container bg-grey" style="background:white;color:black;padding-top:5px;">
  <h2 class="text-center"><br><b>Privacy Policy & Cookies</b></h2>
  <p> You are free to copy and use this <b>free website</b> while ackowledging the following:<br>
1) <b>Please do not abuse</b> this policy or use it on <b>'bad neighbourhood'</b> websites. Otherwise please remove the "resources & Further Information" section.<br>
2) You do not sell this <b>privacy policy</b> on as your own for monies or as part of a service.<br>
3) You accept that I take no responsibility for the active use and accuracy of this <b>policy</b>, since regulations change and all business' are unique.</p>

     <h3 class="text-center"><br><b>What is this Privacy Policy for?</b></h3>
     <p>This privacy policy is for this website and served by SourceBay and governs the privacy of its users who choose to use it.

The policy sets out the different areas where user privacy is concerned and outlines the obligations & requirements of the users, the website and website owners. Furthermore the way this website processes, stores and protects user data and information will also be detailed within this policy.</p>
   
      <h3 class="text-center"><br><b>Use of Cookies</b></h3>
     <p>This website uses cookies to better the users experience while visiting the website. Where applicable this website uses a cookie control system allowing the user on their first visit to the website to allow or disallow the use of cookies on their computer / device. This complies with recent legislation requirements for websites to obtain explicit consent from users before leaving behind or reading files such as cookies on a user's computer / device.<br><br>

Cookies are small files saved to the user's computers hard drive that track, save and store information about the user's interactions and usage of the website. This allows the website, through its server to provide the users with a tailored experience within this website.
Users are advised that if they wish to deny the use and saving of cookies from this website on to their computers hard drive they should take necessary steps within their web browsers security settings to block all cookies from this website and its external serving vendors.</p>
</div>
<center><hr style="width:80%"></center>
<p class="text-center" style="color:black;">Hope you found this policy useful and any related links on the page. End of Privacy Policy.</p>
<br>
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
