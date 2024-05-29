<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landing2.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <title>ADMIN | home</title>
    
</head>

<body>
    <nav>
        <ul>
            <li>
                <a href="#" class="logo"> 
                    <img src="picture.png" alt="">
                    <span class="nav-item">ADMIN</span>
                </a> 
            </li>

            <li><a href="landing_page.php"><i class="fas fa-home"></i> HOME </a></li>
            <li><a href="asset_page.php"><i class="fas fa-list"></i> ASSETS </a></li>
            <li><a href="#"><i class="fas fa-envelope"></i> MESSAGES</a></li>
            <li><a href="#"><i class="fas fa-users"></i> ACCOUNTS </a></li>
            <li><a href="#"><i class="fas fa-info"></i> ABOUT US </a></li>
            <li><a href="logout.php" class="logout"><i class="fas fa-right-from-bracket"></i></i></i> LOG OUT </a></li>
          
        </ul>
    </nav>
    <div class="container_head">
        <h1>ASSET MANAGEMENT SYSTEM</h1>
    </div>
        <div class="container">
        <div class="content">
            <h3>hi, <span>admin</span></h3>
            <h1>welcome, <span><?php echo $_SESSION['admin_name'] ?></span></h1>
            <p>this is an admin page </p>

    </div>
</body>


</html>

<style>
    .container_head h1{
        position: relative; 
        top: 180px;
        left: 530px;
        width: 50%;
    }
    .container{
        position: relative;
        top: 250px;
        right: 10px;

    }

  
</style>