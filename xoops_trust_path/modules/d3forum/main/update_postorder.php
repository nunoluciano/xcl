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

include dirname( __DIR__ ) . '/include/common_prepend.php';

// get cookie path
$xoops_cookie_path = defined( 'XOOPS_COOKIE_PATH' ) ? XOOPS_COOKIE_PATH : preg_replace( '?http://[^/]+(/.*)$?', '$1', XOOPS_URL );

if ( XOOPS_URL == $xoops_cookie_path ) {
	$xoops_cookie_path = '/';
}

// update cookie
setcookie( $mydirname . '_postorder', (int) $_GET['postorder'], time() + 86400 * 30, $xoops_cookie_path );

$allowed_identifiers = [ 'post_id', 'topic_id', 'forum_id' ];

if ( in_array( $_GET['ret_name'], $allowed_identifiers ) ) {
	$ret_request = $_GET['ret_name'] . '=' . (int) $_GET['ret_val'];
} else {
	$ret_request = "topic_id=$topic_id";
}

header( 'Location: ' . XOOPS_URL . "/modules/$mydirname/index.php?$ret_request" );
exit;
