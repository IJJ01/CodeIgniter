<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Results</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
  <style>
    :root {
      --primary-color: #2a2e8f; /* Deep blue */
      --secondary-color: #ffffff; /* White */
      --accent-color: #f7f7f7; /* Light gray */
      --text-color: #333333; /* Dark gray for text */
      --table-header-bg: #3b3fbc; /* Table header color */
      --table-border-color: #ddd; /* Table border color */
      --btn-bg: #2a2e8f; /* Button background color */
      --btn-hover-bg: #1a1f5e; /* Button hover color */
      --border-radius: 8px; /* Rounded corners */
      --transition-speed: 0.3s ease; /* Smooth transitions */
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--accent-color);
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
      font-size: 1.8rem;
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
      background-color: var(--accent-color);
    }

    table tr:hover {
      background-color: #e0e0e0;
    }

    .no-results {
      text-align: center;
      color: var(--text-color);
      margin: 2rem 0;
      font-size: 1.2rem;
    }

    .btn {
      display: inline-block;
      margin-top: 1rem;
      padding: 0.8rem 1.5rem;
      background-color: var(--btn-bg);
      color: var(--secondary-color);
      text-decoration: none;
      font-size: 1rem;
      font-weight: bold;
      text-align: center;
      border-radius: var(--border-radius);
      transition: background-color var(--transition-speed);
    }

    .btn:hover {
      background-color: var(--btn-hover-bg);
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Search Results</h1>
    <?php if (!empty($results)) : ?>
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Capacity (kg)</th>
            <th>Contact Info</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($results as $result) : ?>
            <tr>
              <td><?= esc($result['name']) ?></td>
              <td><?= esc($result['location']) ?></td>
              <td><?= esc($result['capacity_kg']) ?></td>
              <td><?= esc($result['contact_info']) ?></td>
              <td><?= esc($result['description']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php else : ?>
      <p class="no-results">No transporters match your search criteria.</p>
    <?php endif; ?>
    <a href="/client/search_services" class="btn">Back to Search</a>
  </div>
</body>
</html>
