<?php
/**
 * BlockInstallEditAction.class.php
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

require_once XOOPS_MODULE_PATH . '/legacy/admin/actions//BlockEditAction.class.php';

require_once XOOPS_MODULE_PATH . '/legacy/class/AbstractEditAction.class.php';
require_once XOOPS_MODULE_PATH . '/legacy/admin/forms/BlockInstallEditForm.class.php';

class Legacy_BlockInstallEditAction extends Legacy_BlockEditAction
{
    public function _setupActionForm()
    {
        $this->mActionForm =new Legacy_BlockInstallEditForm();
        $this->mActionForm->prepare();
    }

    public function _isEditable()
    {
        if (is_object($this->mObject)) {
            return (0 === $this->mObject->get('visible'));
        }

        return false;
    }

    public function executeViewInput(&$controller, &$xoopsUser, &$render)
    {
        parent::executeViewInput($controller, $xoopsUser, $render);
        $render->setTemplateName('blockinstall_edit.html');
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
        $controller->executeForward('./index.php?action=BlockInstallList');
    }
}
