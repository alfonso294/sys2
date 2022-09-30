<?php 
session_start();

// Include the database configuration file  
require 'connect.php';
require 'functions.php';
require 'header.php';
require 'header2.php';

?>



<!DOCTYPE html>
<html>
<head>
    <style>
        h3 {
  text-align: center;
}

a {
    text-align:center;
    
}


    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    </title>
     <link href="main.css" rel="stylesheet">
</head>
<body>

<br><br><br>
 <div class="login-form box-center clearfix">

<?php

 if(isset($_SESSION['username'], $_SESSION['password'])) {

 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if (isset($_POST['upload'])) {

     
if(!is_dir("user/". $_SESSION["username"] ."/")) {
    mkdir("user/". $_SESSION["username"] ."/");
}


    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $newfilename = 'COG-'.date('m-d-Y-h-i-sa');
    $rename = $newfilename.'jpeg';
    $folder = "user/". $_SESSION["username"] ."/". $rename;
    


    

    

    // Get all the submitted data from the form
    $sql = "UPDATE documents SET COG= '$rename' WHERE username = '".$_SESSION['username']."' AND password = '".$_SESSION['password']."'";

    // Execute query
    mysqli_query($con, $sql);

    // Now let's move the uploaded user into the folder: user
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3> COG uploaded successfully!</h3>";
    } else {
        echo "<h3> Failed to upload user!</h3>";
    }
}
 
// Display status message 
echo $statusMsg; 
?>
 <center><a class="btn btn-secondary" href="profile.php" role="button">Go back</a></center>


 </div>


</body>
</html>

<?php


  } else {
    header("location:index.php");
    exit;
  }

  unset($_SESSION['prompt']);
  mysqli_close($con);

?>
