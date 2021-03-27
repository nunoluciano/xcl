<?php
/**
 * D3Forum module for XCL
 *
 * @package XCL
 * @subpackage D3Forum
 * @version 2.3
 * @author Gijoe (Peak), Gigamaster (XCL)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */

require_once __DIR__ . '/main_functions.php';
require_once __DIR__ . '/common_functions.php';

require_once dirname( __DIR__ ) . '/class/d3forum.textsanitizer.php';

$myts =& D3forumTextSanitizer::sGetInstance();

//$db =& Database::getInstance();
$db = &XoopsDatabaseFactory::getDatabaseConnection();

// GET $uid
$uid = is_object( @$xoopsUser ) ? $xoopsUser->getVar( 'uid' ) : 0;

$isadmin = $uid > 0 ? $xoopsUser->isAdmin() : false;

// post orders (default post_time desc)
$postorder = isset( $_COOKIE[ $mydirname . '_postorder' ] ) ? (int) $_COOKIE[ $mydirname . '_postorder' ] : 2;

// icon meanings
$d3forum_icon_meanings = explode( '|', $xoopsModuleConfig['icon_meanings'] );

// get this user's permissions as perm array
$category_permissions = d3forum_get_category_permissions_of_current_user( $mydirname );

$whr_read4cat = 'c.`cat_id` IN (' . implode( ',', array_keys( $category_permissions ) ) . ')';

$forum_permissions = d3forum_get_forum_permissions_of_current_user( $mydirname );

$whr_read4forum = 'f.`forum_id` IN (' . implode( ',', array_keys( $forum_permissions ) ) . ')';

// init xoops_breadcrumbs
if ( is_object( $xoopsModule ) ) {
	$xoops_breadcrumbs[0] = [ 'url'  => XOOPS_URL . '/modules/' . $mydirname . '/index.php',
	                          'name' => $xoopsModule->getVar( 'name' )
	];
} else {
	$xoops_breadcrumbs = [];
}

// init meta description //nao-pon
$d3forum_meta_description = '';
