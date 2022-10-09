

<html>
    <head>
        <title>
            Report
        </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>       
        
         <style>
.card{ 
   margin-top: 5%;
    width: 500px ;
}
input{
    padding:5px;
    width: 300px;
    border:none;
    border-bottom: 2px solid #1F2937;
    background-color: white;
}
.card div{
padding:20px;
}
     .name{
        text-align: center;
     }
     .loc{
        align-items: center;
     }
        </style>
        <script>
            
        </script>
        </head>
    <body>

        <center>
            
    <div class="card shadow rounded">
        <div class="name">
            <h1>Report</h1>
        </div>
     <form action="chart.php" method="get" name="reporting">
         <div class="loc">
    <input class="shadow-sm  rounded" list="locations" name="location" id="location" placeholder="Choose location">
  <datalist id="locations">
    <option value="Tirunelveli">
    <option value="kvp">
    <option value="Chennai">
    <option value="tuty">
    <option value="theni">
  </datalist>
        </div>
        <div class="sensor">
            <input class="shadow-sm rounded" list="sensorlist" name="sensors" id="sens" placeholder="Choose Sensor">
            <datalist id="sensorlist">
              <option value="Temperature">  
              <option value="TDS">
              <option value="Turbidity">
              <option value="PH">
            </datalist>
        </div>
        <div>
            <input type="text" name="startdate" id="startdate" class="shadow-sm rounded" placeholder="--Start date--" onfocus="(this.type='datetime-local')">
        </div>
        <div>
            <input type="text" name="enddate" id="enddate" class="shadow-sm  rounded" placeholder="--End date--" onfocus="(this.type='datetime-local')">
        </div>
        <div>
            <input type="Submit" name="submit" class="shadow rounded" class="btn" value="Submit" style="width:100px;background-color:#1F2937;color:whitesmoke">
        </div>
        </form>
     </div></center>
     
       
     </body>
</html>