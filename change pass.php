<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Change Driver Credentials</title>
</head>
<?php 
    include('db_connection.php');
    include('supervisor page.php');
    $Supervisor_ID=$_SESSION['Supervisor_ID'];
    $incorrect=0;
    if(isset($_POST['ID']))
    {
        $Driver_ID = $_POST['ID'];
        $Password=$_POST['Pass'];
        $sql = "UPDATE drivers SET Password='$Password' Where Driver_ID='$Driver_ID' AND Supervisor_ID='$Supervisor_ID'";
        $query=mysqli_query($con,$sql);
        $sql = "SELECT Password FROM drivers WHERE Driver_ID=$Driver_ID";
        $query=mysqli_query($con,$sql);
        $row = mysqli_fetch_array($query);
        if($row){
            if($row['Password']==$Password){
                echo "<p class='submitMsgD'><b>Password successfully changed!<b></p>";
            }else{
                $incorrect=1;
            }
        }else{
            $incorrect=1;
        }
        if($incorrect==1){
            echo "<p class='submitMsg'><b>Error changing password!<b></p>";
        }
    }
?>

<body>
    <div class="container"> 
        <h1>Change Password</h1>         
        <form action="change pass.php" method="POST">
            <input style="width:250px;" type="text" name="ID" id="ID" placeholder="Enter Driver's ID"  maxlength=12 minlength=12 required>
            <input style="width:250px;" type="password" name="Pass" id="Pass" placeholder="Enter Password" required>            
            <button class="btn">Change Password</button> 
            <br>
        </form>
    </div>
</body>
</html>