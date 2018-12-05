<?php
	session_start();
	include_once 'dbconnect.php';
	$f = $_GET["del"];
	echo $f;
	$sql = "DELETE FROM upload WHERE f_name ='$f';";
	mysql_query($sql);
	$d = "uploads/".$f;
	unlink($d);
	header("Location: profile.php");
?> 
