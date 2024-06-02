<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
    header('location:login_form.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>

    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="landing2.css">

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

            <li><a href="user_page.php"><i class="fas fa-home"></i> HOME </a></li>
            <li><a href="#"><i class="fas fa-list"></i> CONCERNS </a></li>
            <li><a href="#"><i class="fas fa-envelope"></i> MESSAGES</a></li>
            <li><a href="myAccount.php"><i class="fas fa-users"></i> MY ACCOUNT </a></li>
            <li><a href="#"><i class="fas fa-info"></i> ABOUT US </a></li>
            <li><a href="logout.php" class="logout"><i class="fas fa-right-from-bracket"></i></i></i> LOG OUT </a></li>
          
        </ul>
    </nav>

    <div class="container">
        <div class="content">
            <h3>hi, <span>user</span></h3>
            <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
            <p>this is an user page </p>
            

        </div>
    </div>
</body>
</html>

<style> 
 .container .content{ 
    position: relative; 
    top: 200px;

 }
</style> 