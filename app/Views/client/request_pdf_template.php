<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #2a2e8f;
            text-align: center;
        }
        .details {
            margin: 20px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .details div {
            margin-bottom: 10px;
        }
        .details div span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Request Details</h1>
    <div class="details">
        <div><span>ID:</span> <?= esc($request['id']) ?></div>
        <div><span>Type of Goods:</span> <?= esc($request['type_de_marchandise']) ?></div>
        <div><span>Weight (kg):</span> <?= esc($request['tonnage']) ?></div>
        <div><span>Pickup Location:</span> <?= esc($request['ville_depart']) ?></div>
        <div><span>Drop-off Location:</span> <?= esc($request['ville_arriver']) ?></div>
        <div><span>Date:</span> <?= esc($request['date']) ?></div>
        <div><span>Status:</span> <?= esc($request['status']) ?></div>
        <div><span>Comments:</span> <?= esc($request['commentaire']) ?></div>
    </div>
</body>
</html>
