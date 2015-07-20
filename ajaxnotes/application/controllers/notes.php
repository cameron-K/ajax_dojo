<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('note');
		// $this->output->enable_profiler();
	}

	public function index()
	{
		//get all quotes and pass
		// $data['notes']=array()
		// $notes=array();
		// $this->load->view('partials/notes',array('notes'=>$notes));
		$this->load->view('notes');
		
	}

	public function get_all(){
		$data['notes']=$this->note->get_notes();
		$this->load->view("partials/notes",$data);
		// echo json_encode($data);
	}

	public function delete_note(){
		$note=$this->input->post();
		$this->note->delete_note($note);
		$data['notes']=$this->note->get_notes();
		$this->load->view("partials/notes",$data);
	}

	public function update_note(){
		$note=$this->input->post();
		$this->note->update_note($note);
		$data['notes']=$this->note->get_notes();
		$this->load->view("partials/notes",$data);
	}

	public function create_note(){
		$note=$this->input->post();
		$this->note->add_note($note);
		$data['notes']=$this->note->get_notes();
		$this->load->view("partials/notes",$data);
	}
}

//end of main controller