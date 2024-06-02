<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
   
include 'connection.php'; 

if (isset($_POST['submit'])) {
    // Check if file was uploaded without errors
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['image']['name'];

        // Check if the file already exists in the database
        $check_query = mysqli_query($con, "SELECT * FROM images WHERE file = '$file_name'");
        if (mysqli_num_rows($check_query) > 0) {
            echo "<script>alert('Image already uploaded.');</script>";
        } else {
            // Insert the file name into the database
            $query = mysqli_query($con, "INSERT INTO images (file) VALUES ('$file_name')");
            if ($query) {
                echo "<script>alert('Image uploaded successfully.');</script>";
            } else {
                echo "<script>alert('Failed to insert image into database.');</script>";
            }
        }
    } else {
        echo "<script>alert('No file uploaded or there was an upload error.');</script>";
    }
}
// Close the database connection
mysqli_close($con);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landing2.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <title>Image Gallery</title>
  
</head>
<body>
<style>   .image-table {
    width: 50%; /* Adjusted width to make the table smaller */
    border-collapse: collapse;
    margin: 20px auto; /* Centered the table with auto margins */
    background-color: #f0f0f0;
}

.image-table th, .image-table td {
    padding: 5px; /* Reduced padding for smaller cells */
    border: 1px solid #ddd;
    text-align: center;
}

.image-table img {
    max-width: 100%;
    height: auto;
    border: 2px solid #ccc;
    border-radius: 10px;
    transition: transform 0.3s, box-shadow 0.3s;
}

.image-table img:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}
      
  .image-table {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
  
  .image-table img {
    max-width: 100px;
    margin: 10px;
    border-radius: 8px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  }    
  .logo img {
    display: none; /* Hide all images by default */
}

.logo img:first-child {
    display: block; /* Display only the first image */
}

        </style>
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
    <form id="contact"method="POST" enctype="multipart/form-data">
        <input type="file" name="image" />
        <br /><br />
        <button type="submit" name="submit">Submit</button>
    </form>
    <div class="image-table">
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
    </div>
    </div>
</div>
<script>$(document).ready(function() {
    $('.delete-btn').click(function() {
        var id = $(this).data('id');
        if (confirm("Are you sure you want to delete this image?")) {
            $.ajax({
                url: 'delete_image.php',
                method: 'POST',
                data: { id: id },
                success: function(response) {
                    if (response == 'success') {
                        // Remove the deleted image from the DOM
                        $(this).closest('.image-wrapper').remove();
                    } else {
                        alert('Error: Unable to delete image.');
                    }
                }
            });
        }
    });
});
</script>
</body>
</html>
