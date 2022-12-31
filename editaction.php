<?php

include ('connect.php');
include('header.php');


?>
<body>
<?php
			$uname = $_POST['username'];
			$comment = $_POST['comment'];
			$h= $_POST['status'];

	  		include ('connect.php');
		
	 			$query = 'UPDATE students set  status="'.$h.'", comment="'.$comment.'"  WHERE
					username ="'.$uname.'"';
					$result = mysqli_query($con, $query) or die(mysqli_error($con));

				
							
?>	

<?php
			$uname = $_POST['username'];
			$comment = $_POST['comment'];
			$h= $_POST['status'];

	  		include ('connect.php');
		
	 			
				$query1 = 'UPDATE school set  status="'.$h.'" WHERE
					username ="'.$uname.'"';
					$result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
							
?>



	<script type="text/javascript">
			alert("Update Successful.");
			window.location = "index2.php";
		</script>
 </body>
</html>