<div class="header clearfix">
	<ul class="nav-tabs nav ">
		<li class="active"><a data-toggle="tab" href="javascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL; ?>wopay/salesentry')"><strong>Work Order Payment Entry</strong></a></li>
		<li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL; ?>wopay/solist/Created')"><strong>Payment List (Un-Confirmed)</strong></a></li>
		<li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL; ?>wopay/solist/Pending')"><strong>Payment List(Pending)</strong></a></li>
		<li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL; ?>wopay/solist/Confirmed')"><strong>Payment List(Confirmed)</strong></a></li>
		<li><a data-toggle="tab" id="disabled" href="avascript:void(0)" onclick="loadIframe('helpframe','<?php echo URL; ?>wopay/solist/Canceled')"><strong>Payment List(Modified)</strong></a></li>

	</ul>
	<div id="result"></div>
	<div class="tab-content">
		<iframe id="helpframe" src="<?php echo URL; ?>wopay/salesentry" style="margin:0; width:100%; height:150px; border:none; overflow:hidden;" scrolling="no" onload="AdjustIframeHeightOnLoad()"></iframe>
	</div>
</div>