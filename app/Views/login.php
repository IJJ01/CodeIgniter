<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form method="post" action="/login/checkLogin">
        <?= csrf_field() ?>
        <input type="text" name="phone" placeholder="Phone">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="error"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

</body>

</html>