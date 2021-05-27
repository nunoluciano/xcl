<?php
/**
 * @package XCL
 * @subpackage Installation Wizard
 * @version 2.3
 * @author Nuno Luciano (aka Gigamaster), 2020 XCL PHP7
 * @author Kilica (Legacy)
 * @copyright Copyright 2005-2021 XOOPSCube Project
 * @license   Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 */

// replace theme_default
require_once dirname( __DIR__ ) . '/wizards/install_insertData.inc.php';

$available_themes = [];
foreach ( $_POST as $key => $value ) {
	if ( preg_match( '/^option_themes_\d+$/', $key ) && preg_match( '/^\w+$/', $value ) ) {
		$available_themes[] = $value;
	}
}
if ( empty( $available_themes ) ) {
	$available_themes = [ 'xcl_default', 'xcl-bootstrap', 'xcl-foundation', 'xcl-spectre' ]; // !Todo Theme boilerplate
}

$default_theme = 'xcl_default';
if ( isset( $_POST['default_theme'] ) && preg_match( "/^\w+$/", $_POST['default_theme'] ) ) {
	$default_theme = $_POST['default_theme'];
	if ( ! in_array( $default_theme, $available_themes, true ) ) {
		$available_themes[] = $default_theme;
	}
}

$hd_query = [
	sprintf( 'update %s set conf_value="%s" where conf_name="theme_set" limit 1',
		$dbm->db->prefix( 'config' ), $default_theme ),
	sprintf( 'update %s set conf_value=\'%s\' where conf_name="theme_set_allowed" limit 1',
		$dbm->db->prefix( 'config' ), serialize( $available_themes ) ),
	sprintf( 'update %s set theme="%s" where uid =1 limit 1',
		$dbm->db->prefix( 'users' ), '' ),
];

foreach ( $hd_query as $hd_sql ) {
	$result = $dbm->query( $hd_sql );
}
