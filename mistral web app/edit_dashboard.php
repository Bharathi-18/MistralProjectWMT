
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
	<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src ="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
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
		}
		function dispVal()
		{
			var i = document.getElementById("output").value;
            window.location = "edit_dashboard.php?ord="+i+"?dbn=";

		}
	</script>
    <style>

    .names{
        text-align: center;
        font-size:32px;
        color:#1F2937;
        font-weight: bold;
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
        // $db = "wmt1";
        $conn = new mysqli($host,$user,$pass,$db);
        $query = "SELECT * FROM dbnames where names='".$_GET['dbn']."'";
        
    ?>
    <div class="names">
        <?php echo $_GET['dbn']; ?>
    </div>

    <?php

        $dashBoard = $conn->query($query);
        $dashBoardRes = mysqli_fetch_assoc($dashBoard);
        $tableName = $dashBoardRes['id'];
        $val = "SELECT * from ".$tableName;
        $exec = $conn->query($val);
        $oldLis = [];
        $i = 0;
        $res = "<div id=\"reorder\">";
        while($str = mysqli_fetch_assoc($exec))
        {
            $oldLis[$i++] = $str['locSen'];
            $res = $res."<div id=\"div".($i-1)."\" class=\"editDash\"><h2>".$str['locSen']."</h2></div>";
        }
        $res .= "</div><div class=\"order\"><input id=\"output\" type=\"text\" value=\"\"></div>";
        echo $res;
    ?>
    
    <button onclick="dispVal()">update</button>

    </body>
</html>