<?php
require '../config/db.php';

if(isset($_POST['submit'])) {
    global $db_connect;

    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $tempImage = $_FILES['image']['tmp_name'];

    $randomFilename = time() . '-' . md5(rand()) . '-' . $image;

    // Update the upload path
    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/xampp/pemweb/web-programming-course-pertemuan-6/upload/' . $randomFilename;

    // Check if the directory exists, if not, create it
    if (!file_exists(dirname($uploadPath))) {
        mkdir(dirname($uploadPath), 0777, true);
    }

    $upload = move_uploaded_file($tempImage, $uploadPath);

    if($upload) {
        mysqli_query($db_connect, "INSERT INTO products (name,price,image)
                    VALUES ('$name','$price','/upload/$randomFilename')");
        echo "berhasil upload";
    } else {
        echo "gagal upload";
    }
}
?>
