<div class="table-responsive">
  <table id="dtbl" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Serial</th>
			<th>Employee ID</th>
			<th>Photo</th>
			<th>Name</th>
			<th>Address</th>
			<th>Mobile</th>
			<th>Email</th>
			<th>Status</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	foreach($this->getemp as $key=>$value){
		$id=$value['xfacultyid'];
	?>
		<tr>
			<td><?php echo $value['xsennum']; ?></td>
			<td><?php echo $value['xfacultyid']; ?></td>
			<td><img src="<?php echo URL;?>/images/teachers/<?php echo $value['xfacultyid']; ?>.jpg" style="height: 60px;" /></td>
			<td><?php echo $value['xname']; ?></td>
			<td><?php echo $value['xadd1'] ?></td>
			<td><?php echo $value['xmobile'] ?></td>
			<td><?php echo $value['xfacemail'] ?></td>
			<?php if($value['xactive']==1){ ?>
				<td><span class="label label-success">Active</span></td>
			<?php }else{ ?>
				<td><span class="label label-warning">Inactive</span></td>
			<?php }?>
			<td><a class="btn btn-info" role="button" href="<?php echo URL; ?>stuemployee/showfaculty/<?php echo $id; ?>">Edit</a></td>
			<td><a id="delbtn" class="btn btn-danger" role="button" href="<?php echo URL; ?>stuemployee/deletefaculty/<?php echo $id; ?>">Delete</a></td>
		</tr>
	<?php } ?>
	</tbody>
  </table>
</div>