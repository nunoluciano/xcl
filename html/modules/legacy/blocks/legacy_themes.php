<?php
/**
 * legacy_themes.php
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
 * @param $options
 * @return array|null
 * */
function b_legacy_themes_show($options)
{
    global $xoopsConfig;

    if (0 === count($xoopsConfig['theme_set_allowed'])) {
        return null;
    }

    $block = [];
    if ('POST' === xoops_getenv('REQUEST_METHOD')) {
        $block['isEnableChanger'] = 0;
        return $block;
    }

    $block['isEnableChanger'] = 1;

    $theme_options = [];
    $handler =& xoops_getmodulehandler('theme', 'legacy');
    foreach ($xoopsConfig['theme_set_allowed'] as $name) {
        $theme =& $handler->get($name);
        if (null !== $theme) {
            $theme_option['name'] = $name;
            $theme_option['screenshot'] = $theme->getShow('screenshot');
            $theme_option['screenshotUrl'] = XOOPS_THEME_URL . '/' . $name . '/' . $theme->getShow('screenshot');
            if ($name === $xoopsConfig['theme_set']) {
                $theme_option['selected'] = 'selected="selected"';
                $block['theme_selected_screenshot'] = $theme->getShow('screenshot');
            } else {
                $theme_option['selected'] = '';
            }
            $theme_options[] = $theme_option;
        }
    }

    $block['count'] = count($xoopsConfig['theme_set_allowed']);
    $block['mode'] = $options[0];
    $block['width'] = $options[1];
    $block['theme_options'] = $theme_options;
    return $block;
}

function b_legacy_themes_edit($options)
{
    $chk = '';
    $form = '<div>'._MB_LEGACY_LANG_THSHOW.'&nbsp;&nbsp;';
    if (1 == $options[0]) {
        $chk = ' checked="checked"';
    }
    $form .= '<input type="radio" name="options[0]" id="display-yes" value="1" '.$chk.'><label for="display-yes">'._YES.'</label>';
    $chk = '';
    if (0 == $options[0]) {
        $chk = ' checked="checked"';
    }
    $form .= '<input type="radio" name="options[0]" id="display-no" value="0" '.$chk.'><label for="display-no">'._NO.'</label></div>';
    $form .= '<div><label for="screenshot">'._MB_LEGACY_LANG_THWIDTH.' </label>';
    $form .= '<input type="text" name="options[1]" id="screenshot" size="3" value="'.$options[1].'"></div>';
    return $form;
}
