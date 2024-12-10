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

        <h1>Available Offers</h1>
       
        <?php foreach ($transporters as $transporter): ?>
    <div class="card">
        <div class="card-body">
            <h5><?= esc($transporter['person_id']) ?></h5>
            <a href="/transporter/<?= esc($transporter['id']) ?>" class="btn btn-primary">View Details</a>
        </div>
    </div>
<?php endforeach; ?>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>