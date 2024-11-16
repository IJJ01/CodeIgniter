<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commande de Produits</title>
</head>
<body>
    <h2>Passer une commande</h2>
    <form action="<?= base_url('auth/MainPost') ?>" method="post">
        <label for="name">Nom du Module :</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="note">Note:</label>
        <input type="note" id="note" name="note" required><br><br>

        <button type="submit">Ajoute module</button>
        <button type="submit">valider</button>
    </form>
</body>
</html>
