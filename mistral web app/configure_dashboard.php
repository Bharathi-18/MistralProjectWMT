<html>
    <head>
        <title>Dashboard Configuration</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

        <style>
            .card{
                margin-top:5%;
                margin-left: 50px;
                width: 90%;
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
            .add{
                font-size: 20px;
            }
            .btn{
                background-color: #1F2937;
                color: whitesmoke;
                width: 100px;
                margin-bottom: 30px;
            }
            .btn:hover{
                background-color: whitesmoke;
            }
            #list{
                list-style: none;
                display: flex;
                flex-wrap: wrap;
            }
            li{
                padding: 7px;
                color: #1F2937;
                background-color: whitesmoke;
                border-radius: 3px;
                border: 1px solid #1F2937;
                margin: 10px;
                display: block;
            }
            li::after{
                content: '\f00d';
                font: normal normal normal 14px/1 FontAwesome;
                color: #1F2937;
            }
            div.dash_list{
                width: 100%;
            }
            .dashName,.loc,.sensor,.icons1{
            display: block;
            }

            .dashAlign
            {
                /* text-align: left; */
            }

        </style>
    </head>
    <body>
        <div class="card shadow rounded" >
            <center> 
                <div class="name">
                    <h1>Dashboard Creation</h1>
                </div>
                <div class="dashAlign">
                <form method="POST">
                    <div class="dashName">
                        <input type="text" id="dashName" class="shadow-sm rounded" placeholder="Dashboard Name">
                    </div>
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
            </center>
                    <div class="aligning" style="margin-top:-12px;padding-top:0; display:inline-flex;align-items: center;justify-content: center;">
                        <div style="margin-right:15px;">&nbsp;</div>    
                        <div class="sensor" >
                            <input class="shadow-sm rounded" list="sensorlist" name="sensor" id="sens" placeholder="Choose Sensor" >
                            <datalist id="sensorlist">
                                <?php
                                    $var = "<option value=\"Temperature\"><option value=\"TDS\"><option value=\"Turbidity\"><option value=\"PH\">";
                                    echo $var;
                                ?>
                            </datalist>            
                        </div>
                        <div class="icons1" >
                            <i class="add fa fa-plus-circle" onclick="fun()"></i>
                        </div>
                    </div>
                    <div class="dash_list">
                        <ul id="list"></ul>
                    </div>
                    <center>
                        <input type="button" onclick="addLis()" class="btn shadow rounded" value="Create">
                    </center>
                </form>
                </div>
                <div class="availDash">
                           
                </div>

            <p id="demo"></p>
        </div>
    </body>
    <script>
        var lis = [];
        var str;
        function fun()
        {
            var a=document.getElementById("location").value;
            var b=document.getElementById("sens").value;
            str=a+"/"+b;
            var li=document.createElement('li');
            var flag = 0;
            for(let temp of lis)
            {
                if(str===temp)
                {
                    flag = 1;
                    break;
                }
            }
            if(flag==0)
            {
                li.appendChild(document.createTextNode(str));
                li.addEventListener('click',function(){
                    li.style.display="none";
                    lis.pop();
                },false);
                document.querySelector('ul').appendChild(li);
                lis.push(str);
            }
        }
        function addLis()
        {
            var res = "";
            for(let temp of lis)
            {
                res = res+","+temp;
            }
            var dashName = document.getElementById("dashName").value;
            res = res+"@"+dashName;
            document.cookie = "lis="+lis;
            window.location.href = "dashboardCreation.php?lis="+res;
        }
        $('.styles').on('click',function(){
            li.style.display='none';
        });
    </script>
</html>