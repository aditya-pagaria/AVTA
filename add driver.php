<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Driver</title>
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
        $Name = $_POST['Name'];
        $Password=$_POST['Pass'];
        $Contact = $_POST['Contact'];
        $Address = $_POST['Address'];
        $sql = "SELECT Driver_ID FROM drivers WHERE Driver_ID='$Driver_ID'";
        $query=mysqli_query($con,$sql);
        $row = mysqli_fetch_array($query);
        if($row){
            echo "<p class='submitMsg'><b>Driver already exists!<b></p>";
        }else{
            $sql2 = "INSERT INTO drivers VALUES ('$Driver_ID','$Name', '$Contact', '$Address','$Password','$Supervisor_ID');";
            $query2=mysqli_query($con,$sql2);
            if($query2 == true){
                echo "<p class='submitMsgD'><b>Driver successfully added<b></p>"; 
            }else{
                echo "<p class='submitMsg'><b>Error adding driver!<b></p>";
            }     
        }
    }
    echo "<br>";
?>

<body>
    <div class="container"> 
        <h1>Add Driver</h1>         
        <form action="add driver.php" method="POST">
            <input style="width:250px;" type="text" name="ID" id="ID" placeholder="Enter Driver's ID"  maxlength=12 minlength=12 required>
            <input style="width:250px;" type="text" name="Name" id="Name" placeholder="Enter Name">
            <input style="width:250px;" type="text" name="Contact" id="Contact" placeholder="Enter contact number" maxlength=10 minlength=10>
            <input style="width:250px;" type="password" name="Pass" id="Pass" placeholder="Enter Password" required>            
            <textarea name="Address" id="Address" style="width:250px;" rows="5" placeholder="Enter address"></textarea>
            <button class="btn">Add Driver</button> 
            <br>
        </form>
    </div>
</body>
</html>