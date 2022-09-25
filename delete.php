
<?php
       
       include('connect.php');
       include('header.php');

      
       
        ?>  

<body>
<?php

	
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM students WHERE username='" . $_GET["username"] . "'";

$sql1 = "DELETE FROM school WHERE username='" . $_GET["username"] . "'";
$sql2 = "DELETE FROM documents WHERE username='" . $_GET["username"] . "'";
if ($con->query($sql))
if ($con->query($sql1))
	if ($con->query($sql2))





?>

<script type="text/javascript">
        alert("Successfully Deleted.");
        window.location = "admin.php";
      </script> 
</body>
</html>

