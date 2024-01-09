<head>
	<style>
		.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
			    padding: 2px;
			    line-height: 1.42857143;
			    vertical-align: top;
			    border-top: 1px solid #ddd;
			}
	</style>
</head>

<div class="row">
		 <div class="col-sm-12">
			<?php echo $this->dynform;?>
		</div>
</div>
<!-- <div class="panel-body" style="height: 150px" >
	<?php echo $this->atttable;?>
</div> -->
	
<div class="panel">
	<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
	<ul class="breadcrumb">
		<li class="active">Employee Leave Report</li>
	</ul>
	<div id="printdiv">
		<?php echo $this->atttable ?>
	</div>
</div>


<div style="width: 5">
	<div>
		
	</div>
</div>