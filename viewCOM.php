<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';

  if(isset($_SESSION['username'], $_SESSION['password'])) {
    
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
  background-image: url("assets/img/bg4.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
  
    <title>View - COM</title>

  <link href="bootstrap.min.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">


    
    
</head>
<body>

   <?php
// Get image data from database 
$result = $con->query("SELECT COM FROM documents WHERE username = '".$_SESSION['username']."' AND password = '".$_SESSION['password']."'"); 
?>

<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?>  
            <img src="./image/<?php echo($row['COM']); ?>" /> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>

<a class="btn btn-secondary" href="profile.php" role="button">Go Back</a>


  
  <?php


  } else {
    header("location:index.php");
    exit;
  }

  unset($_SESSION['prompt']);
  mysqli_close($con);

?>


