<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landing2.css">
    <link rel="stylesheet" href="modal.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <title>ADMIN | assets</title>
  
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
    <nav>
        <ul>
            <li>
                <a href="#" class="logo"> 
                    <img src="picture.png" alt="">
                    <span class="nav-item">ADMIN </span>
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
    <div class="container"> <!-- MODAL FOR CREATE ASSET -->

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
                    
                    header("location: asset_page.php"); 
                    exit; 

                } while(false); 
            }
        ?>

        <h2> List of Assets</h2>
        <a class="shesh" role="button" href="create.php" >New Asset </a>
        
        

</div>
<div class="main-content">
        <table class="table">
            <thead> 
                <tr>
                    <th>ID</th>
                    <th>Asset</th>
                    <th>Location</th>
                    <th>Condition</th>
                    <th>Created At</th>
                    <th>Quantity</th>
                    <th class = "action" >Action</th>
                </tr>
            </thead>

            <tbody> 
                <?php
                     $servername = "localhost:3307";
                     $username = "root"; 
                     $password = ""; 
                     $database = "user_db";

                    //Create connection
                     $connection = new mysqli($servername, $username, $password, $database);

                    if($connection->connect_error){
                        die("connection_failed: " .$connection->connect_error);
                    }

                    //read all row from database table
                     $sql = "SELECT * FROM assets";
                     $result = $connection->query($sql);

                     if(!$result){ 
                        die("Invalid query: ". $connection->error); 
                     }

                     while($row = $result->fetch_assoc()){
                        echo "
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[asset_name]</td>
                            <td>$row[location]</td>
                            <td>$row[concern]</td>
                            <td>$row[created_at]</td>
                            <td>$row[quantity]</td>
                            <td>
                               
                            <a class = 'btn btn-primary btn-sm' href='Edit.php ?id=$row[id]'> Edit </a> 
                            <a class = 'btn btn-primar btn-sm ' href='view.php?id=$row[id]'> View </a> 
                            <a class = 'btn btn-danger btn-sm' href='delete.php?id=$row[id]'> Delete </a>
                           
 
                            
                            </td>
                        </tr>
                        ";

                    }

                ?>
                
            </tbody>
        </table>   

        <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Are you sure you want to delete the data?</p>
            <form method="post" action="delete.php">
            <button type="submit" name="confirmDelete">Yes, Delete</button>
            <button type="button" class="cancel">Cancel</button>
            </form>
        </div>
        </div>

        <script src="script.js"></script>
</body>



<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

*{
    margin: 0; 
    padding: 0; 
    outline: none;
    border: none; 
    text-decoration: none;
    font-family: "Poppins", sans-serif;
}

body { 
    background: #dfe9f5;
}

nav{
    position: absolute;
    top: 0;
    bottom: 0;
    height: 100%;
    left: 0;
    background: #f36464;
    width: 85px;
    overflow: hidden;
    transition: width 0.2s linear;
    box-shadow: 0 220px 35px rgba(0, 0, 0, 0.1);
    border: solid 2px;
}

.logo{ 
    text-align: center;
    display: flex;
    transition: all o.5s ease; 
    margin: 10px 0 0 10px; 
}

.logo img{
  width: px; 
  height: 45px; 
  border-radius: 50%;  
}

.logo span{
    font-weight: bold;
    padding-left: 15px;
    font-size: 18px;
    text-transform: uppercase;
}

a{ 
    position: relative;
    color: rgb(85, 83, 83);
    font-size: 14px;
    display: table;
    width: 300px; 
    padding: 10px; 
}

.fas{
    position: relative;
    width: 70px; 
    height: 4px; 
    top: 2px; 
    font-size: 20px; 
    text-align: center;
}

.nav-item{
   position: relative;
   top: 12px;
   margin-left: 10px; 
}


.logout{
    position: absolute; 
    bottom: 0; 
    right:-170px;
}

.container {
    position: absolute;
    top: 100px;
    left: 80%; /* Center the container horizontally */
    transform: translateX(-50%); /* Move the container back by half of its width */
    width: 80%; /* Adjust the width as needed */
    height: 50%;
    text-align: center;
    
}
.btn.btn-primary {
    padding-bottom: 30px; /* Add some bottom margin to the button */
    text-align: center;
}
.main-content {
    position:relative; 
    top: 250px;
    right: -200px;
    padding-top: 0;
    text-align: left; /* Align content to the left */
    padding-left: 0; /* Add padding to prevent content from sticking to the edge */
    overflow-x: hidden;
    overflow-y: scroll;
    height:200px;
    
    display: block;
}
h2{
    padding-right: 0;
    padding-bottom: 30px;
    position: relative;
    right:450px;
}
.table {
    top: 50px;
    width: 80%;
    border-collapse: collapse;
    font-size: 15px;
    margin-top: 40px;
    height: 100%;
    overflow: auto;
    
    
}

.table .action{
    width: 10px;
}

.table th,
.table td {
    padding: 5px;
    border: 1px solid #ddd;
    text-align: center;
    left: 5px;
}

.table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table tbody tr:hover {
    background-color: #ddd;
}
.btn.btn-primary {
    color: blue; /* White text color */
}
.btn.btn-primary:hover{
    background: rgba(33, 79, 242, 0.51);
    cursor: pointer; 
}

.btn-primar{
    color: green;
}
.btn.btn-primar:hover{
    background: rgba(0, 255, 49, 0.4);
    cursor: pointer; 
}

.btn.btn-danger {
    color: red; /* White text color */

}
.btn.btn-danger:hover{
    background: rgba(239, 55, 55, 0.28);
    cursor: pointer; 
}


.shesh{
    padding: 10px; 
    background: #fff; 
    color: crimson; 
    border: 0; 
    outline: none; 
    cursor: pointer; 
    font-size: 15px; 
    font-weight: 800; 
    border-radius: 30px; 
    width: 10%;
    position: relative; 
    left: 85px;
}

.shesh:hover{
    background: rgba(239, 55, 55, 0.28);
    cursor: pointer; 

}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>

    

</html>