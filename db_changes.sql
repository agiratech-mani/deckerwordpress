
DROP TABLE IF EXISTS `dcom_web_device_history`;
CREATE TABLE IF NOT EXISTS `dcom_web_device_history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `token_id` bigint(20) unsigned NOT NULL,
  `device_id` bigint(20) unsigned NOT NULL,
  `access_ip` varchar(20) NOT NULL,
  `access_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `dcom_web_imports`;
CREATE TABLE IF NOT EXISTS `dcom_web_imports` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `file` varchar(500) NOT NULL,
  `user_id` bigint(11) unsigned NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dcom_web_import_users`
--

DROP TABLE IF EXISTS `dcom_web_import_users`;
CREATE TABLE IF NOT EXISTS `dcom_web_import_users` (
  `id` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `import_id` bigint(11) unsigned NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company` varchar(500) DEFAULT NULL,
  `validity` int(5) DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dcom_web_tokens`
--

DROP TABLE IF EXISTS `dcom_web_tokens`;
CREATE TABLE IF NOT EXISTS `dcom_web_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `order_type` enum('Order','Upload') DEFAULT 'Order',
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `product_id` bigint(20) unsigned DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `short_url` varchar(255) NOT NULL,
  `long_url` varchar(255) DEFAULT NULL,
  `token_device_limit` int(5) NOT NULL,
  `token_created_date` datetime NOT NULL,
  `token_expiry_date` datetime NOT NULL,
  `token_last_accessed` datetime NOT NULL,
  `token_last_device` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dcom_web_token_devices`
--

DROP TABLE IF EXISTS `dcom_web_token_devices`;
CREATE TABLE IF NOT EXISTS `dcom_web_token_devices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `token_id` bigint(20) unsigned NOT NULL,
  `device_os` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `device_type` varchar(255) NOT NULL,
  `user_agent` varchar(500) NOT NULL,
  `access_ip` varchar(20) NOT NULL,
  `device_create_date` datetime NOT NULL,
  `device_last_accessed` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

ALTER TABLE  `dcom_web_imports` ADD  `send_email` TINYINT( 1 ) NULL AFTER  `user_id` ;


ALTER TABLE  `dcom_web_imports` ADD  `report_to_email` VARCHAR( 100 ) NULL AFTER  `send_email` ;
