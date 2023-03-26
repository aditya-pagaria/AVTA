<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php 
    include('db_connection.php');
    include('supervisor page.php');
    $incorrect=0;
    $Supervisor_ID=$_SESSION['Supervisor_ID'];
    if(isset($_POST['ID']))
    {
        $Vehicle_No = $_POST['ID'];
        $Brand = $_POST['Brand'];
        $Model = $_POST['Model'];
        $sql = "SELECT Vehicle_No FROM vehicles WHERE Vehicle_No='$Vehicle_No'";
        $query=mysqli_query($con,$sql);
        $row = mysqli_fetch_array($query);
        if($row){
            echo "<p class='submitMsg'><b>Vehicle already exists!<b></p>";
        }else{
            $Status = 'Available';
            $sql2 = "INSERT INTO vehicles VALUES ('$Vehicle_No','$Brand', '$Model', '$Supervisor_ID','$Status');";
            $query2=mysqli_query($con,$sql2);
            if($query2 == true){
                echo "<p class='submitMsgD'><b>Vehicle successfully added<b></p>"; 
            }else{
                echo "<p class='submitMsg'><b>Error adding Vehicle!<b></p>";
            }     
        }
    }
    echo "<br>";
?>

<body>
    <div class="container">      
        <h1>Add Vehicle</h1>          
        <form action="add vehicle.php" method="POST">
            <input style="width:250px;" type="text" name="ID" id="ID" placeholder="Enter Vehicle number"  required>
            <input style="width:250px;" type="text" name="Brand" id="Brand" placeholder="Enter Brand" required>
            <input style="width:250px;" type="text" name="Model" id="Model" placeholder="Enter Model" required>          
            <button class="btn">Add Vehicle</button> 
            <br>
        </form>
    </div>
</body>
</html>