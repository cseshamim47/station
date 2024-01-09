          <div class="header clearfix">		
			<ul class="nav-tabs nav ">
		
			  <li class="active"><a data-toggle="tab" href="javascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>cussatisfaction/itementry')"><strong>Customer Satisfaction Assesment Entry</strong></a></li>
			  <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>cussatisfaction/itemlist')"><strong>Customer Satisfaction Assesment List</strong></a></li>
        <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>cussatisfaction/printindivisual')"><strong>Print Individual Assesment</strong></a></li>
            </ul>
			<div id="result"></div>
            <div class="tab-content">
				<iframe id="helpframe" src="<?php echo URL;?>cussatisfaction/itementry" style="margin:0; width:100%; height:150px; border:none; overflow:hidden;" scrolling="no" onload="AdjustIframeHeightOnLoad()"></iframe>
            </div>
           </div>