<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
        <style>
            body{
                margin: 0;
                padding: 0;
                font-family: serif;
                overflow : hidden;
                background-color:white;
                height:100%;
            }
            #bars{
                font-size: 30px;
                color: whitesmoke;
                
            }
            .btn1{
                font-size: 6px;
                width:200px;
                border:none;
                height:40px;
                background-color:#1F2937;
                color:whitesmoke;
                text-align:center;
                border-radius:5px;
            }
            .btn1:hover{
                color: #1F2937;
                background-color: whitesmoke;
            }
            .btn{
                font-size: 22px;
                width:250px ;
                background-color:#1F2937;
                color:whitesmoke;
                text-align: left;
            }
            .btn:hover{
                color: #1F2937;
                background-color: whitesmoke;
            }
            .cls{
                height: 100%;
                width: 0;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                color:whitesmoke;
                background-color: #1F2937;
                overflow-x: hidden;
                transition: 0.7s;
                display:block;
            }
            .nav1{
                height:77px;
                padding-top:10px;
                font-family:serif,FontAwesome;

            }
            .nav1 a{
                font-size: 19px;
                text-decoration: none;
                color:whitesmoke;
            }
            .nav1 i{
            font-family: Arial,FontAwesome;
            }
            
            .btn_cls{
                float: right;
                font-size: 20px;
                background-color:#1F2937;
                color:whitesmoke;
            }
            
            #content{
                transition: 0.7s;
                padding-left: 2px;
                padding-right: 2px;
                height:100%;
                
            }
            #searching{
                display: flex;
            }
            #main{
                font-size:26px;
            }
            .list{
                list-style-type:none;
                margin:0;
                padding:0;
                overflow:hidden;
            }
            .list li{
                float:left;
                text-align: center;
                padding-right:33px;
            }
            .list li a{
                text-decoration:none;
                color:whitesmoke;
            }

            a{
                text-decoration:none;
                color:whitesmoke;
            }

            .top{
                background-color: #1F2937;
                color: whitesmoke;
                height:65px;
                width:auto;
                padding:13px;
                margin-top:1px;
                
            }
            .search{
                height: 30px;
                width: 250px;
                padding: 10px;
                border: 0;
                color:whitesmoke;
                outline: none;
                border-bottom: 3px solid whitesmoke;
                background-color: #1F2937;
            }
            ::placeholder{
                color: whitesmoke;
            }
            .names{
                text-align: center;
                font-size:20px;
                font-weight: bold;
            }

            .drop{
                font-size: 14px;
                font: bold;
            }
            
            #id2,#id3,#id4,#id5{
                display:none;
            }

            .popup{
                background:rgba(0,0,0,0.6);
                width:100%;
                height:100%;
                position:absolutue;
                top:0;
                display:none;
                justify-content:center;
                align-items:center;
            }

            .popup-content{
                background:#fff;
                width:500px;
                height:250px;
                padding:20px;
                border-radius:5px;
                position:relative;
            }
            .close{
                position:absolutue;
                top:-15px;
                right:-15px;
                background:#fff;
                height:20px;
                border-radius:50%;
                box-shadow:6px 6px 29px -4px rgba(0,0,0,0.75);
                cursor:pointer;
            }
        </style>

        <script>
            $(document).ready(function(){
                $('.homecls').click(function(){
                $('#home').load('homes.html');
                });
            });
            var i = 0;

            function slideOpen(){
                if(i%2==0)
                {
                    document.getElementById('menu').style.width='250px';
                    document.getElementById('content').style.marginLeft='250px';
                }
                else
                {
                    document.getElementById('menu').style.width='0';
                    document.getElementById('content').style.marginLeft='0';
                }
                i++;

            }
            function slideClose(){
                document.getElementById('menu').style.width='0';
                document.getElementById('content').style.marginLeft='0';
            }

            function homefunc(){
                document.getElementById("id1").style.display="flex";
                document.getElementById("id2").style.display="none";
                document.getElementById("id3").style.display="none";
                document.getElementById("id4").style.display="none";
                document.getElementById("id5").style.display="none";
                document.getElementById("searching").style.display="flex";
            }
            function configfunc(){
                document.getElementById("id1").style.display="none";
                document.getElementById("id2").style.display="flex";
                document.getElementById("id3").style.display="none";
                document.getElementById("id4").style.display="none";
                document.getElementById("id5").style.display="none";
                document.getElementById("searching").style.display="none";
                document.getElementById("popup").style.display="none";
            }
            function reportfunc(){
                document.getElementById("id1").style.display="none";
                document.getElementById("id2").style.display="none";
                document.getElementById("id3").style.display="flex";
                document.getElementById("id4").style.display="none";
                document.getElementById("id5").style.display="none";
                document.getElementById("searching").style.display="none";
            }
            function createfunc(){
                document.getElementById("id1").style.display="none";
                document.getElementById("id2").style.display="none";
                document.getElementById("id3").style.display="none";
                document.getElementById("id4").style.display="flex";
                document.getElementById("id5").style.display="none";
                document.getElementById("popup").style.display="none";
                document.getElementById("searching").style.display="none";
            }
            function addfunc(){
                document.getElementById("id1").style.display="none";
                document.getElementById("id2").style.display="none";
                document.getElementById("id3").style.display="none";
                document.getElementById("id4").style.display="none";
                document.getElementById("id5").style.display="flex";
                document.getElementById("popup").style.display="none";
                document.getElementById("searching").style.display="none";
            }
    	    function popup(){
                document.getElementById("popup").style.display="flex";
                document.getElementById("searching").style.display="none";
            }
            function popclose(){
                document.getElementById("popup").style.display="none";
                document.getElementById("searching").style.display="none";
            }
        </script>
    </head>
    <body>

        <div id="content">
            <div class="cls shadow-lg rounded" id="menu">
                <div class=""><br><br><br></div>
                <div class="nav1">
                    <button onclick="homefunc()" class="btn" id="home">
                    <i class="fa fa-home" aria-hidden="true"></i>
                        Home
                    </button></div>
                    <div class="nav1">
                        <button onclick="reportfunc()" class="btn" id="report">
                            <i class="fa fa-file" aria-hidden="true"></i>
                                Report
                        </button></div>
                        <div class="set nav1">
                            <button onclick="popup()" class="btn" id="report1">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                                Settings
                            </button><br>        
                        </div>
                    </div>
                <div class="top shadow-lg rounded">
                    <ul class="list">
                        <li>
                            <a href="#" onclick="slideOpen()">
                                <i class="fa fa-bars" id="bars"></i>
                            </a>
                        </li>
                    <li>
                        <h1 id="main">Nellai Neervalam</h1>
                    </li>
                    <li style="float:right">
                        <a href="login.html"><i class="fa fa-power-off" id="bars"></i>
                    </li>
                    <li style="float:right" id="searching"></a>
                        <input type="text" class="search" list="dashboardsli" placeholder="&#xF002; Search"  style="width:320px;font-family: Arial , FontAwesome;">
                        <datalist id="dashboardsli">
                            <option value="Tvldashboard" >
                            <option value="kvpdashboard" >
                            <option value="PHtest"></option>
                        </datalist>
                    </li>
                </ul> 
            </div>  



  <div class="popup" id="popup">
<div class="popup-content" >
<div style="padding-bottom:40px"><img src="pi.png" alt="close" class="close" onclick="popclose()">  </div>         
<center> 
<div style="padding-left:30px;padding-bottom:20px"><button class="drop btn1"  style="font-size:17px"onclick="createfunc()"> <i class="fa fa-user-plus" style="font-size:12px"></i>&nbsp;Create User</button></div>
<div style="padding-left:30px;padding-bottom:20px">           
<button class="drop btn1"  onclick="addfunc()" style="font-size:17px"><i class="fa fa-plus" style="font-size:12px"></i>&nbsp;&nbsp;Add Location/Sensor</button>
     </div>  
     <div style="padding-left:30px;padding-bottom:20px">      
     <button onclick="configfunc()" class="btn1" id="config" style="font-size:17px">
                   <i class="fa fa-th-large" aria-hidden="true" style="font-size:12px"></i>
                   Configure Dashboards
              </button>
        </div>
        </div>
        </div>
            <div id="id1">
                <iframe src="dashSelect.php" style="border:1px black;height:85vh;width:100%;"></iframe>
            </div>  
            <div id="id2">
                <iframe src="configure_dashboard.php" style="border:1px black;height:85vh;width:100%"></iframe>
            </div>
            <div id="id3">
                <iframe src="report.php"  style="border:1px black;width:100%;height:90vh;" ></iframe>
            </div>
            <div id="id4">
                <iframe src="createUser.php"  style="border:1px black;height:90vh;width:100%"></iframe>
            </div>
            <div id="id5">
                <iframe src="add.html" style="border:1px black;height:90vh;width:100%;"></iframe>
            </div>
    </body>
</html>