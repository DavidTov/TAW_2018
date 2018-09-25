CREATE TABLE IF NOT EXISTS `#__imageshow_theme_slider` (
  `theme_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `img_transition_effect` char(30) DEFAULT 'random',
  `img_transparent_background` char(150) DEFAULT 'no',
  `toolbar_navigation_arrows_presentation` char(30) DEFAULT 'show-on-mouse-over',
  `toolbar_slideshow_player_presentation` char(30) DEFAULT 'hide',  
  `caption_show_caption` char(30) DEFAULT 'yes',
  `caption_title_css` text,
  `caption_description_css` text,
  `caption_link_css` text,
  `caption_caption_opacity` char(30) DEFAULT '75',
  `caption_title_show` char(30) DEFAULT 'yes',
  `caption_description_show` char(30) DEFAULT 'yes',
  `caption_link_show` char(30) DEFAULT 'no',  
  `caption_position` char(150) DEFAULT 'bottom',   
  `slideshow_slide_timming` int(11) DEFAULT '6',
  `slideshow_pause_on_mouseover` char(30) DEFAULT 'yes',
  `slideshow_auto_play` char(30) DEFAULT 'yes',
  `thumnail_panel_position` char(30) DEFAULT 'right',
  `thumbnail_panel_presentation` char(30) DEFAULT 'show',
  `thumbnail_presentation_mode` char(30) DEFAULT 'numbers',
  `thumbnail_active_state_color` char(30) DEFAULT '',
  `click_action` char(150) DEFAULT 'no_action',
  `open_link_in` char(150) DEFAULT 'current_browser',
  `transition_speed` char(150) DEFAULT '1',
  PRIMARY KEY (`theme_id`)
) DEFAULT CHARSET=utf8;
