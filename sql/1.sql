#tables for company and directory
#

DROP TABLE IF EXISTS `directory`;
DROP TABLE IF EXISTS `company`;
DROP TABLE IF EXISTS `ip_xmlrequest`;

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
	`title` varchar(100) default NULL,
	`prompt` varchar(200) default NULL,
	PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `ip_xmlrequest` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(300) NOT NULL,
    `ip_address` varchar(40) NOT NULL,
    `company_id` int(11) NOT NULL,
    PRIMARY KEY(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;