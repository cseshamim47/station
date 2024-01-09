<?php

class Datatable{
	/*
	* $fields is the field header to be render
	* $row is array of data selected from db
	* $keyval is for edit or delete url id
	* $actionurledit is base url for edit OPTIONAL
	* $actionurldelete is base url for delete OPTIONAL
	**/
	private $decimals="";
	
	public function __construct(){
		$this->decimals = Session::get("sbizdecimals");
	}
	
	
	public function createTable($fields, $row, $keyval, $actionurledit="", $actionurldelete="",$actionbtn="Delete"){
		
				
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		$table = '<div class="table-responsive"><table id="dtbl" class="table table-striped table-bordered" cellspacing="0" width="100%">';
		$table.='<thead>';
		$table.='<tr>';
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
		if($actionurledit!="")
			$table.='<th></th>';
		if($actionurldelete!="")
			$table.='<th></th>';
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>';
		
		foreach($row as $key=>$value){
			$table.='<tr>';
			foreach($value as $str){
				$keyofval =  array_search($str, $value); 
					switch ($keyofval){
						case "xqty":
							$str = number_format(floatval($str), 0, '.', '');
							break;
						case "xbal":
							$str = number_format(floatval($str), 0, '.', '');
							break;
						case "xtotcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;		
						case "xstdcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xstdprice":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xvatpct":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xvatamt":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xdisc":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;		
						default:
							$str = $str;
				}
				$table.='<td>'.htmlentities($str).'</td>';
			}
			$t=time();
			if($actionurledit!="")	
				$table.='<td><a class="btn btn-info" id="'.$value[$keyval].'"  href="'.$actionurledit.$value[$keyval].'/'.$t.'" role="button">Show</a></td>';
			if($actionurldelete!="")
				$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$actionurldelete.$value[$keyval].'" role="button">'.$actionbtn.'</a></td>';
			$table.='</tr>';
		}
		$table.='</tbody>';
		$table.='</table></div>';
		
		return $table;	
	}
	public function customcreateTable($fields, $row, $keyval, $actionurledit="", $actionurldelete="",$actionbtn="Delete"){
		
				
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		$table = '<div class="table-responsive"><table id="dtbl" class="table table-striped table-bordered" cellspacing="0" width="100%">';
		$table.='<thead>';
		$table.='<tr>';
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
		if($actionurledit!="")
			$table.='<th></th>';
		if($actionurldelete!="")
			$table.='<th></th>';
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>';
		
		foreach($row as $key=>$value){
			$table.='<tr>';
			foreach($value as $str){
				$keyofval =  array_search($str, $value); 
					switch ($keyofval){
						case "xqty":
							$str = number_format(floatval($str), 0, '.', '');
							break;
						case "xbal":
							$str = number_format(floatval($str), 0, '.', '');
							break;
						case "xtotcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;		
						case "xstdcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xstdprice":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xvatpct":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xvatamt":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xdisc":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;		
						default:
							$str = $str;
				}
				$table.='<td>'.htmlentities($str).'</td>';
			}
			$t=time();
			if($actionurledit!="")	
				$table.='<td><input type="button" href="#tab_1" data-toggle="tab" id="SORD-000002" value="Show" onclick="clickfunction(this.id);" /></td>';
			if($actionurldelete!="")
				$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$actionurldelete.$value[$keyval].'" role="button">'.$actionbtn.'</a></td>';
			$table.='</tr>';
		}
		$table.='</tbody>';
		$table.='</table></div>';
		
		return $table;	
	}
	
	
	public function createTableWithStatus($fields, $row, $keyval=array(), $actionurledit="", $actionurldelete=""){
		
				
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		
		$table = '<div class="table-responsive"><table id="dtbl" class="table table-striped table-bordered" cellspacing="0" width="100%">';
		$table.='<thead>';
		$table.='<tr>';
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
		if($actionurledit!="")
			$table.='<th>Edit</th>';
		if($actionurldelete!="")
			$table.='<th>Delete</th>';
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>';
		
		foreach($row as $key=>$value){
			$actionurl="";
				foreach($keyval as $keystr){
					$actionurl .= $value[$keystr]."/";	
				}
			$table.='<tr>';
			foreach($value as $str){
				
				$table.='<td>'.htmlentities($str).'</td>';
			}
			if($actionurledit!="")	
				$table.='<td><a class="btn btn-info" id="'.$value[$keyval[0]].'"  href="'.rtrim($actionurledit.$actionurl,"/").'" role="button">Confirmed</a></td>';
			if($actionurldelete!="")
				$table.='<td><a id="delbtn" class="btn btn-danger" href="'.rtrim($actionurldelete.$actionurl,"/").'" role="button">Delete</a></td>';
			$table.='</tr>';
		}
		$table.='</tbody>';
		$table.='</table></div>';
		
		return $table;	
	}
	/***
	* $col is an array for the table column name
	* $row is the db records
	* $groupval is groupby
	*/
	function singleGroupTable($cols, $rows, $groupval, $totalfield=""){
		
			$row = $rows;
			$cl = count($cols);
			$grouprec = [];
			foreach($row as $gkey=>$gval){
				$keyval = $gval[$groupval];
				$grouprec[$keyval][]=$gval;
			}
									
			$table = '';
			$total=0;
			
			$table.= '<table id="grouptable" class="table table-bordered table-striped" style="width:100%">';	
				$table.= '<thead>';
				foreach ($cols as $col){
					$table.= '<th>'.$col.'</th>';
				}
				$table.= '</thead>';
				$table.= '<tbody>';
					foreach($grouprec as $key=>$val ){
						$subtotal=0;
						$table.= '<tr rowspan="5">';
							$table.= '<td><strong>'. $key .'</strong></td>';
							for ($i=0; $i<count($cols)-1; $i++){
								$table.= '<td></td>';
							}
						$table.= '</tr>';
						
							foreach($val as $k=>$v ){
								$table.= '<tr>';
								//$table.= '<td></td><td>'. $v['xacc'] .'</td><td>'. $v['xdesc'] .'</td><td>'. $v['xaccusage'] .'</td><td>'. $v['xaccsource'] .'</td>';
								$table.= '<td></td>'; 
								if($totalfield!=""){
										$total += $v[$totalfield];
										$subtotal += $v[$totalfield];
									}
								foreach($v as $td){
									
									if ($td <> $v[$groupval])
										$table.= '<td>'. $td .'</td>';
									
								}
								$table.= '</tr>';
							}
						/*	for($i=0;$i<$cl;$i++){
						
								if($i==$cl-1){
									$table.='<td><strong>'.$subtotal.'</strong></td>';
								}
								else if($i==$cl-2){ 
									$table.='<td><strong>Total</strong></td>';
								}else{
								$table.='<td></td>';
								}
							}*/
						
					}
				$table.= '</tbody>';
				if($totalfield!=""){
					$table.= '<tfoot><tr>';
					
					/*for($i=0;$i<$cl;$i++){
						
						if($i==$cl-1){
							$table.='<td><strong>'.$total.'</strong></td>';
						}
						else if($i==$cl-2){ 
							$table.='<td><strong>Total</strong></td>';
						}else{
						$table.='<td></td>';
						}
					}*/
				}
			$table.= '</tr></tfoot></table>';
			
			return $table;
			
		}
		
		function singleAccGroupTable($cols, $rows, $groupval, $totalfield=""){
		
			$row = $rows;
			$cl = count($cols);
			$grouprec = [];
			foreach($row as $gkey=>$gval){
				$keyval = $gval[$groupval];
				$grouprec[$keyval][]=$gval;
			}
									
			$table = '';
			$total=0;
			$totalcr=0;
			$table.= '<table id="grouptable" class="table table-bordered table-striped" style="width:100%">';	
				$table.= '<thead>';
				foreach ($cols as $col){
					$table.= '<th>'.$col.'</th>';
				}
				$table.= '</thead>';
				$table.= '<tbody>';
					foreach($grouprec as $key=>$val ){
						$subtotal=0;
						$subtotalcr=0;
						$table.= '<tr rowspan="5">';
							$table.= '<td><strong>'. $key .'</strong></td>';
							for ($i=0; $i<count($cols)-1; $i++){
								$table.= '<td></td>';
							}
						$table.= '</tr>';
						
							foreach($val as $k=>$v ){
								$table.= '<tr>';
								//$table.= '<td></td><td>'. $v['xacc'] .'</td><td>'. $v['xdesc'] .'</td><td>'. $v['xaccusage'] .'</td><td>'. $v['xaccsource'] .'</td>';
								$table.= '<td></td>'; 
								if($totalfield!=""){
										if($v[$totalfield]>=0){
											$total += $v[$totalfield];
											$subtotal += $v[$totalfield];
										}
										if($v[$totalfield]<0){
											$totalcr += $v[$totalfield];
											$subtotalcr += $v[$totalfield];
										}

									}
								$i=0;		
								foreach($v as $td){
									$i++;
									if ($td <> $v[$groupval]){
										if($i==4){
											if($td<0)
												$table.= '<td>0</td><td>'. abs($td) .'</td>';
											else
												$table.= '<td>'. $td .'</td><td>0</td>';
										}else{
											$table.= '<td>'. $td .'</td>';
										}
									}
								}
								$table.= '</tr>';
							}
						for($i=0;$i<$cl;$i++){
						
								if($i==$cl-2){
									$table.='<td><strong>'.$subtotal.'</strong></td><td><strong>'.abs($subtotalcr).'</strong></td>';
								}
								else if($i==$cl-3){ 
									$table.='<td><strong>Total</strong></td>';
								}else{
								$table.='<td></td>';
								}
							}
						
					}
				$table.= '</tbody>';
				if($totalfield!=""){
					$table.= '<tfoot><tr>';
					
					for($i=0;$i<$cl;$i++){
						
						if($i==$cl-2){
							$table.='<td><strong>'.$total.'</strong></td><td><strong>'.abs($totalcr).'</strong></td>';
						}
						else if($i==$cl-3){ 
							$table.='<td><strong>Total</strong></td>';
						}else{
						$table.='<td></td>';
						}
					}
				}
			$table.= '</tr></tfoot></table>';
			
			return $table;
			
		}
		
		
	public function myTableSubmit($fields, $row, $keyval, $actionurledit="", $actionurldelete=""){
		
		$field = array();
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		
		$kvals=explode('~',$keyval);
		
		
		
		$table = '<div class="table-responsive"><table class="table table-bordered table-striped" style="width:100%">';
		$table.='<thead>';
		$table.='<tr>';
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
		if($actionurledit!="")
			$table.='<th>Edit</th>';
		if($actionurldelete!="")
			$table.='<th>Delete</th>';
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>';
		foreach($row as $key=>$value){
			$table.='<tr>';
			foreach($value as $str){
				
				$table.='<td>'.htmlentities($str).'</td>';
			}
			$urlval = "";
			if(count($kvals)>0){
			   for($i = 0; $i < count($kvals); $i++){
					$urlval .= $value[$kvals[$i]]."/";
			   }	
			}
			$urlval = rtrim($urlval,"/");
			$showurl = $actionurledit.$urlval;
			if($actionurledit!="")	
				$table.='<td><a id="btndt" class="btn btn-info" onclick="showitem(\''.$showurl.'\');" href="javascript:void(0)" role="button">Show</a></td>';
			if($actionurldelete!="")
				$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$actionurldelete.$value[$keyval].'" role="button">Delete</a></td>';
			$table.='</tr>';
		}
		$table.='</tbody>';
		$table.='</table></div>';
		return $table;
	}
	public function picklistTable($fields, $row, $keyval, $actionurledit="", $actionurldelete=""){
		
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		$table = '<div class="table-responsive"><table id="dtbl" class="table table-striped table-bordered" cellspacing="0" width="100%">';
		$table.='<thead>';
		$table.='<tr>';
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
		if($actionurledit!="")
			$table.='<th>Edit</th>';
		if($actionurldelete!="")
			$table.='<th>Delete</th>';
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>';
		
		foreach($row as $key=>$value){
			$table.='<tr>';
			foreach($value as $str)
				
				if($keyval==array_search($str, $value))
					$table.='<td><a href="javascript:void(0)" onclick="post_value($(this).text(),\''.$keyval.'\');">'.htmlentities($str).'</a></td>';
				else{
					$keyofval =  array_search($str, $value); 
					switch ($keyofval){
						case "xqty":
							$str = number_format(floatval($str), 0, '.', '');
							break;
						case "xbal":
							$str = number_format(floatval($str), 0, '.', '');
							break;
						case "xtotcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xstdcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xstdprice":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xvatpct":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xvatamt":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xdisc":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xsalesprice":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;			
						default:
							$str = $str;
				}
				$table.='<td>'.htmlentities($str).'</td>';
				}
					
			if($actionurledit!="")	
				$table.='<td><a class="btn btn-info" id="'.$value[$keyval].'"  href="'.$actionurledit.$value[$keyval].'" role="button">Show</a></td>';
			if($actionurldelete!="")
				$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$actionurldelete.$value[$keyval].'" role="button">Delete</a></td>';;
			$table.='</tr>';
		}
		$table.='</tbody>';
		$table.='</table></div>';
		
		return $table;	
	}
	public function picklistTable2($fields, $row, $keyval, $actionurledit="", $actionurldelete="",$id){
		
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		$table = '<div class="table-responsive"><table id="dtbl" class="table table-striped table-bordered" cellspacing="0" width="100%">';
		$table.='<thead>';
		$table.='<tr>';
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
		if($actionurledit!="")
			$table.='<th>Edit</th>';
		if($actionurldelete!="")
			$table.='<th>Delete</th>';
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>';
		
		foreach($row as $key=>$value){
			$table.='<tr>';
			foreach($value as $str)
				
				if($keyval==array_search($str, $value))
					$table.='<td><a href="javascript:void(0)" onclick="post_value($(this).text(),\''.$id.'\');">'.htmlentities($str).'</a></td>';
				else{
					$keyofval =  array_search($str, $value); 
					switch ($keyofval){
						case "xqty":
							$str = number_format(floatval($str), 0, '.', '');
							break;
						case "xbal":
							$str = number_format(floatval($str), 0, '.', '');
							break;
						case "xtotcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xstdcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xstdprice":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xvatpct":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xvatamt":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xdisc":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xsalesprice":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;			
						default:
							$str = $str;
				}
				$table.='<td>'.htmlentities($str).'</td>';
				}
					
			if($actionurledit!="")	
				$table.='<td><a class="btn btn-info" id="'.$value[$keyval].'"  href="'.$actionurledit.$value[$keyval].'" role="button">Show</a></td>';
			if($actionurldelete!="")
				$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$actionurldelete.$value[$keyval].'" role="button">Delete</a></td>';;
			$table.='</tr>';
		}
		$table.='</tbody>';
		$table.='</table></div>';
		
		return $table;	
	}
	
	
	/*
	* custom table not rendered yet
	**/
	public function myTable($fields, $row, $keyval, $actionurledit="", $actionurldelete=""){
		
		$field = array();
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		
		$table = '<div class="table-responsive"><table id="mytbl" class="table table-bordered table-striped" style="width:100%">';
		$table.='<thead>';
		$table.='<tr>';
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
		if($actionurledit!="")
			$table.='<th>Edit</th>';
		if($actionurldelete!="")
			$table.='<th>Delete</th>';
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>';
		foreach($row as $key=>$value){
			$table.='<tr>';
			foreach($value as $str){
				$keyofval =  array_search($str, $value); 
					switch ($keyofval){
						case "xqty":
							$str = $str;
							break;
						case "xbal":
							$str = number_format(floatval($str), 0, '.', '');
							break;
						case "xtotcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xstdcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xstdprice":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xvatpct":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xvatamt":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xdisc":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xsalesprice":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xtotal":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;		
						default:
							$str = $str;
				}
				$table.='<td>'.htmlentities($str).'</td>';
			}
			if($actionurledit!="")	
				$table.='<td><a class="btn btn-info" id="btnshow" href="'.$actionurledit.$value[$keyval].'" role="button">Show</a></td>';
			if($actionurldelete!="")
				$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$actionurldelete.$value[$keyval].'" role="button">Delete</a></td>';
			$table.='</tr>';
		}
		$table.='</tbody>';
		$table.='</table></div>';
		return $table;
	}
	
	public function myTable2($type="",$fields, $row, $keyval, $actionurledit="", $actionurldelete="", $billtotal=""){
		
		$field = array();
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		
		$total = 0.00;
		$table = '<div class="table-responsive"><table id="mytbl" class="table table-bordered table-striped" style="width:100%">';
		$table.='<thead style="font-size: 11px">';
		$table.='<tr>';
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
		if($actionurledit!="")
			$table.='<th>Edit</th>';
		if($actionurldelete!="")
			$table.='<th>Delete</th>';
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>';
		foreach($row as $key=>$value){
			$table.='<tr>';
			foreach($value as $str){
				$keyofval =  array_search($str, $value); 
					switch ($keyofval){
						case "xqty":
							$str = $str;
							break;
						case "xbal":
							$str = number_format(floatval($str), 0, '.', '');
							break;
						case "xtotcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xstdcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xstdprice":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xvatpct":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xvatamt":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xdisc":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xsalesprice":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xtotal":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							$total+=$str;
							//echo $str;
							break;
						case "xamount":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							$total+=$str;
							break;		
						default:
							$str = $str;
				}
				$table.='<td>'.htmlentities($str).'</td>';
			}
			if($actionurledit!="")	
				$table.='<td><a class="btn btn-info" id="btnshow" href="'.$actionurledit.$value[$keyval].'" role="button">Show</a></td>';
			if($actionurldelete!="")
				$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$actionurldelete.$value[$keyval].'" role="button">Delete</a></td>';
			$table.='</tr>';
		}
		if($type=="tada"){
			$table.='<tr><td colspan="6" style="text-align:right">Total</td><td>'.number_format(floatval($billtotal), $this->decimals, '.', '').'</td></tr>';
		}elseif($type=="wopay"){
		$table.='<tr><td colspan="3" style="text-align:right">Total</td><td>'.number_format(floatval($billtotal), $this->decimals, '.', '').'</td></tr>';
		}else{
			$table.='<tr><td colspan="7" style="text-align:right">Total</td><td>'.number_format(floatval($billtotal), $this->decimals, '.', '').'</td><td></td></tr>';
		}
		$table.='</tbody>';
		$table.='</table></div>';
		return $table;
	}
	
	
	public function myTableExt($fields, $row, $keyval, $actionurledit="", $actionurldelete=""){
		
		$field = array();
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		
		$table = '<table class="table table-bordered table-striped" style="width:100%">';
		$table.='<thead>';
		$table.='<tr>';
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
		if($actionurledit!="")
			$table.='<th>Edit</th>';
		if($actionurldelete!="")
			$table.='<th>Delete</th>';
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>';
		foreach($row as $key=>$value){
			$table.='<tr>';
			foreach($value as $str){
				$keyofval =  array_search($str, $value); 
					switch ($keyofval){
						case "xqty":
							$str = number_format(floatval($str), 0, '.', '');
							break;
						case "xbal":
							$str = number_format(floatval($str), 0, '.', '');
							break;
						case "xtotcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xstdcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xstdprice":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xvat":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;	
						case "xvatpct":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xrate":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;	
						case "xvatamt":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xtotvat":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;	
						case "xdisc":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xtotdisc":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;	
						case "xsalesprice":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xsalestotal":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;			
						default:
							$str = $str;
				}
				$table.='<td>'.htmlentities($str).'</td>';
			}
			
			$keyedit = "";
				for($i=0; $i<count($keyval); $i++){
					$keyedit .= $value[$keyval[$i]]."/";
					
				}
			$keyedit = rtrim($keyedit, '/');
			
			if($actionurledit!="")
				$table.='<td><a class="btn btn-info" href="'.$actionurledit.$keyedit.'" role="button">Show</a></td>';
			
			if($actionurldelete!="")
				$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$actionurldelete.$keyedit.'" role="button">Delete</a></td>';
			$table.='</tr>';
		}
		$table.='</tbody>';

		$table.='</table>';
		return $table;
	}
	
	public function InvoiceTableExt($fields, $row, $keyval, $actionurledit="", $actionurldelete=""){
		
		$field = array();
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		$vat = 0.00;
		$disc = 0.00;
		$gtotal = 0.00;
		$table = '<table class="table table-bordered table-striped" style="width:100%; font-size:12px">';
		$table.='<thead>';
		$table.='<tr>';
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
		if($actionurledit!="")
			$table.='<th>Edit</th>';
		if($actionurldelete!="")
			$table.='<th>X</th>';
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>';
		for($i = 0; $i < count($row); $i++){
			$vat += $row[$i]['xpoint'];
			$disc += $row[$i]['xdisc'];
			$gtotal += $row[$i]['xsalestotal'];
		}
			
		foreach($row as $key=>$value){
			$table.='<tr>';
			
			
			foreach($value as $str){
				$keyofval =  array_search($str, $value); 
					switch ($keyofval){
						case "xqty":
							$str = number_format(floatval($str), 0, '.', '');
							break;
						case "xbal":
							$str = number_format(floatval($str), 0, '.', '');
							break;
						case "xtotcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xstdcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xstdprice":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xvat":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;	
						case "xvatpct":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xvatamt":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xtotvat":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;	
						case "xdisc":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xtotdisc":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;	
						case "xsalesprice":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xsalestotal":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
													
						default:
							$str = $str;
				}
				
				if($keyofval!="ximsenum")
					$table.='<td>'.htmlentities($str).'</td>';
			}
			
			$keyedit = "";
				for($i=0; $i<count($keyval); $i++){
					$keyedit .= $value[$keyval[$i]]."/";
					
				}
			$keyedit = rtrim($keyedit, '/');
			
			if($actionurledit!="")
				$table.='<td><a class="btn btn-info" href="'.$actionurledit.$keyedit.'" role="button">E</a></td>';
			
			if($actionurldelete!="")
				$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$actionurldelete.$keyedit.'" role="button">X</a></td>';
			$table.='</tr>';
		}
		
		$table.='</tbody>';
		$table.='<tfoot>';
		$table.='<tr>';
		$table.='<td><input id="gtotal" type="hidden" value="'.$gtotal.'"></td><td></td><td></td><td><strong>Total</strong></td><td><strong>'.$disc.'</strong></td><td><strong>'.$vat.'</strong></td><td><strong>'.$gtotal.'</strong></td>';
		$table.='</tr>';
		$table.='</tfoot>';
		$table.='</table>';
		return $table;
	}
	//used only for role management
	public function arrayTable($head, $row, $action,$actionurl,$roletoedit="", $usermenus=array()){
		$table='<form name="froleform" action="'.$actionurl.'" method="post">';
		if($roletoedit<>"")
			$table.='<input type="text" class="form-control input-sm" name="zrole" value="'.$roletoedit.'" placeholder="Enter Role Name" readonly>';
		else
			$table.='<input type="text" class="form-control input-sm" name="zrole" placeholder="Enter Role Name">';
		$table.= '<table class="table table-bordered table-striped">';
		$table.='<thead>';
		$table.='<tr>';
		$table.='<th>Select</th>';
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
		
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>';
		foreach($row as $key=>$value){
			$chk="";
			foreach($usermenus as $kermenu=>$valuemenu){
				//print_r($valuemenu); die;
				if($valuemenu["xsubmenu"]==$value["submenu"]){
					$chk="checked";
				}
			}
			$table.='<tr>';
			$table.='<td><input type="checkbox" id="'.$value["submenu"].'" name="checkbox[]" value="'.$value["submenu"].'" '.$chk.'></td>';
			foreach($value as $str)
				$table.='<td>'.$str.'</td>';
			
			$table.='</tr>';
		}
		$table.='</tbody>';
		$table.='</table>';
		if($action=="Update Role")
			$table.='<a class="btn btn-success" href="'.URL.'role" role="button">New</a>';
		$table.='&nbsp;<input type="submit" class="btn btn-primary" onclick="return confirm(\'Are you sure?\');" value="'.$action.'">';
		
		$table.='</form>';
		
		return $table;
	}
}
