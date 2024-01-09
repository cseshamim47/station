          <div class="header clearfix">		
			<ul class="nav-tabs nav ">
			  <li class="active"><a data-toggle="tab" href="javascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>purchasereturn/returnentry')"><strong>Purchase Return</strong></a></li>
			  <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>purchasereturn/grnlist')"><strong>GRN List For Return</strong></a></li>
			  <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>purchasereturn/returnlist/Created')"><strong>Un-Confirmed Return List</strong></a></li>
			   <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>purchasereturn/returnlist/Confirmed')"><strong>Confirmed Return List</strong></a></li>
            </ul>
			<div id="result"></div>
            <div class="tab-content">
				<iframe id="helpframe" src="<?php echo URL;?>purchasereturn/returnentry" style="margin:0; width:100%; height:150px; border:none; overflow:hidden;" scrolling="no" onload="AdjustIframeHeightOnLoad()"></iframe>
            </div>
           </div>