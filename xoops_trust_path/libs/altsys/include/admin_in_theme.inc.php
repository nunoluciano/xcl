<?php
/**
 * Altsys library (UI-Components) for D3 modules
 * Render admin in theme.html
 * @package    Altsys
 * @version    2.3
 * @author     Gigamaster, 2020 XCL PHP7
 * @author     Gijoe (Peak)
 * @copyright  Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license    https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */

if ( is_object( $xoopsUser ) ) {

	$xoops_subpath = mb_substr( $_SERVER['REQUEST_URI'], mb_strpos( strrev( XOOPS_URL ), strrev( $_SERVER['HTTP_HOST'] ) ) );
	if ( preg_match( '#(^/admin.php|^/modules/system/|^/modules/[a-zA-Z0-9_.-]+/admin/)#', $xoops_subpath ) ) {
		// The request looks like admin
		require_once __DIR__ . '/altsys_functions.php';

		if ( ! empty( $GLOBALS['altsysModuleConfig']['admin_in_theme'] ) && file_exists( XOOPS_THEME_PATH . '/' . $GLOBALS['altsysModuleConfig']['admin_in_theme'] . '/theme.html' ) ) {
			// configs OK
			require_once __DIR__ . '/admin_in_theme_functions.php';

			// for security with register_globals=1
			unset( $GLOBALS['altsysAdminPageTitle'],
				/* $GLOBALS['altsysXoopsBreadcrumbs'] ,*/
				$GLOBALS['xoops_admin_contents'] );


			// disable error handler without XOOPS 2.0.14/15/16
			if ( ! ( is_object( @$xoopsLogger ) && method_exists( $xoopsLogger, 'render' ) && in_array( $xoopsConfig['debug_mode'], [
					1,
					2
				], true ) ) ) {
				restore_error_handler();
			}

			register_shutdown_function( 'altsys_admin_in_theme_in_last' );

			ob_start( 'altsys_admin_in_theme' );
		}
	}
}
