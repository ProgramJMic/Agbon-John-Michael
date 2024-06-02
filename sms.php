<?php
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
if (isset($_GET['success'])) {
    if ($_GET['success'] === 'true') {
        echo '<script>alert("SMS sent successfully.");</script>';
    } else {
        echo '<script>alert("Failed to send SMS.");</script>';
    }
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
    <title>SEND SMS</title>
   
</head>
<body>  <nav>
        <ul>
            <li>
                <a href="#" class="logo"> 
                <?php
        include 'connection.php';

        if ($con) {
            $res = mysqli_query($con, "SELECT * FROM images");

            if ($res) {
                while ($row = mysqli_fetch_assoc($res)) {
                    echo '<img src="' . $row['file'] . '" alt="Image">';
                }
                mysqli_free_result($res);
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "Error: Database connection failed.";
        }

        mysqli_close($con);
        ?>
                    <span class="nav-item">ADMIN</span>
                </a> 
            </li>

            <li><a href="landing_page.php"><i class="fas fa-home"></i> HOME </a></li>
            <li><a href="asset_page.php"><i class="fas fa-list"></i> ASSETS </a></li>
            <li><a href="phpmailer.php"><i class="fas fa-envelope"></i> SEND EMAIL  </a></li>
<li><a href="sms.php"><i class="fas fa-sms"></i> SEND SMS  </a></li>
<li><a href="upload.php"><i class="fas fa-camera"></i> SUBMIT PHOTO </a></li>

            <li><a href="#"><i class="fas fa-info"></i> ABOUT US </a></li>
       
         

            <li><a href="logout.php" class="logout"><i class="fas fa-right-from-bracket"></i></i></i> LOG OUT </a></li>
          
        </ul>
    </nav>
<div class="container">
<div class="content">

<form id="contact" action="send_sms.php" method="post">
        <label for="number">Recipient Number:</label>
        <fieldset>
        <input type="text" id="number" name="number" required placeholder="+6334567890"><br>
</fieldset>
        <fieldset>
        <label for="message">Message:</label>
</fieldset>
        <fieldset>
        <textarea id="message" name="message" rows="4" cols="50" required placeholder="Your message here..."></textarea><br>
</fieldset>
<fieldset>
        <input type="submit" value="Send SMS">
        </fieldset>
    </form>
</div>
</div>
</body>
</html>
