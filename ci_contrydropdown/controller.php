<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->model('model');
		$result['list']=$this->model->getCountry();
		
		
		$this->load->view('index_view',$result);
		
	}
	
	public function loadData()
	{
		$loadType=$_POST['loadType'];
		$loadId=$_POST['loadId'];

		$this->load->model('model');
		$result=$this->model->getData($loadType,$loadId);
		$HTML="";
		
		if($result->num_rows() > 0){
			foreach($result->result() as $list){
				$HTML.="<option value='".$list->id."'>".$list->name."</option>";
			}
		}
		echo $HTML;
	}
}