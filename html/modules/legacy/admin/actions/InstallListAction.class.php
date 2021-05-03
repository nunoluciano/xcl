<?php
/**
 * InstallListAction.class.php
 * @package   Legacy
 * @version   2.3.0
 * @author    Gigamaster, XCL 2020 PHP7
 * @author    kilica, 2008/09/25
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license   https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 * @license   https://github.com/xoopscube/legacy/blob/master/docs/bsd_licenses.txt Modified BSD license
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

/***
 * @public
 * @internal
 * List up non-installation modules.
 */
class Legacy_InstallListAction extends Legacy_Action
{
    public $mModuleObjects = null;

    public function getDefaultView(&$controller, &$xoopsUser)
    {
        $handler =& xoops_getmodulehandler('non_installation_module');

        $this->mModuleObjects =& $handler->getObjects();

        return LEGACY_FRAME_VIEW_INDEX;
    }

    public function executeViewIndex(&$controller, &$xoopsUser, &$renderer)
    {
        $renderer->setTemplateName('install_list.html');
        $renderer->setAttribute('moduleObjects', $this->mModuleObjects);
    }
}
