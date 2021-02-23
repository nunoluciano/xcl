<?php
/**
 *
 * @package Legacy
 * @version $Id: SmilesEditAction.class.php,v 1.3 2008/09/25 15:11:51 kilica Exp $
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 *
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

require_once XOOPS_MODULE_PATH . '/legacy/class/AbstractEditAction.class.php';
require_once XOOPS_MODULE_PATH . '/legacy/admin/forms/SmilesAdminEditForm.class.php';

class Legacy_SmilesEditAction extends Legacy_AbstractEditAction
{
    public function _getId()
    {
        return isset($_REQUEST['id']) ? xoops_getrequest('id') : 0;
    }

    public function &_getHandler()
    {
        $handler =& xoops_getmodulehandler('smiles');
        return $handler;
    }

    public function _setupActionForm()
    {
        $this->mActionForm =new Legacy_SmilesAdminEditForm();
        $this->mActionForm->prepare();
    }


    public function _doExecute()
    {
        if (null !== $this->mActionForm->mFormFile) {
            if (!$this->mActionForm->mFormFile->saveAs(XOOPS_UPLOAD_PATH)) {
                return false;
            }
        }

        //
        // Delete old file, if the file exists.
        //
        if (null !== $this->mActionForm->mOldFilename && 'blank.gif' != $this->mActionForm->mOldFilename) {
            @unlink(XOOPS_UPLOAD_PATH . '/' . $this->mActionForm->mOldFilename);
        }

        return parent::_doExecute();
    }

    public function executeViewInput(&$controller, &$xoopsUser, &$render)
    {
        $render->setTemplateName('smiles_edit.html');
        $render->setAttribute('actionForm', $this->mActionForm);
        $render->setAttribute('object', $this->mObject);
    }

    public function executeViewSuccess(&$controller, &$xoopsUser, &$render)
    {
        $controller->executeForward('./index.php?action=SmilesList');
    }

    public function executeViewError(&$controller, &$xoopsUser, &$render)
    {
        $controller->executeRedirect('./index.php?action=SmilesList', 1, _MD_LEGACY_ERROR_DBUPDATE_FAILED);
    }

    public function executeViewCancel(&$controller, &$xoopsUser, &$render)
    {
        $controller->executeForward('./index.php?action=SmilesList');
    }
}
