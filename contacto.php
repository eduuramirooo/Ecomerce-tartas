<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
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
    <link rel="stylesheet" href="./css/stylesContacto.css">

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
<a href="./index.php"> <img src="./img/logo.png" alt="logo" class="alinear logoImg"></a>
        <nav>
        <ul class="grid grid-3">
                <li><a href="./index.php">Inicio</a></li>
                <li><a href="./listado.php">Tartas</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
    </header>
    <main>
        <section class="contacto-container">
            <div class="flex-faq-contacto">
                <!-- Sección de FAQ -->
                <div class="faq-container">
                    <h2>Preguntas Frecuentes</h2>

                    <div class="faq-item">
                        <h3>¿Cuáles son los sabores más populares?</h3>
                        <p>Nuestras tartas más vendidas son la de queso con pistacho, maracuyá y la Lotus. Perfectas para cualquier ocasión.</p>
                    </div>

                    <div class="faq-item">
                        <h3>¿Realizan entregas a domicilio?</h3>
                        <p>Sí, realizamos entregas a domicilio dentro de Madrid. Los pedidos se pueden hacer con 24 horas de antelación.</p>
                    </div>

                    <div class="faq-item">
                        <h3>¿Puedo personalizar mi tarta?</h3>
                        <p>Sí, ofrecemos opciones de personalización en algunas de nuestras tartas. Contáctanos para más detalles.</p>
                    </div>

                    <div class="faq-item">
                        <h3>¿Aceptan pedidos para eventos grandes?</h3>
                        <p>Claro, podemos preparar grandes pedidos para bodas, cumpleaños o cualquier celebración especial. ¡Solo háznoslo saber con antelación!</p>
                    </div>
                </div>

                <!-- Formulario de contacto -->
                <div class="formulario-contacto">
                    <h1 class="contacto-titulo">Contáctanos</h1>

                    <div class="info-contacto">
                        <div>
                            <img src="https://img.icons8.com/win10/200/phone.png" alt="Teléfono">
                            <p>Llámanos</p>
                            <p>+34 695 888 062</p>
                        </div>

                        <div>
                            <img src="https://img.icons8.com/win10/200/email.png" alt="Email">
                            <p>Envíanos un correo</p>
                            <p>zkamiso@gmail.com    </p>
                        </div>

                        <div>
                            <img src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt="Ubicación">
                            <p>Visítanos</p>
                            <p>Calle Ficticia 123, Madrid, España</p>
                        </div>
                    </div>

                    <form id="formContacto" action="contacto.php" method="POST">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required>

                        <label for="email">Correo electrónico:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="mensaje">Mensaje:</label>
                        <textarea id="mensaje" name="mensaje" rows="5" required></textarea>

                        <button type="submit" class="alinear" >Enviar mensaje</button>
                    </form>
                </div>
                
            </div>
            <?php
include_once "./conectar.php";
$conexion = new Conectar("localhost", "root", "", "zarif");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    // Validar que los campos no estén vacíos
    if (!empty($nombre) && !empty($email) && !empty($mensaje)) {
        try {
            // Preparar la consulta para evitar inyecciones SQL
            $consulta = $conexion->prepare("INSERT INTO mensajes (nombre, email, mensaje) VALUES (?, ?, ?)");

            // Ejecutar la consulta con los valores proporcionados
            $consulta->bind_param("sss", $nombre, $email, $mensaje);

            if ($consulta->execute()) {
                echo "<script>alert('¡Gracias por contactarnos! Te responderemos pronto.');</script>";
            } else {
                echo "<script>alert('Error al enviar el mensaje. Por favor, inténtalo de nuevo.');</script>";
            }
        } catch (Exception $e) {
            // Capturar errores y mostrar un mensaje adecuado
            echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        }
    } else {
        echo "<script>alert('Por favor, completa todos los campos.');</script>";
    }
}
?>
<img src="./img/qr.png" alt="" width="150px" style="padding: 10px;" class="alinear">
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
</body>
<script>
    window.onload = function() {
        document.getElementById('formContacto').reset();
    };
</script>       
</html>