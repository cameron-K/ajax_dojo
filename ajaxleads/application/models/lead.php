<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lead extends CI_Model {

	function get_by_name($name){

	}

	function get_by_date($date){

	}

	function get_by_page($page){

	}

	function get_all_records($page_start){
		return $this->db->query("SELECT * FROM leads",array($page_start))->result_array();
	}

	function get_filtered_records_full_name($data){

		$fn=$data['first_name'].'%';
		$ln=$data['last_name'].'%';
		return $this->db->query("SELECT id,first_name,last_name, COUNT(sites_id), DATE(registered_datetime) AS registered_datetime,email FROM leads WHERE DATE(registered_datetime)>DATE(?) AND DATE(registered_datetime)<DATE(?) AND first_name LIKE ? AND last_name LIKE ? GROUP BY leads.id",array($data['from-date'],$data['to-date'],$fn,$ln))->result_array();
	}
		
	function get_filtered_records_first_name($data){

		$fn=$data['first_name'].'%';
		return $this->db->query("SELECT id,first_name,last_name, COUNT(sites_id), DATE(registered_datetime) AS registered_datetime,email FROM leads WHERE DATE(registered_datetime)>DATE(?) AND DATE(registered_datetime)<DATE(?) AND first_name LIKE ? GROUP BY leads.id",array($data['from-date'],$data['to-date'],$fn))->result_array();
	}
		
	function get_filtered_records($data){
		// var_dump($data);
		return $this->db->query("SELECT id,first_name,last_name, DATE(registered_datetime) AS registered_datetime,email FROM leads WHERE DATE(registered_datetime)>DATE(?) AND DATE(registered_datetime)<DATE(?)",array($data['from-date'],$data['to-date']))->result_array();
	}

// count rows with php count NOT sql

}