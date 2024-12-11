<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.js -->
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      display: flex;
      background-color: #f5f5f5;
    }

    .sidebar {
      width: 250px;
      height: 100vh;
      background-color: #2a2e8f;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 1rem;
    }

    .sidebar a {
      text-decoration: none;
      color: #fff;
      padding: 1rem;
      border-radius: 8px;
      margin: 0.5rem 0;
      display: block;
      text-align: center;
      transition: background-color 0.3s;
    }

    .sidebar a:hover {
      background-color: #3b3fbc;
    }

    .logout {
      margin-top: auto;
      background-color: #d9534f;
    }

    .logout:hover {
      background-color: #c9302c;
    }

    .content {
      flex: 1;
      padding: 2rem;
    }

    h1 {
      color: #2a2e8f;
    }

    .charts {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      margin-top: 2rem;
    }

    .chart {
      flex: 1;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 1.5rem;
      min-width: 300px;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <div>
      <a href="/admin/dashboard">Dashboard</a>
      <a href="/admin/manage_clients">Manage Clients</a>
      <a href="/admin/manage_transporters">Manage Transporters</a>
    </div>
    <a href="/logout" class="logout">Log Out</a>
  </div>

  <!-- Main Content -->
  <div class="content">
    <h1>Admin Dashboard</h1>
    <div class="charts">
      <div class="chart">
        <h3>Client Age Distribution</h3>
        <canvas id="clientAgeChart"></canvas>
      </div>
      <div class="chart">
        <h3>Transporter City Distribution</h3>
        <canvas id="transporterCityChart"></canvas>
      </div>
      <div class="chart">
        <h3>Request Tonnage Distribution</h3>
        <canvas id="tonnageChart"></canvas>
      </div>
    </div>
  </div>

  <script>
    // Data fetched dynamically from the database
    const clientAgeData = <?= json_encode($clientAges) ?>.map(item => ({
        label: item.age_range,
        value: item.count
    }));

    const transporterCityData = <?= json_encode($transporterCities) ?>.map(item => ({
        label: item.city,
        value: item.count
    }));

    const tonnageData = <?= json_encode($tonnageData) ?>.map(item => ({
        label: item.tonnage_range,
        value: item.count
    }));

    // Prepare data for charts
    const clientAgeChartData = {
        labels: clientAgeData.map(d => d.label),
        datasets: [{
            data: clientAgeData.map(d => d.value),
            backgroundColor: ["#3b3fbc", "#28a745", "#f7c331", "#d9534f"]
        }]
    };

    const transporterCityChartData = {
        labels: transporterCityData.map(d => d.label),
        datasets: [{
            label: "Transporters",
            data: transporterCityData.map(d => d.value),
            backgroundColor: "#28a745"
        }]
    };

    const tonnageChartData = {
        labels: tonnageData.map(d => d.label),
        datasets: [{
            label: "Requests",
            data: tonnageData.map(d => d.value),
            backgroundColor: "#d9534f"
        }]
    };

    // Create Charts
    new Chart(document.getElementById("clientAgeChart").getContext("2d"), {
        type: "pie",
        data: clientAgeChartData
    });

    new Chart(document.getElementById("transporterCityChart").getContext("2d"), {
        type: "bar",
        data: transporterCityChartData,
        options: {
          scales: {
            y: { beginAtZero: true }
          }
        }
    });

    new Chart(document.getElementById("tonnageChart").getContext("2d"), {
        type: "bar",
        data: tonnageChartData,
        options: {
          scales: {
            y: { beginAtZero: true }
          }
        }
    });
  </script>
</body>
</html>
