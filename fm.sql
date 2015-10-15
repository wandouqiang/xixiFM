--
-- 歌曲
-- song_source => 歌曲来源 1 - 本地 / 2 - 网易
--

DROP TABLE IF EXISTS `fm_songs`;
CREATE TABLE IF NOT EXISTS `fm_songs` (
  `song_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `song_name` varchar(64) NOT NULL DEFAULT '',
  `song_authors` varchar(128) NOT NULL DEFAULT '',
  `song_path` varchar(128) NOT NULL DEFAULT '',
  `song_language` tinyint(1) NOT NULL DEFAULT '0',
  `song_source` tinyint(1) NOT NULL DEFAULT '0',
  `song_style` tinyint(1) NOT NULL DEFAULT '0',
  `song_moods` tinyint(1) NOT NULL DEFAULT '0',
  `song_image` varchar(128) NOT NULL DEFAULT '',
  `song_user` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`song_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 合集
-- 

DROP TABLE IF EXISTS `fm_musics`;
CREATE TABLE IF NOT EXISTS `fm_musics` (
  `music_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `music_name` varchar(64) NOT NULL DEFAULT '',
  `music_image` varchar(256) NOT NULL DEFAULT '',
  `music_style` varchar(64) NOT NULL DEFAULT '',
  `music_moods` varchar(64) NOT NULL DEFAULT '',
  `music_user` bigint(20) unsigned NOT NULL DEFAULT '0',
  `music_text` text NOT NULL DEFAULT '',
  `music_create` int(11) unsigned NOT NULL,
  PRIMARY KEY (`music_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 歌曲 => 合集
--

DROP TABLE IF EXISTS `fm_song_music`;
CREATE TABLE IF NOT EXISTS `fm_song_music` (
  `song_music_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `song_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `music_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`song_music_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 用户
-- user_listen => 累计收听时间
--

DROP TABLE IF EXISTS `fm_users`;
CREATE TABLE IF NOT EXISTS `fm_users` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(64) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_iphone` varchar(20) NOT NULL DEFAULT '',
  `user_registered` int(11) unsigned NOT NULL,
  `user_last_login` int(11) unsigned NOT NULL,
  `user_group` tinyint(1) NOT NULL DEFAULT '0',
  `user_listen` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_code` varchar(32) NOT NULL DEFAULT '',
  `user_remember` varchar(64) NOT NULL DEFAULT '',
  `user_avatar` varchar(128) NOT NULL DEFAULT '',
  `user_image` varchar(128) NOT NULL DEFAULT '',
  `user_counts` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 用户 => 收藏
-- love_source => 收藏来源 0 - 歌曲 / 1 - 合集
--

DROP TABLE IF EXISTS `fm_loves`;
CREATE TABLE IF NOT EXISTS `fm_loves` (
  `love_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `love_user` bigint(20) unsigned NOT NULL DEFAULT '0',
  `song_collection_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `love_source` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`love_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 设置
--

DROP TABLE IF EXISTS `fm_options`;
CREATE TABLE IF NOT EXISTS `fm_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(50) NOT NULL DEFAULT '',
  `option_value` varchar(256) NOT NULL DEFAULT '',
  PRIMARY KEY (`option_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO fm_options (option_name, option_value) VALUES ('success', '');
INSERT INTO fm_options (option_name, option_value) VALUES ('warning', '');

