<?php
/**
 * ImageDeleteAction.class.php
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

require_once XOOPS_MODULE_PATH . '/legacy/class/AbstractDeleteAction.class.php';
require_once XOOPS_MODULE_PATH . '/legacy/admin/forms/ImageAdminDeleteForm.class.php';

class Legacy_ImageDeleteAction extends Legacy_AbstractDeleteAction
{
    public function _getId()
    {
        return isset($_REQUEST['image_id']) ? xoops_getrequest('image_id') : 0;
    }

    public function &_getHandler()
    {
        $handler =& xoops_getmodulehandler('image');
        return $handler;
    }

    public function _setupActionForm()
    {
        $this->mActionForm =new Legacy_ImageAdminDeleteForm();
        $this->mActionForm->prepare();
    }

    public function executeViewInput(&$controller, &$xoopsUser, &$render)
    {
        $this->mObject->loadImagecategory();

        $render->setTemplateName('image_delete.html');
        $render->setAttribute('actionForm', $this->mActionForm);
        $render->setAttribute('object', $this->mObject);
    }

    public function executeViewSuccess(&$controller, &$xoopsUser, &$render)
    {
        $controller->executeForward('./index.php?action=ImageList&imgcat_id=' . $this->mObject->get('imgcat_id'));
    }

    public function executeViewError(&$controller, &$xoopsUser, &$render)
    {
        $controller->executeRedirect('./index.php?action=ImageList', 1, _MD_LEGACY_ERROR_DBUPDATE_FAILED);
    }

    public function executeViewCancel(&$controller, &$xoopsUser, &$render)
    {
        $controller->executeForward('./index.php?action=ImageList&imgcat_id=' . $this->mObject->get('imgcat_id'));
    }
}
