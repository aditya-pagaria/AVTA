<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vehicles List</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <?php 
        include('db_connection.php');
        include('supervisor page.php');
        $Supervisor_ID=$_SESSION['Supervisor_ID'];
        ?>
        <div class="container">
            <h1>Vehicles List</h1>
        </div>
        <?php
        $result=$con->query("SELECT * FROM vehicles WHERE Supervisor_ID=$Supervisor_ID");
         if(mysqli_num_rows($result)>0){
             echo "<table class='center' border='1'>
             <tr>
             <th><h1>Vehicle Number</th>
             <th><h1>Brand</h1></th>
             <th><h1>Model</h1></th>
             <th><h1>Status</h1></th>
             </tr>";
             while($row = mysqli_fetch_assoc($result))
             {       
                 echo "<tr>";       
                 echo "<td>" . $row['Vehicle_No'] . "</td>";          
                 echo "<td>" . $row['Brand'] . "</td>";         
                 echo "<td>" . $row['Model'] . "</td>";     
                 if($row['Status']=="Booked")     {
                    echo "<td><p class='booked'>" . $row['Status'] . "</p></td>";         
                }else{
                    echo "<td><p class='available'>" . $row['Status'] . "</p></td>";  
                }           
                 echo "</tr>";          
             }
             echo "</table>";
         }else{
            echo "<p class='submitMsg'><b>No Records Found!<b></p>";
         }
    ?>
    <br>
    <br>
    <br>
</html>