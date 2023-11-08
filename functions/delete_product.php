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

    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Produkten har tagits bort framgångsrikt.";
    } else {
        echo "Fel vid borttagning av produkt: " . $conn->error;
    }
}
?>

<form method="post" action="delete_product.php">
    <label for="id">Produkt ID att ta bort:</label>
    <input type="number" id="id" name="id" required><br>
    
    <input type="submit" value="Ta bort produkt">
</form>

</body>
</html>
