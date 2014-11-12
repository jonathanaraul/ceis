<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Password extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('password_model');
		$this->load->library('bcrypt');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->database('default');
		
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

	
	public function index()
	{	
		$page_data['page_title'] = get_phrase('password');
		$this->load->view('password', $page_data);		
	}
	
	function code()

    {
		   $id=1;
           $code = $this->input->post('code');
            
            $check_code = $this->password_model->pass_code($id,$code);
            
           
			if($check_code == TRUE){
				
				$data = array(
				'is_logued_in' 	=> 		TRUE,
				'password' 		=> 		$check_code->password
				);	
				
				$this->session->set_userdata($data);
            
				$this->manage_password();
				
			}else{
					$this->session->set_flashdata('flash_message', get_phrase('Código de verificación incorrecto'));
				}
    }
    
	function manage_password()

    {
		if($this->session->userdata('password') == '')
        {
			
            redirect(base_url() . 'index.php?password', 'refresh');
        }else{
        
            $data['code'] = $this->input->post('code');
            
            $data['phone'] = $this->input->post('phone');
            
            $data['email'] = $this->input->post('email');
            
            $data['password'] = $this->input->post('password');

            $data['new_password'] = $this->input->post('new_password');
			
				$password = $this->bcrypt->hash_password($data['new_password']);
            
            $data['confirm_new_password'] = $this->input->post('confirm_new_password');

            
            $current_code = $this->db->get('hs_reset_pass')->row()->password;
            
			$decode= password_verify($data['code'] , $current_code);
           
            if ($decode == $data['code'] or $current_code== $data['code']){ 
				
				 $this->db->where('email',$data['email']);
				 $this->db->where('phone',$data['phone']);
					$query = $this->db->get('hs_users');
				   
					if($query->num_rows() == 1)
					{
				
			   
					if ($data['new_password'] == $data['confirm_new_password']) {

					$this->db->where('email', $data['email']);

					$this->db->update('hs_users', array(

						'password' => $password

					));

					
					$this->session->unset_userdata();
					$this->session->sess_destroy();
					
					redirect(base_url() . 'index.php?login', 'refresh');
					$this->session->set_flashdata('flash_message', get_phrase('password_updated'));

					} else {

					$this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));

					}
				}else{
					$this->session->set_flashdata('flash_message', get_phrase('Email o Teléfono incorrecto'));
				}
			}else{
					$this->session->set_flashdata('flash_message', get_phrase('Código de verificación incorrecto'));
				}
        
			$page_data['page_name'] = 'manage_password';

			$page_data['page_title'] = get_phrase('reset_password');

			$this->load->view('index_pass', $page_data);

		}
    }
}
