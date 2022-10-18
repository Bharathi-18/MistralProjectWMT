<?php

use function PHPSTORM_META\type;

    session_start();
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = $_SESSION['user'];
    $conn = new mysqli($host,$user,$pass,$db);
    $query = "SELECT * FROM dbnames where names='".$_GET['dbn']."'";
    $ord = $_GET['ord'];
    $dashBoard = $conn->query($query);
    $dashBoardRes = mysqli_fetch_assoc($dashBoard);
    $tableName = $dashBoardRes['id'];
    $val = "SELECT * from ".$tableName;
    $exec = $conn->query($val);
    $oldLis = [];
    $i = 0;
    while($str = mysqli_fetch_assoc($exec))
    {
        if($str['locSen']!==" ")
            $oldLis[$i++] = $str['locSen'];
    }

    $ordLis = [];
    $ordRes = "";
    $indexVal = 0;
    for($temp = 0;$temp<strlen($ord);$temp++)
    {
        if($ord[$temp]!=',')
        {
            $ordRes.=$ord[$temp];
        }
        else
        {
            $ordLis[$indexVal++] = (int)$ordRes;
            $ordRes = "";
        }
    }
    $ordLis[$indexVal++] = (int)$ordRes;
    $query = "truncate table ".$tableName;
    $del = $conn->prepare($query);
    $del->execute();
    for($tempvar = 0; $tempvar<$i ;$tempvar++)
    {
        $newIns = $oldLis[$ordLis[$tempvar]];
        $insertDash = "INSERT INTO ".$tableName." VALUES('".$newIns."')";
        $dashInserted = $conn->prepare($insertDash);
        $dashInserted->execute();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
	<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src ="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        // function alertUser()
        // {
            swal({title:"Updated Successfully!",
                icon:"success",
                button:"OK",
                // timer:10000
            });
        // }
    </script>
</head>
<body>
    
</body>
</html>