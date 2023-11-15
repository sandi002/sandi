<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body style="background: rgb(200, 200, 200);">

    <div class="container bg-white position-absolute top-50 start-50 translate-middle shadow p-5 rounded-2" style="max-width: 600px;">

        <?php if (isset($_SESSION['login_status'])) : ?>
            <?php if ($_SESSION['login_status'] == 'INVALID_PASSWORD') : ?>

                <div class="alert alert-warning" role="alert">
                    Password yang anda masukan salah
                </div>

            <?php elseif ($_SESSION['login_status'] == 'INVALID_EMAIL_PASSWORD') : ?>

                <div class="alert alert-warning" role="alert">
                    Email atau Password yang anda masukan salah
                </div>

            <?php endif; ?>
        <?php endif; ?>

        <form action="./backend/login.php" method="post">

            <h1 class="text-center mb-5">Login akun</h1>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Masukan email anda">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Masukan password anda">
            </div>

            <div class="col-auto">
                <button type="submit" value="login" name="submit" class="btn btn-success w-100">Submit</button>
            </div>

            <div class="col-auto mt-3 text-center">
                Belum punya akun?
                <a href="register.php" class="link-success">
                    Daftar sekarang
                </a>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>