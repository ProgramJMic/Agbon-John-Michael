<?php
 $servername = "localhost:3307";
 $username = "root"; 
 $password = ""; 
 $database = "user_db";

 //Create connection
 $connection = new mysqli($servername, $username, $password, $database);


$asset = ""; 
$location = ""; 
$concern = "";
$quantity= ""; 

$errorMessage = ""; 
$successMessage = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $asset = $_POST["asset_name"]; 
    $location = $_POST["location"]; 
    $concern = $_POST["concern"]; 
    $quantity = $_POST["quantity"]; 

    do{
        if(empty($asset) || empty($location) || empty($concern) || empty($quantity)) {
            $errorMessage = "All the fields are required"; 
            break; 

        }
        
        //ADD NEW ASSET
        $sql= "INSERT INTO assets (asset_name, location, concern, quantity)". "VALUES ('$asset', '$location', '$concern', '$quantity')"; 
        $result = $connection->query($sql); 

        
            if(!$result){ 
            $errorMessage = "Inavalid query" . $connection->error; 
            break; 
        }


        $asset = ""; 
        $location = ""; 
        $concern = "";
        $quantity= ""; 

        $successMessage = "Asset added successfully"; 
        break; 
        
        header("location: asset_page.php"); 
        
        exit; 

    } while(false); 
}


?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create asset</title>
    <link rel="stylesheet" href="landing2.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
    <div class="container">
        <h2>New Asset</h2>
        <br>
        <br>
        <?php
        if(!empty($errorMessage)){
            echo"
            <div class = 'alert alert-warning alert-dismissible fade show' role='alert'>
                <strong> $errorMessage </strong> 
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label=Close> </button>
            </div>
            ";    
        } 
        ?>



        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Asset Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="asset_name" value=" <?php echo $asset; ?>">
                </div>
            </div>

            <div class="row  mb-3">
                <label class="col-sm-3 col-form-label">Location</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="location" value="<?php echo $location; ?>">
                </div>
            </div>

            <div class="row  mb-3">
                <label class="col-sm-3 col-form-label">Condition</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="concern" value="<?php echo $concern; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="quantity" value="<?php echo $quantity; ?>">
                </div>
            </div>

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
            <br> 
            
            <div class="row  mb-3">
                <div class="offset-sm3 col-sm-3 d-grid">
                    <button type="submit" class= "btn btn-primary" href="asset_page.php">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="asset_page.php" role="button">Go back</a>
                </div>
            </div>
        </form>
    </div>

    

    <style>
        .container{
            margin-top: 120px;
            text-align: center;
        }

        h2{
            position: relative; 
            left: 500px;
            background: crimson;
            width: 250px;
            border-radius: 10px;
        }
        .btn.btn-primary,
        .btn.btn-outline-primary{
            position:relative;
            left: 330px;
       }
    </style>

</body>
</html>