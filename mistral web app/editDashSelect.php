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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
            if(dash!=="--select dashboard--" && dash!=="public")
            {
                window.location = "edit_dashboard.php?dbn="+dash;
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

        $printVal = "";
        if($stmnt){
            while($str = mysqli_fetch_assoc($exec))
            {
                $printVal.="<option value=\"".$str['names']."\">";  
            }
        }

        
      ?>

      <div class="dashSelect">
          <input onChange="selectDashboard();" class="shadow-sm rounded"  list="dashSelect" id="dash" placeholder="&#xF002; Select Dashboard"style="border:none;border-bottom:2px solid black;color:black;font-family: Arial,FontAwesome;font-size:13px;">
          <datalist id="dashSelect">
              <?php              
                echo $printVal;
              ?>
          </datalist>
          </select>
      </div>
    </body>
</html>