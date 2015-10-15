<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 歌曲来源名称，在歌曲管理列表中显示 */
$config['song_source'][1]      = '本地音乐';
$config['song_source'][2]      = '网易云音乐';

/* 期刊管理每页显示的记录数 */
$config['music_per_page']      = 12;
/* 歌曲管理每页显示的记录数 */
$config['song_per_page']       = 10;
/* 用户管理每页显示的记录数 */
$config['users_per_page']      = 10;

/* 期刊封面图片的大小限制 */
$config['upload_image_size']   = '1024';
/* 本地上传音乐文件的大小限制 */
$config['upload_music_size']   = '10240';

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
$config['use_open_cdn']        = TRUE;
/* 本地版本：3.3.0 */
$config['cdn_bootstrap']       = 'http://cdn.staticfile.org/twitter-bootstrap/3.3.1/css/bootstrap.min.css';
$config['cdn_bootstrap_js']    = 'http://cdn.staticfile.org/twitter-bootstrap/3.3.1/js/bootstrap.min.js';
/* 本地版本：4.3.0 */
$config['cdn_awesome']         = 'http://cdn.staticfile.org/font-awesome/4.2.0/css/font-awesome.min.css';
/* 本地版本：3.0.2 */
$config['cdn_normalize']       = 'http://cdn.staticfile.org/normalize/3.0.1/normalize.min.css';
/* 本地版本：2.1.3 */
$config['cdn_jquery']          = 'http://cdn.staticfile.org/jquery/2.1.1-rc2/jquery.min.js';

/* 歌曲分类：情感(请和前台的配置一样) */
$config['moods'][1]            = '怀旧';
$config['moods'][2]            = '清新';
$config['moods'][3]            = '浪漫';
$config['moods'][4]            = '伤感';
$config['moods'][5]            = '治愈';
$config['moods'][6]            = '孤独';
$config['moods'][7]            = '放松';
$config['moods'][8]            = '悲伤';
$config['moods'][9]            = '温暖';
$config['moods'][10]           = '感动';
$config['moods'][11]           = '快乐';
$config['moods'][12]           = '安静';
$config['moods'][13]           = '思念';
/* 歌曲分类：语种(请和前台的配置一样) */
$config['languages'][1]        = '国语';
$config['languages'][2]        = '英语';
$config['languages'][3]        = '日语';
$config['languages'][4]        = '韩语';
$config['languages'][5]        = '粤语';
$config['languages'][6]        = '法语';
$config['languages'][7]        = '闽南';
$config['languages'][8]        = '其他';
/* 歌曲分类：风格(请和前台的配置一样) */
$config['styles'][1]           = '流行';
$config['styles'][2]           = '摇滚';
$config['styles'][3]           = '民谣';
$config['styles'][4]           = '电子';
$config['styles'][5]           = '说唱';
$config['styles'][6]           = '爵士';
$config['styles'][7]           = '乡村';
$config['styles'][8]           = '古典';
$config['styles'][9]           = '民族';
$config['styles'][10]          = '英伦';
$config['styles'][11]          = '朋克';
$config['styles'][12]          = '蓝调';
$config['styles'][13]          = '原声';
$config['styles'][14]          = '动漫';
$config['styles'][15]          = '古风';
$config['styles'][16]          = '其他';

/* 用户分组名称(请和前台的配置一样) */
$config['groups'][0]           = '未激活';
$config['groups'][1]           = '普通用户';
$config['groups'][8]           = '管理员';





/* End of file xixi_config.php */
/* Location: ./application/config/xixi_config.php */
