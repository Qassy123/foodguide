<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= esc($title) ?></title>
</head>
<body>
    <h1><?= esc($title) ?></h1>

    <ul>
        <?php foreach ($foods as $food): ?>
            <li><?= esc($food) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>