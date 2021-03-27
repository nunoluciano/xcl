<?php
/**
 * Installer Wizard - Step Database Update avatars
 * @package XCL
 * @subpackage Installer
 * @version 2.3
 * @author Gigamaster (XCL)
 * @author Kilica (Legacy)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */


$content = '<p>' . _INSTALL_L151 . '</p>';
$b_next  = [ 'updateAvatars_go', _INSTALL_L139 ];

include './install_tpl.php';
