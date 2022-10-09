<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>

    .names{
        text-align: center;
        font-size:32px;
        color:#1F2937;
        font-weight: bold;
        top: 50%;
        left: 50%;
      }

</style>

<body>

    <?php
        session_start();
        $db1 = $_SESSION['user'];
        $p = $_GET["lis"];
        $str = "";
        $host = "localhost";
        $user = "root";
        $pass = "";
        $conn = new mysqli($host,$user,$pass,$db1);
        $flag = 0;
        $dashName = "";
        for($temp = 0;$temp<strlen($p);$temp++)
        {
            if($p[$temp]=='@')
            {
                $flag = 1;
            }
            else if($flag==1)
            {
                $dashName.=$p[$temp];
            }
        }
        $stmntTemp = $conn->query("SELECT * FROM dbnames");
        if($stmntTemp)
        {
            $stmnt = $conn->prepare("select * from dbnames");
            $stmnt->execute();
            $stmnt->store_result();
            $rn = $stmnt->num_rows;
            $rn+=1;
            $tableName = "db".$rn;
        }
        else
        {
            $tableName = "db1";
        }
        $stmntTemp->close();
        $insertDash = "INSERT INTO dbnames VALUES('".$tableName."','".$dashName."')";
        $dashInserted = $conn->prepare($insertDash);
        $dashInserted->execute();

        $createTable = "CREATE TABLE ".$tableName."(locSen varchar(50))";
        $tableCreated = $conn->prepare($createTable);
        $tableCreated->execute();

        for($i=1;$i<strlen($p);$i++)
        {
            if($p[$i]==',' || $p[$i]=='@' )
            {
                $query = "INSERT INTO ".$tableName." VALUES('".$str."')";                            
                $stmnt = $conn->prepare($query);
                $stmnt->execute();
                echo "str : ".$str;
                echo "<br><br>";
                $str = ""; 
            }
            else
            {
                $str=$str.$p[$i];
            }
        }

        // header('location:configure_dashboard.php');
    ?>

        <div class="names">
            <h1>Dashboard created successfully</h1>
        </div>

</body>
</html>