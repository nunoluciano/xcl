<?php
/**
 * Altsys library (UI-Components) for D3 modules
 * tplsadmin compiled cache hook
 * @package XCL
 * @subpackage Altsys
 * @version 2.3
 * @author Gijoe (Peak), Gigamaster (XCL)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */

/**
 * Save assigned variables for the template
 * @param $file
 * @param $smarty
 *
 * @return bool
 */
function tplsadmin_save_tplsvars( $file, $smarty ) {
	$tplsvars_file = 'tplsvars_';

	$tplsvars_file .= mb_substr( md5( mb_substr( XOOPS_DB_PASS, 0, 4 ) ), 0, 4 ) . '_';

	if ( 0 === strncmp( $file, 'db:', 3 ) ) {
		$tplsvars_file .= mb_substr( $file, 3 );
	} elseif ( 0 === strncmp( $file, 'file:', 5 ) ) {
		$tplsvars_file .= strtr( mb_substr( $file, 5 ), '/', '%' );
	} else {
		$tplsvars_file .= strtr( $file, '/', '%' );
	}

	if ( $fw = @fopen( XOOPS_COMPILE_PATH . '/' . $tplsvars_file, 'xb' ) ) {
		fwrite( $fw, serialize( $smarty->_tpl_vars ) );

		fclose( $fw );

		return true;
	}

	return false;
}
