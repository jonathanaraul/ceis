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
            $cadena .= '<option value="' . $element['id'] . '">' . $element['nombre'] . '</option>';

        }
        echo $cadena;

    }

    function obtenCursos()

    {
        $estudiante = $this->input->post('estudiante');

        $elements = $this->db->get_where('hs_inscripcion', array('estudiante' => $estudiante))->result_array();

        $cadena = '<option value="0" selected>Seleccionar Curso</option>';

        foreach ($elements as $element) {
            $cadena .= '<option value="' . $element['curso'] . '">' . $this->crud_model->get_hs_cursos_nombre($element['curso']) . '</option>';

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
            $cadena .= '<option value="' . $element['id'] . '">' . $this->crud_model->get_hs_student_nombre_by_id($element['estudiante']) .' '. $this->crud_model->get_hs_student_apellido_by_id($element['estudiante']) .'</option>';

        }
        echo $cadena;

    }

    function recuperarDiplomas()

    {
        $curso = $this->input->post('curso');
        $estudiante = $this->input->post('estudiantes');

        $dato['curso']= $curso;
        $dato['estudiantes']= $estudiante;

        $inscritos = $this->db->get_where('hs_inscripcion', array('curso' => $curso, 'status' => 1 ))->result_array();

        if($estudiante == 0){

        foreach($inscritos as $inscrito):

            $query = $this->db->get_where('hs_notas', array('curso' => $curso, 'estudiante' => $inscrito['estudiante']))->result_array();
            $suma= 0;
            foreach($query as $sum):
                $suma+=$sum['puntuacion'];
            endforeach;
            $this->db->where('estudiante', $inscrito['estudiante']);
            $this->db->from('hs_notas');
            $nro_materias= $this->db->count_all_results();
            $media= $suma/$nro_materias;

            $dato['media']= $media;
            $dato['diploma_nombre']= $inscrito['estudiante'];
            if($media >= 5){
            $dato['elements']= $query;
            $this->load->view('admin/visualizar_diploma', $dato); 
            }

        endforeach;
 

        }else{

            $query = $this->db->get_where('hs_notas', array('curso' => $curso, 'estudiante' => $estudiante))->result_array();
            $suma= 0;
            foreach($query as $sum):
            $suma+=$sum['puntuacion'];
            endforeach;

            $this->db->where('estudiante', $inscritos[0]['estudiante']);
            $this->db->from('hs_notas');
            $nro_materias= $this->db->count_all_results();
            $media= $suma/$nro_materias;

            $dato['media']= $media;
            $dato['diploma_nombre']= $inscritos[0]['estudiante'];

            if($media >= 5 && ($dato['diploma_nombre'] == $estudiante)){
                $dato['elements'] = $query;
                $this->load->view('admin/visualizar_diploma', $dato);
            }
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

        $this->load->view('admin/lista_notas', $dato);
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

        $this->load->view('admin/lista_asistencias', $dato);
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