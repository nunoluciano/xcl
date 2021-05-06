<?php
/**
 * BlockInstallEditForm.class.php
 * @package   Legacy
 * @version   2.3.0
 * @author    Gigamaster, XCL 2020 PHP7
 * @author    kilica, 2008/09/25
 * @copyright Copyright 2005-2021 XOOPSCube Project
 * @license   https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 * @license   https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

require_once XOOPS_ROOT_PATH . '/modules/legacy/admin/forms/BlockEditForm.class.php';

class Legacy_BlockInstallEditForm extends Legacy_BlockEditForm
{
    public function getTokenName()
    {
        return 'module.legacy.BlockInstallEditForm.TOKEN' . $this->get('bid');
    }

    public function update(&$obj)
    {
        parent::update($obj);
        $obj->set('visible', true);
    }
}
