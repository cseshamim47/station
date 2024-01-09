          <div class="header clearfix">		
			<ul class="nav-tabs nav ">
			  <li class="active"><a data-toggle="tab" href="javascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>glrcptvou/glrcptvouentry')"><strong>Receipt Voucher Entry</strong></a></li>

			  <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>glrcptvou/voucherlist/Created')"><strong>Voucher List (Un-Confirmed)</strong></a></li>
			  <!-- <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>glrcptvou/voucherlist/Pending')"><strong>Voucher List(Pending)</strong></a></li> -->
			  <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>glrcptvou/voucherlist/Confirmed')"><strong>Voucher List(Confirmed)</strong></a></li>
			  <!-- <li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL;?>glrcptvou/voucherlist/Canceled')"><strong>Voucher List(Returned)</strong></a></li> -->
            </ul>
			<div id="result"></div>
            <div class="tab-content">
				<iframe id="helpframe" src="<?php echo URL;?>glrcptvou/glrcptvouentry" style="margin:0; width:100%; height:150px; border:none; overflow:hidden;" scrolling="no" onload="AdjustIframeHeightOnLoad()"></iframe>
            </div>
           </div>