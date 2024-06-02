<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="landing2.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <title> Send Email</title>
  
</head>

<body>
  
<nav>
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
    <form id="contact" action="mail.php" method="post">
      <h1>Send  Email</h1>
      <fieldset>
        <input placeholder="Your name" name="name" type="text" tabindex="1" required autofocus>
      </fieldset>
      <fieldset>
        <input placeholder="Your Email Address" name="email" type="email" tabindex="2" required>
      </fieldset>
      <fieldset>
        <input placeholder="Type your subject line" type="text" name="subject" tabindex="4" required>
      </fieldset>
      <fieldset>
        <textarea name="message" placeholder="Type your Message Details Here..." tabindex="5" required></textarea>
      </fieldset>
      <fieldset>
        <button type="submit" name="send" id="contact-submit">Submit Now</button>
      </fieldset>
    </form>
  </div>
</div>
</body>

</html>