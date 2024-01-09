<div class="page-header headertext">
			<?php 
			$biz = "";
			$success = "";
			
			foreach($this->biz as $key=>$value){
              echo '<h3><strong>'. $value['bizlong'] .'</strong></h3>';
			  $biz = $value['bizid'];
			}
			
			?>
			
        </div>

      <form class="form-signin" action="<?php echo URL; ?>sendpass/sendpassword/<?php echo $biz; ?>" method="post">
        <p class="bg-success"><?php echo $this->rslt; ?></p>
        <label for="inputEmail" class="sr-only">Email address</label>
		<input type="text" id="xrdin" name="xrdin" class="form-control" placeholder="RIN No" required autofocus>
        <input type="text" id="xmobile" name="xmobile" class="form-control" placeholder="11 digits Mobile or Email" required>
		<input type="hidden" name="bizid" value="<?php echo $biz; ?>">
        <div class="checkbox divlefttext" >
         <label>
			<input type="radio" name="sendpass" value="sms" text="By SMS" checked><span><strong>By SMS</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="radio" name="sendpass" value="email" text="By SMS"><span><strong>By Email</strong></span><br/>
            
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Send Password</button>
        <div class="checkbox divcentertext" >
          <label>
            <a href="<?php echo URL; ?>loginmem/index/<?php echo $biz; ?>"><strong>Back to login</strong></a>
          </label>
        </div>
      </form>