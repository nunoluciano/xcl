<?php
/**
 * Installer Wizard - Step Site Init (distribution)
 * @package XCL
 * @subpackage Installer
 * @version 2.3
 * @author Gigamaster (XCL)
 * @author Kilica (Legacy)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */


include_once '../mainfile.php';
include_once XOOPS_ROOT_PATH . '/class/xoopslists.php';

$current_timezone = date( 'O' );
$current_timediff = (float) ( $current_timezone[0] . ( substr( $current_timezone, 1, 2 ) + substr( $current_timezone, 3, 2 ) / 60 ) );
$wizard->assign( 'current_timediff', $current_timediff );

$wizard->assign( 'timediffs', XoopsLists::getTimeZoneList() );

$wizard->render( 'install_siteInit.tpl.php' );
