<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>
    
    <?php
        require 'config/db.php';

        // Check if 'id' parameter is set
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Fetch the product based on the ID
            $result = mysqli_query($db_connect, "SELECT * FROM products WHERE id=$id");
            $row = mysqli_fetch_assoc($result);

            // Check if product exists
            if (!$row) {
                echo "Product not found!";
                exit();
            }
        } else {
            echo "Product ID not provided!";
            exit();
        }
    ?>

    <form action="backend/edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="new_name" placeholder="masukkan Produk Baru" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>">
        <input type="text" name="new_price" placeholder="masukkan Harga Baru" value="<?php echo isset($row['price']) ? $row['price'] : ''; ?>">
        
        <!-- Add input for the new image -->
        <input type="file" name="new_image">
        
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
