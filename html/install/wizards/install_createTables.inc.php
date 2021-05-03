<?php

include_once '../mainfile.php';
include_once './class/dbmanager.php';

$dbm = new db_manager();

$tables = [];

$result = $dbm->queryFromFile( './sql/' . ( ( XOOPS_DB_TYPE === 'mysqli' ) ? 'mysql' : XOOPS_DB_TYPE ) . '.structure.sql' );

$wizard->assign( 'reports', $dbm->report() );
if ( ! $result ) {
	$wizard->assign( 'message', _INSTALL_L114 );
	$wizard->setBack( [ 'start', _INSTALL_L103 ] );
} else {
	$wizard->assign( 'message', _INSTALL_L115 );
}
$wizard->render( 'install_createTables.tpl.php' );
