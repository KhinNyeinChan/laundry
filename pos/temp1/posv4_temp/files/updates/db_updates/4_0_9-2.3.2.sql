ALTER TABLE `tec_settings` ADD `service_charges` VARCHAR(20) NOT NULL;
ALTER TABLE `tec_sales` ADD `service_charges` VARCHAR(20) NOT NULL;
UPDATE `tec_settings` SET `service_charges` = 0 WHERE `setting_id` = 1;
ALTER TABLE `tec_categories` ADD `printer_id` INT(10) NOT NULL;

UPDATE `tec_settings` SET `version` = '4.0.9-2.3.2' WHERE `setting_id` = 1;
UPDATE `tec_sales` SET `version` = '4.0.9-2.3.2';



CREATE TABLE IF NOT EXISTS `tec_brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
 
 CREATE TABLE IF NOT EXISTS `tec_expense_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

 ALTER TABLE `tec_expenses` ADD `ecategory_id` INT(11) NOT NULL;
 ALTER TABLE `tec_products` ADD `brand_id` INT(11)  NULL;
