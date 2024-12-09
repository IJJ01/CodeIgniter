<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Offers</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .offer-card {
            background-color: #f8f9fa;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .pending-btn {
            background-color: #ffc107;
            color: white;
            border-radius: 20px;
            padding: 10px 30px;
            font-weight: bold;
        }
        .view-btn {
            background-color: #007bff;
            color: white;
            border-radius: 20px;
            padding: 10px 30px;
            font-weight: bold;
        }
    </style>
    <link href="<?= base_url('css/common.css') ?>" rel="stylesheet">
</head>
<body>

<?= $this->include('Views/sidebar.php'); ?>
<?= $this->include('Views/topbar.php'); ?>

<div class="content">
    <h1>My Offers</h1>
    <div class="row">
        <!-- Example of an offer card -->
        <div class="col-md-4">
            <div class="offer-card">
                <h5>Offer #1</h5>
                <p><strong>Driver:</strong> John Doe</p>
                <p><strong>Vehicle Type:</strong> Freight Truck</p>
                <p><strong>Status:</strong> Pending</p>
                <div class="text-center mt-4">
                    <button class="pending-btn">Pending</button>
                    <button class="view-btn mt-2">View Details</button>
                </div>
            </div>
        </div>
        <!-- Repeat for more offers -->
        <div class="col-md-4">
            <div class="offer-card">
                <h5>Offer #2</h5>
                <p><strong>Driver:</strong> Jane Smith</p>
                <p><strong>Vehicle Type:</strong> Delivery Van</p>
                <p><strong>Status:</strong> Pending</p>
                <div class="text-center mt-4">
                    <button class="pending-btn">Pending</button>
                    <button class="view-btn mt-2">View Details</button>
                </div>
            </div>
        </div>
        <!-- Add more cards dynamically if needed -->
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
