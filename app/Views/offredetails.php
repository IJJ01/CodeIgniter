<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offer Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .details-card {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
        }

        .book-btn {
            background-color: #007bff;
            color: white;
            border-radius: 20px;
            padding: 10px 30px;
            font-weight: bold;
        }
    </style>
    <link href="<?= base_url('css/common.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/sidebar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/topbar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/card.css') ?>">

</head>

<body>
    <?= $this->include('Views/sidebar.php'); ?>
    <?= $this->include('Views/topbar.php'); ?>

    <div class="content">
        <div class="details-card">
            <h3>Offer Details</h3>
            <hr>
            <p><strong>Driver Name:</strong> John Doe</p>
            <p><strong>Vehicle Type:</strong> Freight Truck</p>
            <p><strong>Capacity:</strong> 10 Tons</p>
            <p><strong>Price:</strong> $500</p>
            <p><strong>Available Dates:</strong> 01 Dec 2024 - 10 Dec 2024</p>
            <p><strong>Description:</strong> Reliable transport for large shipments. Fully insured and on-time delivery
                guaranteed.</p>
            <div class="text-center mt-4">
                <button class="book-btn">Book</button>
            </div>
        </div>
    </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>