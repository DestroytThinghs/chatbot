<?php
require __DIR__ . '/../src/lib/config.php';

function createUsuariosTable($pdo) {
    $sql = "
    CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB;
    ";

    try {
        $pdo->exec($sql);
        echo "Tabla 'usuarios' creada con éxito.\n";
    } catch (\PDOException $e) {
        echo "Error al crear la tabla: " . $e->getMessage() . "\n";
    }
}

createUsuariosTable($pdo);
