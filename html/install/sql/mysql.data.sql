# phpMyAdmin MySQL-Dump
# version 2.3.2
# http://www.phpmyadmin.net/ (download page)
#
# Host: localhost
# Generation Time: Jan 09, 2003 at 12:37 AM
# Server version: 3.23.54
# PHP Version: 4.2.2
# Database : `xoops2`


#
# Dumping data for table `bannerclient`
#

INSERT INTO bannerclient VALUES (0, 'Sample client', 'XOOPS Cube Project Team', '', '', '', '');

#
# Dumping data for table `bannerfinish`
#


#
# Dumping data for table `newblocks`
#
INSERT INTO newblocks (`bid`, `mid`, `func_num`, `options`, `name`, `title`, `content`, `side`, `weight`, `visible`, `block_type`, `c_type`, `isactive`, `dirname`, `func_file`, `show_func`, `edit_func`, `template`, `bcachetime`, `last_modified`) VALUES
(27,	0,	0,	'',	'Custom HTML',	'Welcome',	'<h2>Welcome to your new website!</h2>\r\n<p>The aim is to provie a web application platform to allow you to find the information you need with<br />\r\na more accessible format and expanded search capabilities, simpler navigation, and direct access to the information.&nbsp;</p>\r\n',	5,	0,	1,	'C',	'H',	1,	'',	'',	'',	'',	'',	0,	1587889128);


#
# Dumping data for table `group_permission`
#
INSERT INTO group_permission (`gperm_id`, `gperm_groupid`, `gperm_itemid`, `gperm_modid`, `gperm_name`) VALUES
(27,	1,	11,	1,	'module_admin');

#
# Dumping data for table `comments`
#


#
# Dumping data for table `configcategory`
#

INSERT INTO configcategory VALUES (1, '_MD_AM_GENERAL', 0);
INSERT INTO configcategory VALUES (4, '_MD_AM_CENSOR', 0);
INSERT INTO configcategory VALUES (5, '_MD_AM_SEARCH', 0);
INSERT INTO configcategory VALUES (6, '_MD_AM_MAILER', 0);

#
# Dumping data for table `configoption`
#

INSERT INTO configoption VALUES (1, '_MD_AM_DEBUGMODE1', '1', 13);
INSERT INTO configoption VALUES (2, '_MD_AM_DEBUGMODE2', '2', 13);
INSERT INTO configoption VALUES (3, '_NESTED', 'nest', 32);
INSERT INTO configoption VALUES (4, '_FLAT', 'flat', 32);
INSERT INTO configoption VALUES (5, '_THREADED', 'thread', 32);
INSERT INTO configoption VALUES (6, '_OLDESTFIRST', '0', 33);
INSERT INTO configoption VALUES (7, '_NEWESTFIRST', '1', 33);
INSERT INTO configoption VALUES (14, '_MD_AM_DEBUGMODE3', '3', 13);
INSERT INTO configoption VALUES (23, '_MD_AM_DEBUGMODE0', '0', 13);

INSERT INTO configoption VALUES (24,'PHP mail()','mail',64);
INSERT INTO configoption VALUES (25,'sendmail','sendmail',64);
INSERT INTO configoption VALUES (26,'SMTP','smtp',64);
INSERT INTO configoption VALUES (27,'SMTPAuth','smtpauth',64);



#
# Dumping data for table `image`
#


#
# Dumping data for table `imagebody`
#


#
# Dumping data for table `imagecategory`
#


#
# Dumping data for table `imgset`
#

INSERT INTO imgset VALUES (1, 'default', 0);

#
# Dumping data for table `imgset_tplset_link`
#

INSERT INTO imgset_tplset_link VALUES (1, 'default');

#
# Dumping data for table `online`
#


#
# Dumping data for table `priv_msgs`
#


#
# Dumping data for table `session`
#
