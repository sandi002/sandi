<?php

if (session_status() === PHP_SESSION_NONE) session_start();
require './../config/db.php';

if (isset($_POST['submit'])) {

    global $db_connect;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($confirm != $password) {
        $_SESSION['register_status'] = "INVALID_PASSWORD_CONFIRM";
        header('Location: ../register.php');
        // echo "password tidak sesuai dengan konfirmasi password";
        die;
    }

    $usedEmail = mysqli_query(
        $db_connect,
        "SELECT email FROM users WHERE email = '$email'"
    );

    if (mysqli_num_rows($usedEmail) > 0) {
        $_SESSION['register_status'] = "EMAIL_ALREADY_USED";
        header('Location: ../register.php');
        // echo "email sudah digunakan";
        die;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $created_at = date('Y-m-d H:i:s', time());

    $users = mysqli_query(
        $db_connect,
        "INSERT INTO users 
        (name, email, password, created_at)
        VALUES
        ('{$name}','{$email}','{$password}','{$created_at}')"
    );

    $_SESSION['register_status'] = "REGISTRATION_SUCCESS";
    header("Location: ../register.php");
    // echo "registrasi berhasil";
}
