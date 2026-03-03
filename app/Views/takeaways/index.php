<!DOCTYPE html>
<html>
<head>
    <title>Wolverhampton Takeaways</title>
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

        h2 {
            font-weight: 600;
            margin-bottom: 0;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 28px rgba(0,0,0,0.15);
        }

        .card-title {
            font-weight: 600;
        }

        .btn-primary {
            border-radius: 25px;
            padding: 6px 20px;
            font-weight: 500;
        }

        .btn-outline-primary,
        .btn-outline-danger {
            border-radius: 20px;
            padding: 4px 14px;
        }

        #search {
            border-radius: 30px;
            padding: 12px 20px;
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        #search:focus {
            box-shadow: 0 6px 18px rgba(0,0,0,0.15);
        }

        #noResults {
            font-style: italic;
            font-size: 1.05rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand mb-0 h1">🍔 Wolverhampton Takeaways</span>
    </div>
</nav>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Takeaway List</h2>
        <a href="<?= site_url('takeaways/create') ?>" class="btn btn-primary shadow-sm">
            + Add Takeaway
        </a>
    </div>

    <!-- Live Search Input -->
    <div class="mb-5">
        <input type="text" id="search" class="form-control" placeholder="🔍 Search by name or cuisine...">
    </div>

    <div class="row" id="takeawayContainer">
        <?php foreach ($takeaways as $takeaway): ?>
            <div class="col-md-6 col-lg-4 mb-4 takeaway-card">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($takeaway['name']) ?></h5>
                        <p class="card-text mb-3">
                            <strong>Cuisine:</strong> <?= esc($takeaway['cuisine_type']) ?><br>
                            <strong>Address:</strong> <?= esc($takeaway['address']) ?><br>
                            <strong>Price:</strong> <?= esc($takeaway['price_range']) ?><br>
                            <strong>Rating:</strong> <?= esc($takeaway['rating']) ?>
                        </p>

                        <a href="<?= site_url('takeaways/' . $takeaway['id']) ?>"
                           class="btn btn-sm btn-outline-primary me-2">View</a>

                        <form method="post"
                              action="<?= site_url('takeaways/delete/' . $takeaway['id']) ?>"
                              class="d-inline">
                            <?= csrf_field() ?>
                            <button type="submit"
                                    class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Are you sure you want to delete this takeaway?');">
                                Delete
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- No results message -->
    <div id="noResults" class="text-center mt-4 text-muted" style="display:none;">
        No takeaways found.
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Fetch Live Search with Debounce -->
<script>
let timeout = null;

document.getElementById('search').addEventListener('keyup', function () {

    clearTimeout(timeout);

    timeout = setTimeout(() => {

        const query = this.value.trim();

        fetch("<?= site_url('takeaways/search') ?>?q=" + encodeURIComponent(query))
            .then(response => response.json())
            .then(data => {

                const container = document.getElementById('takeawayContainer');
                const noResults = document.getElementById('noResults');

                container.innerHTML = '';

                if (data.length === 0) {
                    noResults.style.display = 'block';
                    return;
                }

                noResults.style.display = 'none';

                data.forEach(function (takeaway) {

                    container.innerHTML += `
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">${takeaway.name}</h5>
                                    <p>
                                        <strong>Cuisine:</strong> ${takeaway.cuisine_type}<br>
                                        <strong>Address:</strong> ${takeaway.address}<br>
                                        <strong>Price:</strong> ${takeaway.price_range}<br>
                                        <strong>Rating:</strong> ${takeaway.rating}
                                    </p>
                                    <a href="<?= site_url('takeaways') ?>/${takeaway.id}"
                                       class="btn btn-sm btn-outline-primary">View</a>
                                </div>
                            </div>
                        </div>
                    `;
                });

            })
            .catch(() => {
                console.error('Search error');
            });

    }, 300);

});
</script>

</body>
</html>