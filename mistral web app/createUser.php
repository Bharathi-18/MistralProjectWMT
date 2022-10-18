<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            function alert(){
                swal({title:"Created Successfully!",
                icon:"success",
                button:"OK",
                // timer:10000
            });
            }
        </script>
    <style>    
    .card{
        margin-top: 7%;
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
    </head>
    <body>
        <center>
            <div class="card shadow rounded">
                <div class="name">
                    <h1>Create User</h1>
                </div>
                <form action="userCreation.php" method="POST">
                    <div class="loc">
                    <input class="shadow-sm  rounded" name="username" id="username" placeholder="example@gmail.com">
                    </div>
                    <div><input type="password" class="shadow-sm  rounded" Placeholder="Password" name="password" maxlength="50" size="30"></div>
                    <div class="privilege">
                        <input class="shadow-sm rounded" list="privilege" name="privilege" placeholder="Choose privilege">
                        <datalist id="privilege">
                            <option value="admin">
                            <option value="user">
                        </datalist>
                    </div>
                    <div>
                        <input type="Submit"  class="shadow rounded" class="btn" value="Create" style="width:100px;background-color:#1F2937;color:whitesmoke;margin-bottom:5%;" onclick="alert()">
                    </div>
                </form>
            </div>
        </center>
    </body>
</html>