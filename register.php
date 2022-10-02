<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';
  


  if(isset($_POST['register'])) {

    $data = $_POST;

    $uname = clean($_POST['username']); 
    $pword = clean($_POST['password']); 
    $studno = clean($_POST['Student_ID']); 
    $fname = clean($_POST['firstname']);
    $mname = clean($_POST['middlename']); 
    $lname = clean($_POST['lastname']); 
    $course = clean($_POST['course']); 
    $yrlevel = clean($_POST['yrlevel']); 
    $school = clean($_POST['school']); 
    $email = clean($_POST['email']); 
    $birthday = clean($_POST['birthday']);
    $Add = clean($_POST['address']);
    $SAdd = clean($_POST['Saddress']);
    $barangay = clean($_POST['barangay']);
    $zip = clean($_POST['zip']);
    $city = clean($_POST['city']);
    $marital =clean($_POST['RaMarital']);
    $gender =clean($_POST['gender']);
    $cnum = clean($_POST['cpnum']);
    $MoName = clean($_POST['MoName']);
    $FaName = clean($_POST['FaName']);
    $MoEduc = clean($_POST['MoEduc']);
    $FaEduc = clean($_POST['FaEduc']);
    $province =clean($_POST['province']);
    

    $query = "SELECT username FROM students WHERE username = '$uname'";
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) == 0) {

        $query = "SELECT email FROM students WHERE email = '$email'";
        $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) == 0) {

      $query = "SELECT Student_ID FROM students WHERE Student_ID = '$studno'";
      $result = mysqli_query($con,$query);


      


    if(mysqli_num_rows($result) == 0) {

        $query = "INSERT INTO students (username, password, Student_ID, firstname, lastname, email, birthday,address, barangay, zip, city, middlename, marital, gender, cellphonenum, MotherName, FatherName, MotherEduc, FatherEduc, province, SignupOn)
        VALUES ('$uname', '$pword', '$studno', '$fname', '$lname', '$email', '$birthday', '$Add', '$barangay', '$zip', '$city', '$mname', '$marital', '$gender','$cnum','$MoName','$FaName','$MoEduc','$FaEduc','$province', NOW())";

        $que = "INSERT INTO documents (Student_ID, username, password, email) VALUES ('$studno','$uname','$pword','$email')";
          
          $quer = "INSERT INTO school (Student_ID, School, F_Name, L_Name, course, yrlevel, SAdd, username, password, email) VALUES ('$studno','$school','$fname','$lname','$course','$yrlevel','$SAdd','$uname','$pword', '$email')";
          if(mysqli_query($con,$quer))
          if(mysqli_query($con, $que))
        

          if(mysqli_query($con, $query)) {

          $_SESSION['prompt'] = "Account registered. You can now log in.";
          header("location:index.php");
          exit;

        } else {

          die("Error with the query");

        }

      } else {

        $_SESSION['errprompt'] = "That student number already exists.";

      }

    }   else {

        $_SESSION['errprompt'] = "That email already exists.";

      } 
    }
      else {

      $_SESSION['errprompt'] = "Username already exists.";

    }

  } 



?>

<!DOCTYPE html>
<html>
<head>
<style>
input,
input:valid {
    border-color: green;
}

input:invalid {
    border-color: red;
}



</style>
  

	<title>Register</title>

	<link href="bootstrap.min.css" rel="stylesheet">
  <link href="main.css" rel="stylesheet">
  

  

  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</head>
<body>

  

  <section class="center-text">
    
   

    <div class="registration-form box-center clearfix">

   

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="form">


        <div class="form-group">
          <text style="color:red">*Required field</text></label>
        </div>

   <fieldset> 
      <legend>Personal Information</legend>  
        
        <div class="form-row">
                <div class="form-group col-md-6">
                <label for="username">Username<text style="color:red">&nbsp; *</text></label>
                
                <input type="text" name="username" class="form-control" id="Username"  placeholder="Username (must be unique)" pattern="[A-Za0-z9]{1,}" title="Username should only contain numbers, lowercase and uppercase letters." required>
                </div>

                <div class="form-group col-md-6">
                <label for="password">Password<text style="color:red">&nbsp; *</text></label>
                <input type="text" class="form-control" name="password" id="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><span class="text-muted" style="font-size: 12px;">Username should only contain numbers, </span>
                </div>


                
        </div>

                
        <br><div class="form-row"><br><br>
                <div class="form-group col-md-4">
                <label for="firstname" style="font-size: 15px;">First Name<i class="text-muted" style="font-size: 11px;">(Pangalan)</i><text style="color:red">&nbsp; *</text></label>
                <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                </div>

                <div class="form-group col-md-4">
                <label for="middlename" style="font-size: 15px;">Middle Name<i class="text-muted" style="font-size: 11px;">(Gitnang Pangalan)</i><text style="color:red">&nbsp; *</text></label>
                <input type="text" class="form-control" name="middlename" placeholder="Middle Name" required>
                </div>

                <div class="form-group col-md-4">
                <label for="lastname" style="font-size: 15px;">Last Name<i class="text-muted" style="font-size: 11px;">(Apelyido)</i><text style="color:red">&nbsp; *</text></label>
                <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                </div>
        </div>

        <div class="form-row">
                <div class="form-group col-md-6">
                <label for="birthday" style="font-size: 15px;">Birthday<i class="text-muted" style="font-size: 11px;">(Kaarawan)</i><text style="color:red">&nbsp; *</text></label>
                <input type="date" class="form-control" name="birthday" placeholder="Birthday" required>
                </div>

                <div class="form-group col-md-6">
                <label for="email" style="font-size: 15px;">Email<i class="text-muted" style="font-size: 11px;">(Sulatroniko)</i><text style="color:red">&nbsp; *</text></label>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>

        </div>        

         <div class="form-row">
                <div class="form-group col-md-6">
                <label class="gender" style="font-size: 15px;">Gender<i class="text-muted" style="font-size: 11px;">(Kasarian)</i><text style="color:red">&nbsp; *</text></label><br>
                <input name="gender" type="radio" value="male" checked>Male &nbsp; &nbsp;
                <input name="gender" type="radio" value="female">Female
                </div>

                <div class="form-group col-md-6">
                <label for="cpnum" style="font-size: 15px;">Cellphone Number<i class="text-muted" style="font-size: 11px;">(Numero ng Telepono

)</i><text style="color:red">&nbsp; *</text></label>
                <input type="number" class="form-control" name="cpnum" placeholder="Cellphone Number" required>
                </div>

                
        </div>

          <div class="form-row">
                <div class="form-group col-md-12">
                <label for="address" style="font-size: 15px">Address<i class="text-muted" style="font-size: 11px;">(Tirahan)</i><text style="color:red">&nbsp; *</text></label>
                <input type="text" class="form-control" name="address" placeholder="1234 Main Street"  required>
                </div>
          </div>


        <div class="form-row">

                  <div class="form-group col-md-4">
                     <label for="province" style="font-size: 15px;">Province/State<i class="text-muted" style="font-size: 11px;">(Probinsya)</i><text style="color:red">&nbsp; *</text></label>
                  <select id="province" class="form-control" name="province" required>
                     <option value=""selected>-</option>
                     <option>NCR</option>
                    <option >Abra</option>
                    <option >Apayao</option>
                    <option >Benguet</option>
                    <option >Ifugao</option>
                    <option >Kalinga</option>
                    <option >Mountain Province</option>
                    <option >Ilocos Norte</option>
                    <option >Ilocos Sur</option>
                    <option >La Union</option>
                    <option >Pangasinan</option>
                    <option >Batanes</option>
                    <option >Cagayan</option>
                    <option >Isabela</option>
                    <option >Nueva Ecijia</option>
                    <option >Pampanga</option>
                    <option >Tarlac</option>
                    <option>Zambales</option>
                    <option>Batangas</option>
                    <option>Cavite</option>
                    <option>Laguna</option>
                    <option>Quezon</option>
                    <option>Rizal</option>
                    <option>Marinduque</option>
                    <option>Occidental Mindoro</option>
                    <option>Oriental Mindoro</option>
                    <option>Palawan</option>
                    <option>Romblon</option>
                    <option>Albay</option>
                    <option>Camarines Norte</option>
                    <option>Camarines Sur</option>
                    <option>Catanduanes</option>
                    <option>Masbate</option>
                    <option>Sorsogon</option>
                    <option>Aklan</option>
                    <option>Antique</option>
                    <option>Capiz</option>
                    <option>Guimaras</option>
                    <option>Iloilo</option>
                    <option>Negros Occidental</option>
                    <option>Bohol</option>
                    <option>Cebu</option>
                    <option>Negros Oriental</option>
                    <option>Siquijor</option>
                    <option>Biliran</option>
                    <option>Eastern Samar</option>
                    <option>Leyte</option>
                    <option>Northern Samar</option>
                    <option>Samar</option>
                    <option>Southern Leyte</option>
                    <option>Zamboanga del Norte</option>
                    <option>Zamboanga del Sur</option>
                    <option>Zamboanga Sibugay</option>
                    <option>Bukidnon</option>
                    <option>Camiguin</option>
                    <option>Lanao del Norte</option>
                    <option>Misamis Occidental</option>
                    <option>Misamis Oriental</option>
                    <option>Davao de Oro</option>
                    <option>Davao del Norte</option>
                    <option>Davao del Sur</option>
                    <option>Davao Occidental</option>
                    <option>Davao Oriental</option>
                    <option>Cotabato</option>
                    <option>Sarangani</option>
                    <option>South Cotabato</option>
                    <option>Sultan Kudarat</option>
                    <option>Agusan del Norte</option>
                    <option>Agusan del Sur</option>
                    <option>Dinagat Islands</option>
                    <option>Surigao del Norte</option>
                    <option>Surigao del Sur</option>
                    <option>Basilan</option>
                    <option>Lanao del Sur</option>
                    <option>Maguindanao</option>
                    <option>Sulu</option>
                    <option>Tawi-Tawi</option>
                    </select>
                  </div>

                 <div class="form-group col-md-4">
                  <label for="city">City/Municipality<text style="color:red">&nbsp; *</text></label>
                  <select id="city" class="form-control" name="city" required>
                    <option value=""selected>-</option>
                    <option class="NCR">Muntinlupa</option>
                    <option class="NCR">Caloocan</option>
                    <option class="NCR">Malabon</option>
                    <option class="NCR">Navotas</option>
                    <option class="NCR">Valenzuela</option>
                    <option class="NCR">Quezon</option>
                    <option class="NCR">Marikina</option>
                    <option class="NCR">Pasig</option>
                    <option class="NCR">Taguig</option>
                    <option class="NCR">Makati</option>
                    <option class="NCR">Manila</option>
                    <option class="NCR">Mandaluyong</option>
                    <option class="NCR" value="San-Juan">San Juan</option>
                    <option class="NCR">Pasay</option>
                    <option class="NCR">Parañaque</option>
                    <option class="NCR" value="Las-Piñas">Las Piñas</option>
                    <option class="NCR">Pateros</option>
                    <option class="Abra">Bangued</option>
                    <option class="Abra">Boliney</option>
                    <option class="Abra">Bucay</option>
                    <option class="Abra">Bucloc</option>
                    <option class="Abra">Daguioman</option>
                    <option class="Abra">Danglas</option>
                    <option class="Abra">Dolores</option>
                    <option class="Abra">Lacub</option>
                    <option class="Abra">Lagangilang</option>
                    <option class="Abra">Lagayan</option>
                    <option class="Abra">Langiden</option>
                    <option class="Abra" value="La-Paz">La Paz</option>
                    <option class="Abra" value="Licuan-Baay">Licuan-Baay(Licuan)</option>
                    <option class="Abra">Luba</option>
                    <option class="Abra">Malibcong</option>
                    <option class="Abra">Manabo</option>
                    <option class="Abra">Peñarrubia</option>
                    <option class="Abra">Pidigan</option>
                    <option class="Abra">Pilar</option>
                    <option class="Abra">Sallapadan</option>
                    <option class="Abra" value="San-Isidro">San Isidro</option>
                    <option class="Abra" value="San-Juan">San Juan</option>
                    <option class="Abra" value="San-Quintin">San Quintin</option>
                    <option class="Abra">Tayum</option>
                    <option class="Abra">Tineg</option>
                    <option class="Abra">Tubo</option>
                    <option class="Abra">Villaviciosa</option>
                    <option class="Apayao">Calanasan</option>
                    <option class="Apayao">Conner</option>
                    <option class="Apayao">Flora</option>
                    <option class="Apayao">Kabugao</option>
                    <option class="Apayao">Luna</option>
                    <option class="Apayao">Pudtol</option>
                    <option class="Apayao" value="Santa-Marcela">Santa Marcela</option>
                    <option class="Benguet">Atok</option>
                    <option class="Benguet">Bakun</option>
                    <option class="Benguet">Bokod</option>
                    <option class="Benguet">Buguias</option>
                    <option class="Benguet">Itogon</option>
                    <option class="Benguet">Kabayan</option>
                    <option class="Benguet">Kapangan</option>
                    <option class="Benguet">Kibungan</option>
                    <option class="Benguet" value="La-Trinidad">La Trinidad</option>
                    <option class="Benguet">Mankayan</option>
                    <option class="Benguet">Sablan</option>
                    <option class="Benguet">Tuba</option>
                    <option class="Benguet">Tublay</option>
                    <option class="Ifugao">Aguinaldo</option>
                    <option class="Ifugao" value="Alfonso-Lista">Alfonso Lista</option>
                    <option class="Ifugao">Asipulo</option>
                    <option class="Ifugao">Banaue</option>
                    <option class="Ifugao">Hingyon</option>
                    <option class="Ifugao">Hungduan</option>
                    <option class="Ifugao">Kiangan</option>
                    <option class="Ifugao">Lagawe</option>
                    <option class="Ifugao">Lamut</option>
                    <option class="Ifugao">Mayoyao</option>
                    <option class="Ifugao">Tinoc</option>
                    <option class="Kalinga">Balbalan</option>
                    <option class="Kalinga">Lubuagan</option>
                    <option class="Kalinga">Pasil</option>
                    <option class="Kalinga">Pinukpuk</option>
                    <option class="Kalinga">Rizal</option>
                    <option class="Kalinga">Tanudan</option>
                    <option class="Kalinga">Tinglayan</option>
                    <option class="Mountain-Province">Barlig</option>
                    <option class="Mountain-Province">Bauko</option>
                    <option class="Mountain-Province">Besao</option>
                    <option class="Mountain-Province">Bontoc</option>
                    <option class="Mountain-Province">Natonin</option>
                    <option class="Mountain-Province">Paracelis</option>
                    <option class="Mountain-Province">Sabangan</option>
                    <option class="Mountain-Province">Sadanga</option>
                    <option class="Mountain-Province">Sagada</option>
                    <option class="Mountain-Province">Tadian</option>
                    <option class="Ilocos-Norte">Adams</option>
                    <option class="Ilocos-Norte">Bacarra</option>
                    <option class="Ilocos-Norte">Badoc</option>
                    <option class="Ilocos-Norte">Bangui</option>
                    <option class="Ilocos-Norte">Banna</option>
                    <option class="Ilocos-Norte">Burgos</option>
                    <option class="Ilocos-Norte">Carasi</option>
                    <option class="Ilocos-Norte">Currimao</option>
                    <option class="Ilocos-Norte">Dingras</option>
                    <option class="Ilocos-Norte">Dumalneg</option>
                    <option class="Ilocos-Norte">Marcos</option>
                    <option class="Ilocos-Norte">Nueva Era</option>
                    <option class="Ilocos-Norte">Pagudpud</option>
                    <option class="Ilocos-Norte">Paoay</option>
                    <option class="Ilocos-Norte">Pasuquin</option>
                    <option class="Ilocos-Norte">Piddig</option>
                    <option class="Ilocos-Norte">Pinili</option>
                    <option class="Ilocos-Norte">San Nicolas</option>
                    <option class="Ilocos-Norte">Sarrat</option>
                    <option class="Ilocos-Norte">Solsona</option>
                    <option class="Ilocos-Norte">Vintar</option>
                    <option class="Ilocos-Sur">Alilem</option>
                    <option class="Ilocos-Sur">Banayoyo</option>
                    <option class="Ilocos-Sur">Bantay</option>
                    <option class="Ilocos-Sur">Burgos</option>
                    <option class="Ilocos-Sur">Cabugao</option>
                    <option class="Ilocos-Sur">Caoayan</option>
                    <option class="Ilocos-Sur">Cervantes</option>
                    <option class="Ilocos-Sur">Galimuyod</option>
                    <option class="Ilocos-Sur" value="Gregorio-del-Pilar">Gregorio del Pilar</option>
                    <option class="Ilocos-Sur">Lidlidda</option>
                    <option class="Ilocos-Sur">Magsingal</option>
                    <option class="Ilocos-Sur">Nagbukel</option>
                    <option class="Ilocos-Sur">Narvacan</option>
                    <option class="Ilocos-Sur">Quirino</option>
                    <option class="Ilocos-Sur">Salcedo</option>
                    <option class="Ilocos-Sur" value="San-Emilio">San Emilio</option>
                    <option class="Ilocos-Sur" value="San-Esteban">San Esteban</option>
                    <option class="Ilocos-Sur" value="San-Ildefonso">San Ildefonso</option>
                    <option class="Ilocos-Sur" value="San-Juan">San Juan</option>
                    <option class="Ilocos-Sur" value="San-Vicente">San Vicente</option>
                    <option class="Ilocos-Sur">Santa</option>
                    <option class="Ilocos-Sur" value="Santa-Catalina">Santa Catalina</option>
                    <option class="Ilocos-Sur" value="Santa-Cruz">Santa Cruz</option>
                    <option class="Ilocos-Sur" value="Santa-Lucia">Santa Lucia</option>
                    <option class="Ilocos-Sur" value="Santa-Maria">Santa Maria</option>
                    <option class="Ilocos-Sur">Santiago</option>
                    <option class="Ilocos-Sur" value="Santo-Domingo">Santo Domingo</option>
                    <option class="Ilocos-Sur">Sigay</option>
                    <option class="Ilocos-Sur">Sinait</option>
                    <option class="Ilocos-Sur">Sugpon</option>
                    <option class="Ilocos-Sur">Suyo</option>
                    <option class="Ilocos-Sur">Tagudin</option>
                    <option class="La-Union">Agoo</option>
                    <option class="La-Union">Aringay</option>
                    <option class="La-Union">Bacnotan</option>
                    <option class="La-Union">Bagulin</option>
                    <option class="La-Union">Balaoan</option>
                    <option class="La-Union">Bangar</option>
                    <option class="La-Union">Bauang</option>
                    <option class="La-Union">Burgos</option>
                    <option class="La-Union">Caba</option>
                    <option class="La-Union">Luna</option>
                    <option class="La-Union">Naguilian</option>
                    <option class="La-Union">Pugo</option>
                    <option class="La-Union">Rosario</option>
                    <option class="La-Union">San Gabriel</option>
                    <option class="La-Union">San Juan</option>
                    <option class="La-Union">Santo Tomas</option>
                    <option class="La-Union">Santol</option>
                    <option class="La-Union">Sudipen</option>
                    <option class="La-Union">Tubao</option>
                   






                  </select>
                  </div>


            <div class="form-group col-md-4">
            <label for="barangay">Barangay</label>
            <select id="barangay" class="form-control" name="barangay" required>
               <option value=""selected>-</option>
              <option class="Muntinlupa">Alabang</option>
              <option class="Muntinlupa">Bayanan</option>
              <option class="Muntinlupa">Tunasan</option>
              <option class="Muntinlupa">Poblacion</option>
              <option class="Muntinlupa">Putatan</option>
              <option class="Muntinlupa">Ayala Alabang</option>
              <option class="Muntinlupa">Cupang</option>
              <option class="Muntinlupa">Buli</option>
              <option class="Muntinlupa">Sucat</option>
              <option class="Caloocan">Barangay 1</option>
              <option class="Caloocan">Barangay 2</option>
              <option class="Caloocan">Barangay 3</option>
              <option class="Caloocan">Barangay 4</option>
              <option class="Caloocan">Barangay 5</option>
              <option class="Caloocan">Barangay 6</option>
              <option class="Caloocan">Barangay 7</option>
              <option class="Caloocan">Barangay 8</option>
              <option class="Caloocan">Barangay 9</option>
              <option class="Caloocan">Barangay 10</option>
              <option class="Caloocan">Barangay 100</option>
              <option class="Caloocan">Barangay 101</option>
              <option class="Caloocan">Barangay 102</option>
              <option class="Caloocan">Barangay 103</option>
              <option class="Caloocan">Barangay 104</option>
              <option class="Caloocan">Barangay 105</option>
              <option class="Caloocan">Barangay 106</option>
              <option class="Caloocan">Barangay 107</option>
              <option class="Caloocan">Barangay 108</option>
              <option class="Caloocan">Barangay 109</option>
              <option class="Caloocan">Barangay 11</option>
              <option class="Caloocan">Barangay 110</option>
              <option class="Caloocan">Barangay 111</option>
              <option class="Caloocan">Barangay 112</option>
              <option class="Caloocan">Barangay 113</option>
              <option class="Caloocan">Barangay 114</option>
              <option class="Caloocan">Barangay 115</option>
              <option class="Caloocan">Barangay 116</option>
              <option class="Caloocan">Barangay 117</option>
              <option class="Caloocan">Barangay 118</option>
              <option class="Caloocan">Barangay 119</option>
              <option class="Caloocan">Barangay 12</option>
              <option class="Caloocan">Barangay 120</option>
              <option class="Caloocan">Barangay 121</option>
              <option class="Caloocan">Barangay 122</option>
              <option class="Caloocan">Barangay 123</option>
              <option class="Caloocan">Barangay 124</option>
              <option class="Caloocan">Barangay 125</option>
              <option class="Caloocan">Barangay 126</option>
              <option class="Caloocan">Barangay 127</option>
              <option class="Caloocan">Barangay 128</option>
              <option class="Caloocan">Barangay 129</option>
              <option class="Caloocan">Barangay 13</option>
              <option class="Caloocan">Barangay 130</option>
              <option class="Caloocan">Barangay 131</option>
              <option class="Caloocan">Barangay 132</option>
              <option class="Caloocan">Barangay 133</option>
              <option class="Caloocan">Barangay 134</option>
              <option class="Caloocan">Barangay 135</option>
              <option class="Caloocan">Barangay 136</option>
              <option class="Caloocan">Barangay 137</option>
              <option class="Caloocan">Barangay 138</option>
              <option class="Caloocan">Barangay 139</option>
              <option class="Caloocan">Barangay 14</option>
              <option class="Caloocan">Barangay 140</option>
              <option class="Caloocan">Barangay 141</option>
              <option class="Caloocan">Barangay 142</option>
              <option class="Caloocan">Barangay 143</option>
              <option class="Caloocan">Barangay 144</option>
              <option class="Caloocan">Barangay 145</option>
              <option class="Caloocan">Barangay 146</option>
              <option class="Caloocan">Barangay 147</option>
              <option class="Caloocan">Barangay 148</option>
              <option class="Caloocan">Barangay 149</option>
              <option class="Caloocan">Barangay 15</option>
              <option class="Caloocan">Barangay 150</option>
              <option class="Caloocan">Barangay 151</option>
              <option class="Caloocan">Barangay 152</option>
              <option class="Caloocan">Barangay 153</option>
              <option class="Caloocan">Barangay 154</option>
              <option class="Caloocan">Barangay 155</option>
              <option class="Caloocan">Barangay 156</option>
              <option class="Caloocan">Barangay 157</option>
              <option class="Caloocan">Barangay 158</option>
              <option class="Caloocan">Barangay 159</option>
              <option class="Caloocan">Barangay 16</option>
              <option class="Caloocan">Barangay 160</option>
              <option class="Caloocan">Barangay 161</option>
              <option class="Caloocan">Barangay 162</option>
              <option class="Caloocan">Barangay 163</option>
              <option class="Caloocan">Barangay 164</option>
              <option class="Caloocan">Barangay 165</option>
              <option class="Caloocan">Barangay 166</option>
              <option class="Caloocan">Barangay 167</option>
              <option class="Caloocan">Barangay 168</option>
              <option class="Caloocan">Barangay 169</option>
              <option class="Caloocan">Barangay 17</option>
              <option class="Caloocan">Barangay 170</option>
              <option class="Caloocan">Barangay 171</option>
              <option class="Caloocan">Barangay 172</option>
              <option class="Caloocan">Barangay 173</option>
              <option class="Caloocan">Barangay 174</option>
              <option class="Caloocan">Barangay 175</option>
              <option class="Caloocan">Barangay 176</option>
              <option class="Caloocan">Barangay 177</option>
              <option class="Caloocan">Barangay 178</option>
              <option class="Caloocan">Barangay 179</option>
              <option class="Caloocan">Barangay 18</option>
              <option class="Caloocan">Barangay 180</option>
              <option class="Caloocan">Barangay 181</option>
              <option class="Caloocan">Barangay 182</option>
              <option class="Caloocan">Barangay 183</option>
              <option class="Caloocan">Barangay 184</option>
              <option class="Caloocan">Barangay 185</option>
              <option class="Caloocan">Barangay 186</option>
              <option class="Caloocan">Barangay 187</option>
              <option class="Caloocan">Barangay 188</option>
              <option class="Caloocan">Barangay 19</option>
              <option class="Caloocan">Barangay 20</option>
              <option class="Caloocan">Barangay 21</option>
              <option class="Caloocan">Barangay 22</option>
              <option class="Caloocan">Barangay 23</option>
              <option class="Caloocan">Barangay 24</option>
              <option class="Caloocan">Barangay 25</option>
              <option class="Caloocan">Barangay 26</option>
              <option class="Caloocan">Barangay 27</option>
              <option class="Caloocan">Barangay 28</option>
              <option class="Caloocan">Barangay 29</option>
              <option class="Caloocan">Barangay 30</option>
              <option class="Caloocan">Barangay 31</option>
              <option class="Caloocan">Barangay 32</option>
              <option class="Caloocan">Barangay 33</option>
              <option class="Caloocan">Barangay 34</option>
              <option class="Caloocan">Barangay 35</option>
              <option class="Caloocan">Barangay 36</option>
              <option class="Caloocan">Barangay 37</option>
              <option class="Caloocan">Barangay 38</option>
              <option class="Caloocan">Barangay 39</option>
              <option class="Caloocan">Barangay 40</option>
              <option class="Caloocan">Barangay 41</option>
              <option class="Caloocan">Barangay 42</option>
              <option class="Caloocan">Barangay 43</option>
              <option class="Caloocan">Barangay 44</option>
              <option class="Caloocan">Barangay 45</option>
              <option class="Caloocan">Barangay 46</option>
              <option class="Caloocan">Barangay 47</option>
              <option class="Caloocan">Barangay 48</option>
              <option class="Caloocan">Barangay 49</option>
              <option class="Caloocan">Barangay 50</option>
              <option class="Caloocan">Barangay 51</option>
              <option class="Caloocan">Barangay 52</option>
              <option class="Caloocan">Barangay 53</option>
              <option class="Caloocan">Barangay 54</option>
              <option class="Caloocan">Barangay 55</option>
              <option class="Caloocan">Barangay 56</option>
              <option class="Caloocan">Barangay 57</option>
              <option class="Caloocan">Barangay 58</option>
              <option class="Caloocan">Barangay 59</option>
              <option class="Caloocan">Barangay 60</option>
              <option class="Caloocan">Barangay 61</option>
              <option class="Caloocan">Barangay 62</option>
              <option class="Caloocan">Barangay 63</option>
              <option class="Caloocan">Barangay 64</option>
              <option class="Caloocan">Barangay 65</option>
              <option class="Caloocan">Barangay 66</option>
              <option class="Caloocan">Barangay 67</option>
              <option class="Caloocan">Barangay 68</option>
              <option class="Caloocan">Barangay 69</option>
              <option class="Caloocan">Barangay 70</option>
              <option class="Caloocan">Barangay 71</option>
              <option class="Caloocan">Barangay 72</option>
              <option class="Caloocan">Barangay 73</option>
              <option class="Caloocan">Barangay 74</option>
              <option class="Caloocan">Barangay 75</option>
              <option class="Caloocan">Barangay 76</option>
              <option class="Caloocan">Barangay 77</option>
              <option class="Caloocan">Barangay 78</option>
              <option class="Caloocan">Barangay 79</option>
              <option class="Caloocan">Barangay 80</option>
              <option class="Caloocan">Barangay 81</option>
              <option class="Caloocan">Barangay 82</option>
              <option class="Caloocan">Barangay 83</option>
              <option class="Caloocan">Barangay 84</option>
              <option class="Caloocan">Barangay 85</option>
              <option class="Caloocan">Barangay 86</option>
              <option class="Caloocan">Barangay 87</option>
              <option class="Caloocan">Barangay 88</option>
              <option class="Caloocan">Barangay 89</option>
              <option class="Caloocan">Barangay 90</option>
              <option class="Caloocan">Barangay 91</option>
              <option class="Caloocan">Barangay 92</option>
              <option class="Caloocan">Barangay 93</option>
              <option class="Caloocan">Barangay 94</option>
              <option class="Caloocan">Barangay 95</option>
              <option class="Caloocan">Barangay 96</option>
              <option class="Caloocan">Barangay 97</option>
              <option class="Caloocan">Barangay 98</option>
              <option class="Caloocan">Barangay 99</option>
              <option class="Malabon">Acacia</option>
              <option class="Malabon">Baritan</option>
              <option class="Malabon">Bayan-Bayanan</option>
              <option class="Malabon">Catmon</option>
              <option class="Malabon">Concepcion</option>
              <option class="Malabon">Dampalit</option>
              <option class="Malabon">Flores</option>
              <option class="Malabon">Hulong Duhat</option>
              <option class="Malabon">Ibaba</option>
              <option class="Malabon">Longos</option>
              <option class="Malabon">Maysilo</option>
              <option class="Malabon">Muzon</option>
              <option class="Malabon">Niugan</option>
              <option class="Malabon">Panghulo</option>
              <option class="Malabon">Potrero</option>
              <option class="Malabon">San Agustin</option>
              <option class="Malabon">Santolan</option>
              <option class="Malabon">Tañong</option>
              <option class="Malabon">Tinajeros</option>
              <option class="Malabon">Tonsuya</option>
              <option class="Malabon">Tugatog</option>
              <option class="Navotas">Bagumbayan North</option>
              <option class="Navotas">Bagumbayan South</option>
              <option class="Navotas">Bangculasi</option>
              <option class="Navotas">Daanghari</option>
              <option class="Navotas">Navotas East</option>
              <option class="Navotas">Navotas West</option>
              <option class="Navotas">North Bay Boulevard North</option>
              <option class="Navotas">North Bay Boulevard South</option>
              <option class="Navotas">San Jose</option>
              <option class="Navotas">San Rafael Village</option>
              <option class="Navotas">San Roque</option>
              <option class="Navotas">Sipac-Almacen</option>
              <option class="Navotas">Tangos (incl. Tangos North, Tangos South)</option>
              <option class="Navotas">Tanza (incl. Tanza 1, Tanza 2)</option>
              <option class="Valenzuela">Arkong Bato</option>
              <option class="Valenzuela">Bagbaguin</option>
              <option class="Valenzuela">Balangkas</option>
              <option class="Valenzuela">Bignay</option>
              <option class="Valenzuela">Bisig</option>
              <option class="Valenzuela">Canumay East</option>
              <option class="Valenzuela">Canumay West</option>
              <option class="Valenzuela">Coloong</option>
              <option class="Valenzuela">Dalandanan</option>
              <option class="Valenzuela">Hen. T. De Leon</option>
              <option class="Valenzuela">Isla</option>
              <option class="Valenzuela">Karuhatan</option>
              <option class="Valenzuela">Lawawng Bato</option>
              <option class="Valenzuela">Lingunan</option>
              <option class="Valenzuela">Mabolo</option>
              <option class="Valenzuela">Malanday</option>
              <option class="Valenzuela">Malinta</option>
              <option class="Valenzuela">Mapulang Lupa</option>
              <option class="Valenzuela">Marulas</option>
              <option class="Valenzuela">Maysan</option>
              <option class="Valenzuela">Palasan</option>
              <option class="Valenzuela">Parada</option>
              <option class="Valenzuela">Pariancillo Villa</option>
              <option class="Valenzuela">Paso De Blas</option>
              <option class="Valenzuela">Pasolo</option>
              <option class="Valenzuela">Poblacion</option>
              <option class="Valenzuela">Pulo</option>
              <option class="Valenzuela">Punturin</option>
              <option class="Valenzuela">Rincon</option>
              <option class="Valenzuela">Tagalag</option>
              <option class="Valenzuela">Ugong</option>
              <option class="Valenzuela">Viente Reales</option>
              <option class="Valenzuela">Wawang Pulo</option>
              <option class="Quezon">Alicia</option>
              <option class="Quezon">Amihan</option>
              <option class="Quezon">Apolonio Samson</option>
              <option class="Quezon">Aurora</option>
              <option class="Quezon">Baesa</option>
              <option class="Quezon">Bagbag</option>
              <option class="Quezon">Bagong Lipunan ng Crame</option>
              <option class="Quezon">Bagong Pag-asa</option>
              <option class="Quezon">Bagong Silangan</option>
              <option class="Quezon">Bagumbayan</option>
              <option class="Quezon">Bagumbuhay</option>
              <option class="Quezon">Bahay Toro</option>
              <option class="Quezon">Balingasa</option>
              <option class="Quezon">Balong bato</option>
              <option class="Quezon">Batasan Hills</option>
              <option class="Quezon">Bayanihan</option>
              <option class="Quezon">Blue Ridge A</option>
              <option class="Quezon">Blue Ridge B</option>
              <option class="Quezon">Botocan</option>
              <option class="Quezon">Bungad</option>
              <option class="Quezon">Camp Aguinaldo</option>
              <option class="Quezon">Capri</option>
              <option class="Quezon">Central</option>
              <option class="Quezon">Claro</option>
              <option class="Quezon">Commonwealth</option>
              <option class="Quezon">Culiat</option>
              <option class="Quezon">Damar</option>
              <option class="Quezon">Damayan</option>
              <option class="Quezon">Damayang Lagi</option>
              <option class="Quezon">Del Monte</option>
              <option class="Quezon">Dioquino Zobel</option>
              <option class="Quezon">Doña Imelda</option>
              <option class="Quezon">Doña Josefa</option>
              <option class="Quezon">Don Manuel</option>
              <option class="Quezon">Duyan-Duyan</option>
              <option class="Quezon">East Kamias</option>
              <option class="Quezon">E. Rodriguez</option>
              <option class="Quezon">Escopa I</option>
              <option class="Quezon">Escopa II</option>
              <option class="Quezon">Escopa III</option>
              <option class="Quezon">Escopa IV</option>
              <option class="Quezon">Fairview</option>
              <option class="Quezon">Greater Largo</option>
              <option class="Quezon">Gulod</option>
              <option class="Quezon">Holy Spirit</option>
              <option class="Quezon">Horseshoe</option>
              <option class="Quezon">Immaculate Concepcion</option>
              <option class="Quezon">Kaligayan</option>
              <option class="Quezon">Kalusugan</option>
              <option class="Quezon">Kamuning</option>
              <option class="Quezon">Katipunan</option>
              <option class="Quezon">Kaunlaran</option>
              <option class="Quezon">Kristong Hari</option>
              <option class="Quezon">Laging Handa</option>
              <option class="Quezon">Libis</option>
              <option class="Quezon">Lourdes</option>
              <option class="Quezon">Loyola Heights</option>
              <option class="Quezon">Maharlika</option>
              <option class="Quezon">Malaya</option>
              <option class="Quezon">Mangga</option>
              <option class="Quezon">Manresa</option>
              <option class="Quezon">Mariana</option>
              <option class="Quezon">Mariblo</option>
              <option class="Quezon">Marilag</option>
              <option class="Quezon">Masagana</option>
              <option class="Quezon">Masambong</option>
              <option class="Quezon">Matandang Balara</option>
              <option class="Quezon">Milagrosa</option>
              <option class="Quezon">Nagkaisang Nayon</option>
              <option class="Quezon">Nayong Kanluran</option>
              <option class="Quezon">New Era(Constitution Hills)</option>
              <option class="Quezon">North Fairview</option>
              <option class="Quezon">Novaliches Proper</option>
              <option class="Quezon">N.S. Amoranto(Gintong Silahis)</option>
              <option class="Quezon">Obrero</option>
              <option class="Quezon">Old Capitol Site</option>
              <option class="Quezon">Paang Bundok</option>
              <option class="Quezon">Pag-ibig Sa Nayon</option>
              <option class="Quezon">Paligsahan</option>
              <option class="Quezon">Paltok</option>
              <option class="Quezon">Pansol</option>
              <option class="Quezon">Paraiso</option>
              <option class="Quezon">Pasong Putik (Pasong Putik)</option>
              <option class="Quezon">Pasong Tamo</option>
              <option class="Quezon">Payatas</option>
              <option class="Quezon">Phil-Am</option>
              <option class="Quezon">Pinagkaisahan</option>
              <option class="Quezon">Pinyahan</option>
              <option class="Quezon">Project 6</option>
              <option class="Quezon">Quirino 2-A</option>
              <option class="Quezon">Quirino 2-B</option>
              <option class="Quezon">Quirino 2-C</option>
              <option class="Quezon">Quirino 3-A</option>
              <option class="Quezon">Ramon Magsaysay</option>
              <option class="Quezon">Roxas</option>
              <option class="Quezon">Sacred Heart</option>
              <option class="Quezon">Saint Ignatius</option>
              <option class="Quezon">Saint Peter</option>
              <option class="Quezon">Salvacion</option>
              <option class="Quezon">San Agustin</option>
              <option class="Quezon">San Antonio</option>
              <option class="Quezon">San Bartolome</option>
              <option class="Quezon">Sangandaan</option>
              <option class="Quezon">San Isidro</option>
              <option class="Quezon">San Isidro Labrador</option>
              <option class="Quezon">San Jose</option>
              <option class="Quezon">San Martin De Porres</option>
              <option class="Quezon">San Roque</option>
              <option class="Quezon">Santa Cruz</option>
              <option class="Quezon">Santa Lucia</option>
              <option class="Quezon">Santa Monica</option>
              <option class="Quezon">Santa Teresita</option>
              <option class="Quezon">Santo Cristo</option>
              <option class="Quezon">Santo Domingo (Matalahib)</option>
              <option class="Quezon">Santol</option>
              <option class="Quezon">Santo Niño</option>
              <option class="Quezon">San Vicente</option>
              <option class="Quezon">Sauyo</option>
              <option class="Quezon">Sienna</option>
              <option class="Quezon">Sikatuna Village</option>
              <option class="Quezon">Silangan</option>
              <option class="Quezon">Socorro</option>
              <option class="Quezon">South Triangle</option>
              <option class="Quezon">Tagumpay</option>
              <option class="Quezon">Talayan</option>
              <option class="Quezon">Talipapa</option>
              <option class="Quezon">Tandang Sora</option>
              <option class="Quezon">Tatalon</option>
              <option class="Quezon">Teachers Village East</option>
              <option class="Quezon">Teachers Village West</option>
              <option class="Quezon">Ugong Norte</option>
              <option class="Quezon">Unang Sigaw</option>
              <option class="Quezon">U.P. Campus</option>
              <option class="Quezon">U.P. Village</option>
              <option class="Quezon">Valencia</option>
              <option class="Quezon">Vasra</option>
              <option class="Quezon">Veterans Village</option>
              <option class="Quezon">Villa Maria Clara</option>
              <option class="Quezon">West Kamias</option>
              <option class="Quezon">West Triangle</option>
              <option class="Quezon">White Plains</option>
              <option class="Marikina">Barangka</option>
              <option class="Marikina">Calumpang</option>
              <option class="Marikina">Concepcion Dos</option>
              <option class="Marikina">Concepcion Uno</option>
              <option class="Marikina">Fortune</option>
              <option class="Marikina">Industrial Valley</option>
              <option class="Marikina">Jesus De La Peña</option>
              <option class="Marikina">Malanday</option>
              <option class="Marikina">Marikina Heights (Concepcion)</option>
              <option class="Marikina">Nangka</option>
              <option class="Marikina">Parang</option>
              <option class="Marikina">San Roque</option>
              <option class="Marikina">Santa Elena</option>
              <option class="Marikina">Santo Niño</option>
              <option class="Marikina">Tañong</option>
              <option class="Marikina">Tumana</option>
              <option class="Pasig">Bagong Ilog</option>
              <option class="Pasig">Bagong Katipuan</option>
              <option class="Pasig">Bambang</option>
              <option class="Pasig">Buting</option>
              <option class="Pasig">Caniogan</option>
              <option class="Pasig">Dela Paz</option>
              <option class="Pasig">Kalawaan</option>
              <option class="Pasig">Kapasigan</option> 
              <option class="Pasig">Kapitolyo</option>
              <option class="Pasig">Malinao</option>
              <option class="Pasig">Manggahan (incl. Napico)</option>
              <option class="Pasig">Maybunga</option>
              <option class="Pasig">Oranbo</option>
              <option class="Pasig">Palatiw</option>
              <option class="Pasig">Pinagbuhatan</option>
              <option class="Pasig">Pineda</option> 
              <option class="Pasig">Rosario</option>
              <option class="Pasig">Sagad</option>
              <option class="Pasig">San Antonio</option>
              <option class="Pasig">San Joaquin</option>
              <option class="Pasig">San Jose</option>
              <option class="Pasig">San Miguel</option>
              <option class="Pasig">San Nicolas</option>
              <option class="Pasig">Santa Cruz</option> 
              <option class="Pasig">Santa Lucia</option>
              <option class="Pasig">Santa Rosa</option>
              <option class="Pasig">Santolan</option>
              <option class="Pasig">Santo Tomas</option>
              <option class="Pasig">Sumilang</option> 
              <option class="Taguig">Ligid-Tipas</option>
              <option class="Taguig">Lower Bicutan</option>
              <option class="Taguig">Maharlika Village</option>
              <option class="Taguig">Napindan</option>
              <option class="Taguig">New Lower Bicutan</option> 
              <option class="Taguig">North Daang Hari</option>
              <option class="Taguig">North Signal Village</option>
              <option class="Taguig">Palingon</option>
              <option class="Taguig">Pinagsama</option>
              <option class="Taguig">San Miguel</option>   
              <option class="Taguig">Santa Ana</option>
              <option class="Taguig">South Daang Hari</option>
              <option class="Taguig">South Signal Village</option>
              <option class="Taguig">Tanyag (Bagong Tanyag)</option>
              <option class="Taguig">Tuktukan</option>
              <option class="Taguig">Upper Bicutan</option>
              <option class="Taguig">Ususan</option>
              <option class="Taguig">Wawa</option>
              <option class="Taguig">Western Bicutan</option>
              <option class="Makati">Bangkal</option> 
              <option class="Makati">Bel-Air</option> 
              <option class="Makati">Carmona</option> 
              <option class="Makati">Cembo</option> 
              <option class="Makati">Comembo</option> 
              <option class="Makati">Dasmariñas</option> 
              <option class="Makati">East Rembo</option> 
              <option class="Makati">Forbes Park</option> 
              <option class="Makati">Guadalupe Viejo</option> 
              <option class="Makati">Kasilawan</option> 
              <option class="Makati">La Paz</option> 
              <option class="Makati">Magallanes</option> 
              <option class="Makati">Olympia</option> 
              <option class="Makati">Palanan</option> 
              <option class="Makati">Pembo</option> 
              <option class="Makati">Pinagkaisahan</option>        
              <option class="Makati">Pio Del Pilar</option> 
              <option class="Makati">Pitogo</option> 
              <option class="Makati">Poblacion</option> 
              <option class="Makati">Post Proper Northside</option> 
              <option class="Makati">Post Proper Southside</option> 
              <option class="Makati">Rizal</option> 
              <option class="Makati">San Antonio</option> 
              <option class="Makati">San Isidro</option>    
              <option class="Makati">San Lorenzo</option> 
              <option class="Makati">Santa Cruz</option> 
              <option class="Makati">Singkamas</option> 
              <option class="Makati">South Cembo</option> 
              <option class="Makati">Tejeros</option> 
              <option class="Makati">Urdaneta</option> 
              <option class="Makati">Valenzuela</option> 
              <option class="Makati">West Rembo</option> 
              <option class="Manila">Binondo: Barangay 287</option> 
              <option class="Manila">Binondo: Barangay 288</option> 
              <option class="Manila">Binondo: Barangay 289</option> 
              <option class="Manila">Binondo: Barangay 290</option> 
              <option class="Manila">Binondo: Barangay 291</option> 
              <option class="Manila">Binondo: Barangay 292</option> 
              <option class="Manila">Binondo: Barangay 293</option> 
              <option class="Manila">Binondo: Barangay 294</option> 
              <option class="Manila">Binondo: Barangay 295</option> 
              <option class="Manila">Binondo: Barangay 296</option> 
              <option class="Manila">Ermita: Barangay 659</option> 
              <option class="Manila">Ermita: Barangay 659-A</option> 
              <option class="Manila">Ermita: Barangay 660</option> 
              <option class="Manila">Ermita: Barangay 660-A</option> 
              <option class="Manila">Ermita: Barangay 661</option> 
              <option class="Manila">Ermita: Barangay 663</option> 
              <option class="Manila">Ermita: Barangay 663-A</option> 
              <option class="Manila">Ermita: Barangay 664</option> 
              <option class="Manila">Ermita: Barangay 666</option> 
              <option class="Manila">Ermita: Barangay 667</option> 
              <option class="Manila">Ermita: Barangay 668</option> 
              <option class="Manila">Ermita: Barangay 669</option> 
              <option class="Manila">Ermita: Barangay 670</option> 
              <option class="Manila">Intramuros: Barangay 654</option> 
              <option class="Manila">Intramuros: Barangay 655</option> 
              <option class="Manila">Intramuros: Barangay 656</option> 
              <option class="Manila">Intramuros: Barangay 657</option> 
              <option class="Manila">Intramuros: Barangay 658</option> 
              <option class="Manila">Malate: Barangay 688</option> 
              <option class="Manila">Malate: Barangay 689</option> 
              <option class="Manila">Malate: Barangay 690</option> 
              <option class="Manila">Malate: Barangay 691</option> 
              <option class="Manila">Malate: Barangay 692</option> 
              <option class="Manila">Malate: Barangay 693</option> 
              <option class="Manila">Malate: Barangay 694</option> 
              <option class="Manila">Malate: Barangay 695</option> 
              <option class="Manila">Malate: Barangay 696</option> 
              <option class="Manila">Malate: Barangay 697</option> 
              <option class="Manila">Malate: Barangay 698</option> 
              <option class="Manila">Malate: Barangay 699</option> 
              <option class="Manila">Malate: Barangay 700</option> 
              <option class="Manila">Malate: Barangay 701</option> 
              <option class="Manila">Malate: Barangay 702</option> 
              <option class="Manila">Malate: Barangay 703</option> 
              <option class="Manila">Malate: Barangay 704</option> 
              <option class="Manila">Malate: Barangay 705</option> 
              <option class="Manila">Malate: Barangay 706</option> 
              <option class="Manila">Malate: Barangay 707</option> 
              <option class="Manila">Malate: Barangay 708</option> 
              <option class="Manila">Malate: Barangay 709</option> 
              <option class="Manila">Malate: Barangay 710</option> 
              <option class="Manila">Malate: Barangay 711</option> 
              <option class="Manila">Malate: Barangay 712</option> 
              <option class="Manila">Malate: Barangay 713</option> 
              <option class="Manila">Malate: Barangay 714</option> 
              <option class="Manila">Malate: Barangay 715</option> 
              <option class="Manila">Malate: Barangay 716</option> 
              <option class="Manila">Malate: Barangay 717</option> 
              <option class="Manila">Malate: Barangay 718</option> 
              <option class="Manila">Malate: Barangay 719</option> 
              <option class="Manila">Malate: Barangay 720</option> 
              <option class="Manila">Malate: Barangay 721</option> 
              <option class="Manila">Malate: Barangay 722</option> 
              <option class="Manila">Malate: Barangay 723</option> 
              <option class="Manila">Malate: Barangay 724</option> 
              <option class="Manila">Malate: Barangay 725</option> 
              <option class="Manila">Malate: Barangay 726</option> 
              <option class="Manila">Malate: Barangay 727</option> 
              <option class="Manila">Malate: Barangay 728</option> 
              <option class="Manila">Malate: Barangay 729</option> 
              <option class="Manila">Malate: Barangay 730</option> 
              <option class="Manila">Malate: Barangay 731</option> 
              <option class="Manila">Malate: Barangay 732</option> 
              <option class="Manila">Malate: Barangay 733</option> 
              <option class="Manila">Malate: Barangay 734</option> 
              <option class="Manila">Malate: Barangay 735</option> 
              <option class="Manila">Malate: Barangay 736</option> 
              <option class="Manila">Malate: Barangay 737</option> 
              <option class="Manila">Malate: Barangay 738</option> 
              <option class="Manila">Malate: Barangay 739</option> 
              <option class="Manila">Malate: Barangay 740</option> 
              <option class="Manila">Malate: Barangay 741</option> 
              <option class="Manila">Malate: Barangay 742</option> 
              <option class="Manila">Malate: Barangay 743</option> 
              <option class="Manila">Malate: Barangay 744</option> 
              <option class="Manila">Paco (Dilao): Barangay 662</option> 
              <option class="Manila">Paco (Dilao): Barangay 664-A</option> 
              <option class="Manila">Paco (Dilao): Barangay 671</option> 
              <option class="Manila">Paco (Dilao): Barangay 673</option> 
              <option class="Manila">Paco (Dilao): Barangay 674</option> 
              <option class="Manila">Paco (Dilao): Barangay 675</option> 
              <option class="Manila">Paco (Dilao): Barangay 676</option> 
              <option class="Manila">Paco (Dilao): Barangay 677</option> 
              <option class="Manila">Paco (Dilao): Barangay 678</option> 
              <option class="Manila">Paco (Dilao): Barangay 679</option> 
              <option class="Manila">Paco (Dilao): Barangay 680</option> 
              <option class="Manila">Paco (Dilao): Barangay 681</option> 
              <option class="Manila">Paco (Dilao): Barangay 682</option> 
              <option class="Manila">Paco (Dilao): Barangay 683</option> 
              <option class="Manila">Paco (Dilao): Barangay 684</option> 
              <option class="Manila">Paco (Dilao): Barangay 685</option> 
              <option class="Manila">Paco (Dilao): Barangay 686</option> 
              <option class="Manila">Paco (Dilao): Barangay 687</option> 
              <option class="Manila">Paco (Dilao): Barangay 809</option> 
              <option class="Manila">Paco (Dilao): Barangay 810</option> 
              <option class="Manila">Paco (Dilao): Barangay 811</option> 
              <option class="Manila">Paco (Dilao): Barangay 812</option> 
              <option class="Manila">Paco (Dilao): Barangay 813</option> 
              <option class="Manila">Paco (Dilao): Barangay 814</option> 
              <option class="Manila">Paco (Dilao): Barangay 815</option> 
              <option class="Manila">Paco (Dilao): Barangay 816</option> 
              <option class="Manila">Paco (Dilao): Barangay 817</option> 
              <option class="Manila">Paco (Dilao): Barangay 818</option> 
              <option class="Manila">Paco (Dilao): Barangay 819</option> 
              <option class="Manila">Paco (Dilao): Barangay 820</option> 
              <option class="Manila">Paco (Dilao): Barangay 821</option> 
              <option class="Manila">Paco (Dilao): Barangay 822</option> 
              <option class="Manila">Paco (Dilao): Barangay 823</option> 
              <option class="Manila">Paco (Dilao): Barangay 824</option> 
              <option class="Manila">Paco (Dilao): Barangay 825</option> 
              <option class="Manila">Paco (Dilao): Barangay 826</option> 
              <option class="Manila">Paco (Dilao): Barangay 827</option> 
              <option class="Manila">Paco (Dilao): Barangay 828</option> 
              <option class="Manila">Paco (Dilao): Barangay 829</option> 
              <option class="Manila">Paco (Dilao): Barangay 830</option> 
              <option class="Manila">Paco (Dilao): Barangay 831</option> 
              <option class="Manila">Paco (Dilao): Barangay 832</option> 
              <option class="Manila">Pandacan: Barangay 833</option> 
              <option class="Manila">Pandacan: Barangay 834</option> 
              <option class="Manila">Pandacan: Barangay 835</option> 
              <option class="Manila">Pandacan: Barangay 836</option> 
              <option class="Manila">Pandacan: Barangay 837</option> 
              <option class="Manila">Pandacan: Barangay 838</option> 
              <option class="Manila">Pandacan: Barangay 839</option> 
              <option class="Manila">Pandacan: Barangay 840</option> 
              <option class="Manila">Pandacan: Barangay 841</option> 
              <option class="Manila">Pandacan: Barangay 842</option> 
              <option class="Manila">Pandacan: Barangay 843</option> 
              <option class="Manila">Pandacan: Barangay 844</option> 
              <option class="Manila">Pandacan: Barangay 845</option> 
              <option class="Manila">Pandacan: Barangay 846</option> 
              <option class="Manila">Pandacan: Barangay 847</option> 
              <option class="Manila">Pandacan: Barangay 848</option> 
              <option class="Manila">Pandacan: Barangay 849</option> 
              <option class="Manila">Pandacan: Barangay 850</option> 
              <option class="Manila">Pandacan: Barangay 851</option> 
              <option class="Manila">Pandacan: Barangay 852</option> 
              <option class="Manila">Pandacan: Barangay 853</option> 
              <option class="Manila">Pandacan: Barangay 854</option> 
              <option class="Manila">Pandacan: Barangay 855</option> 
              <option class="Manila">Pandacan: Barangay 856</option> 
              <option class="Manila">Pandacan: Barangay 857</option> 
              <option class="Manila">Pandacan: Barangay 858</option> 
              <option class="Manila">Pandacan: Barangay 859</option> 
              <option class="Manila">Pandacan: Barangay 860</option> 
              <option class="Manila">Pandacan: Barangay 861</option> 
              <option class="Manila">Pandacan: Barangay 862</option> 
              <option class="Manila">Pandacan: Barangay 863</option> 
              <option class="Manila">Pandacan: Barangay 864</option> 
              <option class="Manila">Pandacan: Barangay 865</option> 
              <option class="Manila">Pandacan: Barangay 866</option> 
              <option class="Manila">Pandacan: Barangay 867</option> 
              <option class="Manila">Pandacan: Barangay 868</option> 
              <option class="Manila">Pandacan: Barangay 869</option> 
              <option class="Manila">Pandacan: Barangay 870</option> 
              <option class="Manila">Pandacan: Barangay 871</option> 
              <option class="Manila">Pandacan: Barangay 871</option> 
              <option class="Manila">Port Area: Barangay 649</option> 
              <option class="Manila">Port Area: Barangay 650</option> 
              <option class="Manila">Port Area: Barangay 651</option> 
              <option class="Manila">Port Area: Barangay 652</option> 
              <option class="Manila">Port Area: Barangay 653</option> 
              <option class="Manila">Quiapo: Barangay 306</option> 
              <option class="Manila">Quiapo: Barangay 307</option> 
              <option class="Manila">Quiapo: Barangay 308</option> 
              <option class="Manila">Quiapo: Barangay 309</option> 
              <option class="Manila">Quiapo: Barangay 383</option> 
              <option class="Manila">Quiapo: Barangay 384</option> 
              <option class="Manila">Quiapo: Barangay 385</option> 
              <option class="Manila">Quiapo: Barangay 386</option> 
              <option class="Manila">Quiapo: Barangay 387</option> 
              <option class="Manila">Quiapo: Barangay 388</option> 
              <option class="Manila">Quiapo: Barangay 389</option> 
              <option class="Manila">Quiapo: Barangay 390</option> 
              <option class="Manila">Quiapo: Barangay 391</option> 
              <option class="Manila">Quiapo: Barangay 392</option> 
              <option class="Manila">Quiapo: Barangay 393</option> 
              <option class="Manila">Quiapo: Barangay 394</option> 
              <option class="Manila">Sampaloc: Barangay 395</option> 
              <option class="Manila">Sampaloc: Barangay 396</option> 
              <option class="Manila">Sampaloc: Barangay 397</option> 
              <option class="Manila">Sampaloc: Barangay 398</option> 
              <option class="Manila">Sampaloc: Barangay 399</option> 
              <option class="Manila">Sampaloc: Barangay 400</option> 
              <option class="Manila">Sampaloc: Barangay 401</option> 
              <option class="Manila">Sampaloc: Barangay 402</option> 
              <option class="Manila">Sampaloc: Barangay 403</option> 
              <option class="Manila">Sampaloc: Barangay 404</option> 
              <option class="Manila">Sampaloc: Barangay 405</option> 
              <option class="Manila">Sampaloc: Barangay 406</option> 
              <option class="Manila">Sampaloc: Barangay 407</option> 
              <option class="Manila">Sampaloc: Barangay 408</option> 
              <option class="Manila">Sampaloc: Barangay 409</option> 
              <option class="Manila">Sampaloc: Barangay 410</option> 
              <option class="Manila">Sampaloc: Barangay 411</option> 
              <option class="Manila">Sampaloc: Barangay 412</option> 
              <option class="Manila">Sampaloc: Barangay 413</option> 
              <option class="Manila">Sampaloc: Barangay 414</option> 
              <option class="Manila">Sampaloc: Barangay 415</option> 
              <option class="Manila">Sampaloc: Barangay 416</option> 
              <option class="Manila">Sampaloc: Barangay 417</option> 
              <option class="Manila">Sampaloc: Barangay 418</option> 
              <option class="Manila">Sampaloc: Barangay 419</option> 
              <option class="Manila">Sampaloc: Barangay 420</option> 
              <option class="Manila">Sampaloc: Barangay 421</option> 
              <option class="Manila">Sampaloc: Barangay 422</option> 
              <option class="Manila">Sampaloc: Barangay 423</option> 
              <option class="Manila">Sampaloc: Barangay 424</option> 
              <option class="Manila">Sampaloc: Barangay 425</option> 
              <option class="Manila">Sampaloc: Barangay 426</option> 
              <option class="Manila">Sampaloc: Barangay 427</option> 
              <option class="Manila">Sampaloc: Barangay 428</option> 
              <option class="Manila">Sampaloc: Barangay 429</option> 
              <option class="Manila">Sampaloc: Barangay 430</option> 
              <option class="Manila">Sampaloc: Barangay 431</option> 
              <option class="Manila">Sampaloc: Barangay 432</option> 
              <option class="Manila">Sampaloc: Barangay 433</option> 
              <option class="Manila">Sampaloc: Barangay 434</option> 
              <option class="Manila">Sampaloc: Barangay 435</option> 
              <option class="Manila">Sampaloc: Barangay 436</option> 
              <option class="Manila">Sampaloc: Barangay 437</option> 
              <option class="Manila">Sampaloc: Barangay 438</option> 
              <option class="Manila">Sampaloc: Barangay 439</option> 
              <option class="Manila">Sampaloc: Barangay 440</option> 
              <option class="Manila">Sampaloc: Barangay 441</option> 
              <option class="Manila">Sampaloc: Barangay 442</option> 
              <option class="Manila">Sampaloc: Barangay 443</option> 
              <option class="Manila">Sampaloc: Barangay 444</option> 
              <option class="Manila">Sampaloc: Barangay 445</option> 
              <option class="Manila">Sampaloc: Barangay 446</option> 
              <option class="Manila">Sampaloc: Barangay 447</option> 
              <option class="Manila">Sampaloc: Barangay 448</option> 
              <option class="Manila">Sampaloc: Barangay 449</option> 
              <option class="Manila">Sampaloc: Barangay 450</option> 
              <option class="Manila">Sampaloc: Barangay 451</option> 
              <option class="Manila">Sampaloc: Barangay 452</option> 
              <option class="Manila">Sampaloc: Barangay 453</option> 
              <option class="Manila">Sampaloc: Barangay 454</option> 
              <option class="Manila">Sampaloc: Barangay 455</option> 
              <option class="Manila">Sampaloc: Barangay 456</option> 
              <option class="Manila">Sampaloc: Barangay 457</option> 
              <option class="Manila">Sampaloc: Barangay 458</option> 
              <option class="Manila">Sampaloc: Barangay 459</option> 
              <option class="Manila">Sampaloc: Barangay 460</option> 
              <option class="Manila">Sampaloc: Barangay 461</option> 
              <option class="Manila">Sampaloc: Barangay 462</option> 
              <option class="Manila">Sampaloc: Barangay 463</option> 
              <option class="Manila">Sampaloc: Barangay 464</option> 
              <option class="Manila">Sampaloc: Barangay 465</option> 
              <option class="Manila">Sampaloc: Barangay 466</option> 
              <option class="Manila">Sampaloc: Barangay 467</option> 
              <option class="Manila">Sampaloc: Barangay 468</option> 
              <option class="Manila">Sampaloc: Barangay 469</option> 
              <option class="Manila">Sampaloc: Barangay 470</option> 
              <option class="Manila">Sampaloc: Barangay 471</option> 
              <option class="Manila">Sampaloc: Barangay 472</option> 
              <option class="Manila">Sampaloc: Barangay 473</option> 
              <option class="Manila">Sampaloc: Barangay 474</option> 
              <option class="Manila">Sampaloc: Barangay 475</option> 
              <option class="Manila">Sampaloc: Barangay 476</option> 
              <option class="Manila">Sampaloc: Barangay 477</option> 
              <option class="Manila">Sampaloc: Barangay 478</option> 
              <option class="Manila">Sampaloc: Barangay 479</option> 
              <option class="Manila">Sampaloc: Barangay 480</option> 
              <option class="Manila">Sampaloc: Barangay 481</option> 
              <option class="Manila">Sampaloc: Barangay 482</option> 
              <option class="Manila">Sampaloc: Barangay 483</option> 
              <option class="Manila">Sampaloc: Barangay 484</option> 
              <option class="Manila">Sampaloc: Barangay 485</option> 
              <option class="Manila">Sampaloc: Barangay 485</option> 
              <option class="Manila">Sampaloc: Barangay 486</option> 
              <option class="Manila">Sampaloc: Barangay 487</option> 
              <option class="Manila">Sampaloc: Barangay 488</option> 
              <option class="Manila">Sampaloc: Barangay 489</option> 
              <option class="Manila">Sampaloc: Barangay 490</option> 
              <option class="Manila">Sampaloc: Barangay 491</option> 
              <option class="Manila">Sampaloc: Barangay 492</option> 
              <option class="Manila">Sampaloc: Barangay 493</option> 
              <option class="Manila">Sampaloc: Barangay 494</option> 
              <option class="Manila">Sampaloc: Barangay 495</option> 
              <option class="Manila">Sampaloc: Barangay 496</option> 
              <option class="Manila">Sampaloc: Barangay 497</option> 
              <option class="Manila">Sampaloc: Barangay 498</option> 
              <option class="Manila">Sampaloc: Barangay 499</option> 
              <option class="Manila">Sampaloc: Barangay 500</option> 
              <option class="Manila">Sampaloc: Barangay 501</option> 
              <option class="Manila">Sampaloc: Barangay 502</option> 
              <option class="Manila">Sampaloc: Barangay 503</option> 
              <option class="Manila">Sampaloc: Barangay 504</option> 
              <option class="Manila">Sampaloc: Barangay 505</option> 
              <option class="Manila">Sampaloc: Barangay 506</option> 
              <option class="Manila">Sampaloc: Barangay 507</option> 
              <option class="Manila">Sampaloc: Barangay 508</option> 
              <option class="Manila">Sampaloc: Barangay 509</option> 
              <option class="Manila">Sampaloc: Barangay 510</option> 
              <option class="Manila">Sampaloc: Barangay 511</option> 
              <option class="Manila">Sampaloc: Barangay 512</option> 
              <option class="Manila">Sampaloc: Barangay 513</option> 
              <option class="Manila">Sampaloc: Barangay 514</option> 
              <option class="Manila">Sampaloc: Barangay 515</option> 
              <option class="Manila">Sampaloc: Barangay 516</option> 
              <option class="Manila">Sampaloc: Barangay 517</option> 
              <option class="Manila">Sampaloc: Barangay 518</option> 
              <option class="Manila">Sampaloc: Barangay 519</option> 
              <option class="Manila">Sampaloc: Barangay 520</option> 
              <option class="Manila">Sampaloc: Barangay 521</option> 
              <option class="Manila">Sampaloc: Barangay 522</option> 
              <option class="Manila">Sampaloc: Barangay 523</option> 
              <option class="Manila">Sampaloc: Barangay 524</option> 
              <option class="Manila">Sampaloc: Barangay 525</option> 
              <option class="Manila">Sampaloc: Barangay 526</option> 
              <option class="Manila">Sampaloc: Barangay 527</option> 
              <option class="Manila">Sampaloc: Barangay 528</option> 
              <option class="Manila">Sampaloc: Barangay 529</option> 
              <option class="Manila">Sampaloc: Barangay 530</option> 
              <option class="Manila">Sampaloc: Barangay 531</option> 
              <option class="Manila">Sampaloc: Barangay 532</option> 
              <option class="Manila">Sampaloc: Barangay 533</option> 
              <option class="Manila">Sampaloc: Barangay 534</option> 
              <option class="Manila">Sampaloc: Barangay 535</option> 
              <option class="Manila">Sampaloc: Barangay 536</option> 
              <option class="Manila">Sampaloc: Barangay 537</option> 
              <option class="Manila">Sampaloc: Barangay 538</option> 
              <option class="Manila">Sampaloc: Barangay 539</option> 
              <option class="Manila">Sampaloc: Barangay 540</option> 
              <option class="Manila">Sampaloc: Barangay 541</option> 
              <option class="Manila">Sampaloc: Barangay 542</option> 
              <option class="Manila">Sampaloc: Barangay 543</option> 
              <option class="Manila">Sampaloc: Barangay 544</option> 
              <option class="Manila">Sampaloc: Barangay 545</option> 
              <option class="Manila">Sampaloc: Barangay 546</option> 
              <option class="Manila">Sampaloc: Barangay 547</option> 
              <option class="Manila">Sampaloc: Barangay 548</option> 
              <option class="Manila">Sampaloc: Barangay 549</option> 
              <option class="Manila">Sampaloc: Barangay 550</option> 
              <option class="Manila">Sampaloc: Barangay 551</option> 
              <option class="Manila">Sampaloc: Barangay 552</option> 
              <option class="Manila">Sampaloc: Barangay 553</option> 
              <option class="Manila">Sampaloc: Barangay 554</option> 
              <option class="Manila">Sampaloc: Barangay 555</option> 
              <option class="Manila">Sampaloc: Barangay 556</option> 
              <option class="Manila">Sampaloc: Barangay 557</option> 
              <option class="Manila">Sampaloc: Barangay 558</option> 
              <option class="Manila">Sampaloc: Barangay 559</option> 
              <option class="Manila">Sampaloc: Barangay 560</option> 
              <option class="Manila">Sampaloc: Barangay 561</option> 
              <option class="Manila">Sampaloc: Barangay 562</option> 
              <option class="Manila">Sampaloc: Barangay 563</option> 
              <option class="Manila">Sampaloc: Barangay 564</option> 
              <option class="Manila">Sampaloc: Barangay 565</option> 
              <option class="Manila">Sampaloc: Barangay 566</option> 
              <option class="Manila">Sampaloc: Barangay 567</option> 
              <option class="Manila">Sampaloc: Barangay 568</option> 
              <option class="Manila">Sampaloc: Barangay 569</option> 
              <option class="Manila">Sampaloc: Barangay 570</option> 
              <option class="Manila">Sampaloc: Barangay 571</option> 
              <option class="Manila">Sampaloc: Barangay 572</option> 
              <option class="Manila">Sampaloc: Barangay 573</option> 
              <option class="Manila">Sampaloc: Barangay 574</option> 
              <option class="Manila">Sampaloc: Barangay 575</option> 
              <option class="Manila">Sampaloc: Barangay 576</option> 
              <option class="Manila">Sampaloc: Barangay 577</option> 
              <option class="Manila">Sampaloc: Barangay 578</option> 
              <option class="Manila">Sampaloc: Barangay 579</option> 
              <option class="Manila">Sampaloc: Barangay 580</option> 
              <option class="Manila">Sampaloc: Barangay 581</option> 
              <option class="Manila">Sampaloc: Barangay 582</option> 
              <option class="Manila">Sampaloc: Barangay 583</option> 
              <option class="Manila">Sampaloc: Barangay 584</option> 
              <option class="Manila">Sampaloc: Barangay 585</option> 
              <option class="Manila">Sampaloc: Barangay 586</option> 
              <option class="Manila">Sampaloc: Barangay 587</option> 
              <option class="Manila">Sampaloc: Barangay 587-A</option> 
              <option class="Manila">Sampaloc: Barangay 588</option> 
              <option class="Manila">Sampaloc: Barangay 589</option> 
              <option class="Manila">Sampaloc: Barangay 590</option> 
              <option class="Manila">Sampaloc: Barangay 591</option> 
              <option class="Manila">Sampaloc: Barangay 592</option> 
              <option class="Manila">Sampaloc: Barangay 593</option> 
              <option class="Manila">Sampaloc: Barangay 594</option> 
              <option class="Manila">Sampaloc: Barangay 595</option> 
              <option class="Manila">Sampaloc: Barangay 596</option> 
              <option class="Manila">Sampaloc: Barangay 597</option> 
              <option class="Manila">Sampaloc: Barangay 598</option> 
              <option class="Manila">Sampaloc: Barangay 599</option> 
              <option class="Manila">Sampaloc: Barangay 600</option> 
              <option class="Manila">Sampaloc: Barangay 601</option> 
              <option class="Manila">Sampaloc: Barangay 602</option> 
              <option class="Manila">Sampaloc: Barangay 603</option> 
              <option class="Manila">Sampaloc: Barangay 604</option> 
              <option class="Manila">Sampaloc: Barangay 605</option> 
              <option class="Manila">Sampaloc: Barangay 606</option> 
              <option class="Manila">Sampaloc: Barangay 607</option> 
              <option class="Manila">Sampaloc: Barangay 608</option> 
              <option class="Manila">Sampaloc: Barangay 609</option> 
              <option class="Manila">Sampaloc: Barangay 610</option> 
              <option class="Manila">Sampaloc: Barangay 611</option> 
              <option class="Manila">Sampaloc: Barangay 612</option> 
              <option class="Manila">Sampaloc: Barangay 613</option> 
              <option class="Manila">Sampaloc: Barangay 614</option> 
              <option class="Manila">Sampaloc: Barangay 615</option> 
              <option class="Manila">Sampaloc: Barangay 616</option> 
              <option class="Manila">Sampaloc: Barangay 617</option> 
              <option class="Manila">Sampaloc: Barangay 618</option> 
              <option class="Manila">Sampaloc: Barangay 619</option> 
              <option class="Manila">Sampaloc: Barangay 620</option> 
              <option class="Manila">Sampaloc: Barangay 621</option> 
              <option class="Manila">Sampaloc: Barangay 622</option> 
              <option class="Manila">Sampaloc: Barangay 623</option> 
              <option class="Manila">Sampaloc: Barangay 624</option> 
              <option class="Manila">Sampaloc: Barangay 625</option> 
              <option class="Manila">Sampaloc: Barangay 626</option> 
              <option class="Manila">Sampaloc: Barangay 627</option> 
              <option class="Manila">Sampaloc: Barangay 628</option> 
              <option class="Manila">Sampaloc: Barangay 629</option> 
              <option class="Manila">Sampaloc: Barangay 630</option> 
              <option class="Manila">Sampaloc: Barangay 631</option> 
              <option class="Manila">Sampaloc: Barangay 632</option> 
              <option class="Manila">Sampaloc: Barangay 633</option> 
              <option class="Manila">Sampaloc: Barangay 634</option> 
              <option class="Manila">Sampaloc: Barangay 635</option> 
              <option class="Manila">Sampaloc: Barangay 636</option> 
              <option class="Manila">San Miguel: Barangay 637</option> 
              <option class="Manila">San Miguel: Barangay 638</option> 
              <option class="Manila">San Miguel: Barangay 639</option> 
              <option class="Manila">San Miguel: Barangay 640</option> 
              <option class="Manila">San Miguel: Barangay 641</option> 
              <option class="Manila">San Miguel: Barangay 642</option> 
              <option class="Manila">San Miguel: Barangay 643</option> 
              <option class="Manila">San Miguel: Barangay 644</option> 
              <option class="Manila">San Miguel: Barangay 645</option> 
              <option class="Manila">San Miguel: Barangay 646</option> 
              <option class="Manila">San Miguel: Barangay 647</option> 
              <option class="Manila">San Miguel: Barangay 648</option> 
              <option class="Manila">San Nicolas: Barangay 268</option> 
              <option class="Manila">San Nicolas: Barangay 269</option> 
              <option class="Manila">San Nicolas: Barangay 270</option> 
              <option class="Manila">San Nicolas: Barangay 271</option> 
              <option class="Manila">San Nicolas: Barangay 272</option> 
              <option class="Manila">San Nicolas: Barangay 273</option> 
              <option class="Manila">San Nicolas: Barangay 274</option> 
              <option class="Manila">San Nicolas: Barangay 275</option> 
              <option class="Manila">San Nicolas: Barangay 276</option> 
              <option class="Manila">San Nicolas: Barangay 281</option> 
              <option class="Manila">San Nicolas: Barangay 282</option> 
              <option class="Manila">San Nicolas: Barangay 283</option> 
              <option class="Manila">San Nicolas: Barangay 284</option> 
              <option class="Manila">San Nicolas: Barangay 285</option> 
              <option class="Manila">San Nicolas: Barangay 286</option> 
              <option class="Manila">Santa Ana: Barangay 745</option> 
              <option class="Manila">Santa Ana: Barangay 746</option> 
              <option class="Manila">Santa Ana: Barangay 747</option> 
              <option class="Manila">Santa Ana: Barangay 748</option> 
              <option class="Manila">Santa Ana: Barangay 749</option> 
              <option class="Manila">Santa Ana: Barangay 750</option> 
              <option class="Manila">Santa Ana: Barangay 751</option> 
              <option class="Manila">Santa Ana: Barangay 752</option> 
              <option class="Manila">Santa Ana: Barangay 753</option> 
              <option class="Manila">Santa Ana: Barangay 754</option> 
              <option class="Manila">Santa Ana: Barangay 755</option> 
              <option class="Manila">Santa Ana: Barangay 756</option> 
              <option class="Manila">Santa Ana: Barangay 757</option> 
              <option class="Manila">Santa Ana: Barangay 758</option> 
              <option class="Manila">Santa Ana: Barangay 759</option> 
              <option class="Manila">Santa Ana: Barangay 760</option> 
              <option class="Manila">Santa Ana: Barangay 761</option> 
              <option class="Manila">Santa Ana: Barangay 762</option> 
              <option class="Manila">Santa Ana: Barangay 763</option> 
              <option class="Manila">Santa Ana: Barangay 764</option> 
              <option class="Manila">Santa Ana: Barangay 765</option> 
              <option class="Manila">Santa Ana: Barangay 766</option> 
              <option class="Manila">Santa Ana: Barangay 767</option> 
              <option class="Manila">Santa Ana: Barangay 768</option> 
              <option class="Manila">Santa Ana: Barangay 769</option> 
              <option class="Manila">Santa Ana: Barangay 770</option> 
              <option class="Manila">Santa Ana: Barangay 771</option> 
              <option class="Manila">Santa Ana: Barangay 772</option> 
              <option class="Manila">Santa Ana: Barangay 773</option> 
              <option class="Manila">Santa Ana: Barangay 774</option> 
              <option class="Manila">Santa Ana: Barangay 775</option> 
              <option class="Manila">Santa Ana: Barangay 776</option> 
              <option class="Manila">Santa Ana: Barangay 777</option> 
              <option class="Manila">Santa Ana: Barangay 778</option> 
              <option class="Manila">Santa Ana: Barangay 779</option> 
              <option class="Manila">Santa Ana: Barangay 780</option> 
              <option class="Manila">Santa Ana: Barangay 781</option> 
              <option class="Manila">Santa Ana: Barangay 782</option> 
              <option class="Manila">Santa Ana: Barangay 783</option> 
              <option class="Manila">Santa Ana: Barangay 784</option> 
              <option class="Manila">Santa Ana: Barangay 785</option> 
              <option class="Manila">Santa Ana: Barangay 786</option> 
              <option class="Manila">Santa Ana: Barangay 787</option> 
              <option class="Manila">Santa Ana: Barangay 788</option> 
              <option class="Manila">Santa Ana: Barangay 789</option> 
              <option class="Manila">Santa Ana: Barangay 790</option> 
              <option class="Manila">Santa Ana: Barangay 791</option> 
              <option class="Manila">Santa Ana: Barangay 792</option> 
              <option class="Manila">Santa Ana: Barangay 793</option> 
              <option class="Manila">Santa Ana: Barangay 794</option> 
              <option class="Manila">Santa Ana: Barangay 795</option> 
              <option class="Manila">Santa Ana: Barangay 796</option> 
              <option class="Manila">Santa Ana: Barangay 797</option> 
              <option class="Manila">Santa Ana: Barangay 798</option> 
              <option class="Manila">Santa Ana: Barangay 799</option> 
              <option class="Manila">Santa Ana: Barangay 800</option> 
              <option class="Manila">Santa Ana: Barangay 801</option> 
              <option class="Manila">Santa Ana: Barangay 803</option> 
              <option class="Manila">Santa Ana: Barangay 804</option> 
              <option class="Manila">Santa Ana: Barangay 805</option> 
              <option class="Manila">Santa Ana: Barangay 806</option> 
              <option class="Manila">Santa Ana: Barangay 807</option> 
              <option class="Manila">Santa Ana: Barangay 808</option> 
              <option class="Manila">Santa Ana: Barangay 818-A</option> 
              <option class="Manila">Santa Ana: Barangay 866</option> 
              <option class="Manila">Santa Ana: Barangay 873</option> 
              <option class="Manila">Santa Ana: Barangay 874</option> 
              <option class="Manila">Santa Ana: Barangay 875</option> 
              <option class="Manila">Santa Ana: Barangay 876</option> 
              <option class="Manila">Santa Ana: Barangay 877</option> 
              <option class="Manila">Santa Ana: Barangay 878</option> 
              <option class="Manila">Santa Ana: Barangay 879</option> 
              <option class="Manila">Santa Ana: Barangay 880</option> 
              <option class="Manila">Santa Ana: Barangay 881</option> 
              <option class="Manila">Santa Ana: Barangay 882</option> 
              <option class="Manila">Santa Ana: Barangay 883</option> 
              <option class="Manila">Santa Ana: Barangay 884</option> 
              <option class="Manila">Santa Ana: Barangay 885</option> 
              <option class="Manila">Santa Ana: Barangay 886</option> 
              <option class="Manila">Santa Ana: Barangay 887</option> 
              <option class="Manila">Santa Ana: Barangay 888</option> 
              <option class="Manila">Santa Ana: Barangay 889</option> 
              <option class="Manila">Santa Ana: Barangay 890</option> 
              <option class="Manila">Santa Ana: Barangay 891</option> 
              <option class="Manila">Santa Ana: Barangay 892</option> 
              <option class="Manila">Santa Ana: Barangay 893</option> 
              <option class="Manila">Santa Ana: Barangay 894</option> 
              <option class="Manila">Santa Ana: Barangay 895</option> 
              <option class="Manila">Santa Ana: Barangay 896</option> 
              <option class="Manila">Santa Ana: Barangay 897</option> 
              <option class="Manila">Santa Ana: Barangay 898</option> 
              <option class="Manila">Santa Ana: Barangay 899</option> 
              <option class="Manila">Santa Ana: Barangay 900</option> 
              <option class="Manila">Santa Ana: Barangay 901</option> 
              <option class="Manila">Santa Ana: Barangay 902</option> 
              <option class="Manila">Santa Ana: Barangay 903</option> 
              <option class="Manila">Santa Ana: Barangay 904</option> 
              <option class="Manila">Santa Ana: Barangay 905</option> 
              <option class="Manila">Santa Cruz: Barangay 297</option> 
              <option class="Manila">Santa Cruz: Barangay 298</option> 
              <option class="Manila">Santa Cruz: Barangay 299</option> 
              <option class="Manila">Santa Cruz: Barangay 300</option> 
              <option class="Manila">Santa Cruz: Barangay 301</option> 
              <option class="Manila">Santa Cruz: Barangay 302</option>    
              <option class="Manila">Santa Cruz: Barangay 303</option> 
              <option class="Manila">Santa Cruz: Barangay 304</option> 
              <option class="Manila">Santa Cruz: Barangay 305</option> 
              <option class="Manila">Santa Cruz: Barangay 306</option> 
              <option class="Manila">Santa Cruz: Barangay 307</option> 
              <option class="Manila">Santa Cruz: Barangay 308</option> 
              <option class="Manila">Santa Cruz: Barangay 309</option> 
              <option class="Manila">Santa Cruz: Barangay 310</option> 
              <option class="Manila">Santa Cruz: Barangay 311</option> 
              <option class="Manila">Santa Cruz: Barangay 312</option> 
              <option class="Manila">Santa Cruz: Barangay 313</option> 
              <option class="Manila">Santa Cruz: Barangay 314</option> 
              <option class="Manila">Santa Cruz: Barangay 315</option> 
              <option class="Manila">Santa Cruz: Barangay 316</option> 
              <option class="Manila">Santa Cruz: Barangay 317</option> 
              <option class="Manila">Santa Cruz: Barangay 318</option> 
              <option class="Manila">Santa Cruz: Barangay 319</option> 
              <option class="Manila">Santa Cruz: Barangay 320</option> 
              <option class="Manila">Santa Cruz: Barangay 321</option> 
              <option class="Manila">Santa Cruz: Barangay 322</option> 
              <option class="Manila">Santa Cruz: Barangay 323</option> 
              <option class="Manila">Santa Cruz: Barangay 324</option> 
              <option class="Manila">Santa Cruz: Barangay 325</option> 
              <option class="Manila">Santa Cruz: Barangay 326</option> 
              <option class="Manila">Santa Cruz: Barangay 327</option> 
              <option class="Manila">Santa Cruz: Barangay 328</option>    
              <option class="Manila">Santa Cruz: Barangay 329</option> 
              <option class="Manila">Santa Cruz: Barangay 330</option> 
              <option class="Manila">Santa Cruz: Barangay 331</option> 
              <option class="Manila">Santa Cruz: Barangay 332</option> 
              <option class="Manila">Santa Cruz: Barangay 333</option> 
              <option class="Manila">Santa Cruz: Barangay 334</option> 
              <option class="Manila">Santa Cruz: Barangay 335</option> 
              <option class="Manila">Santa Cruz: Barangay 336</option> 
              <option class="Manila">Santa Cruz: Barangay 337</option> 
              <option class="Manila">Santa Cruz: Barangay 338</option> 
              <option class="Manila">Santa Cruz: Barangay 339</option> 
              <option class="Manila">Santa Cruz: Barangay 340</option> 
              <option class="Manila">Santa Cruz: Barangay 341</option> 
              <option class="Manila">Santa Cruz: Barangay 342</option> 
              <option class="Manila">Santa Cruz: Barangay 343</option> 
              <option class="Manila">Santa Cruz: Barangay 344</option> 
              <option class="Manila">Santa Cruz: Barangay 345</option> 
              <option class="Manila">Santa Cruz: Barangay 346</option> 
              <option class="Manila">Santa Cruz: Barangay 347</option> 
              <option class="Manila">Santa Cruz: Barangay 348</option> 
              <option class="Manila">Santa Cruz: Barangay 349</option> 
              <option class="Manila">Santa Cruz: Barangay 350</option> 
              <option class="Manila">Santa Cruz: Barangay 351</option> 
              <option class="Manila">Santa Cruz: Barangay 352</option> 
              <option class="Manila">Santa Cruz: Barangay 353</option> 
              <option class="Manila">Santa Cruz: Barangay 354</option>    
              <option class="Manila">Santa Cruz: Barangay 355</option> 
              <option class="Manila">Santa Cruz: Barangay 356</option> 
              <option class="Manila">Santa Cruz: Barangay 357</option> 
              <option class="Manila">Santa Cruz: Barangay 358</option> 
              <option class="Manila">Santa Cruz: Barangay 359</option> 
              <option class="Manila">Santa Cruz: Barangay 360</option> 
              <option class="Manila">Santa Cruz: Barangay 361</option> 
              <option class="Manila">Santa Cruz: Barangay 362</option> 
              <option class="Manila">Santa Cruz: Barangay 363</option> 
              <option class="Manila">Santa Cruz: Barangay 364</option> 
              <option class="Manila">Santa Cruz: Barangay 365</option> 
              <option class="Manila">Santa Cruz: Barangay 366</option> 
              <option class="Manila">Santa Cruz: Barangay 367</option> 
              <option class="Manila">Santa Cruz: Barangay 368</option> 
              <option class="Manila">Santa Cruz: Barangay 369</option> 
              <option class="Manila">Santa Cruz: Barangay 370</option> 
              <option class="Manila">Santa Cruz: Barangay 371</option> 
              <option class="Manila">Santa Cruz: Barangay 372</option> 
              <option class="Manila">Santa Cruz: Barangay 373</option> 
              <option class="Manila">Santa Cruz: Barangay 374</option> 
              <option class="Manila">Santa Cruz: Barangay 375</option> 
              <option class="Manila">Santa Cruz: Barangay 376</option> 
              <option class="Manila">Santa Cruz: Barangay 377</option> 
              <option class="Manila">Santa Cruz: Barangay 378</option> 
              <option class="Manila">Santa Cruz: Barangay 379</option> 
              <option class="Manila">Santa Cruz: Barangay 380</option> 
              <option class="Manila">Santa Cruz: Barangay 381</option> 
              <option class="Manila">Santa Cruz: Barangay 382</option> 
              <option class="Manila">Tondo: Barangay 1</option>    
              <option class="Manila">Tondo: Barangay 2</option> 
              <option class="Manila">Tondo: Barangay 3</option> 
              <option class="Manila">Tondo: Barangay 4</option> 
              <option class="Manila">Tondo: Barangay 5</option> 
              <option class="Manila">Tondo: Barangay 6</option> 
              <option class="Manila">Tondo: Barangay 7</option> 
              <option class="Manila">Tondo: Barangay 8</option> 
              <option class="Manila">Tondo: Barangay 9</option> 
              <option class="Manila">Tondo: Barangay 10</option> 
              <option class="Manila">Tondo: Barangay 11</option> 
              <option class="Manila">Tondo: Barangay 12</option> 
              <option class="Manila">Tondo: Barangay 13</option> 
              <option class="Manila">Tondo: Barangay 14</option> 
              <option class="Manila">Tondo: Barangay 15</option> 
              <option class="Manila">Tondo: Barangay 16</option> 
              <option class="Manila">Tondo: Barangay 17</option> 
              <option class="Manila">Tondo: Barangay 18</option> 
              <option class="Manila">Tondo: Barangay 19</option> 
              <option class="Manila">Tondo: Barangay 20</option> 
              <option class="Manila">Tondo: Barangay 21</option> 
              <option class="Manila">Tondo: Barangay 22</option> 
              <option class="Manila">Tondo: Barangay 23</option> 
              <option class="Manila">Tondo: Barangay 24</option> 
              <option class="Manila">Tondo: Barangay 25</option> 
              <option class="Manila">Tondo: Barangay 26</option> 
              <option class="Manila">Tondo: Barangay 27</option>    
              <option class="Manila">Tondo: Barangay 28</option>    
              <option class="Manila">Tondo: Barangay 29</option> 
              <option class="Manila">Tondo: Barangay 30</option> 
              <option class="Manila">Tondo: Barangay 31</option> 
              <option class="Manila">Tondo: Barangay 32</option> 
              <option class="Manila">Tondo: Barangay 33</option> 
              <option class="Manila">Tondo: Barangay 34</option> 
              <option class="Manila">Tondo: Barangay 35</option> 
              <option class="Manila">Tondo: Barangay 36</option> 
              <option class="Manila">Tondo: Barangay 37</option> 
              <option class="Manila">Tondo: Barangay 38</option> 
              <option class="Manila">Tondo: Barangay 39</option> 
              <option class="Manila">Tondo: Barangay 40</option> 
              <option class="Manila">Tondo: Barangay 41</option> 
              <option class="Manila">Tondo: Barangay 42</option> 
              <option class="Manila">Tondo: Barangay 43</option> 
              <option class="Manila">Tondo: Barangay 44</option> 
              <option class="Manila">Tondo: Barangay 45</option> 
              <option class="Manila">Tondo: Barangay 46</option> 
              <option class="Manila">Tondo: Barangay 47</option> 
              <option class="Manila">Tondo: Barangay 48</option> 
              <option class="Manila">Tondo: Barangay 49</option> 
              <option class="Manila">Tondo: Barangay 50</option> 
              <option class="Manila">Tondo: Barangay 51</option> 
              <option class="Manila">Tondo: Barangay 52</option> 
              <option class="Manila">Tondo: Barangay 53</option> 
              <option class="Manila">Tondo: Barangay 54</option>    
              <option class="Manila">Tondo: Barangay 55</option>    
              <option class="Manila">Tondo: Barangay 56</option> 
              <option class="Manila">Tondo: Barangay 57</option> 
              <option class="Manila">Tondo: Barangay 58</option> 
              <option class="Manila">Tondo: Barangay 59</option> 
              <option class="Manila">Tondo: Barangay 60</option> 
              <option class="Manila">Tondo: Barangay 61</option> 
              <option class="Manila">Tondo: Barangay 62</option> 
              <option class="Manila">Tondo: Barangay 63</option> 
              <option class="Manila">Tondo: Barangay 64</option> 
              <option class="Manila">Tondo: Barangay 65</option> 
              <option class="Manila">Tondo: Barangay 66</option> 
              <option class="Manila">Tondo: Barangay 67</option> 
              <option class="Manila">Tondo: Barangay 68</option> 
              <option class="Manila">Tondo: Barangay 69</option> 
              <option class="Manila">Tondo: Barangay 70</option> 
              <option class="Manila">Tondo: Barangay 71</option> 
              <option class="Manila">Tondo: Barangay 72</option> 
              <option class="Manila">Tondo: Barangay 73</option> 
              <option class="Manila">Tondo: Barangay 74</option> 
              <option class="Manila">Tondo: Barangay 75</option> 
              <option class="Manila">Tondo: Barangay 76</option> 
              <option class="Manila">Tondo: Barangay 77</option> 
              <option class="Manila">Tondo: Barangay 78</option> 
              <option class="Manila">Tondo: Barangay 79</option> 
              <option class="Manila">Tondo: Barangay 80</option> 
              <option class="Manila">Tondo: Barangay 81</option>  
              <option class="Manila">Tondo: Barangay 82</option>  
              <option class="Manila">Tondo: Barangay 83</option> 
              <option class="Manila">Tondo: Barangay 84</option> 
              <option class="Manila">Tondo: Barangay 83</option> 
              <option class="Manila">Tondo: Barangay 84</option> 
              <option class="Manila">Tondo: Barangay 85</option> 
              <option class="Manila">Tondo: Barangay 86</option> 
              <option class="Manila">Tondo: Barangay 87</option> 
              <option class="Manila">Tondo: Barangay 88</option> 
              <option class="Manila">Tondo: Barangay 89</option> 
              <option class="Manila">Tondo: Barangay 90</option> 
              <option class="Manila">Tondo: Barangay 91</option> 
              <option class="Manila">Tondo: Barangay 92</option> 
              <option class="Manila">Tondo: Barangay 93</option> 
              <option class="Manila">Tondo: Barangay 94</option> 
              <option class="Manila">Tondo: Barangay 95</option> 
              <option class="Manila">Tondo: Barangay 96</option> 
              <option class="Manila">Tondo: Barangay 97</option> 
              <option class="Manila">Tondo: Barangay 98</option> 
              <option class="Manila">Tondo: Barangay 99</option> 
              <option class="Manila">Tondo: Barangay 100</option> 
              <option class="Manila">Tondo: Barangay 101</option> 
              <option class="Manila">Tondo: Barangay 102</option> 
              <option class="Manila">Tondo: Barangay 103</option> 
              <option class="Manila">Tondo: Barangay 104</option> 
              <option class="Manila">Tondo: Barangay 105</option> 
              <option class="Manila">Tondo: Barangay 106</option>
              <option class="Manila">Tondo: Barangay 107</option> 
              <option class="Manila">Tondo: Barangay 108</option> 
              <option class="Manila">Tondo: Barangay 109</option> 
              <option class="Manila">Tondo: Barangay 110</option> 
              <option class="Manila">Tondo: Barangay 111</option> 
              <option class="Manila">Tondo: Barangay 112</option> 
              <option class="Manila">Tondo: Barangay 113</option> 
              <option class="Manila">Tondo: Barangay 114</option> 
              <option class="Manila">Tondo: Barangay 115</option> 
              <option class="Manila">Tondo: Barangay 116</option> 
              <option class="Manila">Tondo: Barangay 117</option> 
              <option class="Manila">Tondo: Barangay 118</option> 
              <option class="Manila">Tondo: Barangay 119</option> 
              <option class="Manila">Tondo: Barangay 120</option>             
              <option class="Manila">Tondo: Barangay 121</option> 
              <option class="Manila">Tondo: Barangay 122</option> 
              <option class="Manila">Tondo: Barangay 123</option> 
              <option class="Manila">Tondo: Barangay 124</option> 
              <option class="Manila">Tondo: Barangay 125</option> 
              <option class="Manila">Tondo: Barangay 126</option> 
              <option class="Manila">Tondo: Barangay 127</option> 
              <option class="Manila">Tondo: Barangay 128</option> 
              <option class="Manila">Tondo: Barangay 129</option> 
              <option class="Manila">Tondo: Barangay 130</option> 
              <option class="Manila">Tondo: Barangay 131</option> 
              <option class="Manila">Tondo: Barangay 132</option> 
              <option class="Manila">Tondo: Barangay 133</option> 
              <option class="Manila">Tondo: Barangay 134</option>      
              <option class="Manila">Tondo: Barangay 135</option> 
              <option class="Manila">Tondo: Barangay 136</option> 
              <option class="Manila">Tondo: Barangay 137</option> 
              <option class="Manila">Tondo: Barangay 138</option> 
              <option class="Manila">Tondo: Barangay 139</option> 
              <option class="Manila">Tondo: Barangay 140</option> 
              <option class="Manila">Tondo: Barangay 141</option> 
              <option class="Manila">Tondo: Barangay 142</option> 
              <option class="Manila">Tondo: Barangay 143</option> 
              <option class="Manila">Tondo: Barangay 144</option> 
              <option class="Manila">Tondo: Barangay 145</option> 
              <option class="Manila">Tondo: Barangay 146</option> 
              <option class="Manila">Tondo: Barangay 147</option> 
              <option class="Manila">Tondo: Barangay 148</option>  
              <option class="Manila">Tondo: Barangay 149</option> 
              <option class="Manila">Tondo: Barangay 150</option> 
              <option class="Manila">Tondo: Barangay 151</option> 
              <option class="Manila">Tondo: Barangay 152</option> 
              <option class="Manila">Tondo: Barangay 153</option> 
              <option class="Manila">Tondo: Barangay 154</option> 
              <option class="Manila">Tondo: Barangay 155</option> 
              <option class="Manila">Tondo: Barangay 156</option> 
              <option class="Manila">Tondo: Barangay 157</option>      
              <option class="Manila">Tondo: Barangay 158</option> 
              <option class="Manila">Tondo: Barangay 159</option> 
              <option class="Manila">Tondo: Barangay 160</option> 
              <option class="Manila">Tondo: Barangay 161</option> 
              <option class="Manila">Tondo: Barangay 162</option> 
              <option class="Manila">Tondo: Barangay 163</option> 
              <option class="Manila">Tondo: Barangay 164</option> 
              <option class="Manila">Tondo: Barangay 165</option> 
              <option class="Manila">Tondo: Barangay 166</option>      
              <option class="Manila">Tondo: Barangay 167</option> 
              <option class="Manila">Tondo: Barangay 168</option> 
              <option class="Manila">Tondo: Barangay 169</option> 
              <option class="Manila">Tondo: Barangay 170</option> 
              <option class="Manila">Tondo: Barangay 171</option> 
              <option class="Manila">Tondo: Barangay 172</option> 
              <option class="Manila">Tondo: Barangay 173</option> 
              <option class="Manila">Tondo: Barangay 174</option> 
              <option class="Manila">Tondo: Barangay 175</option>      
              <option class="Manila">Tondo: Barangay 176</option> 
              <option class="Manila">Tondo: Barangay 177</option> 
              <option class="Manila">Tondo: Barangay 178</option> 
              <option class="Manila">Tondo: Barangay 179</option> 
              <option class="Manila">Tondo: Barangay 180</option> 
              <option class="Manila">Tondo: Barangay 181</option> 
              <option class="Manila">Tondo: Barangay 182</option> 
              <option class="Manila">Tondo: Barangay 183</option> 
              <option class="Manila">Tondo: Barangay 184</option>      
              <option class="Manila">Tondo: Barangay 185</option> 
              <option class="Manila">Tondo: Barangay 186</option> 
              <option class="Manila">Tondo: Barangay 187</option> 
              <option class="Manila">Tondo: Barangay 188</option> 
              <option class="Manila">Tondo: Barangay 189</option> 
              <option class="Manila">Tondo: Barangay 190</option> 
              <option class="Manila">Tondo: Barangay 191</option> 
              <option class="Manila">Tondo: Barangay 192</option> 
              <option class="Manila">Tondo: Barangay 193</option>      
              <option class="Manila">Tondo: Barangay 194</option> 
              <option class="Manila">Tondo: Barangay 195</option> 
              <option class="Manila">Tondo: Barangay 196</option> 
              <option class="Manila">Tondo: Barangay 197</option>      
              <option class="Manila">Tondo: Barangay 198</option> 
              <option class="Manila">Tondo: Barangay 199</option> 
              <option class="Manila">Tondo: Barangay 200</option> 
              <option class="Manila">Tondo: Barangay 201</option> 
              <option class="Manila">Tondo: Barangay 202</option> 
              <option class="Manila">Tondo: Barangay 202-A</option> 
              <option class="Manila">Tondo: Barangay 203</option> 
              <option class="Manila">Tondo: Barangay 204</option> 
              <option class="Manila">Tondo: Barangay 205</option>      
              <option class="Manila">Tondo: Barangay 206</option> 
              <option class="Manila">Tondo: Barangay 207</option> 
              <option class="Manila">Tondo: Barangay 208</option> 
              <option class="Manila">Tondo: Barangay 209</option>      
              <option class="Manila">Tondo: Barangay 210</option> 
              <option class="Manila">Tondo: Barangay 211</option> 
              <option class="Manila">Tondo: Barangay 212</option> 
              <option class="Manila">Tondo: Barangay 213</option> 
              <option class="Manila">Tondo: Barangay 214</option> 
              <option class="Manila">Tondo: Barangay 215</option> 
              <option class="Manila">Tondo: Barangay 216</option> 
              <option class="Manila">Tondo: Barangay 217</option> 
              <option class="Manila">Tondo: Barangay 218</option>      
              <option class="Manila">Tondo: Barangay 219</option> 
              <option class="Manila">Tondo: Barangay 220</option> 
              <option class="Manila">Tondo: Barangay 221</option> 
              <option class="Manila">Tondo: Barangay 222</option>      
              <option class="Manila">Tondo: Barangay 223</option> 
              <option class="Manila">Tondo: Barangay 224</option> 
              <option class="Manila">Tondo: Barangay 225</option> 
              <option class="Manila">Tondo: Barangay 226</option> 
              <option class="Manila">Tondo: Barangay 227</option> 
              <option class="Manila">Tondo: Barangay 228</option> 
              <option class="Manila">Tondo: Barangay 229</option> 
              <option class="Manila">Tondo: Barangay 230</option> 
              <option class="Manila">Tondo: Barangay 231</option>      
              <option class="Manila">Tondo: Barangay 232</option> 
              <option class="Manila">Tondo: Barangay 233</option> 
              <option class="Manila">Tondo: Barangay 234</option> 
              <option class="Manila">Tondo: Barangay 235</option>      
              <option class="Manila">Tondo: Barangay 236</option> 
              <option class="Manila">Tondo: Barangay 237</option> 
              <option class="Manila">Tondo: Barangay 238</option> 
              <option class="Manila">Tondo: Barangay 239</option> 
              <option class="Manila">Tondo: Barangay 240</option> 
              <option class="Manila">Tondo: Barangay 241</option> 
              <option class="Manila">Tondo: Barangay 242</option> 
              <option class="Manila">Tondo: Barangay 243</option> 
              <option class="Manila">Tondo: Barangay 244</option>  
              <option class="Manila">Tondo: Barangay 245</option> 
              <option class="Manila">Tondo: Barangay 246</option> 
              <option class="Manila">Tondo: Barangay 247</option> 
              <option class="Manila">Tondo: Barangay 248</option> 
              <option class="Manila">Tondo: Barangay 249</option> 
              <option class="Manila">Tondo: Barangay 250</option> 
              <option class="Manila">Tondo: Barangay 251</option> 
              <option class="Manila">Tondo: Barangay 252</option>      
              <option class="Manila">Tondo: Barangay 253</option> 
              <option class="Manila">Tondo: Barangay 254</option> 
              <option class="Manila">Tondo: Barangay 255</option> 
              <option class="Manila">Tondo: Barangay 256</option>      
              <option class="Manila">Tondo: Barangay 257</option> 
              <option class="Manila">Tondo: Barangay 259</option> 
              <option class="Manila">Tondo: Barangay 260</option> 
              <option class="Manila">Tondo: Barangay 261</option> 
              <option class="Manila">Tondo: Barangay 262</option> 
              <option class="Manila">Tondo: Barangay 263</option> 
              <option class="Manila">Tondo: Barangay 264</option> 
              <option class="Manila">Tondo: Barangay 265</option> 
              <option class="Manila">Tondo: Barangay 266</option>      
              <option class="Manila">Tondo: Barangay 267</option> 
              <option class="Mandaluyong">Addition Hills</option> 
              <option class="Mandaluyong">Bagong Silang</option> 
              <option class="Mandaluyong">Barangka Drive</option>      
              <option class="Mandaluyong">Barangka Ibaba</option> 
              <option class="Mandaluyong">Barangka Ilaya</option> 
              <option class="Mandaluyong">Barangka Itaas</option> 
              <option class="Mandaluyong">Buayang Bato</option> 
              <option class="Mandaluyong">Burol</option> 
              <option class="Mandaluyong">Daang Bakal</option> 
              <option class="Mandaluyong">Hagdang Bato Itaas</option> 
              <option class="Mandaluyong">Hagdang Bato Libis</option> 
              <option class="Mandaluyong">Harapin Ang Bukas</option>      
              <option class="Mandaluyong">Highway Hills</option>      
              <option class="Mandaluyong">Hulo</option> 
              <option class="Mandaluyong">Mabini-J. Rizal</option> 
              <option class="Mandaluyong">Malamig</option> 
              <option class="Mandaluyong">Mauway</option> 
              <option class="Mandaluyong">Namayan</option> 
              <option class="Mandaluyong">New Zañiga</option> 
              <option class="Mandaluyong">Old Zañiga</option> 
              <option class="Mandaluyong">Pag-asa</option> 
              <option class="Mandaluyong">Plainview</option>      
              <option class="Mandaluyong">Pleasant Hills</option> 
              <option class="Mandaluyong">Poblacion</option> 
              <option class="Mandaluyong">San Jose</option> 
              <option class="Mandaluyong">Vergara</option> 
              <option class="Mandaluyong">Wack-Wack Greenhills</option>   
              <option class="San-Juan">Addition Hills</option> 
              <option class="San-Juan">Balong-Bato</option> 
              <option class="San-Juan">Batis</option> 
              <option class="San-Juan">Corazon de Jesus</option> 
              <option class="San-Juan">Ermitaño</option> 
              <option class="San-Juan">Greenhills</option> 
              <option class="San-Juan">Halo-halo</option> 
              <option class="San-Juan">Isabelita</option> 
              <option class="San-Juan">Kabayanan</option> 
              <option class="San-Juan">Little Baguio</option>      
              <option class="San-Juan">Maytunas</option> 
              <option class="San-Juan">Onse</option> 
              <option class="San-Juan">Pasadeña</option> 
              <option class="San-Juan">Pedro Cruz</option> 
              <option class="San-Juan">Progreso</option> 
              <option class="San-Juan">Rivera</option> 
              <option class="San-Juan">Salapan</option> 
              <option class="San-Juan">San Perfecto</option> 
              <option class="San-Juan">Santa Lucia</option>      
              <option class="San-Juan">Tibagan</option> 
              <option class="San-Juan">West Crame</option> 
              <option class="Pasay">Barangay 1</option> 
              <option class="Pasay">Barangay 2</option> 
              <option class="Pasay">Barangay 3</option>    
              <option class="Pasay">Barangay 4</option> 
              <option class="Pasay">Barangay 5</option> 
              <option class="Pasay">Barangay 6</option> 
              <option class="Pasay">Barangay 7</option>               
              <option class="Pasay">Barangay 8</option> 
              <option class="Pasay">Barangay 9</option> 
              <option class="Pasay">Barangay 10</option>       
              <option class="Pasay">Barangay 100</option> 
              <option class="Pasay">Barangay 101</option> 
              <option class="Pasay">Barangay 102</option>       
              <option class="Pasay">Barangay 103</option> 
              <option class="Pasay">Barangay 104</option> 
              <option class="Pasay">Barangay 105</option>       
              <option class="Pasay">Barangay 106</option> 
              <option class="Pasay">Barangay 107</option> 
              <option class="Pasay">Barangay 108</option>       
              <option class="Pasay">Barangay 109</option> 
              <option class="Pasay">Barangay 11</option> 
              <option class="Pasay">Barangay 110</option>       
              <option class="Pasay">Barangay 111</option> 
              <option class="Pasay">Barangay 112</option> 
              <option class="Pasay">Barangay 113</option>       
              <option class="Pasay">Barangay 114</option> 
              <option class="Pasay">Barangay 115</option> 
              <option class="Pasay">Barangay 116</option>       
              <option class="Pasay">Barangay 117</option> 
              <option class="Pasay">Barangay 118</option> 
              <option class="Pasay">Barangay 119</option>       
              <option class="Pasay">Barangay 12</option> 
              <option class="Pasay">Barangay 120</option> 
              <option class="Pasay">Barangay 121</option>       
              <option class="Pasay">Barangay 122</option> 
              <option class="Pasay">Barangay 123</option> 
              <option class="Pasay">Barangay 124</option>       
              <option class="Pasay">Barangay 125</option> 
              <option class="Pasay">Barangay 126</option> 
              <option class="Pasay">Barangay 127</option> 
              <option class="Pasay">Barangay 128</option> 
              <option class="Pasay">Barangay 129</option>       
              <option class="Pasay">Barangay 13</option> 
              <option class="Pasay">Barangay 130</option> 
              <option class="Pasay">Barangay 131</option>       
              <option class="Pasay">Barangay 132</option> 
              <option class="Pasay">Barangay 133</option> 
              <option class="Pasay">Barangay 134</option>   
              <option class="Pasay">Barangay 135</option>       
              <option class="Pasay">Barangay 136</option> 
              <option class="Pasay">Barangay 137</option> 
              <option class="Pasay">Barangay 138</option>       
              <option class="Pasay">Barangay 139</option> 
              <option class="Pasay">Barangay 14</option> 
              <option class="Pasay">Barangay 140</option>   
              <option class="Pasay">Barangay 141</option>       
              <option class="Pasay">Barangay 142</option> 
              <option class="Pasay">Barangay 143</option> 
              <option class="Pasay">Barangay 144</option>       
              <option class="Pasay">Barangay 145</option> 
              <option class="Pasay">Barangay 146</option> 
              <option class="Pasay">Barangay 147</option>   
              <option class="Pasay">Barangay 148</option>       
              <option class="Pasay">Barangay 149</option> 
              <option class="Pasay">Barangay 15</option> 
              <option class="Pasay">Barangay 150</option>       
              <option class="Pasay">Barangay 151</option> 
              <option class="Pasay">Barangay 152</option> 
              <option class="Pasay">Barangay 153</option>         
              <option class="Pasay">Barangay 154</option>       
              <option class="Pasay">Barangay 155</option> 
              <option class="Pasay">Barangay 156</option> 
              <option class="Pasay">Barangay 157</option>       
              <option class="Pasay">Barangay 158</option> 
              <option class="Pasay">Barangay 159</option> 
              <option class="Pasay">Barangay 16</option>   
              <option class="Pasay">Barangay 160</option> 
              <option class="Pasay">Barangay 161</option> 
              <option class="Pasay">Barangay 162</option>         
              <option class="Pasay">Barangay 163</option>       
              <option class="Pasay">Barangay 164</option> 
              <option class="Pasay">Barangay 165</option> 
              <option class="Pasay">Barangay 166</option>       
              <option class="Pasay">Barangay 167</option> 
              <option class="Pasay">Barangay 168</option> 
              <option class="Pasay">Barangay 169</option>  
              <option class="Pasay">Barangay 17</option> 
              <option class="Pasay">Barangay 170</option> 
              <option class="Pasay">Barangay 171</option>         
              <option class="Pasay">Barangay 172</option>       
              <option class="Pasay">Barangay 173</option> 
              <option class="Pasay">Barangay 174</option> 
              <option class="Pasay">Barangay 175</option>       
              <option class="Pasay">Barangay 176</option> 
              <option class="Pasay">Barangay 177</option> 
              <option class="Pasay">Barangay 178</option>  
              <option class="Pasay">Barangay 179</option> 
              <option class="Pasay">Barangay 18</option> 
              <option class="Pasay">Barangay 180</option>         
              <option class="Pasay">Barangay 181</option>       
              <option class="Pasay">Barangay 182</option> 
              <option class="Pasay">Barangay 183</option> 
              <option class="Pasay">Barangay 184</option>       
              <option class="Pasay">Barangay 185</option> 
              <option class="Pasay">Barangay 186</option> 
              <option class="Pasay">Barangay 187</option> 
              <option class="Pasay">Barangay 188</option> 
              <option class="Pasay">Barangay 189</option> 
              <option class="Pasay">Barangay 19</option>         
              <option class="Pasay">Barangay 190</option>       
              <option class="Pasay">Barangay 191</option> 
              <option class="Pasay">Barangay 192</option> 
              <option class="Pasay">Barangay 193</option>       
              <option class="Pasay">Barangay 194</option> 
              <option class="Pasay">Barangay 195</option> 
              <option class="Pasay">Barangay 196</option>   
              <option class="Pasay">Barangay 197</option>       
              <option class="Pasay">Barangay 198</option> 
              <option class="Pasay">Barangay 199</option> 
              <option class="Pasay">Barangay 20</option>       
              <option class="Pasay">Barangay 200</option> 
              <option class="Pasay">Barangay 201</option> 
              <option class="Pasay">Barangay 21</option> 
              <option class="Pasay">Barangay 22</option> 
              <option class="Pasay">Barangay 23</option> 
              <option class="Pasay">Barangay 24</option>         
              <option class="Pasay">Barangay 25</option>       
              <option class="Pasay">Barangay 26</option> 
              <option class="Pasay">Barangay 27</option> 
              <option class="Pasay">Barangay 28</option>       
              <option class="Pasay">Barangay 29</option> 
              <option class="Pasay">Barangay 30</option> 
              <option class="Pasay">Barangay 31</option>   
              <option class="Pasay">Barangay 32</option>       
              <option class="Pasay">Barangay 33</option> 
              <option class="Pasay">Barangay 34</option> 
              <option class="Pasay">Barangay 35</option>       
              <option class="Pasay">Barangay 36</option> 
              <option class="Pasay">Barangay 37</option> 
              <option class="Pasay">Barangay 38</option> 
              <option class="Pasay">Barangay 39</option> 
              <option class="Pasay">Barangay 40</option> 
              <option class="Pasay">Barangay 41</option>         
              <option class="Pasay">Barangay 42</option>       
              <option class="Pasay">Barangay 43</option> 
              <option class="Pasay">Barangay 44</option> 
              <option class="Pasay">Barangay 45</option>       
              <option class="Pasay">Barangay 46</option> 
              <option class="Pasay">Barangay 47</option> 
              <option class="Pasay">Barangay 48</option>   
              <option class="Pasay">Barangay 49</option>       
              <option class="Pasay">Barangay 50</option> 
              <option class="Pasay">Barangay 51</option> 
              <option class="Pasay">Barangay 52</option>       
              <option class="Pasay">Barangay 52</option> 
              <option class="Pasay">Barangay 53</option> 
              <option class="Pasay">Barangay 54</option> 
              <option class="Pasay">Barangay 55</option> 
              <option class="Pasay">Barangay 57</option> 
              <option class="Pasay">Barangay 58</option>         
              <option class="Pasay">Barangay 59</option>       
              <option class="Pasay">Barangay 60</option> 
              <option class="Pasay">Barangay 61</option> 
              <option class="Pasay">Barangay 62</option>       
              <option class="Pasay">Barangay 63</option> 
              <option class="Pasay">Barangay 64</option> 
              <option class="Pasay">Barangay 65</option>   
              <option class="Pasay">Barangay 66</option> 
              <option class="Pasay">Barangay 67</option>       
              <option class="Pasay">Barangay 68</option> 
              <option class="Pasay">Barangay 69</option> 
              <option class="Pasay">Barangay 70</option> 
              <option class="Pasay">Barangay 71</option> 
              <option class="Pasay">Barangay 72</option> 
              <option class="Pasay">Barangay 73</option>         
              <option class="Pasay">Barangay 74</option>       
              <option class="Pasay">Barangay 75</option> 
              <option class="Pasay">Barangay 76</option> 
              <option class="Pasay">Barangay 77</option>       
              <option class="Pasay">Barangay 78</option> 
              <option class="Pasay">Barangay 79</option> 
              <option class="Pasay">Barangay 80</option>   
              <option class="Pasay">Barangay 81</option> 
              <option class="Pasay">Barangay 82</option>       
              <option class="Pasay">Barangay 83</option> 
              <option class="Pasay">Barangay 84</option> 
              <option class="Pasay">Barangay 85</option> 
              <option class="Pasay">Barangay 86</option> 
              <option class="Pasay">Barangay 87</option> 
              <option class="Pasay">Barangay 89</option>         
              <option class="Pasay">Barangay 90</option>       
              <option class="Pasay">Barangay 91</option> 
              <option class="Pasay">Barangay 92</option> 
              <option class="Pasay">Barangay 93</option>       
              <option class="Pasay">Barangay 94</option> 
              <option class="Pasay">Barangay 95</option> 
              <option class="Pasay">Barangay 96</option>   
              <option class="Pasay">Barangay 97</option>   
              <option class="Pasay">Barangay 98</option> 
              <option class="Pasay">Barangay 99</option>       
              <option class="Parañaque">Baclaran</option> 
              <option class="Parañaque">B.F. Homes</option> 
              <option class="Parañaque">Don Bosco</option> 
              <option class="Parañaque">Don Galo</option> 
              <option class="Parañaque">La Huerta</option> 
              <option class="Parañaque">Marcelo Green Village</option>         
              <option class="Parañaque">Merville</option>       
              <option class="Parañaque">Moonwalk</option> 
              <option class="Parañaque">San Antonio</option> 
              <option class="Parañaque">San Dionisio</option>       
              <option class="Parañaque">San Isidro</option> 
              <option class="Parañaque">San Martin De Porres</option> 
              <option class="Parañaque">Santo Niño</option>  
              <option class="Parañaque">Sun Valley</option>       
              <option class="Parañaque">Tambo</option> 
              <option class="Parañaque">Vitalez</option> 
              <option class="Las-Piñas">Almanza Dos</option>
              <option class="Las-Piñas">Almanza Uno</option> 
              <option class="Las-Piñas">B.F. International Village</option>  
              <option class="Las-Piñas">Daniel Fajardo</option>  
              <option class="Las-Piñas">Elias Aldana</option>
              <option class="Las-Piñas">Ilaya</option> 
              <option class="Las-Piñas">Manuyo Dos</option>  
              <option class="Las-Piñas">Manuyo Uno</option>   
              <option class="Las-Piñas">Pampalona Dos</option>
              <option class="Las-Piñas">Pampalona Tres</option> 
              <option class="Las-Piñas">Pampalona Uno</option>  
              <option class="Las-Piñas">Pilar</option>   
              <option class="Las-Piñas">Pulang Lupa Dos</option>
              <option class="Las-Piñas">Pulang Lupa Uno</option> 
              <option class="Las-Piñas">Talon Dos</option>  
              <option class="Las-Piñas">Talon Kuatro</option>   
              <option class="Las-Piñas">Talon Singko</option>
              <option class="Las-Piñas">Talon Tres</option> 
              <option class="Las-Piñas">Talon Uno</option>  
              <option class="Las-Piñas">Zapote</option>   
              <option class="Pateros">Aguho</option>
              <option class="Pateros">Magtanggol</option> 
              <option class="Pateros">Martires del 96</option>  
              <option class="Pateros">Poblacion</option>  
              <option class="Pateros">San Pedro</option>
              <option class="Pateros">San Roque</option> 
              <option class="Pateros">Santa Ana</option>  
              <option class="Pateros">Santo Rosario-Kanluran</option> 
              <option class="Pateros">Santo Rosario-Silangan</option>
              <option class="Pateros">Tabacalera</option> 
              <option class="Bangued">Agtangao</option>
              <option class="Bangued">Angad</option>
              <option class="Bangued">Bañacao</option>
              <option class="Bangued">Bangbangar</option>
              <option class="Bangued">Cabuloan</option>
              <option class="Bangued">Calaba</option>
              <option class="Bangued">Cosili East</option>
              <option class="Bangued">Cosili West</option>
              <option class="Bangued">Dangdangla</option>
              <option class="Bangued">Lingtan</option>
              <option class="Bangued">Lipcan</option>
              <option class="Bangued">Lubong</option>
              <option class="Bangued">Macarcarmay</option>
              <option class="Bangued">Macray</option>
              <option class="Bangued">Malita</option>
              <option class="Bangued">Maoay</option>
              <option class="Bangued">Palao</option>
              <option class="Bangued">Patucannay</option>
              <option class="Bangued">Sagap</option>
              <option class="Bangued">San Antonio</option>
              <option class="Bangued">Santa Rosa</option>
              <option class="Bangued">Sao-atan</option>
              <option class="Bangued">Sappaac</option>
              <option class="Bangued">Tablac</option>
              <option class="Bangued">Zone 1 Poblacion</option>
              <option class="Bangued">Zone 2 Poblacion</option>
              <option class="Bangued">Zone 3 Poblacion</option>
              <option class="Bangued">Zone 4 Poblacion</option>
              <option class="Bangued">Zone 5 Poblacion</option>
              <option class="Bangued">Zone 6 Poblacion</option>
              <option class="Bangued">Zone 7 Poblacion</option>
              <option class="Boliney">Amti</option>
              <option class="Boliney">Bao-yan</option>
              <option class="Boliney">Danac East</option>
              <option class="Boliney">Danac West</option>
              <option class="Boliney">Dao-angan</option>
              <option class="Boliney">Dumagas</option>
              <option class="Boliney">Kilong-Olao</option>
              <option class="Boliney">Poblacion</option>
              <option class="Bucay">Abang</option>
              <option class="Bucay">Bangbangcag</option>
              <option class="Bucay">Banglolao</option>
              <option class="Bucay">Bugbog</option>
              <option class="Bucay">Calao</option>
              <option class="Bucay">Dugong</option>
              <option class="Bucay">Labon</option>
              <option class="Bucay">Layugan</option>
              <option class="Bucay">Madalipay</option>
              <option class="Bucay">North Poblacion</option>
              <option class="Bucay">Pagala</option>
              <option class="Bucay">Pakiling</option>
              <option class="Bucay">Palaquio</option>
              <option class="Bucay">Patoc</option>
              <option class="Bucay">Quimloong</option>
              <option class="Bucay">Salnec</option>
              <option class="Bucay">San Miguel</option>
              <option class="Bucay">Siblong</option>
              <option class="Bucay">South Poblacion</option>
              <option class="Bucay">Tabiog</option>
              <option class="Bucloc">Ducligan</option>
              <option class="Bucloc">Labaan</option>
              <option class="Bucloc">Lamao</option>
              <option class="Daguioman">Ableg</option>
              <option class="Daguioman">Cabaruyan</option>
              <option class="Daguioman">Pikek</option>
              <option class="Daguiman">Tui</option>
              <option class="Danglas">Abaquid</option>
              <option class="Danglas">Cabaruan</option>
              <option class="Danglas">Cupasan</option>
              <option class="Danglas">Danglas</option>
              <option class="Danglas">Nagaparan</option>
              <option class="Danglas">Padangitan</option>
              <option class="Danglas">Pangal</option>
              <option class="Dolores">Bayaan</option>
              <option class="Dolores">Cabaroan</option>
              <option class="Dolores">Calumbaya</option>
              <option class="Dolores">Cardona</option>
              <option class="Dolores">Isit</option>
              <option class="Dolores">Kimmalaba</option>
              <option class="Dolores">Libtec</option>
              <option class="Dolores">Lub-lubba</option>
              <option class="Dolores">Mudiit</option>
              <option class="Dolores">Namit-ingan</option>
              <option class="Dolores">Pacac</option>
              <option class="Dolores">Poblacion</option>
              <option class="Dolores">Salucag</option>
              <option class="Dolores">Talogtog</option>
              <option class="Dolores">Taping</option>
              <option class="Lacub">Bacag</option>
              <option class="Lacub">Buneg</option>
              <option class="Lacub">Guinguinabang</option>
              <option class="Lacub">Lan-ag</option>
              <option class="Lacub">Pacoc</option>
              <option class="Lacub">Poblacion</option>
              <option class="Lagangilang">Aguet</option>
              <option class="Lagangilang">Bacooc</option>
              <option class="Lagangilang">Balais</option>
              <option class="Lagangilang">Cayapa</option>
              <option class="Lagangilang">Dalaguisen</option>
              <option class="Lagangilang">Laang</option>
              <option class="Lagangilang">Lagben</option>
              <option class="Lagangilang">Laguiben</option>
              <option class="Lagangilang">Nagtipulan</option>
              <option class="Lagangilang">Nagtupacan</option>
              <option class="Lagangilang">Paganao</option>
              <option class="Lagangilang">Pawa</option>
              <option class="Lagangilang">Poblacion</option>
              <option class="Lagangilang">Presentar</option>
              <option class="Lagangilang">San Isidro</option>
              <option class="Lagangilang">Tagodtod</option>
              <option class="Lagangilang">Taping</option>
              <option class="Lagayan">Ba-i</option>
              <option class="Lagayan">Collago</option>
              <option class="Lagayan">Pang-ot</option>
              <option class="Lagayan">Poblacion</option>
              <option class="Lagayan">Pulot</option>
              <option class="Langiden">Baac</option>
              <option class="Langiden">Dalayap</option>
              <option class="Langiden">Mabungtot</option>
              <option class="Langiden">Malapaao</option>
              <option class="Langiden">Poblacion</option>
              <option class="Langiden">Quillat</option>
              <option class="La-Paz">Benben</option>
              <option class="La Paz">Bulbulala</option>
              <option class="La Paz">Buli</option>
              <option class="La Paz">Canan</option>
              <option class="La Paz">Liguis</option>
              <option class="La Paz">Malabaga</option>
              <option class="La Paz">Mudeng</option>
              <option class="La Paz">Pidipid</option>
              <option class="La Paz">Poblacion</option>
              <option class="La Paz">San Gregorio</option>
              <option class="La Paz">Toon</option>
              <option class="La Paz">Udangan</option>
              <option class="Licuan-Baay">Bonglo</option>
              <option class="Licuan-Baay">Bulbulala</option>
              <option class="Licuan-Baay">Cawayan</option>
              <option class="Licuan-Baay">Domenglay</option>
              <option class="Licuan-Baay">Lenneng</option>
              <option class="Licuan-Baay">Mapisla</option>
              <option class="Licuan-Baay">Mogao</option>
              <option class="Licuan-Baay">Nalbuan</option>
              <option class="Licuan-Baay">Poblacion</option>
              <option class="Licuan-Baay">Subagan</option>
              <option class="Licuan-Baay">Tumalip</option>
              <option class="Luba">Ampalioc</option>
              <option class="Luba">Barit</option>
              <option class="Luba">Gayaman</option>
              <option class="Luba">Lul-luno</option>
              <option class="Luba">Luzong</option>
              <option class="Luba">Nagbukel-Tuquipa</option>
              <option class="Luba">Poblacion</option>
              <option class="Luba">Sabnangan</option>
              <option class="Malibcong">Bayabas</option>
              <option class="Malibcong">Binasaran</option>
              <option class="Malibcong">Buanao</option>
              <option class="Malibcong">Dulao</option>
              <option class="Malibcong">Duldulao</option>
              <option class="Malibcong">Gacab</option>
              <option class="Malibcong">Lat-ey</option>
              <option class="Malibcong">Malibcong</option>
              <option class="Malibcong">Mataragan</option>
              <option class="Malibcong">Pacgued</option>
              <option class="Malibcong">Taripan</option>
              <option class="Malibcong">Umnap</option>
              <option class="Manabo">Ayyeng</option>
              <option class="Manabo">Catacdegan Nuevo</option>
              <option class="Manabo">Catacdegan Viejo</option>
              <option class="Manabo">Luzong</option>
              <option class="Manabo">San Jose Norte</option>
              <option class="Manabo">San Jose Sur</option>
              <option class="Manabo">San Juan Norte</option>
              <option class="Manabo">San Juan Sur</option>
              <option class="Manabo">San Ramon East</option>
              <option class="Manabo">San Ramon West</option>
              <option class="Manabo">Santo Tomas</option>
              <option class="Peñarrubia">Dumayco</option>
              <option class="Peñarrubia">Lusuac</option>
              <option class="Peñarrubia">Malamsit</option>
              <option class="Peñarrubia">Namarabar</option>
              <option class="Peñarrubia">Patiao</option>
              <option class="Peñarrubia">Poblacion</option>
              <option class="Peñarrubia">Riang</option>
              <option class="Peñarrubia">Santa Rosa</option>
              <option class="Peñarrubia">Tattawa</option>
              <option class="Pidigan">Alinaya</option>
              <option class="Pidigan">Arab</option>
              <option class="Pidigan">Garreta</option>
              <option class="Pidigan">Immuli</option>
              <option class="Pidigan">Laskig</option>
              <option class="Pidigan">Monggoc</option>
              <option class="Pidigan">Naguirayan</option>
              <option class="Pidigan">Pamutic</option>
              <option class="Pidigan">Pangtud</option>
              <option class="Pidigan">Poblacion East</option>
              <option class="Pidigan">Poblacion West</option>
              <option class="Pidigan">San Diego</option>
              <option class="Pidigan">Sulbec</option>
              <option class="Pidigan">Suyo</option>
              <option class="Pidigan">Yuyeng</option>
              <option class="Pilar">Bolbolo</option>
              <option class="Pilar">Brookside</option>
              <option class="Pilar">Dalit</option>
              <option class="Pilar">Dintan</option>
              <option class="Pilar">Gapang</option>
              <option class="Pilar">Kinabit</option>
              <option class="Pilar">Maliplipit</option>
              <option class="Pilar">Nagcanasan</option>
              <option class="Pilar">Nanangduan</option>
              <option class="Pilar">Narnara</option>
              <option class="Pilar">Ocup</option>
              <option class="Pilar">Pang-ot</option>
              <option class="Pilar">Patad</option>
              <option class="Pilar">Poblacion</option>
              <option class="Pilar">San Juan East</option>
              <option class="Pilar">San Juan West</option>
              <option class="Pilar">South Balioag</option>
              <option class="Pilar">Tikitik</option>
              <option class="Pilar">Villavieja</option>
              <option class="Sallapadan">Bazar</option>
              <option class="Sallapadan">Bilabila</option>
              <option class="Sallapadan">Gangal</option>
              <option class="Sallapadan">Maguyepyep</option>
              <option class="Sallapadan">Naguilian</option>
              <option class="Sallapadan">Saccaang</option>
              <option class="Sallapadan">Sallapadan</option>
              <option class="Sallapadan">Subusob</option>
              <option class="Sallapadan">Ud-udiao</option>
              <option class="San-Isidro">Cabayogan</option>
              <option class="San-Isidro">Dalimag</option>
              <option class="San-Isidro">Langbaban</option>
              <option class="San-Isidro">Manayday</option>
              <option class="San-Isidro">Pantoc</option>
              <option class="San-Isidro">Poblacion</option>
              <option class="San-Isidro">Sabtan-olo</option>
              <option class="San-Isidro">San Marcial</option>
              <option class="San-Juan">Abualan</option>
              <option class="San-Juan">Ba-ug</option>
              <option class="San-Juan">Badas</option>
              <option class="San-Juan">Cabcaborao</option>
              <option class="San-Juan">Culiong</option>
              <option class="San-Juan">Daoidao</option>
              <option class="San-Juan">Guimba</option>
              <option class="San-Juan">Lam-ag</option>
              <option class="San-Juan">Nangobongan</option>
              <option class="San-Juan">Pattaoig</option>
              <option class="San-Juan">Poblacion North</option>
              <option class="San-Juan">Poblacion North</option>
              <option class="San-Juan">Quidaoen</option>
              <option class="San-Juan">Sabangan</option>
              <option class="San-Juan">Silet</option>
              <option class="San-Juan">Supi-il</option>
              <option class="San-Juan">Tagaytay</option>
              <option class="San-Quintin">Labaan</option>
              <option class="San-Quintin">Palang</option>
              <option class="San-Quintin">Pantoc</option>
              <option class="San-Quintin">Poblacion</option>
              <option class="San-Quintin">Tangadan</option>
              <option class="San-Quintin">Villa Mercedes</option>
              <option class="Tayum">Bagalay</option>
              <option class="Tayum">Basbasa</option>
              <option class="Tayum">Budac</option>
              <option class="Tayum">Bumagcat</option>
              <option class="Tayum">Cabaroan</option>
              <option class="Tayum">Deet</option>
              <option class="Tayum">Gaddani</option>
              <option class="Tayum">Patucannay</option>
              <option class="Tayum">Pias</option>
              <option class="Tayum">Poblacion</option>
              <option class="Tayum">Velasco</option>
              <option class="Tineg">Alaoa</option>
              <option class="Tineg">Anayan</option>
              <option class="Tineg">Apao</option>
              <option class="Tineg">Belaat</option>
              <option class="Tineg">Caganayan</option>
              <option class="Tineg">Cogon</option>
              <option class="Tineg">Lanec</option>
              <option class="Tineg">Lapat-Balantay</option>
              <option class="Tineg">Naglibacan</option>
              <option class="Tineg">Poblacion</option>
              <option class="Tubo">Alangatin</option>
              <option class="Tubo">Amtuagan</option>
              <option class="Tubo">Dilong</option>
              <option class="Tubo">Kili</option>
              <option class="Tubo">Poblacion</option>
              <option class="Tubo">Supo</option>
              <option class="Tubo">Tabacda</option>
              <option class="Tubo">Tiempo</option>
              <option class="Tubo">Tubtuba</option>
              <option class="Tubo">Wayangan</option>
              <option class="Villaviciosa">Ap-apaya</option>
              <option class="Villaviciosa">Bol-lilising</option>
              <option class="Villaviciosa">Cal-lao</option>
              <option class="Villaviciosa">Lap-lapog</option>
              <option class="Villaviciosa">Lumaba</option>
              <option class="Villaviciosa">Poblacion</option>
              <option class="Villaviciosa">Tamac</option>
              <option class="Villaviciosa">Tuquib</option>
              <option class="Calanasan">Butao</option>
              <option class="Calanasan">Cadaclan</option>
              <option class="Calanasan">Don Roque Ablan Sr.</option>
              <option class="Calanasan">Eleazar</option>
              <option class="Calanasan">Eva Puzon</option>
              <option class="Calanasan">Kabugawan</option>
              <option class="Calanasan">Langnao</option>
              <option class="Calanasan">Lubong</option>
              <option class="Calanasan">Macalino</option>
              <option class="Calanasan">Naguilan</option>
              <option class="Calanasan">Namaltugan</option>
              <option class="Calanasan">Poblacion</option>
              <option class="Calanasan">Sabangan</option>
              <option class="Calanasan">Santa Elena</option>
              <option class="Calanasan">Santa Filomena</option>
              <option class="Calanasan">Tanglagan</option>
              <option class="Calanasan">Tubang</option>
              <option class="Calanasan">Tubongan</option>
              <option class="Conner">Allangigan</option>
              <option class="Conner">Banban</option>
              <option class="Conner">Buluan</option>
              <option class="Conner">Caglayan</option>
              <option class="Conner">Calafug</option>
              <option class="Conner">Cupis</option>
              <option class="Conner">Daga</option>
              <option class="Conner">Guinaang</option>
              <option class="Conner">Guinamgaman</option>
              <option class="Conner">Lli</option>
              <option class="Conner">Karikitan</option>
              <option class="Conner">Katablangan</option>
              <option class="Conner">Malaman</option>
              <option class="Conner">Manag</option>
              <option class="Conner">Mawegui</option>
              <option class="Conner">Nabuangan</option>
              <option class="Conner">Paddaoan</option>
              <option class="Conner">Pugin</option>
              <option class="Conner">Ripang</option>
              <option class="Conner">Sacpil</option>
              <option class="Conner">Talifugo</option>
              <option class="Flora">Allig</option>
              <option class="Flora">Anninipan</option>
              <option class="Flora">Atok</option>
              <option class="Flora">Bagutong</option>
              <option class="Flora">Balasi</option>
              <option class="Flora">Balluyan</option>
              <option class="Flora">Malayugan</option>
              <option class="Flora">Mallig</option>
              <option class="Flora">Malubibit Norte</option>
              <option class="Flora">Malubibit Norte</option>
              <option class="Flora">Poblacion East</option>
              <option class="Flora">Poblacion West</option>
              <option class="Flora">San Jose</option>
              <option class="Flora">Santa Maria</option>
              <option class="Flora">Tamalunog</option>
              <option class="Flora">Upper Atok</option>
              <option class="Kabugao">Badduat</option>
              <option class="Kabugao">Baliwanan</option>
              <option class="Kabugao">Bulu</option>
              <option class="Kabugao">Cabetayan</option>
              <option class="Kabugao">Dagara</option>
              <option class="Kabugao">Dibagat</option>
              <option class="Kabugao">Karagawan</option>
              <option class="Kabugao">Kumao</option>
              <option class="Kabugao">Laco</option>
              <option class="Kabugao">Lenneng</option>
              <option class="Kabugao">Lucab</option>
              <option class="Kabugao">Luttuacan</option>
              <option class="Kabugao">Madatag</option>
              <option class="Kabugao">Madduang</option>
              <option class="Kabugao">Magabta</option>
              <option class="Kabugao">Maragat</option>
              <option class="Kabugao">Musimut</option>
              <option class="Kabugao">Nagbabalayan</option>
              <option class="Kabugao">Poblacion</option>
              <option class="Kabugao">Tuyangan</option>
              <option class="Kabugao">Waga</option>
              <option class="Luna">Bacsay</option>
              <option class="Luna">Cagandungan</option>
              <option class="Luna">Calabigan</option>
              <option class="Luna">Cangisitan</option>
              <option class="Luna">Capagaypayan</option>
              <option class="Luna">Dagupan</option>
              <option class="Luna">Lappa</option>
              <option class="Luna">Luyon</option>
              <option class="Luna">Marag</option>
              <option class="Luna">Poblacion</option>
              <option class="Luna">Quirino</option>
              <option class="Luna">Salvacion</option>
              <option class="Luna">San Francisco</option>
              <option class="Luna">San Gregorio</option>
              <option class="Luna">San Isidro Norte</option>
              <option class="Luna">San Isidro Sur</option>
              <option class="Luna">San Sebastian</option>
              <option class="Luna">Santa Lina</option>
              <option class="Luna">Shalom</option>
              <option class="Luna">Tumog</option>
              <option class="Luna">Turod</option>
              <option class="Luna">Zumigui</option>
              <option class="Pudtol">Aga</option>
              <option class="Pudtol">Alem</option>
              <option class="Pudtol">Amado</option>
              <option class="Pudtol">Aurora</option>
              <option class="Pudtol">Cabatacan</option>
              <option class="Pudtol">Cacalaggan</option>
              <option class="Pudtol">Capannikian</option>
              <option class="Pudtol">Doña Loreta</option>
              <option class="Pudtol">Emilia</option>
              <option class="Pudtol">Imelda</option>
              <option class="Pudtol">Lower Maton</option>
              <option class="Pudtol">Lt. Balag</option>
              <option class="Pudtol">Lydia</option>
              <option class="Pudtol">Malibang</option>
              <option class="Pudtol">Mataguisi</option>
              <option class="Pudtol">Poblacion</option>
              <option class="Pudtol">San Antonio</option>
              <option class="Pudtol">San Jose</option>
              <option class="Pudtol">San Luis</option>
              <option class="Pudtol">San Mariano</option>
              <option class="Pudtol">Swan</option>
              <option class="Pudtol">Upper Maton</option>
              <option class="Santa-Marcela">Barocboc</option>
              <option class="Santa-Marcela">Consuelo</option>
              <option class="Santa-Marcela">Emiliana</option>
              <option class="Santa-Marcela">Imelda</option>
              <option class="Santa-Marcela">Malekkeg</option>
              <option class="Santa-Marcela">Marcela</option>
              <option class="Santa-Marcela">Nueva</option>
              <option class="Santa-Marcela">Panay</option>
              <option class="Santa-Marcela">San Antonio</option>
              <option class="Santa-Marcela">San Carlos</option>
              <option class="Santa-Marcela">San Juan</option>
              <option class="Santa-Marcela">San Mariano</option>
              <option class="Santa-Marcela">Sipa Proper</option>
              <option class="Atok">Abiang</option>
              <option class="Atok">Caliking</option>
              <option class="Atok">Cattubo</option>
              <option class="Atok">Naguey</option>
              <option class="Atok">Paoay</option>
              <option class="Atok">Pasdong</option>
              <option class="Atok">Poblacion</option>
              <option class="Atok">Topdac</option>
              <option class="Bakun">Ampusongan</option>
              <option class="Bakun">Bagu</option>
              <option class="Bakun">Dalipey</option>
              <option class="Bakun">Gambang</option>
              <option class="Bakun">Kayapa</option>
              <option class="Bakun">Poblacion</option>
              <option class="Bakun">Sinacbat</option>
              <option class="Bokod">Ambuclao</option>
              <option class="Bokod">Bila</option>
              <option class="Bokod">Bobok-Bisal</option>
              <option class="Bokod">Daclan</option>
              <option class="Bokod">Ekip</option>
              <option class="Bokod">Karao</option>
              <option class="Bokod">Nawal</option>
              <option class="Bokod">Pito</option>
              <option class="Bokod">Poblacion</option>
              <option class="Bokod">Tikey</option>
              <option class="Buguias">Abatan</option>
              <option class="Buguias">Amgaleyguey</option>
              <option class="Buguias">Amlimay</option>
              <option class="Buguias">Baculongan Norte</option>
              <option class="Buguias">Baculongan Sur</option>
              <option class="Buguias">Bangao</option>
              <option class="Buguias">Buyacaoan</option>
              <option class="Buguias">Calamagan</option>
              <option class="Buguias">Catlubong</option>
              <option class="Buguias">Lengaoan</option>
              <option class="Buguias">Loo</option>
              <option class="Buguias">Natubleng</option>
              <option class="Buguias">Poblacion</option>
              <option class="Buguias">Sebang</option>
              <option class="Itogon">Ampucao</option>
              <option class="Itogon">Dalupirip</option>
              <option class="Itogon">Gumatdang</option>
              <option class="Itogon">Loacan</option>
              <option class="Itogon">Poblacion</option>
              <option class="Itogon">Tinongdan</option>
              <option class="Itogon">Tuding</option>
              <option class="Itogon">Ucab</option>
              <option class="Itogon">Virac</option>
              <option class="Kabayan">Adaoay</option>
              <option class="Kabayan">Anchukey</option>
              <option class="Kabayan">Ballay</option>
              <option class="Kabayan">Bashoy</option>
              <option class="Kabayan">Batan</option>
              <option class="Kabayan">Duacan</option>
              <option class="Kabayan">Eddet</option>
              <option class="Kabayan">Gusaran</option>
              <option class="Kabayan">Kabayan Barrio</option>
              <option class="Kabayan">Lusod</option>
              <option class="Kabayan">Pacso</option>
              <option class="Kabayan">Poblacion</option>
              <option class="Kabayan">Tawangan</option>
              <option class="Kibungan">Badeo</option>
              <option class="Kibungan">Lubo</option>
              <option class="Kibungan">Madaymen</option>
              <option class="Kibungan">Palina</option>
              <option class="Kibungan">Poblacion</option>
              <option class="Kibungan">Sagpat</option>
              <option class="Kibungan">Tacadang</option>
              <option class="La-Trinidad">Alapang</option>
              <option class="La-Trinidad">Alno</option>
              <option class="La-Trinidad">Ambiong</option>
              <option class="La-Trinidad">Ambiong</option>
              <option class="La-Trinidad">Balili</option>
              <option class="La-Trinidad">Beckel</option>
              <option class="La-Trinidad">Betag</option>
              <option class="La-Trinidad">Bineng</option>
              <option class="La-Trinidad">Cruz</option>
              <option class="La-Trinidad">Lubas</option>
              <option class="La-Trinidad">Pico</option>
              <option class="La-Trinidad">Poblacion</option>
              <option class="La-Trinidad">Puguis</option>
              <option class="La-Trinidad">Shilan</option>
              <option class="La-Trinidad">Tawang</option>
              <option class="La-Trinidad">Wangal</option>
              <option class="Aguinaldo">Awayan</option>
              <option class="Aguinaldo">Bunhian</option>
              <option class="Aguinaldo">Butac</option>
              <option class="Aguinaldo">Buwag</option>
              <option class="Aguinaldo">Chalalo</option>
              <option class="Aguinaldo">Damag</option>
              <option class="Aguinaldo">Galonogon</option>
              <option class="Aguinaldo">Halag</option>
              <option class="Aguinaldo">Itab</option>
              <option class="Aguinaldo">Jacmal</option>
              <option class="Aguinaldo">Majlong</option>
              <option class="Aguinaldo">Mongayang</option>
              <option class="Aguinaldo">Posnaan</option>
              <option class="Aguinaldo">Ta-ang</option>
              <option class="Aguinaldo">Talite</option>
              <option class="Aguinaldo">Ubao</option>
              <option class="Alfonso-Lista">Bangar</option>
              <option class="Alfonso-Lista">Busilac</option>
              <option class="Alfonso-Lista">Calimag</option>
              <option class="Alfonso-Lista">Calupaan</option>
              <option class="Alfonso-Lista">Caragasan</option>
              <option class="Alfonso-Lista">Dolowog</option>
              <option class="Alfonso-Lista">Kiling</option>
              <option class="Alfonso-Lista">Laya</option>
              <option class="Alfonso-Lista">Little Tadian</option>
              <option class="Alfonso-Lista">Namillangan</option>
              <option class="Alfonso-Lista">Namnama</option>
              <option class="Alfonso-Lista">Ngileb</option>
              <option class="Alfonso-Lista">Pinto</option>
              <option class="Alfonso-Lista">Poblacion</option>
              <option class="Alfonso-Lista">San Jose</option>
              <option class="Alfonso-Lista">San Juan</option>
              <option class="Alfonso-Lista">San Marcos</option>
              <option class="Alfonso-Lista">San Quintin</option>
              <option class="Alfonso-Lista">Santa Maria</option>
              <option class="Alfonso-Lista">Santo Domingo</option>
              <option class="Asipulo">Amduntog</option>
              <option class="Asipulo">Antipolo</option>
              <option class="Asipulo">Camandag</option>
              <option class="Asipulo">Cawayan</option>
              <option class="Asipulo">Hallap</option>
              <option class="Asipulo">Liwon</option>
              <option class="Asipulo">Namal</option>
              <option class="Asipulo">Nungawa</option>
              <option class="Asipulo">Panubtuban</option>
              <option class="Asipulo">Pula</option>
              <option class="Banaue">Amganad</option>
              <option class="Banaue">Anaba</option>
              <option class="Banaue">Balawis</option>
              <option class="Banaue">Banao</option>
              <option class="Banaue">Bangaan</option>
              <option class="Banaue">Batad</option>
              <option class="Banaue">Bocos</option>
              <option class="Banaue">Cambulo</option>
              <option class="Banaue">Ducligan</option>
              <option class="Banaue">Gohang</option>
              <option class="Banaue">Kinakin</option>
              <option class="Banaue">Ohaj</option>
              <option class="Banaue">Poblacion</option>
              <option class="Banaue">Poitan</option>
              <option class="Banaue">Pula</option>
              <option class="Banaue">San Fernando</option>
              <option class="Banaue">Tam-an</option>
              <option class="Banaue">View Point</option>
              <option class="Hingyon">Anao</option>
              <option class="Hingyon">Bangtinon</option>
              <option class="Hingyon">Bitu</option>
              <option class="Hingyon">Cababuyan</option>
              <option class="Hingyon">Mompolia</option>
              <option class="Hingyon">Namulditan</option>
              <option class="Hingyon">Northern Cababuyan</option>
              <option class="Hingyon">O-ong</option>
              <option class="Hingyon">Piwong</option>
              <option class="Hingyon">Poblacion</option>
              <option class="Hingyon">Ubuag</option>
              <option class="Hingyon">Umalbong</option>
              <option class="Hungduan">Abatan</option>
              <option class="Hungduan">Ba-ang</option>
              <option class="Hungduan">Bangbang</option>
              <option class="Hungduan">Bokiawan</option>
              <option class="Hungduan">Hapao</option>
              <option class="Hungduan">Lubo-ong</option>
              <option class="Hungduan">Maggok</option>
              <option class="Hungduan">Nungulunan</option>
              <option class="Hungduan">Poblacion</option>
              <option class="Kiangan">Ambabag</option>
              <option class="Kiangan">Baguinge</option>
              <option class="Kiangan">Bokiawan</option>
              <option class="Kiangan">Bolog</option>
              <option class="Kiangan">Dalligan</option>
              <option class="Kiangan">Duit</option>
              <option class="Kiangan">Hucab</option>
              <option class="Kiangan">Julongan</option>
              <option class="Kiangan">Lingay</option>
              <option class="Kiangan">Mungayang</option>
              <option class="Kiangan">Nagacadan</option>
              <option class="Kiangan">Pindongan</option>
              <option class="Kiangan">Poblacion</option>
              <option class="Kiangan">Tuplac</option>
              <option class="Lagawe">Abinuan</option>
              <option class="Lagawe">Banga</option>
              <option class="Lagawe">Boliwong</option>
              <option class="Lagawe">Burnay</option>
              <option class="Lagawe">Buyabuyan</option>
              <option class="Lagawe">Caba,</option>
              <option class="Lagawe">Cudog</option>
              <option class="Lagawe">Dulao</option>
              <option class="Lagawe">Jucbong</option>
              <option class="Lagawe">Luta</option>
              <option class="Lagawe">Montabiong</option>
              <option class="Lagawe">Olilicon</option>
              <option class="Lagawe">Poblacion East</option>
              <option class="Lagawe">Poblacion North</option>
              <option class="Lagawe">Poblacion South</option>
              <option class="Lagawe">Poblacion West</option>
              <option class="Lagawe">Ponghal</option>
              <option class="Lagawe">Pullaan</option>
              <option class="Lagawe">Tungngod</option>
              <option class="Lagawe">Tupaya</option>
              <option class="Lamut">Ambasa</option>
              <option class="Lamut">Bimpal</option>
              <option class="Lamut">Hapid</option>
              <option class="Lamut">Holowon</option>
              <option class="Lamut">Lawig</option>
              <option class="Lamut">Lucban</option>
              <option class="Lamut">Mabatobato</option>
              <option class="Lamut">Magulon</option>
              <option class="Lamut">Nayon</option>
              <option class="Lamut">Panopdopan</option>
              <option class="Lamut">Payawan</option>
              <option class="Lamut">Pieza</option>
              <option class="Lamut">Poblacion East</option>
              <option class="Lamut">Poblacion West</option>
              <option class="Lamut">Pugol</option>
              <option class="Lamut">Salamague</option>
              <option class="Lamut">Sanafe</option>
              <option class="Lamut">Umilag</option>
              <option class="Mayoyao">Aduyongan</option>
              <option class="Mayoyao">Alimit</option>
              <option class="Mayoyao">Ayangan</option>
              <option class="Mayoyao">Balangbang</option>
              <option class="Mayoyao">Banao,</option>
              <option class="Mayoyao">Banhal</option>
              <option class="Mayoyao">Bato-Alatbang</option>
              <option class="Mayoyao">Bongan</option>
              <option class="Mayoyao">Buninan</option>
              <option class="Mayoyao">Chaya</option>
              <option class="Mayoyao">Chumang</option>
              <option class="Mayoyao">Epeng</option>
              <option class="Mayoyao">Guinihon</option>
              <option class="Mayoyao">Inwaloy</option>
              <option class="Mayoyao">Langayan</option>
              <option class="Mayoyao">Liwo</option>
              <option class="Mayoyao">Maga</option>
              <option class="Mayoyao">Magulon</option>
              <option class="Mayoyao">Mapawoy</option>
              <option class="Mayoyao">Mayoyao Proper</option>
              <option class="Mayoyao">Mongol</option>
              <option class="Mayoyao">Nalbu</option>
              <option class="Mayoyao">Nattum</option>
              <option class="Mayoyao">Palaad</option>
              <option class="Mayoyao">Poblacion</option>
              <option class="Mayoyao">Talboc</option>
              <option class="Mayoyao">Tulaed</option>
              <option class="Tinoc">Ahin</option>
              <option class="Tinoc">Ap-apid</option>
              <option class="Tinoc">Binablayan</option>
              <option class="Tinoc">Danggo</option>
              <option class="Tinoc">Eheb</option>
              <option class="Tinoc">Gumhang</option>
              <option class="Tinoc">Impugong</option>
              <option class="Tinoc">Luhong</option>
              <option class="Tinoc">Tinoc</option>
              <option class="Tinoc">Tukucan</option>
              <option class="Tinoc">Tulludan</option>
              <option class="Tinoc">Wangwang</option>
              <option class="Balbalan">Ababa-an</option>
              <option class="Balbalan">Balantoy</option>
              <option class="Balbalan">Balbalan Proper</option>
              <option class="Balbalan">Balbalasang</option>
              <option class="Balbalan">Buaya</option>
              <option class="Balbalan">Dao-angan</option>
              <option class="Balbalan">Gawa-an</option>
              <option class="Balbalan">Mabaca</option>
              <option class="Balbalan">Maling</option>
              <option class="Balbalan">Pantikian</option>
              <option class="Balbalan">Poblacion</option>
              <option class="Balbalan">Poswoy</option>
              <option class="Balbalan">Talalang</option>
              <option class="Balbalan">Tawang</option>
              <option class="Lubuagan">Antonio Canao</option>
              <option class="Lubuagan">Dangoy</option>
              <option class="Lubuagan">Lower Uma</option>
              <option class="Lubuagan">Mabilong</option>
              <option class="Lubuagan">Mabongtot</option>
              <option class="Lubuagan">Poblacion,</option>
              <option class="Lubuagan">Tanglag</option>
              <option class="Lubuagan">Uma del Norte</option>
              <option class="Lubuagan">Upper Uma</option>
              <option class="Pasil">Ableg</option>
              <option class="Pasil">Bagtayan</option>
              <option class="Pasil">Balatoc</option>
              <option class="Pasil">Balenciagao Sur</option>
              <option class="Pasil">Balinciagao Norte</option>
              <option class="Pasil">Cagaluan</option>
              <option class="Pasil">Colayo</option>
              <option class="Pasil">Dalupa</option>
              <option class="Pasil">Dangtalan</option>
              <option class="Pasil">Galdang</option>
              <option class="Pasil">Guina-ang</option>
              <option class="Pasil">Magsilay</option>
              <option class="Pasil">Malucsad</option>
              <option class="Pasil">Pugong</option>
              <option class="Pinukpuk">Aciga</option>
              <option class="Pinukpuk">Allaguia</option>
              <option class="Pinukpuk">Ammacian</option>
              <option class="Pinukpuk">Apatan</option>
              <option class="Pinukpuk">Asibanglan</option>
              <option class="Pinukpuk">Ba-ay</option>
              <option class="Pinukpuk">Ballayangon</option>
              <option class="Pinukpuk">Bayao</option>
              <option class="Pinukpuk">Camalog</option>
              <option class="Pinukpuk">Cawagayan</option>
              <option class="Pinukpuk">Dugpa</option>
              <option class="Pinukpuk">Katabbogan</option>
              <option class="Pinukpuk">Limos</option>
              <option class="Pinukpuk">Magaogao</option>
              <option class="Pinukpuk">Malagnat</option>
              <option class="Pinukpuk">Mapaco</option>
              <option class="Pinukpuk">Pakawit</option>
              <option class="Pinukpuk">Pinococ</option>
              <option class="Pinukpuk">Pinukpuk Junction</option>
              <option class="Pinukpuk">Socbot</option>
              <option class="Pinukpuk">Taga</option>
              <option class="Pinukpuk">Taggay</option>
              <option class="Pinukpuk">Wagud</option>
              <option class="Rizal">Babalag East</option>
              <option class="Rizal">Babalag West</option>
              <option class="Rizal">Bulbol</option>
              <option class="Rizal">Calaocan</option>
              <option class="Rizal">Kinama</option>
              <option class="Rizal">Liwan East</option>
              <option class="Rizal">Liwan West</option>
              <option class="Rizal">Macutay</option>
              <option class="Rizal">Romualdez</option>
              <option class="Rizal">San Francisco</option>
              <option class="Rizal">San Pascual</option>
              <option class="Rizal">San Pedro</option>
              <option class="Rizal">San Quintin</option>
              <option class="Rizal">Santor</option>
              <option class="Tanudan">Anggacan</option>
              <option class="Tanudan">Anggacan Sur</option>
              <option class="Tanudan">Babbanoy</option>
              <option class="Tanudan">Dacalan</option>
              <option class="Tanudan">Dupligan</option>
              <option class="Tanudan">Gaang</option>
              <option class="Tanudan">Lay-asan</option>
              <option class="Tanudan">Lower Lubo</option>
              <option class="Tanudan">Lower Mangali</option>
              <option class="Tanudan">Lower Taloctoc</option>
              <option class="Tanudan">Mabaca</option>
              <option class="Tanudan">Mangali Centro</option>
              <option class="Tanudan">Pangol</option>
              <option class="Tanudan">Poblacion</option>
              <option class="Tanudan">Upper Lubo</option>
              <option class="Tanudan">Upper Taloctoc</option>
              <option class="Tinglayan">Ambato Legleg</option>
              <option class="Tinglayan">Bangad Centro</option>
              <option class="Tinglayan">Basao</option>
              <option class="Tinglayan">Belong Manubal</option>
              <option class="Tinglayan">Bugnay</option>
              <option class="Tinglayan">Buscalan</option>
              <option class="Tinglayan">Butbut</option>
              <option class="Tinglayan">Dananao</option>
              <option class="Tinglayan">Loccong</option>
              <option class="Tinglayan">Lower Bangad</option>
              <option class="Tinglayan">Luplupa</option>
              <option class="Tinglayan">Mallango</option>
              <option class="Tinglayan">Ngibat</option>
              <option class="Tinglayan">Old Tinglayan</option>
              <option class="Tinglayan">Poblacion</option>
              <option class="Tinglayan">Sumadel 1</option>
              <option class="Tinglayan">Sumadel 2</option>
              <option class="Tinglayan">Tulgao East</option>
              <option class="Tinglayan">Tulgao West</option>
              <option class="Tinglayan">Upper Bangad</option>
              <option class="Barlig">Chupac</option>
              <option class="Barlig">Fiangtin</option>
              <option class="Barlig">Gawana</option>
              <option class="Barlig">Kaleo</option>
              <option class="Barlig">Latang</option>
              <option class="Barlig">Lias Kanluran</option>
              <option class="Barlig">Lias Silangan</option>
              <option class="Barlig">Lingoy</option>
              <option class="Barlig">Lunas</option>
              <option class="Barlig">Macalana,</option>
              <option class="Barlig">Ogoog</option>
              <option class="Bauko">Abatan</option>
              <option class="Bauko">Bagnen Oriente</option>
              <option class="Bauko">Bagnen Proper</option>
              <option class="Bauko">Balintaugan</option>
              <option class="Bauko">Banao</option>
              <option class="Bauko">Bila</option>
              <option class="Bauko">Guinzadan Central</option>
              <option class="Bauko">Guinzadan Norte</option>
              <option class="Bauko">Guinzadan Sur</option>
              <option class="Bauko">Lagawa</option>
              <option class="Bauko">Leseb</option>
              <option class="Bauko">Mabaay</option>
              <option class="Bauko">Mayag</option>
              <option class="Bauko">Monamon Norte</option>
              <option class="Bauko">Monamon Sur</option>
              <option class="Bauko">Mount Data</option>
              <option class="Bauko">Otucan Norte</option>
              <option class="Bauko">Otucan Sur</option>
              <option class="Bauko">Poblacion</option>
              <option class="Bauko">Sadsadan</option>
              <option class="Bauko">Sinto</option>
              <option class="Bauko">Tapapan</option>
              <option class="Besao">Agawa</option>
              <option class="Besao">Ambaguio</option>
              <option class="Besao">Banguitan</option>
              <option class="Besao">Besao East</option>
              <option class="Besao">Besao West</option>
              <option class="Besao">Catengan</option>
              <option class="Besao">Gueday</option>
              <option class="Besao">Kin-iway</option>
              <option class="Besao">Lacmaan</option>
              <option class="Besao">Laylaya</option>
              <option class="Besao">Padangan</option>
              <option class="Besao">Payeo</option>
              <option class="Besao">Suquib</option>
              <option class="Besao">Tamboan</option>
              <option class="Bontoc">Alab Oriente</option>
              <option class="Bontoc">Alab Proper</option>
              <option class="Bontoc">Balili</option>
              <option class="Bontoc">Bayyo</option>
              <option class="Bontoc">Bontoc Ili</option>
              <option class="Bontoc">Calutit</option>
              <option class="Bontoc">Caneo</option>
              <option class="Bontoc">Dalican</option>
              <option class="Bontoc">Gonogon</option>
              <option class="Bontoc">Guinaang</option>
              <option class="Bontoc">Mainit</option>
              <option class="Bontoc">Maligcong</option>
              <option class="Bontoc">Poblacion</option>
              <option class="Bontoc">Samoki</option>
              <option class="Bontoc">Talubin</option>
              <option class="Bontoc">Tocucan</option>
              <option class="Natonin">Alunogan</option>
              <option class="Natonin">Balangao</option>
              <option class="Natonin">Banao</option>
              <option class="Natonin">Banawal</option>
              <option class="Natonin">Butac</option>
              <option class="Natonin">Maducayan</option>
              <option class="Natonin">Poblacion</option>
              <option class="Natonin">Pudo</option>
              <option class="Natonin">Saliok</option>
              <option class="Natonin">Santa Isabel</option>
              <option class="Natonin">Tonglayan</option>
              <option class="Paracelis">Anonat</option>
              <option class="Paracelis">Bacarni</option>
              <option class="Paracelis">Bananao</option>
              <option class="Paracelis">Bantay</option>
              <option class="Paracelis">Bunot</option>
              <option class="Paracelis">Buringal</option>
              <option class="Paracelis">Butigue</option>
              <option class="Paracelis">Palitod</option>
              <option class="Paracelis">Poblacion</option>
              <option class="Sabangan">Bao-angan</option>
              <option class="Sabangan">Bun-ayan</option>
              <option class="Sabangan">Busa</option>
              <option class="Sabangan">Camatagan</option>
              <option class="Sabangan">Capinitan</option>
              <option class="Sabangan">Data</option>
              <option class="Sabangan">Gayang</option>
              <option class="Sabangan">Lagan</option>
              <option class="Sabangan">Losad</option>
              <option class="Sabangan">Namatec</option>
              <option class="Sabangan">Napua</option>
              <option class="Sabangan">Pingad</option>
              <option class="Sabangan">Poblacion</option>
              <option class="Sabangan">Supang</option>
              <option class="Sabangan">Supang</option>
              <option class="Sagada">Aguid</option>
              <option class="Sagada">Ambasing</option>
              <option class="Sagada">Angkeling</option>
              <option class="Sagada">Antadao</option>
              <option class="Sagada">Balugan</option>
              <option class="Sagada">Bangaan</option>
              <option class="Sagada">Dagdag</option>
              <option class="Sagada">Demang</option>
              <option class="Sagada">Fidelisan</option>
              <option class="Sagada">Kilong</option>
              <option class="Sagada">Madongo</option>
              <option class="Sagada">Nacagang</option>
              <option class="Sagada">Pide</option>
              <option class="Sagada">Poblacion</option>
              <option class="Sagada">Suyo</option>
              <option class="Sagada">Taccong</option>
              <option class="Sagada">Tanulong</option>
              <option class="Sagada">Tetepan Norte</option>
              <option class="Sagada">Tetepan Sur</option>
              <option class="Tadian">Balaoa/option>
              <option class="Tadian">Banaao</option>
              <option class="Tadian">Bantey</option>
              <option class="Tadian">Batayan</option>
              <option class="Tadian">Bunga</option>
              <option class="Tadian">Cadad-anan</option>
              <option class="Tadian">Cagubatan</option>
              <option class="Tadian">Dacudac</option>
              <option class="Tadian">Duagan</option>
              <option class="Tadian">Kayan East</option>
              <option class="Tadian">Kayan West</option>
              <option class="Tadian">Lenga</option>
              <option class="Tadian">Lubon</option>
              <option class="Tadian">Mabalite</option>
              <option class="Tadian">Masla</option>
              <option class="Tadian">Pandayan</option>
              <option class="Tadian">Poblacion</option>
              <option class="Tadian">Sumadel</option>
              <option class="Tadian">Tue</option>
              <option class="Adams">Adams</option>
              <option class="Bacarra">Bani</option>
              <option class="Bacarra">Buyon</option>
              <option class="Bacarra">Cabaruan</option>
              <option class="Bacarra">Cabulalaan</option>
              <option class="Bacarra">Cabusligan</option>
              <option class="Bacarra">Cadaratan</option>
              <option class="Bacarra">Calioet-Libong</option>
              <option class="Bacarra">Casilian</option>
              <option class="Bacarra">Corocor</option>
              <option class="Bacarra">Duripes</option>
              <option class="Bacarra">Ganagan</option>
              <option class="Bacarra">Libtong</option>
              <option class="Bacarra">Macupit</option>
              <option class="Bacarra">Nambaran</option>
              <option class="Bacarra">Natba</option>
              <option class="Bacarra">Paninaan</option>
              <option class="Bacarra">Pasiocan</option>
              <option class="Bacarra">Pasngal</option>
              <option class="Bacarra">Pipias</option>
              <option class="Bacarra">Pulangi</option>
              <option class="Bacarra">Pungto</option>
              <option class="Bacarra">San Agustin I</option>
              <option class="Bacarra">San Agustin II</option>
              <option class="Bacarra">San Andres I</option>
              <option class="Bacarra">San Andres II</option>
              <option class="Bacarra">San Gabriel I</option>
              <option class="Bacarra">San Gabriel II</option>
              <option class="Bacarra">San Pedro I</option>
              <option class="Bacarra">San Pedro II</option>
              <option class="Bacarra">San Roque I</option>
              <option class="Bacarra">San Roque II</option>
              <option class="Bacarra">San Simon I</option>
              <option class="Bacarra">San Simon II</option>
              <option class="Bacarra">San Vicente</option>
              <option class="Bacarra">Sangil</option>
              <option class="Bacarra">Santa Filomena I</option>
              <option class="Bacarra">Santa Filomena II</option>
              <option class="Bacarra">Santa Rita</option>
              <option class="Bacarra">Santo Cristo I</option>
              <option class="Bacarra">Santo Cristo II</option>
              <option class="Bacarra">Tambidao</option>
              <option class="Bacarra">Teppang</option>
              <option class="Bacarra">Tubburan</option>
              <option class="Badoc">Alay-Nangbabaan</option>
              <option class="Badoc">Alogoog</option>
              <option class="Badoc">Ar-arusip</option>
              <option class="Badoc">Aring</option>
              <option class="Badoc">Balbaldez</option>
              <option class="Badoc">Bato</option>
              <option class="Badoc">Camanga</option>
              <option class="Badoc">Canaan</option>
              <option class="Badoc">Caraitan,</option>
              <option class="Badoc">Gabut Norte</option>
              <option class="Badoc">Gabut Sur</option>
              <option class="Badoc">Garreta</option>
              <option class="Badoc">La Virgen Milagrosa</option>
              <option class="Badoc">Labut</option>
              <option class="Badoc">Lacuben</option>
              <option class="Badoc">Lubigan</option>
              <option class="Badoc">Mabusag Norte</option>
              <option class="Badoc">Mabusag Sur</option>
              <option class="Badoc">Mabusag Sur</option>
              <option class="Badoc">Morong</option>
              <option class="Badoc">Nagrebcan</option>
              <option class="Badoc">Napu</option>
              <option class="Badoc">Pagsanahan Norte</option>
              <option class="Badoc">Pagsanahan Sur</option>
              <option class="Badoc">Paltit</option>
              <option class="Badoc">Parang</option>
              <option class="Badoc">Pasuc</option>
              <option class="Badoc">Santa Cruz Norte</option>
              <option class="Badoc">Santa Cruz Sur</option>
              <option class="Badoc">Saud</option>
              <option class="Badoc">Turod</option>
              <option class="Bangui">Abaca</option>
              <option class="Bangui">Bacsil</option>
              <option class="Bangui">Banban</option>
              <option class="Bangui">Baruyen</option>
              <option class="Bangui">Dadaor</option>
              <option class="Bangui">Lanao</option>
              <option class="Bangui">Malasin</option>
              <option class="Bangui">Manayon</option>
              <option class="Bangui">Masikil</option>
              <option class="Bangui">Nagbalagan</option>
              <option class="Bangui">Payac</option>
              <option class="Bangui">San Lorenzo</option>
              <option class="Bangui">Taguiporo</option>
              <option class="Bangui">Utol</option>
              <option class="Banna">Balioeg</option>
              <option class="Banna"></option>
              <option class="Banna">Bangsar</option>
              <option class="Banna">Barbarangay</option>
              <option class="Banna">Binacag</option>
              <option class="Banna">Bomitog</option>
              <option class="Banna">Bugasi</option>
              <option class="Banna">Caestebanan</option>
              <option class="Banna">Caribquib</option>
              <option class="Banna">Catagtaguen</option>
              <option class="Banna">Crispina</option>
              <option class="Banna">Hilario</option>
              <option class="Banna">Imelda</option>
              <option class="Banna">Lorenzo</option>
              <option class="Banna">Macayepyep</option>
              <option class="Banna">Marcos</option>
              <option class="Banna">Nagpatayan</option>
              <option class="Banna">Sinamar</option>
              <option class="Banna">Tabtabagan</option>
              <option class="Banna">Valdez</option>
              <option class="Banna">Valenciano</option>
              <option class="Burgos">Ablan Sarat</option>
              <option class="Burgos">Agaga</option>
              <option class="Burgos">Bayog</option>
              <option class="Burgos">Bobon</option>
              <option class="Burgos">Buduan</option>
              <option class="Burgos">Nagsurot</option>
              <option class="Burgos">Paayas</option>
              <option class="Burgos">Pagali</option>
              <option class="Burgos">Poblacion</option>
              <option class="Burgos">Saoit</option>
              <option class="Burgos">Tanap</option>
              <option class="Carasi">Angset</option>
              <option class="Carasi">Barbaqueso</option>
              <option class="Carasi">Virbira</option>
              <option class="Currimao">Anggapang Norte</option>
              <option class="Currimao">Anggapang Sur</option>
              <option class="Currimao">Bimmanga</option>
              <option class="Currimao">Cabuusan</option>
              <option class="Currimao">Comcomloong</option>
              <option class="Currimao">Gaang</option>
              <option class="Currimao">Lang-ayan-Baramban</option>
              <option class="Currimao">Lioes</option>
              <option class="Currimao">Maglaoi Centro</option>
              <option class="Currimao">Maglaoi Norte</option>
              <option class="Currimao">Maglaoi Sur</option>
              <option class="Currimao">Paguludan-Salindeg</option>
              <option class="Currimao">Pangil</option>
              <option class="Currimao">Pias Norte</option>
              <option class="Currimao">Pias Sur</option>
              <option class="Currimao">Poblacion I</option>
              <option class="Currimao">Poblacion II</option>
              <option class="Currimao">Salugan</option>
              <option class="Currimao">San Simeon</option>
              <option class="Currimao">Santa Cruz</option>
              <option class="Currimao">Tapao-Tigue</option>
              <option class="Currimao">Torre</option>
              <option class="Currimao">Victoria</option>
              <option class="Dingras"></option>
              
              
              
             
             

             
             
             
             

             
 











              

              












             





              </select required>
              </div>

              <div class="form-group">
              <div class="form-group col-md-3">
              <label for="zip">Zip</label>
              <input type="number" class="form-control" id="zip" name="zip" required>
              </div>
            </div>

      </div>

  </fieldset>


  <fieldset>
          
    <legend>School Information</legend>

          <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="school">School</label>
                  <select class="form-control" name="school">
                  <option value="Plmun">Pamantasan ng Lungsod ng Muntinlupa</option>
                  <option value="MunSci">Muntinlupa Science Highscool</option>
                  <option value="IES">Itaas Elementary School</option> 
                  </select required>
                </div>

                <div class="form-group col-md-6">
                <label for="course">Course - select "None" if not yet college</label>
                  <select class="form-control" name="course">
                  <option class="Plmun">ACT</option>
                  <option class="Plmun">BSIT</option>
                  <option class="Plmun">BSCS</option> 
                  <option class="IES">BSArch</option> 
                  <option class="MunSci">BSMech</option> 
                  <option class="Plmun">None</option> 
                  <option class="MunSci">None</option> 
                  <option class="IES">None</option>
                  </select required>
                </div>
                
          </div>

          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="yrlevel">Year Level</label>
                  <select class="form-control" name="yrlevel">
                  <option>Grade 1</option>
                  <option>Grade 2</option>
                  <option>Grade 3</option>
                  <option>Grade 4</option>
                  <option>Grade 5</option>
                  <option>Grade 6</option>
                  <option>Grade 7</option>
                  <option>Grade 8</option>
                  <option>Grade 9</option>
                  <option>Grade 10</option>
                  <option>Grade 11</option>
                  <option>Grade 12</option>
                  <option>1st year - College</option>
                  <option>2nd year - College</option>
                  <option>3rd year - College</option>
                  <option>4th year - College</option>
                  <option>5th year - College</option>
                  </select required>
              </div>

              <div class="form-group col-md-6">
                <label for="Student_ID">Student Number</label>
                <input type="text" class="form-control" name="Student_ID" placeholder="Student Number" required>
              </div>

          </div>

              <div class="form-group col-md-12">
                <label for="Saddress">School Address</label>
                <input type="text" class="form-control" name="Saddress" placeholder="1234 Main Street" required>
              </div>

  </fieldset>

  <fieldset>
    <legend>Parents Information</legend>


          <div class="form-row">
             <div class="form-group col-md-6">
                <label for="MoName">Mother Maiden Name</label>
                <input type="text" class="form-control" name="MoName" placeholder="Mother Maiden Name" required>
              </div>

               <div class="form-group col-md-6">
                <label for="FaName">Father Name</label>
                <input type="text" class="form-control" name="FaName" placeholder="Father Name" required>
              </div>
          </div>

          <div class="form-row">
             <div class="form-group col-md-6">
                <label for="MoEduc">Mother Educational Attainment</label>
                  <select class="form-control" name="MoEduc">
                  <option>Primary</option>
                  <option>Secondary</option>
                  <option >Vocational</option>
                  <option >Tertiary - UnderGraduate</option>
                  <option >Tertiary - Graduate</option>
                  <option >Tertiary - Doctoral</option>
                  </select required>
              </div>

               <div class="form-group col-md-6">
                <label for="FaEduc">Father Educational Attainment</label>
                  <select class="form-control" name="FaEduc">
                  <option>Primary</option>
                  <option>Secondary</option>
                  <option >Vocational</option>
                  <option >Tertiary - UnderGraduate</option>
                  <option >Tertiary - Graduate</option>
                  <option >Tertiary - Doctoral</option>
                  </select required>
              </div>
          </div>


          <div class="form-row">
            <div class="form-group col-md-6">
            <label class="RaMarital">Marital Status</label><br>
                <input name="RaMarital" type="radio" value="Divorced" checked>Divorced
                <input name="RaMarital" type="radio" value="Seperated">Seperated
            </div>

          </div>
</fieldset>

<a href="index.php">Go back</a>
        <input class="btn btn-primary" type="submit" name="register" value="Register">
      </form>
    </div>

  </section>

  


	<script src="jquery-3.1.1.min.js"></script>
	<script src="bootstrap.min.js"></script>

<script>
  
(() => {
  'use strict';

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation');

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach((form) => {
    form.addEventListener('submit', (event) => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
})();



</script>

<script>
    var city = $("[name=city] option").detach()
$("[name=province]").change(function() {
  var val = $(this).val()
  $("[name=city] option").detach()
  city.filter("." + val).clone().appendTo("[name=city]")
}).change()
</script>



  <script>
    var course = $("[name=course] option").detach()
$("[name=school]").change(function() {
  var val = $(this).val()
  $("[name=course] option").detach()
  course.filter("." + val).clone().appendTo("[name=course]")
}).change()
</script>

<script>
    var barangay = $("[name=barangay] option").detach()
$("[name=city]").change(function() {
  var val = $(this).val()
  $("[name=barangay] option").detach()
  barangay.filter("." + val).clone().appendTo("[name=barangay]")
}).change()
</script>

</body>
</html>

<?php 

  unset($_SESSION['errprompt']);
  mysqli_close($con);

?>