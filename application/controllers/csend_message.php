<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csend_message extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('parser');
		$this->load->model('msend_message');
	}

	public function index()
	{
		$data=array
		(
		   'base_url'=>base_url(),
		);
		
		$this->parser->parse('send_message/vsend_message.html',$data);

	}

	public function ck_insert(){	
		$input=$_POST;
		$result=$this->msend_message->insert_message($input);
		if($result)
		{
			echo json_encode(array('code'=>'100','msg'=>'success'));
			// echo "success";
		}
		else
		{
			echo json_encode("fail");
		}

	}

	public function ck_email(){
		$email=$_POST['email'];
		
		$result = $this->msend_message->check_email($email);

		
		if($result)
		{
			echo ("has_email");
		}
	}

	public function ck_nickname(){
		$nickname=$_POST['nickname'];
		
		$result = $this->msend_message->check_nickname($nickname);
		
		if($result)
		{
			echo ("has_nickname");
		}
	}

}