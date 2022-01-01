-- Date: 3/28/2020 8:33 AM
-- By: Talib Allauddin
-- Description: Added sort_position column in `products` table
ALTER TABLE `newmwpbnp1`.`products`
  ADD COLUMN `sort_position` INT (11) NULL AFTER `main_category_id`;

-- Date: 3/30/2020 4:35 PM
-- By: Talib Allauddin
-- Description: Added missing columns in `quotes_settings` table
ALTER TABLE `newmwpbnp1`.`quotes_settings`
  ADD COLUMN `executive_email` VARCHAR (120) NULL AFTER `max_cart_limit`;

ALTER TABLE `newmwpbnp1`.`quotes_settings`
  ADD COLUMN `executive_tel` VARCHAR (40) NULL AFTER `executive_email`;

ALTER TABLE `newmwpbnp1`.`quotes_settings`
  ADD COLUMN `admin_email` VARCHAR (120) NULL AFTER `executive_tel`;

ALTER TABLE `newmwpbnp1`.`quotes_settings`
  ADD COLUMN `admin_tel` VARCHAR (120) NULL AFTER `admin_email`;

ALTER TABLE `newmwpbnp1`.`quotes_settings`
  ADD COLUMN `transport_email` VARCHAR (120) NULL AFTER `admin_tel`;

ALTER TABLE `newmwpbnp1`.`quotes_settings`
  ADD COLUMN `transport_tel` VARCHAR (120) NULL AFTER `transport_email`;

ALTER TABLE `newmwpbnp1`.`quotes_settings`
  ADD COLUMN `contact_us_email` VARCHAR (120) NULL AFTER `transport_tel`;

ALTER TABLE `newmwpbnp1`.`quotes_settings`
  ADD COLUMN `contact_us_tel` VARCHAR (40) NULL AFTER `contact_us_email`;

-- Description: Added missing columns in `members` table
ALTER TABLE `newmwpbnp1`.`members`
  ADD COLUMN `verify_cnic` VARCHAR (18) NULL AFTER `verify_email`;

ALTER TABLE `newmwpbnp1`.`members`
  ADD COLUMN `verify_company_ntn_no` VARCHAR (30) NULL AFTER `verify_cnic`;

ALTER TABLE `newmwpbnp1`.`members`
  ADD COLUMN `verify_company_gst_no` VARCHAR (30) NULL AFTER `verify_company_ntn_no`;


-- Description: Added new columns in `quotes_settings` table
ALTER TABLE `newmwpbnp1`.`quotes_settings`
  ADD COLUMN `company_ntn_no` VARCHAR (30) NULL AFTER `drivers_tel`;

ALTER TABLE `newmwpbnp1`.`quotes_settings`
  ADD COLUMN `company_gst_no` VARCHAR (30) NULL AFTER `company_ntn_no`;

ALTER TABLE `newmwpbnp1`.`members`
  ADD COLUMN `geo_lat` DOUBLE (10, 4) NULL AFTER `notification_language`,
  ADD COLUMN `geo_lng` DOUBLE (10, 4) NULL AFTER `geo_lat`;

ALTER TABLE `newmwpbnp1`.`members`   
  CHANGE `geo_lat` `office_geo_lat` DOUBLE(10,4) NULL,
  CHANGE `geo_lng` `office_geo_lng` DOUBLE(10,4) NULL,
  ADD COLUMN `shipping_geo_lat` DOUBLE(10,4) NULL AFTER `office_geo_lng`,
  ADD COLUMN `shipping_geo_lng` DOUBLE(10,4) NULL AFTER `shipping_geo_lat`;

-- Date: 4/8/2020 9:42 PM
-- By: Talib Allauddin
-- Description: Added level_a, level_b, level_c, level_d column in `admin_user` table
ALTER TABLE `newmwpbnp1`.`admin_user`   
  ADD COLUMN `level_a` CHAR(1) NULL AFTER `commission`,
  ADD COLUMN `level_b` CHAR(1) NULL AFTER `level_a`,
  ADD COLUMN `level_c` CHAR(1) NULL AFTER `level_b`,
  ADD COLUMN `level_d` CHAR(1) NULL AFTER `level_c`;