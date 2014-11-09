<?php

/**
 * Created by PhpStorm.
 * User: jonathan.araul
 * Date: 21/10/14
 * Time: 22:32
 */
class ajax extends CI_Controller

{
    function __construct()

    {

        parent::__construct();

        $this->load->database();

    }

    function obtenMunicipios()

    {
        $departamento = $this->input->post('departamento');

        $elements = $this->db->get_where('municipio', array('departamento' => $departamento))->result_array();

        $cadena = '';

        foreach ($elements as $element) {
            $cadena .= '<option value="' . $element['id'] . '">' . $element['nombre'] . '</option>';

        }
        echo $cadena;

    }

    function obtenMaterias()

    {
        $curso = $this->input->post('curso');

        $elements = $this->db->get_where('hs_materias', array('curso' => $curso))->result_array();

        $cadena = '<option value="0">Seleccionar materia</option>';

        foreach ($elements as $element) {
            if($this->session->userdata('rol') == 1){

                $cadena .= '<option value="' . $element['id'] . '">' . $this->crud_model->get_nombre_materia_by_id($element['nombre']) . '</option>';
            }else{
                if($this->session->userdata('rol') == 3 && $this->session->userdata('user_id') == $element['profesor']){
                    $cadena .= '<option value="' . $element['id'] . '">' . $this->crud_model->get_nombre_materia_by_id($element['nombre']) . '</option>';      
                }
            }
        }
        echo $cadena;

    }

    function obtenCursosMaterias()

    {
        $curso = $this->input->post('curso');

        $cursos= $this->db->get_where('hs_cursos', array('id' => $curso))->result_array();

        $elements = $this->db->get_where('curso_materia', array('curso' => $cursos[0]['curso']))->result_array();

        $cadena = '<option value="0">Seleccionar materia</option>';

        foreach ($elements as $element) {

                $cadena .= '<option value="' . $element['materia'] . '">' . $this->crud_model->get_nombre_materia_by_id($element['materia']) . '</option>';
        }
        echo $cadena;

    }

    function obtenCursos()

    {
        $estudiante = $this->input->post('estudiante');

        $elements = $this->db->get_where('hs_inscripcion', array('estudiante' => $estudiante))->result_array();

        $cadena = '<option value="0" selected>Seleccionar Curso</option>';

        foreach ($elements as $element) {
            $curso= $this->db->get_where('hs_cursos', array('id' => $element['curso']))->result_array();
            $cadena .= '<option value="' . $element['curso'] . '">' . $this->crud_model->get_hs_cursos_nombre($curso[0]['curso']).' -- Sección: '.$this->crud_model->get_hs_cursos_seccion($element['curso']) . '</option>';

        }
        echo $cadena;

    }

    
    function obtenCursosFacturaEstudiantes()

    {
        $estudiante = $this->input->post('estudiante');

        $elements = $this->db->get_where('hs_inscripcion', array('estudiante' => $estudiante))->result_array();

        $cadena = '<option value="0" selected>Seleccionar Curso</option>';

        foreach ($elements as $element) {
            $existe= true;
            $cursos= $this->db->get('hs_facturacion_empresas')->result_array();
            foreach ($cursos as $curso) {
                if($curso['curso']==$element['curso']){
                    $existe= false;
                }
            }
            if($existe){
                $course= $this->db->get_where('hs_cursos', array('id' => $element['curso']))->result_array();
                $cadena .= '<option value="' . $element['curso'] . '">' . $this->crud_model->get_hs_cursos_nombre($course[0]['curso']).' - Sección '.$this->crud_model->get_hs_cursos_seccion($element['curso']) . '</option>';
            }

        }
        echo $cadena;

    }


    function obtenEvaluaciones()

    {
        $materia = $this->input->post('materia');

        $elements = $this->db->get_where('hs_evaluaciones', array('materia' => $materia))->result_array();

        $cadena = '<option value="0">Seleccionar evaluacion</option>';

        foreach ($elements as $element) {
            $cadena .= '<option value="' . $element['id'] . '">' . $element['nombre'] . '</option>';

        }
        echo $cadena;

    }

    function obtenEstudiantes()

    {
        $curso = $this->input->post('curso');

        $elements = $this->db->get_where('hs_inscripcion', array('curso' => $curso, 'status' => 1))->result_array();

        $cadena = '<option value="0">Visualizar Todos</option>';

        foreach ($elements as $element) {
            $cadena .= '<option value="' . $element['estudiante'] . '">' . $this->crud_model->get_hs_student_nombre_by_id($element['estudiante']) .' '. $this->crud_model->get_hs_student_apellido_by_id($element['estudiante']) .'</option>';

        }
        echo $cadena;

    }

    function recuperarDocumentos()

    {
        $curso = $this->input->post('curso');
        $estudiante = $this->input->post('estudiante');
        $documento= $this->input->post('documento');

        $dato['curso']= $curso;
        $inscritos = $this->db->get_where('hs_inscripcion', array('curso' => $curso, 'status' => 1 ))->result_array();

        if($estudiante == 0){

            foreach($inscritos as $inscrito):


                $dato['documento_nombre']= $inscrito['estudiante'];
                $query = $this->db->get_where('hs_notas', array('curso' => $curso, 'estudiante' => $inscrito['estudiante']))->result_array();
                $suma= 0;
                foreach($query as $sum):
                    $suma+=$sum['puntuacion'];
                endforeach;
                $this->db->where('estudiante', $inscrito['estudiante']);
                $this->db->from('hs_notas');
                $nro_materias= $this->db->count_all_results();
                $media= $suma/$nro_materias;
                $dato['elements']= $query;
                
                if($documento == 1){

                    $dato['media']= $media;
                    $this->load->view('site/visualizar_diploma', $dato);

                }else{

                    if($documento == 2){

                        if($media >=7){

                            $dato['media']= $media;
                            $this->load->view('site/visualizar_certificado', $dato);
                        }

                    }else{

                        $this->load->view('site/visualizar_acta', $dato);
                    }
                }
                

            endforeach;
 

        }else{

            foreach($inscritos as $inscrito):

                $dato['documento_nombre']= $estudiante;                
                $query = $this->db->get_where('hs_notas', array('curso' => $curso, 'estudiante' => $inscrito['estudiante']))->result_array();
                $suma= 0;
                foreach($query as $sum):
                    $suma+=$sum['puntuacion'];
                endforeach;
                $this->db->where('estudiante', $inscrito['estudiante']);
                $this->db->from('hs_notas');
                $nro_materias= $this->db->count_all_results();
                $media= $suma/$nro_materias;
                $dato['elements']= $query;

                if($documento == 1){

                    if($inscrito['estudiante'] == $estudiante){

                        $dato['media']= $media;
                        $this->load->view('site/visualizar_diploma', $dato); 
                    }
                }else{

                    if($documento == 2 && $inscrito['estudiante'] == $estudiante){

                        if($media >=7){
                            

                            $dato['media']= $media;
                            $this->load->view('ste/visualizar_certificado', $dato);

                        }
                    }else{

                        if($documento == 3 && $inscrito['estudiante'] == $estudiante){

                            $this->load->view('site/visualizar_acta', $dato);
                            
                        }
                    }

                }

            endforeach;
            
        }
    }


    function listarNotas()

    {
        $curso = $this->input->post('curso');
        $materia = $this->input->post('materia');
        $evaluacion = $this->input->post('evaluacion');

        $dato['materia']= $materia;
        $dato['evaluacion']= $evaluacion;

        $dato['elements'] = $this->db->get_where('hs_inscripcion', array('curso' => $curso, 'status' => 1))->result_array();

        $this->load->view('site/lista_notas', $dato);
    }

    function inscribir()

    {
        $inscripcion = $this->input->post('inscripcion');
        $curso = $this->input->post('curso');

        $dato['curso']= $curso;

        if($inscripcion == 1){

        $dato['estudiantes'] = $this->db->get_where('hs_users', array('rol'=> 2))->result_array();

        $this->load->view('site/inscribir_indiv', $dato);            

        }else{

        $dato['estudiantes'] = $this->db->get_where('hs_users', array('rol'=> 2))->result_array();

        $this->load->view('site/inscribir_lotes', $dato);

        }


    }

    function guardarInscripcion()
    {
        $curso = $this->input->post('curso');
        $estudiante = $this->input->post('estudiante');
        $status = $this->input->post('status');

        $existe = $this->db->get_where('hs_inscripcion', array('curso' => $curso,'estudiante' => $estudiante))->result_array();

        if (count($existe) > 0) {
            //Actualizar inscripcion

            $data = array(
                'status' => $status,
            );
            $this->db->where('id', $existe[0]['id']);
            $this->db->update('hs_inscripcion', $data);
        } else {
            //Insertar inscripcion
            $data = array(
                'estudiante' => $estudiante,
                'curso' => $curso,
                'status' => $status,
            );

            $this->db->insert('hs_inscripcion', $data);
        }
    }

    function guardarInscripciones()
    {
        $variables = $this->input->post();
        $variables = explode('&', $variables["data"]);



        for ($i = 0; $i < count($variables); $i++) {

            if ($i == 0) {
                $curso = explode('=', $variables[$i]);
                $curso = $curso[1];
            } else {

                $helper = explode('_', $variables[$i]);
                $helper = $helper[1];
                $helper = explode('=', $helper);

                $estudiante = $helper[0];
                $status = intval($helper[1]);

                $existe = $this->db->get_where('hs_inscripcion', array('curso' => $curso,'estudiante' => $estudiante))->result_array();

                if (count($existe) > 0) {
                    //Actualizar status

                    $data = array(
                        'estudiante' => $estudiante,
                        'curso' => $curso,
                        'status' => $status,
                    );
                    $this->db->where('id', $existe[0]['id']);
                    $this->db->update('hs_inscripcion', $data);
                } else {
                    //Insertar inscripcion
                    $data = array(
                        'estudiante' => $estudiante,
                        'curso' => $curso,
                        'status' => $status,
                    );

                    $this->db->insert('hs_inscripcion', $data);
                }
            }
        }
    }

    function guardarNotas()
    {
        $variables = $this->input->post();
        $variables = explode('&', $variables["data"]);



        for ($i = 0; $i < count($variables); $i++) {

            if ($i == 0) {
                $evaluacion = explode('=', $variables[$i]);
                $evaluacion = $evaluacion[1];
            } else if ($i == 1) {
                $curso = explode('=', $variables[$i]);
                $curso = $curso[1];

            } else if ($i == 2) {
                $materia = explode('=', $variables[$i]);
                $materia = $materia[1];
            } else {

                $helper = explode('_', $variables[$i]);
                $helper = $helper[1];
                $helper = explode('=', $helper);

                $estudiante = $helper[0];
                $puntuacion = intval($helper[1]);

                $existe = $this->db->get_where('hs_notas', array('evaluacion' => $evaluacion,'estudiante' => $estudiante, 'materia' => $materia, 'curso' => $curso))->result_array();

                if (count($existe) > 0) {
                    //Actualizar asistencia

                    $data = array(
                        'puntuacion' => $puntuacion,
                    );
                    $this->db->where('id', $existe[0]['id']);
                    $this->db->update('hs_notas', $data);
                } else {
                    //Insertar asistencia
                    $data = array(
                        'curso' => $curso,
                        'materia' => $materia,
                        'estudiante' => $estudiante,
                        'puntuacion' => $puntuacion,
                        'evaluacion' => $evaluacion,
                    );

                    $this->db->insert('hs_notas', $data);
                }
            }
        }
    }

    function listarAsistencias()

    {
        $curso = $this->input->post('curso');
        $materia = $this->input->post('materia');
        $fecha = $this->input->post('fecha');
        $fecha = explode('/', $fecha);
        $fecha = $fecha[2] . '-' . $fecha[0] . '-' . $fecha[1];

        $dato['materia']= $materia;
        $dato['fecha']= $fecha;

        $dato['elements'] = $this->db->get_where('hs_inscripcion', array('curso' => $curso, 'status' => 1))->result_array();

        $this->load->view('site/lista_asistencias', $dato);
    }

    function guardarAsistencias()
    {
        $variables = $this->input->post();
        $variables = explode('&', $variables["data"]);

        for ($i = 0; $i < count($variables); $i++) {

            if ($i == 0) {
                $fecha = explode('=', $variables[$i]);
                $fecha = explode('/', $fecha[1]);
                $fecha = $fecha[2] . '-' . $fecha[0] . '-' . $fecha[1];
            } else if ($i == 1) {
                $curso = explode('=', $variables[$i]);
                $curso = $curso[1];

            } else if ($i == 2) {
                $materia = explode('=', $variables[$i]);
                $materia = $materia[1];
            } else {

                $helper = explode('_', $variables[$i]);
                $helper = $helper[1];
                $helper = explode('=', $helper);

                $estudiante = $helper[0];
                $presente = $helper[1];
                if ($presente == 'true') $presente = 1;
                else $presente = 0;

                $existe = $this->db->get_where('hs_asistencias', array('fecha' => $fecha, 'estudiante' => $estudiante, 'materia' => $materia, 'curso' => $curso))->result_array();

                if (count($existe) > 0) {
                    //Actualizar asistencia

                    $data = array(
                        'presente' => $presente,
                    );
                    $this->db->where('id', $existe[0]['id']);
                    $this->db->update('hs_asistencias', $data);
                } else {
                    //Insertar asistencia
                    $data = array(
                        'curso' => $curso,
                        'materia' => $materia,
                        'estudiante' => $estudiante,
                        'presente' => $presente,
                        'fecha' => $fecha,
                    );

                    $this->db->insert('hs_asistencias', $data);
                }
            }
        }
    }

}