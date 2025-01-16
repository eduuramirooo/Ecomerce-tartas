-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2024 a las 18:01:05
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zarif`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `email`, `mensaje`) VALUES
(1, 'asdad', 'adad@gmail.com', 'adadad'),
(2, 'Edu ', 'eduardoramirozabaleta@gmail.com', 'Duri'),
(5, 'Campi', 'cr7Campi@xhamster.com', 'soy tonto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `estrellas` int(11) NOT NULL,
  `texto` text NOT NULL,
  `imgR` varchar(50) NOT NULL,
  `idArticuloComprado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reviews`
--

INSERT INTO `reviews` (`id`, `nombre`, `estrellas`, `texto`, `imgR`, `idArticuloComprado`) VALUES
(1, 'Juan Pérez', 5, 'La tarta de queso original es espectacular, cremosa y con un sabor auténtico.', 'original.jpg', 1),
(2, 'María Gómez', 4, 'Muy buena, pero un poco densa para mi gusto. Aun así, excelente.', 'original2.jpg', 1),
(3, 'Carlos Rivas', 5, 'Perfecta en textura y sabor. La recomiendo al 100%.', 'original3.jpg', 1),
(4, 'Lucía Méndez', 5, 'Deliciosa, la mejor tarta de queso que he probado en mucho tiempo.', 'original4.jpg', 1),
(5, 'Pedro López', 5, 'Increíble sabor a Nutella, una mezcla perfecta con el queso.', 'nutella.jpg', 2),
(6, 'Ana Torres', 4, 'Buena, pero algo dulce para mi gusto. Ideal para los amantes de la Nutella.', 'nutella2.jpg', 2),
(7, 'Miguel Suárez', 5, '¡Espectacular! El sabor de la Nutella resalta muy bien con la tarta de queso.', 'nutella3.jpg', 2),
(8, 'Laura Castillo', 3, 'Me gusta, pero es un poco empalagosa después de un rato.', 'nutella4.jpg', 2),
(9, 'Carlos Ramírez', 5, 'El pistacho combina a la perfección con la tarta de queso. ¡Increíble!', 'pistacho.jpg', 3),
(10, 'Sofía Pérez', 4, 'Muy buena, pero el pistacho no es tan fuerte como esperaba.', 'pistacho2.jpg', 3),
(11, 'Javier Fernández', 5, 'Un sabor diferente, pero delicioso. ¡Altamente recomendada!', 'pistacho3.jpg', 3),
(12, 'Marina Rodríguez', 5, 'El toque de pistacho le da un extra a esta tarta de queso. Simplemente genial.', 'pistacho4.jpg', 3),
(13, 'Ana Vargas', 4, 'El dulce de leche es delicioso, aunque un poco demasiado dulce.', 'dulceLeche.jpg', 4),
(14, 'José Martínez', 5, 'Perfecta combinación de dulce de leche con la tarta de queso. ¡Me encantó!', 'dulceLeche2.jpg', 4),
(15, 'Raúl Sánchez', 3, 'Buena, pero creo que le sobra un poco de dulce.', 'dulceLeche3.jpg', 4),
(16, 'Carla Muñoz', 5, 'Si te gusta el dulce de leche, esta es tu tarta ideal. ¡Me fascinó!', 'dulceLeche4.jpg', 4),
(17, 'Luis García', 5, 'El toque de Lotus es espectacular. Un postre que no te puedes perder.', 'lotus.jpg', 5),
(18, 'Marta López', 4, 'Deliciosa, pero un poco densa para mi gusto.', 'lotus2.jpg', 5),
(19, 'Fernando Vega', 5, 'Perfecta en sabor y textura. Muy recomendable.', 'lotus3.jpg', 5),
(20, 'Isabel Ramírez', 5, 'La combinación de Lotus con queso es simplemente exquisita.', 'lotus4.jpg', 5),
(21, 'Juan Ruiz', 5, 'El sabor refrescante del maracuyá combina perfectamente con la tarta de queso.', 'maracuya.jpg', 6),
(22, 'Carmen Fernández', 4, 'Muy buena, pero un poco ácida para mi gusto. Aun así, deliciosa.', 'maracuya2.jpg', 6),
(23, 'Daniela Torres', 5, 'Un sabor tropical que le da un toque especial a la tarta de queso.', 'maracuya3.jpg', 6),
(24, 'Santiago Díaz', 5, 'La mezcla de maracuyá y queso es perfecta. Muy refrescante.', 'maracuya4.jpg', 6),
(25, 'María Rodríguez', 4, 'Buena, pero esperaba un poco más de sabor a fresa.', 'fresa.jpg', 7),
(26, 'José Gómez', 5, 'La combinación de fresa y queso es deliciosa. Muy recomendada.', 'fresa2.jpg', 7),
(27, 'Sofía Sánchez', 3, 'Me gusta, pero la fresa no es tan intensa como me gustaría.', 'fresa3.jpg', 7),
(28, 'Pablo López', 5, 'La fresa le da un toque refrescante a la tarta de queso. Muy buena.', 'fresa4.jpg', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tartas`
--

CREATE TABLE `tartas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `ingredientes` text NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tartas`
--

INSERT INTO `tartas` (`id`, `nombre`, `descripcion`, `img`, `ingredientes`, `precio`) VALUES
(1, 'Tarta de Queso Original', 'La tarta de queso es cremosa y suave, con base de galleta crujiente. Tiene un toque dulce y ligeramente ácido, perfecta con mermelada o frutas frescas. Es un postre elegante y delicioso.', './img/tarta.png', '200 g de galletas trituradas\r\n100 g de mantequilla derretida\r\n600 g de queso crema\r\n150 g de azúcar\r\n3 huevos\r\n200 ml de nata (crema) para montar\r\n1 cucharadita de extracto de vainilla (opcional)\r\nMermelada o frutas para decorar (opcional)', 29),
(2, 'Tarta de Nutella ', 'La tarta de queso con Nutella es suave y cremosa, con una base de galleta crujiente y un relleno que mezcla queso crema y Nutella. Dulce y deliciosa, ideal para los amantes del chocolate.', './img/tarta.png', '200 g de galletas trituradas\r\n100 g de mantequilla derretida\r\n600 g de queso crema\r\n150 g de Nutella\r\n100 g de azúcar\r\n3 huevos\r\n200 ml de nata (crema) para montar\r\n1 cucharadita de extracto de vainilla (opcional)', 29),
(3, 'Tarta de Queso con Pistacho', 'La tarta de queso con pistacho es cremosa y suave, con un toque delicado de frutos secos. Su base crujiente de galleta contrasta con el sabor único y ligeramente salado del pistacho.', './img/tarta.png', '200 g de galletas trituradas\r\n100 g de mantequilla derretida\r\n600 g de queso crema\r\n150 g de crema de pistacho\r\n100 g de azúcar\r\n3 huevos\r\n200 ml de nata (crema) para montar\r\n50 g de pistachos picados (para decorar)', 29),
(4, 'Tarta de Queso con Dulce De Leche', 'La tarta de queso con dulce de leche es suave y cremosa, combinando el sabor dulce y caramelizado del dulce de leche con la base crujiente de galletas. Un postre irresistible.', './img/tarta.png', '200 g de galletas trituradas\r\n100 g de mantequilla derretida\r\n600 g de queso crema\r\n150 g de dulce de leche\r\n100 g de azúcar\r\n3 huevos\r\n200 ml de nata (crema) para montar\r\nDulce de leche extra para decorar (opcional)', 29),
(5, 'Tarta de Queso de Lotus', 'La tarta de queso con Lotus combina el sabor especiado y caramelizado de las galletas Lotus con una base crujiente y un relleno cremoso. Un postre original y delicioso.', './img/tarta.png', '200 g de galletas Lotus trituradas\r\n100 g de mantequilla derretida\r\n600 g de queso crema\r\n150 g de crema de Lotus (Biscoff)\r\n100 g de azúcar\r\n3 huevos\r\n200 ml de nata (crema) para montar\r\nGalletas Lotus adicionales para decorar (opcional)', 29),
(6, 'Tarta de Queso con Maracuyá', 'La tarta de queso con maracuyá es fresca y cremosa, con un toque exótico y tropical. Su base crujiente contrasta con el relleno suave y el sabor ácido y dulce del maracuyá.', './img/tarta.png', '200 g de galletas trituradas\r\n100 g de mantequilla derretida\r\n600 g de queso crema\r\n150 g de pulpa de maracuyá\r\n100 g de azúcar\r\n3 huevos\r\n200 ml de nata (crema) para montar\r\nPulpa de maracuyá extra para decorar (opcional)', 29),
(7, 'Tarta de Queso de Fresa', 'La tarta de queso con fresa es suave y dulce, con una base crujiente y un relleno cremoso cubierto con fresas frescas o mermelada. Es un postre fresco y lleno de sabor frutal.\r\n\r\n', './img/tarta.png', '200 g de galletas trituradas\r\n100 g de mantequilla derretida\r\n600 g de queso crema\r\n150 g de mermelada de fresa o fresas frescas trituradas\r\n100 g de azúcar\r\n3 huevos\r\n200 ml de nata (crema) para montar\r\nFresas frescas para decorar (opcional)', 29);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tartas`
--
ALTER TABLE `tartas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `tartas`
--
ALTER TABLE `tartas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
