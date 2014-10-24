<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inscripcion_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }
	
	function getDataUser($id)
	{
		$this->db->select('snombre, papellido');
		$query = $this->db->get_where('student', array('student_id' => $id))->result();

		return $query[0]["snombre"];
	}
	
	
}

