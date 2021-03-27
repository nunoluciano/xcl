<?php
/**
 * Installer Wizard - Step start welcome
 * @package XCL
 * @subpackage Installer
 * @version 2.3
 * @author Gigamaster (XCL)
 * @author Kilica (Legacy)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */


include './language/' . $language . '/welcome.php'; //This will set message to $content;

$error = false;
if ( substr( PHP_VERSION, 0, 1 ) < 5 ) {
	$error = true;
}
if ( ! $error ) {
	$wizard->assign( 'welcome', $content );
} else {
	$wizard->assign( 'message', _INSTALL_L168 );
	$wizard->setReload( true );
}

$wizard->render( 'install_start.tpl.php' );
