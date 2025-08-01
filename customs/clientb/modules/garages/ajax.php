<?php
$garages = json_decode(file_get_contents("../../../../data/garages.json"), true);

$client = $_COOKIE["client"] ?? null;

if (!$client) {
    echo "<p>Client non défini.</p>";
    exit;
}

$filteredGarages = array_filter($garages, fn($g) => $g["customer"] === $client);

echo "<h2>Liste des garages</h2>";
echo "<ul>";
foreach ($filteredGarages as $garage) {
    echo "<li>
        <strong>{$garage['title']}</strong>
        <button class='garage-row' data-garage-id='{$garage['id']}'>Voir</button>
    </li>";
}
echo "</ul>";
echo "<br><br>";
?>
