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
        <span class="navbar-brand">Add New Takeaway</span>
    </div>
</nav>

<div class="container mt-4">

    <!-- Display validation errors -->
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="/takeaways/store">

        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control"
                   value="<?= old('name') ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Cuisine Type</label>
            <input type="text" name="cuisine_type" class="form-control"
                   value="<?= old('cuisine_type') ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control"
                   value="<?= old('address') ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Price Range</label>
            <input type="text" name="price_range" class="form-control"
                   value="<?= old('price_range') ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Rating (0 - 5)</label>
            <input type="number" step="0.1" min="0" max="5"
                   name="rating" class="form-control"
                   value="<?= old('rating') ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control"
                      rows="3" required><?= old('description') ?></textarea>
        </div>

        <button type="submit" class="btn btn-success">Save Takeaway</button>
        <a href="/takeaways" class="btn btn-secondary">Cancel</a>

    </form>

</div>

</body>
</html>