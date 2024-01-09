<div id="divloc" style="width:100%;height:5000px">
<div>
<div class="col-sm-4">
<input type="text" class="form-control input-sm" id="user" name="user">'
</div>
<div class="col-sm-4">
<div class="datepicker input-group date " >
	<input type="text" class="form-control input-sm" id="finddate" />
	<span class="input-group-addon">
		<span class="glyphicon glyphicon-calendar"></span>
	</span>
</div>
</div>
<div class="col-sm-4">

<button id="showlocations" class="btn btn-primary">Show Locations</button>
</div>
</div>
<br>
<br>
<div class="panel panel-info">
            <div class="panel-heading">
                <div style="text-align: center;">
                    <h4><strong>Location List</strong></h4> 
                </div>
			</div>
            <div class="panel-body" >
				<?php echo $this->table;?>
			</div>
        </div>

</div>

