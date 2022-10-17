<?php

use function PHPSTORM_META\type;

    session_start();
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = $_SESSION['user'];
    $conn = new mysqli($host,$user,$pass,$db);
    // echo $_GET['dbn'];
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