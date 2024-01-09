<?php
class Code extends Controller{
	
	function __construct(){
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
			if($logged == false){
				Session::destroy();
				header('location: '.URL.'login');
				exit;
			}
		}
		
	function index(){
		menu = array("Item Category", "Item Group", "Item Class", "Item Brand");
		$this->view->rendermainmenu('menu/index');
	}		
}