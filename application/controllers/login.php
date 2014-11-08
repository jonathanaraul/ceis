	<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('login_model');
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
		
		if ($this->session->userdata('rol')=='') {
			
				$data['token'] = $this->token();
				$this->load->view('login', $data);
		}elseif ($this->session->userdata('rol')>'0') {
			
				redirect(base_url().'index.php?site');
				$page_data['page_title'] = get_phrase('login');
				$this->load->view('login', $page_data);	
		}
		
	}

	public function new_user()
	{
		
		if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
		{
			
            $config = array(
				array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|xss_clean|valid_email'
				),
				array(
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'trim|required|xss_clean'
					
				)
			);
            
			$this->form_validation->set_rules($config);
			$this->form_validation->set_message('required', 'El campo es requerido');
           
			if ($this->form_validation->run() == FALSE) {
				 $this->index();
				}else{
					$email 	  = $this->input->post('email');
					$password = $this->input->post('password');
					
					
					$check_user = $this->login_model->login_user($email,$password);
						if($check_user == TRUE)
							{
								$data = array(
								'is_logued_in' 	=> 		TRUE,
								'user_id'	 	=> 		$check_user->user_id,
								'rol'			=>		$check_user->rol,
								'email' 		=> 		$check_user->email,
								'password' 		=> 		$check_user->password
								);	
								
								$this->session->set_userdata($data);
								$this->index();
							}				
				}
			}else{
				$this->session->set_flashdata('flash_message', get_phrase('E-mail o Contraseña incorrecta'));
				redirect(base_url().'index.php?login');
			}			
	}
	
	
	
	public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}
	
	
	/***DEFAULT NOR FOUND PAGE*****/
   public function four_zero_four()
    {
        $this->load->view('four_zero_four');
    }


    /***RESET AND SEND PASSWORD TO REQUESTED EMAIL****/
    function reset_password()
    {
        $account_type = $this->input->post('account_type');
        if ($account_type == "") {
            redirect(base_url(), 'refresh');
        }
        $email = $this->input->post('email');
        $result = $this->email_model->password_reset_email($account_type, $email); //SEND EMAIL ACCOUNT OPENING EMAIL
        if ($result == true) {
            $this->session->set_flashdata('flash_message', get_phrase('password_sent'));
        } else if ($result == false) {
            $this->session->set_flashdata('flash_message', get_phrase('account_not_found'));
        }

        redirect(base_url(), 'refresh');
    }

    /*******LOGOUT FUNCTION *******/
	public function logout()
	{
		$this->session->unset_userdata();
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout_notification', 'logged_out');
        redirect(base_url() . 'index.php?login', 'refresh');
	}
}
