<!DOCTYPE html>
<html>
<head>
    <title><?= esc($takeaway['name']) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="/takeaways" class="navbar-brand">Wolverhampton Takeaways</a>
    </div>
</nav>

<div class="container mt-4">

    <!-- Takeaway Details -->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title"><?= esc($takeaway['name']) ?></h2>

            <p><strong>Cuisine:</strong> <?= esc($takeaway['cuisine_type']) ?></p>
            <p><strong>Address:</strong> <?= esc($takeaway['address']) ?></p>
            <p><strong>Price Range:</strong> <?= esc($takeaway['price_range']) ?></p>
            <p><strong>Rating:</strong> <?= esc($takeaway['rating']) ?></p>
            <p><strong>Description:</strong> <?= esc($takeaway['description']) ?></p>

            <a href="/takeaways" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <!-- Weather Section -->
    <div class="card">
        <div class="card-body">
            <h5>Current Weather in Wolverhampton</h5>
            <div id="weatherResult">Loading weather...</div>
        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Weather Fetch Script -->
<script>
const apiKey = "<?= esc($weatherApiKey) ?>";
const city = "Wolverhampton";

fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${apiKey}`)
    .then(response => response.json())
    .then(data => {

        const weatherDiv = document.getElementById("weatherResult");

        if (data.cod !== 200) {
            weatherDiv.innerHTML = "Weather data unavailable.";
            return;
        }

        weatherDiv.innerHTML = `
            <p>
                <strong>Temperature:</strong> ${data.main.temp}°C<br>
                <strong>Condition:</strong> ${data.weather[0].description}<br>
                <strong>Wind Speed:</strong> ${data.wind.speed} m/s
            </p>
        `;
    })
    .catch(() => {
        document.getElementById("weatherResult").innerHTML = "Error loading weather data.";
    });
</script>

</body>
</html>