<?php
/**
 * @package    profile
 * @version    2.3.1
 * @author     Nuno Luciano (aka gigamaster), 2020, XCL PHP7
 * @author     Kilica
 * @copyright  2005-2021 The XOOPSCube Project
 * @license    Legacy : https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 * @license    Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 * @link       https://github.com/xoopscube/
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

require_once XOOPS_MODULE_PATH . '/profile/class/AbstractViewAction.class.php';

class Profile_DataViewAction extends Profile_AbstractViewAction
{
    public $mFieldArr = [];

    /**
     * @public
     */
    public function _getId()
    {
        return (int)xoops_getrequest('uid');
    }

    /**
     * @public
     */
    public function &_getHandler()
    {
        $handler =& $this->mAsset->load('handler', 'data');
        return $handler;
    }

    public function prepare()
    {
        parent::prepare();
        $dHandler =& xoops_getmodulehandler('definitions');
        $this->mFieldArr = $dHandler->getFields4DataShow($this->_getId());
    }

    /**
     * @public
     * @param $render
     */
    public function executeViewSuccess(&$render)
    {
        $render->setTemplateName('profile_data_view.html');
        $render->setAttribute('object', $this->mObject);
        $render->setAttribute('fields', $this->mFieldArr);
    }

    /**
     * @public
     * @param $render
     */
    public function executeViewError(&$render)
    {
        $this->mRoot->mController->executeRedirect('./index.php?action=DataList', 1, _MD_PROFILE_ERROR_CONTENT_IS_NOT_FOUND);
    }
}
