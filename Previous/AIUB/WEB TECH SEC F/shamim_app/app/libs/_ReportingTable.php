<?php

class ReportingTable{
	
	private $decimals="";
	
	public function __construct(){
		$this->decimals = Session::get("sbizdecimals");
	}
	/*
		Sample parameters for reportingtbl();
		
		$tblsettings = array(
							"columns"=>array("0"=>"ID",1=>"Address",2=>"Phone",3=>"Fees",4=>"Count"),
							"buttons"=>array("Show"=>URL."test/","Delete"=>URL."test/"),
							"urlvals"=>array("id","phone"),
							"sumfields"=>array("fees","count"),
							);
							
		$rows = array(0=>array("id"=>"1001","add"=>"Abdul Wahab","phone"=>"01827366502","fees"=>350,"count"=>2),
					  1=>array("id"=>"1002","add"=>"Shamsun Nahar","phone"=>"01826579376","fees"=>435,"count"=>4));
		
	**/
	public function reportingtbl($tblsettings,$rows){
		
		$columncount = 0;
		$colexist = false;
		$buttonexist = false;
		if(array_key_exists("columns",$tblsettings)){
			$columncount = count($tblsettings["columns"]);
			$colexist = true;
		}
		if(array_key_exists("buttons",$tblsettings)){
			$columncount = $columncount+count($tblsettings["buttons"]);
			$buttonexist = true;
		}
		$table="";
		
		$table.= '<table class="table table-bordered table-striped">';
			$table.='<thead>';
				$table.='<tr>';
				for($i=0; $i<$columncount; $i++){
					if($colexist){
					if(array_key_exists($i,$tblsettings["columns"]))
						$table.='<th>'.$tblsettings["columns"][$i].'</th>';
					else
						$table.='<th></th>';
					}
				}			
				$table.='</tr>';
			$table.='</thead>';
			$table.='<tbody>';
			if(count($rows)>0){	
				for($j=0; $j<count($rows); $j++){
				$table.='<tr>';					
						foreach($rows[$j] as $key=>$value){
							$table.='<td>'.$value.'</td>';
						}
						if($buttonexist){
							foreach($tblsettings["buttons"] as $key=>$value){
								$urlval = "";
								if(array_key_exists("urlvals",$tblsettings)){
									foreach($tblsettings["urlvals"] as $vals){
										$urlval .= $rows[$j][$vals]."/"; 
									}
								}
								$urlval=rtrim($urlval,"/");
								$table.='<td><a class="btn btn-info" href="'.$value.$urlval.'" role="button">'.$key.'</a></td>';
							}
						}
				$table.='</tr>';		
				}
			}
			$table.='</tbody>';
			if(array_key_exists("sumfields",$tblsettings)){
			$table.='<tfoot>';
				$table.='<tr>';
					
						$i=0;
						
						foreach($rows[0] as $k=>$v){
							if($i==0)
								$table.='<td><strong>'."Total".'</strong></td>';							
							elseif(in_array($k,$tblsettings["sumfields"])){
									$table.='<td><strong>'.array_sum(array_column($rows,$k)).'</strong></td>';								
							}else
								$table.='<td></td>';
							$i++;
						}
						if(array_key_exists("buttons",$tblsettings))
							for($b=0; $b<count($tblsettings["buttons"]); $b++)
								$table.='<td></td>';
				
				$table.='</tr>';
			$table.='</tfoot>';
			}			
		$table.= '</table>';
		return $table;	
	}
	
	
	/*$tblsettings = array(
	"columns"=>array("0"=>"ID",1=>"Address",2=>"Phone",3=>"Fees",4=>"Count"), //column names
	"groupfield"=>"Account~xacc",
	"grouprecords"=>array("Description~xaccdesc","Date~xdate"), //database records columns to show in group
	"buttons"=>array("Show"=>URL."test/","Delete"=>URL."test/"),
	"urlvals"=>array("id","phone"),
	"sumfields"=>array("fees","count"),
	);*/
				

	public function SingleGroupReportingtbl($tblsettings,$rows){
		
		$grouprec = [];

		$groupby = explode("~", $tblsettings["groupfield"]); 
		
		foreach($rows as $key=>$value){
			$keyval = $value[$groupby[1]];
			$grouprec[$keyval][]=$value;
		}

		$columncount = 0;
		$colexist = false;
		$buttonexist = false;
		if(array_key_exists("columns",$tblsettings)){
			if(!empty($tblsettings["columns"])){
				$columncount = count($tblsettings["columns"]);
				$colexist = true;
			}
		}
		if(array_key_exists("buttons",$tblsettings)){
			if(!empty($tblsettings["buttons"])){
				$columncount = $columncount+count($tblsettings["buttons"]);
				$buttonexist = true;
			}
		}
		$table="";
		
		$table.= '<table border="1" class="table table-bordered table-striped">';
			$table.='<thead>';
				$table.='<tr>';
				for($i=0; $i<$columncount; $i++){
					if($colexist){
					if(array_key_exists($i,$tblsettings["columns"]))
						$table.='<th>'.$tblsettings["columns"][$i].'</th>';
					else
						$table.='<th></th>';
					}
				}			
				$table.='</tr>';
			$table.='</thead>';
			$table.='<tbody>';
			foreach($grouprec as $gkey=>$gval){
				
				$table.='<tr><td>'.$groupby[0].' :'.$gkey.'</td>';
				
				for($i=0; $i<$columncount-1; $i++){
					$table .= '<td></td>';	
				}
				
				$table.='</tr>';

				if(!empty($tblsettings["grouprecords"])){					
					for($i=0; $i<count($tblsettings["grouprecords"]); $i++){
						$groupbynext=explode("~",$tblsettings["grouprecords"][$i]);
						$table .= '<tr><td>'.$groupbynext[0].' :'.$gval[0][$groupbynext[1]].'</td>';
						for($x=0; $x<$columncount-1; $x++){
							$table .= '<td></td>';	
						}
						$table.='</tr>';
					}
				}

				if(count($gval)>0){	
					for($j=0; $j<count($gval); $j++){
					$table.='<tr>';					
							foreach($gval[$j] as $key=>$value){
								$table.='<td>'.$value.'</td>';
							}
							if($buttonexist){
								foreach($tblsettings["buttons"] as $key=>$value){
									$urlval = "";
									if(array_key_exists("urlvals",$tblsettings)){
										foreach($tblsettings["urlvals"] as $vals){
											$urlval .= $rows[$j][$vals]."/"; 
										}
									}
									$urlval=rtrim($urlval,"/");
									$table.='<td><a class="btn btn-info" href="'.$value.$urlval.'" role="button">'.$key.'</a></td>';
								}
							}
					$table.='</tr>';		
					}
				}

				$table.='<tr>';
					
						$i=0;
						if(!empty($tblsettings["sumfields"])){
							foreach($gval[0] as $k=>$v){
								if($i==0)
									$table.='<td><strong>'."Total Amount ".'</strong></td>';							
								elseif(in_array($k,$tblsettings["sumfields"])){
										$table.='<td><strong>'.array_sum(array_column($gval,$k)).'</strong></td>';								
								}else
									$table.='<td></td>';
								$i++;
							}
						}
						if(array_key_exists("buttons",$tblsettings))
							for($b=0; $b<count($tblsettings["buttons"]); $b++)
								$table.='<td></td>';
				
				$table.='</tr>';
			}
			$table.='</tbody>';
			if(array_key_exists("sumfields",$tblsettings)){
			$table.='<tfoot style="display: table-row-group;">';
				$table.='<tr>';
					
						$i=0;
						if(!empty($tblsettings["sumfields"])){
							foreach($rows[0] as $k=>$v){
								if($i==0)
									$table.='<td><strong>'."Total".'</strong></td>';							
								elseif(in_array($k,$tblsettings["sumfields"])){
										$table.='<td><strong>'.array_sum(array_column($rows,$k)).'</strong></td>';								
								}else
									$table.='<td></td>';
								$i++;
							}
						}
						if(array_key_exists("buttons",$tblsettings))
							for($b=0; $b<count($tblsettings["buttons"]); $b++)
								$table.='<td></td>';
				
				$table.='</tr>';
			$table.='</tfoot>';
			}			
		$table.= '</table>';
		return  $table;	
	}
	
}
