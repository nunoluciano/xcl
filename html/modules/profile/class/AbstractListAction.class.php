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

require_once XOOPS_ROOT_PATH . '/core/XCube_PageNavigator.class.php';

class Profile_AbstractListAction extends Profile_AbstractAction
{
    public $mObjects = [];
    public $mFilter = null;

    /**
     * @protected
     */
    public function &_getHandler()
    {
    }

    /**
     * @protected
     */
    public function &_getFilterForm()
    {
    }

    /**
     * @protected
     */
    public function &_getBaseUrl()
    {
    }

    /**
     * @protected
     */
    public function &_getPageNavi()
    {
        $navi =new XCube_PageNavigator($this->_getBaseUrl(), XCUBE_PAGENAVI_START);
        return $navi;
    }

    /**
     * @public
     */
    public function getDefaultView()
    {
        $this->mFilter =& $this->_getFilterForm();
        $this->mFilter->fetch();
    
        $handler =& $this->_getHandler();
        $this->mObjects =& $handler->getObjects($this->mFilter->getCriteria());
    
        return PROFILE_FRAME_VIEW_INDEX;
    }
}
