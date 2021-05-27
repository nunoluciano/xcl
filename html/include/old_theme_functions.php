<?php
/**
 * @TODO remove old theme functions XCL 2.3.0
 * @package Legacy
 * @subpackage core
 * @version 2.3.0
 * @author Nuno Luciano (aka Gigamaster), 2020 XCL PHP7
 * @author Minahito
 * @author Kazumi Ono (aka onokazu)
 * @copyright Copyright 2005-2021 XOOPSCube Project  <https://github.com/xoopscube/>
 * @license   Legacy : https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 */

// These are needed when viewing old modules (that don't use Smarty template files) when a theme that use Smarty templates are selected.

// function_exists check is needed for inclusion from the admin side

if (!function_exists('opentable')) {
    function OpenTable($width='100%')
    {
        echo '<table width="'.$width.'" cellspacing="0" class="outer"><tr><td class="even">';
    }
}

if (!function_exists('closetable')) {
    function CloseTable()
    {
        echo '</td></tr></table>';
    }
}

if (!function_exists('themecenterposts')) {
    function themecenterposts($title, $content)
    {
        echo '<table cellpadding="4" cellspacing="1" width="98%" class="outer"><tr><td class="head">'.$title.'</td></tr><tr><td><br>'.$content.'<br></td></tr></table>';
    }
}
