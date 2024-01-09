<?php

class Bootstrap{
	
		private $_url = null;
		private $_controller = null;
		private $_controllerPath = "controllers/"; //always include trailing slashes
		private $_modelPath = "models/"; //always include trailing slashes
		private $_errorFile = "error.php";
		private $_defaultFile = "index.php";
	
	public function init(){
		//Sets the protected url 
			$this->_getUrl();
			
			//if no url is set index is the url
			if(empty($this->_url[0])){
				$this->_url[0] = "index";
				//$this->_loadDefaultController();
				//return false;
			}
						
			$this->_loadExistingController();

			$this->_callControllerMethod();
			
			
	}
	/**
	*(Optional) set a custom path to controllers
	* @param string is $path
	*/
	public function setControllerPath($path){
		$this->_controllerPath = trim($path, '/').'/';
	}
	/**
	*(Optional) set a custom path to models
	* @param string is $path
	*/
	public function setModelPath($path){
		$this->_modelPath = trim($path, '/').'/';
	}
	/**
	*(Optional) set a custom default file
	* @param string is $path. Use the File name of your controller eg: index.php.
	*/
	public function setDefaultFile($path){
		$this->_defaultFile = trim($path, '/');
	}
	/**
	*(Optional) set a custom error file
	* @param string is $path. Use the File name of your controller eg: error.php.
	*/
	public function setErrorFile($path){
		$this->_errorFile = trim($path, '/');
	}
	
	private function _getUrl(){
			$url = isset($_GET['url']) ? $_GET['url'] : null;
			
			$url = rtrim($url,'/');
			$url = rawurlencode($url);
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = rawurldecode($url);
			
			$this->_url = explode('/',$url);

	}
	//not used 
	private function _loadDefaultController(){
				require $this->_controllerPath . $this->_defaultFile;
				$this->_controller = new index();
				$this->_controller->index();
	}
	
	private function _loadExistingController(){
			$file = $this->_controllerPath . $this->_url[0] .'.php';
			if(file_exists($file)){
				require $file;
				$this->_controller = new $this->_url[0];
				$this->_controller->loadModel($this->_url[0], $this->_modelPath);
			}else{
				$this->_error();
				return false;
			}
	}
	
	
	private function _callControllerMethod(){
		
		$length = count($this->_url);
		
		if($length>1){
			
			if (!method_exists($this->_controller, $this->_url[1])){
				
				$this->_error();
				
			}
		}
		
		switch ($length){
			case 7:
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4], $this->_url[5], $this->_url[6]);
				break;
			case 6:
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4], $this->_url[5]);
				break;
			case 5:
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
				break;
			case 4:
				$this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
				break;
			case 3:
				$this->_controller->{$this->_url[1]}($this->_url[2]);
				break;
			case 2:
				$this->_controller->{$this->_url[1]}();
				break;
			default:
				$this->_controller->index();
				break;
		}
		
		
	}
	
	private function _error(){
		require $this->_controllerPath . $this->_errorFile;
		$this->_controller = new error();
		$this->_controller->index();
		exit;
	}
}
