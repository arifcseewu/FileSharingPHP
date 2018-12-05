<?php
  session_start();
  include_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Home | SourceBay</title>
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
  .bg-1 {
    width:100%;
    height:421px;
      background:url("Sc.jpg");
      background-size: 100% ; 
      color: #ffffff;
  }
  .bg-2 {
      background-color: #474e5d; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 {
      background-color: #ffffff; /* White */
      color: #555555;
  }
  .bg-4 {
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
  }
  .bg-5 {
    padding-top: 0;
    border-top: 0;
    margin-top: 0;
      background-color: white; /* Black Gray */
      color: black;
    
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
     .carousel-inner img {
      -webkit-filter: grayscale(20%);
      filter: grayscale(20%); /* make all photos black and white */
      width: 100%; /* Set width to 100% */
      margin: auto;
  }
  .carousel-caption h3 {
      color: greywhite !important;
      font-size:32px;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
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


<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="7.jpg" alt="New York" width="800" height="371px">
        <div class="carousel-caption">
          <h3>Find Your Source</h3>
          </div>
      </div>

      <div class="item">
        <img src="4.jpg" alt="Chicago" width="800px" height="371px">
        <div class="carousel-caption">
          <h3>Share Your Source</h3>
        </div>
      </div>
    
      <div class="item">
        <img src="5.jpg" alt="Los Angeles" width="800px" height="371px">
        <div class="carousel-caption">
          <h3>Make Your Source</h3>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<!-- First Container -->


<!-- Second Container -->
<div class="container-fluid bg-5 text-center" style="padding-top: 70px;
      padding-bottom: 70px;">
  <div class="container">
   <div  style="float:right;">
     <p style="font-size:13px;"><br>All guest users need to open an account to view the developer's projects and codes.<a href="register.php" style="text-decoration: none;"> Sign up</a><br> to get started.
</p>
</div>
<div  style="float:left; font-family: Calibri">
<p style="font-size:24px;">Guest<br>
User Accounts</p>
</div>
</div>
</div>

<div class="container-fluid bg-1">
  
  <div class="container">
   <div  style="float:right;">
       <br> <br> 
      <a href="register.php" style="text-decoration:none;color:white;"><button type="button" class="btn btn-default btn-success" style="width:250px; height:60px;">SignUp for SourceBay</button></a>
    
    
    </div>
    <h1>Store codes <br>& share 'em</h1>
    <p>Use SourceBay to build personal projects, store the progress,<br>
    and work together on open source technologies with other <br>
    developers and coders.</p> 
  </div>
</div>  
 
<!-- Container (Contact Section) -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">What are you looking for?</h3>
  <p>This website provide numerous extension files and to find the file that you want just use our search option. We made it more user friendly so that everyone using this site benefits themselves. Our search option is mostly based the file name, so we prefer the developers of the codes take this as consideration while naming their files afer uploading them.</p>
  <form class="form-inline" role="form">
    <div class="form-group">
      <label for="srch"></label>
      <input type="email" class="form-control" id="email" placeholder="Search By FileName">
    </div>
    
    <button type="submit" class="btn btn-default btn-info"><a href="#">
    </a><span class="glyphicon glyphicon-search"></span> Search</button>
  </form>
  
</div>


<!-- Container (Contact Section) -->
<div id="contact" class="container">
  <br>
  <h3 class="margin bg-3 text-center">What do you do here?</h3>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Account</a></li>
    <li><a data-toggle="tab" href="#menu1">Upload</a></li>
    <li><a data-toggle="tab" href="#menu2">Share</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active" style="color:grey;">
      <h2>Create An Account</h2>
      <p>Everyone needs to create an account in order to get the full benefits of the website. We allow both developer and guest accounts to help eachother in specific particular topics.</p>
    </div>
    <div id="menu1" class="tab-pane fade" style="color:grey;">
      <h2>Upload The Source Code</h2>
      <p>Developers and coders can upload their source codes and save them online. We have over 300 extensions capable to be stored here.</p>
    </div>
    <div id="menu2" class="tab-pane fade" style="color:grey;">
      <h2>Share The Codes</h2>
      <p>Uploaded Codes can be explpored by other coders and guest user. Guest users can be interested on your codes and other developers can correct your mistakes in the codes by commenting.</p>
    </div>
  </div>

</div>

 

<!-- Third Container (Grid) -->
<div class="container-fluid bg-3 text-center">
  <h3 class="margin">Welcome To SourceBay</h3>
  <div class="row">
    <div class="col-sm-4">
      <p>Where over 300 extentions are uploaded and stored as source codes.Be sure to upload yours.</p>
      <center><img src="1.png" class="img-responsive margin" style="width:277px;" alt="Image"></center>
    </div>
    <div class="col-sm-4">
      <p>Where all the code files are organised by their extensions.Stay organised.</p>
      <center><img src="2.png" class="img-responsive margin" style="width:277px;" alt="Image"></center>
    </div>
    <div class="col-sm-4">
      <p>Where you can search your needed code by the file name. Search what you need.</p>
      <center><img src="3.png" class="img-responsive margin" style="width:277px;" alt="Image"></center>
    </div>
  </div>
</div>
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


