<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('postsy');
	}

	public function create(){
		$post=$this->input->post('description');
		$this->postsy->new_post($post);
		$data=$this->postsy->get_all();
		echo json_encode($data);
	}
	public function get_posts(){
		$data=$this->postsy->get_all();
		echo json_encode($data);
	}

	public function index()
	{
		$this->load->view('index');
	}
}

//end of main controller