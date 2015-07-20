<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Note extends CI_Model {

	function add_note($data){
		return $this->db->query("INSERT INTO notes (title,created_at,updated_at)
			VALUES (?,NOW(),NOW())",array($data['title']));
	}

	function get_notes(){
		return $this->db->query("SELECT * FROM notes")->result_array();
	}

	function update_note($data){
		return $this->db->query("UPDATE notes SET description=? WHERE id=?",array($data['description'],$data['id']));
	}
	function delete_note($id){
		return $this->db->query("DELETE FROM notes WHERE id=?",array($id['id']));
	}
}