<?php
/**
 *
 * @package Legacy
 * @version $Id: protectorLE.class.php,v 1.3 2008/09/25 15:12:45 kilica Exp $
 * @copyright Copyright 2005-2020 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/xcl/blob/master/docs/GPL_V2.txt
 *
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

class protectorLE_Filter extends XCube_ActionFilter
{
    public function getCheckRequestKeys()
    {
        $checkNames= [
            'GLOBALS', '_SESSION', 'HTTP_SESSION_VARS', '_GET', 'HTTP_GET_VARS',
            '_POST', 'HTTP_POST_VARS', '_COOKIE', 'HTTP_COOKIE_VARS', '_REQUEST',
            '_SERVER', 'HTTP_SERVER_VARS', '_ENV', 'HTTP_ENV_VARS', '_FILES',
            'HTTP_POST_FILES', 'xoopsDB', 'xoopsUser', 'xoopsUserId', 'xoopsUserGroups',
            'xoopsUserIsAdmin', 'xoopsConfig', 'xoopsOption', 'xoopsModule', 'xoopsModuleConfig'
        ];

        return $checkNames;
    }

    public function preFilter()
    {
        foreach ($this->getCheckRequestKeys() as $name) {
            if (isset($_REQUEST[$name])) {
                die();
            }
        }
    }
}
