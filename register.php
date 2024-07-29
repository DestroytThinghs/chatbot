<?php
header('Content-Type: application/json');
require 'src/lib/config.php';

function sendJsonResponse($success, $message, $redirect = null) {
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'redirect' => $redirect
    ]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($nombre) || empty($email) || empty($password)) {
        sendJsonResponse(false, 'Todos los campos son requeridos.');
    }

    // Verificar si el email ya existe
    $checkEmail = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE email = ?");
    $checkEmail->execute([$email]);
    if ($checkEmail->fetchColumn() > 0) {
        sendJsonResponse(false, 'Este email ya está registrado.');
    }

    // Validar la contraseña (por seguridad extra)
    if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        sendJsonResponse(false, 'La contraseña no cumple con los requisitos de seguridad.');
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)";
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute(['nombre' => $nombre, 'email' => $email, 'password' => $hashedPassword]);
        sendJsonResponse(true, 'Registro exitoso.', 'sign_in.html');
    } catch (PDOException $e) {
        sendJsonResponse(false, 'Error al registrar: ' . $e->getMessage());
    }
} else {
    sendJsonResponse(false, 'Método no permitido.');
}
?>