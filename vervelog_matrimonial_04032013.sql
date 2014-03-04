-- phpMyAdmin SQL Dump
-- version 3.3.1
-- http://www.phpmyadmin.net
--
-- Host: 204.93.216.11:3306
-- Generation Time: Mar 03, 2014 at 09:42 PM
-- Server version: 5.5.28
-- PHP Version: 5.2.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vervelog_matrimonial`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `city_std_code` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `state_primary_key` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state_primary_key` (`state_primary_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `city_std_code`, `state_primary_key`) VALUES
(1, 'jaipur', '141', 19),
(2, 'jodhpur', '', 27),
(3, 'Auckland', '', 35),
(4, 'jaiopur', '', 12),
(5, 'patna', '', 5),
(6, 'dhanbad', '', 1),
(7, 'bokaro', '', 5),
(8, 'bhuvneshwar', '', 24),
(9, 'adsf', '', 18),
(10, 'asdfadsf', '', 16),
(11, 'kota', '', 27),
(12, 'ayodhya', '', 32),
(13, 'mumbai', '', 19);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_isd_code` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `lang_code` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `lang_code2` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `country_name_in_hi` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `country_name_en_us` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `country_name_en_gb` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `country_name_it` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=250 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_isd_code`, `lang_code`, `lang_code2`, `country_name_in_hi`, `country_name_en_us`, `country_name_en_gb`, `country_name_it`) VALUES
(1, '', 'af', 'afg', '', 'Afghanistan', '', ''),
(2, '', 'ax', 'ala', '', 'Aland Islands', '', ''),
(3, '', 'al', 'alb', '', 'Albania', '', ''),
(4, '', 'dz', 'dza', '', 'Algeria', '', ''),
(5, '', 'as', 'asm', '', 'American Samoa', '', ''),
(6, '', 'ad', 'and', '', 'Andorra', '', ''),
(7, '', 'ao', 'ago', '', 'Angola', '', ''),
(8, '', 'ai', 'aia', '', 'Anguilla', '', ''),
(9, '', 'aq', '', '', 'Antarctica', '', ''),
(10, '', 'ag', 'atg', '', 'Antigua and Barbuda', '', ''),
(11, '', 'ar', 'arg', '', 'Argentina', '', ''),
(12, '', 'am', 'arm', '', 'Armenia', '', ''),
(13, '', 'aw', 'abw', '', 'Aruba', '', ''),
(14, '', 'au', 'aus', '', 'Australia', '', ''),
(15, '', 'at', 'aut', '', 'Austria', '', ''),
(16, '', 'az', 'aze', '', 'Azerbaijan', '', ''),
(17, '', 'bs', 'bhs', '', 'Bahamas', '', ''),
(18, '', 'bh', 'bhr', '', 'Bahrain', '', ''),
(19, '', 'bd', 'bgd', '', 'Bangladesh', '', ''),
(20, '', 'bb', 'brb', '', 'Barbados', '', ''),
(21, '', 'by', 'blr', '', 'Belarus', '', ''),
(22, '', 'be', 'bel', '', 'Belgium', '', ''),
(23, '', 'bz', 'blz', '', 'Belize', '', ''),
(24, '', 'bj', 'ben', '', 'Benin', '', ''),
(25, '', 'bm', 'bmu', '', 'Bermuda', '', ''),
(26, '', 'bt', 'btn', '', 'Bhutan', '', ''),
(27, '', 'bo', 'bol', '', 'Bolivia, Plurinational State of', '', ''),
(28, '', 'bq', 'bes', '', 'Bonaire, Sint Eustatius and Saba', '', ''),
(29, '', 'ba', 'bih', '', 'Bosnia and Herzegovina', '', ''),
(30, '', 'bw', 'bwa', '', 'Botswana', '', ''),
(31, '', 'bv', '', '', 'Bouvet Island', '', ''),
(32, '', 'br', 'bra', '', 'Brazil', '', ''),
(33, '', 'io', '', '', 'British Indian Ocean Territory', '', ''),
(34, '', 'bn', 'brn', '', 'Brunei Darussalam', '', ''),
(35, '', 'bg', 'bgr', '', 'Bulgaria', '', ''),
(36, '', 'bf', 'bfa', '', 'Burkina Faso', '', ''),
(37, '', 'bi', 'bdi', '', 'Burundi', '', ''),
(38, '', 'kh', 'khm', '', 'Cambodia', '', ''),
(39, '', 'cm', 'cmr', '', 'Cameroon', '', ''),
(40, '', 'ca', 'can', '', 'Canada', '', ''),
(41, '', 'cv', 'cpv', '', 'Cape Verde', '', ''),
(42, '', 'ky', 'cym', '', 'Cayman Islands', '', ''),
(43, '', 'cf', 'caf', '', 'Central African Republic', '', ''),
(44, '', 'td', 'tcd', '', 'Chad', '', ''),
(45, '', 'cl', 'chl', '', 'Chile', '', ''),
(46, '', 'cn', 'chn', '', 'China', '', ''),
(47, '', 'cx', '', '', 'Christmas Island', '', ''),
(48, '', 'cc', '', '', 'Cocos (Keeling) Islands', '', ''),
(49, '', 'co', 'col', '', 'Colombia', '', ''),
(50, '', 'km', 'com', '', 'Comoros', '', ''),
(51, '', 'cg', 'cog', '', 'Congo', '', ''),
(52, '', 'cd', 'cod', '', 'Congo, The Democratic Republic of the', '', ''),
(53, '', 'ck', 'cok', '', 'Cook Islands', '', ''),
(54, '', 'cr', 'cri', '', 'Costa Rica', '', ''),
(55, '', 'ci', 'civ', '', 'Cote d''Ivoire', '', ''),
(56, '', 'hr', 'hrv', '', 'Croatia', '', ''),
(57, '', 'cu', 'cub', '', 'Cuba', '', ''),
(58, '', 'cw', 'cuw', '', 'Curacao', '', ''),
(59, '', 'cy', 'cyp', '', 'Cyprus', '', ''),
(60, '', 'cz', 'cze', '', 'Czech Republic', '', ''),
(61, '', 'dk', 'dnk', '', 'Denmark', '', ''),
(62, '', 'dj', 'dji', '', 'Djibouti', '', ''),
(63, '', 'dm', 'dma', '', 'Dominica', '', ''),
(64, '', 'do', 'dom', '', 'Dominican Republic', '', ''),
(65, '', 'ec', 'ecu', '', 'Ecuador', '', ''),
(66, '', 'eg', 'egy', '', 'Egypt', '', ''),
(67, '', 'sv', 'slv', '', 'El Salvador', '', ''),
(68, '', 'gq', 'gnq', '', 'Equatorial Guinea', '', ''),
(69, '', 'er', 'eri', '', 'Eritrea', '', ''),
(70, '', 'ee', 'est', '', 'Estonia', '', ''),
(71, '', 'et', 'eth', '', 'Ethiopia', '', ''),
(72, '', 'fk', 'flk', '', 'Falkland Islands (Malvinas)', '', ''),
(73, '', 'fo', 'fro', '', 'Faroe Islands', '', ''),
(74, '', 'fj', 'fji', '', 'Fiji', '', ''),
(75, '', 'fi', 'fin', '', 'Finland', '', ''),
(76, '', 'fr', 'fra', '', 'France', '', ''),
(77, '', 'gf', 'guf', '', 'French Guiana', '', ''),
(78, '', 'pf', 'pyf', '', 'French Polynesia', '', ''),
(79, '', 'tf', '', '', 'French Southern Territories', '', ''),
(80, '', 'ga', 'gab', '', 'Gabon', '', ''),
(81, '', 'gm', 'gmb', '', 'Gambia', '', ''),
(82, '', 'ge', 'geo', '', 'Georgia', '', ''),
(83, '', 'de', 'deu', '', 'Germany', '', ''),
(84, '', 'gh', 'gha', '', 'Ghana', '', ''),
(85, '', 'gi', 'gib', '', 'Gibraltar', '', ''),
(86, '', 'gr', 'grc', '', 'Greece', '', ''),
(87, '', 'gl', 'grl', '', 'Greenland', '', ''),
(88, '', 'gd', 'grd', '', 'Grenada', '', ''),
(89, '', 'gp', 'glp', '', 'Guadeloupe', '', ''),
(90, '', 'gu', 'gum', '', 'Guam', '', ''),
(91, '', 'gt', 'gtm', '', 'Guatemala', '', ''),
(92, '', 'gg', 'ggy', '', 'Guernsey', '', ''),
(93, '', 'gn', 'gin', '', 'Guinea', '', ''),
(94, '', 'gw', 'gnb', '', 'Guinea-Bissau', '', ''),
(95, '', 'gy', 'guy', '', 'Guyana', '', ''),
(96, '', 'ht', 'hti', '', 'Haiti', '', ''),
(97, '', 'hm', '', '', 'Heard Island and McDonald Islands', '', ''),
(98, '', 'va', 'vat', '', 'Holy See (Vatican City State)', '', ''),
(99, '', 'hn', 'hnd', '', 'Honduras', '', ''),
(100, '', 'hk', 'hkg', '', 'Hong Kong', '', ''),
(101, '', 'hu', 'hun', '', 'Hungary', '', ''),
(102, '', 'is', 'isl', '', 'Iceland', '', ''),
(103, '', 'in', 'ind', '', 'India', '', ''),
(104, '', 'id', 'idn', '', 'Indonesia', '', ''),
(105, '', 'ir', 'irn', '', 'Iran, Islamic Republic of', '', ''),
(106, '', 'iq', 'irq', '', 'Iraq', '', ''),
(107, '', 'ie', 'irl', '', 'Ireland', '', ''),
(108, '', 'im', 'imn', '', 'Isle of Man', '', ''),
(109, '', 'il', 'isr', '', 'Israel', '', ''),
(110, '', 'it', 'ita', '', 'Italy', '', ''),
(111, '', 'jm', 'jam', '', 'Jamaica', '', ''),
(112, '', 'jp', 'jpn', '', 'Japan', '', ''),
(113, '', 'je', 'jey', '', 'Jersey', '', ''),
(114, '', 'jo', 'jor', '', 'Jordan', '', ''),
(115, '', 'kz', 'kaz', '', 'Kazakhstan', '', ''),
(116, '', 'ke', 'ken', '', 'Kenya', '', ''),
(117, '', 'ki', 'kir', '', 'Kiribati', '', ''),
(118, '', 'kp', 'prk', '', 'Korea, Democratic People''s Republic of', '', ''),
(119, '', 'kr', 'kor', '', 'Korea, Republic of', '', ''),
(120, '', 'kw', 'kwt', '', 'Kuwait', '', ''),
(121, '', 'kg', 'kgz', '', 'Kyrgyzstan', '', ''),
(122, '', 'la', 'lao', '', 'Lao People''s Democratic Republic', '', ''),
(123, '', 'lv', 'lva', '', 'Latvia', '', ''),
(124, '', 'lb', 'lbn', '', 'Lebanon', '', ''),
(125, '', 'ls', 'lso', '', 'Lesotho', '', ''),
(126, '', 'lr', 'lbr', '', 'Liberia', '', ''),
(127, '', 'ly', 'lby', '', 'Libyan Arab Jamahiriya', '', ''),
(128, '', 'li', 'lie', '', 'Liechtenstein', '', ''),
(129, '', 'lt', 'ltu', '', 'Lithuania', '', ''),
(130, '', 'lu', 'lux', '', 'Luxembourg', '', ''),
(131, '', 'mo', 'mac', '', 'Macao', '', ''),
(132, '', 'mk', 'mkd', '', 'Macedonia, The former Yugoslav Republic of', '', ''),
(133, '', 'mg', 'mdg', '', 'Madagascar', '', ''),
(134, '', 'mw', 'mwi', '', 'Malawi', '', ''),
(135, '', 'my', 'mys', '', 'Malaysia', '', ''),
(136, '', 'mv', 'mdv', '', 'Maldives', '', ''),
(137, '', 'ml', 'mli', '', 'Mali', '', ''),
(138, '', 'mt', 'mlt', '', 'Malta', '', ''),
(139, '', 'mh', 'mhl', '', 'Marshall Islands', '', ''),
(140, '', 'mq', 'mtq', '', 'Martinique', '', ''),
(141, '', 'mr', 'mrt', '', 'Mauritania', '', ''),
(142, '', 'mu', 'mus', '', 'Mauritius', '', ''),
(143, '', 'yt', 'myt', '', 'Mayotte', '', ''),
(144, '', 'mx', 'mex', '', 'Mexico', '', ''),
(145, '', 'fm', 'fsm', '', 'Micronesia, Federated States of', '', ''),
(146, '', 'md', 'mda', '', 'Moldova, Republic of', '', ''),
(147, '', 'mc', 'mco', '', 'Monaco', '', ''),
(148, '', 'mn', 'mng', '', 'Mongolia', '', ''),
(149, '', 'me', 'mne', '', 'Montenegro', '', ''),
(150, '', 'ms', 'msr', '', 'Montserrat', '', ''),
(151, '', 'ma', 'mar', '', 'Morocco', '', ''),
(152, '', 'mz', 'moz', '', 'Mozambique', '', ''),
(153, '', 'mm', 'mmr', '', 'Myanmar', '', ''),
(154, '', 'na', 'nam', '', 'Namibia', '', ''),
(155, '', 'nr', 'nru', '', 'Nauru', '', ''),
(156, '', 'np', 'npl', '', 'Nepal', '', ''),
(157, '', 'nl', 'nld', '', 'Netherlands', '', ''),
(158, '', 'nc', 'ncl', '', 'New Caledonia', '', ''),
(159, '', 'nz', 'nzl', '', 'New Zealand', '', ''),
(160, '', 'ni', 'nic', '', 'Nicaragua', '', ''),
(161, '', 'ne', 'ner', '', 'Niger', '', ''),
(162, '', 'ng', 'nga', '', 'Nigeria', '', ''),
(163, '', 'nu', 'niu', '', 'Niue', '', ''),
(164, '', 'nf', 'nfk', '', 'Norfolk Island', '', ''),
(165, '', 'mp', 'mnp', '', 'Northern Mariana Islands', '', ''),
(166, '', 'no', 'nor', '', 'Norway', '', ''),
(167, '', 'om', 'omn', '', 'Oman', '', ''),
(168, '', 'pk', 'pak', '', 'Pakistan', '', ''),
(169, '', 'pw', 'plw', '', 'Palau', '', ''),
(170, '', 'ps', 'pse', '', 'Palestinian Territory, Occupied', '', ''),
(171, '', 'pa', 'pan', '', 'Panama', '', ''),
(172, '', 'pg', 'png', '', 'Papua New Guinea', '', ''),
(173, '', 'py', 'pry', '', 'Paraguay', '', ''),
(174, '', 'pe', 'per', '', 'Peru', '', ''),
(175, '', 'ph', 'phl', '', 'Philippines', '', ''),
(176, '', 'pn', 'pcn', '', 'Pitcairn', '', ''),
(177, '', 'pl', 'pol', '', 'Poland', '', ''),
(178, '', 'pt', 'prt', '', 'Portugal', '', ''),
(179, '', 'pr', 'pri', '', 'Puerto Rico', '', ''),
(180, '', 'qa', 'qat', '', 'Qatar', '', ''),
(181, '', 're', 'reu', '', 'Reunion', '', ''),
(182, '', 'ro', 'rou', '', 'Romania', '', ''),
(183, '', 'ru', 'rus', '', 'Russian Federation', '', ''),
(184, '', 'rw', 'rwa', '', 'Rwanda', '', ''),
(185, '', 'bl', 'blm', '', 'Saint Barthelemy', '', ''),
(186, '', 'sh', 'shn', '', 'Saint Helena, Ascension and Tristan Da Cunha', '', ''),
(187, '', 'kn', 'kna', '', 'Saint Kitts and Nevis', '', ''),
(188, '', 'lc', 'lca', '', 'Saint Lucia', '', ''),
(189, '', 'mf', 'maf', '', 'Saint Martin (French Part)', '', ''),
(190, '', 'pm', 'spm', '', 'Saint Pierre and Miquelon', '', ''),
(191, '', 'vc', 'vct', '', 'Saint Vincent and The Grenadines', '', ''),
(192, '', 'ws', 'wsm', '', 'Samoa', '', ''),
(193, '', 'sm', 'smr', '', 'San Marino', '', ''),
(194, '', 'st', 'stp', '', 'Sao Tome and Principe', '', ''),
(195, '', 'sa', 'sau', '', 'Saudi Arabia', '', ''),
(196, '', 'sn', 'sen', '', 'Senegal', '', ''),
(197, '', 'rs', 'srb', '', 'Serbia', '', ''),
(198, '', 'sc', 'syc', '', 'Seychelles', '', ''),
(199, '', 'sl', 'sle', '', 'Sierra Leone', '', ''),
(200, '', 'sg', 'sgp', '', 'Singapore', '', ''),
(201, '', 'sx', 'sxm', '', 'Sint Maarten (Dutch Part)', '', ''),
(202, '', 'sk', 'svk', '', 'Slovakia', '', ''),
(203, '', 'si', 'svn', '', 'Slovenia', '', ''),
(204, '', 'sb', 'slb', '', 'Solomon Islands', '', ''),
(205, '', 'so', 'som', '', 'Somalia', '', ''),
(206, '', 'za', 'zaf', '', 'South Africa', '', ''),
(207, '', 'gs', '', '', 'South Georgia and The South Sandwich Islands', '', ''),
(208, '', 'ss', 'ssd', '', 'South Sudan', '', ''),
(209, '', 'es', 'esp', '', 'Spain', '', ''),
(210, '', 'lk', 'lka', '', 'Sri Lanka', '', ''),
(211, '', 'sd', 'sdn', '', 'Sudan', '', ''),
(212, '', 'sr', 'sur', '', 'Suriname', '', ''),
(213, '', 'sj', 'sjm', '', 'Svalbard and Jan Mayen', '', ''),
(214, '', 'sz', 'swz', '', 'Swaziland', '', ''),
(215, '', 'se', 'swe', '', 'Sweden', '', ''),
(216, '', 'ch', 'che', '', 'Switzerland', '', ''),
(217, '', 'sy', 'syr', '', 'Syrian Arab Republic', '', ''),
(218, '', 'tw', '', '', 'Taiwan, Province of China', '', ''),
(219, '', 'tj', 'tjk', '', 'Tajikistan', '', ''),
(220, '', 'tz', 'tza', '', 'Tanzania, United Republic of', '', ''),
(221, '', 'th', 'tha', '', 'Thailand', '', ''),
(222, '', 'tl', 'tls', '', 'Timor-Leste', '', ''),
(223, '', 'tg', 'tgo', '', 'Togo', '', ''),
(224, '', 'tk', 'tkl', '', 'Tokelau', '', ''),
(225, '', 'to', 'ton', '', 'Tonga', '', ''),
(226, '', 'tt', 'tto', '', 'Trinidad and Tobago', '', ''),
(227, '', 'tn', 'tun', '', 'Tunisia', '', ''),
(228, '', 'tr', 'tur', '', 'Turkey', '', ''),
(229, '', 'tm', 'tkm', '', 'Turkmenistan', '', ''),
(230, '', 'tc', 'tca', '', 'Turks and Caicos Islands', '', ''),
(231, '', 'tv', 'tuv', '', 'Tuvalu', '', ''),
(232, '', 'ug', 'uga', '', 'Uganda', '', ''),
(233, '', 'ua', 'ukr', '', 'Ukraine', '', ''),
(234, '', 'ae', 'are', '', 'United Arab Emirates', '', ''),
(235, '', 'gb', 'gbr', '', 'United Kingdom', '', ''),
(236, '', 'us', 'usa', '', 'United States', '', ''),
(237, '', 'um', '', '', 'United States Minor Outlying Islands', '', ''),
(238, '', 'uy', 'ury', '', 'Uruguay', '', ''),
(239, '', 'uz', 'uzb', '', 'Uzbekistan', '', ''),
(240, '', 'vu', 'vut', '', 'Vanuatu', '', ''),
(241, '', 've', 'ven', '', 'Venezuela, Bolivarian Republic of', '', ''),
(242, '', 'vn', 'vnm', '', 'Viet Nam', '', ''),
(243, '', 'vg', 'vgb', '', 'Virgin Islands, British', '', ''),
(244, '', 'vi', 'vir', '', 'Virgin Islands, U.S.', '', ''),
(245, '', 'wf', 'wlf', '', 'Wallis and Futuna', '', ''),
(246, '', 'eh', 'esh', '', 'Western Sahara', '', ''),
(247, '', 'ye', 'yem', '', 'Yemen', '', ''),
(248, '', 'zm', 'zmb', '', 'Zambia', '', ''),
(249, '', 'zw', 'zwe', '', 'Zimbabwe', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `history_table`
--

CREATE TABLE IF NOT EXISTS `history_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `internal_id_primary_key` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `history_table`
--


-- --------------------------------------------------------

--
-- Table structure for table `matrimonials`
--

CREATE TABLE IF NOT EXISTS `matrimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `father_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `mother_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `caste` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT ' ',
  `number_of_sisters` int(5) NOT NULL,
  `number_of_brothers` int(5) NOT NULL,
  `profession` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `salary` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `father_gotra` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `mother_gotra` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `nani_gotra` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `dadi_gotra` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `city_primary_key` int(11) NOT NULL,
  `state_primary_key` int(11) NOT NULL,
  `country_primary_key` int(11) NOT NULL,
  `zip` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT ' ',
  `contact_number` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `photo_primary_key` int(11) NOT NULL,
  `validation_primary_key` int(11) NOT NULL,
  `facebook_profile` varchar(256) CHARACTER SET latin1 NOT NULL,
  `twitter_profile` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin_profile` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `google_profile` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `profile_short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `profile_long_description` text COLLATE utf8_unicode_ci NOT NULL,
  `education` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `other_qualification` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `height` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT ' ',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `city_primary_key` (`city_primary_key`),
  KEY `state_primary_key` (`state_primary_key`),
  KEY `country_primary_key` (`country_primary_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `matrimonials`
--

INSERT INTO `matrimonials` (`id`, `user_id`, `first_name`, `last_name`, `date_of_birth`, `gender`, `father_name`, `mother_name`, `caste`, `number_of_sisters`, `number_of_brothers`, `profession`, `salary`, `father_gotra`, `mother_gotra`, `nani_gotra`, `dadi_gotra`, `email_address`, `address`, `city_primary_key`, `state_primary_key`, `country_primary_key`, `zip`, `contact_number`, `photo_primary_key`, `validation_primary_key`, `facebook_profile`, `twitter_profile`, `linkedin_profile`, `google_profile`, `profile_short_description`, `profile_long_description`, `education`, `other_qualification`, `height`, `provider`) VALUES
(8, 13, 'मनोज', 'जांगिड', '2014-02-22 00:00:00', 1, 'm', 'j', 'j', 0, 0, 'Engineering Manager', 'more than 90k', 'Airan/Aeron', 'Bansal', 'Goyal', 'Garg', 'manojjangid@yahoo.com', 'Y', 1, 27, 103, '302039', '0000', 12, 0, 'https://www.facebook.com/jangid2', '', '', '', 'Testçcccccccccccccccccccc\r\nGgggggggggcfddddddffhj\r\nGghhjjgfgjjkfghhjkfgkjghjj\r\n', 'Gghhhhggg\r\nHhhhhhhhhhhhhvvvvgggggvvgggggg\r\nBbhhhbbvvvbvvvbbvgg\r\nGhhhhhhggggggggggggg\r\n', 'BCA', 'G', '7.0', ' Facebook'),
(12, 18, 'Diana', 'Eliza', '1995-02-08 00:00:00', 1, 'sdfdsf', 'sdf', 'sdfaaa', 1, 2, 'Production Manager (Mining)', '0-10000', 'Bansal', 'Bindal', 'Singhal', 'Nangal', 'sdf@sdf.sdf', 'sdfsdf', 2, 27, 103, '302019', '111111', 17, 9, 'https://www.facebook.com/diana.eliza.583', '', '', '', 'test testtesttesttest test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test ', 'test', 'ICWA', 'sadf', '4.6', 'Facebook'),
(22, 23, 'Ramawtar', 'Saini', '1989-04-06 00:00:00', 1, 'test', 'test', 'Saini', 1, 2, 'Medical Administrator', '10000-20000', 'Nangal', 'Mangal', 'Madhukul', 'Mittal', 'ramawtar@vervelogic.com', 'test', 1, 1, 103, '333504', '1234567890', 23, 0, '', '', 'http://www.linkedin.com/pub/ramawtar-saini/89/696/762', '', 'testads fasd fasd fasd asd fasd fasd fklasdjlf;kasjdfasdlkfjasdfas fasl;d fl;asdk fl;sa dkflsa lfsadk f;ldsak l;fdsa kfl;dsak ', 'asd fl sadlkf kasdlkf ksadlk fklasdkf lasd kflsad ksdtestfasd fasd fasd fasd fasd fas fas fas fas fas fdsa fdas ', 'B.A', 'test', '5.6', 'Linkedin'),
(26, 28, 'santosh singh 123!@#', 'Chouhan', '1990-11-01 00:00:00', 1, 'KC singh chouhan 123!@#', 'Kalawati singh chouhan 123!@#', 'RAJPUT', 1, 2, 'Taxation Accountant', '60000-70000', 'Bansal', 'Bansal', 'Bansal', 'Bansal', 'iamthekingofindia@gmail.com', 'MANSAROVAR, JAIPUR, RAJASTHAN', 1, 37, 100, '302020', '9529421050', 28, 19, 'https://www.facebook.com/santoshsingh.chouhan.3', '', '', '', 'QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ', 'QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ', 'ICWA', 'CCNA, ccnp', '5.11', 'Facebook'),
(27, 29, 'rakhi singh', 'Chouhan', '2014-02-03 00:00:00', 1, 'sadhu singh chouhan', 'annapurna singh', 'JAT', 4, 5, 'Internal Auditor', '50000-60000', 'Kansal', 'Mangal', 'Kansal', 'Bansal', 'santoshec1990@gmail.com', 'dhanbad', 6, 1, 103, '828126', '9835307588', 29, 20, 'https://www.facebook.com/santoshsingh.chouhan.56', '', '', '', 'QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ', 'QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ', 'B.B.A', 'all', '5.5', 'Facebook'),
(28, 30, 'suman singh', 'Chouhan', '2014-02-03 00:00:00', 1, 'hari singh chouhan', 'Lali singh chouhan', 'jain', 4, 2, 'Taxation Accountant', '10000-20000', 'Kuchhal', 'Singhal', 'Nangal', 'Singhal', 'st.kr.smcet@gmail.com', 'patna', 5, 5, 103, '800001', '9835307588', 30, 22, 'https://www.facebook.com/santosh.chouhan.7739', '', '', '', '1QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ', 'QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ', 'B.Tech/B.E.', 'all', '5.3', 'Facebook'),
(29, 31, 'vimal singh', 'chouhan', '2014-02-17 00:00:00', 1, 'unknown', 'unknown', 'bengoli', 2, 2, 'Land Economist', '40000-50000', 'Mangal', 'Garg', 'Dharan', 'Jindal', 'santoshabc123456789@gmail.com', 'bokaro', 7, 5, 103, '828156', '98353075884546526546', 31, 0, 'https://www.facebook.com/profile.php?id=100007880529054', '', '', '', 'QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ', 'QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ', 'LLM', 'all', '5.5', 'Facebook'),
(30, 32, 'rahul ', 'singh', '2014-02-06 00:00:00', 1, 'ajit singh ', 'amin ', 'jat', 6, 2, 'External Auditor', '60000-70000', 'Garg', 'Dharan', 'Kansal', 'Garg', 'monalishamona3@gmail.com', 'odisha, ', 8, 24, 103, '600001', '9835307588', 32, 0, '', '', 'http://www.linkedin.com/pub/santosh-singh-chouhan/88/117/3bb', '', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'B.Sc', 'all', '5.3', 'Linkedin'),
(31, 33, 'anita ', 'singh', '2014-02-04 00:00:00', 1, 'amit shah', 'rekha singh', 'sindhi', 0, 0, 'Engineering Manager', '80000-90000', 'Tingal', 'Singhal', 'Singhal', 'Singhal', 'santoshofficial1990@gmail.com', 'Mira Marg\r\nMansarovar', 1, 27, 103, '302020', '9529421050', 33, 0, '', 'http://twitter.com/santoshusernam', '', '', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'Diploma', 'all', '', 'Twitter'),
(32, 34, 'anjali ', 'chouhan', '2014-02-11 00:00:00', 1, 'fasdfds', 'asdfads', 'RAJPUT', 0, 0, 'Internal Auditor', '50000-60000', 'Singhal', 'Nangal', 'Mangal', 'Mittal', 'iamthekingofindia@gmail.com', 'sdfa', 9, 18, 103, '6565656565', '9529421050', 34, 27, '', '', '', '', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'CS', '', '5.10', 'Linkedin'),
(33, 35, 'shiva', 'singh', '2014-02-05 00:00:00', 1, 'dkaldfsj', 'daf', 'asdadsf', 0, 0, 'External Auditor', '40000-50000', 'Bansal', 'Airan/Aeron', 'Bindal', 'Bindal', 'santoshofficial1990@gmail.com', 'Mira Marg\r\nMansarovar', 1, 27, 103, '302020', '54646464', 35, 0, '', '', 'http://www.linkedin.com/pub/santosh-singh-chouhan/71/664/115', '', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'CA', 'aaaa', '5.7', 'Linkedin'),
(35, 37, 'Leeladhar', 'Sodani', '1988-03-09 00:00:00', 1, 'RRRR', 'dddd', 'dsfsf', 1, 1, 'Production Manager (Mining)', '10000-20000', 'Bindal', 'Bindal', 'Nangal', 'Mittal', 'leeladharg@vervelogic.com', 'gdfg', 11, 27, 103, '253625', '25487454', 37, 0, 'https://www.facebook.com/leeladhar.sodani', '', '', '', 'Test TestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTestTest', 'Test ', 'CA', 'testtestest', '4.7', 'Facebook'),
(36, 38, 'ved vyas', 'VED', '2014-03-20 00:00:00', 1, 'ayur vyas', 'rig vyas', 'vyas', 1, 1, 'Accountant (General)', 'more than 90k', 'Kuchhal', 'Kansal', 'Gangal', 'Gangal', 'iamthekingofindia@gmail.com', 'ayodhya', 12, 32, 103, '500369', '9529421050', 38, 0, '', 'http://twitter.com/santoshsinghcho', '', '', 'PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR', 'QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS', 'ICWA', 'wisdom of vedas', 'More than 7.0', 'Twitter'),
(37, 39, 'sachine  ramesh', 'tendulkar', '2014-03-19 00:00:00', 1, 'ramesh tendulkar', '......................', 'tendulkar', 0, 2, 'Valuer', '20000-30000', 'Bansal', 'Bansal', 'Bansal', 'Bansal', 'santoshec1990@gmail.com', 'mumbai', 13, 19, 103, '600001', '9529421050', 39, 0, '', 'http://twitter.com/santosh0es', '', '', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'B.Pharma', 'adsljf', '5.2', 'Twitter'),
(38, 40, 'renuka singh ', 'rathore', '2014-03-31 00:00:00', 1, 'ram singh rathore', 'sawitri singh  rathore', 'rajput', 5, 5, 'Ship''s Engineer', '10000-20000', 'Tingal', 'Tingal', 'Tingal', 'Tingal', 'st.kr.smcet@gmail.com', 'jajpur', 1, 27, 103, '302020', '9529421050', 40, 0, '', '', 'http://www.linkedin.com/pub/santosh-singh-chouhan/91/707/b19', '', 'QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ', 'QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ', 'Integrated PG', '', '5.8', 'Linkedin');

-- --------------------------------------------------------

--
-- Table structure for table `message_received`
--

CREATE TABLE IF NOT EXISTS `message_received` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `internal_id_primary_key` int(11) NOT NULL,
  `internal_id_primary_key_from` int(11) NOT NULL,
  `sms_message` text COLLATE utf8_unicode_ci NOT NULL,
  `web_message` text COLLATE utf8_unicode_ci NOT NULL,
  `message_date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `message_received`
--

INSERT INTO `message_received` (`id`, `internal_id_primary_key`, `internal_id_primary_key_from`, `sms_message`, `web_message`, `message_date_time`) VALUES
(1, 19, 18, '', 'test', '2014-02-28 03:56:17'),
(2, 29, 28, '', 'aksdhfkadshjfldshf', '2014-02-28 04:19:25'),
(3, 28, 18, '', 'i am leeladhar Gurjar', '2014-02-28 04:25:37'),
(4, 34, 28, '', 'i am santosh singh chouhan', '2014-02-28 05:07:23'),
(5, 35, 28, '', 'i am santosh singh chouhan', '2014-02-28 05:07:55'),
(6, 18, 28, '', 'i am santosh singh chouhan', '2014-02-28 05:08:24'),
(7, 23, 18, '', 'This is request please accept', '2014-03-01 02:43:34'),
(10, 35, 18, 'This is test for vervelogic. This is test for vervelogic. This is test for vervelogic.', '', '2014-03-01 04:27:25'),
(11, 13, 37, '', 'This is testing from vervelogic.', '2014-03-01 05:43:23'),
(12, 32, 28, '', 'i am santosh singh chouhan ', '2014-03-02 22:33:07'),
(13, 39, 28, '', 'i am santosh singh chouhan', '2014-03-02 22:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `message_sent`
--

CREATE TABLE IF NOT EXISTS `message_sent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `internal_id_primary_key` int(11) NOT NULL,
  `internal_id_primary_key_to` int(11) NOT NULL,
  `sms_message` text COLLATE utf8_unicode_ci NOT NULL,
  `web_message` text COLLATE utf8_unicode_ci NOT NULL,
  `message_date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `message_sent`
--

INSERT INTO `message_sent` (`id`, `internal_id_primary_key`, `internal_id_primary_key_to`, `sms_message`, `web_message`, `message_date_time`) VALUES
(1, 18, 19, '', 'test', '2014-02-28 03:56:17'),
(2, 28, 29, '', 'aksdhfkadshjfldshf', '2014-02-28 04:19:24'),
(3, 18, 28, '', 'i am leeladhar Gurjar', '2014-02-28 04:25:36'),
(4, 28, 34, '', 'i am santosh singh chouhan', '2014-02-28 05:07:22'),
(5, 28, 35, '', 'i am santosh singh chouhan', '2014-02-28 05:07:55'),
(6, 28, 36, '', 'i am santosh singh chouhan', '2014-02-28 05:08:24'),
(7, 18, 23, '', 'This is request please accept', '2014-03-01 02:43:34'),
(10, 18, 35, 'This is test for vervelogic. This is test for vervelogic. This is test for vervelogic.', '', '2014-03-01 04:27:25'),
(11, 37, 13, '', 'This is testing from vervelogic.', '2014-03-01 05:43:22'),
(12, 28, 32, '', 'i am santosh singh chouhan ', '2014-03-02 22:33:07'),
(13, 28, 39, '', 'i am santosh singh chouhan', '2014-03-02 22:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `photo_customers`
--

CREATE TABLE IF NOT EXISTS `photo_customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `internal_id_primary_key` int(11) NOT NULL,
  `photo_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `photo_path` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=41 ;

--
-- Dumping data for table `photo_customers`
--

INSERT INTO `photo_customers` (`id`, `internal_id_primary_key`, `photo_name`, `photo_path`) VALUES
(9, 10, 'male.png', 'http://vervelogicshowcase.com/img/upload/male.png'),
(10, 11, '75fb06be0e43ca048906f16bb3b555c01.jpg', 'http://vervelogicshowcase.com/img/upload/75fb06be0e43ca048906f16bb3b555c01.jpg'),
(11, 12, '04-128.png', 'http://vervelogicshowcase.com/img/upload/04-128.png'),
(12, 13, 'social_image', 'https://graph.facebook.com/718937300/picture?type=square'),
(13, 14, 'social_image', 'https://graph.facebook.com/100004019767070/picture?type=square'),
(14, 15, 'social_image', 'https://graph.facebook.com/100004019767070/picture?type=square'),
(15, 16, '2.jpg', 'http://vervelogicshowcase.com/img/upload/2.jpg'),
(16, 17, 'social_image', 'https://graph.facebook.com/100004019767070/picture?type=square'),
(17, 18, 'social_image', 'https://graph.facebook.com/100007149124501/picture?type=square'),
(19, 20, 'g c reddy.jpg', 'http://vervelogicshowcase.com/img/upload/g c reddy.jpg'),
(20, 21, 'Bhagat_Singh_1929_140x190.jpg', 'http://vervelogicshowcase.com/img/upload/Bhagat_Singh_1929_140x190.jpg'),
(21, 22, 'img2.jpg', 'http://vervelogicshowcase.com/img/upload/img2.jpg'),
(22, 19, 'images5.jpg', 'http://vervelogicshowcase.com/img/upload/images5.jpg'),
(23, 23, 'seo-analisic.jpg', 'http://vervelogicshowcase.com/img/upload/seo-analisic.jpg'),
(24, 24, 'img10.jpg', 'http://vervelogicshowcase.com/img/upload/img10.jpg'),
(25, 25, '2.jpg', 'http://vervelogicshowcase.com/img/upload/2.jpg'),
(26, 26, '1.jpg', 'http://vervelogicshowcase.com/img/upload/1.jpg'),
(27, 27, 'g c reddy.jpg', 'http://vervelogicshowcase.com/img/upload/g c reddy.jpg'),
(28, 28, '2.jpg', 'http://vervelogicshowcase.com/img/upload/2.jpg'),
(29, 29, 'social_image', 'https://graph.facebook.com/100004019767070/picture?type=square'),
(30, 30, '1.jpg', 'http://vervelogicshowcase.com/img/upload/1.jpg'),
(31, 31, 'img2.jpg', 'http://vervelogicshowcase.com/img/upload/img2.jpg'),
(32, 32, 'g c reddy.jpg', 'http://vervelogicshowcase.com/img/upload/g c reddy.jpg'),
(33, 33, 'img2.jpg', 'http://vervelogicshowcase.com/img/upload/img2.jpg'),
(34, 34, 'aaa.png', 'http://vervelogicshowcase.com/img/upload/aaa.png'),
(35, 35, 'gold-biscuit-bars-798188.jpg', 'http://vervelogicshowcase.com/img/upload/gold-biscuit-bars-798188.jpg'),
(36, 36, 'im1.jpg', 'http://vervelogicshowcase.com/img/upload/im1.jpg'),
(37, 37, 'images6.jpg', 'http://vervelogicshowcase.com/img/upload/images6.jpg'),
(38, 38, 'veda-vyasa.jpg', 'http://vervelogicshowcase.com/img/upload/veda-vyasa.jpg'),
(39, 39, 'sachine tendulkar.jpg', 'http://vervelogicshowcase.com/img/upload/sachine tendulkar.jpg'),
(40, 40, 'renuka.jpg', 'http://vervelogicshowcase.com/img/upload/renuka.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `state_code` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `lang_code2` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `scid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `scid` (`scid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `state_code`, `lang_code2`, `scid`) VALUES
(1, 'Andaman and Nicobar Island (UT)', 'AND', '', 103),
(2, 'Andhra Pradesh', 'AP', '', 103),
(3, 'Arunachal Pradesh', 'ARP', '', 103),
(4, 'Assam', 'ASM', '', 103),
(5, 'Bihar', 'BH', '', 103),
(6, 'Chandigarh (UT)', '', '', 103),
(7, 'Chhattisgarh', 'CG', '', 103),
(8, 'Dadra and Nagar Haveli (UT)', '', '', 103),
(9, 'Daman and Diu (UT)', '', '', 103),
(10, 'Delhi (NCT)', 'DL', '', 103),
(11, 'Goa', 'GA', '', 103),
(12, 'Gujarat', 'GJ', '', 103),
(13, 'Haryana', 'HR', '', 103),
(14, 'Himachal Pradesh', 'HP', '', 103),
(15, 'Karnataka', 'KRT', '', 103),
(16, 'Kerala', 'KRL', '', 103),
(17, 'Lakshadweep (UT)', '', '', 103),
(18, 'Madhya Pradesh', 'MP', '', 103),
(19, 'Maharashtra', 'MH', '', 103),
(20, 'Manipur', 'MN', '', 103),
(21, 'Meghalaya', 'MGH', '', 103),
(22, 'Mizoram', 'MZ', '', 103),
(23, 'Nagaland', 'NG', '', 103),
(24, 'Odisha', 'OD', '', 103),
(25, 'Puducherry (UT)', '', '', 103),
(26, 'Punjab', 'PN', '', 103),
(27, 'Rajasthan', 'RJ', '', 103),
(28, 'Sikkim', 'SK', '', 103),
(29, 'Tamil Nadu', 'TN', '', 103),
(30, 'Tripura', 'TR', '', 103),
(31, 'Uttarakhand', 'UK', '', 103),
(32, 'Uttar Pradesh', 'UP', '', 103),
(33, 'West Bengal', 'WP', '', 103),
(34, 'aaaaaaaaa', '', '', 84),
(35, 'Auckland', '', '', 159),
(36, 'DSKFJADSLKJF', '', '', 87),
(37, '27', '', '', 100),
(38, 'Jharkhand', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unique_codes`
--

CREATE TABLE IF NOT EXISTS `unique_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `internal_id_primary_key` int(11) NOT NULL,
  `sms_code` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `web_code` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `unique_codes`
--

INSERT INTO `unique_codes` (`id`, `internal_id_primary_key`, `sms_code`, `web_code`) VALUES
(1, 33, '571286', '571286');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `uuid_twitter` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `uuid_facebook` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `uuid_google` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `uuid_linkedin` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `uuid_github` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `uuid_microsoft` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email_address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `registration_date_time` datetime NOT NULL,
  `is_user_approved` tinyint(1) NOT NULL,
  `user_sex` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=41 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `uuid_twitter`, `uuid_facebook`, `uuid_google`, `uuid_linkedin`, `uuid_github`, `uuid_microsoft`, `email_address`, `registration_date_time`, `is_user_approved`, `user_sex`) VALUES
(13, '718937300', '718937300', 'member', '', 'https://www.facebook.com/jangid2', '', '', '', '', 'manojjangid@yahoo.com', '2014-02-22 08:31:09', 1, 1),
(18, '100007149124501', '100007149124501', 'member', '', 'https://www.facebook.com/diana.eliza.583', '', '', '', '', 'sdf@sdf.sdf', '2014-02-25 05:55:58', 1, 0),
(21, '101974812533948425006', '101974812533948425006', 'member', '', '', 'https://profiles.google.com/101974812533948425006', '', '', '', 'santoshkc@vervelogic.com', '2014-02-25 23:33:56', 1, 0),
(23, 'qEV3Q4oHA6', 'qEV3Q4oHA6', 'member', '', '', '', 'http://www.linkedin.com/pub/ramawtar-saini/89/696/762', '', '', 'ramawtar@vervelogic.com', '2014-02-26 05:59:56', 1, 0),
(28, '100000930931533', '100000930931533', 'member', '', 'https://www.facebook.com/santoshsingh.chouhan.3', '', '', '', '', 'iamthekingofindia@gmail.com', '2014-02-28 00:42:58', 1, 1),
(29, '100004019767070', '100004019767070', 'member', '', 'https://www.facebook.com/santoshsingh.chouhan.56', '', '', '', '', 'santoshec1990@gmail.com', '2014-02-28 01:30:28', 1, 1),
(30, '100007891025113', '100007891025113', 'member', '', 'https://www.facebook.com/santosh.chouhan.7739', '', '', '', '', 'st.kr.smcet@gmail.com', '2014-02-28 01:54:36', 1, 1),
(31, '100007880529054', '100007880529054', 'member', '', 'https://www.facebook.com/profile.php?id=100007880529054', '', '', '', '', 'santoshabc123456789@gmail.com', '2014-02-28 01:38:48', 1, 1),
(32, '7KnfnMmx7e', '7KnfnMmx7e', 'member', '', '', '', 'http://www.linkedin.com/pub/santosh-singh-chouhan/88/117/3bb', '', '', 'monalishamona3@gmail.com', '2014-02-28 03:31:07', 1, 1),
(33, '2365437355', '2365437355', 'member', 'http://twitter.com/santoshusernam', '', '', '', '', '', 'santoshofficial1990@gmail.com', '2014-02-28 04:08:07', 1, 1),
(34, 'YUHXPgkfSr', 'YUHXPgkfSr', 'member', '', '', '', 'http://www.linkedin.com/pub/santosh-singh-chouhan/91/707/461', '', '', 'iamthekingofindia@gmail.com', '2014-02-28 04:47:57', 1, 1),
(35, 'i8HrqPJPit', 'i8HrqPJPit', 'member', '', '', '', 'http://www.linkedin.com/pub/santosh-singh-chouhan/71/664/115', '', '', 'santoshofficial1990@gmail.com', '2014-02-28 05:06:01', 1, 1),
(37, '100007667714184', '100007667714184', 'member', '', 'https://www.facebook.com/leeladhar.sodani', '', '', '', '', 'leeladharg@vervelogic.com', '2014-03-01 05:39:35', 1, 1),
(38, '333162846', '333162846', 'member', 'http://twitter.com/santoshsinghcho', '', '', '', '', '', 'iamthekingofindia@gmail.com', '2014-03-02 21:32:01', 1, 1),
(39, '2365415448', '2365415448', 'member', 'http://twitter.com/santosh0es', '', '', '', '', '', 'santoshec1990@gmail.com', '2014-03-02 22:49:35', 1, 1),
(40, 'j0i_z29GNQ', 'j0i_z29GNQ', 'member', '', '', '', 'http://www.linkedin.com/pub/santosh-singh-chouhan/91/707/b19', '', '', 'st.kr.smcet@gmail.com', '2014-03-02 22:16:55', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_count`
--

CREATE TABLE IF NOT EXISTS `user_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_count_country_primary_key` int(11) NOT NULL,
  `user_count_city_primary_key` int(11) NOT NULL,
  `user_count_sex` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_count`
--


-- --------------------------------------------------------

--
-- Table structure for table `validation_table`
--

CREATE TABLE IF NOT EXISTS `validation_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `internal_id_primary_key` int(11) NOT NULL,
  `proof_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `proof_path` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `validation_table`
--

INSERT INTO `validation_table` (`id`, `internal_id_primary_key`, `proof_name`, `proof_path`) VALUES
(1, 10, 'male.png', 'http://vervelogicshowcase.com/img/idproof/male.png'),
(2, 10, 'male.png', 'http://vervelogicshowcase.com/img/idproof/male.png'),
(3, 10, 'BB.jpg', 'http://vervelogicshowcase.com/img/idproof/BB.jpg'),
(4, 11, '3D-Print-Expo-Russia.jpg', 'http://vervelogicshowcase.com/img/idproof/3D-Print-Expo-Russia.jpg'),
(5, 12, '2.B.C.A.Syllabus.pdf', 'http://vervelogicshowcase.com/img/idproof/2.B.C.A.Syllabus.pdf'),
(6, 13, '1393085722099.jpg', 'http://vervelogicshowcase.com/img/idproof/1393085722099.jpg'),
(7, 15, 'g c reddy.jpg', 'http://vervelogicshowcase.com/img/idproof/g c reddy.jpg'),
(8, 17, '2.jpg', 'http://vervelogicshowcase.com/img/idproof/2.jpg'),
(9, 18, 'bg-image.jpg', 'http://vervelogicshowcase.com/img/idproof/bg-image.jpg'),
(10, 19, 'bg-pattern.png', 'http://vervelogicshowcase.com/img/idproof/bg-pattern.png'),
(11, 20, '2.jpg', 'http://vervelogicshowcase.com/img/idproof/2.jpg'),
(12, 21, '1.jpg', 'http://vervelogicshowcase.com/img/idproof/1.jpg'),
(13, 22, 'img2.jpg', 'http://vervelogicshowcase.com/img/idproof/img2.jpg'),
(14, 23, 'seo-analisic.jpg', 'http://vervelogicshowcase.com/img/idproof/seo-analisic.jpg'),
(15, 23, 'seo-analisic.jpg', 'http://vervelogicshowcase.com/img/idproof/seo-analisic.jpg'),
(16, 25, '2.jpg', 'http://vervelogicshowcase.com/img/idproof/2.jpg'),
(17, 26, '1.jpg', 'http://vervelogicshowcase.com/img/idproof/1.jpg'),
(18, 27, 'g c reddy.jpg', 'http://vervelogicshowcase.com/img/idproof/g c reddy.jpg'),
(19, 28, 'g c reddy.jpg', 'http://vervelogicshowcase.com/img/idproof/g c reddy.jpg'),
(20, 29, '2.jpg', 'http://vervelogicshowcase.com/img/idproof/2.jpg'),
(21, 29, '2.jpg', 'http://vervelogicshowcase.com/img/idproof/2.jpg'),
(22, 30, '1.jpg', 'http://vervelogicshowcase.com/img/idproof/1.jpg'),
(23, 31, 'img2.jpg', 'http://vervelogicshowcase.com/img/idproof/img2.jpg'),
(24, 32, 'g c reddy.jpg', 'http://vervelogicshowcase.com/img/idproof/g c reddy.jpg'),
(25, 32, 'g c reddy.jpg', 'http://vervelogicshowcase.com/img/idproof/g c reddy.jpg'),
(26, 33, 'img2.jpg', 'http://vervelogicshowcase.com/img/idproof/img2.jpg'),
(27, 34, '1.jpg', 'http://vervelogicshowcase.com/img/idproof/1.jpg'),
(28, 35, 'gold-biscuit-bars-798188.jpg', 'http://vervelogicshowcase.com/img/idproof/gold-biscuit-bars-798188.jpg'),
(29, 36, 'im1.jpg', 'http://vervelogicshowcase.com/img/idproof/im1.jpg'),
(30, 37, 'post-login-header-logo.png', 'http://vervelogicshowcase.com/img/idproof/post-login-header-logo.png'),
(31, 38, 'veda-vyasa.jpg', 'http://vervelogicshowcase.com/img/idproof/veda-vyasa.jpg'),
(32, 39, 'sachine tendulkar.jpg', 'http://vervelogicshowcase.com/img/idproof/sachine tendulkar.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`state_primary_key`) REFERENCES `states` (`id`);

--
-- Constraints for table `matrimonials`
--
ALTER TABLE `matrimonials`
  ADD CONSTRAINT `matrimonials_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `matrimonials_ibfk_2` FOREIGN KEY (`city_primary_key`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `matrimonials_ibfk_3` FOREIGN KEY (`state_primary_key`) REFERENCES `states` (`id`),
  ADD CONSTRAINT `matrimonials_ibfk_4` FOREIGN KEY (`country_primary_key`) REFERENCES `countries` (`id`);

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_ibfk_1` FOREIGN KEY (`scid`) REFERENCES `countries` (`id`);
