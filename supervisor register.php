<?php include('header.php')?>
<?php 
    session_start();
    $incorrect=0;
    if(isset($_POST['ID']))
    {
        $Supervisor_ID = $_POST['ID'];
        $Name = $_POST['Name'];
        $Password=$_POST['Pass'];
        $Contact = $_POST['Contact'];
        $Address = $_POST['Address'];
        $sql="SELECT * FROM supervisor WHERE Supervisor_ID='$Supervisor_ID'";
        $query=mysqli_query($con,$sql);
        $row = mysqli_fetch_array($query);
        if($row){   //if data exists
            $_SESSION['Name'] = $Name;
            $_SESSION['Supervisor_ID'] = $Supervisor_ID;
            $Pass=$row['Password'];
            if($Pass==$Password){
                header("Location:supervisor page.php?login=success"); 
            }else{
                $incorrect=1;
            }     
        }else{
            //if supervisor doesn't exist, new account is created and redirected to supervisor page
            $sql2 = "INSERT INTO supervisor VALUES ('$Supervisor_ID','$Name', '$Contact', '$Address','$Password');";
            $query2=mysqli_query($con,$sql2);
            if($query2 == true){
                echo "<p class='submitMsgD'><b>Registration Successful!<b></p>";
            }else{
                $incorrect=1;
            }     
        }
    }
    if($incorrect==1){
        echo "<p class='submitMsg'><b>Incorrect Password/Username or Account Not Found!<b></p>";
    }
    echo "<br>";
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <div class="wrapper">
        <div class="container">            
            <h1>Supervisor Register</h1>
            <form action="supervisor register.php" method="POST">
                <input style="width:250px;" type="text" name="ID" id="ID" placeholder="Enter your ID"  maxlength=12 minlength=12 required>
                <input style="width:250px;" type="password" name="Pass" id="Pass" placeholder="Enter your Password" required>
                <input style="width:250px;" type="text" name="Name" id="Name" placeholder="Enter your Name">
                <input style="width:250px;" type="text" name="Contact" id="Contact" placeholder="Enter your contact number" maxlength=10 minlength=10>
                <textarea name="Address" id="Address" style="width:250px;" rows="5" placeholder="Enter your address"></textarea>
                <button class="btn">Register</button> 
                <br>
            </form>
        </div>
    </div>
</body>
</html>