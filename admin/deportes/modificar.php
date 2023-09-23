<?php
include '../conf/_con.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    $query = "SELECT * FROM medicamentos WHERE code = :codigo";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':codigo', $id, PDO::PARAM_INT);
    $stmt->execute();
    $medicamento = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST["code"];
    $nombre = $_POST["nombre"];
    $existencia = $_POST["existencia"];
    $fecharegistro = $_POST["fecharegistro"];
    $precio = $_POST["precio"];

    // Obtener la nueva imagen si se ha cargado
    $imagen_tmp = $_FILES["imagen"]["tmp_name"];
    $imagen_nombre = $_FILES["imagen"]["name"];
    $imagen_extension = pathinfo($imagen_nombre, PATHINFO_EXTENSION);
    $imagen_agregar_nombre = uniqid() . "." . $imagen_extension; 
    $ruta_imagen = "../imgServer/img/" . $imagen_agregar_nombre; // Directorio donde se guardarán las imágenes
    
    // Eliminar la imagen anterior si existe
    if (!empty($medicamento['imagen'])) {
        $ruta_imagen_anterior = "../imgServer/img/" . $medicamento['imagen'];
        if (file_exists($ruta_imagen_anterior)) {
            unlink($ruta_imagen_anterior); // Elimina la imagen anterior
        }
    }

    if (move_uploaded_file($imagen_tmp, $ruta_imagen)) {
        // Preparar la sentencia SQL para actualizar los datos
        $query = "UPDATE medicamentos SET nombre = :nombre, existencia = :existencia, fecharegistro = :fecharegistro, 
        imagen = :imagen, precio = :precio WHERE code = :codigo";
        $ejecutar = $pdo->prepare($query);
        $ejecutar->bindParam(':codigo', $id, PDO::PARAM_INT);
        $ejecutar->bindParam(':nombre', $nombre);
        $ejecutar->bindParam(':existencia', $existencia);
        $ejecutar->bindParam(':fecharegistro', $fecharegistro);
        $ejecutar->bindParam(':imagen', $imagen_agregar_nombre);
        $ejecutar->bindParam(':precio', $precio);

        // Ejecutar la sentencia
        if ($ejecutar->execute()) {
            echo "Medicamento actualizado";
            header('Location: ./procesar.php');
            // No necesitas la redirección aquí ya que el formulario y el procesamiento están en el mismo archivo.
        } else {
            echo "Error al actualizar medicamento";
            // No necesitas la redirección aquí ya que el formulario y el procesamiento están en el mismo archivo.
        }
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Modificar</title>
</head>
<body>
<div class="container mt-5">
    <h2>Modificar Medicamento</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre">ID:</label>
            <input type="text" class="form-control" id="code" name="code" value="<?php echo $medicamento['code']; ?>" required>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre Medicamento:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $medicamento['nombre']; ?>" required>
        </div>
        <div class="form-group">
            <label for="existencia">Existencia:</label>
            <input type="number" class="form-control" id="existencia" name="existencia" value="<?php echo $medicamento['existencia']; ?>" required>
        </div>
        <div class="form-group">
            <label for="fecharegistro">Fecha de Registro:</label>
            <input type="date" class="form-control" id="fecharegistro" name="fecharegistro" value="<?php echo $medicamento['fecharegistro']; ?>" required>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" class="form-control-file" id="imagen" name="imagen" accept="image/*">
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="<?php echo $medicamento['precio']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
