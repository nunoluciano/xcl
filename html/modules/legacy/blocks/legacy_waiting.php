<?php
/**
 * legacy_waiting.php
 * XOOPS2
 * @package   Legacy
 * @version   2.3.0
 * @author    Gigamaster, XCL 2020 PHP7
 * @author    kilica, 2008/09/25
 * @author    Kazumi Ono (AKA onokazu)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license   https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 * @license   https://github.com/xoopscube/legacy/blob/master/docs/bsd_licenses.txt Modified BSD license
 * @brief     This file was entirely rewritten by the XOOPS Cube Legacy project for
 * keeping compatibility with XOOPS 2.0.x <https://www.xoops.org>
 */

function b_legacy_waiting_show()
{
    $modules = [];
    XCube_DelegateUtils::call('Legacyblock.Waiting.Show', new XCube_Ref($modules));
    $block['modules'] = $modules;
    return $block;
}
