<?php
class Msend_message extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function check_data($input){
		// $query = $this->db->query(" SELECT * FROM client_message where 'nickname'='".$input['nickname']."' ");
		$result=false;
		if(!empty($input))
		{
			$this->db->select('*');
			$this->db->from('client_message');
			$this->db->where('nickname',$input['nickname']);
			$this->db->or_where('email',$input['email']);
			// $this->db->or_where('phone',$input['phone']);		
			$query  =$this->db->get();		
			$row    = $query->num_rows();

			if($row>=1)
			//（資料庫有資料）	
			{
			  $result =true;
			}

      }
       return $result;
	}

	public function insert_message($input)
	{
		$result = false;
		if($this->check_data($input) === false)
		{
		 if(!empty($input))
		 {
			$data=array
			(
				'nickname' =>$input['nickname'],
				'sex'      =>$input['sex'],
				'email'    =>$input['email'],
				'phone'    =>$input['phone'],
				'message'  =>$input['message']
			);
            
			$this->db->insert('client_message',$data);
			if($this->db->affected_rows()>=1)
			{
				$result = true;
			}
		 }

	   }
		return $result;
	}

	public function check_email($email)
	{
		$result = false;
		$this->db->select('*');
		$this->db->from('client_message');
		$this->db->where('email',$email);
		$query=$this->db->get();
		$row = $query->num_rows();
		if($row>=1)
		{
			$result = true;
		}

		return $result;
	}

	public function check_nickname($nickname)
	{
		$result = false;
		$this->db->select('*');
		$this->db->from('client_message');
		$this->db->where('nickname',$nickname);
		$query=$this->db->get();
		$row = $query->num_rows();
		if($row>=1)
		{
			$result = true;
		}

		return $result;
	}
}