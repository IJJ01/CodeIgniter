<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation</title>
</head>
<body>
    <div class="container">
        <h1>Confirmation</h
        <?php if (session()->getFlashdata('error')): ?>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>

        <form action="<?= base_url('auth/confirmePost') ?>" method="post">
            <?= csrf_field() ?>
            <input type="text" name="code" placeholder="Code de confirmation" required>
            <button type="submit">Valider</button>
        </form>
    </div>
</body>
</html>