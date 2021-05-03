<?php
/**
 * CommentDeleteAction.class.php
 * @package   Legacy
 * @version   2.3.0
 * @author    Gigamaster, XCL 2020 PHP7
 * @author    kilica, 2008/09/25
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license   https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 * @license   https://github.com/xoopscube/legacy/blob/master/docs/bsd_licenses.txt Modified BSD license
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

require_once XOOPS_MODULE_PATH . '/legacy/class/AbstractDeleteAction.class.php';
require_once XOOPS_MODULE_PATH . '/legacy/admin/forms/CommentAdminDeleteForm.class.php';
require_once XOOPS_MODULE_PATH . '/legacy/admin/actions/CommentEditAction.class.php';

class Legacy_CommentDeleteAction extends Legacy_AbstractDeleteAction
{
    public function _getId()
    {
        return isset($_REQUEST['com_id']) ? xoops_getrequest('com_id') : 0;
    }

    public function &_getHandler()
    {
        $handler =& xoops_getmodulehandler('comment');
        $handler->mDeleteSuccess->add([&$this, 'doDelete']);
        return $handler;
    }

    public function _setupActionForm()
    {
        $this->mActionForm =new Legacy_CommentAdminDeleteForm();
        $this->mActionForm->prepare();
    }

    public function executeViewInput(&$controller, &$xoopsUser, &$render)
    {
        //
        // Lazy load
        //
        $this->mObject->loadUser();
        $this->mObject->loadModule();
        $this->mObject->loadStatus();

        //
        // Load children and load their module and commentater.
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

        $render->setTemplateName('comment_delete.html');
        $render->setAttribute('actionForm', $this->mActionForm);
        $render->setAttribute('object', $this->mObject);
        $render->setAttribute('children', $children);
    }

    public function executeViewSuccess(&$controller, &$xoopsUser, &$render)
    {
        $controller->executeForward('./index.php?action=CommentList');
    }

    public function executeViewError(&$controller, &$xoopsUser, &$render)
    {
        $controller->executeRedirect('./index.php?action=CommentList', 1, _MD_LEGACY_ERROR_DBUPDATE_FAILED);
    }

    public function executeViewCancel(&$controller, &$xoopsUser, &$render)
    {
        $controller->executeForward('./index.php?action=CommentList');
    }

    public function doDelete($comment)
    {
        //
        // Adjust user's post count.
        //
        if (1 != $comment->get('com_status') && $comment->get('com_uid') > 0) {
            $handler =& xoops_gethandler('member');

            //
            // TODO We should adjust the following lines and handler's design.
            // We think we should not use getUser() and updateUserByField in XCube 2.1.
            //
            $user =& $handler->getUser($comment->get('com_uid'));
            if (is_object($user)) {
                $count = $user->get('posts');

                if ($count > 0) {
                    $handler->updateUserByField($user, 'posts', $count - 1);
                }
            }
        }

        //
        // callback
        //
        $comment_config = Legacy_CommentEditAction::loadCallbackFile($comment);

        if (false == $comment_config) {
            return;
        }

        $function = $comment_config['callback']['update'];

        if (function_exists($function)) {
            $criteria = new CriteriaCompo(new Criteria('com_modid', $comment->get('com_modid')));
            $criteria->add(new Criteria('com_itemid', $comment->get('com_itemid')));
            $criteria->add(new Criteria('com_status', XOOPS_COMMENT_ACTIVE));

            $handler =& xoops_gethandler('comment');
            $commentCount = $handler->getCount($criteria);

            call_user_func($function, $comment->get('com_id'), $commentCount);
        }
    }
}
