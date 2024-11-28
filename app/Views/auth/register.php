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
        <!-- Id	Email	Mot_de_passe	Nom	Prenom	Age	Ville	Numero_de_telephone	 -->

        <form action="<?= base_url('auth/registerPost') ?>" method="post">
            <input type="text" name="nom" placeholder="Nom d'utilisateur" required>
            <input type="text" name="prenom" placeholder="Prenom d'utilisateur" required>
            <input type="text" name="age" placeholder="Age de téléphone" required>
            <input type="text" name="ville" placeholder="Ville d'utilisateur" required>
            <input type="text" name="numtele" placeholder="Numéro de téléphone" required>
            <input type="email" name="email" placeholder="Email" required>

            <!-- Choix client ou transporteur -->
            <select name="role" required>
                <option value="" disabled selected>Vous êtes...</option>
                <option value="client">Client</option>
                <option value="transporteur">Transporteur</option>
            </select>

            <input type="password" name="password" placeholder="Mot de passe" required>
            <input type="password" name="passwordconf" placeholder="Confirmer le mot de passe" required>
            <button type="submit" class="button signup">Valider</button>
        </form>
    </div>
</body>
</html>
