<?php
/**
 * checklogin
 * @package XCube
 * @version 2.3.0
 * @author kilica
 * @copyright Copyright 2005-2021 XOOPSCube Project  <https://github.com/xoopscube/>
 * @license   Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 * @brief This file was entirely rewritten by the XOOPS Cube Legacy project for
 * keeping compatibility with XOOPS 2.0.x <https://www.xoops.org>
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

$root =& XCube_Root::getSingleton();
$root->mController->checkLogin();

// ! Add after core!
