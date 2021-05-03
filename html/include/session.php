<?php
/**
 * Session
 * @package Legacy
 * @subpackage core
 * @version 2.3.0
 * @author Nuno Luciano (aka Gigamaster), 2020 XCL PHP7
 * @author kilica
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/>
 * @license   Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

/**
  * Regenerate New Session ID & Delete OLD Session
  * @deprecated
  */

function xoops_session_regenerate()
{
    $root =& XCube_Root::getSingleton();
    if (!isset($_SESSION)) {
      $root->mSession->regenerate();
    }
}
