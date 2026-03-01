<!DOCTYPE html>
<html>
<head>
    <title>Wolverhampton Takeaways</title>
</head>
<body>

<h1>Wolverhampton Takeaways</h1>

<ul>
    <?php foreach ($takeaways as $takeaway): ?>
        <li>
            <strong><?= esc($takeaway['name']) ?></strong><br>
            Cuisine: <?= esc($takeaway['cuisine_type']) ?><br>
            Address: <?= esc($takeaway['address']) ?><br>
            Price Range: <?= esc($takeaway['price_range']) ?><br>
            Rating: <?= esc($takeaway['rating']) ?><br>
            <a href="/takeaways/<?= $takeaway['id'] ?>">View Details</a>
            <hr>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>