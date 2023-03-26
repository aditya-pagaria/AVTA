<?php include('db_connection.php')?>
<?php 
    $Driver_ID = $_POST['ID'];
    $latitude = $_POST['lat'];
    $longitude=$_POST['long'];

    $sql="UPDATE vehicles_assigned SET location_latitude='$latitude' WHERE Driver_ID='$Driver_ID'";
    $query=mysqli_query($con,$sql);
    $sql2="UPDATE vehicles_assigned SET location_longitude='$longitude' WHERE Driver_ID='$Driver_ID'";
    $query2=mysqli_query($con,$sql2);
    if($query == true && $query2 == true){  //if queries successfull
        echo "Successfull";
    }else{  
        echo "ERROR! Location update failed!";
        echo "Please contact supervisor!";
    }
?>

