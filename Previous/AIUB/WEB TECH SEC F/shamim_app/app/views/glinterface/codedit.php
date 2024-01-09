
    <div class="header clearfix">		
		
           
         <form class="form-horizontal" name="codeform" action="<?php echo URL; ?>glinterface/edit" method="post">
             <div class="panel panel-info">
               
				<div class="panel-heading">
						  <div style="text-align: center;">
							   <strong>Update <?php echo $this->codetype; ?></strong> 
						  </div>
						  <div class="btn-group" role="group" aria-label="...">
								  <button type="button" onclick="window.history.back();" id="cls" class="btn btn-success"><span class="glyphicon glyphicon-leaf"></span>&nbsp;Back</button>
								  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span>&nbsp;Update</button>
							</div>
					</div>
					 <div class="panel-body">
                                      <div>
                                          <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">Account Code</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control input-sm" id="xacc" name="xacc" value="<?php echo $this->xacc; ?>" required minlength="2" maxlength="50">
                                                </div>                                               
                                                    <label for="inputEmail3" class="col-sm-2 control-label">Formula</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control input-sm" id="xformula" name="xformula" value="<?php echo $this->xformula; ?>" maxlength="150" placeholder="">
                                                </div> 
                                             </div>
                                                  
                                                <label for="inputEmail3" class="col-sm-2 control-label">Event</label>
                                                <div class="col-sm-4">
                                                  <select class="input-sm" name="xaction">
                                                  <option selected="<?php echo $this->xaction;?>"><?php echo $this->xaction;?></option>
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
            
          
        