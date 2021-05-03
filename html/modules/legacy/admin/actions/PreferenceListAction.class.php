<?php
/**
 * PreferenceListAction.class.php
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

require_once XOOPS_MODULE_PATH . '/legacy/admin/forms/PreferenceEditForm.class.php';

class Legacy_PreferenceListAction extends Legacy_Action
{
    public $mObjects = [];

    public function prepare(&$controller, &$xoopsUser)
    {
    }

    public function getDefaultView(&$controller, &$xoopsUser)
    {
        $handler =& xoops_gethandler('configcategory');
        $this->mObjects =& $handler->getObjects();

        return LEGACY_FRAME_VIEW_INDEX;
    }

    public function execute(&$controller, &$xoopsUser)
    {
        return $this->getDefaultView($controller, $xoopsUser);
    }

    public function executeViewIndex(&$controller, &$xoopsUser, &$render)
    {
        $render->setTemplateName('preference_list.html');
        $render->setAttribute('objects', $this->mObjects);
    }
}
