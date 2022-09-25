<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';
  
  require 'header2.php';
  require 'footer.php';

  if(isset($_POST['login'])) {

    $uname = clean($_POST['username']);
    $pword = clean($_POST['password']);

    $query = "SELECT * FROM students WHERE username = '$uname' AND password = '$pword'";

    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_assoc($result);

      if($row["type"]=="user")
      {

      $_SESSION['userid'] = $row['id'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['password'] = $row['password'];
      header("location:profile.php");}

      elseif($row["type"]=="admin")
  {

    $_SESSION["username"]=$username;
    
    header("location:admin.php");
  }
   

    } else {

      $_SESSION['errprompt'] = "Wrong username or password.";

    }

  }

  if(!isset($_SESSION['username'], $_SESSION['password'])) {

?>

<!DOCTYPE html>
<html>
<head>


	<title>Login</title>

	
  <link href="main.css" rel="stylesheet">


    
</head>
<body>
   <div id="page-container">
   <div id="content-wrap">

  

  <section class="center-text">
    
    <strong></strong>

    <div class="login-form box-center">
      <?php 

        if(isset($_SESSION['prompt'])) {
          showPrompt();
        }

        if(isset($_SESSION['errprompt'])) {
          showError();
        }

      ?>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        
        <div class="form-group">
          <label for="username" class="sr-only">Username</label>
          <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
        </div>

        <div class="form-group">
          <label for="password" class="sr-only">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        
        <a href="register.php">Need an account?</a>
        <input class="btn btn-primary" type="submit" name="login" value="Log In">

        <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>



      </form>

    </div>
  


  </section>


	<script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>




</body>


</html>

<?php

  } else {
    header("location:profile.php");
    exit;
  }

  unset($_SESSION['prompt']);
  unset($_SESSION['errprompt']);

  mysqli_close($con);

?>