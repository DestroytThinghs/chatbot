<?php

$host = 'localhost';
$db = 'chatbot';  // Cambia esto por el nombre de tu base de datos
$user = 'root';  // El usuario por defecto en XAMPP es 'root'
$pass = '';  // La contraseña por defecto es vacía en XAMPP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("No se pudo conectar a la base de datos: " . $e->getMessage());
}
