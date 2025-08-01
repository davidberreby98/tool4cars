<h1>Voitures Client A</h1>

<?php
$client = "clienta";

$data = json_decode(file_get_contents("../../../../data/cars.json"), true);

function calculateAge($timestamp) {
    $year = date("Y", $timestamp);
    return date("Y") - $year;
}

$cars = array_filter($data, function($car) use ($client) {
    return $car["customer"] === $client;
});

function formatYear($timestamp) {
    return date("Y", $timestamp);
}

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Nom</th><th>Marque</th><th>Année</th><th>Puissance (ch)</th></tr>";

foreach ($cars as $car) {
    $age = calculateAge($car['year']);
    $rowClass = '';
    if ($age >= 4) {
        $rowClass = 'older-than-4';
    } elseif ($age < 4) {
        $rowClass = 'younger-than-4';
    }
    echo "<tr class='car-row <?= $rowClass ?>' data-car-id='{$car['id']}'>";
    echo "<td>{$car['modelName']}</td>";
    echo "<td>{$car['brand']}</td>";
    echo "<td>" . formatYear($car['year']) . "</td>";
    echo "<td>{$car['power']}</td>";
    echo "</tr>";
}

echo "</table>";
echo "<br><br>";
?>





