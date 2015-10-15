<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>西西-FM | 管理中心</title>
    <link rel="icon" href="<?php echo base_url('favicon.ico') ?>" />
    <?php if ( $this->config->item('use_open_cdn') ): ?>
    <link href="<?php echo $this->config->item('cdn_bootstrap') ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('cdn_awesome') ?>" rel="stylesheet">
    <link href="<?php echo $this->config->item('cdn_normalize') ?>" rel="stylesheet">
    <?php else: ?>
    <link href="<?php echo base_url('dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('dist/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('dist/css/normalize.css') ?>" rel="stylesheet">
    <?php endif; ?>
    <link href="<?php echo base_url('dist/css/bootstrap-tagsinput.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('dist/css/music.css') ?>" rel="stylesheet">
  </head>
  <body>   
    <!-- 导航 -->
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php?c=board">管理中心</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="admin.php?c=music">期刊</a></li>
                    <li><a href="admin.php?c=song">音乐</a></li>
                    <li><a href="admin.php?c=users">用户</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <?php if ( $this->session->userdata('admin') ): ?>
                    <li><a href="index.php" target="_black">网站</a></li>
                    <li><a href="admin.php?c=logout">注销</a></li>
                <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    

