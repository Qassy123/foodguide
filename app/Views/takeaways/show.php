<!DOCTYPE html>
<html>
<head>
    <title><?= esc($takeaway['name']) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Leaflet CSS for displaying the interactive map -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tDmiZyoHS5obTRR9BMY="
        crossorigin=""
    >

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

        /* Styles for the new takeaway location map */
        #takeawayMap {
            width: 100%;
            height: 400px;
            border-radius: 14px;
            overflow: hidden;
        }

        /* Styles for the new map loading and error message area */
        #mapStatus {
            margin-top: 12px;
            font-size: 0.95rem;
            color: #6c757d;
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

    <!-- New map section for showing the takeaway location -->
    <div class="card mt-4 p-3">
        <div class="card-body">
            <h5 class="mb-3">Takeaway Location Map</h5>

            <!-- New map container for rendering the interactive map -->
            <div id="takeawayMap"></div>

            <!-- New status area for map loading and geocoding messages -->
            <div id="mapStatus">Loading map location...</div>
        </div>
    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Leaflet JS for rendering the interactive map -->
<script
    src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""
></script>

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

<!-- New map script for geocoding the takeaway address and rendering the location -->
<script>
    // Store the takeaway name for the map marker popup.
    const takeawayName = "<?= esc($takeaway['name']) ?>";

    // Store the takeaway address for geocoding and map display.
    const takeawayAddress = "<?= esc($takeaway['address']) ?>";

    // Get the map status element for loading and error messages.
    const mapStatus = document.getElementById("mapStatus");

    // Create the Leaflet map with a default starting view.
    const takeawayMap = L.map('takeawayMap').setView([52.5862, -2.1280], 13);

    // Add OpenStreetMap tiles to display the base map.
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(takeawayMap);

    // Build the geocoding query using the takeaway address and Wolverhampton.
    const geocodeUrl = `https://nominatim.openstreetmap.org/search?format=json&limit=1&q=${encodeURIComponent(takeawayAddress + ', Wolverhampton')}`;

    // Request coordinates for the takeaway address from the Nominatim API.
    fetch(geocodeUrl, {
        headers: {
            'Accept': 'application/json'
        }
    })
        .then(response => response.json())
        .then(data => {
            // Check whether the geocoding API returned a valid location result.
            if (!data || data.length === 0) {
                mapStatus.innerHTML = "Map location unavailable for this address.";
                return;
            }

            // Extract the latitude from the geocoding result.
            const latitude = parseFloat(data[0].lat);

            // Extract the longitude from the geocoding result.
            const longitude = parseFloat(data[0].lon);

            // Move the map view to the geocoded takeaway location.
            takeawayMap.setView([latitude, longitude], 16);

            // Add a marker to the map for the takeaway location.
            L.marker([latitude, longitude])
                .addTo(takeawayMap)
                .bindPopup(`<strong>${takeawayName}</strong><br>${takeawayAddress}`)
                .openPopup();

            // Update the map status message after successful location loading.
            mapStatus.innerHTML = "Location loaded successfully.";
        })
        .catch(() => {
            // Show a fallback message if the map geocoding request fails.
            mapStatus.innerHTML = "Error loading map location.";
        });
</script>

</body>
</html>