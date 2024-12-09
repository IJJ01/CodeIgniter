<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Home - TransportHub</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <!-- Custom CSS -->

    <link rel="stylesheet" href="<?= base_url('css/common.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/sidebar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/topbar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/card.css') ?>">


</head>

<body>
    <?= $this->include('Views/sidebar.php'); ?>
    <?= $this->include('Views/topbar.php'); ?>

    <div class="content">
        <h1>Available Offers</h1>
        <div class="row g-4">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Offer #1</h5>
                        <p class="card-text">Driver: John Doe</p>
                        <p class="card-text">Vehicle: Truck</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Offer #2</h5>
                        <p class="card-text">Driver: Jane Smith</p>
                        <p class="card-text">Vehicle: Van</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Offer #3</h5>
                        <p class="card-text">Driver: Ahmed Ali</p>
                        <p class="card-text">Vehicle: Pickup</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>