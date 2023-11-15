<?php
if (session_status() === PHP_SESSION_NONE) session_start();

if ($_SESSION['role'] != 'admin') {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body style="background: rgb(200, 200, 200);">

    <div class="alert alert-light m-auto mt-5" style="max-width: 70%;">
        <h4 class="alert-heading">Selamat datang administrator: <?= $_SESSION['name']; ?></h4>
        <p>
            Ini adalah halaman dasbor dari sistem admin UBP Karawang
        </p>
        <hr>
        <div class="d-flex flex-row">
            <a href="./backend/logout.php">
                <button class="btn btn-dark">
                    Logout
                </button>
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>