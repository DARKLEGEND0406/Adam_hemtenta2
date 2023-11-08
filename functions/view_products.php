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

    <ul>
        <li><a href="../functions/add_product.php">Lägg till produkt</a></li>
        <li><a href="../functions/view_products.php">Se alla produkter</a></li>
        <li><a href="../functions/edit_product.php">Ändra pris/bild på produkt</a></li>
        <li><a href="../functions/delete_product.php">Ta bort produkt</a></li> 
    </ul>

<?php
include "config.php"; // Inkluderar konfigurationsfilen för att ansluta till databasen

$sql = "SELECT * FROM products"; // SQL-fråga för att hämta alla produkter från databasen
$result = $conn->query($sql); // Utför SQL-frågan och sparar resultatet i $result

if ($result->num_rows > 0) { 
    echo "<table>"; 
    echo "<tr><th>ID</th><th>Namn</th><th>Beskrivning</th><th>Pris</th><th>Bild</th></tr>"; // Skriver ut tabellrubriker
    while ($row = $result->fetch_assoc()) { 
        echo "<tr>"; 
        echo "<td>" . $row["id"] . "</td>"; 
        echo "<td>" . $row["name"] . "</td>"; 
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["price"] . "</td>"; 
        echo "<td><img src='" . $row["image"] . "' alt='Produktbild'></td>"; 
        echo "</tr>"; 
    }
    echo "</table>"; 
} else {
    echo "Inga produkter hittades."; 
}
?>

</body>
</html>
