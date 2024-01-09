 <div class="panel" >
			 <div class="panel-heading" width="70%">
			<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
			
                <div style="text-align: center;">
                    <h2><strong><?php echo $this->org; ?></strong></h2>
					<h5>House # 35/c, Kashfia Plaza (4th &5th)<br/> Nayapalton, Dhaka-1000</strong></h5><br/><br/>			
                </div>
				
				<div style="text-align: center;">                    
					<h4><strong><table style="margin: auto; float: center;" border="1"><tbody><tr><td><?php echo $this->vrptname; ?></td></tr></tbody></table></strong></h4>
					
                </div>
				<div style="text-align: center; font-size:10px">
                    <span>জাতীয় রাজস্ব বোর্ড এর SRO নং ২২৪-আইন/২০১৭/৭৭৪-মূসক তারিখ : ১/৭/২০১৭ মোতাবেক  অনলাইন পণ্য বিক্রয় সার্ভিস কোড S 099.10/S 099.50 এর আওতায় মূসক অব্যাহতি প্রাপ্ত পণ্য/সেবা হিসাবে সরবরাহ করা হল ।<span>
					<br/><br/><br/>	
                </div>
               
				<div style="float: left;">
                    <p>Delivery Chalan No: <?php echo $this->dono; ?></p>
					<p>Customer: <?php echo $this->xrdin."-".$this->xorg;  ?></p>
					
					
                </div>
				<div style="float: right;">
                    <p>Date: <?php echo $date = date('d/m/Y', strtotime($this->dt)); ?></p>
					
                </div>
				<div>
                    <table class="table table-bordered table-striped">
						<thead>
							<th>Sl.</th><th>Itemcode</th><th>Description</th><th style="text-align:right">Rate</th><th style="text-align:right">Qty</th><th style="text-align:right">Total</th>
						</thead>
						<tbody>
						<?php foreach($this->vrow as $val){ ?>
							<tr>
								<td><?php echo $val['xrow']; ?></td>
								<td>
									<?php echo $val['xitemcodeosp']; ?>
								</td>
								<td>
									<?php echo $val['xitemdesc']; ?>
								</td>
								<td align="right"><?php echo $val['xsalesprice']; ?></td>
								<td align="right"><?php echo $val['xqty']; ?></td>
								<td align="right"><?php echo $val['xqty']*$val['xsalesprice']; ?></td>
							</tr>
						<?php } ?>	
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" align="right"><strong>Total</strong></td><td align="right"><strong><?php echo $this->totqty; ?></strong></td><td align="right"><strong><?php echo $this->totalamt; ?></strong></td>
							</tr>
							
						</tfoot>
					</table>
						
                </div>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<div style="float: left;">
					Delivered By_____________	
                </div>
				<div style="float: right;">
					 Received By_____________
										
                </div>	
			</div>
            
        </div>

