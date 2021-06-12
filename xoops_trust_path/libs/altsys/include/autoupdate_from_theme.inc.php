<?php
/**
 * Altsys library (UI-Components) for D3 modules
 *
 * @package    Altsys
 * @version    2.3.1
 * @author     Gigamaster, 2020 XCL PHP7
 * @author     Gijoe (Peak)
 * @copyright  Copyright 2005-2021 XOOPS Cube Project
 * @license    https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 */

if ( ! $xoopsConfig['theme_fromfile'] ) {
	return;
}

// templates/ under the theme
$tplsadmin_autoupdate_path = XOOPS_THEME_PATH . '/' . $xoopsConfig['theme_set'] . '/templates' ;

if ( $handler = @opendir( $tplsadmin_autoupdate_path . '/' ) ) {
	while ( false !== ( $file = readdir( $handler ) ) ) {
		$file_path = $tplsadmin_autoupdate_path . '/' . $file;

		if ( is_file( $file_path ) && '.tpl' == substr( $file, - 5 ) ) {
			$mtime = (int) ( @filemtime( $file_path ) );

			list( $count ) = $xoopsDB->fetchRow( $xoopsDB->query( 'SELECT COUNT(*) FROM ' . $xoopsDB->prefix( 'tplfile' ) . " WHERE tpl_tplset='" . addslashes( $xoopsConfig['template_set'] ) . "' AND tpl_file='" . addslashes( $file ) . "' AND tpl_lastmodified >= $mtime" ) );

			if ( $count <= 0 ) {
				include_once XOOPS_TRUST_PATH . '/libs/altsys/include/tpls_functions.php';

				tplsadmin_import_data( $xoopsConfig['template_set'], $file, implode( '', file( $file_path ) ), $mtime );
			}
		}
	}
}
