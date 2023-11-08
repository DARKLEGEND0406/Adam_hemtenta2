<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/add_product.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Lägg till produkt</title>
</head>
<body>

<!-- Meny med länkar till olika funktioner -->
    <ul>
        <li><a href="../functions/add_product.php">Lägg till produkt</a></li>
        <li><a href="../functions/view_products.php">Se alla produkter</a></li>
        <li><a href="../functions/edit_product.php">Ändra pris/bild på produkt</a></li>
        <li><a href="../functions/delete_product.php">Ta bort produkt</a></li>
    </ul>

<?php

// Inkluderar konfigurationsfilen för databasanslutningen
include "config.php";

// Kontrollerar om formuläret har skickats
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    $image = "uploads/" . $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], $image);

    $stmt = $conn->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $name, $description, $price, $image);

    if ($stmt->execute()) {
        echo "Produkten har lagts till framgångsrikt.";
    } else {
        echo "Fel vid tillägg av produkt: " . $conn->error;
    }
}
?>

<!-- Formulär för att lägga till en produkt -->
<form method="post" action="add_product.php" enctype="multipart/form-data">
    <label for="name">Namn:</label>
    <input type="text" id="name" name="name" required><br>
    
    <label for="description">Beskrivning:</label>
    <textarea id="description" name="description"></textarea><br>
    
    <label for="price">Pris:</label>
    <input type="number" step="0.01" id="price" name="price" required><br>
    
    <label for="image">Bild:</label>
    <input type="file" id="image" name="image" accept="image/*">
    
    <input type="submit" value="Lägg till produkt">
</form>
</body>
</html>
