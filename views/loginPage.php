<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/css/main.css">
</head>

<body>
    <div class="form-login">
        <form method="POST" action="../controllers/loginController.php" class="form">
            <h2>Đăng nhập</h2>
            <input id="username" type="text" name="username" autocomplete="off" require placeholder="Tên đăng nhập">
            <input id="password" type="text" name="password" autocomplete="off" require placeholder="Mật khẩu">
            <button type="submit" class="btn ">
                Đăng nhập
            </button>
        </form>

        <p class="msg-error <?= empty($error) ? 'hidden' : '' ?>"><?= $error ?></p>
    </div>
    <script src="../public/assets/js/validateFormLogin.js"></script>
</body>

</html>