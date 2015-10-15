<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $slug ?> - <?php echo $title ?></title>
    <meta name="keywords" content="<?php echo $keywords ?>" />
    <meta name="description" content="<?php echo $description ?>" />
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
    <link href="<?php echo base_url('dist/css/music.css') ?>" rel="stylesheet">
  </head>
  <body>