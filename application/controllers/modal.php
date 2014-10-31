<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Modal extends CI_Controller
{


    function __construct(){
		parent::__construct();

        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('url','form'));
        $this->load->database('default');
    }


    /***default functin, redirects to login page if no admin logged in yet***/

    public function index(){}


    function popup($param1 = '', $param2 = '', $param3 = '')

    {

        if ($param1 == 'student_profile') {

            $page_data['current_student_id'] = $param2;

        } else if ($param1 == 'student_academic_result') {

            $page_data['current_student_id'] = $param2;

        } else if ($param1 == 'student_id_card') {

            $page_data['current_student_id'] = $param2;

        } else if ($param1 == 'edit_student') {

            $page_data['edit_data'] = $this->db->get_where('student', array('student_id' => $param2))->result_array();

        } else if ($param1 == 'teacher_profile') {

            $page_data['current_teacher_id'] = $param2;

        } else if ($param1 == 'edit_teacher') {

            $page_data['edit_data'] = $this->db->get_where('teacher', array('teacher_id' => $param2))->result_array();

        } else if ($param1 == 'empresas_id') {

            $page_data['empresas_id'] = $param2;

        } else if ($param1 == 'edit_empresas') {

            $page_data['edit_data'] = $this->db->get_where('empresas', array('empresas_id' => $param2))->result_array();

        } else if ($param1 == 'add_parent') {

            $page_data['student_id'] = $param2;

            $page_data['class_id'] = $param3;

        } else if ($param1 == 'edit_parent') {

            $page_data['edit_data'] = $this->db->get_where('parent', array('parent_id' => $param2))->result_array();

            $page_data['class_id'] = $param3;

        } else if ($param1 == 'edit_materia') {

            $page_data['edit_data'] = $this->db->get_where('hs_materias', array('id' => $param2))->result_array();

        } else if ($param1 == 'edit_curso') {

            $page_data['edit_data'] = $this->db->get_where('hs_cursos', array('id' => $param2))->result_array();

        } else if ($param1 == 'edit_periodo') {

            $page_data['edit_data'] = $this->db->get_where('hs_periodo', array('id' => $param2))->result_array();

        } else if ($param1 == 'edit_evaluacion') {

            $page_data['edit_data'] = $this->db->get_where('hs_evaluaciones', array('id' => $param2))->result_array();

        } else if ($param1 == 'edit_inscripcion') {

            $page_data['edit_data'] = $this->db->get_where('hs_inscripcion', array('id' => $param2))->result_array();

        }else if ($param1 == 'edit_exam') {

            $page_data['edit_data'] = $this->db->get_where('exam', array('exam_id' => $param2))->result_array();

        } else if ($param1 == 'edit_grade') {

            $page_data['edit_data'] = $this->db->get_where('grade', array('grade_id' => $param2))->result_array();

        } else if ($param1 == 'edit_class_routine') {

            $page_data['edit_data'] = $this->db->get_where('class_routine', array('class_routine_id' => $param2))->result_array();

        } else if ($param1 == 'ver_factura') {

            $page_data['edit_data'] = $this->db->get_where('hs_facturacion', array('id' => $param2))->result_array();

        } else if ($param1 == 'edit_factura') {

            $page_data['edit_data'] = $this->db->get_where('hs_facturacion', array('id' => $param2))->result_array();

        } else if ($param1 == 'edit_book') {

            $page_data['edit_data'] = $this->db->get_where('book', array('book_id' => $param2))->result_array();

        } else if ($param1 == 'edit_transport') {

            $page_data['edit_data'] = $this->db->get_where('transport', array('transport_id' => $param2))->result_array();

        } else if ($param1 == 'edit_dormitory') {

            $page_data['edit_data'] = $this->db->get_where('dormitory', array('dormitory_id' => $param2))->result_array();

        } else if ($param1 == 'edit_notice') {

            $page_data['edit_data'] = $this->db->get_where('noticeboard', array('notice_id' => $param2))->result_array();

        }else if ($param1 == 'edit_user') {

            $page_data['edit_data'] = $this->db->get_where('hs_users', array('user_id' => $param2))->result_array();

            $page_data['rol'] = $param3;

        }else if ($param1 == 'user_profile') {

            $page_data['current_user_id'] = $param2;

        }else if ($param1 == 'edit_role') {

            $page_data['edit_data'] = $this->db->get_where('hs_role', array('rol_id' => $param2))->result_array();

        }else if ($param1 == 'edit_subject') {

            $page_data['edit_data'] = $this->db->get_where('subject', array('subject_id' => $param2))->result_array();

        }


        $page_data['page_name'] = $param1;

        $this->load->view('modal', $page_data);

    }

}



