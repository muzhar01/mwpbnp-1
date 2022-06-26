
--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `add` tinyint(1) NOT NULL DEFAULT '0',
  `edit` tinyint(1) NOT NULL DEFAULT '0',
  `delete` tinyint(1) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `view` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `access` (`id`, `role_id`, `resource_id`, `add`, `edit`, `delete`, `published`, `view`) VALUES
(22, 10, 41, 1, 1, 1, 1, 1),
(66, 4, 6, 1, 1, 0, 0, 1),
(67, 4, 2, 1, 1, 0, 0, 1),
(68, 4, 42, 1, 1, 0, 0, 1),
(69, 10, 9, 1, 1, 0, 0, 1),
(70, 4, 41, 1, 1, 0, 0, 1),
(71, 4, 22, 1, 1, 0, 0, 1),
(72, 2, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------
--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `email_address` varchar(60) NOT NULL,
  `role_id` int(11) NOT NULL,
  `activiation_code` varchar(50) DEFAULT NULL,
  `create_on` int(11) DEFAULT NULL,
  `lastlogin_on` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `commission` float DEFAULT NULL,
  `level_a` char(1) DEFAULT NULL,
  `level_b` char(1) DEFAULT NULL,
  `level_c` char(1) DEFAULT NULL,
  `level_d` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin_user` (`id`, `name`, `address`, `city`, `zipcode`, `state`, `email_address`, `role_id`, `activiation_code`, `create_on`, `lastlogin_on`, `status`, `username`, `password`, `phone_number`, `commission`, `level_a`, `level_b`, `level_c`, `level_d`) VALUES
(1, 'Web', 'Web', 'Web', '44000', '44000', 'info@mwpbnp.com', 1, NULL, NULL, NULL, 1, 'admin', md5('admin123'), '0092514485888', 1, '0', '1', '1', '1');
-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
    `id` int(4) DEFAULT NULL,
    `area` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `area` (`id`, `area`) VALUES
  (1, 'Hummak Model Town'),
  (2, 'Hummak Industrial Area'),
  (3, 'Kahutta Road'),
  (4, 'Kahutta City'),
  (5, 'PWD Society'),
  (6, 'Sawan Garden'),
  (7, 'River Garden'),
  (8, 'Jinnah Garden'),
  (9, 'Naval Anchorge'),
  (10, 'Galla + Haran Mera'),
  (11, 'Japan Road + Jandala'),
  (12, 'Pakistan Town'),
  (13, 'Mughal Parri'),
  (14, 'Mughal Bunna'),
  (15, 'Manthob'),
  (16, 'Aarri'),
  (17, 'Chakiyan'),
  (18, 'Chak Aamdar'),
  (19, 'Aalyot'),
  (20, 'RCCI Rawat'),
  (21, 'Sawan Camp');

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE `article_category` (
        `id` int(11) NOT NULL,
        `name` varchar(255) NOT NULL,
        `description` text NOT NULL,
        `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `published` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `article_category` (`id`, `name`, `description`, `created_date`, `published`) VALUES
(5, 'Industry News', 'Industry News', '2010-10-19 03:42:09', 1),
(10, 'Country News', 'Country News', '2011-02-26 18:30:14', 1),
(11, 'Sports News', 'Sports News', '2011-03-04 11:46:26', 1),
(12, 'Entertainment News', 'Entertainment News', '2011-08-17 11:15:10', 1);
-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
 `id` int(11) NOT NULL,
 `name` varchar(255) NOT NULL,
 `account_no` varchar(20) NOT NULL,
 `account_title` varchar(100) NOT NULL,
 `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `published` tinyint(4) NOT NULL,
 `type` int(2) NOT NULL DEFAULT '2',
 `primary_name` varchar(100) NOT NULL,
 `charges` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `banks` (`id`, `name`, `account_no`, `account_title`, `created_date`, `published`, `type`, `primary_name`, `charges`) VALUES
(1, 'Habib Bank Ltd, Sihala Branch, Islamabad', '', 'MWP Business & Presentations Pvt Ltd.', '2011-07-17 11:25:32', 1, 1, 'HABIB-BANK-LTD,-SIHALA-BRANCH,-ISLAMABAD', '0'),
(2, 'Bank Al-Falah Ltd, Sihala Branch, Islamabad', '', 'Noor Ahmed Zeeshan', '2011-12-23 07:15:18', 1, 2, 'BANK-AL-FALAH-LTD,-SIHALA-BRANCH,-ISLAMABAD', '0'),
(3, 'Askari Bank Ltd. Sihala Branch, Islamabad', '', 'MWP Business & Presentations Pvt Ltd.', '2012-05-24 10:23:25', 1, 2, 'ASKARI-BANK-LTD.-SIHALA-BRANCH,-ISLAMABAD', '0'),
(4, 'Allied Bank Ltd. PWD Branch, Islamabad', '', 'Rehan Ahmed', '2016-11-23 18:11:28', 0, 2, 'ALLIED-BANK-LTD.-PWD-BRANCH,-ISLAMABAD', '0');
-- --------------------------------------------------------
--
-- Table structure for table `banner`
--
CREATE TABLE `banner` (
`id` int(11) NOT NULL,
`title` varchar(300) DEFAULT NULL,
`description` text,
`banner_url` text,
`url` text NOT NULL,
`position` tinyint(4) NOT NULL,
`created_date` date NOT NULL,
`page` varchar(300) DEFAULT NULL,
`published` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
--
-- Table structure for table `cart`
--
CREATE TABLE `cart` (
`id` int(11) NOT NULL,
`product_id` int(11) NOT NULL,
`size_id` int(11) NOT NULL,
`thickness_id` int(11) NOT NULL,
`quantity` float NOT NULL,
`ckt_qty` float DEFAULT NULL,
`height` decimal(10,2) NOT NULL DEFAULT '0.00',
`width` decimal(10,2) DEFAULT '0.00',
`type` varchar(20) DEFAULT NULL,
`created_by` varchar(200) NOT NULL,
`created_date` datetime NOT NULL,
`cart_type` varchar(2) DEFAULT NULL,
`user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
--
-- Table structure for table `category_sizes_listings`
--
CREATE TABLE `category_sizes_listings` (
           `id` int(11) NOT NULL,
           `category_id` int(11) NOT NULL,
           `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
     `ccode` varchar(2) NOT NULL DEFAULT '',
     `country` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO countries (ccode, country) VALUES ('PK','Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `customer_goods_return`
--

CREATE TABLE `customer_goods_return` (
 `id` int(11) NOT NULL,
 `mem_id` int(15) NOT NULL,
 `date` date NOT NULL,
 `return_reason` varchar(100) NOT NULL,
 `remarks` varchar(100) NOT NULL,
 `ref_no` int(15) NOT NULL,
 `goods_description` varchar(200) NOT NULL,
 `return_amount` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_payments`
--

CREATE TABLE `customer_payments` (
 `id` int(11) NOT NULL,
 `mem_id` int(15) NOT NULL,
 `amount_original` float NOT NULL,
 `amount_paid` float DEFAULT NULL,
 `amount_balance` float NOT NULL,
 `total_payment` float NOT NULL,
 `payment_method` varchar(100) NOT NULL,
 `invoice_no` int(15) NOT NULL,
 `payment_date` varchar(30) NOT NULL,
 `invoice_status` tinyint(4) NOT NULL,
 `ref_no` varchar(20) DEFAULT NULL,
 `remarks` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment_return`
--

CREATE TABLE `customer_payment_return` (
           `id` int(11) NOT NULL,
           `mem_id` int(15) NOT NULL,
           `date` date NOT NULL,
           `remarks` varchar(100) NOT NULL,
           `ref_no` int(15) NOT NULL,
           `payment_date` date NOT NULL,
           `payment_method` varchar(100) NOT NULL,
           `amount` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_receipts`
--

CREATE TABLE `customer_receipts` (
         `id` int(11) NOT NULL,
         `mem_id` int(15) NOT NULL,
         `amount_original` float NOT NULL,
         `amount_paid` float DEFAULT NULL,
         `amount_balance` float DEFAULT NULL,
         `payment_method` varchar(100) NOT NULL,
         `invoice_no` int(30) NOT NULL,
         `invoice_date` varchar(30) NOT NULL,
         `invoice_status` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
--
-- Table structure for table `customer_transaction`
--
CREATE TABLE `customer_transaction` (
            `id` int(5) NOT NULL,
            `type` varchar(25) NOT NULL,
            `num` varchar(10) NOT NULL,
            `date` datetime NOT NULL,
            `payment_method` varchar(100) NOT NULL,
            `amount` double NOT NULL,
            `mem_id` int(10) NOT NULL,
            `status_paid` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
--
-- Table structure for table `document_categories`
--
CREATE TABLE `document_categories` (
   `id` int(11) NOT NULL,
   `name` text NOT NULL,
   `description` text NOT NULL,
   `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   `published` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


--
-- Table structure for table `item`
--

CREATE TABLE `item` (
    `id` int(11) NOT NULL,
    `cat_id` int(11) DEFAULT NULL,
    `pro_id` int(11) DEFAULT NULL,
    `size_id` int(11) DEFAULT NULL,
    `thickness_id` int(11) DEFAULT NULL,
    `new_Qty` double DEFAULT NULL,
    `created_date` timestamp NULL DEFAULT NULL,
    `cost` float NOT NULL,
    `total` float NOT NULL,
    `vendor_id` int(100) NOT NULL,
    `ref_no` bigint NOT NULL,
    `bill_unique_no` bigint NOT NULL,
    `terms` text NOT NULL,
    `bill_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_current`
--

CREATE TABLE `item_current` (
    `id` int(11) NOT NULL,
    `created_date` timestamp NULL DEFAULT NULL,
    `cate_id` int(11) DEFAULT NULL,
    `pro_id` int(11) DEFAULT NULL,
    `size_id` int(11) DEFAULT NULL,
    `thickness_id` int(11) DEFAULT NULL,
    `current_Qty` double DEFAULT NULL,
    `current_avg_cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_return`
--

CREATE TABLE `item_return` (
   `id` int(11) NOT NULL,
   `cat_id` int(11) DEFAULT NULL,
   `pro_id` int(11) DEFAULT NULL,
   `size_id` int(11) DEFAULT NULL,
   `thickness_id` int(11) DEFAULT NULL,
   `new_Qty` double DEFAULT NULL,
   `created_date` timestamp NULL DEFAULT NULL,
   `cost` float NOT NULL,
   `total` float NOT NULL,
   `vendor_id` int(100) NOT NULL,
   `ref_no` int(100) NOT NULL,
   `bill_unique_no`bigint NOT NULL,
   `terms` text NOT NULL,
   `bill_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lookup`
--

CREATE TABLE `lookup` (
      `id` int(11) NOT NULL,
      `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
      `code` int(11) NOT NULL,
      `type` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
      `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
   `id` int(11) NOT NULL,
   `fname` varchar(100) DEFAULT NULL,
   `job_title` varchar(60) DEFAULT NULL,
   `cnic` varchar(50) DEFAULT NULL,
   `lname` varchar(100) DEFAULT NULL,
   `username` varchar(100) DEFAULT NULL,
   `address` varchar(100) DEFAULT NULL,
   `city` varchar(100) DEFAULT NULL,
   `zipcode` varchar(100) DEFAULT NULL,
   `zone` varchar(25) DEFAULT NULL,
   `area` varchar(25) DEFAULT NULL,
   `sales_officer` varchar(20) DEFAULT NULL,
   `phone_office` varchar(100) DEFAULT NULL,
   `phone_res` varchar(50) DEFAULT NULL,
   `fax_no` varchar(50) DEFAULT NULL,
   `email` varchar(100) DEFAULT NULL,
   `cellular` varchar(20) DEFAULT NULL,
   `cellular2` varchar(20) DEFAULT NULL,
   `cellular3` varchar(20) DEFAULT NULL,
   `company_name` varchar(50) DEFAULT NULL,
   `company_no` varchar(20) DEFAULT NULL,
   `company_ntn_no` varchar(25) DEFAULT NULL,
   `company_gst_no` varchar(25) DEFAULT NULL,
   `password` varchar(32) DEFAULT NULL,
   `status` tinyint(4) DEFAULT NULL,
   `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   `secret_key` varchar(255) DEFAULT NULL,
   `is_enable` tinyint(4) DEFAULT '0',
   `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'members type [Corporate - Retailers ]',
   `current_balance` float DEFAULT NULL,
   `allow_sms` tinyint(4) DEFAULT '1',
   `allow_email` tinyint(4) DEFAULT '1',
   `verify_sms` tinyint(4) DEFAULT '0',
   `verify_email` int(11) NOT NULL DEFAULT '1',
   `verify_cnic` varchar(18) DEFAULT NULL,
   `verify_company_ntn_no` varchar(30) DEFAULT NULL,
   `verify_company_gst_no` varchar(30) DEFAULT NULL,
   `notification_language` varchar(255) DEFAULT 'english',
   `office_geo_lat` double(10,4) DEFAULT NULL,
   `office_geo_lng` double(10,4) DEFAULT NULL,
   `shipping_geo_lat` double(10,4) DEFAULT NULL,
   `shipping_geo_lng` double(10,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--
-- Table structure for table `news`
--
CREATE TABLE `news` (
    `id` int(11) NOT NULL,
    `title` varchar(300) DEFAULT NULL,
    `intro_text` text,
    `desc` text,
    `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `published` tinyint(1) NOT NULL,
    `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
    `package_id` int(11) NOT NULL,
    `package_name` varchar(200) NOT NULL,
    `user_id` int(11) NOT NULL,
    `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `transection_id` char(255) NOT NULL,
    `ack` char(255) NOT NULL DEFAULT 'Processing'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
    `id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `quote_id` int(11) NOT NULL,
    `total_quote_value` float NOT NULL,
    `commission` float NOT NULL,
    `amountpaid` float NOT NULL,
    `balance` float NOT NULL,
    `comment` text NOT NULL,
    `status` int(11) DEFAULT '0',
    `created_date` datetime NOT NULL,
    `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pay_bill`
--

CREATE TABLE `pay_bill` (
    `id` int(11) NOT NULL,
    `bill_id` BIGINT NOT NULL,
    `vendor_id` int(10) NOT NULL,
    `bill_date` date NOT NULL,
    `discount` float NOT NULL,
    `amount_paid` float NOT NULL,
    `amount_due` float NOT NULL,
    `amount_balance` float NOT NULL,
    `bill_paid` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `slug` varchar(255) DEFAULT NULL,
    `meta_tag` varchar(255) DEFAULT NULL,
    `image` varchar(100) DEFAULT NULL,
    `weight` varchar(50) NOT NULL,
    `length` varchar(50) NOT NULL,
    `published` tinyint(4) NOT NULL,
    `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `category_id` int(11) NOT NULL,
    `gst_tax` float NOT NULL,
    `other_tax` float NOT NULL,
    `income_tax` float NOT NULL,
    `main_category_id` int(11) DEFAULT NULL,
    `sort_position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products_graph`
--

CREATE TABLE `products_graph` (
  `gid` int(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- --------------------------------------------------------
--
-- Table structure for table `products_sizes_listings`
--
CREATE TABLE `products_sizes_listings` (
   `id` int(11) NOT NULL,
   `product_id` int(11) NOT NULL,
   `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products_thickness_listings`
--

CREATE TABLE `products_thickness_listings` (
   `id` int(11) NOT NULL,
   `product_id` int(11) NOT NULL,
   `thickness_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_archive_price`
--

CREATE TABLE `product_archive_price` (
 `id` int(11) NOT NULL,
 `size_id` int(11) NOT NULL,
 `thickness_id` int(11) NOT NULL,
 `product_id` int(11) NOT NULL,
 `min_price` decimal(10,2) NOT NULL DEFAULT '0.00',
 `max_price` decimal(10,2) NOT NULL DEFAULT '0.00',
 `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_base_price`
--

CREATE TABLE `product_base_price` (
  `id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `thickness_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
    `id` int(11) NOT NULL,
    `parent_id` int(11) DEFAULT NULL,
    `label` varchar(255) NOT NULL,
    `slug` varchar(255) DEFAULT NULL,
    `date_added` datetime NOT NULL,
    `last_updated` datetime NOT NULL,
    `sort_order` int(11) NOT NULL,
    `published` tinyint(4) NOT NULL DEFAULT '1',
    `level` tinyint(4) NOT NULL DEFAULT '0',
    `unit` varchar(10) NOT NULL,
    `main_category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Table structure for table `product_main_category`
--
CREATE TABLE `product_main_category` (
     `id` int(11) NOT NULL,
     `category` varchar(50) DEFAULT NULL,
     `description` varchar(50) DEFAULT NULL,
     `unit` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `product_main_category` (`id`, `category`, `description`, `unit`) VALUES
  (1, 'Pipe', 'pipe', 'feet'),
  (2, 'Iron', 'Iron', 'Kgs'),
  (3, 'Deform bar', 'Deform Bar', 'Kgs'),
  (4, 'Door frame', 'Door frame', 'Kgs'),
  (5, 'Sheets', 'Sheets', 'each'),
  (6, 'Hardware', 'Hardware', 'each');
-- --------------------------------------------------------
--
-- Table structure for table `product_market_price`
--
CREATE TABLE `product_market_price` (
        `id` int(11) NOT NULL,
        `size_id` int(11) NOT NULL,
        `thickness_id` int(11) NOT NULL,
        `product_id` int(11) NOT NULL,
        `price` float NOT NULL DEFAULT '0',
        `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `last_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
--
-- Table structure for table `product_size`
--
CREATE TABLE `product_size` (
    `id` int(11) NOT NULL,
    `title` varchar(255) NOT NULL,
    `published` tinyint(4) NOT NULL,
    `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_thickness`
--

CREATE TABLE `product_thickness` (
 `id` int(11) NOT NULL,
 `title` varchar(255) NOT NULL,
 `mm` varchar(20) NOT NULL,
 `category_id` int(11) NOT NULL,
 `published` tinytext NOT NULL,
 `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_weight_listings`
--

CREATE TABLE `product_weight_listings` (
   `id` int(11) NOT NULL,
   `size_id` int(11) NOT NULL,
   `thickness_id` int(11) NOT NULL,
   `product_id` int(11) NOT NULL,
   `weight` double NOT NULL DEFAULT '0',
   `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_weight_listings_chowkat_tool`
--

CREATE TABLE `product_weight_listings_chowkat_tool` (
    `id` int(11) NOT NULL,
    `size_id` int(11) NOT NULL,
    `thickness_id` int(11) NOT NULL,
    `product_id` int(11) NOT NULL,
    `weight` double NOT NULL DEFAULT '0',
    `created_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `quote_id` varchar(30) NOT NULL,
  `member_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Processing',
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `billing_name` varchar(70) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `billing_city` varchar(50) NOT NULL,
  `billing_zipcode` varchar(10) NOT NULL,
  `billing_cellno` varchar(50) NOT NULL,
  `billing_phoneno` varchar(50) NOT NULL,
  `shipping_name` varchar(70) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_city` varchar(50) NOT NULL,
  `shipping_zipcode` varchar(10) NOT NULL,
  `shipping_cellno` varchar(50) NOT NULL,
  `shipping_phoneno` varchar(50) NOT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `quote_value` decimal(10,2) DEFAULT '0.00',
  `carriage` decimal(10,2) NOT NULL DEFAULT '0.00',
  `transport_charges` decimal(10,0) DEFAULT '0',
  `vehicle` varchar(255) DEFAULT NULL,
  `discount` decimal(10,0) NOT NULL DEFAULT '0',
  `quote_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 for normal Quote and 2 for chowkat',
  `chowak_installation` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'Installation ',
  `transection_id` varchar(100) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `commission` float DEFAULT NULL,
  `earning` float DEFAULT NULL,
  `comments` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quotes_order`
--

CREATE TABLE `quotes_order` (
    `id` bigint(20) NOT NULL,
    `product_id` int(11) NOT NULL,
    `quantity` float NOT NULL,
    `unit_price` float DEFAULT '0',
    `unit` varchar(10) NOT NULL,
    `thickness_id` int(11) NOT NULL,
    `size_id` int(11) NOT NULL,
    `price` decimal(10,2) NOT NULL,
    `gst_tax` float NOT NULL,
    `income_tax` float NOT NULL,
    `other_tax` float NOT NULL,
    `weight` int(11) DEFAULT NULL,
    `width` int(11) DEFAULT NULL,
    `height` int(11) DEFAULT NULL,
    `quote_id` int(11) NOT NULL,
    `additional` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quotes_settings`
--

CREATE TABLE `quotes_settings` (
   `id` int(11) NOT NULL,
   `loading_price` float NOT NULL,
   `unloading_price` float NOT NULL,
   `easypaisa_charges` float NOT NULL,
   `refund_charges` decimal(10,0) DEFAULT '0',
   `max_cart_limit` decimal(10,0) NOT NULL DEFAULT '0',
   `executive_email` varchar(120) DEFAULT NULL,
   `executive_tel` varchar(40) DEFAULT NULL,
   `admin_email` varchar(120) DEFAULT NULL,
   `admin_tel` varchar(120) DEFAULT NULL,
   `transport_email` varchar(120) DEFAULT NULL,
   `transport_tel` varchar(120) DEFAULT NULL,
   `contact_us_email` varchar(120) DEFAULT NULL,
   `contact_us_tel` varchar(40) DEFAULT NULL,
   `drivers_email` varchar(120) DEFAULT NULL,
   `drivers_tel` varchar(40) DEFAULT NULL,
   `company_ntn_no` varchar(30) DEFAULT NULL,
   `company_gst_no` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `quotes_settings` (`id`, `loading_price`, `unloading_price`, `easypaisa_charges`, `refund_charges`, `max_cart_limit`, `executive_email`, `executive_tel`, `admin_email`, `admin_tel`, `transport_email`, `transport_tel`, `contact_us_email`, `contact_us_tel`, `drivers_email`, `drivers_tel`, `company_ntn_no`, `company_gst_no`) VALUES
    (1, 0.5, 0.4, 1.2, '250', '500000', '', '', '', '', '', '', 'admin@gmail.com', '', '', '', '123456', '123456888999');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
     `id` int(11) NOT NULL,
     `name` varchar(100) NOT NULL,
     `published` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `resources` (`id`, `name`, `published`) VALUES
    (1, 'Webpages', 1),
    (2, 'Product Management', 1),
    (3, 'Admin Manager - Dashboard + Company Settings + Admin Users ', 1),
    (6, 'Customer Center - Member Menu Only', 1),
    (8, 'Videos', 1),
    (9, 'Reports', 1),
    (10, 'Iron Furniture', 1),
    (11, 'Advertisement + Banners', 1),
    (12, 'WebLinks', 1),
    (13, 'Payment Methods', 1),
    (14, 'News Letters', 1),
    (16, 'Vendor Center', 1),
    (17, 'Inventory Module', 1),
    (18, 'Expenses Module', 1),
    (19, 'Vehicle Management', 1),
    (20, 'Payments Center', 1),
    (21, 'Marketing Management', 1),
    (22, 'Sales Management', 1),
    (23, 'Customer Center - Full', 1),
    (24, 'Orders/ Cart Manager', 1),
    (25, 'Report - Customer Dues', 1),
    (27, 'Report - Payment Methods', 1),
    (28, 'Report - Customer List', 1),
    (29, 'Report - Customer Payments', 1),
    (30, 'Report - Receivable', 1),
    (31, 'Report - Vehicle Ledger', 1),
    (32, 'Report - Mobile & Email List', 1),
    (33, 'Report - Vendor Payments List', 1),
    (34, 'Report - Quotes Confirmed', 1),
    (36, 'Report - Orders Inline', 1),
    (37, 'Report - Order for Delivery', 1),
    (38, 'Report - Sales Force List', 1),
    (39, 'Report - Marketing Data Sheet', 1),
    (40, 'Report - Payables', 1),
    (41, 'Report - Current Price', 1),
    (42, 'Report - Current Inventory', 1);
-- --------------------------------------------------------

--
-- Table structure for table `rmp_assign_content`
--

CREATE TABLE `rmp_assign_content` (
          `id` int(11) NOT NULL,
          `created_date` date NOT NULL,
          `list_id` int(11) NOT NULL,
          `newsletter_id` int(11) NOT NULL,
          `published` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rmp_list`
--

CREATE TABLE `rmp_list` (
    `id` int(11) NOT NULL,
    `title` varchar(255) DEFAULT NULL,
    `description` text,
    `welcome_message` text,
    `unsubscription_message` text,
    `created_date` date DEFAULT NULL,
    `created_by` int(11) DEFAULT NULL,
    `color` varchar(10) DEFAULT NULL,
    `published` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rmp_log`
--

CREATE TABLE `rmp_log` (
   `id` int(11) NOT NULL,
   `subscriber_id` int(11) NOT NULL,
   `newsletter_id` int(11) NOT NULL,
   `deliver_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rmp_newsletter`
--

CREATE TABLE `rmp_newsletter` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_date` date NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `delivered_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rmp_queue`
--

CREATE TABLE `rmp_queue` (
     `id` int(11) NOT NULL,
     `delived_on` date NOT NULL,
     `subscriber_id` int(11) NOT NULL,
     `newsletter_id` int(11) NOT NULL,
     `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rmp_subscribers`
--

CREATE TABLE `rmp_subscribers` (
   `id` int(11) NOT NULL,
   `name` varchar(100) NOT NULL,
   `email_address` varchar(100) NOT NULL,
   `subscription_key` varchar(50) DEFAULT NULL,
   `subscription_date` date DEFAULT NULL,
   `unsubscription_date` date DEFAULT NULL,
   `status` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rmp_subscribers_list`
--

CREATE TABLE `rmp_subscribers_list` (
    `id` int(11) NOT NULL,
    `subscriber_id` int(11) NOT NULL,
    `list_id` int(11) NOT NULL,
    `subscription_on` date NOT NULL,
    `receiving_status` tinyint(4) NOT NULL DEFAULT '0',
    `published` tinyint(4) NOT NULL DEFAULT '0',
    `status` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rmp_templates`
--

CREATE TABLE `rmp_templates` (
     `id` int(11) NOT NULL,
     `name` varchar(30) NOT NULL,
     `published` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
        `id` int(11) NOT NULL,
        `name` varchar(50) NOT NULL,
        `published` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `role` (`id`, `name`, `published`) VALUES
(1, 'Super Web Admin ', 1),
(2, 'Admin Officer', 1),
(4, 'Sales Desk Admin', 1),
(5, 'Marketing Desk Admin', 1),
(8, 'Accounts Desk Admin', 1),
(10, 'Sales Officer', 1);
-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
    `id` int NOT NULL,
    `cart_settings` int NOT NULL DEFAULT '1',
    `logo` varchar(255) NOT NULL,
    `meta_tag` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    `meta_description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `settings` (`id`, `cart_settings`, `logo`, `meta_tag`, `meta_description`) VALUES
    (1, 1, '231-logo.png', 'Steel is primarily produced using one of two methods', 'Steel is primarily produced');

-- --------------------------------------------------------

--
-- Table structure for table `sms_content`
--

CREATE TABLE `sms_content` (
   `id` int(11) NOT NULL,
   `status_id` int(11) DEFAULT NULL,
   `sms_content` varchar(200) NOT NULL,
   `email_content` text NOT NULL,
   `sms_urdu_content` text NOT NULL,
   `email_urdu_content` text NOT NULL,
   `published` tinyint(4) DEFAULT '0',
   `created_date` datetime NOT NULL,
   `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `sms_content` (`id`, `status_id`, `sms_content`, `email_content`, `sms_urdu_content`, `email_urdu_content`, `published`, `created_date`, `created_by`) VALUES
(2, 3, 'Thank you for Signup with mwpbnp.com, your signup details has been sent on your registered email address.', '<p>Dear {{first_name}} {{last_name}},<br /> <br /> Thank you for visiting <a target=\"_blank\">mwpbnp.com</a> and registering with MWP, an exclusive sales and service center of MWP Business &amp; Presentations Pvt Ltd. an Iron and Steel Products Stockiest and Suppliers.<br /> <br /> &nbsp;As a <a target=\"_blank\">mwpbnp.com</a> registered user, you may:<br /> <br /> -&nbsp; View Online Current Market Rates of vide range of Iron and Steel products<br /> -&nbsp; View Archived Market Rates of vide range of Iron and Steel products of any specific day<br /> -&nbsp; Inquiry/ Quote/ Order online and deposit payment online through 12 different methods of payment<br /> - Obtain quote and order status updates.<br /> - View your online purchasing history.<br /> - Easy Processing<br /> - Guaranteed Weight on Computerized Digital Weighing Scales<br /> - Guaranteed Gauge as per standards<br /> - Customer Satisfaction is our aim<br /> <br /> And of course, you have access to all the other information and functionality available on <a target=\"_blank\">mwpbnp.com</a>.<br /> <br /> If you would like to make changes to your user profile information, including changing your password, selecting your site preferences, and adding your billing and shipping addresses, log into the site and select the MY ACCOUNT link located in the main navigation.<br /> <br /> Visit MWPBNP.com frequently for the latest product and services information.<br /> <br /> Please {{verify_link}} to confirm/verify your account.</p>\r\n<p>MWPBNP.Com Webmaster</p>', 'ببببببببببب', 'ککککککک', 1, '2018-08-11 01:08:17', NULL),
(3, 4, 'Thank you for your email verification, this will be your registered email address.', '<p>Thank you for your email verification, this will be your registered email address and will be used for all future correspondence.</p>', '', '', 1, '2018-08-11 11:08:44', NULL),
(4, 5, 'Thank you for your cell number verification, this will be your registered cell number with us.', '<p>Thank you for your cell number verification, this will be your registered cell number with us.</p>', 'ححح', 'ححح', 1, '2018-08-11 11:08:25', NULL),
(5, 6, 'Your Quotation/Order no. {{quote_id}} dated {{date}} has been created, and in process.', '<p>Your Quotation/Order no. {{quote_id}} dated {{date}} has been created, and in process. Let us know if you want to make any changes. Please proceed to make payment via any of available payment methods, and send a copy to us.</p>', '', '', 1, '2018-08-11 11:08:18', NULL),
(6, 8, 'Your Quotation/Order no. {{quote_id}} dated {{date}} has been created, and now processing for dispatch. Please make Payment of Rs. {{amount}}', '<p>Your Quotation/Order no. {{quote_id}} dated {{date}} has been created, and now processing for dispatch. Let us know if you want to make any changes. Please proceed to make payment of Rs. {{amount}} via any of available payment methods, and send a copy to us.</p>', '', '', 1, '2018-08-11 11:08:12', NULL),
(7, 9, 'Your Payment of Rs. {{amount}}  dated {{date}} has been received, Your remaining balance is Rs. {{balance}}. Thank you for your payment.', '<p>Your Payment of Rs. {{amount}} dated {{date}} has been received, Your remaining balance is Rs. {{balance}}. Thank you for your payment.</p>', '', '', 1, '2018-08-11 11:08:31', NULL),
(8, 10, 'Your Quotation/Order no. {{quote_id}} dated {{date}} is confirmed and soon will be dispatched. Please wait for a call from our delivery department.', '<p>Your Quotation/Order no.&nbsp;{{quote_id}} dated {{date}} is confirmed and soon will be dispatched. Please wait for a call from our delivery department.</p>', '', '', 1, '2018-08-11 11:08:06', NULL),
(9, 11, 'Your Quotation/Order no. {{quote_id}} dated {{date}} is ready for dispatch. Please wait for a call from our delivery department.', '<p>Your Quotation/Order no. {{quote_id}} dated {{date}} is ready for dispatch. Please wait for a call from our delivery department.</p>', '', '', 1, '2018-08-11 11:08:32', NULL),
(10, 12, 'Your Order no. {{quote_id}} dated {{date}} has been dispatched. Please take care of receiving your goods and Sign Delivery Note.', '<p>Your Order no. {{quote_id}} dated {{date}} has been dispatched. Please take care of receiving your goods and Sign Delivery Note.</p>', '', '', 1, '2018-08-11 11:08:07', NULL),
(11, 13, 'Your Order no. {{quote_id}} dated {{date}} has been delivered. Thank you for your Order.', '<p>Your Order no. {{quote_id}} dated {{date}} has been delivered. Thank you for your Order.</p>', '', '', 1, '2018-08-11 11:08:07', NULL),
(12, 14, 'Your Order no. {{quote_id}} dated {{date}} has been cancelled and refunded. Refund Policy applied.', '<p>Your Order no. {{quote_id}} dated {{date}} has been cancelled and refunded. Refund Policy applied.</p>', '', '', 1, '2018-08-11 11:08:00', NULL),
(13, 15, 'Your Order no. {{quote_id}} dated {{date}} has been CLOSED in the system', '<p>Your Order no. {{quote_id}} dated {{date}} has been CLOSED in the system.</p>', '', '', 1, '2018-08-11 11:08:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sms_trigger_status`
--

CREATE TABLE `sms_trigger_status` (
      `id` int(11) NOT NULL,
      `title` varchar(255) NOT NULL,
      `tag` varchar(255) DEFAULT NULL,
      `published` tinyint(4) DEFAULT '1',
      `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `sms_trigger_status` (`id`, `title`, `tag`, `published`, `created_date`) VALUES
(3, 'Member Signup', 'MEMBER_SIGNUP', 1, '2018-05-19 11:05:47'),
(4, 'Email Verified', 'EMAIL_VERIFIED', 1, '2018-05-19 11:05:56'),
(5, 'Cell Number Verified', 'CELL_NUMBER_VERIFIED', 1, '2018-05-19 11:05:42'),
(6, 'Order Creation', 'ORDER_CREATION', 1, '2018-05-19 11:05:33'),
(7, 'Order inprocess', 'ORDER_INPROCESS', 1, '2018-05-19 11:05:43'),
(8, 'Order Call Verified', 'ORDER_CALL_VERIFIED', 1, '2018-05-19 11:05:09'),
(9, 'Order Payment Verified', 'ORDER_PAYMENT_VERIFIED', 1, '2018-05-19 11:05:29'),
(10, 'Order Confirmed', 'ORDER_CONFIRMED', 1, '2018-05-19 11:05:33'),
(11, 'Order Ready for Delivery', 'ORDER_READY_FOR_DELIVERY', 1, '2018-05-19 11:05:47'),
(12, 'Order Dispatched', 'ORDER_DISPATCHED', 1, '2018-05-19 11:05:09'),
(13, 'Order Delivered', 'ORDER_DELIVERED', 1, '2018-05-19 11:05:25'),
(14, 'Order Refund', 'ORDER_REFUND', 1, '2018-05-19 11:05:46'),
(15, 'Order Close', 'ORDER_CLOSE', 1, '2018-05-19 11:05:54');
-- --------------------------------------------------------

--
-- Table structure for table `vehicle_drivers`
--

CREATE TABLE `vehicle_drivers` (
       `id` int(11) NOT NULL,
       `cnic` varchar(255) NOT NULL,
       `FullName` varchar(255) NOT NULL,
       `FatherName` varchar(255) NOT NULL,
       `current_salary` varchar(255) NOT NULL,
       `salary_last_increament` int(11) DEFAULT NULL,
       `last_increament_date` date DEFAULT NULL,
       `salary_leave_terms` text NOT NULL,
       `performance_remarks` text,
       `appointment_terms` text NOT NULL,
       `appointment_date` date NOT NULL,
       `contact_number` varchar(255) NOT NULL,
       `address` text NOT NULL,
       `status` varchar(255) DEFAULT 'Active',
       `added_on` datetime NOT NULL,
       `created_by` varchar(255) NOT NULL,
       `updated_by` int(11) DEFAULT NULL,
       `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_payments`
--

CREATE TABLE `vehicle_payments` (
    `id` int(11) NOT NULL,
    `vehicle_id` int(11) NOT NULL,
    `income` int(11) DEFAULT NULL,
    `reference` varchar(255) DEFAULT NULL,
    `expenses` int(11) DEFAULT NULL,
    `payment` int(11) DEFAULT NULL,
    `payment_date` datetime NOT NULL,
    `is_deleted` varchar(255) DEFAULT 'Active',
    `payment_mode` varchar(255) NOT NULL,
    `added_on` datetime NOT NULL,
    `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_registration`
--

CREATE TABLE `vehicle_registration` (
    `id` int(11) NOT NULL,
    `resigtration_number` varchar(255) NOT NULL,
    `date_of_registration` varchar(255) NOT NULL,
    `vehicle_type` varchar(255) NOT NULL,
    `maker_name` varchar(255) NOT NULL,
    `manufacturer_year` year(4) NOT NULL,
    `registered_loading_weight` varchar(255) NOT NULL,
    `loading_capacity_weight` varchar(255) NOT NULL,
    `loading_capacity_length` varchar(255) NOT NULL,
    `owner_name` varchar(255) NOT NULL,
    `owner_cnic` varchar(255) NOT NULL,
    `owner_contact_number` varchar(255) NOT NULL,
    `owner_address` varchar(255) DEFAULT NULL,
    `status` varchar(255) DEFAULT 'Active',
    `driver_id` int(11) NOT NULL,
    `added_on` datetime NOT NULL,
    `added_by` int(11) NOT NULL,
    `updated_by` int(11) DEFAULT NULL,
    `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `companyName` varchar(40) DEFAULT NULL,
  `clientName` varchar(40) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `openingBlance` double DEFAULT NULL,
  `openingDate` date DEFAULT NULL,
  `contactOne` varchar(40) DEFAULT NULL,
  `contactTwo` varchar(40) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  `rating` varchar(40) DEFAULT NULL,
  `current_balance` double DEFAULT NULL,
  `created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `video_type` varchar(30) NOT NULL,
  `file_url` text NOT NULL,
  `size` varchar(10) NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `fetured` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `weblinks`
--

CREATE TABLE `weblinks` (
    `id` int(11) NOT NULL,
    `title` varchar(100) NOT NULL,
    `url` varchar(255) NOT NULL,
    `type` varchar(100) NOT NULL,
    `published` tinyint(4) NOT NULL,
    `order` int(11) NOT NULL,
    `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `webpages`
--

CREATE TABLE `webpages` (
    `id` int(11) NOT NULL,
    `title` varchar(250) NOT NULL,
    `alias` varchar(255) NOT NULL,
    `seo_title` varchar(255) NOT NULL,
    `meta_keyword` text NOT NULL,
    `meta_description` text NOT NULL,
    `category` tinyint(4) NOT NULL,
    `detailtext` text NOT NULL,
    `published` tinyint(4) NOT NULL,
    `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


INSERT INTO `webpages` (`id`, `title`, `alias`, `seo_title`, `meta_keyword`, `meta_description`, `category`, `detailtext`, `published`, `created_date`) VALUES
(1, 'Welcome', 'welcome', 'Welcome', 'Welcome', 'Welcome', 1, '<h1 id=\"theming\">Theming</h1>\r\n<p>Theming is a systematic way of customizing the outlook of pages in a Web application. By applying a new theme, the overall appearance of a Web application can be changed instantly and dramatically.</p>\r\n<p>In Yii, each theme is represented as a directory consisting of view files, layout files, and relevant resource files such as images, CSS files, JavaScript files, etc. The name of a theme is its directory name. All themes reside under the same directory <code>WebRoot/themes</code>. At any time, only one theme can be active.</p>\r\n<blockquote class=\"tip\">\r\n<p><strong>Tip:</strong> The default theme root directory <code>WebRoot/themes</code> can be configured to be a different one. Simply configure the <a href=\"https://www.yiiframework.com/doc/api/1.1/CThemeManager#basePath\">basePath</a> and the <a href=\"https://www.yiiframework.com/doc/api/1.1/CThemeManager#baseUrl\">baseUrl</a> properties of the <a href=\"https://www.yiiframework.com/doc/api/1.1/CWebApplication#themeManager\">themeManager</a> application component to be the desired ones.</p>\r\n</blockquote>\r\n<h2 id=\"using-a-theme\">1. Using a Theme</h2>\r\n<p>To activate a theme, set the <a href=\"https://www.yiiframework.com/doc/api/1.1/CWebApplication#theme\">theme</a> property of the Web application to be the name of the desired theme. This can be done either in the <a href=\"https://www.yiiframework.com/doc/guide/1.1/en/basics.application#application-configuration\">application configuration</a> or during runtime in controller actions.</p>\r\n<blockquote class=\"note\">\r\n<p><strong>Note:</strong> Theme name is case-sensitive. If you attempt to activate a theme that does not exist, <code>Yii::app()-&gt;theme</code> will return <code>null</code>.</p>\r\n</blockquote>\r\n<h2 id=\"creating-a-theme\">2. Creating a Theme</h2>\r\n<p>Contents under a theme directory should be organized in the same way as those under the <a href=\"https://www.yiiframework.com/doc/guide/1.1/en/basics.application#application-base-directory\">application base path</a>. For example, all view files must be located under <code>views</code>, layout view files under <code>views/layouts</code>, and system view files under <code>views/system</code>. For example, if we want to replace the <code>create</code> view of <code>PostController</code> with a view in the <code>classic</code> theme, we should save the new view file as <code>WebRoot/themes/classic/views/post/create.php</code>.</p>\r\n<p>For views belonging to controllers in a <a href=\"https://www.yiiframework.com/doc/guide/1.1/en/basics.module\">module</a>, the corresponding themed view files should also be placed under the <code>views</code> directory. For example, if the aforementioned <code>PostController</code> is in a module named <code>forum</code>, we should save the <code>create</code> view file as <code>WebRoot/themes/classic/views/forum/post/create.php</code>. If the <code>forum</code> module is nested in another module named <code>support</code>, then the view file should be <code>WebRoot/themes/classic/views/support/forum/post/create.php</code>.</p>', 1, '2022-02-04 20:02:42'),
(2, 'About Us', 'about-us', 'About Us', 'About Us', 'About Us', 1, '<h1 id=\"theming\">About Us</h1>\r\n<p>Theming is a systematic way of customizing the outlook of pages in a Web application. By applying a new theme, the overall appearance of a Web application can be changed instantly and dramatically.</p>\r\n<p>In Yii, each theme is represented as a directory consisting of view files, layout files, and relevant resource files such as images, CSS files, JavaScript files, etc. The name of a theme is its directory name. All themes reside under the same directory <code>WebRoot/themes</code>. At any time, only one theme can be active.</p>\r\n<blockquote class=\"tip\">\r\n<p><strong>Tip:</strong> The default theme root directory <code>WebRoot/themes</code> can be configured to be a different one. Simply configure the <a href=\"https://www.yiiframework.com/doc/api/1.1/CThemeManager#basePath\">basePath</a> and the <a href=\"https://www.yiiframework.com/doc/api/1.1/CThemeManager#baseUrl\">baseUrl</a> properties of the <a href=\"https://www.yiiframework.com/doc/api/1.1/CWebApplication#themeManager\">themeManager</a> application component to be the desired ones.</p>\r\n</blockquote>\r\n<h2 id=\"using-a-theme\">1. Using a Theme</h2>\r\n<p>To activate a theme, set the <a href=\"https://www.yiiframework.com/doc/api/1.1/CWebApplication#theme\">theme</a> property of the Web application to be the name of the desired theme. This can be done either in the <a href=\"https://www.yiiframework.com/doc/guide/1.1/en/basics.application#application-configuration\">application configuration</a> or during runtime in controller actions.</p>\r\n<blockquote class=\"note\">\r\n<p><strong>Note:</strong> Theme name is case-sensitive. If you attempt to activate a theme that does not exist, <code>Yii::app()-&gt;theme</code> will return <code>null</code>.</p>\r\n</blockquote>\r\n<h2 id=\"creating-a-theme\">2. Creating a Theme</h2>\r\n<p>Contents under a theme directory should be organized in the same way as those under the <a href=\"https://www.yiiframework.com/doc/guide/1.1/en/basics.application#application-base-directory\">application base path</a>. For example, all view files must be located under <code>views</code>, layout view files under <code>views/layouts</code>, and system view files under <code>views/system</code>. For example, if we want to replace the <code>create</code> view of <code>PostController</code> with a view in the <code>classic</code> theme, we should save the new view file as <code>WebRoot/themes/classic/views/post/create.php</code>.</p>\r\n<p>For views belonging to controllers in a <a href=\"https://www.yiiframework.com/doc/guide/1.1/en/basics.module\">module</a>, the corresponding themed view files should also be placed under the <code>views</code> directory. For example, if the aforementioned <code>PostController</code> is in a module named <code>forum</code>, we should save the <code>create</code> view file as <code>WebRoot/themes/classic/views/forum/post/create.php</code>. If the <code>forum</code> module is nested in another module named <code>support</code>, then the view file should be <code>WebRoot/themes/classic/views/support/forum/post/create.php</code>.</p>', 1, '2022-02-04 20:02:42'),
(3, 'Terms and conditions of use', 'terms-and-conditions-of-use', 'Terms and conditions of use', 'terms-and-conditions-of-use', 'terms-and-conditions-of-use', 1, '<h1>Terms and conditions</h1>\r\n<p>Please enter your content</p>', 1, '2022-02-06 06:02:40'),
(4, 'Privacy Policy', 'privacy-policy', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', 1, '<h1>Privacy Policy</h1>\r\n<p>Add your content here.</p>', 1, '2022-02-06 06:02:08'),
(5, 'Refund Policy', 'refund-policy', 'Refund Policy', 'Refund Policy', 'Refund Policy', 1, '<h1>Refund Policy</h1>\r\n<p>Your content will be here</p>', 1, '2022-02-06 06:02:09'),
(6, 'Member Welcome', 'member-welcome', 'Member Welcome', 'Member Welcome', 'Member Welcomey', 1, '<h1>Member Welcome</h1>\r\n<p>Your content will be here</p>', 1, '2022-02-06 06:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
    `id` int(11) DEFAULT NULL,
    `zone` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
    ADD PRIMARY KEY (`id`),
    ADD KEY `role_id` (`role_id`),
    ADD KEY `resource_id` (`resource_id`);
--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
    ADD PRIMARY KEY (`id`),
    ADD KEY `role_id` (`role_id`);


--
-- Indexes for table `article_category`
--
ALTER TABLE `article_category`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
    ADD PRIMARY KEY (`id`),
    ADD KEY `product_id` (`product_id`,`size_id`,`thickness_id`);

--
-- Indexes for table `category_sizes_listings`
--
ALTER TABLE `category_sizes_listings`
    ADD PRIMARY KEY (`id`),
    ADD KEY `category_id` (`category_id`),
    ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
    ADD PRIMARY KEY (`ccode`);

--
-- Indexes for table `customer_goods_return`
--
ALTER TABLE `customer_goods_return`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_payments`
--
ALTER TABLE `customer_payments`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_payment_return`
--
ALTER TABLE `customer_payment_return`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_receipts`
--
ALTER TABLE `customer_receipts`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_categories`
--
ALTER TABLE `document_categories`
    ADD PRIMARY KEY (`id`);


--
-- Indexes for table `item`
--
ALTER TABLE `item`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_current`
--
ALTER TABLE `item_current`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_return`
--
ALTER TABLE `item_return`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lookup`
--
ALTER TABLE `lookup`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
    ADD PRIMARY KEY (`id`),
    ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
    ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
    ADD PRIMARY KEY (`id`),
    ADD KEY `user_id` (`user_id`),
    ADD KEY `quote_id` (`quote_id`);

--
-- Indexes for table `pay_bill`
--
ALTER TABLE `pay_bill`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
    ADD PRIMARY KEY (`id`),
    ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `products_graph`
--
ALTER TABLE `products_graph`
    ADD PRIMARY KEY (`gid`),
    ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products_sizes_listings`
--
ALTER TABLE `products_sizes_listings`
    ADD PRIMARY KEY (`id`),
    ADD KEY `product_id` (`product_id`),
    ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `products_thickness_listings`
--
ALTER TABLE `products_thickness_listings`
    ADD PRIMARY KEY (`id`),
    ADD KEY `product_id` (`product_id`),
    ADD KEY `thickness_id` (`thickness_id`);

--
-- Indexes for table `product_archive_price`
--
ALTER TABLE `product_archive_price`
    ADD PRIMARY KEY (`id`),
    ADD KEY `size_id` (`size_id`),
    ADD KEY `thickness_id` (`thickness_id`),
    ADD KEY `product_id` (`product_id`),
    ADD KEY `size_id_2` (`size_id`),
    ADD KEY `thickness_id_2` (`thickness_id`),
    ADD KEY `product_id_2` (`product_id`);

--
-- Indexes for table `product_base_price`
--
ALTER TABLE `product_base_price`
    ADD PRIMARY KEY (`id`),
    ADD KEY `size_id` (`size_id`),
    ADD KEY `thickness_id` (`thickness_id`),
    ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
    ADD PRIMARY KEY (`id`),
    ADD KEY `parent_id` (`parent_id`);

-- Indexes for table `product_main_category`
--
ALTER TABLE `product_main_category`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_market_price`
--
ALTER TABLE `product_market_price`
    ADD PRIMARY KEY (`id`),
    ADD KEY `size_id` (`size_id`),
    ADD KEY `thickness_id` (`thickness_id`),
    ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_thickness`
--
ALTER TABLE `product_thickness`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_weight_listings`
--
ALTER TABLE `product_weight_listings`
    ADD PRIMARY KEY (`id`),
    ADD KEY `size_id` (`size_id`),
    ADD KEY `thickness_id` (`thickness_id`),
    ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_weight_listings_chowkat_tool`
--
ALTER TABLE `product_weight_listings_chowkat_tool`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
    ADD PRIMARY KEY (`id`),
    ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `quotes_order`
--
ALTER TABLE `quotes_order`
    ADD PRIMARY KEY (`id`),
    ADD KEY `quote_id` (`quote_id`),
    ADD KEY `product_id` (`product_id`),
    ADD KEY `thickness_id` (`thickness_id`),
    ADD KEY `size_id` (`size_id`),
    ADD KEY `weight` (`weight`);

--
-- Indexes for table `quotes_settings`
--
ALTER TABLE `quotes_settings`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rmp_assign_content`
--
ALTER TABLE `rmp_assign_content`
    ADD PRIMARY KEY (`id`),
    ADD KEY `list_id` (`list_id`),
    ADD KEY `newsletter_id` (`newsletter_id`);

--
-- Indexes for table `rmp_list`
--
ALTER TABLE `rmp_list`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rmp_log`
--
ALTER TABLE `rmp_log`
    ADD PRIMARY KEY (`id`),
    ADD KEY `id` (`id`),
    ADD KEY `subscriber_id` (`subscriber_id`),
    ADD KEY `newsletter_id` (`newsletter_id`);

--
-- Indexes for table `rmp_newsletter`
--
ALTER TABLE `rmp_newsletter`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rmp_queue`
--
ALTER TABLE `rmp_queue`
    ADD PRIMARY KEY (`id`),
    ADD KEY `list_id` (`subscriber_id`),
    ADD KEY `newsletter_id` (`newsletter_id`);

--
-- Indexes for table `rmp_subscribers`
--
ALTER TABLE `rmp_subscribers`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rmp_subscribers_list`
--
ALTER TABLE `rmp_subscribers_list`
    ADD PRIMARY KEY (`id`),
    ADD KEY `subscriber_id` (`subscriber_id`),
    ADD KEY `list_id` (`list_id`);

--
-- Indexes for table `rmp_templates`
--
ALTER TABLE `rmp_templates`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_content`
--
ALTER TABLE `sms_content`
    ADD PRIMARY KEY (`id`),
    ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `sms_trigger_status`
--
ALTER TABLE `sms_trigger_status`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_drivers`
--
ALTER TABLE `vehicle_drivers`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_payments`
--
ALTER TABLE `vehicle_payments`
    ADD PRIMARY KEY (`id`),
    ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `vehicle_registration`
--
ALTER TABLE `vehicle_registration`
    ADD PRIMARY KEY (`id`),
    ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
    ADD PRIMARY KEY (`id`),
    ADD KEY `user_id` (`user_id`),
    ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `weblinks`
--
ALTER TABLE `weblinks`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webpages`
--
ALTER TABLE `webpages`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `adminmenu`
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `article_category`
--
ALTER TABLE `article_category`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=635;

--
-- AUTO_INCREMENT for table `category_sizes_listings`
--
ALTER TABLE `category_sizes_listings`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1052;

--
-- AUTO_INCREMENT for table `customer_goods_return`
--
ALTER TABLE `customer_goods_return`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_payments`
--
ALTER TABLE `customer_payments`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_payment_return`
--
ALTER TABLE `customer_payment_return`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_receipts`
--
ALTER TABLE `customer_receipts`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_transaction`
--
ALTER TABLE `customer_transaction`
    MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `document_categories`
--
ALTER TABLE `document_categories`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `iron_furniture_category`
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `item_current`
--
ALTER TABLE `item_current`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `item_return`
--
ALTER TABLE `item_return`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `lookup`
--
ALTER TABLE `lookup`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1310;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
    MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_bill`
--
ALTER TABLE `pay_bill`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products_graph`
--
ALTER TABLE `products_graph`
    MODIFY `gid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32389;
--
-- AUTO_INCREMENT for table `products_sizes_listings`
--
ALTER TABLE `products_sizes_listings`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1404;

--
-- AUTO_INCREMENT for table `products_thickness_listings`
--
ALTER TABLE `products_thickness_listings`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=720;

--
-- AUTO_INCREMENT for table `product_archive_price`
--
ALTER TABLE `product_archive_price`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=674870;

--
-- AUTO_INCREMENT for table `product_base_price`
--
ALTER TABLE `product_base_price`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17111;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product_main_category`
--
ALTER TABLE `product_main_category`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_market_price`
--
ALTER TABLE `product_market_price`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1037103;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `product_thickness`
--
ALTER TABLE `product_thickness`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `product_weight_listings`
--
ALTER TABLE `product_weight_listings`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7897;

--
-- AUTO_INCREMENT for table `product_weight_listings_chowkat_tool`
--
ALTER TABLE `product_weight_listings_chowkat_tool`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `quotes_order`
--
ALTER TABLE `quotes_order`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `quotes_settings`
--
ALTER TABLE `quotes_settings`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `rmp_assign_content`
--
ALTER TABLE `rmp_assign_content`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rmp_list`
--
ALTER TABLE `rmp_list`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rmp_log`
--
ALTER TABLE `rmp_log`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rmp_newsletter`
--
ALTER TABLE `rmp_newsletter`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rmp_queue`
--
ALTER TABLE `rmp_queue`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rmp_subscribers`
--
ALTER TABLE `rmp_subscribers`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rmp_subscribers_list`
--
ALTER TABLE `rmp_subscribers_list`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rmp_templates`
--
ALTER TABLE `rmp_templates`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms_content`
--
ALTER TABLE `sms_content`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sms_trigger_status`
--
ALTER TABLE `sms_trigger_status`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vehicle_drivers`
--
ALTER TABLE `vehicle_drivers`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle_payments`
--
ALTER TABLE `vehicle_payments`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vehicle_registration`
--
ALTER TABLE `vehicle_registration`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `weblinks`
--
ALTER TABLE `weblinks`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `webpages`
--
ALTER TABLE `webpages`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sms_content`
--
ALTER TABLE `sms_content`
    ADD CONSTRAINT `sms_content_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `sms_trigger_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Constraints for table `vehicle_registration`
--
ALTER TABLE `vehicle_registration`
    ADD CONSTRAINT `vehicle_registration_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `vehicle_drivers` (`id`);

ALTER TABLE `product_category` ADD CONSTRAINT `product_category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `product_category` (`id`);

ALTER TABLE `quotes_order`
    ADD CONSTRAINT `quotes_order_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
    ADD CONSTRAINT `quotes_order_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `product_size` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
    ADD CONSTRAINT `quotes_order_ibfk_3` FOREIGN KEY (`thickness_id`) REFERENCES `product_thickness` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
    ADD CONSTRAINT `quotes_order_ibfk_4` FOREIGN KEY (`weight`) REFERENCES `product_weight_listings` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `products` ADD FOREIGN KEY (`category_id`) REFERENCES `product_category`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

CREATE TABLE `paybill_current` (
       `id` int NOT NULL,
       `pay_date` datetime DEFAULT CURRENT_TIMESTAMP,
       `discount` float DEFAULT NULL,
       `amount_paid` float DEFAULT NULL,
       `payment_method` int DEFAULT NULL,
       `amount_due` float DEFAULT NULL,
       `amount_balance` float DEFAULT NULL,
       `bill_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
       `bill_id` bigint NOT NULL,
       `vendor_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paybill_current`
--
ALTER TABLE `paybill_current`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paybill_current`
--
ALTER TABLE `paybill_current`
    MODIFY `id` int NOT NULL AUTO_INCREMENT;


COMMIT;




