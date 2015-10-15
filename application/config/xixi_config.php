<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 网站标题 */
$config['web_title']            = '西西音乐电台';
/* 网站副标题 */
$config['web_slug']             = '美好我们看的见';
/* 网站关键字 */
$config['web_keywords']         = '音乐电台,CodeIgniter,Bootstrap,响应式';
/* 网站描述 */
$config['web_description']      = '西西音乐电台是一套基于CodeIgniter与Bootstrap的音乐电台程序，响应式设计，能很好的兼容各终端设备和分辨率。';
/* cookie存储用户号编码标记名称 */
$config['remember_cookie_name'] = 'xiaoxi_remember_code';
/* cookie存储用户名标记名称 */
$config['identity_cookie_name'] = 'xiaoxi_username';
/* 用户密码加密字符串 */
$config['password_code']        = 'DFKIEJSKDLIESJCSJDEOAKS';
/* 自动登录的时间限制，单位秒。 */
$config['user_expire']          = 86500;

/* 是否启用缓存。TRUE/FALSE。
 * 当启用缓存时请确认application/cache目录可写。
 * 关闭缓存并不会直接删除已经缓存的文件。需要清空缓存请删除application/cache目录中index.html、.htaccess之外的所有文件
 */
$config['use_cache']            = TRUE;
/* 缓存更新的时间，单位分钟。 */
$config['cache_time']           = 60;

/* 是否开启调试模式。TRUE/FALSE。 */
$config['use_debug']            = FALSE;

/*
 * 百  度：http://developer.baidu.com/wiki/index.php?title=docs/cplat/libs
 * 又拍云：http://jscdn.upai.com/
 * 七  牛：http://www.staticfile.org/
 * 360   ：http://libs.useso.com/
 * Bootstrap：http://www.bootcdn.cn/
 *
 * 是否启用开放CDN服务。TRUE/FALSE 
 * 设置为TRUE时需要同时设置Bootstrap、Font awesome、Normalize、Jquery的CDN地址
 * 上面已经为你列出了国内常见的免费CDN服务提供商。默认使用了七牛的。
 */
$config['use_open_cdn']         = TRUE;
/* 本地版本：3.3.0 */
$config['cdn_bootstrap']        = 'http://cdn.staticfile.org/twitter-bootstrap/3.3.1/css/bootstrap.min.css';
$config['cdn_bootstrap_js']     = 'http://cdn.staticfile.org/twitter-bootstrap/3.3.1/js/bootstrap.min.js';
/* 本地版本：4.3.0 */
$config['cdn_awesome']          = 'http://cdn.staticfile.org/font-awesome/4.2.0/css/font-awesome.min.css';
/* 本地版本：3.0.2 */
$config['cdn_normalize']        = 'http://cdn.staticfile.org/normalize/3.0.1/normalize.min.css';
/* 本地版本：2.1.3 */
$config['cdn_jquery']           = 'http://cdn.staticfile.org/jquery/2.1.1-rc2/jquery.min.js';

/* 期刊管理每页显示的记录数。设置为4的整数倍效果最加。 */
$config['music_per_page']       = 12;
/* 歌曲管理每页显示的记录数 */
$config['song_per_page']        = 12;

/* 歌曲分类：情感(请和后台的配置一样) */
$config['moods'][1]             = '怀旧';
$config['moods'][2]             = '清新';
$config['moods'][3]             = '浪漫';
$config['moods'][4]             = '伤感';
$config['moods'][5]             = '治愈';
$config['moods'][6]             = '孤独';
$config['moods'][7]             = '放松';
$config['moods'][8]             = '悲伤';
$config['moods'][9]             = '温暖';
$config['moods'][10]            = '感动';
$config['moods'][11]            = '快乐';
$config['moods'][12]            = '安静';
$config['moods'][13]            = '思念';
/* 歌曲分类：语种(请和后台的配置一样) */
$config['languages'][1]         = '国语';
$config['languages'][2]         = '英语';
$config['languages'][3]         = '日语';
$config['languages'][4]         = '韩语';
$config['languages'][5]         = '粤语';
$config['languages'][6]         = '法语';
$config['languages'][7]         = '闽南';
$config['languages'][8]         = '其他';
/* 歌曲分类：风格(请和后台的配置一样) */
$config['styles'][1]            = '流行';
$config['styles'][2]            = '摇滚';
$config['styles'][3]            = '民谣';
$config['styles'][4]            = '电子';
$config['styles'][5]            = '说唱';
$config['styles'][6]            = '爵士';
$config['styles'][7]            = '乡村';
$config['styles'][8]            = '古典';
$config['styles'][9]            = '民族';
$config['styles'][10]           = '英伦';
$config['styles'][11]           = '朋克';
$config['styles'][12]           = '蓝调';
$config['styles'][13]           = '原声';
$config['styles'][14]           = '动漫';
$config['styles'][15]           = '古风';
$config['styles'][16]           = '其他';

/*
 * 用户头像和背景图
 */
$config['user_image'][1]        = 'dist/images/user/1.jpg';
$config['user_image_th'][1]     = 'dist/images/user/1_th.jpg';
$config['user_image'][2]        = 'dist/images/user/2.jpg';
$config['user_image_th'][2]     = 'dist/images/user/2_th.jpg';
$config['user_image'][3]        = 'dist/images/user/3.jpg';
$config['user_image_th'][3]     = 'dist/images/user/3_th.jpg';
$config['user_image'][4]        = 'dist/images/user/4.jpg';
$config['user_image_th'][4]     = 'dist/images/user/4_th.jpg';
$config['user_image'][5]        = 'dist/images/user/5.jpg';
$config['user_image_th'][5]     = 'dist/images/user/5_th.jpg';
$config['user_image'][6]        = 'dist/images/user/6.jpg';
$config['user_image_th'][6]     = 'dist/images/user/6_th.jpg';
$config['user_image'][7]        = 'dist/images/user/7.jpg';
$config['user_image_th'][7]     = 'dist/images/user/7_th.jpg';
$config['user_image'][8]        = 'dist/images/user/8.jpg';
$config['user_image_th'][8]     = 'dist/images/user/8_th.jpg';

$config['user_avatar'][1]       = 'dist/images/user/Fruit-1.png';
$config['user_avatar'][2]       = 'dist/images/user/Fruit-2.png';
$config['user_avatar'][3]       = 'dist/images/user/Fruit-3.png';
$config['user_avatar'][4]       = 'dist/images/user/Fruit-4.png';
$config['user_avatar'][5]       = 'dist/images/user/Fruit-5.png';
$config['user_avatar'][6]       = 'dist/images/user/Fruit-6.png';
$config['user_avatar'][7]       = 'dist/images/user/Fruit-7.png';
$config['user_avatar'][8]       = 'dist/images/user/Fruit-8.png';


/* End of file xixi_config.php */
/* Location: ./application/config/xixi_config.php */
