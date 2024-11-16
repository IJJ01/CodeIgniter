<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue Chez Courti!</title>
    <link rel="stylesheet" href="<?= base_url('public/css/styles.css') ?>">
</head>
<body>
    <div class="container">
        <h1>Bienvenu Chez Courti!</h1>
        <p>Livraison Rapide! N'importe Quoi, N'importe Quand Et N'importe Où...</p>
        <div class="image-container">
            <img src="<?= base_url('C:\Users\HP\Desktop\téléchargement.png') ?>" alt="Image de livraison" />
        </div>
       <button class="button connect" onclick="window.location.href='<?= base_url('auth/login') ?>'">Se connecter</button>
       <button class="button signup" onclick="window.location.href='<?= base_url('auth/register') ?>'">S'inscrire</button> 
       <button class="button signup" onclick="window.location.href='<?= base_url('auth/main') ?>'">Produit</button> 
       <button class="button signup" onclick="window.location.href='<?= base_url('auth/note') ?>'">Note</button> 

    </div>
</body>
</html>
