<!DOCTYPE html>
<html>
<head>
    <title>Wolverhampton Takeaways</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand mb-0 h1">Wolverhampton Takeaways</span>
    </div>
</nav>

<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h2>Takeaway List</h2>
        <a href="/takeaways/create" class="btn btn-primary">Add Takeaway</a>
    </div>

    <div class="row">
        <?php foreach ($takeaways as $takeaway): ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($takeaway['name']) ?></h5>
                        <p class="card-text">
                            <strong>Cuisine:</strong> <?= esc($takeaway['cuisine_type']) ?><br>
                            <strong>Address:</strong> <?= esc($takeaway['address']) ?><br>
                            <strong>Price:</strong> <?= esc($takeaway['price_range']) ?><br>
                            <strong>Rating:</strong> <?= esc($takeaway['rating']) ?>
                        </p>
                        <a href="/takeaways/<?= $takeaway['id'] ?>" class="btn btn-sm btn-outline-primary">View</a>

                        <form method="post" action="/takeaways/delete/<?= $takeaway['id'] ?>" class="d-inline">
                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Are you sure you want to delete this takeaway?');">
                                Delete
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>