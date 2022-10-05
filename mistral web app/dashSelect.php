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
            margin:10px;
        }
        </style>
    </head>

<script>

function selectDashboard()
{
    var dash = document.getElementById("dash").value;
    if(dash!=="--select dashboard--")
        window.location = "homes.php?var="+dash;
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

</body>
</html>