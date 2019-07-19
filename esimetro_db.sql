-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-07-2019 a las 15:05:43
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE IF NOT EXISTS `preguntas` (
  `idPregunta` int(11) NOT NULL AUTO_INCREMENT,
  `idCategoria` int(11) NOT NULL,
  `pregunta` varchar(500) NOT NULL,
  `texto_final` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idPregunta`),
  KEY `fkCategoria` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`idPregunta`, `idCategoria`, `pregunta`, `texto_final`) VALUES
(3, 1, '¿Cómo te gustaría que se vista la conductora de un programa de TV?', 'textofinal - TV'),
(4, 1, '¿Qué harías si en un programa de TV actual el conductor le corta la pollera a las participantes?', 'textofinal - PARTICIPANTES'),
(5, 1, 'En tu última publicación de instragram tuviste solo 3 likes, Cómo reaccionas?', 'textofinal - INSTAGRAM'),
(6, 1, 'Uso las redes sociales para…', 'textofinal - REDES SOCIALES'),
(7, 1, 'Viene una amiga y te plantea que le gusta Mecatrónica pero no la elige porque “no hay pibas” ¿Qué le decís?', 'textofinal - MECATRONICA');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
