<?php 
    session_start();
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db1 = "wmt";
    $conn = new mysqli($host,$user,$pass,$db1);
    $db = $conn;
    $tableName="usertable";
    if(isset($_POST['save']))
    {
        echo "submit";
        $usrnm = $_POST['username'];
        $pswd = $_POST['password'];
    }
    $query = "SELECT * FROM usertable WHERE name = '".$usrnm."' AND password = '".$pswd."'";
    $sql = $conn->query($query);
    $result = $sql->fetch_assoc();
    $_SESSION['user'] = $result['id'];
    echo $_SESSION['user'];
    header('location:dash.php');
?>