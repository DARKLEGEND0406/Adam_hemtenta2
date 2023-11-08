<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/view_products.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Se alla produkter</title>
</head>
<body> 

    <!-- Skapar en osorterad lista med länkar till olika funktioner -->
    <ul>
        <li><a href="../functions/add_product.php">Lägg till produkt</a></li>
        <li><a href="../functions/view_products.php">Se alla produkter</a></li>
        <li><a href="../functions/edit_product.php">Ändra pris/bild på produkt</a></li>
        <li><a href="../functions/delete_product.php">Ta bort produkt</a></li>
    </ul>

    <!-- PHP-kod för att hämta och visa produkter från en databas -->
    <?php
    include "config.php"; // Inkluderar konfigurationsfilen

    $sql = "SELECT * FROM products"; // SQL-fråga för att hämta alla produkter
    $result = $conn->query($sql); // Utför SQL-frågan

    // Kontrollerar om det finns några resultat
    if ($result->num_rows > 0) {
        // Skapar en tabell och skriver ut varje produkt i en egen rad
    } else {
        // Om inga produkter hittades, skrivs ett meddelande ut
        echo "Inga produkter hittades.";
    }
    ?>

</body> 
</html>
