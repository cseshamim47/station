    <div class="header clearfix">		
		
         
         <form class="form-horizontal" id="codeform" action="<?php echo URL; ?>code/create" method="post">
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
                                  <div class="btn-group" role="group" aria-label="...">
                                          <button type="button" id="cls" class="btn btn-success"><span class="glyphicon glyphicon-leaf"></span>&nbsp;Clear</button>
                                          <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span>&nbsp;Save</button>
                                    </div>
                            </div>
                                    <div class="panel-body">
                                          <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $this->codetype; ?></label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control input-sm" id="xcode" name="xcode" value="" required minlength="1" maxlength="50">
                                                </div>
                                                    <label for="inputEmail3" class="col-sm-2 control-label">Dependent Code</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control input-sm" id="xdesc" name="xdesc" value="" maxlength="150" placeholder="">
													<input type="hidden" name="xcodetype" value="<?php echo $this->codetype; ?>">
                                                </div>
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
            </div>
            
        