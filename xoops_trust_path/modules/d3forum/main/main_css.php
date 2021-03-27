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

// send header
if ( ! headers_sent() ) {
	$cache_limit = 3600;

	session_cache_limiter( 'public' );
	header( 'Expires: ' . date( 'r', (int) ( time() / $cache_limit ) * $cache_limit + $cache_limit ) );
	header( "Cache-Control: public, max-age=$cache_limit" );
	header( 'Last-Modified: ' . date( 'r', (int) ( time() / $cache_limit ) * $cache_limit ) );
	header( 'Content-Type: text/css' );
}

if ( is_object( $xoopsUser ) ) {
	$xoops_isuser  = true;
	$xoops_userid  = $xoopsUser->getVar( 'uid' );
	$xoops_uname   = $xoopsUser->getVar( 'uname' );
	$xoops_isadmin = $xoopsUserIsAdmin;
} else {
	$xoops_isuser  = false;
	$xoops_userid  = 0;
	$xoops_uname   = '';
	$xoops_isadmin = false;
}

if ( ! isset( $xoopsTpl ) ) {

	require_once XOOPS_ROOT_PATH . '/class/template.php';

	$xoopsTpl = new XoopsTpl();
}
$xoopsTpl->assign( [
		'mydirname'      => $mydirname,
		'mod_url'        => XOOPS_URL . '/modules/' . $mydirname,
		'xoops_config'   => $xoopsConfig,
		'mod_config'     => $xoopsModuleConfig,
		'xoops_theme'    => $xoopsConfig['theme_set'],
		'xoops_imageurl' => XOOPS_THEME_URL . '/' . $xoopsConfig['theme_set'] . '/',
		'xoops_themecss' => xoops_getcss( $xoopsConfig['theme_set'] ),
		'xoops_isuser'   => $xoops_isuser,
		'xoops_userid'   => $xoops_userid,
		'xoops_uname'    => $xoops_uname,
		'xoops_isadmin'  => $xoops_isadmin,
	]
);

$xoopsTpl->display( 'db:' . $mydirname . '_main.css' );
exit;
