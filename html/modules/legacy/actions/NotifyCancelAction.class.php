<?php
/**
 * NotifyCancelAction.class.php
 * @package   Legacy
 * @version   2.3.0
 * @author    Gigamaster, XCL 2020 PHP7
 * @author    kilica, 2008/09/25
 * @copyright Copyright 2005-2021 XOOPSCube Project
 * @license   https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

class Legacy_NotifyCancelAction extends Legacy_Action
{
    public function getDefaultView(&$contoller, &$xoopsUser)
    {
        $contoller->executeForward(XOOPS_URL . '/');
    }

    public function execute(&$contoller, &$xoopsUser)
    {
        $contoller->executeForward(XOOPS_URL . '/');
    }
}
