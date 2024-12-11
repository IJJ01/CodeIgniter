<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Transport Services</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
  <style>
    :root {
      --primary-color: #2a2e8f; /* Deep blue */
      --secondary-color: #ffffff; /* White */
      --accent-color: #f7f7f7; /* Light gray background */
      --button-hover: #1a1f5e; /* Darker blue for hover */
      --text-color: #333333; /* Text color */
      --shadow-color: rgba(0, 0, 0, 0.1); /* Subtle shadow */
      --border-radius: 12px; /* Rounded corners */
      --transition: 0.3s ease-in-out; /* Smooth transition */
    }

    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
      background-color: var(--primary-color);
      color: var(--text-color);
    }

    .container {
      max-width: 600px;
      margin: 3rem auto;
      padding: 2rem;
      background: var(--secondary-color);
      border-radius: var(--border-radius);
      box-shadow: 0 4px 8px var(--shadow-color);
    }

    h1 {
      text-align: center;
      color: var(--primary-color);
      font-size: 2rem;
      margin-bottom: 1.5rem;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    label {
      font-weight: 600;
      color: var(--text-color);
    }

    input,
    select {
      width: 100%;
      padding: 0.8rem;
      border: 1px solid #ccc;
      border-radius: var(--border-radius);
      font-size: 1rem;
      color: var(--text-color);
      background-color: var(--accent-color);
      transition: border-color var(--transition);
    }

    input:focus,
    select:focus {
      border-color: var(--primary-color);
      outline: none;
    }

    button {
      padding: 0.9rem 1.5rem;
      background-color: var(--primary-color);
      color: var(--secondary-color);
      border: none;
      border-radius: var(--border-radius);
      cursor: pointer;
      font-weight: bold;
      font-size: 1rem;
      transition: background-color var(--transition), transform var(--transition);
    }

    button:hover {
      background-color: var(--button-hover);
    }

    button:active {
      transform: translateY(1px);
    }
  </style>
</head>
<?php include(APPPATH . 'Views/partials/navbar.php'); ?>
<body>  
  <div class="container">
    <h1>Search Transport Services</h1>
    <form action="/client/search_results" method="POST">
      <div>
        <label for="location">Location</label>
        <input type="text" name="location" id="location" placeholder="Enter city">
      </div>

      <div>
        <label for="capacity_kg">Minimum Capacity (kg)</label>
        <input type="number" name="capacity_kg" id="capacity_kg" min="0" placeholder="e.g., 500">
      </div>

      <button type="submit">Search</button>
    </form>
  </div>

</body>
<?php include(APPPATH . 'Views/partials/footer.php'); ?>

</html>
