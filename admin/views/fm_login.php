<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>西西-FM | 管理中心</title>
    <link rel="icon" href="<?php echo base_url('favicon.ico') ?>" />
    <link href="<?php echo base_url('dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('dist/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('dist/css/music.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('dist/css/normalize.css') ?>" rel="stylesheet">
  </head>
  <body>
    <div class="container reg" style="padding-top: 12%;">
      <div class="row">
          <h1 class="text-center" style="margin-bottom: 60px;">西西 FM 管理中心</h1>
          
          <div class="col-xs-offset-1 col-md-offset-2 col-lg-offset-3 col-xs-10 col-md-8 col-lg-6">
            <div class="alert alert-danger hide <?php if(isset($error)) echo 'show'; ?>" role="alert">登录失败</div>
          </div>

          <form class="form-horizontal" action="admin.php?c=login" method="post" role="form">
            <div class="form-group">
              <label for="inputUsername" class="control-label sr-only">管理员</label>
              <div class="col-xs-offset-1 col-md-offset-2 col-lg-offset-3 col-xs-10 col-md-8 col-lg-6">
                <div class="input-group">
                  <input type="text" class="hide" />
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="text" class="form-control" name="username" id="inputUsername" value="<?php echo set_value('username'); ?>" placeholder="" autocomplete="off" maxlength="32" autofocus="true" required="true">
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
                  <input type="password" class="form-control" name="password" id="inputPassword" autocomplete="off" maxlength="18" placeholder="" required="true">
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
  </body>
</html>

