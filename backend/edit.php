<?php
    require '../config/db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $newName = $_POST['new_name'];
            $newPrice = $_POST['new_price'];

           // Check if a new image is uploaded
if (isset($_FILES['new_image']) && $_FILES['new_image']['error'] == UPLOAD_ERR_OK) {
    $newImage = $_FILES['new_image']['name'];
    $tempNewImage = $_FILES['new_image']['tmp_name'];

    $randomFilename = time() . '-' . md5(rand()) . '-' . $newImage;

    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/xampp/pemweb/web-programming-course-pertemuan-6/upload/' . $randomFilename;

    $upload = move_uploaded_file($tempNewImage, $uploadPath);

    if ($upload) {
        // Update product details with the new image path
        mysqli_query($db_connect, "UPDATE products SET name='$newName', price=$newPrice, image='/xampp/pemweb/web-programming-course-pertemuan-6/upload/$randomFilename' WHERE id=$id");

        // Display success message
        echo '<script>alert("Product updated successfully!");</script>';
    } else {
        echo "Error uploading new image!";
    }
} else {
    // Update product details without changing the image
    mysqli_query($db_connect, "UPDATE products SET name='$newName', price=$newPrice WHERE id=$id");

    // Display success message
    echo '<script>alert("Product updated successfully!");</script>';
}


            // Redirect to the product list
            header("Location: ../show.php");
            exit();
        }
    } else {
        // If the request method is not POST, redirect to the edit form
        header("Location: ../edit.php");
        exit();
    }
?>
