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

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Takeaway List</h2>
        <a href="/takeaways/create" class="btn btn-primary">Add Takeaway</a>
    </div>

    <!-- Live Search Input -->
    <div class="mb-4">
        <input type="text" id="search" class="form-control" placeholder="Search by name or cuisine...">
    </div>

    <div class="row" id="takeawayContainer">
        <?php foreach ($takeaways as $takeaway): ?>
            <div class="col-md-6 col-lg-4 mb-4 takeaway-card">
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

        fetch('/takeaways/search?q=' + encodeURIComponent(query))
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
                                    <a href="/takeaways/${takeaway.id}" class="btn btn-sm btn-outline-primary">View</a>
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