<?php
/**
 *
 * @package Legacy
 * @version $Id: checklogin.php,v 1.3 2008/09/25 15:12:45 kilica Exp $
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 *
 */
/*------------------------------------------------------------------------*
 |  This file was entirely rewritten by the XOOPS Cube Legacy project for |
 |   keeping compatibility with XOOPS 2.0.x <https://www.xoops.org>        |
 *------------------------------------------------------------------------*/

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

$root =& XCube_Root::getSingleton();
$root->mController->checkLogin();

// ! ToDo Add after care!
