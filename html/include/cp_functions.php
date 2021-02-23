<?php
/**
 * *
 *  * Xoops Control panel header
 *  *
 *  * @package    Legacy
 *  * @subpackage core
 *  * @author     Original Authors: Minahito
 *  * @author     Other Authors : Kazumi Ono (aka onokazu)
 *  * @copyright  2005-2021 The XOOPSCube Project
 *  * @license    Legacy : https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 *  * @license    Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 *  * @version    v 1.1 2007/05/15 02:34:18 minahito, Release: @package_230@
 *  * @link       https://github.com/xoopscube/xcl
 * *
 */

define('XOOPS_CPFUNC_LOADED', 1);

function xoops_cp_header()
{
    //
    // [Special Mission] Additional CHECK!!
    // Old modules may call this file from other admin directory.
    // In this case, the controller does not have Admin Module Object.
    //
    $root=&XCube_Root::getSingleton();
    require_once XOOPS_ROOT_PATH . '/modules/legacy/kernel/Legacy_AdminControllerStrategy.class.php';

    $strategy =new Legacy_AdminControllerStrategy($root->mController);

    $root->mController->setStrategy($strategy);
    $root->mController->setupModuleContext();
    $root->mController->_mStrategy->setupModuleLanguage();    //< Umm...

    require_once XOOPS_ROOT_PATH . '/header.php';
}

function xoops_cp_footer()
{
    require_once XOOPS_ROOT_PATH . '/footer.php';
}

// We need these because theme files will not be included
function OpenTable()
{
    echo "<table width='100%' border='0' cellspacing='1' cellpadding='8' style='border: 2px solid #2F5376;'><tr class='bg4'><td valign='top'>\n";
}

function CloseTable()
{
    echo '</td></tr></table>';
}

function themecenterposts($title, $content)
{
    echo '<table cellpadding="4" cellspacing="1" width="98%" class="outer"><tr><td class="head">'.$title.'</td></tr><tr><td><br>'.$content.'<br></td></tr></table>';
}

function myTextForm($url, $value)
{
    return '<form action="'.$url.'" method="post"><input type="submit" value="'.$value.'" /></form>';
}

function xoopsfwrite()
{
    if ('POST' != $_SERVER['REQUEST_METHOD']) {
        return false;
    }
    if (!xoops_refcheck()) {
        return false;
    }
    return true;
}

