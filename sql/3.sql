DROP TABLE IF EXISTS `ip_xmlrequest`;

CREATE TABLE `ip_xmlrequest` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(300) NOT NULL,
    `ip_address` varchar(40) NOT NULL,
    `company_id` int(11) NOT NULL,
    PRIMARY KEY(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into `ip_xmlrequest` (`name`, `ip_address`, `company_id`) values('localhost', '127.0.0.1', '3');