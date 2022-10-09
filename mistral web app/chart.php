<?php
      $dataPoints=array();
      $reads=array();
      $csvdata=array();
      
?>
<?php
$con=mysqli_connect('localhost','root','','reports');
$loc=$_GET['location'];
$sen=$_GET['sensors'];
$start=$_GET['startdate'];
$end=$_GET['enddate'];
$str=$loc."-".$sen;

$result = mysqli_query($con,"SELECT date,reading FROM report where sensor='$sen' and  date>='$start' and date<='$end' and location='$loc'");
 while($row=mysqli_fetch_array($result))
 {
	$dataPoints[]=$row["date"];	
   $temp=$row["date"];
   $reads[]=$row["reading"];
   $csvdata[]=array('date'=>$temp,'Values'=>$row["reading"]);
 }
?>
<html>
   <head> 
      <title>report</title> 
      <meta name="viewport" content="width=device-width, initial-scale=1"> 
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script> 
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script> 
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>   
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

      <style>
          
         #bt{
            border:none; border-radius:4px;
            width:200px;
            height:34px;
            background-color:#1F2937;
            color:whitesmoke;
            font-size: 20px;
            margin-top:2%;
         }
        #bt:hover{
         color: #1F2937;
         border:#1F2937 solid 1px;
         background-color: whitesmoke;
        }
        </style>
      <script type="text/javascript">
   //document.getElementById('heading").innerHTML='<?=$loc?>'+"-"+'<?=$sen?>';
    window.onload=function(){
      
var chart_data = {
         labels:<?php echo json_encode($dataPoints); ?>,
         datasets: [
             {
                 fillColor: "whitesmoke",
                 strokeColor: "#1F2937",
                 pointColor: "#1F2937",
                 pointStrokeColor: "#1F2937",
                 pointHighlightFill: "#1F2937",
                 pointHighlightStroke: "#1F2937",
                 data: <?php echo json_encode($reads); ?>,
             }
         ]
}
//original canvas
var canvas = document.querySelector('#cool-canvas');
var context = canvas.getContext('2d');
new Chart(context).Line(chart_data);
//hidden canvas
var newCanvas = document.querySelector('#supercool-canvas');
newContext = newCanvas.getContext('2d');
var supercoolcanvas = new Chart(newContext).Line(chart_data);
supercoolcanvas.defaults.global = {
   scaleFontSize: 120
}
//add event listener to button
//donwload pdf from original canvas




    }
    function downloadPDF2() {
   var canvas = document.querySelector('#cool-canvas');
   var canvasImg = canvas.toDataURL("image/jpeg", 1.0);
   var doc = new jsPDF('landscape');
   doc.setFontSize(20);
   doc.text(15, 15, "Cool Chart");
   doc.addImage(canvasImg, 'JPEG', 10, 10, 280, 150 );
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
                
                // Now the little tricky part.
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
   <a href="report.php" >
                    <i class="fa fa-angle-left shadow-lg rounded" id="bars" style="border-radius:5px;background-color:white;height:45px;width:45px;align-items:center;padding-left:12px;margin-left:24px;margin-top:20px;font-size:56px;color:#1F2937;"></i>
                </a> 
      <center>
      <input type="hidden" value='<?php echo json_encode($csvdata); ?>' name="exportData" id="export-data">
         <h1 id="heading" style="color:#1F2937"><?php echo $str?></h1>
         <div id="rep" style="margin-top:10%;">
      <div> 
         <canvas id="cool-canvas" width="600" height="300"></canvas> 
      </div> 
      <div style="height:0; width:0; overflow:hidden;"> 
         <canvas id="supercool-canvas" width="1200" height="600" style="background-color:white"></canvas> 
      </div> 
   </div>
      <input type="Submit"  value="Export" id="bt" class="shadow-lg rounded" onclick="downloadPDF2()"> 
   </center>
   </body>
</html>