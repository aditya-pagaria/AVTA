<?php
    include('db_connection.php');
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel = "icon" href ="img/logo.svg">
    <title>AV Tracking System</title>
</head>
<div class="nav-container">
    <div class="wrapper">
        <nav>
            <div class="logo">
                AVTS.
            </div>
            <ul class="nav-items">
                <li>
                    <a class="nav-btn-container" href="index.php">
                        <img src="img/home.svg" alt="">
                     </a>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a class="nav-btn-container" href="supervisor login.php">
                        <img src="img/login.svg" alt="">
                    </a>
                    <a href="supervisor login.php">Login</a>
                    
                </li>
                <li>
                    <a class="nav-btn-container" href="supervisor register.php">
                        <img src="img/new.svg" alt="">
                    </a>  
                    <a href="supervisor register.php">Register</a>
                    
                </li>
                <li>
                    <a class="nav-btn-container" href="help.php">
                    <img src="img/help.svg" alt="">
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="footer">
        <h4>Copyright 2021 AV Tracking System | All rights reserved - Made with ❤</h4>
    </div>
</div>
