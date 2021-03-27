<?php
/**
 * Pico content management D3 module for XCL
 *
 * @package XCL
 * @subpackage Pico
 * @version 2.3
 * @author Gijoe (Peak), Gigamaster (XCL)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */

function smarty_function_pico_subcattree($params, &$smarty)
{
    $mydirname = @$params['dir'] . @$params['dirname'];
    $cat_id = @$params['id'] + @$params['cat_id'];
    $var_name = @$params['item'] . @$params['assign'];

    if (empty($var_name)) {
        echo 'error ' . __FUNCTION__ . ' [specify item]';
        return;
    }

    if (empty($mydirname)) {
        $mydirname = $smarty->get_template_vars('mydirname');
    }
    if (empty($mydirname)) {
        echo 'error ' . __FUNCTION__ . ' [specify dirname]';
        return;
    }

    $db = XoopsDatabaseFactory::getDatabaseConnection();

    $sql = 'SELECT c.cat_redundants FROM ' . $db->prefix($mydirname . '_categories') . " c WHERE c.cat_id=$cat_id";

    [$redundants_serialized] = $db->fetchRow($db->query($sql));

    $redundants = pico_common_unserialize($redundants_serialized);

    if (empty($redundants)) {
        $redundants = [];
    }

    $smarty->assign($var_name, $redundants);
}
