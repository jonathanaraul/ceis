<?php

/**
 * Created by PhpStorm.
 * User: jonathan.araul
 * Date: 21/10/14
 * Time: 22:32
 */
class Utilities extends CI_Controller

{
    function __construct()

    {
        parent::__construct();
        //$this->load->database();
    }

    function convertToDatetime($original) {
        $original = explode("/", $original);
        $date = new \DateTime();
        $date -> setDate($original[2] , $original[0],$original[1]);
        return $date;
    }
}


