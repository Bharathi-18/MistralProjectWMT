<html>
  <head>
  <title>login</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <script>
      document.getElementById("login").addEventListener("click",dash);
      function dash(){
        window.location.href="dash.html";
      }
  </script>

<style>
.place{
  font-size: 16px;
  display: block;
  font-family: 'Rubik', sans-serif;
  width: 100%;
  padding: 10px 1px;
  border: 0;
  border-bottom: 1px solid #747474;
  outline: none;
}
label{
font-size:19px;
}
td{
padding:20px;
}
.btn{
color:white;
font-size:16px;
background-color: #1F2937;
border-radius: 5px;
width:100px;
height:45px;
text-align: center;
padding:9px;
}

.btn:hover{
 background-color: whitesmoke;
 color:#1F2937 ;
}
*{
font-family:Georgia;
}
.head
{
padding-top:55px;
padding-bottom:55px;
text-align:center;
font-family:Georgia;
}
.head h1{
color:white;
}
body{
background-image:linear-gradient(180deg,#1F2937 50%,transparent 50%);
}
.bodymain{
background-color:#fff;
border-radius:7px;
height:330px;
width:450px;
padding-top:50px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>
</head>

<body>
<div class="head">
<h1>WATER  MONITORING  TOOL</h1>
</div>
<center>
<div  class="bodymain shadow-lg bg-white rounded">
<form name="myform" action="detUser.php" method="POST">
<table width="450px">
<tr>
<td>
<label for="username"><b>USERNAME</b></label>
</td>
<td>
<input type="text" id="usrnm" class="place" placeholder="example@gmail.com" name="username" maxlength="50" size="30">
</td>
</tr>
<tr>

<td>
<label for="password"><b>PASSWORD</b></label>
</td>
<td>
<input type="password" id="pswd" class="place" Placeholder="Enter Password" name="password" maxlength="50" size="30">
</td>
</tr>
<tr>
<td>
</td>
<td>
<input type="submit" value="Login" name="save" class="btn" id="login">
</td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>