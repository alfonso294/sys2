<?php 

require_once "controllerUserData.php"; 
 
require_once "header2.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="main.css">
  
    
</head>
<body><br><br>
    <div class="registration-form box-center clearfix">
            <form action="forgot-password.php" method="POST" autocomplete="">
                <div class="form-row">
                    <div class="form-group col-md-12">
                    <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>
                    <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group col-md-12">
                    <input class="form-control button" type="submit" name="check-email" value="Continue">
                    </div>
                </div>
                     <div> <a class="btn btn-secondary" href="index.php" role="button">Go Back</a></div>
                </form>
    </div>
        
    

    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
    
</body>
</html>