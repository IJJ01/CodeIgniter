<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commande de Produits</title>
</head>
<body>
    <h2>Passer une commande</h2>
    <form action="<?= base_url('auth/MainPost') ?>" method="post">
        <label for="name">Nom du client :</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Adresse e-mail :</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="product">Produit :</label>
        <select id="product" name="product" required>
            <option value="A">Produit A - 100 DH</option>
            <option value="B">Produit B - 150 DH</option>
            <option value="C">Produit C - 200 DH</option>
        </select><br><br>

        <label for="quantity">Quantité :</label>
        <input type="number" id="quantity" name="quantity" min="1" required><br><br>

        <button type="submit">Soumettre la commande</button>
    </form>
</body>
</html>
