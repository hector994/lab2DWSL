<?php
include  '../../conf/_con.php'; // Incluye el archivo de configuración de la base de datos

// Crea una conexión PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=noticias', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error de conexión: ' . $e->getMessage();
    exit(); // Sale del script si hay un error de conexión
}

$query = 'SELECT * FROM nacionales';
$ejecutar = $pdo->prepare($query);
$ejecutar->execute();
$data = $ejecutar->fetchAll(PDO::FETCH_OBJ); // Obtiene datos de la base de datos

$query = 'SELECT * FROM internacionales';
$ejecutar = $pdo->prepare($query);
$ejecutar->execute();
$internacionales = $ejecutar->fetchAll(PDO::FETCH_OBJ); // Obtiene datos de la base de datos

$query = 'SELECT * FROM deportes';
$ejecutar = $pdo->prepare($query);
$ejecutar->execute();
$deportes= $ejecutar->fetchAll(PDO::FETCH_OBJ); // Obtiene datos de la base de datos

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Noticiero Univo</title>
        <!-- Favicon-->
        <link rel="icon" type="../../image/x-icon" href="../../assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="../../index.php">INICIO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="./insertar.php">Agregar</a></li>
                        <li class="nav-item"><a class="nav-link" href="./eliminar.php">Eliminar</a></li>
                        <li class="nav-item"><a class="nav-link" href="./modificar.php">Actualizar</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">NOTICIAS DEL MUNDO</h1>
                    <p class="lead fw-normal text-white-50 mb-0">MANTENTE ACTIVADO DE INFORMACIÓN</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5"> 
            <div class="container px-4 px-lg-5 mt-5">
                <h3>INTERNACIONALES</h3>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php  foreach($internacionales as $medicamento ):  ?> 
                    <div class="col mb-5"> 
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="medicamento-imagen" src="../../imgServer/img/<?php echo $medicamento->imagen; ?>" alt="<?php echo $medicamento->titulo; ?>">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $medicamento->titulo; ?></h5>
                                    <?php echo $medicamento->descripcion; ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                <?php endforeach; ?>   
            </div>
        </section>

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../../js/scripts.js"></script>
    </body>
</html>
