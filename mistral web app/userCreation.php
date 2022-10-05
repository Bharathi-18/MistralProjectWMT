<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "wmt";
            $username = $_POST["username"];
            $pswd = $_POST["password"];
            $privilege = $_POST["privilege"];

            $conn = new mysqli($host,$user,$pass,$db);
            $connuser = new mysqli($host,$user,$pass);

            $stmnt = $conn->prepare("select * from usertable");
            $stmnt->execute();
            $stmnt->store_result();
            $rn = $stmnt->num_rows;
            $rn+=1;
            $tableName = "WMT".$rn;

            $createDB = "create database ".$tableName;
            $connuser->query($createDB);

            $connNewDB = new mysqli($host,$user,$pass,$tableName);

            $createTable = "create table dbnames(id varchar(10),names varchar(50))";
            $stmnt = $connNewDB->prepare($createTable);
            $stmnt->execute();

            $insertValInAdmin = "insert into usertable values('".$tableName."','".$username."','".$pswd."','".$privilege."')";
            $stmnt = $conn->prepare($insertValInAdmin);
            $stmnt->execute();

            header('location:createUser.php');
        ?>
    </body>
</html>






















