<?php 
session_start();

// Include the database configuration file  
require 'connect.php';
require 'functions.php';

 if(isset($_SESSION['username'], $_SESSION['password'])) {

 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if (isset($_POST['upload'])) {

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;

    
    // Get all the submitted data from the form
    $sql = "UPDATE documents SET CareCard= '$filename' WHERE username = '".$_SESSION['username']."' AND password = '".$_SESSION['password']."'";

    // Execute query
    mysqli_query($con, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3> Image uploaded successfully!</h3>";
    } else {
        echo "<h3> Failed to upload image!</h3>";
    }
}
 
// Display status message 
echo $statusMsg; 
?>

 <a class="btn btn-secondary" href="profile.php" role="button">Go back</a>

<?php


  } else {
    header("location:index.php");
    exit;
  }

  unset($_SESSION['prompt']);
  mysqli_close($con);

?>

