<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Password_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->library('bcrypt');
	}
	
	function pass_code($id,$hash)
	{
        $this->db->where('id',$id);
        $query = $this->db->get('hs_reset_pass');
       
        if($query->num_rows() == 1)
        {
            $pass_code	= $query->row();
            $pass 		= $pass_code->password;
 
            if($this->bcrypt->check_password($hash, $pass))
            {
                return $query->row();
            }else{
					$this->session->set_flashdata('flash_message', get_phrase('Código de verificación incorrecto'));
					redirect(base_url() . 'index.php?password', 'refresh');
					return FALSE;
					
				}
			
		}else{
			redirect(base_url() . 'index.php?password', 'refresh');
			return FALSE;
			
			}
	}
}
