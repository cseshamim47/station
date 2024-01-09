<head>
	<style>
		.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
			    padding: 2px;
			    line-height: 1.42857143;
			    vertical-align: top;
			    border-top: 1px solid #ddd;
			}
		td {
			border: 1px black solid;
			padding: 5px;
		}
		.rotate {
		text-align: center;
		white-space: nowrap;
		vertical-align: middle;
		width: 1.5em;
		height: 4.3em;
		}
		.rotate div {
			-moz-transform: rotate(-90.0deg);  /* FF3.5+ */
			-o-transform: rotate(-90.0deg);  /* Opera 10.5 */
		-webkit-transform: rotate(-90.0deg);  /* Saf3.1+, Chrome */
					filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);  /* IE6,IE7 */
				-ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)"; /* IE8 */
				margin-left: -10em;
				margin-right: -10em;
				margin-top: 3px;
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
		<li class="active">Employee Attendance</li>
	</ul>
	<div id="printdiv">
		<?php echo $this->atttable ?>
	</div>
</div>