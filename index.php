<?php
session_start();
include("./dbcalls/conn.php");
include('./dbcalls/read.php');

// Toevoegen aan winkelwagen
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $product = $_POST['product'];
    $_SESSION['cart'][] = $product;
    echo "<script>alert('$product is toegevoegd aan je winkelwagen!');</script>";
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>sOEPOE</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/css.css">
</head>

<body>

<?php include('./includes/header.php'); ?>

    <!-- Header afbeelding -->
    <section class="select-menu">
        <div class="soepoe">
            <img src="assets/img/soep-header.png" alt="soeplogo">
        </div>
    </section>

    <!-- Soep sectie -->
    <div class="soepsoorten">
        <h1>Onze Soepen</h1>
    </div>

    <!-- Main Content -->
    <main>
        <div class="soep-row">  <!-- Begin van de soep-row container -->
            <?php
            foreach ($result as $value) {
                echo '<div class="menu-item-box">';
                echo '<img src="' . $value['img'] . '" alt="' . $value['Productnaam'] . '">';  // Afbeelding aan de linkerzijde
                echo '<div>';
                echo '<h2>' . $value['Productnaam'] . '</h2>';
                echo '<p><strong>Prijs:</strong> €' . $value['Prijs'] . '</p>';  // Verplaats de prijs onder de naam
                echo '<form method="POST">';
                echo '<input type="hidden" name="product" value="' . $value['Productnaam'] . '">';
                // Vervang de knop door een afbeelding
                echo '<button type="submit" name="add_to_cart" style="background: none; border: none; cursor: pointer;">';
                echo '<img src="assets/img/soepkom_plus.png" alt="Voeg toe aan winkelwagen">';
                echo '</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>  <!-- Einde van de soep-row container -->
    </main>

    <?php include('./includes/footer.php'); ?>

</body>

</html>
            
