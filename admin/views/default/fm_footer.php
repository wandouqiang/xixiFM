    <div class="cover hide">
        <i class="fa fa-spinner fa-spin fa-4x"></i>
    </div>
    <div id="message">
        <?php if( $this->option_model->success() != '' ): ?>
        <div class="alert alert-success" role="alert" id="message-success">
            <span><?php echo $this->option_model->success() ?></span>
        </div>
        <?php endif; ?>
        <?php if( $this->option_model->warning() != '' ): ?>
        <div class="alert alert-warning" role="alert" id="message-warning">
            <span><?php echo $this->option_model->warning() ?></span>
        </div>
        <?php endif; ?>
    </div>
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
    
    <script src="<?php echo base_url('dist/js/message.js') ?>" type="text/javascript"></script>

    <?php if ( isset($is_upload) ): ?>
    <script src="<?php echo base_url('dist/js/jquery.form.js') ?>"></script>
    <script src="<?php echo base_url('dist/js/upload.js') ?>"></script>
    <?php endif; ?>

    <?php if ( isset($is_add_music) ): ?>
    <script src="<?php echo base_url('dist/js/bootstrap-tagsinput.min.js') ?>"></script>
    <script>
        var  inputmood = $("#inputMoods");

        inputmood.tagsinput({
          maxTags   : 3,
          maxChars  : 16,
          trimValue : true
        });
    </script>
    <script src="<?php echo base_url('dist/js/add-song.js') ?>"></script>
    <?php endif; ?>

    <?php if ( isset($is_update_song) ): ?>
    <script src="<?php echo base_url('dist/js/bootstrap-tagsinput.min.js') ?>"></script>
    <script>
        var  inputmood = $("#inputAuthor");

        inputmood.tagsinput({
          maxTags   : 4,
          maxChars  : 16,
          trimValue : true
        });
    </script>
    <script src="<?php echo base_url('dist/js/update-song.js') ?>"></script>
    <?php endif; ?>
  </body>
</html>