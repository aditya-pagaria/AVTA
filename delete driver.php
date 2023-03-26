<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Driver</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php 
    include('db_connection.php');
    include('supervisor page.php');
    $incorrect=0;
    $Supervisor_ID=$_SESSION['Supervisor_ID'];
    if(isset($_POST['ID']))
    {
        $Driver_ID = $_POST['ID'];
        $sql = "SELECT Driver_ID FROM drivers WHERE Driver_ID='$Driver_ID' AND Supervisor_ID='$Supervisor_ID';";
        $query=mysqli_query($con,$sql);
        $row = mysqli_fetch_array($query);
        if($row){   //driver of supervisor exists
            $sql="SELECT * FROM vehicles_assigned WHERE Driver_ID='$Driver_ID';";
            $query=mysqli_query($con,$sql);
            $row = mysqli_fetch_assoc($query);
            if($row){   //driver is assigned a vehicle
                echo "<p class='submitMsg'><b>Driver is currently assigned to a vehicle, Cannot delete driver!<b></p>";
            }else{
                $sql = "DELETE FROM drivers WHERE Driver_ID='$Driver_ID';";
                $query=mysqli_query($con,$sql);
                if($query == true){
                    echo "<p class='submitMsgD'><b>Driver successfully deleted!<b></p>";        
                }else{
                    echo "<p class='submitMsg'><b>Driver deletion unsuccessful!<b></p>";        
                }
            }
        }else{
            echo "<p class='submitMsg'><b>Driver does not exists!<b></p>";
        }     
    }
    echo "<br>";
?>

<body>
    <div class="container">       
        <h1>Delete Driver</h1>     
        <form action="delete driver.php" method="POST">
            <input style="width:250px;" type="text" name="ID" id="ID" placeholder="Enter Driver's ID"  maxlength=12 minlength=12 required>
            <button class="btn">Delete Driver</button> 
            <br>
        </form>
    </div>
</body>
</html>