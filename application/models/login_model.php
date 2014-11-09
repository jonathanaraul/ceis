<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Login_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	function login_user($email,$hash)
	{
        $this->db->where('email',$email);
        $query = $this->db->get('hs_users');
       
        if($query->num_rows() == 1)
        {
            $user = $query->row();
            $pass = $user->password;
 
            if($this->bcrypt->check_password($hash, $pass))
            {
                return $query->row();
            }else{
					$this->session->set_flashdata('flash_message', get_phrase('login_failed'));
					redirect(base_url() . 'index.php?login', 'refresh');
					return FALSE;
					
				}
			
		}else{
			$this->session->set_flashdata('flash_message', get_phrase('E-mail o Contraseña incorrecta'));
				redirect(base_url() . 'index.php?login', 'refresh');
				return FALSE;
			
			}
	}
}
