<style>
	.ex-table {
		width: 100%;
		max-width: 100%;
		margin-bottom: 20px;
	}

	.ex-table>tbody>tr>td,
	.table>tbody>tr>th,
	.table>tfoot>tr>td,
	.table>tfoot>tr>th,
	.table>thead>tr>td,
	.table>thead>tr>th {
		line-height: 1.42857;
		vertical-align: top;
		padding: 8px;
	}

	.table-bordered,
	.ex-table {
		margin-bottom: 5px;
	}

	.panel-info>.panel-heading {
		background-color: white;
		border-color: white;
	}
</style>
<div class="col-sm-12 col-md-12 main">

	<div class="panel panel-info">
		<div class="panel-heading">
			<div style="text-align: center;">
				<h4><strong>Requisition Item List</strong></h4>
			</div>
			<div class="col-md-12">
				<?php if ($this->reqmst[0]['xcomment']) { ?>
					<h4>Previous Modified details</h4>
					<div><?php echo $this->reqmst[0]['xcomment']; ?></div>
					<hr>
				<?php } ?>
				<table class="table table-bordered table-striped table-responsive" style="width:100%">
					<tr>
						<form class="form-horizontal" name="dynamicfrm" id="dynamicfrm" action="<?php echo $this->cencelUrl ?>" method="post" enctype="multipart/form-data">
							<td>
								<input class="form-control" type="text" name="comment" placeholder="Write Modification Type...." value="" width="180">
							</td>
							<td>
								<input class="btn btn-warning" type="submit" value="Modify" width="10">
							</td>
						</form>
					</tr>
				</table>
				<a class="btn btn-info" id="" href="<?php echo $this->backUrl ?>" role="button">Back</a>
				<a id="appbtn" class="btn btn-success" href="<?php echo $this->approveUrl ?>" role="button">Approve</a>
				<a id="delbtn" class="btn btn-danger" href="<?php echo $this->deleteUrl ?>" role="button">Delete</a>
			</div>
		</div>
		<div class="panel-body">
			<div style="float: right;"><button class="btn btn-primary" onclick="test();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</button></div>
			<div id="printdiv" style="text-align:center;height:10.6in;width:8.3in; margin:0 auto;padding-top:30px">
				<div class="col-md-12">
					<table class="table table-bordered">
						<tr>
							<td align="center" colspan="3"><img style="height: 94px; width: 743px;" src="<?php echo URL; ?>public/images/company_header.jpg" alt="" /></td>
						</tr>
						<tr>
							<td colspan="3" align="center"><b>Document Code: PUR/03/005</b></td>
						</tr>
						<tr>
							<td colspan="3" align="center"><b>TITLE: Store Requisition</b></td>
						</tr>
						<tr>
							<td align="center">Effective Date: 1/12/2017</td>
							<td align="center">Revision Status: 00</td>
							<td align="center">Page 1 of 1</td>
						</tr>
					</table>
					<table class="ex-table">
						<tr>
							<td align="center">Requisition No: <?php echo $this->reqnum ?></td>
							<td align="center">Type: <?php echo $this->xtype ?></td>
							<td align="center">Project: <?php echo $this->xproject ?></td>
							<td align="center">Date: <?php echo date("d/m/Y", strtotime($this->xdate)) ?></td>
						</tr>
					</table>
				</div>
				<div class="col-md-12">
					<?php echo $this->table ?>
				</div>
				<div class="col-md-12">
					<table class="table table-bordered">

						<tr>
							<?php $apparray = explode(";", $this->reqmst[0]['xemail']); ?>
							<td align="center">

								</br>
								</br>
								<span>Received By</span>
							</td>
							<td align="center">
								<?php if (!empty($this->reqmst[0]['paidby']) && $this->reqmst[0]['paidby'] != "") { ?>
									<img style="height: 50px;width: 100px;" src="<?php echo URL; ?>images/<?php echo $this->reqmst[0]['paidby'] ?>.png" alt="" />
									</br>
								<?php } else { ?>
									</br>
									</br>
								<?php } ?>
								<span>Accountant</span>
							</td>
							<td align="center">
								<img style="height: 50px;width: 100px;" src="<?php echo URL; ?>images/<?php echo $this->reqmst[0]['zemail'] ?>.png" alt="" />
								</br>
								<span>Department Executive</span>
							</td>
							<td align="center">
								<?php
								$i = 0;
								foreach ($apparray as $key => $value) {
									$signarray = explode(":", $value);
									if (!empty(trim($signarray[0], " ")) && trim($signarray[0], " ") != "Modify" && trim($signarray[0], " ") != "Delete" && trim($signarray[1], " ") == "akramuzzaman@nnsel.com") {
										$i++;
								?>
										<img style="height: 50px;width: 100px;" src="<?php echo URL; ?>images/<?php echo trim($signarray[1], " ") ?>.png" alt="" />

									<?php }
								}
								if ($i == 0) { ?>
									</br>
									</br>
								<?php } ?>
								</br>
								<span>Procurement Manager</span>
							</td>
							<td align="center">
								<?php
								$i = 0;
								foreach ($apparray as $key => $value) {
									$signarray = explode(":", $value);
									if (!empty(trim($signarray[0], " ")) && trim($signarray[0], " ") != "Modify" && trim($signarray[0], " ") != "Delete" && trim($signarray[1], " ") == "falgunimahmud@nnsel.com") {
										$i++;
								?>
										<img style="height: 50px;width: 100px;" src="<?php echo URL; ?>images/<?php echo trim($signarray[1], " ") ?>.png" alt="" />

									<?php }
								}
								if ($i == 0) { ?>
									</br>
									</br>
								<?php } ?>
								</br>
								<span>Director</span>
							</td>
						</tr>
					</table>
				</div>
				<div class="col-md-12">
					<img style="height: 94px; width: 100%;" src="<?php echo URL; ?>public/images/company_footer.jpg" alt="" />
				</div>

			</div>
		</div>
	</div>

</div>