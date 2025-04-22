<?php

require_once '../Libs/Database.php';

$db = new \Libs\Database();
$conn = $db->getConnection();

if ($conn) {
    echo "¡Conexión a la base de datos exitosa!";
    // Puedes realizar alguna operación de prueba aquí, como una consulta simple
    try {
        $result = $conn->query("SELECT 1");
        if ($result) {
            echo "<br>La base de datos responde correctamente.";
        } else {
            echo "<br>Error al ejecutar una consulta de prueba.";
        }
    } catch (\PDOException $e) {
        echo "<br>Error durante la prueba de consulta: " . $e->getMessage();
    }
    $conn = null; // Cierra la conexión
} else {
    echo "No se pudo establecer la conexión a la base de datos. Revisa la configuración en Libs/Database.php.";
}



?>