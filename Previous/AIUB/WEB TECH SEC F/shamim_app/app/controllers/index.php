<?php
class Index extends Controller{
	
	function __construct(){
		parent::__construct();				
		}
		
		public function index(){
			//echo Hash::create('sha256','rajib',HASH_KEY);
			
			$this->view->bizness = $this->model->showlist();
			$this->view->render('index/index');
		}
		public function detail(){
			$this->view->render('index/index');
		}
}