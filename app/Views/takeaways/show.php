<!DOCTYPE html>
<html>
<head>
    <title><?= esc($takeaway['name']) ?></title>
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

        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 8px 22px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 32px rgba(0,0,0,0.15);
        }

        .card-title {
            font-weight: 600;
            margin-bottom: 20px;
        }

        .detail-label {
            font-weight: 600;
            color: #495057;
        }

        .btn-secondary {
            border-radius: 25px;
            padding: 6px 18px;
        }

        .weather-card {
            background: linear-gradient(135deg, #1f2937, #111827);
            color: white;
        }

        .weather-card h5 {
            font-weight: 600;
            margin-bottom: 15px;
        }

        #weatherResult {
            font-size: 1rem;
        }

        .weather-highlight {
            font-size: 1.2rem;
            font-weight: 600;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="<?= site_url('takeaways') ?>" class="navbar-brand">
            🍔 Wolverhampton Takeaways
        </a>
    </div>
</nav>

<div class="container mt-5">

    <!-- Takeaway Details -->
    <div class="card mb-4 p-3">
        <div class="card-body">
            <h2 class="card-title"><?= esc($takeaway['name']) ?></h2>

            <p><span class="detail-label">Cuisine:</span> <?= esc($takeaway['cuisine_type']) ?></p>
            <p><span class="detail-label">Address:</span> <?= esc($takeaway['address']) ?></p>
            <p><span class="detail-label">Price Range:</span> <?= esc($takeaway['price_range']) ?></p>
            <p><span class="detail-label">Rating:</span> <?= esc($takeaway['rating']) ?></p>
            <p><span class="detail-label">Description:</span> <?= esc($takeaway['description']) ?></p>

            <a href="<?= site_url('takeaways') ?>" class="btn btn-secondary mt-3">
                ← Back to List
            </a>
        </div>
    </div>

    <!-- Weather Section -->
    <div class="card weather-card p-3">
        <div class="card-body">
            <h5>🌤 Current Weather in Wolverhampton</h5>
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
            <p class="weather-highlight">
                ${data.main.temp}°C — ${data.weather[0].description}
            </p>
            <p>
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