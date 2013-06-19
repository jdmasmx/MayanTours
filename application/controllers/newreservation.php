<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newreservation extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('login_model');
		$this->load->helper('url');
	}

	function index()
	{
		
		$logged = $this->login_model->isLogged();
		if($logged == TRUE)
		{
			$this->load->view('panel/new');
		}
		else
		{
			$this->load->view('panel/inicio_login');
		}

		
	}	

	function tosave()
	{
		
		$message['success'] = "Reservation Saved";
		$this->load->view('panel/new', $message);
	}
	
	
}