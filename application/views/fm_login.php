<div class="container reg">
  <div class="row">
    <div class="col-xs-offset-1 col-md-offset-2 col-lg-offset-3 col-xs-10 col-md-8 col-lg-6">
      <div class="alert alert-danger hide <?php if(isset($error)) echo 'show'; ?>" role="alert">登录失败</div>
    </div>
    <form class="form-horizontal" action="index.php?c=login" method="post" role="form">
      <div class="form-group">
        <label for="inputUsername" class="control-label sr-only">用户名/邮箱</label>
        <div class="col-xs-offset-1 col-md-offset-2 col-lg-offset-3 col-xs-10 col-md-8 col-lg-6">
          <div class="input-group">
            <input type="text" class="hide" />
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="text" class="form-control" name="username" id="inputUsername" value="<?php echo set_value('username'); ?>" placeholder="你的用户名或者邮箱地址" autocomplete="off" maxlength="32" autofocus="true" required="true">
          </div>
          <?php echo form_error('username'); ?>
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="control-label sr-only">密 码</label>
        <div class="col-xs-offset-1 col-md-offset-2 col-lg-offset-3 col-xs-10 col-md-8 col-lg-6">
          <div class="input-group">
            <input type="password" class="hide" />
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input type="password" class="form-control" name="password" id="inputPassword" autocomplete="off" maxlength="18" placeholder="你的密码" required="true">
          </div>
          <?php echo form_error('password'); ?>
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-offset-1 col-md-offset-2 col-lg-offset-3 col-xs-10 col-md-8 col-lg-6">
          <button type="submit" class="btn btn-info">登 录</button>
        </div>
      </div>
    </form>
  </div>
</div>

