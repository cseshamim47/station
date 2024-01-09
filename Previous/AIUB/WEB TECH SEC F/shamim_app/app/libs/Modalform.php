<?php 
// Creats form based on array data
class Modalform{
	
	
	public function createForm($fields, $action, $values){
		
		$decimals = Session::get("sbizdecimals");
		//form started
		//print_r($fields);die;
		
		
		//<!-- Default bootstrap modal example -->
			$form .= '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="exampleModalLabel">Detail Update</h4>
				  </div>
				  <div class="modal-body">';
					$form .='<form id="modalform" action="'. $action .'" method="POST">';
					$form .= '<input type="hidden" id="txnnum" name="txnnum" value="">';
					$form .= '<input type="hidden" id="txnrow" name="txnrow" value="">';
					$form .= '<table class="table table-bordered table-hover">';
				        
						$form .= '<tbody>';
						$form .= '<div class="form-group">';
						foreach($fields as $key=>$value){
							
						$form .= '<tr><td>';	
						
						$basekey = explode('-',$key);
						$inputname=$basekey[0];
						$inputtype=$basekey[1];
						$selectoptions=explode('_',$basekey[1]);
						
						$lblandvalidate = explode('_',$value);
						$form .= '<label for="'.$inputname.'" class="col-sm-4 control-label">'.$lblandvalidate[0].'</label>';
						//input field
						//text type 
						if($selectoptions[0]=="text"){
							$textid = $inputname;
							$textval=$values[$inputname];
							$countselect=count($selectoptions);
								if ($countselect>1){
									if($selectoptions[1]=="number")
										$textval = number_format($values[$inputname], $decimals);
									else if($selectoptions[1]=="digit")
										$textval = number_format($values[$inputname]);
									$textid = $selectoptions[1];
								}
							$form .= '<div>';
							$form .= '<input type="text" class="form-control input-sm" id="'.$textid.'" name="'.$inputname.'" value="'. $textval .'" '. $lblandvalidate[1] .' >';
						}
						
						if($selectoptions[0]=="password"){								
							$form .= '<div>';
							if($inputname=="xconfirm")
								$form .= '<input type="password" class="form-control input-sm" id="'.$inputname.'" name="'.$inputname.'" value="" '. $lblandvalidate[1] .' >';
							else
								$form .= '<input type="password" class="form-control input-sm" id="'.$inputname.'" name="'.$inputname.'" value="'. $values[$inputname] .'" '. $lblandvalidate[1] .' >';
						}
						
						if($selectoptions[0]=="group"){							
							$form .= '<div>';
							$form .='<div class="input-group">';
							$form .= '<input type="text" class="form-control input-sm" id="'.$inputname.'" name="'.$inputname.'" value="'. $values[$inputname] .'" '. $lblandvalidate[1] .'>';
								$form .='<span class="input-group-btn">';
								  $form .='<button class="btn btn-default input-sm" type="button" title="Pick list for '.$inputname.'" onClick="popupCenter(\''.$selectoptions[1].'\', \'Item List\', 750, 450);">';
									  $form .='<span class="glyphicon glyphicon-file" aria-hidden="true"></span>';
								  $form .='</button>';
								$form .='</span>';
							$form .='</div>';
						}
						//date picker
						if($selectoptions[0]=="datepicker"){
							$form .= '<div>';
							$form .= '<div class="datepicker input-group date " >';
							$form .= '<input type="text" class="form-control" name="'.$inputname.'" value="'. $values[$inputname] .'" readonly/>';
							$form .= '<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									  </div>';										
						}
						
						
						//select options
						if($selectoptions[0]=="select"){ 
							$form .= '<div class="jqueryselect">';
							$selectid = "codeselect";
							if($inputname=="prefix"){
								$selectid = "prefixcode";
								$form .= '<select class="btn btn-default input-sm" id="'.$selectid.'" name="'.$inputname.'"></select>';
								$countselect=count($selectoptions);
								if ($countselect>1){
									for($x=1; $x<$countselect; $x++){ 
										$form .= '<input type="hidden" id="codetype" value="'.$selectoptions[$x].'">';//for jquery for request code type 
										
									}										
								}
							}else{
							$form .= '<select class="form-control input-sm" id="'.$selectid.'" name="'.$inputname.'"><option value="'. $values[$inputname] .'">'. $values[$inputname] .'</option></select>';
								$countselect=count($selectoptions);
								if ($countselect>1){
									for($x=1; $x<$countselect; $x++){ 
										$form .= '<input type="hidden" id="codetype" value="'.$selectoptions[$x].'">';//for jquery for request code type 
										
									}										
								}
							}
								//$form .='<option>'.$.'</option>';
								//$form .='';
						}
						
						//radio
						if($selectoptions[0]=="radio"){
							$form .= '<div>';
								$countselect=count($selectoptions);
								if ($countselect>1){
									$form .= '<div class="radio">';
									for($x=1; $x<$countselect; $x++){
											$form .= '<label>';
											if($selectoptions[$x]==$values[$inputname])
												$form .= '<input type="radio" name="'.$inputname.'" id="'.$inputname.'" value="'. $selectoptions[$x] .'" checked>';
											else
												$form .= '<input type="radio" name="'.$inputname.'" id="'.$inputname.'" value="'. $selectoptions[$x] .'">';
												$form .= $selectoptions[$x];
											$form .= '</label>&nbsp;';
									}
									$form .= '</div>';	
								}
						}
						//checkbox
						if($selectoptions[0]=="checkbox"){
							$form .= '<div>';
								$countselect=count($selectoptions);
								if ($countselect>1){
									$form .= '<div class="clscheck" id="clscheck">';
									for($x=1; $x<$countselect; $x++){
											$form .= '<label>';
											if($selectoptions[$x]==$values[$inputname]){
												$form .= '<input type="checkbox" class="frmcheck"  id="'.$inputname.'" value="'.$selectoptions[$x].'" checked>';
												$form .= '<input type="hidden" id="checkval" name="'.$inputname.'" value="'.$selectoptions[$x].'">';
											}
											else{
												$form .= '<input type="checkbox" class="frmcheck" id="'.$inputname.'" value="'.$values[$inputname].'">';
												$form .= '<input type="hidden" id="checkval" name="'.$inputname.'" value="'.$selectoptions[$x].'">';
											}												
											$form .= '</label>';
									}
									$form .= '</div>';	
								}
						}
						$form .= '</div>';
						$form .='</td></tr>';
						}
						$form .= '</div></tbody></table>';
						
			$form .='		</form>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button id="btnrowupdate" type="submit" class="btn btn-primary">Update</button>
							  </div>
							</div>
						  </div>
						</div>';
					
		
		return $form;
	}
	
	
}