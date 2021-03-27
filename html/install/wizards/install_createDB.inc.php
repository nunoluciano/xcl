<?php
/**
 * Installer Wizard - Step Create Database
 * @package XCL
 * @subpackage Installer
 * @version 2.3
 * @author Gigamaster (XCL)
 * @author Kilica (Legacy)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */


include_once '../mainfile.php';
include_once './class/dbmanager.php';

$dbm = new db_manager();
if ( ! $dbm->createDB() ) {
	$wizard->setContent( '<p>' . _INSTALL_L31 . '</p>' );
	$wizard->setNext( [ 'checkDB', _INSTALL_L104 ] );
	$wizard->setBack( [ 'start', _INSTALL_L103 ] );
} else {
	$wizard->setContent( '<div class="confirmOk">' . sprintf( _INSTALL_L43, XOOPS_DB_NAME ) . '</div>' );
}
$wizard->render();
