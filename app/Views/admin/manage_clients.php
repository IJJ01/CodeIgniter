<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Clients</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2a2e8f;
            --secondary-color: #ffffff;
            --hover-color: #1a1f5e;
            --font-color: #333333;
            --table-header-bg: #3b3fbc;
            --table-border-color: #ddd;
            --btn-bg: #28a745;
            --btn-hover-bg: #218838;
            --btn-danger-bg: #dc3545;
            --btn-danger-hover-bg: #c82333;
            --btn-secondary-bg: #6c757d;
            --btn-secondary-hover-bg: #5a6268;
            --border-radius: 8px;
            --transition-speed: 0.3s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--secondary-color);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            background: var(--secondary-color);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 1.5rem 0;
        }

        table th,
        table td {
            padding: 1rem;
            text-align: left;
            border: 1px solid var(--table-border-color);
        }

        table th {
            background-color: var(--table-header-bg);
            color: var(--secondary-color);
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #e9ecef;
        }

        .actions {
            display: flex;
            gap: 0.5rem;
        }

        .button {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            font-weight: bold;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: background-color var(--transition-speed);
        }

        .btn-edit {
            background-color: var(--btn-bg);
            color: var(--secondary-color);
        }

        .btn-edit:hover {
            background-color: var(--btn-hover-bg);
        }

        .btn-delete {
            background-color: var(--btn-danger-bg);
            color: var(--secondary-color);
        }

        .btn-delete:hover {
            background-color: var(--btn-danger-hover-bg);
        }

        .bottom-buttons {
            padding: 1rem 1.5rem;
            margin-top: 2rem;
            display: flex;
            justify-content: left;
            gap: 2rem;
        }

        .btn-add {
            background-color: var(--primary-color);
            color: var(--secondary-color);
        }

        .btn-add:hover {
            background-color: var(--hover-color);
        }

        .btn-back {
            background-color: var(--btn-secondary-bg);
            color: var(--secondary-color);
        }

        .btn-back:hover {
            background-color: var(--btn-secondary-hover-bg);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Manage Clients</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($clients)): ?>
                    <?php foreach ($clients as $client): ?>
                        <tr>
                            <td><?= esc($client['id']) ?></td>
                            <td><?= esc($client['nom']) ?></td>
                            <td><?= esc($client['prenom']) ?></td>
                            <td><?= esc($client['age']) ?></td>
                            <td><?= esc($client['ville']) ?></td>
                            <td>
                                <div class="actions">
                                    <a href="/admin/edit_client/<?= esc($client['id']) ?>" class="button btn-edit">Edit</a>
                                    <a href="/admin/delete_client/<?= esc($client['id']) ?>" class="button btn-delete"
                                        onclick="return confirm('Are you sure you want to delete this client?');">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align: center;">No clients found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="bottom-buttons">
            <a href="/admin/add_client" class="button btn-add">Add Client</a>
            <a href="/admin/dashboard" class="button btn-back">Go Back</a>
        </div>
    </div>
</body>

</html>