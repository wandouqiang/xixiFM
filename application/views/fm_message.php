<div class="container reg">
  <div class="row">
    <div class="col-sm-offset-2 col-md-offset-3 col-xs-12 col-sm-8 col-md-6">
    	<?php if( isset( $regright ) ) : ?>
	    <div class="alert alert-success" role="alert">
	        <strong>注册成功！</strong> 请前往你的邮箱激活账号。
	    </div>
		<?php endif; ?>
		<?php if( isset( $regerror ) ) : ?>
		<div class="alert alert-danger" role="alert">
	        <strong>注册失败！</strong>
	    </div>
		<?php endif; ?>
		<?php if( isset( $activeright ) ) : ?>
		<div class="alert alert-success" role="alert">
	        <strong>激活成功！</strong> 
	    </div>
		<?php endif; ?>
		<?php if( isset( $activerror ) ) : ?>
		<div class="alert alert-danger" role="alert">
	        <strong>激活失败！</strong>
	    </div>
		<?php endif; ?>
    </div>
  </div>
</div>

