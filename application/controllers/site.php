<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller

{
	public function __construct() {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->library('bcrypt');
        $this->load->helper(array('url'));
        
        $this->load->database('default');
        $this->load->model('inscripcion_model');
        $this->load->helper('date');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
    
    public function index()
    {
        if($this->session->userdata('rol') == FALSE)
        {
			
            redirect(base_url() . 'index.php?login', 'refresh');
        }
        
        $role = $this->db->get_where('hs_role', array('rol_id' => $this->session->userdata('rol')))->result_array();
				
        $page_data['page_name'] = 'dashboard';

        $page_data['page_title'] = 'Escritorio'.' '.$role[0]['rol'];

        $this->load->view('index', $page_data);

    }    


    /****MANAGE STUDENTS CLASSWISE*****/

    function pre_contactos($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('rol') != 1 && $this->session->userdata('rol') != 2)

            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'create') {

            $data['cedula'] = $this->input->post('documento');
            $data['nombre'] = strtoupper($this->input->post('nombre'));
            $data['snombre'] = strtoupper($this->input->post('snombre'));
            $data['papellido'] = strtoupper($this->input->post('papellido'));
            $data['sapellido'] = strtoupper($this->input->post('sapellido'));
            
			$ingreso= $this->input->post('tipodeingreso');
				if($ingreso != '4'){
					$data['tipo_ingreso'] = $ingreso;
				}else{
					$data['tipo_ingreso'] = $this->input->post('helpertipodeingreso');
				}
            $data['empresa'] = $this->input->post('empresa');
            $data['convenio'] = $this->input->post('convenio');
            $data['nom_regional'] = $this->input->post('nom_regional');
            $data['cod_regional'] = $this->input->post('cod_regional');
            $data['nom_departamento'] = $this->input->post('nom_departamento');
            $data['cod_departamento'] = $this->input->post('cod_departamento');
            $data['nom_municipio'] = $this->input->post('nom_municipio');
            $data['cod_municipio'] = $this->input->post('cod_municipio');
            $data['emp_gremio'] = $this->input->post('emp_gremio');
            $data['linea_formacion'] = $this->input->post('linea_formacion');
            $data['sector_economico'] = $this->input->post('sector_eco');
            $data['sub_sector_economico'] = $this->input->post('sub_sector_eco');
            $data['caracterizacion'] = $this->input->post('caracterizacion');
            $data['f_nacimiento'] = date("Y-m-d",strtotime($this->input->post('f_nacimiento')));
            $data['sexo'] = $this->input->post('sexo');
            
            if($data['sexo']=='1'){
				$data['num_lib_militar'] = $this->input->post('nlibmilitar');
			}else{
				$data['num_lib_militar'] = 0;
			}
            $data['edo_civil'] = $this->input->post('edo_civil');
            $data['hijos'] = $this->input->post('hijos');
            $data['num_hijos'] = $this->input->post('num_hijos');
            $data['departamento'] = $this->input->post('departamento');
            $data['municipio'] = $this->input->post('municipio');
            
            $data['residencia'] = $this->input->post('residencia');
            $data['barrio'] = $this->input->post('barrio');
            $data['telefono'] = $this->input->post('telefono');
            $data['email'] = $this->input->post('email');
            $data['talla_camisa'] = $this->input->post('camisa');
			$data['check_cedula'] = ($this->input->post('check_cedula'))?1:0;
            $data['check_lib_militar'] = ($this->input->post('check_lib_militar'))?1:0;
            $data['check_certificado'] = ($this->input->post('check_cert_est'))?1:0;
            $data['check_foto'] = ($this->input->post('check_foto'))?1:0;
            $data['activo'] = 1;
          
			$cedula = $this->db->get_where('hs_estudiantes', array('cedula' => $this->input->post('documento')))->result_array();
          
				if($cedula){

					$this->session->set_flashdata('flash_message', 'Número de Documento ya registrado, por favor verifíque');

					redirect(base_url() . 'index.php?site/pre_contactos/', 'refresh');

				}else{
				 
					$this->db->insert('hs_estudiantes', $data);
					
					$student_id = mysql_insert_id();
					
					$type= explode('.',$_FILES['foto_estudiante']['name']);
					$type= $type[count($type)-1];
					$url= 'uploads/student_image/' . $student_id . '.'.$type;

					move_uploaded_file($_FILES['foto_estudiante']['tmp_name'],$url );
					
					$avatar['foto'] = $student_id .'.'.$type;
            
					$this->db->where('id', $student_id);

					$this->db->update('hs_estudiantes', $avatar);
					
					$this->session->set_flashdata('flash_message', '¡Estudiante registrado con éxito!');
					redirect(base_url() . 'index.php?site/pre_contactos/', 'refresh');
				}
			
        }

        if ($param1 == 'do_update') {

           $data['cedula'] = $this->input->post('documento');
            $data['nombre'] = strtoupper($this->input->post('nombre'));
            $data['snombre'] = strtoupper($this->input->post('snombre'));
            $data['papellido'] = strtoupper($this->input->post('papellido'));
            $data['sapellido'] = strtoupper($this->input->post('sapellido'));
            
			$ingreso= $this->input->post('tipodeingreso');
				if($ingreso != '4'){
					$data['tipo_ingreso'] = $ingreso;
				}else{
					$data['tipo_ingreso'] = $this->input->post('helpertipodeingreso');
				}
            $data['empresa'] = $this->input->post('empresa');
            $data['convenio'] = $this->input->post('convenio');
            
            $data['nom_regional'] = 	($data['convenio'] == 1)? $this->input->post('nom_regional'): 0;
            $data['cod_regional'] = 	($data['convenio'] == 1)? $this->input->post('cod_regional'): '';
            $data['nom_departamento'] = ($data['convenio'] == 1)? $this->input->post('nom_departamento'): 0;
            $data['cod_departamento'] = ($data['convenio'] == 1)? $this->input->post('cod_departamento'): '';
            $data['nom_municipio'] = 	($data['convenio'] == 1)? $this->input->post('nom_municipio'): 0;
            $data['cod_municipio'] = 	($data['convenio'] == 1)? $this->input->post('cod_municipio'): '';
            $data['emp_gremio'] = 		($data['convenio'] == 1)? $this->input->post('emp_gremio'): '';
            $data['linea_formacion'] = 	($data['convenio'] == 1)? $this->input->post('linea_formacion'): '';
            $data['sector_economico'] = ($data['convenio'] == 1)? $this->input->post('sector_eco'): '';
            $data['sub_sector_economico'] = ($data['convenio'] == 1)? $this->input->post('sub_sector_eco'): '';
            $data['caracterizacion'] = 	($data['convenio'] == 1)? $this->input->post('caracterizacion'): '';
			
            $data['f_nacimiento'] = date("Y-m-d",strtotime($this->input->post('f_nacimiento')));
            $data['sexo'] = $this->input->post('sexo');
            
            if($data['sexo']=='1'){
				$data['num_lib_militar'] = $this->input->post('nlibmilitar');
			}else{
				$data['num_lib_militar'] = 0;
			}
            $data['edo_civil'] = $this->input->post('edo_civil');
            $data['hijos'] = $this->input->post('hijos');
            $data['num_hijos'] = $this->input->post('num_hijos');
            $data['departamento'] = $this->input->post('departamento');
            $data['municipio'] = ($this->input->post('municipio_') != 0)? $this->input->post('municipio_'): $this->input->post('municipio');
            
            $data['residencia'] = ucwords($this->input->post('residencia'));
            $data['barrio'] = ucwords($this->input->post('barrio'));
            $data['telefono'] = $this->input->post('telefono');
            $data['email'] = $this->input->post('email');
            $data['talla_camisa'] = $this->input->post('camisa');
			$data['check_cedula'] = ($this->input->post('check_cedula'))?1:0;
            $data['check_lib_militar'] = ($this->input->post('check_lib_militar'))?1:0;
            $data['check_certificado'] = ($this->input->post('check_cert_est'))?1:0;
            $data['check_foto'] = ($this->input->post('check_foto'))?1:0;
  
			$foto= $this->input->post('foto_estudiante');
			
			$type= ($_FILES['new_foto_estudiante']['type'] == '')? explode('.',$foto) : explode('.',$_FILES['new_foto_estudiante']['name']);
			
			$type= $type[count($type)-1];
			
			$url= 'uploads/student_image/' . $param2 . '.'.$type;
			
			move_uploaded_file($_FILES['new_foto_estudiante']['tmp_name'],$url );
			
			$data['foto'] = $param2.'.'.$type;
		
            
            $this->db->where('id', $param2);

            $this->db->update('hs_estudiantes', $data);
            
			$this->session->set_flashdata('flash_message', '¡Registro editado con éxito!');
            
            redirect(base_url() . 'index.php?site/pre_contactos/', 'refresh');

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('hs_estudiantes', array(

                'id' => $param2

            ))->result_array();

       // } else if ($param1 == 'personal_profile') {

       //     $page_data['personal_profile'] = true;

       //     $page_data['current_student_id'] = $param2;

       // }  else if ($param1 == 'academic_result') {

       //     $page_data['academic_result'] = true;

       //     $page_data['current_student_id'] = $param3;

        }

        if ($param1 == 'delete') {

            $this->db->where('id', $param2);

            $this->db->delete('hs_estudiantes');

            redirect(base_url() . 'index.php?site/pre_contactos/', 'refresh');

        }

        $this->db->select('*');
        $this->db->where('activo' , 1);
        $this->db->order_by('nombre', 'asc');
        $this->db->from('hs_estudiantes');
        $query= $this->db->get();
        $page_data['estudiantes'] = $query->result_array();

        $page_data['page_name'] = 'pre_contactos';

        $page_data['page_title'] = get_phrase('manage_student');

        $this->load->view('index', $page_data);

    }
    

    /****funcion profesores modificar*****/

    function teacher($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('rol') == FALSE)

           redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'create') {

            $data['name'] = $this->input->post('name');
            $data['snombre'] = $this->input->post('snombre');
            $data['papellido'] = $this->input->post('papellido');
            $data['sapellido'] = $this->input->post('sapellido');

            $data['birthday'] = $this->input->post('birthday');

            $data['sex'] = $this->input->post('sex');

            $data['address'] = $this->input->post('address');

            $data['phone'] = $this->input->post('phone');

            $data['email'] = $this->input->post('email');

            $password = $this->input->post('password');
            
			$data['password'] = $this->bcrypt->hash_password($password);

            $this->db->insert('teacher', $data);

            $teacher_id = mysql_insert_id();

            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $teacher_id . '.jpg');

            $this->email_model->account_opening_email('teacher', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL

            redirect(base_url() . 'index.php?site/teacher/', 'refresh');

        }

        if ($param1 == 'do_update') {

            $data['name'] = $this->input->post('name');
            $data['snombre'] = $this->input->post('snombre');
            $data['papellido'] = $this->input->post('papellido');
            $data['sapellido'] = $this->input->post('sapellido');

            $data['birthday'] = $this->input->post('birthday');

            $data['sex'] = $this->input->post('sex');

            $data['address'] = $this->input->post('address');

            $data['phone'] = $this->input->post('phone');

            $data['email'] = $this->input->post('email');

            $password = $this->input->post('password');
            
			$data['password'] = $this->bcrypt->hash_password($password);


            $this->db->where('teacher_id', $param2);

            $this->db->update('teacher', $data);

            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $param2 . '.jpg');

            redirect(base_url() . 'index.php?site/teacher/', 'refresh');

        } else if ($param1 == 'personal_profile') {

            $page_data['personal_profile'] = true;

            $page_data['current_teacher_id'] = $param2;

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('teacher', array(

                'teacher_id' => $param2

            ))->result_array();

        }

        if ($param1 == 'delete') {

            $this->db->where('teacher_id', $param2);

            $this->db->delete('teacher');

            redirect(base_url() . 'index.php?site/teacher/', 'refresh');

        }

        $page_data['teachers'] = $this->db->get('teacher')->result_array();

        $page_data['page_name'] = 'teacher';

        $page_data['page_title'] = get_phrase('manage_teacher');

        $this->load->view('index', $page_data);

    }


    /****GESTIONAR MATERIAS*****/

    function materias($param1 = '', $param2 = '')

    {

        if ($this->session->userdata('rol') == false)

            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'create') {

            $data['nombre'] = $this->input->post('materias');

            $data['curso'] = $this->input->post('curso');

            $data['profesor'] = $this->input->post('profesor');

            $this->db->insert('hs_materias', $data);

            redirect(base_url() . 'index.php?site/materias/0', 'refresh');

        }

        if ($param1 == 'do_update') {

            $data['nombre'] = $this->input->post('materias');

            $data['curso'] = $this->input->post('curso');

            $data['profesor'] = $this->input->post('profesor');


            $this->db->where('id', $param2);

            $this->db->update('hs_materias', $data);

            redirect(base_url() . 'index.php?site/materias/' . $param1, 'refresh');

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('hs_materias', array(

                'id' => $param2

            ))->result_array();

        }

        if ($param1 == 'delete') {

            $this->db->where('id', $param2);

            $this->db->delete('hs_materias');

            redirect(base_url() . 'index.php?site/materias/' . $param1, 'refresh');

        }
        if($this->session->userdata('rol')==1){ 
            $this->db->select('*');
            $this->db->where('curso' , $param1);
            $this->db->order_by('nombre', 'asc');
            $this->db->from('hs_materias');
            $query= $this->db->get();
            $page_data['materias'] = $query->result_array();
        }else{
            if($this->session->userdata('rol')==2){
                $page_data['materias'] = $this->db->get('hs_materias')->result_array();
            }
        }

            $page_data['page_name'] = 'materias';

            $page_data['page_title'] = get_phrase('gestionar_materias');

            $this->load->view('index', $page_data);

    }

    function configurar_cursos($param1 = '', $param2 = '')

    {

        if ($this->session->userdata('rol') != 1)

            redirect(base_url(), 'refresh');

        if ($param1 == 'create') {

            $materias= $this->input->post('materias');
            
            foreach ($materias as $materia) {
                $data['curso'] = $this->input->post('curso');
                $data['materia']=$materia;
                
                $this->db->insert('curso_materia', $data);
            }

            redirect(base_url() . 'index.php?site/configurar_cursos/', 'refresh');

        }

        if ($param1 == 'do_update') {

            $data['curso'] = $this->input->post('curso');
            $data['materia'] = $this->input->post('materias');

            $this->db->where('id', $param2);

            $this->db->update('curso_materia', $data);

            redirect(base_url() . 'index.php?site/configurar_cursos/', 'refresh');

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('curso_materia', array(

                'id' => $param2

            ))->result_array();

        }

        if ($param1 == 'delete') {

            $this->db->where('id', $param2);

            $this->db->delete('curso_materia');

            redirect(base_url() . 'index.php?site/configurar_cursos/', 'refresh');

        }
            $this->db->select('*');
            $this->db->order_by('curso', 'asc');
            $this->db->from('curso_materia');
            $query= $this->db->get();
            $page_data['configurar_cursos'] = $query->result_array();

        $page_data['page_name'] = 'configurar_cursos';

        $page_data['page_title'] = get_phrase('configurar_cursos');

        $this->load->view('index', $page_data);

    }


    /****MANAGE empresas*****/

    function empresas($param1 = '', $param2 = '')

    {

        if ($this->session->userdata('rol') != 1)

            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'create') {

            $data['nit'] = $this->input->post('nit_empresas');

            $data['nombre'] = $this->input->post('nombre_empresas');

            $data['contacto'] = $this->input->post('contacto_empresa');

            $this->db->insert('hs_empresas', $data);

            redirect(base_url() . 'index.php?site/empresas/', 'refresh');

        }

        if ($param1 == 'do_update') {

            $data['nit'] = $this->input->post('nit');

            $data['nombre'] = $this->input->post('nombre');

            $data['contacto'] = $this->input->post('contacto');


            $this->db->where('id', $param2);

            $this->db->update('hs_empresas', $data);

            redirect(base_url() . 'index.php?site/empresas/', 'refresh');

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('hs_empresas', array(

                'id' => $param2

            ))->result_array();

        }

        if ($param1 == 'delete') {

            $this->db->where('id', $param2);

            $this->db->delete('hs_empresas');

            redirect(base_url() . 'index.php?site/empresas/', 'refresh');

        }

        $page_data['empresas'] = $this->db->not_like('nombre', 'Particular')->get('hs_empresas')->result_array();

        $page_data['page_name'] = 'empresas';

        $page_data['page_title'] = get_phrase('gestionar_empresas');

        $this->load->view('index', $page_data);

    }

    /****MANAGE reportes*****/

    function reportes($param1 = '', $param2 = '')

    {

        if ($this->session->userdata('rol') != 1)

            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'create') {

            $data['nit'] = $this->input->post('nit_empresas');

            $data['nombre'] = $this->input->post('nombre_empresas');

            $data['contacto'] = $this->input->post('contacto_empresa');

            $this->db->insert('hs_empresas', $data);

            redirect(base_url() . 'index.php?site/empresas/', 'refresh');

        }

        if ($param1 == 'do_update') {

            $data['nit'] = $this->input->post('nit');

            $data['nombre'] = $this->input->post('nombre');

            $data['contacto'] = $this->input->post('contacto');


            $this->db->where('id', $param2);

            $this->db->update('hs_empresas', $data);

            redirect(base_url() . 'index.php?site/empresas/', 'refresh');

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('hs_empresas', array(

                'id' => $param2

            ))->result_array();

        }

        if ($param1 == 'delete') {

            $this->db->where('id', $param2);

            $this->db->delete('hs_empresas');

            redirect(base_url() . 'index.php?site/empresas/', 'refresh');

        }

        $page_data['page_name'] = 'reportes';

        $page_data['page_title'] = get_phrase('gestionar_reportes');

        $this->load->view('index', $page_data);

    }

	/****MANAGE CURSOS*****/

    function cursos($param1 = '', $param2 = '')

    {

        if ($this->session->userdata('rol') != 1)

            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'create') {

            $data['curso'] = $this->input->post('curso');
            $data['seccion'] = $this->input->post('seccion');            
            $data['fecha_ini']= formatDate($this->input->post('fecha_ini'));
            $data['fecha_cul']= formatDate($this->input->post('fecha_cul'));
            $data['cupo'] = $this->input->post('cupo');
            $data['duracion'] = $this->input->post('duracion');

            $this->db->insert('hs_cursos', $data);

            redirect(base_url() . 'index.php?site/cursos/', 'refresh');

        }

        if ($param1 == 'do_update') {


            $data['seccion'] = $this->input->post('seccion');
            $data['fecha_ini']= formatDate($this->input->post('fecha_ini'));
            $data['fecha_cul']= formatDate($this->input->post('fecha_cul'));
            $data['cupo'] = $this->input->post('cupo');
            $data['duracion'] = $this->input->post('duracion');

            $this->db->where('id', $param2);
            $this->db->update('hs_cursos', $data);

            redirect(base_url() . 'index.php?site/cursos/', 'refresh');

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('hs_cursos', array(
                'id' => $param2
            ))->result_array();

        }

        if ($param1 == 'delete') {

            $this->db->where('id', $param2);
            $this->db->delete('hs_cursos');

            redirect(base_url() . 'index.php?site/cursos/', 'refresh');
        }

        $this->db->select('*');
        $this->db->order_by('curso', 'asc');
        $this->db->from('hs_cursos');
        $query= $this->db->get();
        $page_data['cursos'] = $query->result_array();

        $page_data['page_name'] = 'cursos';
        $page_data['page_title'] = get_phrase('manage_class');

        $this->load->view('index', $page_data);

    }

    
    /****MANAGE EXAM notas*****/

    function notas($param1 = '', $param2 = '', $param3 = '', $param4 = '', $param5 = '')

    {

        if ($this->session->userdata('rol') != 1 && $this->session->userdata('rol') != 2)

            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'evaluar') {
            
            $result = $this->db->get_where('hs_notas', array('estudiante' => $param4, 'curso' => $param2, 'materia' => $param3))->num_rows();
            
            if ($result == 0) {

                $data['curso'] = $param2;

                $data['materia'] = $param3;

                $data['estudiante'] = $param4;

                $data['nota1'] = $this->input->post('nota1');

                $data['nota2'] = $this->input->post('nota2');

                $data['nota3'] = $this->input->post('nota3');

                $data['def'] = $this->input->post('def');

                $this->db->insert('hs_notas', $data);

                redirect(base_url() . 'index.php?site/gestionar_cursos/', 'refresh');

            }else{

                $nota = $this->db->get_where('hs_notas', array('estudiante' => $param4, 'curso' => $param2, 'materia' => $param3))->result_array();

                $data['nota1'] = $this->input->post('nota1');

                $data['nota2'] = $this->input->post('nota2');

                $data['nota3'] = $this->input->post('nota3');

                $data['def'] = $this->input->post('def');

                $this->db->where('id', $nota[0]['id']);

                $this->db->update('hs_notas', $data);

                redirect(base_url() . 'index.php?site/gestionar_cursos/', 'refresh');
            }
        }

        $page_data['page_info'] = 'Exam marks';


        $page_data['page_name'] = 'notas';

        $page_data['page_title'] = get_phrase('manage_exam_marks');

        $this->load->view('index', $page_data);

    }


    /****MANAGE EXAM notas*****/

    function asistencias($param1 = '', $param2 = '', $param3 = '', $param4 = '', $param5 = '')

    {

        if ($this->session->userdata('rol') != 1 && $this->session->userdata('rol') != 2)

            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'anotar') {

            $fecha = $this->input->post('fecha');
            $fecha = explode('/', $fecha);
            $fecha = $fecha[2] . '-' . $fecha[1] . '-' . $fecha[0];

            $existe = $this->db->get_where('hs_asistencias', array('fecha' => $fecha, 'estudiante' => $param4, 'materia' => $param3, 'curso' => $param2))->num_rows();
            
            if ($existe == 0) {

                $data['curso'] = $param2;

                $data['materia'] = $param3;

                $data['estudiante'] = $param4;

                $data['fecha'] = $fecha;

                $data['presente'] = $this->input->post('presente');

                $this->db->insert('hs_asistencias', $data);

                redirect(base_url() . 'index.php?site/gestionar_cursos/', 'refresh');

            }else{

                $asistencia = $this->db->get_where('hs_asistencias', array('estudiante' => $param4, 'curso' => $param2, 'materia' => $param3))->result_array();

                $data['presente'] = $this->input->post('presente');

                $this->db->where('id', $asistencia[0]['id']);

                $this->db->update('hs_asistencias', $data);

                redirect(base_url() . 'index.php?site/gestionar_cursos/', 'refresh');
            }
        }

        $page_data['page_info'] = 'Asistencias';


        $page_data['page_name'] = 'asistencias';

        $page_data['page_title'] = get_phrase('Gestionar Asistencias');

        $this->load->view('index', $page_data);

    }



    /****MANAGE GRADES*****/

    function grade($param1 = '', $param2 = '')

    {

        if ($this->session->userdata('rol') != 1)

            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'create') {

            $data['name'] = $this->input->post('name');

            $data['grade_point'] = $this->input->post('grade_point');

            $data['mark_from'] = $this->input->post('mark_from');

            $data['mark_upto'] = $this->input->post('mark_upto');

            $data['comment'] = $this->input->post('comment');

            $this->db->insert('grade', $data);

            redirect(base_url() . 'index.php?site/grade/', 'refresh');

        }

        if ($param1 == 'do_update') {

            $data['name'] = $this->input->post('name');

            $data['grade_point'] = $this->input->post('grade_point');

            $data['mark_from'] = $this->input->post('mark_from');

            $data['mark_upto'] = $this->input->post('mark_upto');

            $data['comment'] = $this->input->post('comment');


            $this->db->where('grade_id', $param2);

            $this->db->update('grade', $data);

            redirect(base_url() . 'index.php?site/grade/', 'refresh');

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('grade', array(

                'grade_id' => $param2

            ))->result_array();

        }

        if ($param1 == 'delete') {

            $this->db->where('grade_id', $param2);

            $this->db->delete('grade');

            redirect(base_url() . 'index.php?site/grade/', 'refresh');

        }

        $page_data['grades'] = $this->db->get('grade')->result_array();

        $page_data['page_name'] = 'grade';

        $page_data['page_title'] = get_phrase('manage_grade');

        $this->load->view('index', $page_data);

    }


    /**********MANAGING horarios_materia******************/


    function horarios_materias($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('rol') == FALSE)

            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'create') {

            $data['curso'] = $this->input->post('cursos');

            $data['materia'] = $this->input->post('materias');

            $data['hora_inicio'] = $this->input->post('time_start') + (12 * ($this->input->post('starting_ampm') - 1));

            $data['hora_fin'] = $this->input->post('time_end') + (12 * ($this->input->post('ending_ampm') - 1));

            $data['dia'] = $this->input->post('dia');

            $this->db->insert('hs_horarios_materias', $data);

            redirect(base_url() . 'index.php?site/horarios_materias/', 'refresh');

        }

        if ($param1 == 'do_update') {

            $data['curso'] = $this->input->post('cursos');

            $data['materia'] = $this->input->post('materias');

            $data['hora_inicio'] = $this->input->post('time_start') + (12 * ($this->input->post('starting_ampm') - 1));

            $data['hora_fin'] = $this->input->post('time_end') + (12 * ($this->input->post('ending_ampm') - 1));

            $data['dia'] = $this->input->post('dia');


            $this->db->where('id', $param2);

            $this->db->update('hs_horarios_materias', $data);

            redirect(base_url() . 'index.php?site/horarios_materias/', 'refresh');

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('hs_horarios_materias', array(

                'id' => $param2

            ))->result_array();

        }

        if ($param1 == 'delete') {

            $this->db->where('id', $param2);

            $this->db->delete('hs_horarios_materias');

            redirect(base_url() . 'index.php?site/horarios_materias/', 'refresh');

        }

        $page_data['page_name'] = 'horarios_materias';

        $page_data['page_title'] = "Horarios de materias";

        $this->load->view('index', $page_data);

    }

    /******MANAGE BILLING / INVOICES WITH STATUS*****/

    function facturacion($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('rol') != 1)

            redirect(base_url() . 'index.php?login', 'refresh');


        if ($param1 == 'create_estudiante') {

            $data['estudiante'] = $this->input->post('estudiante');

            $data['curso'] = $this->input->post('curso');

            $data['descripcion'] = $this->input->post('descripcion');

            $data['cantidad'] = $this->input->post('cantidad');

            $data['monto'] = $this->input->post('monto');

            $data['metodo_pago'] = $this->input->post('metodo_pago');

            $data['estado'] = $this->input->post('estado');

            $data['fecha']= formatDate($this->input->post('fecha'));


            $this->db->insert('hs_facturacion', $data);

            redirect(base_url() . 'index.php?site/facturacion', 'refresh');

        }

        if ($param1 == 'create_empresa') {

            $data['empresa'] = $this->input->post('empresa');

            $data['curso'] = $this->input->post('curso');

            $data['descripcion'] = $this->input->post('descripcion');

            $data['monto'] = $this->input->post('monto');

            $data['metodo_pago'] = $this->input->post('metodo_pago');

            $data['estado'] = $this->input->post('estado');

            $data['fecha']= formatDate($this->input->post('fecha'));


            $this->db->insert('hs_facturacion_empresas', $data);

            redirect(base_url() . 'index.php?site/facturacion', 'refresh');

        }

        if ($param1 == 'do_update1') {

            $data['estudiante'] = $this->input->post('estudiante');

            $data['curso'] = $this->input->post('curso');

            $data['descripcion'] = $this->input->post('descripcion');

            $data['cantidad'] = $this->input->post('cantidad');

            $data['monto'] = $this->input->post('monto');

            $data['metodo_pago'] = $this->input->post('metodo_pago');

            $data['estado'] = $this->input->post('estado');

            $data['fecha']= formatDate($this->input->post('fecha'));


            $this->db->where('id', $param2);

            $this->db->update('hs_facturacion', $data);

            redirect(base_url() . 'index.php?site/facturacion', 'refresh');

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('hs_facturacion', array(

                'id' => $param2

            ))->result_array();

        }

        if ($param1 == 'do_update2') {

            $data['empresa'] = $this->input->post('empresa');

            $data['curso'] = $this->input->post('curso');

            $data['descripcion'] = $this->input->post('descripcion');

            $data['monto'] = $this->input->post('monto');

            $data['metodo_pago'] = $this->input->post('metodo_pago');

            $data['estado'] = $this->input->post('estado');

            $data['fecha']= formatDate($this->input->post('fecha'));


            $this->db->where('id', $param2);

            $this->db->update('hs_facturacion_empresas', $data);

            redirect(base_url() . 'index.php?site/facturacion', 'refresh');

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('hs_facturacion', array(

                'id' => $param2

            ))->result_array();

        }

        if ($param1 == 'do_update_empresas') {

            $data['empresa'] = $this->input->post('empresa');

            $data['curso'] = $this->input->post('cursos');

            $data['descripcion'] = $this->input->post('descripcion');

            $data['monto'] = $this->input->post('monto');

            $data['metodo_pago'] = $this->input->post('metodo_pago');

            $data['estado'] = $this->input->post('estado');

            $data['fecha']= formatDate($this->input->post('fecha'));


            $this->db->where('id', $param2);

            $this->db->update('hs_facturacion_empresas', $data);

            redirect(base_url() . 'index.php?site/facturacion', 'refresh');

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('hs_facturacion_empresas', array(

                'id' => $param2

            ))->result_array();

        }

        if ($param1 == 'delete') {

            $this->db->where('id', $param2);

            $this->db->delete('hs_facturacion');

            redirect(base_url() . 'index.php?site/facturacion', 'refresh');

        }

        if ($param1 == 'delete_empresa') {

            $this->db->where('id', $param2);

            $this->db->delete('hs_facturacion_empresas');

            redirect(base_url() . 'index.php?site/facturacion', 'refresh');

        }

        $page_data['page_name'] = 'facturacion';

        $page_data['page_title'] = get_phrase('gestionar_facturas');

        $this->db->order_by('fecha', 'desc');

        $page_data['facturacion'] = $this->db->get('hs_facturacion')->result_array();

        $this->load->view('index', $page_data);

    }

    /**********GESTIONAR DOCUMENTOS********************/

    function documentos($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('rol') != 1)

            redirect(base_url() . 'index.php?login', 'refresh');


        $page_data['page_name'] = 'documentos';

        $page_data['page_title'] = get_phrase('documentos_académicos');

        $this->load->view('index', $page_data);


    }

    function consult_nro($param1 = '', $param2 = '', $param3 = '')

    {


        $page_data['page_name'] = 'consult_nro';

        $page_data['page_title'] = get_phrase('Consulta de NRO');

        $this->load->view('index', $page_data);


    }

    /**********GESTIONAR EGRESADOS********************/

    function gestion_egresados($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('rol') != 1)

            redirect(base_url() . 'index.php?login', 'refresh');
        
        if ($param1 == 'create') {

            $id_estudiante= $this->input->post('id_estudiante');
            $tipo= $this->input->post('tipo');

            $data['fecha_egreso'] = $this->input->post('fecha_egreso');
            $data['estado'] = $this->input->post('estado');
            $data['curso'] = $this->input->post('curso');
            $data['seccion'] = $this->input->post('seccion');

            $data['observacion'] = $this->input->post('observacion');
            $data['nro_factura'] = $this->input->post('nro_factura');
            $data['nro_recibo'] = $this->input->post('nro_recibo');

            
            if($tipo == 'egresa'){
                
                $nro_anual = $this->db->get_where('hs_nro_anual', array('id' => 1))->result_array();

                if(date(Y) == $nro_anual[0]['año_actual']){

                    $data['nro_anual']= $nro_anual[0]['ult_nro'] + 1;
                    $nuevo['ult_nro']= $data['nro_anual'];
                    $this->db->where('id', 1);
                    $this->db->update('hs_nro_anual', $nuevo);

                }else{

                    $nuevo['año_actual']= date(Y);
                    $nuevo['ult_nro']= 1;
                    $this->db->where('id', 1);
                    $this->db->update('hs_nro_anual', $nuevo);

                    $data['nro_anual']= $nuevo['ult_nro'];


                }

                $data['activo']= 0;
                $data['no_egresado']= 0;

                $this->db->where('id', $id_estudiante);
                $this->db->update('hs_estudiantes', $data);

            }else{

               if($tipo == 'noegresa'){

                $data['activo']= 0;
                $data['no_egresado']= 1;

                $this->db->where('id', $id_estudiante);
                $this->db->update('hs_estudiantes', $data);


               } 

            }
            $id_curso= $this->input->post('id_curso');

            $this->db->delete('hs_inscripcion', array('estudiante' => $id_estudiante, 'curso' => $id_curso));
            $this->db->delete('hs_notas', array('estudiante' => $id_estudiante, 'curso' => $id_curso));
            $this->db->delete('hs_asistencias', array('estudiante' => $id_estudiante, 'curso' => $id_curso));

            redirect(base_url() . 'index.php?site/gestion_egresados', 'refresh');

        }

        if ($param1 == 'nro') {

            $cedula = $this->input->post('cedula');
            $data['nro'] = $this->input->post('nro');
            $data_nro['ult_nro'] = $this->input->post('nro');

            $this->db->where('id', 1);           
            $this->db->update('hs_nro', $data_nro);

            $this->db->where('activo', 1);
            $this->db->where('cedula', $cedula);
            $this->db->update('hs_estudiantes', $data);                     

            redirect(base_url() . 'index.php?site/gestion_egresados', 'refresh');
        }

        if ($param1 == 'do_update') {

            $data['pnombre'] = $this->input->post('pnombre');
            $data['snombre'] = $this->input->post('snombre');
            $data['papellido'] = $this->input->post('papellido');
            $data['sapellido'] = $this->input->post('sapellido');
            $data['cedula'] = $this->input->post('cedula');
            $data['empresa'] = $this->input->post('empresa');
            $data['fecha_egreso'] = $this->input->post('fecha_egreso');
            $data['estado'] = $this->input->post('estado');
            $data['curso'] = $this->input->post('curso');
            $data['seccion'] = $this->input->post('seccion');
            $data['observacion'] = $this->input->post('observacion');
            $data['nro_factura'] = $this->input->post('nro_factura');
            $data['nro_recibo'] = $this->input->post('nro_recibo');


            $this->db->where('id', $param2);

            $this->db->update('hs_control_egresados', $data);

            redirect(base_url() . 'index.php?site/gestion_egresados', 'refresh');

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('hs_control_egresados', array(

                'id' => $param2

            ))->result_array();

        }

        $page_data['page_name'] = 'gestion_egresados';

        $page_data['page_title'] = get_phrase('gestion_de_egresados');

        $this->load->view('index', $page_data);


    }

    /**********MANAGE TRANSPORT / VEHICLES / ROUTES********************/

    function transport($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('rol') != 2)

            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'create') {

            $data['route_name'] = $this->input->post('route_name');

            $data['number_of_vehicle'] = $this->input->post('number_of_vehicle');

            $data['description'] = $this->input->post('description');

            $data['route_fare'] = $this->input->post('route_fare');

            $this->db->insert('transport', $data);

            redirect(base_url() . 'index.php?site/transport', 'refresh');

        }

        if ($param1 == 'do_update') {

            $data['route_name'] = $this->input->post('route_name');

            $data['number_of_vehicle'] = $this->input->post('number_of_vehicle');

            $data['description'] = $this->input->post('description');

            $data['route_fare'] = $this->input->post('route_fare');


            $this->db->where('transport_id', $param2);

            $this->db->update('transport', $data);

            redirect(base_url() . 'index.php?site/transport', 'refresh');

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('transport', array(

                'transport_id' => $param2

            ))->result_array();

        }

        if ($param1 == 'delete') {

            $this->db->where('transport_id', $param2);

            $this->db->delete('transport');

            redirect(base_url() . 'index.php?site/transport', 'refresh');

        }

        $page_data['transports'] = $this->db->get('transport')->result_array();

        $page_data['page_name'] = 'transport';

        $page_data['page_title'] = get_phrase('manage_transport');

        $this->load->view('index', $page_data);


    }

    /**********MANAGE DORMITORY / HOSTELS / ROOMS ********************/

    function dormitory($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('rol') != 1)

            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'create') {

            $data['name'] = $this->input->post('name');

            $data['number_of_room'] = $this->input->post('number_of_room');

            $data['description'] = $this->input->post('description');

            $this->db->insert('dormitory', $data);

            redirect(base_url() . 'index.php?site/dormitory', 'refresh');

        }

        if ($param1 == 'do_update') {

            $data['name'] = $this->input->post('name');

            $data['number_of_room'] = $this->input->post('number_of_room');

            $data['description'] = $this->input->post('description');


            $this->db->where('dormitory_id', $param2);

            $this->db->update('dormitory', $data);

            redirect(base_url() . 'index.php?site/dormitory', 'refresh');

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('dormitory', array(

                'dormitory_id' => $param2

            ))->result_array();

        }

        if ($param1 == 'delete') {

            $this->db->where('dormitory_id', $param2);

            $this->db->delete('dormitory');

            redirect(base_url() . 'index.php?site/dormitory', 'refresh');

        }

        $page_data['dormitories'] = $this->db->get('dormitory')->result_array();

        $page_data['page_name'] = 'dormitory';

        $page_data['page_title'] = get_phrase('manage_dormitory');

        $this->load->view('index', $page_data);


    }


    /***MANAGE EVENT / NOTICEBOARD, WILL BE SEEN BY ALL ACCOUNTS DASHBOARD**/

    function noticeboard($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('rol') == FALSE)

            redirect(base_url() . 'index.php?login', 'refresh');


        if ($param1 == 'create') {

            $data['notice_title'] = $this->input->post('notice_title');

            $data['notice'] = $this->input->post('notice');

            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));

            $this->db->insert('noticeboard', $data);

            redirect(base_url() . 'index.php?site/noticeboard/', 'refresh');

        }

        if ($param1 == 'do_update') {

            $data['notice_title'] = $this->input->post('notice_title');

            $data['notice'] = $this->input->post('notice');

            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));

            $this->db->where('notice_id', $param2);

            $this->db->update('noticeboard', $data);

            $this->session->set_flashdata('flash_message', get_phrase('notice_updated'));

            redirect(base_url() . 'index.php?site/noticeboard/', 'refresh');

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('noticeboard', array(

                'notice_id' => $param2

            ))->result_array();

        }

        if ($param1 == 'delete') {

            $this->db->where('notice_id', $param2);

            $this->db->delete('noticeboard');

            redirect(base_url() . 'index.php?site/noticeboard/', 'refresh');

        }

        $page_data['page_name'] = 'noticeboard';

        $page_data['page_title'] = get_phrase('manage_noticeboard');

        $page_data['notices'] = $this->db->get('noticeboard')->result_array();

        $this->load->view('index', $page_data);

    }

    /***MANAGE EVENT / NOTICEBOARD, WILL BE SEEN BY ALL ACCOUNTS DASHBOARD**/

    function rss($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('rol') != 1)

           redirect(base_url() . 'index.php?login', 'refresh');


        if ($param1 == 'create') {

            $data['url'] = $this->input->post('url');

            $data['name'] = $this->input->post('name');

            $this->db->insert('rss', $data);

            redirect(base_url() . 'index.php?site/rss/', 'refresh');

        }

        if ($param1 == 'do_update') {

            $data['url'] = $this->input->post('url');

            $data['name'] = $this->input->post('name');


            $this->db->where('id', $param2);

            $this->db->update('rss', $data);

            $this->session->set_flashdata('flash_message', get_phrase('rss_updated'));

            redirect(base_url() . 'index.php?site/rss/', 'refresh');

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('rss', array(

                'id' => $param2

            ))->result_array();

        }

        if ($param1 == 'delete') {

            $this->db->where('id', $param2);

            $this->db->delete('rss');

            redirect(base_url() . 'index.php?site/rss/', 'refresh');

        }

        $page_data['page_name'] = 'rss';

        $page_data['page_title'] = get_phrase('Gestion de RSS');

        $page_data['rss'] = $this->db->get('rss')->result_array();

        $this->load->view('index', $page_data);

    }

    /***CRUD periodo**/

        function periodo($param1 = '', $param2 = '')

    {

        if ($this->session->userdata('rol') != 1)

            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'create') {

            $data['nombre_periodo'] = $this->input->post('nombre_periodo');

            $data['fecha_inicio']= formatDate($this->input->post('fecha_inicio'));

            $data['fecha_fin']= formatDate($this->input->post('fecha_fin'));

            $data['duracion'] = $this->input->post('duracion');

            $this->db->insert('hs_periodo', $data);

            redirect(base_url() . 'index.php?site/periodo/', 'refresh');

        }

        if ($param1 == 'do_update') {

            $data['nombre_periodo'] = $this->input->post('nombre_periodo');

            $data['fecha_inicio']= formatDate($this->input->post('fecha_inicio'));

            $data['fecha_fin']= formatDate($this->input->post('fecha_fin'));

            $data['duracion'] = $this->input->post('duracion');

            $this->db->where('id', $param2);

            $this->db->update('hs_periodo', $data);

            redirect(base_url() . 'index.php?site/periodo/', 'refresh');

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('hs_periodo', array(

                'id' => $param2

            ))->result_array();

        }

        if ($param1 == 'delete') {

            $this->db->where('id', $param2);

            $this->db->delete('hs_periodo');

            redirect(base_url() . 'index.php?site/periodo/', 'refresh');

        }

        $page_data['page_name'] = 'periodo';

        $page_data['page_title'] = get_phrase('Gestionar Periodos');

        $page_data['periodo'] = $this->db->get('hs_periodo')->result_array();

        $this->load->view('index', $page_data);

    }

    /***CRUD evaluaciones**/

        function gestionar_cursos($param1 = '', $param2 = '')

    {

        if ($this->session->userdata('rol') == False)

            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'create') {

            $data['nombre'] = $this->input->post('nombre');

            $data['materia'] = $this->input->post('materia');

            $data['ponderacion'] = $this->input->post('ponderacion');

            $data['fecha'] = convertToDatetime($this->input->post('fecha'),$this->input->post('hora'),$this->input->post('minuto'));

            $this->db->insert('hs_evaluaciones', $data);

            redirect(base_url() . 'index.php?site/gestionar_cursos/', 'refresh');

        }

        if ($param1 == 'do_update') {

            $data['nombre'] = $this->input->post('nombre');

            $data['materia'] = $this->input->post('materia');

            $data['ponderacion'] = $this->input->post('ponderacion');

            $data['fecha'] = convertToDatetime($this->input->post('fecha'),$this->input->post('hora'),$this->input->post('minuto'));

            $this->db->where('id', $param2);

            $this->db->update('hs_evaluaciones', $data);

            redirect(base_url() . 'index.php?site/gestionar_cursos/', 'refresh');

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('hs_evaluaciones', array(

                'id' => $param2

            ))->result_array();

        }

        if ($param1 == 'delete') {

            $this->db->where('id', $param2);

            $this->db->delete('hs_evaluaciones');

            redirect(base_url() . 'index.php?site/gestionar_cursos/', 'refresh');

        }

        $page_data['page_name'] = 'gestionar_cursos';

        $page_data['page_title'] = get_phrase('Gestionar Cursos');

        $this->load->view('index', $page_data);

    }
    /***MANAGE EVENT / NOTICEBOARD, WILL BE SEEN BY ALL ACCOUNTS DASHBOARD**/

    function matriculas($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('rol') != 1 && $this->session->userdata('rol') != 2)

            redirect(base_url() . 'index.php?login', 'refresh');


        if ($param1 == 'create') {

            $data['estudiante'] = $this->input->post('estudiante');

            $data['curso'] = $this->input->post('curso');

            $data['status'] = $this->input->post('status');

            $est_empresa= $this->db->get_where('hs_estudiantes', array( 'id' => $data['estudiante']))->result_array();

            $data['empresa']= $est_empresa['empresa'];


            $this->db->insert('hs_inscripcion', $data);

            redirect(base_url() . 'index.php?site/matriculas/', 'refresh');

        }

        if ($param1 == 'do_update') {

            $data['estudiante'] = $this->input->post('estudiante');

            $data['curso'] = $this->input->post('curso');

            $data['status'] = $this->input->post('status');

            $est_empresa= $this->db->get_where('hs_estudiantes', array( 'id' => $data['estudiante']))->result_array();

            $data['empresa']= $est_empresa['empresa'];


            $this->db->where('id', $param2);

            $this->db->update('hs_inscripcion', $data);

            $this->session->set_flashdata('flash_message', get_phrase('Registro procesado'));

            redirect(base_url() . 'index.php?site/matriculas/', 'refresh');

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('hs_inscripcion', array(

                'id' => $param2

            ))->result_array();

        }

        if ($param1 == 'delete') {

            $this->db->where('id', $param2);

            $this->db->delete('hs_inscripcion');

            redirect(base_url() . 'index.php?site/matriculas/', 'refresh');

        }

        $page_data['page_name'] = 'matriculas';

        $page_data['page_title'] = get_phrase('MATRICULAR');

        $this->db->select('*');
        $this->db->order_by('curso', 'asc');
        $this->db->from('hs_inscripcion');
        $query= $this->db->get();
        $page_data['hs_inscripcion'] = $query->result_array();

        $this->load->view('index', $page_data);

    }

    /*****SITE/SYSTEM SETTINGS*********/

    function system_settings($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('rol') != 1)

            redirect(base_url() . 'index.php?login', 'refresh');


        if ($param2 == 'do_update') {

            $this->db->where('type', $param1);

            $this->db->update('settings', array(

                'description' => $this->input->post('description')

            ));

            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));

            redirect(base_url() . 'index.php?site/system_settings/', 'refresh');

        }

        if ($param1 == 'upload_logo') {

            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');

            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));

            redirect(base_url() . 'index.php?site/system_settings/', 'refresh');

        }

        $page_data['page_name'] = 'system_settings';

        $page_data['page_title'] = get_phrase('system_settings');

        $page_data['settings'] = $this->db->get('settings')->result_array();

        $this->load->view('index', $page_data);

    }

	/****Manage USUARIOS*****/

	
    
	function users($param1 = '', $param2 = '', $param3 = '')

    {
        if ($this->session->userdata('rol') != 1)

            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'create') {
           
            $data['name'] = $this->input->post('name');
            $data['snombre'] = $this->input->post('snombre');
            $data['papellido'] = $this->input->post('papellido');
            $data['sapellido'] = $this->input->post('sapellido');

            $data['sex'] = $this->input->post('sex');

            $data['address'] = $this->input->post('address');

            $data['phone'] = $this->input->post('phone');

            $data['email'] = $this->input->post('email');
			
			$password = $this->input->post('password');
            
			$data['password'] = $this->bcrypt->hash_password($password);
            
            $data['rol'] = $this->input->post('rol');

			$this->db->insert('hs_users', $data);

            $user_id = mysql_insert_id();

            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/user_image/' . $user_id . '.jpg');

            //$this->email_model->account_opening_email('hs_users', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL

            redirect(base_url() . 'index.php?site/users/'.$data['rol'], 'refresh');

        }

        if ($param2 == 'do_update') {

            $data['name'] = $this->input->post('name');
            $data['snombre'] = $this->input->post('snombre');
            $data['papellido'] = $this->input->post('papellido');
            $data['sapellido'] = $this->input->post('sapellido');

            $data['sex'] = $this->input->post('sex');

            $data['address'] = $this->input->post('address');

            $data['phone'] = $this->input->post('phone');

            $data['email'] = $this->input->post('email');
			
			$password = $this->input->post('password');
            
			$data['password'] = $this->bcrypt->hash_password($password);
           
            $data['rol'] = $this->input->post('rol');
            
            $this->db->where('user_id', $param3);

            $this->db->update('hs_users', $data);

            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/user_image/' . $param3 . '.jpg');

            $this->crud_model->clear_cache();

            redirect(base_url() . 'index.php?site/users/' . $param1, 'refresh');
            
            

        } else if ($param2 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('hs_users', array(

                'user_id' => $param3

            ))->result_array();

        } else if ($param2 == 'personal_profile') {

            $page_data['personal_profile'] = true;

            $page_data['current_user_id'] = $param3;

        } 

        if ($param2 == 'delete') {

            $this->db->where('user_id', $param3);

            $this->db->delete('hs_users');

            redirect(base_url() . 'index.php?site/users/' . $param1, 'refresh');

        }

        $page_data['rol'] = $param1;

        $page_data['users'] = $this->db->get_where('hs_users', array(

            'rol' => $param1

        ))->result_array();

        $page_data['page_name'] = 'manage_users';

		$page_data['page_title'] = get_phrase('manejar_usuarios');

        $this->load->view('index', $page_data);

    }
    
    
    /*****ROLE SETTINGS*********/
    
      function manage_role($param1 = '', $param2 = '', $param3 = '')

    {
		
        if ($this->session->userdata('rol') != 1)

            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'create') {

            $data['rol'] = $this->input->post('rol');

            $this->db->insert('hs_role', $data);

            $user_id = mysql_insert_id();


            redirect(base_url() . 'index.php?site/manage_role/', 'refresh');

        }

        if ($param1 == 'do_update') {

            
            $data['rol'] = $this->input->post('rol');


            $this->db->where('rol_id', $param2);

            $this->db->update('hs_role', $data);

            redirect(base_url() . 'index.php?site/manage_role/', 'refresh');

        } else if ($param1 == 'personal_profile') {

            $page_data['personal_profile'] = true;

            $page_data['current_rol_id'] = $param2;

        } else if ($param1 == 'edit') {

            $page_data['edit_data'] = $this->db->get_where('hs_role', array(

                'rol_id' => $param2

            ))->result_array();

        }

        if ($param1 == 'delete') {

            $this->db->where('rol_id', $param2);

            $this->db->delete('hs_role');

            redirect(base_url() . 'index.php?site/manage_role/', 'refresh');
            

        }
        $page_data['page_name'] = 'manage_role';

		$page_data['page_title'] = 'Manejar Roles de Usuarios';

        $this->load->view('index', $page_data);
    }
    
    /*****LANGUAGE SETTINGS*********/

    function manage_language($param1 = '', $param2 = '', $param3 = '')

    {

        if ($this->session->userdata('rol') != 1)

            redirect(base_url() . 'index.php?login', 'refresh');


        if ($param1 == 'edit_phrase') {

            $page_data['edit_profile'] = $param2;

        }

        if ($param1 == 'update_phrase') {

            $language = $param2;

            $total_phrase = $this->input->post('total_phrase');

            for ($i = 1; $i < $total_phrase; $i++) {

                //$data[$language]	=	$this->input->post('phrase').$i;

                $this->db->where('phrase_id', $i);

                $this->db->update('language', array($language => $this->input->post('phrase' . $i)));

            }

            redirect(base_url() . 'index.php?site/manage_language/edit_phrase/' . $language, 'refresh');

        }

        if ($param1 == 'do_update') {

            $language = $this->input->post('language');

            $data[$language] = $this->input->post('phrase');

            $this->db->where('phrase_id', $param2);

            $this->db->update('language', $data);

            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));

            redirect(base_url() . 'index.php?site/manage_language/', 'refresh');

        }

        if ($param1 == 'add_phrase') {

            $data['phrase'] = $this->input->post('phrase');

            $this->db->insert('language', $data);

            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));

            redirect(base_url() . 'index.php?site/manage_language/', 'refresh');

        }

        if ($param1 == 'add_language') {

            $language = $this->input->post('language');

            $this->load->dbforge();

            $fields = array(

                $language => array(

                    'type' => 'LONGTEXT'

                )

            );

            $this->dbforge->add_column('language', $fields);


            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));

            redirect(base_url() . 'index.php?site/manage_language/', 'refresh');

        }

        if ($param1 == 'delete_language') {

            $language = $param2;

            $this->load->dbforge();

            $this->dbforge->drop_column('language', $language);

            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));


            redirect(base_url() . 'index.php?site/manage_language/', 'refresh');

        }

        $page_data['page_name'] = 'manage_language';

        $page_data['page_title'] = get_phrase('manage_language');

        //$page_data['language_phrases'] = $this->db->get('language')->result_array();

        $this->load->view('index', $page_data);

    }
    
    /*****USERS SETTINGS*********/
	 function manage_users($param1 = '', $param2 = '', $param3 = '')

    {
		if ($this->session->userdata('rol') != 1)

           redirect(base_url() . 'index.php?login', 'refresh');

        $student_profile = $this->db->get_where('student', array(
            'student_id' => $this->session->userdata('student_id')
        ))->row();
        $student_class_id = $student_profile->class_id;
       

        $page_data['page_name'] = 'manage_users';

        $page_data['page_title'] = get_phrase('manejo_de_usuarios');

       // $page_data['settings'] = $this->db->get('settings')->result_array();

        $this->load->view('index', $page_data);

    }


    /*****BACKUP / RESTORE / DELETE DATA PAGE**********/

    function backup_restore($operation = '', $type = '')

    {

        if ($this->session->userdata('rol') != 1)

            redirect(base_url() . 'index.php?login', 'refresh');


        if ($operation == 'create') {

            $this->crud_model->create_backup($type);

        }

        if ($operation == 'restore') {

            $this->crud_model->restore_backup();

            $this->session->set_flashdata('backup_message', 'Backup Restored');

            redirect(base_url() . 'index.php?site/backup_restore/', 'refresh');

        }

        if ($operation == 'delete') {

            $this->crud_model->truncate($type);

            $this->session->set_flashdata('backup_message', 'Data removed');

            redirect(base_url() . 'index.php?site/backup_restore/', 'refresh');

        }


        $page_data['page_info'] = 'Create backup / restore from backup';

        $page_data['page_name'] = 'backup_restore';

        $page_data['page_title'] = get_phrase('manage_backup_restore');

        $this->load->view('index', $page_data);

    }


    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/

    function manage_profile($param1 = '', $param2 = '', $param3 = '')

    {
        if ($this->session->userdata('rol') == FALSE)

            redirect(base_url() . 'index.php?login', 'refresh');

        if ($param1 == 'update_profile_info') {

            $data['name'] = $this->input->post('name');

            $data['email'] = $this->input->post('email');


            $this->db->where('user_id', $this->session->userdata('user_id'));

            $this->db->update('hs_users', $data);

            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));

            redirect(base_url() . 'index.php?site/manage_profile/', 'refresh');

        }

        if ($param1 == 'change_password') {

            $data['password'] = $this->input->post('password');

            $data['new_password'] = $this->input->post('new_password');
			
				$password = $this->bcrypt->hash_password($data['new_password']);
            
            $data['confirm_new_password'] = $this->input->post('confirm_new_password');

            $current_password = $this->db->get_where('hs_users', array( 'user_id' => $this->session->userdata('user_id') ))->row()->password;
            
				$decode_pass= password_verify($data['password'] , $current_password);

            if ($decode_pass == $data['password'] or $current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {

                $this->db->where('user_id', $this->session->userdata('user_id'));

                $this->db->update('hs_users', array(

                    'password' => $password

                ));

                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));

            } else {

                $this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));

            }

            redirect(base_url() . 'index.php?site/manage_profile/', 'refresh');

        }
        $page_data['edit_data'] = $this->db->get_where('hs_users', array(

            'user_id' => $this->session->userdata('user_id')

        ))->result_array();
        
        $page_data['page_name'] = 'manage_profile';

        $page_data['page_title'] = get_phrase('manage_profile');

        $this->load->view('index', $page_data);

    }
 
}



