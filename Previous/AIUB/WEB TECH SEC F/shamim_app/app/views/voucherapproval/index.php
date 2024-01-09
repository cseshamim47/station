          
		  <div class="panel panel-info">
            <div class="panel-heading">
                <div style="text-align: center;">
                    <h4><strong>Voucher List</strong></h4>
                    <div style="text-align: center; color: red;"><strong><h4 style="color:red"><?php echo $this->flag ?></h4></strong></div>
                </div>
			</div>
            <div class="panel-body" >
				<?php echo $this->table;?>
			</div>
        </div>

        <!-- <div class="header clearfix">		
			<ul class="nav-tabs nav ">
			  <li class="active"><a data-toggle="tab" href="javascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>voucherapproval/datewisepo')"><strong>Unconfirmed Voucher</strong></a></li>
			  
            </ul>
			<div id="result"></div>
            <div class="tab-content">
				<iframe id="helpframe" src="<?php echo URL;?>voucherapproval/datewisepo" style="margin:0; width:100%; height:1000px; border:none; overflow:hidden;" scrolling="no" onload="AdjustIframeHeightOnLoad()"></iframe>
            </div>
           </div> -->