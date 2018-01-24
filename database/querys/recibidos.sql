-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-01-2018 a las 17:24:48
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
-- Volcado de datos para la tabla `recibidos`
--

INSERT INTO `recibidos` (`id`, `id_recibido`, `tipo`, `f_creacion`, `codigo`, `remitente`, `adjunto`, `file`, `observacion`, `referencia`, `estado`, `accion`, `id_user_destino`, `created_at`, `updated_at`) VALUES
(1, 1, 'Carta', '2018-01-08', 'R-001', 'Administración Edificio', 'Acta', '001-Copropietarios Edif. Tango-Acta de Reunión de Copropietarios e Inquilinos 27-12-2017.pdf', '', 'Acta de Reunion Copropietarios', 'Abierto', 'Reg. Correspondencia', 4, '2018-01-08 04:00:00', NULL),
(2, 2, 'Otros', '2018-01-08', 'R-002', 'CSBP', 'Carta', '002- CSBP- CIRCULAR- SOLICITUD DE INFORMACION.pdf', 'Ninguna', 'Circular, Solicitud de información', 'Abierto', 'Reg. Correspondencia', 4, '2018-01-24 15:14:03', '2018-01-24 15:14:03'),
(3, 3, 'Factura', '2018-01-08', 'R-003', 'Detekta SRL', 'Carta', '003-DETEKTA S.R.L.-Factura 7711 (Enero 2018).pdf', 'Ninguna', 'Factura #7711/Enero 18', 'Abierto', 'Reg. Correspondencia', 11, '2018-01-24 15:14:51', '2018-01-24 15:14:51'),
(4, 4, 'Otros', '2018-01-09', 'R-004', 'Banco Pyme Ecofuturo', 'Carta', '004-Banco Pyme ECOFUTURO S.A.-Remisión Reporte Mensual Diciembre 2017-Fideicomiso M.R..pdf', 'Ninguna', 'Remisión reporte mensual diciembre 2017- Fideicomiso', 'Abierto', 'Reg. Correspondencia', 4, '2018-01-24 15:16:43', '2018-01-24 15:16:43'),
(5, 5, 'Factura', '2018-01-09', 'R-005', 'Banco Bisa', 'Carta', '005-BANCO BISA-FACTURA 115220.pdf', 'Ninguna', 'Factura #115220, Transferencia otro banco', 'Abierto', 'Reg. Correspondencia', 11, '2018-01-24 15:17:44', '2018-01-24 15:17:44'),
(6, 6, 'Otros', '2018-01-09', 'R-006', 'Banco Bisa', 'Carta', '006-BANCO BISA-10 ESTADOS DE CTA.pdf', 'Ninguna', '10 Estados de cuenta', 'Abierto', 'Reg. Correspondencia', 4, '2018-01-24 15:20:14', '2018-01-24 15:20:14'),
(7, 7, 'Factura', '2018-01-09', 'R-007', 'De La Paz', 'Carta', '007-DE LA PAZ S.A.- Facturas #496111-496136.pdf', 'Ninguna', '2 Facturas - 496111 - 496136', 'Abierto', 'Reg. Correspondencia', 11, '2018-01-24 15:21:17', '2018-01-24 15:21:17'),
(8, 8, 'Otros', '2018-01-09', 'R-008', 'Banco Fie', 'Carta', '008-BANCO FIE-Remite nuevo título representativo de acciones en el Banco Fie S.A..pdf', 'Ninguna', 'Remite nuevo titulo acciones', 'Abierto', 'Reg. Correspondencia', 4, '2018-01-24 15:22:38', '2018-01-24 15:22:38'),
(9, 9, 'Otros', '2018-01-10', 'R-009', 'Nacional Seguros', 'Carta', '009-NACIONAL SEGUROS-Remisión documentación.pdf', 'Ninguna', 'Remision Documentacion', 'Abierto', 'Reg. Correspondencia', 4, '2018-01-24 15:23:30', '2018-01-24 15:23:30'),
(10, 10, 'Carta', '2018-01-10', 'R-010', 'Banco Fortaleza', 'Carta', '010-BANCO FORTALEZA-Solicitud de Información.pdf', 'Ninguna', 'Solicitud de Informacion', 'Abierto', 'Reg. Correspondencia', 4, '2018-01-24 15:26:49', '2018-01-24 15:26:49'),
(11, 11, 'Carta', '2018-01-10', 'R-011', 'Futuro AFP', 'Carta', '011-FUTURO DE BOLIVIA AFP-Observaciones en pago de aportes de consultores.pdf', 'Ninguna', 'Observación en pago de aportes', 'Abierto', 'Reg. Correspondencia', 4, '2018-01-24 15:27:34', '2018-01-24 15:27:34'),
(12, 12, 'Carta', '2018-01-11', 'R-012', 'Unibol Courier', 'Carta', '012-UNIBOL COURIER-Solicitud cambio de cheque.pdf', 'Ninguna', 'Solicitud cambio de chueque', 'Abierto', 'Reg. Correspondencia', 4, '2018-01-24 16:02:29', '2018-01-24 16:02:29'),
(13, 13, 'Carta', '2018-01-12', 'R-013', 'Banco Fie', 'Carta', '013-BANCO FIE- Solicitud de Información.pdf', 'Ninguna', 'Solicitud de Informacion', 'Abierto', 'Reg. Correspondencia', 4, '2018-01-24 16:03:18', '2018-01-24 16:03:18'),
(14, 14, 'Carta', '2018-01-12', 'R-014', 'Gonzalo Araoz', 'Carta', '014-Gonzalo Araoz Leaño- Fin de Consultoría.pdf', 'Ninguna', 'Fin de Consultoria', 'Abierto', 'Reg. Correspondencia', 4, '2018-01-24 16:04:26', '2018-01-24 16:04:26'),
(15, 15, 'Otros', '2018-01-15', 'R-015', 'Ing. A. Marañon', 'Carta', '015-Ing. Ana Marañon-Remodelación piso 3.pdf', 'Ninguna', 'Remodelacion Piso 3', 'Abierto', 'Reg. Correspondencia', 4, '2018-01-24 16:06:41', '2018-01-24 16:06:41'),
(16, 16, 'Recibo', '2018-01-15', 'R-016', 'Decosur', 'Proforma', '016-Decosur-Proforma 1801.pdf', 'Ninguna', 'Proforma #1801', 'Abierto', 'Reg. Correspondencia', 11, '2018-01-24 16:18:57', '2018-01-24 16:18:57'),
(17, 17, 'Carta', '2018-01-15', 'R-017', 'Talento', 'Propuesta', '017-TALENTO-Propuesta de Servicios.pdf', 'Ninguna', 'Propuesta de Servicios', 'Abierto', 'Reg. Correspondencia', 4, '2018-01-24 16:19:55', '2018-01-24 16:19:55'),
(18, 18, 'Otros', '2018-01-15', 'R-018', 'Banco Pyme Ecofuturo', 'Adenda', '018-Banco Pyme Ecofuturo S.A.-Remisión Adenda Ctto de Fideicomiso M.R..pdf', 'Ninguna', 'Remisión adenda Mercados Rurales', 'Abierto', 'Reg. Correspondencia', 4, '2018-01-24 16:20:56', '2018-01-24 16:20:56'),
(19, 19, 'Otros', '2018-01-15', 'R-019', 'Fundación Aru', 'Informe', '019-FUNDACIÓN ARU-Adj. Informe Final Productos 4 y 5.pdf', 'Ninguna', 'Adjunto Informe Final Prod 4 y 5', 'Abierto', 'Reg. Correspondencia', 4, '2018-01-24 16:21:49', '2018-01-24 16:21:49'),
(20, 20, 'Otros', '2018-01-16', 'R-020', 'Alianza Seguros', 'Convenio', '020-Alianza Seguros- Convenio Esp. de Coop. Inter. IDEPRO-ALIANZA-PROFIN.pdf', 'Ninguna', 'Convenio especifico IDEPRO', 'Abierto', 'Reg. Correspondencia', 4, '2018-01-24 16:22:38', '2018-01-24 16:22:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
