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

// Zoekfunctionaliteit
$search_query = '';
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_query = $_GET['search'];

    // Splits de zoekterm in afzonderlijke woorden
    $search_terms = explode(" ", $search_query);
    $like_query_parts = [];

    foreach ($search_terms as $index => $term) {
        $like_query_parts[] = "LOWER(Productnaam) LIKE :term$index";
    }

    $like_query = implode(" OR ", $like_query_parts);
    $stmt = $conn->prepare("SELECT * FROM menuitems WHERE $like_query");

    foreach ($search_terms as $index => $term) {
        $stmt->bindValue(":term$index", "%" . strtolower($term) . "%");
    }

    $stmt->execute();
} else {
    $stmt = $conn->prepare("SELECT * FROM menuitems");
    $stmt->execute();
}

$result = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>sOEPOE</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/css.css">
    <style>
        .menu-item-box {
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 12px;
            padding: 15px;
            margin: 15px;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .menu-item-box img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .menu-info p {
            margin: 8px 0;
            color: #444;
        }

        .soep-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
    </style>
</head>
<body>

<?php include('./includes/header.php'); ?>

<!-- Header afbeelding -->
<section class="select-menu">
    <div class="soepoe">
        <img src="assets/img/soep-header.png" alt="soeplogo">
    </div>
</section>

<!-- Zoekformulier -->
<div class="search-container">
    <form action="index.php" method="GET">
        <input type="text" name="search" placeholder="Zoek gerechten..." value="<?php echo htmlspecialchars($search_query); ?>">
        <button type="submit">Zoeken</button>
    </form>
</div>

<!-- Soep sectie -->
<div class="soepsoorten">
    <h1>Onze Soepen</h1>
</div>

<!-- Main Content -->
<main>
    <div class="soep-row">
        <?php
        if (empty($result)) {
            echo '<p>Geen gerechten gevonden voor "' . htmlspecialchars($search_query) . '".</p>';
        } else {
            foreach ($result as $value) {
                echo '<div class="menu-item-box">';
                echo '<img src="' . $value['img'] . '" alt="' . $value['Productnaam'] . '">';
                echo '<div class="menu-info">';
                echo '<h2>' . $value['Productnaam'] . '</h2>';
                echo '<p>' . $value['beschrijving'] . '</p>'; // Beschrijving toevoegen
                echo '<p><strong>Prijs:</strong> €' . $value['Prijs'] . '</p>';
                echo '<form method="POST">';
                echo '<input type="hidden" name="product" value="' . $value['Productnaam'] . '">';
                echo '<button type="submit" name="add_to_cart" style="background: none; border: none; cursor: pointer;">';
                echo '<img src="assets/img/soepkom_plus.png" alt="Voeg toe aan winkelwagen">';
                echo '</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
            }
        }
        ?>
    </div>
</main>

<?php include('./includes/footer.php'); ?>

</body>
</html>
