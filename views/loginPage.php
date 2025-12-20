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
        <form method="POST" action="../controllers/loginController.php">
            <h2>Đăng nhập</h2>
            <input type="text" name="username" autocomplete="off" require placeholder="Tên đăng nhập">
            <input type="password" name="password" autocomplete="off" require placeholder="Mật khẩu">
            <button type="submit" class="btn">
                Đăng nhập
            </button>
        </form>
        <?php if (!empty($username)) : ?>
            <p>
                <strong>Dữ liệu vừa gửi:</strong>
                Username: <?= htmlspecialchars($username) ?>
            </p>
        <?php endif; ?>

        <?php if (!empty($error)) : ?>
            <p style="color:red"><?= $error ?></p>
        <?php endif; ?>

    </div>
</body>

</html>