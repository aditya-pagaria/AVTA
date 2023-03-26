<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Vehicle</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php 
    include('db_connection.php');
    include('supervisor page.php');
    $Supervisor_ID=$_SESSION['Supervisor_ID'];
    if(isset($_POST['ID']))
    {
        $Driver_ID = $_POST['ID'];
        $Number = $_POST['Number'];
        $sql = "SELECT Driver_ID FROM drivers WHERE Driver_ID='$Driver_ID'";
        $query=mysqli_query($con,$sql);
        $row = mysqli_fetch_array($query);
        if($row){   //driver exists
            $sql = "SELECT Status FROM vehicles WHERE Vehicle_No='$Number'";
            $query=mysqli_query($con,$sql);
            $row = mysqli_fetch_assoc($query);
            if($row){   //vehicle exists
                if($row['Status']=='Booked'){
                    echo "<p class='submitMsg'><b>Vehicle unavailable, already assigned!<b></p>";        
                }else{
                    $sql = "SELECT Driver_ID FROM vehicles_assigned WHERE Driver_ID='$Driver_ID';";
                    $query = mysqli_query($con,$sql);
                    if(mysqli_num_rows($query)>0){
                        echo "<p class='submitMsg'><b>Driver already assigned a vehicle<b></p>"; 
                    }else{
                        $sql = "INSERT INTO vehicles_assigned(Vehicle_No,Driver_ID) VALUES ('$Number','$Driver_ID');";
                        $query = mysqli_query($con,$sql);
                        $failed=false;
                        if($query==true){
                            $sql = "UPDATE vehicles SET Status='Booked' WHERE Vehicle_No='$Number';";
                            $query = mysqli_query($con,$sql);
                            if($query == true){
                                echo "<p class='submitMsgD'><b>Driver successfully assigned vehicle<b></p>"; 
                            }else{
                                $sql = "DELETE FROM vehicles_assigned WHERE Driver_ID='$Driver_ID' AND Vehicle_No='$Number';";
                                $query = mysqli_query($con,$sql);
                                $failed=true;
                            }                     
                        }else{
                            $failed=true; 
                        }
                        if($failed==true){
                            echo "<p class='submitMsg'><b>Error in assignment!<b></p>"; 
                        }
                    }
                }
            }else{
                echo "<p class='submitMsg'><b>Vehicle does not exist!<b></p>";    
            }
        }else{
            echo "<p class='submitMsg'><b>Driver does not exist!<b></p>";
        }     
    }
    echo "<br>";
?>


<body>
<div class="container">   
        <h1>Assign Vehicle</h1>           
        <form action="assign vehicle.php" method="POST">
            <input style="width:250px;" type="text" name="ID" id="ID" placeholder="Enter Driver's ID"  maxlength=12 minlength=12 required>
            <input style="width:250px;" type="text" name="Number" id="Number" placeholder="Enter Vehicle Number" required>           
            <button class="btn">Assign Driver</button> 
            <br>
        </form>
    </div>
</body>
</html>