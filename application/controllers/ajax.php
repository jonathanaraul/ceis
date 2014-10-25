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
}