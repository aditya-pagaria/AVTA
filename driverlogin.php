<?php include('db_connection.php')?>
<?php 
    $Driver_ID = $_POST['ID'];
    $Pass=$_POST['Pass'];

    $sql="SELECT * FROM drivers WHERE Driver_ID='$Driver_ID' AND Password='$Pass'";
    $query=mysqli_query($con,$sql);
    $row = mysqli_fetch_array($query);
    if($row){   //if data exists
        $sql="SELECT * FROM vehicles_assigned WHERE Driver_ID='$Driver_ID'";
        $query=mysqli_query($con,$sql);
        $row2 = mysqli_fetch_array($query);
        if($row2){   //if vehicle is assigned to driver
            $name=$row['Name'];
            echo "Login Successful.";
            echo "Welcome ".$name."!";
        }else{
            echo "Error! You have not been assigned a vehicle!";
        }  
    }else{  
        echo "Login Failed, Please Try again";
    }
?>

