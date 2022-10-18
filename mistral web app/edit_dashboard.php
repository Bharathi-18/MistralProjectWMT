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
		$(function() {
			$( "#reorder" ).sortable({
			update: function(event, ui) {
				getIdsOfImages();
			}//end update		
			});
		});
		function getIdsOfImages() {
			var values = [];
            
			$('.editDash').each(function (index) {
				values.push($(this).attr("id").replace("div", ""));
			});
            $('#output').val(values);
            console.log(values);
		}
		function dispVal()
		{
			var i = document.getElementById("output").value;
            var name = document.querySelector("#dashboardname").textContent;
            // console.log(name);
            window.location = "updateDash.php?ord="+i+"&dbn="+name;
            console.log(i);

		}
	</script>
    <style>
        .names{
            text-align: center;
            font-size:32px;
            color:#1F2937;
            font-weight: bold;
        }
        .btn_cls{
            float: right;
            font-size: 20px;
            background-color:#1F2937;
            color:whitesmoke;
        }
        ::placeholder{
            color: whitesmoke;
        }

        .btn1{
            font-size: 6px;
            width:140px;
            border:none;
            height:30px;
            background-color:#1F2937;
            color:whitesmoke;
            text-align:center;
            border-radius:5px;
        }
        .btn1:hover{
            color: #1F2937;
            background-color: whitesmoke;
        }
        .card{
            width:300px;
            height:40px;
            padding:7px;
            margin-bottom: 10px;
        }
        .card:hover{
            cursor:pointer;
        }
        .editDash{
            font-size: 16px;
        }
        .content{
            /* margin-left: 38%; */
            align-items: center;
        }
    </style>
    </head>
    <body>
        <?php 
            session_start();
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = $_SESSION['user'];
            $conn = new mysqli($host,$user,$pass,$db);
            $query = "SELECT * FROM dbnames where names='".$_GET['dbn']."'";
        ?>
        <div class="names">
           <?php echo " <h3 id=\"dashboardname\">".$_GET['dbn']."</h3>"; ?>
        </div>
        <br><br>
      <center>
        <div class="content">
            <?php
                $dashBoard = $conn->query($query);
                $dashBoardRes = mysqli_fetch_assoc($dashBoard);
                $tableName = $dashBoardRes['id'];
                $val = "SELECT * from ".$tableName;
                $exec = $conn->query($val);
                $oldLis = [];
                $indexCnt = 0;
                $res = "<div id=\"reorder\">";
                while($str = mysqli_fetch_assoc($exec))
                {
                    $oldLis[$indexCnt++] = $str['locSen'];
                    $res = $res."<div class=\"card shadow\"><div id=\"div".($indexCnt-1)."\" class=\"editDash\"><h5>".$str['locSen']."</h5></div></div>";
                }
                $indexCnt = 0;
                $res .= "</div><div class=\"order\"><input id=\"output\" type=\"text\" value=\"\"></div>";
                echo $res;
            ?>
            <br><br>
            <button onclick="dispVal()" class="btn1" id="config" style="font-size:17px">Update</button>
        </div>
      </center>
       
    </body>
</html>