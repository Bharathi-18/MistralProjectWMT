<?php

    include 'dashSelect.php';

?>

<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js"  type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script type="text/javascript">
          var sensorLis = [];
           
// $(document).ready(function(){

      // }
      $(function(){
        // $("button").click(function() {

    
          $('h6').each(function () {
              var i = $(this).attr('id');
              console.log(i.toString());
              sensorLis.push(i.toString().toLowerCase());
              console.log(sensorLis);
          });

          console.log("bharathi");
          var name = $(this).val();
          // var name = "";
          var id = "";
          
          var topicName = "mistral";
          var flag = 0;
          let i = 0;
          for(i =0;i<name.length;i++)
          {
            if(name[i]=="/")
            {
              break;
            }
          }
          // topicName = name.slice(i+1,name.length);
          console.log(topicName);
          console.log("name : "+name);
          name+="txt";
          $("mistral").text("&nbsp; bharathi this is p tag");
          

          // document.getElementById(name).innerHTML = topicName;
          
          client = new Paho.MQTT.Client("test.mosquitto.org", 8080, "clientId");
          client.onConnectionLost = onConnectionLost;
          client.onMessageArrived = onMessageArrived;

          // document.getElementById("random").innerHTML = "message.payloadString";

          client.connect({ onSuccess: onConnect });

          function onConnect() {
            console.log("onConnect");
            client.subscribe("mistral/pH");
            console.log("Success mistral/pH");

          }
          function onConnectionLost(responseObject) {
            if (responseObject.errorCode !== 0) {
              console.log("onConnectionLost:" + responseObject.errorMessage);
            }
          }
          function onMessageArrived(message) {
            console.log((message.payloadString));
            console.log("   bharathi");
            let msg = JSON.parse(message.payloadString);
            let dispVal = msg["tds"];
            let dispVal1 = msg["hum"];
            document.getElementById("temperature").innerHTML = dispVal;
            document.getElementById("humidity").innerHTML = dispVal1;
            var idName = "";
            // for(let val in sensorLis)
            // {
            //   idName = val.slice(0,3);
            //   document.getElementById(val) = msg[idName];
            // }
          }
        });
      // });
          </script>
    <style>
      #publicDash
      {
        display:none;
      }
      .content
      {
        margin:10px;
      }
      .names{
        text-align: center;
        font-size:32px;
        color:#1F2937;
        font-weight: bold;
      }
      .emptyRecord
      {
        color: #1F2937;
      }
    </style>
  </head>
  <body style="overflow-x: hidden;">
      <br> 
      <?php      
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = $_SESSION['user'];
        $conn = new mysqli($host,$user,$pass,$db);
        $query = "SELECT * FROM dbnames where names='".$_GET['var']."'";
        $dashBoard = $conn->query($query);
        $dashBoardRes = mysqli_fetch_assoc($dashBoard);
        $tableName = $dashBoardRes['id'];
        $dashboardName = $dashBoardRes['names'];
      ?>
      <div class="names">
        <?php echo $dashboardName ?>
      </div>
      <br> <br>  <br>
      <?php
        $query = "SELECT * from ".$tableName;
        $result = $conn->query($query);
        $res = '<div class="card-deck">';
        $className = "card bg-warning";
        $cnt = 0;
        if($result== true){ 
          if ($result->num_rows > 0) {
            while($rslt =  mysqli_fetch_assoc($result))
            {
              if($cnt%3==0)
              {
                $className = "card bg-warning";
              }
              else if($cnt%3==1)
              {
                $className = "card bg-success";          
              }
              else if($cnt%3==2)
              {
                $className = "card bg-danger";          
              }
              $res = $res."<div class=".'"'.$className.'"'."style=".'"'."height:200px;".'"'."><div class=".'"'."card-body text-center";
              $res = $res.'"'."><button id=\"".$rslt['locSen']."\" type=\"button\" class=\"btn btn-dark\" value=\"".$rslt['locSen']."\">click</button><h6 id=\"".$rslt['locSen']."\">Test</h6></div>";

              $tempVar = "";
              $s = $rslt['locSen'];
              $val = "";
              $res = $res."<div class=\"card-body text-center\"><h5 class=\"card-text\">".$rslt['locSen']."</h5><br><br><h5 class=\"card-text\">".$val."</h5></div></div>";
              $cnt++;
              if($cnt%3==0)
              {
                $res = $res.'</div><br><br><div class="card-deck">';
              }
            }
            $res = $res."</div>";
          } else {
            $res = "<h1 class='emptyRecord'>no record found</h1>";  
          }
        }else{
          $msg= mysqli_error($db);
        }
        ?>
        <div class="content">
          <?php
            echo $res;
          ?>
        </div>
    </body>
</html>