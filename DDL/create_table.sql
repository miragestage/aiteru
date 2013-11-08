
use aiteru;


DROP TABLE IF EXISTS `shops`;
CREATE TABLE IF NOT EXISTS `shops` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `gmap_lat` DECIMAL(18,15) NULL,
  `gmap_lng` DECIMAL(18,15) NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


