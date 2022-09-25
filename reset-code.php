<?php require_once "controllerUserData.php"; require_once "header.php"; require_once "header2.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: index.php');
}
?>
<!DOCTYPE html>


<link rel="stylesheet" type="text/css" href="main.css">

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="main.css">
  
</head>
<body>
    <div class="registration-form box-center clearfix">
         <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
        <form action="reset-code.php" method="POST" autocomplete="off">
             <div class="form-row">
                    <div class="form-group col-md-12">
                    <h2 class="text-center">Code Verification</h2>
                    <input class="form-control" type="number" name="otp" placeholder="Enter code" required>
                    </div>
                     <div class="form-group col-md-12">
                    <input class="form-control button" type="submit" name="check-reset-otp" value="Submit">
                    </div>
                </div>
        </form>
    </div>
            
        
    


     
    
</body>
</html>