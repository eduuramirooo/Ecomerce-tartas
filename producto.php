<?php
    include_once "conectar.php";
    $conexion = new Conectar("localhost", "root", "", "zarif");
    if(isset($_GET["pagina"])){
        $pagina = ($_GET["pagina"]-1)*6;
    }else{
        $pagina = 0;
    }
    $consulta = "SELECT * FROM tartas";
    $array_productos = $conexion->recibir_datos($consulta);
    $contar_productos = count($array_productos);
    $paginas = ceil($contar_productos/6);
    
    $consulta = "SELECT * FROM tartas LIMIT 7 OFFSET $pagina";
    $array_productos = $conexion->recibir_datos($consulta);
    $id= $_GET["id"];
    $consulta = "SELECT * FROM tartas WHERE id = $id";
    $array_productos = $conexion->recibir_datos($consulta);
    $nombre = $array_productos[0]["nombre"];
    
    $precio = $array_productos[0]["precio"];
    $descripcion = $array_productos[0]["descripcion"];
    $imagen = $array_productos[0]["img"];
    $ingredientes = $array_productos[0]["ingredientes"];
    $consulta2 = "SELECT * FROM reviews WHERE idArticuloComprado = $id";
    $array_productos2 = $conexion->recibir_datos($consulta2);

    $consulta4 = "SELECT nombre FROM tartas";
    $array_productos4 = $conexion->recibir_datos($consulta4);
    $consulta3 = "SELECT SUM(estrellas) AS total_estrellas FROM reviews WHERE idArticuloComprado = $id";
    $array_productos3 = $conexion->recibir_datos($consulta3);
    $total_estrellas = $array_productos3[0]["total_estrellas"];
    $media= $total_estrellas/count($array_productos2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo"<title>".$nombre."</title>"; ?>
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
    <link rel="stylesheet" href="./css/stylesProducto.css">
    <link rel="stylesheet" href="./css/fuentes.css">
    <script>
    window.addEventListener('scroll', function() {
    const header = document.querySelector('header');
    if (window.scrollY > 50) {
        header.classList.add('shrink');
        header.classList.add('fixed');
    } else {
        header.classList.remove('shrink');
    }
});

    </script>



</head>
<body>
<header>
        <a href="./index.php"><img src="./img/logo.png" alt="logo" class="alinear logoImg"></a>
        </div>
        <nav>

            <ul class="grid grid-3">
                <li><a href="./index.php">Inicio</a></li>
                <li><a href="./listado.php">Tartas</a></li>
                <li><a href="./contacto.php">Contacto</a></li>
            </ul>
    </header>
    <main>
        
    <section class="producto">
            <img src="<?php echo $imagen; ?>" alt="<?php echo $nombre; ?>">
            <div class="row">
                <h2 ><?php echo $nombre; ?>  <span><?php echo $media ?>⭐</span></h2>

                <p><?php echo $descripcion; ?></p>
                <h3>Ingredientes</h3>
                <p><?php echo $ingredientes; ?></p>
                <select id="size">
                    <option value="default">Seleccione un tamaño</option>
                    <option value="peque">Pequeña</option>
                    <option value="mediana">Mediana</option>
                </select>
                <div class="grid grid-4">
                    <img src="./img/Cereales-con-gluten.png" alt="" width="80px">
                    <img src="./img/Frutos-Secos.png" alt="" width="80px">
                    <img src="./img/Huevos.png" alt="" width="80px">
                    <img src="./img/Soja.png" alt="" width="80px">
                </div>
                <button id="precio"><?php echo $precio; ?><span>€</span></button>
            </div>
        </section>
        <section class="motivos">
                    <?php
                    $consultaReview = "SELECT * FROM reviews where idArticuloComprado = $id limit 3";
                    $array_reviews = $conexion->recibir_datos($consultaReview);
                    $nombreTarta= $array_productos4[$id-1]["nombre"];
                    echo "<h2>Lo que dicen nuestros clientes sobre la ". $nombreTarta ."</h2>
                    <div class='grid grid-3'>";
                    foreach ($array_reviews as $review) {
                        echo "
                        
                    <article class='review'>
                    
                    <div class='reviewImg'>
                    <img src='./img/reviews/" . $review["imgR"] . "' alt='review' class='reviewImg alinear' width='100px'>
                       </div>
                         <div class='textoR'> 
                         
                         <p>" .$nombreTarta. "</p>
                         <p>" . $review["nombre"]  . " " . $review["estrellas"] . "<img src='./img/reviews/estrellas.svg' width='25px' style='margin='3px;''> </p>
                         
                         <p>" . $review["texto"] . "</p>
                         </div>
                    </article>";
                    }
                    ?>
                    </div>
                    <img src="./img/qr.png" alt="" width="150px" style="padding: 10px; margin-top:10px;" class="alinear">
                </section>
    </main>
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
    <script>
        document.querySelector("#size").addEventListener("change", function(){
    if(document.querySelector("#size").value == "peque"){
        document.getElementById("precio").innerHTML = "10<span>€</span>";
        console.log("hola");
    }else if(document.querySelector("#size").value == "mediana"){
        document.getElementById("precio").innerHTML = "29<span>€</span>";
    }});
    </script>

</body>
</html>