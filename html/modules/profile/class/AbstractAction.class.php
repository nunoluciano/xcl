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

class Profile_AbstractAction
{
    public $mRoot = null;
    public $mModule = null;
    public $mAsset = null;

    /**
     * @public
     */
    public function &_getHandler()
    {
    }
    public function Profile_AbstractAction()
    {
        self::__construct();
    }
    public function __construct()
    {
        $this->mRoot =& XCube_Root::getSingleton();
        $this->mModule =& $this->mRoot->mContext->mModule;
        $this->mAsset =& $this->mModule->mAssetManager;
    }
    public function isMemberOnly()
    {
        return false;
    }
    public function isAdminOnly()
    {
        return false;
    }
    public function prepare()
    {
        return true;
    }

    public function hasPermission()
    {
        return true;
    }

    public function getDefaultView()
    {
        return Profile_FRAME_VIEW_NONE;
    }

    public function execute()
    {
        return Profile_FRAME_VIEW_NONE;
    }

    public function executeViewSuccess(&$controller, &$render)
    {
    }

    public function executeViewError(&$render)
    {
    }

    public function executeViewIndex(&$render)
    {
    }

    public function executeViewInput(&$render)
    {
    }

    public function executeViewPreview(&$render)
    {
    }

    public function executeViewCancel(&$render)
    {
    }
}
