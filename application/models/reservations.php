<?php

class Reservations extends CI_Model {
	
	var $names = "";
	var $lastname = "";
	var $email = "";
	var $hotel = "";
	var $datetour = "";
	var $datetourd = "";
	var $datereservation = "";
	var $country = "";
	var $tourtime = "";
	var $passengers = "";
	var $commentsadmin = "";
	var $commentsvisitor = "";
	var $reserverby = "";
	var $elid = "";
	var $service = "";
	var $paid = "";
	var $donation = "";
	var $meeting = "";
	var $methodpaid = "";
	var $phone = "";
	var $estatus = "";


	function __construct(){
		parent::__construct();
		
	}		

	
	function new_reservation() {	


		$names = $this->input->post('names');
		$lastname = $this->input->post('lastname');
		$email = $this->input->post('email');
		$hotel = $this->input->post('hotel');
		$phone = $this->input->post('phone');
		$datetour = $this->input->post('datetour');
		$datereservation = date('Y-m-d');
		$country = $this->input->post('country');
		$tourtime = $this->input->post('tourtime');
		$passengers = $this->input->post('passengers');
		$commentsadmin = $this->input->post('commentsadmin');
		$commentsvisitor = $this->input->post('commentsvisitor');
		$reserverby = $this->input->post('reserverby');
		$meetingtime = $this->input->post('meetingtime');
		$methodpaid = $this->input->post('methodpaid');
		$service = $this->input->post('service');
		$estatus = $this->input->post('estatus');

		$cost = 19.99;
		$cost_dona = 0.99;
		$paid = $passengers * $cost;
		$donation = $passengers * $cost_dona;
		


		$data = array(
			'name'=>$names,
			'lastname'=>$lastname,
			'email'=>$email,
			'hotel_cruise'=>$hotel,
			'phone'=>$phone,
			'date_tour'=>$datetour,
			'date_reservation'=>$datereservation,
			'country'=>$country,
			'tour_time'=>$tourtime,
			'passengers'=>$passengers,
			'commentsadmin'=>$commentsadmin,
			'commentsvisitor'=>$commentsvisitor,
			'reserverby' => $reserverby,
			'service' => $service,
			'paid' => $paid,
			'donation' => $donation,
			'meeting_time' => $meetingtime,
			'method_paid' => $methodpaid,
			'estatus' => $estatus,

			);
		$query = $this->db->insert("reservations",$data);  
		return $query;

	}


	function update_reservation() {	


		$names = $this->input->post('names');
		$lastname = $this->input->post('lastname');
		$email = $this->input->post('email');
		$hotel = $this->input->post('hotel');
		$phone = $this->input->post('phone');
		$datetour = $this->input->post('datetour');
		$datereservation = date('Y-m-d');
		$country = $this->input->post('country');
		$tourtime = $this->input->post('tourtime');
		$passengers = $this->input->post('passengers');
		$commentsadmin = $this->input->post('commentsadmin');
		$commentsvisitor = $this->input->post('commentsvisitor');
		$reserverby = $this->input->post('reserverby');
		$elid = $this->input->post('elid');
		$service = $this->input->post('service');
		$paid = $this->input->post('paid');
		$donation = $this->input->post('donation');
		$meetingtime = $this->input->post('meetingtime');
		$service = $this->input->post('service');
		$methodpaid = $this->input->post('methodpaid');
		$estatus = $this->input->post('estatus');


		$cost = 19.99;
		$cost_dona = 0.99;
		$paid = $passengers * $cost;
		$donation = $passengers * $cost_dona;
		
		

		$data = array(
			'name'=>$names,
			'lastname'=>$lastname,
			'email'=>$email,
			'hotel_cruise'=>$hotel,
			'phone'=>$phone,
			'date_tour'=>$datetour,
			'date_reservation'=>$datereservation,
			'country'=>$country,
			'tour_time'=>$tourtime,
			'passengers'=>$passengers,
			'commentsadmin'=>$commentsadmin,
			'commentsvisitor'=>$commentsvisitor,
			'reserverby' => $reserverby,
			'service' => $service,
			'paid' => $paid,
			'donation' => $donation,
			'meeting_time' => $meetingtime,
			'method_paid' => $methodpaid,
			'estatus' => $estatus,
			);

		$this->db->where('id', $elid);
        //return $this->db->update('reservations', $data);
		$query = $this->db->update("reservations",$data);  
		return $query;

	}

	function get_info($id) {	

		
		$this->db->where('id', $id);
		$query = $this->db->get('reservations');
		
		return $query;
		

	}

	function view_reservations() {	

		$datetour = $this->input->post('datetour');
		$tourtime = $this->input->post('tourtime');
		$this->db->where('date_tour', $datetour);
		$this->db->where('tour_time', $tourtime);
		$this->db->where('estatus != ', 'Cancel');
		$query = $this->db->get('reservations');
		return $query;

	}

	function view_reservations_dates() {	

		$datetour = $this->input->post('datetours');
		$datetourd = $this->input->post('datetourd');
		$tourtime = $this->input->post('tourtime');
		$this->db->where('date_tour BETWEEN "'. date('Y-m-d', strtotime($datetour)). '" and "'. date('Y-m-d', strtotime($datetourd)).'"');
		$this->db->where('tour_time', $tourtime);
		//$this->db->where('estatus', 'Confirmed');
		$this->db->where('estatus != ', 'Cancel');
		$this->db->distinct();
		$this->db->select('date_tour');
		$this->db->select('tour_time');
		$query = $this->db->get('reservations');
		return $query;

	}

	function get_check() {	

		$datetour = $this->input->post('datetour');
		$tourtime = $this->input->post('tourtime');
		$this->db->where('date_tour', $datetour);
		$this->db->where('tour_time', $tourtime);
		$this->db->where('estatus != ', 'Cancel');
		$query = $this->db->get('reservations');
		return $query;

	}


}
?>