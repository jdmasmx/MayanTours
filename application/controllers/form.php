<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('login_model');
		$this->load->helper('url');
		$this->load->model('reservations');
		
	}

	function index()
	{
		$logged = $this->login_model->isLogged();
		if($logged == TRUE)
		{


			$this->load->view('panel/panel');


		}
		else
		{
			$this->load->view('panel/inicio_login');
		}
		
	}	


	public function salvar()
	{
		$this->load -> library( 'form_validation' );
		$this->form_validation->set_rules( 'names', 'names', 'required' );
		$this->form_validation->set_rules( 'lastname', 'lastname', 'required' );
		$this->form_validation->set_rules( 'email', 'email', 'required' );
		$this->form_validation->set_rules( 'hotel', 'hotel', 'required' );
		$this->form_validation->set_rules( 'datetour', 'datetour', 'required' );
		$this->form_validation->set_rules( 'country', 'country', 'required' );
		$this->form_validation->set_rules( 'tourtime', 'tourtime', 'required' );
		$this->form_validation->set_rules( 'passengers', 'passengers', 'required' );
		$this->form_validation->set_rules( 'reserverby', 'reserverby', 'required' );
		

		
		$this->load->model('Reservations', '', TRUE);
		$datos['query'] = $this->Reservations->new_reservation(); 

		if($datos['query'])	{
			redirect('newreservation/tosave');
		}
		else {
			echo "Error al guardar en la base de datos, intenta nuevamente.";

		}

	}

	public function update()
	{
		$this->load -> library( 'form_validation' );
		$this->form_validation->set_rules( 'names', 'names', 'required' );
		$this->form_validation->set_rules( 'lastname', 'lastname', 'required' );
		$this->form_validation->set_rules( 'email', 'email', 'required' );
		$this->form_validation->set_rules( 'hotel', 'hotel', 'required' );
		$this->form_validation->set_rules( 'datetour', 'datetour', 'required' );
		$this->form_validation->set_rules( 'country', 'country', 'required' );
		$this->form_validation->set_rules( 'tourtime', 'tourtime', 'required' );
		$this->form_validation->set_rules( 'passengers', 'passengers', 'required' );
		$this->form_validation->set_rules( 'reserverby', 'reserverby', 'required' );
		

		
		$this->load->model('Reservations', '', TRUE);
		$datos['query'] = $this->Reservations->update_reservation(); 

		if($datos['query'])	{
			$this->load->view('panel/panel');
		}
		else {
			echo "Error al guardar en la base de datos, intenta nuevamente.";

		}

	}

	public function edit($id = '')
	{
		
		$this->load->model('Reservations', '', TRUE);
		$datos['query'] = $this->Reservations->get_info($id); 
		$this->load->view('panel/edit', $datos);


	}

	public function views($id = '')
	{
		
		$this->load->model('Reservations', '', TRUE);
		$datos['query'] = $this->Reservations->get_info($id); 
		$this->load->view('panel/view', $datos);


	}

	public function pdf($id = '')
	{
		
		$this->load->model('Reservations', '', TRUE);
		$datos['query'] = $this->Reservations->get_info($id); 
		$this->load->view('panel/pdf', $datos);


	}

	public function pdfd($id = '')
	{
		
		$this->load->model('Reservations', '', TRUE);
		$datos['query'] = $this->Reservations->get_info($id); 
		$this->load->view('panel/pdf2', $datos);


	}

	public function view_reservations()
	{
		$this->load -> library( 'form_validation' );
		$this->form_validation->set_rules( 'datetour', 'datetour', 'required' );
		$this->form_validation->set_rules( 'tourtime', 'tourtime', 'required' );
		$this->load->model('Reservations', '', TRUE);
		$datos['query'] = $this->Reservations->view_reservations(); 
		$this->load->view('panel/filter', $datos);
		
	}

	public function view_reservations_dates()
	{
		$this->load -> library( 'form_validation' );
		$this->form_validation->set_rules( 'datetour', 'datetour', 'required' );
		$this->form_validation->set_rules( 'tourtime', 'tourtime', 'required' );
		$this->load->model('Reservations', '', TRUE);
		$datos['query'] = $this->Reservations->view_reservations_dates(); 
		$this->load->view('panel/filter_dates', $datos);
		
	}

	public function topdf($id = '') {	
		$this->load->model('Reservations', '', TRUE);
		$datos['query'] = $this->Reservations->get_info($id); 
		$this->load->view('panel/pdf2', $datos);
		$html = $this->output->get_output();
		$this->load->library('dompdf_gen');
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("voucher.pdf");
	}




	// public function salvar() {	
		// Load all views as normal
		// $this->load->view('welcome');
		// Get output html
		// $html = $this->output->get_output();
		// Load library
		// $this->load->library('dompdf_gen');
		// Convert to PDF
		// $this->dompdf->load_html($html);
		// $this->dompdf->render();
		// $this->dompdf->stream("welcome.pdf");

	// }



}