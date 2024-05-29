<?php
$servername = "localhost:3307";
$username = "root"; 
$password = ""; 
$database = "user_db";

//Create connection
$connection = new mysqli($servername, $username, $password, $database);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="modal.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <button id = "login-show"> Login</button> 
    
    <div id="login-modal">
        <div class="modal">
            <div class="top-form">
            <div class="close-modal">
                &#10006;
            </div>
            </div>
        </div>
             
        <div class="login-form">
           <h2> CREATE NEW ASSET </h2>
           <form action="">
                <input type="text" class = "form-control" placeholder = "Asset name" name="asset_name" value=" <?php echo $asset; ?>"> 
                <input type="text" class = "form-control" placeholder = "Location" name="location" value="<?php echo $location; ?>"> 
                <input type="text" class = "form-control" placeholder = "Condition" name="concern" value="<?php echo $concern; ?>"> 
                <input type="text" class = "form-control" placeholder = "Quantity" name="quantity" value="<?php echo $quantity; ?>">
                <button type = "button" class  = "submit-btn" > Add Asset</button> 
            
                <?php
            if(!empty($successMessage)){
                echo"
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'> 
                        <div class = 'alert alert-success alert-dismissible fade show' role='alert'>
                            <strong> $successMessage </strong> 
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'> </button>
                        </div>
                    </div>
                </div>
            ";    
            }
            ?>

            <div class="row  mb-3">
                <div class="offset-sm3 col-sm-3 d-grid">
                    <button type="submit" class= "btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="asset_page.php" role="button">Cancel</a>
                </div>
            </div>
              
            </form>   
        </div>
    </div>

    <script type = "text/javascript">
        $(function(){
            $('#login-show').click(function(){
                $('#login-modal').fadeIn().css("display", "flex"); 
            });

            $('.close-modal').click(function(){
                $('#login-modal').fadeOut(); 
            });
        });
        
    </script>

        

</body>
</html>