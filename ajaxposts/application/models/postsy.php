<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Postsy extends CI_Model {

	function new_post($post){
		return $this->db->query("INSERT INTO posts (description,created_at)
			VALUES (?,NOW())",$post);
	}

	function get_all(){
		return $this->db->query("SELECT * FROM posts")->result_array();
	}

}