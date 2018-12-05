<?php
  session_start();
  include_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
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
  <script type="text/javascript">
    function mfun(){
      var f = document.getElementById('form');
      var d1 = document.createElement("div");
      var d2 = document.createElement("div");
      var i = document.createElement("button");
      var c = document.createElement("button");
      var b = document.getElementById('upload');
      f.removeChild(b);
      d1.innerHTML = '<div class="form-group" id="d1"><label>Select file to upload:</label><input type="file" name="fileToUpload"></div>'
      f.appendChild(d1);
      d2.innerHTML = '<div class="form-group" id="d2"><label>Write short description</label><textarea class="form-control" rows="4" name="des"></textarea></div>';
      f.appendChild(d2);
      i.innerHTML = 'Upload Now';
      i.id = 'uploads';
      i.name ='fileToUpload';
      
      f.appendChild(i);
      f.innerHTML += "<br>";

      c.innerHTML = 'Close';
      c.type = 'submit';
      c.name = 'close';
      f.innerHTML += "<br>";
      f.appendChild(c);

    }


  </script>
</head>
<body>
  <?php
    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    $page1 = ($page*5)-5;
    $u = $_SESSION["usr_name"];
    $sql = "select * from upload where username='$u';";
    $sql1 = "select * from upload where username='$u' limit $page1,5;";
    $r = mysql_query($sql);
    $ra = mysql_query($sql1);
    $count = mysql_num_rows($r);
    $a = ceil($count/5);
  ?> 
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
    $sqlp = "select * from profile where username = '$u';";
    $ra1 = mysql_query($sqlp);
  ?>

	<div class="container" style="padding-top:40px">
  <div class="row">
    <!-- left column -->
    <div class="col-sm-3">
      <div class="text-center">
        
        <?php

        if($ra2 = mysql_fetch_array($ra1)){

          if(is_null($ra2['picname'])){
            echo '<img src="uploads/guest.png" class="avatar img-circle img-thumbnail" alt="avatar" height="150" width="180">';
          }
          else{
            $b = $ra2['picname'];
            $p = "uploads/".$b;
            echo "<img src=\"$p\" class=\"avatar img-circle img-thumbnail\" alt=\"avatar\" height=\"150\" width=\"180\">";
          }


        }

          
        ?>

      </div>
      <div class="info" style="padding-left:60px">
  
        <?php
          $sqlf="select fullname from profile where username='$u';";
          $rf = mysql_query($sqlf);
          
          if($rf1 = mysql_fetch_array($rf)){

            if(!is_null($rf1['fullname'])){
              $fn = $rf1['fullname'];
              echo "<h3>$fn</h3>";
            }
          }


          echo "<h4>$u</h4>";


          $sqla = "select about from profile where username='$u';";
          $rab = mysql_query($sqla);
          
          if($rab1 = mysql_fetch_array($rab)){

            if(!is_null($rab1['about'])){
              $ab = $rab1['about'];
              echo $ab;
              echo "<br><br>";
            }
          }




          $sqle = "select email from users where username='$u';";
          $re = mysql_query($sqle);
          $em = mysql_fetch_row($re);
          $ema = $em[0];
          echo "<strong>";
          echo "E-mail: ".$ema;
          echo "</strong>";
          echo "<br>";
          

          $sqlo = "select location from profile where username='$u';";
          $rlo = mysql_query($sqlo);
          
          if($rlo1 = mysql_fetch_array($rlo)){

            if(!is_null($rlo1['location'])){
              $lo = $rlo1['location'];
              echo "Location: ".$lo;
              echo "<br>";
            }
          }


          $sqlj = "select joined from users where username='$u';";
          $rj = mysql_query($sqlj);
          $jo = mysql_fetch_row($rj);
          $join = $jo[0];
          echo "Joined: ".$join;

          
        ?>




      </div>
      <center><h4><a href="profile_form.php">Update Profile</a></h4></center>
    </div>
    <!-- edit form column -->
    <div class="col-sm-9">
      <div class="page-header">
        <h3>Uploaded SourceFiles</h3>
      </div>
      <div class=" containers">
        <p>
          <form class="form" role="form" action="fupload.php" id="form" method="post" enctype="multipart/form-data">
      <button class="btn btn-success" id="upload" type="button" onclick="mfun()">Upload File</button>
          </form>
        </p>
      </div>
      
      <!--if(isset($s) && $s==1){
            echo'<div class="alert alert-info alert-dismissable">
            <a class="panel-close close" data-dismiss="alert">×</a> 
            <i class="fa fa-coffee"></i>
            Your file has been successfully uploaded. Click on Refresh to see take effect.
            </div>';
            
          }-->
      <table class="table table-hover .table-responsive" id='mtable'>
          <tbody>
            <thead>
              <tr>
                <th>Name</th>
                <th>Description</th>
              </tr>
            </thead>
            <?php 
              while($row=mysql_fetch_array($ra)){
                echo "<tr>";
                echo "<td id='fname'>";
                $nam=$row["f_name"];
                echo "<a href='source.php?file=$nam'>";
                echo $row["f_name"];
                echo "</a>";
                echo "</td>";
                echo "<td>";
                echo $row["f_des"];
                echo "</td>";
                echo "</tr>";
              }
            ?>
          </tbody>
        </table>

        <br><br>
        <center><p><?php 
          for($i=1;$i<=$a;$i++){
            echo "<a href=\"profile.php?page=$i\">$i</a> "." ";
          }
        ?></p></center>
    </div>
  </div>
</div>
<footer class="lastfooter" style="padding-top: 110px;">
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
