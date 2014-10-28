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
    $materia= $this->input->post('materia');

    $elements = $this->db->get_where('hs_evaluaciones', array('materia' => $materia))->result_array();

    $cadena = '<option value="0">Seleccionar evaluacion</option>';

    foreach ($elements as $element) {
        $cadena .= '<option value="' . $element['id'] . '">' . $element['nombre'] . '</option>';

    }
    echo $cadena;

}


    function obtenAsistencias()

    {
        $curso = $this->input->post('curso');
        $materia = $this->input->post('materia');
        $evaluacion = $this->input->post('evaluacion');

        $dato['elements'] = $this->db->get_where('hs_inscripcion', array('curso' => $curso,'status' => 1))->result_array();

        $this->load->view('asistencia-listado', $dato);
    }

        function listarAsistencias()

    {
        $curso = $this->input->post('curso');
        $materia = $this->input->post('materia');
        $evaluacion = $this->input->post('evaluacion');

        $dato['elements'] = $this->db->get_where('hs_asistencias', array('curso' => $curso,'materia' => $materia, 'evaluacion'=> $evaluacion))
                                     ->result_array();

        $this->load->view('admin/lista_asistencias', $dato);
    }
}