<?php

echo "<br><br>";

if (!isset($_GET['id'])) {
    echo "<p>ID manquant.</p>";
    exit;
}

$carId = intval($_GET['id']);

$carData = json_decode(file_get_contents("../../../../data/cars.json"), true);
$garages = json_decode(file_get_contents("../../../../data/garages.json"), true);

$car = null;
foreach ($carData as $item) {
    if ($item["id"] === $carId) {
        $car = $item;
        break;
    }
}

if (!$car) {
    echo "<p>Voiture introuvable.</p>";
    exit;
}

$garageName = "Garage inconnu";
foreach ($garages as $g) {
    if ($g["id"] === $car["garageId"]) {
        $garageName = $g["title"];
        break;
    }
}

$fieldLabels = [
    "modelName" => "Nom du modèle",
    "year" => "Date de mise en circulation",
    "brand" => "Marque",
    "power" => "Puissance (ch)",
    "colorHex" => "Couleur",
    "garage" => "Garage"
];

$car['year'] = date("d/m/Y", $car['year']);
$car['garage'] = $garageName;

$fieldsToShow = ["modelName", "brand", "year", "power", "colorHex", "garage"];

echo "<div class='car-details'>";
echo "<h2>Détails de la voiture</h2>";
echo "<ul>";
foreach ($fieldsToShow as $key) {
    $label = $fieldLabels[$key];
    $value = $car[$key];
    
    if ($key === "colorHex") {
        echo "<li><strong>{$label}</strong> : 
            <span style='display:inline-block;width:16px;height:16px;background-color:{$value};border:1px solid #000;vertical-align:middle;'></span> 
            {$value}
        </li>";
    } else {
        echo "<li><strong>{$label}</strong> : {$value}</li>";
    }
}
echo "</ul>";
echo "<button class='back-button' id='backToList'>← Retour au profil</button>";
echo "</div>";
echo "<br><br>";
?>
