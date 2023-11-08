<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/delete_product.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Ta bort produkt</title>
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

    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?"); // Förbereder SQL-frågan för att ta bort produkten från databasen
    $stmt->bind_param("i", $id); // Binder parametrarna till SQL-frågan

    if ($stmt->execute()) { // Utför SQL-frågan och kontrollerar om den lyckades
        echo "Produkten har tagits bort framgångsrikt."; // Skriver ut ett meddelande om att produkten har tagits bort
    } else {
        echo "Fel vid borttagning av produkt: " . $conn->error; // Skriver ut ett felmeddelande om något gick fel
    }
}
?>

<form method="post" action="delete_product.php"> <!-- Formulär för att ta bort en produkt -->
    <label for="id">Produkt ID att ta bort:</label>
    <input type="number" id="id" name="id" required><br>
    
    <input type="submit" value="Ta bort produkt">
</form>

</body>
</html>
