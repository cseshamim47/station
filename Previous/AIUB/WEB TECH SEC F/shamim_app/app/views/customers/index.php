
          <div class="header clearfix">		
			<ul class="nav-tabs nav ">
		
			  <li class="active"><a data-toggle="tab" href="javascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>customers/customerentry')"><strong>Customer Entry</strong></a></li>
			  <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>customers/customerlist/Created')"><strong>Customer List(Unconfirm)</strong></a></li>
			  <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>customers/customerlist/Confirmed')"><strong>Customer List(Confirm)</strong></a></li>
			  <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>customers/plotwisesales')"><strong>Plot Wise Sales List</strong></a></li>
            </ul>
			<div id="result"></div>
            <div class="tab-content">
				<iframe id="helpframe" src="<?php echo URL;?>customers/customerentry" style="margin:0; width:100%; height:150px; border:none; overflow:hidden;" scrolling="no" onload="AdjustIframeHeightOnLoad()"></iframe>
            </div>
           </div>
        