    <div class="header clearfix">		
		
         
         <form class="form-horizontal" id="codeform" action="<?php echo URL; ?>glinterface/create" method="post">
            <div class="panel panel-info">   
               
                        <div class="panel-heading">
                                  <div style="text-align: center;">
                                       <strong>Create <?php echo $this->codetype; ?></strong> 
                                  </div>
								  <div style="text-align: center; color: red;">
                                       <strong><?php 
													if(isset($this->message)){
														echo '<p>'.$this->message.'</p>';
													}
												?></strong> 
                                  </div>
                  <div style="text-align: right; color: red;">
                                       <strong>Formula:<br/> ta = Total Amount<br/>tt = Total tax<br/>
                                        id =Item Discount <br/> fd = Fixed discount 
                        </strong> 
                                  </div>                
                                  <div class="btn-group" role="group" aria-label="...">
                                          <button type="button" id="cls" class="btn btn-success"><span class="glyphicon glyphicon-leaf"></span>&nbsp;Clear</button>
                                          <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span>&nbsp;Save</button>
                                    </div>
                            </div>
                                    <div class="panel-body">
                                      <div>
                                          <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">Account Code</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control input-sm" id="xacc" name="xacc" value="" required minlength="2" maxlength="50">
                                                </div>                                               
                                                    <label for="inputEmail3" class="col-sm-2 control-label">Formula</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control input-sm" id="xformula" name="xformula" value="" maxlength="150" placeholder="">
                                                </div> 
                                             </div>
                                                  
                                                <label for="inputEmail3" class="col-sm-2 control-label">Event</label>
                                                <div class="col-sm-4">
                                                  <select class="btn btn-default input-sm" name="xaction">
                                                    <option>Debit</option>
                                                    <option>Credit</option>
                                                  </select>
                                                </div>    
													<input type="hidden" name="xtypeinterface" value="<?php echo $this->codetype; ?>">
                                                </div>
                                          </div>
                                          
                                     
                          
                 
             </div>
              </form>
			  
			  
			  </div>
					<div class="panel panel-success">
						<div class="panel-heading">
                                  <div style="text-align: center;">
                                       <strong><?php echo $this->codetype; ?> List</strong> 
                                  </div>
								
						</div>
						<div>
						<br />
							<?php echo $this->table; ?>
						</div>
					</div>
            
            
        