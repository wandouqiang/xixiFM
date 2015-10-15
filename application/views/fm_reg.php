<div class="container reg">
  <div class="row">
    <form class="form-horizontal" action="index.php?c=reg" method="post" role="form">
      <div class="form-group">
        <label for="inputEmail" class="control-label sr-only">邮 箱</label>
        <div class="col-xs-offset-1 col-md-offset-2 col-lg-offset-3 col-xs-10 col-md-8 col-lg-6">
          <div class="input-group">
            <input type="text" class="hide" />
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="email" class="form-control" name="email" id="inputEmail" value="<?php echo set_value('email'); ?>" placeholder="8 ~ 64位的邮箱地址" maxlength="64" autocomplete="off" autofocus="true" required="true">
          </div>
          <?php echo form_error('email'); ?>
        </div>
      </div>
      <div class="form-group">
        <label for="inputUsername" class="control-label sr-only">用户名</label>
        <div class="col-xs-offset-1 col-md-offset-2 col-lg-offset-3 col-xs-10 col-md-8 col-lg-6">
          <div class="input-group">
            <input type="text" class="hide" />
            <span class="input-group-addon"><i class="fa fa-comment"></i></span>
            <input type="text" class="form-control" name="username" id="inputUsername" value="<?php echo set_value('username'); ?>" placeholder="4 ~ 16位的字母/数字/下划线/破折号" maxlength="16" autocomplete="off" required="true">
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
            <input type="password" class="form-control" name="password" id="inputPassword" autocomplete="off" placeholder="6 ~ 18位的密码" maxlength="18" required="true">
          </div>
          <?php echo form_error('password'); ?>
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassconf" class="control-label sr-only">确认密码</label>
        <div class="col-xs-offset-1 col-md-offset-2 col-lg-offset-3 col-xs-10 col-md-8 col-lg-6">
          <div class="input-group">
            <input type="password" class="hide" />
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
            <input type="password" class="form-control" name="passconf" id="inputPassconf" autocomplete="off" placeholder="再一次输入密码" maxlength="18" required="true">
          </div>
          <?php echo form_error('passconf'); ?>
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-offset-1 col-md-offset-2 col-lg-offset-3 col-xs-10 col-md-8 col-lg-6">
          <button type="submit" class="btn btn-info">注 册</button>
        </div>
      </div>
    </form>
  </div>
</div>

