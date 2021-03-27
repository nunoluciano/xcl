<?php
/**
 * Installer Wizard - Step finish
 * @package XCL
 * @subpackage Installer
 * @version 2.3
 * @author Gigamaster (XCL)
 * @author Kilica (Legacy)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */


include './language/' . $language . '/finish.php'; //This will set message to $content;

$wizard->assign( 'finish', $content );
$wizard->render( 'install_finish.tpl.php' );
