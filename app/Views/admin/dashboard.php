<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #2a2e8f; /* Dark blue used in other views */
      --secondary-color: #ffffff; /* White */
      --hover-color: #1a1f5e; /* Darker blue for hover */
      --accent-color: #1abc9c; /* Teal */
      --font-color: #333333; /* Dark gray */
      --highlight-color: #e74c3c; /* Bright red for emphasis */
      --card-bg: #ffffff; /* White card background */
      --sidebar-bg: #2a2e8f; /* Dark blue for sidebar */
      --border-radius: 8px; /* Rounded corners */
      --transition: 0.3s ease-in-out; /* Smooth transitions */
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
      display: flex;
      background-color: var(--secondary-color);
    }

    /* Sidebar Styles */
    .sidebar {
      position: sticky;
      top: 0;
      width: 250px;
      height: 100vh;
      background-color: var(--sidebar-bg);
      color: var(--secondary-color);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 1.5rem 1rem;
      overflow: auto;
    }

    .sidebar h2 {
      font-size: 1.5rem;
      margin-bottom: 2rem;
      text-align: center;
      color: var(--secondary-color);
      font-weight: 700;
    }

    .sidebar a {
      text-decoration: none;
      color: var(--secondary-color);
      padding: 0.8rem 1rem;
      border-radius: var(--border-radius);
      margin: 0.5rem 0;
      display: block;
      text-align: left;
      font-size: 1rem;
      font-weight: 500;
      transition: background-color var(--transition), transform var(--transition);
    }

    .sidebar a:hover {
      background-color: var(--hover-color);
      transform: scale(1.03); /* Slight hover effect */
    }

    .logout {
      background-color: var(--highlight-color);
      text-align: center;
      font-weight: 500;
      margin-top: auto;
    }

    .logout:hover {
      background-color: #c0392b; /* Darker red */
      transform: scale(1.03); /* Slight hover effect */
    }

    /* Content Styles */
    .content {
      flex: 1;
      padding: 2rem;
    }

    h1 {
      color: var(--primary-color);
      margin-bottom: 1rem;
      font-size: 2rem;
      font-weight: 700;
    }

    .charts {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      margin-top: 2rem;
    }

    .chart-card {
      flex: 1;
      background-color: var(--card-bg);
      border-radius: var(--border-radius);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 1.5rem;
      min-width: 300px;
    }

    .chart-card h3 {
      margin-bottom: 1rem;
      font-size: 1.2rem;
      color: var(--font-color);
      font-weight: 500;
    }
  </style>
</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <div>
      <h2>TransportHub</h2>
      <a href="/admin/dashboard">Dashboard</a>
      <a href="/admin/manage_clients">Manage Clients</a>
    </div>
    <a href="/logout" class="logout">Log Out</a>
  </div>

  <!-- Main Content -->
  <div class="content">
    <h1>Admin Dashboard</h1>
    <div class="charts">
      <div class="chart-card">
        <h3>Client Age Distribution</h3>
        <canvas id="clientAgeChart"></canvas>
      </div>
      <div class="chart-card">
        <h3>Transporter City Distribution</h3>
        <canvas id="transporterCityChart"></canvas>
      </div>
      <div class="chart-card">
        <h3>Request Tonnage Distribution</h3>
        <canvas id="tonnageChart"></canvas>
      </div>
    </div>
  </div>

  <script>
    // Dynamic data passed from the server
    const clientAges = <?= json_encode($clientAges) ?>;
    const transporterCities = <?= json_encode($transporterCities) ?>;
    const tonnageData = <?= json_encode($tonnageData) ?>;

    // Data Transformation for Charts
    const ageLabels = clientAges.map(d => d.age_range);
    const ageValues = clientAges.map(d => d.count);

    const cityLabels = transporterCities.map(d => d.city);
    const cityValues = transporterCities.map(d => d.count);

    const tonnageLabels = tonnageData.map(d => d.tonnage_range);
    const tonnageValues = tonnageData.map(d => d.count);

    // Updated Chart Color Palettes
    const colorPalette = ["#1abc9c", "#3498db", "#e74c3c", "#f1c40f", "#9b59b6"];

    // Chart Configurations
    new Chart(document.getElementById("clientAgeChart").getContext("2d"), {
      type: "pie",
      data: {
        labels: ageLabels,
        datasets: [{
          data: ageValues,
          backgroundColor: colorPalette,
        }]
      }
    });

    new Chart(document.getElementById("transporterCityChart").getContext("2d"), {
      type: "bar",
      data: {
        labels: cityLabels,
        datasets: [{
          label: "Transporters",
          data: cityValues,
          backgroundColor: "#3498db",
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });

    new Chart(document.getElementById("tonnageChart").getContext("2d"), {
      type: "bar",
      data: {
        labels: tonnageLabels,
        datasets: [{
          label: "Requests",
          data: tonnageValues,
          backgroundColor: "#e74c3c",
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  </script>
</body>

</html>
