<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Login_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	function login_user($email,$password)
	{
        
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$query = $this->db->get('hs_users');
		if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			$this->session->set_flashdata('flash_message', get_phrase('login_failed'));
            redirect(base_url() . 'index.php?login', 'refresh');
            return FALSE;
		}
	}
}
