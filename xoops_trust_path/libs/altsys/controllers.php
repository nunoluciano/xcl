<?php
/**
 * Altsys library (UI-Components) for D3 modules
 * @package    Altsys
 * @version    2.3
 * @author     Gigamaster, 2020 XCL PHP7
 * @author     Gijoe (Peak)
 * @copyright  Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license    https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */

if ( file_exists( __DIR__ . '/language/' . $GLOBALS['xoopsConfig']['language'] . '/modinfo.php' ) ) {
	include_once __DIR__ . '/language/' . $GLOBALS['xoopsConfig']['language'] . '/modinfo.php';
} elseif ( file_exists( __DIR__ . '/language/english/modinfo.php' ) ) {
	include_once __DIR__ . '/language/english/modinfo.php';
}

$controllers = [
	'myblocksadmin',
	'compilehookadmin',
	'get_templates',
	'get_tplsvarsinfo',
	'mypreferences',
	'mytplsadmin',
	'mytplsform',
	'put_templates',
	'mylangadmin',
];
