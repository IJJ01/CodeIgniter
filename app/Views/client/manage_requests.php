<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Requests</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
  <style>
    :root {
      --primary-color: #2a2e8f; /* Deep blue */
      --secondary-color: #ffffff; /* White */
      --accent-color: #f7f7f7; /* Light gray */
      --highlight-color: #3b3fbc; /* Highlight blue */
      --danger-color: #d9534f; /* Red */
      --info-color: #5bc0de; /* Light blue */
      --shadow-color: rgba(0, 0, 0, 0.1); /* Shadow */
      --border-radius: 12px; /* Rounded corners */
      --transition: 0.3s ease; /* Smooth transitions */
      --card-bg: #ffffff;
      --card-shadow-hover: rgba(0, 0, 0, 0.15);
    }

    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
      background-color: var(--primary-color);
      color: #333;
    }

    .container {
      max-width: 1200px;
      margin: 3rem auto;
      padding: 1rem;
    }

    h1 {
      text-align: center;
      font-size: 2.5rem;
      color: white;
      margin-bottom: 2rem;
    }

    .card {
      background-color: var(--card-bg);
      border-radius: var(--border-radius);
      box-shadow: 0 4px 8px var(--shadow-color);
      padding: 1.5rem;
      margin-bottom: 1.5rem;
      transition: box-shadow var(--transition);
    }

    .card:hover {
      box-shadow: 0 8px 16px var(--card-shadow-hover);
    }

    .card-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1rem;
    }

    .card-header h2 {
      font-size: 1.5rem;
      color: var(--primary-color);
      margin: 0;
    }

    .card-body p {
      margin: 0.5rem 0;
      font-size: 1rem;
      color: #333;
    }

    .actions {
      display: flex;
      gap: 1rem;
      margin-top: 1rem;
    }

    .button {
      flex: 1;
      text-align: center;
      padding: 0.8rem;
      font-size: 1rem;
      font-weight: bold;
      border-radius: var(--border-radius);
      color: var(--secondary-color);
      background-color: var(--highlight-color);
      text-decoration: none;
      transition: background-color var(--transition), transform var(--transition);
    }

    .button:hover {
      background-color: #1a1f5e;
    }

    .btn-edit {
      background-color: var(--info-color);
    }

    .btn-edit:hover {
      background-color: #31b0d5;
    }

    .btn-delete {
      background-color: var(--danger-color);
      border: none;
    }

    .btn-delete:hover {
      background-color: #c9302c;
    }

    .empty-state {
      text-align: center;
      font-size: 1.5rem;
      color: #888;
      padding: 2rem;
      background-color: var(--card-bg);
      border-radius: var(--border-radius);
      box-shadow: 0 2px 6px var(--shadow-color);
    }

    .empty-state p {
      margin: 0;
      color: #555;
    }
  </style>
</head>

<body>
<?php include(APPPATH . 'Views/partials/navbar.php'); ?>  
<div class="container">
    <h1>Manage Your Transport Requests</h1>
    <?php if (!empty($requests)) : ?>
      <?php foreach ($requests as $request) : ?>
        <div class="card">
          <div class="card-header">
            <h2>Request #<?= esc($request['id']) ?></h2>
            <span><?= esc($request['status']) ?></span>
          </div>
          <div class="card-body">
            <p><strong>Type of Goods:</strong> <?= esc($request['type_de_marchandise']) ?></p>
            <p><strong>Weight (kg):</strong> <?= esc($request['tonnage']) ?></p>
            <p><strong>Pickup:</strong> <?= esc($request['ville_depart']) ?></p>
            <p><strong>Drop-off:</strong> <?= esc($request['ville_arriver']) ?></p>
          </div>
          <div class="actions">
            <a href="/client/request_details/<?= esc($request['id']) ?>" class="button">Details</a>
            <a href="/client/edit_request/<?= esc($request['id']) ?>" class="button btn-edit">Edit</a>
            <button onclick="deleteRequest(<?= esc($request['id']) ?>)" class="button btn-delete">Delete</button>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <div class="empty-state">
        <p>No transport requests found.</p>
      </div>
    <?php endif; ?>
  </div>
  <?php include(APPPATH . 'Views/partials/footer.php'); ?>
  <script>
    function deleteRequest(id) {
      if (confirm("Are you sure you want to delete this request?")) {
        window.location.href = "/client/delete_request/" + id;
      }
    }
  </script>
</body>

</html>
