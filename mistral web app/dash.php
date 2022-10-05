<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
        <style>
            body{
                margin: 0;
                padding: 0;
                font-family: 'Rubik',sans-serif;
                overflow : hidden;
                background-color:white;
                height:100%;
            }
            #bars{
                font-size: 30px;
                color: whitesmoke;
            }
            .btn{
                font-size: 20px;
                width:250px ;
                background-color:#1F2937;
                color:whitesmoke;
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
            }
            .nav1 a{
                font-size: 18px;
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
                padding: 12px;
                height:100%;    
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
                text-align:center;
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
            .dropdown{ 
                display: none;
                position: absolute;    
            }
            .set:hover .dropdown{
                display: block;
                transition: 0.3s;
            }
            .drop{
                font-size: 14px;
                font: bold;
            }
            #id2,#id3,#id4,#id5{
                display:none;
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
            }
            function configfunc(){
                document.getElementById("id1").style.display="none";
                document.getElementById("id2").style.display="flex";
                document.getElementById("id3").style.display="none";
                document.getElementById("id4").style.display="none";
                document.getElementById("id5").style.display="none";
            }
            function reportfunc(){
                document.getElementById("id1").style.display="none";
                document.getElementById("id2").style.display="none";
                document.getElementById("id3").style.display="flex";
                document.getElementById("id4").style.display="none";
                document.getElementById("id5").style.display="none";
            }
            function createfunc(){
                document.getElementById("id1").style.display="none";
                document.getElementById("id2").style.display="none";
                document.getElementById("id3").style.display="none";
                document.getElementById("id4").style.display="flex";
                document.getElementById("id5").style.display="none";
            }
            function addfunc(){
                document.getElementById("id1").style.display="none";
                document.getElementById("id2").style.display="none";
                document.getElementById("id3").style.display="none";
                document.getElementById("id4").style.display="none";
                document.getElementById("id5").style.display="flex";
            }
            
        </script>
    </head>
    <body>
        <div id="content">
            <div class="cls shadow rounded" id="menu">
                <!-- <div class="nav1"><button onclick="slideClose()" class="btn_cls"><i class="fa fa-angle-double-left" aria-hidden="true" style="color:whitesmoke;font-size:30px"></i></button></div> -->
                <div class=""><br><br><br></div>
                <div class="nav1" >
                    <button onclick="homefunc()" class="btn" id="home">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        Home
                    </button>
                </div>
                <div class="nav1">  <button onclick="configfunc()" class="btn" id="config">
                    <i class="fa fa-th-large" aria-hidden="true"></i>
                    Configure Dashboards
                    </button>
                </div>
                <div class="nav1"> <button onclick="reportfunc()" class="btn" id="report">
                    <i class="fa fa-file" aria-hidden="true"></i>
                    Report
                    </button>
                </div>
                <div class="set nav1"> <button class="btn" id="report">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    Settings
                    </button>
                    <br>
                    <div class="dropdown">
                        <button class="drop btn" onclick="createfunc()"> <i class="fa fa-user-plus" style="font-size:12px"></i>&nbsp;Create User</button>
                        <button class="drop btn" onclick="addfunc()"><i class="fa fa-plus" style="font-size:12px"></i>&nbsp;&nbsp;Add Location/Sensor</button>
                    </div>
                </div>
            </div>

            <div class="top shadow rounded">
                <ul class="list">
                <li>
                        <a href="#" onclick="slideOpen()">
                        <i class="fa fa-bars" id="bars"></i>
                        </a>
                    </li>
                    <li>
                        <h1 id="main">Dashboards</h1>
                    </li>
                    <li style="float:right"> <a href="login.php">
                        <i class="fa fa-power-off" id="bars"></i>
                    </li>
                    <li style="float:right"></a>
                        <input type="text" class="search" placeholder="&#xF002; Search" style="font-family: Arial , FontAwesome;"></li>
                </ul> 
            </div>  
            <br>
            <div id="id1">
                <iframe src="dashSelect.php" style="height:85vh;width:100%;"></iframe>
            </div>  
            <div id="id2">
                <iframe src="configure_dashboard.php" style="height:85vh;width:100%"></iframe>
            </div>
            <div id="id3">
                <iframe src="report.html"  style="width:100%;height:90vh;" ></iframe>
            </div>
            <div id="id4">
                <iframe src="createUser.php"  style="height:90vh;width:100%"></iframe>
            </div>
            <div id="id5">
                <iframe src="add.html" style="height:90vh;width:100%;"></iframe>
            </div>
        </div>
    </body>
</html>