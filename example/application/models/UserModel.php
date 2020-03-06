<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model{
	
	  function __construct()
	  {
		parent::__construct();
	  }
		
	function insert($data){
		
		return $this->db->insert("user", $data);
	}

	function getAll(){
		$query = $this->db->get('user')->result_object();
		return $query;
	}
	function getAllRowNumbers(){
		$query = $this->db->get('user')->num_rows();
		return $query;
	}

	function delete($data){
		return $this->db->delete('user', array('id' => $data));
	}
	function update($person){
		$this->db->where('id', $person['id']);
		$this->db->update('user', $person);
	}
	
	public function getByPage($limit,$offset) {
        $query = $this->db->select('*')
                ->from('user')
                ->limit($limit,$offset)
                ->get();

        return $query->result_object();
    }

	function uniqueUsername($un){

		if(isset($un) && !empty($un)){
			
			$person = $this->db->select('*')->from('user')->where('username', $un)->get();
			return $person->num_rows() == 0;
			
		}else{
			return false;
		}
		
	}


	function getById($id){

		if(is_null($id))
			return 0;

		$person = $this->db->select('*')->from('user')->where('id', $id)->get();

		if($person->num_rows() > 0)
			return $person->result_array()[0];
		else
			return null;
		
	}
}