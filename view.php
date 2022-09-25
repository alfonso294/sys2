<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';
  require 'header2.php';
  require 'header.php';

  
?>
<head>
  
   <link href="main.css" rel="stylesheet">
</head>


<body>
	
	

<?php 
$sql = "SELECT * FROM students WHERE username='" . $_GET["username"] . "'";



        if($result = mysqli_query($con, $sql)) {

          $row = mysqli_fetch_assoc($result);

            {
                $a=$row['firstname'];
                $b=$row['lastname'];
                $d=$row['middlename'];
                $h=$row['status'];
                $i= $row['username'];
                $k=$row['address'];
                $l=$row['birthday'];
                $m=$row['email'];
                $n=$row['gender'];
                $o=$row['cellphonenum'];  
                $p=$row['city'];
                $q=$row['barangay'];
                $r=$row['zip'];
                $x=$row['MotherName'];
                $y=$row['FatherName'];
                $z=$row['MotherEduc'];
                $aa=$row['FatherEduc'];   
                $ab=$row['marital'];            
                
            } 
        } else {

          die("Error with the database");

        }
?>

             <div class="registration-form box-center clearfix">
                 
                      <div class="col-lg-6">

                        <form role="form" method="post" action="index.php">
                            
                            <b>First Name</b>
                            <div class="form-group">
                              <input class="form-control" placeholder="First Name" name="firstname" value="<?php echo $a; ?>" readonly>
                            </div>

                            <b>First Name</b>
                            <div class="form-group">
                              <input class="form-control" placeholder="First Name" name="firstname" value="<?php echo $b; ?>" readonly>
                            </div>  

                            <b>Middle Name</b>
                            <div class="form-group">
                              <input class="form-control" placeholder="Middle Name" name="middlename" value="<?php echo $c; ?>" readonly>
                            </div> 
                            <b>Last name</b>
                            <div class="form-group">
                              <input class="form-control" placeholder="Last Name" name="lastname" value="<?php echo $b; ?>" readonly>
                            </div> 
                            <b>Student Number</b>
                            <div class="form-group">
                              <input class="form-control" placeholder="Student Number" name="student_number" value="<?php echo $a; ?>" readonly>
                            </div> 
                            <b>Section</b>
                            <div class="form-group">
                              <input class="form-control" placeholder="Section" name="section" value="<?php echo $d; ?>" readonly>
                            </div> 
                            <b>Year</b>
                            <div class="form-group">
                              <input class="form-control" placeholder="Year" name="year" value="<?php echo $e; ?>" readonly>
                            </div> 
                            <b>Course</b>
                            <div class="form-group">
                             <input class="form-control" placeholder="Course" name="Course" value="<?php echo $f; ?>" readonly>
                            </div> 
                            <b>Token</b>
                            <div class="form-group">
                             <input class="form-control" placeholder="Course" name="Course" value="<?php echo $g; ?>" readonly>
                            </div> 
                             <b>Password</b>
                            <div class="form-group">
                             <input class="form-control" placeholder="Course" name="Course" value="<?php echo $h; ?>" readonly>
                            </div>

                          </div> 
                  </form>  



                     <div class="col-lg-6">

                                <fieldset>
                                <legend>document</legend>

                                
                            <table width="50%" border="1" cellpadding="5" cellspacing="5">
                              <thead>
                                <tr>
                                  <th>COM</th>
                                  <th>COG</th>

                                </tr>
                              </thead>
                            

                            <tr>
                                <td><img src="./image/<?php echo $j; ?>" alt="Image" style="width: 50px; height: 50px;"></td>


                            

                             
                               
                                <td><?php echo '<img src="data:image;base64,'.base64_encode($j).'" alt = "Image" style="width: 50px; height: 50px;" >'; ?></td>

                           </tr>
                         </table>

                           

                         <a class="btn btn-secondary" href="admin.php" role="button">Go back</a>
                          </fieldset>
                        </div>

                    
                </div>
                
            </div>


            