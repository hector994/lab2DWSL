<?php
include '../../conf/_con.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    $id = $_GET['id'];

    $query = "SELECT imagen FROM medicamentos WHERE code = :codigo";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':codigo', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $imagen_a_eliminar = $row['imagen'];
        $query = "DELETE FROM medicamentos WHERE code = :codigo";
        $ejecutar = $pdo->prepare($query);
        $ejecutar->bindParam(':codigo', $id, PDO::PARAM_INT);

            // Ejecutar la sentencia
        if ($ejecutar->execute()) {
            $ruta_imagen_a_eliminar = "../imgServer/img/" . $imagen_a_eliminar;
            if (unlink($ruta_imagen_a_eliminar)) {
                echo "Medicamento eliminado correctamente ";
                header('Location: ./procesar.php');
                    // Consultar y mostrar la lista de medicamentos 
            }
        } else {
            echo "Error al eliminar medicamento";
        }


    } else {
        echo "ID no proporcionado en la URL.";
        exit; // Sale del script si no se proporciona un ID válido en la URL.
    }
}
?>

