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

class Profile_AbstractViewAction extends Profile_AbstractAction
{
    public $mObject = null;
    public $mObjectHandler = null;

    /**
     * @protected
     */
    public function _getId()
    {
    }

    /**
     * @protected
     */
    public function &_getHandler()
    {
    }

    /**
     * @protected
     */
    public function _setupObject()
    {
        $id = $this->_getId();
    
        $this->mObjectHandler =& $this->_getHandler();
    
        $this->mObject =& $this->mObjectHandler->get($id);
    }

    /**
     * @public
     */
    public function prepare()
    {
        $this->_setupObject();
        return is_object($this->mObject);
    }

    /**
     * @public
     */
    public function getDefaultView()
    {
        if (null == $this->mObject) {
            return PROFILE_FRAME_VIEW_ERROR;
        }
    
        return PROFILE_FRAME_VIEW_SUCCESS;
    }

    /**
     * @public
     */
    public function execute()
    {
        return $this->getDefaultView($controller, $xoopsUser, $moduleConfig);
    }
}
