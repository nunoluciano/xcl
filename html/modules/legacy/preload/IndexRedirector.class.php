<?php
/**
 *
 * @package Legacy
 * @version $Id: IndexRedirector.class.php,v 1.3 2008/09/25 15:12:44 kilica Exp $
 * @copyright Copyright 2005-2020 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 *
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

class Legacy_IndexRedirector extends XCube_ActionFilter
{
    public function preBlockFilter()
    {
        $this->mController->mRoot->mDelegateManager->add('Legacypage.Top.Access', [&$this, 'redirect']);
    }

    public function redirect()
    {
        $startPage = $this->mRoot->mContext->getXoopsConfig('startpage');
        if (null !== $startPage && '--' !== $startPage) {
            $handler =& xoops_gethandler('module');
            $module =& $handler->get($startPage);
            if (is_object($module) && $module->get('isactive')) {
                $this->mController->executeForward(XOOPS_URL . '/modules/' . $module->getShow('dirname') . '/');
            }
        }
    }
}
