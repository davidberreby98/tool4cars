<h1>Voitures Client C</h1>

<?php
$client = "clientc";

$data = json_decode(file_get_contents("../../../../data/cars.json"), true);

$cars = array_filter($data, function($car) use ($client) {
    return $car["customer"] === $client;
});

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Nom</th><th>Couleur</th></tr>";

foreach ($cars as $car) {
    echo "<tr class='car-row' data-car-id='{$car['id']}'>";
    echo "<td>{$car['modelName']}</td>";
    echo "<td style='background-color: {$car['colorHex']}; width: 50px;'>&nbsp;</td>";
    echo "</tr>";
}

echo "</table>";
echo "<br><br>";
?>
