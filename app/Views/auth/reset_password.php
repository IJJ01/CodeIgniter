<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réinitialisation du mot de passe</title>
    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>">
</head>
<body>
    <div class="container">
        <h1>Réinitialisation du mot de passe</h1>

        <!-- Messages d'erreur ou de succès -->
        <?php if (session()->getFlashdata('error')): ?>
            <p style="color:red;"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <p style="color:green;"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>

        <form action="<?= base_url('auth/reset-password') ?>" method="post">
            <input type="hidden" name="token" value="<?= esc($token ?? '') ?>">

            <input type="password" name="password" placeholder="Nouveau mot de passe" required>
            <input type="password" name="passwordconf" placeholder="Confirmer le mot de passe" required>

            <button type="submit" class="button">Réinitialiser le mot de passe</button>
        </form>
    </div>
</body>
</html>
