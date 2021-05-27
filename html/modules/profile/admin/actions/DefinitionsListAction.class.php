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

require_once XOOPS_MODULE_PATH . '/profile/class/AbstractListAction.class.php';

class Profile_Admin_DefinitionsListAction extends Profile_AbstractListAction
{
    /**
     * @protected
     */
    public function &_getHandler()
    {
        $handler =& $this->mAsset->load('handler', 'definitions');
        return $handler;
    }

    /**
     * @protected
     */
    public function &_getFilterForm()
    {
        // $filter =new Profile_Admin_DefinitionsFilterForm();
        $filter =& $this->mAsset->create('filter', 'admin.definitions');
        $filter->prepare($this->_getPageNavi(), $this->_getHandler());
        return $filter;
    }

    /**
     * @protected
     */

    public function &_getBaseUrl()
    {
        $baseUrl = './index.php?action=DefinitionsList';
        return $baseUrl;
    }

    /**
     * @public
     * @param $render
     */
    public function executeViewIndex(&$render)
    {
        $render->setTemplateName('definitions_list.html');
        #cubson::lazy_load_array('definitions', $this->mObjects);
        $render->setAttribute('objects', $this->mObjects);
        $render->setAttribute('pageNavi', $this->mFilter->mNavi);
    }
}
