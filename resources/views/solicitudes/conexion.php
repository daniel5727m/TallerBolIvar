<?php
$host = 'localhost'; // Servidor de la base de datos
$dbname = 'tallerbolivar2'; // Nombre de la base de datos
$username = 'root'; // Nombre de usuario para conectarse a la base de datos
$password = 'null'; // Contraseña para conectarse a la base de datos

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Error al conectarse a la base de datos: " . $e->getMessage());
}

$stmt = $pdo->prepare("SELECT longitud_tubo, angulos FROM solicitude");
$stmt->execute();
$solicitude = $stmt->fetch();
?>
