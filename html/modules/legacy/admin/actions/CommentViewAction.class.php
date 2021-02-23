<?php
/**
 *
 * @package Legacy
 * @version $Id: CommentViewAction.class.php,v 1.3 2008/09/25 15:11:48 kilica Exp $
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 *
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

require_once XOOPS_MODULE_PATH . '/legacy/class/AbstractListAction.class.php';
require_once XOOPS_MODULE_PATH . '/legacy/admin/forms/CommentFilterForm.class.php';

class Legacy_CommentViewAction extends Legacy_Action
{
    public $mObject = null;

    public function getDefaultView(&$controller, &$xoopsUser)
    {
        $handler =& xoops_getmodulehandler('comment');
        $this->mObject =& $handler->get(xoops_getrequest('com_id'));

        if (null == $this->mObject) {
            return LEGACY_FRAME_VIEW_ERROR;
        }

        return LEGACY_FRAME_VIEW_SUCCESS;
    }

    public function executeViewSuccess(&$controller, &$xoopsUser, &$render)
    {
        //
        // Lazy load
        //
        $this->mObject->loadModule();
        $this->mObject->loadUser();
        $this->mObject->loadStatus();

        $render->setTemplateName('comment_view.html');
        $render->setAttribute('object', $this->mObject);

        //
        // Load children of specified comment and assign those.
        //
        $handler =& xoops_getmodulehandler('comment');
        $criteria =new Criteria('com_pid', $this->mObject->get('com_id'));
        $children =& $handler->getObjects($criteria);

        if (count($children) > 0) {
            foreach (array_keys($children) as $key) {
                $children[$key]->loadModule();
                $children[$key]->loadUser();
            }
        }
        $render->setAttribute('children', $children);
    }

    public function executeViewError(&$controller, &$xoopsUser, &$render)
    {
        $controller->executeForward('./index.php');
    }
}
