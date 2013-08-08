DROP TABLE IF EXISTS `directory`;
DROP TABLE IF EXISTS `company`;
DROP TABLE IF EXISTS `asset`;

# table for directory entry
CREATE TABLE `directory` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`company_id` int(11) unsigned NOT NULL,
	`name` varchar(300) NOT NULL,
	`telephone` varchar(20) NOT NULL,
	PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# the table for company information
CREATE TABLE `company` (
	`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(200) NOT NULL,
	`title` varchar(100) default NULL,
	`prompt` varchar(200) default NULL,
	PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


# table for asset information
# the xml key is used for asset to access xml file, the key is generated based on serial number and mac address
CREATE TABLE `asset` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `company_id` int(11) NOT NULL,
    `model` VARCHAR(20) NOT NULL,
    `serial_number` VARCHAR(20) NOT NULL,
    `mac` VARCHAR(20) NOT NULL,
    `xml_key` VARCHAR(50) NOT NULL,
    PRIMARY KEY(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;