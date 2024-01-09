<?php
class Error extends Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		$this->view->msg = "Your requested url page does not exists! Please correct it!";
		$this->view->render('error/index');
	}
	
}