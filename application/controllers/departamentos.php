<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Departamentos extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('departamentos_model');
	}
	
	public function index()
	{
		$data['municipio'] = $this->departamentos_model->municipios();
	    $this->load->view('index', $data);
	}
	
	public function llena_localidades()
	{
		$options = "";
		if($this->input->post('provincia'))
		{
			$provincia = $this->input->post('provincia');
			$localidades = $this->ciudades_model->localidades($provincia);
			foreach($localidades as $fila)
			{
			?>
				<option value="<?=$fila -> poblacionseo ?>"><?=$fila -> poblacion ?></option>
			<?php
			}
		}
	}
}
