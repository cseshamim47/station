	<style>
        table .collapse.in {
            display:table-row;
        }
    </style>
	<?php echo $this->dynform;?>

	<div class="panel panel-info">
            <div class="panel-heading">
                <div style="text-align: center;">
                    <h4><strong>Requisition Items List</strong></h4> 
                </div>
			</div>
            <div class="panel-body" >
				<?php echo $this->table;?>
			</div>
            <!-- <table class="table table-responsive table-hover">
  <thead>
        <tr><th>Item Code</th><th>Item Name</th><th>Warehouse</th><th>Qty</th></tr>
    </thead>
    <tbody>
        <tr class="clickable" data-toggle="collapse" id="row1" data-target=".row1">
            <td><i class="glyphicon glyphicon-plus"></i></td>
            <td><b>Requisition No : SQ-00001</b></td>
          	<td></td>  
            <td></td>
        </tr>
        <tr class="collapse row1">
            <td>EXP0001</td>
            <td>Item Name 1</td>
          	<td>Dhaka Top</td>  
            <td>10</td>
        </tr>
        <tr class="collapse row1">
            <td>EXP0002</td>
            <td>Item Name 2</td>
          	<td>Mohanogor</td>  
            <td>10</td>
        </tr>
        <tr class="clickable" data-toggle="collapse" id="row2" data-target=".row2">
            <td><i class="glyphicon glyphicon-plus"></i></td>
            <td>data</td>
          	<td>data</td>  
            <td>data</td>
        </tr>
        <tr class="collapse row2">
            <td>- child row</td>
            <td>data 2</td>
          	<td>data 2</td>  
            <td>data 2</td>
        </tr>
        <tr class="collapse row2">
            <td>- child row</td>
            <td>data 2</td>
          	<td>data 2</td>  
            <td>data 2</td>
        </tr>
    </tbody>
</table> -->
        </div>
	
	