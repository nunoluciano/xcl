<?php
/**
 * Pico content management D3 module for XCL
 *
 * @package XCL
 * @subpackage Pico
 * @version 2.3
 * @author Gijoe (Peak), Gigamaster (XCL)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */

$mytrustdirname = basename( __DIR__ );
$mytrustdirpath = __DIR__;

// check permission of 'module_read' of this module
// (already checked by common.php)

$langmanpath = XOOPS_TRUST_PATH . '/libs/altsys/class/D3LanguageManager.class.php';

if ( ! file_exists( $langmanpath ) ) {
	die( 'install the latest altsys' );
}

require_once( $langmanpath );

$langman = D3LanguageManager::getInstance();

$langman->read( 'main.php', $mydirname, $mytrustdirname );

// get page name (new in 2008-03-24)
$page = preg_replace( '/[^a-zA-Z0-9_-]/', '', @$_GET['page'] );

if ( empty( $page ) ) {
	preg_match( '/[?&]page\=([a-zA-Z0-9_-]+)/', @$_SERVER['REQUEST_URI'], $regs );
	$page = @$regs[1];
}

// fork each pages
if ( file_exists( "$mytrustdirpath/main/$page.php" ) ) {

	include "$mytrustdirpath/main/$page.php";

} else {

	include "$mytrustdirpath/main/index.php";

}
