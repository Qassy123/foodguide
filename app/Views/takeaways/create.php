<!DOCTYPE html>
<html>
<head>
    <title>Add Takeaway</title>
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
            <h2 class="mb-4">Add New Takeaway</h2>

            <form method="post" action="/takeaways/store">

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cuisine Type</label>
                    <input type="text" name="cuisine_type" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price Range</label>
                    <input type="text" name="price_range" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Rating</label>
                    <input type="number" step="0.1" name="rating" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Add Takeaway</button>
                <a href="/takeaways" class="btn btn-secondary">Cancel</a>

            </form>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>