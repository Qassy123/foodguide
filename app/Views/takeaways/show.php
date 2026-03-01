<!DOCTYPE html>
<html>
<head>
    <title><?= esc($takeaway['name']) ?></title>
</head>
<body>

<h1><?= esc($takeaway['name']) ?></h1>

<p><strong>Cuisine:</strong> <?= esc($takeaway['cuisine_type']) ?></p>
<p><strong>Address:</strong> <?= esc($takeaway['address']) ?></p>
<p><strong>Price Range:</strong> <?= esc($takeaway['price_range']) ?></p>
<p><strong>Rating:</strong> <?= esc($takeaway['rating']) ?></p>
<p><strong>Description:</strong> <?= esc($takeaway['description']) ?></p>

<a href="/takeaways">Back to list</a>

</body>
</html>