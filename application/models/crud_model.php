<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Crud_model extends CI_Model {

	

	function __construct()

    {

        parent::__construct();

    }

	

	function clear_cache()

	{

        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');

        $this->output->set_header('Pragma: no-cache');

	}

	function get_type_name_by_id($type,$type_id='',$field='name')

	{

		return	$this->db->get_where($type,array($type.'_id'=>$type_id))->row()->$field;	

	}

	

	////////STUDENT/////////////

	function get_students($class_id)

	{

		$query	=	$this->db->get_where('student' , array('class_id' => $class_id));

		return $query->result_array();

	}

	

	function get_student_info($student_id)

	{

		$query	=	$this->db->get_where('student' , array('student_id' => $student_id));

		return $query->result_array();

	}

	/////////TEACHER/////////////

	function get_teachers()

	{

		$query	=	$this->db->get('teacher' );

		return $query->result_array();

	}

	function get_teacher_name($teacher_id)

	{

		$query	=	$this->db->get_where('teacher' , array('teacher_id' => $teacher_id));

		$res	=	$query->result_array();

		foreach($res as $row)

			return $row['name'];

	}

	function get_teacher_info($teacher_id)

	{

		$query	=	$this->db->get_where('teacher' , array('teacher_id' => $teacher_id));

		return $query->result_array();

	}

	

	//////////MATERIAS/////////////

	function get_subjects()

	{

		$query	=	$this->db->get('subject' );

		return $query->result_array();

	}	

	function get_subject_info($subject_id)

	{

		$query	=	$this->db->get_where('subject' , array('subject_id' => $subject_id));

		return $query->result_array();

	}

	function get_subjects_by_class($class_id)

	{

		$query	=	$this->db->get_where('subject' , array('class_id' => $class_id));

		return $query->result_array();

	}

	function get_subject_name_by_id($materia_id)

	{

		$query	=	$this->db->get_where('hs_materias' , array('id' => $materia_id))->row();

		return $query->nombre;

	}

	////////////CLASS///////////

	function get_hs_periodo_nombre_periodo($periodo_id){
		$query	=	$this->db->get_where('hs_periodo' , array('id' => $periodo_id));

		$res	=	$query->result_array();

		foreach($res as $row)

			return $row['nombre_periodo'];

	}

	function get_class_name($class_id)

	{

		$query	=	$this->db->get_where('class' , array('class_id' => $class_id));

		$res	=	$query->result_array();

		foreach($res as $row)

			return $row['name'];

	}

    function get_hs_cursos_nombre($class_id)

    {

        $query	=	$this->db->get_where('hs_cursos' , array('id' => $class_id));

        $res	=	$query->result_array();

        foreach($res as $row)

            return $row['nombre'];

    }
    function get_hs_student_cedula_by_id($id){
        $query	=	$this->db->get_where('student' , array('student_id' => $id));
        $res	=	$query->result_array();
        foreach($res as $row)
            return ucfirst($row['ndocumento']);
    }
    function get_hs_student_nombre_by_id($id){
        $query	=	$this->db->get_where('student' , array('student_id' => $id));
        $res	=	$query->result_array();
        foreach($res as $row)
            return ucfirst($row['name']);
    }
    function get_hs_student_apellido_by_id($id){
        $query	=	$this->db->get_where('student' , array('student_id' => $id));
        $res	=	$query->result_array();
        foreach($res as $row)
            return ucfirst($row['papellido']);
    }
    function get_hs_asistencias_presente($estudiante,$materia,$fecha){

        $query	=	$this->db->get_where('hs_asistencias' , array('estudiante' => $estudiante,'materia'=>$materia,'fecha'=>$fecha));
        $res	=	$query->result_array();
        if(count($res)>0){
            foreach($res as $row)
                if($row['presente']=='1') return true;
        }
        return false;
    }
    function get_hs_notas_puntuacion($estudiante,$materia,$evaluacion){

        $query	=	$this->db->get_where('hs_notas' , array('estudiante' => $estudiante,'materia'=>$materia,'evaluacion'=>$evaluacion));
        $res	=	$query->result_array();
        if(count($res)>0){
            foreach($res as $row)
                return $row['puntuacion'];
        }
        return 0;
    }
    function get_class_name_numeric($class_id)

	{

		$query	=	$this->db->get_where('class' , array('class_id' => $class_id));

		$res	=	$query->result_array();

		foreach($res as $row)

			return $row['name_numeric'];

	}

	

	function get_classes()

	{

		$query	=	$this->db->get('class' );

		return $query->result_array();

	}	

	function get_class_info($class_id)

	{

		$query	=	$this->db->get_where('class' , array('class_id' => $class_id));

		return $query->result_array();

	}

	

	//////////EXAMS/////////////

	function get_exams()

	{

		$query	=	$this->db->get('exam' );

		return $query->result_array();

	}	

	function get_exam_info($exam_id)

	{

		$query	=	$this->db->get_where('exam' , array('exam_id' => $exam_id));

		return $query->result_array();

	}	
	
	//////////EMPRESAS/////////////



function get_empresas()

	{

		$query	=	$this->db->get('empresas');

		return $query->result_array();

	}

	function get_empresas_name($empresas_id)

	{

		$query	=	$this->db->get_where('empresas' , array('empresas_id' => $empresas_id));

		$res	=	$query->result_array();

		foreach($res as $row)

			return $row['nit_empresas'];

	}

	function get_empresas_info($empresas_id)

	{

		$query	=	$this->db->get_where('empresas' , array('empresas_id' => $empresas_id));

		return $query->result_array();

	}

	//////////GRADES/////////////

	function get_grades()

	{

		$query	=	$this->db->get('grade' );

		return $query->result_array();

	}	

	function get_grade_info($grade_id)

	{

		$query	=	$this->db->get_where('grade' , array('grade_id' => $grade_id));

		return $query->result_array();

	}	

	function get_grade($mark_obtained)

	{

		$query	=	$this->db->get('grade' );

		$grades	=	$query->result_array();

		foreach($grades as $row)

		{

			if($mark_obtained >= $row['mark_from'] && $mark_obtained <= $row['mark_upto'])

				return $row;

		}

	}

	function create_log($data)

	{

		$data['timestamp']	=	strtotime(date('Y-m-d').' '.date('H:i:s'));

		$data['ip']			=	$_SERVER["REMOTE_ADDR"];

		$location 			=	new SimpleXMLElement(file_get_contents('http://freegeoip.net/xml/'.$_SERVER["REMOTE_ADDR"]));

		$data['location']	=	$location->City.' , '.$location->CountryName;

		$this->db->insert('log' , $data);

	}

	function get_system_settings()

	{

		$query	=	$this->db->get('settings' );

		return $query->result_array();

	}
//////////////FACTURACION//////////////

    function get_hs_facturacion_estado($estado){
        if($estado == 1){
        	return "Cancelado";
        }else{
        	return "No Cancelado";
        }
    }

	

		

	

	////////BACKUP RESTORE/////////

	function create_backup($type)

	{

		$this->load->dbutil();

		

		

		$options = array(

                'format'      => 'txt',             // gzip, zip, txt

                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file

                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file

                'newline'     => "\n"               // Newline character used in backup file

              );

		

		 

		if($type == 'all')

		{

			$tables = array('');

			$file_name	=	'system_backup';

		}

		else 

		{

			$tables = array('tables'	=>	array($type));

			$file_name	=	'backup_'.$type;

		}



		$backup =& $this->dbutil->backup(array_merge($options , $tables)); 





		$this->load->helper('download');

		force_download($file_name.'.sql', $backup);

	}

	

	

	/////////RESTORE TOTAL DB/ DB TABLE FROM UPLOADED BACKUP SQL FILE//////////

	function restore_backup()

	{

		move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/backup.sql');

		$this->load->dbutil();

		

		

		$prefs = array(

            'filepath'						=> 'uploads/backup.sql',

			'delete_after_upload'			=> TRUE,

			'delimiter'						=> ';'

        );

		$restore =& $this->dbutil->restore($prefs); 

		unlink($prefs['filepath']);

	}

	

	/////////DELETE DATA FROM TABLES///////////////

	function truncate($type)

	{

		if($type == 'all')

		{

			$this->db->truncate('student');

			$this->db->truncate('mark');

			$this->db->truncate('teacher');

			$this->db->truncate('subject');

			$this->db->truncate('class');

			$this->db->truncate('exam');

			$this->db->truncate('grade');

		}

		else

		{	

			$this->db->truncate($type);

		}

	}

	

	

	////////IMAGE URL//////////

	function get_image_url($type = '' , $id = '')

	{

		if(file_exists('uploads/'.$type.'_image/'.$id.'.jpg'))

			$image_url	=	base_url().'uploads/'.$type.'_image/'.$id.'.jpg';

		else

			$image_url	=	base_url().'uploads/user.jpg';

			

		return $image_url;

	}

}



