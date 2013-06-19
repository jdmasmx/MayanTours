<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	function index()
	{


		$logged = $this->login_model->isLogged();
		if($logged == TRUE)
		{


			$this->load->view('welcome');


		}
		else
		{
			$this->load->view('inicio_login');
		}

		
		
	}	

	public function topdf() {	
		// Load all views as normal
		$this->load->view('welcome');
		// Get output html
		$html = $this->output->get_output();
		// Load library
		$this->load->library('dompdf_gen');
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("voucher.pdf");
		
	}

	
	
}