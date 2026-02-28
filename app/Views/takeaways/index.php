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
            <a href="/takeaways/<?= $takeaway['id'] ?>">
                <?= esc($takeaway['name']) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>