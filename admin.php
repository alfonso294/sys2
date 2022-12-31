<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://kit.fontawesome.com/9d45450406.js" crossorigin="anonymous"></script>

    <title></title>
</head>
<body>

<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';
  require 'header2.php';
  

  if (!isset($_SESSION['username']))
    header("Location: index.php");
  
 ?>

<style>
 table td, table th  
            {    
             
            max-width: 200px;
            word-wrap: break-word;
            }



body {
  background-image: url("form1.png");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
           
</style>



<body id="body1">

    <section class="center-text"><br><br>
<div class="registration-form box-center">
<br><br><br><div id="page-wrapper">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="table responsive, overflow-x:auto;">
                        <table id="dataset"class="table table-bordered table-hover table-striped table-sm" >
                            <thead class="thead-light">
                                <tr>
                                   
                                    <th>User Name</th>
                                    <th>Password</th>
                                    <th>Student Number</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Course</th> 
                                    <th>Grade Level</th>
                                    <th>Year Level</th>
                                    <th>School</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                
                                <?php
                                $query = 'SELECT c. * , p.* FROM students c, school p WHERE c.Student_ID = p.Student_ID';
                                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                               
                                
                                while($row = mysqli_fetch_assoc($result)){

                                    echo '<tr>';
                                    
                                    echo '<td>'. $row['username'].'</td>';
                                    echo '<td>'. $row['password'].'</td>';
                                    echo '<td>'. $row['Student_ID'].'</td>';
                                    echo '<td>'. $row['firstname'].'</td>';
                                    echo '<td>'. $row['lastname'].'</td>';
                                    echo '<td>'. $row['course'].'</td>';
                                    echo '<td>'. $row['grlevel'].'</td>';
                                    echo '<td>'. $row['yrlevel'].'</td>';
                                    echo '<td>'. $row['School'].'</td>';
                                   
                                    echo '<td><b>'. $row['status'].'</b></td>';

                                    echo '<td> <a href="view.php?username='. $row['username'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                    echo ' <a href="edit.php?action=edit & username='.$row['username'] .'" class="mr-3" title="Edit Record" data-toggle="tooltip"><i class="fa-solid fa-user-pen"></i></a>';
                                    echo ' <a href="delete.php?type=student&delete & username=' . $row['username'] . '" class="mr-3" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a></td>';
                                    echo '</tr> ';
                                

                                        } 
                                ?>
                                

                            </tbody>
                        </table>
                        <br><br><br><br>
                        <a class="btn btn-secondary" href="export1.php" role="button">View Downloables</a>
                        <a class="btn btn-primary" href="data.php" role="button">View Data</a>
                        <a class="btn btn-secondary" href="logout.php" role="button">Logout</a>

                     </div>
                </div>
            </div>
        </div>

    </div>
    



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>




  <script>
     $(document).ready(function() {
    $('#dataset').DataTable( {
        "paging":   true,
        "ordering": true,
        "info":     true,
        "pagingType": 'full_numbers',
        order: [[1, 'desc']],
    } );
} );

 </script>


</body>
</html>

