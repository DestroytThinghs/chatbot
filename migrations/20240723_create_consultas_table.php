<?php
require __DIR__ . '/../src/lib/config.php';

function createConsultasTable($pdo) {
    $sql = "
    CREATE TABLE IF NOT EXISTS consultas (
        id INT AUTO_INCREMENT PRIMARY KEY,
        usuario_id INT NOT NULL,
        consulta TEXT NOT NULL,
        respuesta TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
    ) ENGINE=InnoDB;
    ";

    try {
        $pdo->exec($sql);
        echo "Tabla 'consultas' creada con éxito.\n";
    } catch (\PDOException $e) {
        echo "Error al crear la tabla: " . $e->getMessage() . "\n";
    }
}

createConsultasTable($pdo);
