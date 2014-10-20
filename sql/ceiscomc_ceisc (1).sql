-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 20, 2014 at 04:17 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ceiscomc_ceisc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `level` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `level`) VALUES
(1, 'Mr. Admin', 'admin@admin.com', 'admin2014@', '1'),
(2, 'operativo@ceis.com.co', 'operativo@ceis.com.co', 'vigilancia2014@', '1'),
(3, 'direccion@ceis.com.co', 'direccion@ceis.com.co', 'vigilancia2014@', '1'),
(4, 'administrativo@ceis.com.co', 'administrativo@ceis.com.co', 'vigilancia2014@', '1'),
(5, 'recepcion@ceis.com.co\r\n', 'recepcion@ceis.com.co\r\n', 'vigilancia2014@', '1');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
`book_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `author` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
`class_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fcha_inicio` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fcha_fin` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hora_inicio` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hora_fin` longtext COLLATE utf8_unicode_ci NOT NULL,
  `cupo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `name`, `fcha_inicio`, `fcha_fin`, `hora_inicio`, `hora_fin`, `cupo`) VALUES
(3, 'Fundamentacion en Escolta', '09/15/2014', '09/19/2014', '7', '9', 35),
(4, 'Reentrenamiento Vigilancia', '10/20/2014', '10/31/2014', '7', '6', 25);

-- --------------------------------------------------------

--
-- Table structure for table `class_routine`
--

CREATE TABLE IF NOT EXISTS `class_routine` (
`class_routine_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `time_start` int(11) NOT NULL,
  `time_end` int(11) NOT NULL,
  `day` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class_routine`
--

INSERT INTO `class_routine` (`class_routine_id`, `class_id`, `subject_id`, `time_start`, `time_end`, `day`) VALUES
(1, 3, 1, 7, 10, 'monday');

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
`id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`) VALUES
(1, 'Amazonas'),
(2, 'Antioquia'),
(3, 'Arauca'),
(4, 'Atlántico'),
(5, 'Bolívar'),
(6, 'Boyacá'),
(7, 'Caldas'),
(8, 'Caquetá'),
(9, 'Casanare'),
(10, 'Cauca'),
(11, 'Cesar'),
(12, 'Chocó'),
(13, 'Córdoba'),
(14, 'Cundinamarca'),
(15, 'Güainia'),
(16, 'Guaviare'),
(17, 'Huila'),
(18, 'La Guajira'),
(19, 'Magdalena'),
(20, 'Meta'),
(21, 'Nariño'),
(22, 'Norte de Santander'),
(23, 'Putumayo'),
(24, 'Quindío'),
(25, 'Risaralda'),
(26, 'San Andrés y Providencia'),
(27, 'Santander'),
(28, 'Sucre'),
(29, 'Tolima'),
(30, 'Valle del Cauca'),
(31, 'Vaupés'),
(32, 'Vichada');

-- --------------------------------------------------------

--
-- Table structure for table `dormitory`
--

CREATE TABLE IF NOT EXISTS `dormitory` (
`dormitory_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `number_of_room` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE IF NOT EXISTS `email_template` (
`email_template_id` int(11) NOT NULL,
  `task` longtext COLLATE utf8_unicode_ci NOT NULL,
  `subject` longtext COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
`empresas_id` int(11) NOT NULL,
  `nit_empresas` int(11) NOT NULL,
  `nombre_empresas` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contacto_empresa` int(13) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`empresas_id`, `nit_empresas`, `nombre_empresas`, `contacto_empresa`) VALUES
(6, 2, 'Servies', 0),
(5, 1, 'Videlca', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
`exam_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `name`, `date`, `comment`) VALUES
(1, 'fredy', '09/15/2014', 'ret');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
`grade_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `grade_point` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mark_from` int(11) NOT NULL,
  `mark_upto` int(11) NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `name`, `grade_point`, `mark_from`, `mark_upto`, `comment`) VALUES
(1, 'fredy', '98', 89, 89, '88');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
`invoice_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `creation_timestamp` int(11) NOT NULL,
  `payment_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'paid or unpaid'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `student_id`, `title`, `description`, `amount`, `creation_timestamp`, `payment_timestamp`, `payment_method`, `payment_details`, `status`) VALUES
(1, 0, '', '', 0, 0, '', '', '', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
`phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=557 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
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
(449, 'convenio_sena', ''),
(450, 'convenio_sena', ''),
(451, 'convenio_sena', ''),
(452, 'convenio_sena', ''),
(453, 'codigo_municipio', ''),
(454, 'nombre_municipio', ''),
(455, 'empresa_gremio', ''),
(456, 'linea_formacion', ''),
(457, 'codigo_ocupacion', ''),
(458, 'nombre_ocupacion', ''),
(459, 'codigo_curso', ''),
(460, 'nombre_sector_economico', ''),
(461, 'nombre_subsector_economico', ''),
(462, 'cod_dep_dom', ''),
(463, 'convenio_sena', ''),
(464, 'convenio_sena', ''),
(465, 'convenio_sena', ''),
(466, 'convenio_sena', ''),
(467, 'convenio_sena', ''),
(468, 'convenio_sena', ''),
(469, 'Recepción', ''),
(470, 'convenio_sena', ''),
(471, 'convenio_sena', ''),
(472, 'convenio_sena', ''),
(473, 'Barrio', ''),
(474, 'departamento', ''),
(475, 'Municipio', ''),
(476, 'convenio_sena', ''),
(477, 'Direccion de residencia', ''),
(478, 'convenio_sena', ''),
(479, 'telefono_residencia', ''),
(480, 'convenio_sena', ''),
(481, 'convenio_sena', ''),
(482, 'Amazonas', ''),
(483, 'Antioquia', ''),
(484, 'Arauca', ''),
(485, 'Atlantico', ''),
(486, 'Bolivar', ''),
(487, 'Boyaca', ''),
(488, 'Caldas', ''),
(489, 'Caqueta', ''),
(490, 'Casanare', ''),
(491, 'Cauca', ''),
(492, 'Cesar', ''),
(493, 'Choco', ''),
(494, 'Cordoba', ''),
(495, 'Cundinamarca', ''),
(496, 'Guainia', ''),
(497, 'Guaviare', ''),
(498, 'Huila', ''),
(499, 'La Guajira', ''),
(500, 'Magdalena', ''),
(501, 'Meta', ''),
(502, 'Nariño', ''),
(503, 'Norte de Santander', ''),
(504, 'Putumayo', ''),
(505, 'Quindio', ''),
(506, 'Risaralda', ''),
(507, 'San Andres y Providencia', ''),
(508, 'Santander', ''),
(509, 'Sucre', ''),
(510, 'Tolima', ''),
(511, 'Valle del Cauca', ''),
(512, 'Vaupes', ''),
(513, 'Vichada', ''),
(514, 'convenio_sena', ''),
(515, 'convenio_sena', ''),
(516, 'convenio_sena', ''),
(517, 'Recepción', ''),
(518, 'convenio_sena', ''),
(519, 'Recepción', ''),
(520, 'convenio_sena', ''),
(521, 'convenio_sena', ''),
(522, 'Recepción', ''),
(523, 'convenio_sena', ''),
(524, 'convenio_sena', ''),
(525, 'convenio_sena', ''),
(526, 'prueba', ''),
(527, 'Ninguna', ''),
(528, 'INDIGENAS_DESPLAZADOS_POR_LA VIOLENCIA', ''),
(529, 'convenio_sena', ''),
(530, 'INDIGENAS_DESPLAZADOS_POR_LA_VIOLENCIA_CABEZA_DE_FAMILIA', ''),
(531, 'DESPLAZADOS_POR_LA_VIOLENCIA ', ''),
(532, 'DESPLAZADOS_POR_LA_VIOLENCIA_CABEZA_DE_FAMILIA', ''),
(533, 'AFROCOLOMBIANOS_DESPLAZADOS_POR_LA_VIOLENCIA', ''),
(534, 'DESPLAZADOS_DISCAPACITADOS', ''),
(535, 'DESPLAZADOS_POR_FENOMENOS_NATURALES ', ''),
(536, 'CABEZA_DE_FAMILIA', ''),
(537, 'INDIGENAS', ''),
(538, 'INPEC', ''),
(539, 'JOVENES_VULNERABLES', ''),
(540, 'ADOLESCENTE_EN_CONFLICTO_CON_LA_LEY_PENAL', ''),
(541, 'MUJER_CABEZA_DE_FAMILIA', ''),
(542, 'NEGRITUDES', ''),
(543, 'PROC_REINTEGRACION', ''),
(544, 'ADOLESCENTE_DESVINCULADO_DE_GRUPOS_ARMADOS_ORGANIZADOS', ''),
(545, 'ADOLESCENTE_TRABAJADORo', ''),
(546, 'ARTESANOS', ''),
(547, 'MICROEMPRESAS', ''),
(548, 'EMPRENDEDORES', ''),
(549, 'REMITIDOS_POR_EL_CIE', ''),
(550, 'REMITIDOS_POR_EL_PAL', ''),
(551, 'SOLDADOS_CAMPESINOS', ''),
(552, 'SOBREVIVIENTES_MINAS_ANTIPERSONALES', ''),
(553, 'AFROCOLOMBIANOS', ''),
(554, 'PALENQUEROS', ''),
(555, 'RAIZALES', ''),
(556, 'ROM', '');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE IF NOT EXISTS `mark` (
`mark_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `mark_obtained` int(11) NOT NULL DEFAULT '0',
  `mark_total` int(11) NOT NULL DEFAULT '100',
  `attendance` int(11) NOT NULL DEFAULT '0',
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
`id` int(11) NOT NULL,
  `departamento` int(11) NOT NULL,
  `nombre` varchar(300) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1077 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `municipio`
--

INSERT INTO `municipio` (`id`, `departamento`, `nombre`) VALUES
(1, 14, 'Santafe de Bogota'),
(2, 1, 'Puerto Nari'),
(3, 1, 'Leticia'),
(4, 2, 'Medellin'),
(5, 2, 'Abejorral'),
(6, 2, 'Abriaqui'),
(7, 2, 'Alejandria'),
(8, 2, 'Amaga'),
(9, 2, 'Amalfi'),
(10, 2, 'Andes'),
(11, 2, 'Angelopolis'),
(12, 2, 'Angostura'),
(13, 2, 'Anori'),
(14, 2, 'Antioquia'),
(15, 2, 'Anza'),
(16, 2, 'Apartado'),
(17, 2, 'Arboletes'),
(18, 2, 'Argelia'),
(19, 2, 'Armenia'),
(20, 2, 'Barbosa'),
(21, 2, 'Belmira'),
(22, 2, 'Bello'),
(23, 2, 'Betania'),
(24, 2, 'Betulia'),
(25, 2, 'Bolivar'),
(26, 2, 'Brise'),
(27, 2, 'Buritica'),
(28, 2, 'Caceres'),
(29, 2, 'Caicedo'),
(30, 2, 'Caldas'),
(31, 2, 'Campamento'),
(32, 2, 'Ca'),
(33, 2, 'Caracoli'),
(34, 2, 'Caramanta'),
(35, 2, 'Carepa'),
(36, 2, 'Carmen de Viboral'),
(37, 2, 'Carolina'),
(38, 2, 'Caucasia'),
(39, 2, 'Chigorodo'),
(40, 2, 'Cisneros'),
(41, 2, 'Cocorna'),
(42, 2, 'Concepcion'),
(43, 2, 'Concordia'),
(44, 2, 'Copacabana'),
(45, 2, 'Dabeiba'),
(46, 2, 'Don Matias'),
(47, 2, 'Ebejico'),
(48, 2, 'El Bagre'),
(49, 2, 'Entrerrios'),
(50, 2, 'Envigado'),
(51, 2, 'Fredonia'),
(52, 2, 'Frontino'),
(53, 2, 'Giraldo'),
(54, 2, 'Girardota'),
(55, 2, 'Gomez Plata'),
(56, 2, 'Granada'),
(57, 2, 'Guadalupe'),
(58, 2, 'Guarne'),
(59, 2, 'Guatape'),
(60, 2, 'Heliconia'),
(61, 2, 'Hispania'),
(62, 2, 'Itag'),
(63, 2, 'Ituango'),
(64, 2, 'Jardin'),
(65, 2, 'Jerico'),
(66, 2, 'La Ceja'),
(67, 2, 'La Estrella'),
(68, 2, 'La Pintada'),
(69, 2, 'La Union'),
(70, 2, 'Liborina'),
(71, 2, 'Maceo'),
(72, 2, 'Marinilla'),
(73, 2, 'Montebello'),
(74, 2, 'Murindo'),
(75, 2, 'Mutata'),
(76, 2, 'Nari'),
(77, 2, 'Necocli'),
(78, 2, 'Nechi'),
(79, 2, 'Olaya'),
(80, 2, 'Pe'),
(81, 2, 'Peque'),
(82, 2, 'Pueblorrico'),
(83, 2, 'Puerto Berrio'),
(84, 2, 'Puerto Nare'),
(85, 2, 'Puerto Triunfo'),
(86, 2, 'Remedios'),
(87, 2, 'Retiro'),
(88, 2, 'Rionegro'),
(89, 2, 'Sabanalarga'),
(90, 2, 'Sabaneta'),
(91, 2, 'Salgar'),
(92, 2, 'San Andres'),
(93, 2, 'San Carlos'),
(94, 2, 'San francisco'),
(95, 2, 'San Jeronimo'),
(96, 2, 'San Jose de Monta'),
(97, 2, 'San Juan de Uraba'),
(98, 2, 'San Luis'),
(99, 2, 'San Pedro'),
(100, 2, 'San Pedro de Uraba'),
(101, 2, 'San Rafael'),
(102, 2, 'San Roque'),
(103, 2, 'San Vicente'),
(104, 2, 'Santa Barbara'),
(105, 2, 'Santa Rosa de Osos'),
(106, 2, 'Santo Domingo'),
(107, 2, 'Santuario'),
(108, 2, 'Segovia'),
(109, 2, 'Sonson'),
(110, 2, 'Sopetran'),
(111, 2, 'Tamesis'),
(112, 2, 'Taraza'),
(113, 2, 'Tarso'),
(114, 2, 'Titiribi'),
(115, 2, 'Toledo'),
(116, 2, 'Turbo'),
(117, 2, 'Uramita'),
(118, 2, 'Urrao'),
(119, 2, 'Valdivia'),
(120, 2, 'Valparaiso'),
(121, 2, 'Vegachi'),
(122, 2, 'Venecia'),
(123, 2, 'Vigia del Fuerte'),
(124, 2, 'Yali'),
(125, 2, 'Yarumal'),
(126, 2, 'Yolombo'),
(127, 2, 'Yondo (Casabe)'),
(128, 2, 'Zaragoza'),
(129, 3, 'Arauca'),
(130, 3, 'Arauquita'),
(131, 3, 'Cravo Norte'),
(132, 3, 'Fortul'),
(133, 3, 'Puerto Rondon'),
(134, 3, 'Fortul'),
(135, 3, 'Puerto Rondon'),
(136, 3, 'Saravena'),
(137, 3, 'Tame'),
(138, 4, 'Barranquilla'),
(139, 4, 'Baranoa'),
(140, 4, 'Campo de la Cruz'),
(141, 4, 'Candelaria'),
(142, 4, 'Galapa'),
(143, 4, 'Juan de Acosta'),
(144, 4, 'Luruaco'),
(145, 4, 'Malambo'),
(146, 4, 'Manati'),
(147, 4, 'Palmar de Varela'),
(148, 4, 'Piojo'),
(149, 4, 'Polonuevo'),
(150, 4, 'Ponedera'),
(151, 4, 'Puerto Colombia'),
(152, 4, 'Repelon'),
(153, 4, 'Sabanagrande'),
(154, 4, 'Sabanalarga'),
(155, 4, 'Santa Lucia'),
(156, 4, 'Santo Tomas'),
(157, 4, 'Soledad'),
(158, 4, 'Suan'),
(159, 4, 'Tubara'),
(160, 4, 'Usiacuri'),
(161, 4, 'Cartagena'),
(162, 4, 'Achi'),
(163, 4, 'Altos del Rosario'),
(164, 4, 'Arenal'),
(165, 4, 'Arjona'),
(166, 4, 'Arroyohondo'),
(167, 4, 'Barranco de Loba'),
(168, 4, 'Calamar'),
(169, 4, 'Cantagallo'),
(170, 4, 'Cicuto'),
(171, 4, 'Cordoba'),
(172, 4, 'Clemencia'),
(173, 4, 'El Carmen de Bolivar'),
(174, 4, 'El Guamo'),
(175, 4, 'El Pe'),
(176, 4, 'Hatillo de Loba'),
(177, 4, 'Magangue'),
(178, 4, 'Mahates'),
(179, 4, 'Margarita'),
(180, 4, 'Maria la Baja'),
(181, 4, 'Montecristo'),
(182, 4, 'Mompos'),
(183, 4, 'Morales'),
(184, 4, 'Pinillos'),
(185, 4, 'Regidor'),
(186, 4, 'Rio Viejo'),
(187, 4, 'San Cristobal'),
(188, 4, 'San Estanislao'),
(189, 4, 'San Fernando'),
(190, 4, 'San Jacinto'),
(191, 4, 'San Jacinto del Cauca'),
(192, 4, 'San Juan Nepomuceno'),
(193, 4, 'San Martin de Loba'),
(194, 4, 'San Pablo'),
(195, 4, 'Santa Catalina'),
(196, 4, 'Santa Rosa'),
(197, 4, 'Santa Rosa del Sur'),
(198, 4, 'Simiti'),
(199, 4, 'Soplaviento'),
(200, 4, 'Talaigua Nuevo'),
(201, 4, 'Tiquisio (Puerto Rico)'),
(202, 4, 'Turbaco'),
(203, 4, 'Turbana'),
(204, 4, 'Villanueva'),
(205, 4, 'Zambrano'),
(206, 6, 'Tunja'),
(207, 6, 'Almeida'),
(208, 6, 'Aquitania'),
(209, 6, 'Arcabuco'),
(210, 6, 'Belen'),
(211, 6, 'Berbeo'),
(212, 6, 'Beteitiva'),
(213, 6, 'Boavita'),
(214, 6, 'Boyaca'),
(215, 6, 'Brise'),
(216, 6, 'Buenavista'),
(217, 6, 'Busbanza'),
(218, 6, 'Caldas'),
(219, 6, 'Campohermoso'),
(220, 6, 'Cerinza'),
(221, 6, 'Chinavita'),
(222, 6, 'Chiquinquira'),
(223, 6, 'Chiscas'),
(224, 6, 'Chita'),
(225, 6, 'Chitaranque'),
(226, 6, 'Chivata'),
(227, 6, 'Cienaga'),
(228, 6, 'Combita'),
(229, 6, 'Coper'),
(230, 6, 'Corrales'),
(231, 6, 'Covarachia'),
(232, 6, 'Cubar'),
(233, 6, 'Cucaita'),
(234, 6, 'Cuitiva'),
(235, 6, 'Chiquiza'),
(236, 6, 'Chivor'),
(237, 6, 'Duitama'),
(238, 6, 'El Cocuy'),
(239, 6, 'El Espino'),
(240, 6, 'Firavitoba'),
(241, 6, 'Floresta'),
(242, 6, 'Gachantiva'),
(243, 6, 'Gameza'),
(244, 6, 'Garagoa'),
(245, 6, 'Guacamayas'),
(246, 6, 'Guateque'),
(247, 6, 'Guayata'),
(248, 6, 'Guican'),
(249, 6, 'Iza'),
(250, 6, 'Jenesano'),
(251, 6, 'Jerico'),
(252, 6, 'Labranzagrande'),
(253, 6, 'La Capilla'),
(254, 6, 'La Victoria'),
(255, 6, 'La Ubita'),
(256, 6, 'Villa de Leyva'),
(257, 6, 'Macanal'),
(258, 6, 'Maripi'),
(259, 6, 'Miraflores'),
(260, 6, 'Mongua'),
(261, 6, 'Mongui'),
(262, 6, 'Moniquira'),
(263, 6, 'Motavita'),
(264, 6, 'Muzo'),
(265, 6, 'Nobsa'),
(266, 6, 'Nuevo Colon'),
(267, 6, 'Oicata'),
(268, 6, 'Otanche'),
(269, 6, 'Pachavita'),
(270, 6, 'Paez'),
(271, 6, 'Paipa'),
(272, 6, 'Pajarito'),
(273, 6, 'Panqueba'),
(274, 6, 'Pauna'),
(275, 6, 'Paya'),
(276, 6, 'Paz de Rio'),
(277, 6, 'Pesca'),
(278, 6, 'Pisva'),
(279, 6, 'Puerto Boyaca'),
(280, 6, 'Quipama'),
(281, 6, 'Ramiquiri'),
(282, 6, 'Raquira'),
(283, 6, 'Rondon'),
(284, 6, 'Saboya'),
(285, 6, 'Sachica'),
(286, 6, 'Samaca'),
(287, 6, 'San Eduardo'),
(288, 6, 'San Jose de Pare'),
(289, 6, 'San Luis de Gaceno'),
(290, 6, 'San Mateo'),
(291, 6, 'San Miguel de Sema'),
(292, 6, 'San Pablo de Borbur'),
(293, 6, 'Santana'),
(294, 6, 'Santa Maria'),
(295, 6, 'Santa Rosa de Viterbo'),
(296, 6, 'Santa Sofia'),
(297, 6, 'Sativanorte'),
(298, 6, 'Sativasur'),
(299, 6, 'Siachoque'),
(300, 6, 'Soata'),
(301, 6, 'Socota'),
(302, 6, 'Socha'),
(303, 6, 'Sogamoso'),
(304, 6, 'Somondoco'),
(305, 6, 'Sora'),
(306, 6, 'Sotaquira'),
(307, 6, 'Soraca'),
(308, 6, 'Susacon'),
(309, 6, 'Sutamarchan'),
(310, 6, 'Sutatenza'),
(311, 6, 'Tasco'),
(312, 6, 'Tenza'),
(313, 6, 'Tibana'),
(314, 6, 'Tibasosa'),
(315, 6, 'Tinjaca'),
(316, 6, 'Tipacoque'),
(317, 6, 'Toca'),
(318, 6, 'Togui'),
(319, 6, 'Topaga'),
(320, 6, 'Tota'),
(321, 6, 'Tunungua'),
(322, 6, 'Turmeque'),
(323, 6, 'Tuta'),
(324, 6, 'Tutaza'),
(325, 6, 'umbita'),
(326, 6, 'Ventaquemada'),
(327, 6, 'Viracacha'),
(328, 6, 'Zetaquira'),
(329, 7, 'Manizales'),
(330, 7, 'Aguadas'),
(331, 7, 'Anserma'),
(332, 7, 'Aranzazu'),
(333, 7, 'Belalcazar'),
(334, 7, 'Chinchina'),
(335, 7, 'Filadelfia'),
(336, 7, 'La Dorada'),
(337, 7, 'La Merced'),
(338, 7, 'Manzanares'),
(339, 7, 'Marmato'),
(340, 7, 'Marquetalia'),
(341, 7, 'Marulanda'),
(342, 7, 'Neira'),
(343, 7, 'Pacora'),
(344, 7, 'Palestina'),
(345, 7, 'Pensilvania'),
(346, 7, 'Riosucio'),
(347, 7, 'Risaralda'),
(348, 7, 'Salamina'),
(349, 7, 'Samana'),
(350, 7, 'San Jose'),
(351, 7, 'Supia'),
(352, 7, 'Victoria'),
(353, 7, 'Villamaria'),
(354, 7, 'Viterbo'),
(355, 8, 'Florencia'),
(356, 8, 'Albania'),
(357, 8, 'Belen de los Andaquies'),
(358, 8, 'Cartagena del Chaira'),
(359, 8, 'Curillo'),
(360, 8, 'El Doncello'),
(361, 8, 'El Paujil'),
(362, 8, 'La Monta'),
(363, 8, 'Milan'),
(364, 8, 'Morelia'),
(365, 8, 'Puerto Rico'),
(366, 8, 'San Jose del Fragua'),
(367, 8, 'San Vicente del Caguan'),
(368, 8, 'Solano'),
(369, 8, 'Solita'),
(370, 8, 'Valparaiso'),
(371, 9, 'Yopal'),
(372, 9, 'Aguazul'),
(373, 9, 'Chameza'),
(374, 9, 'Hato Corozal'),
(375, 9, 'La Salina'),
(376, 9, 'Mani'),
(377, 9, 'Monterrey'),
(378, 9, 'Nunchia'),
(379, 9, 'Orocue'),
(380, 9, 'Paz de Ariporo'),
(381, 9, 'Pore'),
(382, 9, 'Recetor'),
(383, 9, 'Sabalarga'),
(384, 9, 'Sacama'),
(385, 9, 'San Luis de Palenque'),
(386, 9, 'Tamara'),
(387, 9, 'Tauramena'),
(388, 9, 'Trinidad'),
(389, 9, 'Villanueva'),
(390, 10, 'Popayan'),
(391, 10, 'Almaguer'),
(392, 10, 'Argelia'),
(393, 10, 'Balboa'),
(394, 10, 'Bolivar'),
(395, 10, 'Buenos Aires'),
(396, 10, 'Cajibio'),
(397, 10, 'Caldono'),
(398, 10, 'Caloto'),
(399, 10, 'Corinto'),
(400, 10, 'El Tambo'),
(401, 10, 'Florencia'),
(402, 10, 'Guapi'),
(403, 10, 'Inza'),
(404, 10, 'Jambalo'),
(405, 10, 'La Sierra'),
(406, 10, 'La Vega'),
(407, 10, 'Lopez (Micay)'),
(408, 10, 'Mercaderes'),
(409, 10, 'Miranda'),
(410, 10, 'Morales'),
(411, 10, 'Padilla'),
(412, 10, 'Paez (Belalcazar)'),
(413, 10, 'Patia (El Bordo)'),
(414, 10, 'Piamonte'),
(415, 10, 'Piendamo'),
(416, 10, 'Puerto Tejada'),
(417, 10, 'Purace (Coconuco)'),
(418, 10, 'Rosas'),
(419, 10, 'San Sebastian'),
(420, 10, 'Santander de Quilichao'),
(421, 10, 'Santa Rosa'),
(422, 10, 'Silvia'),
(423, 10, 'Sotara (Paispamba)'),
(424, 10, 'Suarez'),
(425, 10, 'Timbio'),
(426, 10, 'Timbiqui'),
(427, 10, 'Toribio'),
(428, 10, 'Totoro'),
(429, 11, 'Valledupar'),
(430, 11, 'Aguachica'),
(431, 11, 'Agustin Codazzi'),
(432, 11, 'Astrea'),
(433, 11, 'Becerril'),
(434, 11, 'Bosconia'),
(435, 11, 'Chimichagua'),
(436, 11, 'Chiriguana'),
(437, 11, 'Curumani'),
(438, 11, 'El Copey'),
(439, 11, 'El Paso'),
(440, 11, 'Gamarra'),
(441, 11, 'Gonzalez'),
(442, 11, 'La Gloria'),
(443, 11, 'La Jagua de Ibirico'),
(444, 11, 'Manaure Balcon Cesar'),
(445, 11, 'Pailitas'),
(446, 11, 'Pelaya'),
(447, 11, 'Pueblo Bello'),
(448, 11, 'Rio de Oro'),
(449, 11, 'La Paz (Robles)'),
(450, 11, 'San Alberto'),
(451, 11, 'San Diego'),
(452, 11, 'San Martin'),
(453, 11, 'Tamalameque'),
(454, 13, 'Monteria'),
(455, 13, 'Ayapel'),
(456, 13, 'Buenavista'),
(457, 13, 'Canalete'),
(458, 13, 'Cerete'),
(459, 13, 'Chima'),
(460, 13, 'Chinu'),
(461, 13, 'Cienaga de Oro'),
(462, 13, 'Cotorra'),
(463, 13, 'La Apartada (Frontera)'),
(464, 13, 'Lorica'),
(465, 13, 'Los Cordobas'),
(466, 13, 'Momil'),
(467, 13, 'Montelibano'),
(468, 13, 'Monitos'),
(469, 13, 'Planeta Rica'),
(470, 13, 'Pueblo Nuevo'),
(471, 13, 'Puerto Escondido'),
(472, 13, 'Puerto Libertador'),
(473, 13, 'Purisima'),
(474, 13, 'Sahagun'),
(475, 13, 'San Andres Sotavento'),
(476, 13, 'San Antero'),
(477, 13, 'San Bernardo del Viento'),
(478, 13, 'San Carlos'),
(479, 13, 'San Pelayo'),
(480, 13, 'Tierralta'),
(481, 13, 'Valencia'),
(482, 14, 'Agua de Dios'),
(483, 14, 'Alban'),
(484, 14, 'Anapoima'),
(485, 14, 'Anolaima'),
(486, 14, 'Arbelaez'),
(487, 14, 'Beltran'),
(488, 14, 'Bituima'),
(489, 14, 'Bojaca'),
(490, 14, 'Cabrera'),
(491, 14, 'Cachipay'),
(492, 14, 'Cajica'),
(493, 14, 'Caparrapi'),
(494, 14, 'Caqueza'),
(495, 14, 'Carmen de Carupa'),
(496, 14, 'Chaguani'),
(497, 14, 'Chia'),
(498, 14, 'Chipaque'),
(499, 14, 'Choachi'),
(500, 14, 'Choconta'),
(501, 14, 'Cogua'),
(502, 14, 'Cota'),
(503, 14, 'Cucunuba'),
(504, 14, 'El Colegio'),
(505, 14, 'El Pe'),
(506, 14, 'El Rosal'),
(507, 14, 'Facatativa'),
(508, 14, 'Fomeque'),
(509, 14, 'Fosca'),
(510, 14, 'Funza'),
(511, 14, 'Fuquene'),
(512, 14, 'Fusagasuga'),
(513, 14, 'Gachala'),
(514, 14, 'Gachancipa'),
(515, 14, 'Gacheta'),
(516, 14, 'Gama'),
(517, 14, 'Girardot'),
(518, 14, 'Granada'),
(519, 14, 'Guacheta'),
(520, 14, 'Guaduas'),
(521, 14, 'Guasca'),
(522, 14, 'Guataqui'),
(523, 14, 'Guatavita'),
(524, 14, 'Guayabal de Siquima'),
(525, 14, 'Guayabetal'),
(526, 14, 'Gutierrez'),
(527, 14, 'Jerusalen'),
(528, 14, 'Junin'),
(529, 14, 'La Calera'),
(530, 14, 'La Mesa'),
(531, 14, 'La Palma'),
(532, 14, 'La Pe'),
(533, 14, 'La Vega'),
(534, 14, 'Lenguazaque'),
(535, 14, 'Macheta'),
(536, 14, 'Madrid'),
(537, 14, 'Manta'),
(538, 14, 'Medina'),
(539, 14, 'Mosquera'),
(540, 14, 'Nari'),
(541, 14, 'Nemocon'),
(542, 14, 'Nilo'),
(543, 14, 'Nimaima'),
(544, 14, 'Nocaima'),
(545, 14, 'Venecia (Ospina Perez)'),
(546, 14, 'Pacho'),
(547, 14, 'Paime'),
(548, 14, 'Pandi'),
(549, 14, 'Paratebueno'),
(550, 14, 'Pasca'),
(551, 14, 'Puerto Salgar'),
(552, 14, 'Puli'),
(553, 14, 'Quebradanegra'),
(554, 14, 'Quetame'),
(555, 14, 'Quipile'),
(556, 14, 'Rafael'),
(557, 14, 'Ricaurte'),
(558, 14, 'San Antonio de Tequendama'),
(559, 14, 'San Bernardo'),
(560, 14, 'San Cayetano'),
(561, 14, 'San Francisco'),
(562, 14, 'San Juan de Rioseco'),
(563, 14, 'Sasaima'),
(564, 14, 'Sesquile'),
(565, 14, 'Sibate'),
(566, 14, 'Silvania'),
(567, 14, 'Simijaca'),
(568, 14, 'Soacha'),
(569, 14, 'Sopo'),
(570, 14, 'Subachoque'),
(571, 14, 'Suesca'),
(572, 14, 'Supata'),
(573, 14, 'Susa'),
(574, 14, 'Sutatausa'),
(575, 14, 'Tabio'),
(576, 14, 'Tausa'),
(577, 14, 'Tena'),
(578, 14, 'Tenjo'),
(579, 14, 'Tibacuy'),
(580, 14, 'Tibirita'),
(581, 14, 'Tocaima'),
(582, 14, 'Tocancipa'),
(583, 14, 'Topaipi'),
(584, 14, 'Ubala'),
(585, 14, 'Ubaque'),
(586, 14, 'Ubate'),
(587, 14, 'Une'),
(588, 14, 'utica'),
(589, 14, 'Vergara'),
(590, 14, 'Viani'),
(591, 14, 'Villagomez'),
(592, 14, 'Villapinzon'),
(593, 14, 'Villeta'),
(594, 14, 'Viota'),
(595, 14, 'Yacopi'),
(596, 14, 'Zipacon'),
(597, 14, 'Zipaquira'),
(598, 12, 'Quibdo'),
(599, 12, 'Acandi'),
(600, 12, 'Alto Baudo (Pie de Pato)'),
(601, 12, 'Atrato (Yuto)'),
(602, 12, 'Bagado'),
(603, 12, 'Bahia Solano (Mutis)'),
(604, 12, 'Bajo Baudo (Pizarro)'),
(605, 12, 'Bojaya (Bellavista)'),
(606, 12, 'Canton de San Pablo'),
(607, 12, 'Condoto'),
(608, 12, 'El Carmen'),
(609, 12, 'El Litoral de San Juan'),
(610, 12, 'Itsmina'),
(611, 12, 'Jurado'),
(612, 12, 'Lloro'),
(613, 12, 'Novita'),
(614, 12, 'Nuqui'),
(615, 12, 'Riosucio'),
(616, 12, 'San Jose del Palmar'),
(617, 12, 'Sipi'),
(618, 12, 'Tado'),
(619, 12, 'Unguia'),
(620, 15, 'Puerto Inirida'),
(621, 16, 'San Jose del Guaviare'),
(622, 16, 'Calamar'),
(623, 16, 'El Retorno'),
(624, 16, 'Miraflores'),
(625, 17, 'Neiva'),
(626, 17, 'Acevedo'),
(627, 17, 'Agrado'),
(628, 17, 'Aipe'),
(629, 17, 'Algeciras'),
(630, 17, 'Altamira'),
(631, 17, 'Baraya'),
(632, 17, 'Campoalegre'),
(633, 17, 'Colombia'),
(634, 17, 'Elias'),
(635, 17, 'Garzon'),
(636, 17, 'Gigante'),
(637, 17, 'Guadalupe'),
(638, 17, 'Hobo'),
(639, 17, 'Iquira'),
(640, 17, 'Isnos'),
(641, 17, 'La Argentina'),
(642, 17, 'La Plata'),
(643, 17, 'Nataga'),
(644, 17, 'Oporapa'),
(645, 17, 'Paicol'),
(646, 17, 'Palermo'),
(647, 17, 'Palestina'),
(648, 17, 'Pital'),
(649, 17, 'Pitalito'),
(650, 17, 'Rivera'),
(651, 17, 'Saladoblanco'),
(652, 17, 'San Agustin'),
(653, 17, 'Santa Maria'),
(654, 17, 'Suaza'),
(655, 17, 'Tarqui'),
(656, 17, 'Tesalia'),
(657, 17, 'Tello'),
(658, 17, 'Teruel'),
(659, 17, 'Timana'),
(660, 17, 'Villavieja'),
(661, 17, 'Yaguara'),
(662, 18, 'Riohacha'),
(663, 18, 'Barrancas'),
(664, 18, 'Dibulla'),
(665, 18, 'Distraccion'),
(666, 18, 'El Molino'),
(667, 18, 'Fonseca'),
(668, 18, 'Hatonuevo'),
(669, 18, 'Maicao'),
(670, 18, 'Manaure'),
(671, 18, 'San Juan del Cesar'),
(672, 18, 'Uribia'),
(673, 18, 'Urumita'),
(674, 18, 'Villanueva'),
(675, 19, 'Santa Marta'),
(676, 19, 'Aracataca'),
(677, 19, 'Ariguani (El Dificil)'),
(678, 19, 'Cerro San Antonio'),
(679, 19, 'Chivolo'),
(680, 19, 'Cienaga'),
(681, 19, 'El Banco'),
(682, 19, 'El Pi'),
(683, 19, 'El Reten'),
(684, 19, 'Fundacion'),
(685, 19, 'Guamal'),
(686, 19, 'Pedraza'),
(687, 19, 'Piji'),
(688, 19, 'Pivijay'),
(689, 19, 'Plato'),
(690, 19, 'Publoviejo'),
(691, 19, 'Remolino'),
(692, 19, 'Salamina'),
(693, 19, 'San Sebastian de Buuenavista'),
(694, 19, 'San Zenon'),
(695, 19, 'Santa Ana'),
(696, 19, 'Sitionuevo'),
(697, 19, 'Tenerife'),
(698, 20, 'Villavicencio'),
(699, 20, 'Acacias'),
(700, 20, 'Barranca de Upia'),
(701, 20, 'Cabuyaro'),
(702, 20, 'Castilla la Nueva'),
(703, 20, 'Cubarral'),
(704, 20, 'Cumaral'),
(705, 20, 'El Calvario'),
(706, 20, 'El Castillo'),
(707, 20, 'El Dorado'),
(708, 20, 'Fuente de Oro'),
(709, 20, 'Granada'),
(710, 20, 'Guamal'),
(711, 20, 'Mapiripan'),
(712, 20, 'Mesetas'),
(713, 20, 'La Macarena'),
(714, 20, 'La Uribe'),
(715, 20, 'Lejanias'),
(716, 20, 'Puerto Concordia'),
(717, 20, 'Puerto Gaitan'),
(718, 20, 'Puerto Lopez'),
(719, 20, 'Puerto Lleras'),
(720, 20, 'Puerto Rico'),
(721, 20, 'Restrepo'),
(722, 20, 'San Carlos de Guaroa'),
(723, 20, 'San Juan de Arama'),
(724, 20, 'San Juanito'),
(725, 20, 'San Martin'),
(726, 20, 'Vistahermosa'),
(727, 21, 'Pasto'),
(728, 21, 'Alban (San Jose)'),
(729, 21, 'Aldana'),
(730, 21, 'Ancuya'),
(731, 21, 'Arboleda (Berruecos)'),
(732, 21, 'Barbacoas'),
(733, 21, 'Belen'),
(734, 21, 'Buesaco'),
(735, 21, 'Colon (Genova)'),
(736, 21, 'Consaca'),
(737, 21, 'Contadero'),
(738, 21, 'Cordoba'),
(739, 21, 'Cuaspud (Carlosama)'),
(740, 21, 'Cumbal'),
(741, 21, 'Cumbitara'),
(742, 21, 'Chachag'),
(743, 21, 'El Charco'),
(744, 21, 'El Rosario'),
(745, 21, 'El Tablon'),
(746, 21, 'El Tambo'),
(747, 21, 'Funes'),
(748, 21, 'Guachucal'),
(749, 21, 'Guaitarilla'),
(750, 21, 'Gualmatan'),
(751, 21, 'Iles'),
(752, 21, 'Imues'),
(753, 21, 'Ipiales'),
(754, 21, 'La Cruz'),
(755, 21, 'La Florida'),
(756, 21, 'La Llanada'),
(757, 21, 'La Tola'),
(758, 21, 'La Union'),
(759, 21, 'Leiva'),
(760, 21, 'Linares'),
(761, 21, 'Los Andes (Sotomayor)'),
(762, 21, 'Mag'),
(763, 21, 'Mallama (Piedrancha)'),
(764, 21, 'Mosquera'),
(765, 21, 'Olaya'),
(766, 21, 'Ospina'),
(767, 21, 'Francisco Pizarro'),
(768, 21, 'Policarpa'),
(769, 21, 'Potosi'),
(770, 21, 'Providencia'),
(771, 21, 'Puerres'),
(772, 21, 'Pupiales'),
(773, 21, 'Ricaurte'),
(774, 21, 'Roberto Payan (San Jose)'),
(775, 21, 'Samaniego'),
(776, 21, 'Sandona'),
(777, 21, 'San Bernardo'),
(778, 21, 'San Lorenzo'),
(779, 21, 'San Pablo'),
(780, 21, 'San Pedro de Cartago'),
(781, 21, 'Santa Barbara (Iscuande)'),
(782, 21, 'Santa Cruz (Guachavez)'),
(783, 21, 'Sapuyes'),
(784, 21, 'Taminango'),
(785, 21, 'Tangua'),
(786, 21, 'Tumaco'),
(787, 21, 'Tuquerres'),
(788, 21, 'Yacuanquer'),
(789, 22, 'Cucuta'),
(790, 22, 'Abrego'),
(791, 22, 'Arboledas'),
(792, 22, 'Bochalema'),
(793, 22, 'Bucarasica'),
(794, 22, 'Cacota'),
(795, 22, 'Cachira'),
(796, 22, 'Chinacota'),
(797, 22, 'Chitaga'),
(798, 22, 'Convencion'),
(799, 22, 'Cucutilla'),
(800, 22, 'Durania'),
(801, 22, 'El Carmen'),
(802, 22, 'El Tarra'),
(803, 22, 'El Zulia'),
(804, 22, 'Gramalote'),
(805, 22, 'Hacari'),
(806, 22, 'Herran'),
(807, 22, 'Labateca'),
(808, 22, 'La Esperanza'),
(809, 22, 'La Playa'),
(810, 22, 'Los Patios'),
(811, 22, 'Lourdes'),
(812, 22, 'Mutiscua'),
(813, 22, 'Oca'),
(814, 22, 'Pamplona'),
(815, 22, 'Pamplonita'),
(816, 22, 'Puerto Santander'),
(817, 22, 'Ragonvalia'),
(818, 22, 'Salazar'),
(819, 22, 'San Calixto'),
(820, 22, 'San Cayetano'),
(821, 22, 'Santiago'),
(822, 22, 'Sardinata'),
(823, 22, 'Silos'),
(824, 22, 'Teorama'),
(825, 22, 'Tibu'),
(826, 22, 'Toledo'),
(827, 22, 'Villacaro'),
(828, 22, 'Villa del Rosario'),
(829, 23, 'Mocoa'),
(830, 23, 'Colon'),
(831, 23, 'Orito'),
(832, 23, 'Puerto Asis'),
(833, 23, 'Puerto Caicedo'),
(834, 23, 'Puerto Guzman'),
(835, 23, 'Puerto Leguizamo'),
(836, 23, 'Sibundoy'),
(837, 23, 'San Francisco'),
(838, 23, 'San Miguel'),
(839, 23, 'Santiago'),
(840, 23, 'Villa Gamuez (La Hormiga)'),
(841, 23, 'Villa Garzon'),
(842, 24, 'Armenia'),
(843, 24, 'Buenavista'),
(844, 24, 'Calarca'),
(845, 24, 'Circasia'),
(846, 24, 'Cordoba'),
(847, 24, 'Filandia'),
(848, 24, 'Genova'),
(849, 24, 'La Tebaida'),
(850, 24, 'Montenegro'),
(851, 24, 'Pijao'),
(852, 24, 'Quimbaya'),
(853, 24, 'Salento'),
(854, 25, 'Pereira'),
(855, 25, 'Apia'),
(856, 25, 'Balboa'),
(857, 25, 'Belen de Umbria'),
(858, 25, 'Dos Quebradas'),
(859, 25, 'Guatica'),
(860, 25, 'La Celia'),
(861, 25, 'La Virginia'),
(862, 25, 'Marsella'),
(863, 25, 'Mistrato'),
(864, 25, 'Pueblo Rico'),
(865, 25, 'Quinchia'),
(866, 25, 'Santa Rosa de Cabal'),
(867, 25, 'Santuario'),
(868, 26, 'San Andres'),
(869, 26, 'Providencia'),
(870, 27, 'Bucaramanga'),
(871, 27, 'Aguada'),
(872, 27, 'Albania'),
(873, 27, 'Aratoca'),
(874, 27, 'Barbosa'),
(875, 27, 'Barichara'),
(876, 27, 'Barrancabermeja'),
(877, 27, 'Betulia'),
(878, 27, 'Bolivar'),
(879, 27, 'Cabrera'),
(880, 27, 'California'),
(881, 27, 'Capitanejo'),
(882, 27, 'Carcasi'),
(883, 27, 'Cepita'),
(884, 27, 'Cerrito'),
(885, 27, 'Charala'),
(886, 27, 'Charta'),
(887, 27, 'Chima'),
(888, 27, 'Chipata'),
(889, 27, 'Cimitarra'),
(890, 27, 'Concepcion'),
(891, 27, 'Confines'),
(892, 27, 'Contratacion'),
(893, 27, 'Coromoro'),
(894, 27, 'Curiti'),
(895, 27, 'El Carmen'),
(896, 27, 'El Guacamayo'),
(897, 27, 'El Pe'),
(898, 27, 'El Playon'),
(899, 27, 'Encino'),
(900, 27, 'Enciso'),
(901, 27, 'Florian'),
(902, 27, 'Floridablanca'),
(903, 27, 'Galan'),
(904, 27, 'Gambita'),
(905, 27, 'Giron'),
(906, 27, 'Guaca'),
(907, 27, 'Guadalupe'),
(908, 27, 'Guapota'),
(909, 27, 'Guavata'),
(910, 27, 'Guepsa'),
(911, 27, 'Hato'),
(912, 27, 'Jesus Maria'),
(913, 27, 'Jordan'),
(914, 27, 'La Belleza'),
(915, 27, 'Landazuri'),
(916, 27, 'La Paz'),
(917, 27, 'Lebrija'),
(918, 27, 'Los Santos'),
(919, 27, 'Macaravita'),
(920, 27, 'Malaga'),
(921, 27, 'Matanza'),
(922, 27, 'Mogotes'),
(923, 27, 'Molagavita'),
(924, 27, 'Ocamonte'),
(925, 27, 'Oiba'),
(926, 27, 'Onzaga'),
(927, 27, 'Palmar'),
(928, 27, 'Palmas del Socorro'),
(929, 27, 'Paramo'),
(930, 27, 'Pie de Cuesta'),
(931, 27, 'Pinchote'),
(932, 27, 'Puente Nacional'),
(933, 27, 'Puerto Parra'),
(934, 27, 'Puerto Wilches'),
(935, 27, 'Rionegro'),
(936, 27, 'Sabana de Torres'),
(937, 27, 'San Andres'),
(938, 27, 'San Benito'),
(939, 27, 'San Gil'),
(940, 27, 'San Joaquin'),
(941, 27, 'San Jose de Miranda'),
(942, 27, 'San Miguel'),
(943, 27, 'San Vicente de Chucuri'),
(944, 27, 'Santa Barbara'),
(945, 27, 'Santa Helena del Opon'),
(946, 27, 'Simacota'),
(947, 27, 'Socorro'),
(948, 27, 'Suaita'),
(949, 27, 'Sucre'),
(950, 27, 'Surata'),
(951, 27, 'Tona'),
(952, 27, 'Valle de San Jose'),
(953, 27, 'Velez'),
(954, 27, 'Vetas'),
(955, 27, 'Villanueva'),
(956, 27, 'Zapatoca'),
(957, 28, 'Sincelejo'),
(958, 28, 'Buenavista'),
(959, 28, 'Caimito'),
(960, 28, 'Coloso (Ricaurte)'),
(961, 28, 'Corozal'),
(962, 28, 'Chalan'),
(963, 28, 'Galeras (Nueva Granada)'),
(964, 28, 'Guaranda'),
(965, 28, 'La Union'),
(966, 28, 'Los Palmitos'),
(967, 28, 'Majagual'),
(968, 28, 'Morroa'),
(969, 28, 'Ovejas'),
(970, 28, 'Palmito'),
(971, 28, 'Sampues'),
(972, 28, 'San Benito Abad'),
(973, 28, 'San Juan de Betulia'),
(974, 28, 'San Marcos'),
(975, 28, 'San Onofre'),
(976, 28, 'San Pedro'),
(977, 28, 'Since'),
(978, 28, 'Sucre'),
(979, 28, 'Tolu'),
(980, 28, 'Toluviejo'),
(981, 29, 'Ibague'),
(982, 29, 'Alpujarra'),
(983, 29, 'Alvarado'),
(984, 29, 'Ambalema'),
(985, 29, 'Anzoategui'),
(986, 29, 'Armero (Guayabal)'),
(987, 29, 'Ataco'),
(988, 29, 'Cajamarca'),
(989, 29, 'Carmen de Apicala'),
(990, 29, 'Casabianca'),
(991, 29, 'Chaparral'),
(992, 29, 'Coello'),
(993, 29, 'Coyaima'),
(994, 29, 'Cunday'),
(995, 29, 'Dolores'),
(996, 29, 'Espinal'),
(997, 29, 'Falan'),
(998, 29, 'Flandes'),
(999, 29, 'Fresno'),
(1000, 29, 'Guamo'),
(1001, 29, 'Herveo'),
(1002, 29, 'Honda'),
(1003, 29, 'Icononzo'),
(1004, 29, 'Lerida'),
(1005, 29, 'Libano'),
(1006, 29, 'Mariquita'),
(1007, 29, 'Melgar'),
(1008, 29, 'Murillo'),
(1009, 29, 'Natagaima'),
(1010, 29, 'Ortega'),
(1011, 29, 'Palocabildo'),
(1012, 29, 'Piedras'),
(1013, 29, 'Planadas'),
(1014, 29, 'Prado'),
(1015, 29, 'Purificacion'),
(1016, 29, 'Rioblanco'),
(1017, 29, 'Roncesvalles'),
(1018, 29, 'Rovira'),
(1019, 29, 'Salda'),
(1020, 29, 'San Antonio'),
(1021, 29, 'San Luis'),
(1022, 29, 'Santa Isabel'),
(1023, 29, 'Suarez'),
(1024, 29, 'Valle de San Juan'),
(1025, 29, 'Venadillo'),
(1026, 29, 'Villahermosa'),
(1027, 29, 'Villarrica'),
(1028, 30, 'Cali'),
(1029, 30, 'Alcala'),
(1030, 30, 'Andalucia'),
(1031, 30, 'Ansermanuevo'),
(1032, 30, 'Argelia'),
(1033, 30, 'Bolivar'),
(1034, 30, 'Buenaventura'),
(1035, 30, 'Buga'),
(1036, 30, 'Bugalagrande'),
(1037, 30, 'Caicedonia'),
(1038, 30, 'Calima (Darien)'),
(1039, 30, 'Candelaria'),
(1040, 30, 'Cartago'),
(1041, 30, 'Dagua'),
(1042, 30, 'El aguila'),
(1043, 30, 'El Cairo'),
(1044, 30, 'El Cerrito'),
(1045, 30, 'El Dovio'),
(1046, 30, 'Florida'),
(1047, 30, 'Ginebra'),
(1048, 30, 'Guacari'),
(1049, 30, 'Jamundi'),
(1050, 30, 'La Cumbre'),
(1051, 30, 'La Union'),
(1052, 30, 'La Victoria'),
(1053, 30, 'Obando'),
(1054, 30, 'Palmira'),
(1055, 30, 'Pradera'),
(1056, 30, 'Restrepo'),
(1057, 30, 'Riofrio'),
(1058, 30, 'Roldanillo'),
(1059, 30, 'San Pedro'),
(1060, 30, 'Sevilla'),
(1061, 30, 'Toro'),
(1062, 30, 'Trujillo'),
(1063, 30, 'Tulua'),
(1064, 30, 'Ulloa'),
(1065, 30, 'Versalles'),
(1066, 30, 'Vijes'),
(1067, 30, 'Yotoco'),
(1068, 30, 'Yumbo'),
(1069, 30, 'Zarzal'),
(1070, 31, 'Mitu'),
(1071, 31, 'Caruru'),
(1072, 31, 'Tatama'),
(1073, 32, 'Puerto Carre'),
(1074, 32, 'La Primavera'),
(1075, 32, 'Santa Rosalia'),
(1076, 32, 'Cumaribo');

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE IF NOT EXISTS `noticeboard` (
`notice_id` int(11) NOT NULL,
  `notice_title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `notice` longtext COLLATE utf8_unicode_ci NOT NULL,
  `create_timestamp` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `noticeboard`
--

INSERT INTO `noticeboard` (`notice_id`, `notice_title`, `notice`, `create_timestamp`) VALUES
(1, 'Bienvenidos al Software academico CEIS', 'Este software ha sido diseñado para mejorar y optimizar el proceso de registro y gestión de estudiantes en la academia.', 1410933600);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
`parent_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `relation_with_student` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `profession` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
`payment_id` int(11) NOT NULL,
  `payment_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `transaction_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
`settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
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
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`student_id` int(11) NOT NULL,
  `documento` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ndocumento` int(18) NOT NULL,
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
  `cod_regional` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_regional` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cod_departamento` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_departamento` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cod_municipio` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_municipio` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_gremio` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lin_formacion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cod_ocupacion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_ocupacion` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cod_curso` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_sector_eco` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_subsector_eco` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cod_dep_dom` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sena` tinyint(2) NOT NULL,
  `barrio` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `departamento` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `municipio` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `caracterizacion` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `documento`, `ndocumento`, `name`, `snombre`, `papellido`, `sapellido`, `birthday`, `sex`, `estado_civil`, `tienehijos`, `ndehijos`, `nlibmilitar`, `tipodeingreso`, `empresa`, `address`, `phone`, `email`, `class_id`, `cod_regional`, `nom_regional`, `cod_departamento`, `nom_departamento`, `cod_municipio`, `nom_municipio`, `emp_gremio`, `lin_formacion`, `cod_ocupacion`, `nom_ocupacion`, `cod_curso`, `nom_sector_eco`, `nom_subsector_eco`, `cod_dep_dom`, `sena`, `barrio`, `departamento`, `municipio`, `caracterizacion`) VALUES
(1, 'CC', 1143124464, 'fredy', 'saul', 'teheran', 'tovar', '09/18/2014', 'masculino', 'Soltero', 'no', '0', '1143124464', 'empresa', '2', 'CRA35#69D-93', '3008544984', 'fredyteheran91@gmail.com', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(2, 'CC', 32323232, 'fredy saul teheran tovar', 'fredy', 'tovar', 'kdkdkdk', '', '0', '0', '0', '0', '', '0', '0', 'CRA35#69D-93', '573007870715', 'fredyteheran91@gmail.com', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(3, 'CC', 1129509228, 'Alan', 'Luis', 'Pedraza', 'Teheran', '04/12/1988', 'male', 'Soltero', '0', '0', '0', '0', '0', '', '', '', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(4, 'CC', 1140834339, 'CINDY', 'PAOLA', 'GONZALEZ', 'OSORIO', '', 'female', 'Soltero', '0', '0', '0', '0', '0', '', '', '', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`subject_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `class_id`, `teacher_id`) VALUES
(1, 'Matematicas', 0, 0),
(2, 'Armamento y tiro', 0, 2),
(3, 'fredy saul teheran tovar', 0, 0),
(4, 'colol', 0, 0),
(5, 'CATALOGO DE SERVICIOS', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
`teacher_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `snombre` longtext COLLATE utf8_unicode_ci NOT NULL,
  `papellido` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sapellido` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE IF NOT EXISTS `transport` (
`transport_id` int(11) NOT NULL,
  `route_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `number_of_vehicle` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `route_fare` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
 ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
 ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_routine`
--
ALTER TABLE `class_routine`
 ADD PRIMARY KEY (`class_routine_id`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dormitory`
--
ALTER TABLE `dormitory`
 ADD PRIMARY KEY (`dormitory_id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
 ADD PRIMARY KEY (`email_template_id`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
 ADD PRIMARY KEY (`empresas_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
 ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
 ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
 ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
 ADD PRIMARY KEY (`phrase_id`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
 ADD PRIMARY KEY (`mark_id`);

--
-- Indexes for table `municipio`
--
ALTER TABLE `municipio`
 ADD PRIMARY KEY (`id`), ADD KEY `departamento` (`departamento`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
 ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
 ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
 ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
 ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
 ADD PRIMARY KEY (`transport_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `class_routine`
--
ALTER TABLE `class_routine`
MODIFY `class_routine_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `dormitory`
--
ALTER TABLE `dormitory`
MODIFY `dormitory_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
MODIFY `email_template_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
MODIFY `empresas_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=557;
--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `municipio`
--
ALTER TABLE `municipio`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1077;
--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
MODIFY `transport_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `municipio`
--
ALTER TABLE `municipio`
ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
