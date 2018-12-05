<?php
	session_start();
	include_once 'dbconnect.php';

		$sqls = "select * from upload;";
		$q = mysql_query($sqls);
		$c = mysql_num_rows($q);
		


?> 


<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Explore Codes</title>
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
      background-color: white;
      color:black;
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
@import "http://fonts.googleapis.com/css?family=Roboto:300,400,500,700";


.mb20 { margin-bottom: 20px; } 

hgroup { padding-left: 15px; border-bottom: 1px solid #ccc; }
hgroup h1 { font: 500 normal 1.625em "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin-top: 0; line-height: 1.15; }
hgroup h2.lead { font: normal normal 20px "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin: 0; padding-bottom: 10px; }

.search-result .thumbnail { border-radius: 0 !important; }
.search-result:first-child { margin-top: 0 !important; }
.search-result { margin-top: 20px; }
.search-result .col-md-2 { border-right: 1px dotted #ccc; min-height: 60px; }
.search-result ul { padding-left: 0 !important; list-style: none;  }
.search-result ul li { font: 400 normal 14px "Roboto",Arial,Verdana,sans-serif;  line-height: 20px; }
.search-result ul li i { padding-right: 5px; }
.search-result .col-md-7 { position: relative; }
.search-result h3 { font: 500 normal 18px "Roboto",Arial,Verdana,sans-serif; margin-top: 0 !important; margin-bottom: 10px !important; }
.search-result h3 > a, .search-result i { color: #248dc1 !important; }
.search-result p { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; } 

.search-result span.border { display: block; width: 97%; margin: 0 15px; border-bottom: 1px dotted #ccc; }
    
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


<div class="container ">

    <hgroup class="mb20">
		<h1>All Source Files: </h1>
									
	</hgroup>
	<article >
			
			<div class="col-xs-12 col-sm-12 col-md-2">
				<ul class="meta-search">
		
					<p>Uploaded By:
					
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-7 ">
				<p>FileName:</p>					
                
			</div>
			<span class="clearfix borda"></span>
		</article>

    <section class="well col-xs-12 col-sm-6 col-md-12">
		<article class="search-result row">
			
			<div class="col-xs-12 col-sm-12 col-md-2">
				<ul class="meta-search">
		
					<?php
						$fs =0;
						if($c==0){
							$output = 'There was no search results!';
							//echo $output;
						}
						else{
							$fs = 1;
							while($row=mysql_fetch_array($q)){
								$a = $row['username'];
								echo '<li><i class="glyphicon glyphicon-user"></i> <span>';
								echo $a;
								echo '</span></li>';
							}
						}
							
						
						
					?>
					
					
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-7 excerpet">
				<?php

					if($fs==1){
						$sqls1 = "select * from upload;";
						$q1 = mysql_query($sqls1);
						while($row1=mysql_fetch_array($q1)){
								$f = $row1['f_name'];
								echo "<h3><a href='source.php?file=$f' style=\"text-decoration: none;\">";
								echo $f;
								echo '</a></h3>';
							}


					}	

				?>						
                
			</div>
			<span class="clearfix borda"></span>
		</article>
         			

	</section>
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

 
