<h1>create</h1>

<?php
include("./conn.php");

// Haal formulierdata op
$productnaam = $_POST['gerecht'];
$prijs = $_POST['prijs'];

// Zorg ervoor dat de prijs een geldig getal is
if (!is_numeric($prijs)) {
    echo 'De prijs moet een geldig getal zijn.';
    exit;
}

// Debug: Bekijk de ingevoerde waarden
echo 'Dit is mijn productnaam: '.$productnaam;
echo 'Dit is mijn prijs: '.$prijs;

// Het create request voor gerecht
$sql = 'INSERT INTO menuitems(Productnaam, Prijs) VALUES (:productnaam, :prijs);';

// Bereid de query voor en bind de parameters
$stmt = $conn->prepare($sql);
$stmt->bindParam(":productnaam", $productnaam);
$stmt->bindParam(":prijs", $prijs);

// Voer de query uit
$stmt->execute();
echo 'Product succesvol toegevoegd!';
?>

