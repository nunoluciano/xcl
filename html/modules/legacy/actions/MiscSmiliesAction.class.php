<?php
/**
 * MiscSmiliesAction.class.php
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

require_once XOOPS_MODULE_PATH . '/legacy/class/AbstractListAction.class.php';
require_once XOOPS_MODULE_PATH . '/legacy/forms/SmilesFilterForm.class.php';

class Legacy_MiscSmiliesAction extends Legacy_AbstractListAction
{
    /**
     * @var string
     */
    public $mTargetName = null;

    public function &_getHandler()
    {
        $handler =& xoops_getmodulehandler('smiles', 'legacy');
        return $handler;
    }

    public function &_getFilterForm()
    {
        $filter =new Legacy_SmilesFilterForm($this->_getPageNavi(), $this->_getHandler());
        return $filter;
    }

    public function _getBaseUrl()
    {
        return './misc.php?type=Smilies';
    }

    public function getDefaultView(&$controller, &$xoopsUser)
    {
        $this->mTargetName = trim(xoops_getrequest('target'));
        if ('' == $this->mTargetName || !preg_match('/^[a-zA-Z]\w*$/', $this->mTargetName)) {
            return LEGACY_FRAME_VIEW_ERROR;
        }
        return parent::getDefaultView($controller, $xoopsUser);
    }

    public function executeViewIndex(&$controller, &$xoopsUser, &$render)
    {
        //
        // Because this action's template uses BASE message catalog, load it.
        //
        $root =& $controller->mRoot;
        $root->mLanguageManager->loadModuleMessageCatalog('legacy');
        $root->mContext->setAttribute('legacy_pagetitle', _MD_LEGACY_LANG_ALL_SMILEY_LIST);

        $render->setTemplateName('legacy_misc_smilies.html');
        $render->setAttribute('objects', $this->mObjects);
        $render->setAttribute('pageNavi', $this->mFilter->mNavi);
        $render->setAttribute('targetName', $this->mTargetName);
    }

    public function executeViewError(&$controller, &$xoopsUser, &$render)
    {
        $render->setTemplateName('legacy_dummy.html');
    }
}
