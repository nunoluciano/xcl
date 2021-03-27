<?php
/**
 * Installer Wizard - Step mainfile.php
 * @package XCL
 * @subpackage Installer
 * @version 2.3
 * @author Gigamaster (XCL)
 * @author Kilica (Legacy)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */


// checking XOOPS_ROOT_PATH and XOOPS_URL
include_once '../mainfile.php';

// "
$detected = str_replace( array( '\\', '/install' ), array( '/', '' ), getcwd() );
if ( '/' === substr( $detected, - 1 ) ) {
	$detected = substr( $detected, 0, - 1 );
}

if ( empty( $detected ) ) {
	$wizard->addArray( 'checks', _NGIMG . _INSTALL_L95 );
} elseif ( XOOPS_ROOT_PATH !== $detected ) {
	$wizard->addArray( 'checks', _NGIMG . sprintf( _INSTALL_L96, $detected ) );
} else {
	$wizard->addArray( 'checks', _OKIMG . _INSTALL_L97 );
}

if ( ! is_dir( XOOPS_ROOT_PATH ) ) {
	$wizard->addArray( 'checks', _NGIMG . _INSTALL_L99 );
}

if ( preg_match( '/^http[s]?:\/\/(.*)[^\/]+$/i', XOOPS_URL ) ) {
	$wizard->addArray( 'checks', _OKIMG . _INSTALL_L100 );
} else {
	$wizard->addArray( 'checks', _NGIMG . _INSTALL_L101 );
}

$wizard->render( 'install_mainfile.tpl.php' );
