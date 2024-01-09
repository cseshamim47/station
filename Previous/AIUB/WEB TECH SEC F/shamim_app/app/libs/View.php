<?php

class View{
	
	function __construct(){
		
	}
	
	public function render($name, $noinclude = false){
		
		if ($noinclude==true){
			require 'views/' . $name . '.php';
		}else{
		require 'views/dirheader.php';
		require 'views/' . $name . '.php';
		require 'views/dirfooter.php';
		}
	}
	
	public function renderlogin($name, $noinclude = false){
		
		if ($noinclude==true){
			require 'views/' . $name . '.php';
		}else{
		require 'views/loginheader.php';
		require 'views/' . $name . '.php';
		require 'views/loginfooter.php';
		}
	}
		
	public function rendermainmenu($name, $noinclude = false){
		
		if ($noinclude==true){
			require 'views/' . $name . '.php';
		}else{
		require 'views/menuheader.php';
		require 'views/' . $name . '.php';
		require 'views/menufooter.php';
		}
	}
	public function rendermainmenumem($name, $noinclude = false){
		
		if ($noinclude==true){
			require 'views/' . $name . '.php';
		}else{
		require 'views/menuheadermem.php';
		require 'views/' . $name . '.php';
		require 'views/menufootermem.php';
		}
	}
	public function renderpage($name, $noinclude = false){
		
		if ($noinclude==true){
			require 'views/' . $name . '.php';
		}else{
		require 'views/rawheader.php';
		require 'views/' . $name . '.php';
		require 'views/rawfooter.php';
		}
	}
}