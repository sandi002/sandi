<?php

if (session_status() === PHP_SESSION_NONE) session_start();
require './../config/db.php';

// Delete all sessions
foreach ($_SESSION as $key => $val) {
    unset($_SESSION[$key]);
}

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = mysqli_query(
        $db_connect,
        "SELECT * FROM users WHERE email = '{$email}'"
    );

    if (mysqli_num_rows($user) > 0) {

        $data = mysqli_fetch_assoc($user);

        if (password_verify($password, $data['password'])) {

            $_SESSION['user_id'] = $data['id'];
            foreach ($data as $key => $val) {
                $_SESSION[$key] = $val;
            }

            if ($data['role'] == 'admin') {
                header('location: ../admin.php');
            } else {
                header('location: ../profile.php');
            }

            die;

            //otorisasi
        } else {
            $_SESSION['login_status'] = "INVALID_PASSWORD";
            header('location: ../index.php');

            // echo "password salah";
            die;
        }
    } else {
        $_SESSION['login_status'] = "INVALID_EMAIL_PASSWORD";
        header('location: ../index.php');

        // echo "email atau password salah";
        die;
    }
}
