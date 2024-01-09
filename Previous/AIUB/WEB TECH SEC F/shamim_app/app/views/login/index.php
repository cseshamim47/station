
<?php
	$bizid="";
	$bizname="";			
	foreach($this->bizness as $key=>$value){
	   //echo '<h3><strong>Welcome To '. $value['bizlong'] .'</strong></h3>';
	   $bizid = $value['bizid'];
	   $bizname = $value['bizlong'];
	}
	//echo $this->pass;
?>




	
	
	
	<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body">
  <div class="login-logo">
    <b>Login</b>
  </div>
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?php echo URL; ?>login/run/<?php echo $bizid; ?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="login" id="inputEmail" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="<?php echo URL; ?>sendpass/index/<?php echo $bizid; ?>">I forgot my password</a><br>
	<div class="forgot">
		<a href="<?php echo URL; ?>index"><strong>Back to Directories</strong></a>
	</div>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
	
	
	
	
	
	
	
	
	
	
	
	
	
	
