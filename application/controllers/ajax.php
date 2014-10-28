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