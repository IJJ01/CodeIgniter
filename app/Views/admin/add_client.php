<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Client</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
    <style>
        :root {
            --primary-color: #2a2e8f; /* Deep blue */
            --secondary-color: #ffffff; /* White */
            --input-bg: #f4f4f4; /* Light gray background for inputs */
            --border-color: #cccccc; /* Soft gray for borders */
            --button-bg: #3b3fbc; /* Slightly lighter blue for buttons */
            --button-hover-bg: #2a2e8f; /* Hover color for buttons */
            --font-color: #333333; /* Dark gray for text */
            --border-radius: 8px; /* Rounded elements */
            --transition-speed: 0.3s ease; /* Smooth transitions */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--primary-color);
            color: var(--font-color);
            line-height: 1.5;
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
            font-size: 1.8rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        label {
            font-weight: bold;
            margin-bottom: 0.5rem;
            display: block;
            color: var(--font-color);
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
            background-color: var(--button-bg);
            color: var(--secondary-color);
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color var(--transition-speed);
        }

        button:hover {
            background-color: var(--button-hover-bg);
        }

        .error-messages {
            color: red;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Add Client</h1>
        <form action="/admin/add_client" method="POST">
            <?php if (session()->get('errors')) : ?>
                <div class="error-messages">
                    <ul>
                        <?php foreach (session()->get('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div>
                <label for="nom">First Name</label>
                <input type="text" name="nom" id="nom" placeholder="Enter first name" required>
            </div>

            <div>
                <label for="prenom">Last Name</label>
                <input type="text" name="prenom" id="prenom" placeholder="Enter last name" required>
            </div>

            <div>
                <label for="age">Age</label>
                <input type="number" name="age" id="age" min="1" placeholder="Enter age" required>
            </div>

            <div>
                <label for="ville">City</label>
                <input type="text" name="ville" id="ville" placeholder="Enter city" required>
            </div>

            <div>
                <label for="numero_telephone">Phone Number</label>
                <input type="text" name="numero_telephone" id="numero_telephone" placeholder="Enter phone number" required>
            </div>

            <button type="submit">Add Client</button>
        </form>
    </div>
</body>

</html>
