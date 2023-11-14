<?php
    require '../config/db.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        // Delete the product based on the ID
        $deleteQuery = "DELETE FROM products WHERE id=$id";
        $deleteResult = mysqli_query($db_connect, $deleteQuery);

        if ($deleteResult) {
            // Product deleted successfully, redirect to product list
            header("Location: ../show.php");
            exit();
        } else {
            // Error deleting product
            echo "Error deleting product!";
        }
    } else {
        // If the 'id' parameter is not set, redirect to the product list
        header("Location:../show.php");
        exit();
    }
?>
