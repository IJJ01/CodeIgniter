<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="/register/store">
        <?= csrf_field() ?>
        <input type="text" name="phone" placeholder="Phone">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Register</button>
    </form>

    <?php if (isset($validation)): ?>
        <div class="errors">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

</body>

</html>