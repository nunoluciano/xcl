<?php
/**
 * Installer Wizard - Step Database form
 * @package XCL
 * @subpackage Installer
 * @version 2.3
 * @author Gigamaster (XCL)
 * @author Kilica (Legacy)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */


include_once '../mainfile.php';
include_once './class/settingmanager.php';

$sm = new setting_manager();

$sm->readConstant();
$wizard->setContent( $sm->editform() );
$wizard->render();
