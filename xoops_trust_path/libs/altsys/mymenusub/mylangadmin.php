<?php
/**
 * Altsys library (UI-Components) for D3 modules
 *
 * @package    Altsys
 * @version    2.3
 * @author     Gigamaster, 2020 XCL PHP7
 * @author     Gijoe (Peak)
 * @copyright  Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license    https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */

if ( ! defined( 'XOOPS_ROOT_PATH' ) ) {
	exit;
}

$current_dirname = preg_replace( '/[^0-9a-zA-Z_-]/', '', @$_GET['dirname'] );

$db  = XoopsDatabaseFactory::getDatabaseConnection();
$mrs = $db->query( 'SELECT m.name,m.dirname,COUNT(l.mid) FROM ' . $db->prefix( 'modules' ) . ' m LEFT JOIN ' . $db->prefix( 'altsys_language_constants' ) . ' l ON m.mid=l.mid WHERE m.isactive GROUP BY m.mid ORDER BY m.weight,m.mid' );

$adminmenu = [];
while ( list( $name, $dirname, $count ) = $db->fetchRow( $mrs ) ) {
	if ( $dirname == $current_dirname ) {
		$adminmenu[] = [
			'selected' => true,
			'title'    => $name . " ($count)",
			'link'     => '?mode=admin&lib=altsys&page=mylangadmin&dirname=' . $dirname,
		];
		//$GLOBALS['altsysXoopsBreadcrumbs'][] = array( 'name' => htmlspecialchars( $name , ENT_QUOTES ) ) ;
	} else {
		$adminmenu[] = [
			'selected' => false,
			'title'    => $name . " ($count)",
			'link'     => '?mode=admin&lib=altsys&page=mylangadmin&dirname=' . $dirname,
		];
	}
}

// display
require_once XOOPS_TRUST_PATH . '/libs/altsys/class/D3Tpl.class.php';
$tpl = new D3Tpl();
$tpl->assign(
	[
		'adminmenu' => $adminmenu,
		'mypage'    => 'mylangadmin',
	]
);
$tpl->display( 'db:altsys_inc_mymenusub.html' );
