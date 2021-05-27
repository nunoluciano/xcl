<?php
/**
 * @package    profile
 * @version    2.3.1
 * @author     Nuno Luciano (aka gigamaster), 2020, XCL PHP7
 * @author     Kilica
 * @author     Code generator - Cubson
 * @copyright  2005-2021 The XOOPSCube Project
 * @license    Legacy : https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 * @license    Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 * @link       https://github.com/xoopscube/
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

$mydirpath = basename(__DIR__) ;

//
// Define a basic manifesto.
//
$modversion['name']             = _MI_PROFILE_LANG_PROFILE;
$modversion['version']          = '2.31';
$modversion['detailed_version'] = '2.31.1';
$modversion['description']      = _MI_PROFILE_DESC_PROFILE;
$modversion['author']           = 'kilica. Gigamaster, 2020 XCL PHP7';
$modversion['credits']          = 'Code generator Cubson -XOOPSCube Project';
$modversion['help']             = 'help.html';
$modversion['license']          = 'GPL';
$modversion['official']         = 0;
$modversion['image']            = 'images/module_profile.svg';
$modversion['dirname']          = 'profile';

$modversion['cube_style']                   = true;
$modversion['disable_legacy_2nd_installer'] = false;


$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';

$modversion['tables'][0] = '{prefix}_profile_definitions';
$modversion['tables'][1] = '{prefix}_profile_data';

##[cubson:templates]
$modversion['templates'][1]['file'] = 'profile_data_edit.html';
$modversion['templates'][2]['file'] = 'profile_data_delete.html';
$modversion['templates'][3]['file'] = 'profile_data_view.html';
$modversion['templates'][4]['file'] = 'profile_data_list.html';
$modversion['templates'][5]['file'] = 'profile_inc_data_edit.html';
$modversion['templates'][6]['file'] = 'profile_inc_data_view.html';
##[/cubson:templates]

//
// Admin panel setting
//
$modversion['hasAdmin']   = 1;
$modversion['adminindex'] = 'admin/index.php?action=DefinitionsList';
$modversion['adminmenu']  = 'admin/menu.php';

//
// Public side control setting
//
$modversion['hasMain'] = 0;
// $modversion['sub'][]['name'] = "";
// $modversion['sub'][]['url'] = "";
