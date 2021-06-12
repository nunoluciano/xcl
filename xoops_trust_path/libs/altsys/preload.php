<?php
/**
 * Altsys library (UI-Components) for D3 modules
 *
 * @package    Altsys
 * @version    2.3.1
 * @author     Gigamaster, 2020 XCL PHP7
 * @author     Gijoe (Peak)
 * @copyright  Copyright 2005-2021 XOOPSCube Project 
 * @license    https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 */

if ( ! defined( 'XOOPS_ROOT_PATH' ) ) {
	exit();
}
$root = XCube_Root::getSingleton();
//admin page
if ( $root->mController->_mStrategy && strtolower( get_class( $root->mController->_mStrategy ) ) == strtolower( 'Legacy_AdminControllerStrategy' ) ) {
	include_once __DIR__ . '/include/altsys_functions.php';
	// language file (modinfo.php)
	altsys_include_language_file( 'modinfo' );
}
// load altsys newly gticket class for other modules
require_once XOOPS_TRUST_PATH . '/libs/altsys/include/gtickets.php';
