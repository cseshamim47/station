          <div class="header clearfix">		
			<ul class="nav-tabs nav ">
			  <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>itempicklist/poductlist')"><strong>Product List</strong></a></li>
            </ul>
			<a href="javascript:void(0)" id="btnconf" onClick="javascript: window.frames['helpframe'].focus(); parent['helpframe'].print();" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a>
            <div class="tab-content">
				<iframe id="helpframe" name="helpframe"  src="<?php echo URL;?>itempicklist/poductlist" style="margin:0; width:100%; height:150px; border:none; overflow:hidden;" scrolling="no" onload="AdjustIframeHeightOnLoad()"></iframe>
            </div>
           </div>