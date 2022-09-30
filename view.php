<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';
  require 'header.php';
  require 'header2.php';
  

  
?>
<head>
  
   <link href="bootstrap.min.css" rel="stylesheet">
  <link href="main.css" rel="stylesheet">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</head>
<style>
</style>


<body>

  <section class="center-text"><br><br>
   <div class="registration-form box-center clearfix">
	
	

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
                $af=$row['password'];  
                $ae=$row['SignupOn'];    
                $ag=$row['province'];     
                
            } 
        } else {

          die("Error with the database");

        }

 $query1 = "SELECT * FROM documents WHERE username = '".$_GET['username']."'";


         if($result = mysqli_query($con, $query1)) {

          $row = mysqli_fetch_assoc($result);

            {

                $i= $row['username'];
                $c=$row['Student_ID'];
                $j=$row['COM'];
                $ac=$row['COG'];
                $ad=$row['CareCard'];
               
            }
        } else {

          die("Error with the database");

        }

  $query2 = "SELECT * FROM school WHERE username = '".$_GET['username']."'";


         if($result = mysqli_query($con, $query2)) {

          $row = mysqli_fetch_assoc($result);

            {

                $i= $row['username'];
                $c=$row['Student_ID'];
                $s=$row['School'];
                $t=$row['course'];
                $u=$row['yrlevel'];
                $v=$row['SAdd'];
            }
        } else {

          die("Error with the database");

        }

?>


            
                 <form role="form" method="post" action="index.php">


                      <fieldset class="a">
                        <legend>Account information</legend><br>

                            <div class="form-row">

                                <div class="form-group col-md-4">
                                <label for="username">Username</label>
                                <input class="form-control" placeholder="User Name" name="username" value="<?php echo $i; ?>" readonly>
                                </div>

                                <div class="form-group col-md-4">
                                <label for="password">Password</label>
                                <input class="form-control" placeholder="Password" name="password" value="<?php echo $af; ?>" readonly>
                                </div>

                                <div class="form-group col-md-4">
                                <label for="signup">Account Created on</label>
                                <input class="form-control" placeholder="signup" name="signup" value="<?php echo $ae; ?>" readonly>
                                </div>                              
                            </div>
                      </fieldset>

                      <fieldset>
                            <legend>Personal Information</legend>

                            <div class="form-row">
                               <div class="form-group col-md-4">
                              <label for="firstname">First Name</label>
                              <input class="form-control" placeholder="First Name" name="firstname" value="<?php echo $a; ?>" readonly>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="middlename">Middle Name</label>
                              <input class="form-control" placeholder="Middle Name" name="middlename" value="<?php echo $d?>" readonly>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="lastname">Last Name</label>
                              <input class="form-control" placeholder="Last Name" name="lastname" value="<?php echo $b?>" readonly>
                            </div>
                           </div>

                           <div class="form-row">
                              <div class="form-group col-md-6">
                              <label for="birthday">Birthday</label>
                              <input class="form-control" placeholder="Birthday" name="birthday" value="<?php echo $l?>" readonly>
                            </div>

                            <div class="form-group col-md-6">
                              <label for="email">E-mail</label>
                              <input class="form-control" placeholder="E-mail" name="email" value="<?php echo $m?>" readonly>
                            </div>
                           </div>


                             <div class="form-row">
                              <div class="form-group col-md-6">
                              <label for="birthday">Gender</label>
                              <input class="form-control" placeholder="Birthday" name="birthday" value="<?php echo $n?>" readonly>
                            </div>

                            <div class="form-group col-md-6">
                              <label for="email">Cellphone number</label>
                              <input class="form-control" placeholder="E-mail" name="email" value="<?php echo $o?>" readonly>
                            </div>
                           </div>

                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label for="address">Address</label>
                              <input class="form-control" placeholder="address" name="address" value="<?php echo $k?>" readonly>
                            </div>
                          </div>

                            <div class="form-row">
                              <div class="form-group col-md-4">
                              <label for="birthday">Province/State</label>
                              <input class="form-control" placeholder="Birthday" name="birthday" value="<?php echo $ag?>" readonly>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="email">City/Municipality</label>
                              <input class="form-control" placeholder="E-mail" name="email" value="<?php echo $p?>" readonly>
                            </div>
                          

                            <div class="form-group col-md-4">
                              <label for="email">Barangay</label>
                              <input class="form-control" placeholder="E-mail" name="email" value="<?php echo $q?>" readonly>
                            </div>
                           </div>

                           <div class="form-row">
                             
                               <div class="form-group col-md-3">
                              <label for="email">Zip</label>
                              <input class="form-control" placeholder="E-mail" name="email" value="<?php echo $r?>" readonly>
                            </div>
                           </div>

                         </fieldset>

                         <fieldset>
                           <legend>School Information</legend>


                           <div class="form-row">
                             <div class="form-group col-md-6">
                               <label for="school">School</label>
                               <input name="school" placeholder="school" class="form-control" value="<?php echo $s?>" readonly>
                             </div>
                           

                              <div class="form-group col-md-6">
                                <label for="course">Course</label>
                                <input name="course" placeholder="course" class="form-control" value="<?php echo $t?>" readonly>
                              </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="yrlvl">Year Level/Grade</label>
                                <input name="yrlvl" placeholder="Year Level/Grade" class="form-control" value="<?php echo $u?>" readonly>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="studentno">Student Number</label>
                                <input name="studentno" placeholder="Student Number" class="form-control" value="<?php echo $c ?>" readonly>
                              </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="SchoolAddress">Schoo Address</label>
                                <input name="SchoolAddress" placeholder="School Address" class="form-control" value="<?php echo $v?>"readonly>
                              </div>
                            </div>

                         </fieldset>
                       </form>

                         <fieldset>
                           <legend>Documents</legend>

                         
                      
                         <table class="table table-dark">
                              <thead>
                                <tr class="table-info">
                                  <th style="text-align: center;">COM</th>
                                  <th style="text-align: center;">COG</th>
                                  <th style="text-align: center;">Care Card</th>

                                </tr>
                              </thead>
                            

                            <tr>
                              
                                <td style="text-align: center;"><img src="user/<?php echo $_GET['username']?>/<?php echo $j; ?>" alt="Image" class="img-thumbnail"style="width: 100px; height: 100px;" readonly></td>

                                <td style="text-align: center;"><img src="user/<?php echo $_GET['username']?>/<?php echo $ac; ?>" alt="Image" class="img-thumbnail" style="width: 100px; height: 100px;"></td>
                                <td style="text-align: center;"><img src="user/<?php echo $_GET['username']?>/<?php echo $ad; ?>" alt="Image" class="img-thumbnail" style="width: 100px; height: 100px;"></td>

                           </tr>
                         </table>

                         <a href="admin.php">Go back</a>


                          </fieldset>

            