<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Management</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">
  <style>
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background-color: var(--primary-color);
      color: var(--text-color);
    }

    .container {
      max-width: 1000px;
      margin: 2rem auto;
      background-color: var(--secondary-color);
      border-radius: var(--border-radius);
      box-shadow: 0 4px 8px var(--shadow-color);
      padding: 2rem;
      color: var(--primary-color);
    }

    h1 {
      text-align: center;
      margin-bottom: 1.5rem;
      font-size: 2rem;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 1.5rem;
    }

    table th, table td {
      padding: 1rem;
      border: 1px solid var(--primary-color);
      text-align: left;
      font-size: 0.95rem;
    }

    table th {
      background-color: var(--primary-color);
      color: var(--secondary-color);
      text-transform: uppercase;
    }

    table tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    button {
      padding: 0.5rem 1rem;
      border: none;
      border-radius: var(--border-radius);
      font-weight: bold;
      background-color: var(--primary-color);
      color: var(--secondary-color);
      cursor: pointer;
      font-size: 0.9rem;
      transition: background-color var(--transition);
    }

    button:hover {
      background-color: #3b3fbc;
    }

    .cancel-button {
      background-color: #d9534f; /* Red for cancel button */
    }

    .cancel-button:hover {
      background-color: #c9302c;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Manage Your Orders</h1>
    <table>
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Type of Goods</th>
          <th>Pickup</th>
          <th>Drop-off</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Example Row -->
        <tr>
          <td>101</td>
          <td>Fragile</td>
          <td>New York</td>
          <td>Los Angeles</td>
          <td>In Progress</td>
          <td>
            <button class="cancel-button" onclick="cancelOrder(101)">Cancel</button>
          </td>
        </tr>
        <tr>
          <td>102</td>
          <td>General</td>
          <td>Chicago</td>
          <td>Houston</td>
          <td>Completed</td>
          <td>--</td>
        </tr>
      </tbody>
    </table>
  </div>
  <script>
    function cancelOrder(orderId) {
      if (confirm("Are you sure you want to cancel this order?")) {
        console.log("Order " + orderId + " cancelled.");
        alert("Order " + orderId + " has been cancelled.");
        
      }
    }
  </script>
</body>
</html>
