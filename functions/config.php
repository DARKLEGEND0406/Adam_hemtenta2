<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


// Databasanslutningsuppgifter
$host = "localhost"; // Databasens värdnamn
$username = "root"; // Databasanvändarnamn
$password = ""; // Databaslösenord
$database = "crud_app"; // Databasnamn

// Skapa en anslutning till databasen
$conn = new mysqli($host, $username, $password);

// Kontrollera anslutningen
if ($conn->connect_error) {
    die("Anslutningen misslyckades: " . $conn->connect_error);
}

// Skapa databasen om den inte redan finns
$createDatabaseSQL = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($createDatabaseSQL) === TRUE) {
    echo "Databasen har skapats eller finns redan.";
} else {
    die("Fel vid skapande av databas: " . $conn->error);
}

// Välj den skapade databasen
$conn->select_db($database);

// Skapa tabellen 'products' om den inte redan finns
$createTableSQL = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255)
)";
if ($conn->query($createTableSQL) === TRUE) {
    echo "Tabellen 'products' har skapats eller finns redan.";
} else {
    die("Fel vid skapande av tabell: " . $conn->error);
}


?>