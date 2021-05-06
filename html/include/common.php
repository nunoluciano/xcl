<?php
/**
 * Common Cubecore.init
 * @package Legacy
 * @version 2.3.0
 * @author kilica
 * @copyright Copyright 2005-2021 XOOPSCube Project  <https://github.com/xoopscube/>
 * @license   Legacy : https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 * @brief  This file was entirely rewritten by the XOOPS Cube Legacy project for
 * keeping compatibility with XOOPS 2.0.x <https://www.xoops.org>
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}
require_once XOOPS_ROOT_PATH . '/include/cubecore_init.php';

$root=&XCube_Root::getSingleton();
$xoopsController=&$root->getController();
$xoopsController->executeCommon();
