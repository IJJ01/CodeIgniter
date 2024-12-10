<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Request Details</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
  <style>
    :root {
      --primary-color: #2a2e8f; /* Deep blue */
      --secondary-color: #ffffff; /* White */
      --accent-color: #f7f7f7; /* Light gray */
      --text-color: #333333; /* Dark gray */
      --highlight-color: #3b3fbc; /* Highlight blue */
      --success-color: #28a745; /* Green */
      --success-hover: #218838; /* Darker green */
      --shadow-color: rgba(0, 0, 0, 0.1); /* Shadow color */
      --border-radius: 8px; /* Rounded corners */
      --transition: 0.3s ease; /* Smooth transitions */
    }

    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 0;
      background-color: var(--accent-color);
      color: var(--text-color);
    }

    .container {
      max-width: 800px;
      margin: 3rem auto;
      padding: 2rem;
      background-color: var(--secondary-color);
      border-radius: var(--border-radius);
      box-shadow: 0 4px 8px var(--shadow-color);
    }

    h1 {
      text-align: center;
      margin-bottom: 2rem;
      font-size: 2rem;
      color: var(--primary-color);
    }

    .details {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    .detail {
      display: flex;
      justify-content: space-between;
      font-size: 1.1rem;
      padding: 1rem;
      border-radius: var(--border-radius);
      background-color: var(--accent-color);
      box-shadow: 0 2px 4px var(--shadow-color);
    }

    .detail span {
      font-weight: bold;
      color: var(--highlight-color);
    }

    .actions {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-top: 2rem;
    }

    .button {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 160px; /* Same width for all buttons */
      padding: 0.8rem 1rem;
      border-radius: var(--border-radius);
      font-size: 1rem;
      text-decoration: none;
      font-weight: bold;
      color: var(--secondary-color);
      background-color: var(--highlight-color);
      transition: background-color var(--transition);
      cursor: pointer;
      gap: 0.5rem;
    }

    .button:hover {
      background-color: var(--primary-color);
    }

    .btn-download {
      background-color: var(--success-color);
    }

    .btn-download:hover {
      background-color: var(--success-hover);
    }

    .icon {
      width: 20px;
      height: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Request Details</h1>
    <div class="details">
      <div class="detail">
        <span>ID:</span> <?= esc($request['id']) ?>
      </div>
      <div class="detail">
        <span>Type of Goods:</span> <?= esc($request['type_de_marchandise']) ?>
      </div>
      <div class="detail">
        <span>Weight (kg):</span> <?= esc($request['tonnage']) ?>
      </div>
      <div class="detail">
        <span>Pickup Location:</span> <?= esc($request['ville_depart']) ?>
      </div>
      <div class="detail">
        <span>Drop-off Location:</span> <?= esc($request['ville_arriver']) ?>
      </div>
      <div class="detail">
        <span>Status:</span> <?= esc($request['status']) ?>
      </div>
      <div class="detail">
        <span>Additional Comments:</span> <?= esc($request['commentaire']) ?>
      </div>
    </div>

    <div class="actions">
      <a href="/client/manage_requests" class="button">
        Back to requests
      </a>
      <a href="/client/request_pdf/<?= esc($request['id']) ?>" class="button btn-download">
      <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a1 1 0 00-1 1v6H7.414a1 1 0 00-.707 1.707l4.293 4.293a1 1 0 001.414 0l4.293-4.293a1 1 0 00-.707-1.707H13V5a1 1 0 00-1-1h-1z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 20h16a2 2 0 002-2v-2a1 1 0 00-1-1H3a1 1 0 00-1 1v2a2 2 0 002 2z" />
        </svg>
        
        Save as PDF
      </a>
    </div>
  </div>
</body>

</html>
