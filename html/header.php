<?php
/**
 *
 * @package Legacy
 * @version $Id: header.php,v 1.3 2008/09/25 15:10:26 kilica Exp $
 * @copyright Copyright 2005-2021 XOOPSCube Project
 * @license https://github.com/xoopscube/xcl/blob/master/docs/GPL_V2.txt
 *
 */
/*------------------------------------------------------------------------*
 |  This file was entirely rewritten by the XOOPS Cube Legacy project for |
 |   keeping compatibility with XOOPS 2.0.x <https://www.xoops.org>        |
 *------------------------------------------------------------------------*/

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

$root=&XCube_Root::getSingleton();
if (!is_object($root->mController)) {
    exit();
}

$root->mController->executeHeader();
