<?php
/**
 *
 * @package Legacy
 * @version $Id: Module.class.php,v 1.3 2008/09/25 15:11:28 kilica Exp $
 * @copyright Copyright 2005-2020 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/xcl/blob/master/docs/GPL_V2.txt
 *
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

class Legacy_Module extends Legacy_ModuleAdapter
{
    public function Legacy_Module(&$xoopsModule)
    {
        self::__construct($xoopsModule);
    }

    public function __construct(&$xoopsModule)
    {
        parent::__construct($xoopsModule);
        $this->mGetAdminMenu =new XCube_Delegate();
        $this->mGetAdminMenu->register('Legacy_Module.getAdminMenu');
    }

    public function getAdminMenu()
    {
        $menu = parent::getAdminMenu();
        $this->mGetAdminMenu->call(new XCube_Ref($menu));

        ksort($menu);

        return $menu;
    }
}
