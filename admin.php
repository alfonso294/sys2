<?php 

  session_start();

  require 'connect.php';
  require 'functions.php';
  require 'header2.php';
  require 'footer.php';

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
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="table responsive">
                        <table id="dataset"class="table table-bordered table-hover table-striped table-sm" >
                            <thead class="thead-dark">
                                <tr>
                                   
                                    <th>User Name</th>
                                    <th>Password</th>
                                    <th>Student Number</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Course</th> 
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
                                    echo '<td>'. $row['yrlevel'].'</td>';
                                    echo '<td>'. $row['School'].'</td>';
                                   
                                    echo '<td><b>'. $row['status'].'</b></td>';

                                    echo '<td> <a type="button" class="btn btn-info btn-sm" href="view.php?action=edit & username='.$row['username'] . '" > VIEW </a> ';
                                    echo ' <a  type="button" class="btn btn-sm btn-warning" href="edit.php?action=edit & username='.$row['username'] . '"> EDIT </a> ';
                                    echo ' <a  type="button" class="btn btn-sm btn-danger" href="delete.php?type=student&delete & username=' . $row['username'] . '">DELETE </a> </td>';
                                    echo '</tr> ';
                                

                                        }
                                ?>
                                

                            </tbody>
                        </table>
                        
                        <form method="post" action="export.php">  
                        <input type="submit" name="export" value="CSV Export" class="btn btn-success" /> 
                        <a class="btn btn-primary" href="data.php" role="button">View Data</a>
                        <a class="btn btn-secondary" href="logout.php" role="button">Logout</a>

                    
                         </form>  
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

