         <div class="header clearfix">		
			<ul class="nav-tabs nav ">
		
			  <li class="active"><a data-toggle="tab" href="javascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>distbaltransfer/distbaltransferentry')"><strong>Retailer Balance</strong></a></li>
			  <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>distbaltransfer/baltransferlist')"><strong>Un-Confirmed List</strong></a></li>
			  <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>distbaltransfer/balconfirmlist')"><strong>Confirmed List</strong></a></li>
            </ul>
			<div id="result"></div>
            <div class="tab-content">
				
				<iframe id="helpframe" src="<?php echo URL;?>distbaltransfer/distbaltransferentry" style="margin:0; width:100%; height:150px; border:none; overflow:hidden;" scrolling="no" onload="AdjustIframeHeightOnLoad()"></iframe>
            </div>
           </div>
        