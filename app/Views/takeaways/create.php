<!DOCTYPE html>
<html>
<head>
    <title>Add Takeaway</title>
</head>
<body>

<h1>Add New Takeaway</h1>

<form method="post" action="/takeaways/store">

    <label>Name</label><br>
    <input type="text" name="name" required><br><br>

    <label>Cuisine Type</label><br>
    <input type="text" name="cuisine_type" required><br><br>

    <label>Address</label><br>
    <input type="text" name="address" required><br><br>

    <label>Price Range</label><br>
    <input type="text" name="price_range" required><br><br>

    <label>Rating</label><br>
    <input type="number" step="0.1" name="rating" required><br><br>

    <label>Description</label><br>
    <textarea name="description" required></textarea><br><br>

    <button type="submit">Add Takeaway</button>

</form>

<a href="/takeaways">Back</a>

</body>
</html>