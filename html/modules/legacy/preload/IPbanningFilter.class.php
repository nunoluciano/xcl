<?php
/**
 *
 * @package Legacy
 * @version $Id: IPbanningFilter.class.php,v 1.5 2008/09/25 15:12:43 kilica Exp $
 * @copyright Copyright 2005-2020 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/xcl/blob/master/docs/GPL_V2.txt
 *
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

/***
 * This burns the access from the specific IP address, which is specified at
 * the preference.
 */
class Legacy_IPbanningFilter extends XCube_ActionFilter
{
    public function preBlockFilter()
    {
        if ($this->mRoot->mContext->getXoopsConfig('enable_badips')) {
            if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR']) {
                foreach ($this->mRoot->mContext->mXoopsConfig['bad_ips'] as $bi) {
                    $bi = str_replace('.', '\.', $bi);
                    if (!empty($bi) && preg_match('/' . $bi . '/', $_SERVER['REMOTE_ADDR'])) {
                        die();
                    }
                }
            }
        }
    }
}
