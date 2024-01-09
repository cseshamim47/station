<?php
class Distwallet extends Controller{
	
	private $values = array();
	private $fields = array();
	
	function __construct(){
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
			if($logged == false){
				Session::destroy();
				header('location: '.URL.'login');
				exit;
			}
			
		$usersessionmenu = 	Session::get('mainmenus');
		
		$iscode=0;
		foreach($usersessionmenu as $menus){
				if($menus["xsubmenu"]=="7 Wallet")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js');
		$dt = date("Y/m/d");
		
		}
		
		public function index(){
				
		$this->view->rendermainmenu('distwallet/index');
			
		}
		
		
		
		function walletdt(){
			
			$this->view->balance = $this->model->getBalance();
			
			$xrdin = Session::get('suser');
			
			$fields = array(
						"xtype-Wallet Type",
						"amountdr-Debit",
						"amountcr-Credit"						
						);
			
			$row = $this->model->getBalanceByLimit($xrdin);
			
			$this->view->table = $this->myTable($fields, $row, "xtype",URL."distwallet/showdetail/");
			
			$this->view->renderpage('distwallet/distballist');
		}
		
		function showdetail($type){
			$fields = array(
						"stno-ST No",
						"xdate-Date",
						"xtxnnum-Trx. No",
						"total-Total",
						"srctax-Source Tax",
						"amount-Net Amount"						
						);
			
			$row = $this->model->getBalanceDet($type);
			
			$this->view->table = $this->myTabledt($fields, $row);
			$this->view->type = $type;
			$this->view->renderpage('distwallet/distbaldt');
		}
				
		function myTable($fields, $row, $keyval, $actionurledit=""){
		
		$field = array();
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		
		$table = '<div class="table-responsive"><table class="table table-bordered table-striped" style="width:100%">';
		$table.='<thead>';
		$table.='<tr>';
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
		if($actionurledit!="")
			$table.='<th>Show Detail</th>';
		
		$totdr = 0;
		$totcr = 0;
		
		
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>';
		foreach($row as $key=>$value){
			$table.='<tr>';
			foreach($value as $k=>$str){
				 
					switch ($k){
						case "amountdr":
							$totdr += number_format(floatval($str), 0, '.', '');
							break;
						case "amountcr":
							$totcr += number_format(floatval($str), 0, '.', '');
							break;
					}			
				$table.='<td>'.htmlentities($str).'</td>';
			}
			if($actionurledit!="")	
				$table.='<td><a class="btn btn-info" href="'.$actionurledit.$value[$keyval].'" role="button">Show</a></td>';
			
			$table.='</tr>';
		}
		$table.='</tbody>';
		$table.='<tfoot>';
		$table.='<tr>';
		$table.='<td><strong>Total</strong></td><td><strong>'.$totdr.'</strong></td><td><strong>'.$totcr.'</strong></td><td></td>';
		$table.='</tr>';
		$table.='</tfoot>';
		$table.='</table></div>';
		return $table;
	}
	
	function myTabledt($fields, $row){
		
		$field = array();
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		
		$table = '<div class="table-responsive"><table class="table table-bordered table-striped" style="width:100%">';
		$table.='<thead>';
		$table.='<tr>';
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
				
		$tot = 0;
		$tax = 0;
		$amt = 0;
		
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>'; 
		foreach($row as $key=>$value){
			$table.='<tr>';
			foreach($value as $k=>$str){
				if($k == "total")
					$tot+=$str;
				if($k == "srctax")
					$tax+=$str;
				if($k == "amount")
					$amt+=$str;
				$table.='<td>'.htmlentities($str).'</td>';
			}
			
			
			$table.='</tr>';
		}
		$table.='</tbody>';
		$table.='<tfoot>';
		$table.='<tr>';
		$table.='<td><strong>Total</strong></td><td></td><td></td><td><strong>'.$tot.'</strong></td><td><strong>'.$tax.'</strong></td><td><strong>'.$amt.'</strong></td>';
		$table.='</tr>';
		$table.='</tfoot>';
		$table.='</table></div>';
		return $table;
	}
}