<?php
require 'src/lib/config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ./template/sign_in.html");
    exit;
}

$user_id = $_SESSION['user_id'];

// Inicializar el contador y el tiempo de reinicio si no están definidos
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
    $_SESSION['last_reset'] = time();
}

// Verificar el límite de consultas
$current_time = time();
$time_diff = $current_time - $_SESSION['last_reset'];

if ($time_diff >= 4 * 3600) {  // 4 horas en segundos
    $_SESSION['contador'] = 0;
    $_SESSION['last_reset'] = $current_time;
}

if ($_SESSION['contador'] >= 20) {
    die(json_encode(['error' => "Has alcanzado el límite de consultas. Inténtalo de nuevo en " . (4 * 3600 - $time_diff) . " segundos."]));
}

// Función para obtener el prompt de la categoría
function getCategoryPrompt($pdo, $category_id) {
    $sql = "SELECT prompt FROM categorias_chat WHERE id = :category_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['category_id' => $category_id]);
    return $stmt->fetchColumn();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $consulta = $_POST['consulta'];
    $category_id = $_POST['category_id'];
    
    $prompt = getCategoryPrompt($pdo, $category_id);
    
    $api_key = "AIzaSyDPMXuk_G2FxCZKTBYw178WSzSkXxw16kY";
    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=" . $api_key;
    
    $data = [
        "contents" => [
            [
                "parts" => [
                    [
                        "text" => $prompt . "\n\nUsuario: " . $consulta . "\n\nAsistente:"
                    ]
                ]
            ]
        ]
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);
    
    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    
    if ($error) {
        $respuesta = "Error en la solicitud: " . $error;
    } else {
        $response_data = json_decode($response, true);
        if (isset($response_data['candidates'][0]['content']['parts'][0]['text'])) {
            $respuesta = $response_data['candidates'][0]['content']['parts'][0]['text'];
        } else {
            $respuesta = "No se pudo obtener una respuesta del chatbot.";
        }
    }

    $sql = "INSERT INTO consultas (usuario_id, categoria_id, consulta, respuesta) VALUES (:usuario_id, :categoria_id, :consulta, :respuesta)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['usuario_id' => $user_id, 'categoria_id' => $category_id, 'consulta' => $consulta, 'respuesta' => $respuesta]);
    
    // Incrementar el contador de consultas
    $_SESSION['contador']++;

    echo json_encode([
        'consulta' => $consulta,
        'respuesta' => $respuesta
    ]);
}

// Si se solicita el historial de chat
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['action']) && $_GET['action'] == 'get_history') {
        $category_id = $_GET['category_id'];
        $sql = "SELECT consulta, respuesta FROM consultas WHERE usuario_id = :usuario_id AND categoria_id = :categoria_id ORDER BY id DESC LIMIT 50";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['usuario_id' => $user_id, 'categoria_id' => $category_id]);
        $history = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(array_reverse($history));
    }
    elseif (isset($_GET['action']) && $_GET['action'] == 'get_categories') {
        $sql = "SELECT id, nombre FROM categorias_chat";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($categories);
    }
}