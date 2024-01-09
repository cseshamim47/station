<div class="page-header headertext">
			<?php
			$bizid="";
			$bizname="";			
			foreach($this->bizness as $key=>$value){
               echo '<h3><strong>Welcome To '. $value['bizlong'] .'</strong></h3>';
			   $bizid = $value['bizid'];
			   $bizname = $value['bizlong'];
			}
			//echo $this->pass;
			?>
        </div>

      <form class="form-signin" action="<?php echo URL; ?>loginmem/run/<?php echo $bizid; ?>" method="post">
        <h2 class="form-signin-heading">Sign in</h2>
        <label for="memuser" class="sr-only">User Name</label>
        <input type="text" name="login" id="memuser" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
		<input type="hidden" name="bizid" value="<?php echo $bizid; ?>">
        <div class="checkbox divrighttext" >
          <label>
            <a href="<?php echo URL; ?>sendpass/index/<?php echo $bizid; ?>"><small>Forgot Password?</small></a>
          </label>
        </div>
		<div class="g-recaptcha" data-sitekey="6LdHMyQUAAAAALXBZShmCcWkxK3EwJi59iy8E1YO"></div>
        <button class="btn btn-lg btn-primary btn-block" type="">Sign in</button>
        <div class="checkbox divcentertext" >
          <label>
            <a href="http://www.amarbazarltd.com"><strong>Back to ABL</strong></a>
          </label>
        </div>
 </form>
