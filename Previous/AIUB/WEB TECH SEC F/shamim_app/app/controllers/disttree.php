<?php
class Disttree extends Controller{
	
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
				if($menus["xsubmenu"]=="5 Retailer Tree")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js');
		
		}
		
		public function index(){
			
			$this->view->rendermainmenu('disttree/index');
			
		}
		
		
		function treelist($bin){
			
			$xbin = $bin;
			if ($bin<Session::get('sbin')){
				$xbin = Session::get('sbin');	
			}
			
			$tree = $this->model->getTreeByBin($xbin);
			$lrpoint = $this->model->getLRPoint($xbin);
			//upline
			$this->view->upbin = $tree[0]['upbin'];
			$this->view->uprin = $tree[0]['uprin'];
			$this->view->upname = $tree[0]['uplinername'];
			$this->view->upgen = $tree[0]['upgender'];
			$this->view->upbc = $tree[0]['upbc'];
			//Bin start (1)		
			$this->view->bin = $tree[0]['bin'];
			$this->view->rin = $tree[0]['xrdin'];
			$this->view->name = $tree[0]['xorg'];
			$this->view->gen = $tree[0]['xgender'];
			$this->view->bc = $tree[0]['bc'];
			$this->view->refbin = $tree[0]['refbin'];
			$this->view->refname = $tree[0]['referencename'];
			$this->view->leftcurpoint = $tree[0]['leftcurpoint'];
			$this->view->rightcurpoint = $tree[0]['rightcurpoint'];
			$this->view->leftpoint = $lrpoint['lpoint'];
			$this->view->rightpoint = $lrpoint['rpoint'];
			//left bin	(2)
			$this->view->leftbin = $tree[0]['leftbin'];
			$this->view->leftrin = $tree[0]['leftrin'];
			$this->view->leftbinname = $tree[0]['leftbinname'];
			$this->view->leftgen = $tree[0]['leftgender'];
			//right bin	(3)
			$this->view->rightbin = $tree[0]['rightbin'];
			$this->view->rightrin = $tree[0]['rightrin'];
			$this->view->rightbinname = $tree[0]['rightbinname'];
			$this->view->rightgen = $tree[0]['rightgen'];
			
			
			$this->view->leftbinA = 0;
			$this->view->leftrinA = 0;
			$this->view->leftbinnameA = 0;
			$this->view->leftgenA = 0;
			//left right bin (5)
			$this->view->leftbinB = 0;
			$this->view->leftrinB = 0;
			$this->view->leftbinnameB = 0;
			$this->view->leftgenB = 0;
			
			if ($tree[0]['leftbin']>0){
			$lefttree = $this->model->getTreeByBin($tree[0]['leftbin']);
			
			//left left bin (4)
			$this->view->leftbinA = $lefttree[0]['leftbin'];
			$this->view->leftrinA = $lefttree[0]['leftrin'];
			$this->view->leftbinnameA = $lefttree[0]['leftbinname'];
			$this->view->leftgenA = $lefttree[0]['leftgender'];
			//left right bin (5)
			$this->view->leftbinB = $lefttree[0]['rightbin'];
			$this->view->leftrinB = $lefttree[0]['rightrin'];
			$this->view->leftbinnameB = $lefttree[0]['rightbinname'];
			$this->view->leftgenB = $lefttree[0]['rightgen'];
			}
			$this->view->rightbinA = 0;
			$this->view->rightrinA = 0;
			$this->view->rightbinnameA = 0;
			$this->view->rightgenA = 0;
			//right right bin (7)
			$this->view->rightbinB = 0;
			$this->view->rightrinB = 0;
			$this->view->rightbinnameB = 0;	
			$this->view->rightgenB = 0;
			if ($tree[0]['rightbin']>0){
			$righttree = $this->model->getTreeByBin($tree[0]['rightbin']);
			//right left bin (6)
			$this->view->rightbinA = $righttree[0]['leftbin'];
			$this->view->rightrinA = $righttree[0]['leftrin'];
			$this->view->rightbinnameA = $righttree[0]['leftbinname'];
			$this->view->rightgenA = $righttree[0]['leftgender'];
			//right right bin (7)
			$this->view->rightbinB = $righttree[0]['rightbin'];
			$this->view->rightrinB = $righttree[0]['rightrin'];
			$this->view->rightbinnameB = $righttree[0]['rightbinname'];	
			$this->view->rightgenB = $righttree[0]['leftgender'];
			}
			
			$this->view->renderpage('disttree/treelist', false);
		}
		
		function srchlist(){
			$this->treelist($_POST['srcbin']);
		}
		
		function reflist($bin){
			
			$xbin = $bin;
			
			
			$tree = $this->model->getTreeByRefBin($xbin); 
			
			$treev = '<div class="container">
						  <h2>Reference Tree Under</h2>
							<div class="panel-group">
							<div class="panel panel-default">
							  <div class="panel-heading">
								<h4 class="panel-title">
								  <a data-toggle="collapse" href="#collapsemain"><strong>BIN: '.$xbin.'</strong></a>
								</h4>
							  </div>
							  <div class="panel-body">
							  <div id="collapsemain" class="panel-collapse collapse">
								<ul class="list-group">';
			if(count($treev)>0){														
													
			foreach($tree as $key=>$value){
						
						$treev .='<a data-toggle="collapse" href="#collapse'.$key.'"><li class="list-group-item"><button type="button" class="btn btn-default btn-sm btn-primary">
  <span class="glyphicon glyphicon glyphicon-king" aria-hidden="true"></span>&nbsp;'.$value['bin'].' | '.$value['xrdin'].' | '.$value['xorg'].'</button></li></a>
										<div id="collapse'.$key.'" class="panel-collapse collapse">
											<ul>';
												$level1 = $this->model->getTreeByRefBin($value['bin']);
													if(count($level1)>0){
														foreach($level1 as $l1k=>$l1v){		
														
															$treev .='<a data-toggle="collapse" href="#collapse'.$key.$l1k.'"><li class="list-group-item"><li class="list-group-item"><button type="button" class="btn btn-default btn-sm btn-info">
  <span class="glyphicon glyphicon glyphicon-king" aria-hidden="true"></span>&nbsp;'.$l1v['bin'].' | '.$l1v['xrdin'].' | '.$l1v['xorg'].'</button></li></a>';
																$treev .='<div id="collapse'.$key.$l1k.'" class="panel-collapse collapse">
																			<ul >';
																		$level2 = $this->model->getTreeByRefBin($l1v['bin']);
																			if(count($level2)>0){
																				foreach($level2 as $l2k=>$l2v){
																					$treev .='<a data-toggle="collapse" href="#collapse'.$key.$l1k.$l2k.'"><li class="list-group-item"><li class="list-group-item"><button type="button" class="btn btn-default btn-sm btn-success">
  <span class="glyphicon glyphicon glyphicon-king" aria-hidden="true"></span>&nbsp;'.$l2v['bin'].' | '.$l2v['xrdin'].' | '.$l2v['xorg'].'</button></li></a>';
																						$treev .='<div id="collapse'.$key.$l1k.$l2k.'" class="panel-collapse collapse">
																									<ul >';
																										$level3 = $this->model->getTreeByRefBin($l2v['bin']);
																											if(count($level3)>0){
																												foreach($level3 as $l3k=>$l3v){
																													$treev .='<li class="list-group-item"><li class="list-group-item"><button type="button" class="btn btn-default btn-sm btn-warning">
  <span class="glyphicon glyphicon glyphicon-king" aria-hidden="true"></span>&nbsp;'.$l3v['bin'].' | '.$l3v['xrdin'].' | '.$l3v['xorg'].'</button></li>';
																														
																												}	
																											}
																						$treev .='	</ul>
																								</div>';
																				}	
																			}
																$treev .='	</ul>
																		  </div>';			
														}
													}	
						
						$treev .= '			</ul>	
										</div>';
				
					}
			}
			
			$treev .= '		</ul>	
						</div>
					</div>
					</div>
				  </div>
				</div>';
			
			$this->view->reftreev = $treev;
			
			$this->view->renderpage('disttree/reflist', false);
		}
		
		public function rinbvtable(){
			$fields = array(
						"bin-BIN",
						"lefthitpoint-A Team Total BV",
						"righthitpoint-B Team Total BV",
						"leftcurpoint-A Team Current BV",
						"rightcurpoint-B Team Current BV",
						"binstatus-BIN Type"
						);
			$table = new Datatable();
			$row = $this->model->showlist();
			
			$this->view->table = $table->myTable($fields, $row, "bin");
			
			
			$matfields = array(
						"bin-BIN",
						"binstatus-BIN Status",
						"xreqbv-Required BV (Team A and Team B)",
						"topmatching-Top Matching"
						);
			//$table = new Datatable();
			$row = $this->model->matchingnreq();
			
			$this->view->mattable = $table->myTable($matfields, $row, "bin");
			
			$this->view->renderpage('disttree/rinbvtable', false);
		}
		
}