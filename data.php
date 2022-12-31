<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    .center {
  margin-left: auto;
  margin-right: auto;
}
  </style>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 
    <link href="bootstrap.min.css" rel="stylesheet">
  <link href="main.css" rel="stylesheet">
</head>
<title>Data</title>
<body>
<br><br>

<?php 
  $con = new mysqli('localhost','root','','studentinfosystem');
  $query = $con->query("
    SELECT COUNT(course) as course, (School) as School
FROM school GROUP BY School;
  ");

  foreach($query as $data)
  {
    $course[] = $data['course'];
    $School[] = $data['School'];
  }

?>

<div class="registration-form box-center clearfix">
  <h1>Data</h1>
<div style="width: 500px;">
  <canvas id="myChart"></canvas>
</div>
 
<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($School) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Student Count',
      data: <?php echo json_encode($course) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
      
    }]
  };

  const config = {
    type: 'pie',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

<a class="btn btn-secondary" href="admin.php" role="button">Go back</a>

</div>


</body>
</html>