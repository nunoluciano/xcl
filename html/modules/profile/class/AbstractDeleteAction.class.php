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

require_once __DIR__ . '/AbstractEditAction.class.php';

class Profile_AbstractDeleteAction extends Profile_AbstractEditAction
{
    /**
     * @protected
     */
    public function _isEnableCreate()
    {
        return false;
    }

    /**
     * @public
     */
    public function prepare()
    {
        parent::prepare();
        return is_object($this->mObject);
    }

    /**
     * @protected
     */
    public function _doExecute()
    {
        if ($this->mObjectHandler->delete($this->mObject)) {
            return PROFILE_FRAME_VIEW_SUCCESS;
        }
    
        return PROFILE_FRAME_VIEW_ERROR;
    }
}
