<?php
if (!isset($_GET['id'])) {
    echo "<p>ID manquant.</p>";
    exit;
}

$id = intval($_GET['id']);
$garages = json_decode(file_get_contents("../../../../data/garages.json"), true);

$garage = null;
foreach ($garages as $g) {
    if ($g["id"] === $id) {
        $garage = $g;
        break;
    }
}

if (!$garage) {
    echo "<p>Garage introuvable.</p>";
    exit;
}

echo "<div class='garage-details'>";
echo "<h2>Détails du garage</h2>";
echo "<ul>";
echo "<li><strong>Nom :</strong> {$garage['title']}</li>";
echo "<li><strong>Adresse :</strong> {$garage['address']}</li>";
echo "</ul>";
echo "<button class='back-button' id='backToList'>← Retour à la liste</button>";
echo "</div>";
echo "<br><br>";
?>
