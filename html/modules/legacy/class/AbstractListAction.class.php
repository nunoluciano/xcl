<?php
/**
 *
 * @package Legacy
 * @version $Id: AbstractListAction.class.php,v 1.3 2008/09/25 15:11:30 kilica Exp $
 * @copyright Copyright 2005-2007 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 *
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

require_once XOOPS_ROOT_PATH . '/core/XCube_PageNavigator.class.php';

class Legacy_AbstractListAction extends Legacy_Action
{
    public $mObjects = [];
    
    public $mFilter = null;

    public function &_getHandler()
    {
    }

    public function &_getFilterForm()
    {
    }

    public function _getBaseUrl()
    {
    }
    
    public function &_getPageNavi()
    {
        $navi =new XCube_PageNavigator($this->_getBaseUrl(), XCUBE_PAGENAVI_START);
        return $navi;
    }

    public function getDefaultView(&$controller, &$xoopsUser)
    {
        $this->mFilter =& $this->_getFilterForm();
        $this->mFilter->fetch();
        
        $handler =& $this->_getHandler();
        $this->mObjects =& $handler->getObjects($this->mFilter->getCriteria());
        
        return LEGACY_FRAME_VIEW_INDEX;
    }
}
