-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-10-2014 a las 23:31:14
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ceiscomc_ceisc`
--
CREATE DATABASE IF NOT EXISTS `ceiscomc_ceisc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ceiscomc_ceisc`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `level` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `level`) VALUES
(1, 'Mr. Admin', 'admin@admin.com', 'admin2014@', '1'),
(2, 'operativo@ceis.com.co', 'operativo@ceis.com.co', 'vigilancia2014@', '1'),
(3, 'direccion@ceis.com.co', 'direccion@ceis.com.co', 'vigilancia2014@', '1'),
(4, 'administrativo@ceis.com.co', 'administrativo@ceis.com.co', 'vigilancia2014@', '1'),
(5, 'recepcion@ceis.com.co\r\n', 'recepcion@ceis.com.co\r\n', 'vigilancia2014@', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `author` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fcha_inicio` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fcha_fin` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hora_inicio` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hora_fin` longtext COLLATE utf8_unicode_ci NOT NULL,
  `cupo` int(11) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `class`
--

INSERT INTO `class` (`class_id`, `name`, `fcha_inicio`, `fcha_fin`, `hora_inicio`, `hora_fin`, `cupo`) VALUES
(3, 'Fundamentacion en Escolta', '09/15/2014', '09/19/2014', '7', '9', 35),
(4, 'Reentrenamiento Vigilancia', '10/20/2014', '10/31/2014', '7', '6', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `class_routine`
--

CREATE TABLE IF NOT EXISTS `class_routine` (
  `class_routine_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `time_start` int(11) NOT NULL,
  `time_end` int(11) NOT NULL,
  `day` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`class_routine_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `class_routine`
--

INSERT INTO `class_routine` (`class_routine_id`, `class_id`, `subject_id`, `time_start`, `time_end`, `day`) VALUES
(1, 3, 1, 7, 10, 'monday');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dormitory`
--

CREATE TABLE IF NOT EXISTS `dormitory` (
  `dormitory_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `number_of_room` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`dormitory_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email_template`
--

CREATE TABLE IF NOT EXISTS `email_template` (
  `email_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `task` longtext COLLATE utf8_unicode_ci NOT NULL,
  `subject` longtext COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`email_template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
  `empresas_id` int(11) NOT NULL AUTO_INCREMENT,
  `nit_empresas` int(11) NOT NULL,
  `nombre_empresas` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contacto_empresa` int(13) NOT NULL,
  PRIMARY KEY (`empresas_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`empresas_id`, `nit_empresas`, `nombre_empresas`, `contacto_empresa`) VALUES
(6, 2, 'Servies', 0),
(5, 1, 'Videlca', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `exam_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `exam`
--

INSERT INTO `exam` (`exam_id`, `name`, `date`, `comment`) VALUES
(1, 'fredy', '09/15/2014', 'ret');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `grade_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `grade_point` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mark_from` int(11) NOT NULL,
  `mark_upto` int(11) NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `grade`
--

INSERT INTO `grade` (`grade_id`, `name`, `grade_point`, `mark_from`, `mark_upto`, `comment`) VALUES
(1, 'fredy', '98', 89, 89, '88');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `creation_timestamp` int(11) NOT NULL,
  `payment_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'paid or unpaid',
  PRIMARY KEY (`invoice_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `student_id`, `title`, `description`, `amount`, `creation_timestamp`, `payment_timestamp`, `payment_method`, `payment_details`, `status`) VALUES
(1, 0, '', '', 0, 0, '', '', '', 'paid');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `phrase_id` int(11) NOT NULL AUTO_INCREMENT,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`phrase_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=450 ;

--
-- Volcado de datos para la tabla `language`
--

INSERT INTO `language` (`phrase_id`, `phrase`, `english`) VALUES
(1, 'login', 'Registro'),
(2, 'account_type', 'Tipo de Cuenta'),
(3, 'admin', 'Administrador'),
(4, 'teacher', 'Profesores'),
(5, 'student', 'Estudiantes'),
(6, 'parent', 'Padres'),
(7, 'email', 'E-Mail'),
(8, 'password', 'Contraseña'),
(9, 'forgot_password ?', 'Olvido su Contraseña'),
(10, 'reset_password', 'Restablecer Contraseña'),
(11, 'reset', 'Resetear'),
(12, 'admin_dashboard', 'Administrador de Escritorio'),
(13, 'account', 'Cuenta'),
(14, 'profile', 'Perfil'),
(15, 'change_password', 'Cambiar Contraseña'),
(16, 'logout', 'Salir'),
(17, 'panel', 'Panel'),
(18, 'dashboard_help', 'Ayuda de Escritorio'),
(19, 'dashboard', 'Escritorio'),
(20, 'student_help', 'Área de registro de Estudiantes'),
(21, 'teacher_help', 'Ayuda de Profesores'),
(22, 'subject_help', 'Ayuda de Materias'),
(23, 'subject', 'Materias'),
(24, 'class_help', 'Ayuda de Cursos'),
(25, 'class', 'Cursos'),
(26, 'exam_help', 'Ayuda de Exámenes'),
(27, 'exam', 'Exámenes'),
(28, 'marks_help', 'Ayuda de Notas'),
(29, 'marks-attendance', 'Notas y Asistencias'),
(30, 'grade_help', 'Ayuda de Grado'),
(31, 'exam-grade', 'Examen de Grado'),
(32, 'class_routine_help', 'Ayuda de Horario de Cursos'),
(33, 'class_routine', 'Horario de Cursos'),
(34, 'invoice_help', 'Ayuda de Facturación'),
(35, 'payment', 'Facturación'),
(36, 'book_help', 'Ayuda de Documentos'),
(37, 'library', 'Documentos'),
(38, 'transport_help', ''),
(39, 'transport', ''),
(40, 'dormitory_help', ''),
(41, 'dormitory', ''),
(42, 'noticeboard_help', 'Ayuda de Noticias'),
(43, 'noticeboard-event', 'Noticias y Eventos'),
(44, 'bed_ward_help', ''),
(45, 'settings', 'Configuración'),
(46, 'system_settings', 'Configuración de Sistema'),
(47, 'manage_language', 'Manejo de Idioma'),
(48, 'backup_restore', 'Restaurar backup'),
(49, 'profile_help', 'Ayuda de Perfil'),
(50, 'manage_student', 'Gestionar Estudiantes'),
(51, 'manage_teacher', 'Gestionar Profesores'),
(52, 'noticeboard', 'Noticias'),
(53, 'language', 'Lenguaje'),
(54, 'backup', 'Backup'),
(55, 'calendar_schedule', 'Horario'),
(56, 'select_a_class', 'Seleccionar Cursos'),
(57, 'student_list', 'Lista de Estudiantes'),
(58, 'add_student', 'Agregar Estudiantes'),
(59, 'roll', ''),
(60, 'photo', 'Foto'),
(61, 'student_name', 'Nombre de Estudiante'),
(62, 'address', 'Dirección'),
(63, 'options', 'Opciones'),
(64, 'marksheet', 'Factura'),
(65, 'id_card', ''),
(66, 'edit', 'Editar'),
(67, 'delete', 'Borrar'),
(68, 'personal_profile', 'Perfil Personal'),
(69, 'academic_result', 'Resultados Academicos'),
(70, 'name', 'Nombre'),
(71, 'birthday', 'Cumpleaños'),
(72, 'sex', 'Sexo'),
(73, 'male', 'Masculino'),
(74, 'female', 'Femenino'),
(75, 'religion', 'Religión'),
(76, 'blood_group', 'Tipo de Sangre'),
(77, 'phone', 'Teléfono'),
(78, 'father_name', 'Primer Apellido'),
(79, 'mother_name', 'Segundo Apellido'),
(80, 'edit_student', 'Editar Estudiante'),
(81, 'teacher_list', 'Lista de Profesores'),
(82, 'add_teacher', 'Agregar Profesor'),
(83, 'teacher_name', 'Nombre de Profesor'),
(84, 'edit_teacher', 'Editar Profesor'),
(85, 'manage_parent', ''),
(86, 'parent_list', ''),
(87, 'parent_name', ''),
(88, 'relation_with_student', ''),
(89, 'parent_email', ''),
(90, 'parent_phone', ''),
(91, 'parrent_address', ''),
(92, 'parrent_occupation', ''),
(93, 'add', 'Agregar'),
(94, 'parent_of', ''),
(95, 'profession', 'Profesión'),
(96, 'edit_parent', ''),
(97, 'add_parent', ''),
(98, 'manage_subject', 'Gestionar Materias'),
(99, 'subject_list', 'Lista de Materias'),
(100, 'add_subject', 'Agregar Materias'),
(101, 'subject_name', 'Nombre de Materias'),
(102, 'edit_subject', 'Editar Materias'),
(103, 'manage_class', 'Gestionar Cursos'),
(104, 'class_list', 'Lista de Cursos'),
(105, 'add_class', 'Agregar Cursos'),
(106, 'class_name', 'Nombre de Cursos'),
(107, 'numeric_name', ''),
(108, 'name_numeric', ''),
(109, 'edit_class', 'Editar Cursos'),
(110, 'manage_exam', 'Gestionar Exámenes'),
(111, 'exam_list', 'Lista Exámenes'),
(112, 'add_exam', 'Agregar Exámenes'),
(113, 'exam_name', 'Nombre del Exámen'),
(114, 'date', 'Fecha'),
(115, 'comment', 'Comentarios'),
(116, 'edit_exam', 'Editar Exámen'),
(117, 'manage_exam_marks', 'Gestionar Notas de Exámenes'),
(118, 'manage_marks', 'Gestionar Notas'),
(119, 'select_exam', 'Seleccionar Examen'),
(120, 'select_class', 'Seleccionar Cursos'),
(121, 'select_subject', 'Seleccionar Materias'),
(122, 'select_an_exam', 'Seleccionar un Exámen'),
(123, 'mark_obtained', 'Notas Obtenidas'),
(124, 'attendance', 'Asistencia'),
(125, 'manage_grade', 'Gestionar Grado'),
(126, 'grade_list', 'Lista de Grado'),
(127, 'add_grade', 'Agregar Grado'),
(128, 'grade_name', 'Nombre de Grado'),
(129, 'grade_point', 'Punto de Grado'),
(130, 'mark_from', 'Nota Mínima'),
(131, 'mark_upto', 'Nota Máxima'),
(132, 'edit_grade', 'Editar Grado'),
(133, 'manage_class_routine', 'Gestionar Horario de Cursos'),
(134, 'class_routine_list', 'Lista de Horario de Cursos'),
(135, 'add_class_routine', 'Agregar Horario de Cursos'),
(136, 'day', 'Dia'),
(137, 'starting_time', 'Hora de Inicio'),
(138, 'ending_time', 'Hora de Fin'),
(139, 'edit_class_routine', 'Editar Horario de Curso'),
(140, 'manage_invoice/payment', 'Gestionar Facturas - Pagos'),
(141, 'invoice/payment_list', 'Lista de Facturas - Pagos'),
(142, 'add_invoice/payment', 'Agregar Facturas - Pagos'),
(143, 'title', 'Titulo'),
(144, 'description', 'Descripción'),
(145, 'amount', 'Cantidad'),
(146, 'status', 'Estado'),
(147, 'view_invoice', 'Ver Factura'),
(148, 'paid', 'Pago'),
(149, 'unpaid', 'No Pago'),
(150, 'add_invoice', 'Agregar Factura'),
(151, 'payment_to', 'Pagar a'),
(152, 'bill_to', 'Facturar a'),
(153, 'invoice_title', 'Titulo de Factura'),
(154, 'invoice_id', 'Código de Factura'),
(155, 'edit_invoice', 'Editar Factura'),
(156, 'manage_library_books', 'Gestionar Documentos'),
(157, 'book_list', 'Lista de Documentos'),
(158, 'add_book', 'Agregar Documento'),
(159, 'book_name', 'Nombre de Documento'),
(160, 'author', 'Autor'),
(161, 'price', 'Precio'),
(162, 'available', 'Valido'),
(163, 'unavailable', 'No Válido'),
(164, 'edit_book', 'Editar Documento'),
(165, 'manage_transport', ''),
(166, 'transport_list', ''),
(167, 'add_transport', ''),
(168, 'route_name', ''),
(169, 'number_of_vehicle', ''),
(170, 'route_fare', ''),
(171, 'edit_transport', ''),
(172, 'manage_dormitory', ''),
(173, 'dormitory_list', ''),
(174, 'add_dormitory', ''),
(175, 'dormitory_name', ''),
(176, 'number_of_room', ''),
(177, 'manage_noticeboard', 'Gestionar Noticias'),
(178, 'noticeboard_list', 'Lista de Noticias'),
(179, 'add_noticeboard', 'Agregar Noticias'),
(180, 'notice', 'Noticia'),
(181, 'add_notice', 'Agregar Noticia'),
(182, 'edit_noticeboard', 'Editar Noticias'),
(183, 'system_name', 'Nombre del Sistema'),
(184, 'save', 'Guardar'),
(185, 'system_title', 'Titulo de Sistema'),
(186, 'paypal_email', 'E-Mail de Pago'),
(187, 'currency', 'Moneda'),
(188, 'phrase_list', 'Lista de Fraces'),
(189, 'add_phrase', 'Agregar Frases'),
(190, 'add_language', 'Agregar Idioma'),
(191, 'phrase', 'Frases'),
(192, 'manage_backup_restore', 'Gestionar Backup'),
(193, 'restore', 'Restaurar'),
(194, 'mark', 'Nota'),
(195, 'grade', 'Grado'),
(196, 'invoice', 'Factura'),
(197, 'book', 'Documento'),
(198, 'all', 'Todo'),
(199, 'upload_&_restore_from_backup', 'Subir Y Restaurar desde Backup'),
(200, 'manage_profile', 'Gestionar Perfil'),
(201, 'update_profile', 'Actualizar Perfil'),
(202, 'new_password', 'Nueva Contraseña'),
(203, 'confirm_new_password', 'Confirmar Nueva Contraseña'),
(204, 'update_password', 'Actualizar Contraseña'),
(205, 'teacher_dashboard', 'Escritorio de Profesor'),
(206, 'backup_restore_help', 'Ayuda de Backup'),
(207, 'student_dashboard', 'Escritorio de Estudiante'),
(208, 'parent_dashboard', ''),
(209, 'view_marks', 'Ver Notas'),
(210, 'delete_language', ''),
(211, 'settings_updated', 'Configuración Actualizada'),
(212, 'update_phrase', 'Actualizar Palabras'),
(213, 'login_failed', 'Registro Fallido'),
(214, 'system_email', 'E-Mail de Sistema'),
(215, 'option', 'Opciones'),
(216, 'edit_phrase', 'Editar Frases'),
(217, 'alert_studinate', 'Por Favor Seleccione un Curso'),
(218, 'apellido', ''),
(219, 'fecha_inicio', ''),
(220, 'fecha_fin', ''),
(221, 'cupo_disponible', ''),
(222, 'empresas', ''),
(223, 'lista_de_empresas', ''),
(224, 'crear_empresas', ''),
(225, 'gestionar_empresas', ''),
(226, 'nit_empresas', ''),
(227, 'nombre_empresas', ''),
(228, 'contacto_empresa', ''),
(229, 'nit_empresa', ''),
(230, 'telefono_empresa', ''),
(231, 'crear_empresa', ''),
(232, 'documento', ''),
(233, 'lugar_de_expedicion', ''),
(234, 'fecha_de_expedicion', ''),
(235, 'primer_nombre', ''),
(236, 'segundo_nombre', ''),
(237, 'primer_apellido', ''),
(238, 'segundo_apellido', ''),
(239, 'fecha_de_nacimiento', ''),
(240, 'tipo_de_documento', ''),
(241, 'cedula', ''),
(242, 'tarjeta_militar', ''),
(243, 'numero_de_documento', ''),
(244, 'CEDULA_DE_CIUDADANIA', ''),
(245, 'CEDULA_DE_EXTRANJERIA', ''),
(246, 'VISA', ''),
(247, 'Número_de_Libreta_Militar', ''),
(248, 'estado_civil', ''),
(249, 'Soltero', ''),
(250, 'casado', ''),
(251, 'Separado', ''),
(252, 'Unión_Libre', ''),
(253, 'Viudo', ''),
(254, 'tipo_de_ingreso', ''),
(255, 'becado', ''),
(256, 'empresa', ''),
(257, 'otro', ''),
(258, 'tiene_hijos', ''),
(259, 'si', ''),
(260, 'no', ''),
(261, 'numero_de_hijos', ''),
(262, '1', ''),
(263, '2', ''),
(264, '3', ''),
(265, '4', ''),
(266, '5', ''),
(267, '6', ''),
(268, 'edit_empresas', ''),
(269, 'tlf_contacto', ''),
(270, 'tel_contacto', ''),
(271, 'Segundo_Nombre', ''),
(272, 'Primer_apellido', ''),
(273, 'Primer_apellido', ''),
(274, 'Primer_apellido', ''),
(275, 'Primer_apellido', ''),
(276, 'Primer_apellido', ''),
(277, 'fecha_de_inicio', ''),
(278, 'fecha_de_fin', ''),
(279, 'hora_de_inicio', ''),
(280, 'hora_de_fin', ''),
(281, 'opciones', ''),
(282, 'cupo', ''),
(283, 'id', ''),
(284, 'Actualizar_estudiante', ''),
(285, 'Union_Libre', ''),
(286, 'Union_Libre', ''),
(287, 'Union_Libre', ''),
(288, 'nombres', ''),
(289, 'curso', ''),
(290, 'Documento', ''),
(291, 'fecha_de_nacimineto', ''),
(292, 'Documento', ''),
(293, 'Documento', ''),
(294, 'Documento', ''),
(295, 'Gerencia', ''),
(296, 'Operativo', ''),
(297, 'Administrativo', ''),
(298, 'Profesor', ''),
(299, 'Recepcion', ''),
(300, 'Recepción', ''),
(301, 'Recepción', ''),
(302, 'Recepción', ''),
(303, 'Recepción', ''),
(304, 'Entrar', ''),
(305, 'Ingrear_al_sistema', ''),
(306, 'Recepción', ''),
(307, 'Recepción', ''),
(308, 'Ingresar_al_sistema', ''),
(309, 'Recepción', ''),
(310, 'Recepción', ''),
(311, 'Sistema_academico', ''),
(312, 'Recepción', ''),
(313, 'Recepción', ''),
(314, 'Recepción', ''),
(315, 'Recepción', ''),
(316, 'notice_updated', ''),
(317, 'account_updated', ''),
(318, 'Recepción', ''),
(319, 'Recepción', ''),
(320, 'Primer_apellido', ''),
(321, 'Recepción', ''),
(322, 'Recepción', ''),
(323, 'Recepción', ''),
(324, 'Recepción', ''),
(325, 'Convenio_sena', ''),
(326, 'convenio_sena', ''),
(327, 'convenio', ''),
(328, 'convenio_sena', ''),
(329, 'ninguno', ''),
(330, 'convenio_sena', ''),
(331, 'Nombre_convenio', ''),
(332, 'convenio_sena', ''),
(333, 'Recepción', ''),
(334, 'Recepción', ''),
(335, 'Recepción', ''),
(336, 'Recepción', ''),
(337, 'Recepción', ''),
(338, 'Recepción', ''),
(339, 'Recepción', ''),
(340, 'Recepción', ''),
(341, 'Recepción', ''),
(342, 'Recepción', ''),
(343, 'Recepción', ''),
(344, 'Recepción', ''),
(345, 'convenio_sena', ''),
(346, 'convenio_sena', ''),
(347, 'convenio_sena', ''),
(348, 'convenio_sena', ''),
(349, 'convenio_sena', ''),
(350, 'convenio_sena', ''),
(351, 'Recepción', ''),
(352, 'Recepción', ''),
(353, 'convenio_sena', ''),
(354, 'convenio_sena', ''),
(355, 'Recepción', ''),
(356, 'Recepción', ''),
(357, 'convenio_sena', ''),
(358, 'Recepción', ''),
(359, 'Recepción', ''),
(360, 'Recepción', ''),
(361, 'Recepción', ''),
(362, 'convenio_sena', ''),
(363, 'Recepción', ''),
(364, 'Recepción', ''),
(365, 'convenio_sena', ''),
(366, 'Recepción', ''),
(367, 'Recepción', ''),
(368, 'Recepción', ''),
(369, 'convenio_sena', ''),
(370, 'convenio_sena', ''),
(371, 'convenio_sena', ''),
(372, 'Recepción', ''),
(373, 'Recepción', ''),
(374, 'Recepción', ''),
(375, 'Recepción', ''),
(376, 'convenio_sena', ''),
(377, 'Recepción', ''),
(378, 'Recepción', ''),
(379, 'Recepción', ''),
(380, 'convenio_sena', ''),
(381, 'Recepción', ''),
(382, 'Recepción', ''),
(383, 'Recepción', ''),
(384, 'convenio_sena', ''),
(385, 'Recepción', ''),
(386, 'convenio_sena', ''),
(387, 'convenio_sena', ''),
(388, 'convenio_sena', ''),
(389, 'Recepción', ''),
(390, 'convenio_sena', ''),
(391, 'Recepción', ''),
(392, 'convenio_sena', ''),
(393, 'convenio_sena', ''),
(394, 'Documento', ''),
(395, 'Union_Libre', ''),
(396, 'convenio_sena', ''),
(397, 'convenio_sena', ''),
(398, 'convenio_sena', ''),
(399, 'Union_Libre', ''),
(400, 'convenio_sena', ''),
(401, 'Union_Libre', ''),
(402, 'Recepción', ''),
(403, 'convenio_sena', ''),
(404, 'Recepción', ''),
(405, 'Recepción', ''),
(406, 'Recepción', ''),
(407, 'Recepción', ''),
(408, 'Recepción', ''),
(409, 'convenio_sena', ''),
(410, 'Union_Libre', ''),
(411, 'convenio_sena', ''),
(412, 'Union_Libre', ''),
(413, 'convenio_sena', ''),
(414, 'Union_Libre', ''),
(415, 'convenio_sena', ''),
(416, 'Recepción', ''),
(417, 'Recepción', ''),
(418, 'Recepción', ''),
(419, 'Recepción', ''),
(420, 'Recepción', ''),
(421, 'Recepción', ''),
(422, 'Recepción', ''),
(423, 'Recepción', ''),
(424, 'convenio_sena', ''),
(425, 'convenio_sena', ''),
(426, 'convenio_sena', ''),
(427, 'convenio_sena', ''),
(428, 'Recepción', ''),
(429, 'convenio_sena', ''),
(430, 'convenio_sena', ''),
(431, 'convenio_sena', ''),
(432, 'Recepción', ''),
(433, 'convenio_sena', ''),
(434, 'cod_regional', ''),
(435, 'convenio_sena', ''),
(436, 'codigo_regional', ''),
(437, 'nombre_regional', ''),
(438, 'codigo_departamento', ''),
(439, 'nombre_departamento', ''),
(440, 'convenio_sena', ''),
(441, 'convenio_sena', ''),
(442, 'convenio_sena', ''),
(443, 'convenio_sena', ''),
(444, 'convenio_sena', ''),
(445, 'convenio_sena', ''),
(446, 'convenio_sena', ''),
(447, 'Recepción', ''),
(448, 'convenio_sena', ''),
(449, 'convenio_sena', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mark`
--

CREATE TABLE IF NOT EXISTS `mark` (
  `mark_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `mark_obtained` int(11) NOT NULL DEFAULT '0',
  `mark_total` int(11) NOT NULL DEFAULT '100',
  `attendance` int(11) NOT NULL DEFAULT '0',
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`mark_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticeboard`
--

CREATE TABLE IF NOT EXISTS `noticeboard` (
  `notice_id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `notice` longtext COLLATE utf8_unicode_ci NOT NULL,
  `create_timestamp` int(11) NOT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `noticeboard`
--

INSERT INTO `noticeboard` (`notice_id`, `notice_title`, `notice`, `create_timestamp`) VALUES
(1, 'Bienvenidos al Software academico CEIS', 'Este software ha sido diseñado para mejorar y optimizar el proceso de registro y gestión de estudiantes en la academia.', 1410933600);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `parent_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `relation_with_student` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `profession` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `transaction_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`settings_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'Aplicativo CEIS'),
(2, 'system_title', 'ceis'),
(3, 'address', 'Carrera 45 No. 66 – 09'),
(4, 'phone', '3608121 - 3609081'),
(5, 'paypal_email', 'administrativo@ceis.com.co'),
(6, 'currency', 'Peso'),
(7, 'system_email', 'comunicaciones@ceis.com.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ndocumento` int(18) NOT NULL,
  `lexpedicion` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fchaexp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `snombre` longtext COLLATE utf8_unicode_ci NOT NULL,
  `papellido` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sapellido` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `estado_civil` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tienehijos` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ndehijos` longtext COLLATE utf8_unicode_ci NOT NULL,
  `nlibmilitar` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tipodeingreso` longtext COLLATE utf8_unicode_ci NOT NULL,
  `empresa` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `cod_regional` int(11) DEFAULT NULL,
  `nom_regional` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cod_departamento` int(11) DEFAULT NULL,
  `nom_departamento` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `student`
--

INSERT INTO `student` (`student_id`, `documento`, `ndocumento`, `lexpedicion`, `fchaexp`, `name`, `snombre`, `papellido`, `sapellido`, `birthday`, `sex`, `estado_civil`, `tienehijos`, `ndehijos`, `nlibmilitar`, `tipodeingreso`, `empresa`, `address`, `phone`, `email`, `class_id`, `cod_regional`, `nom_regional`, `cod_departamento`, `nom_departamento`) VALUES
(1, 'CC', 1143124464, 'soled', '09/10/2014', 'fredy', 'saul', 'teheran', 'tovar', '09/18/2014', 'masculino', 'Soltero', 'no', '0', '1143124464', 'empresa', '2', 'CRA35#69D-93', '3008544984', 'fredyteheran91@gmail.com', '3', NULL, NULL, NULL, NULL),
(2, 'CC', 32323232, '2', '09/02/2014', 'fredy saul teheran tovar', 'fredy', 'tovar', 'kdkdkdk', '', '0', '0', '0', '0', '', '0', '0', 'CRA35#69D-93', '573007870715', 'fredyteheran91@gmail.com', '3', NULL, NULL, NULL, NULL),
(3, 'CC', 1129509228, 'Barranquilla', '05/18/2006', 'Alan', 'Luis', 'Pedraza', 'Teheran', '04/12/1988', 'male', 'Soltero', '0', '0', '0', '0', '0', '', '', '', '4', NULL, NULL, NULL, NULL),
(4, 'CC', 1140834339, 'Barranquilla', '', 'CINDY', 'PAOLA', 'GONZALEZ', 'OSORIO', '', 'female', 'Soltero', '0', '0', '0', '0', '0', '', '', '', '3', NULL, NULL, NULL, NULL),
(6, 'CC', 33, 'maracay', '10/13/2014', 'jonathan', 'jesus', 'Araul', 'Trejo', '10/13/2014', 'masculino', 'Soltero', 'no', '0', '3', 'becado', '0', 'sta ines', '33', 'jonathan.araul@gmail.com', '3', 2, 'nombre', 4, 'nombre departamento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `class_id`, `teacher_id`) VALUES
(1, 'Matematicas', 0, 0),
(2, 'Armamento y tiro', 0, 2),
(3, 'fredy saul teheran tovar', 0, 0),
(4, 'colol', 0, 0),
(5, 'CATALOGO DE SERVICIOS', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `snombre` longtext COLLATE utf8_unicode_ci NOT NULL,
  `papellido` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sapellido` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transport`
--

CREATE TABLE IF NOT EXISTS `transport` (
  `transport_id` int(11) NOT NULL AUTO_INCREMENT,
  `route_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `number_of_vehicle` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `route_fare` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`transport_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
