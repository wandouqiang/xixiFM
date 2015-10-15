    <i class="fa fa-spinner fa-spin fa-4x hide"></i>

    <img src="dist/images/top.gif" id="back-to-top" alt="back to top">
    <script>
        var Home = '<?php echo base_url() ?>';
    </script>
    
    <?php if ( $this->config->item('use_open_cdn') ): ?>
    <script src="<?php echo $this->config->item('cdn_jquery') ?>" type="text/javascript"></script>
    <script src="<?php echo $this->config->item('cdn_bootstrap_js') ?>" type="text/javascript"></script>
    <?php else: ?>
    <script src="<?php echo base_url('dist/js/jquery-2.1.3.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('dist/js/bootstrap.min.js') ?>" type="text/javascript"></script>
    <?php endif; ?>

    <?php if ( isset($is_player) ): ?>
    <script src="<?php echo base_url('dist/jplayer/jquery.jplayer.min.js') ?>" type="text/javascript"></script>
    <?php endif; ?>
    <?php if ( isset($is_fm) ): ?>
    <script src="<?php echo base_url('dist/js/fm.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('dist/js/heart.js') ?>" type="text/javascript"></script>
    <?php endif; ?>
    <?php if ( isset($is_song) ): ?>
    <script src="<?php echo base_url('dist/js/song.js') ?>" type="text/javascript"></script>
    <?php endif; ?>
    <?php if ( isset($is_music) ): ?>
    <script src="<?php echo base_url('dist/js/mousetrap.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('dist/js/player.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('dist/js/heart.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('dist/js/top.js') ?>" type="text/javascript"></script>
    <?php endif; ?>
    <?php if ( isset($is_single) ): ?>
    <script src="<?php echo base_url('dist/js/single.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('dist/js/heart.js') ?>" type="text/javascript"></script>
    <?php endif; ?>
    <?php if ( isset($is_user_image) ): ?>
    <script src="<?php echo base_url('dist/js/user.js') ?>" type="text/javascript"></script>
    <?php endif; ?>
  </body>
</html>