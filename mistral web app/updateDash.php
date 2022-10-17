<?php

    session_start();
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = $_SESSION['user'];
    $conn = new mysqli($host,$user,$pass,$db);
    $query = "SELECT * FROM dbnames where names='".$_GET['dbn']."'";
    $dashBoard = $conn->query($query);
    $dashBoardRes = mysqli_fetch_assoc($dashBoard);
    $tableName = $dashBoardRes['id'];

?>