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

    <ul> <!-- Meny med länkar till olika funktioner -->
        <li><a href="../functions/add_product.php">Lägg till produkt</a></li>
        <li><a href="../functions/view_products.php">Se alla produkter</a></li>
        <li><a href="../functions/edit_product.php">Ändra pris/bild på produkt</a></li>
        <li><a href="../functions/delete_product.php">Ta bort produkt</a></li>
    </ul>

<?php
include "config.php"; // Inkluderar konfigurationsfilen för databasanslutningen

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Kontrollerar om formuläret har skickats
    $id = $_POST["id"]; // Hämtar produktens ID från formuläret
    $price = $_POST["price"]; // Hämtar det nya priset från formuläret
    $image = $_POST["image"]; // Hämtar den nya bild-URL:en från formuläret

    $stmt = $conn->prepare("UPDATE products SET price = ?, image = ? WHERE id = ?"); // Förbereder SQL-frågan för att uppdatera produkten i databasen
    $stmt->bind_param("dsi", $price, $image, $id); // Binder parametrarna till SQL-frågan

    if ($stmt->execute()) { // Utför SQL-frågan och kontrollerar om den lyckades
        echo "Pris och bild har uppdaterats framgångsrikt."; // Skriver ut ett meddelande om att produkten har uppdaterats
    } else {
        echo "Fel vid uppdatering av produkt: " . $conn->error; // Skriver ut ett felmeddelande om något gick fel
    }
}
?>

<form method="post" action="edit_product.php"> <!-- Formulär för att uppdatera en produkt -->
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
