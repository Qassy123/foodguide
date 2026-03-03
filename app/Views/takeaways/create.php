<!DOCTYPE html>
<html>
<head>
    <title>Add Takeaway</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f4f7fb, #e8eef7);
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        }

        .navbar-brand {
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .form-card {
            max-width: 650px;
            margin: 0 auto;
            border: none;
            border-radius: 18px;
            box-shadow: 0 10px 28px rgba(0,0,0,0.08);
        }

        .form-card h2 {
            font-weight: 600;
            margin-bottom: 25px;
        }

        .form-control {
            border-radius: 12px;
            padding: 10px 14px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        .form-control:focus {
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .btn-success,
        .btn-secondary {
            border-radius: 25px;
            padding: 6px 20px;
        }

        .alert {
            border-radius: 12px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="<?= site_url('takeaways') ?>" class="navbar-brand">
            🍔 Wolverhampton Takeaways
        </a>
    </div>
</nav>

<div class="container mt-5">

    <div class="card form-card p-4">
        <div class="card-body">

            <h2>Add New Takeaway</h2>

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

            <form method="post" action="<?= site_url('takeaways/store') ?>">

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

                <div class="mb-4">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control"
                              rows="3" required><?= old('description') ?></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">
                        Save Takeaway
                    </button>
                    <a href="<?= site_url('takeaways') ?>" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

</body>
</html>