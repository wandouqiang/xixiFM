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
            <a class="navbar-brand" href="index.php"><?php echo $title  ?></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php?c=music">期 刊</a></li>
                <li><a href="index.php?c=song">发 现</a></li>
                <li><a href="index.php?c=fm">电 台</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php if ( $this->session->userdata('online') ): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" style="padding-top: 0; padding-bottom: 0;" data-toggle="dropdown" role="button" aria-expanded="false">
                        <img src="<?php echo $this->user_model->avatar($this->session->userdata('username')) ?>" class="img-circle" width="50"></a>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="index.php?c=users&m=musics&name=<?php echo $this->session->userdata('username') ?>">个人主页</li>
                        <li><a href="index.php?c=users&m=setting" style="padding-right:0;">账号设置</a></li>
                        <li class="divider"></li>
                        <li><a href="index.php?c=logout" style="padding-right:0;">退出登录</a></li>
                    </ul>
                </li>
                <?php else: ?>
                <li><a href="index.php?c=login">登 录</a></li>
                <li><a href="index.php?c=reg" style="padding-right:0;">注 册</a></li>
                <?php endif; ?>
            </ul>

        </div>
    </div>
</nav>

<div id="player"></div>
