-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-07-2019 a las 13:58:50
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `esimetro_db`
--
CREATE DATABASE IF NOT EXISTS `esimetro_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `esimetro_db`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `insertar_Categoria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_Categoria` (IN `nombre_categoria` VARCHAR(100))  BEGIN
	IF NOT EXISTS (SELECT * FROM categorias WHERE categoria = nombre_Categoria) THEN
        INSERT INTO categorias (categoria) VALUES (nombre_Categoria);
	END IF;
END$$

DROP PROCEDURE IF EXISTS `insertar_Estadistica`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_Estadistica` (IN `id_usuario` INT, IN `id_pregunta` INT, IN `id_respuesta` INT)  BEGIN
	INSERT INTO estadisticas (usuario, idPregunta, respuesta) VALUES (id_usuario, id_pregunta, id_respuesta);

END$$

DROP PROCEDURE IF EXISTS `insertar_Pregunta`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_Pregunta` (IN `nombre_categoria` VARCHAR(100), IN `preguntanow` VARCHAR(100), `texto` VARCHAR(200))  BEGIN
DECLARE id_categoria INT;
	IF EXISTS (SELECT * FROM categorias WHERE categoria = nombre_Categoria) THEN
        SELECT idCategoria FROM categorias WHERE categoria = nombre_Categoria INTO id_categoria;
        
        IF NOT EXISTS (SELECT * FROM preguntas WHERE pregunta = preguntanow AND categoria = id_categoria) THEN
        INSERT INTO preguntas (idCategoria, pregunta, texto_final) VALUES (id_categoria, preguntanow, texto);
        END IF;
	
    END IF;
END$$

DROP PROCEDURE IF EXISTS `insertar_Respuesta`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_Respuesta` (IN `id_pregunta` INT, IN `opcionnow` INT, IN `respuestanow` VARCHAR(100), IN `ponderacionnow` INT)  BEGIN
	IF EXISTS (SELECT * FROM preguntas WHERE idPregunta = id_pregunta) THEN
        IF EXISTS (SELECT * FROM respuestas WHERE idPregunta = id_pregunta AND opcion = opcionnow) THEN
            UPDATE respuestas SET respuesta = respuestanow, ponderacion = ponderacionnow
            WHERE idPregunta = id_pregunta AND opcion = opcionnow;
        ELSE
			 INSERT INTO respuestas (opcion, idPregunta, respuesta, ponderacion) VALUES (opcionnow, id_pregunta, respuestanow, ponderacionnow);
		END IF;
    END IF;
END$$

DROP PROCEDURE IF EXISTS `listar_Categorias`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_Categorias` ()  BEGIN
	IF EXISTS (SELECT * FROM categorias) THEN
		SELECT * FROM categorias;
    END IF;
END$$

DROP PROCEDURE IF EXISTS `listar_Preguntas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_Preguntas` (IN `idcategoria` INT)  BEGIN
	IF EXISTS (SELECT * FROM preguntas WHERE idCategoria = idcategoria) THEN
		SELECT * FROM preguntas WHERE preguntas.idCategoria = idcategoria;
	END IF;
END$$

DROP PROCEDURE IF EXISTS `listar_Respuestas`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_Respuestas` (IN `idPregunta` INT)  BEGIN
	IF EXISTS (SELECT * FROM respuestas WHERE idPregunta = idPregunta) THEN
		SELECT * FROM respuestas WHERE respuestas.idPregunta = idPregunta;
	END IF;
END$$

DROP PROCEDURE IF EXISTS `traer_Categoria`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `traer_Categoria` (IN `idcategorianow` INT, OUT `categorianow` VARCHAR(100))  BEGIN
	IF EXISTS (SELECT * FROM categorias WHERE idCategoria = idcategorianow) THEN
		SELECT categoria FROM categorias WHERE idCategoria = idcategorianow INTO categorianow;
    END IF;
END$$

DROP PROCEDURE IF EXISTS `traer_Ponderacion`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `traer_Ponderacion` (IN `p_idPregunta` INT(10), IN `p_respuesta` INT(10))  NO SQL
BEGIN
	IF EXISTS (SELECT ponderacion FROM respuestas WHERE idPregunta = p_idPregunta AND opcion = p_respuesta) THEN
		SELECT ponderacion FROM respuestas WHERE idPregunta = p_idPregunta AND opcion = p_respuesta;
    END IF;
END$$

DROP PROCEDURE IF EXISTS `traer_Pregunta`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `traer_Pregunta` (IN `id_pregunta` INT)  BEGIN
	IF EXISTS (SELECT * FROM preguntas WHERE idPregunta = id_pregunta) THEN
		SELECT * FROM preguntas WHERE idPregunta = id_pregunta;
	END IF;
END$$

DROP PROCEDURE IF EXISTS `traer_Respuesta`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `traer_Respuesta` (IN `id_pregunta` INT, IN `opcionnow` INT)  BEGIN
	IF EXISTS (SELECT * FROM respuestas WHERE idPregunta = id_pregunta AND opcion = opcionnow) THEN
		SELECT opcion, respuesta, ponderacion FROM respuestas WHERE idPregunta = id_pregunta AND opcion = opcionnow;
    END IF;
END$$

DROP PROCEDURE IF EXISTS `traer_UltimaEstadistica`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `traer_UltimaEstadistica` (OUT `idusuario` INT)  BEGIN
	IF EXISTS (SELECT * FROM estadisticas) THEN
		SELECT MAX(usuario) FROM estadisticas INTO idusuario;
	ELSE
		SET idusuario = 0;
	END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `categoria`) VALUES
(6, 'basico'),
(7, 'superior'),
(8, 'padres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas`
--

DROP TABLE IF EXISTS `estadisticas`;
CREATE TABLE IF NOT EXISTS `estadisticas` (
  `usuario` varchar(100) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `respuesta` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usuario`,`idPregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estadisticas`
--

INSERT INTO `estadisticas` (`usuario`, `idPregunta`, `respuesta`, `fecha_hora`) VALUES
('10', 1, 1, '2019-07-22 13:56:22'),
('10', 2, 3, '2019-07-22 13:56:36'),
('2', 1, 3, '2019-07-19 13:25:20'),
('2', 2, 1, '2019-07-19 13:25:21'),
('3', 1, 1, '2019-07-22 12:19:56'),
('4', 1, 3, '2019-07-22 12:20:37'),
('5', 1, 3, '2019-07-22 12:34:16'),
('6', 1, 3, '2019-07-22 12:59:02'),
('6', 2, 1, '2019-07-22 12:59:08'),
('6', 3, 4, '2019-07-22 12:59:13'),
('6', 4, 3, '2019-07-22 12:59:18'),
('6', 5, 1, '2019-07-22 12:59:24'),
('7', 1, 2, '2019-07-22 13:13:01'),
('7', 2, 3, '2019-07-22 13:13:03'),
('7', 3, 4, '2019-07-22 13:13:04'),
('7', 4, 2, '2019-07-22 13:13:05'),
('7', 5, 2, '2019-07-22 13:13:07'),
('8', 1, 3, '2019-07-22 13:19:25'),
('8', 2, 1, '2019-07-22 13:19:26'),
('8', 3, 3, '2019-07-22 13:19:28'),
('8', 4, 2, '2019-07-22 13:19:29'),
('8', 5, 4, '2019-07-22 13:19:30'),
('9', 1, 3, '2019-07-22 13:23:14'),
('9', 2, 2, '2019-07-22 13:23:15'),
('9', 3, 4, '2019-07-22 13:23:16'),
('9', 4, 3, '2019-07-22 13:23:17'),
('9', 5, 1, '2019-07-22 13:23:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE IF NOT EXISTS `preguntas` (
  `idPregunta` int(11) NOT NULL AUTO_INCREMENT,
  `idCategoria` int(11) NOT NULL,
  `pregunta` varchar(200) NOT NULL,
  `texto_final` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idPregunta`),
  KEY `fkCategoria` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`idPregunta`, `idCategoria`, `pregunta`, `texto_final`) VALUES
(1, 6, '¿Cómo te gustaría que se vista la conductora de un programa de TV?', 'Este es el texto final de la pregunta 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In aliquam turpis vitae lectus vehicula.'),
(2, 6, 'En tu última publicación de instagram tuviste solo 3 likes, ¿Cómo reaccionas? ', 'Texto final pregunta 2'),
(3, 6, 'Uso las redes sociales para', 'Texto final pregunta 3'),
(4, 6, 'Viene una amiga y te plantea que le gusta Mecatrónica pero no la elige porque “no hay pibas” ¿Qué le decís?', 'Texto final pregunta 4\r\n'),
(5, 6, '¿Qué harías si en un programa de TV actual el conductor le corta la pollera a las participantes?', 'Texto final pregunta 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
CREATE TABLE IF NOT EXISTS `respuestas` (
  `opcion` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `respuesta` varchar(100) NOT NULL,
  `ponderacion` int(11) NOT NULL,
  PRIMARY KEY (`opcion`,`idPregunta`),
  KEY `fkPregunta` (`idPregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`opcion`, `idPregunta`, `respuesta`, `ponderacion`) VALUES
(1, 1, 'Escote y pollerita corta', 40),
(1, 2, 'Me pongo mal y la borro', 40),
(1, 3, 'Sólo compartir con amigos/as ', 10),
(1, 4, 'Que siga Gestión o Constru porque hay pibas', 40),
(1, 5, 'Me río y lo sigo viendo', 40),
(2, 1, 'Pantalón y camisa', 20),
(2, 2, 'No me importa, la dejo independientemente de la reacción', 10),
(2, 3, 'Para idealizar una vida', 40),
(2, 4, 'Que siga lo que le guste', 10),
(2, 5, 'Lo sigo viendo, no me molesta', 30),
(3, 1, 'Vestido largo', 30),
(3, 2, 'Trato de conseguir mas likes', 30),
(3, 3, 'Para entretenerme', 20),
(3, 4, 'Que siga a sus amigos', 30),
(3, 5, 'Cambio de canal, presento una queja', 10),
(4, 1, 'Como ella quiera', 10),
(4, 2, 'Nunca publico fotos en Instagram', 20),
(4, 3, 'Para sentirme parte', 30),
(4, 4, 'Que siga la de mejor salida laboral', 20),
(4, 5, 'Lo sigo viendo pero me molesta y no está bien lo que pasó', 20);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`idPregunta`) REFERENCES `preguntas` (`idPregunta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
