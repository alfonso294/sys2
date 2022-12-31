<?php 
 
// Load the database configuration file 
include_once 'connect.php'; 
 
// Fetch records from database 
$query = $con->query("SELECT * FROM school WHERE grlevel BETWEEN 1 AND 6
ORDER BY grlevel;"); 
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "student-data_Elementary_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('Student ID', 'FIRST NAME', 'LAST NAME', 'COURSE', 'GRADE LEVEL', 'EMAIL', 'SCHOOL'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        
        $lineData = array($row['Student_ID'],$row['F_Name'], $row['L_Name'], $row['course'], $row['grlevel'], $row['email'],$row['School']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>