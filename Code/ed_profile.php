<?php
	session_start();
	include_once 'dbconnect.php';
	$u = $_SESSION['usr_name'];



	$fname = mysql_real_escape_string($_POST['fname']);
	$email = mysql_real_escape_string($_POST['email']);
    $password = mysql_real_escape_string($_POST['pass']);
    $cpassword = mysql_real_escape_string($_POST['cpass']);
    $loc = mysql_real_escape_string($_POST['loc']);
	$about = mysql_real_escape_string($_POST['about']);
    
    $seed = substr($u, 0, 2);
    $enc_pass = crypt($password, $seed);


	$sql1 = "select fullname from profile where username='$u';";
	$sql2 = "select location from profile where username='$u';";
	$sql3 = "select about from profile where username='$u';";
	$sql4 = "select picname from users where username='$u';";


	$r1 = mysql_query($sql1);
	$r2 = mysql_query($sql2);
	$r3 = mysql_query($sql3);
	$r4 = mysql_query($sql4);
    
	
	if(!empty($fname)){
		if(mysql_num_rows($r1)==0){
			$sql5 = "INSERT INTO profile(fullname) VALUES('" . $fname . "') where username='$u';";
			mysql_query($sql5);
		}
		else{
			$sql5 = "UPDATE profile SET fullname='$fname' WHERE username='$u';";
			mysql_query($sql5);
		}
	}

	if(!empty($email)){
		$sql6 = "UPDATE users SET email='$email' WHERE username='$u';";
		mysql_query($sql6);
	}

	if(strlen($password) > 5 && $password == $cpassword) {
		$sql7 = "UPDATE users SET password='$enc_pass' WHERE username='$u';";
		mysql_query($sql7);
	}

	if(!empty($loc)){
		if(mysql_num_rows($r2)==0){
			$sql8 = "INSERT INTO profile(location) VALUES('" . $loc . "') where username='$u';";
			mysql_query($sql8);
		}
		else{
			$sql8 = "UPDATE profile SET location='$loc' WHERE username='$u';";
			mysql_query($sql8);
		}
	}

	if(!empty($about)){
		if(mysql_num_rows($r3)==0){
			$sql9 = "INSERT INTO profile(about) VALUES('" . $about . "') where username='$u';";
			mysql_query($sql9);
		}
		else{
			$sql9 = "UPDATE profile SET about='$about' WHERE username='$u';";
			mysql_query($sql9);
		}
	}


	header("Location: profile_form.php");
?> 
