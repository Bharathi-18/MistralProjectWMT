<?php

include 'dashSelect.php';

?>

<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>

    <style>
      .content
      {
        margin:10px;
      }
      .names{
        text-align: center;
        font-size:32px;
        color:#1F2937;
        font-weight: bold;
      }
      .emptyRecord
      {
        color: #1F2937;
      }

    </style>
  </head>
  <body style="overflow-x: hidden;">

      <br> 
      <?php      
        // include 'dashSelect.php';
        // session_start();
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = $_SESSION['user'];
        // $dashboardName = $_POST['dashSelect'];
        // echo $dashboardName;

        // echo $var;

        // echo "get val : ".$_GET['var'];
        // echo "homes";
        $conn = new mysqli($host,$user,$pass,$db);
        // include 'detUser.php';
        // $tableName = $_SESSION['user'];
        // echo "session name : ".$tableName." mmm";

        $query = "SELECT * FROM dbnames where names='".$_GET['var']."'";
        $dashBoard = $conn->query($query);

        $dashBoardRes = mysqli_fetch_assoc($dashBoard);
        $tableName = $dashBoardRes['id'];
        $dashboardName = $dashBoardRes['names'];
        ?>
        <div class="names">
        <?php echo $dashboardName ?>
        </div>
        <br> <br>  <br>
        <?php
        $query = "SELECT * from ".$tableName;
        
        $result = $conn->query($query);


        $res = '<div class="card-deck">';
        $className = "card bg-warning";
        $cnt = 0;
        if($result== true){ 
          if ($result->num_rows > 0) {
            while($rslt =  mysqli_fetch_assoc($result))
            {
              if($cnt%3==0)
              {
                $className = "card bg-warning";
              }
              else if($cnt%3==1)
              {
                $className = "card bg-success";          
              }
              else if($cnt%3==2)
              {
                $className = "card bg-danger";          
              }
              $res = $res."<div class=".'"'.$className.'"'."style=".'"'."height:200px;".'"'."><div class=".'"'."card-body text-center";
              $res = $res.'"'."><button id=\"btnName\" type=\"button\" class=\"btn btn-dark\" value=\"".$rslt['locSen']."\">sensors</button></div>";
              
              $tempVar = "";
              $s = $rslt['locSen'];
              $val = "";
              // for($i=0;$i<strlen($s);$i++)
              // {
              //     if($s[$i]=='/')
              //     {
              //       break;
              //     }
              // }
              // for($j=$i;$j<strlen($s);$j++)
              // {
              //   $tempVar += $s[$j];
              // }

              // if($tempVar=="temperature")
              // {
              //   $val = shell_exec(escapeshellcmd('python subscribe.py TemperatureCelsius TemperatureFarenheit'));
              // }
              // if($tempVar=="ph")
              // {
              //   $val = shell_exec(escapeshellcmd('python subscribe.py PH_value PH_status'));
              // }
              // if($tempVar=="TDS")
              // {
              //   $val = shell_exec(escapeshellcmd('python subscribe.py TDS TDS_status'));
              // }
              $res = $res."<div class=\"card-body text-center\"><p class=\"card-text\">".$rslt['locSen']."</p><br><br><p class=\"card-text\">".$val."</div></div>";
              $cnt++;
              if($cnt%3==0)
              {
                $res = $res.'</div><br><br><div class="card-deck">';
              }
            }
            $res = $res."</div>";
          } else {
            $res = "<h1 class='emptyRecord'>no record found</h1>";  
          }
        }else{
          $msg= mysqli_error($db);
        }
        ?>
        <div class="content">
        <?php
        echo $res;
        ?>
        </div>
  </body>
</html>