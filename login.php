<?php
header('Content-Type: application/json');
require 'src/lib/config.php';
session_start();

function sendJsonResponse($success, $message, $redirect = null) {
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'redirect' => $redirect
    ]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        sendJsonResponse(false, 'Por favor, ingrese su email y contraseña.');
    }

    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        sendJsonResponse(true, 'Inicio de sesión exitoso.', 'chat.php');
    } else {
        sendJsonResponse(false, 'Email o contraseña incorrectos.');
    }
} else {
    sendJsonResponse(false, 'Método no permitido.');
}
?>