<?php
/**
 * legacy_mainmenu.php
 * XOOPS2
 * @package   Legacy
 * @version   2.3.0
 * @author    Gigamaster, XCL 2020 PHP7
 * @author    kilica, 2008/09/25
 * @author    Kazumi Ono (AKA onokazu)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license   https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 * @license   https://github.com/xoopscube/legacy/blob/master/docs/bsd_licenses.txt Modified BSD license
 */

/**
 *
 * @param $options
 * @return array
 */
function b_legacy_mainmenu_show($options)
{
    $root =& XCube_Root::getSingleton();
    $xoopsModule =& $root->mContext->mXoopsModule;
    $xoopsUser =& $root->mController->mRoot->mContext->mXoopsUser;
    
    $block = [];
    $block['_display_'] = true;

    $module_handler =& xoops_gethandler('module');
    $criteria = new CriteriaCompo(new Criteria('hasmain', 1));
    $criteria->add(new Criteria('isactive', 1));
    $criteria->add(new Criteria('weight', 0, '>'));
    $modules =& $module_handler->getObjects($criteria, true);
    $moduleperm_handler =& xoops_gethandler('groupperm');
    $groups = is_object($xoopsUser) ? $xoopsUser->getGroups() : XOOPS_GROUP_ANONYMOUS;
    $read_allowed = $moduleperm_handler->getItemIds('module_read', $groups);
    $all_links = (int)$options[0];
    $mid = is_object($xoopsModule)?$xoopsModule->getVar('mid', 'N'):'';
    foreach (array_keys($modules) as $i) {
        if (in_array($i, $read_allowed)) {
            $module = &$modules[$i];
            $blockm = &$block['modules'][$i];
            $blockm['name'] = $module->getVar('name');
            $moddir = XOOPS_URL.'/modules/';
            $moddir .= $blockm['directory'] = $module->getVar('dirname', 'N');
            $info = $module->getInfo();
            $sublinks =& $module->subLink();
            if (count($sublinks)>0 && ($all_links || $i==$mid)) {
                foreach ($sublinks as $sublink) {
                    $blockm['sublinks'][] = ['name' => $sublink['name'], 'url' => $moddir . '/' . $sublink['url']];
                }
            } else {
                $blockm['sublinks'] = [];
            }
        }
    }
    return $block;
}

function b_legacy_mainmenu_edit($options)
{
    $off='checked="checked"';
    $on='';
    if ($options[0]) {
        $on = $off;
        $off = '';
    }
    return '<div>' . _MB_LEGACY_MAINMENU_EXPAND_SUB .
           "<input type=\"radio\" name=\"options[0]\" value=\"0\" $off>" . _NO .
           " &nbsp; <input type=\"radio\" name=\"options[0]\" value=\"1\" $on>" . _YES . '</div>';
}
