<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Leads extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('lead');
		// $this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('leads');
	}

	public function show_table(){		//send apropriate page for unfiltered
		$page_start=$this->input->post('page')*5;
		// echo $page_start;
		$data['data']=$this->lead->get_all_records($page_start);
		$data['data']['page']=0;
		$this->load->view('partials/leads',$data);
	}

	public function adjust_input($post_info){

		foreach($post_info as $k=>$d){
			// if($d===""){
			// 	$data[$k]="IS NOT NULL";
			// }
			// else{
				$data[$k]=$d;
			// }
		}
		$data['page']=(int)$post_info['page'];
		if($post_info['from-date']===''){
			$data['from-date']=0;
		}
		if($post_info['to-date']===''){
			$data['to-date']='2015-12-12';
		}

		$name=str_word_count($data['name'],1);
		if (count($name)===2){
			$data['first_name']=$name[0];
			$data['last_name']=$name[1];
			$res['data']=$this->lead->get_filtered_records_full_name($data);
			// echo "2";
			// var_dump($data);
		}
		elseif(count($name)===1){
			$data['first_name']=$data['name'];
			$data['last_name']="IS NOT NULL";
			$res['data']=$this->lead->get_filtered_records_first_name($data);
			// echo "1";
		}
		else{
			$data['first_name']="IS NOT NULL";
			$data['last_name']="IS NOT NULL";
			$res['data']=$this->lead->get_filtered_records($data);
			// echo "idk";
		}
		
		// var_dump($data);
		$res['data']['page']=$post_info['page'];
		// var_dump($res['data']['page']);
		return $res['data'];
	}

	public function update_table(){
		$post_info=$this->input->post();
		$res['data']=$this->adjust_input($post_info);
		// var_dump($post_info);
		// $res['data']=$this->lead->get_filtered_records($data);
		// var_dump($res['data']);

		$this->load->view('partials/leads',$res);
		// var_dump($data);

		// $this->lead->
	}
}

//end of main controller