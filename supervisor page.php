<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel = "icon" href ="img/logo.svg">
    <title>Supervisor portal</title>
</head>
<body>
    <div class="nav-container">
        <div class="wrapper">
            <nav>
                <div class="logo">
                    AVTS.
                </div>
                <ul class="nav-items">
                    <li style="margin-right:15em;">
                        <a class="nav-btn-container" href="supervisor page.php">
                            <?php
                                session_start();
                                $record2=$_SESSION['Name'];
                                $Supervisor_ID=$_SESSION['Supervisor_ID'];
                                echo"<h1>Welcome $record2 !</h1>";
                            ?>
                        </a>  
                    </li>
                    <li>
                        <a href="index.php?logout=success">Log Out?</a>
                        <a class="nav-btn-container" href="index.php?logout=success">
                            <img src="img/exit.svg" alt="">
                        </a>  
                    </li>
                </ul>
            </nav>
        </div>
        <div class="footer">
            <h4>Copyright 2021 AV Tracking System | All rights reserved - Made with ❤</h4>
        </div>
    </div>
    <nav>
    </nav>
    <div class="wrapper">
        <div class="options">
            <nav>
                <a href="view drivers.php"><button class="btn" style="width: 200px">View Drivers list</button></a>
                <a href="view driver status.php"><button class="btn" style="width: 210px">View Driver Status</button></a>
                <a href="add driver.php"><button class='btn' style="width: 150px">Add Driver</button></a>   
                <a href="delete driver.php"><button class="btn" style="width: 10em">Delete Driver</button></a>
                <a href="change pass.php"><button class="btn" style="width: 235px">Change Driver's Password</button></a>
                
            </nav>
            <nav>
                <a href="view vehicles.php" ><button class='btn' style="width: 200px">View Vehicles list</button></a>
                <a href="assign vehicle.php"><button class="btn" style="width: 210px">Assign Vehicle</button></a>
                <a href="add vehicle.php"><button class="btn" style="width: 150px">Add Vehicle</button></a>
                <a href="delete vehicle.php"><button class="btn" style="width: 200px">Delete Vehicle</button></a>
                <a href="remove assignment.php"><button class="btn" style="width: 250px">Remove Vehicle Assignment</button></a>
            </nav>
        </div>
    </div>
</body>
</html>