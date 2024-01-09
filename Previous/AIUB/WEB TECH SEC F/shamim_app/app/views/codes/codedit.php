
    <div class="header clearfix">		
		
           
         <form class="form-horizontal" name="codeform" action="<?php echo URL; ?>code/edit" method="post">
             <div class="panel panel-info">
               
				<div class="panel-heading">
						  <div style="text-align: center;">
							   <strong>Update <?php echo $this->codetype; ?></strong> 
						  </div>
						  <div class="btn-group" role="group" aria-label="...">
								  <button type="button" onclick="window.history.back();" class="btn btn-success"><span class="glyphicon glyphicon-leaf"></span>&nbsp;Back</button>
								  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span>&nbsp;Update</button>
							</div>
					</div>
					<div class="panel-body">
						  <div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Code</label>
								<div class="col-sm-4">
									<input type="text" class="form-control input-sm" id="xcode" name="xcode" value="<?php echo $this->xcode; ?>" id="" required minlength="2" maxlength="50">
								</div>
									<label for="inputEmail3" class="col-sm-2 control-label">Description</label>
								<div class="col-sm-4">
									<input type="text" class="form-control input-sm" id="xdesc" name="xdesc" value="<?php echo $this->xdesc; ?>" id="inputEmail3" minlength="2" maxlength="150">
									<input type="hidden" name="xcodetype" value="<?php echo $this->codetype; ?>">
									<input type="hidden" name="codeid" value="<?php echo $this->xcode; ?>">
								</div>
						  </div>
						  
					  </div>

				</div>
              </form>
            </div>
            
        
        