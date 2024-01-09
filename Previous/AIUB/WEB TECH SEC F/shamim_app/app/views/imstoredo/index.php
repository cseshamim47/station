          <div class="header clearfix">		
			<ul class="nav-tabs nav ">
			  <li class="active"><a data-toggle="tab" href="javascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>imstoredo/doentry')"><strong>Store Delivery</strong></a></li>
			  <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>imstoredo/reqlist/Store')"><strong>Store Requisition List</strong></a></li>
			  <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>imstoredo/reqlist/General Store')"><strong>General Store Requisition List</strong></a></li>
			  <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>imstoredo/unconfirmedlist')"><strong>Un-Confirmed DO List</strong></a></li>
			   <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>imstoredo/dolist')"><strong>Confirmed DO List</strong></a></li>
            </ul>
			<div id="result"></div>
            <div class="tab-content">
				<iframe id="helpframe" src="<?php echo URL;?>imstoredo/doentry" style="margin:0; width:100%; height:150px; border:none; overflow:hidden;" scrolling="no" onload="AdjustIframeHeightOnLoad()"></iframe>
            </div>
           </div>
        