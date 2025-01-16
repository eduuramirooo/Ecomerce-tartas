<?php
include_once("conectar.php");
$conexion = new Conectar("localhost", "root", "", "zarif");
if (isset($_GET["pagina"])) {
    $pagina = ($_GET["pagina"] - 1) * 6;
} else {
    $pagina = 0;
}
$consulta = "SELECT * FROM tartas";
$array_productos = $conexion->recibir_datos($consulta);
$contar_productos = count($array_productos);
$paginas = ceil($contar_productos / 6);

$consulta = "SELECT * FROM tartas LIMIT 7 OFFSET $pagina";
$array_productos = $conexion->recibir_datos($consulta);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <meta name="keywords" content="tartas de queso, tartas, tartaletas, queso con lotus, tarta de maracuya, tarta de pistacho">
    <meta name="description" content="Las mejores tartas artesanales de queso de Madrid. Pistacho, maracuyá o Lotus. Para cumpleaños, celebraciones...">
    <meta name="author" content="Edu Ramiro">
    <link rel="apple-touch-icon" sizes="57x57" href="./img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="./img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon/favicon-16x16.png">
    <link rel="manifest" href="./img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="./img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="./css/stylesListado.css">
</head>
<body>
<header>
<a href="./index.php"> <img src="./img/logo.png" alt="logo" class="alinear logoImg"></a>

        <nav>

            <ul class="grid grid-3">
                <li><a href="./index.php">Inicio</a></li>
                <li><a href="./listado.php">Tartas</a></li>
                <li><a href="./contacto.php">Contacto</a></li>
            </ul>
    </header>
<section id="principal">
            <article>
                <h1 class="">Tartas de queso artesanales</h1>
                <p class="">Las mejores tartas de queso de Madrid. Pistacho, maracuyá o Lotus. Para cumpleaños, celebraciones...</p>
            </article>
            <section class="grid grid-3 productos">
                <?php
                foreach ($array_productos as $producto) {
                    if ($producto["id"] == count($array_productos)) {
                        echo "<p></p>
                            <article>
                            <a href='producto.php?id=" . $producto["id"] . "' class='ultimo'>
                            <img src='" . $producto["img"] . "' alt='tarta'  >
                            <div class='abajo'>
                            </div>
                           
                            <p>" . $producto["nombre"] . "</p>
                                <p>" . $producto["precio"] . "€</p>
                            </a>
                            </article>
                            <p></p>";
                    } else if ($producto["id"] == count($array_productos) - 1) {
                        echo "<article>
                            <a href='producto.php?id=" . $producto["id"] . "' class='penultimo'>
                            <img src='" . $producto["img"] . "' alt='tarta' >
                                <p>" . $producto["nombre"] . "</p>
                                <p>" . $producto["precio"] . "€</p>
                            </a>
                            </article>";
                    } else {
                        echo "<article>
                            <a href='producto.php?id=" . $producto["id"] . "'>
                            <img src='" . $producto["img"] . "' alt='tarta' >
                                <p>" . $producto["nombre"] . "</p>
                                <p>" . $producto["precio"] . "€</p>
                            </a>
                            </article>";
                    }
                }
                ?>
                <!-- <p></p>
                <img src="./img/tarta.png" alt="" >
                <p></p> -->
            </section>
            <footer>
        <div class="grid grid-75">
            <p class="alinear">© 2024 Zarif Kamiso. Todos los derechos reservados.</p>

            <div class="grid grid-3">

                <a href="https://www.instagram.com/"><img src="https://img.icons8.com/win10/200/FFFFFF/instagram-new.png" alt="" srcset="" width="75px"></a>
                <a href="https://x.com/"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/X_logo_2023_%28white%29.png/480px-X_logo_2023_%28white%29.png" alt="" srcset="" width="75px"></a>
                <a href="https://glovoapp.com/"><img src="./img/glovo.png" alt="" srcset="" width="75px"></a>
            </div>
        </div>
    </footer>
</body>
</html>