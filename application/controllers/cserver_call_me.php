<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cserver_call_me extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('parser');
		$this->load->model('msever_call_me');
	}

	public function index(){

		$data=array(
			'base_url'=>base_url(),
			);

		$this->parser->parse('server_call_me/vserver_call_me.html',$data);
        
	}

	public function get_tbody_data(){
		$tbody=$this->msever_call_me->get_tbody();
		echo json_encode($tbody);
		
	}

	public function remove_message(){
		$input=$this->msever_call_me->remove_tr();
         echo json_encode($input);
	}




}