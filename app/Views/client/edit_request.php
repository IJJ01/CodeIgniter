<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Transport Request</title>
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

    input, select, textarea {
      width: 100%;
      padding: 0.8rem;
      border: 1px solid var(--border-color);
      border-radius: var(--border-radius);
      background-color: var(--input-bg);
      font-size: 1rem;
      color: var(--font-color);
      transition: border var(--transition-speed);
    }

    input:focus, select:focus, textarea:focus {
      border-color: var(--primary-color);
      outline: none;
    }

    textarea {
      resize: none;
      height: 100px;
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
  </style>
</head>
<body>
  <div class="container">
    <h1>Edit Transport Request</h1>
    <form action="/client/update_request/<?= esc($request['id']) ?>" method="POST">
      <div>
        <label for="type">Type of Goods</label>
        <select name="type_de_marchandise" id="type" required>
          <option value="Fragile" <?= $request['type_de_marchandise'] === 'Fragile' ? 'selected' : '' ?>>Fragile</option>
          <option value="Perishable" <?= $request['type_de_marchandise'] === 'Perishable' ? 'selected' : '' ?>>Perishable</option>
          <option value="General" <?= $request['type_de_marchandise'] === 'General' ? 'selected' : '' ?>>General</option>
        </select>
      </div>

      <div>
        <label for="weight">Weight (in kg)</label>
        <input type="number" name="tonnage" id="weight" value="<?= esc($request['tonnage']) ?>" min="1" required>
      </div>

      <div>
        <label for="pickup">Pickup Location</label>
        <input type="text" name="ville_depart" id="pickup" value="<?= esc($request['ville_depart']) ?>" placeholder="Enter pickup location" required>
      </div>

      <div>
        <label for="dropoff">Drop-off Location</label>
        <input type="text" name="ville_arriver" id="dropoff" value="<?= esc($request['ville_arriver']) ?>" placeholder="Enter drop-off location" required>
      </div>

      <div>
        <label for="comments">Additional Comments</label>
        <textarea name="commentaire" id="comments" placeholder="Enter any special requirements" required><?= esc($request['commentaire']) ?></textarea>
      </div>

      <button type="submit">Update Request</button>
    </form>
  </div>
</body>
</html>
