<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - TransportHub</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2a2e8f;
            --secondary-color: #ffffff;
            --input-bg: #f4f4f4;
            --border-color: #cccccc;
            --button-bg: #3b3fbc;
            --button-hover-bg: #2a2e8f;
            --font-color: #333333;
            --border-radius: 8px;
            --transition-speed: 0.3s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--primary-color);
            color: var(--font-color);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            background-color: var(--secondary-color);
            padding: 2rem;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        input {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            background-color: var(--input-bg);
            font-size: 1rem;
            transition: border var(--transition-speed);
        }

        input:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        .button {
            width: 100%;
            padding: 0.8rem;
            background-color: var(--button-bg);
            color: var(--secondary-color);
            border: none;
            border-radius: var(--border-radius);
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color var(--transition-speed);
        }

        .button:hover {
            background-color: var(--button-hover-bg);
        }

        .error, .success {
            margin-bottom: 1rem;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Inscription</h1>
        <?php if (session()->getFlashdata('error')): ?>
            <p class="error"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <p class="success"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>
        <form action="<?= base_url('auth/register/post') ?>" method="post">
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit" class="button">Valider</button>
        </form>
    </div>
</body>
</html>
