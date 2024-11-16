<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Courti</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <div class="container">
        <h1>Connexion</h1>
        <?php if (session()->getFlashdata('error')): ?>
            <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        <form action="<?= base_url('auth/loginPost') ?>" method="post">
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit" class="button connect">Se connecter</button>
        </form>
    </div>
</body>
</html>
