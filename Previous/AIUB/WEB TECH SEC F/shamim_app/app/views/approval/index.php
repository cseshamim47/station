          <div class="header clearfix">		
			<ul class="nav-tabs nav ">
		
			  
			  <li class="active"><a data-toggle="tab" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>approval/glchartsubentry')"><strong>Approval</strong></a></li>
        <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>approval/approvalshow')"><strong>Edit Approval</strong></a></li>
        <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>approval/approvallist')"><strong>Approval List</strong></a></li>
            </ul>
			<div id="result"></div>
            <div class="tab-content">
				<iframe id="helpframe" src="<?php echo URL;?>approval/glchartsubentry" style="margin:0; width:100%; height:150px; border:none; overflow:hidden;" scrolling="no" onload="AdjustIframeHeightOnLoad()"></iframe>
            </div>
            
           </div>
        