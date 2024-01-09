          <div class="header clearfix">		
			<ul class="nav-tabs nav ">
			  <li class="active"><a data-toggle="tab" href="javascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>purchasegrn/grnentry')"><strong>Goods Receipt Note (GRN)</strong></a></li>
			  <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>purchasegrn/polist')"><strong>PO List For GRN</strong></a></li>
			  <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>purchasegrn/grnlist/Created')"><strong>Un-Confirmed GRN List</strong></a></li>
			   <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>purchasegrn/grnlist/Confirmed')"><strong>Confirmed GRN List</strong></a></li>
            </ul>
			<div id="result"></div>
            <div class="tab-content">
				<iframe id="helpframe" src="<?php echo URL;?>purchasegrn/grnentry" style="margin:0; width:100%; height:150px; border:none; overflow:hidden;" scrolling="no" onload="AdjustIframeHeightOnLoad()"></iframe>
            </div>
           </div>