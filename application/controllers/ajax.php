<?php
/**
 * Created by PhpStorm.
 * User: jonathan.araul
 * Date: 21/10/14
 * Time: 22:32
 */
class ajax extends CI_Controller

{

     function obtenMunicipios()

    {
        $departamento = $this->input->post('departamento');
        echo 'el id del departamento con el que se buscaran municipios  es'.$departamento;
        exit;

    }
}