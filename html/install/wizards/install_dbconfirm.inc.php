<?php
/**
 * Installer Wizard - Step Database confirm
 * @package XCL
 * @subpackage Installer
 * @version 2.3
 * @author Gigamaster (XCL)
 * @author Kilica (Legacy)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */


include_once './class/settingmanager.php';

$sm = new setting_manager( true );

$content = $sm->checkData();
if ( ! empty( $content ) ) {
	$wizard->setTitle( _INSTALL_L93 );
	$wizard->setContent( $content . $sm->editform() );
	$wizard->setNext( [ 'dbconfirm', _INSTALL_L91 ] );
} else {
	$wizard->setContent( $sm->confirmForm() );
}
$wizard->render();
