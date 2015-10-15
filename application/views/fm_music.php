<div class="container" style="">
  <div class="row">
    <div class="col-xs-12">
      <!-- 封面 -->
      <div class="m-panel">
        <h3><?php echo $music['music_name'] ?></h3>
        <p class="m-info">
          <i class="fa fa-tags first"></i> <?php echo $music['music_moods'] ?>
          <i class="fa fa-microphone"></i> 
          <a href="index.php?c=users&m=musics&name=<?php echo $username ?>" target="_black">
            <?php echo $username ?>
          </a>
          <i class="fa fa-clock-o"></i> <?php echo date("Y-m-d", $music['music_create']) ?>
          <i class="fa fa-heart-o heart-music cursor <?php if($is_heart) { echo 'text-danger'; } ?>" data-music="<?php echo $music['music_id'] ?>"></i> <span><?php echo $hearts ?></span>
        </p>
        <img src="<?php echo $music['music_image'] ?>" class="img-responsive m-pic" alt="<?php echo $music['music_name'] ?>">
        <p class="m-text"><?php echo $music['music_text'] ?></p>
        <ul class="ds-recent-visitors" data-num-items="10"></ul>
      </div>

      <!-- 分页 -->
      <div class="row" style="margin-bottom: 20px;">
        <div class="col-xs-6">
          <?php if ( $before ): ?>
          <a href="<?php echo 'index.php?c=music&m=vols&id=' . $before ?>" id="before">
            <i class="fa fa-3x fa-arrow-circle-o-left"></i>
          </a>
        <?php endif; ?>
        </div>
        <div class="col-xs-6 text-right">
          <?php if ( $after ): ?>
            <a href="<?php echo 'index.php?c=music&m=vols&id=' . $after ?>" id="after">
              <i class="fa fa-3x fa-arrow-circle-o-right"></i>
            </a>
          <?php endif; ?>
        </div>
      </div>
        
      <!-- 歌单 -->
      <div class="m-panel songshow">
        <ul>
          <?php 
            $id = 0;
            foreach ($songs as $key => $song):
              $id++;
          ?>
          <li>
            <span class="width: 60%;">
              <?php echo sprintf("%02d",$id) ?> <strong data-song="<?php echo $song['song_id'] ?>" class="list-name" id="<?php echo 'song-' . $id ?>"><?php echo $song['song_name'] ?></strong>
            </span>
            <p class="text-right"><?php echo str_replace(',', ' ', $song['song_authors']); ?>
              <a href="<?php echo 'index.php?c=song&m=music&song=' . $song['song_id']; ?>"><i class="fa fa-info-circle" title="查看歌曲详情"></i></a>
              <a href="<?php echo 'index.php?c=song&m=download&song=' . $song['song_id']; ?>" target="_black"><i class="fa fa-download" title="下载到本地"></i></a>
              <i data-song="<?php echo $song['song_id'] ?>" class="fa fa-heart <?php if($is_love[$id - 1]) { echo 'text-danger'; } ?>" title="加入我的收藏"></i>
              <i class="fa fa-play-circle"></i>
            </p>
          </li>
        <?php endforeach; ?>
        </ul>
      </div>
      
    </div>

  </div>
</div>
<!-- 播放器 -->
<div id="player-wrapper" class="music">
  <div class="m-seek-bar jp-seek-bar" style="width: 100%;">
      <div class="m-play-bar jp-play-bar" style="width:0; overflow: hidden;"></div>
  </div>
  <div class="container">
    <div class="row" style="padding-top: 20px;">
      <div class="col-xs-4 col-md-4">
        <i class="fa fa-random random" title="随机"></i>
        <i class="fa fa-bars order" title="顺序"></i>
        <i class="fa fa-refresh loop" title="循环"></i>
        <span class="song-name">歌曲名称</span>
      </div>
      <div class="col-xs-4 col-md-6">
        <span class="jp-current-time">00:00</span> / <span class="jp-duration">00:00</span>
      </div>
      <div class="col-xs-4 col-md-2">
        <i class="fa fa-backward previous"></i>
        <i class="fa fa-play jp-play"></i>
        <i class="fa fa-pause jp-pause"></i>
        <i class="fa fa-forward next"></i>
      </div>
    </div>
  </div>
</div>

