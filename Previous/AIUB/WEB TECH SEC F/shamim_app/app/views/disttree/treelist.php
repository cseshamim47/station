 		 
<div class="table-responsive">
 <table class="table">
		 <tbody>
			<tr><td colspan="4" align="center">
			<form action="<?php echo URL;?>disttree/srchlist" method="POST"><div class="col-lg-2">
				<div class="input-group">
				  <span class="input-group-btn">
					<button class="btn btn-default" type="submit">Click To Go</button>
				  </span>
				  <input type="text" class="form-control" name="srcbin" placeholder="BIN No">
				</div><!-- /input-group -->
			  </div><!-- /.col-lg-6 -->
			</form></td></tr>
			<?php if ($this->upbin>0){ ?>
			<tr><td colspan="4" align="center">
			<a href="<?php echo URL;?>disttree/treelist/<?php echo $this->upbin;?>"><img src="<?php echo URL;?>public/images/boy.png" class="img-circle"></a><br />BC-<?php echo $this->upbc;?><br /><?php echo $this->upbin;?><br /><?php echo $this->uprin;?><br /><?php echo $this->upname;?></td></tr>
			<?php }  ?>
					
			<tr><td colspan="4" align="center"><a href="<?php echo URL;?>disttree/treelist/<?php echo $this->bin;?>" data-toggle="tooltip" title="Ref. BIN: <?php echo $this->refbin;?> Ref. Name: <?php echo $this->refname;?>"><img src="<?php echo URL;?>public/images/boy.png" class="img-circle"></a><br />BC-<?php echo $this->bc;?><br /><?php echo $this->bin;?><br /><?php echo $this->rin;?><br /><?php echo $this->name;?><br /><span style="color:red"><strong>A Team Point : <?php echo "(".$this->leftcurpoint.") ".$this->leftpoint;?>&nbsp;&nbsp;&nbsp;&nbsp;B Team Point : <?php echo $this->rightpoint." (".$this->rightcurpoint.")";?></strong></span> </td></tr>
			<tr>
			<?php if ($this->leftbin>0){ ?>
				<td colspan="2" align="center"><a href="<?php echo URL;?>disttree/treelist/<?php echo $this->leftbin;?>"><img src="<?php echo URL;?>public/images/boy.png" class="img-circle"></a><br /><?php echo $this->leftbin;?><br /><?php echo $this->leftrin;?><br /><?php echo $this->leftbinname;?></td>
			<?php } else { ?>
			<td colspan="2" align="center">
					<img src="<?php echo URL;?>public/images/dimboy.png" class="img-circle"><br />0</td>
			<?php } ?>
			<?php if ($this->rightbin>0){ ?>	
				<td colspan="2" align="center"><a href="<?php echo URL;?>disttree/treelist/<?php echo $this->rightbin;?>"><img src="<?php echo URL;?>public/images/boy.png" class="img-circle"></a><br /><?php echo $this->rightbin;?><br /><?php echo $this->rightrin;?><br /><?php echo $this->rightbinname;?></td>
			<?php } else { ?>
				<td colspan="2" align="center">
					<img src="<?php echo URL;?>public/images/dimboy.png" class="img-circle"><br />0</td>
			<?php } ?>
			</tr>
			<tr>
			<?php if ($this->leftbinA>0){ ?>
				<td align="center"><a href="<?php echo URL;?>disttree/treelist/<?php echo $this->leftbinA;?>"><img src="<?php echo URL;?>public/images/boy.png" class="img-circle"></a><br /><?php echo $this->leftbinA;?><br /><?php echo $this->leftrinA;?><br /><?php echo $this->leftbinnameA;?></td>
			<?php }  else {?>
				<td align="center">
					<img src="<?php echo URL;?>public/images/dimboy.png" class="img-circle"><br />0</td>
			<?php } ?>
			<?php if ($this->leftbinB>0){ ?>		
				<td align="center"><a href="<?php echo URL;?>disttree/treelist/<?php echo $this->leftbinB;?>"><img src="<?php echo URL;?>public/images/boy.png" class="img-circle"></a><br /><?php echo $this->leftbinB;?><br /><?php echo $this->leftrinB;?><br /><?php echo $this->leftbinnameB;?></td>
			<?php } else {?>
				<td align="center">
					<img src="<?php echo URL;?>public/images/dimboy.png" class="img-circle"><br />0</td>
			<?php } ?>	
			<?php if ($this->rightbinA>0){ ?>	
				<td align="center"><a href="<?php echo URL;?>disttree/treelist/<?php echo $this->rightbinA;?>"><img src="<?php echo URL;?>public/images/boy.png" class="img-circle"></a><br /><?php echo $this->rightbinA;?><br /><?php echo $this->rightrinA;?><br /><?php echo $this->rightbinnameA;?></td>
			<?php } else {?>
				<td align="center">
					<img src="<?php echo URL;?>public/images/dimboy.png" class="img-circle"><br />0</td>
			<?php } ?>	
			<?php if ($this->rightbinB>0){ ?>	
				<td align="center"><a href="<?php echo URL;?>disttree/treelist/<?php echo $this->rightbinB;?>"><img src="<?php echo URL;?>public/images/boy.png" class="img-circle"></a><br /><?php echo $this->rightbinB;?><br /><?php echo $this->rightrinB;?><br /><?php echo $this->rightbinnameB;?></td>
			<?php } else {?>
				<td align="center">
					<img src="<?php echo URL;?>public/images/dimboy.png" class="img-circle"><br />0</td>
			<?php } ?>	
			</tr>
		</tbody>
	</table>
</div>
