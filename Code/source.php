<?php
session_start();
include_once 'dbconnect.php';
//echo "I am from comment";
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_GET["file"];?></title>
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


.comments .media-heading {
    margin-top: 25px;
}






.comments .media-body p {
    position: relative;
    background: #F7F7F7;
    padding: 15px;
    margin-top: 50px;
}

.comments .media-body p::before {
    background-color: #F7F7F7;
    box-shadow: -2px 2px 2px 0 rgba( 178, 178, 178, .4 );
    content: "\00a0";
    display: block;
    height: 30px;
    left: 20px;
    position: absolute;
    top: -13px;
    transform: rotate( 135deg );
    width:  30px;
}

.white {
    color: #fff;
}







  </style>

	<script type="text/javascript">
		function mfun1(){
			var ans = confirm("Delete this file? \n <?php echo $_GET["file"]; ?>");
			if(ans){
				alert("Deleted.");
				<?php $a = $_GET["file"]; ?>
				var d = '<?php echo $a; ?>';

				window.location = "del_file.php?del=" + d;
				
			}
			else{
				alert("Not deleted.");
			}
		}

		function mfun2(){
			var f =  '<?php echo $a; ?>';
			var cmt = document.getElementById('comment').value;
			if(!cmt)
				window.location = "comnt.php?fn=" + f +"&comm=" + cmt;
		}
			
	</script>

</head>
<body>

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


<div class="container" style="padding-top:20px;">
		<?php 
			$file = $_GET["file"];
			$sqlu = "select username from upload where f_name='$file';";
			$ru = mysqli_query($con,$sqlu);
			$un = mysqli_fetch_array($ru);
			$una = $un[0];
			#echo $una;
			$u = $_SESSION["usr_name"];
			if($u==$una){
				echo '<button type="button" class="btn btn-danger" onclick="mfun1()">Delete</button>';
			}
			echo "<br><br>";
			echo "<strong>Author: $una</strong>";
		?>
		
		<?php
			
			echo "<br><br>";
			$fn = 'uploads/'.$file;
			//echo $fn;
            $fileString = file_get_contents($fn);
            echo "<pre>";
            echo nl2br( htmlspecialchars($fileString) );
            echo "</pre>";
          ?>
          <br>
          <br>
          <form role="">
	          <div class="form-group" >
				  <label for="comment">Comment here:</label>
				  <textarea class="form-control" rows="5" id="comment" required></textarea>
			  </div>
			  <button type="button" class="btn btn-primary" onclick="mfun2()">Comment</button>
		  </form>
		  <br><br>
		  <div class="comnt">
		  	<?php
        //echo"hello"; 
		  		$sqlco = "select * from comment where f_name ='$file';";
		  		$r = mysqli_query($con,$sqlco);
		  		$i =1;
		  		while($row = mysqli_fetch_array($r)){

				   echo '<ul class="media-list comments">
				      <li class="media">

				        <div class="media-body">
				          <h5 class="media-heading pull-left"><strong>';
				    echo $row["cmnter"];
				    echo '</strong> says:</h5>
				            
				          <br class="clearfix">
				          <p class="well">';
				    echo $row["comnt"];
				    echo '</p>
				        </div>
				      </li>
				    </ul>';
		  			
		  		}
		  	?>




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
 
