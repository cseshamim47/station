          <div class="header clearfix">		
			<ul class="nav-tabs nav ">
			  <li class="active"><a data-toggle="tab" href="javascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>movementmap/showmap')"><strong>Employee Movement Map</strong></a></li>
			  <li><a data-toggle="tab" href="javascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>movementmap/showlocations')"><strong>Employee Movement Locations</strong></a></li>
            </ul>
			<div id="result"></div>
            <div class="tab-content">
				<iframe id="helpframe" src="<?php echo URL;?>movementmap/showmap" style="margin:0; width:100%; height:1000px; border:none; overflow:hidden;" scrolling="no" onload="AdjustIframeHeightOnLoad()"></iframe>
            </div>
           </div>
    