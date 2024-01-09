<?php
class Mainmenu extends Controller{
	
	function __construct(){
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
			if($logged == false){
				Session::destroy();
				header('location: '.URL.'login');
				exit;
			}
			$this->view->js = array('public/js/datatable.js','views/mainmenu/js/chart.js');
		}
		
		public function index(){
			
					
			$where = "bizid = ". Session::get('sbizid') ." and zrole = '". Session::get('srole')."'";
			
			$menus = $this->model->getMainMenu($where);
			$arr=array();
			for($i=0; $i<count($menus); $i++){
				
				$arr[$menus[$i]['xmenu']][]=$menus[$i]['xsubmenu'].",".$menus[$i]['xurl'];
			}

			//----------------bizcur-----------------//
			$this->view->bizcur = Session::get('sbizcur');

			$dt = date('Y-m-d H:i:s');
			$tdt = str_replace('/', '-', $dt);
			$tdate = date('Y-m-d', strtotime($tdt));

			//------------Sales-----------------//
			$this->view->tsales = $this->model->getTodaySales($tdate,"Confirmed");
			$this->view->tunconfirmedsales = $this->model->getTodaySales($tdate,"Created");
			$this->view->tcaneclsales = $this->model->getTodaySales($tdate,"Canecled");

			//-----------PO------------------//
			$this->view->tpo = $this->model->getTodayPO($tdate,"Confirmed");
			$this->view->tunconfirmedpo = $this->model->getTodayPO($tdate,"Created");
			$this->view->tcaneclpo = $this->model->getTodayPO($tdate,"Canecled");

			$curmonth=0;
			$premonth=0;
			$curmonth = date('m', strtotime($dt));
			$curyear = date('Y', strtotime($dt));
			$premonth = $curmonth-1;
			$yearoffset = Session::get('syearoffset');
			$xyear = 0;
				$per = 0;
				//print_r($this->model->getYearPer($yearoffset,intval($month))); die;
				foreach ($this->model->getYearPer($yearoffset,intval($curmonth)) as $key=>$val){
					$per = $key;
					$xyear = $val;
				}

			//------------Expenditure-----------------//
			$totalex = $this->model->totalexpen($where=" xyear='".$xyear."' and ");
			$this->view->totalex = $totalex;			
			$wherecur = " xper=".$per." and xyear='".$xyear."' and ";
			$this->view->curmonthex = $this->model->totalexpen($wherecur );		
			$whererpre = " xper=".$per." and xyear='".$xyear."' and ";
			$this->view->premonthex = $this->model->totalexpen($whererpre );			
			$wherertoday = " xdate='".$tdate."' and ";
			$this->view->todayex = $this->model->totalexpen($wherertoday );

			//------------------Income---------------------//
			$totalin = $this->model->totalincome($where=" xyear='".$xyear."' and ");
			$this->view->totalin = $totalin;			
			$wherecurin = " xper=".$per." and xyear='".$xyear."' and ";
			$this->view->curmonthin = $this->model->totalincome($wherecurin );		
			$whererprein = " xper=".$per." and xyear='".$xyear."' and ";
			$this->view->premonthin = $this->model->totalincome($whererprein );			
			$wherertodayin = " xdate='".$tdate."' and ";
			$this->view->todayin = $this->model->totalincome($wherertodayin );

			//-----------------Total AR and AP---------------//
			$ap = " bizid = ". Session::get('sbizid') ." and xaccusage = 'AP' and xrecflag = 'Live' and xyear = ".$xyear."";
			$this->view->accpay = $this->model->totalAp($ap);
			$ar = " bizid = ". Session::get('sbizid') ." and xaccusage = 'AR' and xrecflag = 'Live' and xyear = ".$xyear."";
			$this->view->accrec = $this->model->totalAr($ar);

			//-----------Total stock----------------------//
			$this->view->stock = $this->model->getstock(); 

			//-----------Total Customer----------------------//
			$this->view->totalcus = $this->model->getCus();

			//---------------Top Item-----------------------//
			$this->view->topitem = $this->model->getTopItem();

			//---------------Top Customer-------------------//
			$this->view->topcus = $this->model->getTopCus();

			//print_r($this->model->getTopItem());die;
			
			$this->view->rendermainmenu('mainmenu/index');
		}

		function gettopitem(){
			$this->model->getTopCus();
		}

		function getsales(){
			$this->model->getSales();
		}

		function getpo(){
			$this->model->getPO();
		}

		public function members(){
			
					
			$where = "bizid = ". Session::get('sbizid') ." and zrole = '". Session::get('srole')."'";
			
			$menus = $this->model->getMainMenu($where);
			$arr=array();
			for($i=0; $i<count($menus); $i++){
				
				$arr[$menus[$i]['xmenu']][]=$menus[$i]['xsubmenu'].",".$menus[$i]['xurl'];
			}
			/*print_r($arr); die;
			$val=array();
			foreach($arr as $key=>$value){
				echo $key;
				foreach($value as $k=>$submenu){
					echo $submenu;
				}
				
			}
			die;*/
			//$this->view->mainmenus = $arr;
			
			$this->view->rendermainmenu('mainmenu/index');
		}
		function logout($biz){
			Session::destroy();
			header('location: ' . URL . 'login/index/' . $biz);
			exit;
		}
		function logoutmem($biz){
			Session::destroy();
			header('location: ' . URL . 'loginmem/index/' . $biz);
			exit;
		}

}