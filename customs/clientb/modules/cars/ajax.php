<h1>Voitures Client B</h1>

<?php
$client = "clientb";

$carsPath = "../../../../data/cars.json";
$carsData = json_decode(file_get_contents($carsPath), true);

$garagesPath = "../../../../data/garages.json";
$garagesData = json_decode(file_get_contents($garagesPath), true);

$garageNames = [];
foreach ($garagesData as $garage) {
    $garageNames[$garage['id']] = $garage['title'];
}

$cars = array_filter($carsData, function($car) use ($client) {
    return $car["customer"] === $client;
});

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Nom</th><th>Marque</th><th>Garage</th></tr>";

foreach ($cars as $car) {
    $modelName = strtolower($car['modelName']);
    $brand = $car['brand'];
    $garageId = $car['garageId'];
    $garageName = isset($garageNames[$garageId]) ? $garageNames[$garageId] : "Garage inconnu";

    echo "<tr class='car-row' data-car-id='{$car['id']}'>";
    echo "<td>{$modelName}</td>";
    echo "<td>{$brand}</td>";
    echo "<td>{$garageName}</td>";
    echo "</tr>";
}

echo "</table>";
echo "<br><br>";
?>