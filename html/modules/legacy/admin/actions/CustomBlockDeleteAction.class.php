<?php
/**
 *
 * @package Legacy
 * @version $Id: CustomBlockDeleteAction.class.php,v 1.3 2008/09/25 15:11:54 kilica Exp $
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 *
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

require_once XOOPS_MODULE_PATH . '/legacy/class/AbstractDeleteAction.class.php';
require_once XOOPS_MODULE_PATH . '/legacy/admin/forms/CustomBlockDeleteForm.class.php';

class Legacy_CustomBlockDeleteAction extends Legacy_AbstractDeleteAction
{
    public function _getId()
    {
        return isset($_REQUEST['bid']) ? $_REQUEST['bid'] : 0;
    }

    public function &_getHandler()
    {
        $handler =& xoops_getmodulehandler('newblocks');
        return $handler;
    }

    public function _setupActionForm()
    {
        $this->mActionForm =new Legacy_CustomBlockDeleteForm();
        $this->mActionForm->prepare();
    }

    public function _isDeletable()
    {
        if (is_object($this->mObject)) {
            return ('C' == $this->mObject->get('block_type') && 0 == $this->mObject->get('visible'));
        } else {
            return false;
        }
    }

    public function getDefaultView(&$controller, &$xoopsUser)
    {
        if (!$this->_isDeletable()) {
            return LEGACY_FRAME_VIEW_ERROR;
        }

        return parent::getDefaultView($controller, $xoopsUser);
    }

    public function execute(&$controller, &$xoopsUser)
    {
        if (!$this->_isDeletable()) {
            return LEGACY_FRAME_VIEW_ERROR;
        }

        return parent::execute($controller, $xoopsUser);
    }

    public function executeViewInput(&$controller, &$xoopsUser, &$render)
    {
        $render->setTemplateName('customblock_delete.html');
        $render->setAttribute('actionForm', $this->mActionForm);

        //
        // lazy loading
        //
        $this->mObject->loadModule();
        $this->mObject->loadColumn();
        $this->mObject->loadCachetime();

        $render->setAttribute('object', $this->mObject);
    }

    public function executeViewSuccess(&$controller, &$xoopsUser, &$render)
    {
        $controller->executeForward('./index.php?action=BlockInstallList');
    }

    public function executeViewError(&$controller, &$xoopsUser, &$render)
    {
        $controller->executeRedirect('./index.php?action=BlockInstallList', 1, _MD_LEGACY_ERROR_DBUPDATE_FAILED);
    }

    public function executeViewCancel(&$controller, &$xoopsUser, &$render)
    {
        if ($this->mObject->isNew()) {
            $controller->executeForward('./index.php?action=BlockInstallList');
        } else {
            $controller->executeForward('./index.php?action=BlockList');
        }
    }
}
