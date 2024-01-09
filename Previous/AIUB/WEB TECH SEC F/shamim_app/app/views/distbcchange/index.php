          <div class="header clearfix">		
			<ul class="nav-tabs nav ">
		
			  <li class="active"><a data-toggle="tab" href="javascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>distbcchange/changeentry')"><strong>BC Transfer</strong></a></li>
			  
            </ul>
			<div id="result"></div>
            <div class="tab-content">
				<iframe id="helpframe" src="<?php echo URL;?>distbcchange/changeentry" style="margin:0; width:100%; height:250px; border:none; overflow:hidden;"  onload="AdjustIframeHeightOnLoad()"></iframe>
            </div>
           </div>