-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-06-2019 a las 11:39:09
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
  PRIMARY KEY (`usuario`,`idPregunta`),
  KEY `fkPregunta` (`idPregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE IF NOT EXISTS `preguntas` (
  `idPregunta` int(11) NOT NULL AUTO_INCREMENT,
  `idCategoria` int(11) NOT NULL,
  `pregunta` varchar(100) NOT NULL,
  `texto_final` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idPregunta`),
  KEY `fkCategoria` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`idPregunta`, `idCategoria`, `pregunta`, `texto_final`) VALUES
(1, 6, '¿Quién escribió La Odisea?', 'Es un gran poema que fue escrito por Homero'),
(2, 6, '¿Qué artista pintó \"Baco\"?', 'Muy linda pintura');

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
(1, 1, 'Homero', 100),
(1, 2, 'Rembrandt', 0),
(2, 1, 'Eduardo Galeano', 0),
(2, 2, 'Rubens', 0),
(3, 1, 'Borges', 0),
(3, 2, 'Caravaggio', 100),
(4, 1, 'Maria Elena Walsh', 0),
(4, 2, 'Renoir', 100);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD CONSTRAINT `estadisticas_ibfk_1` FOREIGN KEY (`idPregunta`) REFERENCES `preguntas` (`idPregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`idPregunta`) REFERENCES `preguntas` (`idPregunta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
