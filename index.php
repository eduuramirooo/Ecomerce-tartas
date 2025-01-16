<?php
include_once("conectar.php");
$conexion = new Conectar("localhost", "root", "", "zarif");
if (isset($_GET["pagina"])) {
    $pagina = ($_GET["pagina"] - 1) * 6;
} else {
    $pagina = 0;
}
$consulta = "SELECT * FROM tartas ";
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
    <title>Zarif Kamiso | Tartas de queso artesanales</title>
    <!-- Meta -->
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
    <link rel="stylesheet" href="./css/styles.css">
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
        <img src="./img/logo.png" alt="logo" class="alinear logoImg">
        <nav>
            <ul class="grid grid-3">
                <li><a href="./index.php">Inicio</a></li>
                <li><a href="./listado.php">Tartas</a></li>
                <li><a href="./contacto.php">Contacto</a></li>
            </ul>
    </header>
    <main>
        <section id="principal">
            <article>
                <h1 class="">Tartas de queso artesanales</h1>
                <p class="">Las mejores tartas de queso de Madrid. Pistacho, maracuyá o Lotus. Para cumpleaños, celebraciones...</p>
                <a href="./listado.php" class="boton">Ver todas las tartas</a>
            </article>
            <section class="grid grid-3 productos" id="productos">
                <?php
                $productos_json = json_encode($array_productos);
                echo "<script>var productos = $productos_json;</script>";
                $productos_mostrados = array_slice($array_productos, 0, 3);
                foreach ($productos_mostrados as $producto) {
                    echo "<article>
                        <a href='producto.php?id=" . $producto["id"] . "' class='" . $producto["id"] . $producto["nombre"] . "'>
                        <img src='" . $producto["img"] . "' alt='tarta' >
                            <p>" . $producto["nombre"] . "</p>
                            <p>" . $producto["precio"] . "€</p>
                        </a>
                        </article>";
                }
                ?>
            </section>
            <section class="xq">
                <article class="reviews-container">
                    <div class="texto">
                        <h2>¿Por qué elegir nuestras tartas?</h2>
                        <p>Descubre el auténtico sabor de nuestras tartas de queso artesanales, elaboradas con ingredientes de la más alta calidad. Desde el irresistible pistacho hasta el exótico maracuyá, pasando por el inconfundible sabor Lotus, nuestras tartas son el toque perfecto para cualquier ocasión: cumpleaños, celebraciones o simplemente para darte un capricho inolvidable.</p>
                        <p>Estas son algunas de las reseñas de nuestra Pastelería</p>
                    </div>
                </article>
                <section class="motivos">
                    <?php
                    $random1 = rand(1, 28);
                    $random2 = rand(0, 28);
                    $consultaReview = "SELECT * FROM reviews where id = $random1 or id = $random2";
                    $array_reviews = $conexion->recibir_datos($consultaReview);
                
                    foreach ($array_reviews as $review) {
                        echo "
                        
                    <article class='review'>
                    <a href='producto.php?id=" . $review["idArticuloComprado"] . "''>
                    <div class='reviewImg'>
                    <img src='./img/reviews/" . $review["imgR"] . "' alt='review' class='reviewImg alinear' width='100px'>
                       </div>
                         <div class='textoR'> 
                         
                         <p>" . $review["nombre"]  . " " . $review["estrellas"] . "<img src='./img/reviews/estrellas.svg' width='25px' style='margin='3px;''> </p>
                         <p>" . $array_productos[$review["idArticuloComprado"] - 1]["nombre"] . "</p>
                         <p>" . $review["texto"] . "</p>
                         </div>
                    </article></a>";
                    }
                    ?>
                </section>
            </section>
            <img src="./img/qr.png" alt="" width="150px" style="padding: 10px;">
        </section>


    </main>
    <footer>
        <div class="grid grid-75">
            <p>© 2024 Zarif Kamiso. Todos los derechos reservados.</p>
            

            <div class="grid grid-4">

                <a href="https://www.instagram.com/"><img src="https://img.icons8.com/win10/200/FFFFFF/instagram-new.png" alt="" srcset="" width="75px"></a>
                <a href="https://x.com/"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/57/X_logo_2023_%28white%29.png/480px-X_logo_2023_%28white%29.png" alt="" srcset="" width="75px"></a>
                <a href="https://glovoapp.com/"><img src="./img/glovo.png" alt="" srcset="" width="75px"></a>
            </div>
        </div>
    </footer>

</body>
<script>
    let currentIndex = 0;
    const productosContainer = document.getElementById('productos');

    function mostrarProductos() {
        productosContainer.innerHTML = '';
        const productosAMostrar = productos.slice(currentIndex, currentIndex + 3);
        productosAMostrar.forEach((producto, index) => {
            const article = document.createElement('article');
            article.classList.add(index === 1 ? 'alto' : 'bajo');
            article.innerHTML = `
                <a href='producto.php?id=${producto.id}' class='${producto.id}${producto.nombre}'>
                    <img src='${producto.img}' alt='tarta'>
                    <p>${producto.nombre}</p>
                    <p>${producto.precio}€</p>
                </a>
            `;
            productosContainer.appendChild(article);
        });
        currentIndex = (currentIndex + 3) % productos.length;
    }

    setInterval(mostrarProductos, 5000); // Cambia cada 5 segundos
    mostrarProductos(); // Mostrar productos inicialmente
</script>

</html>