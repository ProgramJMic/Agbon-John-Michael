<?php

if( isset($_GET["id"]) ){
    $id = $_GET["id"]; 

    $servername = "localhost:3307";
    $username = "root"; 
    $password = ""; 
    $database = "user_db";

    $successMessage = "";

    //Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM assets WHERE id=$id"; 
    $connection->query($sql); 
   
}

    $successMessage = "Asset deleted successfully"; 
    
    header("location:asset_page.php");
    exit; 
      
?>