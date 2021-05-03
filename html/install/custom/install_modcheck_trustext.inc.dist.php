<?php
/**
 * @package XCL
 * @subpackage Installer
 * @version 2.3
 * @author Nuno Luciano (aka Gigamaster), 2020 XCL PHP7
 * @author Kilica (Legacy)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/>
 * @license   Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 */

// checking XOOPS_ROOT_PATH and XOOPS_URL
include_once '../mainfile.php';


$writeok = [ 'cache/', 'templates_c', 'uploads/', 'uploads/xupdate/', 'modules/protector/configs/' ];
$error   = false;
foreach ( $writeok as $wok ) {
	if ( ! is_dir( XOOPS_TRUST_PATH . '/' . $wok ) ) {
		if ( file_exists( XOOPS_TRUST_PATH . '/' . $wok ) ) {
			@chmod( XOOPS_TRUST_PATH . '/' . $wok, 0666 );
			if ( ! is_writable( XOOPS_TRUST_PATH . '/' . $wok ) ) {
				$wizard->addArray( 'checks', _NGIMG . sprintf( _INSTALL_L83, $wok ) );
				$error = true;
			} else {
				$wizard->addArray( 'checks', _OKIMG . sprintf( _INSTALL_L84, $wok ) );
			}
		}
	} else {
		@chmod( XOOPS_TRUST_PATH . '/' . $wok, 0777 );
		if ( ! is_writable( XOOPS_TRUST_PATH . '/' . $wok ) ) {
			$wizard->addArray( 'checks', _NGIMG . sprintf( _INSTALL_L85, XOOPS_TRUST_PATH . '/' . $wok ) );
			$error = true;
		} else {
			$wizard->addArray( 'checks', _OKIMG . sprintf( _INSTALL_L86, XOOPS_TRUST_PATH . '/' . $wok ) );
		}
	}
}

if ( ! $error ) {
	$wizard->assign( 'message', _INSTALL_L87 );
} else {
	$wizard->assign( 'message', _INSTALL_L46 );
	$wizard->setReload( true );
}
$wizard->render( 'install_modcheck.tpl.php' );
