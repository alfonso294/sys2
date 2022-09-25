<?php

include ('connect.php');
include('header.php');
include('header2.php');

?>

<title></title>
<style>
  

</style>

<div class="container-fluid">
				
				<div class="row">
					<div class="col-lg-12">
						
					</div>
				</div>

				<div id="page-wrapper">

            <div class="container-fluid">

                
<?php 
$query = "SELECT c. * , p.* FROM students c, school p WHERE c.Student_ID = p.Student_ID";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
              while($row = mysqli_fetch_array($result))
              {   
                $zz= $row['id'];
                $i= $row['firstname'];
                
                $b=$row['lastname'];
                $c=$row['Student_ID'];
                
                $e=$row['yrlevel'];
                $f=$row['course'];
                $g=$row['status'];
                $h=$row['School'];
                $j=$row['COM'];
                $k=$row['birthday'];
               
              }

                
               
      
              
              //$username = $_GET['username'];

                
                
?>

             <div class="col-lg-12">
                  <h2>Edit Records</h2>
                </div>
                      <div>

                        <form class="row g-3" role="form" method="post" action="editaction.php">
                            
                            
                            <div class="col-md-6">
                              <B><label for="FNAME" class="form-label">First Name</label></B>
                              <input class="form-control" placeholder="First Name" id="FNAME" name="firstname" value="<?php echo $i; ?>">
                            </div>
                            <div class="col-md-6">
                              <B><label for="MNAME" class="form-label">Middle Name</label></B>
                              <input class="form-control" placeholder="Middle Name" id="MNAME" name="mid_name" value="<?php echo $a; ?>">
                            </div> 
                            <div class="col-md-6">
                              <b><label for="LNAME" class="form-label">Last Name</label></b>
                              <input class="form-control" placeholder="Last Name" id="LNAME" name="lastname" value="<?php echo $b; ?>">
                            </div> 
                            <div class="col-md-6">
                              <b><label for="SNUM" class="form-label">Student Number</label></b>
                              <input class="form-control" placeholder="Student Number" id="SNUM" name="student_no" value="<?php echo $c; ?>">
                            </div> 
                            <div class="col-md-6">
                               <b><label for="SEC" class="form-label">Section</label></b>
                              <input class="form-control" placeholder="Section" id="SEC" name="section" value="<?php echo $d; ?>">
                            </div> 
                            <div class="col-md-6">
                               <b><label for="YEAR" class="form-label">Year</label></b>
                              <input class="form-control" placeholder="Year" id="YEAR" name="year" value="<?php echo $e; ?>">
                            </div>  
                             <div class="col-md-6">
                               <b><label for="COURSE" class="form-label">Course</label></b>
                              <input class="form-control" placeholder="Course" id="COURSE" name="Course" value="<?php echo $f; ?>">
                            </div>  

                             <div class="col-md-6">
                               <b><label for="TOK" class="form-label">Status</label></b>
                              <select class="form-control" placeholder="status" id="STATUS" name="Status" value="<?php echo $g; ?>">
                           
                                
                                 <option value="Not Evaluated">Not Evaluated</option>
                                  <option value="Evalauted - Accepted">Evalauted - Accepted</option>
                                  <option value="Evalauted - Not Accepted">Evalauted - Not Accepted</option> 
                                </select>
                              
                            </div>

                           
                            
                           

                              <div class="col-md-6">
                                <input type="hidden" name="id" value="<?php echo $zz; ?>" />
                            </div>
  
  
                            <div class="col-12"><br>
                            <button type="submit" class="btn btn-success">Update Record</button>
                          </div>
                           <div class="col-12"><br>
                          <a class="btn btn-secondary" href="admin.php" role="button">Go back</a>
                        </div>
                      </form>  




                     
                    </div>
                </div>
                
            </div>


            

        </div>

<script>

      function Token() {
            //define a variable consisting alphabets in small and capital letter
  var characters = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            
            //specify the length for the new string
  var lenString = 30;
  var randomstring = '';

            //loop to select a new character in each iteration
  for (var i=0; i<lenString; i++) {
    var rnum = Math.floor(Math.random() * characters.length);
    randomstring += characters.substring(rnum, rnum+1);
  }

             //display the generated string 
  document.getElementById("randomfield").innerHTML = randomstring;
}
</script>

<script>
   function pass() {
            //define a variable consisting alphabets in small and capital letter
  var characters = "1234567890";
            
            //specify the length for the new string
  var lenString = 16;
  var randomstring = '';

            //loop to select a new character in each iteration
  for (var i=0; i<lenString; i++) {
    var rnum = Math.floor(Math.random() * characters.length);
    randomstring += characters.substring(rnum, rnum+1);
  }

             //display the generated string 
  document.getElementById("randomfields").innerHTML = randomstring;
}

</script>

<script>
   function APPID() {
            //define a variable consisting alphabets in small and capital letter
  var characters = "1234567890";
            
            //specify the length for the new string
  var lenString = 10;
  var randomstring = '';

            //loop to select a new character in each iteration
  for (var i=0; i<lenString; i++) {
    var rnum = Math.floor(Math.random() * characters.length);
    randomstring += characters.substring(rnum, rnum+1);
  }

             //display the generated string 
  document.getElementById("randomfields1").innerHTML = randomstring;
}

</script>

<script>
   function Secret() {
            //define a variable consisting alphabets in small and capital letter
  var characters = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            
            //specify the length for the new string
  var lenString = 50;
  var randomstring = '';

            //loop to select a new character in each iteration
  for (var i=0; i<lenString; i++) {
    var rnum = Math.floor(Math.random() * characters.length);
    randomstring += characters.substring(rnum, rnum+1);
  }

             //display the generated string 
  document.getElementById("randomfields2").innerHTML = randomstring;
}

</script>

<script>
  
  function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}


</script>



 <!--
<div>
<form name="randomform">
<br>
<input type="button" value="Generate Token" onClick="Token();">
<b><p id="randomfield" style="color: green"> </p></b>

<input type="button" value="Generate Password" onClick="pass();">
<b><p id="randomfields" style="color: blue"> </p></b>

<input type="button" value="Generate App ID" onClick="APPID();">
<b><p id="randomfields1" style="color: red"> </p></b>

<input type="button" value="Generate Client Secret" onClick="Secret();">
<b><p id="randomfields2" style="color: black"> </p></b>
</form>

</div>
 </div-->
 
