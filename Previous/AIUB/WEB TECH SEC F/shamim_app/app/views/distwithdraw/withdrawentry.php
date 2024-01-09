	<ul class="breadcrumb">
	<li class="active"><strong>Total Balance : <?php echo $this->balance; ?> BDT</strong></li>
   </ul>
	<?php echo $this->dynform;?>

	<div class="panel panel-info">
            <div class="panel-heading">
                <div style="text-align: center;">
                    <h4><strong>Account List</strong></h4> 
                </div>
			</div>
            <div class="panel-body" >
				<?php echo $this->table;?>
			</div>
        </div>
	
	