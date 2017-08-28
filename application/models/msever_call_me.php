<?php
class Msever_call_me extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_tbody()
	{
		$query=$this->db->query("select * from client_message");

       return $query->result_array();
	}

	public function remove_tr(){
		$input=filter_input_array(INPUT_POST);
		if($input["action"] === 'delete')
		{
		  $query=$this->db->query("delete from client_message where id='".$input['id']."'"); 
	    }

	    return $input;
	}
}
