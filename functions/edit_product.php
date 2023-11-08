<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/edit_product.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Ändra produkt</title>
</head>
<body>


    <ul>
        <li><a href="../functions/add_product.php">Lägg till produkt</a></li>
        <li><a href="../functions/view_products.php">Se alla produkter</a></li>
        <li><a href="../functions/edit_product.php">Ändra pris/bild på produkt</a></li>
        <li><a href="../functions/delete_product.php">Ta bort produkt</a></li>
    </ul>


<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $price = $_POST["price"];
    $image = $_POST["image"];

    $stmt = $conn->prepare("UPDATE products SET price = ?, image = ? WHERE id = ?");
    $stmt->bind_param("dsi", $price, $image, $id);

    if ($stmt->execute()) {
        echo "Pris och bild har uppdaterats framgångsrikt.";
    } else {
        echo "Fel vid uppdatering av produkt: " . $conn->error;
    }
}

?>

<form method="post" action="edit_product.php">
    <label for="id">Produkt ID:</label>
    <input type="number" id="id" name="id" required><br>
    
    <label for="price">Ny pris:</label>
    <input type="number" step="0.01" id="price" name="price" required><br>

    <label for="description">Beskrivning:</label>
    <textarea id="description" name="description" type="text"></textarea><br>
    
    <label for="image">Ny bild URL:</label>
    <input type="file" id="image" name="image" accept="image/*">
    
    <input type="submit" value="Ändra produkt">
</form>
</body>
</html>
