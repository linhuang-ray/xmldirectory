#tables for company and directory
#

DROP TABLE IF EXISTS `directory`;
DROP TABLE IF EXISTS `company`;

CREATE TABLE `directory` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`company_id` int(11) unsigned NOT NULL,
	`name` varchar(300) NOT NULL,
	`telephone` varchar(20) NOT NULL,
	PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `company` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(200) NOT NULL,
	`title` varchar(100) NOT NULL,
	`prompt` varchar(200) default NULL,
	PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


