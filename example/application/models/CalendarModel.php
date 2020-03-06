<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CalendarModel extends CI_Model{
	
	function __construct()
	{
	parent::__construct();
	}
	
	function insert($data){
		
		return $this->db->insert("date", $data);
	}

	function getAvtivityById($activity_id){
		$this->db->select('name');
		$this->db->from('activity');
		$this->db->where('id',$activity_id);
		return $this->db->get()->result_object()[0]->name;
	}
	function getAllActivities(){
		$this->db->select('*');
		$this->db->from('activity');
		return $this->db->get()->result_object();
	}

	function getAll(){
		$query = $this->db->get('date')->result_object();
		return $query;
	}
	function getAllRowNumbers(){
		$query = $this->db->get('date')->num_rows();
		return $query;
	}

	function delete($data){
		return $this->db->delete('date', array('id' => $data));
	}
	function update($person){
		$this->db->where('id', $person['id']);
		$this->db->update('date', $person);
	}
	
	public function getByPage($limit,$offset) {
        $query = $this->db->select('*')
                ->from('date')
                ->limit($limit,$offset)
                ->get();

        return $query->result_object();
    }

	function getById($id){

		if(is_null($id))
			return 0;

		$person = $this->db->select('*')->from('date')->where('id', $id)->get();

		if($person->num_rows() > 0)
			return $person->result_array()[0];
		else
			return null;
		
	}
}