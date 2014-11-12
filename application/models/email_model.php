<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
        $this->load->library('bcrypt');
    }


	function password_reset_email($email = '')
	{
		$query			=	$this->db->get_where('hs_users' , array('email' => $email));
		if($query->num_rows() > 0)
		{
			$system_name	=	$this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;
		
			$password	=	$query->row()->password;
			
			$email_msg	=	"Bienvenido a ".$system_name."<br />";
			$email_msg	.=	"Para restablecer tu contraseña, por favor dirígete hacia: <a href=".base_url().'index.php?password'."></a> e ingrese el siguiente código único de identificación: ";
			$email_msg	.=	"apliceis.com.co.s3cur1ty";
			$email_sub	=	"Envío de Contraseña";
			$email_to	=	$email;
			$this->do_email($email_msg , $email_sub , $email_to);
			return true;
		}
		else
		{	
			return false;
		}
	}
	
	
	/***custom email sender****/
	function do_email($msg=NULL, $sub=NULL, $to=NULL, $from=NULL)
	{
		
		$config = array();
        $config['useragent']	= "CodeIgniter";
        $config['mailpath']		= "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']		= "smtp";
        $config['smtp_host']	= "localhost";
        $config['smtp_port']	= "25";
        $config['mailtype']		= 'html';
        $config['charset']		= 'utf-8';
        $config['newline']		= "\r\n";
        $config['wordwrap']		= TRUE;

        $this->load->library('email');

        $this->email->initialize($config);

		$system_name	=	$this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;
		if($from == NULL)
			$from		=	$this->db->get_where('settings' , array('type' => 'system_email'))->row()->description;
		
		$this->email->from($from, $system_name);
		$this->email->from($from, $system_name);
		$this->email->to($to);
		$this->email->subject($sub);
		
		$msg	=	$msg."<br /><br /><br /><br /><br /><br /><br /><hr /><center><a href=\"http://codecanyon.net/user/joyontaroy?ref=joyontaroy\">&copy; 2013 Bayanno Hospital Management System</a></center>";
		$this->email->message($msg);
		
		$this->email->send();
		
		//echo $this->email->print_debugger();
	}
}

