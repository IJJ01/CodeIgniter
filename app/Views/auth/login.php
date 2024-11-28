<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <div class="container">
        <h1>Connexion</h1>

        <!-- Affichage des messages d'erreur ou de succès -->
        <?php if (session()->getFlashdata('error')): ?>
            <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>

        <!-- Formulaire de connexion -->
        <form action="<?= base_url('auth/loginPost') ?>" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit" class="button login">Se connecter</button>
        </form>

        <div class="links">
            <p><a href="<?= base_url('auth/forgot-password') ?>">Mot de passe oublié ?</a></p>
            <p>Pas encore inscrit ? <a href="<?= base_url('auth/register') ?>">Créer un compte</a></p>
        </div>
    </div>
</body>
</html>
