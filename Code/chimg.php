<?php
	session_start();
	include_once 'dbconnect.php';
	$u = $_SESSION['usr_name'];

	$target_dir = "uploads/";
	
	$uploadOk = 1;

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    $tmp_name = $_FILES["fileToUpload"]["tmp_name"];

    $ext = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);


    $n = $u . "." . $ext;
 
    $new_name = "uploads/".$u.".".$ext;
    
    


    $sql = "UPDATE profile SET picname ='$n' where username='$u';";
    	   
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
       move_uploaded_file($tmp_name,$new_name);
       mysql_query($sql);

    } 


    header("Location: profile_form.php");

?> 
