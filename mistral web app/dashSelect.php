<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
        <style>
          .dashSelect
          {
            padding:10px;
          }
          .names{
            text-align: center;
            font-size:32px;
            color:#1F2937;
            font-weight: bold;
          }
          .content
          {
            padding:10px;
          }
        </style>
    </head>

    <script>

        function selectDashboard()
        {
            var dash = document.getElementById("dash").value;

            if(dash==="public")
            {
                window.location = "dashSelect.php";
                document.getElementById("publicDash").style = "display:flex";
            }
            if(dash!=="--select dashboard--" && dash!=="public")
            {
                document.getElementById("publicDash").style = "display:none";
                window.location = "homes.php?var="+dash;
            }
        }

    </script>

    <body>
      <?php
        session_start();
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = $_SESSION['user'];
        $conn = new mysqli($host,$user,$pass,$db);
        $val = "SELECT * FROM dbnames";
        $exec = $conn->query($val);

        $stmnt = $conn->query("SELECT * FROM dbnames");

        $printVal = "<option value=\"public\">";
        if($stmnt){

        while($str = mysqli_fetch_assoc($exec))
        {
            $printVal.="<option value=\"".$str['names']."\">";
        }
        }
        else{
            echo "<h1>Configure Dashboard</h1>";
        }
      ?>

      <div class="dashSelect">
          <input onChange="selectDashboard();" class="shadow-sm rounded"  list="dashSelect" id="dash" placeholder=" --select dashboard--">
          <datalist id="dashSelect">
              <?php              
                echo $printVal;

              ?>
          </datalist>
          </select>
      </div>
      <?php

        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = $_SESSION['user'];
        $conn = new mysqli($host,$user,$pass,"wmt");
        $query = "SELECT * from public";
        $dashboardName = "Public Dashboard";
        $result = $conn->query($query);
      ?>
      <div id="publicDash" class="names">
        <?php echo "<br>".$dashboardName."<br><br>" ?>
        </div>
        <?php
          $res = '<div id="publicDash" class="card-deck">  ';
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
                $res = $res."<div class=\"card-body text-center\"><p class=\"card-text\">".$rslt['locSen']."</p><br><br><p class=\"card-text\">".$val."</div></div>";
                $cnt++;
                if($cnt%3==0)
                { 
                  $res = $res.'</div><br><br><div class="card-deck">';
                }
              }
              $res = $res."</div>";
            }
            else
            {
              $res = "<h1 class='emptyRecord'>no record found</h1>";  
            }
            }
            else{
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