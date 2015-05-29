<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Clase para generar documentos pdf
 */
class pdfController extends CI_Controller
{

  function __construct(argument)
  {
      parent::__construct();
      $this->load->database();
  }



}// fin class
/* application/controllers/pdfController.php */
