<?php 

class Appcodes extends Controller{
	
	public function __construct(){
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
			if($logged == false){
				Session::destroy();
				header('location: '.URL.'login');
				exit;
			}
	}
	
	public function getCodeByType($type){
		$this->model->getCodeByType($type);
	}
}