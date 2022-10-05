<html>
    <head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>

<style>
  .card-deck{
    width: 95%;
  }
    .names{
    text-align: center;
    font-size:22px;
    color:#1F2937;
    font-weight: bold;

}</style>
    </head>
    <body style="overflow-x: hidden;">
    
<?php

// $con= new mysqli('localhost','root','','wmt');

// if($con)
// {
//    // echo('connection done');
// }
// else{
-//    // echo('error');
// }
session_start();
// $query="select * from  dashboard where Id=1";
// $result=mysqli_query($con,$query);
// $row=mysqli_fetch_array($result);
// $_SESSION['r']=$row['readings'];
// $_SESSION['l']=$row['Loc/Sensor'];
$_SESSION['r']=0.5;
$_SESSION['l']=0.5;
?>

      <br>
      <center>
          <div class="card-deck">
          <div class="card" style="height:200px;" >
            <div class="card-body text-center" onclick="location.href='gauges.php'">
              <p class="card-text"><?=$row['Loc/Sensor']?></p>
              
            </div>
          </div>
          <div class="card bg-warning" style="height:200px;">
            <div class="card-body text-center">
              <p class="card-text">second value</p>
            </div>
          </div>
          <div class="card bg-success" style="height:200px;">
            <div class="card-body text-center">
              <p class="card-text"> third value</p>
            </div>
          </div>
          <div class="card bg-danger" style="height:200px;">
            <div class="card-body text-center">
              <p class="card-text">fourth value</p>
            </div>
          </div>  
        </div>
        <br>
       
        </center>
    </body>
</html>