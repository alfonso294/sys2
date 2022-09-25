<?php

include ('connect.php');
include('header.php');


?>
<body>
<?php
			$zz = $_POST['id'];
			$fname = $_POST['firstname'];
		    $mname = $_POST['mid_name'];
			$lname = $_POST['lastname'];
			$student_no = $_POST['student_no'];
			$section = $_POST['section'];
			$year = $_POST['year'];
			$course = $_POST['Course'];
			$status=$_POST['Status'];

	  		include ('connect.php');
		
	 			$query = 'UPDATE students set firstname ="'.$fname.'",
					username ="'.$mname.'", lastname = "'.$lname.'",studentno = "'.$student_no.'", yrlevel="'.$year.'", 
					course="'.$course.'" ,status="'.$status.'"  WHERE
					id ="'.$zz.'"';
					$result = mysqli_query($con, $query) or die(mysqli_error($con));
							
?>	
	<script type="text/javascript">
			alert("Update Successful.");
			window.location = "admin.php";
		</script>
 </body>
</html>