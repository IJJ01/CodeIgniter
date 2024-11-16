<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <div class="container">
        <h1>Inscription</h1>
        
        <!-- Affichage des messages d'erreur ou de succès -->
        <?php if (session()->getFlashdata('error')): ?>
            <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>

        <form action="<?= base_url('auth/registerPost') ?>" method="post">
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit" class="button signup">Valider</button>
        </form>
    </div>
</body>
</html>
