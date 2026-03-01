<!DOCTYPE html>
<html>
<head>
    <title><?= esc($takeaway['name']) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="/takeaways" class="navbar-brand">Wolverhampton Takeaways</a>
    </div>
</nav>

<div class="container mt-4">

    <div class="card">
        <div class="card-body">
            <h2 class="card-title"><?= esc($takeaway['name']) ?></h2>

            <p><strong>Cuisine:</strong> <?= esc($takeaway['cuisine_type']) ?></p>
            <p><strong>Address:</strong> <?= esc($takeaway['address']) ?></p>
            <p><strong>Price Range:</strong> <?= esc($takeaway['price_range']) ?></p>
            <p><strong>Rating:</strong> <?= esc($takeaway['rating']) ?></p>
            <p><strong>Description:</strong> <?= esc($takeaway['description']) ?></p>

            <a href="/takeaways" class="btn btn-secondary">Back</a>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>