         <div class="header clearfix">		
			<ul class="nav-tabs nav ">
		
			  <li class="active"><a data-toggle="tab" href="javascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>distjointemp/joiningentry')"><strong>Prelaunch Placement</strong></a></li>
			  <li class="active"><a data-toggle="tab" href="javascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>distjointemp/genealogylist')"><strong>Genealogy</strong></a></li>
            </ul>
			<div id="result"></div>
            <div class="tab-content">
				<img style="position:relative;left:50%;top:35%;" id="loader1" src="<?php echo URL;?>images/loader/preloader.gif" width="36" height="36" alt=""/>
				<iframe id="helpframe" src="<?php echo URL;?>distjointemp/joiningentry" style="margin:0; width:100%; height:250px; border:none; overflow:hidden;"  onload="AdjustIframeHeightOnLoad()"></iframe>
            </div>
           </div>