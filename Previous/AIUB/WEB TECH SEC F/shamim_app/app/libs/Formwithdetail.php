<?php 
// Creats form based on array data
class Formwithdetail{
	
	private $formname = "";
	private $result = "";
	private $btn = array();
	//constructor intialize form name and if any dml result found
	public function __construct($formname,$btn, $result=""){
		$this->formname = $formname;
		$this->result = $result;
		$this->btn = $btn;
	}
	
	/*
	* $fields is array of fields, descriptions and data eg:
	*					$fields = array(array(  //for text inpu,t xcode is dbfield sperated by '-' with text as input type. number of data is the number of column in a form. 
	*						"xcode-text"=>"Code",
	*						"xdesc-text"=>"Description"
	*						),
	*					array(  //for select input, xcat is dbfield sperated by '-' with select as input type. next seperated by '_' is data optional.
	*						"xcodealt-text"=>"Alternate Code",
	*						"xcat-select_Electronics_Beverage"=>"Category"
	*						),
	*					array(   //for radio input, xbatchtype is dbfield sperated by '-' with radio as input type. next seperated by '_' is data mandetory.
	*						"xbatchtype-radio_Yes_No"=>"Mandetory Bactch",
	*						"xdept-select"=>"Department"
	*						),
	*					array( //for radio input, xbatchtype is dbfield sperated by '-' with radio as input type. next seperated by '_' is data mandetory.
	*						"zactive-checkbox_1"=>"Active?",
	*						"xbrand-select"=>"Brand"
	*						),
	*					array( //for textarea input, xlong is dbfield sperated by '-' with textarea as input type. number of data is the number of column in a form.
	*						"xlong-textarea"=>"Long Description"
	*						),
	*					array( //for datepicker input, xdate is dbfield sperated by '-' with datepicker as input type. number of data is the number of column in a form.
	*						"xdate-datepicker"=>"Date"
	*						)
	*					);
	*	
	* $action is the form action url. mandetory.
	* $type is for edit or save form. shows button text.
	**/
	public function createForm($fields, $action, $type, $values, $detail, $showurl=""){
		
		$decimals = Session::get("sbizdecimals");
		//form started
		//print_r($fields);die;
		$form = '<form class="form-horizontal" name="dynamicfrm" id="dynamicfrm" action="'.$action.'" method="post">';
		//panel start
			$form .= '<div class="panel panel-info">';
				//panel heading includes header text and button
				$form .= '<div class="panel-heading">';
					//header text
					$form .= '<div style="text-align: center;">';
						$form .='<input type="hidden" id="decimal" value="'.$decimals.'">'; 
						$form .= '<strong>Create '.$this->formname.'</strong>'; 
					$form .= '</div>';
					$form .= '<div style="text-align: center; color: red;">';
						$form .= '<strong>'.$this->result.'</strong>'; 
					$form .= '</div>';
					//submit button
					$form .= '<div class="btn-group" role="group">';
						foreach($this->btn as $key=>$value){
							$form .= '<a href="'.$value.'" id="cls" class="btn btn-success"><span class="glyphicon glyphicon-leaf"></span>&nbsp;'.$key.'</a>';
						} 
						$form .= '<button type="submit" onclick="return confirm(\'Are you sure?\');" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span>&nbsp;'.$type.'</button>';
						$form .= '<a href="javascript:void(0)" id="btnshow" onclick="showPost(\''.$showurl.'\');" class="btn btn-info"><span class="glyphicon glyphicon-save"></span>&nbsp;Show</a>';
					$form .= '</div>';
				$form .= '</div>';//panel head ends
				//panel body started
				$form .= '<div class="panel-body">';$x=0;
					//row div 
					//print_r($fields);die;
					for($i=0; $i<count($fields); $i++){
					$form .= '<div class="form-group">';
						foreach($fields[$i] as $key=>$value){
						$basekey = explode('-',$key);
						$inputname=$basekey[0];
						$inputtype=$basekey[1];
						$selectoptions=explode('_',$basekey[1]);
						
						$lblandvalidate = explode('_',$value);
						
												
						//field label
						$form .= '<label for="inputEmail3" class="col-sm-2 control-label">'.$lblandvalidate[0].'</label>';
						
												
						//input field
						//text type 
						if($selectoptions[0]=="text"){
							$textval=$values[$inputname];
							$countselect=count($selectoptions);
								if ($countselect>1){
									if($selectoptions[1]=="number")
										$textval = number_format($values[$inputname], $decimals);
									else if($selectoptions[1]=="digit")
										$textval = number_format($values[$inputname]);
									
								}
							$form .= '<div class="col-sm-4">';
							$form .= '<input type="'.$inputtype.'" class="form-control input-sm" id="'.$inputname.'" name="'.$inputname.'" value="'. $textval .'" '. $lblandvalidate[1] .' >';
						}
						
						if($selectoptions[0]=="password"){								
							$form .= '<div class="col-sm-4">';
							if($inputname=="xconfirm")
								$form .= '<input type="password" class="form-control input-sm" id="'.$inputname.'" name="'.$inputname.'" value="" '. $lblandvalidate[1] .' >';
							else
								$form .= '<input type="password" class="form-control input-sm" id="'.$inputname.'" name="'.$inputname.'" value="'. $values[$inputname] .'" '. $lblandvalidate[1] .' >';
						}
						
						if($selectoptions[0]=="group"){							
							$form .= '<div class="col-sm-4">';
							$form .='<div class="input-group">';
							$form .= '<input type="text" class="form-control input-sm" id="'.$inputname.'" name="'.$inputname.'" value="'. $values[$inputname] .'" '. $lblandvalidate[1] .'>';
								$form .='<span class="input-group-btn">';
								  $form .='<button class="btn btn-default input-sm" type="button" title="Pick list for suppliers" onClick="popupCenter(\''.$selectoptions[1].'\', \'Item List\', 750, 450);">';
									  $form .='<span class="glyphicon glyphicon-file" aria-hidden="true"></span>';
								  $form .='</button>';
								$form .='</span>';
							$form .='</div>';
						}
						//date picker
						if($selectoptions[0]=="datepicker"){
							$form .= '<div class="col-sm-4">';
							$form .= '<div class="datepicker input-group date " >';
							$form .= '<input type="text" class="form-control" name="'.$inputname.'" value="'. $values[$inputname] .'" readonly/>';
							$form .= '<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									  </div>';										
						}
						//textarea
						if($selectoptions[0]=="textarea"){
							$form .= '<div class="col-sm-10">';
							$form .= '<textarea class="form-control error" rows="4" id="'.$inputname.'" name="'.$inputname.'" '. $lblandvalidate[1] .'>'. $values[$inputname] .'</textarea>';
						}
						
						//select options
						if($selectoptions[0]=="select"){ 
							$form .= '<div class="jqueryselect col-sm-4" id="">';
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
							$form .= '<div class="col-sm-4">';
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
							$form .= '<div class="col-sm-4">';
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
						}
					$form .= '</div>';//row div ends
					}
					$form .= '<div>';
						
						$form .= '<table class="table table-bordered table-hover">
                                                    <thead><th>No</td>';
													
													foreach($detail as $key=>$value){
														$head = explode('_',$value);
                                             $form .= ' <th>'.$head[0].'</th>';
													}
                                                       $form .= '<th><input type="button" class="btn btn-primary" value="+" id="add"></th>                                                        
                                                    </thead>
                                                    <tbody class="detail">';
                                                $form .='<tr>';
                                                        $form .='<td class="no">1</td>';
														foreach($detail as $key=>$value){
															$form .='<td>';
															$basekey = explode('-',$key);
															$inputname=$basekey[0];
															$inputtype=$basekey[1];
															$selectoptions=explode('_',$basekey[1]);
															
															$lblandvalidate = explode('_',$value);
						
												
						//field label
						
						
												
						//input field
						//text type 
						if($selectoptions[0]=="text"){
							$textval=$values[$inputname];
							$countselect=count($selectoptions);
								if ($countselect>1){
									if($selectoptions[1]=="number")
										$textval = number_format($values[$inputname], $decimals);
									else if($selectoptions[1]=="digit")
										$textval = number_format($values[$inputname]);
									
								}
							
							$form .= '<input type="text" class="form-control input-sm '.$inputname.'" id="'.$inputname.'" name="'.$inputname.'[]" value="'. $textval .'" '. $lblandvalidate[1] .' >';
							
						}
						
						if($selectoptions[0]=="password"){								
							
							if($inputname=="xconfirm")
								$form .= '<input type="password" class="form-control input-sm" id="'.$inputname.'" name="'.$inputname.'[]" value="" '. $lblandvalidate[1] .' >';
							else
								$form .= '<input type="password" class="form-control input-sm" id="'.$inputname.'" name="'.$inputname.'[]" value="'. $values[$inputname] .'" '. $lblandvalidate[1] .' >';
						}
						
						if($selectoptions[0]=="group"){							
							
							$form .='<div class="input-group">';
							$form .= '<input type="text" class="form-control input-sm" id="'.$inputname.'" name="'.$inputname.'[]" value="'. $values[$inputname] .'" '. $lblandvalidate[1] .'>';
								$form .='<span class="input-group-btn">';
								  $form .='<button class="btn btn-default input-sm" type="button" title="Pick list for suppliers" onClick="popupCenter(\''.$selectoptions[1].'\', \'Item List\', 750, 450);">';
									  $form .='<span class="glyphicon glyphicon-file" aria-hidden="true"></span>';
								  $form .='</button>';
								$form .='</span>';
							$form .='</div>';
						}
						//date picker
						if($selectoptions[0]=="datepicker"){
							
							$form .= '<div class="datepicker input-group date " >';
							$form .= '<input type="text" class="form-control" name="'.$inputname.'[]" value="'. $values[$inputname] .'" readonly/>';
							$form .= '<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									  </div>';										
						}
												
						//select options
						if($selectoptions[0]=="select"){ 
							$form .= '<div class="jqueryselect" id="">';
							$selectid = "codeselect";
							if($inputname=="prefix"){
								$selectid = "prefixcode";
								$form .= '<select class="btn btn-default input-sm" id="'.$selectid.'" name="'.$inputname.'[]"></select>';
								$countselect=count($selectoptions);
								if ($countselect>1){
									for($x=1; $x<$countselect; $x++){ 
										$form .= '<input type="hidden" id="codetype" value="'.$selectoptions[$x].'">';//for jquery for request code type 
										
									}										
								}
							}else{
							$form .= '<select class="form-control input-sm" id="'.$selectid.'" name="'.$inputname.'[]"><option value="'. $values[$inputname] .'">'. $values[$inputname] .'</option></select>';
								$countselect=count($selectoptions);
								if ($countselect>1){
									for($x=1; $x<$countselect; $x++){ 
										$form .= '<input type="hidden" id="codetype" value="'.$selectoptions[$x].'">';//for jquery for request code type 
										
									}										
								}
							}
								//$form .='<option>'.$.'</option>';
								//$form .='';
						$form .= '</div>';		
						}
						
						//radio
						if($selectoptions[0]=="radio"){
							
								$countselect=count($selectoptions);
								if ($countselect>1){
									$form .= '<div class="radio">';
									for($x=1; $x<$countselect; $x++){
											$form .= '<label>';
											if($selectoptions[$x]==$values[$inputname])
												$form .= '<input type="radio" name="'.$inputname.'[]" id="'.$inputname.'" value="'. $selectoptions[$x] .'" checked>';
											else
												$form .= '<input type="radio" name="'.$inputname.'[]" id="'.$inputname.'" value="'. $selectoptions[$x] .'">';
												$form .= $selectoptions[$x];
											$form .= '</label>&nbsp;';
									}
									$form .= '</div>';	
								}
						}
						//checkbox
						if($selectoptions[0]=="checkbox"){
							
								$countselect=count($selectoptions);
								if ($countselect>1){
									$form .= '<div class="clscheck" id="clscheck">';
									for($x=1; $x<$countselect; $x++){
											$form .= '<label>';
											if($selectoptions[$x]==$values[$inputname]){
												$form .= '<input type="checkbox" class="frmcheck"  id="'.$inputname.'" value="'.$selectoptions[$x].'" checked>';
												$form .= '<input type="hidden" id="checkval" name="'.$inputname.'[]" value="'.$selectoptions[$x].'">';
											}
											else{
												$form .= '<input type="checkbox" class="frmcheck" id="'.$inputname.'" value="'.$values[$inputname].'">';
												$form .= '<input type="hidden" id="checkval" name="'.$inputname.'[]" value="'.$selectoptions[$x].'">';
											}												
											$form .= '</label>';
									}
									$form .= '</div>';	
								}
						}
                                                        $form .='</td>';
														}
                                                        $form .='    <td><a href="#" class="remove">Delete</a></td>';
                                                $form .='</tr>';
                                                $form .='</tbody>
                                                    <tfoot>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
														<th></th>
                                                        <th style="text-align: center;" class="total">0<b>BDT</b></th>
                                                    </tfoot>
                                                </table>';
												
					$form .='</div>';//detail table end div
					
				$form .= '</div>';//panel body ends
			$form .= '</div>';//panel ends
		$form .= '</form>';//form ends
		
		return $form;
	}
}