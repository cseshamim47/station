          <div class="header clearfix">		
			<ul class="nav-tabs nav ">
		
			  <li class="active"><a data-toggle="tab" href="javascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>posentry/salesentry')"><strong>POS Entry</strong></a></li>
			  <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>posentry/unconinvoicelist')"><strong>Invoice List</strong></a></li>
            </ul>
			<div id="result"></div>
            <div class="tab-content">
			<img style="position:relative;left:50%;top:35%;" id="loader1" src="<?php echo URL;?>images/loader/preloader.gif" width="36" height="36" alt=""/>
				<iframe id="helpframe" src="<?php echo URL;?>posentry/salesentry" style="margin:0; width:100%; height:150px; border:none; overflow:hidden;" scrolling="no" onload="AdjustIframeHeightOnLoad()"></iframe>
            </div>
           </div>