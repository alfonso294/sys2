<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';
  


  if(isset($_SESSION['username'])){ 
    

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
  
	<title>Profile</title>

  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="main.css" rel="stylesheet">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</head>
<body>

 <section class="center-text"><br><br>
    
    <div class="registration-form box-center clearfix">

      <?php

        if(isset($_SESSION['prompt'])) {
          showPrompt();
        }
        

        $query = "SELECT * FROM students WHERE username = '".$_SESSION['username']."'";


        if($result = mysqli_query($con, $query)) {

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

 $query1 = "SELECT * FROM documents WHERE username = '".$_SESSION['username']."'";


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

 $query2 = "SELECT * FROM school WHERE username = '".$_SESSION['username']."'";


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

                          <fieldset>
                            <legend>Personal Information</legend>
                            
                          <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="firstname">First Name</label>
                              <input class="form-control" placeholder="First Name" name="firstname" value="<?php echo $a; ?>" readonly>
                            </div>

                             <div class="form-group col-md-4">
                              <label for="firstname">Middle Name</label>
                              <input class="form-control" placeholder="Middle Name" name="middlename" value="<?php echo $d; ?>" readonly>
                            </div>

                             <div class="form-group col-md-4">
                              <label for="firstname">Last Name</label>
                              <input class="form-control" placeholder="Last Name" name="lastname" value="<?php echo $b; ?>" readonly>
                            </div>
                          </div>



                        <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="birthday">Birthday</label>
                                <input class="form-control" type="date" name="birthday" placeholder="Birthday" value="<?php echo $l;?>" readonly >
                              </div>

                               <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $m; ?>" readonly>
                              </div>

                        </div>


                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="gender">Gender</label>
                            <input class="form-control" type="text" name="gender" placeholder="Gender" value="<?php echo $n?>" readonly> 
                          </div>

                          <div class="form-group col-md-6">
                          <label for="cpnum">Cellphone Number</label>
                         <input type="text" class="form-control" name="cpnum" placeholder="Cellphone Number- No Entry" value="<?php echo $o;?>" readonly>
                          </div>
                        </div>
                       


                          <div class="form-group col-md-12">
                           <label for="address">Address</label>
                           <input class="form-control" name="address" placeholder="1234 Main Street" value="<?php echo $k; ?>"  readonly>
                           </div>

                      <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="city">City</label>
                            <input class="form-control" type="text" name="city" placeholder="city - no entry" value="<?php echo $p;?>" readonly>
                          </div>

                          <div class="form-group col-md-4">
                            <label for="barangay">Barangay</label>
                            <input class="form-control" type="text" name="barangay" placeholder="barangay" value="<?php echo $q;?>" readonly>
                          </div>

                          <div class="form-group col-md-2">
                            <label for="zip">Zip</label>
                            <input class="form-control" type="text" name="zip" placeholder="zip" value="<?php echo $r;?>" readonly>
                          </div>


                      </div>

                    </fieldset>

                    <fieldset>
                      <legend>School Information</legend>

                          <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="School">School Name</label>       
                                <input type="text" name="school" class="form-control" placeholder="School Name" value="<?php echo $s;?>" readonly>
                              </div>

                              <div class="form-group col-md-6">
                                 <label for="course">Course or Grade level</label>
                                <input type="text" name="course" class="form-control" placeholder="course" value="<?php echo $t;?>" readonly>
                              </div>

                          </div>  

                          <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="yrlevel">Year level</label>
                                <input type="text" name="yrlevel" class="form-control" placeholder="Year Level" value="<?php echo $u;?>" readonly>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="Student_ID">Student ID</label>
                                <input type="text" name="Student_ID" class="form-control" placeholder="Student Number" value="<?php echo $c;?>" readonly>
                              </div>
                          </div>

                          <div class="form-group col-md-12">
                            <label for="SAdd">School Address</label>
                            <input type="text" name="SAdd" class="form-control" value="<?php echo $v;?>" readonly>

                          </div>

                     </fieldset>

                      <fieldset>
                        
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="MoName">Mother Maiden Name</label>
                            <input type="text" name="MoName" class="form-control" placeholder="Mother Maiden Name"value="<?php echo $x;?>" readonly>
                          </div>

                            <div class="form-group col-md-6">
                            <label for="FaName">Father Name</label>
                            <input type="text" name="FaName" class="form-control" placeholder="Father Name"value="<?php echo $y;?>" readonly>
                          </div>

                          </div>
                       

                          <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="MoEduc">Mother Educational Attainment</label>
                            <input type="text" name="MoEduc" class="form-control" placeholder="Mother Educational Attainment"value="<?php echo $z;?>" readonly>
                          </div>  

                            <div class="form-group col-md-6">
                            <label for="FaEduc">Father Educational Attainment</label>
                            <input type="text" name="FaEduc" class="form-control" placeholder="Father Educational Attainment"value="<?php echo $aa;?>" readonly>
                            </div>
                          </div>

                             <div class="form-group col-md-12">
                            <label for="RaMarital">Marital Status</label>
                            <input type="text" name="RaMarital" class="form-control" value="<?php echo $ab;?>" readonly>
                            </div>


                              <div class="form-group col-md-12">
                                <label for="status">Status</label>
                             <input class="form-control" placeholder="status" name="status" value="<?php echo $h; ?>" readonly>
                            </div> 

                             <div class="form-outline col-md-12">
                                <label for="comment">Evaluators Comment</label>
                             <textarea class="form-control" placeholder="comment" name="comment" row="12" value="<?php echo $h; ?>" readonly></textarea>
                            </div> 

                      </fieldset>
                          </form>  
                 
                 
                   
                  <fieldset>
                        <legend>Documents</legend>

                          
                           <form action="uploadCOM.php" method="post" enctype="multipart/form-data">
                            <div class="form-row">  
                            <div class="form-group col-md-12">
                            <label for="uploadCOM"> Upload COM</label>
                            <input class="form-control" type="file" name="uploadfile" value="" />
                            </div>
                            </div>
                            <div class="form-group col-md-6">
                            <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
                          </div>
                          </form>


                           <form action="uploadCOG.php" method="post" enctype="multipart/form-data">
                            <div class="form-row">  
                            <div class="form-group col-md-12">
                            <label for="uploadCOG"> Upload COG</label>
                            <input class="form-control" type="file" name="uploadfile" value="" />
                            </div>
                            </div>
                            <div class="form-group col-md-3">
                            <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
                          </div>
                          </form>

                           <form action="uploadCC.php" method="post" enctype="multipart/form-data">
                            <div class="form-row">  
                            <div class="form-group col-md-12">
                            <label for="uploadCC"> Upload Muntinlupa Care Card</label>
                            <input class="form-control" type="file" name="uploadfile" value="" />
                            </div>
                            </div>
                            <div class="form-group col-md-3">
                            <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
                          </div>
                          </form>
                     </fieldset>

                    
                      <fieldset>
                      
                         <table class="table table-dark">
                              <thead>
                                <tr class="table-info">
                                  <th style="text-align: center;">COM</th>
                                  <th style="text-align: center;">COG</th>
                                  <th style="text-align: center;">Care Card</th>

                                </tr>
                              </thead>
                            

                            <tr>
                              
                                <td style="text-align: center;"><img src="user/<?php echo $_SESSION['username']?>/<?php echo $j; ?>" alt="Image" class="img-thumbnail"style="width: 100px; height: 100px;" readonly></td>

                                <td style="text-align: center;"><img src="user/<?php echo $_SESSION['username']?>/<?php echo $ac; ?>" alt="Image" class="img-thumbnail" style="width: 100px; height: 100px;"></td>
                                <td style="text-align: center;"><img src="user/<?php echo $_SESSION['username']?>/<?php echo $ad; ?>" alt="Image" class="img-thumbnail" style="width: 100px; height: 100px;"></td>

                           </tr>
                         </table>


                          <table class="table table-dark">
                              <thead>
                                <tr class="table-info">
                                  <th style="text-align: center;">COM</th>
                                  <th style="text-align: center;">COG</th>
                                  <th style="text-align: center;">Care Card</th>

                                </tr>
                              </thead>
                            

                            <tr>
                              

                              
                              
                                <td style="text-align: center;"><img src="user/<?php echo $_SESSION['username']?>/<?php echo $j; ?>" alt="Image" class="img-thumbnail"style="width: 100px; height: 100px;"></td>

                                <td style="text-align: center;"><img src="user/<?php echo $_SESSION['username']?>/<?php echo $ac; ?>" alt="Image" class="img-thumbnail" style="width: 100px; height: 100px;"></td>

                                <td style="text-align: center;"><img src="user/<?php echo $_SESSION['username']?>/<?php echo $ad; ?>" alt="Image" class="img-thumbnail" style="width: 100px; height: 100px;"></td>

                           </tr>
                         </table>
                                    

                                   
                                    

                    </fieldset>


  <div class="options">
  <a class="btn btn-secondary" href="logout.php" role="button">Logout</a>
  <a class="btn btn-primary" href="404.html" alt="404.html"role="button">Edit for renewal</a>
  </div>
                   
   </div>

        
      
    



     


  </section>




	<script src="jquery-3.1.1.min.js"></script>
  <script src="bootstrap.min.js"></script>
	<script src="main.js"></script>
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