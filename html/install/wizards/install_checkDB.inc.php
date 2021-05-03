<?php
/**
 * Installer Wizard - Step Check Database
 * @package XCL
 * @subpackage Installer
 * @version 2.3
 * @author Nuno Luciano (aka Gigamaster), 2020 XCL PHP7
 * @author Kilica (Legacy)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/>
 * @license   Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 */

include_once '../mainfile.php';
include_once './class/dbmanager.php';

$dbm   = new db_manager();
$title = _INSTALL_L104;

if ( ! $dbm->isConnectable() ) {
	$wizard->addArray( 'checks', _NGIMG . _INSTALL_L106 );
	$wizard->addArray( 'msgs', _INSTALL_L107 );
	$wizard->setBack( [ 'start', _INSTALL_L103 ] );
	$wizard->setReload( true );
} else {
	$wizard->addArray( 'checks', _OKIMG . _INSTALL_L108 );
	if ( ! $dbm->dbExists() ) {
		$wizard->addArray( 'checks', _NGIMG . sprintf( _INSTALL_L109, XOOPS_DB_NAME ) );
		$wizard->addArray( 'msgs', _INSTALL_L21 . '<br><b>' . XOOPS_DB_NAME . '</b>' );
		$wizard->addArray( 'msgs', _INSTALL_L22 );
	} else {
		$wizard->addArray( 'checks', _OKIMG . sprintf( _INSTALL_L110, XOOPS_DB_NAME ) );
		if ( ! $dbm->tableExists( 'users' ) ) {
			$wizard->addArray( 'msgs', _INSTALL_L111 );
			$wizard->setNext( [ 'createTables', _INSTALL_L40 ] );
		} elseif ( ! $dbm->tableExists( 'config' ) ) {
			$wizard->addArray( 'msgs', _INSTALL_L130 );
			$wizard->setNext( [ 'updateTables', _INSTALL_L14 ] );
		} else {
			$wizard->addArray( 'checks', _NGIMG . _INSTALL_L131 );
			$wizard->addArray( 'msgs', _INSTALL_L131 );
			$wizard->setBack( [ 'start', _INSTALL_L103 ] );
		}
	}
}
$wizard->render( 'install_checkDB.tpl.php' );
