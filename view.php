<?php
$servername = "localhost:3307";
$username = "root"; 
$password = ""; 
$database = "user_db";

//Create connection
$connection = new mysqli($servername, $username, $password, $database);


$id = ""; 
$asset = ""; 
$location = ""; 
$concern = "";
$quantity= ""; 

$errorMessage = ""; 
$successMessage = ""; 

if( $_SERVER['REQUEST_METHOD'] == 'GET') { 
    //GET method: Show the data of the asset 

    if(!isset($_GET["id"])){
        header("location: asset_page.php"); 
        exit; 
    }
    $id = $_GET["id"]; 

    //read the data from database 
    $sql = "SELECT * FROM assets WHERE id=$id";
    $result = $connection->query($sql); 
    $row = $result->fetch_assoc(); 

    if(!$row){
        header("location: asset_page.php"); 
        exit; 
    } 
    
    $asset = $row["asset_name"]; 
    $location = $row["location"]; 
    $concern = $row["concern"];
    $quantity= $row["quantity"]; 

} else {
    $id = $_POST["id"]; 
    $asset = $_POST["asset_name"]; 
    $location = $_POST["location"]; 
    $concern = $_POST["concern"];
    $quantity= $_POST["quantity"]; 

    do{
        if(empty($id) || empty($asset) || empty($location) || empty($concern) || empty($quantity)) {
            $errorMessage = "All the fields are required"; 
            break; 
        }

        $sql = "UPDATE `assets` SET `id`='$id',`asset_name`='$asset',`location`='$location',`concern`='$concern',
        `quantity`='$quantity' WHERE id = '$id' ";

            $result = $connection->query($sql);
            
            if(!$result){ 
            $errorMessage = "Invalid query: " . $connection->error;
            break;  
            }
            
            $successMessage = "Asset editted successfully";
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
    <title>View Asset</title>
    <link rel="stylesheet" href="landing2.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>View Asset</h2>
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
            <input type = "hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label" >Asset Name</label>
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
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="asset_page.php" role="button">Close</a>
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
        .btn.btn-outline-primary{
            position:relative;
            left: 490px;
       }

    </style>
</body>
</html>