<!DOCTYPE html>
<html>
<head>
    <title>Wolverhampton Takeaways</title>
</head>
<body>

<h1>Wolverhampton Takeaways</h1>

<a href="/takeaways/create">Add New Takeaway</a>

<hr>

<ul>
    <?php foreach ($takeaways as $takeaway): ?>
        <li>
            <strong><?= esc($takeaway['name']) ?></strong><br>
            Cuisine: <?= esc($takeaway['cuisine_type']) ?><br>
            Address: <?= esc($takeaway['address']) ?><br>
            Price Range: <?= esc($takeaway['price_range']) ?><br>
            Rating: <?= esc($takeaway['rating']) ?><br>

            <a href="/takeaways/<?= $takeaway['id'] ?>">View Details</a>
            |

            <form method="post" action="/takeaways/delete/<?= $takeaway['id'] ?>" style="display:inline;">
                <button type="submit" onclick="return confirm('Are you sure you want to delete this takeaway?');">
                    Delete
                </button>
            </form>

            <hr>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>