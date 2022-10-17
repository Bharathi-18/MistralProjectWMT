
<?php
      $dataPoints=array();
      $reads=array();
      $csvdata=array();    
      $clrarray=array(); 
?>
<?php
$con=mysqli_connect('localhost','root','','wmt');
$loc=$_GET['location'];
$sen=$_GET['sensors'];
$start=$_GET['startdate'];
$end=$_GET['enddate'];
$str=$loc."-".$sen;


$result = mysqli_query($con,"SELECT date,reading FROM report where sensor='$sen' and  date>='$start' and date<='$end' and location='$loc' order by date asc");
 while($row=mysqli_fetch_array($result))
 {
	$dataPoints[]=$row["date"];	
   $temp=$row["date"];
   $reads[]=$row["reading"];
   if(40>$row["reading"]){
    $clrarray[]="blue";
   }
   else if(90>$row["reading"]){
    $clrarray[]="green";
    }
    else{
        $clrarray[]="red";
    }
   $csvdata[]=array('date'=>$temp,'Values'=>$row["reading"]);
 }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>
      * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }
      .box {
  float: left;
  height: 20px;
  width: 20px;
  margin-bottom: 15px;
  border: none;
  border-radius:2px;
  clear: both;
}

.red {
  background-color: red;
}

.green {
  background-color: green;
}

.blue {
  background-color: blue;
}
      .chartMenu p {
        padding: 10px;
        font-size: 20px;
      }
      .chartCard {
        width: 100vw;
        height: calc(100vh -130px);
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 700px;
        padding: 20px;
        border-radius: 20px;
        background: white;
      }
      #bt{
            border:none; border-radius:4px;
            width:200px;
            height:34px;
            background-color:#1F2937;
            color:whitesmoke;
            font-size: 20px;
         }
        #bt:hover{
         color: #1F2937;
         border:#1F2937 solid 1px;
         background-color: whitesmoke;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>    
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        
    function downloadPDF2() {
        var stri='<?=$str?>';
   var canvas = document.querySelector('#myChart');
   var canvasImg = canvas.toDataURL("image/png");
   var doc = new jsPDF('p','mm');
   doc.text(stri,74,20);
   doc.setFontSize(30);
   doc.addImage(canvasImg, 'PNG', 30, 30, 150, 100 );
   doc.save('canvas.pdf');
   
   let datas = $("#export-data").val();
                    if(datas == ''){
                        return;
                    }
   JSONToCSVConvertor(datas, "Exported Data", true);
   
 }
 function JSONToCSVConvertor(JSONData, ReportTitle, ShowLabel) {
                //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
                var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;
                
                var CSV = '';    
                //Set Report title in first row or line
                
                CSV += ReportTitle+"of nellai neervalam" + '\r\n\n';

                //This condition will generate the Label/Header
                if (ShowLabel) {          
                    var row = "";
                    
                    //This loop will extract the label from 1st index of on array
                    for (var index in arrData[0]) {
                        
                        //Now convert each value to string and comma-seprated
                        row += index + ',';
                    }

                    row = row.slice(0, -1);
                    
                    //append Label row with line break
                    CSV += row + '\r\n';
                }
                
                //1st loop is to extract each row
                for (var i = 0; i < arrData.length; i++) {
                    var row = "";
                    
                    //2nd loop will extract each column and convert it in string comma-seprated
                    for (var index in arrData[i]) {
                        row += '"' + arrData[i][index] + '",';
                    }

                    row.slice(0, row.length - 1);
                    
                    //add a line break after each row
                    CSV += row + '\r\n';
                }

                if (CSV == '') {        
                    alert("Invalid data");
                    return;
                }   
                
                //Generate a file name
                var fileName = "";
                //this will remove the blank-spaces from the title and replace it with an underscore
                fileName += ReportTitle.replace(/ /g,"_");   
                
                //Initialize file format you want csv or xls
                var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);
                
                // Now the little     tricky part.
                // you can use either>> window.open(uri);
                // but this will not work in some browsers
                // or you will not get the correct file extension    
                
                //this trick will generate a temp <a /> tag
                var link = document.createElement("a");    
                link.href = uri;
                
                //set the visibility hidden so it will not effect on your web-layout
                link.style = "visibility:hidden";
                link.download = fileName + ".csv";
                
                //this part will append the anchor tag and remove it after automatic click
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                swal({title:"Exported as PDF and CSV Successfully!",
      icon:"success",
      button:"OK",
});
            }
    </script>
  </head>
  <body>
    <div class="chartMenu">
    <input type="hidden" value='<?php echo json_encode($csvdata); ?>' name="exportData" id="export-data">
        <center><h1 id="heading" style="color:#1F2937; margin-top:100px"><?php echo $str?></h1> </center>
    </div>
    <div class="chartCard">
      <div class="chartBox">
        <canvas id="myChart"></canvas>
      </div>
      <div class="arrange">
      <div><div class='box red'></div> &nbsp HIGH RANGE</div>
<br>
<div><div class='box green'></div>  &nbsp MIDDLE RANGE</div>
<br>
<div><div class='box blue'></div> &nbsp LOW RANGE</div>
      </div>
    </div>
    <center> <input type="Submit"  value="Export" id="bt" class="shadow-lg rounded" onclick="downloadPDF2()"> </center>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <script>
new Chart("myChart", {
    type : "line",
      data:{
        labels:<?php echo json_encode($dataPoints); ?>,
        datasets: [{
      fill: false,
      lineTension: 0.4,
      pointRadius: 5,
      backgroundColor: <?php echo json_encode($clrarray); ?>,
      data: <?php echo json_encode($reads); ?>
    }]
  },
  options: {
    legend: {display: false},
  }
});
    //   datasets: [{
    //     data: [18, 12, 6],
    //     backgroundColor: [
    //       'red',
    //       'green',
    //       'blue'
    //     ],
    //     borderColor: [
    //       'red',
    //       'green',
    //       'blue'
    //     ],
    //     borderWidth: 1,
    //     tension : 0.4
    //   }]
    // };

    // // config 
    // const config = {
    //   type: 'line',
    //   data,
    //   options: {
    //     scales: {
    //       y: {
    //         beginAtZero: true
    //       }
    //     }
    //   }
    // };

    // render init block
    // const myChart = new Chart(
    //   document.getElementById('myChart'),
    //   config
    // );
    </script>

  </body>
</html>