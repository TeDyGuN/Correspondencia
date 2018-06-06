-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-01-2018 a las 17:25:13
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisco`
--

--
-- Volcado de datos para la tabla `procesos`
--

INSERT INTO `procesos` (`id`, `accion`, `estado`, `referencia`, `id_recibido`, `id_user`, `id_user_destino`, `created_at`, `updated_at`) VALUES
(1, 'Reg. Correspondencia', 'Abierto', 'Acta de Reunion Copropietarios', 1, 2, 4, '2018-01-08 04:00:00', NULL),
(2, 'Reg. Correspondencia', 'Abierto', 'Circular, Solicitud de información', 2, 1, 4, '2018-01-24 15:14:03', '2018-01-24 15:14:03'),
(3, 'Reg. Correspondencia', 'Abierto', 'Factura #7711/Enero 18', 3, 1, 11, '2018-01-24 15:14:51', '2018-01-24 15:14:51'),
(4, 'Reg. Correspondencia', 'Abierto', 'Remisión reporte mensual diciembre 2017- Fideicomiso', 4, 1, 4, '2018-01-24 15:16:43', '2018-01-24 15:16:43'),
(5, 'Reg. Correspondencia', 'Abierto', 'Factura #115220, Transferencia otro banco', 5, 1, 11, '2018-01-24 15:17:44', '2018-01-24 15:17:44'),
(6, 'Reg. Correspondencia', 'Abierto', '10 Estados de cuenta', 6, 1, 4, '2018-01-24 15:20:14', '2018-01-24 15:20:14'),
(7, 'Reg. Correspondencia', 'Abierto', '2 Facturas - 496111 - 496136', 7, 1, 11, '2018-01-24 15:21:17', '2018-01-24 15:21:17'),
(8, 'Reg. Correspondencia', 'Abierto', 'Remite nuevo titulo acciones', 8, 1, 4, '2018-01-24 15:22:38', '2018-01-24 15:22:38'),
(9, 'Reg. Correspondencia', 'Abierto', 'Remision Documentacion', 9, 1, 4, '2018-01-24 15:23:31', '2018-01-24 15:23:31'),
(10, 'Reg. Correspondencia', 'Abierto', 'Solicitud de Informacion', 10, 1, 4, '2018-01-24 15:26:49', '2018-01-24 15:26:49'),
(11, 'Reg. Correspondencia', 'Abierto', 'Observación en pago de aportes', 11, 1, 4, '2018-01-24 15:27:34', '2018-01-24 15:27:34'),
(12, 'Reg. Correspondencia', 'Abierto', 'Solicitud cambio de chueque', 12, 1, 4, '2018-01-24 16:02:29', '2018-01-24 16:02:29'),
(13, 'Reg. Correspondencia', 'Abierto', 'Solicitud de Informacion', 13, 1, 4, '2018-01-24 16:03:18', '2018-01-24 16:03:18'),
(14, 'Reg. Correspondencia', 'Abierto', 'Fin de Consultoria', 14, 1, 4, '2018-01-24 16:04:26', '2018-01-24 16:04:26'),
(15, 'Reg. Correspondencia', 'Abierto', 'Remodelacion Piso 3', 15, 1, 4, '2018-01-24 16:06:41', '2018-01-24 16:06:41'),
(16, 'Reg. Correspondencia', 'Abierto', 'Proforma #1801', 16, 1, 11, '2018-01-24 16:18:57', '2018-01-24 16:18:57'),
(17, 'Reg. Correspondencia', 'Abierto', 'Propuesta de Servicios', 17, 1, 4, '2018-01-24 16:19:55', '2018-01-24 16:19:55'),
(18, 'Reg. Correspondencia', 'Abierto', 'Remisión adenda Mercados Rurales', 18, 1, 4, '2018-01-24 16:20:56', '2018-01-24 16:20:56'),
(19, 'Reg. Correspondencia', 'Abierto', 'Adjunto Informe Final Prod 4 y 5', 19, 1, 4, '2018-01-24 16:21:49', '2018-01-24 16:21:49'),
(20, 'Reg. Correspondencia', 'Abierto', 'Convenio especifico IDEPRO', 20, 1, 4, '2018-01-24 16:22:38', '2018-01-24 16:22:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
