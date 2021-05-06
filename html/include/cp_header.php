<?php
/**
 * Xoops Control panel header
 * @package Legacy
 * @subpackage core
 * @version 2.3.0
 * @author kilica
 * @copyright Copyright 2005-2021 XOOPSCube Project  <https://github.com/xoopscube/>
 * @license   Legacy : https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 * @brief  This file was entirely rewritten by the XOOPS Cube Legacy project for
 * keeping compatibility with XOOPS 2.0.x <https://www.xoops.org>
 */

if (!defined('XOOPS_ROOT_PATH')) {
    //
    // Strange code? This file is used from files in admin directories having no include "mainfile.php".
    // Ummm..., this is deprecated  since XOOPS Cube Legacy.
    //

    /*
     * If you use open_basedir in php.ini and use file_exists for file outside open_basedir path,
     * you will not be warned at log and file_exists returns false even if file really exists.
     */
    if (!file_exists('../../../mainfile.php')) {
        if (!file_exists('../../mainfile.php')) {
            exit();
        }

        require_once '../../mainfile.php';
    } else {
        require_once '../../../mainfile.php';
    }
}

if (!defined('XOOPS_CPFUNC_LOADED')) {
    require_once XOOPS_ROOT_PATH . '/include/cp_functions.php';
}

//
// [Special Mission] Additional CHECK!!
// Old modules may call this file from other admin directory.
// In this case, the controller does not have Admin Module Object.
//
$root =& XCube_Root::getSingleton();

require_once XOOPS_ROOT_PATH . '/modules/legacy/kernel/Legacy_AdminControllerStrategy.class.php';
$strategy =new Legacy_AdminControllerStrategy($root->mController);

$root->mController->setStrategy($strategy);
$root->mController->setupModuleContext();
$root->mController->_mStrategy->setupModuleLanguage();    //< Umm...
