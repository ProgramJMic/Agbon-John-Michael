<?php
include 'connection.php';

if ($con) {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM images WHERE id = $id";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}

mysqli_close($con);
?>
