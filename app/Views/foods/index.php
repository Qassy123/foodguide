<!DOCTYPE html>
<html>
<head>
    <title>Food Guide</title>
</head>
<body>

<h1>Food Guide</h1>

<ul>
    <?php foreach ($foods as $food): ?>
        <li>
            <a href="/foods/<?= esc($food['name']) ?>">
                <?= esc($food['name']) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>