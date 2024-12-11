<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2a2e8f;
            --secondary-color: #ffffff;
            --input-bg: #f4f4f4;
            --border-color: #cccccc;
            --btn-bg: #3b3fbc;
            --btn-hover-bg: #2a2e8f;
            --font-color: #333333;
            --border-radius: 8px;
            --transition-speed: 0.3s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--primary-color);
            color: var(--font-color);
            line-height: 1.5;
            margin: 0;
        }

        .container {
            max-width: 600px;
            margin: 3rem auto;
            background-color: var(--secondary-color);
            padding: 2rem;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        label {
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            background-color: var(--input-bg);
            font-size: 1rem;
            color: var(--font-color);
            transition: border var(--transition-speed);
        }

        input:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        button {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: var(--border-radius);
            background-color: var(--btn-bg);
            color: var(--secondary-color);
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color var(--transition-speed);
        }

        button:hover {
            background-color: var(--btn-hover-bg);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Client</h1>
        <form action="/admin/update_client/<?= esc($client['id']) ?>" method="POST">
            <div>
                <label for="nom">First Name</label>
                <input type="text" name="nom" id="nom" value="<?= esc($client['nom']) ?>" required>
            </div>
            <div>
                <label for="prenom">Last Name</label>
                <input type="text" name="prenom" id="prenom" value="<?= esc($client['prenom']) ?>" required>
            </div>
            <div>
                <label for="age">Age</label>
                <input type="number" name="age" id="age" value="<?= esc($client['age']) ?>" required>
            </div>
            <div>
                <label for="ville">City</label>
                <input type="text" name="ville" id="ville" value="<?= esc($client['ville']) ?>" required>
            </div>
            <button type="submit">Update Client</button>
        </form>
    </div>
</body>

</html>
