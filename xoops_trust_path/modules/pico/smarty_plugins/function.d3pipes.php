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

function smarty_function_d3pipes($params, &$smarty)
{
    $dirname = @$params['dir'] . @$params['dirname'];
    $pipe_id = @$params['id'] + @$params['pipe_id'];
    $max = empty($params['max']) ? 10 : (int)$params['max'];

    if (empty($pipe_id)) {
        echo 'error smarty_function_pico [specify pipe_id]';
        return;
    }

    if (empty($dirname)) {
        $dirname = 'd3pipes';
    }

    $mydirname = $dirname;

    $mydirpath = XOOPS_ROOT_PATH . '/modules/' . $dirname;

    require XOOPS_TRUST_PATH . '/modules/d3pipes/blocks.php';

    $block = b_d3pipes_async_show([$dirname, '', $pipe_id, $max]);

    echo @$block['content'];
}
