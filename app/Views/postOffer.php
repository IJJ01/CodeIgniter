<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post an Offer</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 700px;
            margin: auto;
            margin-top: 50px;
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .submit-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 20px;
        }
        .submit-btn:hover {
            background-color: #0056b3;
        }
        .cancel-btn {
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="form-title">Post an Offer</h1>
        <form action="/offer/submit" method="POST">
            <!-- CSRF Field -->
            <?= csrf_field(); ?>

            <!-- Load Description -->
            <div class="mb-3">
                <label for="load" class="form-label">Load Description</label>
                <textarea class="form-control" id="load" name="load" rows="3" placeholder="Describe the load (e.g., Electronics, Furniture)" required></textarea>
            </div>

            <!-- Pickup Location -->
            <div class="mb-3">
                <label for="pickup" class="form-label">Pickup Location</label>
                <input type="text" class="form-control" id="pickup" name="pickup" placeholder="Enter the pickup location" required>
            </div>

            <!-- Delivery Location -->
            <div class="mb-3">
                <label for="delivery" class="form-label">Delivery Location</label>
                <input type="text" class="form-control" id="delivery" name="delivery" placeholder="Enter the delivery location" required>
            </div>

            <!-- Preferred Date -->
            <div class="mb-3">
                <label for="date" class="form-label">Preferred Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <!-- Weight or Volume -->
            <div class="mb-3">
                <label for="weight" class="form-label">Weight/Volume</label>
                <input type="text" class="form-control" id="weight" name="weight" placeholder="Enter the weight or volume (e.g., 5 tons)" required>
            </div>

            <!-- Submit and Cancel Buttons -->
            <div class="text-center">
                <button type="submit" class="btn submit-btn">Submit Offer</button>
                <a href="/home" class="btn btn-link cancel-btn">Cancel</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
