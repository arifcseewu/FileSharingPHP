<?php 
	session_start();
	include_once 'dbconnect.php';
	$u = $_SESSION["usr_name"];
	$c = $_GET["comm"];
	$f = $_GET["fn"];

	$sql = "INSERT INTO comment(f_name,comnt,cmnter) VALUES('" . $f . "', '" . $c . "', '" . $u . "');";
	mysql_query($sql);

	header("Location: source.php?file=$f");

?> 
